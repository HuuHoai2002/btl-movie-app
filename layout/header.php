<?php
$is_login = isset($_SESSION['user']) ? $_SESSION['user'] : false;
?>

<div class="app-header">
  <div class="app-header-wrapper">
    <div class="app-header-left">
      <a href="index.php?ref=home" class="app-header-logo">
        <svg width="83px" height="32px" viewBox="0 0 65 24" fill="none">
          <g clip-path="url(#logo-red_svg__clip0)">
            <path d="M52.192.211A11.913 11.913 0 0 0 40.48 9.853a8.61 8.61 0 0 0-.536-.633 8.962 8.962 0 0 0-2.586-1.916 8.686 8.686 0 0 0-3.212-.87L37.23.083h-6.294l-5.307 11.05c-.124.248-.248.496-.337.744a8.469 8.469 0 0 0-.807-1.362 8.856 8.856 0 0 0-3.534-2.909L24.6.084H13.384l-2.167 5.642h4.36l-3.211 6.683h4.902c.412-.003.82.076 1.201.234.367.15.704.367.993.64.286.275.52.599.692.956.177.362.28.756.306 1.159a2.882 2.882 0 0 1-.306 1.141c-.175.352-.41.67-.692.944-.29.27-.626.487-.993.637a3.07 3.07 0 0 1-1.201.249c-1.441 0-2.636-.662-3.584-1.986l-.44-.568-.27.265-3.212 3.016a10.295 10.295 0 0 0 3.296 3.61A7.573 7.573 0 0 0 17.277 24a8.573 8.573 0 0 0 2.978-.521 9.233 9.233 0 0 0 2.569-1.427 8.498 8.498 0 0 0 1.943-2.167c.232-.369.436-.755.61-1.154.421.933.996 1.789 1.7 2.531a8.86 8.86 0 0 0 2.654 1.914A8.737 8.737 0 0 0 33.01 24h.945a8.611 8.611 0 0 0 3.244-.824 8.9 8.9 0 0 0 2.656-1.913 9.207 9.207 0 0 0 1.792-2.73c.079-.192.15-.385.218-.581A11.933 11.933 0 0 0 64.12 12.06 11.88 11.88 0 0 0 52.192.21zM36.395 16.443c-.162.37-.392.707-.678.992-.336.331-.74.585-1.184.745-.273.102-.56.161-.851.176a3.12 3.12 0 0 1-1.462-.248 3.457 3.457 0 0 1-1.015-.67 3.025 3.025 0 0 1-.94-2.177c-.01-.441.075-.88.248-1.285.16-.38.395-.723.692-1.008.296-.283.64-.51 1.015-.67a3.15 3.15 0 0 1 2.308-.072c.446.16.851.413 1.19.744.278.28.502.61.66.973a3.148 3.148 0 0 1 .017 2.505v-.005zm22.178-1.696a7.002 7.002 0 0 1-1.47 2.152 7.077 7.077 0 0 1-2.64 1.63 6.205 6.205 0 0 1-1.737.358 6.848 6.848 0 0 1-3.227-.53 7.528 7.528 0 0 1-2.201-1.458 6.605 6.605 0 0 1-2.053-4.85 6.685 6.685 0 0 1 .549-2.66 6.613 6.613 0 0 1 1.519-2.191 7.532 7.532 0 0 1 2.201-1.46 6.838 6.838 0 0 1 3.227-.528 6.155 6.155 0 0 1 1.737.357c.986.343 1.883.9 2.628 1.63a6.843 6.843 0 0 1 1.467 2.192 6.64 6.64 0 0 1 .548 2.66 6.553 6.553 0 0 1-.548 2.699z" fill="#ED1B2F"></path>
            <path d="M55.396 11.402l-2.112-1.214-2.112-1.21a.7.7 0 0 0-1.037.6v4.847a.7.7 0 0 0 1.047.603l2.112-1.214 2.112-1.21a.69.69 0 0 0-.01-1.202zM3.569 5.679h-1.46V1.137H.979A.978.978 0 0 1 0 .159V0h5.679l.652 1.137H3.57v4.542z" fill="#fff"></path>
            <path d="M6.642 0a.613.613 0 0 1 .578.407l1.372 3.812c.025.08.065.122.112.122s.077-.042.114-.122l1.358-3.8A.637.637 0 0 1 10.78 0h1.112l-2.02 4.981a1.35 1.35 0 0 1-.404.561 1.24 1.24 0 0 1-.765.201 1.159 1.159 0 0 1-1.176-.762L5.518 0h1.124z" fill="#fff"></path>
          </g>
          <defs>
            <clipPath id="logo-red_svg__clip0">
              <path fill="#fff" d="M0 0h64.11v24H0z"></path>
            </clipPath>
          </defs>
        </svg>
      </a>
      <div class="app-header-content">
        <div class="content-list">
          <a href="index.php?ref=home" class="content-link">Trang Chủ</a>
          <a href="movie.php?ref=movie&page=1" class="content-link">Phim Chiếu Rạp</a>
          <a href="tvseries.php?ref=tvseries&page=1" class="content-link">Phim Bộ</a>
          <?php
          if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['roles'] == '1') {
              echo '<a href="admin.php?ref=admin" class="content-link">Quản Trị</a>';
            }
          }
          ?>
        </div>
      </div>
    </div>
    <div class="app-header-right">
      <form action="search.php" class="app-header-search">
        <input type="text" class="app-search-input" placeholder="Bạn muốn xem gì hôm nay?" name="keyword" autocomplete="off" required />
        <button type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
      </form>
      <div class="app-header-users">
        <?php
        if ($is_login) {
          echo (" 
              <div class='users'>
                <svg width='30' height='30' viewBox='0 0 30 30' fill='none'>
                  <path
                    d='M15 0a7.5 7.5 0 1 1 0 15 7.5 7.5 0 0 1 0-15zm0 18.75c8.288 0 15 3.356 15 7.5V30H0v-3.75c0-4.144 6.713-7.5 15-7.5z'
                    fill='#fff'
                    fill-opacity='0.87'
                  ></path>
                </svg>
                <div class='users-content'>
                  <div class='users-info'>
                    Xin chào , <span>{$_SESSION['user']['username']}</span>
                  </div>
                  <div class='list-action'>
                    <a href='account.php' class='action-item'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' viewBox='0 0 20 20' fill='currentColor'>
                        <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z' clip-rule='evenodd' />
                      </svg>
                      Tài khoản 
                    </a>
                    <a href='signout.php' class='action-item'> 
                      <svg xmlns='http://www.w3.org/2000/svg' width='16px' height='16px' viewBox='0 0 20 20'  fill='currentColor'>
                        <path fillRule='evenodd' d='M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z' clipRule='evenodd' />
                      </svg>
                      Đăng xuất
                    </a>
                  </div>
                </div>
              </div>
            ");
        } else {
          echo ('<a href="signin.php" class="app-header-signin">Đăng Nhập</a>');
        }
        ?>
      </div>
    </div>
  </div>
</div>
<script>
  const params = new URLSearchParams(window.location.search);
  const ref = params.get('ref');
  const list_link = document.querySelectorAll('.content-link');

  switch (ref) {
    case 'home': {
      list_link[0].classList.add('active');
      break;
    }
    case 'movie': {
      list_link[1].classList.add('active');
      break;
    }
    case 'tvseries': {
      list_link[2].classList.add('active');
      break;
    }
    case 'admin': {
      list_link[3].classList.add('active');
      break;
    }
    default:
      break;
  }
</script>