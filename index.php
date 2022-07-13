<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/slick.css">
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/banner.css">
  <link rel="stylesheet" href="./styles/movie.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Movie App</title>
  <script src="./vendor/jquery.js"></script>
  <script src="./vendor/slick.js"></script>
</head>

<body>
  <div class="main-app">
    <?php include_once('./layout/header.php') ?>
    <div class="app-banner container-full"></div>
    <div class="app-content-movie container">
      <div class="app-content-wrapper">
        <h2 class="app-content-heading">Phim Chiếu Rạp Phổ Biến</h2>
        <div class="movie-list"></div>
      </div>
    </div>
    <?php include_once('./layout/footer.php') ?>
  </div>

  <script src="./javascript/banner.js" type="module"></script>
  <script type="module">
    import {
      base_url,
      api_key,
      image_url
    } from "./config/config.js";
    import {
      fetchData
    } from "./utils/fetchData.js";

    const movieList = document.querySelector('.movie-list');
    const url = `${base_url}/movie/popular?api_key=${api_key}&language=vi&page=1`;

    const renderListMovie = async () => {
      const data = await fetchData(url);
      const contents = data
        ?.map((content) => {
          return `
          <a href="" class="movie-item">
              <div class="movie-image">
                <img src=${image_url + content.poster_path} alt="" />
              </div>
              <div class="movie-content">
                <p class="movie-content-info">${
                  content.name || content.title
                }</p>
              </div>
            </a>
        `;
        })
        .join("");
      movieList.innerHTML = contents;
    };
    async function Main() {
      await renderListMovie();
    }
    Main();
  </script>
</body>

</html>