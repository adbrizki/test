<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Alat - Alat Praktikum</h3>
					
					<div class="row">
						
						<div class="col-md-13">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<datalist id="inputjumlah">
										<option value="1"></option>
										<option value="2"></option>
										<option value="3"></option>
										<option value="4"></option>
										<option value="5"></option>
										<option value="6"></option>
										<option value="7"></option>
										<option value="8"></option>
										<option value="9"></option>
										<option value="10"></option>
										<option value="11"></option>
										<option value="12"></option>
										<option value="13"></option>
										<option value="14"></option>
										<option value="15"></option>
										<option value="16"></option>
										<option value="17"></option>
										<option value="18"></option>
										<option value="19"></option>
										<option value="20"></option>
									</datalist>
									<datalist id="inputtahun">
										<?php for($year=date("Y");$year>=2000;$year--){ ?>
											<option value="<?php echo $year; ?>"></option>
										<?php } ?>
									</datalist>
								</div>
								<div class="panel-body">

									<div><?=$this->session->flashdata('notif');?></div>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">Tambah</button>
									
									<br><br>
									<table class="table table-hover" id="tabel">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Alat</th>
												<th>Jumlah</th>
												<th>B</th>
												<th>RR</th>
												<th>RB</th>
												<th>Rak</th>
												<th>Kode Lemari</th>
												<th>Lemari</th>
												<th>Ruangan</th>
												<th>Tahun Pengadaan</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi) {
												$no++; ?>
												<tr>
													<td></td>
													<td><?=$isi['nama_alat']?></td>
													<td><?=$isi['jumlah']?></td>
													<td><?=$isi['jumlah_baik']?></td>
													<td><?=$isi['jumlah_rusak_ringan']?></td>
													<td><?=$isi['jumlah_rusak_berat']?></td>
													<td><?=$isi['nama_rak']?></td>
													<td><?=$isi['id_lemari']?></td>
													<td><?=$isi['nama_lemari']?></td>
													<td><?=$isi['nama_ruangan']?></td>
													<td><?=$isi['tahun_pengadaan']?></td>
													<td>
														<a
															href="javascript:;"
															data-id_alat="<?php echo $isi['id_alat'] ?>"
															data-nama_alat="<?php echo $isi['nama_alat'] ?>"
															data-jumlah="<?php echo $isi['jumlah'] ?>"
															data-jumlah_baik="<?php echo $isi['jumlah_baik'] ?>"
															data-jumlah_rusak_ringan="<?php echo $isi['jumlah_rusak_ringan'] ?>"
															data-jumlah_rusak_berat="<?php echo $isi['jumlah_rusak_berat'] ?>"
															data-id_rak="<?php echo $isi['id_rak'] ?>"
															data-id_lemari="<?php echo $isi['id_lemari'] ?>"
															data-id_ruangan="<?php echo $isi['id_ruangan'] ?>"
															data-tahun_pengadaan="<?php echo $isi['tahun_pengadaan'] ?>"
															data-toggle="modal"
															data-target="#ModalUbah">
															<button type="button" class="btn btn-success"><i class ="lnr lnr-pencil"></i> Ubah </button>
														</a>
														<a href="<?=base_url('Laboran/alat_praktikum_hapus/'.$isi['id_alat'])?>"><button onclick="return confirm('Hapus ?');" type="button" class="btn btn-danger"><i class="lnr lnr-trash"></i> Hapus</button></a>
													</td>	
												</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama Alat</th>
												<th>Jumlah</th>
												<th>B</th>
												<th>RR</th>
												<th>RB</th>
												<th>Rak</th>
												<th>Kode Lemari</th>
												<th>Lemari</th>
												<th>Ruangan</th>
												<th>Tahun Pengadaan</th>
												<th>Opsi</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div id="ModalTambah" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Tambah</h4>
											</div>
											<div class="modal-body">
												<form action="<?=base_url('Laboran/alat_praktikum_tambah_update')?>" method="post">
													
													<h3 class="panel-title">Nama Alat</h3>
													<br>
													<input type="text" name="nama" class="form-control" placeholder="Nama Alat">
													<br>
													<h3 class="panel-title">Jumlah</h3>
													<br>
													<input type="number" list="inputjumlah" name="jumlah" class="form-control" placeholder="Jumlah" min="0">
													<br>
													<h3 class="panel-title">Kondisi :</h3>
													<br>
													<div class="row">
														<div class="col-md-4">
													<h3 class="panel-title">Baik</h3>
													<br>
													<input type="number" list="inputjumlah" name="baik" class="form-control" placeholder="Jumlah Baik" min="0">
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Rusak Ringan</h3>
													<br>
													<input type="number" list="inputjumlah" name="rusakringan" class="form-control" placeholder="Jumlah Rusak Ringan" min="0">
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Rusak Berat</h3>
													<br>
													<input type="number" list="inputjumlah" name="rusakberat" class="form-control" placeholder="Jumlah Rusak Berat" min="0">
														</div>
													</div>
													<br>
													<h3 class="panel-title">Terletak di Ruangan</h3>
													<br>
													<select class="form-control" name="ruangan" id="ruangans" onchange="panggil_lemari()">	
														<option value="" disabled selected hidden>Pilih Ruangan</option>
															<?php foreach ($ruangan as $ruangannya) { ?>
														<option value="<?=$ruangannya['id_ruangan']?>">
															<?=$ruangannya['nama_ruangan']?>
														</option>
															<?php } ?>
													</select>
													<br>
													<div class="row">
														<div class="col-md-8">
													<h3 class="panel-title">Nama Lemari</h3>
													<br>
													<select class="form-control" name="lemari" id="lemaris" onchange="panggil_rak()">
														<option value="" disabled selected hidden>Pilih Lemari</option>

													</select>
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Kode Lemari</h3>
													<br>
													<input type="text" id="kodeLemari" readonly class="form-control">
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-md-7">
													<h3 class="panel-title">Nama Rak</h3>
													<br>
													<select class="form-control" name="rak" id="raks" onchange="f1xx()">
														<option value="" disabled selected hidden>Pilih Rak</option>
													</select>
														</div>
														<div class="col-md-5">
															<h3 class="panel-title">Tahun Pengadaan</h3>
															<br>
															<input type="number" list="inputtahun" name="tahun" class="form-control" placeholder="Tahun Pengadaan" min="2000">	
														</div>
													</div>
													<br>
													<input type="submit" class="btn btn-primary" value="Tambah">
													<br>
												</form>
											</div>
											<div class="modal-footer">
												<button class="btn btn-danger" data-dismiss="modal">Batal</button>
											</div>
										</div>
									</div>
								</div>
								<div id="ModalUbah" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Ubah</h4>
											</div>
											<div class="modal-body">
												<form action="<?=base_url('Laboran/alat_praktikum_ubah_update')?>" method="post">
													<input type="hidden" name="id" id="idku">
													<h3 class="panel-title">Nama Alat</h3>
													<br>
													<input type="text" name="namax" id="namaku" class="form-control" placeholder="Nama Alat">
													<br>
													<h3 class="panel-title">Jumlah</h3>
													<br>
													<input type="number" list="inputjumlah" name="jumlahx" id="jumlahku" class="form-control" placeholder="Jumlah" min="1">
													<br>
													<h3 class="panel-title">Kondisi :</h3>
													<br>
													<div class="row">
														<div class="col-md-4">
													<h3 class="panel-title">Baik</h3>
													<br>
													<input type="number" list="inputjumlah" name="baikx" id="baikku" class="form-control" placeholder="Jumlah Baik" min="0">
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Rusak Ringan</h3>
													<br>
													<input type="number" list="inputjumlah" name="rusakringanx" id="rusakringanku" class="form-control" placeholder="Jumlah Rusak Ringan" min="0">
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Rusak Berat</h3>
													<br>
													<input type="number" list="inputjumlah" name="rusakberatx" id="rusakberatku" class="form-control" placeholder="Jumlah Rusak Berat" min="0">
														</div>
													</div>
													<br>
													<h3 class="panel-title">Terletak di Ruangan</h3>
													<br>
													<select class="form-control" name="ruanganx" id="ruanganku" onchange="panggil_lemari2()">
															<?php foreach ($ruangan as $ruangannya) { ?>
														<option value="<?=$ruangannya['id_ruangan']?>">
															<?=$ruangannya['nama_ruangan']?>
														</option>
															<?php } ?>
													</select>
													<br>
													<div class="row">
														<div class="col-md-8">
													<h3 class="panel-title">Nama Lemari</h3>
													<br>
													<select class="form-control" name="lemarix" id="lemariku" onchange="panggil_rak2()">
													</select>
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Kode Lemari</h3>
													<br>
													<input type="text" id="kodeLemarix" readonly class="form-control">
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-md-8">
													<h3 class="panel-title">Nama Rak</h3>
													<br>
													<select class="form-control" name="rakx" id="rakku" onchange="f2xx()">
													</select>
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Tahun Pengadaan</h3>
													<br>
													<input type="number" name="tahunx" id="tahunku" list="inputtahun" class="form-control" placeholder="Tahun Pengadaan" min="2000">
														</div>
													</div>
													<br>
													<input type="submit" class="btn btn-primary" value="Ubah">
													<br>
												</form>
											</div>
											<div class="modal-footer">
												<button class="btn btn-danger" data-dismiss="modal">Batal</button>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- END TABLE HOVER -->
						</div>
					</div>
					
				</div>
			</div>
			<script type="text/javascript">
				
				$(document).ready(function(){
					$('#ModalUbah').on('show.bs.modal', function(event){
						var div = $(event.relatedTarget)
						var modal = $(this)

						modal.find('#idku').attr("value",div.data('id_alat'));
						modal.find('#namaku').attr("value",div.data('nama_alat'));
						modal.find('#jumlahku').attr("value",div.data('jumlah'));
						modal.find('#baikku').attr("value",div.data('jumlah_baik'));
						modal.find('#rusakringanku').attr("value",div.data('jumlah_rusak_ringan'));
						modal.find('#rusakberatku').attr("value",div.data('jumlah_rusak_berat'));
						modal.find('#tahunku').attr("value",div.data('tahun_pengadaan'));
						modal.find('#ruanganku option').each(function(){
							if($(this).val()==div.data('id_ruangan'))
								$(this).attr("selected","selected");
						})
						fungsi_ubah(div.data('id_ruangan'),div.data('id_lemari'));
						fungsi_ubah2(div.data('id_lemari'),div.data('id_rak'));
					});
				});
				
			</script>
			<script type="text/javascript">
				function panggil_lemari(){
					var id_ruangan = $("#ruangans").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/bahan_lemari'; ?>",
      					data : "id_ruangan="+id_ruangan,
      					cache : false,
      					success: function(msg){
        					$("#lemaris").html(msg);
        					panggil_rak();
      					}
					});
				}
				
				function panggil_rak(){
					var id_lemari = $("#lemaris").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/bahan_rak'; ?>",
      					data : "id_lemari="+id_lemari,
      					cache : false,
      					success: function(msg){
        					$("#raks").html(msg);
        					f1x();
      					}
					})
				}
				function panggil_lemari2(){
					var id_ruangan = $("#ruanganku").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/bahan_lemari'; ?>",
      					data : "id_ruangan="+id_ruangan,
      					cache : false,
      					success: function(msg){
        					$("#lemariku").html(msg);
        					panggil_rak2();
      					}
					})
				}
				
				function panggil_rak2(){
					var id_lemari = $("#lemariku").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/bahan_rak'; ?>",
      					data : "id_lemari="+id_lemari,
      					cache : false,
      					success: function(msg){
        					$("#rakku").html(msg);
        					f2x();
      					}
					})
				}
				function fungsi_ubah(id_ruangan,id_lemari){
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/bahan_lemari_ubah'; ?>",
      					data : {id_ruangan:id_ruangan,id_lemari,id_lemari},
      					cache : false,
      					success: function(msg){
        					$("#lemariku").html(msg);
      					}
					})
				}
				function fungsi_ubah2(id_lemari,id_rak){
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/bahan_rak_ubah'; ?>",
      					data : {id_lemari:id_lemari,id_rak,id_rak},
      					cache : false,
      					success: function(msg){
        					$("#rakku").html(msg);
        					f3x();
      					}
					})
				}
			</script>
			<script type="text/javascript">
				$(document).ready(function(){
					var tabelnya = $("#tabel").DataTable({						
						"language" : {
					 		"paginate" : {
					 			"next" : "Selanjutnya",
					 			"previous" : "Sebelumnya"
					 		},
					 		"lengthMenu" : "Tampilkan _MENU_ Baris",
					 		"search" : "Cari : ",
					 		"emptyTable" : "Maaf, Data Kosong",
					 		"zeroRecords" : "Maaf, Data Tidak Ada"
					 	},
					 	"order" : [[1,'asc']],
					 	dom: 'fBtlpr',
					 	lengthMenu : [[10,25,50,-1],[10,25,50,"Semua"]],
					 	buttons:{
						 	buttons: [
						 		{					 			
						 			title: '',
						 			className : 'btn btn-primary',
						 			extend: 'print',
						 			text: '<i class="lnr lnr-printer"></i> Cetak',

						 			exportOptions:{
						 				columns: [0,1,2,3,4,5,6,8,9,10]
						 			},
						 			messageTop : '<img src="<?=base_url()?>/assets/logo.png" style="height:90px; width:90px ;position:absolute ;top:20 ;left:0;"><h3>Kementerian Pendidikan dan Kebudayaan<br>SMAN 6 Kota Bengkulu</h3><h5>Jl. Jl. Pratu Aidit Bengkulu 38118 <br>Telepon/Faximile : 0736-26690 </h5><br><h4>Daftar Alat-Alat Praktikum</h4>',
						 			customize: function(win){
						 				$(win.document.body).css('font-family','Times New Roman');
						 				$(win.document.body).find('table thead tr th').addClass('table-bordered').css('text-align','center');
						 				$(win.document.body).find('table tbody tr td').addClass('table-bordered');
						 				$(win.document.body).find('h3').css('text-align','center');
						 				$(win.document.body).find('h4').css('text-align','center');
						 				$(win.document.body).find('h5').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(1)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(3)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(4)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(5)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(6)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(10)').css('text-align','center');
						 			},
						 		}
						 	],
						 	dom:{
								button: {
									className: 'btn'
								}
							}
						 }
					 });
					$('#carinama').on('keyup',function(){
						tabelnya.columns(1).search(this.value).draw();
					});
					$('#carijumlah').on('keyup',function(){
						tabelnya.columns(2).search(this.value).draw();
					});
					$('#caribaik').on('keyup',function(){
						tabelnya.columns(3).search(this.value).draw();
					});
					$('#cariringan').on('keyup',function(){
						tabelnya.columns(4).search(this.value).draw();
					});
					$('#cariberat').on('keyup',function(){
						tabelnya.columns(5).search(this.value).draw();
					});
					$('#carirak').on('keyup',function(){
						tabelnya.columns(6).search(this.value).draw();
					});
					$('#carikodelemari').on('keyup',function(){
						tabelnya.columns(7).search(this.value).draw();
					});
					$('#carilemari').on('keyup',function(){
						tabelnya.columns(8).search(this.value).draw();
					});
					$('#cariruangan').on('keyup',function(){
						tabelnya.columns(9).search(this.value).draw();
					});
					$('#caritahun').on('keyup',function(){
						tabelnya.columns(10).search(this.value).draw();
					});
					tabelnya.on('order.dt search.dt',function(){
						tabelnya.column(0,{search:'applied',order:'applied'}).nodes().each(function(cell,i){
							cell.innerHTML = i+1;
							tabelnya.cell(cell).invalidate('dom');
						});
					}).draw();
				});
			</script>
			
			<script type="text/javascript">
				function f1(){
					var data = document.getElementById("ruangans");
					document.getElementById("kodeRuangan").value = data.options[data.selectedIndex].value;

				}
				function f1x(){
					var data = document.getElementById("lemaris");
					document.getElementById("kodeLemari").value = data.options[data.selectedIndex].value;

				}
				function f1xx(){
					var data = document.getElementById("raks");
					document.getElementById("kodeRak").value = data.options[data.selectedIndex].value;

				}

				function f2(){
					var data = document.getElementById("ruanganku");
					document.getElementById("kodeRuanganx").value = data.options[data.selectedIndex].value;

				}
				function f2x(){
					var data = document.getElementById("lemariku");
					document.getElementById("kodeLemarix").value = data.options[data.selectedIndex].value;

				}
				function f2xx(){
					var data = document.getElementById("rakku");
					document.getElementById("kodeRakx").value = data.options[data.selectedIndex].value;

				}

				function f3(){
					var data = document.getElementById("ruanganku");
					document.getElementById("kodeRuanganx").value = data.options[data.selectedIndex].value;

				}
				function f3x(){
					var data = document.getElementById("lemariku");
					document.getElementById("kodeLemarix").value = data.options[data.selectedIndex].value;

				}
				function f3xx(){
					var data = document.getElementById("rakku");
					document.getElementById("kodeRakx").value = data.options[data.selectedIndex].value;

				}
				
			</script>
			<script type="text/javascript">
				function icon(){
					document.getElementById("ikon").className="fa fa-spinner fa-spin";
				}
				function iconhapus(){
					document.getElementById("ikon").className="";
				}
				function saring(){
					if(document.getElementById("carinama").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();	
					}else if(document.getElementById("carijumlah").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("caribaik").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("cariringan").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("cariberat").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carirak").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carikodelemari").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carilemari").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("cariruangan").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("caritahun").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else{
						document.getElementById("saringan").className="btn btn-primary";
						iconhapus();
					}
				}
			</script>
			
			