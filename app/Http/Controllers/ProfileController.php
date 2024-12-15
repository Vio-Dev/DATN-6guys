<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Wishlist;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form and their orders.
     */
    public function edit(Request $request): View
    {
        // Lấy thông tin người dùng
        $user = $request->user();

        // Lấy các đơn hàng của người dùng
        $orders = Order::where('user_id', $user->id)->get();

        // Lấy danh sách sản phẩm yêu thích của người dùng
        $wishlists = Wishlist::where('user_id', $user->id)->with('product')->get();  // Giả sử bạn đã khai báo mối quan hệ favorites trong model User

        // Truyền tất cả vào view
        return view('profile.edit', [
            'user' => $user,
            'orders' => $orders,      // Truyền danh sách đơn hàng vào view
            'wishlists' => $wishlists, // Truyền danh sách yêu thích vào view
        ]);
    }



    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Cập nhật thông tin profile từ request
        $user->fill($request->validated());

        // Nếu có upload avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Lưu file vào thư mục public/avatars
            $path = $file->store('avatars', 'public');

            // Lưu đường dẫn avatar vào database
            $user->avatar = $path;
        }

        // Kiểm tra nếu email được thay đổi
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
