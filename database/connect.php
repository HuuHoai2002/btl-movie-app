<?php

$db = array(
  'host' => 'localhost',
  'user' => 'root',
  'pass' => '',
  'db' => 'movie_db'
);

$connect = new mysqli($db['host'], $db['user'], $db['pass'], $db['db']);

if ($connect->connect_errno) {
  echo 'Failed to connect to MySQL: ' . $connect->connect_error;
}
