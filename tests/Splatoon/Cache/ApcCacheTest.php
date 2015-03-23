<?php

class ApcCacheTest extends PHPUnit_Framework_TestCase {
  
  protected $cache;
  
  public function setUp() {
    apc_delete('foo');
    $this->cache = new Splatoon\Cache\ApcCache();
  }
  
  public function testStoresValue() {
    $this->cache->store('foo', 'bar');
    $this->assertEquals('bar', apc_fetch('foo'));
  }
  
  public function testFetchesValue() {
    apc_store('foo', 'bar');
    $this->assertEquals('bar', $this->cache->fetch('foo'));
  }
  
  public function testDeletesValue() {
    apc_store('foo', 'bar');
    $this->cache->delete('foo');
    $this->assertFalse(apc_exists('foo'));
  }
  
}