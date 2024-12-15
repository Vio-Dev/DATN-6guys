<?php

namespace App\Http\Controllers;

use App\Models\Notification;  // Import model Notification
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Hiển thị các thông báo đổi trả.
     *
     * @return \Illuminate\View\View
     */
    public function showReturnNotifications()
{
    $notifications = Notification::where('type', 'return')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

    return view('your-view', compact('notifications'));
}
}