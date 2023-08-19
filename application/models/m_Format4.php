<?php
class m_Format4 extends CI_Model
{
    function save()
    {
        $kode = getKodeSPM();
        $this->db->set('kode', $kode);
        $this->db->insert('tb_kode');

        $data = [
            'id_belanja'        => dekrip($this->input->post('id_belanja')),
            'bendahara'         => $this->input->post('bendahara'),
            'penerima'          => $this->input->post('penerima'),
            'pengguna_angg'     => $this->input->post('pengguna_angg'),
            'ppk_keuangan'      => $this->input->post('ppk_keuangan'),
            'ppk'               => $this->input->post('ppk'),
            'kadis'             => $this->input->post('kadis'),
            'no_spm'            => $this->input->post('no_spm'),
            'no_sppls'          => $this->input->post('no_sppls'),
            'no_kwitansi'       => $this->input->post('no_kwitansi'),
            'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
            'tgl_spm'           => $this->input->post('tgl_spm'),
            'nilai'             => cleanKarakter($this->input->post('nilai')),
            'jml_angg'          => cleanKarakter($this->input->post('jml_angg')),
            'realisasi'         => cleanKarakter($this->input->post('realisasi')),
            'sisa_angg1'        => cleanKarakter($this->input->post('sisa_angg1')),
            'jml_diminta'       => cleanKarakter($this->input->post('jml_diminta')),
            'sisa_angg2'        => cleanKarakter($this->input->post('sisa_angg2')),
            'id_prog'           => $this->input->post('id_prog'),
            'id_keg'            => $this->input->post('id_keg'),
            'id_subkeg'         => $this->input->post('id_subkeg'),
            'ppn'               => $this->input->post('ppn'),
            'pph21'             => $this->input->post('pph21'),
            'pph22'             => $this->input->post('pph22'),
            'pph23'             => $this->input->post('pph23'),
            'pph25'             => $this->input->post('pph25'),
            'kode_spm'          => $kode,
            'status'            => 'PROCESS'
        ];

        if (isset($_SESSION["data_array"])) {
            foreach ($_SESSION["data_array"] as $key => $r) {
                $data2[] = [
                    'nama'      => $r['nama'],
                    'jabatan'   => $r['jabatan'],
                    'nip'       => $r['nip'],
                    'kode_spm'  => $kode
                ];
            }
            $this->db->insert_batch('daftar_nama_ttd', $data2);
            $this->db->insert('tb_format4', $data);
            return redirect(base_url('homekeu'));
        } else {
            return redirect(base_url('homekeu'));
        }
    }
}
