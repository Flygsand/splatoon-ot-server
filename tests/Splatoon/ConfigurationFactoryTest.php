<?php

class ConfigurationFactoryTest extends PHPUnit_Framework_TestCase {  
  
  protected $configuration;
  
  public function setUp() {
    $this->configuration = $this->getMockBuilder('Splatoon\Configuration')->disableOriginalConstructor()->getMock();
  }
  
  public function testUsesCachedConfiguration() {
    $cache = $this->getMockBuilder('Splatoon\Cache\Cache')->getMock();
    $cache->method('fetch')->will($this->returnValue($this->configuration));

    $configurationFactory = new Splatoon\ConfigurationFactory('./tests/support/config', $cache);
    $this->assertEquals($this->configuration, $configurationFactory->createConfiguration());
  }
  
  public function testCachesNewConfiguration() {
    $cache = $this->getMockBuilder('Splatoon\Cache\Cache')->getMock();
    $cache->method('fetch')->will($this->returnValue(false));
    $cache->expects($this->once())->method('store');
    
    $configurationFactory = new Splatoon\ConfigurationFactory('./tests/support/config', $cache);
    $configurationFactory->createConfiguration();
  }
  
}