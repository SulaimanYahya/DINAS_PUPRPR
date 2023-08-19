<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
	}

	public function index()
	{

		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pass/index', $data);
		$this->load->view('templates/footer');

	}

	public function edit_password(){

		$id = $this->input->post('id_admin');
		$new_pass = $this->input->post('password_baru');
		$wkt = time();
			
		$pass = password_hash($new_pass, PASSWORD_DEFAULT);

		$this->db->set('password', $pass);
		$this->db->set('date_created', $wkt);
		$this->db->where('id', $id);
		$this->db->update('tb_admin');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password has changed!</div>');
		redirect('pass');

		
	}

} 