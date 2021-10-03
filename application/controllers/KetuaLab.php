<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KetuaLab extends CI_Controller {

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

		if($this->session->userdata('Pangkat')!="Ketua Lab")
		{
			redirect('Controller1');
		}
	}

	public function index()
	{
		$alat = $this->model->banyak_alat();
		$bahan = $this->model->banyak_bahan();
		$inventaris = $this->model->banyak_inventaris();
		$ruangan = $this->model->banyak_ruangan();
		$gedung = $this->model->banyak_gedung();
		$pengguna = $this->model->banyak_pengguna();
		$data = array
		(
			'konten' => 'ketua_lab/dashboard',
			'alat' => $alat,
			'bahan' => $bahan,
			'inventaris' => $inventaris,
			'ruangan' => $ruangan,
			'gedung' => $gedung,
			'pengguna' => $pengguna,
		);
		$this->load->view('layout_ketua_lab',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function alat_praktikum_ketua_lab()
	{
		$data = array
		(
			'konten' => 'ketua_lab/alat_praktikum',
			'datanya' => $this->model->alat_join(),
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_ketua_lab',$data);
	}

	public function bahan_praktikum_ketua_lab()
	{
		$data = array
		(
			'konten' => 'ketua_lab/bahan_praktikum',
			'datanya' => $this->model->bahan_join(),
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_ketua_lab',$data);
	}

	
	public function ruangan_ketua_lab()
	{
		$data = array
		(
			'konten' => 'ketua_lab/ruangan',
			'datanya' => $this->model->ruangan_join(),
			'gedung' =>$this->model->gedung(),
		);
		$this->load->view('layout_ketua_lab',$data);
	}
	public function gedung_ketua_lab()
	{
		$data = array
		(
			'konten' => 'ketua_lab/gedung',
			'datanya' => $this->model->gedung(),
		);
		$this->load->view('layout_ketua_lab',$data);
	}
	public function pengguna_ketua_lab()
	{
		$data = array
		(
			'konten' => 'ketua_lab/pengguna',
			'datanya' => $this->model->pengguna(),
		);
		$this->load->view('layout_ketua_lab',$data);
	}
	public function pengguna_ketua_lab_tambah()
	{
		$this->form_validation->set_rules('username','username','required|is_unique[daftar_pengguna.username]');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('nama','nama_pengguna','required');
		$data = array
		(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama_pengguna' => $this->input->post('nama'),
			'status' => $this->input->post('status')
		);
		$this->db->insert('daftar_pengguna',$data);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Ditambah ! </div>');
		redirect('KetuaLab/pengguna_ketua_lab');
	}
	public function pengguna_ketua_lab_ubah()
	{
		$this->form_validation->set_rules('usernamex','username','required');
		$this->form_validation->set_rules('passwordx','password','required');
		$this->form_validation->set_rules('namax','nama_pengguna','required');
		$id = $this->input->post('idnya');
		$data = array
		(
			'username' => $this->input->post('usernamex'),
			'password' => $this->input->post('passwordx'),
			'nama_pengguna' => $this->input->post('namax'),
			'status' => $this->input->post('status')
		);
		$this->db->update('daftar_pengguna',$data,'id='.$id);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
		redirect('KetuaLab/pengguna_ketua_lab');
	}
	public function pengguna_ketua_lab_hapus($id)
	{
		$this->db->delete('daftar_pengguna','id='.$id);
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('KetuaLab/pengguna_ketua_lab');
	}
	public function ruangan_tambah_update()
	{
		$this->form_validation->set_rules('gedung','id_gedung','required');
		$this->form_validation->set_rules('nama','nama_ruangan','required');
		$gedungnya = $this->input->post('gedung');
		$kodenya = $this->model->primary_ruangan($gedungnya)+1;
		$kode = sprintf('%02d',$kodenya);
		$primary = $gedungnya.$kode;
		if($this->form_validation->run()!= false){
			$data = array
			(
				'id_ruangan' => $primary,
				'nama_ruangan' => $this->input->post('nama'),
				'id_gedung' => $this->input->post('gedung'),
			);
			$this->db->insert('daftar_ruangan',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Disimpan ! </div>');
			redirect('KetuaLab/ruangan_ketua_lab');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('KetuaLab/ruangan_ketua_lab');
		}
	}
	public function ruangan_ubah_update()
	{
		$this->form_validation->set_rules('gedungx','id_gedung','required');
		$this->form_validation->set_rules('kodex','id_ruangan','required');
		$this->form_validation->set_rules('namax','nama_ruangan','required');
		if($this->form_validation->run()!= false){
			$id_ruangan = $this->input->post('kunci');
			$data = array
			(
				'id_ruangan' =>$this->input->post('kodex'),
				'nama_ruangan' => $this->input->post('namax'),
				'id_gedung' =>$this->input->post('gedungx'),
			);
			$this->db->update('daftar_ruangan',$data,'id_ruangan='."'".$id_ruangan."'");
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
			redirect('KetuaLab/ruangan_ketua_lab');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('KetuaLab/ruangan_ketua_lab');
		}
	}
	
	public function ruangan_hapus($id)
	{
		$this->db->delete('daftar_ruangan','id_ruangan='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('KetuaLab/ruangan_ketua_lab');
	}
	public function gedung_tambah_update()
	{
		$this->form_validation->set_rules('nama','nama_gedung','required');
		if($this->form_validation->run()!= false){
			$data = array
			(
				'nama_gedung' => $this->input->post('nama'),
			);
			$this->db->insert('daftar_gedung',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Disimpan ! </div>');
			redirect('KetuaLab/gedung_ketua_lab');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Disimpan !</div>');
			redirect('KetuaLab/gedung_ketua_lab');
		}	
	}
	public function gedung_ubah_update()
	{
		$this->form_validation->set_rules('namax','nama_gedung','required');
		if($this->form_validation->run()!= false){
			$id_gedung = $this->input->post('kunci');
			$data = array
			(
				'nama_gedung' => $this->input->post('namax'),
			);
			$this->db->update('daftar_gedung',$data,'id_gedung='."'".$id_gedung."'");
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Diubah ! </div>');
			redirect('KetuaLab/gedung_ketua_lab');
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Data Gagal Diubah !</div>');
			redirect('KetuaLab/gedung_ketua_lab');
		}

	}
	public function gedung_hapus($id)
	{
		$this->db->delete('daftar_gedung','id_gedung='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Data Berhasil Dihapus ! </div>');
		redirect('KetuaLab/gedung_ketua_lab');
	}

	public function pinjam_alat()
	{
		$a = $this->db->query("SELECT * from peminjaman_alat JOIN daftar_alat_praktikum ON peminjaman_alat.id_alat = 
		daftar_alat_praktikum.id_alat join daftar_rak on daftar_alat_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan")->result_array();

		$data = array
		(
			'konten' => 'ketua_lab/daftar_pinjam_alat',
			'data' => $a,
		);
		$this->load->view('layout_ketua_lab',$data);
	}

	public function setuju($id)
	{
		$data = array('status' => "Dipinjam");
		$this->db->update('peminjaman_alat', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Disetujui Meminjam ! </div>');
			redirect('KetuaLab/pinjam_alat');
	}

	public function tolak($id)
	{
		$data = array('status' => "Ditolak");
		$this->db->update('peminjaman_alat', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Ditolak Meminjam ! </div>');
			redirect('KetuaLab/pinjam_alat');
	}

	public function pinjam_bahan()
	{
		$a = $this->db->query("SELECT * from peminjaman_bahan JOIN daftar_bahan_praktikum ON peminjaman_bahan.id_bahan = 
		daftar_bahan_praktikum.id_bahan join daftar_rak on daftar_bahan_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan")->result_array();

		$data = array
		(
			'konten' => 'ketua_lab/daftar_pinjam_bahan',
			'data' => $a,
		);
		$this->load->view('layout_ketua_lab',$data);
	}

	public function setuju_bahan($id)
	{
		$data = array('status' => "Dipinjam");
		$this->db->update('peminjaman_bahan', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Disetujui Meminjam ! </div>');
			redirect('KetuaLab/pinjam_alat');
	}

	public function tolak_bahan($id)
	{
		$data = array('status' => "Ditolak");
		$this->db->update('peminjaman_bahan', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Ditolak Meminjam ! </div>');
			redirect('KetuaLab/pinjam_alat');
	}
}
