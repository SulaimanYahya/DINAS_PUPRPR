<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lampiran extends CI_Controller
{
	function lamp1()
	{
		$data = [
			'title'   		=> 'LAMPIRAN FORMAT 1',
			'user'    		=> $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'nota'    		=> getData('tb_lampiran_format1'),
			'pegawai' 		=> $this->db->get('tb_pegawai')->result(),

		];
		$this->load->view('lampiran/lamp1', $data);
	}

	function lamp2()
	{
		$data = [
			'title'   		=> 'LAMPIRAN FORMAT 2',
			'user'    		=> $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'data'    		=> getData('tb_lampiran_format2'),
			'pegawai' 		=> $this->db->get('tb_pegawai')->result(),
			'jenis_tagihan' => $this->db->get('tb_jenis_tagihan')->result(),
			'rekening' 		=> $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_rek=tb_rek.id_rek')->group_by('tb_rek.id_rek')->get('tb_rek')->result(),
			'belanja'       => $this->db->get('tb_belanja')->result(),
		];

		$this->load->view('lampiran/lamp2', $data);
	}

	function lamp3()
	{
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data = [
			'title'         => 'LAMPIRAN FORMAT 3',
			'user'          => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'pegawai'       => $this->db->get('tb_pegawai')->result(),
			'program'       => getProgram(),
			'kegiatan'      => getKegiatan(),
			'subKegiatan'   => getSubKegiatan(),
			'jenis_tagihan' => $this->db->get('tb_jenis_tagihan')->result(),
			'rekening' 		=> $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_rek=tb_rek.id_rek')->group_by('tb_rek.id_rek')->get('tb_rek')->result(),
			'belanja'       => $this->db->get('tb_belanja')->result(),
			'data'      	=> $this->db->group_by('kode_spm')->get('tb_lampiran_format3')->result(),
		];
		$this->load->view('lampiran/lamp3', $data);
	}

	function insert($lamp = '')
	{
		if ($lamp == 'lamp1') {
		} elseif ($lamp == 'lamp2') {
			$data = [
				'id_pegawai' => $this->input->post("id_pegawai"),
				'biaya' => cleanKarakter($this->input->post("biaya")),
				'hari' => $this->input->post("hari"),
				'total' => cleanKarakter($this->input->post("total")),
			];

			$this->db->insert('tb_lampiran_format2', $data);

			redirect(base_url('Lampiran/lamp2'));
		} else {
			$this->load->model('m_Format3', 'format3');
			$this->format3->simpanLampiran();
		}
	}


	function update($lamp = 'lamp2')
	{
		$id = dekrip($this->input->post('id'));
		if ($lamp == 'lamp1') {
		} else {
			$data = [
				'id_pegawai' => $this->input->post('id_pegawai'),
				'biaya'    	 => cleanKarakter($this->input->post('biaya')),
				'hari' 	   	 => $this->input->post('hari'),
				'total'    	 => cleanKarakter($this->input->post('total'))
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
		} elseif ($lamp == 'lamp2') {
			$this->db->delete('tb_lampiran_format2', ['id' => $id]);
			redirect(base_url('Lampiran/lamp2'));
		} else {
			$this->db->delete('tb_lampiran_format3', ['kode_spm' => $idx]);
			redirect(base_url('Lampiran/lamp3'));
		}
	}
}
