<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renja extends CI_Controller 
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
        $data['title'] = 'Renja';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        // fungsi untuk sasaran
        $this->db->order_by('tb_sasaran.id_sasaran', 'DESC');
        $this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['sasaran'] = $this->db->get_where('tb_sasaran')->result_array();

        $data['jenis_sasaran'] = $this->db->get_where('tb_jenis_sasaran')->result_array();

        // batas fungsi sasaran

        // fungsi untuk program
        $this->db->order_by('tb_program.id_program', 'DESC');
        $this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['program'] = $this->db->get_where('tb_program', ['status_dua'=>'renwal'])->result_array();

        // batas fungsi program

        // fungsi untuk kegiatan
        $this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
        $data['kegiatan'] = $this->db->get_where('tb_kegiatan', ['status_dua'=>'renwal'])->result_array();

        // batas fungsi kegiatan

        // fungsi untuk sub kegiatan
        $this->db->order_by('tb_sub_kegiatan.id_sub_kegiatan', 'DESC');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan', ['status_dua'=>'renwal'])->result_array();

        // batas fungsi sub kegiatan

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('renja/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function validasi($id){

        $this->db->set('status_sasaran', 'renwal');
        $this->db->where('id_sasaran', $id);
        $this->db->update('tb_sasaran');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Approval berhasil, Sasaran Strategis Telah Masuk Pada Renja!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Approval!');

        redirect('renja');
    }

    public function tambah_program($id)
    {
        $data['title'] = 'Renja';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

       $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['sasaran_data'] = $this->db->get_where('tb_sasaran', ['id_sasaran' => $id])->row_array();

        $this->db->order_by('tb_program.id_program', 'DESC');
        $this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $data['program'] = $this->db->get_where('tb_program', ['tb_program.id_sasaran' => $id, 'status_program'=>'renja'])->result_array();

        $data['jenis_program'] = $this->db->get_where('tb_jenis_program')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('renja/tambah_program', $data);
        $this->load->view('templates/footer');
        
    }

    public function validasi_program($id){

        $this->db->set('status_dua', 'renwal');
        $this->db->where('id_target_program', $id);
        $this->db->update('tb_target_program');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Approval berhasil, Program Telah Masuk Pada Renja!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Approval!');

        redirect('renja');
    }

    public function tambah_kegiatan($id)
    {
        $data['title'] = 'Renja';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['program_data'] = $this->db->get_where('tb_program', ['id_program' => $id])->row_array();

        $this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
        $data['kegiatan'] = $this->db->get_where('tb_kegiatan', ['tb_kegiatan.id_program' => $id, 'status_kegiatan'=>'renja'])->result_array();

        $data['jenis_kegiatan'] = $this->db->get_where('tb_jenis_kegiatan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('renja/tambah_kegiatan', $data);
        $this->load->view('templates/footer');
        
    }

    public function validasi_kegiatan($id){

        $this->db->set('status_dua', 'renwal');
        $this->db->where('id_target_kegiatan', $id);
        $this->db->update('tb_target_kegiatan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Approval berhasil, Kegiatan Telah Masuk Pada Renja!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Approval!');

        redirect('renja');
    }

    public function tambah_sub_kegiatan($id)
    {
        $data['title'] = 'Renja';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['kegiatan_data'] = $this->db->get_where('tb_kegiatan', ['id_kegiatan' => $id])->row_array();

        $this->db->order_by('tb_sub_kegiatan.id_sub_kegiatan', 'DESC');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan', ['tb_sub_kegiatan.id_kegiatan' => $id, 'status_sub'=>'renja'])->result_array();

        $data['jenis_sub_kegiatan'] = $this->db->get_where('tb_jenis_sub_kegiatan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('renja/tambah_sub_kegiatan', $data);
        $this->load->view('templates/footer');
        
    }

    public function validasi_sub_kegiatan($id){

        $this->db->set('status_dua', 'renwal');
        $this->db->where('id_target_sub', $id);
        $this->db->update('tb_target_sub');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Approval berhasil, Sub Kegiatan Telah Masuk Pada Renja!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Approval!');

        redirect('renja');
    }

} 