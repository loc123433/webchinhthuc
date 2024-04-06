<?php 
$conn;
function connect(){
	$conn = mysqli_connect('localhost','root','vertrigo','qlbh') or die('Không thể kết nối!');
	/*$conn = mysqli_connect("localhost","k2739nvdu_qlbh","cuchuoi258","k2739nvdu_qlbh") or die('Không thể kết nối!');*/
	return $conn;
}
function disconnect($conn){
	mysqli_close($conn);
}
//Danh sach thanh vien
function member_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM thanhvien ORDER BY date DESC";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>ID</th> <th>Tên</th> <th>Tên tài khoản</th>
			<th>Mật khẩu</th> <th>Địa chỉ</th> <th>Số dt</th>
			<th>Email</th> <th>Ngày tham gia</th> <th>Quyền</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['id'] ?></td> <td><?php echo $row['ten'] ?></td>
			<td><?php echo $row['tentaikhoan'] ?></td> <td>*****</td>
			<td><?php echo $row['diachi'] ?></td> <td><?php echo $row['sodt'] ?></td>
			<td><?php echo $row['email'] ?></td> <td><?php echo $row['date'] ?></td>
			<td><?php if($row['quyen'])echo "Admin"; else echo "User";  ?></td>
			<td><span class="btn btn-danger" onclick="xoa_taikhoan('<?php echo $row["id"] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
	disconnect($conn);
}
//Danh sach giao dich
function exchange_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM dangky WHERE dangky = 0 LIMIT ".$_SESSION['limit']."";
	$i = 1;
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>STT</th> <th>Tình trạng</th> <th>Tên</th>
			<th>Quận</th> <th>Địa chỉ</th> <th>Số DT</th>
			<th>Tổng tiền</th> <th>Ngày</th> <th>isDone</th>
		</tr>
	</thead>
	<tbody id="body-gd-list">

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php if($row['tinhtrang']) echo "<h4 class='label label-success'>Đã đang ký</h4>"; else echo "<h4 class='label label-danger'>Chưa có đăng ký</h4>";  ?></td>
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
		<div class="container-fluid text-center lmbtnctn">
			<button onclick="load_more_gd(0, 'body-gd-list','chuagd')" id="loadmorebtngd">Load more</button>
		</div>
	</tbody>
	
	<?php
	disconnect($conn);
}
//Danh sach danh muc san pham
function type_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM danhmuckh";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>STT</th>
			<th>Tên danh mục</th><th>Chủ đề</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['madm'] ?></td> <td><?php echo $row['tendm'] ?></td>
			<td><?php echo $row['chude'] ?></td>
			<td>
				<span class="btn btn-danger" onclick="xoa_dm('<?php echo $row['madm'] ?>')">Xóa</span>
			</td>
		</tr>

		<?php }	?>
	</tbody>

	<?php
}
//Danh sach san pham
function product_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM sanpham s, danhmuckh d WHERE s.madm = d.madm ORDER BY ngay_nhap DESC LIMIT ".$_SESSION['limit']."";
	$i = 1;
	$result = mysqli_query($conn, $sql); ?>
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên</th> <th>Ngày đăng</th> <th>Liên hệ</th>
			<th>Nội dung</th> <th>Lĩnh vực</th> <th>Thời hạn</th>
			<th>Vị trí</th> <th>Yêu cầu</th> <th>Chức vụ</th>
			<th>Mã số</th> <th>Đối tượng</th> <th>Chi tiết</th>
			<th>Email</th> <th>SDT</th> <th>Loại</th>
			<th>Ảnh</th> <th>Ngày nhập</th> <th></th> <th></th>
		</tr>
	</thead>
	<tbody id='body-sp-list'>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $i++ ?></td> <td><?php echo $row['tensp'] ?></td>
			<td><?php echo $row['ngaydb'] ?></td> <td><?php echo $row['lienhe'] ?></td>
			<td><?php echo $row['noidung'] ?></td> <td><?php echo $row['linhvuc'] ?></td>
			<td><?php echo $row['thoihan'] ?></td> <td><?php echo $row['vitri'] ?></td>
			<td><?php echo $row['yeucau'] ?></td> <td><?php echo $row['chucvu'] ?></td>
			<td><?php echo $row['maso'] ?></td> <td><?php echo $row['doituong'] ?></td>
			<td><?php echo $row['chitiet'] ?></td> <td><?php echo $row['email'] ?></td>
			<td><?php echo $row['sdt'] ?></td> <td><?php echo $row['tendm'] ?></td>
			<td><img src="../<?php echo $row['anhchinh'] ?>"></td>
			<td><?php echo $row['ngay_nhap'] ?></td>
			<td><span onclick="display_edit_sanpham('<?php echo $row['masp'] ?>')"><a class="btn btn-warning" href="#sua_sp-area">Sửa</a></span></td>
			<td><span class="btn btn-danger" onclick="xoa_sp('<?php echo $row['masp'] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
}

//Danh sach lophoc
function lophoc_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM lophoc";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>ID</th> <th>Tên Lớp Học</th> <th>Số tiết và thời gian</th>
			<th>Học phí</th> 
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['id'] ?></td> <td><?php echo $row['tenlh'] ?></td>
			<td><?php echo $row['chitiet'] ?></td>
			<td><?php echo $row['hocphi'] ?></td> 
			<td><span class="btn btn-danger" onclick="xoa_taikhoan('<?php echo $row["id"] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
	
}

//Danh sach lichthi
function lichthi_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM lichthi";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>ID</th> <th>Tên Môn Thi</th> <th>Số lượng</th>
			<th>Phòng thi</th> <th>Giờ thi</th> <th>Ngày thi</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['id'] ?></td> <td><?php echo $row['tenmh'] ?></td>
			<td><?php echo $row['soluong'] ?></td>
			<td><?php echo $row['phongthi'] ?></td> 
			<td><?php echo $row['giothi'] ?></td> 
			<td><?php echo $row['ngay_thi'] ?></td> 
			<td><span class="btn btn-danger" onclick="xoa_taikhoan('<?php echo $row["id"] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
	
}

//Danh sach hocvien
function hocvien_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM hocvien";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>ID</th> <th>Mã học viên</th> <th>Tên học viên</th>
			<th>Ngày sinh</th> <th>Phái</th> <th>Địa chỉ</th> <th>Sdt</th> <th>email</th> <th>Thành tích</th> <th>Hiện học</th> <th>Trạng thái</th> <th>Đánh giá chung</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['id'] ?></td> <td><?php echo $row['mahv'] ?></td>
			<td><?php echo $row['hoten'] ?></td>
			<td><?php echo $row['ngaysinh'] ?></td> 
			<td><?php echo $row['phai'] ?></td> 
			<td><?php echo $row['diachi'] ?></td> 
			<td><?php echo $row['sdt'] ?></td> 
			<td><?php echo $row['email'] ?></td> 
			<td><?php echo $row['thanhtich'] ?></td> 
			<td><?php echo $row['hienhoc'] ?></td> 
			<td><?php echo $row['trangthai'] ?></td> 
			<td><?php echo $row['danhgiachung'] ?></td> 
			<td><span class="btn btn-danger" onclick="xoa_taikhoan('<?php echo $row["id"] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
	
}

//Danh sach tkb
function tkb_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM tkb";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>ID</th> <th>Khóa Học </th> <th>Tên Lớp</th>
			<th>Phòng Học</th> <th>Giáo viên</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['id'] ?></td> <td><?php echo $row['khoahoc'] ?></td>
			<td><?php echo $row['tenlop'] ?></td>
			<td><?php echo $row['phonghoc'] ?></td> 
			<td><?php echo $row['giaovien'] ?></td> 
			<td><span class="btn btn-danger" onclick="xoa_taikhoan('<?php echo $row["id"] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
	
}

//Danh sach nhansu
function nhansu_list(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM nhansu";
	$result = mysqli_query($conn, $sql); ?>

	<thead>
		<tr>
			<th>ID</th> <th>Mã nhân sự</th> <th>Họ tên</th>
			<th>Ngày sinh</th> <th>Phái</th> <th>Địa chỉ</th> <th>SDT</th> <th>Email</th> <th>Bằng cấp</th> <th>Lý lịch</th> <th>Ngày gia nhập</th> <th>Ngày làm việc</th> <th>Lương</th><th>Vi phạm</th> <th>Thưởng</th> <th>Vị trí</th> <th>Đánh giá chung</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php while ($row = mysqli_fetch_assoc($result)){?>


		<tr>
			<td><?php echo $row['id'] ?></td> <td><?php echo $row['mans'] ?></td>
			<td><?php echo $row['hotenns'] ?></td>
			<td><?php echo $row['ngaysinh'] ?></td> 
			<td><?php echo $row['phai'] ?></td> 
			<td><?php echo $row['diachi'] ?></td> 
			<td><?php echo $row['sdt'] ?></td> 
			<td><?php echo $row['email'] ?></td> 
			<td><?php echo $row['bangcap'] ?></td> 
			<td><?php echo $row['lylich'] ?></td> 
			<td><?php echo $row['ngaygianhap'] ?></td> 
			<td><?php echo $row['ngaylamviec'] ?></td> 
			<td><?php echo $row['luongthang'] ?></td> 
			<td><?php echo $row['vipham'] ?></td> 
			<td><?php echo $row['thuong'] ?></td> 
			<td><?php echo $row['vitri'] ?></td> 
			<td><?php echo $row['danhgiachung'] ?></td> 
			<td><span class="btn btn-danger" onclick="xoa_taikhoan('<?php echo $row["id"] ?>')">Xóa</span></td>
		</tr>

		<?php }	?>
	</tbody>
	<?php
	
}
//in ra cac loai sp
function list_type_pr_for_add(){
	$conn = connect();
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM danhmuckh";
	?>	<select class="form-control" id="madm"> <?php
	$result = mysqli_query($conn, $sql); ?>
	<?php while ($row = mysqli_fetch_assoc($result)){?>
	<option value="<?php echo $row['madm'] ?>"><?php echo $row['tendm'] ?></option>
	<?php }	?>
</select>

<?php
}




?>