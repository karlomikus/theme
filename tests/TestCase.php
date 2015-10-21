<?php

class TestCase extends Orchestra\Testbench\TestCase {

    protected function getPackageProviders($app)
    {
        return ['Karlomikus\Theme\ThemeServiceProvider'];
    }

}
