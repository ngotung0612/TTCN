<?php 
/**
 * 
 */
require_once 'app/model/model.php';
class Controller
{
	public $m;
 	public function __construct()
 	{
 		$this->m=new model();
 	}
 	public function trangchu($thongbao)
 	{
 		if (isset($_SESSION['username'])) {
				// var_dump($_SESSION['loai']);exit();
 			if ($_SESSION['loai']=="admin") {
				$datashop=$this->m->admin_getsp();
					require 'app/view/admin.php';
			}
			if ($_SESSION['loai']=="shop") {
				$datashop=$this->m->infoshop($_SESSION['username']);
					// var_dump($datashop);exit();
					# code...
					require 'app/view/quanly.php';
			}if ($_SESSION['loai']=="user") {
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 15;
				$total_records=$this->m->gettotal();
				$total_page = ceil($total_records / $limit);
		       	if ($current_page > $total_page){
			           $current_page = $total_page;
			       }
			       else if ($current_page < 1){
			           $current_page = 1;
			       }
			       $start = ($current_page - 1) * $limit;
				// $rs=$this->m->getdata($start,$limit);
				$data=$this->m->getdata($start,$limit);

				$list_shop=$this->m->getshop();
				require 'app/view/view.php';
					# code...
			}
		}else{
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 15;
			$total_records=$this->m->gettotal();
			$total_page = ceil($total_records / $limit);
		    if ($current_page > $total_page){
			    $current_page = $total_page;
			}
			else if ($current_page < 1){
			    $current_page = 1;
			}
			$start = ($current_page - 1) * $limit;
				// $rs=$this->m->getdata($start,$limit);
			$data=$this->m->getdata($start,$limit);
			
			$list_shop=$this->m->getshop();
			require 'app/view/view.php';
				
		}
 	}
 	public function login()
 	{
 		if (strlen($_POST['username'])>0&&strlen($_POST['password'])>0) {
			$data=$this->m->login($_POST['username'],$_POST['password']);
			if ($data !=null) {
				
				if ($data[0]->getloai()=="admin") {
					$a=$data[0]->getusername();
						if (isset($a)) {
							$_SESSION['username']=$a;
							$_SESSION['loai']=$data[0]->getloai();
						}
					$datashop=$this->m->admin_getsp();
					require 'app/view/admin.php';
					// require_once 'file';
				}else{
					if ($data[0]->getloai()=="shop") {
						// echo("shop");
						$a=$data[0]->getusername();
						if (isset($a)) {
							$_SESSION['username']=$a;
							$_SESSION['loai']=$data[0]->getloai();
						}
						$datashop=$this->m->infoshop($_SESSION['username']);
						// var_dump($_SESSION['username']);exit();
						require 'app/view/quanly.php';
					}else{
						//user
						// var_dump($data[0]->getusername());exit();
						$a=$data[0]->getusername();
						$_SESSION['username']=$a;
						
						$_SESSION['loai']=$data[0]->getloai();
						if (isset($_GET['linksp'])) {
							// var_dump("ok");exit();
							require 'app/view/sanpham.php';
						}else{
							$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
							$limit = 15;
							$total_records=$this->m->gettotal();
							$total_page = ceil($total_records / $limit);
					       	if ($current_page > $total_page){
						           $current_page = $total_page;
						       }
						       else if ($current_page < 1){
						           $current_page = 1;
						       }
						       $start = ($current_page - 1) * $limit;
							// $rs=$m->getdata($start,$limit);
							$data=$this->m->getdata($start,$limit);
							$list_shop=$this->m->getshop();
							// var_dump($_SESSION['username']);exit();
							// header('Location: http://localhost/TTCN');
							require 'app/view/view.php';
						}
						
					}
				}
			}else{
				$thongbao="Tài khoản hoặc mật khẩu không chính xác!";
				header('Location: http://localhost/TTCN');
			}
		}else{
			$thongbao="nhap username/password";
			header('Location: http://localhost/TTCN');
			
		}
 	}
 	public function signup()
 	{
 		
		if (strlen($_POST['name'])>0&&strlen($_POST['username'])>0&&strlen($_POST['password'])>0&&strlen($_POST['email'])>0&&strlen($_POST['phone'])>0) {
			$loai="user";
			// var_dump($loai);exit();
			$data=$this->m->signup($_POST['name'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['phone'],$loai);
			// var_dump($data);exit();
			if ($data==true) {
				$thongbao="Bạn đã đăng ký thàng công!";
				
				// echo("ok");
			}else{
				$thongbao="Đăng ký thất bại!";
				// require 'app/view/view.php';
			}

			// require 'app/view/view.php';
		}else{
			$thongbao="Đăng ký thất bại!";
		}
		// $this->trangchu();
		if (isset($_SESSION['username'])) {
				// var_dump($_SESSION['loai']);exit();
			if ($_SESSION['loai']=="shop") {
				$datashop=$this->m->infoshop($_SESSION['username']);
					// var_dump($datashop);exit();
					# code...
					require 'app/view/quanly.php';
			}if ($_SESSION['loai']=="user") {
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 15;
				$total_records=$this->m->gettotal();
				$total_page = ceil($total_records / $limit);
		       	if ($current_page > $total_page){
			           $current_page = $total_page;
			       }
			       else if ($current_page < 1){
			           $current_page = 1;
			       }
			       $start = ($current_page - 1) * $limit;
				// $rs=$this->m->getdata($start,$limit);
				$data=$this->m->getdata($start,$limit);
				$list_shop=$this->m->getshop();
				require 'app/view/view.php';
					# code...
			}
		}else{
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 15;
			$total_records=$this->m->gettotal();
			$total_page = ceil($total_records / $limit);
		    if ($current_page > $total_page){
			    $current_page = $total_page;
			}
			else if ($current_page < 1){
			    $current_page = 1;
			}
			$start = ($current_page - 1) * $limit;
				// $rs=$this->m->getdata($start,$limit);
			$data=$this->m->getdata($start,$limit);
			$list_shop=$this->m->getshop();
			require 'app/view/view.php';
				
		}

 	}
 	
 	public function addsanpham()
 	{
 		$loaisp=$_POST['loaisp'];
 		// var_dump($loaisp);exit();
		$tensp=$_POST['tensp'];
		$gia=$_POST['giasp'];
		$username=$_POST['username'];
		$file_tmp=$_FILES['link']['tmp_name'];
		$name= $_FILES['link']["name"];


		if (strlen($loaisp)<1||strlen($tensp)<1||strlen($gia)<1||strlen($name)<1) {
			$datashop=$this->m->infoshop($_SESSION['username']);
			$thongbao="Thêm sản phẩm thất bại";
			require_once 'app/view/quanly.php';
		}else{
			$value=$this->m->addsanpham($loaisp,$tensp,$gia,$name,$username);
			if (move_uploaded_file($file_tmp,"public/img/".$name)==true&&$value==true) {
				// $_SESSION['username']=$a;
				// var_dump($_SESSION['username']);exit();
				// $
				$datashop=$this->m->infoshop($_SESSION['username']);
				$thongbao="Thêm sản phẩm thành công";
				require_once 'app/view/quanly.php';
			}else{
				$datashop=$this->m->infoshop($_SESSION['username']);
				$thongbao="Thêm sản phẩm thất bại!";
				require_once 'app/view/quanly.php';
			}
		}
 	}
 	public function deletesp()
 	{
 		if (isset($_GET['id'])) {
 			$data=$this->m->deletesp($_GET['id']);
 			header('Location: http://localhost/TTCN');
 			// $datashop=$this->m->infoshop($_SESSION['username']);
 			// require_once 'app/view/quanly.php';
 		}
 		
 	}
 	public function timkiem()
 	{
 		if (isset($_SESSION['username'])) {
				// var_dump($_SESSION['loai']);exit();
			if ($_SESSION['loai']=="shop") {
				$datashop=$this->m->infoshop($_SESSION['username']);
					// var_dump($datashop);exit();
					# code...
					require 'app/view/quanly.php';
			}if ($_SESSION['loai']=="user") {
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 15;
				$total_records=count($this->m->gettk($_POST['value']));
				$total_page = ceil($total_records / $limit);
		       	if ($current_page > $total_page){
			           $current_page = $total_page;
			       }
			       else if ($current_page < 1){
			           $current_page = 1;
			       }
			       $start = ($current_page - 1) * $limit;
				// $rs=$m->getdata($start,$limit);
				$data=$this->m->timkiem($_POST['value'],$start,$limit);
				$list_shop=$this->m->getshop();
				require 'app/view/view.php';
					# code...
			}
		}else{
			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 15;
			$total_records=count($this->m->gettk($_POST['value']));
			$total_page = ceil($total_records / $limit);
		    if ($current_page > $total_page){
			    $current_page = $total_page;
			}
			else if ($current_page < 1){
			    $current_page = 1;
			}
			$start = ($current_page - 1) * $limit;
				// $rs=$m->getdata($start,$limit);
			$data=$this->m->timkiem($_POST['value'],$start,$limit);
			$list_shop=$this->m->getshop();
			require 'app/view/view.php';
				
		}
 	}
 	public function laySPGioHang(){
 		if (isset($_COOKIE['ten'])) {
 			$arrGioHang = json_decode($_COOKIE['ten'],true);
 			// var_dump($arrGioHang);
 			$tongtien = 0;
 			$tongslsp=0;
 			foreach ($arrGioHang as $elem) {
 				if ($tongtien == 0) {
 					$tongslsp=1;
 					$tongtien =(int)$elem["gia"];
 				}else{
 					$tongtien = $tongtien + (int)$elem["gia"];
 					$tongslsp++;
 				}
 				
 			}
 			// echo("")
 			setcookie("tongtien",json_encode($tongtien,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 			setcookie("tongslsp",json_encode($tongslsp,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60);
 			// var_dump($tongtien);
 			// var_dump($tongslsp);
 			echo'Bạn đang có '.$tongslsp.' sản phẩm trong giỏ hàng';
 		}else{
 			echo("Giỏ hàng rỗng");
 		}
 	}
 	public function themgiohang($ma,$soluong)
 	{

 		$data=$this->m->giohang($ma);
 		if (!isset($_COOKIE['ten'])) {
 			$sp = array(
 			"ten" => $data['0']->gettensp(),
			"ma" => $data['0']->getmasp(),
			"link" => $data['0']->getlink(),
			"gia" => $data['0']->getgia(),
			"sl" => $soluong
 			);
 			$arrSP = [];
 			array_push($arrSP, $sp);
 			$tongslsp=1;
 			setcookie("ten", json_encode($arrSP,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 			setcookie("tongslsp", json_encode($tongslsp,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 			echo($tongslsp);
 		}else{
 			$sp = array(
 			"ten" => $data['0']->gettensp(),
			"ma" => $data['0']->getmasp(),
			"link" => $data['0']->getlink(),
			"gia" => $data['0']->getgia(),
			"sl" => $soluong
 			);
 			$str=$_COOKIE['ten'];
 			$sl=$_COOKIE['tongslsp'];
 			$sl++;
 			$arrC = json_decode($str);
 			array_push($arrC,$sp);
 			echo($sl);
 			setcookie("ten",json_encode($arrC,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 			setcookie("tongslsp", json_encode($sl,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 		}
 	}
 	public function themgiohang1($ma,$soluong)
 	{
 		$data=$this->m->giohang($ma);
 		if (isset($_COOKIE['ten'])) {
 			$arraysp = $_COOKIE['ten'];
 			$sp=array(
 				"ten" => $data['0']->gettensp(),
 				"ma" => $data['0']->getmasp(),
 				"link" => $data['0']->getlink(),
 				"gia" => $data['0']->getgia(),
 				"sl" => $soluong
 			);
 			array_push($arraysp, $sp);
 			// array_push($arr,json_encode($arraysp,JSON_UNESCAPED_UNICODE )) ;
 			// $tongtien=$tongtien+$data['0']->getgia()*$soluong;
 			var_dump($arraysp);
 			setcookie("ten", json_encode($arraysp,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 		}else{
 			$arraysp = [];
 			$sp=array(
 				"ten" => $data['0']->gettensp()+"dasdasd",
 				"ma" => $data['0']->getmasp(),
 				"link" => $data['0']->getlink(),
 				"gia" => $data['0']->getgia(),
 				"sl" => $soluong
 			);
 			array_push($arraysp, $sp);
 			// array_push($arr,json_encode($arraysp,JSON_UNESCAPED_UNICODE )) ;
 			$tongtien=$tongtien+$data['0']->getgia()*$soluong;
 			var_dump($arraysp);
 			setcookie("ten", json_encode($arraysp,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 		}
 	}
 	public function giohang()
 	{
 		require 'app/view/giohang.php';
 	}
 	public function remove($id)
 	{
 		// echo($id);
 		$i=0;
 		$arrGioHang=json_decode($_COOKIE['ten'],true);
 		// var_dump(count($arrGioHang));exit();
 		for ($i=0; $i < count($arrGioHang); $i++) { 
 			if ( $arrGioHang[$i]["ma"] ==$id) {
 				// var_dump($elem["ma"]);
 				unset($arrGioHang[$i]);
 				// var_dump($elem);exit();
 				
 			}
 			// $i++;
 		}
 		// foreach ($arrGioHang as $elem) {
 		// 	if ($id == $elem["ma"]) {
 		// 		// var_dump($elem["ma"]);
 		// 		unset($arrGioHang[$i]);
 		// 		// var_dump($elem);exit();
 				
 		// 	}
 		// 	$i++;
 				
 		// }
 		// var_dump($arrGioHang);
 		setcookie("ten",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()+2*24*60*60); 
 		header('Location:http://localhost/TTCN/index.php?task=showgiohang');
 	}
 	public function removeall()
 	{
 		// echo($id);
 		// var_dump($arrGioHang);
 		setcookie("ten",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()-999999); 
 		setcookie("tongtien",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()-999999); 
 		setcookie("tongslsp",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()-999999); 
 		// require 'app/view/giohang.php';
 		header('Location:http://localhost/TTCN/index.php');
 	}
 	public function thanhtoan()
 	{
 		if (isset($_COOKIE['ten'])&&isset($_COOKIE['tongslsp'])&&isset($_COOKIE['tongtien'])&&isset($_SESSION['username'])) {
 			$your_user_login=$_SESSION['username'];
 			$tongtien=$_COOKIE['tongtien'];
 			$tongslsp=$_COOKIE['tongslsp'];
 			$id=md5(uniqid($your_user_login, true));
 			$user=$_SESSION['username'];
 			// var_dump($user);exit();
 			$trangthai="đã đặt hàng";
 			$date="";
 			$address=$_POST['diachi'];
 			$arrGioHang=json_decode($_COOKIE['ten'],true);
 			foreach ($arrGioHang as $elem) {
 				$username=$this->m->getname($elem['ma']);
 				// $dâta=
 				$this->m->thongke($id,$elem['ma'],$elem['ten'],$elem['gia'],$elem['link'],$username,
 					$user,$address,$trangthai);
 			}
	 		setcookie("ten",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()-999999); 
	 		setcookie("tongtien",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()-999999); 
	 		setcookie("tongslsp",json_encode($arrGioHang,JSON_UNESCAPED_UNICODE ), time()-999999); 
	 		header('Location:http://localhost/TTCN/index.php');
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 	}
 	public function infouser()
 	{
 		if (isset($_SESSION['username'])&&isset($_SESSION['loai'])) {
 			if ($_SESSION['loai']=="user") {
 				$user=$_SESSION['username'];
 				$rs=$this->m->getmadonhang($user);
 				// var_dump($rs);
 				require 'app/view/infouser.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 	}
 	public function quanlydonhang()
 	{
 		if (isset($_SESSION['username'])&&isset($_SESSION['loai'])) {
 			if ($_SESSION['loai']=="shop") {
 				$user=$_SESSION['username'];
 				$rs=$this->m->quanlydonhang($user);
 				// var_dump($rs);
 				require 'app/view/quanlydonhang.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 	}
 	public function updatedonhang()
 	{
 		if ($_POST['task']=="Giao Hàng"&&isset($_POST['masp'])&&$_SESSION['loai']=="shop") {
 			$a="đã giao hàng";
 			$value=$this->m->updatedonhang($a,$_POST['masp']);
 			if ($value==true) {
 				$user=$_SESSION['username'];
 				$rs=$this->m->quanlydonhang($user);
 				// var_dump($rs);
 				require 'app/view/quanlydonhang.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 		}
 		if ($_POST['task']=="Hủy đơn hàng"&&isset($_POST['masp'])&&$_SESSION['loai']=="shop") {
 			$a="đã hủy đơn hàng";
 			$value=$this->m->updatedonhang($a,$_POST['masp']);
 			if ($value==true) {
 				$user=$_SESSION['username'];
 				$rs=$this->m->quanlydonhang($user);
 				// var_dump($rs);
 				require 'app/view/quanlydonhang.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 	}
 	public function quanlyuser()
 	{
 		if (isset($_SESSION['username'])&&isset($_SESSION['loai'])) {
 			if ($_SESSION['loai']=="admin") {
 				$user=$_SESSION['username'];
 				$rs=$this->m->quanlyuser();
 				// var_dump($rs);exit();
 				require 'app/view/quanlyuser.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 	}
 	public function suasanpham()
 	{
 		$masp=$_POST['masp'];
		$tensp=$_POST['tensp'];
		$gia=$_POST['giasp'];
		$username=$_POST['shop'];
		$file_tmp=$_FILES['link']['tmp_name'];
		$name= $_FILES['link']["name"];


		if (strlen($masp)<1||strlen($tensp)<1||strlen($gia)<1||strlen($name)<1) {
			$datashop=$this->m->admin_getsp();
			$thongbao="Sửa sản phẩm thất bại";
			require_once 'app/view/admin.php';
		}else{
			$value=$this->m->suasanpham($masp,$tensp,$gia,$name,$username);
			// var_dump($value);exit();
			if (move_uploaded_file($file_tmp,"public/img/".$name)==true&&$value==true) {
				// $_SESSION['username']=$a;
				// var_dump($_SESSION['username']);exit();
				// $
				$datashop=$this->m->admin_getsp();
				$thongbao="Sửa sản phẩm thành công";
				require_once 'app/view/admin.php';
			}else{
				$datashop=$this->m->admin_getsp();
				$thongbao="Sửa sản phẩm thất bại!";
				require_once 'app/view/admin.php';
			}
		}
 	}
 	public function updateuser()
 	{
 		$username=$_POST['username'];
		$loai=$_POST['quyen'];
		$value=$this->m->updateuser($username,$loai);
		if ($value==true) {
			$rs=$this->m->quanlyuser();
			$thongbao="Update thành công";
			require_once 'app/view/quanlyuser.php';
		}else{
			$rs=$this->m->quanlyuser();
			$thongbao="Update thất bại";
			require_once 'app/view/quanlyuser.php';
		}
 	}
 	public function capnhatsp()
 	{
 		$masp=$_POST['massp'];
		$tensp=$_POST['tensp'];
		$gia=$_POST['giasp'];
		$username=$_POST['shop'];
		$file_tmp=$_FILES['link']['tmp_name'];
		$name= $_FILES['link']["name"];


		if (strlen($masp)<1||strlen($tensp)<1||strlen($gia)<1||strlen($name)<1) {
			$datashop=$this->m->infoshop($_SESSION['username']);
			$thongbao="Sửa sản phẩm thất bại";
			require_once 'app/view/quanly.php';
			
		}else{
			$value=$this->m->suasanpham($masp,$tensp,$gia,$name,$username);
			// var_dump($value);exit();
			if (move_uploaded_file($file_tmp,"public/img/".$name)==true&&$value==true) {
				// $_SESSION['username']=$a;
				// var_dump($_SESSION['username']);exit();
				// $
				$datashop=$this->m->infoshop($_SESSION['username']);
				$thongbao="Cập nhật sản phẩm thành công";
				require_once 'app/view/quanly.php';
			}else{
				$datashop=$this->m->infoshop($_SESSION['username']);
				$thongbao="Sửa sản phẩm thất bại!";
				require_once 'app/view/quanly.php';
			}
		}
 	}
 	public function viewsp()
 	{
 		if (isset($_GET['id'])) {
 			// $this->m->viewsp($_GET['id']);
 			$data=$this->m->giohang($_GET['id']);
 			$listcomment=$this->m->listcomment($_GET['id']);
 			if ($data!=null) {
 				require 'app/view/sanpham.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 			
 		}
 		
 	}
 	public function viewshop()
 	{
 		if (isset($_GET['id'])) {
 			$title='Cửa hàng: '.$_GET['id'];
 			$data=$this->m->getdatashop($_GET['id']);
			$list_shop=$this->m->getshop();
 			require 'app/view/viewlistsp.php';
 		}
 	}
 	public function viewloai()
 	{
 		if (isset($_GET['loai'])) {

 			switch ($_GET['loai']) {
 				case '1':
 					$loai="Món Hàn Quốc";
 					break;
 				case '2':
 					$loai="Đồ luộc, hấp";
 					break;
 				case '3':
 					$loai="Đồ chiên, xào, nướng";
 					break;
 				case '4':
 					$loai="Nộm";
 					break;
 				case '5':
 					$loai="Cơm, xôi mì, phở, bún";
 					break;
 				case '6':
 					$loai="Bánh ngọt";
 					break;
 				case '7':
 					$loai="Đồ uống";
 					break;
 				case '8':
 					$loai="Hoa quả";
 					break;
 				case '9':
 					$loai="Hải sản";
 					break;
 				default:
 					$loai="null";
 					break;
 			}
 			if ($loai!="null") {
 				$title='Danh mục: '.$loai;
 				$data=$this->m->getdataloai($loai);
				$list_shop=$this->m->getshop();
	 			require 'app/view/viewlistsp.php';
 			}else{
 				header('Location:http://localhost/TTCN/index.php');
 			}
 			
 		}
 	}
 	public function delete_user()
 	{
 		if (isset($_GET['id'])) {
 			$rs=$this->m->delete_user($_GET['id']);
 			if ($rs==true) {
 				header('Location:http://localhost/TTCN/index.php?task=quanlyuser');
 			}else{
 				echo("xoa that bai");
 			}
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 	}
 	public function thongke()
 	{
 		$timestamp = time();
 		date_default_timezone_set("Asia/Bangkok");
 		echo(date("F d/m/Y H:i:s", $timestamp));
 		$soluongdon=$this->m->soluongdon();
 		$num=0;
 		$tt=0;
 		while ($data=$soluongdon->fetch_assoc()) {
 			$num++;
 			$tt+=$data['gia'];
 		}
 		echo("<br>Tổng số đơn hàng: ".$num);
 		echo("<br>Tổng số tiền giao dịch: ".number_format($tt))." vnđ";
 	}
 	public function nhanxet($id,$text,$user)
 	{
 		$timestamp = time();
 		date_default_timezone_set("Asia/Bangkok");
 		$datetime=date("Y-m-d H:i:s", $timestamp);
 		$rs=$this->m->nhanxet($id,$text,$user,$datetime);
 		if ($rs==true) {
 			header('Location:http://localhost/TTCN/index.php?task=viewsp&id='.$id);
 		}else{
 			header('Location:http://localhost/TTCN/index.php');
 		}
 		
 	}
 	// public function getshop()
 	// {
 		
 	// 	require 'file';
 	// }
 	
}

 ?>