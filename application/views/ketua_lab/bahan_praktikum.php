<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Bahan - Bahan Praktikum</h3>
					
					<div class="row">
						
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									
								</div>
								<div class="panel-body">

									
									<br>
									<table class="table table-hover" id="tabel">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Bahan</th>
												<th>Jumlah</th>
												<th>Satuan</th>
												<th>Rak</th>
												<th>Kode Lemari</th>
												<th>Lemari</th>
												<th>Ruangan</th>
												<th>Tahun Pengadaan</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach ($datanya as $isi) {
												$no++; ?>
												<tr>
													<td></td>
													<td><?=$isi['nama_bahan']?></td>
													<td><?=$isi['jumlah']?></td>
													<td><?=$isi['satuan']?></td>
													<td><?=$isi['nama_rak']?></td>
													<td><?=$isi['id_lemari']?></td>
													<td><?=$isi['nama_lemari']?></td>
													<td><?=$isi['nama_ruangan']?></td>
													<td><?=$isi['tahun_pengadaan']?></td>
												</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama Bahan</th>
												<th>Banyak Bahan</th>
												<th>Satuan</th>
												<th>Rak</th>
												<th>Kode Lemari</th>
												<th>Lemari</th>
												<th>Ruangan</th>
												<th>Tahun Pengadaan</th>
											</tr>
										</tfoot>
									</table>
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
					 	dom: 'fBtlpr',
					 	lengthMenu : [[10,25,50,-1],[10,25,50,"Semua"]],
						buttons:{
							buttons:[
								{
									title:'',
						 			messageTop: '<img src="<?=base_url()?>/assets/logo.png" style="height:90px; width:90px ;position:absolute ;top:20 ;left:0;"><h3>Kementerian Pendidikan dan Kebudayaan<br>SMAN 6 Kota Bengkulu</h3><h5>Jl. Jl. Pratu Aidit Bengkulu 38118 <br>Telepon/Faximile : 0736-26690 </h5><br><h4>Daftar Bahan-Bahan Praktikum</h4>',

						 			className : 'btn btn-primary',
						 			extend: 'print',
						 			text: '<i class="lnr lnr-printer"></i> Cetak',
						 			exportOptions:{
						 				columns: [0,1,2,3,4,6,7,8]
						 			},
						 			customize: function(win){
						 				$(win.document.body).css('font-family','Times New Roman');
						 				//$(win.document.body).find('table').addClass('dt-print-table');
						 				$(win.document.body).find('table thead tr th').addClass('table-bordered').css('text-align','center');
						 				$(win.document.body).find('table tbody tr td').addClass('table-bordered');
						 				$(win.document.body).find('h3').css('text-align','center');
						 				$(win.document.body).find('h4').css('text-align','center');
						 				$(win.document.body).find('h5').css('text-align','center');	
						 				$(win.document.body).find('table td:nth-child(1)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(3)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(4)').css('text-align','center');
						 				$(win.document.body).find('table td:nth-child(8)').css('text-align','center');
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
					$('#carirak').on('keyup',function(){
						tabelnya.columns(4).search(this.value).draw();
					});
					$('#carikodelemari').on('keyup',function(){
						tabelnya.columns(5).search(this.value).draw();
					});
					$('#carilemari').on('keyup',function(){
						tabelnya.columns(6).search(this.value).draw();
					});
					$('#cariruangan').on('keyup',function(){
						tabelnya.columns(7).search(this.value).draw();
					});
					$('#caritahun').on('keyup',function(){
						tabelnya.columns(8).search(this.value).draw();
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
					if(document.getElementById("carinama").value!=""){
						document.getElementById("saringan").className="btn btn-default";
						icon();	
					}else if(document.getElementById("carijumlah").value!=""){
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