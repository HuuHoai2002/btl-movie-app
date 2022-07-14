<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="./styles/reset.css" />
  <link rel="stylesheet" href="./styles/base.css" />
  <link rel="stylesheet" href="./styles/header.css" />
  <link rel="stylesheet" href="./styles/search.css" />
  <link rel="stylesheet" href="./styles/footer.css" />
  <title>Tìm kiếm</title>
</head>

<body>
  <div class="main-app">
    <?php include "./layout/header.php"; ?>
    <div class="app-search container">
      <form action="search.php" class="app-search-content">
        <input type="text" class="search-input" placeholder="Tìm kiếm những bộ phim mà bạn yêu thích" name="q" />
        <button class="base-btn btn-search" type="submit" title="Tìm phim ngay">Search</button>
      </form>
      <div class="search-content">
        <div class="movie-list">
          <?php
          $q = $_GET['q'];
          echo $q;
          ?>
        </div>
      </div>
    </div>
    <?php include "./layout/footer.php"; ?>
  </div>
  </div>
</body>

</html>