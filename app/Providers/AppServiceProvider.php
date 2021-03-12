<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\HeaderFooter;
use Illuminate\Support\Facades\Auth;
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
        view::composer('admin.master', function($view){
            $header = HeaderFooter::find(3);
            $footer = HeaderFooter::find(3);
            $user = Auth::user();
           $view->with([
               'header' => $header,
               'footer' => $footer,
               'user' => $user,
           ]);
        });

        // view::composer('admin.main', function($view){
        //     $footer = HeaderFooter::find(2);
        //     $view->with('footer',$footer);
        // });
    }
}
