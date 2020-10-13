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
						<li class="li_hover"><a href="">Quản Lý Sản Phẩm</a></li>
						<li class="li_hover"><a href="index.php?task=quanlydonhang">Quản Lý Đơn Hàng</a></li>
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
					<input type="button" style="" class="add" name="" value="thêm sản phẩm">
					<ul>
						<li>Mã sản phẩm</li>
						<li>Loại sản phẩm</li>
						<li>Tên sản phẩm</li>
						<li>Giá</li>
						<li>Hình ảnh</li>
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
								<li><img src="public/img/<?php echo($datashop[$i]->getlink()) ?>"></li>
								<li><input type="button" name="" class="btn_sua" value="Sửa"><a class="btn_xoa" href="index.php?task=delete&id=<?php echo($datashop[$i]->getmasp()) ?>">delete</a></li>
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
						<div id="loai">
							<select name="loaisp" required>
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
							<input type="text" name="tensp" placeholder="Tên Sản Phẩm" required>
						</div>
						<div>
							<input type="number" name="giasp" min="0" step="500" placeholder="Giá Sản Phẩm" required>
						</div>
						<div>
							<input class="select_file" type="file" name="link" accept="image/*" required>
							<!-- <input type="text" name="tensp" placeholder="Tên Sản Phẩm"> -->
						</div>
						<div>
							<input type="hidden" name="username" value="<?php echo($_SESSION['username'])?>">
							<?php if (isset($thongbao)) {
								echo($thongbao);
							} ?>
							<input class="them" type="submit" name="task" value="Thêm Sản Phẩm">
						</div>
					</div>
				</form>
			</div>
			<div class="suasp">
				<form method="post" action="index.php" enctype = "multipart/form-data">
					<div class="form">
						<div>
							<input type="text" class="ma" name="massp" placeholder="Mã Sản Phẩm">
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
							<input type="text" class="ten" name="tensp" placeholder="Tên Sản Phẩm" required>
						</div>
						<div>
							<input type="number" class="gia" name="giasp" min="0" step="500" placeholder="Giá Sản Phẩm" required>
						</div>
						<div>
							<input class="select_file" type="file" name="link" accept="image/*" required>
							<!-- <input type="text" name="tensp" placeholder="Tên Sản Phẩm"> -->
						</div>
						<div>
							<input type="hidden" name="shop" value="<?php echo($_SESSION['username'])?>">
							<?php if (isset($thongbao)) {
								echo($thongbao);
							} ?>
							<input class="them" type="submit" name="task" value="Cập Nhật Sản Phẩm">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
		    $(".btn_sua").click(function() {
		    	$(".themsp").css("display","none");
		    	$(".suasp").css("display","block");
		    	var parent =$(this).parents('.row');
		    	// alert();
      			var ma= parent.find('.masp').text();
      			// alert(ma);
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
		    });
		    $(".add").click(function() {
		    	// alert("b");
		    	$(".themsp").css("display","block");
		    	$(".suasp").css("display","none");
		    });
		});  
	</script>
</body>
</html>