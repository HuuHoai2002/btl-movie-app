<?php
session_start();
include('./database/connect.php');
if (!$_SESSION['user']) {
  header('Location: signin.php');
}

if (isset($_GET['type']) && isset($_GET['id'])) {
  if (!empty($_GET['type']) && isset($_GET['id'])) {
    $movie_type = $_GET['type'];
    $movie_id = $_GET['id'];
    $movie_episode = $_GET['episode'] ?? 1;

    // get comments count for this movie
    $commentsCountSql = "SELECT COUNT(*) FROM comments WHERE movie_id = '$movie_id' AND movie_type = '$movie_type'";
    $commentsCountResult = $connect->query($commentsCountSql);
    $commentsCount = $commentsCountResult->fetch_assoc();
    $commentsCount = $commentsCount['COUNT(*)'];

    // get all comments for this movie

    $commentsSql = "SELECT * FROM comments WHERE movie_id = '$movie_id' AND movie_type = '$movie_type'";
    $commentsResult = $connect->query($commentsSql);
    $comments = $commentsResult->fetch_all(MYSQLI_ASSOC);
  }
}

$connect->close();

?>

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
  <link rel="stylesheet" href="./styles/comments.css">
  <link rel="stylesheet" href="./styles/movie.css">
  <link rel="stylesheet" href="./styles/watch.css">
  <title>Xem Phim | TV360</title>
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
    <div class="app-comments container">
      <h3 class="app-comments-title">Bình luận</h3>
      <form method="post" action="postcomments.php" class="app-comment-content">
        <input type="text" name="movie_type" style="display: none" value="<?= $movie_type ?>">
        <input type="text" name="movie_id" style="display: none" value="<?= $movie_id ?>">
        <input type="text" name="movie_episode" style="display: none" value="<?= $movie_episode ?>">
        <div class="comments-quantity">
          <span><?= $commentsCount ?> bình luận</span>
          <span>Cập nhật gần nhất , hôm nay
            <span class="current-date"><?php echo date('d-m-Y'); ?></span>
          </span>
        </div>
        <div class="users-post-comments">
          <div class="users">
            <img src="<?= $_SESSION['user']['user_avatar'] ?>" alt="" class="user-avatar">
          </div>
          <div class="input-comments">
            <textarea name="content" placeholder="Viết bình luận ..."></textarea>
            <button type="submit" class="btn-send-comment">
              <svg viewBox="0 0 16 16" style="transform: rotate(45deg)" width="24px" height="24px" focusable="false" role="img" aria-label="cursor fill" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <g>
                  <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"></path>
                </g>
              </svg></button>
          </div>
        </div>
        <div class="list-comments">
          <?php
          if ($commentsCount > 0) {
            foreach ($comments as $comment) {
              echo '<div class="comment">
                  <div class="comment-content">
                    <div class="comment-author">
                      <img src="' . $comment['user_avatar'] . '" alt="" class="user-avatar">
                    </div>
                    <div class="comment-text">
                      <div class="comment-author">
                        <span class="author-name">' . $comment['user_name'] . '</span>
                        <span class="comment-date">
                          ' . $comment['created_at'] . '
                        </span>
                      </div>
                      <p>
                        ' . $comment['content'] . '
                      </p>
                    </div>
                  </div>
              </div>';
            }
          } else {
            echo '<div class="not-yet-comment"><p>Chưa có bình luận nào</p></div>';
          }
          ?>
        </div>
      </form>
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