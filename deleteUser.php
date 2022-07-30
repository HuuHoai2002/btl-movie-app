<?php
session_start();
include("./database/connect.php");

if (isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
  $sql = "DELETE FROM users WHERE user_id = $user_id";
  $result = $connect->query($sql);

  if ($result) {
    header("Location: admin.php");
  } else {
    echo "Xóa thất bại";
  }
}
