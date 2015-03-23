<?php

namespace Splatoon;

class AssetManager {
  private $detector;
  private $resolver;
  
  public function __construct($detector, $resolver) {
    $this->detector = $detector;
    $this->resolver = $resolver;
  }
  
  public function get($name) {
    $pathspec = array();
    
    if ($this->detector->isMobile()) {
      array_push($pathspec, 'mobile');
      
      if ($this->detector->match('Galaxy.*Nexus')) {
        array_push($pathspec, 'xhdpi');
      } else {
        array_push($pathspec, 'default');
      }
    } else {
      array_push($pathspec, 'desktop', 'default');
    }
    
    array_push($pathspec, $name);
    
    return $this->resolver->resolve(join('/', $pathspec));
  }
}