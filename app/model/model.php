<?php 
/**
 * 
 */
require_once 'app/model/item.php';
require_once 'app/model/user.php';
class model
{
	public $con;
 	function __construct()
 	{
 		$this->con=mysqli_connect('localhost','root','','ttcn');
 	}
 	public function admin_getsp()
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham");
 		$A=array();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function getdata($start,$limit)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham news LIMIT $start, $limit");
 		$A=array();
 		// var_dump($rs);exit();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function giohang($masp)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham WHERE masp LIKE '$masp'");
 		$A=array();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function login($username,$password)
 	{
 		$rs=$this->con->query("SELECT * FROM user WHERE username LIKE '$username' AND password LIKE '$password'");
 		// var_dump($rs);exit();
 		$A=array();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new user($item['name'],$item['username'],$item['password'],$item['email'],$item['phone'],$item['loai']);
 		}
 		return $A;
 	}
 	public function signup($name,$username,$password,$email,$phone,$loai)
 	{
 		$rs=$this->con->query("INSERT INTO `user` (`name`, `username`, `password`, `email`, `phone`, `loai`) VALUES ('$name', '$username', '$password', '$email', '$phone', '$loai')");
 		return $rs;
 	}
 	
 	public function addsanpham($loaisp,$tensp,$gia,$link,$username)
 	{
 		$rs=$this->con->query("INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `loai`, `link`, `username`) VALUES (NULL, '$tensp', '$gia', '$loaisp', '$link', '$username')");
 		return $rs;
 	}
 	public function deletesp($masp)
 	{
 		$rs=$this->con->query("DELETE FROM `sanpham` WHERE `sanpham`.`masp` = '$masp'");
 		return $rs;
 		
 	}
 	public function infoshop($username)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham WHERE username LIKE '$username'");
 		$A=array();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function gettotal()
 	{
 		$result=$this->con->query("select count(masp) as total from sanpham");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 		return $total_records;
 	}
 	public function gettk($value)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham WHERE `tensp` LIKE '%$value%'");
 		// var_dump($rs);exit();
 		$A=array();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function timkiem($value,$start,$limit)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham WHERE `tensp` LIKE '%$value%'");
 		// var_dump($rs);exit();
 		$A=array();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function getname($masp)
 	{
 		$rs=$this->con->query("SELECT `username` FROM `sanpham` WHERE masp like '$masp'");
 		$data=$rs->fetch_assoc();
 		return $data['username'];
 	}
 	public function thongke($id,$ma,$ten,$gia,$link,$username,$user,$address,$trangthai)
 	{
 		$rs=$this->con->query("INSERT INTO `thongke` (`id`, `masp`, `tensp`, `gia`, `link`, `username`, `user`, `address`, `trangthai`) VALUES ('$id', '$ma', '$ten', '$gia', '$link', '$username', '$user', '$address', '$trangthai')");
 		// var_dump($rs);exit();
 		return $rs;
 	}
 	public function getmadonhang($user)
 	{
 		$rs=$this->con->query("SELECT * FROM `thongke` WHERE user like '$user'");
 		// $data=$rs->fetch_assoc();
 		return $rs;
 	}
 	public function quanlydonhang($username)
 	{
 		$rs=$this->con->query("SELECT * FROM `thongke` WHERE username like '$username'");
 		// $data=$rs->fetch_assoc();
 		return $rs;
 	}
 	public function updatedonhang($a,$id)
 	{
 		$rs=$this->con->query("UPDATE `thongke` SET `trangthai` = '$a' WHERE `thongke`.`STT` = '$id'");
 		// $data=$rs->fetch_assoc();
 		return $rs;
 	}
 	public function quanlyuser()
 	{
 		$rs=$this->con->query("SELECT name,username,email,phone,loai FROM `user`");
 		// $data=$rs->fetch_assoc();
 		return $rs;
 	}
 	public function updateuser($username,$loai)
 	{
 		$rs=$this->con->query("UPDATE `user` SET `loai` = '$loai' WHERE `user`.`username` = '$username'");
 		// $data=$rs->fetch_assoc();
 		return $rs;
 		
 	}
 	public function suasanpham($ma,$ten,$gia,$link,$username)
 	{
 		$rs=$this->con->query("UPDATE `sanpham` SET `tensp` = '$ten', `gia` = '$gia', `link` = '$link', `username` = '$username' WHERE `sanpham`.`masp` = '$ma'");
 		return $rs;
 	}
 	public function getshop()
 	{
 		$rs=$this->con->query("SELECT `username` FROM `user` WHERE loai like 'shop' LIMIT 0, 5");
 		// var_dump($rs);exit();
 		// $data=$rs->fetch_assoc();
 		return $rs;
 	}
 	public function getdatashop($id)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham WHERE username like '$id'");
 		$A=array();
 		// var_dump($rs);exit();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function getdataloai($loai)
 	{
 		$rs=$this->con->query("SELECT * FROM sanpham WHERE loai like '$loai'");
 		$A=array();
 		// var_dump($rs);exit();
 		while ($item=$rs->fetch_assoc()) {
 			$A[]=new Item($item['masp'],$item['tensp'],$item['gia'],$item['loai'],$item['link'],$item['username']);
 		}
 		return $A;
 	}
 	public function delete_user($id)
 	{
 		$rs=$this->con->query("DELETE FROM `user` WHERE `user`.`username` ='$id'");
 		return$rs;
 	}
 	
 	public function soluongdon()
 	{
 		$rs=$this->con->query("SELECT * FROM `thongke`");
 		// var_dump($rs);exit();
 		return $rs;
 	}
 	public function nhanxet($id,$text,$user,$datetime)
 	{
 		$rs=$this->con->query("INSERT INTO `nhanxet` (`id`, `masp`, `username`, `text`, `datetime`) VALUES (NULL, '$id', '$user', '$text', '$datetime')");
 		return $rs;
 	}
 	public function listcomment($id)
 	{
 		// SELECT * FROM `nhanxet` WHERE masp=15 ORDER BY `nhanxet`.`datetime` DESC
 		$rs=$this->con->query("SELECT * FROM `nhanxet` WHERE masp='$id' ORDER BY `nhanxet`.`datetime` DESC");
 		return $rs;
 	}
 	
}
 ?>