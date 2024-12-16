<?php

namespace App\Http\Controllers\Admin;
use App\Models\Notification; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
        $notifications = Notification::all();
        return view('admin.index',compact('notifications'));
    }
}
