<?php
session_start();
include("./database/connect.php");

if (isset($_POST['comment_id'])) {
  $comment_id = $_POST['comment_id'];
  $sql = "DELETE FROM comments WHERE comment_id = $comment_id";
  $result = $connect->query($sql);
  if ($result) {
    header("Location: admin.php");
  } else {
    echo "Xóa thất bại";
  }
}
