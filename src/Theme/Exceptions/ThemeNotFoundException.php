<?php
namespace Karlomikus\Theme\Exceptions;

class ThemeNotFoundException extends \Exception
{
    public function __construct($themeName)
    {
        parent::__construct("Theme [$themeName] not found! Maybe you're missing a theme.json file.");
    }
}
