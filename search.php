<?php
session_start();
$value = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/logo.png" />
  <link rel="stylesheet" href="./styles/reset.css" />
  <link rel="stylesheet" href="./styles/base.css" />
  <link rel="stylesheet" href="./styles/header.css" />
  <link rel="stylesheet" href="./styles/movie.css" />
  <link rel="stylesheet" href="./styles/search.css" />
  <link rel="stylesheet" href="./styles/footer.css" />
  <title>Tìm Kiếm | TV360</title>
</head>

<body>
  <div class="main-app">
    <?php include "./layout/header.php"; ?>
    <div class="app-search container">
      <form action="search.php" class="app-search-content">
        <input type="text" class="search-input" placeholder="Tìm kiếm những bộ phim mà bạn yêu thích" name="keyword" autocomplete="off" value="<?= htmlspecialchars_decode($value) ?>" required />
        <button class="base-btn btn-search" type="submit" title="Tìm phim ngay">Tìm kiếm</button>
      </form>
      <div class="search-content">
        <div class="movie-list">
        </div>
      </div>
    </div>
    <?php include "./layout/footer.php"; ?>
  </div>
  </div>

  <script async src="./javascript/search.js" type="module"></script>
</body>

</html>