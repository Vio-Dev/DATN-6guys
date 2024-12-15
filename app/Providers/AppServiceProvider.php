<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // Chia sẻ biến $notifications tới tất cả các view
    $notifications = Notification::all();
    View::share('notifications', $notifications);

    // Chia sẻ giỏ hàng và tổng giá tiền
    View::composer('*', function ($view) {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $view->with('cart', $cart)->with('totalPrice', $totalPrice);
    });
}
}
