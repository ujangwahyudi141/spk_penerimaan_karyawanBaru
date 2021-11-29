<link rel="stylesheet" type="text/css" href="tabelstyle.css">
<?php
//error_reporting(0);
require_once "ClassPengguna.php";
require_once "ClassKriteria.php";
require_once "ClassAlternatif.php";
require_once "ClassCalonKaryawan.php";
require_once "ClassAkses.php";
require_once "ClassMain.php";

class Pengelola extends Pengguna{
	
    function simpan_calon_karyawan() 
    {   

        
        $this->c_karyawan = new CalonKaryawan(); 
        $this->c_karyawan->Setid(); 
        $this->c_karyawan->Getid(); 
        $this->c_karyawan->Setnama(); 
        $this->c_karyawan->Getnama(); 
        $this->c_karyawan->Setalamat(); 
        $this->c_karyawan->Getalamat();
        $this->c_karyawan->Settgl_lahir(); 
        $this->c_karyawan->Gettgl_lahir();
        $this->c_karyawan->Setemail(); 
        $this->c_karyawan->Getemail(); 
         
         $simpan = mysqli_query($this->koneksi->link,"insert into calon_karyawan values('".$this->c_karyawan->id."','".$this->c_karyawan->nama."','".$this->c_karyawan->alamat."','".$this->c_karyawan->tgl_lahir."','".$this->c_karyawan->email."')");  
        if(!$simpan) 
        { 
            echo "<script>alert('Data Gagal Disimpan');</script>"; 
            echo "<script>window.history.back();</script>"; 
        } 
        else 
        { 
            echo "<script>alert('Data Berhasil Disimpan');</script>"; 
            echo "<script> document.location.href ='data_calon_karyawan.php?cari'; </script>"; 
        } 
      }

    function data_calon_karyawan()
    {
       echo'<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">';
       echo'<body style="background: white;">';
        $cari = $_GET['cari'];
        echo "<center><h3>DATA CALON KARYAWAN</h3>";
        $getdata = mysqli_query($this->koneksi->link,"select * from calon_karyawan where nama like '$cari%'"); 
        $baris = mysqli_num_rows($getdata);
        echo "
        <form class=fcari name=fcari action=data_calon_karyawan.php method=get>
            <a href='form_calon_karyawan.php'><button type=button class='btn btn-primary'>Tambah</button></a>
            <input type=text class='' name=cari size=30 style='width: 80%' placeholder='Nama'>
            <input type=submit class='btn btn-success' value= 'Cari'>
        </form>
        <br>
        <table class='table table-striped'>
            <thead class='thead dark'>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>ALamat</th>
                    <th>Tgl Lahir</th>
                    <th>Email</th>
                    <th colspan=2>Proses</th>
                </tr>
            </thead>";
        for($no=1; $no<=$baris; $no++){   
        $data = mysqli_fetch_array($getdata);
             
                echo "  <tr class=ganjil>
                        <td>$no</td>
                        <td>$data[id]</td>
                        <td>$data[nama]</td>
                        <td>$data[alamat]</td>
                        <td>$data[tgl_lahir]</td>
                        <td>$data[email]</td>
                        <td>
                        <center>
                           <a href='form_edit_calon_karyawan.php?id=$data[0]' class='btn btn-success'>
                           Edit
                           </a>
                        </center> 
                        </td>
                        <td>
                        <center>";
                        ?>

                            <a href='hapus_calon_karyawan.php?id=<?php echo$data[0] ?>' onclick='return confirm("Data Akan Dihapus??")' class='btn btn-danger'>
                              Hapus
                            </a>
                        </center>    
                        </td>
                        <?php
                         
                         echo"</tr>";
            
            
          }   
        
        echo "</table>";
        echo "</center>";
    }

    function edit_calon_karyawan()
    {

        $this->c_karyawan = new CalonKaryawan(); 
        $this->c_karyawan->Setid(); 
        $this->c_karyawan->Getid(); 
        $this->c_karyawan->Setnama(); 
        $this->c_karyawan->Getnama(); 
        $this->c_karyawan->Setalamat(); 
        $this->c_karyawan->Getalamat();
        $this->c_karyawan->Settgl_lahir(); 
        $this->c_karyawan->Gettgl_lahir();
        $this->c_karyawan->Setemail(); 
        $this->c_karyawan->Getemail(); 
        
        $ubah = mysqli_query($this->koneksi->link,"update calon_karyawan set 
        nama     = '".$this->c_karyawan->nama."',
        alamat     = '".$this->c_karyawan->alamat."',
        tgl_lahir     = '".$this->c_karyawan->tgl_lahir."', 
        email      = '".$this->c_karyawan->email."'
        where id = '".$this->c_karyawan->id."'");
       
        if(!$ubah)
        {
            echo "<script>alert('Data Gagal Diperbaharui');</script>";
            echo "<script>window.history.back();</script>";
        }
        else
        {
            echo "<script>alert('Data Berhasil Diedit');</script>";
            echo "<script> document.location.href ='data_calon_karyawan.php?cari';
            </script>";
        }
          
     }

    function hapus_calon_karyawan()
    {
        $id=$_GET['id'];
        $hapus = mysqli_query($this->koneksi->link,"delete from calon_karyawan where id ='$id'");
      
        if(!$hapus)
        {
            echo "<script>alert('Data Gagal Dihapus');</script>";
            echo "<script> document.location.href ='data_pengguna.php';
            </script>";
        }
        else
        {
            echo "<script>alert('Data Berhasil Dihapus');</script>";
            echo "<script> document.location.href ='data_calon_karyawan.php?cari';
            </script>";
        }
      }
      

    function simpan_pengguna() 
    {   
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM pengguna WHERE nik ='".$this->nik."'");
       $jum=mysqli_num_rows($query);
       if(!$jum==0)
       {
          echo"<script>
                  alert('NIK Sudah digunakan  Masukan NIK yang lain');
               document.location.href ='data_pengguna.php?cari';
       
               </script>
             ";    
       }else{ 
        $simpanpengguna = mysqli_query($this->koneksi->link,"insert into pengguna values
            ('".$this->nik."','".$this->nama."','".$this->password."','".$this->akses."')");  
        if(!$simpanpengguna) 
        { 
            echo "<script>alert('Data Gagal Disimpan');</script>"; 
            echo "<script>window.history.back();</script>"; 
        } 
        else 
        { 
            echo "<script>alert('Data Berhasil Disimpan');</script>"; 
            echo "<script> document.location.href ='data_pengguna.php?cari'; </script>"; 
        } 
      }
    }

    function data_pengguna()
    {
	   echo'<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">';
       echo'<body style="background: white;">';
        $cari = $_GET['cari'];
        echo "<center><h3>DATA PENGGUNA</h3>";
        $getdata = mysqli_query($this->koneksi->link,"select * from pengguna where nik like '$cari%' 
                                                        OR nama like '$cari%'"); 
        $baris = mysqli_num_rows($getdata);
        echo "
        <form class=fcari name=fcari action=data_pengguna.php method=get>
            <a href='form_pengguna.php'><button type=button class='btn btn-primary'>Tambah</button></a>
            <input type=text class='' name=cari size=30 style='width: 80%' placeholder='Nik/Nama'>
            <input type=submit class='btn btn-success' value= 'Cari'>
        </form>
        <br>
        <table class='table table-striped'>
            <thead class='thead dark'>
                <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Akses</th>
                    <th colspan=2>Proses</th>
                </tr>
            </thead>";
        for($no=1; $no<=$baris; $no++){   
        $data = mysqli_fetch_array($getdata);
             
                echo "  <tr class=ganjil>
                        <td>$no</td>
                        <td>$data[nik]</td>
                        <td>$data[nama]</td>
                        <td>$data[akses]</td>
                        <td>
                        <center>
                           <a href='form_edit_pengguna.php?nik=$data[0]' class='btn btn-success'>
                           Edit
                           </a>
                        </center> 
                        </td>
                        <td>
                        ";
                        if($data['akses']=='Admin')
                        {

                        }else
                        {
                            ?>
                        <center>
                            <a href='hapus_pengguna.php?nik=<?php echo$data[0] ?>' onclick='return confirm("Data Akan Dihapus??")' class='btn btn-danger'>
                              Hapus
                            </a>
                        </center>    
                        </td>
                        <?php
                         }
                         echo"</tr>";
            
            
          }   
        
        echo "</table>";
        echo "</center>";
    }

    function edit_pengguna()
    {      
        $simpanpengguna = mysqli_query($this->koneksi->link,"update pengguna set 
        nama     = '".$this->nama."', 
        akses     = '".$this->akses."',
        password = '".$this->password."'
        where nik = '".$this->nik."'");
        if(!$simpanpengguna)
        {
            echo "<script>alert('Data Gagal Diperbaharui');</script>";
            echo "<script>window.history.back();</script>";
        }
        else
        {
            echo "<script>alert('Data Berhasil Diperbaharui');</script>";
            echo "<script> document.location.href='data_pengguna.php?cari';
            </script>";
        }
    }

    function hapus_pengguna()
    {
		$nik=$_GET['nik'];
        $hapuspengguna = mysqli_query($this->koneksi->link,"delete from pengguna where nik ='$nik'");
      
        if(!$hapuspengguna)
        {
            echo "<script>alert('Data Gagal Dihapus');</script>";
            echo "<script> document.location.href ='data_pengguna.php';
            </script>";
        }
        else
        {
            echo "<script>alert('Data Berhasil Dihapus');</script>";
            echo "<script> document.location.href ='data_pengguna.php?cari';
            </script>";
        }
      }
      
      function simpan_kriteria()
      {
		
		$this->kriteria = new Kriteria(); 
		$this->kriteria->Setkode_kriteria(); 
		$this->kriteria->Getkode_kriteria(); 
		$this->kriteria->Setketerangan(); 
		$this->kriteria->Getketerangan(); 
		$this->kriteria->Setbobot(); 
		$this->kriteria->Getbobot(); 
    	
        $simpankriteria = mysqli_query($this->koneksi->link,"insert into kriteria values('".$this->kriteria->kode_kriteria."','".$this->kriteria->keterangan."','".$this->kriteria->bobot."')");  
        if(!$simpankriteria) 
        { 
            echo "<script>alert('Data Gagal Disimpan');</script>"; 
            echo "<script>window.history.back();</script>"; 
        } 
        else 
        { 
            echo "<script>alert('Data Berhasil Disimpan');</script>"; 
            echo "<script> document.location.href ='data_kriteria.php?cari'; </script>"; 
        } 
	  }

    function data_kriteria()
    {
	
		echo'<link rel="stylesheet" type="text/css" href="AdminLTE/dist/css/adminlte.min.css">';
        echo'<body style="background: white;">'; 
        echo'<center>'
        ;
        $sql=mysqli_query($this->koneksi->link,"select * from kriteria");
        $num=mysqli_num_rows($sql);
        $cari = $_GET['cari'];
        echo "<h3>DATA KRITERIA</h3>";
        $getdata = mysqli_query($this->koneksi->link,"select * from kriteria where kode_kriteria like '$cari%' 
                                                       "); 
        $baris = mysqli_num_rows($getdata);
        
        echo "
        <form class=fcari name=fcari action=data_kriteria.php method=get>
         ";
         if($num<7)
        {
         echo"<a href='form_kriteria.php'><button type=button class='btn btn-primary'>Tambah</button></a>";
        }else{}
         echo"
         <input type=text  name=cari size=30 placeholder='kode kriteria' style='width:80%'>
         <input type=submit class='btn btn-success' value= 'Cari'>";
           
        echo"
        </form><br>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kriteria</th>
                    <th>Keterangan</th>
                    <th>Bobot</th>
                    <th colspan=2>Proses</th>
                </tr>
             </thead>";
            
        for($no=1; $no<=$baris; $no++){   
        $data = mysqli_fetch_array($getdata);
              echo "  
                      <tr>
                        <td>$no</td>
                        <td>$data[0]</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                        <td>
                        <center>
                         <a href='form_edit_kriteria.php?id=$data[0]' class='btn btn-success'>
                            Edit
                         </a>
                        </center> 
                        </td>
                        <td>
                        <center>";?>
                            <a href='hapus_kriteria.php?id=<?php echo$data[0]?>' class='btn btn-danger' onclick="return confirm('Data Akan Dihapus?')">
                              Hapus
                            </a>
                        <?php echo"    
                        </center>
                        </td>
                        </tr>
                        ";
            
          }
        echo "</table>";
        echo "</center>";
     }  
    function edit_kriteria()
    {      
		$this->kriteria = new Kriteria(); 
		$this->kriteria->Setkode_kriteria(); 
		$this->kriteria->Getkode_kriteria(); 
		
		$this->kriteria->Setketerangan(); 
		$this->kriteria->Getketerangan(); 
		
		$this->kriteria->Setbobot(); 
		$this->kriteria->Getbobot(); 
		
        $ubah = mysqli_query($this->koneksi->link,"update kriteria set 
        keterangan     = '".$this->kriteria->keterangan."', 
        bobot 		= '".$this->kriteria->bobot."'
        where kode_kriteria = '".$this->kriteria->kode_kriteria."'");
       
        if(!$ubah)
        {
            echo "<script>alert('Data Gagal Diperbaharui');</script>";
            echo "<script>window.history.back();</script>";
        }
        else
        {
            echo "<script>alert('Data Berhasil Diedit');</script>";
            echo "<script> document.location.href ='data_kriteria.php?cari';
            </script>";
        }
        
    }
    
    function hapus_kriteria()
    {
		$id=$_GET['id'];
        $hapuskriteria = mysqli_query($this->koneksi->link,"delete from kriteria where kode_kriteria ='$id'");
      
        if(!$hapuskriteria)
        {
            echo "<script>alert('Data Gagal Dihapus');</script>";
            echo "<script> document.location.href ='lihat_datakriteria.php';
            </script>";
        }
        else
        {
            echo "<script>alert('Data Berhasil Dihapus');</script>";
            echo "<script> document.location.href ='data_kriteria.php?cari';
            </script>";
        }
      }
      function simpan_alternatif()
    {
     $this->simpan = new Alternatif();
     $this->simpan->Setkode_alternatif();
     $this->simpan->Getkode_alternatif();
     $this->simpan->Setnama();
     $this->simpan->Getnama();
     $this->simpan->Setc1();
     $this->simpan->Getc1();
     $this->simpan->Setc2();
     $this->simpan->Getc2();
     $this->simpan->Setc3();
     $this->simpan->Getc3();
     $this->simpan->Setc4();
     $this->simpan->Getc4();
     $this->simpan->Setc5();
     $this->simpan->Getc5();
     $this->simpan->Setc6();
     $this->simpan->Getc6();
     $this->simpan->Setc7();
     $this->simpan->Getc7();
        $simpan=mysqli_query($this->koneksi->link,"insert into alternatif values('".
        $this->simpan->kode_alternatif."','".
        $this->simpan->nama."','".
        $this->simpan->c1."','".
        $this->simpan->c2."','".
        $this->simpan->c3."','".
        $this->simpan->c4."','".
        $this->simpan->c5."','".
        $this->simpan->c6."','".
        $this->simpan->c7."')");
        if($simpan==true)
        {
            echo"<script>
            alert('data berasil disimpan');
            window.location='data_alternatif.php?cari';
            </script>";
        }else{
            echo"<script>
            alert('data gagal disimpan');
            window.location='';
            </script>";
        
        
        }
     }
   
   function edit_alternatif(){
    
     $this->simpan = new Alternatif();
     $this->simpan->Setkode_alternatif();
     $this->simpan->Getkode_alternatif();
     $this->simpan->Setnama();
     $this->simpan->Getnama();
     $this->simpan->Setc1();
     $this->simpan->Getc1();
     $this->simpan->Setc2();
     $this->simpan->Getc2();
     $this->simpan->Setc3();
     $this->simpan->Getc3();
     $this->simpan->Setc4();
     $this->simpan->Getc4();
     $this->simpan->Setc5();
     $this->simpan->Getc5();
     $this->simpan->Setc6();
     $this->simpan->Getc6();
     $this->simpan->Setc7();
     $this->simpan->Getc7();
    
     $ubah=mysqli_query($this->koneksi->link,"UPDATE alternatif SET 
     nama ='".$this->simpan->nama."',
     c1 ='".$this->simpan->c1."',
     c2 ='".$this->simpan->c2."',
     c3 ='".$this->simpan->c3."',
     c4 ='".$this->simpan->c4."',
     c5 ='".$this->simpan->c5."',
     c6 ='".$this->simpan->c6."',
     c7 ='".$this->simpan->c7."'
     WHERE kode_alternatif ='".$this->simpan->kode_alternatif."'");
     if($ubah){
         echo"<script>
          alert('data berhasi diedit');
          window.location='data_alternatif.php?cari';
          </script>
          ";
    
     }else{
         echo"<script>
          alert('data gagal di ubah');
          window.location='data_alternatif.php';
          </script>
          ";
     }
     
   }

   function data_alternatif()
   {
       echo'<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">';
       echo'<body style="background: white;">';
    
    ?>
    <?php
       $cari=$_GET['cari'];
       $select=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif WHERE kode_alternatif like '$cari%'");
       $num=mysqli_num_rows($select);
       
       $c=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria ");
       $n=mysqli_num_rows($c);
         echo"<center>";
         echo "<h3>DATA ALTERNATIF</h3>";
        
         echo"<form class=fcari name=fcari action=data_alternatif.php method=get>";
         
         echo"<a href='form_alternatif.php'><button type=button class='btn btn-primary'>Tambah</button></a>";
         echo"
         <input type=text  name=cari size=30 placeholder='kode alternatif' style='width:80%'>
         <input type=submit class='btn btn-success' value= 'Cari'>";
         echo
         "</center>
          <table class='table table-striped' style='width:120%'>
          <thead>
          <tr>
             <th>No</th>
             <th>Kode</th>
             <th>Nama</th>
             ";
             for($i=1;$i<=$n;$i++){
                $kriteria=mysqli_fetch_array($c);
                echo"<th>".$kriteria['keterangan']."</th>";
             }
             echo"
             <th colspan=2>Proses</th>
           </tr>
           </thead>
        ";
        echo"</div>";
       for($i=1; $i<=$num; $i++)
       {
           $data=mysqli_fetch_array($select);
           //C1
           if($data['c1']=='5'){$c1='Sangat Baik';}else if($data['c1']=='4'){$c1='Baik';}else if($data['c1']=='3'){$c1='Cukup';}else if($data['c1']=='2'){$c1='Kurang';}else if($data['c1']=='1'){$c1='Sangat Kurang';} 
           if($data['c2']=='5'){$c2='Sangat Baik';}else if($data['c2']=='4'){$c2='Baik';}else if($data['c2']=='3'){$c2='Cukup';}else if($data['c2']=='2'){$c2='Kurang';}else if($data['c2']=='1'){$c2='Sangat Kurang';}
           if($data['c3']=='5'){$c3='Sangat Baik';}else if($data['c3']=='4'){$c3='Baik';}else if($data['c3']=='3'){$c3='Cukup';}else if($data['c3']=='2'){$c3='Kurang';}else if($data['c3']=='1'){$c3='Sangat Kurang';} 
           if($data['c4']=='5'){$c4='Sangat Baik';}else if($data['c4']=='4'){$c4='Baik';}else if($data['c4']=='3'){$c4='Cukup';}else if($data['c4']=='2'){$c4='Kurang';}else if($data['c4']=='1'){$c4='Sangat Kurang';} 
           if($data['c5']=='5'){$c5='Sangat Baik';}else if($data['c5']=='4'){$c5='Baik';}else if($data['c5']=='3'){$c5='Cukup';}else if($data['c5']=='2'){$c5='Kurang';}else if($data['c5']=='1'){$c5='Sangat Kurang';} 
           if($data['c6']=='5'){$c6='Sangat Baik';}else if($data['c6']=='4'){$c6='Baik';}else if($data['c6']=='3'){$c6='Cukup';}else if($data['c6']=='2'){$c6='Kurang';}else if($data['c6']=='1'){$c6='Sangat Kurang';} 
           if($data['c7']=='5'){$c7='Sangat Baik';}else if($data['c7']=='4'){$c7='Baik';}else if($data['c7']=='3'){$c7='Cukup';}else if($data['c7']=='2'){$c7='Kurang';}else if($data['c7']=='1'){$c7='Sangat Kurang';} 
           echo"
               <tr>
                 <td >$i</td>
                 <td >".$data['kode_alternatif']."</td>
                 <td >".$data['nama']."</td>
                 <td >".$c1."</td>
                 <td >".$c2."</td>
                 <td >".$c3."</td>
                 <td >".$c4."</td>
                 <td >".$c5."</td>
                 <td >".$c6."</td>
                 <td >".$c7."</td>
                 
                 <td align='center'><a href='form_edit_alternatif.php?kode=".$data['kode_alternatif']."'><button class='btn btn-primary' type='button'> <i class='fa fa-edit'></i> Edit</button></a></td>
                 
                 <td align='center'><a href='hapus_alternatif.php?kode=".$data['kode_alternatif']."'>";?>
                 <button onclick="return confirm('data akan dihapus?')" class="btn btn-danger"><i class='fa fa-trash'></i> Hapus</button></a></td>
                 <?php echo"
               </tr>";
               
       }
       echo"</table>";
   }

   function hapus_alternatif()
   {
     $kode=$_GET['kode'];
     $hapus=mysqli_query($this->koneksi->link,"Delete from alternatif where kode_alternatif='$kode'");
     if($hapus==true)
     {
         echo"<script>
          alert('data berhasi dihapus');
          window.location='data_alternatif.php?cari';
         </script>";
     }
   } 
   function smart(){
     
       echo'<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">';
       echo'<body style="background: white;">';
    
     $min=1;
     $max=5;
     $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
     $num=mysqli_num_rows($query);
     //Nilai Utility

     echo"
     <fieldset>
       <legend><h1>Penilaian SMART</h1></legend>
       <h4>1. Bobot pada setiap alternatif</h4>
         <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
           </tr>
           </thead>
 
          ";
     for($i=1;$i<=$num;$i++){
        $data=mysqli_fetch_array($query);
        echo"
                <tr>
                    <td>$i</td>
                    <td>$data[nama]</td>
                    <td>$data[c1]</td>
                    <td>$data[c2]</td>
                    <td>$data[c3]</td>
                    <td>$data[c4]</td>
                    <td>$data[c5]</td>
                    <td>$data[c6]</td>
                    <td>$data[c7]</td>
                </tr>
           ";
     }
     echo"</table>";
     $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");

   echo"
    <h4>2. Menghitung nilai pada utilty</h4>
 
      
     <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
           </tr>
           </thead>
 
          ";
     for($k=1;$k<=$num;$k++){
        $data=mysqli_fetch_array($query);
        
        $C1=($data['c1']-$min)/($max-$min);
        $C2=($data['c2']-$min)/($max-$min);
        $C3=($data['c3']-$min)/($max-$min);
        $C4=($data['c4']-$min)/($max-$min);
        $C5=($data['c5']-$min)/($max-$min);
        $C6=($data['c6']-$min)/($max-$min);
        $C7=($data['c7']-$min)/($max-$min);
        echo"
                <tr>
                    <td>$k</td>
                    <td>$data[nama]</td>
                    <td>$C1</td>
                    <td>$C2</td>
                    <td>$C3</td>
                    <td>$C4</td>
                    <td>$C5</td>
                    <td>$C6</td>
                    <td>$C7</td>
                </tr>
           ";
     }
    echo"</table>";
   

     $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif ");
     
   echo"
    <h4>3. Perangkaian pada kedudukan kepentingan kriteria</h4>
    
      
     <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
              <th>Hasil</th>
           </tr>
           </thead>
 
          ";
     for($k=1;$k<=$num;$k++){
        
     $K1=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C1'");
     $K2=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C2'");
     $K3=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C3'");
     $K4=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C4'");
     $K5=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C5'");
     $K6=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C6'");
     $K7=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C7'");
     
        $k1=mysqli_fetch_array($K1);
        $k2=mysqli_fetch_array($K2);
        $k3=mysqli_fetch_array($K3);
        $k4=mysqli_fetch_array($K4);
        $k5=mysqli_fetch_array($K5);
        $k6=mysqli_fetch_array($K6);
        $k7=mysqli_fetch_array($K7);
        $data=mysqli_fetch_array($query);
        
        $k1=$k1['bobot']/100;
        $k2=$k2['bobot']/100;
        $k3=$k3['bobot']/100;
        $k4=$k4['bobot']/100;
        $k5=$k5['bobot']/100;
        $k6=$k6['bobot']/100;
        $k7=$k7['bobot']/100;
        
        $C1=($data['c1']-$min)/($max-$min)*$k1;
        $C2=($data['c2']-$min)/($max-$min)*$k2;
        $C3=($data['c3']-$min)/($max-$min)*$k3;
        $C4=($data['c4']-$min)/($max-$min)*$k4;
        $C5=($data['c5']-$min)/($max-$min)*$k5;
        $C6=($data['c6']-$min)/($max-$min)*$k6;
        $C7=($data['c7']-$min)/($max-$min)*$k7;

        $C1=number_format($C1,3);
        $C2=number_format($C2,3);;
        $C3=number_format($C3,3);;
        $C4=number_format($C4,3);;
        $C5=number_format($C5,3);;
        $C6=number_format($C6,3);;
        $C7=number_format($C7,3);;
        
        $hasil=$C1+$C2+$C3+$C4+$C5+$C6+$C7;
        $hasil=number_format($hasil,2);
        echo"
                <tr>
                    <td>$k</td>
                    <td>$data[nama]</td>
                    <td>$C1</td>
                    <td>$C2</td>
                    <td>$C3</td>
                    <td>$C4</td>
                    <td>$C5</td>
                    <td>$C6</td>
                    <td>$C7</td>
                    <td>$hasil</td>
                </tr>
           ";
     }
    echo"</table>";
   
     $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif ORDER BY c1+c2+c3+c4+c5+c6+c7 DESC");
   echo"
    <h4>4. Hasil Perengkingan </h4>
      
     <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>Hasil</th>
           </tr>
           </thead>
 
          ";
     for($k=1;$k<=$num;$k++){
        
     $K1=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C1'");
     $K2=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C2'");
     $K3=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C3'");
     $K4=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C4'");
     $K5=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C5'");
     $K6=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C6'");
     $K7=mysqli_query($this->koneksi->link,"SELECT bobot FROM kriteria WHERE kode_kriteria='C7'");
     
        $k1=mysqli_fetch_array($K1);
        $k2=mysqli_fetch_array($K2);
        $k3=mysqli_fetch_array($K3);
        $k4=mysqli_fetch_array($K4);
        $k5=mysqli_fetch_array($K5);
        $k6=mysqli_fetch_array($K6);
        $k7=mysqli_fetch_array($K7);
        $data=mysqli_fetch_array($query);
        $k1=$k1['bobot']/100;
        $k2=$k2['bobot']/100;
        $k3=$k3['bobot']/100;
        $k4=$k4['bobot']/100;
        $k5=$k5['bobot']/100;
        $k6=$k6['bobot']/100;
        $k7=$k7['bobot']/100;
        
        $C1=($data['c1']-$min)/($max-$min)*$k1;
        $C2=($data['c2']-$min)/($max-$min)*$k2;
        $C3=($data['c3']-$min)/($max-$min)*$k3;
        $C4=($data['c4']-$min)/($max-$min)*$k4;
        $C5=($data['c5']-$min)/($max-$min)*$k5;
        $C6=($data['c6']-$min)/($max-$min)*$k6;
        $C7=($data['c7']-$min)/($max-$min)*$k7;

        $C1=number_format($C1,3);
        $C2=number_format($C2,3);;
        $C3=number_format($C3,3);;
        $C4=number_format($C4,3);;
        $C5=number_format($C5,3);;
        $C6=number_format($C6,3);;
        $C7=number_format($C7,3);;
        
        $hasil=$C1+$C2+$C3+$C4+$C5+$C6+$C7;
        $hasil=number_format($hasil,2);
       
        echo"
                <tr>
                    <td>$k</td>
                    <td>$data[nama]</td>
                    <td>".$hasil."</td>
                </tr>
           ";
     }
    echo"</table>
    <button type='button' class='btn btn-primary' onclick='cetak()'>Cetak</button>


    <script>
    function cetak(){
        window.print();
    }
    </script>
    
    ";
    
}

public function topsis()
{
       echo'<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">';
       echo'<body style="background: white;">';
       
       $min=1;
       $max=5;
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       $num=mysqli_num_rows($query);
       //Nilai Utility
       
       echo"
       <fieldset>
       <legend><h1>Penilaian Topsis</h1></legend>
       <h4>1. Bobot pada setiap alternatif</h4>
         <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
           </tr>
           </thead>
       
          ";
       for($i=1;$i<=$num;$i++){
        $data=mysqli_fetch_array($query);
        echo"
                <tr>
                    <td>$i</td>
                    <td>$data[nama]</td>
                    <td>$data[c1]</td>
                    <td>$data[c2]</td>
                    <td>$data[c3]</td>
                    <td>$data[c4]</td>
                    <td>$data[c5]</td>
                    <td>$data[c6]</td>
                    <td>$data[c7]</td>
                </tr>
           ";
       }
       echo"</table>";
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       
       echo"
       <h4>2. Ternormalisasi Matrik</h4>
       
       <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
           </tr>
           </thead>
       
          ";
          $no = 1;
         foreach ($query as $data){

            $pembagi1 = 0;
            $pembagi2 = 0;
            $pembagi3 = 0;
            $pembagi4 = 0;
            $pembagi5 = 0;
            $pembagi6 = 0;
            $pembagi7 = 0;
            $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
            foreach($querypembagi as $pem)
            {
                $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
            }
             echo"
            <tr>
                <td>$no</td>
                <td>$data[nama]</td>
                <td>".round($data['c1']/sqrt($pembagi1),3)."</td>
                <td>".round($data['c2']/sqrt($pembagi2),3)."</td>
                <td>".round($data['c3']/sqrt($pembagi3),3)."</td>
                <td>".round($data['c4']/sqrt($pembagi4),3)."</td>
                <td>".round($data['c5']/sqrt($pembagi5),3)."</td>
                <td>".round($data['c6']/sqrt($pembagi6),3)."</td>
                <td>".round($data['c7']/sqrt($pembagi7),3)."</td>
             
             ";
             $no++;
         }
       echo"</table>";
       
       
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif ");
       
       echo"
       <h4>3. Ternormalisasi terbobot</h4>
       
       <table class='table table-striped'>
           <thead>
           <tr>
              <th>No</th>
              <th>Alternatif</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
              <th>C6</th>
              <th>C7</th>
              
           </tr>
           </thead>
       
          ";
          $no = 1;
          foreach ($query as $data){
 
             $pembagi1 = 0;
             $pembagi2 = 0;
             $pembagi3 = 0;
             $pembagi4 = 0;
             $pembagi5 = 0;
             $pembagi6 = 0;
             $pembagi7 = 0;
             $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
             foreach($querypembagi as $pem)
             {
                 $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                 $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                 $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                 $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                 $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                 $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                 $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
             }
              echo"
             <tr>
                 <td>$no</td>
                 <td>$data[nama]</td>
                 <td>".round($data['c1']/sqrt($pembagi1)*0.3,3)."</td>
                 <td>".round($data['c2']/sqrt($pembagi2)*0.1,3)."</td>
                 <td>".round($data['c3']/sqrt($pembagi3)*0.2,3)."</td>
                 <td>".round($data['c4']/sqrt($pembagi4)*0.1,3)."</td>
                 <td>".round($data['c5']/sqrt($pembagi5)*0.2,3)."</td>
                 <td>".round($data['c6']/sqrt($pembagi6)*0.05,3)."</td>
                 <td>".round($data['c7']/sqrt($pembagi7)*0.05,3)."</td>
              
              ";
              $no++;
          }
       echo"</table>";
       
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       $k=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
       $n = mysqli_num_rows($k);
       echo"
       <h4>4. Matrik Ideal Positif </h4>
       
       <table class='table table-striped'>
       <thead>
       <tr>
       <th colspan='$n'><center>Kriteria</center></th>
       </tr>
       <tr>";
       foreach ($k as $kt){
           echo"
           <th>$kt[kode_kriteria]</th>
           ";
       }
        echo" 
           </tr>
           <tr>";
           for($i=1;$i<=$n;$i++){

            echo"<th>y<sub>$i</sub><sup>+</sup></th>";
            }
           echo"
           </tr>
           </thead>
       
          ";
          $no = 0;
          $ymaks1 = array();
          $ymaks2 = array();
          $ymaks3 = array();
          $ymaks4 = array();
          $ymaks5 = array();
          $ymaks6 = array();
          $ymaks7 = array();
          foreach ($query as $data){
 
             $pembagi1 = 0;
             $pembagi2 = 0;
             $pembagi3 = 0;
             $pembagi4 = 0;
             $pembagi5 = 0;
             $pembagi6 = 0;
             $pembagi7 = 0;
             $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
             foreach($querypembagi as $pem)
             {
                 $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                 $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                 $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                 $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                 $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                 $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                 $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
                }
                $y = 0;
                
                $y1 = round(($data['c1']/sqrt($pembagi1))*0.3,3);
                $y2= round($data['c2']/sqrt($pembagi2)*0.1,3);
                $y3 =round($data['c3']/sqrt($pembagi3)*0.2,3);
                $y4=round($data['c4']/sqrt($pembagi4)*0.1,3);
                $y5=round($data['c5']/sqrt($pembagi5)*0.2,3);
                $y6=round($data['c6']/sqrt($pembagi6)*0.05,3);
                $y7=round($data['c7']/sqrt($pembagi7)*0.05,3);
                $ymaks1[$no] = $y1;
                $ymaks2[$no] = $y2;
                $ymaks3[$no] = $y3;
                $ymaks4[$no] = $y4;
                $ymaks5[$no] = $y5;
                $ymaks6[$no] = $y6;
                $ymaks7[$no] = $y7;
               
            
              $no++;
          }

       echo"
          <tr>
            <td>".max($ymaks1)."</td>
            <td>".max($ymaks2)."</td>
            <td>".max($ymaks3)."</td>
            <td>".max($ymaks4)."</td>
            <td>".max($ymaks5)."</td>
            <td>".max($ymaks6)."</td>
            <td>".max($ymaks7)."</td>
          </td>
       
       
       </table>";
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       $k=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
       $n = mysqli_num_rows($k);
       echo"
       <h4>5. Matrik Ideal Negatif </h4>
       
       <table class='table table-striped'>
       <thead>
       <tr>
       <th colspan='$n'><center>Kriteria</center></th>
       </tr>
       <tr>";
       foreach ($k as $kt){
           echo"
           <th>$kt[kode_kriteria]</th>
           ";
       }
        echo" 
           </tr>
           <tr>";
           for($i=1;$i<=$n;$i++){

            echo"<th>y<sub>$i</sub><sup>-</sup></th>";
            }
           echo"
           </tr>
           </thead>
       
          ";
          $no = 0;
          $ymaks1 = array();
          $ymaks2 = array();
          $ymaks3 = array();
          $ymaks4 = array();
          $ymaks5 = array();
          $ymaks6 = array();
          $ymaks7 = array();
          foreach ($query as $data){
 
             $pembagi1 = 0;
             $pembagi2 = 0;
             $pembagi3 = 0;
             $pembagi4 = 0;
             $pembagi5 = 0;
             $pembagi6 = 0;
             $pembagi7 = 0;
             $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
             foreach($querypembagi as $pem)
             {
                 $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                 $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                 $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                 $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                 $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                 $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                 $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
                }
                $y = 0;
                
                $y1 = round(($data['c1']/sqrt($pembagi1))*0.3,3);
                $y2= round($data['c2']/sqrt($pembagi2)*0.1,3);
                $y3 =round($data['c3']/sqrt($pembagi3)*0.2,3);
                $y4=round($data['c4']/sqrt($pembagi4)*0.1,3);
                $y5=round($data['c5']/sqrt($pembagi5)*0.2,3);
                $y6=round($data['c6']/sqrt($pembagi6)*0.05,3);
                $y7=round($data['c7']/sqrt($pembagi7)*0.05,3);
                $ymaks1[$no] = $y1;
                $ymaks2[$no] = $y2;
                $ymaks3[$no] = $y3;
                $ymaks4[$no] = $y4;
                $ymaks5[$no] = $y5;
                $ymaks6[$no] = $y6;
                $ymaks7[$no] = $y7;
               
                
          
              $no++;
          }

       echo"
          <tr>
            <td>".min($ymaks1)."</td>
            <td>".min($ymaks2)."</td>
            <td>".min($ymaks3)."</td>
            <td>".min($ymaks4)."</td>
            <td>".min($ymaks5)."</td>
            <td>".min($ymaks6)."</td>
            <td>".min($ymaks7)."</td>
          </td>
       
       
       </table>";
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       $k=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
       $n = mysqli_num_rows($k);
       echo"
       <h4>6. Jarak Solusi Ideal Positif D <sup>+</sup> </h4>
       
       <table class='table table-striped'>
       <thead>
       <tr>
          <th> Nomor</th>
          <th> Nama </th>
          <th> D <sup>+</sup>
        </tr>
        </thead>
       
          ";
          $no = 0;
          $ymaks1 = array();
          $ymaks2 = array();
          $ymaks3 = array();
          $ymaks4 = array();
          $ymaks5 = array();
          $ymaks6 = array();
          $ymaks7 = array();
          foreach ($query as $data){
 
             $pembagi1 = 0;
             $pembagi2 = 0;
             $pembagi3 = 0;
             $pembagi4 = 0;
             $pembagi5 = 0;
             $pembagi6 = 0;
             $pembagi7 = 0;
             $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
             foreach($querypembagi as $pem)
             {
                 $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                 $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                 $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                 $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                 $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                 $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                 $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
                }
                $y = 0;
                
                $y1 = round(($data['c1']/sqrt($pembagi1))*0.3,3);
                $y2= round($data['c2']/sqrt($pembagi2)*0.1,3);
                $y3 =round($data['c3']/sqrt($pembagi3)*0.2,3);
                $y4=round($data['c4']/sqrt($pembagi4)*0.1,3);
                $y5=round($data['c5']/sqrt($pembagi5)*0.2,3);
                $y6=round($data['c6']/sqrt($pembagi6)*0.05,3);
                $y7=round($data['c7']/sqrt($pembagi7)*0.05,3);
                $ymaks1[$no] = $y1;
                $ymaks2[$no] = $y2;
                $ymaks3[$no] = $y3;
                $ymaks4[$no] = $y4;
                $ymaks5[$no] = $y5;
                $ymaks6[$no] = $y6;
                $ymaks7[$no] = $y7;
                $no++;
            }

            $k = 0;
            $no = 1;
            $looping = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
            foreach ($looping as $loop){
                $n1 = $ymaks1[$k];
                $n2 = $ymaks2[$k];
                $n3 = $ymaks3[$k];
                $n4 = $ymaks4[$k];
                $n5 = $ymaks5[$k];
                $n6 = $ymaks6[$k];
                $n7 = $ymaks7[$k];
                $y1maks = max($ymaks1);
                $y2maks = max($ymaks2);
                $y3maks = max($ymaks3);
                $y4maks = max($ymaks4);
                $y5maks = max($ymaks5);
                $y6maks = max($ymaks6);
                $y7maks = max($ymaks7);
                $kuadraty1 = ($y1maks-$n1);
                $kuadraty2 = ($y2maks-$n2);
                $kuadraty3 = ($y3maks-$n3);
                $kuadraty4 = ($y4maks-$n4);
                $kuadraty5 = ($y5maks-$n5);
                $kuadraty6 = ($y6maks-$n6);
                $kuadraty7 = ($y7maks-$n7);
                $jsp    = (($kuadraty1*$kuadraty1) + ($kuadraty2*$kuadraty2) + ($kuadraty3*$kuadraty3) + ($kuadraty4*$kuadraty4) + ($kuadraty5*$kuadraty5) + ($kuadraty6*$kuadraty6) + ($kuadraty7*$kuadraty7)); 
       echo"
          <tr>
            <td>$no</td>
           <td>$loop[nama]</td>
           <td>".round(sqrt($jsp),3)."</td>
          </td>
          </tr>";
                $k++;
                $no++;
            }
            echo"
       </table>";
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       $k=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
       $n = mysqli_num_rows($k);
       echo"
       <h4>7. Jarak Solusi Ideal Negatif D <sup>-</sup> </h4>
       
       <table class='table table-striped'>
       <thead>
       <tr>
          <th> Nomor</th>
          <th> Nama </th>
          <th> D <sup>-</sup>
        </tr>
        </thead>
       
          ";
          $no = 0;
          $ymaks1 = array();
          $ymaks2 = array();
          $ymaks3 = array();
          $ymaks4 = array();
          $ymaks5 = array();
          $ymaks6 = array();
          $ymaks7 = array();
          foreach ($query as $data){
 
             $pembagi1 = 0;
             $pembagi2 = 0;
             $pembagi3 = 0;
             $pembagi4 = 0;
             $pembagi5 = 0;
             $pembagi6 = 0;
             $pembagi7 = 0;
             $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
             foreach($querypembagi as $pem)
             {
                 $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                 $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                 $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                 $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                 $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                 $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                 $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
                }
                $y = 0;
                
                $y1 = round(($data['c1']/sqrt($pembagi1))*0.3,3);
                $y2= round($data['c2']/sqrt($pembagi2)*0.1,3);
                $y3 =round($data['c3']/sqrt($pembagi3)*0.2,3);
                $y4=round($data['c4']/sqrt($pembagi4)*0.1,3);
                $y5=round($data['c5']/sqrt($pembagi5)*0.2,3);
                $y6=round($data['c6']/sqrt($pembagi6)*0.05,3);
                $y7=round($data['c7']/sqrt($pembagi7)*0.05,3);
                $ymaks1[$no] = $y1;
                $ymaks2[$no] = $y2;
                $ymaks3[$no] = $y3;
                $ymaks4[$no] = $y4;
                $ymaks5[$no] = $y5;
                $ymaks6[$no] = $y6;
                $ymaks7[$no] = $y7;
                $no++;
            }

            $k = 0;
            $no = 1;
            $looping = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
            foreach ($looping as $loop){
                $n1 = $ymaks1[$k];
                $n2 = $ymaks2[$k];
                $n3 = $ymaks3[$k];
                $n4 = $ymaks4[$k];
                $n5 = $ymaks5[$k];
                $n6 = $ymaks6[$k];
                $n7 = $ymaks7[$k];
                $y1maks = min($ymaks1);
                $y2maks = min($ymaks2);
                $y3maks = min($ymaks3);
                $y4maks = min($ymaks4);
                $y5maks = min($ymaks5);
                $y6maks = min($ymaks6);
                $y7maks = min($ymaks7);
                $kuadraty1 = ($y1maks-$n1);
                $kuadraty2 = ($y2maks-$n2);
                $kuadraty3 = ($y3maks-$n3);
                $kuadraty4 = ($y4maks-$n4);
                $kuadraty5 = ($y5maks-$n5);
                $kuadraty6 = ($y6maks-$n6);
                $kuadraty7 = ($y7maks-$n7);
                $jsp    = (($kuadraty1*$kuadraty1) + ($kuadraty2*$kuadraty2) + ($kuadraty3*$kuadraty3) + ($kuadraty4*$kuadraty4) + ($kuadraty5*$kuadraty5) + ($kuadraty6*$kuadraty6) + ($kuadraty7*$kuadraty7)); 
       echo"
          <tr>
            <td>$no</td>
           <td>$loop[nama]</td>
           <td>".round(sqrt($jsp),3)."</td>
          </td>
          </tr>";
                $k++;
                $no++;
            }
            echo"
       </table>";
       $query=mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
       $k=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
       $n = mysqli_num_rows($k);
       echo"
       <h4>8. Hasil Perengkingan</h4>
       
       <table class='table table-striped'>
       <thead>
       <tr>
          <th> Nomor</th>
          <th> Nama </th>
          <th> Vi </th>
        </tr>
        </thead>
       
          ";
          $no = 0;
          $ymaks1 = array();
          $ymaks2 = array();
          $ymaks3 = array();
          $ymaks4 = array();
          $ymaks5 = array();
          $ymaks6 = array();
          $ymaks7 = array();
          foreach ($query as $data){
 
             $pembagi1 = 0;
             $pembagi2 = 0;
             $pembagi3 = 0;
             $pembagi4 = 0;
             $pembagi5 = 0;
             $pembagi6 = 0;
             $pembagi7 = 0;
             $querypembagi = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif");
             foreach($querypembagi as $pem)
             {
                 $pembagi1 = $pembagi1 + ($pem['c1']*$pem['c1']);
                 $pembagi2 = $pembagi2 + ($pem['c2']*$pem['c2']);
                 $pembagi3 = $pembagi3 + ($pem['c3']*$pem['c3']);
                 $pembagi4 = $pembagi4 + ($pem['c4']*$pem['c4']);
                 $pembagi5 = $pembagi5 + ($pem['c5']*$pem['c5']);
                 $pembagi6 = $pembagi6 + ($pem['c6']*$pem['c6']);
                 $pembagi7 = $pembagi7 + ($pem['c7']*$pem['c7']);
                }
                
                $y1 = round(($data['c1']/sqrt($pembagi1))*0.3,3);
                $y2= round($data['c2']/sqrt($pembagi2)*0.1,3);
                $y3 =round($data['c3']/sqrt($pembagi3)*0.2,3);
                $y4=round($data['c4']/sqrt($pembagi4)*0.1,3);
                $y5=round($data['c5']/sqrt($pembagi5)*0.2,3);
                $y6=round($data['c6']/sqrt($pembagi6)*0.05,3);
                $y7=round($data['c7']/sqrt($pembagi7)*0.05,3);
                $ymaks1[$no] = $y1;
                $ymaks2[$no] = $y2;
                $ymaks3[$no] = $y3;
                $ymaks4[$no] = $y4;
                $ymaks5[$no] = $y5;
                $ymaks6[$no] = $y6;
                $ymaks7[$no] = $y7;
                $no++;
            }

            $k = 0;
            $no = 1;
            $vi = array();
            $looping = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif ORDER BY c1+c2+c3+c4+c5+c6+c7 DESC");
            foreach ($looping as $loop){
                $n1 = $ymaks1[$k];
                $n2 = $ymaks2[$k];
                $n3 = $ymaks3[$k];
                $n4 = $ymaks4[$k];
                $n5 = $ymaks5[$k];
                $n6 = $ymaks6[$k];
                $n7 = $ymaks7[$k];
                $y1maks = max($ymaks1);
                $y2maks = max($ymaks2);
                $y3maks = max($ymaks3);
                $y4maks = max($ymaks4);
                $y5maks = max($ymaks5);
                $y6maks = max($ymaks6);
                $y7maks = max($ymaks7);
                $y1min = min($ymaks1);
                $y2min = min($ymaks2);
                $y3min = min($ymaks3);
                $y4min = min($ymaks4);
                $y5min = min($ymaks5);
                $y6min = min($ymaks6);
                $y7min = min($ymaks7);
                $kuadratp1 = ($y1maks-$n1);
                $kuadratp2 = ($y2maks-$n2);
                $kuadratp3 = ($y3maks-$n3);
                $kuadratp4 = ($y4maks-$n4);
                $kuadratp5 = ($y5maks-$n5);
                $kuadratp6 = ($y6maks-$n6);
                $kuadratp7 = ($y7maks-$n7);
                $kuadratm1 = ($y1min-$n1);
                $kuadratm2 = ($y2min-$n2);
                $kuadratm3 = ($y3min-$n3);
                $kuadratm4 = ($y4min-$n4);
                $kuadratm5 = ($y5min-$n5);
                $kuadratm6 = ($y6min-$n6);
                $kuadratm7 = ($y7min-$n7);
                $jsp    = (($kuadratp1*$kuadratp1) + ($kuadratp2*$kuadratp2) + ($kuadratp3*$kuadratp3) + ($kuadratp4*$kuadratp4) + ($kuadratp5*$kuadratp5) + ($kuadratp6*$kuadratp6) + ($kuadratp7*$kuadratp7)); 
                $jsm    = (($kuadratm1*$kuadratm1) + ($kuadratm2*$kuadratm2) + ($kuadratm3*$kuadratm3) + ($kuadratm4*$kuadratm4) + ($kuadratm5*$kuadratm5) + ($kuadratm6*$kuadratm6) + ($kuadratm7*$kuadratm7)); 
                
                $ajsp = round(sqrt($jsp),3);
                $ajsm = round(sqrt($jsm),3);
                $vi[$k]   = $ajsm/($ajsm+$ajsp);
                
                $k++;
                $no++;
            }
            rsort($vi);
            $i =0;
            $no = 1;
            $ranking = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif ORDER BY c1+c2+c3+c4+c5+c6+c7 DESC");
            foreach ($ranking as $rank){
                echo"
                <tr>
                <td>$no</td>
                <td>$rank[nama]</td>
                <td>".number_format($vi[$i],3)."</td>
                </td>
                </tr>";
                $i++;
                $no++;
            }
            echo"
            </table>
            <button type='button' class='btn btn-primary' onclick='cetak()'>Cetak</button>


            <script>
            function cetak(){
                window.print();
            }
            </script>
            ";
            
            
            
        }
        
    }
    ?>
