<?php
require_once 'layout/second_header.php';
require_once 'backend-index.php';
$masp = $q = "";
$_SESSION['cost'] = "";
if (isset($_GET['masp'])) {
	$masp = $_GET['masp'];
	$_SESSION['buynow'] = $masp;
}
if (isset($_GET['q'])) {
	$q = $_GET['q'];
	if ($q == 'multi') {
		if ($_SESSION['rights'] == "default") {
			if (isset($_SESSION['client_cart']) && count($_SESSION['client_cart']) > 1) {
				$tmpArr = $_SESSION['client_cart'];
				array_shift($tmpArr);
				$x = '(' . implode(',', $tmpArr) . ')';
				$sql = "SELECT * FROM sanpham WHERE masp in " . $x . "";
			} else {
				echo "<script>alert('thông tin quan tâm hiện trống!')</script>";
				return 0;
			}
		} else {
			$tmpArr = $_SESSION['user_cart'];
			array_shift($tmpArr);
			$x = '(' . implode(',', $tmpArr) . ')';
			$sql = "SELECT * FROM sanpham WHERE masp in " . $x . "";
		}
	} elseif ($q = 'buylikepr') {
		$tmpArr = $_SESSION['like'];
		array_shift($tmpArr);
		$x = '(' . implode(',', $tmpArr) . ')';
		$sql = "SELECT * FROM sanpham WHERE masp in " . $x . "";
	} else {
		$_SESSION['buynow'] = $masp;
	}
} else {
	$sql = "SELECT * FROM sanpham WHERE masp = '" . $masp . "'";
}


$conn = connect();
mysqli_set_charset($conn, 'utf8');

$result = mysqli_query($conn, $sql);

?>
<script type="text/javascript">
	window.onload = function() {
		tinh_tien()
	}
</script>
<form action="dangky.php" method="POST" role="form">
	<div class="container-fluid form" style="margin-top: -23px; padding: 20px">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ẢNH</th>
							<th>TÊN NỘI DUNG</th>
							<th>NGÀY ĐĂNG</th>
							<th>SỐ LƯỢNG</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = mysqli_fetch_assoc($result)) { ?>


							<tr>
								<td><img src="<?php echo $row['anhchinh'] ?>" style="width: 70px"></td>
								<td><?php echo $row['tensp'] ?></td>
								<td class="cost" data-val="<?php echo $row['ngaydb'] ?>">
									<!--php echo $row['ngaydb']; $_SESSION['cost'][] = $row['ngaydb']; ?></td>-->
									<?php
									// Kiểm tra xem $_SESSION['cost'] có phải là một mảng không
									if (!isset($_SESSION['cost']) || !is_array($_SESSION['cost'])) {
										// Nếu không phải, khởi tạo nó là một mảng
										$_SESSION['cost'] = array();
									}

									// Đăng ký vào mảng $_SESSION['cost']
									echo $row['ngaydb'];
									$_SESSION['cost'][] = $row['ngaydb'];
									?>

								<td width="30px"><input type="number" name="sl[]" value='1' min="0" onchange="tinh_tien()"></td>
							</tr>

						<?php }

						?>
						
					</tbody>
				</table>
				<legend>Điền thông sơ bộ đăng ký Du học, Xuất khẩu, B1, B2,...</legend>
				<p class="errorMes">Đăng ký chính thức bằng giấy tại trung tâm AE sau</p>
				<div class="form-group">
					<label for="">Tên: </label>
					<input type="text" class="form-control" id="s_ten" name="ten" value="<?php
																							if ($_SESSION['rights'] == 'user') {
																								echo $_SESSION['user']['ten'];
																							}
																							?>">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ: </label>
					<select class="form-control" name="quan" id="s_quan">
						<option value="q1">Xã An Bình</option>
						<option value="q2">Xã An cư</option>
						<option value="q3">Xã An Hảo</option>
						<option value="q4">Xã Bình Chánh</option>
						<option value="q5">Xã Bình Hòa</option>
						<option value="q6">Xã Bình Long</option>
						<option value="q7">Xã Cần Đăng</option>
						<option value="q8">Xã Hòa Bình</option>
						<option value="q9">Xã Khánh An</option>
						<option value="q10">Xã Khánh Bình</option>
						<option value="q11">Xã Khánh Hòa</option>
						<option value="q12">Xã Mỹ Hiệp</option>
						<option value="qtd">Xã Mỹ Hòa Hưng</option>
						<option value="qbt">Xã Mỹ Phú</option>
						<option value="qgv">Xã Phú An</option>
						<option value="qtb">Xã Phú Bình</option>
						<option value="qbt">Xã Thoại Giang</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Nội dung thông tin đăng ký: </label>
					<input type="text" class="form-control" name="dc" id="s_dc" value="<?php
																						if ($_SESSION['rights'] == 'user') {
																							echo $_SESSION['user']['diachi'];
																						}
																						?>">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại: </label>
					<input type="text" class="form-control" name="sodt" id="s_sdt" value="<?php
																							if ($_SESSION['rights'] == 'user') {
																								echo $_SESSION['user']['sodt'];
																							}
																							?>">
				</div>
				<button onclick="check_before_submit()" class="btn btn-primary" type="submit">Đăng ký</button><br><br>
</form>
</div>
</div>
</div>

<?php require_once 'layout/second_footer.php' ?>