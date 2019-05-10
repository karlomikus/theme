<?php

class ThemeViewFinderTest extends TestCase {

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testPathPrepend()
    {
        $finder = $this->getFinder();
        $finder->prependPath('test/path/2');
        $finder->prependPath('test/path/first');

        $this->assertEquals('test/path/first', $finder->getPaths()[0]);
    }

    public function testSetPaths()
    {
        $finder = $this->getFinder();
        $finder->setPaths(['test', 'test2']);

        $this->assertTrue(in_array('test', $finder->getPaths()));
        $this->assertTrue(in_array('test2', $finder->getPaths()));
    }

    private function getFinder()
    {
        $files = Mockery::mock('Illuminate\Filesystem\Filesystem');
        $finder  = new Karlomikus\Theme\ThemeViewFinder($files, ['test/path']);

        return $finder;
    }

}
