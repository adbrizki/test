<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Daftar Gedung</h3>
					
					<div class="row">
						
						<div class="col-md-10">
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
												<th>Nama Gedung</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi) {
												$no++; ?>
												<tr>
													<td></td>
													<td><?=$isi['nama_gedung']?></td>
													<td>
														<a
															href="javascript:;"
															data-id_gedung="<?php echo $isi['id_gedung'] ?>"
															data-nama_gedung="<?php echo $isi['nama_gedung'] ?>"
															data-toggle="modal"
															data-target="#ModalUbah">
															<button type="button" class="btn btn-success"><i class="lnr lnr-pencil"></i> Ubah</button>
														</a>
														<a href="<?=base_url('KetuaLab/gedung_hapus/'.$isi['id_gedung'])?>"><button onclick="return confirm('Hapus?');" type="button" class="btn btn-danger"><i class="lnr lnr-trash"></i> Hapus</button></a>
													</td>	
												</tr>
												<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
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
												<form action="<?=base_url('KetuaLab/gedung_tambah_update')?>" method="post">
													<h3 class="panel-title">Nama Gedung</h3>
													<br>
													<input type="text" name="nama" id="namaGedungTambah" class="form-control" placeholder="Nama Gedung">
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
												<form action="<?=base_url('KetuaLab/gedung_ubah_update')?>" method="post">
													<input type="hidden" name="kunci" id="key">
													<h3 class="panel-title">Nama Gedung</h3><br>
													<input type="text" name="namax" id="namaGedungUbah" class="form-control">
													<br>
													<input type="submit" class="btn btn-primary" value="Ubah"><br>
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

						modal.find('#key').attr("value",div.data('id_gedung'));
						modal.find('#namaGedungUbah').attr("value",div.data('nama_gedung'));
					});
				});			
			</script>
			<!-- <script type="text/javascript">
				$('body').on('hidden.bs.modal','modal',function(){
					$(this).removeData('bs.modal');
				});
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
					tabelnya.on('order.dt search.dt',function(){
						tabelnya.column(0,{search:'applied',order:'applied'}).nodes().each(function(cell,i){
							cell.innerHTML = i+1;
							tabelnya.cell(cell).invalidate('dom');
						});
					}).draw();
				});
			</script>