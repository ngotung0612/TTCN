<!DOCTYPE html>
<?php 
	
 ?>
<html>
<head>
	<title>Sale Food And Drink</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/home_view.css">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/giohang.css">
	<script type="text/javascript" src="/TTCN/public/js/jquery-1.11.1.js"></script>
</head>
<body>
	<div id="overflow_form">
		<div id="login">
			<form method="post" action="index.php">
				<div class="closelogin">x</div>
				<div class="div_txt_title"><label>Login</label></div>
				<div class="div_username">
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class="div_password">
					<input type="password" name="password" placeholder="Password">
				</div>
				<div class="div_input">
					<input type="submit" name="task" value="Login">
				</div>
				<div class="div_signup"><label class="li_dangky">Sign Up</label></div>
			</form>
		</div>
	</div>
	<div id="overflow_form_dangky">
		<div id="dangky">
			<form method="post" action="index.php">
				<div class="closesigup">x</div>
				<div class="div_txt_title"><label>Sign Up</label></div>
				<div class="div_name">
					<input type="text" name="name" placeholder="Your Name">
				</div>
				<div class="div_username">
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class="div_password">
					<input type="password" name="password"  placeholder="Password">
				</div>
				<div class="div_email">
					<input type="email" id="email"  name="email" placeholder="Email">
				</div>
				<div class="div_phonenumber">
					<input type="text" name="phone" placeholder="Phone Number">
				</div>
				<div class="div_input">
					<input type="submit" name="task" value="Sign Up">
				</div>
				<div class="div_signup"><label class="li_dangnhap">Sign in</label></div>
			</form>
		</div>
	</div>
	<div class="main" >
		<div class="layout_top">
			<div class="logo">
				<a href="index.php">
					<div class="logo_img">
					</div>
				</a>
			</div>
			<div class="timkiem">
				<form action="" method="post" action="index.php">
					<input type="text" class="txt" name="value" placeholder=" Tìm Kiếm">
					<input type="submit" class="inp" name="task" value="Tìm Kiếm">
				</form>
			</div>
			<div class="menu">
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">Menu</a></li>
					<li><a href="">Contact</a></li>
					<?php 
						if (isset($_SESSION['username'])) {
							echo '<li class="user">'.$_SESSION['username'].'</li>';
							echo '<li class="dangxuat"><a href="app/view/logout.php">Sign Out</a></li>';

						}else{
							echo'<li class="li_dangnhap">Sign in</li>';
							echo'<li class="li_dangky">Sign up</li>';
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
				<div class="Cell">Người bán</div>
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
					<div class="text"><?php echo''.$data['username'];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$data['address'];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$data['trangthai'];?></div>
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