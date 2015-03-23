<?php

namespace Splatoon\Resolver;

class RelativeResolver implements Resolver {
  
  protected $base;
  
  public function __construct($base) {
    $this->base = $base;
  }
  
  public function resolve($path) {
    return $this->base . '/' . $path;
  }
}