<?php
$fullname = "Hoài";
$email = "deobiet@00000.com";
$tel = "06156168498";
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
            <label for="fullname" class="account-label">Họ và tên</label>
            <input disabled name="fullname" id="fullname" type="text" placeholder="Nhập vào họ và tên" class="account-input" value="<?= $fullname ?>">
          </div>
          <div class="form-group">
            <label for="email" class="account-label">Email</label>
            <input disabled name="email" id="email" type="email" autocomplete="off" placeholder="Nhập vào email" class="account-input" value="<?= $email ?>">
          </div>
          <div class="form-group">
            <label for="tel" class="account-label">Số điện thoại</label>
            <input disabled name="tel" id="tel" type="tel" placeholder="Nhập vào số điện thoại" class="account-input" value="<?= $tel ?>">
          </div>
          <div class="form-group">
            <a href="" class="base-btn bg-primary update_btn">Cập Nhật</a>
          </div>
        </form>
      </div>
      <div class="app-account-content">
        <div class="title">
          <h2>Mật khẩu</h2>
          <span>Chỉnh sửa</span>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    const account_input = $$('.account-input');
    const btn = $('.update-account-btn');
    const update_btn = $('.update_btn');

    let is_update = false;

    btn.addEventListener('click', () => {
      if (!is_update) {
        account_input.forEach(input => {
          input.disabled = false;
        })
        update_btn.style.display = 'block';
        btn.innerText = 'Huỷ';
        is_update = true;
      } else {
        account_input.forEach(input => {
          input.disabled = true;
        })
        update_btn.style.display = 'none';
        btn.innerText = 'Chỉnh sửa';
        is_update = false;
      }
    })
  </script>
</body>

</html>