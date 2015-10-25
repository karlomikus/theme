# Laravel Theme

[![Build Status](https://travis-ci.org/karlomikus/theme.svg?branch=master)](https://travis-ci.org/karlomikus/theme)
[![Latest Stable Version](https://poser.pugx.org/karlomikus/theme/v/stable)](https://packagist.org/packages/karlomikus/theme)
[![License](https://poser.pugx.org/karlomikus/theme/license)](https://packagist.org/packages/karlomikus/theme)

Add theming support to your Laravel 5.* projects.

### Features

- Custom theme locations
- Support for theme inheritence with theme fallback
- Theme assets loading
- Artisan console commands

## Install

Require it via terminal like so:
``` bash
$ composer require karlomikus/theme
```

Or add the package to your composer file:

``` json
"karlomikus/theme": "1.*"
```

Next add new service provider and facade to your `config/app.php` file:

``` php
// Service provider
Karlomikus\Theme\ThemeServiceProvider::class
// Facade
'Theme' => Karlomikus\Theme\Facade\Theme::class
```

Next you need to publish the config file:

``` bash
$ php artisan vendor:publish
```

This will create a theme.php file in your config directory in which you can define your default path to themes directory.

## Theme setup

Create new folder in your themes directory (default: public/themes) and add views folder (which will hold all your custom views)
and theme.json file (contains information about a theme).

``` json
{
    "name": "Theme name",
    "author": "Karlo Mikuš",
    "description": "Default theme description",
    "version": "1.0",
    "namespace": "theme-folder",
    "parent": null
}
```

This are all available attributes, but the required ones only include: `name`, `author` and `namespace`.
Value of `namespace` must be the name of the theme's folder.

If you want your theme to depend on other theme views, just include a parent theme namespace in `parent` attribute.

## Usage

The library will firstly check all available valid themes in theme directory.

You can then set a theme by it's namespace:

``` php
Theme::set('theme-namespace');
```

Then you call views like you usually do in laravel:

``` php
view('home');
```

This will firstly check if there is a home.blade.php in current theme directory.
If none is found then it checks parent theme, and finally falls back to default laravel views location.

## Available methods

Activate/set theme
``` php
Theme::set('theme-namespace');
```

Get all available themes as an array:
``` php
Theme::getThemes();
```

Get currently active theme:
``` php
Theme::get();
```

Override default theme path:
``` php
Theme::setDefaultThemePath('new/path/to/themes');
```

Check if theme exists:
``` php
Theme::themeExists('theme-namespace');
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## TODO

- Artisan commands for theme management
