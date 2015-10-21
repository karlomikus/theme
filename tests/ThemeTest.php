<?php

class ThemeTest extends TestCase {

    private $theme;

    public function setUp()
    {
        parent::setUp();

        $theme = new Karlomikus\Theme\Theme($this->app);
        $theme->setDefaultThemePath(__DIR__ . '/stubs');
        
        $this->theme = $theme;
    }

    public function testGetActiveTheme()
    {
        $this->theme->setTheme('test-theme');

        $this->assertEquals('test-theme', $this->theme->get()->getNamespace());
    }

    public function testGetAllThemes()
    {
        $this->assertArrayHasKey('test-theme', $this->theme->getThemes());
        $this->assertArrayHasKey('parent-theme', $this->theme->getThemes());
    }

    public function testSetTheme()
    {
        $this->setExpectedException('Karlomikus\Theme\Exceptions\ThemeNotFoundException');
        $this->theme->setTheme('throw-exception');
    }

    public function testThemeExists()
    {
        $this->assertNotTrue($this->theme->themeExists('test-false'));
        $this->assertTrue($this->theme->themeExists('test-theme'));
    }

}
