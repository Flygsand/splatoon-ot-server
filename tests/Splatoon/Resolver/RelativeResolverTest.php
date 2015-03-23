<?php

class RelativeResolverTest extends PHPUnit_Framework_TestCase {
  
  public function testResolvesWithBase() {
    $resolver = new Splatoon\Resolver\RelativeResolver('./base');
    $this->assertEquals('./base/foo/bar.png', $resolver->resolve('foo/bar.png'));
  }
  
}