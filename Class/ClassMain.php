<?php
    require_once "ClassPengguna.php";
   // require_once "ClassPengelola.php"
	class Main extends Pengguna{ 
				
				function halaman_admin()
				{
				?>
				<?php 

				session_start();
				           
				?>
				<!DOCTYPE html>
				<html lang="en">
				<head>
				  <meta charset="utf-8">
				  <meta name="viewport" content="width=device-width, initial-scale=1">
				  <title>Admin</title>

				  <!-- Google Font: Source Sans Pro -->
				  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
				  <!-- Font Awesome -->
				  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
				  <!-- Ionicons -->
				  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
				  <!-- Tempusdominus Bootstrap 4 -->
				  <link rel="stylesheet" href="/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
				  <!-- iCheck -->
				  <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
				  <!-- JQVMap -->
				  <link rel="stylesheet" href="AdminLTE/plugins/jqvmap/jqvmap.min.css">
				  <!-- Theme style -->
				  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  <!-- overlayScrollbars -->
				  <link rel="stylesheet" href="AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
				  <!-- Daterange picker -->
				  <link rel="stylesheet" href="AdminLTE/plugins/daterangepicker/daterangepicker.css">
				  <!-- summernote -->
				  <link rel="stylesheet" href="AdminLTE/plugins/summernote/summernote-bs4.min.css">
				  <style type="text/css">
				    iframe{
				      border:none;
				      width: 100%;
				      min-height: 3000px;
				    }
				  </style>
				</head>
				<body class="hold-transition sidebar-mini layout-fixed">
				<div class="wrapper">

				  <!-- Preloader -->
				  <div class="preloader flex-column justify-content-center align-items-center">
				    <img class="animation__shake" src="AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
				  </div>

				  <!-- Navbar -->
				  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
				    <!-- Left navbar links -->
				    <ul class="navbar-nav">
				      <li class="nav-item">
				        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				      </li>
				      <li class="nav-item d-none d-sm-inline-block">
				        <h4>Sistem Penunjang Keputusan Pemilihan Calon Karyawan Baru</h4>
				      </li>
				    </ul>

				  </nav>
				  <!-- /.navbar -->

				  <!-- Main Sidebar Container -->
				  <aside class="main-sidebar sidebar-dark-primary elevation-4">
				    <!-- Brand Logo -->

				    <!-- Sidebar -->
				    <div class="sidebar">
				      <!-- Sidebar user panel (optional) -->
				      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
				        <div class="image">
				           <img src="AdminLTE/dist/img/logo.png" alt="AdminLTE Logo" style="width: 90%;height: 80%;margin-top: 3%"><br>
				            <b><a>PT ASSOCIATE BRITISH BUDI</a></b>
				        </div>
				       
				      </div>

				      <!-- Sidebar Menu -->
				      <nav class="mt-2">
				        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				          <!-- Add icons to the links using the .nav-icon class
				               with font-awesome or any other icon font library -->
				          <li class="nav-item menu-open">
				            <a href=""  class="nav-link active">
				              <i class="nav-icon fas fa-tachometer-alt"></i>
				              <p>
				                Beranda
				              </p>
				            </a>
				          </li> 
				          <li class="nav-item">
				            <a href="data_pengguna.php?cari" target=isi class="nav-link">
				              <i class="nav-icon fas fa-user-circle"></i>
				              <p>
				                Pengguna
				              </p>
				            </a>
				          </li>
				          <li class="nav-item">
				            <a href="data_calon_karyawan.php?cari" target=isi class="nav-link">
				              <i class="nav-icon fas fa-users"></i>
				              <p>
				                Calon Karyawan
				              </p>
				            </a>
				          </li>
				          <li class="nav-item">
				            <a href="data_kriteria.php?cari"  target=isi class="nav-link">
				              <i class="nav-icon fas fa-file"></i>
				              <p>
				                Kriteria
				              </p>
				            </a>
				          </li>

				          <li class="nav-item">
				            <a href="data_alternatif.php?cari" target=isi class="nav-link">
				              <i class="nav-icon fas fa-file"></i>
				              <p>
				                Alternatif
				              </p>
				            </a>
				          </li>

				          <li class="nav-item">
				            <a href="#" class="nav-link">
				              <i class="nav-icon fas fa-chart-bar"></i>
				              <p>
				                Penilaian
				                <i class="right fas fa-angle-left"></i>
				              </p>
				            </a>
				            <ul class="nav nav-treeview">
				              <li class="nav-item">
				                <a href="smart.php" target=isi class="nav-link">
				                  <i class="far fa-circle nav-icon"></i>
				                  <p>SMART</p>
				                </a>
				              </li>
				              <li class="nav-item">
				                <a href="topsis.php" target=isi  class="nav-link">
				                  <i class="far fa-circle nav-icon"></i>
				                  <p>Topsis</p>
				                </a>
				              </li>
				             </ul>
				          </li>  
				          <li class="nav-item">
				            <a href="logout.php" class="nav-link">
				              <i class="nav-icon fas fa-arrow-circle-left"></i>
				              <p>
				                Keluar
				              </p>
				            </a>
				          </li>
				        </ul>
				      </nav>
				      <!-- /.sidebar-menu -->
				    </div>
				    <!-- /.sidebar -->
				  </aside>

				  <!-- Content Wrapper. Contains page content -->
				  <div class="content-wrapper">
				    <!-- Content Header (Page header) -->
				    <div class="content-header">
				      <div class="container-fluid">
				        <div class="row mb-2">
				          <div class="col-sm-6">
				            <h3 class="m-0"></h3>
				          </div><!-- /.col -->
				        </div><!-- /.row -->
				      </div><!-- /.container-fluid -->
				    </div>
				    <!-- /.content-header -->

				    <!-- Main content -->
				    <section class="content">
				     <iframe src="" name=isi>
				       
				     </iframe>
				    </section>  
				    <!-- /.content -->
				  </div>
				  <!-- /.content-wrapper -->
				  <footer class="main-footer">
				    <strong>Copyright &copy; HORIZON KARAWANG.</strong>
				  
				    <div class="float-right d-none d-sm-inline-block">
				      <b>2021</b>
				    </div>
				  </footer>

				  <!-- Control Sidebar -->
				  <aside class="control-sidebar control-sidebar-dark">
				    <!-- Control sidebar content goes here -->
				  </aside>
				  <!-- /.control-sidebar -->
				</div>
				<!-- ./wrapper -->

				<!-- jQuery -->
				<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
				<!-- jQuery UI 1.11.4 -->
				<script src="AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
				<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
				<script>
				  $.widget.bridge('uibutton', $.ui.button)
				</script>
				<!-- Bootstrap 4 -->
				<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- ChartJS -->
				<script src="AdminLTE/plugins/chart.js/Chart.min.js"></script>
				<!-- Sparkline -->
				<script src="AdminLTE/plugins/sparklines/sparkline.js"></script>
				<!-- JQVMap -->
				<script src="AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
				<script src="AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
				<!-- jQuery Knob Chart -->
				<script src="AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
				<!-- daterangepicker -->
				<script src="AdminLTE/plugins/moment/moment.min.js"></script>
				<script src="AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
				<!-- Tempusdominus Bootstrap 4 -->
				<script src="AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
				<!-- Summernote -->
				<script src="AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
				<!-- overlayScrollbars -->
				<script src="AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
				<!-- AdminLTE App -->
				<script src="AdminLTE/dist/js/adminlte.js"></script>
				<!-- AdminLTE for demo purposes -->
				<script src="AdminLTE/dist/js/demo.js"></script>
				<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
				<script src="AdminLTE/dist/js/pages/dashboard.js"></script>
				</body>
			    </html>
 

				<?php
                  }
			  function form_login()
                 {
                 	?>
                 <!DOCTYPE html>
                 <html lang="en">
				  <head>
				  	<title>Login</title>
				    <meta charset="utf-8">
				    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

					<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
					
					<link rel="stylesheet" href="assets/css/style.css">
                    <style type="text/css">
                    	body{
                    		background-image: url('assets/images/foto.jpeg');
                    		background-size: cover;
                    		background-repeat: no-repeat;
                    	}
                    	
                    </style>
					</head>
					<body>
					<section class="ftco-section">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-6 text-center mb-2">
									<h2 class="heading-section">PT ASSOCIATED BRITISH BUDI</h2>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-7 col-lg-5" >
									<div class="login-wrap p-4 p-md-5" style="background: rgba(0, 0,0, 0.5);">
						      	<div class="icon d-flex align-items-center justify-content-center">
						      		<span class="fa fa-user-o"></span>
						      	</div>
						      	<h3 class="text-center mb-4">Sign In</h3>
							    <form action="login.php" class="login-form" method="post">
						      		<div class="form-group">
						      			<input type="text" name="nik" class="form-control rounded-left" placeholder="Nik" required>
						      		</div>
					            <div class="form-group d-flex">
					              <input type="password" name=password class="form-control rounded-left" placeholder="Password" required>
					            </div>
					            <div class="form-group">
					            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
					            </div>
					            <div class="form-group d-md-flex">
					            	<div class="w-50"><!-- 
					            		<label class="checkbox-wrap checkbox-primary">Remember Me
													  <input type="checkbox" checked>
													  <span class="checkmark"></span>
													</label>
												</div>
												<div class="w-50 text-md-right">
													<a href="#">Forgot Password</a> -->
									 </div>
					            </div>
					          </form>
					        </div>
								</div>
							</div>
						</div>
					</section>

					</body>
				</html>


				<?php
				}
				function form_calon_karyawan()
				{
					
				?>
				<html>
				  <head>  
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  </head>
				  <body>
					<fieldset>
					 <legend>Input Calon Karyawan</legend>	
				       <div class="container">	
						<form action="simpan_calon_karyawan.php" method="post">
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Id Calon Karyawan</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name=id>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=nama>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Alamat</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" name=alamat></textarea>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Tgl Lahir</label>
						    <div class="col-sm-10">
						      <input type="date" class="form-control" name=tgl_lahir>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" name=email>
						    </div>
						  </div>
						  <button type="submit" class="btn btn-primary">Simpan</button>&nbsp&nbsp&nbsp&nbsp&nbsp
						  <a href="data_pengguna.php?cari"><button type="button" class="btn btn-success">Kembali</button></a>
						</form>
					</div>
				    </fieldset>
				  </body>

				</html>

				<?php
				}
				function form_edit_calon_karyawan()
				{
				$id=$_GET['id'];
				$getdata = mysqli_query($this->koneksi->link,"select * from calon_karyawan where id='$id'");
				$data=mysqli_fetch_array($getdata);
				?>	
				
				<html>
				  <head>  
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  </head>
				  <body>
					<fieldset>
					 <legend>Edit Calon Karyawan</legend>	
				       <div class="container">	
						<form action="edit_calon_karyawan.php" method="post">
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Id Calon Karyawan</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name=id value="<?php echo $data['id']?>" readonly="">
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=nama value="<?php echo $data['nama']?>">
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Alamat</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" name=alamat><?php echo $data['id']?></textarea>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Tgl Lahir</label>
						    <div class="col-sm-10">
						      <input type="date" class="form-control" name=tgl_lahir value="<?php echo $data['tgl_lahir']?>">
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" name=email value="<?php echo $data['email']?>">
						    </div>
						  </div>
						  <button type="submit" class="btn btn-primary">Edit</button>&nbsp&nbsp&nbsp&nbsp&nbsp
						  <a href="data_pengguna.php?cari"><button type="button" class="btn btn-success">Kembali</button></a>
						</form>
					</div>
				    </fieldset>
				  </body>

				</html>

				<?php
				}

                 function form_pengguna()
				{
					
				?>
				<html>
				  <head>  
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  </head>
				  <body>
					<fieldset>
					 <legend>Input Pengguna</legend>	
				       <div class="container">	
						<form action="simpan_pengguna.php" method="post">
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Nik</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name=nik>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=nama>
						    </div>
						  </div>
						  <div class="row mb-3">  
				            <div class="input-group">
				              <label  class="col-sm-2 col-form-label">Akses</label>
					             <div class="col-sm-10"> 
					              <select class="form-control" id="" name=akses required="">
					                <option value=''>Pilih</option>
					                <option value="HRD">HRD</option>
					                <option value="Manager">Manager</option>
					              </select>
				              </div>
				             </div>
				          </div>  
				        
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name=password>
						    </div>
						  </div>
						  <button type="submit" class="btn btn-primary">Simpan</button>&nbsp&nbsp&nbsp&nbsp&nbsp
						  <a href="data_pengguna.php?cari"><button type="button" class="btn btn-success">Kembali</button></a>
						</form>
					</div>
				    </fieldset>
				  </body>

				</html>

				<?php
				}
				function form_edit_pengguna()
				{
				$nik=$_GET['nik'];
				$getdata = mysqli_query($this->koneksi->link,"select * from pengguna where nik='$nik'");
				$data=mysqli_fetch_array($getdata);
				?>
				

				<html>
				  <head>
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  </head>
                  <body>	
					<fieldset>
						<legend>Edit Pengguna</legend>
					 <div class="container">	
						<form action="edit_pengguna.php" method="post">
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Nik</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name=nik value="<?php echo $data['nik']?>" readonly>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Nama</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=nama value="<?php echo $data['nama']?>">
						    </div>
						  </div>
						 <div class="row mb-3">  
				            <div class="input-group">
				              <label  class="col-sm-2 col-form-label">Akses</label>
					             <div class="col-sm-10"> 
					              <select class="form-control" id="" name=agama required="">
					                <option value=''>Pilih</option>
					                <option value="HRD">HRD</option>
					                <option value="Manager">Manager</option>
					              </select>
				              </div>
				             </div>
				          </div>  
				        
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" name=password value="<?php echo $data['password']?>">
						    </div>
						  </div>
						  <button type="submit" class="btn btn-primary">Edit</button>&nbsp&nbsp&nbsp&nbsp&nbsp
						  <a href="data_pengguna.php?cari"><button type="button" class="btn btn-success">Kembali</button></a>
						</form>
					  </div>
					</fieldset>	
				  	 
				  </body>

				</html>
                <?php
				}
			
				function form_kriteria()
				{
				$query = mysqli_query($this->koneksi->link, "SELECT max(kode_kriteria) as kode_kriteria FROM kriteria");
							$data = mysqli_fetch_array($query);
							$kode = $data['kode_kriteria'];
							$urutan = (int) substr($kode, 1, 1);
							$urutan++;
							$huruf = "C";
							$kode = $huruf . sprintf("%01s", $urutan);
							$kode;	
				?>

				<html>
				  <head>  
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  </head>
				  <body>
					<fieldset>
					 <legend>Input Kriteria</legend>	
				       <div class="container">	
						<form action="simpan_kriteria.php" method="post">
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Kode Kriteria</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=kode_kriteria value="<?php echo $kode;?>" readonly>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Keterangan</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=keterangan>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Bobot</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=bobot placeholder="%">
						    </div>
						  </div>
						  <button type="submit" class="btn btn-primary">Simpan</button>&nbsp&nbsp&nbsp&nbsp&nbsp
						  <a href="data_kriteria.php?cari"><button type="button" class="btn btn-success">Kembali</button></a>
						</form>
					</div>
				    </fieldset>
				  </body>

				</html>
			<?php
           	}
           	
				function form_edit_kriteria()
				{
				$id=$_GET['id'];
				$getdata = mysqli_query($this->koneksi->link,"select * from kriteria where kode_kriteria='$id'");
				$data=mysqli_fetch_array($getdata);
				?>
   			    <html>
				  <head>  
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  </head>
				  <body>
					<fieldset>
					 <legend>Edit Kriteria</legend>	
				       <div class="container">	
						<form action="edit_kriteria.php" method="post">
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Kode Kriteria</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=kode_kriteria value="<?php echo $id;?>" readonly>
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Keterangan</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=keterangan value="<?php echo $data['keterangan']?>">
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label  class="col-sm-2 col-form-label">Bobot</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name=bobot value="<?php echo $data['bobot']?>">
						    </div>
						  </div>
						  <button type="submit" class="btn btn-primary">Edit</button>&nbsp&nbsp&nbsp&nbsp&nbsp
						  <a href="data_kriteria.php?cari"><button type="button" class="btn btn-success">Kembali</button></a>
						</form>
					</div>
				    </fieldset>
				  </body>

				</html>
			    <?php
				}		
	
				 function form_alternatif(){

		    	$query = mysqli_query($this->koneksi->link,"SELECT max(kode_alternatif) as kodeTerbesar FROM alternatif");
				$data = mysqli_fetch_array($query);
				$kode = $data['kodeTerbesar'];
				 
				$urutan = (int) substr($kode, 1, 1);
				$urutan++;
				$huruf = "A";
				$kode = $huruf . sprintf("%01s", $urutan);

		    	?>
		    	<!DOCTYPE html>
		    	<html>
		    	<head>
		    		
				  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  
		    	</head>
		    	<body>
		    	<fieldset>
		    		<legend>Input Alternatif</legend>
		    	     <div class="container">	
					  <form action="simpan_alternatif.php" method="post"> 
				      <div class="form-group">
					    <label >Kode Alternatif</label>
					    <input type="text" class="form-control" name=kode_alternatif value="<?php echo $kode;?>" readonly>
					  </div>
				     
				      <div class="form-group">
					    <label>Nama </label>
					    <select class="form-control" name="nama"  required="">
					      <option value="">pilih</option>
					      <?php 
		                   $sql=mysqli_query($this->koneksi->link,"SELECT * FROM calon_karyawan");
		                   $num=mysqli_num_rows($sql);
		                   for($i=0;$i<$num;$i++){

		                   	$data=mysqli_fetch_array($sql);
					      ?>
					      <option value='<?php echo $data['nama']?>'><?php echo $data['nama']?></option>
					      <?php
			  		        }
					      ?>
					    </select>
					  </div>
					  <?php 
					  $query=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
					  $nums=mysqli_num_rows($query);
					 
					  for($i=1;$i<=$nums;$i++){
					   $kriteria=mysqli_fetch_array($query);
				
				
					  ?>
					  <div class="form-group">
					    <label ><?php echo$kriteria['keterangan'] ?></label>
                        <select name="<?php echo'c'.$i;?>" class="form-control" required>
                        	<option value="">Pilih</option>
                        	<option value="5">Sangat Baik</option>
                        	<option value="4">Baik</option>
                        	<option value="3">Cukup</option>
                        	<option value="2">Kurang</option>
                        	<option value="1">Sangat Kurang</option>
                        </select>
					  </div>
				      
				      <?php } ?>
					  <button type="submit" class="btn btn-primary"><i class='fa fa-save'></i> Simpan</button>
		              <a href="data_alternatif.php?cari" class="btn btn-success">Kembali</a>
					</form>
				    </div>
					</fieldset>	
		    	</body>
		    	</html>
		    	<?php
		    }

		        function form_edit_alternatif(){
		        $kode=$_GET['kode'];
		    	$query = mysqli_query($this->koneksi->link,"SELECT * FROM alternatif WHERE kode_alternatif = '$kode'");
				
				$a = mysqli_fetch_array($query);
				
		    	?>
		    	<!DOCTYPE html>
		    	<html>
		    	<head>
		    		  	<link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
				  
		    	<title></title>
		    	</head>
		    	<body>
		    	<fieldset>
		    		<legend>Edit Alternatif</legend>
		    	<div class="container">
		    	<form action="edit_alternatif.php" method="post"> 
				      <div class="form-group">
					    <label >Kode Alternatif</label>
					    <input type="text" class="form-control" name=kode_alternatif value="<?php echo $kode;?>" readonly>
					  </div>
				     
				      <div class="form-group">
					    <label>Nama </label>
					    <select class="form-control" name="nama"  required="">
					      <option value="">pilih</option>
					      <?php 
		                   $sql=mysqli_query($this->koneksi->link,"SELECT * FROM calon_karyawan");
		                   $num=mysqli_num_rows($sql);
		                   for($i=0;$i<$num;$i++){

		                   	$data=mysqli_fetch_array($sql);
					      ?>
					      <option value='<?php echo $data['nama']?>' selected="<?php echo $data['nama']?>"><?php echo $data['nama']?></option>
					      <?php
			  		        }
					      ?>
					    </select>
					  </div>
					  <?php 
					  $query=mysqli_query($this->koneksi->link,"SELECT * FROM kriteria");
					  $nums=mysqli_num_rows($query);
					 
					  for($i=1;$i<=$nums;$i++){
					  	 $kriteria=mysqli_fetch_array($query);
				
					  ?>
					  <div class="form-group">
					    <label ><?php echo$kriteria['keterangan'] ?></label>
					    <select name="<?php echo'c'.$i;?>" class="form-control" required>
                        	<option value="">Pilih</option>
                        	<option value="5" selected="<?php echo'c'.$i; ?>">Sangat Baik</option>
                        	<option value="4" selected="<?php echo'c'.$i; ?>">Baik</option>
                        	<option value="3" selected="<?php echo'c'.$i; ?>">Cukup</option>
                        	<option value="2" selected="<?php echo'c'.$i; ?>">Kurang</option>
                        	<option value="1" selected="<?php echo'c'.$i; ?>">Sangat Kurang</option>
                        </select>
					  </div>
				      
				      <?php } ?>
					  <button type="submit" class="btn btn-primary"><i class='fa fa-save'></i> Simpan</button>
		              <a href="data_alternatif.php?cari" class="btn btn-success">Kembali</a>
					</form>
					</div>
				</fieldset>
		    	</body>
		    	</html>
		    	<?php
		    }


  }		

?>
