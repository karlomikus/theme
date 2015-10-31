<?php
namespace Karlomikus\Theme;

use Illuminate\Support\ServiceProvider;
use Karlomikus\Theme\Commands\ThemeListCommand;
use Karlomikus\Theme\Commands\ThemeMakeCommand;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        require __DIR__ . '/helpers.php';

        $this->publishes([
            __DIR__ . '/config/theme.php' => config_path('theme.php'),
        ]);

        $this->registerCore();
    }

    public function registerCore()
    {
        $this->app['theme'] = $this->app->share(function ($app) {
            return new Theme($app);
        });

        $this->commands(ThemeListCommand::class);
        $this->commands(ThemeMakeCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['theme'];
    }
}
