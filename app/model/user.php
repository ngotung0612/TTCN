
<?php 
/**
 * 
 */
class User
{
	private $_name,$_username,$_password,$_email,$_phone,$_loai;
	function __construct($name,$username,$password,$email,$phone,$loai)
	{
		$this->_name=$name;
		$this->_username=$username;
		$this->_password=$password;
		$this->_email=$email;
		$this->_phone=$phone;
		$this->_loai=$loai;
	}
	public function getname()
	{
		# code...
		return $this->_name;
	}
	public function getusername()
	{
		# code...
		return $this->_username;
	}
	public function getpassword()
	{
		# code...
		return $this->_password;
	}
	public function getemail()
	{
		# code...
		return $this->_email;
	}
	public function getphone()
	{
		# code...
		return $this->_phone;
	}
	public function getloai()
	{
		# code...
		return $this->_loai;
	}
}
 ?>