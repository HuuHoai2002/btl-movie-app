<?php
session_start();
session_destroy();

// check user is logged in

if (isset($_SESSION['user'])) {
  header('Location: index.php');
} else {
  header('Location: signin.php');
}
