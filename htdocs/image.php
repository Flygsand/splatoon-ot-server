<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

if (!isset($_GET['name'])) {
  return http_response_code(404);
}

$serverFactory = new \Splatoon\ServerFactory('..');
$server = $serverFactory->createServer();
$url = $server->getAssetManager()->get($_GET['name']);

if (!$url) {
  return http_response_code(404);
} else {
  header('Location: ' . $url, true, $server->getEnvironment() == 'production' ? 301 : 302);
}