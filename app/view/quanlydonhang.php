<!DOCTYPE html>
<?php 
	
 ?>
<html>
<head>
	<title>Sale Food And Drink</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/giohang.css">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/quanly.css">
	<script type="text/javascript" src="/TTCN/public/js/jquery-1.11.1.js"></script>
</head>
<body>
	
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
						<li class="li_hover"><a href="index.php?task=quanlysanpham">Quản Lý Sản Phẩm</a></li>
						<!-- <li><a href="">Thêm Sản Phẩm</a></li> -->
						<li class="li_hover"><a href="index.php?task=quanlydonhang">Quản Lý Đơn Hàng</a></li>
						<?php 
							if (isset($_SESSION['username'])) {
								echo '<li class="user">'.$_SESSION['username'].'</li>';
								echo '<li class="dangxuat"><a href="app/view/logout.php">Sign Out</a></li>';

							}else{
								header('Location: http://localhost/TTCN');

								// echo'<li class="li_dangnhap">Sign in</li>';
								// echo'<li class="li_dangky">Sign up</li>';
							}
						?>
						
					</ul>
				</div>
			</div>
		</div>
	<div>
		<div class="divTable">
			<div class="divHeading">
				<div class="Cell">Mã đơn hàng</div>
				<div class="Cell">Mã sản phẩm</div>
				<div class="Cell">Tên sản phẩm</div>
				<div class="Cell">Giá</div>
				<div class="Cell">Hình ảnh</div>
				<div class="Cell">Người mua</div>
				<div class="Cell">Địa chỉ nhận</div>
				<div class="Cell">Trạng thái đơn hàng</div>
			</div>
		<?php
				while($data=$rs->fetch_assoc()){
		?>
			<div class="Row">
				<div class="Cell">
					<div class="text"><?php echo''.$data['id'];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$data['masp'];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$data['tensp'];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.number_format($data['gia']);?> vnđ</div>
				</div>
				<div class="Cell">
					<img src="public/img/<?php echo''.$data['link'];?>">
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$data['user'];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$data['address'];?></div>
				</div>
				<div class="Cell">

					<div class="text">
						<?php 
							if($data['trangthai']=="đã đặt hàng"){
								echo'<form method="post" action="index.php">';
								echo''.$data['trangthai'];
								echo '<input type="text" hidden="hidden" name="masp" value="'.$data['STT'].'">';
								echo '<br><input type="submit" name="task" value="Giao Hàng">';
								echo '<br><input type="submit" name="task" value="Hủy đơn hàng">';
								echo'</form>';
							}else{
								echo''.$data['trangthai'];
							}
						?>
					</div>
				</div>
				
			</div>
		<?php
				}
			
		?>
			
			
	
			<!-- <a href="index.php?task=removeall">xoa gio hang</a> -->
		</div>

		
	</div>

	
	<script type="text/javascript">
		
	</script>
</body>
</html>