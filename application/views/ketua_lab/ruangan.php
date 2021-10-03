<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Daftar Ruangan</h3>
					
					<div class="row">
						
						<div class="col-md-11">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									
								</div>
								<div class="panel-body">

									<div><?=$this->session->flashdata('notif');?></div>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">Tambah</button>
									
									<br><br>
									<table class="table table-hover" id="tabel">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Ruangan</th>
												<th>Nama Gedung</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi) {
												$no++; ?>
												<tr>
													<td></td>
													<td><?=$isi['nama_ruangan']?></td>
													<td><?=$isi['nama_gedung']?></td>
													<td>
														<a
															href="javascript:;"
															data-id_ruangan="<?php echo $isi['id_ruangan'] ?>"
															data-nama_ruangan="<?php echo $isi['nama_ruangan'] ?>"
															data-id_gedung="<?php echo $isi['id_gedung'] ?>"
															data-nama_gedung="<?php echo $isi['nama_gedung'] ?>"
															data-toggle="modal"
															data-target="#ModalUbah">
															<button type="button" class="btn btn-success"><i class="lnr lnr-pencil"></i> Ubah</button>
														</a>
														<a href="<?=base_url('KetuaLab/ruangan_hapus/'.$isi['id_ruangan'])?>"><button onclick="return confirm('Hapus ?');" type="button" class="btn btn-danger"><i class="lnr lnr-trash"></i> Hapus</button></a>
													</td>
												</tr>
												<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama Ruangan</th>
												<th>Nama Gedung</th>
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
												<form action="<?=base_url('KetuaLab/ruangan_tambah_update')?>" method="post">
													<h3 class="panel-title">Nama Ruangan</h3>
													<br>
													<input type="text" name="nama" class="form-control" placeholder="Nama Ruangan">
													<br>
													<h3 class="panel-title">Nama Gedung</h3>
													<br>
													<select class="form-control" name="gedung" id="idGedungs" onchange="fungsi()">
														<option value="" disabled selected hidden>Pilih Gedung</option>
															<?php foreach ($gedung as $gedungnya) { ?>
														<option value="<?=$gedungnya['id_gedung']?>">
															<?=$gedungnya['nama_gedung']?>
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
												<form action="<?=base_url('KetuaLab/ruangan_ubah_update')?>" method="post">
													<input type="hidden" id="key" name="kunci">
													<h3 class="panel-title">Nama Ruangan</h3>
													<br>
													<input type="text" name="namax" id="namaRuangan" class="form-control" placeholder="Nama Ruangan">
													<br>													
													<h3 class="panel-title">Nama Gedung</h3>
													<br>
													<select class="form-control" name="gedungx" id="idGedung" onchange="fungsi2()">
															<?php foreach ($gedung as $gedungnya) { ?>
														<option value="<?=$gedungnya['id_gedung']?>">
															<?=$gedungnya['nama_gedung']?>
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

						modal.find('#key').attr("value",div.data('id_ruangan'));
						modal.find('#namaRuangan').attr("value",div.data('nama_ruangan'));
						modal.find('#idGedung option').each(function(){
							if($(this).val()==div.data('id_gedung'))
								$(this).attr("selected","selected");
						});
						//fungsix();					
					});
				});
			</script>
			<script type="text/javascript">
					$(document).ready(function(){
					$('#ModalUbah').on('hidden.bs.modal', function(){
						$('#idGedung option:selected').each(function(){
							$(this).removeAttr("selected","selected");
						})
						
					});
				});
			</script>
			<!-- <script type="text/javascript">
				function fungsi(){
					var data = document.getElementById("idGedungs");
					document.getElementById("kodeGedungs").value = data.options[data.selectedIndex].value;
				}
				function fungsi2(){
					var data = document.getElementById("idGedung");
					document.getElementById("kodeGedung").value = data.options[data.selectedIndex].value;
				}
				function fungsix(){
					var data = document.getElementById("idGedung");
					document.getElementById("kodeGedung").value = data.options[data.selectedIndex].value;
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
					$('#cariruangan').on('keyup',function(){
						tabelnya.columns(1).search(this.value).draw();
					});
					$('#carigedung').on('keyup',function(){
						tabelnya.columns(2).search(this.value).draw();
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
					if(document.getElementById("cariruangan").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carigedung").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else{
						document.getElementById("saringan").className="btn btn-primary";
						iconhapus();
					}
				}
			</script>