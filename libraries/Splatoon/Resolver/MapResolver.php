<?php

namespace Splatoon\Resolver;

class MapResolver implements Resolver {
  
  protected $map;
  
  public function __construct() {
    $this->map = array();
  }
  
  public function resolve($path) {
    return isset($this->map[$path]) ? $this->map[$path] : null;
  }
  
  public function map($path, $target) {
    $this->map[$path] = $target;
  }
}