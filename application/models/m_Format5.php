<?php
class m_Format5 extends CI_Model
{
    function save()
    {
        $kode = getKodeSPM();
        $this->db->set('kode', $kode);
        $this->db->insert('tb_kode');

        $data = [
            'no_spm'                => $this->input->post('no_spm'),
            'tanggal_no_spm'        => $this->input->post('tanggal_no_spm'),
            'besaran'               => $this->input->post('besaran'),
            'ppk_keuangan_skpd'     => $this->input->post('ppk_keuangan_skpd'),
            'tahun_anggaran'        => $this->input->post('tahun_anggaran'),
            'jml_uang'              => $this->input->post('jml_uang'),
            'untuk_pembayaran'      => $this->input->post('untuk_pembayaran'),
            'pptk'                  => $this->input->post('pptk'),
            'jenis_tagihan'         => $this->input->post('jenis_tagihan'),
            'rekening_belanja'      => $this->input->post('rekening_belanja'),
            'id_belanja'            => dekrip($this->input->post('id_belanja')),
            'pihak_penyedia'        => $this->input->post('pihak_penyedia'),
            'nama_perusahaan'       => $this->input->post('nama_perusahaan'),
            'pihak_kesatu'          => $this->input->post('pihak_kesatu'),
            'pihak_kedua'           => $this->input->post('pihak_kedua'),
            'pekerjaan'             => $this->input->post('pekerjaan'),
            'npwp'                  => $this->input->post('npwp'),
            'no_rekening'           => $this->input->post('no_rekening'),
            'bank'                  => $this->input->post('bank'),
            'no_kontrak'            => $this->input->post('no_kontrak'),
            'tgl_kontrak'           => $this->input->post('tgl_kontrak'),
            'no_amandemen'          => $this->input->post('no_amandemen'),
            'tgl_amandemen'         => $this->input->post('tgl_amandemen'),
            'nilai_kontrak'         => $this->input->post('nilai_kontrak'),
            'pembayaran'            => $this->input->post('pembayaran'),
            'realisasi_bln_lalu1'   => $this->input->post('realisasi_bln_lalu1'),
            'pot_uang_muka1'        => $this->input->post('pot_uang_muka1'),
            'ppn'                   => $this->input->post('ppn'),
            'pph11'                 => $this->input->post('pph11'),
            'pot40'                 => $this->input->post('pot40'),
            'realisasi_bln_lalu2'   => $this->input->post('realisasi_bln_lalu2'),
            'pot45'                 => $this->input->post('pot45'),
            'jumlah_pembayaran'     => $this->input->post('jumlah_pembayaran'),
            'pph'                   => $this->input->post('pph'),
            'jml_pot_pajak'         => $this->input->post('jml_pot_pajak'),
            'sisa_dana'             => $this->input->post('sisa_dana'),
            'status'                => 'PROCESS',
            'kode_spm'              => $kode,
        ];

        if (isset($_SESSION["data_array"])) {
            foreach ($_SESSION["data_array"] as $key => $r) {
                $data2[] = [
                    'id_pegawai' => $r['id_pegawai'],
                    'kode_spm'  => $kode
                ];
            }
            $this->db->insert_batch('daftar_nama_ttd', $data2);
            $this->db->insert('tb_format5', $data);
            return redirect(base_url('format5'));
        } else {
            return redirect(base_url('format5'));
        }
    }

    function simpanLampiran()
    {
        $data = [
            'uraian'              => $this->input->post('uraian'),
            'nilai_fisik'         => $this->input->post('nilai_fisik'),
            'ppn'                 => $this->input->post('ppn'),
            'jumlah'              => $this->input->post('jumlah'),
            'pptk'                => $this->input->post('pptk'),
            'nama_perusahaan'     => $this->input->post('nama_perusahaan'),
            'direktur_perusahaan' => $this->input->post('direktur_perusahaan'),

        ];
    }

    function tambah_pihak()
    {
        $data = [
            'nm_perusahaan' => $this->input->post('nm_perusahaan'),
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
        ];

        $this->db->insert('tb_pihak_kedua', $data);
        return redirect(base_url('format5/pihak_kedua'));
    }

    function hapus_pihak($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pihak_kedua');
        return redirect(base_url('format5/pihak_kedua'));
    }
}
