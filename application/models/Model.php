<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function cek_login($username,$password)
	{
		
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$data = $this->db->get('daftar_pengguna')->num_rows();
		return $data;
	}

	public function cek_status($username)
	{
		$this->db->where('username',$username);
		$this->db->select('daftar_pengguna.status,daftar_pengguna.nama_pengguna');		
		$this->db->from('daftar_pengguna');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function alat()
	{
		$data = $this->db->get('daftar_alat_praktikum');
		return $data->result_array();

		
	}
	public function bahan()
	{
		$data = $this->db->get('daftar_bahan_praktikum');
		return $data->result_array();

		
	}
	public function inventaris()
	{
		$data = $this->db->get('daftar_inventaris');
		return $data->result_array();

		
	}
	public function rak()
	{
		$data = $this->db->get('daftar_rak');
		return $data->result_array();

		
	}
	public function lemari()
	{
		$data = $this->db->get('daftar_lemari');
		return $data->result_array();

		
	}
	public function ruangan()
	{
		$data = $this->db->get('daftar_ruangan');
		return $data->result_array();

		
	}
	public function gedung()
	{
		$data = $this->db->get('daftar_gedung');
		return $data->result_array();

		
	}
	public function gedung_ubah($id)
	{
		$this->db->where('id_gedung',$id);
		$data = $this->db->get('daftar_gedung');
		return $data->result_array();

		
	}
	public function ruangan_ubah($id)
	{
		$this->db->where('id_ruangan',$id);
		$data = $this->db->get('daftar_ruangan');
		return $data->result_array();

		
	}
	public function ruangan_join()
	{
		$this->db->select('daftar_ruangan.*,daftar_gedung.nama_gedung');
		$this->db->join('daftar_gedung','daftar_ruangan.id_gedung=daftar_gedung.id_gedung');
		$this->db->from('daftar_ruangan');
		$data = $this->db->get();
		return $data->result_array();
	}
	public function lemari_join()
	{
		$this->db->select('daftar_lemari.*,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_ruangan','daftar_lemari.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_lemari');
		$data = $this->db->get();
		return $data->result_array();
	}
	public function lemari_ubah($id)
	{
		$this->db->where('id_lemari',$id);
		$data = $this->db->get('daftar_lemari');
		return $data->result_array();

		
	}
	public function rak_join()
	{
		$this->db->select('daftar_rak.*,daftar_lemari.nama_lemari,daftar_ruangan.id_ruangan,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_lemari','daftar_rak.id_lemari=daftar_lemari.id_lemari');
		$this->db->join('daftar_ruangan','daftar_lemari.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_rak');
		$data = $this->db->get();
		return $data->result_array();
	}
	
	function panggil_lemari($id_ruangan){
		$this->db->where('id_ruangan',$id_ruangan);
		$data = $this->db->get('daftar_lemari');
		return $data->result_array();
	}
	public function rak_ubah($id)
	{
		$this->db->where('id_rak',$id);
		$data = $this->db->get('daftar_rak');
		return $data->result_array();

		
	}
	public function inventaris_join()
	{
		$this->db->select('daftar_inventaris.*,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_ruangan','daftar_inventaris.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_inventaris');
		$data = $this->db->get();
		return $data->result_array();
	}
	function panggil_rak($id_lemari){
		$this->db->where('id_lemari',$id_lemari);
		$data = $this->db->get('daftar_rak');
		return $data->result_array();
	}
	public function bahan_join()
	{
		$this->db->select('daftar_bahan_praktikum.*,daftar_rak.id_rak,daftar_rak.nama_rak,daftar_lemari.id_lemari,daftar_lemari.nama_lemari,daftar_ruangan.id_ruangan,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_rak','daftar_bahan_praktikum.id_rak=daftar_rak.id_rak');
		$this->db->join('daftar_lemari','daftar_rak.id_lemari=daftar_lemari.id_lemari');
		$this->db->join('daftar_ruangan','daftar_lemari.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_bahan_praktikum');
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function alat_join()
	{
		$this->db->select('daftar_alat_praktikum.*,daftar_rak.id_rak,daftar_rak.nama_rak,daftar_lemari.id_lemari,daftar_lemari.nama_lemari,daftar_ruangan.id_ruangan,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_rak','daftar_alat_praktikum.id_rak=daftar_rak.id_rak');
		$this->db->join('daftar_lemari','daftar_rak.id_lemari=daftar_lemari.id_lemari');
		$this->db->join('daftar_ruangan','daftar_lemari.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_alat_praktikum');
		$this->db->order_by('daftar_alat_praktikum.id_alat', 'DESC');
		$data = $this->db->get();
		return $data->result_array();
	}
	public function bahan_join_pinjam()
	{
		$this->db->select('daftar_bahan_praktikum.*,daftar_rak.id_rak,daftar_rak.nama_rak,daftar_lemari.id_lemari,daftar_lemari.nama_lemari,daftar_ruangan.id_ruangan,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_rak','daftar_bahan_praktikum.id_rak=daftar_rak.id_rak');
		$this->db->join('daftar_lemari','daftar_rak.id_lemari=daftar_lemari.id_lemari');
		$this->db->join('daftar_ruangan','daftar_lemari.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_bahan_praktikum');
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function alat_join_pinjam()
	{
		$this->db->select('daftar_alat_praktikum.*,daftar_rak.id_rak,daftar_rak.nama_rak,daftar_lemari.id_lemari,daftar_lemari.nama_lemari,daftar_ruangan.id_ruangan,daftar_ruangan.nama_ruangan');
		$this->db->join('daftar_rak','daftar_alat_praktikum.id_rak=daftar_rak.id_rak');
		$this->db->join('daftar_lemari','daftar_rak.id_lemari=daftar_lemari.id_lemari');
		$this->db->join('daftar_ruangan','daftar_lemari.id_ruangan=daftar_ruangan.id_ruangan');
		$this->db->from('daftar_alat_praktikum');
		$this->db->order_by('daftar_alat_praktikum.id_alat', 'DESC');
		$data = $this->db->get();
		return $data->result_array();
	}
	
	public function jumlah_rak($id_lemarinya)
	{
		$this->db->where('id_lemari',$id_lemarinya);
		$this->db->select('daftar_lemari.jumlah_rak');
		$data = $this->db->get('daftar_lemari');
		return $data->result_array();
	}
	public function jumlah_baris_lemari($id_lemari)
	{
		$this->db->where('id_lemari',$id_lemari);
		$data = $this->db->get('daftar_rak');
		$kampret = $data->num_rows();
		return $kampret;
	}
	public function pengguna()
	{
		$data = $this->db->get('daftar_pengguna');
		return $data->result_array();
	}

	public function banyak_alat()
	{
		$data = $this->db->get('daftar_alat_praktikum')->num_rows();
		return $data;
	}

	public function banyak_bahan()
	{
		$data = $this->db->get('daftar_bahan_praktikum')->num_rows();
		return $data;
	}
	public function banyak_alat_dipinjam()
	{
		$data = $this->db->get('peminjaman_alat')->num_rows();
		return $data;
	}

	public function banyak_bahan_dipinjam()
	{
		$data = $this->db->get('peminjaman_bahan')->num_rows();
		return $data;
	}

	public function banyak_inventaris()
	{
		$data = $this->db->get('daftar_inventaris')->num_rows();
		return $data;
	}

	public function banyak_rak()
	{
		$data = $this->db->get('daftar_rak')->num_rows();
		return $data;
	}

	public function banyak_lemari()
	{
		$data = $this->db->get('daftar_lemari')->num_rows();
		return $data;
	}

	public function banyak_ruangan()
	{
		$data = $this->db->get('daftar_ruangan')->num_rows();
		return $data;
	}

	public function banyak_gedung()
	{
		$data = $this->db->get('daftar_gedung')->num_rows();
		return $data;
	}

	public function banyak_pengguna()
	{
		$data = $this->db->get('daftar_pengguna')->num_rows();
		return $data;
	}

	public function primary_ruangan($gedungnya)
	{
		$this->db->where('id_gedung',$gedungnya);
		$this->db->select('daftar_ruangan.id_gedung');
		$data = $this->db->get('daftar_ruangan')->num_rows();
		return $data;
	}
	public function detail_data_alat($id_alat){
		$this->db->select('*');
   $this->db->from('daftar_alat_praktikum');
   $this->db->where('id_alat', $id_alat);  // Also mention table name here
   $query = $this->db->get();    
   if($query->num_rows() > 0)
	   return $query->result();
   }
   public function detail_data_bahan($id_bahan){
	$this->db->select('*');
$this->db->from('daftar_bahan_praktikum');
$this->db->where('id_bahan', $id_bahan);  // Also mention table name here
$query = $this->db->get();    
if($query->num_rows() > 0)
   return $query->result();
}
   public function update_data($where,$data,$table){
	$this->db->where($where);
 $this->db->update($table,$data);
}
   public function tambah_data($where,$data,$table){
	$this->db->where($where);
	$this->db->insert($table, $data);
}
public function edit_data($where,$table){
	return $this->db->get_where($table,$where);
}
}