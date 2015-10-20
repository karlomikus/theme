<?php
namespace Karlomikus\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->publishes([
            __DIR__.'/config/theme.php' => config_path('theme.php'),
        ]);

        $this->app->bind('theme', function($app) {
            return new Theme($app);
        });
    }
}