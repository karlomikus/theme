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
        $this->setExpectedException('Karlomikus\Theme\Exceptions\ThemeNotFoundException');
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
        $theme = new Karlomikus\Theme\Theme($this->app);
        $theme->setDefaultThemePath(__DIR__ . '/stubs');
        dd($theme->getThemes());

        return $theme;
    }

}
