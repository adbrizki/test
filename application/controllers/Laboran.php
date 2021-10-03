<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model');
		$this->load->library('form_validation');
		$this->load->library('pdf');
		$this->load->library('session');
		
		if($this->session->userdata('status')!="login")
		{
			redirect('login');
		}

		if($this->session->userdata('Pangkat')!="Laboran")
		{
			redirect('Controller1');
		}
	}

	public function index()
	{
		$alat = $this->model->banyak_alat();
		$bahan = $this->model->banyak_bahan();
		$inventaris = $this->model->banyak_inventaris();
		$rak = $this->model->banyak_rak();
		$lemari = $this->model->banyak_lemari();
		$data = array
		(
			'konten' => 'laboran/dashboard',
			'alat' => $alat,
			'bahan' => $bahan,
			'inventaris' => $inventaris,
			'rak' => $rak,
			'lemari' => $lemari,
		);
		$this->load->view('layout_laboran',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function alat_praktikum_laboran()
	{
		$data = array
		(
			'konten' => 'laboran/alat_praktikum',
			'datanya' => $this->model->alat_join(),
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_laboran',$data);
	}

	public function bahan_praktikum_laboran()
	{
		$data = array
		(
			'konten' => 'laboran/bahan_praktikum',
			'datanya' => $this->model->bahan_join(),
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_laboran',$data);
	}

	
	public function rak_laboran()
	{
		$data = array
		(
			'konten' => 'laboran/rak',
			'datanya' => $this->model->rak_join(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
			
		);
		$this->load->view('layout_laboran',$data);
	}
	public function lemari_laboran()
	{
		$data = array
		(
			'konten' => 'laboran/lemari',
			'datanya' => $this->model->lemari_join(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_laboran',$data);
	}
	public function alat_praktikum_tambah_update()
	{
		$jumlah = $this->input->post('jumlah');
		$baik = $this->input->post('baik');
		$ringan = $this->input->post('rusakringan');
		$berat = $this->input->post('rusakberat');
		$kondisi = $baik+$ringan+$berat;

		$this->form_validation->set_rules('nama','nama_alat','required');
		$this->form_validation->set_rules('ruangan','id_ruangan','required');
		$this->form_validation->set_rules('lemari','id_lemari','required');
		$this->form_validation->set_rules('rak','id_rak','required');
		$this->form_validation->set_rules('tahun','tahun_pengadaan','required');

		if($this->form_validation->run()!= false){
			if($jumlah==$kondisi)
			{
				$data = array
				(
					'nama_alat' => $this->input->post('nama'),
					'jumlah' => $this->input->post('jumlah'),
					'jumlah_baik' => $this->input->post('baik'),
					'jumlah_rusak_ringan' => $this->input->post('rusakringan'),
					'jumlah_rusak_berat' => $this->input->post('rusakberat'),
					'id_rak' => $this->input->post('rak'),
					'tahun_pengadaan' =>$this->input->post('tahun'),
				);
				$this->db->insert('daftar_alat_praktikum',$data);
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Ditambah ! </div>');
				redirect('Laboran/alat_praktikum_laboran');
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Jumlah Barang dan Kondisi Tidak Sesuai !</div>');
				redirect('Laboran/alat_praktikum_laboran');
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('Laboran/alat_praktikum_laboran');
		}
	}
	public function alat_praktikum_ubah_update()
	{
		$id_alat = $this->input->post('id');
		$jumlah = $this->input->post('jumlahx');
		$baik = $this->input->post('baikx');
		$ringan = $this->input->post('rusakringanx');
		$berat = $this->input->post('rusakberatx');
		$kondisi = $baik+$ringan+$berat;

		$this->form_validation->set_rules('namax','nama_alat','required');
		$this->form_validation->set_rules('ruanganx','id_ruangan','required');
		$this->form_validation->set_rules('lemarix','id_lemari','required');
		$this->form_validation->set_rules('rakx','id_rak','required');
		$this->form_validation->set_rules('tahunx','tahun_pengadaan','required');
		if($this->form_validation->run()!= false){
			if($jumlah==$kondisi)
			{
				$data = array
				(
					'nama_alat' => $this->input->post('namax'),
					'jumlah' => $this->input->post('jumlahx'),
					'jumlah_baik' => $this->input->post('baikx'),
					'jumlah_rusak_ringan' => $this->input->post('rusakringanx'),
					'jumlah_rusak_berat' => $this->input->post('rusakberatx'),
					'id_rak' => $this->input->post('rakx'),
					'id_lemari' => $this->input->post('lemarix'),
					'id_ruangan' => $this->input->post('ruanganx'),
					'tahun_pengadaan' =>$this->input->post('tahunx'),
				);
				$this->db->update('daftar_alat_praktikum',$data,'id_alat='.$id_alat);
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
				redirect('Laboran/alat_praktikum_laboran');
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Jumlah Barang dan Kondisi Tidak Sesuai !</div>');
				redirect('Laboran/alat_praktikum_laboran');
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('Laboran/alat_praktikum_laboran');
		}
	}
	public function alat_praktikum_hapus($id)
	{
		$this->db->delete('daftar_alat_praktikum','id_alat='.$id);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('Laboran/alat_praktikum_laboran');
	}
	public function bahan_praktikum_tambah_update()
	{
		$this->form_validation->set_rules('nama','nama_bahan','required');
		$this->form_validation->set_rules('satuan','satuan','required');
		$this->form_validation->set_rules('ruangan','id_ruangan','required');
		$this->form_validation->set_rules('lemari','id_lemari','required');
		$this->form_validation->set_rules('rak','id_rak','required');
		$this->form_validation->set_rules('tahun','tahun_pengadaan','required');

		if($this->form_validation->run()!= false){
			$data = array
			(
				'nama_bahan' => $this->input->post('nama'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'id_rak' => $this->input->post('rak'),
				'tahun_pengadaan' => $this->input->post('tahun'),
			);
			$this->db->insert('daftar_bahan_praktikum',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Ditambah ! </div>');
			redirect('Laboran/bahan_praktikum_laboran');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('Laboran/bahan_praktikum_laboran');
		}
	}
	public function bahan_praktikum_ubah_update()
	{
		$this->form_validation->set_rules('namax','nama_bahan','required');
		$this->form_validation->set_rules('satuanx','satuan','required');
		$this->form_validation->set_rules('ruanganx','id_ruangan','required');
		$this->form_validation->set_rules('lemarix','id_lemari','required');
		$this->form_validation->set_rules('rakx','id_rak','required');
		$this->form_validation->set_rules('tahunx','tahun_pengadaan','required');

		if($this->form_validation->run()!= false){
			$id_bahan = $this->input->post('id');
			$data = array
			(
				'nama_bahan' => $this->input->post('namax'),
				'jumlah' => $this->input->post('jumlahx'),
				'satuan' => $this->input->post('satuanx'),
				'id_rak' => $this->input->post('rakx'),
				'tahun_pengadaan' => $this->input->post('tahunx'),
			);
			$this->db->update('daftar_bahan_praktikum',$data,'id_bahan='.$id_bahan);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
			redirect('Laboran/bahan_praktikum_laboran');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('Laboran/bahan_praktikum_laboran');
		}
	}
	public function bahan_praktikum_hapus($id)
	{
		$this->db->delete('daftar_bahan_praktikum','id_bahan='.$id);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('Laboran/bahan_praktikum_laboran');
	}
	public function inventaris_tambah_update()
	{
		$this->form_validation->set_rules('kode','kode_barang','required|is_unique[daftar_inventaris.kode_barang]');
		$this->form_validation->set_rules('nama','nama_barang','required');
		$this->form_validation->set_rules('kondisi','Kondisi','required');
		$this->form_validation->set_rules('ruangan','id_ruangan','required');
		$this->form_validation->set_rules('tahun','tahun_pengadaan','required');
		$merk = $this->input->post('merk');

		if($this->form_validation->run()!= false){
			if($merk==""){
				$merk="-";
			}else{
				$merk = $this->input->post('merk');
			}
			$data = array
			(
				'kode_barang' => $this->input->post('kode'),
				'nama_barang' => $this->input->post('nama'),
				'merk' => $merk,
				'kondisi' => $this->input->post('kondisi'),
				'id_ruangan' => $this->input->post('ruangan'),
				'tahun_pengadaan' => $this->input->post('tahun'),
			);
			$this->db->insert('daftar_inventaris',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Ditambah ! </div>');
			redirect('Laboran/inventaris_laboran');
		
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('Laboran/inventaris_laboran');
		}		
	}
	public function inventaris_ubah_update()
	{
		$this->form_validation->set_rules('kodex','kode_barang','required');
		$this->form_validation->set_rules('namax','nama_barang','required');
		$this->form_validation->set_rules('kondisix','kondisi','required');
		$this->form_validation->set_rules('ruanganx','id_ruangan','required');
		$this->form_validation->set_rules('tahunx','tahun_pengadaan','required');
		if($this->form_validation->run()!= false){
			$id = $this->input->post('id');
			$kode_barang = $this->input->post('kodex');
			$data = array
			(
				'kode_barang' => $this->input->post('kodex'),
				'nama_barang' => $this->input->post('namax'),
				'merk' => $this->input->post('merkx'),
				'kondisi' => $this->input->post('kondisix'),
				'id_ruangan' => $this->input->post('ruanganx'),
				'tahun_pengadaan' => $this->input->post('tahunx'),
			);
			$this->db->update('daftar_inventaris',$data,'kode_barang='.$id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
			redirect('Laboran/inventaris_laboran');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('Laboran/inventaris_laboran');
		}
	}
	public function inventaris_hapus($id)
	{
		$this->db->delete('daftar_inventaris','kode_barang='.$id);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('Laboran/inventaris_laboran');
	}
	public function rak_tambah_update()
	{
		$id_lemari = $this->input->post('lemari');
		$jumlah_rak = $this->model->jumlah_rak($id_lemari);
		$jumlah_lemari = $this->model->jumlah_baris_lemari($id_lemari);

		$this->form_validation->set_rules('nama','nama_rak','required');
		$this->form_validation->set_rules('lemari','id_lemari','required');
		$this->form_validation->set_rules('ruangan','id_ruangan','required');
		if($this->form_validation->run()!= false){
			foreach ($jumlah_rak as $jumlah_rak) {
				if($jumlah_lemari<$jumlah_rak['jumlah_rak']){
					$data = array
					(
						'id_rak' => $this->input->post('kode'),
						'nama_rak' => $this->input->post('nama'),
						'id_lemari' => $this->input->post('lemari'),
					);
					$this->db->insert('daftar_rak',$data);
					$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Disimpan ! </div>');
					redirect('Laboran/rak_laboran');
				}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Jumlah Rak Sudah Maksimal !</div>');
				redirect('Laboran/rak_laboran');
				}
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('Laboran/rak_laboran');
		}
	}
	public function rak_ubah_update()
	{
		$id_lemari = $this->input->post('lemarix');
		$jumlah_rak = $this->model->jumlah_rak($id_lemari);
		$jumlah_lemari = $this->model->jumlah_baris_lemari($id_lemari);

		$this->form_validation->set_rules('namax','nama_rak','required');
		$this->form_validation->set_rules('lemarix','id_lemari','required');
		if($this->form_validation->run()!= false){
			foreach ($jumlah_rak as $jumlah_rak) {
				if($jumlah_lemari<$jumlah_rak['jumlah_rak']){
					$id_rak = $this->input->post('kunci');
					$data = array
					(
						'nama_rak' => $this->input->post('namax'),
						'id_lemari' => $this->input->post('lemarix'),
					);
					$this->db->update('daftar_rak',$data,'id_rak='."'".$id_rak."'");
					$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
					redirect('Laboran/rak_laboran');
				}else{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Jumlah Rak Sudah Maksimal !</div>');
					redirect('Laboran/rak_laboran');
				}
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('Laboran/rak_laboran');
		}
	}
	public function rak_hapus($id)
	{
		$this->db->delete('daftar_rak','id_rak='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('Laboran/rak_laboran');
	}
	public function lemari_tambah_update()
	{
		$this->form_validation->set_rules('kode','id_lemari','required|is_unique[daftar_lemari.id_lemari]');
		$this->form_validation->set_rules('nama','nama_lemari','required');
		$this->form_validation->set_rules('jumlah','jumlah_rak','required');
		$this->form_validation->set_rules('ruangan','id_ruangan','required');
		if($this->form_validation->run()!= false){
			$data = array
			(
				'id_lemari'=> $this->input->post('kode'),
				'nama_lemari' => $this->input->post('nama'),
				'jumlah_rak' => $this->input->post('jumlah'),
				'id_ruangan' => $this->input->post('ruangan'),
			);
			$this->db->insert('daftar_lemari',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Disimpan ! </div>');
			redirect('Laboran/lemari_laboran');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('Laboran/lemari_laboran');
		}
	}
	public function lemari_ubah_update()
	{
		$this->form_validation->set_rules('kodex','id_lemari','required');
		$this->form_validation->set_rules('namax','nama_lemari','required');
		$this->form_validation->set_rules('jumlahx','jumlah_rak','required');
		$this->form_validation->set_rules('ruanganx','id_ruangan','required');
		if($this->form_validation->run()!= false){
			$id_lemari = $this->input->post('kunci');
			$data = array
			(
				'id_lemari'=> $this->input->post('kodex'),
				'nama_lemari' => $this->input->post('namax'),
				'jumlah_rak' => $this->input->post('jumlahx'),
				'id_ruangan' => $this->input->post('ruanganx'),
			);
			$this->db->update('daftar_lemari',$data,'id_lemari='."'".$id_lemari."'");
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
			redirect('Laboran/lemari_laboran');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('Laboran/lemari_laboran');
		}
	}
	public function lemari_hapus($id)
	{
		$this->db->delete('daftar_lemari','id_lemari='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('Laboran/lemari_laboran');
	}

	public function ruangan_lemari(){
		$id_ruangan = $this->input->post('id_ruangan');
		$data = $this->model->panggil_lemari($id_ruangan);
		$temp = "";
		foreach($data as $data){
			$temp .= '<option value="'.$data['id_lemari'].'">'.$data['nama_lemari'].'</option>';
		}
		echo $temp;
	}
	public function ruangan_lemari_ubah(){
		$id_ruangan = $this->input->post('id_ruangan');
		$id_lemari = $this->input->post('id_lemari');
		$data = $this->model->panggil_lemari($id_ruangan);
		$temp = "";
		foreach($data as $data){
			if($data['id_lemari']==$id_lemari){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$temp .= '<option value="'.$data['id_lemari'].'" '.$selected.'>'.$data['nama_lemari'].'</option>';
		}
		echo $temp;
	}
	public function bahan_lemari(){
		$id_ruangan = $this->input->post('id_ruangan');
		$data = $this->model->panggil_lemari($id_ruangan);
		$temp = "";
		foreach($data as $data){
			$temp .= '<option value="'.$data['id_lemari'].'">'.$data['nama_lemari'].'</option>';
		}
		echo $temp;
	}
	public function bahan_rak(){
		$id_lemari = $this->input->post('id_lemari');
		$data = $this->model->panggil_rak($id_lemari);
		$temp = "";
		foreach($data as $data){
			$temp .= '<option value="'.$data['id_rak'].'">'.$data['nama_rak'].'</option>';
		}
		echo $temp;
	}
	public function bahan_lemari_ubah(){
		$id_ruangan = $this->input->post('id_ruangan');
		$id_lemari = $this->input->post('id_lemari');
		$data = $this->model->panggil_lemari($id_ruangan);
		$temp = "";
		foreach($data as $data){
			if($data['id_lemari']==$id_lemari){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$temp .= '<option value="'.$data['id_lemari'].'" '.$selected.'>'.$data['nama_lemari'].'</option>';
		}
		echo $temp;
	}
	public function bahan_rak_ubah(){
		$id_lemari = $this->input->post('id_lemari');
		$id_rak = $this->input->post('id_rak');
		$data = $this->model->panggil_rak($id_lemari);
		$temp = "";
		foreach($data as $data){
			if($data['id_rak']==$id_rak){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$temp .= '<option value="'.$data['id_rak'].'" '.$selected.'>'.$data['nama_rak'].'</option>';
		}
		echo $temp;
	}

	public function pinjam_alat()
	{
		$a = $this->db->query("SELECT * from peminjaman_alat JOIN daftar_alat_praktikum ON peminjaman_alat.id_alat = 
		daftar_alat_praktikum.id_alat join daftar_rak on daftar_alat_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan")->result_array();

		$data = array
		(
			'konten' => 'laboran/daftar_pinjam_alat',
			'data' => $a,
		);
		$this->load->view('layout_laboran',$data);
	}

	public function setuju($id)
	{
		$data = array('status' => "Dipinjam");
		$this->db->update('peminjaman_alat', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Disetujui Meminjam ! </div>');
			redirect('laboran/pinjam_alat');
	}

	public function tolak($id)
	{
		$data = array('status' => "Ditolak");
		$this->db->update('peminjaman_alat', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Ditolak Meminjam ! </div>');
			redirect('laboran/pinjam_alat');
	}

	public function pinjam_bahan()
	{
		$a = $this->db->query("SELECT * from peminjaman_bahan JOIN daftar_bahan_praktikum ON peminjaman_bahan.id_bahan = 
		daftar_bahan_praktikum.id_bahan join daftar_rak on daftar_bahan_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan")->result_array();

		$data = array
		(
			'konten' => 'laboran/daftar_pinjam_bahan',
			'data' => $a,
		);
		$this->load->view('layout_laboran',$data);
	}

	public function setuju_bahan($id)
	{
		$data = array('status' => "Dipinjam");
		$this->db->update('peminjaman_bahan', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Disetujui Meminjam ! </div>');
			redirect('laboran/pinjam_bahan');
	}

	public function tolak_bahan($id)
	{
		$data = array('status' => "Ditolak");
		$this->db->update('peminjaman_bahan', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Ditolak Meminjam ! </div>');
			redirect('laboran/pinjam_bahan');
	}
}