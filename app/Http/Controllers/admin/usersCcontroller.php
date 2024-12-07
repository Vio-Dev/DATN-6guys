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
        $input = $request->all();
        $user = User::create($input);
        return redirect()->route('admin.user.index')
            ->with('success', 'User has been created successfully!');
    }
    public function destroy(Request $request, $id)
    {
        $user = User::destroy($id);
        return redirect()->route('admin.user.index');
    }
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Lấy tất cả dữ liệu từ request
        $input = $request->all();

        // Tìm người dùng theo ID, nếu không tìm thấy sẽ ném ra ngoại lệ ModelNotFoundException
        $user = User::findOrFail($id);

        // Kiểm tra nếu trường password được điền và không rỗng
        if ($request->filled('password')) {
            // Hash mật khẩu mới
            $input['password'] = Hash::make($request->password);
        } else {
            // Nếu không có mật khẩu mới, loại bỏ trường password khỏi mảng $input
            unset($input['password']);
        }

        // Cập nhật thông tin người dùng
        $user->update($input);
        return redirect()->route('admin.user.index');
    }
}
