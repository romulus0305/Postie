<?php

namespace App\Providers;
use App\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
     

        
       
         View::share('randPost',Post::inRandomOrder()->first());
         View::share('archives',Post::archives());


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}


