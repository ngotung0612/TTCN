<!DOCTYPE html>
<?php 
	if (isset($_SESSION['username'])) {
		// =$a;
	}else{
		header('Location:http://localhost/TTCN');
	}
 ?>
<html>
<head>
	<title>TRANG QUAN LY</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/quanly.css">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/quanlyuser.css">
	<script type="text/javascript" src="/TTCN/public/js/jquery-1.11.1.js"></script>
</head>
<body>
	<div>
		<div class="main" >
			<div class="layout_top">
				<div class="logo">
					<a href="index.php">
						<div class="logo_img">
						</div>
					</a>
				</div>
				<div class="menu">
					<ul>
						<li class="li_hover"><a href="index.php?task=view">Quản Lý Sản Phẩm</a></li>
						<li class="li_hover"><a href="index.php?task=quanlyuser">Quản Lý User</a></li>
						<!-- <li><a href="">Thêm Sản Phẩm</a></li> -->
						<li class="li_hover"><a href="index.php?task=thongke">Thống kê</a></li>
						<?php 
							if (isset($_SESSION['username'])) {
								echo '<li class="user">'.$_SESSION['username'].'</li>';
								echo '<li class="dangxuat"><a href="app/view/logout.php">Sign Out</a></li>';

							}else{
								header('Location: http://localhost/TTCN');

							}
						?>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="show">
			<h1>Danh sách User</h1>
			<div class="showsp">
				<div class="row_title">
					<ul>
						<li>Username</li>
						<li>Name</li>
						<li>Email</li>
						<li>Phone</li>
						<li>Loại</li>
						<li>Action</li>
					</ul>
				</div>
				<form method="get">
					<?php 
						while ($data=$rs->fetch_assoc()) {
					?>
						<div class="row">
							<ul>
								<li class="username"><?php echo($data['username']) ?></li>
								<li class="name"><?php echo($data['name']) ?></li>
								<li class="email"><?php echo($data['email']) ?></li>
								<li class="phone"><?php echo($data['phone']) ?></li>
								<li class="loai"><?php echo($data['loai']) ?></li>
								<li><input type="button" class="btn_sua" name="" value="sửa"><a class="btn_xoa" href="index.php?task=delete_user&id=<?php echo($data['username']) ?>">delete</a></li>
								<!-- <li><input type="submit" class="btn_xoa" name="task" value="Delete"></li> -->
							</ul>
						</div>
					<?php
						}
					?>
				</form>
				
			</div>
			<div class="themsp">
				<form method="post" action="index.php" enctype = "multipart/form-data">
					<div class="form">
						<div>
							<input type="text" class="us" readonly name="username" placeholder="Username" required>
						</div>
						<div id="loai">
							<select name="quyen" class="loaitk" required>
							    <option value="">Loại tài khoản</option>
							    <option value="shop">Nhà Hàng</option>
							    <option value="user">User</option>
							</select>
						</div>
						<div>
							<?php if (isset($thongbao)) {
								echo($thongbao);
							} ?>
							<input class="them" type="submit" name="task" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
		    $(".btn_sua").click(function() {
		    	var parent =$(this).parents('.row');
		    	// alert();
      			var us= parent.find('.username').text();
      			var loai= parent.find('.loai').text();
      			// alert(ten);
		    	$(".loaitk").val(loai);
		    	$(".us").val(us);
		    });
		});  
	</script>
</body>
</html>