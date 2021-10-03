<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Lemari - Lemari Penyimpanan</h3>
					
					<div class="row">
						
						<div class="col-md-12">
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
												<th>Kode Lemari</th>
												<th>Nama Lemari</th>
												<th>Jumlah Rak</th>
												<th>Ruangan</th>
												<th>Opsi</th>
												
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi) {
												$no++; ?>
												<tr>
													<td></td>
													<td><?=$isi['id_lemari']?></td>
													<td><?=$isi['nama_lemari']?></td>
													<td><?=$isi['jumlah_rak']?></td>
													<td><?=$isi['nama_ruangan']?></td>
													<td>
														<a
															href="javascript:;"
															data-id_lemari="<?php echo $isi['id_lemari'] ?>"
															data-nama_lemari="<?php echo $isi['nama_lemari'] ?>"
															data-jumlah_rak="<?php echo $isi['jumlah_rak'] ?>"
															data-id_ruangan="<?php echo $isi['id_ruangan'] ?>"
															data-toggle="modal"
															data-target="#ModalUbah">
															<button type="button" class="btn btn-success"><i class="lnr lnr-pencil"></i> Ubah</button>
														</a>
														<a href="<?=base_url('Laboran/lemari_hapus/'.$isi['id_lemari'])?>"><button onclick="return confirm('Hapus?');" type="button" class="btn btn-danger"><i class="lnr lnr-trash"></i> Hapus</button></a>
													</td>	
												</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Kode Lemari</th>
												<th>Nama Lemari</th>
												<th>Jumlah Rak</th>
												<th>Ruangan</th>
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
												<form action="<?=base_url('Laboran/lemari_tambah_update')?>" method="post">

													<h3 class="panel-title">Kode Lemari</h3>
													<br>
													<input type="text" name="kode" class="form-control" minlength="4" maxlength="5" placeholder="Kode Lemari">
													<br>
													<h3 class="panel-title">Nama Lemari</h3>
													<br>
													<input type="text" name="nama" class="form-control" placeholder="Nama Lemari">
													<br>
													<h3 class="panel-title">Jumlah Rak</h3>
													<br>
													<input type="number" name="jumlah" list="inputjumlah" min="1" max="99" class="form-control" placeholder="Jumlah">
													<br>
													<h3 class="panel-title">Terletak di Ruangan</h3>
													<br>
													<select class="form-control" name="ruangan" id="ruangans" onchange="fungsi()">
														<option value="" disabled selected hidden>Pilih Ruangan</option>
														<?php foreach ($ruangan as $ruangannya) { ?>
													<option value="<?=$ruangannya['id_ruangan']?>">
														<?=$ruangannya['nama_ruangan']?>
													</option>
														<?php } ?>
													</select>
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
												<form action="<?=base_url('Laboran/lemari_ubah_update')?>" method="post">
													<input type="hidden" name="kunci" id="key">
													<h3 class="panel-title">Kode Lemari</h3>
													<br>
													<input type="text" name="kodex" id="idLemari" minlength="4" maxlength="5" class="form-control" placeholder="Nama Lemari">
													<br>
													<h3 class="panel-title">Nama Lemari</h3>
													<br>
													<input type="text" name="namax" id="namaLemari" class="form-control" placeholder="Nama Lemari">
													<br>
													<h3 class="panel-title">Jumlah Rak</h3>
													<br>
													<input type="number" name="jumlahx" list="inputjumlah" id="jumlahRak" max="99" min="1" class="form-control">
													<br>
													
													<h3 class="panel-title">Terletak di Ruangan</h3>
													<br>
													<select class="form-control" name="ruanganx" id="idRuangan" onchange="fungsi2()">
														<?php foreach ($ruangan as $ruangannya) { ?>
													<option value="<?=$ruangannya['id_ruangan']?>">
														<?=$ruangannya['nama_ruangan']?>
													</option>
														<?php } ?>
													</select>
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

						modal.find('#key').attr("value",div.data('id_lemari'));
						modal.find('#idLemari').attr("value",div.data('id_lemari'));
						modal.find('#namaLemari').attr("value",div.data('nama_lemari'));
						modal.find('#jumlahRak').attr("value",div.data('jumlah_rak'));
						modal.find('#idRuangan option').each(function(){
							if($(this).val()==div.data('id_ruangan'))
								$(this).attr("selected","selected");
						})
						// fungsix();
					});
				});
				
			</script>
			<script type="text/javascript">
				
					$('#ModalUbah').on('hidden.bs.modal', function(){
						$('#idRuangan option:selected').each(function(){
							$(this).removeAttr("selected","selected");
						});
					});
			</script>
			<!-- <script type="text/javascript">
				function fungsi(){
					var data = document.getElementById("ruangans");
					document.getElementById("kodeRuangans").value = data.options[data.selectedIndex].value;
				}
				function fungsi2(){
					var data = document.getElementById("idRuangan");
					document.getElementById("kodeRuangan").value = data.options[data.selectedIndex].value;
				}
				function fungsix(){
					var data = document.getElementById("idRuangan");
					document.getElementById("kodeRuangan").value = data.options[data.selectedIndex].value;
				}
			</script> -->
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
					 	dom: 'ftlpr',
					 	lengthMenu : [[10,25,50,-1],[10,25,50,"Semua"]],
					});
					$('#carikodelemari').on('keyup',function(){
						tabelnya.columns(1).search(this.value).draw();
					});
					$('#carilemari').on('keyup',function(){
						tabelnya.columns(2).search(this.value).draw();
					});
					$('#cariruangan').on('keyup',function(){
						tabelnya.columns(4).search(this.value).draw();
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
				function icon(){
					document.getElementById("ikon").className="fa fa-spinner fa-spin";
				}
				function iconhapus(){
					document.getElementById("ikon").className="";
				}
				function saring(){
					if(document.getElementById("carikodelemari").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carilemari").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("cariruangan").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else{
						document.getElementById("saringan").className="btn btn-primary";
						iconhapus();
					}
				}
			</script>

			