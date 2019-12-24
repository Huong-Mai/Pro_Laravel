<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loaisp;
use App\Cart;
use Session;

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
        //
        view()->composer('header',function($view){
            // if(session('cart')){
            //     $ghcu = session::get('cart');
            //     $giohang = new Cart($ghcu);
            // }
            $loaisp = loaisp::all();
            //$view->with(['loaisp',$loaisp,'cart'=>Session::get('cart'),'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice,'totalQly'=>$cart->totalQly]);
            $view->with('loaisp',$loaisp);
        });

    }
}
