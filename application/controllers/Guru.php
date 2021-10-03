<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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

		if($this->session->userdata('Pangkat')!="Guru")
		{
			redirect('Controller1');
		}
	}

	public function index()
	{
		$alat = $this->model->banyak_alat_dipinjam();
		$bahan = $this->model->banyak_bahan_dipinjam();
		$data = array
		(
			'konten' => 'guru/dashboard',
			'alat' => $alat,
			'bahan' => $bahan,
		);
		$this->load->view('layout_guru',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function pinjam_alat()
	{
		
		$data = array
		(
			'konten' => 'guru/alat_praktikum',
			'datanya' => $this->model->alat_join_pinjam(),
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_guru',$data);
	}

	public function pinjam_bahan()
	{
		$data = array
		(
			'konten' => 'guru/bahan_praktikum',
			'datanya' => $this->model->bahan_join_pinjam(),
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_guru',$data);
	}
	public function mulai_pinjam_alat($id_alat){
		// $alat = $this->db->query("SELECT daftar_alat_praktikum.id_alat,daftar_alat_praktikum.nama_alat,daftar_alat_praktikum.jumlah,daftar_alat_praktikum.jumlah_baik,daftar_alat_praktikum.jumlah_rusak_ringan,daftar_alat_praktikum.jumlah_rusak_berat,
		// peminjaman_alat.id_pinjam,peminjaman_alat.id_alat,peminjaman_alat.status
		//  FROM peminjaman_alat join daftar_alat_praktikum on peminjaman_alat.id_alat=daftar_alat_praktikum.id_alat")->result();
		 $datadetail = $this->model->detail_data_alat($id_alat);
		 foreach ($datadetail as $row)
		 {
			 $to .=  $row->id_alat;
			 $jml .= $row->jumlah;
			 $jml_baik .= $row->jumlah_baik;
		 }
		$id_alat =$to;
		$jumlah =$jml;
		$jumlah_baik =$jml_baik;
$where = array('id_alat'=>$id_alat);
$data=array(
	'id_pinjam'=>'',
	'id_alat'=>$id_alat,
	'status'=>"Dipinjam",
	'jumlah_pinjam'=>$this->input->post('jumlah_pinjam')
	);
	$data2=array(
		'jumlah'=>$jumlah-$this->input->post('jumlah_pinjam'),
		'jumlah_baik'=>$jumlah_baik-$this->input->post('jumlah_pinjam'),
	);
	$this->model->tambah_data($where,$data,'peminjaman_alat');
	$where=array(
		'id_alat'=>$id_alat
	);
$this->model->update_data($where,$data2,'daftar_alat_praktikum');
	redirect('guru/pinjam_alat');
	}
	public function mulai_pinjam_bahan($id_bahan){
		$datadetail = $this->model->detail_data_bahan($id_bahan);
		 foreach ($datadetail as $row)
		 {
			 $to .=  $row->id_bahan;
			 $jml .= $row->jumlah;
		 }
		$id_bahan =$to;
		$jumlah =$jml;
	$data=array(
	'id_pinjam'=>'',
	'id_bahan'=>$id_bahan,
	'status'=>"Dipinjam",
	'jumlah_pinjam'=>$this->input->post('jumlah_pinjam')
	);
	$data2=array(
		'jumlah'=>$jumlah-$this->input->post('jumlah_pinjam'),
	);
	$this->model->tambah_data($where,$data,'peminjaman_bahan');
	$where=array(
		'id_bahan'=>$id_bahan
	);
$this->model->update_data($where,$data2,'daftar_bahan_praktikum');
	redirect('guru/pinjam_bahan');
	}
	public function daftar_peminjaman_alat()
	{
		$data = array
		(
			'konten' => 'guru/daftar_pinjaman_alat',
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_guru',$data);
	}
	public function daftar_peminjaman_bahan()
	{
		$data = array
		(
			'konten' => 'guru/daftar_pinjaman_bahan',
			'rak' => $this->model->rak(),
			'lemari' => $this->model->lemari(),
			'ruangan' => $this->model->ruangan(),
		);
		$this->load->view('layout_guru',$data);
	}
}