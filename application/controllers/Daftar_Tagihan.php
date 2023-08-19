<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('m_pju', 'M_PJU');
    }

    public function index()
    {
        $data = [
            'title'  => 'Daftar Tagihan',
            // 'user'   => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
            'user'   => $this->db->query("SELECT * FROM tb_admin 
                                          INNER JOIN tb_role ON tb_role.id_role=tb_admin.id_role 
                                          WHERE username='$_SESSION[username]'")->row_array(),
            'list' => $this->db->get('tb_spm')->result()
        ];

        $this->template->load('tagihan/v_DaftarTagihan', $data);
    }
}
