<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<?php
require_once 'backend-index.php';
$masp = "";
if(isset($_GET['masp'])){
	$masp = $_GET['masp'];
}
$conn = connect();
mysqli_set_charset($conn, 'utf8');
$sql = "SELECT * FROM sanpham sp, danhmuckh dm WHERE sp.madm = dm.madm AND masp = '".$masp."'";
$result = mysqli_query($conn, $sql);
$loaisp = "";
while ($row = mysqli_fetch_assoc($result)) {
	$loaisp = $row['madm'];
	?>
	<div class="container-fluid form" style="margin-top: -23px; padding: 20px">
		<div class="row">
			<div class="col-sm-12">
				<div class="main-prd">
					<img src="<?php echo $row['anhchinh'] ?>" class="main-prd-img">
					<div class="basic-info">
						<h2><?php echo $row['tensp'] ?></h2>
						<span class="main-prd-price"><?php echo $row['ngaydb'] ?> /</span>
						<h4><b>Thông tin cơ bản</b></h4>
						<ul>
							<li>Nôi dung cơ bản: <?php echo $row['chude'] ?></li>
							<li>Mã số: <?php echo $row['maso'] ?></li>
							<li>Vị trí: <?php echo $row['vitri'] ?></li>
							<li>Thời hạn: <?php if($row['thoihan']){echo "Còn";} else {echo "Đã hết";} ?></li>
							<li>Liên hệ: <?php echo $row['lienhe'] ?> </li>
							<li><span class="km">Email: <?php echo $row['email'] ?> %</span></li>
							<br><a class="btn btn-primary" href="order.php?masp=<?php echo $masp ?>">Đăng ký</a>
						</ul>
					</div>
				</div>

				<div style="clear: both;"></div>

				<div class="introduce-prd">
					<h3>Nội dung chính</h3>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tên</th><th>Giới thiệu</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Liên hệ</td><td><?php echo $row['lienhe'] ?> .</td>
							</tr>
							<tr>
								<td>Nội dung</td><td><?php echo $row['noidung'] ?></td>
							</tr>
							<tr>
								<td>Lĩnh vực</td><td><?php echo $row['linhvuc'] ?></td>
							</tr>
							<tr>
								<td>Yêu cầu</td><td><?php echo $row['yeucau'] ?></td>
							</tr>
							<tr>
								<td>Chức vụ</td><td><?php echo $row['chucvu'] ?></td>
							</tr>
							<tr>
								<td>Mã số</td><td><?php echo $row['maso'] ?></td>
							</tr>
							<tr>
								<td>Đối  tượng</td><td><?php echo $row['doituong'] ?></td>
							</tr>
							<tr>
								<td>Chi tiết</td><td><?php echo $row['chitiet'] ?></td>
							</tr><tr>
								<td>Email</td><td><?php echo $row['email'] ?> %</td>
							</tr>
							<tr>
								<td>SĐT:</td><td><?php echo $row['sdt'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>