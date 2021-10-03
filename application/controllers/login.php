<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model');
			$this->load->library('session');
			
		}

		public function index()
		{
			$this->load->view('login');
		}

		public function login_action()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$cek = $this->model->cek_login($username,$password);
			$status = $this->model->cek_status($username);

			if($cek>0)
			{
				foreach($status as $statusnya)
				{
					$status = $statusnya['status'];
					$nama = $statusnya['nama_pengguna'];
					$data_session = array
					(
						'NIP' => $username,
						'Nama' => $nama,
						'Pangkat' => $status,
						'status' => "login"
					);
					$this->session->set_userdata($data_session);
					if($status == "Laboran")
					{
						redirect('Laboran');
					}
					elseif($status == "Ketua Lab")
					{
						redirect('KetuaLab');
					}
					elseif($status == "Guru")
					{
						redirect('Guru');
					}
				}
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times-circle"></i>Maaf, NIP dan/atau Password Salah!</div>');
				redirect('login');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
?>