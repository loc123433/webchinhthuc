<?php 
require_once 'backend-index.php';
require_once 'layout/second_header.php';
$ten = $phuong = $dc = $sodt = $money = $sl = "";
if(isset($_POST['ten'])){
	$ten = $_POST['ten'];
}
if(isset($_POST['phuong'])){
	$phuong = $_POST['phuong'];
}
if(isset($_POST['dc'])){
	
	$dc = $_POST['dc'];
}
if(isset($_POST['sodt'])){
	$sodt = $_POST['sodt'];
}
if(isset($_POST['sl'])){
	$sl = $_POST['sl'];
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = date("Y-m-d h:i:s");
$conn = connect();
mysqli_set_charset($conn, 'utf8');


?>

<div class="row">
	<div class="col-sm-12">
		<div style="text-align: center;">
			<h3 style="color: green;">Bạn đã đăng ký <b>THÀNH CÔNG</b>, cảm ơn bạn!</h3>
			<i>Bạn sẽ sớm nhận được cuộc gọi xác nhận, và hoàn thành thủ tục chính thức tại trung tâm AE sau</i>
			<a href="index.php">Quay lại trang chủ</a>
			<img src="images/tks4buying.png">
		</div>
	</div>
</div>

<?php
$user_id = "";
if($_SESSION['rights'] == "user"){
	$user_id = $_SESSION['user']['id'];
}
$sql = "INSERT INTO dangky VALUES ('',0,'".$user_id."','".$ten."','".$phuong."','".$dc."','".$sodt."','".$money."','".$now."')";
if(!mysqli_query($conn, $sql)){
	echo "Đã xảy ra một lỗi nhỏ trong quá trình đăng ký, vui lòng đăng ký lại!";
} else {
	$last_madk = mysqli_insert_id($conn); // Lấy mã đăng ký vừa được tạo

	$buynow = "";
	if(isset($_SESSION['buynow'])){
		$buynow = $_SESSION['buynow'];
		$sql = "INSERT INTO chitietdk VALUES ('".$last_madk."','".$buynow."','".$sl[0]."')";
		mysqli_query($conn, $sql);
	} else {
		if($_SESSION['rights'] == "user"){
			$new_masp = $_SESSION['user_cart'];
		} else{
			$new_masp = $_SESSION['client_cart'];
		}

		array_shift($new_masp);
		for($i = 0; $i < count($new_masp); $i++){
			$sql_multi = "INSERT INTO chitietdk VALUES ('".$last_madk."','".$new_masp[$i]."','".$sl[$i]."')";
			mysqli_query($conn, $sql_multi);
		}
	}
}

require_once 'layout/second_footer.php';
?>