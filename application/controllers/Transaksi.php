<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
	}


	public function pinjam_alat()
	{
		$a = $this->db->query("SELECT * from peminjaman_alat JOIN daftar_alat_praktikum ON peminjaman_alat.id_alat = 
		daftar_alat_praktikum.id_alat join daftar_rak on daftar_alat_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan where peminjaman_alat.status != 'Dikembalikan'")->result_array();

		$data = array
		(
			'konten' => 'guru/pinjam_alat',
			'data'	 => $a
		);
		$this->load->view('layout_guru',$data);
	}

	public function pinjam_alat_tambah()
	{
		$nama = $this->input->post('nama_alat');
		$jml = $this->input->post('jumlah_pinjam');
		$a = $this->db->query("SELECT * from daftar_alat_praktikum where id_alat ='$nama'")->row();
		if ($jml > $a->jumlah_baik){
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Jumlah yang dipinjam melebihi jumlah yang tersedia !</div>');
			redirect('Transaksi/pinjam_alat');
		}else{
			$data = array
			( 'id_alat' => $nama,
			  'status'	=> "Menunggu",
			  'jumlah_pinjam' => $jml);
			$this->db->insert('peminjaman_alat',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Alat Berhasil Disimpan ! </div>');
			redirect('Transaksi/pinjam_alat');		
		}
	
	}

	public function kembali_alat()
	{
		$a = $this->db->query("SELECT * from peminjaman_alat JOIN daftar_alat_praktikum ON peminjaman_alat.id_alat = 
		daftar_alat_praktikum.id_alat join daftar_rak on daftar_alat_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan where peminjaman_alat.status != 'Menunggu'")->result_array();

		$data = array
		(
			'konten' => 'guru/kembalikan_alat',
			'data'	 => $a
		);
		$this->load->view('layout_guru',$data);
	}

	public function pengembalian_alat($id)
	{
		$data = array('status' => "Dikembalikan");
		$this->db->update('peminjaman_alat', $data, 'id_pinjam ='."'".$id."'");
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Pengembalian Berhasil ! </div>');
			redirect('transaksi/pinjam_alat');
	}

	public function pinjam_bahan()
	{
		$a = $this->db->query("SELECT * from peminjaman_bahan JOIN daftar_bahan_praktikum ON peminjaman_bahan.id_bahan = 
		daftar_bahan_praktikum.id_bahan join daftar_rak on daftar_bahan_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan where peminjaman_bahan.status != 'Dikembalikan'")->result_array();

		$data = array
		(
			'konten' => 'guru/pinjam_bahan',
			'data'	 => $a
		);
		$this->load->view('layout_guru',$data);
	}

	public function pinjam_bahan_tambah()
	{
		$nama = $this->input->post('nama_bahan');
		$jml = $this->input->post('jumlah_pinjam');
		$a = $this->db->query("SELECT * from daftar_bahan_praktikum where id_bahan ='$nama'")->row();
		if ($jml > $a->jumlah){
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i> Maaf, Jumlah yang dipinjam melebihi jumlah yang tersedia !</div>');
			redirect('Transaksi/pinjam_bahan');
		}else{
			$data = array
			( 'id_bahan' => $nama,
			  'status'	=> "Menunggu",
			  'jumlah_pinjam' => $jml);
			$this->db->insert('peminjaman_bahan',$data);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Berhasil, Silahkan Menunggu Persetujuan ! </div>');
			redirect('Transaksi/pinjam_bahan');		
		}
	
	}

	public function kembali_bahan()
	{
		$a = $this->db->query("SELECT * from peminjaman_bahan JOIN daftar_bahan_praktikum ON peminjaman_bahan.id_bahan = 
		daftar_bahan_praktikum.id_bahan join daftar_rak on daftar_bahan_praktikum.id_rak = daftar_rak.id_rak join daftar_lemari 
		on daftar_rak.id_lemari = daftar_lemari.id_lemari join daftar_ruangan on daftar_lemari.id_ruangan = daftar_ruangan.id_ruangan where peminjaman_bahan.status != 'Menunggu'")->result_array();

		$data = array
		(
			'konten' => 'guru/kembalikan_bahan',
			'data'	 => $a
		);
		$this->load->view('layout_guru',$data);
	}



}