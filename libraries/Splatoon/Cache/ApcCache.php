<?php

namespace Splatoon\Cache;

class ApcCache implements Cache {
  
  protected $prefix;
  
  public function __construct() {
    $this->prefix = '';
  }
  
  public function fetch($key) {
    return apc_fetch($this->prefix . $key);
  }
  
  public function store($key, $value, $ttl = 0) {
    return apc_store($this->prefix . $key, $value, $ttl);
  }
  
  public function delete($key) {
    return apc_delete($key);
  }
}