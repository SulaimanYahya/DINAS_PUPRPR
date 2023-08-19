<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Format5 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('m_Format5', 'format5');
    }

    public function index()
    {
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data = [
            'title'         => 'FORMAT 5',
            'user'          => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
            'jenis_tagihan' => $this->db->get('tb_jenis_tagihan')->result(),
            'rekening'      => $this->db->get('tb_rek')->result(),
            'belanja'       => $this->db->get('tb_belanja')->result(),
            'pegawai'       => $this->db->get('tb_pegawai')->result(),
            'pihak_kedua'   => $this->db->get('tb_pihak_kedua')->result(),
            'program'       => getProgram(),
            'kegiatan'      => getKegiatan(),
            'subKegiatan'   => getSubKegiatan(),
        ];
        $this->template->load('tagihan/v_Format5', $data);
    }

    function lampiran()
    {
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data = [
            'title'         => 'LAMPIRAN',
            'user'          => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
            'pegawai'       => $this->db->get('tb_pegawai')->result(),
            'data'          => $this->db->get('tb_lampiran_format5')->result(),
        ];
        $this->template->load('tagihan/v_lampiran_f5', $data);
    }

    function simpan($lampiran = '')
    {
        if ($lampiran == 'lampiran') {
            $this->format5->simpanLampiran();
        } else {
            $this->format5->save();
        }
    }

    function pihak_kedua($aksi = '', $id = '')
    {
        if ($aksi == 'tambah') {
            $this->format5->tambah_pihak();
        } elseif ($aksi == 'edit') {
            $data = [
                'title'         => 'EDIT PIHAK KEDUA',
                'user'          => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
                'pegawai'       => $this->db->get('tb_pegawai')->result(),
                'data'          => $this->db->get('tb_pihak_kedua')->result(),
            ];
            $this->template->load('tagihan/v_Tambah_Pihak', $data);
        } elseif ($aksi == 'hapus') {
            $this->format5->hapus_pihak($id);
        } else {
            $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
            $data = [
                'title'         => 'TAMBAH PIHAK KEDUA',
                'user'          => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
                'pegawai'       => $this->db->get('tb_pegawai')->result(),
                'data'          => $this->db->get('tb_pihak_kedua')->result(),
            ];
            $this->template->load('tagihan/v_Tambah_Pihak', $data);
        }
    }

    function delLampiran($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_lampiran_format5');
        redirect(base_url("format5/lampiran"));
    }

    public function delSession($index = '')
    {
        if ($index != '') {
            unset($_SESSION['data_array'][$index]);
            redirect(base_url("format5"));
        }
    }
}
