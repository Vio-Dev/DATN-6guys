<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
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
            'password' => 'required|string|min:8',
        ], [
            'required' => ':attribute không được để trống',
            'string' => ':attribute phải là một chuỗi ký tự',
            'max' => ':attribute không được vượt quá :max ký tự',
            'email' => ':attribute phải là một địa chỉ email hợp lệ',
            'unique' => ':attribute đã tồn tại trong hệ thống',
            'min' => ':attribute phải có ít nhất :min ký tự',
        ], [
            'name' => 'Tên người dùng',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ]);


        // Mã hóa mật khẩu và tạo người dùng mới
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = $request->role;
        User::create($validatedData);

        return redirect()->route('admin.user.index')
            ->with('success', 'Thêm người dùng thành công!');
    }

    public function destroy($id)
    {
        // Tìm người dùng và xóa
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')
            ->with('success', 'Xóa người dùng thành công');
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
            'name' => 'required|string|max:255',  // Tên người dùng không được trống, là chuỗi và có độ dài tối đa 255 ký tự
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,  // Email không được trống, đúng định dạng và không trùng lặp với email hiện tại
            'password' => 'nullable|string|min:8',  // Mật khẩu có thể không có giá trị, nếu có thì phải là chuỗi, ít nhất 8 ký tự
        ], [
            'required' => ':attribute không được để trống',  // Thông báo khi trường không được điền
            'string' => ':attribute phải là một chuỗi ký tự',  // Thông báo khi trường không phải là chuỗi
            'max' => ':attribute không được vượt quá :max ký tự',  // Thông báo khi trường vượt quá giới hạn ký tự
            'email' => ':attribute phải là một địa chỉ email hợp lệ',  // Thông báo khi email không hợp lệ
            'unique' => ':attribute đã tồn tại trong hệ thống',  // Thông báo khi email đã tồn tại
            'min' => ':attribute phải có ít nhất :min ký tự',  // Thông báo khi mật khẩu có ít ký tự
        ], [
            'name' => 'Tên người dùng',  // Tên trường hiển thị khi thông báo lỗi
            'email' => 'Email',  // Tên trường hiển thị khi thông báo lỗi
            'password' => 'Mật khẩu',  // Tên trường hiển thị khi thông báo lỗi
        ]);




        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $validatedData['password'] = $request->role;
        // dd($request->role);
        // dd($user->role);
        $user->role = $request->role;
        $user->save();

        session()->flash('success', 'Cập nhật thành công');
        return redirect()->route('admin.user.index');
    }
}
