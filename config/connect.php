<?php

$db = array(
  'host' => 'localhost',
  'user' => 'root',
  'pass' => '',
  'db' => 'movie_db'
);

$connect = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['db']);

if (!$connect) {
  die('Kết nối thất bại: ' . mysqli_connect_error());
} else {
  mysqli_set_charset($connect, 'utf8');
  echo 'Kết nối thành công';
}

$sql = 'SELECT * FROM users WHERE id = 1';
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  print_r($row);
} else {
  echo 'Không có dữ liệu';
}
