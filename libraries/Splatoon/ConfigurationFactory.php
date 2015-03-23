<?php

namespace Splatoon;

class ConfigurationFactory {
  
  protected $baseDir;
  protected $cache;
  
  public function __construct($baseDir, $cache = null) {
    $this->baseDir = $baseDir;
    $this->cache = $cache;
  }
  
  public function createConfiguration(callable $initializer = null) {
    $configuration = false;
    $cacheKey = 'Splatoon\Configuration:' . realpath($this->baseDir);
    
    if ($this->cache) {
      $configuration = $this->cache->fetch($cacheKey);
    }
    
    if (!$configuration) {
      $configuration = new Configuration($this->baseDir);
      
      if ($initializer) {
        $initializer($configuration);
      }
      
      if ($this->cache) {
        $this->cache->store($cacheKey, $configuration);
      }
    }
    
    return $configuration;
  }
  
}