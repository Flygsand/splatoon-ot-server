<?php

namespace Splatoon\Cache;

interface Cache {
  function fetch($key);
  function store($key, $value, $ttl = 0);
  function delete($key);
}