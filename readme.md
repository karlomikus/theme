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

Example folder structure:

```
- public/
    - themes/
        - theme-1/
            - views/
            - theme.json
```

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

You can also inject theme instance using ThemeInterface.

``` php
use Karlomikus\Theme\Contracts\ThemeInterface;

private $theme;

public function __construct(ThemeInterface $theme)
{
    $this->theme = $theme
}
```

### Theme path

You can set default path to themes folder in config/theme.php file. Please note that currently themes folder must be somewhere inside public folder.

## Available methods

Here's the list of methods you can access:

``` php
// Activate/set theme
Theme::set('theme-namespace');

// Get all available themes as an array
Theme::all();

// Get currently active
Theme::get();

// Get theme by namespace
Theme::get('specific-namespace');

// Override default theme path
Theme::setDefaultThemePath('new/path/to/themes');

// Check if theme exists
Theme::has('theme-namespace');

// Render theme path URL
theme_url('assets/style.css');
```

### Artisan commands

Get a table of all found themes:
``` bash
$ php artisan theme:list

+------------------+-------------+------------+
| Name             | Author      | Namespace  |
+------------------+-------------+------------+
| Bootstrap theme  | Karlo Mikus | bootstrap  |
| Default theme    | Test Author | default    |
| Foundation theme | Lorem Ipsum | foundation |
| Test theme       | Dolor Sitha | test       |
+------------------+-------------+------------+
```

Create a theme directory with config file:
``` bash
$ php artisan theme:make

 Template name:
 > Theme name

 Template author:
 > Firstn Lastn

Theme created succesfully!
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## TODO

- Contact me for ideas