<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ( $view ) { 
            if (Auth::check()){
                $cartItems = Cart::with('product.media')->where('user_id', auth()->user()->id)->get()->take(4);
            }else{
                $cartItems = [];
            }
            $view->with( 'cartItems', $cartItems);
        });
        Paginator::useBootstrap();
    }
}
