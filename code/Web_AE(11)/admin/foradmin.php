<?php 

/*session_start();*/
if(!isset($_SESSION['admin']) || isset($_SESSION['user']) || isset($_SESSION['user'])){
	echo "<script>window.location.replace('../index.php');</script>";
}
$conn = mysqli_connect('localhost','root','vertrigo','qlbh') or die('Không thể kết nối!');
$sql = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $sql);
$_SESSION['total'] = mysqli_num_rows($result);

$sql = "SELECT * FROM dangky";
$result = mysqli_query($conn, $sql);
$_SESSION['gd_all'] = mysqli_num_rows($result);

$sql = "SELECT * FROM dangky WHERE dangky = 1";
$result = mysqli_query($conn, $sql);
$_SESSION['dk_dadk'] = mysqli_num_rows($result);

$sql = "SELECT * FROM dangky WHERE dangky = 0";
$result = mysqli_query($conn, $sql);
$_SESSION['dk_chua'] = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang quản trị admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="libs/style.css">
	<link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.css">
	<script src="../libs/jquery/jquery-latest.js"></script>
	<script src="../libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#add-pr').hide();
			$('#add-dm').hide();
			$('#add-admin-area').hide();
			$('#sua_sp-area').hide();
			$('#addspbtn').click(function(){
				$('#add-pr').toggle(300);
				$('#tbl-sanpham-list').toggle(300);
				$('#loadmorebtn').toggle(300);
			});
			$('#adddmbtn').click(function(){
				$('#add-dm').toggle(300);
			});
			$('.xong').click(function(){
				$(this).closest('tr').children("td:nth-child(2)").html('<h4 class="label label-success">Đã giao hàng</h4>');
				$(this).remove();
			});
			$('#add-admin-btn').click(function(){
				$('#add-admin-area').toggle(300);
			});
		});
		function load_more(current,where){
			var fname = 'load_more';
			var x = current+1;
			$('#loadmorebtn').attr('onclick','load_more('+x+',`'+where+'`)');
			$.ajax({
				url : "for-ajax.php",
				type : "get",
				dataType:"text",
				data : {
					fname, current
				},
				success : function (result){
					if(result.search('hetcmnrdungbamnua') != -1){
						alert('Đã hết mục để hiển thị!');
						return;
					}
					$('#'+where).append(result);
				}
			});
		}
		function load_more_gd(current,where,stt){
			var fname = 'load_more_gd';
			var x = current+1;
			$('#loadmorebtngd').attr('onclick','load_more_gd('+x+',`'+where+'`,`'+stt+'`)');
			$.ajax({
				url : "for-ajax.php",
				type : "get",
				dataType:"text",
				data : {
					fname, current,stt
				},
				success : function (result){
					if(result.search('hetcmnrdungbamnua') != -1){
						alert("Đã hết mục để hiển thị!");
						return;
					}
					$('#'+where).append(result);
				}
			});
		}
	</script>
</head>
<body>
	<div class="container-fluid">
		<h2>AE - Trang quản trị dành cho admin</h2>
		<h3 id="big-error"></h3>
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#sanpham" aria-controls="home" role="tab" data-toggle="tab">Quản lý việc đăng bài</a>
				</li>
				<li role="presentation">
					<a href="#thanhvien" aria-controls="tab" role="tab" data-toggle="tab">Quản lý tải khoản thành viên</a>
				</li>
				<li role="presentation">
					<a href="#giaodich" aria-controls="tab" role="tab" data-toggle="tab">Quản lý việc đăng ký onl</a>
				</li>
				<li role="presentation">
					<a href="#danhmuc" aria-controls="tab" role="tab" data-toggle="tab">Quản lý danh mục khóa học</a>
				</li>
				<li role="presentation">
					<a href="#lophoc" aria-controls="tab" role="tab" data-toggle="tab">Quản lý lớp học</a>
				</li>
				<li role="presentation">
					<a href="#lichthi" aria-controls="tab" role="tab" data-toggle="tab">Quản lý lịch thi</a>
				</li>
				<li role="presentation">
					<a href="#hocvien" aria-controls="tab" role="tab" data-toggle="tab">Quản lý danh sách học viên</a>
				</li>
				<li role="presentation">
					<a href="#tkb" aria-controls="tab" role="tab" data-toggle="tab">Quản lý thời khóa biểu</a>
				</li>
				<li role="presentation">
					<a href="#nhansu" aria-controls="tab" role="tab" data-toggle="tab">Quản lý nhân sự</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="sanpham">
					<div class="container-fluid">
						<h3>Danh sách tất cả bài đăng</h3>
						<span class="glyphicon glyphicon-plus btn btn-success pull-right" id="addspbtn" style="z-index: 2;"></span>
						<div class="container-fluid">
							<div id='sua_sp-area'>
								<h4>Sửa bài đăng</h4>
								<label>Tên bài đăng</label>
								<input type="text" id='tensp-edit' class="form-control">
								<label>Giá</label>
								<input type="text" id='gia-edit' class="form-control">
								<label>Bảo hành</label>
								<input type="text" id='baohanh-edit' class="form-control">
								<label>Khuyến mãi</label>
								<input type="text" id='khuyenmai-edit' class="form-control">
								<label>Tình trạng</label>
								<input type="text" id='tinhtrang-edit' class="form-control"><br>
								<span class="btn btn-success" id="edit_sp_btn">Xong</span>
								<span class="btn btn-default" onclick="$('#sua_sp-area').hide(300)">Hủy</span>
							</div>

							<table class="table table-hover" id="tbl-sanpham-list">
								<?php require_once 'function.php'; product_list(); ?>
								<div class="container-fluid text-center lmbtnctn">
									<button onclick="load_more(0,'body-sp-list','sp')" id="loadmorebtn">Load more</button>
								</div>
							</table>
							
						</div>
						<!-- VÙNG LÀM VIỆC -->
						<div class="work-space">
							<!-- Thêm sản phẩm -->
							<div id="add-pr">
								<h3>Thêm sản phẩm</h3>
								<table class="table table-hover">
									<thead>
										<tr>
											<th>ĐẶC ĐIỂM</th><th>GIÁ TRỊ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><label>Tên</label></td>
											<td><input type="text" class="form-control" id="tensp"></td>
										</tr>
										<tr>
											<td><label>Ngày đăng bài</label></td>
											<td><input type="text" class="form-control" id="ngaydb"></td>
										</tr>
										<tr>
											<td><label>Liên hệ</label></td>
											<td><input type="text" class="form-control" id="lienhe"></td>
										</tr>
										<tr>
											<td><label>Nội dung</label></td>
											<td><input type="text" class="form-control" id="noidung"></td>
										</tr>
										<tr>
											<td><label>Lĩnh vực</label></td>
											<td><input type="text" class="form-control" id="linhvuc"></td>
										</tr>
										<tr>
											<td><label>Thời hạn</label></td>
											<td>
												<select class="form-control" id="thoihan">
													<option value="1">Có</option>
													<option value="0">Không</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><label>Vị trí</label></td>
											<td><input type="text" class="form-control" id="vitri"></td>
										</tr>
										<tr>
											<td><label>Yêu cầu</label></td>
											<td><input type="text" class="form-control" id="yeucau"></td>
										</tr>
										<tr>
											<td><label>Chức vụ</label></td>
											<td><input type="text" class="form-control" id="chucvu"></td>
										</tr>
										<tr>
											<td><label>Mã số</label></td>
											<td><input type="text" class="form-control" id="maso"></td>
										</tr>
										<tr>
											<td><label>Đối tượng</label></td>
											<td><input type="text" class="form-control" id="doituong"></td>
										</tr>
										<tr>
											<td><label>Chi tiết</label></td>
											<td><input type="text" class="form-control" id="chitiet"></td>
										</tr>
										<tr>
											<td><label>Email</label></td>
											<td><input type="text" class="form-control" id="email"></td>
										</tr>
										<tr>
											<td><label>SDT</label></td>
											<td><input type="text" class="form-control" id="sdt"></td>
										</tr>
										<tr>
											<td><label>Loại</label></td>
											<td>
												<?php require_once 'function.php'; list_type_pr_for_add(); ?>
											</td>
										</tr>
										<tr>
											<td><label>Link ảnh</label></td>
											<td><input type="text" class="form-control" id="anhchinh"></td>
										</tr>
										<tr>
											<td>
												<span onclick="them_sp()" class="btn btn-success">Thêm</span>
												<span class="btn btn-default" onclick="$('#add-pr').toggle(300);$('#tbl-sanpham-list').toggle(300);">Hủy</span>
												<span id="sp_error"></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<!-- Danh sách sản phẩm -->


						</div>
					</div>
				</div>



				<!-- THÀNH VIÊN -->
				<div role="tabpanel" class="tab-pane" id="thanhvien">
					<h3>Danh sách thành viên</h3>
					<span class="btn btn-success" id="add-admin-btn"><i class="glyphicon glyphicon-plus"></i> Thêm admin</span>
					<div id="add-admin-area" class="form-inline">
						<h3>Thêm Admin</h3>
						<label>Tên:</label>
						<input type="text" class="form-control" id="admin-name">

						<label>Tên tài khoản:</label>
						<input type="text" class="form-control"  id="admin-username">

						<label>Mật khẩu:</label>
						<input type="password" class="form-control" id="admin-password">

						<span class="btn btn-success" onclick="them_admin()">Tạo</span>
						<span class="btn btn-default" onclick="$('#add-admin-area').toggle(300)">Hủy</span><br>
					</div>
					<div class="container-fluid">
						<table class="table table-hover" id="tbl-thanhvien-list">
							<?php require_once 'function.php'; member_list(); ?>
						</table>
					</div>
				</div>



				<!-- GIAO DỊCH -->
				<div role="tabpanel" class="tab-pane" id="giaodich">
					<h3>DANH SÁCH ĐĂNG KÝ</h3>
					<span class="btn btn-info" onclick="list_chuagh()">Chưa đăng ký</span>
					<span class="btn btn-info" onclick="list_dagh()">Đã đăng ký</span>
					<span class="btn btn-info" onclick="list_tatcagh()">Tất cả</span>
					<h4><b>Sắp xếp theo: </b><span id="loai_gd">Chưa đăng ký</span></h4>
					<div class="container-fluid" style="padding-bottom: 20px;">
						<table class="table table-hover" id="tbl-dangky-list">
							<?php require_once 'function.php'; exchange_list(); ?>
						</table>
					</div>
				</div>



				<!-- DANH MỤC -->
				<div role="tabpanel" class="tab-pane" id="danhmuc">
					<h3>DANH MỤC KHÓA HỌC</h3>
					<div class="container">
						<div class="form-inline" id="add-dm">
							<h3>Thêm Danh Mục</h3>
							<label>Tên danh mục:</label>
							<input type="text" class="form-control" id="tendm">

							<label>Chủ đề</label>
							<input type="text" class="form-control" id="chude">

							<span class="btn btn-success" onclick="them_dm()">Thêm</span>
							<span class="btn btn-default" onclick="$('#add-dm').toggle(300);">Hủy</span>
						</div>

						<table class="table table-hover">
							<?php require_once 'function.php'; type_list(); ?>
							<h3 class="glyphicon glyphicon-plus btn btn-success pull-right" id="adddmbtn"></h3>
						</table>

					</div>
				</div>
				
				<!-- LỚP HỌC -->
				<div role="tabpanel" class="tab-pane" id="lophoc">
					<h3>Danh sách Lớp học</h3>
					<span class="btn btn-success" id="add-admin-btn"><i class="glyphicon glyphicon-plus"></i> Thêm admin</span>
					<div id="add-admin-area" class="form-inline">
						<h3>Thêm Admin</h3>
						<label>Tên:</label>
						<input type="text" class="form-control" id="admin-name">

						<label>Tên lớp học:</label>
						<input type="text" class="form-control"  id="admin-username">

						<label>Thời gian dạy</label>
						<input type="password" class="form-control" id="admin-password">

						<span class="btn btn-success" onclick="them_admin()">Tạo</span>
						<span class="btn btn-default" onclick="$('#add-admin-area').toggle(300)">Hủy</span><br>
					</div>
					<div class="container-fluid">
						<table class="table table-hover" id="tbl-lophoc-list">
							<?php require_once 'function.php'; lophoc_list(); ?>
						</table>
					</div>
				</div>
				
				<!-- LỊCH THI -->
				<div role="tabpanel" class="tab-pane" id="lichthi">
					<h3>Danh sách Lịch thi</h3>
					<span class="btn btn-success" id="add-admin-btn"><i class="glyphicon glyphicon-plus"></i> Thêm admin</span>
					<div id="add-admin-area" class="form-inline">
						<h3>Thêm Admin</h3>
						<label>Tên:</label>
						<input type="text" class="form-control" id="admin-name">

						<label>Tên tài khoản:</label>
						<input type="text" class="form-control"  id="admin-username">

						<label>Mật khẩu:</label>
						<input type="password" class="form-control" id="admin-password">

						<span class="btn btn-success" onclick="them_admin()">Tạo</span>
						<span class="btn btn-default" onclick="$('#add-admin-area').toggle(300)">Hủy</span><br>
					</div>
					<div class="container-fluid">
						<table class="table table-hover" id="tbl-lichthi-list">
							<?php require_once 'function.php'; lichthi_list(); ?>
						</table>
					</div>
				</div>
				
				<!-- HOC VIEN -->
				<div role="tabpanel" class="tab-pane" id="hocvien">
					<h3>Danh sách Tất cả học viên</h3>
					<span class="btn btn-success" id="add-admin-btn"><i class="glyphicon glyphicon-plus"></i> Thêm admin</span>
					<div id="add-admin-area" class="form-inline">
						<h3>Thêm Admin</h3>
						<label>Tên:</label>
						<input type="text" class="form-control" id="admin-name">

						<label>Tên tài khoản:</label>
						<input type="text" class="form-control"  id="admin-username">

						<label>Mật khẩu:</label>
						<input type="password" class="form-control" id="admin-password">

						<span class="btn btn-success" onclick="them_admin()">Tạo</span>
						<span class="btn btn-default" onclick="$('#add-admin-area').toggle(300)">Hủy</span><br>
					</div>
					<div class="container-fluid">
						<table class="table table-hover" id="tbl-hocvien-list">
							<?php require_once 'function.php'; hocvien_list(); ?>
						</table>
					</div>
				</div>
				
				
				<!-- THOI KHOA BIEU -->
				<div role="tabpanel" class="tab-pane" id="tkb">
					<h3>Thời Khóa Biểu</h3>
					<span class="btn btn-success" id="add-admin-btn"><i class="glyphicon glyphicon-plus"></i> Thêm admin</span>
					<div id="add-admin-area" class="form-inline">
						<h3>Thêm Thời khóa biểu</h3>
						<label>Tên khóa học:</label>
						<input type="text" class="form-control" id="admin-name">

						<label>Tên lớp học:</label>
						<input type="text" class="form-control"  id="admin-username">

						<label>Tên phòng học:</label>
						<input type="password" class="form-control" id="admin-password">

						<span class="btn btn-success" onclick="them_admin()">Tạo</span>
						<span class="btn btn-default" onclick="$('#add-admin-area').toggle(300)">Hủy</span><br>
					</div>
					<div class="container-fluid">
						<table class="table table-hover" id="tbl-tkb-list">
							<?php require_once 'function.php'; tkb_list(); ?>
						</table>
					</div>
				</div>
				
				<!-- NHANSU -->
				<div role="tabpanel" class="tab-pane" id="nhansu">
					<h3>Nhân sự</h3>
					<span class="btn btn-success" id="add-admin-btn"><i class="glyphicon glyphicon-plus"></i> Thêm admin</span>
					<div id="add-admin-area" class="form-inline">
						<h3>Thêm nhân sự</h3>
						<label>Tên nhân sự:</label>
						<input type="text" class="form-control" id="admin-name">

						<label>Ngày sinh:</label>
						<input type="text" class="form-control"  id="admin-username">

						<label>Phái</label>
						<input type="password" class="form-control" id="admin-password">

						<span class="btn btn-success" onclick="them_admin()">Tạo</span>
						<span class="btn btn-default" onclick="$('#add-admin-area').toggle(300)">Hủy</span><br>
					</div>
					<div class="container-fluid">
						<table class="table table-hover" id="tbl-nhansu-list">
							<?php require_once 'function.php'; nhansu_list(); ?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>
