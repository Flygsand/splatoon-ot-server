<?php

namespace Splatoon;

class Server {
  protected $environment;
  protected $assetManager;
  protected $configuration;
  
  public function __construct($environment, $assetManager, $configuration) {
    $this->environment = $environment;
    $this->assetManager = $assetManager;
    $this->configuration = $configuration;
  }
  
  public function getEnvironment() {
    return $this->environment;
  }
  
  public function getAssetManager() {
    return $this->assetManager;
  }
  
  public function getConfiguration() {
    return $this->configuration;
  }
}