<?php
class m_pju extends CI_Model
{
	protected $_table = 'tb_perumahan_rakyat';

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function getData()
	{
		$query = $this->db->get($this->_table);
		// if (count( $query->result() ) > 0) {
		return $query->result();
		// }
	}

	public function getDataTagihan()
	{
		$query = $this->db->get('tb_spm');
		// if (count( $query->result() ) > 0) {
		return $query->result();

		// }
	}

	function save()
	{
		$lalu = masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', dekrip($this->input->post('id_belanja')));
		$sekarang = cleanKarakter($this->input->post('jml_yg_diminta'));
		$total_realisasi = $lalu + $sekarang;

		$kd_spm = getKodeSPM();
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['upload_path']          = './assets/img/tanda_bukti/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = '4050';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data Berhasil Disimpan!</div>');
				$new_image = $this->upload->data('file_name');
				// $this->db->set('tanda_bukti', $new_image);
				$data = [
					'id_belanja'    => dekrip($this->input->post('id_belanja')),
					'no_spm'        => $this->input->post('no_spm'),
					'jenis_spm'     => $this->input->post('jenis_spm'),
					'tgl_spm'       => $this->input->post('tgl_spm'),
					'nilai'         => cleanKarakter($this->input->post('nilai')),
					'jml_angg'      => cleanKarakter($this->input->post('jml_angg')),
					'realisasi'     => $total_realisasi,
					'sisa_angg1'    => cleanKarakter($this->input->post('sisa_angg1')),
					'jml_diminta'   => cleanKarakter($this->input->post('jml_yg_diminta')),
					'sisa_angg2'    => cleanKarakter($this->input->post('sisa_angg2')),
					'id_prog'       => $this->input->post('id_prog'),
					'id_keg'        => $this->input->post('id_keg'),
					'id_subkeg'     => $this->input->post('id_subkeg'),
					'ppn'           => $this->input->post('ppn'),
					'pp21'          => $this->input->post('pph21'),
					'pp22'          => $this->input->post('pph22'),
					'pp23'          => $this->input->post('pph23'),
					'pp25'          => $this->input->post('pph25'),
					'kode_spm'      => $kd_spm,
					'rekanan'       => $this->input->post('rekanan'),
					'pemilik'       => $this->input->post('pemilik'),
					'tanda_bukti'   => $new_image
				];

				if (isset($_SESSION["data_array"])) {
					foreach ($_SESSION["data_array"] as $key => $r) {
						$data2[] = [
							'id_pegawai' 	 => $r['id_pegawai'],
							'id_role_respon' => $r['id_role_respon'],
							'kode_spm' 		 => $kd_spm
						];
					}
					$this->db->insert_batch('daftar_nama_ttd', $data2);
					$this->db->insert('tb_spm', $data);

					$this->db->where('id_belanja', dekrip($this->input->post('id_belanja'))); // Update the user with id = 1
					$this->db->set('total_realisasi', $total_realisasi);
					$this->db->update('tb_belanja');
					$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Tagihan <strong>Berhasil</strong> Diinput</div>');
					return redirect(base_url('Daftar_Tagihan/F1'));
				} else {
					return redirect(base_url('Daftar_Tagihan/F1'));
				}
			}
			return redirect(base_url('Daftar_Tagihan/F1'));
		}
	}

	function saveLampiran()
	{
		$data = [
			'bahan'        => $this->input->post('bahan'),
			'merk'         => $this->input->post('merk'),
			'volume'       => cleanKarakter($this->input->post('volume')),
			'satuan'       => $this->input->post('satuan'),
			'harga_satuan' => cleanKarakter($this->input->post('harga_satuan')),
			'jml_harga'    => cleanKarakter($this->input->post('jml_harga')),
			'ket'          => $this->input->post('ket')
		];
		$this->db->insert('tb_lampiran_format1', $data);
		return redirect(base_url('tagihan/lampiran/1'));
	}

	function updateLampiran()
	{
		$id = $this->input->post('id');
		$data = [
			'bahan'        => $this->input->post('bahan'),
			'merk'         => $this->input->post('merk'),
			'volume'       => cleanKarakter($this->input->post('volume')),
			'satuan'       => $this->input->post('satuan'),
			'harga_satuan' => cleanKarakter($this->input->post('harga_satuan')),
			'jml_harga'    => cleanKarakter($this->input->post('jml_harga')),
			'ket'          => $this->input->post('ket')
		];
		$this->db->where('id', dekrip($id)); // Update the user with id = 1
		$this->db->update('tb_lampiran_format1', $data);
		return redirect(base_url('tagihan/lampiran/1'));
	}
}
