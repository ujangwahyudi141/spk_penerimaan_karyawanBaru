<?php
Class Alternatif{
  var $kode_alternatif,$nama,$c1,$c2,$c3,$c4,$c5,$c6,$c7;
  	function Setkode_alternatif(){
		if(isset ($_POST['kode_alternatif'])) {
			$kode_alternatif=$_POST['kode_alternatif'];
		}
		$this->kode_alternatif=$kode_alternatif;
	}
	function Getkode_alternatif(){
	   return $this->kode_alternatif;
	}
	function Setnama(){
		if(isset ($_POST['nama'])) {
			$nama=$_POST['nama'];
		}
		$this->nama=$nama;
	}
	function Getnama(){
	   return $this->nama;
	}
	
	function Setc1(){
		if(isset ($_POST['c1'])){
			$c1=$_POST['c1'];
		}
		$this->c1=$c1;
	}
	function Getc1(){
		return $this->c1;
	}
	
	function Setc2(){
		if(isset ($_POST['c2'])){
			$c2=$_POST['c2'];
		}
		$this->c2=$c2;
	}
	function Getc2(){
		return $this->c2;
	}
	function Setc3(){
		if(isset ($_POST['c3'])){
			$c3=$_POST['c3'];
		}
		$this->c3=$c3;
	}
	function Getc3(){
		return $this->c3;
	}
	function Setc4(){
		if(isset ($_POST['c4'])){
			$c4=$_POST['c4'];
		}
		$this->c4=$c4;
	}
	function Getc4(){
		return $this->c4;
	}
	function Setc5(){
		if(isset ($_POST['c5'])){
			$c5=$_POST['c5'];
		}
		$this->c5=$c5;
	}
	function Getc5(){
		return $this->c5;
	}
	function Setc6(){
		if(isset ($_POST['c6'])){
			$c6=$_POST['c6'];
		}
		$this->c6=$c6;
	}
	function Getc6(){
		return $this->c6;
	}
	function Setc7(){
		if(isset ($_POST['c7'])){
			$c7=$_POST['c7'];
		}
		$this->c7=$c7;
	}
	function Getc7(){
		return $this->c7;
	}
}
?>
