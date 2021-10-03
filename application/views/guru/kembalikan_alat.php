<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Pengembalian Alat - Alat Praktikum</h3>
					
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
									
									<table class="table table-hover" id="tabel">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Alat</th>
												<th>Jumlah</th>
												<th>Jumlah Dipinjam</th>
												<th>Rak</th>
												<th>Kode Lemari</th>
												<th>Lemari</th>
												<th>Ruangan</th>
												<th>Tahun Pengadaan</th>
												<th>Status</th>
                                                <th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; 
											foreach ($data as $isi) {
												$no++; ?>
												<tr>
													<td><?=$no?></td>
													<td><?=$isi['nama_alat']?></td>
													<td><?=$isi['jumlah']?></td>
													<td><?=$isi['jumlah_pinjam']?></td>
													<td><?=$isi['nama_rak']?></td>
													<td><?=$isi['id_lemari']?></td>
													<td><?=$isi['nama_lemari']?></td>
													<td><?=$isi['nama_ruangan']?></td>
													<td><?=$isi['tahun_pengadaan']?></td>
													<td>
														<?=$isi['status'] ?>														
													</td>
                                                    <td>
                                                    <?php if($isi['status'] != 'Dikembalikan'){ ?>
                                                    <a  style="margin-top:5px" href="<?=base_url('transaksi/pengembalian_alat/'.$isi['id_pinjam'])?>" class="btn btn-success btn-sm"><i>Kembalikan</i></a>
                                                        <?php } ?>
                                                    </td>	
												</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama Alat</th>
												<th>Jumlah</th>
												<th>Jumlah Dipinjam</th>
												<th>Rak</th>
												<th>Kode Lemari</th>
												<th>Lemari</th>
												<th>Ruangan</th>
												<th>Tahun Pengadaan</th>
												<th>Status</th>
                                                <th>Opsi</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div id="ModalSaring" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Menyaring Per Kolom</h4>
											</div>
											<div class="modal-body">
												<h3 class="panel-title">Nama Alat</h3>
												<br>
												<input type="text" id='carinama' class="form-control" placeholder="Nama Alat" onkeyup="saring()">
												<br>
												<h3 class="panel-title">Jumlah</h3>
												<br>
												<input type="text" id="carijumlah" list="inputjumlah" class="form-control" placeholder="Jumlah" onkeyup="saring()">
												<br>
												<h3 class="panel-title">Kondisi :</h3>
												<br>
												<div class="row">
													<div class="col-md-4">
														<h3 class="panel-title">Baik</h3>
														<br>
														<input type="text" id="caribaik" list="inputjumlah" class="form-control" placeholder="Baik" onkeyup="saring()">
													</div>
													<div class="col-md-4">
														<h3 class="panel-title">Rusak Ringan</h3>
														<br>
														<input type="text" id="cariringan" list="inputjumlah" class="form-control" placeholder="Rusak Ringan" onkeyup="saring()">
													</div>
													<div class="col-md-4">
														<h3 class="panel-title">Rusak Berat</h3>
														<br>
														<input type="text" id="cariberat" list="inputjumlah" class="form-control" placeholder="Rusak Berat" onkeyup="saring()">
													</div>
												</div>
												<br>
														<h3 class="panel-title">Nama Rak</h3>
														<br>
														<input type="text" id="carirak" class="form-control" placeholder="Nama Rak" onkeyup="saring()">
												<br>
												<div class="row">
													<div class="col-md-8">
														<h3 class="panel-title">Nama Lemari</h3>
														<br>
														<input type="text" id="carilemari" class="form-control" placeholder="Nama Lemari" onkeyup="saring()">
													</div>
													<div class="col-md-4">
														<h3 class="panel-title">Kode Lemari</h3>
														<br>
														<input type="text" id="carikodelemari" class="form-control" placeholder="Kode Lemari" onkeyup="saring()">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-7">
														<h3 class="panel-title">Nama Ruangan</h3>
														<br>
														<input type="text" id="cariruangan" class="form-control" placeholder="Nama Ruangan" onkeyup="saring()">
													</div>
													<div class="col-md-5">
														<h3 class="panel-title">Tahun Pengadaan</h3>
														<br>
														<input type="text" id="caritahun" list="inputtahun" class="form-control" placeholder="Tahun Pengadaan" min="2000" onkeyup="saring()">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END TABLE HOVER -->
							<div id="Pinjam" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Total Pinjam</h4>
											</div>
											<div class="modal-body">
												<form action="<?=base_url('transaksi/pinjam_alat_tambah')?>" method="post">
												<h3 class="panel-title">Nama Alat</h3>
													<br>
													<select class="form-control" name="nama_alat" >
															
														<?php $a = $this->db->query("SELECT * from daftar_alat_praktikum")->result_array();
															  foreach($a as $data){ ?>
															  <option value="<?= $data['id_alat']?>"><?= $data['nama_alat'] ?></option>
															  <?php } ?>
													</select>
													<br>
													<h3 class="panel-title">Jumlah Alat yang akan dipinjam</h3>
													<br>
													<input type="number" name="jumlah_pinjam" class="form-control" placeholder="Jumlah">
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
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function panggil_lemari(){
					var id_ruangan = $("#ruangans").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Guru/bahan_lemari'; ?>",
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
      					url : "<?php echo base_url().'Guru/bahan_rak'; ?>",
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
      					url : "<?php echo base_url().'Guru/bahan_lemari'; ?>",
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
      					url : "<?php echo base_url().'Guru/bahan_rak'; ?>",
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
      					url : "<?php echo base_url().'Guru/bahan_lemari_ubah'; ?>",
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
      					url : "<?php echo base_url().'Guru/bahan_rak_ubah'; ?>",
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
						 			exportOptions:{
						 				columns: [0,1,2,3,4,5,6,8,9,10]
						 			},
						 			messageTop : '<img src="<?=base_url()?>/assets/DataTables/unib1.png" style="height:90px; width:90px ;position:absolute ;top:20 ;left:0;"><h3>Kementrian Riset Teknologi dan Pendidikan Tinggi<br>Universitas Bengkulu</h3><h5>Jl. WR.Supratman Kandang Limun Bengkulu 38371<br>Telepon/Faximile : (0736)21290.21170 Pesawat 206.226</h5><br><h4>Daftar Alat-Alat Praktikum</h4>',
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
			
			