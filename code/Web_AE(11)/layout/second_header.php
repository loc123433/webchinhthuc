<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['rights'] = "default";
$_SESSION['limit'] = 8;
$conn = mysqli_connect('localhost','root','vertrigo','qlbh') or die('Không thể kết nối!');
/*$conn = mysqli_connect("localhost","k2739nvdu_qlbh","cuchuoi258","k2739nvdu_qlbh") or die('Không thể kết nối!');*/
mysqli_set_charset($conn, 'utf8');
$_SESSION['sql'] = "SELECT * FROM sanpham";
$sql = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $sql);
$_SESSION['total'] = mysqli_num_rows($result);
require_once 'backend-index.php';
if(!isset($_SESSION['client_cart'])){
  $_SESSION['client_cart'][0] = "tmp";
}

//$_SESSION['user_cart'] = "";
//$_SESSION['user_cart'][0] = "tmp";
// Kiểm tra xem $_SESSION['user_cart'] có phải là một mảng không
if (!isset($_SESSION['user_cart']) || !is_array($_SESSION['user_cart'])) {
  // Nếu không phải, khởi tạo nó là một mảng
  $_SESSION['user_cart'] = array();
}

// Bây giờ bạn có thể an toàn gán giá trị cho mảng
$_SESSION['user_cart'][0] = "tmp";

if(isset($_SESSION['user'])){
  $_SESSION['rights'] = "user";
  $_SESSION['like'] = "";
  //$_SESSION['like'][0] = "tmp";
  $conn = connect();
  mysqli_set_charset($conn, 'utf8');
  $sql = "SELECT masp, soluong FROM quantam WHERE user_id = '".$_SESSION['user']['id']."'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user_cart'][] = $row['masp'];
  }
  $sql = "SELECT masp FROM baivietyeuthich WHERE user_id = '".$_SESSION['user']['id']."'";
  $result = mysqli_query($conn, $sql);
  /*while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['like'][] = $row['masp'];
  }*/
   // Kiểm tra xem $_SESSION['like'] có phải là một mảng không
if (!isset($_SESSION['like']) || !is_array($_SESSION['like'])) {
  // Nếu không phải, khởi tạo nó là một mảng
  $_SESSION['like'] = array();
}

while ($row = mysqli_fetch_assoc($result)) {
  // Thêm giá trị vào mảng $_SESSION['like']
  $_SESSION['like'][] = $row['masp'];
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> American English - Trung tâm ngoại ngữ AE </title>
  <meta charset="utf-8">
  <!-- <link rel="SHORTCUT ICON"  href=> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script type="text/javascript" src="libs/script/script.js"></script>
  <link rel="stylesheet" href="libs/css/style.css">

  <!-- File css -> file js -> file jquery -->
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
  <script src="libs/jquery/jquery-latest.js"></script>
  <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>

  <!-- font used in this site -->
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
</head>
<body>
  <header>
    <a href="index.php"></a>
    <div class="header-detail">
      <p>26-27D2 Đinh Trường Sanh, Phường Đông Xuyên, Thành phố Long Xuyên, Tỉnh An Giang.<br>
        <i>8h - 22h Hằng ngày, kể cả Ngày lễ và Chủ nhật</i>
      </p>
    </div>
  </header>