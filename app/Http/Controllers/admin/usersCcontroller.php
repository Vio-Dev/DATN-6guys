<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersCcontroller extends Controller
{
    public function index()
    {
        $users = User::all();  // Sử dụng biến số nhiều
        return view('admin.user.index', compact('users'));
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',

        ]);

        // Mã hóa mật khẩu và tạo người dùng mới
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = $request->role;
        User::create($validatedData);

        return redirect()->route('admin.user.index')
            ->with('success', 'User has been created successfully!');
    }

    public function destroy($id)
    {
        // Tìm người dùng và xóa
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')
            ->with('success', 'User has been deleted successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Nếu mật khẩu được nhập
        ]);

        // Kiểm tra và cập nhật mật khẩu nếu có
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']); // Xóa password nếu không có thay đổi
        }

        $validatedData['password'] = $request->role;
        // Cập nhật thông tin người dùng
        $user->update($validatedData);

        return redirect()->route('admin.user.index')->with('success', 'Cập nhật người dùng thành công!');
    }
}
