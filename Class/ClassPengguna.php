<?php
require_once "ClassAkses.php";

class Pengguna{
    var $nik, $nama, $akses, $password;

    function __construct()
    {
        $this->koneksi = new Akses; 
        $this->koneksi->BukaDB();

        if (isset($_POST['nik'])){
            $this->nik = $_POST['nik'];
        }
		if (isset($_POST['nama'])){
			$this->nama = $_POST['nama'];
		}
        if (isset($_POST['akses'])){
            $this->akses = $_POST['akses'];
        }
        if (isset($_POST['password'])){
            $this->password = $_POST['password'];

        }
    }

    function __destruct()
    {
        $this->koneksi = new Akses; 
        $this->koneksi->TutupDB(); 
    }

    function DoLogin(){
        
        $login = mysqli_query($this->koneksi->link,"select * from pengguna 
        where nik = '$this->nik'");
       
        $data = mysqli_fetch_array($login);
        
        if(($this->nik != $data['nik']) || ($this->password != $data['password'])){
            echo "<script>alert('NIK / Password Salah');</script>";
            echo "<script>document.location.href = 'index.php'; </script>";
        }else{
            //daftarkan ID jika user dan password benar
            
            session_start();
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['akses'] = $data['akses'];
            $this->nik = $_SESSION['nik'];
            $this->akses = $_SESSION['akses'];
            if($data['akses']=='Admin')
            {
              echo "<script>alert('Berhasil Login');</script>";
              echo "<script>document.location.href = 'halaman_admin.php';</script>";
             }else 
           if($data['akses']=='Manager')
           {
			echo "<script>alert('Berhasil Login');</script>";
            echo "<script>document.location.href = 'halaman_manager.php';</script>";
              
		   }
        }
       
    }

    function DoLogout(){
        session_start(); 
        session_destroy(); 
        echo '<script type="text/javascript">';
		echo 'window.open("index.php","_top");';
        echo '</script>';
    }
}
?>
