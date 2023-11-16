<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
        $data['title'] = 'File Dokumen';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['file'] = $this->db->get_where('tb_file', ['jenis' => 'File Dokumen'])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('tb_file', ['id_file' => $id])->row_array();
        unlink(FCPATH . 'assets/file/' . $data['file']);

        $this->db->where('id_file', $id);
        $this->db->delete('tb_file');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Delete successed!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'File Dokumen telah dihapus!');
        redirect('buku');
    }

    public function input()
    {

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {

            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'pdf|zip|rar|doc|docx|xls|xlsx';
            $config['max_size']             = '10240';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                date_default_timezone_set('Asia/Makassar');
                $waktu_skrg = date('d-m-Y');

                $data = [
                    'jenis' => htmlspecialchars($this->input->post('jenis', true)),
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'file' => htmlspecialchars($this->upload->data('file_name', true)),
                    'ket' => htmlspecialchars($this->input->post('ket', true)),
                    'upload_at' => htmlspecialchars($waktu_skrg),
                    'id' => htmlspecialchars($this->input->post('id', true)),
                ];

                $this->db->insert('tb_file', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>File Dokumen telah ditambahkan!</div>');
                $this->session->set_flashdata('kode_berhasil', 'suksesModal');
                $this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan File Dokumen!');
                redirect('buku');
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->upload->display_errors() . '</div>');
                $this->session->set_flashdata('kode_gagal', 'gagalModal');
                $this->session->set_flashdata('pesan_gagal', 'Gagal unggah file, Pastikan file tidak corrupt dan jenis file sesuai izin sistem!');
                redirect('buku');
            }
        }
    }

    public function edit($id)
    {

        $data['title'] = 'File Dokumen';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['file'] = $this->db->get_where('tb_file', ['id_file' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_proses()
    {

        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {

            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'pdf/zip/rar|doc|docx|xls|xlsx';
            $config['max_size']             = '10240';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_image = $this->input->post('gambar_lama');
                $new_image = $this->upload->data('file_name');

                unlink(FCPATH . 'assets/file/' . $old_image);

                $this->db->set('file', $new_image);
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->upload->display_errors() . '</div>');
                $this->session->set_flashdata('kode_gagal', 'gagalModal');
                $this->session->set_flashdata('pesan_gagal', 'Gagal unggah file, Pastikan file tidak corrupt dan jenis file sesuai izin sistem!');
                redirect('buku');
            }
        }

        $judul = $this->input->post('judul');
        $ket = $this->input->post('ket');
        date_default_timezone_set('Asia/Makassar');
        $waktu_skrg = date('d-m-Y');
        $id_file = $this->input->post('id_file');
        $this->db->set('ket', $ket);
        $this->db->set('judul', $judul);
        $this->db->set('upload_at', $waktu_skrg);
        $this->db->where('id_file', $id_file);
        $this->db->update('tb_file');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
        $this->session->set_flashdata('kode_berhasil', 'suksesModal');
        $this->session->set_flashdata('pesan_berhasil', 'File Dokumen telah diperbaharui!');
        redirect('buku');
    }
}
