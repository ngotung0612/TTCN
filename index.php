<?php 
session_start();
require_once 'app/controller/controller.php';
$c=new controller();
if (isset($_POST['task'])) {
	$task=$_POST['task'];
	// var_dump($task);
}else{
	$task='view';
}
if (isset($_GET['task'])) {
	$task=$_GET['task'];
}

$list=array();
switch ($task) {
	case 'view':
		$thongbao="";
		$c->trangchu($thongbao);
		break;
		// require 'app/view/view.php';
			// $string ="<script>abc</script>";
			// echo (htmlspecialchars($string, ENT_QUOTES, 'UTF-8'));exit();
		break;
	case 'Login':
		
		// require 'app/view/view.php';
		$c->login();
		break;
	case 'Sign Up':
		
		$c->signup();
		break;
	case 'Thêm Sản Phẩm':
		$c->addsanpham();
		break;

	case 'Cập Nhật Sản Phẩm':
	// var_dump($_POST['massp']);exit();
		$c->capnhatsp();
		break;
	case 'Sửa Sản Phẩm':
		$c->suasanpham();
		break;
	case 'Update':
		// var_dump("abc");
		$c->updateuser();
		break;
	case 'delete':
		// var_dump($_GET['id']);exit();
		$c->deletesp();
		break;
	case 'Tìm Kiếm':
		$c->timkiem();
		break;

	case 'giohang':
		// var_dump($_POST['masp']);exit(); 
	    $c->themgiohang($_POST['masp'],$_POST['soluong']);
		break;
	case 'showPopup':
		$c->laySPGioHang();
		break;
	case 'showgiohang':
		// if (isset($_SESSION["username"])) {
			if (isset($_COOKIE['tongtien'])&&isset($_COOKIE['tongslsp'])) {
				$c->giohang();
			}else{
				echo("Giỏ hàng rỗng");
			}
		// }
		// else{
		// 	echo "Bạn cần đăng nhập trước khi thanh toán";
		// }
		break;
	case 'remove_sp':
		// echo("remove");
		$c->remove($_GET['id']);
		break;
	case 'removeall':
		$c->removeall();
		break;
	case 'Thanh Toán':
		// echo("arg1");
		if (isset($_SESSION["username"])) {
			$c->thanhtoan();
		}
		else{
			echo "Bạn cần đăng nhập trước khi thanh toán";
		}
		break;
	case 'infouser':
		// var_dump("abc");exit();
		$c->infouser();
		break;
	case 'quanlysanpham':
		$thongbao="";
		$c->trangchu($thongbao);
		break;
	case 'quanlydonhang':
		// echo("abc");
		$c->quanlydonhang();
		# code...
		break;
	case 'Giao Hàng':
		$c->updatedonhang();
		break;
	case 'Hủy đơn hàng':
		$c->updatedonhang();
		break;
	case 'quanlyuser':
		$c->quanlyuser();
		break;
	case 'viewsp':
		
		if (isset($_GET['id'])) {
			$c->viewsp();
		}
		// if (isset($_POST['username'])) {
		// 	$c->viewsp_login();
		// }
		# code...
		break;
	case 'viewshop':
		// echo("abc");
		$c->viewshop();
		break;
	case 'view_loai':
		$c->viewloai();
		break;
	case 'delete_user':
		if (isset($_SESSION['username'])&&isset($_GET['id'])) {
			if ($_SESSION['username']=="admin") {
				// echo($_GET['id']);
				$c->delete_user();
			}else{
				header('Location:http://localhost/TTCN/index.php');
			}
		}else{
			echo("Bạn cần đăng nhập trước!");
		}
		break;
	case 'thongke':
		if (isset($_SESSION['username'])) {
			if ($_SESSION['username']=="admin") {
				// echo($_GET['id']);
				$c->thongke();
			}else{
				header('Location:http://localhost/TTCN/index.php');
			}
		}else{
			echo("Bạn cần đăng nhập trước!");
		}
		break;
	case 'Nhận xét':
		if (isset($_SESSION['username'])) {
			if (isset($_POST['text'])&&strlen(trim($_POST['text']))!=0&&isset($_POST['id'])) {
				$c->nhanxet($_POST['id'],$_POST['text'],$_SESSION['username']);
			}else{
				header('Location:http://localhost/TTCN/index.php');
			}
		}else{
			echo("Bạn cần đăng nhập để nhận xét!");
		}
		break;
	default:
		# code...
		break;
}


?>