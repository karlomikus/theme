<?php
namespace Karlomikus\Theme\Contracts;

interface ThemeInterface
{
    /**
     * Set current active theme
     *
     * @param string $theme Theme namespace
     * @throws ThemeNotFoundException
     */
    public function set($theme);

    /**
     * Get all found themes
     *
     * @return array|ThemeInfo[]
     */
    public function all();

    /**
     * Returns theme information.
     *
     * @param string Theme namespace
     * @return null|ThemeInfo
     */
    public function get($theme = null);

    /**
     * Check if theme exists
     *
     * @param $theme
     * @return bool
     */
    public function has($theme);

    /**
     * Set base themes folder path
     *
     * @param $path
     */
    public function setDefaultThemePath($path);
}
