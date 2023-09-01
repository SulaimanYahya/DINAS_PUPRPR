<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lampiran extends CI_Controller
{
	function lamp1()
	{
		$data = [
			'title'   => 'Nota Pesanan',
			'user'    => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'nota'    => getData('tb_lampiran_format1'),
			'pegawai' => $this->db->get('tb_pegawai')->result(),
		];
		$this->load->view('lampiran/lamp1', $data);
	}

	function lamp2()
	{
		$data = [
			'title'   => 'Perjalanan Dinas',
			'user'    => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'data'    => getData('tb_lampiran_format2'),
			'pegawai' => $this->db->get('tb_pegawai')->result(),
		];
		$this->load->view('lampiran/lamp2', $data);
	}

	function insert($lamp = '')
	{
		if ($lamp == 'lamp1') {
		} else {
			$data = [
				'nama' => $this->input->post("nama"),
				'jabatan' => $this->input->post("jabatan"),
				'golongan' => $this->input->post("golongan"),
				'biaya' => cleanKarakter($this->input->post("biaya")),
				'hari' => $this->input->post("hari"),
				'total' => $this->input->post("total"),
			];

			$this->db->insert('tb_lampiran_format2', $data);

			redirect(base_url('Lampiran/lamp2'));
		}
	}


	function update($lamp = 'lamp2')
	{
		$id = dekrip($this->input->post('id'));
		if ($lamp == 'lamp1') {
		} else {
			$data = [
				'nama'     => $this->input->post('nama'),
				'jabatan'  => $this->input->post('jabatan'),
				'golongan' => $this->input->post('golongan'),
				'biaya'    => cleanKarakter($this->input->post('biaya')),
				'hari' 	   => $this->input->post('hari'),
				'total'    => cleanKarakter($this->input->post('total'))
			];
			$this->db->where('id', $id); // Update the user with id = 1
			$this->db->update('tb_lampiran_format2', $data);
			return redirect(base_url('Lampiran/lamp2'));
		}
	}

	function delete($lamp = '', $idx)
	{
		$id = dekrip($idx);
		if ($lamp == 'lamp1') {
		} else {
			$this->db->delete('tb_lampiran_format2', ['id' => $id]);
			redirect(base_url('Lampiran/lamp2'));
		}
	}
}
