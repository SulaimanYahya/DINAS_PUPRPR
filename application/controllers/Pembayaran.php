<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('m_Pembayaran', 'pembayaran');
    }

    public function index()
    {
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data = [
            'title'  => 'PEMBAYARAN',
            'user'   => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
            'jenis_tagihan' => $this->db->get('tb_jenis_tagihan')->result(),
            'rekening' => $this->db->get('tb_rek')->result(),
            'belanja' => $this->db->get('tb_belanja')->result(),
            'pegawai' => $this->db->get('tb_pegawai')->result(),
            'program' => getProgram(),
            'kegiatan' => getKegiatan(),
            'subKegiatan' => getSubKegiatan(),
        ];
        $this->template->load('pembayaran/index', $data);
    }

    function simpan()
    {
        $this->pembayaran->save();
    }
}
