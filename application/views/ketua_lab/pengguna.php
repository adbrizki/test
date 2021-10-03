<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Daftar Pengguna Sistem</h3>
					
					<div class="row">
						
						<div class="col-md-12">
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
												<th>Nama Pengguna</th>
												<th>Username</th>
												<th>Status</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi) {
												$no++; ?>
												<tr>
													<td></td>
													<td><?=$isi['nama_pengguna']?></td>
													<td><?=$isi['username']?></td>
													<td><?=$isi['status']?></td>
													<td>
														
														<a
															href="javascript:;"
															data-id="<?php echo $isi['id'] ?>"
															data-username="<?php echo $isi['username'] ?>"
															data-password="<?php echo $isi['password'] ?>"
															data-status="<?php echo $isi['status'] ?>"
															data-nama_pengguna="<?php echo $isi['nama_pengguna'] ?>"
															data-toggle="modal"
															data-target="#ModalUbah">
															<button type="button" class="btn btn-success"><i class="lnr lnr-pencil"></i></button>
														</a>
														<a href="<?=base_url('KetuaLab/pengguna_ketua_lab_hapus/'.$isi['id'])?>"><button onclick="return confirm('Hapus ?');" type="button" class="btn btn-danger"><i class="lnr lnr-trash"></i></button></a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama Pengguna</th>
												<th>Username</th>
												<th>Status</th>
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
												<form action="<?=base_url('KetuaLab/pengguna_ketua_lab_tambah')?>" method="post">

													<h3 class="panel-title">Nama Pengguna</h3>
													<br>
													<input type="text" class="form-control" name="nama">
													<br>
													<h3 class="panel-title">Username</h3>
													<br>
													<input type="text" class="form-control" name="username">
													<br>
													<h3 class="panel-title">Password</h3>
													<br>
													<input type="password" class="form-control" name="password">
													<br>
													<h3 class="panel-title">Status</h3>
													<br>
													<select class="form-control" name="status">
													<option selected="true" disabled="disabled">Pilih Status</option>
													<option>Ketua Lab</option>
													<option>Laboran</option>
													<option>Guru</option>
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
												<form action="<?=base_url('KetuaLab/pengguna_ketua_lab_ubah')?>" method="post">

													<input type="hidden" name="idnya" id="id">
													<h3 class="panel-title">Nama Pengguna</h3>
													<br>
													<input type="text" class="form-control" name="namax" id="namanya">
													<br>
													<h3 class="panel-title">Username</h3>
													<br>
													<input type="text" class="form-control" name="usernamex" id="usernamenya">
													<br>
													<h3 class="panel-title">Password</h3>
													<br>
													<input type="password" class="form-control" name="passwordx" id="passwordnya">
													<br>
													<h3 class="panel-title">Status</h3>
													<br>
													<select class="form-control" name="status">
													<option selected="true" disabled="disabled">Pilih Status</option>
													<option>Ketua Lab</option>
													<option>Laboran</option>
													<option>Guru</option>
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
					$('#carinama').on('keyup',function(){
						tabelnya.columns(1).search(this.value).draw();
					});
					$('#cariusername').on('keyup',function(){
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
				
				$(document).ready(function(){
					$('#ModalUbah').on('show.bs.modal', function(event){
						var div = $(event.relatedTarget)
						var modal = $(this)

						modal.find('#id').attr("value",div.data('id'));
						modal.find('#usernamenya').attr("value",div.data('username'));
						modal.find('#namanya').attr("value",div.data('nama_pengguna'));
						
					});
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
					if(document.getElementById("cariusername").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carinama").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else{
						document.getElementById("saringan").className="btn btn-primary";
						iconhapus();
					}
				}
			</script>