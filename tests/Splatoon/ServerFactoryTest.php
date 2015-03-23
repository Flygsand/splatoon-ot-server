<?php

class ServerFactoryTest extends PHPUnit_Framework_TestCase {
  
  protected $serverFactory;
  
  public function setUp() {
    $this->serverFactory = new \Splatoon\ServerFactory('.');
  }
  
  public function testCreatesProductionServer() {
    putenv('PHP_ENV=production');
    $server = $this->serverFactory->createServer();
    $this->assertEquals('production', $server->getEnvironment());
  }
  
  public function testCreatesDevelopmentServer() {
    putenv('PHP_ENV=development');
    $server = $this->serverFactory->createServer();
    $this->assertEquals('development', $server->getEnvironment());
  }
  
  public function testCreatesDevelopmentServerByDefault() {
    putenv('PHP_ENV=foobar');
    $server = $this->serverFactory->createServer();
    $this->assertEquals('development', $server->getEnvironment());
  }
}