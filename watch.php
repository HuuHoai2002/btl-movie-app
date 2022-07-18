<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/logo.png" />
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <link rel="stylesheet" href="./styles/banner.css">
  <link rel="stylesheet" href="./styles/movie.css">
  <link rel="stylesheet" href="./styles/watch.css">
  <title>Watch</title>
</head>

<body>
  <div class="main-app">
    <?php include_once('./layout/header.php') ?>
    <div class="app-play-movie container">
      <div class="play-movie-content">
        <div class="play-movie-frame"></div>
        <div class="play-sidebar">

        </div>
      </div>
    </div>
    <div class="app-content-movie container">
      <div class="app-content-wrapper">
        <h2 class="app-content-heading">Có Thể Bạn Sẽ Thích</h2>
        <div class="movie-list"></div>
      </div>
    </div>
    <?php include_once('./layout/footer.php') ?>
  </div>

  <script async src="./javascript/watch.js" type="module">
  </script>
</body>

</html>