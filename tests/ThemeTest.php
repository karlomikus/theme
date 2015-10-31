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
        $this->theme->set('test-theme');

        $this->assertEquals('test-theme', $this->theme->get()->getNamespace());
    }

    public function testGetAllThemes()
    {
        $this->assertArrayHasKey('test-theme', $this->theme->all());
        $this->assertArrayHasKey('parent-theme', $this->theme->all());
    }

    public function testSetTheme()
    {
        $this->setExpectedException('Karlomikus\Theme\Exceptions\ThemeNotFoundException');
        $this->theme->set('throw-exception');
    }

    public function testThemeExists()
    {
        $this->assertNotTrue($this->theme->has('test-false'));
        $this->assertTrue($this->theme->has('test-theme'));
    }

}
