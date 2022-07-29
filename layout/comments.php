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
  echo 'Connect database successfully';
}


$query = "INSERT INTO comments (created_at, updated_at , user_id , user_name, user_avatar,  content, movie_id , movie_type ) VALUES (now(), now(), '123', 'Hoài', '/odhfsodfhsodfhsdf', 'Test comments', 'tv', '61654')";

$insert_comment = mysqli_query($connect, $query);

if (!$insert_comment) {
  die("QUERY FAILED" . mysqli_error($connect));
} else {
  echo "Comment added successfully";
}
