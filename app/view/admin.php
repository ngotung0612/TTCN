<!DOCTYPE html>
<html>
<head>
	<title>ADMIN MANAGER</title>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="/TTCN/public/css/quanly.css"> -->
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/admin.css">
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
			<h1>Danh sách sản phẩm</h1>
			<div class="showsp">
				<div class="row_title">
					<ul>
						<li>Mã sản phẩm</li>
						<li>Loại sản phẩm</li>
						<li>Tên sản phẩm</li>
						<li>Giá</li>
						<li>Hình ảnh</li>
						<li>Nhà hàng</li>
						<li>Action</li>
					</ul>
				</div>
				
				<form method="get">
					<?php 
						for ($i=0; $i < count($datashop); $i++) {
					?>
						<div class="row">
							<ul>
								<li class="masp"><?php echo($datashop[$i]->getmasp()) ?></li>
								<li class="loaisp"><?php echo($datashop[$i]->getloai()) ?></li>
								<li class="tensp"><?php echo($datashop[$i]->gettensp()) ?></li>
								<li class="giasp"><?php echo(number_format($datashop[$i]->getgia())) ?> vnđ</li>
								<li class="imgsp"><img src="public/img/<?php echo($datashop[$i]->getlink()) ?>"></li>
								<li class="id_shop"><?php echo($datashop[$i]->getusername()) ?></li>
								<li><a class="btn_xoa" href="index.php?task=delete&id=<?php echo($datashop[$i]->getmasp()) ?>">delete</a>
									<input type="button" class="btn_sua" name="" value="Sửa">
								</li>
								<!-- <li><input type="submit" class="btn_xoa" name="task" value="Delete"></li> -->
							</ul>
						</div>
					<?php
						}
					 ?>
				</form>
				
			</div>
			<div class="themsp">
				<form method="post" enctype = "multipart/form-data" action="index.php">
					<div class="form">
						<div>
							<input type="text" disabled class="ma" name="masp" placeholder="Mã Sản Phẩm" maxlength="12">
						</div>
						<div id="loai">
							<select name="loaisp" class="loai" required>
							    <option value="">Loại sản phẩm</option>
							    <option value="Món Hàn Quốc">Món Hàn Quốc</option>
							    <option value="Nộm">Nộm</option>
							    <option value="Hải sản">Hải sản</option>
							    <option value="Đồ luộc, hấp">Đồ luộc, hấp</option>
							    <option value="Đồ chiên, xào, nướng">Đồ chiên, xào, nướng</option>
							    <option value="Cơm, xôi mì, phở, bún">Cơm, xôi mì, phở, bún</option>
							    <option value="Bánh ngọt">Bánh ngọt</option>
							    <option value="Đồ uống">Đồ uống</option>
							    <option value="Hoa quả">Hoa quả</option>
							</select>
						</div>
						<div>
							<input type="text" required class="ten" name="tensp" placeholder="Tên Sản Phẩm">
						</div>
						<div>
							<input type="number" required class="gia" name="giasp" min="1" placeholder="Giá Sản Phẩm" value="1">
						</div>
						<div>
							<input class="select_file" required type="file" name="link" accept="image/*">
							<!-- <input type="text" name="tensp" placeholder="Tên Sản Phẩm"> -->
						</div>
						<div>
							<input class="id_shop" required type="text" name="shop" placeholder="Tên nhà hàng">
							<!-- <input type="text" name="tensp" placeholder="Tên Sản Phẩm"> -->
						</div>
						<div>
							<input type="hidden" name="username" value="<?php echo($_SESSION['username'])?>">
							<?php if (isset($thongbao)) {
								echo($thongbao);
							} ?>
							<input class="them" type="submit" name="task" value="Sửa Sản Phẩm">
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
      			var ma= parent.find('.masp').text();
      			var loai= parent.find('.loaisp').text();
      			var ten= parent.find('.tensp').text();
      			var a= parent.find('.giasp').text();
      			var b=a.replace(" vnđ","");
      			var gia=b.replace(",","");
      			var shop= parent.find('.id_shop').text();
      			// alert(ten);
		    	$(".ma").val(ma);
		    	$(".loai").val(loai);
		    	$(".ten").val(ten);
		    	$(".gia").val(gia);
		    	$(".id_shop").val(shop);
		    });
		});  
	</script>
</body>
</html>