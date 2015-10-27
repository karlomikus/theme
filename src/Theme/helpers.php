<?php

if (!function_exists('theme_asset')) {
    /**
     * Generate an theme asset path for the application.
     *
     * @param  string $path
     * @param  bool $secure
     * @return string
     */
    function theme_asset($path, $secure = null)
    {
        $currentThemePath = app('theme')->get()->getPath();

        return app('url')->asset($currentThemePath . $path, $secure);
    }
}