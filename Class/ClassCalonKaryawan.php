<?php
class CalonKaryawan{
var $id, $nama, $alamat, $tgl_lahir, $email;
	function Setid() 
	{ 
		if(isset($_POST['id'])) 
		{ 
			$id = $_POST['id']; 
		} 
		elseif(isset($_GET['id'])) 
		{ 
			$id = $_GET['id']; 
		} 
		else 
		{ 
			$id ='';
		} 
		$this->id = $id; 
   	    $this->id;
	} 
	function Setnama() 
	{ 
		if(isset($_POST['nama'])) 
		{ 
			$nama = $_POST['nama']; 
		} 
		$this->nama = $nama; 
		$this->nama;
	} 
	function Setalamat() 
	{ 
		if(isset($_POST['alamat'])) 
		{ 
			$alamat = $_POST['alamat']; 
		} 
		$this->alamat = $alamat; 
		$this->alamat ;
	}
function Settgl_lahir() 
	{ 
		if(isset($_POST['tgl_lahir'])) 
		{ 
			$tgl_lahir = $_POST['tgl_lahir']; 
		} 
		$this->tgl_lahir = $tgl_lahir; 
	}
function Setemail() 
	{ 
		if(isset($_POST['email'])) 
		{ 
			$email = $_POST['email']; 
		} 
		$this->email = $email; 

	}
	function Getid() 
	{
		return $this->id; 
	} 
	function Getnama() 
	{ 
		return $this->nama; 
	} 
	function Getalamat() 
	{ 
		return $this->alamat; 
	} 
	function Gettgl_lahir() 
	{
		return $this->tgl_lahir; 
	} 
	function Getemail() 
	{ 
		return $this->email; 
	} } 

?>
