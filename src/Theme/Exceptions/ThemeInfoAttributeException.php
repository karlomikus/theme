<?php
namespace Karlomikus\Theme\Exceptions;

class ThemeInfoAttributeException extends \Exception
{
    public function __construct($attr, $theme = null)
    {
        parent::__construct("Attribute '$attr' is required, but it's missing from theme.json file");
    }
}
