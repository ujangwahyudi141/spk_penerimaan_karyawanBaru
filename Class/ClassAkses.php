<?php
require_once "ClassPengguna.php";

class Akses{
    var $username, $password, $host, $namaDB, $link;

    function __construct()
    {
        $this->host='localhost';
        $this->username='root';
        $this->password='';
        $this->namaDB='spk_yudi';
        $this->link = mysqli_connect("$this->host","$this->username","$this->password","$this->namaDB");
    }

    function BukaDB(){
        if (!$this->link){
            echo "Error: Unable to connect to MySQL" . PHP_EOL;
            exit;
        }
    }

    function TutupDB(){
        mysqli_close($this->link);
        if (!$this->link){
            echo "Error: Unable to close connection MySQL" . PHP_EOL;
            exit;
        }
    }
    function CekSesi(){
        session_start();
        if($_SESSION['username'] == ''){
            echo "<script> alert('Akses Ditolak'); </script>";
            echo "<script> window.open('../index.php','_top'); </script>";
            exit;
            }
    }
    
}
?>
