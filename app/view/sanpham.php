<!DOCTYPE html>
<html>
<head>
	<title><?php echo($data[0]->gettensp()) ?>-<?php echo($data[0]->getmasp()) ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/home_view.css">
	<link rel="stylesheet" type="text/css" href="/TTCN/public/css/sanpham.css">
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
				<form action="index.php" method="post">
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
							echo '<a href="index.php?task=infouser"><li class="user">'.$_SESSION['username'].'</li></a>';
							echo '<li class="dangxuat"><a href="app/view/logout.php">Sign Out</a></li>';

						}else{
							echo'<li class="li_dangnhap">Sign in</li>';
							echo'<li class="li_dangky">Sign up</li>';
						}
					 ?>
					
				</ul>

			</div>
			<div class="giohang">
				<div class="sl_giohang"><label class="slsp"><?php if (isset($_COOKIE['tongslsp'])) {
					echo($_COOKIE['tongslsp']);
				}else{echo(0);} ?></label></div>
				<div class="ds_sp">
					
					
				</div>
				
				
			</div>
		</div>
	</div>
	
	<div class="show">
		<?php
			if (isset($thongbao)) {
				// var_dump($thongbao);exit();
				 echo $thongbao;	
			} 
		?>
		<div class="title_tensp">
			<?php echo($data[0]->getloai()) ?> - <?php echo($data[0]->gettensp()) ?>
		</div>
		<div class="title_hinhanh">
			<img src="public/img/<?php echo($data[0]->getlink()) ?>">
		</div>
		<div class="add_giohang">
			<div id="ten"><?php echo($data[0]->gettensp()) ?> -</div>
			<div id="masp"><?php echo($data[0]->getmasp()) ?></div>
			<div id="nguoiban"><img src="public/img/icon_people.png"><a href="index.php?task=viewshop&id=<?php echo($data[0]->getusername()) ?>"><?php echo($data[0]->getusername()) ?></a></div>
			<div id="gia">Giá: <?php echo(number_format($data[0]->getgia())) ?> vnđ</div>
			<div id="btn"><input type="button" class="btnmua" name="" value="Thêm vào giỏ hàng"></div>
		</div>
		<div class="nhanxet_danhgia">
			<div class="form_nx_dg">
				<label>Nhận xét - đánh giá</label><br>
				<form action="index.php" method="post">
					<input class="txt_nx" type="text" name="text" placeholder="Nhận xét về sản phẩm...">
					<input type="hidden" name="id" value="<?php echo($data[0]->getmasp()) ?>">
					<input class="btn_nx" type="submit" name="task" value="Nhận xét">
				</form>
			</div>
			<div class="nhanxet" style="width: 100%">
				<?php 
				if ($listcomment!=null) {
					while ($data=$listcomment->fetch_assoc()){
				?>
					<div class="listnx">
						<div class="username"><?php echo($data['username']) ?></div>
						<div class="text"><?php echo($data['text']) ?></div>
						<div class="time"><?php echo($data['datetime']) ?></div>
					</div>
				<?php
					}
				}
				 ?>
				<!-- <div class="listnx">
					<div class="username">bacb</div>
					<div class="text">bacbfg</div>
					<div class="time">5/9/1991</div>
				</div> -->
			</div>
			<div class="danhgia">
				
			</div>
		</div>
	    <div class="footer">
			<div class="footer_01">
				<center>ĐỊA CHỈ</center>
				<br>
			</div>
			<div class="footer_02">
				<center>LIÊN HỆ</center>
				<center><br>Email: ngotung0612@gmail.com</center>
				<center><br>Phone: 0399047182</center>
			</div>
			<div class="footer_03">
				<center>CHÍNH SÁCH VÀ ĐIỀU KHOẢN</center>
				<center><br>Chính sách đổi trả</center>
				<center><br>Chính sách vận chuyển</center>
				<center><br>Chính sách bảo mật</center>
			</div>
			<!-- <div class="footer_txt">Phiên bản 1.0</div> -->
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {

		    $(".li_dangnhap").click(function () {
		        $("#overflow_form").css("display","block");
		        $("#login").css("display","block");
		        $("#overflow_form_dangky").css("display","none");
		        $("#dangky").css("display","none");
		    })
		    $(".closelogin").click(function(){
		    	$("#overflow_form").css("display","none");
		        $("#login").css("display","none");
		    })

		    $(".li_dangky").click(function () {
		        $("#overflow_form_dangky").css("display","block");
		        $("#dangky").css("display","block");
		        $("#overflow_form").css("display","none");
		        $("#login").css("display","none");

		    })
		    $(".closesigup").click(function(){
		    	$("#overflow_form_dangky").css("display","none");
		        $("#dangky").css("display","none");
		    })
		    var tongslsp=0;
		    var giohang;
		    // var masp=[];
		    // var sl=[];
		   	
		    $(".btnmua").click(function() {
      			var maSP= $("#masp").text();
      			
		    	var username =$("#nguoiban").text();
		    	$.post("index.php",{task:"giohang",masp:maSP,soluong:1},function(data){
		    			$(".slsp").html(data);
		    		});
		    	alert("Đã thêm sản phẩm vào giỏ hàng");
		    });
		    $(".giohang").hover(function(){
		    	$.get("index.php?task=showPopup",{},function(data){
		    		// alert(data);
		    		$(".ds_sp").html(data);
					// var tt=document.cookie("tongtien");
					$(".ds_sp").append( '<div class="giohang_thanhtoan"><a href="index.php?task=showgiohang"><input type="submit" name="" value="Thanh toán"></a></div> ');
		    	})
		    	
		    });
		   

		});
	</script>
</body>
</html>