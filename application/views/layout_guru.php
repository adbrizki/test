<!doctype html>
<html lang="en">

<head>
	<title>SI INVENTARIS LABORATORIUM FISIKA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/chartist/css/chartist-custom.css">
	<!-- <link rel="stylesheet" href="<?=base_url()?>/assets/DataTables/datatables.css"> -->
	<!-- <link rel="stylesheet" href="<?=base_url()?>/assets/DataTables/datatables.min.css"> -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/DataTables/DataTables/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/DataTables/Buttons/css/buttons.dataTables.min.css">
	<link href="<?=base_url()?>/assets/vendor/dist/css/select2.min.css" rel="stylesheet" />
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>/assets/logo.png">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
	<!-- <script src="<?=base_url()?>/assets/DataTables/datatables.js"></script>
	<script src="<?=base_url()?>/assets/DataTables/datatables.min.js"></script> -->
	<script src="<?=base_url()?>/assets/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>/assets/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?=base_url()?>/assets/DataTables/Buttons/js/buttons.print.min.js"></script>
	<!-- <script src="<?=base_url()?>/assets/DataTables/Buttons/js/print.button2.js"></script> -->
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=base_url('Laboran')?>"><img src="<?=base_url()?>/assets/inventaris.png" style= "height: 35px"></a>
			</div>
			<div class="container-fluid">
				<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
					
						<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-user"></i> <span>Pengguna</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a >NIP : <?php echo $this->session->userdata('NIP'); ?></a></li>
										<li><a >Nama : <?php echo $this->session->userdata('Nama'); ?></a></li>
										<li><a >Status : <?php echo $this->session->userdata('Pangkat'); ?></a></li>
									</ul>
								</li>
							</ul>
					</div>
				
			</div>		
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav><br>
					<ul class="nav">
						<li>
							<a href="#peminjaman" data-toggle="collapse" class="collapsed"><i class="lnr lnr-hand"></i> <span>Peminjaman Barang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="peminjaman" class="collapse ">
								<ul class="nav">
									<li><a href="<?=base_url('transaksi/pinjam_alat')?>" class="">Peminjaman Alat Praktikum</a></li>
									<li><a href="<?=base_url('transaksi/pinjam_bahan')?>" class="">Peminjaman Bahan Praktikum</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#pengembalian" data-toggle="collapse" class="collapsed"><i class="lnr lnr-hand"></i> <span>Pengembalian Barang</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="pengembalian" class="collapse ">
								<ul class="nav">
									<li><a href="<?=base_url('transaksi/kembali_alat')?>" class="">Pengembalian Alat Praktikum</a></li>
									<li><a href="<?=base_url('transaksi/kembali_bahan')?>" class="">Pengembalian Bahan Praktikum</a></li>
								</ul>
							</div>
						</li>
					
						<li><a href="<?=base_url('guru/logout')?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<?php $this->load->view($konten)?>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>/assets/scripts/klorofil-common.js"></script>
	<script src="<?=base_url()?>/assets/vendor/dist/js/select2.min.js"></script>

	<script>
		$(".js-example-placeholder-single").select2({
			placeholder: "Silahkan Pilih",
			allowClear: true
		});
	</script>
</body>

</html>
