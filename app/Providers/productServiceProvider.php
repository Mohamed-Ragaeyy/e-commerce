<?php

namespace App\Providers;

use App\Models\category;
use Illuminate\Support\ServiceProvider;

class productServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('user.header' , function ($view){
            $view->with('categories' ,category::select('id','name')->get());
    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
