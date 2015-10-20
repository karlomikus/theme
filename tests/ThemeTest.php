<?php

class ThemeTest extends TestCase {

    public function testGetActiveTheme()
    {
        $theme = $this->getTheme();
        $theme->setTheme('test-theme');

        $this->assertEquals('test-theme', $theme->get()->getNamespace());
    }

    public function testGetAllThemes()
    {
        $theme = $this->getTheme();

        $this->assertArrayHasKey('test-theme', $theme->getThemes());
        $this->assertArrayHasKey('parent-theme', $theme->getThemes());
    }

    public function testSetTheme()
    {
        $theme = $this->getTheme();
        $this->setExpectedException('\App\Libraries\Theme\Exceptions\ThemeNotFoundException');
        $theme->setTheme('throw-exception');
    }

    public function testThemeExists()
    {
        $theme = $this->getTheme();

        $this->assertNotTrue($theme->themeExists('test-false'));
        $this->assertTrue($theme->themeExists('test-theme'));
    }

    private function getTheme()
    {
        $theme = new \App\Libraries\Theme\Theme($this->createApplication());
        $theme->setDefaultThemePath(realpath(base_path('tests/stubs')));

        return $theme;
    }

}
