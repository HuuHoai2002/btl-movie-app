<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/logo.png" />
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/movie.css">
  <link rel="stylesheet" href="./styles/search.css">
  <link rel="stylesheet" href="./styles/footer.css">

  <title>Phim Chiếu Rạp | TV360</title>
</head>

<body>
  <div class="main-app">
    <?php include_once('./layout/header.php') ?>
    <div class="app-search container">
      <form action="search.php" class="app-search-content">
        <input type="text" class="search-input" placeholder="Bạn tìm phim nào hôm nay?" name="query" autocomplete="off" required />
        <button class="base-btn btn-search" type="submit" title="Tìm phim ngay">Tìm kiếm</button>
      </form>
    </div>
    <div class="app-content-movie container">
      <div class="app-content-wrapper">
        <h2 class="app-content-heading">Phim Chiếu Rạp</h2>
        <div class="movie-list"></div>
      </div>
      <div class="next-page">
        <?php
        $page = $_GET['page'];

        echo '<a class="base-btn bg-primary" href="movie.php?page=' . ($page + 1) . '">Xem thêm</a>';
        ?>
      </div>
    </div>
    <?php include_once('./layout/footer.php') ?>
  </div>
  <script async src="./javascript/movie.js" type="module"></script>
</body>

</html>