<?php
$conn = new mysqli('localhost', 'root', '', 'movie_db_backup');
$query = '';
$sqlscript = file('database.sql');

foreach ($sqlscript as $line) {
  $startwith = substr(trim($line), 0, 2);
  $endwith = substr(trim($line), -1, 1);
  if (empty($line) || $startwith == '--' || $startwith == '/*' || $startwith == '//') {
    continue;
  }
  $query = $query . $line;
  if ($endwith == ';') {
    mysqli_query($conn, $query) or die('<div class="error-response sql-import-response">Lỗi: <b>' . $query . '</b></div>');
    $query = '';
  }
}
header('Location: index.php');
echo '<div class="success-response sql-import-response">Nhập dữ liệu thành công</div>';
