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
    <div class="app-play-movie container min-h-100vh">
      <div class="play-movie-content">
        <div class="play-movie-title">
          <span class="movie-title"></span>
        </div>
        <div class="play-movie-frame">
          <?php
          $id = $_GET['id'];
          echo '<iframe width="100%" height="100%" src="https://www.2embed.to/embed/tmdb/movie?id=' . $id . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
          ?>
        </div>
      </div>
    </div>
    <?php include_once('./layout/footer.php') ?>
  </div>

  <script>
    const params = new URLSearchParams(window.location.search);
    const keyword = params.get("q");
    console.log(keyword);
  </script>
</body>

</html>