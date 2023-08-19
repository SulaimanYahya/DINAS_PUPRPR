<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
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
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('account/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {

        $data['title'] = 'Account';
        $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
        $data['user'] = $this->db->get_where('tb_admin', ['role' => $this->session->userdata('role')])->row_array();

        $data['admin_data'] = $this->db->get_where('tb_admin', ['id' => $id])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('account/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_proses()
    {
        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {

            $config['upload_path']          = './assets/img/profile/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = '4050';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $old_image = $this->input->post('gambar_lama');
                $new_image = $this->upload->data('file_name');

                if ($old_image != 'default.jpg') {

                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $this->db->set('foto', $new_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->upload->display_errors() . '</div>');
                redirect('account');
            }
        }

        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $this->db->set('nama', $nama);
        $this->db->set('alamat', $alamat);
        $this->db->set('email', $email);
        $this->db->set('no_hp', $no_hp);
        $this->db->set('date_created', time());
        $this->db->where('id', $id);
        $this->db->update('tb_admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
        redirect('account');
    }
}
