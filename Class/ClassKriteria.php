<?php
class Kriteria{
var $kode_krteria, $keterangan, $bobot;
	function Setkode_kriteria() 
	{ 
		if(isset($_POST['kode_kriteria'])) 
		{ 
			$kode_kriteria = $_POST['kode_kriteria']; 
		} 
		elseif(isset($_GET['kode_kriteria'])) 
		{ 
			$kode_kriteria = $_GET['kode_kriteria']; 
		} 
		else 
		{ 
			$kode_kriteria ='';
		} 
		$this->kode_kriteria = $kode_kriteria; 
   	    $this->kode_kriteria;
	} 
	function Setketerangan() 
	{ 
		if(isset($_POST['keterangan'])) 
		{ 
			$keterangan = $_POST['keterangan']; 
		} 
		$this->keterangan = $keterangan; 
		$this->keterangan;
	} 
	function Setbobot() 
	{ 
		if(isset($_POST['bobot'])) 
		{ 
			$bobot = $_POST['bobot']; 
		} 
		$this->bobot = $bobot; 
		$this->bobot ;
	} 
	function Getkode_kriteria() 
	{
		return $this->kode_kriteria; 
	} 
	function Getketerangan() 
	{ 
		return $this->keterangan; 
	} 
	function Getbobot() 
	{ 
		return $this->bobot; 
	} 
} 

?>
