<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersCcontroller extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function add()
    {
        return view('admin.user.add');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Thêm xác nhận mật khẩu
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Nếu có avatar, xử lý upload file
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $validatedData['avatar'] = $file->store('avatars', 'public');
        }
    
        // Hash mật khẩu trước khi lưu
        $validatedData['password'] = Hash::make($request->password);
    
        User::create($validatedData);
    
        return redirect()->route('admin.user.index')
            ->with('success', 'User has been created successfully!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
        // Xóa avatar nếu có
        if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
            unlink(storage_path('app/public/' . $user->avatar));
        }
    
        // Xóa user
        $user->delete();
    
        return redirect()->route('admin.user.index')
            ->with('success', 'User has been deleted successfully!');
    }
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validate dữ liệu
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6|confirmed',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Xử lý avatar upload nếu có
    if ($request->hasFile('avatar')) {
        // Xóa avatar cũ nếu tồn tại
        if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
            unlink(storage_path('app/public/' . $user->avatar));
        }

        // Lưu avatar mới
        $file = $request->file('avatar');
        $validatedData['avatar'] = $file->store('avatars', 'public');
    }

    // Xử lý mật khẩu nếu được cập nhật
    if ($request->filled('password')) {
        $validatedData['password'] = Hash::make($request->password);
    }

    // Cập nhật user
    $user->update($validatedData);

    return redirect()->route('admin.user.index')
        ->with('success', 'User has been updated successfully!');
}
}
