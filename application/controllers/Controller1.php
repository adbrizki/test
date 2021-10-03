<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller1 extends CI_Controller {

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


	public function index()
	{
		if($this->session->userdata('Pangkat')=="Ketua Lab"){
			redirect('KetuaLab');
		}elseif($this->session->userdata('Pangkat')=="Laboran"){
			redirect('Laboran');
		}
		elseif($this->session->userdata('Pangkat')=="Guru"){
			redirect('Guru');
		}
	}
}