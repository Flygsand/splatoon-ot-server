<?php

namespace Splatoon;

class ServerFactory {
  
  protected $root;
  
  public function __construct($root) {
    $this->root = $root;
  }

  public function createServer() {
    if (getenv('PHP_ENV') == 'production') {
      return $this->createProductionServer();
    } else {
      return $this->createDevelopmentServer();
    }
  }
  
  protected function createProductionServer() {
    $resolver = new Resolver\MapResolver();
    $configurationFactory = new ConfigurationFactory($this->root . '/config/production', new Cache\ApcCache());
    $configuration = $configurationFactory->createConfiguration(function($c) {
      $c->loadAssetMap();
    });
    
    foreach ($configuration->getAssetMap() as $path => $target) {
      $resolver->map($path, $target);
    }
    
    return new Server('production', new AssetManager(new \Mobile_Detect, $resolver), $configuration);
  }
  
  protected function createDevelopmentServer() {
    $configurationFactory = new ConfigurationFactory($this->root . '/config/development');
    $configuration = $configurationFactory->createConfiguration(function($c) {
      $c->loadSettings();
    });
    
    $settings = $configuration->getSettings();
    
    return new Server('development', new AssetManager(new \Mobile_Detect, new Resolver\RelativeResolver($settings->resolver->base)), $configuration);
  }
  
}