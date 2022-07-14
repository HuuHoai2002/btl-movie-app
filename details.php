<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" sizes="32x32"
    href="http://img-zlr1.tv360.vn/tv360-static/static/web/favicon/favicon-32x32.png" />
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Document</title>
</head>

<body>
  <div class="main-app">
    <div class="app-movie-details">
      <?php include_once('./layout/header.php') ?>
      <?php
      $id = $_GET['id'];
      echo $id
      ?>
      <?php include_once('./layout/footer.php') ?>
    </div>
  </div>
</body>

</html>