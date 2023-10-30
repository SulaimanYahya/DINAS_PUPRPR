<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rka extends CI_Controller
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
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        date_default_timezone_set('Asia/Makassar');
        $tahun_skrg = date('Y');

        // fungsi untuk sasaran
        $this->db->order_by('tb_sasaran.id_sasaran', 'DESC');
        $this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['sasaran'] = $this->db->get_where('tb_sasaran', ['tahun' => $tahun_skrg])->result_array();

        $data['jenis_sasaran'] = $this->db->get_where('tb_jenis_sasaran')->result_array();

        $this->db->group_by('tahun');
        $this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
        $data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

        // batas fungsi sasaran

        // fungsi untuk program
        $this->db->order_by('tb_program.id_program', 'DESC');
        $this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_renja_program', 'tb_renja_program.id_program=tb_program.id_program');
        $data['program'] = $this->db->get_where('tb_program', ['status_dua' => 'renwal', 'tahun_program' => $tahun_skrg])->result_array();

        // batas fungsi program

        // fungsi untuk kegiatan
        $this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
        $this->db->join('tb_renja_kegiatan', 'tb_renja_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
        $data['kegiatan'] = $this->db->get_where('tb_kegiatan', ['status_dua' => 'renwal', 'tahun_kegiatan' => $tahun_skrg])->result_array();

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
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan', ['status_dua' => 'renwal', 'tahun_sub' => $tahun_skrg])->result_array();

        // batas fungsi sub kegiatan

        // batas fungsi belanja

        $this->db->order_by('tb_kp_belanja.id_kp_belanja', 'DESC');
        $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_belanja.id_kp_belanja');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_belanja.id_satuan');
        $data['belanja'] = $this->db->get_where('tb_belanja', ['status_dua' => 'renwal', 'tahun_sub' => $tahun_skrg])->result_array();

        // batas fungsi belanja

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/index', $data);
        $this->load->view('templates/footer');
    }

    public function minta_tahun()
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $tahun_skrg = $this->input->post('tahun');
        $data['tahun_skrg'] = $this->input->post('tahun');

        // fungsi untuk sasaran
        $this->db->order_by('tb_sasaran.id_sasaran', 'DESC');
        $this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $data['sasaran'] = $this->db->get_where('tb_sasaran', ['tahun' => $tahun_skrg])->result_array();

        $data['jenis_sasaran'] = $this->db->get_where('tb_jenis_sasaran')->result_array();

        $this->db->group_by('tahun');
        $this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
        $data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

        // batas fungsi sasaran

        // fungsi untuk program
        $this->db->order_by('tb_program.id_program', 'DESC');
        $this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_renja_program', 'tb_renja_program.id_program=tb_program.id_program');
        $data['program'] = $this->db->get_where('tb_program', ['status_dua' => 'renwal', 'tahun_program' => $tahun_skrg])->result_array();

        // batas fungsi program

        // fungsi untuk kegiatan
        $this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
        $this->db->join('tb_renja_kegiatan', 'tb_renja_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
        $data['kegiatan'] = $this->db->get_where('tb_kegiatan', ['status_dua' => 'renwal', 'tahun_kegiatan' => $tahun_skrg])->result_array();

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
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan', ['status_dua' => 'renwal', 'tahun_sub' => $tahun_skrg])->result_array();

        // batas fungsi sub kegiatan

        // batas fungsi belanja

        $this->db->order_by('tb_kp_belanja.id_kp_belanja', 'DESC');
        $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_aktivitas.id_kp_belanja');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_belanja.id_satuan');
        $data['belanja'] = $this->db->get_where('tb_belanja', ['status_dua' => 'renwal', 'tahun_sub' => $tahun_skrg])->result_array();

        // batas fungsi belanja

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/minta', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_anggaran_program()
    {

        $id_renja_program = $this->input->post('id_renja_program');
        $rp_target_anggaran = $this->input->post('rp_target_anggaran');
        $anggaran = str_replace(",", "", $rp_target_anggaran);

        $this->db->set('rp_target_anggaran', $anggaran);
        $this->db->where('id_renja_program', $id_renja_program);
        $this->db->update('tb_renja_program');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Target Anggaran telah diperbaharui!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil memperbaharui target anggaran!');

        redirect('rka');
    }

    public function tambah_fisik_program()
    {

        $id_renja_program = $this->input->post('id_renja_program');
        $rp_target_fisik = $this->input->post('rp_target_fisik');
        $fisik = str_replace(",", "", $rp_target_fisik);

        $this->db->set('rp_target_fisik', $fisik);
        $this->db->where('id_renja_program', $id_renja_program);
        $this->db->update('tb_renja_program');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Target Fisik telah diperbaharui!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil memperbaharui target fisik!');

        redirect('rka');
    }

    public function tambah_anggaran_kegiatan()
    {

        $id_renja_kegiatan = $this->input->post('id_renja_kegiatan');
        $rk_target_anggaran = $this->input->post('rk_target_anggaran');
        $anggaran = str_replace(",", "", $rk_target_anggaran);

        $this->db->set('rk_target_anggaran', $anggaran);
        $this->db->where('id_renja_kegiatan', $id_renja_kegiatan);
        $this->db->update('tb_renja_kegiatan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Target Anggaran telah diperbaharui!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil memperbaharui target anggaran!');

        redirect('rka');
    }

    public function tambah_fisik_kegiatan()
    {

        $id_renja_kegiatan = $this->input->post('id_renja_kegiatan');
        $rk_target_fisik = $this->input->post('rk_target_fisik');
        $fisik = str_replace(",", "", $rk_target_fisik);

        $this->db->set('rk_target_fisik', $fisik);
        $this->db->where('id_renja_kegiatan', $id_renja_kegiatan);
        $this->db->update('tb_renja_kegiatan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Target Fisik telah diperbaharui!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil memperbaharui target fisik!');

        redirect('rka');
    }

    public function tambah_anggaran_sub()
    {

        $id_renja_sub = $this->input->post('id_renja_sub');
        $rs_target_anggaran = $this->input->post('rs_target_anggaran');
        $anggaran = str_replace(",", "", $rs_target_anggaran);

        $this->db->set('rs_target_anggaran', $anggaran);
        $this->db->where('id_renja_sub', $id_renja_sub);
        $this->db->update('tb_renja_sub');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Target Anggaran telah diperbaharui!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil memperbaharui target anggaran!');

        redirect('rka');
    }

    public function tambah_fisik_sub()
    {

        $id_renja_sub = $this->input->post('id_renja_sub');
        $rs_target_fisik = $this->input->post('rs_target_fisik');
        $fisik = str_replace(",", "", $rs_target_fisik);

        $this->db->set('rs_target_fisik', $fisik);
        $this->db->where('id_renja_sub', $id_renja_sub);
        $this->db->update('tb_renja_sub');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Target Fisik telah diperbaharui!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil memperbaharui target fisik!');

        redirect('rka');
    }

    public function tambah_belanja($id)
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $data['sub_kegiatan_data'] = $this->db->get_where('tb_sub_kegiatan', ['tb_renja_sub.id_renja_sub' => $id])->row_array();

        $this->db->order_by('tb_kp_belanja.id_kp_belanja', 'DESC');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $data['kp_belanja'] = $this->db->get_where('tb_kp_belanja', ['tb_renja_sub.id_renja_sub' => $id])->result_array();

        $data['rek'] = $this->db->get_where('tb_rek')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/tambah_belanja', $data);
        $this->load->view('templates/footer');
    }

    public function input_kp_belanja()
    {

        $cek = $this->db->get_where('tb_kp_belanja', ['id_rek' => $this->input->post('id_rek'), 'id_renja_sub' => $this->input->post('id_renja_sub')])->num_rows();

        if ($cek > 0) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Rekening Tidak Bisa Sama!</div>');
            $this->session->set_flashdata('kode_gagal', 'gagalModal');
            $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan Data belanja, Rekening sudah ada!');

            redirect('rka/tambah_belanja/' . $this->input->post('id_renja_sub'));
        } else {

            $data = [
                'id_rek' => htmlspecialchars($this->input->post('id_rek', true)),
                'id_renja_sub' => htmlspecialchars($this->input->post('id_renja_sub', true)),
                'total_kp_belanja' => htmlspecialchars("0"),
                'status_kp_belanja' => htmlspecialchars("tunggu"),
            ];

            $this->db->insert('tb_kp_belanja', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data belanja telah ditambahkan!</div>');
            $this->session->set_flashdata('kode_berhasil', 'suksesModal');
            $this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data belanja!');

            redirect('rka/tambah_belanja/' . $this->input->post('id_renja_sub'));
        }
    }

    public function hapus_kp_belanja($id)
    {

        $cek = $this->db->get_where('tb_kp_belanja', ['id_kp_belanja' => $id])->row_array();

        $this->db->where('id_kp_belanja', $id);
        $this->db->delete('tb_kp_belanja');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Data belanja telah dihapus!');

        redirect('rka/tambah_belanja/' . $cek['id_renja_sub']);
    }

    public function tambah_aktivitas($id)
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $data['kp_belanja_data'] = $this->db->get_where('tb_kp_belanja', ['tb_kp_belanja.id_kp_belanja' => $id])->row_array();

        $this->db->order_by('tb_aktivitas.id_aktivitas', 'DESC');
        $data['aktivitas'] = $this->db->get_where('tb_aktivitas', ['tb_aktivitas.id_kp_belanja' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/tambah_aktivitas', $data);
        $this->load->view('templates/footer');
    }

    public function input_aktivitas()
    {

        $data = [
            'id_kp_belanja' => htmlspecialchars($this->input->post('id_kp_belanja', true)),
            'nama_aktivitas' => htmlspecialchars($this->input->post('nama_aktivitas', true)),
            'total_belanja_aktivitas' => htmlspecialchars("0"),
        ];

        $this->db->insert('tb_aktivitas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data aktivitas telah ditambahkan!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data aktivitas!');

        redirect('rka/tambah_aktivitas/' . $this->input->post('id_kp_belanja'));
    }

    public function hapus_aktivitas($id)
    {

        $cek = $this->db->get_where('tb_aktivitas', ['id_aktivitas' => $id])->row_array();

        $this->db->where('id_aktivitas', $id);
        $this->db->delete('tb_aktivitas');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Data aktivitas telah dihapus!');

        redirect('rka/tambah_aktivitas/' . $cek['id_kp_belanja']);
    }

    public function tambah_rincian($id)
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $data['kp_belanja_data'] = $this->db->get_where('tb_kp_belanja', ['tb_kp_belanja.id_kp_belanja' => $id])->row_array();

        $this->db->order_by('tb_belanja.id_belanja', 'DESC');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_belanja.id_satuan');
        $data['belanja'] = $this->db->get_where('tb_belanja', ['tb_belanja.id_kp_belanja' => $id])->result_array();

        $data['satuan'] = $this->db->get_where('tb_satuan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/tambah_rincian', $data);
        $this->load->view('templates/footer');
    }

    public function input_belanja()
    {

        $cek_angka1 = $this->input->post('harga_satuan');
        $harga_satuan = str_replace(",", "", $cek_angka1);
        $volume = $this->input->post('volume');
        $total = $harga_satuan * $volume;

        $data = [
            'id_kp_belanja' => htmlspecialchars($this->input->post('id_kp_belanja', true)),
            'uraian_belanja' => htmlspecialchars($this->input->post('uraian_belanja', true)),
            'id_satuan' => htmlspecialchars($this->input->post('id_satuan', true)),
            'volume' => htmlspecialchars($this->input->post('volume', true)),
            'harga_satuan' => htmlspecialchars($harga_satuan),
            'total' => htmlspecialchars($total),
            'kode_rup' => htmlspecialchars($this->input->post('kode_rup', true)),
        ];

        $simpan = $this->db->insert('tb_belanja', $data);

        if ($simpan) {

            $id_kp_belanja = $this->input->post('id_kp_belanja');
            $get_kepala = $this->db->get_where('tb_kp_belanja', ['id_kp_belanja' => $id_kp_belanja])->row_array();
            $total_kp_belanja_old = $get_kepala['total_kp_belanja'];
            $total_kp_belanja = $total_kp_belanja_old + $total;

            $this->db->set('total_kp_belanja', $total_kp_belanja);
            $this->db->where('id_kp_belanja', $id_kp_belanja);
            $this->db->update('tb_kp_belanja');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data rincian belanja telah ditambahkan!</div>');
            $this->session->set_flashdata('kode_berhasil', 'suksesModal');
            $this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data rincian belanja!');

            redirect('rka/tambah_rincian/' . $this->input->post('id_kp_belanja'));
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data rincian belanja gagal ditambahkan!</div>');
            $this->session->set_flashdata('kode_gagal', 'gagalModal');
            $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan Data rincian belanja!');

            redirect('rka/tambah_rincian/' . $this->input->post('id_kp_belanja'));
        }
    }

    public function hapus_belanja($id)
    {

        $cek = $this->db->get_where('tb_belanja', ['id_belanja' => $id])->row_array();

        $id_kp_belanja = $cek['id_kp_belanja'];
        $total = $cek['total'];
        $get_kepala = $this->db->get_where('tb_kp_belanja', ['id_kp_belanja' => $id_kp_belanja])->row_array();
        $total_kp_belanja_old = $get_kepala['total_kp_belanja'];
        $total_kp_belanja = $total_kp_belanja_old - $total;

        $this->db->set('total_kp_belanja', $total_kp_belanja);
        $this->db->where('id_kp_belanja', $id_kp_belanja);
        $this->db->update('tb_kp_belanja');

        $this->db->where('id_belanja', $id);
        $this->db->delete('tb_belanja');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'Data rincian belanja telah dihapus!');

        redirect('rka/tambah_rincian/' . $cek['id_kp_belanja']);
    }

    public function minta_belanja($id)
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $data['sub_kegiatan_data'] = $this->db->get_where('tb_sub_kegiatan', ['tb_renja_sub.id_renja_sub' => $id])->row_array();

        $this->db->order_by('tb_kp_belanja.id_kp_belanja', 'DESC');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $data['kp_belanja'] = $this->db->get_where('tb_kp_belanja', ['tb_renja_sub.id_renja_sub' => $id])->result_array();

        $data['rek'] = $this->db->get_where('tb_rek')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/minta_belanja', $data);
        $this->load->view('templates/footer');
    }

    public function minta_aktivitas($id)
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $data['kp_belanja_data'] = $this->db->get_where('tb_kp_belanja', ['tb_kp_belanja.id_kp_belanja' => $id])->row_array();

        $this->db->order_by('tb_aktivitas.id_aktivitas', 'DESC');
        $data['aktivitas'] = $this->db->get_where('tb_aktivitas', ['tb_aktivitas.id_kp_belanja' => $id])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/minta_aktivitas', $data);
        $this->load->view('templates/footer');
    }

    public function minta_rincian($id)
    {
        $data['title'] = 'RKA';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_aktivitas.id_kp_belanja');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
        $this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
        $this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
        $this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
        $this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
        $this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
        $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
        $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $data['aktivitas_data'] = $this->db->get_where('tb_aktivitas', ['tb_aktivitas.id_aktivitas' => $id])->row_array();

        $this->db->order_by('tb_belanja.id_belanja', 'DESC');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_belanja.id_satuan');
        $data['belanja'] = $this->db->get_where('tb_belanja', ['tb_belanja.id_aktivitas' => $id])->result_array();

        $data['satuan'] = $this->db->get_where('tb_satuan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rka/minta_rincian', $data);
        $this->load->view('templates/footer');
    }
}
