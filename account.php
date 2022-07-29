<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: signin.php');
}
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
  <link rel="stylesheet" href="./styles/account.css">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/footer.css">
  <title>Tài khoản</title>
</head>

<body>
  <div class="main-app">
    <?php include_once('./layout/header.php') ?>
    <div class="app-account container" style="margin-top: 30px">
      <div class="app-account-content">
        <div class="title">
          <h2>Thông tin tài khoản</h2>
          <span class="update-account-btn">Chỉnh sửa</span>
        </div>
        <form class="account-form" autocomplete="off">
          <div class="form-group">
            <label for="username" class="account-label">Họ và tên</label>
            <input disabled name="username" id="username" type="text" placeholder="Nhập vào họ và tên" class="account-input" value="<?= $_SESSION['user']['username']  ?>">
          </div>
          <div class="form-group">
            <label for="email" class="account-label">Email</label>
            <input disabled name="email" id="email" type="email" autocomplete="off" placeholder="Nhập vào email" class="account-input" value="<?= $_SESSION['user']['email'] ?>">
          </div>
          <div class="form-group">
            <a href="" class="base-btn bg-primary update_btn">Cập Nhật</a>
          </div>
        </form>
      </div>
      <div class="app-account-content">
        <div class="title">
          <h2>Mật khẩu</h2>
          <span class="update-account-btn-p">Chỉnh sửa</span>
        </div>
        <form class="account-form" autocomplete="off">
          <div class="form-group">
            <label style="min-width: 200px" for="current-password" class="account-label">Mật khẩu hiện tại</label>
            <input disabled name="current-password" id="current-password" type="text" placeholder="Nhập vào mật khẩu hiện tại" class="account-input account-input-p">
          </div>
          <div class="form-group">
            <label style="min-width: 200px" for="new-password" class="account-label">Mật khẩu mới</label>
            <input disabled name="new-password" id="new-password" type="email" autocomplete="off" placeholder="Nhập vào mật khẩu mới" class="account-input account-input-p">
          </div>
          <div class="form-group">
            <label style="min-width: 200px" for="password-retype" class="account-label">Nhập lại mật khẩu mới</label>
            <input disabled name="password-retype" id="password-retype" type="password-retype" placeholder="Nhập lại mật khẩu mới" class="account-input account-input-p">
          </div>
          <div class="form-group">
            <a href="" class="base-btn bg-primary update_btn update_btn-p">Cập Nhật</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script>

  </script>
  <script async src="./javascript/account.js" type="module"></script>
</body>

</html>