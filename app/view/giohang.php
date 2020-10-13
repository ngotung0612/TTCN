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
				<form method="post" action="index.php">
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
			<!-- <div class="giohang">
				<div class="sl_giohang"><label class="slsp">0</label></div>
				<div class="ds_sp">
					
				</div>
			</div> -->
		</div>
	</div>
	<div>
		<div class="divTable">
			<div class="divHeading">
				<div class="Cell">Hình Ảnh</div>
				<div class="Cell">Tên Sản Phẩm</div>
				<div class="Cell">Số Lượng</div>
				<div class="Cell">Giá</div>
				<div class="Cell">Action</div>
			</div>
		<?php
			if (isset($_COOKIE['ten'])) {
			$arrGioHang = json_decode($_COOKIE['ten'],true);
			foreach ($arrGioHang as $elem) {
		?>
			
			<div class="Row">
				<div class="Cell">
					<img src="public/img/<?php echo''.$elem["link"];?>">
					<!-- <img src=""> -->
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$elem["ten"];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.$elem["sl"];?></div>
				</div>
				<div class="Cell">
					<div class="text"><?php echo''.number_format($elem["gia"]);?> đ</div>
				</div>
				<div class="Cell">
					<a href="index.php?task=remove_sp&id=<?php echo''.$elem["ma"];?>">Remove</a>
				</div>
			</div>
	
		<?php
	 			}
			} 
		?>
			<a href="index.php?task=removeall">Xóa giỏ hàng</a>
		</div>

		<div style="width: 670px;color: green;text-align: center;margin: auto;margin-top: 10px;">
			<form method="post" action="index.php">
				<div><input type="text" class="address" name="diachi" placeholder="Địa chỉ nhận hàng" required></div>
				<div style="font-size: 30px;">
					Tổng tiền: <?php echo''.number_format($_COOKIE['tongtien']);?> đ
				</div>
				<div>
					<input  type="submit" class="btn_tt" name="task" value="Thanh Toán">
				</div>
			</form>
			
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
		    	tongslsp++;
		    	var parent =$(this).parents('.col-sm-2');
      			var maSP= parent.find('.Masp').val();
      			
		    	$(".slsp").html(tongslsp);
		    	var username =$(".user").html();
		    	
		    	if (username=="undefined"||username==null) {
		    		// alert("username");
		    		// masp.push(maSP_
		    		$.post("index.php",{task:"giohang",masp:maSP,soluong:1},function(data){
		    			$(".ds_sp").html(data);
		    		});
		    		alert("da them vao gio hang");
		    	}else{
		    		alert(username);
		    	}
		    	$(".thongbao_giohang").css("display","none");
		    	// for (var i = masp.length - 1; i >= 0; i--) {
		    		// alert(masp);
		    	// }
		    	
		    	// https://www.youtube.com/watch?v=zfsH34IXzUU
		    	// https://www.youtube.com/watch?v=HvbLH9swaqc
		  //   	if(typeof($(".user")) != "undefined" && variable !== null) {
				//     alert("Please Sign In");
				// }
		    });
		    $(".giohang").hover(function(){
		    	$.get("index.php?task=showPopup",{},function(data){
		    		$(".ds_sp").html(data);
					// var tt=document.cookie("tongtien");
					$(".ds_sp").append( '<div class="giohang_thanhtoan"><a href="index.php?task=giohang"><input type="submit" name="" value="Thanh toán"></a></div> ');
		    	})
		    	
		    });
		   

		});
	</script>
</body>
</html>