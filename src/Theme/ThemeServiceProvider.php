<?php
namespace Karlomikus\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('theme', function($app) {
            return new Theme($app);
        });
    }
}