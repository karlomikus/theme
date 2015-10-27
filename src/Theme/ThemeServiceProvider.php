<?php
namespace Karlomikus\Theme;

use Illuminate\Support\ServiceProvider;
use Karlomikus\Theme\Commands\ThemeListCommand;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config/theme.php' => config_path('theme.php'),
        ]);

        $this->app->bind('theme', function ($app) {
            return new Theme($app);
        });

        $this->app->bind('command.theme.list', function ($app) {
            return new ThemeListCommand($app['theme']);
        });

        $this->commands('command.theme.list');
    }
}
