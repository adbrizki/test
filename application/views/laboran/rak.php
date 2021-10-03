<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Rak - Rak Lemari Penyimpanan</h3>
					
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
												<th>Nama Rak</th>
												<th>Kode Lemari</th>
												<th>Nama Lemari</th>
												<th>Nama Ruangan</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi){ ?>
												<tr>
													<td></td>
													<td><?=$isi['nama_rak']?></td>
													<td><?=$isi['id_lemari']?></td>
													<td><?=$isi['nama_lemari']?></td>
													<td><?=$isi['nama_ruangan']?></td>
													<td>
														<a
															href="javascript:;"
															data-id_rak="<?php echo $isi['id_rak'] ?>"
															data-nama_rak="<?php echo $isi['nama_rak'] ?>"
															data-id_lemari="<?php echo $isi['id_lemari'] ?>"
															data-id_ruangan="<?php echo $isi['id_ruangan'] ?>"
															data-toggle="modal"
															data-target="#ModalUbah">
															<button type="button" class="btn btn-success"><i class="lnr lnr-pencil"></i></button>
														</a>
														<a href="<?=base_url('Laboran/rak_hapus/'.$isi['id_rak'])?>"><button onclick="return confirm('Hapus?');" type="button" class="btn btn-danger"><i class="lnr lnr-trash"></i></button></a>
													</td>	
												</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama Rak</th>
												<th>Kode Lemari</th>
												<th>Nama Lemari</th>
												<th>Nama Ruangan</th>
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
												<form action="<?=base_url('Laboran/rak_tambah_update')?>" method="post">

													<h3 class="panel-title">Nama Rak</h3>
													<br>
													<input type="text" name="nama" class="form-control" placeholder="Nama Rak">
													<br>
													<h3 class="panel-title">Terletak di Ruangan</h3><br>
													<select class="form-control" name="ruangan" id="ruanganku" onchange="fungsi()">
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
													<h3 class="panel-title">Lemari</h3>
													<br>
													<select class="form-control" name="lemari" id="lemariku" onchange="f1xx()">
														<option value="" disabled selected hidden>Pilih Lemari</option>
													</select>
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Kode Lemari</h3>
													<br>
													<input type="text" id="kodeLemari" class="form-control" placeholder="Kode Lemari" readonly>
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
												<form action="<?=base_url('Laboran/rak_ubah_update')?>" method="post">
													<h3 class="panel-title">Nama Rak</h3>
													<br>
													<input type="text" name="namax" id="namaRak" class="form-control" placeholder="Nama Rak">
													<br>
													<h3 class="panel-title">Terletak di Ruangan</h3>
													<br>
													<select class="form-control" name="ruanganx" id="ruanganku_ubah" onchange="fungsi2()">
															<?php foreach ($ruangan as $ruangannya) { ?>
														<option value="<?=$ruangannya['id_ruangan']?>">
															<?=$ruangannya['nama_ruangan']?>
														</option>
															<?php } ?>
													</select>
													<br>
													<div class="row">
														<div class="col-md-8">
													<h3 class="panel-title">Lemari</h3>
													<br>
													<select class="form-control" name="lemarix" id="lemariku_ubah" onchange="f2xx();">
													</select>
														</div>
														<div class="col-md-4">
													<h3 class="panel-title">Kode Lemari</h3>
													<br>
													<input type="text" id="kodeLemarix" class="form-control" readonly>
														</div>
													</div>
													<br>
													<input type="hidden" name="kunci" id="key">
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

						modal.find('#key').attr("value",div.data('id_rak'));
						modal.find('#idRak').attr("value",div.data('id_rak'));
						modal.find('#namaRak').attr("value",div.data('nama_rak'));
						modal.find('#ruanganku_ubah option').each(function(){
							if($(this).val()==div.data('id_ruangan'))
								$(this).attr("selected","selected");
						});
						fungsi_ubah(div.data('id_ruangan'),div.data('id_lemari'));
						/*modal.find('#lemariku_ubah option').each(function(){
							if($(this).val()==div.data('id_lemari'))
								$(this).attr("selected","selected");
						})*/
					});
				});
				
			</script>
			<script type="text/javascript">
				function fungsi(){
					var id_ruangan = $("#ruanganku").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/ruangan_lemari'; ?>",
      					data : "id_ruangan="+id_ruangan,
      					cache : false,
      					success: function(msg){
        					$("#lemariku").html(msg);
        					f1x();
      					}
					});
				}
				function fungsi2(){
					var id_ruangan = $("#ruanganku_ubah").val();
					// alert(id_ruangan);
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/ruangan_lemari'; ?>",
      					data : "id_ruangan="+id_ruangan,
      					cache : false,
      					success: function(msg){
        					$("#lemariku_ubah").html(msg);
        					f2x();
      					}
					});
				}
				function fungsi_ubah(id_ruangan,id_lemari){
					$.ajax({
						type :"POST",
      					url : "<?php echo base_url().'Laboran/ruangan_lemari_ubah'; ?>",
      					data : {id_ruangan:id_ruangan,id_lemari,id_lemari},
      					cache : false,
      					success: function(msg){
        					$("#lemariku_ubah").html(msg);
        					f2x();
      					}
					});
				}
				function f1(){
					var data = document.getElementById("ruanganku");
					document.getElementById("kodeRuangan").value = data.options[data.selectedIndex].value;

				}
				function f1x(){
					var data = document.getElementById("lemariku");
					document.getElementById("kodeLemari").value = data.options[data.selectedIndex].value;
				}
				function f1xx(){
					var data = document.getElementById("lemariku");
					document.getElementById("kodeLemari").value = data.options[data.selectedIndex].value;
				}

				function f2(){
					var data = document.getElementById("ruanganku_ubah");
					document.getElementById("kodeRuanganx").value = data.options[data.selectedIndex].value;

				}
				function f2x(){
					var data = document.getElementById("lemariku_ubah");
					document.getElementById("kodeLemarix").value = data.options[data.selectedIndex].value;
				}
				function f2xx(){
					var data = document.getElementById("lemariku_ubah");
					document.getElementById("kodeLemarix").value = data.options[data.selectedIndex].value;
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
					 	dom: 'ftlpr',
					 	lengthMenu : [[10,25,50,-1],[10,25,50,"Semua"]],
					});
					$('#carinamarak').on('keyup',function(){
						tabelnya.columns(1).search(this.value).draw();
					});
					$('#carikodelemari').on('keyup',function(){
						tabelnya.columns(2).search(this.value).draw();
					});
					$('#carinamalemari').on('keyup',function(){
						tabelnya.columns(3).search(this.value).draw();
					});
					$('#carinamaruangan').on('keyup',function(){
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
				function saring(){
					if(document.getElementById("carinamarak").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carikodelemari").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carinamalemari").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else if(document.getElementById("carinamaruangan").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();
					}else{
						document.getElementById("saringan").className="btn btn-primary";
						iconhapus();
					}
				}
				function icon(){
					document.getElementById("ikon").className="fa fa-spinner fa-spin";
				}
				function iconhapus(){
					document.getElementById("ikon").className="";
				}
			</script>