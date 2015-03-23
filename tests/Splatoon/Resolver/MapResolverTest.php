<?php

class MapResolverTest extends PHPUnit_Framework_TestCase {
  
  protected $resolver;
  
  protected function setUp() {
    $this->resolver = new Splatoon\Resolver\MapResolver();
  }
  
  public function testRetrievesExistingMapping() {
    $this->resolver->map('foo/bar/baz.png', 'http://example.com/foo/bar.png');
    $this->assertEquals('http://example.com/foo/bar.png', $this->resolver->resolve('foo/bar/baz.png'));
  }
  
  public function testReturnsNullWhenNoMapping() {
    $this->assertNull($this->resolver->resolve('foo/bar/bar.png'));
  }
}