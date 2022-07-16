<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/logo.png" />
  <link rel="stylesheet" href="./vendor/slick.css">
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/banner.css">
  <link rel="stylesheet" href="./styles/movie.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Trang chủ</title>

  <script src="./vendor/jquery.js"></script>
  <script src="./vendor/slick.js"></script>
</head>

<body>
  <div class="main-app">
    <?php include_once('./layout/header.php') ?>
    <div class="app-banner container-full">
    </div>
    <div class="app-content-movie container">
      <div class="app-content-wrapper">
        <h2 class="app-content-heading">Phim Chiếu Rạp Phổ Biến</h2>
        <div class="movie-list popular"></div>
      </div>
      <div class="app-content-wrapper">
        <h2 class="app-content-heading">Phim Chiếu Rạp Có Điểm Đánh Giá Cao Nhất</h2>
        <div class="movie-list top-rated"></div>
      </div>
      <div class="app-content-wrapper">
        <h2 class="app-content-heading">Phim Chiếu Rạp Sắp Ra Mắt</h2>
        <div class="movie-list up-coming"></div>
      </div>
    </div>
    <?php include_once('./layout/footer.php') ?>
  </div>

  <script async src="./javascript/banner.js" type="module"></script>
  <script async src="./javascript/home.js" type="module"></script>
</body>

</html>