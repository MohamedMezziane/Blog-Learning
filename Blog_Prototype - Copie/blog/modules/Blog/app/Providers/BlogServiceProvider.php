<?php

namespace Modules\Blog\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class BlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Charger les routes
        $this->loadRoutesFrom(__DIR__.'/../../Routes/web.php');

        // Charger les migrations
        $this->loadMigrationsFrom(__DIR__.'/../../Database/migrations');

        // Charger les vues
        $this->loadViewsFrom(__DIR__.'/../../Resources/views', 'Blog');

        // Publier les assets si nécessaire
        $this->publishes([
            __DIR__.'/../../Resources/views' => resource_path('views/vendor/Blog'),
        ], 'pkgBlog-views');
    }

    public function register()
    {
        // Enregistrer d'autres services si nécessaire
    }
}