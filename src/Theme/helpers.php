<?php

use Karlomikus\Theme\Contracts\ThemeInterface;

if (!function_exists('theme_url')) {
    /**
     * Generate an theme path url for the application.
     *
     * @param  string $path
     * @param  bool $secure
     * @return string
     */
    function theme_url($path, $secure = null)
    {
        $currentTheme = app(ThemeInterface::class)->get()->getNamespace();

        return app('url')->asset('themes' . DIRECTORY_SEPARATOR . $currentTheme . DIRECTORY_SEPARATOR . $path, $secure);
    }
}
