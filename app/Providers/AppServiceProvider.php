<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loaisp;
use App\giohang;
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
           /* if(session('giohang')){
                $ghcu = session::get('giohang');
                $giohang = new giohang($ghcu);
            }*/
            $loaisp = loaisp::all();
            $view->with('loaisp',$loaisp);
        });

    }
}
