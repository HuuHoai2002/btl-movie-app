<?php
$connect = new mysqli('localhost', 'root', '', '');
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
    $connect->query($query) or die('<div class="error-response sql-import-response">Lỗi: <b>' . $query . '</b></div>');
    $query = '';
  }
}
echo '<div class="success-response sql-import-response">Khởi tạo database thành công</div>';
