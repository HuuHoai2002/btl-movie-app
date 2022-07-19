<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/logo.png" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/banner.css">
  <link rel="stylesheet" href="./styles/movie.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Trang Chủ | TV360</title>
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

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script async src="./javascript/banner.js" type="module"></script>
  <script async src="./javascript/home.js" type="module"></script>
</body>

</html>