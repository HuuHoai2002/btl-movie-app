<?php
session_start();
include('./database/connect.php');

if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
} else {
  if ($_SESSION['user']['roles'] != '1' || $_SESSION['user']['roles'] == '0') {
    header("Location: index.php");
  }
}

$usersSql = "SELECT * FROM users ORDER BY created_at DESC";
$usersResult = $connect->query($usersSql);
$users = $usersResult->fetch_all(MYSQLI_ASSOC);

$commentsSql = "SELECT * FROM comments ORDER BY created_at DESC";
$commentsResult = $connect->query($commentsSql);
$comments = $commentsResult->fetch_all(MYSQLI_ASSOC);
?>

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
  <link rel="stylesheet" href="./styles/admin.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Quản trị</title>
</head>

<body>
  <div class="main-app">
    <?php include_once('./layout/header.php') ?>
    <div class="app-admin container">
      <div class="admin-dashboard min-h-100vh">
        <div class="dashboard">
          <div class="dashboard-item active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
            </svg>
            Quản lý người dùng
          </div>
          <div class="dashboard-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
              <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
            </svg>
            Quản lý bình luận
          </div>
        </div>
        <div class="dashboard-content">
          <div class="dashboard-content-wrapper">
            <table class="table active">
              <thead>
                <tr>
                  <th>Ngày tạo</th>
                  <th>Id</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Quyền</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) { ?>
                  <tr>
                    <td><?= $user['created_at'] ?></td>
                    <td><?= $user['user_id'] ?></td>
                    <td class="name"><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['roles'] == '1' ? 'Admin' : 'User' ?></td>
                    <td>
                      <form method="post" action="deleteUser.php" onsubmit="return confirm('Xoá người dùng này? Sau khi xoá thì họ không thể xem phim được nữa.');">
                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                        <button type="submit" class="btn-delete">Xoá</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <table class="table">
              <thead>
                <tr>
                  <th>Ngày tạo</th>
                  <th>Id</th>
                  <th>Id tác giả</th>
                  <th>Tác giả</th>
                  <th>Nội dung</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($comments as $comment) { ?>
                  <tr>
                    <td><?= $comment['created_at'] ?></td>
                    <td><?= $comment['comment_id'] ?></td>
                    <td><?= $comment['user_id'] ?></td>
                    <td class="name"><?= $user['username'] ?></td>
                    <td class="overflow" title="<?= $comment['content'] ?>"><?= $comment['content'] ?></td>
                    <td>
                      <form method="post" action="deleteComment.php" onsubmit="return confirm('Bạn chắc chắn muốn xoá comment này chứ?.');">
                        <input type="hidden" name="comment_id" value="<?= $comment['comment_id'] ?>">
                        <button type="submit" class="btn-delete">Xoá</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php include_once('./layout/footer.php') ?>
  </div>
  <script src="./javascript/admin.js" type="module">
  </script>

</html>