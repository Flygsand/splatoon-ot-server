<?php

class AssetManagerTest extends PHPUnit_Framework_TestCase {
  
  protected $resolver;
  
  protected function setUp() {
    $this->resolver = $this->getMockBuilder('Splatoon\Resolver\Resolver')->getMock();
    $this->resolver->method('resolve')->will($this->returnArgument(0));
  }
  
  public function testGenericMobileDevice() {
    $detector = $this->getMockBuilder('\Mobile_Detect')->getMock();
    $detector->method('isMobile')->will($this->returnValue(true));
    $detector->method('match')->will($this->returnValue(false));
    
    $assetManager = new Splatoon\AssetManager($detector, $this->resolver);
    $this->assertEquals('mobile/default/foo.png', $assetManager->get('foo.png'));
  }
  
  public function testXhdpiMobileDevice() {
    $detector = $this->getMockBuilder('\Mobile_Detect')->getMock();
    $detector->method('isMobile')->will($this->returnValue(true));
    $detector->method('match')->will($this->returnValueMap(array(array('Galaxy.*Nexus', null, true))));
    
    $assetManager = new Splatoon\AssetManager($detector, $this->resolver);
    $this->assertEquals('mobile/xhdpi/foo.png', $assetManager->get('foo.png'));
  }
  
  public function testNonMobileDevice() {
    $detector = $this->getMockBuilder('\Mobile_Detect')->getMock();
    $detector->method('isMobile')->will($this->returnValue(false));
    
    $assetManager = new Splatoon\AssetManager($detector, $this->resolver);
    $this->assertEquals('desktop/default/foo.png', $assetManager->get('foo.png'));
  }
  
}