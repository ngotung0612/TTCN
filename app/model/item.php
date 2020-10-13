<?php 
/**
 * 
 */
class Item
{
	private $_masp,$_tensp,$_gia,$_link,$_username,$_loai;
	function __construct($masp,$tensp,$gia,$loai,$link,$username)
	{
		$this->_masp=$masp;
		$this->_tensp=$tensp;
		$this->_gia=$gia;
		$this->_loai=$loai;
		$this->_link=$link;
		$this->_username=$username;
	}
	public function getmasp()
	{
		# code...
		return $this->_masp;
	}
	public function gettensp()
	{
		# code...
		return $this->_tensp;
	}
	public function getgia()
	{
		# code...
		return $this->_gia;
	}
	public function getloai()
	{
		# code...
		return $this->_loai;
	}
	public function getlink()
	{
		# code...
		return $this->_link;
	}
	public function getusername()
	{
		# code...
		return $this->_username;
	}
	
}
 ?>