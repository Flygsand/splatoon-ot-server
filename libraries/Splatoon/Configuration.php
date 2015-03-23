<?php

namespace Splatoon;

class Configuration {
  
  protected $baseDir;
  protected $assetMap;
  protected $settings;
  
  public function __construct($baseDir) {
    $this->baseDir = $baseDir;
    $this->assetMap = array();
    $this->settings = array();
  }
  
  public function getAssetMap() {
    return $this->assetMap;
  }
  
  public function getSettings() {
    return $this->settings;
  }
  
  public function loadAssetMap() {
    $this->assetMap = json_decode(file_get_contents($this->baseDir . '/assetMap.json'));
  }
  
  public function loadSettings() {
    $this->settings = json_decode(file_get_contents($this->baseDir . '/settings.json'));
  }
}