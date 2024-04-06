<?php 
$conn;
function connect(){
	$conn = mysqli_connect('localhost','root','vertrigo','qlbh') or die('Không thể kết nối!');
	return $conn;
}
function disconnect($conn){
	mysqli_close($conn);
}
function validate_input_sql($conn, $str){
	return mysqli_real_escape_string($conn, $str);
}
$q = "";
if(isset($_POST['q'])){
	$q = $_POST['q'];
}
$fname = "";
if(isset($_GET['fname'])){
	$fname = $_GET['fname'];
}
if($fname == "load_more"){
	load_more();
}
if($fname == "load_more_gd"){
	load_more_gd();
}
function load_more(){
	session_start();
	$cr = '';
	if(isset($_GET['current'])){$cr = $_GET['current'];}
	$limit = $_SESSION['limit'];
	$total = $_SESSION['total'];
	$st = ($cr+1)*$limit;
	if($st >= $total - $limit){
		echo "hetcmnrdungbamnua";
	}
	$sql = "SELECT * FROM sanpham s, danhmuckh d WHERE s.madm = d.madm ORDER BY ngay_nhap DESC LIMIT ".$st.",".$limit."";
	$conn = mysqli_connect('localhost','root','vertrigo','qlbh') or die('Không thể kết nối!');
	mysqli_set_charset($conn, 'utf8');
	$result = mysqli_query($conn, $sql);
	$i = $st;
	while ($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo ++$i ?></td> <td><?php echo $row['tensp'] ?></td>
			<td><?php echo $row['ngaydb'] ?></td> <td><?php echo $row['lienhe'] ?></td>
			<td><?php echo $row['noidung'] ?></td> <td><?php echo $row['linhvuc'] ?></td>
			<td><?php echo $row['thoihan'] ?></td> <td><?php echo $row['vitri'] ?></td>
			<td><?php echo $row['yeucau'] ?></td> <td><?php echo $row['chucvu'] ?></td>
			<td><?php echo $row['maso'] ?></td> <td><?php echo $row['doituong'] ?></td>
			<td><?php echo $row['chitiet'] ?></td> <td><?php echo $row['email'] ?></td>
			<td><?php echo $row['sdt'] ?></td> <td><?php echo $row['tendm'] ?></td>
			<td><img src="../<?php echo $row['anhchinh'] ?>"></td>
			<td><?php echo $row['ngay_nhap'] ?></td>
			<td><span class="btn btn-warning" onclick="display_edit_sanpham('<?php echo $row['masp'] ?>')">Sửa</span></td>
			<td><span class="btn btn-danger" onclick="xoa_sp('<?php echo $row['masp'] ?>')">Xóa</span></td>
		</tr>

		<?php
	}
}
function load_more_gd(){
	session_start();
	$cr = $stt = '';
	if(isset($_GET['current'])){$cr = $_GET['current'];}
	if(isset($_GET['stt'])){$stt = $_GET['stt'];}
	$limit = $_SESSION['limit'];
	
	if($stt == "dadk"){
		$dk_dadk = $_SESSION['dk_dadk<?php echo ++$i ?></td>
			<td>
				<?php 
				if($row['dangky'] == 0){
					echo "<h4 class='label label-danger'>Chưa đăng ký</h4>";
				} else {
					echo "<h4 class='label label-success'>Đã đăng ký</h4>";
				} 
				?>
			</td>
			<td><?php echo $row['user_name'] ?></td> <td><?php echo $row['user_dst'] ?></td>
			<td><?php echo $row['user_email'] ?></td> <td><?php echo $row['user_phone'] ?></td>
			<td><?php echo $row['user_address'] ?></td> <td><?php echo $row['user_city'] ?></td>
			<td><?php echo $row['user_country'] ?></td> <td><?php echo $row['user_zip'] ?></td>
			<td>
				<?php 
				if($row['dangky'] == 0){
					echo "<span class='btn btn-success' onclick=\"approve_user('".$row['user_id']."')\">Approve</span>";
				} else {
					echo "<span class='btn btn-danger' onclick=\"disapprove_user('".$row['user_id']."')\">Disapprove</span>";
				} 
				?>
			</td>
		</tr>

		<?php
	}
}
function load_more_gd(){
	session_start();
	$cr = $stt = '';
	if(isset($_GET['current'])){$cr = $_GET['current'];}
	if(isset($_GET['stt'])){$stt = $_GET['stt'];}
	$st = ($cr+1)*$_SESSION['limit'];
	
	if($stt == "dadk"){
		if($st > $_SESSION['dk_dadk'] + 1){
			echo "hetcmnrdungbamnua";
			return;
		}
		$sql = "SELECT * FROM dangky WHERE dangky = 1 LIMIT ".$st.",".$_SESSION['limit']."";
	} elseif ($stt == "chuadk") {
		if($st > $_SESSION['dk_chua'] + 1){
			echo "hetcmnrdungbamnua";
			return;
		}
		$sql = "SELECT * FROM dangky WHERE dangky = 0 LIMIT ".$st.",".$_SESSION['limit']."";
	} else {
		if($st > $_SESSION['gd_all'] + 1){
			echo "hetcmnrdungbamnua";
			return;
		}
		$sql = "SELECT * FROM dangky LIMIT ".$st.",".$_SESSION['limit']."";
	}
	$conn = mysqli_connect('localhost','root','','qlbh') or die('Không thể kết nối!');
	/*$conn = mysqli_connect("localhost","k2739nvdu_qlbh","cuchuoi258","k2739nvdu_qlbh") or die('Không thể kết nối!');*/
	mysqli_set_charset($conn, 'utf8');
	$result = mysqli_query($conn, $sql);
	$i = $st;
	while ($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo ++$i ?></td>
			<td>
				<?php 
				if($row['dangky'] == 0){
					echo "<h4 class='label label-danger'>Chưa đăng ky</h4>";
				} else {
					echo "<h4 class='label label-success'>Đã dăng ký</h4>";
				} 
				?>
			</td>
			<td><?php echo $row['user_name'] ?></td> <td><?php echo $row['user_dst'] ?></td>
			<td><?php echo $row['user_addr'] ?></td> <td><?php echo $row['user_phone'] ?></td>
			<td><?php echo $row['tongtien'] ?></td> <td><?php echo $row['date'] ?></td>
			<td>
				<?php if($row['dangky'] == '0'){ ?>
				<span class="btn btn-success" onclick="xong('<?php echo $row['madk'] ?>')">Xong</span>
				<?php } ?>
			</td>
		</tr>

		<?php
	}
}

switch ($q) {
	case 'them_sp':
	them_sp();
	break;
	case 'xoa_sp':
	xoa_sp();
	break;
	case 'them_dm':
	them_dm();
	break;
	case 'xoa_dm':
	xoa_dm();
	break;
	case 'dangky_chuagh':
	dangky_chuagh();
	break;
	case 'dangky_dagh':
	dangky_dagh();
	break;
	case 'dangky_tatcagh':
	dangky_tatcagh();
	break;
	case 'dangky_xong':
	dangky_xong();
	break;
	case 'them_admin':
	them_admin();
	break;
	case 'xoa_taikhoan':
	xoa_taikhoan();
	break;
	case 'sua_sp':
	sua_sp();
	break;
}
function them_sp(){
	$conn = connect();
	$tensp = validate_input_sql($conn, $_POST['tensp']);
	$ngaydb = validate_input_sql($conn, $_POST['ngaydb']);
	$lienhe = validate_input_sql($conn, $_POST['lienhe']);
	$noidung = validate_input_sql($conn, $_POST['noidung']);
	$linhvuc = validate_input_sql($conn, $_POST['linhvuc']);
	$thoihan = validate_input_sql($conn, $_POST['thoihan']);
	$vitri = validate_input_sql($conn, $_POST['vitri']);
	$yeucau = validate_input_sql($conn, $_POST['yeucau']);
	$chucvu = validate_input_sql($conn, $_POST['chucvu']);
	$maso = validate_input_sql($conn, $_POST['maso']);
	$doituong = validate_input_sql($conn, $_POST['doituong']);
	$chitiet = validate_input_sql($conn, $_POST['chitiet']);
	$email = validate_input_sql($conn, $_POST['email']);
	$sdt = validate_input_sql($conn, $_POST['sdt']);
	$madm = validate_input_sql($conn, $_POST['madm']);
	$anhchinh = validate_input_sql($conn, $_POST['anhchinh']);
	mysqli_set_charset($conn,'utf8');
	$now = date('d-m-Y h:i:s');
	$luotxem = rand(200, 1000);
	$luotdk = rand(1001, 5000);
	if($tensp == "" || $ngaydb == ""){
		echo "Tên không được để trống!";
		return 0;	
	}
	$sql = "INSERT INTO sanpham VALUES ('','".$tensp."','".$ngaydb."','".$lienhe."','".$noidung."','".$linhvuc."','".$thoihan."','".$vitri."','".$yeucau."','".$chucvu."','".$maso."','".$doituong."','".$chitiet."','".$email."','".$sdt."','".$madm."','".$anhchinh."','".$luotxem."','".$luotdk."','".$now."')";
if (!mysqli_query($conn, $sql)) {
    echo "<script>alert('Lỗi thêm vào cơ sở dữ liệu, xin nhập lại!')</script>";
} else {
    echo "<script>alert('Thêm thành công sản phẩm!')</script>";
}
disconnect($conn);
}
function xoa_sp(){
	$masp = $_POST['masp_xoa'];
	$conn = connect();
	$sql = "DELETE FROM sanpham WHERE masp = '".$masp."'";
	if(mysqli_query($conn, $sql)){
		echo "<script>alert('Xóa thành công!')</script>";
	} else {
		echo "<script>alert('Đã xảy ra lỗi!')</script>";
	}
}
function them_dm(){
	$tendm = $_POST['tendm'];
	$xuatsu = $_POST['chude'];
	$conn = connect();
	$sql = "INSERT INTO danhmuckh VALUES (' ','".$tendm."','".$chude."')";
	if(mysqli_query($conn, $sql)){
		echo "<script>alert('Thêm danh mục thành công!')</script>";
	} else {
		echo "<script>alert('Đã xảy ra lỗi!')</script>";
	}
}
function xoa_dm(){
	$madm = $_POST['madm_xoa'];
	$conn = connect();
	$sql = "DELETE FROM danhmuckh WHERE madm = '".$madm."'";
	if(mysqli_query($conn, $sql)){
		echo "<script>alert('Xóa thành công!')</script>";
	} else {
		echo "<script>alert('Lỗi! Bạn phải xóa hết những sản phẩm thuộc danh mục này trước!')</script>";
	}
}

//Danh sach giao dich sap xep
function dangky_chuagh(){
	/*session_start();*/
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	echo $_SESSION['limit'];
	$sql = "SELECT * FROM dangky WHERE dangky = 0 LIMIT ".$_SESSION['limit'];
	$i = 1;
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>STT</th> <th>Tình trạng</th> <th>Tên</th>
			<th>Xã</th> <th>Địa chỉ</th> <th>Số DT</th>
			<th>ok</th> <th>Ngày</th> <th>isDone</th>
		</tr>
	</thead>
	<tbody id="gd_chuagd_body">

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php if($row['dangky']) echo "<h4 class='label label-success'>Đã đăng ký </h4>"; else echo "<h4 class='label label-danger'>Chưa đăng ký</h4>";  ?></td>
			<td><?php echo $row['user_name'] ?></td> <td><?php echo $row['user_dst'] ?></td>
			<td><?php echo $row['user_addr'] ?></td> <td><?php echo $row['user_phone'] ?></td>
			<td><?php echo $row['tongtien'] ?></td> <td><?php echo $row['date'] ?></td>
			<td><span class="btn btn-success" onclick="xong('<?php echo $row['madk'] ?>')">Xong</span></td>
		</tr>

		<?php }	?>
	</tbody>

	<?php
	disconnect($conn);
}
function dangky_dagh(){
	/*session_start();*/
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM dangky WHERE dangky = 1 LIMIT ".$_SESSION['limit'];
	$i = 1;
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>STT</th> <th>Tình trạng</th> <th>Tên</th>
			<th>Quận</th> <th>Địa chỉ</th> <th>Số DT</th>
			<th>ok</th> <th>Ngày</th> <th>isDone</th>
		</tr>
	</thead>
	<tbody id="gd_dagd_body">

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php if($row['dangky']) echo "<h4 class='label label-success'>Đã dăng ký</h4>"; else echo "<h4 class='label label-danger'>Chưa dang ký</h4>";  ?></td>
			<td><?php echo $row['user_name'] ?></td> <td><?php echo $row['user_dst'] ?></td>
			<td><?php echo $row['user_addr'] ?></td> <td><?php echo $row['user_phone'] ?></td>
			<td><?php echo $row['tongtien'] ?></td> <td><?php echo $row['date'] ?></td>
			<td></td>
		</tr>

		<?php }	?>
	</tbody>

	<?php
	disconnect($conn);
}
function dangky_tatcagh(){
	/*session_start();*/
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM dangky LIMIT ".$_SESSION['limit'];
	$i = 1;
	$result = mysqli_query($conn, $sql); ?>
	<thead>
		<tr>
			<th>STT</th> <th>Tình trạng</th> <th>Tên</th>
			<th>Quận</th> <th>Địa chỉ</th> <th>Số DT</th>
			<th>ok</th> <th>Ngày</th> <th>isDone</th>
		</tr>
	</thead>
	<tbody id="gd_tatcagd_body">
		<?php while ($row = mysqli_fetch_assoc($result)){?>

		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php if($row['dangky']) echo "<h4 class='label label-success'>Đã dangky</h4>"; else echo "<h4 class='label label-danger'>Chưa dăng ký</h4>";  ?></td>
			<td><?php echo $row['user_name'] ?></td> <td><?php echo $row['user_dst'] ?></td>
			<td><?php echo $row['user_addr'] ?></td> <td><?php echo $row['user_phone'] ?></td>
			<td><?php echo $row['tongtien'] ?></td> <td><?php echo $row['date'] ?></td>
			<td>
				<?php if($row['dangky'] == '0'){ ?>
				<span class="btn btn-success" onclick="xong('<?php echo $row['madk'] ?>')">Xong</span>
				<?php } ?>
			</td>
		</tr>

		<?php }	?>
	</tbody>

	<?php
	disconnect($conn);
}
function dangky_xong(){
	$magd = $_POST['madk_xong'];
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "UPDATE dangky SET dangky = '1' WHERE madk = '".$madk."'";
	if(!mysqli_query($conn, $sql)){
		echo "Đã xảy ra lỗi!";
	}
	disconnect($conn);
}
function them_admin(){
	$conn = connect();
	$ten = $_POST['ten'];
	$tentk = $_POST['tentk'];
	$mk = $_POST['mk'];
	$sql = "INSERT INTO thanhvien VALUES ('','".$ten."','".$tentk."','".$mk."','','','','','1')";
	if(!mysqli_query($conn, $sql)){
		echo "<script>alert('Tên tài khoản đã tồn tại!')</script>";
	} else {
		echo "<script>alert('Tạo thành công!')</script>";
	}
	disconnect($conn);
}
function xoa_taikhoan(){
	$id = $_POST['id_tk_xoa'];
	$conn = connect();
	$sql = "DELETE FROM thanhvien WHERE id = '".$id."'";
	if(!mysqli_query($conn, $sql)){
		echo "Đã xảy ra lỗi!";
	} else {
		echo "<script>alert('Xóa xong!')</script>";
	}
	disconnect($conn);
}
function sua_sp(){
	$masp = $_POST['masp_sua'];
	$tensp = $_POST['tensp_ed'];
	$ngaydb = $_POST['ngaydb_ed'];
	$lienhe = $_POST['lienhe_ed'];
	$email = $_POST['email_ed'];
	$sdt = $_POST['sdt_ed'];
	$set = []; $data = [];
	if($tensp != ""){$data[] = $tensp; $set[] = 'tensp';}
	if($ngaydb != ""){$data[] = $ngaydb; $set[] = 'ngaydb';}
	if($lienhe != ""){$data[] = $lienhe; $set[] = 'lienhe';}
	if($email != ""){$data[] = $email; $set[] = 'email';}
	if($sdt != ""){$data[] = $sdt; $set[] = 'sdt';}
	$str = '';
	for ($i=0; $i < count($set); $i++) { 
		$str.= $set[$i]."='".$data[$i]."',";
	}
	$str = trim($str, ',');
	$conn = connect();
	$sql = "UPDATE sanpham SET ".$str." WHERE masp = '".$masp."'";
	echo $sql;
	return 0;
	if(!mysqli_query($conn, $sql)){
		echo "Đã xảy ra lỗi!";
	} else {
		echo "<script>alert('Xóa xong!')</script>";
	}
	disconnect($conn);
}
?>