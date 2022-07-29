<?php
session_start();
include('./database/connect.php');

if (isset($_POST['movie_type']) && isset($_POST['movie_id']) && isset($_POST['content'])) {
  if (!empty($_POST['movie_type']) && !empty($_POST['movie_id']) && !empty($_POST['content'])) {
    $movie_type = $_POST['movie_type'];
    $movie_id = $_POST['movie_id'];
    $movie_episode = $_POST['movie_episode'] ?? 1;
    $content = $_POST['content'];
    $user_id = $_SESSION['user']['user_id'];
    $username = $_SESSION['user']['username'];
    $user_avatar = $_SESSION['user']['user_avatar'];

    // insert comment into database
    $sql = "INSERT INTO comments (created_at, updated_at, user_id, user_name, user_avatar, content, movie_id,movie_type) VALUES (NOW(), NOW(), '$user_id', '$username', '$user_avatar', '$content', '$movie_id','$movie_type')";

    $result = $connect->query($sql);

    if ($result) {
      if ($movie_type == 'movie') {
        header('Location: watch.php?type=' . $movie_type . '&id=' . $movie_id);
      } else {
        header('Location: watch.php?type=' . $movie_type . '&id=' . $movie_id . '&episode=' . $movie_episode);
      }
    } else {
      echo 'Error: ' . $connect->error;
    }
  } else {
    echo 'Vui lòng nhập đủ thông tin';
  }
}
