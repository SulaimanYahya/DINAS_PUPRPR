-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Agu 2023 pada 18.28
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinas_pupr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `foto` text NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `id_role`, `id_bidang`, `nama`, `alamat`, `no_hp`, `email`, `username`, `password`, `foto`, `date_created`) VALUES
(1, 1, 8, 'Holis Nur', 'Limboto', '085256874123', 'holis@gmail.com', 'admin', '$2y$10$sI77M2IUJVG0PT5cHDurDOP0heBN0G82bU33uURX27N2I.Y/f.JkC', 'abbc88ca7948e082d34f8cd03f34e37e.jpg', 1676297536),
(8, 2, 2, 'Nur Anisa Antula', 'Belum Diisi', 'Belum Disi', 'Belum Disi', 'nur123', '$2y$10$AIwZhq6lHwgpMAB6LhiMTu6DuF4o7t6G/XUBcOkvkOkWGpxoIPV7e', 'abbc88ca7948e082d34f8cd03f34e37e1.jpg', 1684827832);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_kp_belanja` int(11) NOT NULL,
  `nama_aktivitas` text NOT NULL,
  `total_belanja_aktivitas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_belanja`
--

CREATE TABLE `tb_belanja` (
  `id_belanja` int(11) NOT NULL,
  `id_kp_belanja` int(11) NOT NULL,
  `uraian_belanja` text NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `volume` double NOT NULL,
  `harga_satuan` double NOT NULL,
  `total` double NOT NULL,
  `kode_rup` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_belanja`
--

INSERT INTO `tb_belanja` (`id_belanja`, `id_kp_belanja`, `uraian_belanja`, `id_satuan`, `volume`, `harga_satuan`, `total`, `kode_rup`) VALUES
(6, 3, 'contoh uraian', 4, 5, 3000000, 15000000, '12323.23123'),
(7, 3, 'Uraian lagi', 4, 2, 2000000, 4000000, '12323.2312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Cipta Karya'),
(2, 'Bina Marga'),
(3, 'Tata Ruang'),
(5, 'Perumahan dan Permukiman'),
(6, 'Sekertariat'),
(8, 'Tidak Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kegiatan`
--

CREATE TABLE `tb_jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_jenis_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_kegiatan`
--

INSERT INTO `tb_jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`) VALUES
(3, 'Kegiatan Penyelenggaran Jalan Kabupaten / Kota'),
(4, 'Kegiatan Pengembangan dan Pengelolaan Sistem Irigasi Primer dan Sekunder pada Daerah Irigasi yang Luasnya dibawah 1000 Ha dalam 1 (Satu) Daerah\r\nKabupaten/Kota'),
(5, 'Kegiatan Pengelolaan SDA dan Bangunan Pengaman Pantai pada Wilayah Sungai (WS) dalam 1 (Satu) Daerah Kabupaten/Kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_program`
--

CREATE TABLE `tb_jenis_program` (
  `id_jenis_program` int(11) NOT NULL,
  `nama_jenis_program` text NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_program`
--

INSERT INTO `tb_jenis_program` (`id_jenis_program`, `nama_jenis_program`, `id_bidang`) VALUES
(3, 'PROGRAM PENYELENGGARAAN JALAN', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_sasaran`
--

CREATE TABLE `tb_jenis_sasaran` (
  `id_jenis_sasaran` int(11) NOT NULL,
  `nama_jenis_sasaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_sasaran`
--

INSERT INTO `tb_jenis_sasaran` (`id_jenis_sasaran`, `nama_jenis_sasaran`) VALUES
(3, 'Meningkatnya kemantapan infrastruktur kondisi jalan'),
(4, 'Meningkatnya jumlah kualitas daerah irigasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_sub_kegiatan`
--

CREATE TABLE `tb_jenis_sub_kegiatan` (
  `id_jenis_sub_kegiatan` int(11) NOT NULL,
  `nama_jenis_sub_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_sub_kegiatan`
--

INSERT INTO `tb_jenis_sub_kegiatan` (`id_jenis_sub_kegiatan`, `nama_jenis_sub_kegiatan`) VALUES
(3, 'Sub Kegiatan Penyusunan Rencana, Kebijakan, Strategi dan Teknis Sistem Pengembangan Jalan'),
(4, 'Sub Kegiatan Pembangunan Bendung Irigasi'),
(5, 'Sub Kegiatan Pembangunan Bangunan Perkuatan Tebing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_tagihan`
--

CREATE TABLE `tb_jenis_tagihan` (
  `id_jenis_tagihan` int(11) NOT NULL,
  `nama_jenis_tagihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_tagihan`
--

INSERT INTO `tb_jenis_tagihan` (`id_jenis_tagihan`, `nama_jenis_tagihan`) VALUES
(1, 'Tidak Ada'),
(2, 'Belanja Modal'),
(3, 'Belanja Barang & Jasa'),
(5, 'Belanja Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` varchar(50) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `indikator_kinerja_kegiatan` text NOT NULL,
  `satuan_kegiatan` text NOT NULL,
  `id_program` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `id_jenis_kegiatan`, `sasaran_kegiatan`, `indikator_kinerja_kegiatan`, `satuan_kegiatan`, `id_program`) VALUES
('w9y9e4ihiuq030ctj93dq9e2cpusz2', 3, 'Tercapainya panjang Jalan yang dibangun dan ditingkatkan', 'Panjang Jalan yang diselenggarakan', 'KM', 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kp_belanja`
--

CREATE TABLE `tb_kp_belanja` (
  `id_kp_belanja` int(11) NOT NULL,
  `id_rek` int(11) NOT NULL,
  `id_renja_sub` int(11) NOT NULL,
  `total_kp_belanja` double NOT NULL,
  `status_kp_belanja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kp_belanja`
--

INSERT INTO `tb_kp_belanja` (`id_kp_belanja`, `id_rek`, `id_renja_sub`, `total_kp_belanja`, `status_kp_belanja`) VALUES
(1, 4, 1, 0, 'tunggu'),
(2, 4, 2, 40000000, 'tunggu'),
(3, 6, 1, 19000000, 'tunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nota_pesanan`
--

CREATE TABLE `tb_nota_pesanan` (
  `id_nota_pesanan` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merek` text NOT NULL,
  `jml_brg` double NOT NULL,
  `satuan_brg` text NOT NULL,
  `hrg_satuan` double NOT NULL,
  `total_hrg` double NOT NULL,
  `ket_nota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_potongan`
--

CREATE TABLE `tb_potongan` (
  `id_potongan` int(11) NOT NULL,
  `nama_potongan` text NOT NULL,
  `persentase` text NOT NULL,
  `ket_pot` text NOT NULL,
  `kd_pot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_potongan`
--

INSERT INTO `tb_potongan` (`id_potongan`, `nama_potongan`, `persentase`, `ket_pot`, `kd_pot`) VALUES
(1, 'PPN', '11/100', 'PPN 11%', 1),
(2, 'PPN', '11/111', 'PPN 11/111', 0),
(3, 'PPH PSL 21', '5/100', 'PPH 5%', 1),
(4, 'PPH PSL 21', '15/100', 'PPH 15%', 1),
(5, 'PPH PSL 22', '1.5/100', 'PPH PSL 23 1.5%', 1),
(6, 'PPH PSL 4 AYAT 2', '2/100', 'PPH PSL 4 AYAT 2 2%', 1),
(7, 'PPH PSL 4 AYAT 2', '3/100', 'PPH PSL 4 AYAT 2 3%', 1),
(8, 'Potongan Uang Muka', '-', 'Potongan Uang Muka', 2),
(9, 'Potongan Denda', '-', 'Potongan Denda', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pot_tagihan`
--

CREATE TABLE `tb_pot_tagihan` (
  `id_pot_tagihan` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_potongan` int(11) NOT NULL,
  `ket_tambahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_program`
--

CREATE TABLE `tb_program` (
  `id_program` varchar(50) NOT NULL,
  `id_jenis_program` int(11) NOT NULL,
  `sasaran_program` text NOT NULL,
  `indikator_kinerja_program` text NOT NULL,
  `formulasi_indikator_program` text NOT NULL,
  `satuan_program` text NOT NULL,
  `id_sasaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `id_jenis_program`, `sasaran_program`, `indikator_kinerja_program`, `formulasi_indikator_program`, `satuan_program`, `id_sasaran`) VALUES
('dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 3, 'Meningkatnya kualitas jalan', 'Persentase Jalan Dalaam Kondisi Mantap', 'Panjang jalan yang dibangun/panjang jalan kabupaten X 100', 'KM', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rek`
--

CREATE TABLE `tb_rek` (
  `id_rek` int(11) NOT NULL,
  `no_rek` text NOT NULL,
  `nama_rek` text NOT NULL,
  `id_jenis_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rek`
--

INSERT INTO `tb_rek` (`id_rek`, `no_rek`, `nama_rek`, `id_jenis_tagihan`) VALUES
(3, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 3),
(4, '5.1.01.03.07.0002', 'Belanja Honorarium Pengadaan Barang/Jasa', 3),
(5, '5.1.02.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor', 2),
(6, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_renja_kegiatan`
--

CREATE TABLE `tb_renja_kegiatan` (
  `id_renja_kegiatan` int(11) NOT NULL,
  `id_kegiatan` varchar(50) NOT NULL,
  `rk_tahun` text NOT NULL,
  `rk_target_fisik` text NOT NULL,
  `rk_target_anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_renja_kegiatan`
--

INSERT INTO `tb_renja_kegiatan` (`id_renja_kegiatan`, `id_kegiatan`, `rk_tahun`, `rk_target_fisik`, `rk_target_anggaran`) VALUES
(2, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', '2022', '0', 0),
(3, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', '2023', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_renja_program`
--

CREATE TABLE `tb_renja_program` (
  `id_renja_program` int(11) NOT NULL,
  `id_program` varchar(50) NOT NULL,
  `rp_tahun` text NOT NULL,
  `rp_target_fisik` text NOT NULL,
  `rp_target_anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_renja_program`
--

INSERT INTO `tb_renja_program` (`id_renja_program`, `id_program`, `rp_tahun`, `rp_target_fisik`, `rp_target_anggaran`) VALUES
(1, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', '2022', '0', 0),
(2, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', '2023', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_renja_sub`
--

CREATE TABLE `tb_renja_sub` (
  `id_renja_sub` int(11) NOT NULL,
  `id_sub_kegiatan` varchar(50) NOT NULL,
  `rs_tahun` text NOT NULL,
  `rs_target_fisik` text NOT NULL,
  `rs_target_anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_renja_sub`
--

INSERT INTO `tb_renja_sub` (`id_renja_sub`, `id_sub_kegiatan`, `rs_tahun`, `rs_target_fisik`, `rs_target_anggaran`) VALUES
(1, 'hu6iy2hnq4419sf34hbmttsyq30r32', '2022', '0', 0),
(2, 'hu6iy2hnq4419sf34hbmttsyq30r32', '2023', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_respon`
--

CREATE TABLE `tb_respon` (
  `id_respon` int(11) NOT NULL,
  `nama_respon` text NOT NULL,
  `nip` text NOT NULL,
  `id_role_respon` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_respon`
--

INSERT INTO `tb_respon` (`id_respon`, `nama_respon`, `nip`, `id_role_respon`, `id_bidang`) VALUES
(1, 'Holis Nur, S.Kom', '196111051981122006', 1, 2),
(2, 'Afdal Yado, S.Kom', '196111051981124213', 3, 2),
(4, 'Halim Iyou, S.Kom', '110200937005', 3, 2),
(5, 'Abd. Rahim A. Bagu, S.Kom', '110200937006', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Perencanaan'),
(2, 'Keuangan'),
(3, 'Kepegawaian'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role_respon`
--

CREATE TABLE `tb_role_respon` (
  `id_role_respon` int(11) NOT NULL,
  `nama_role` text NOT NULL,
  `singkatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_role_respon`
--

INSERT INTO `tb_role_respon` (`id_role_respon`, `nama_role`, `singkatan`) VALUES
(1, 'Pengguna Anggaran', 'PA'),
(2, 'Kuasa Pengguna Anggaran', 'KPA'),
(3, 'Pejabat Pelaksana Teknis Kegiatan', 'PPTK'),
(4, 'Bendahara Pengeluaran', 'Bendahara Pengeluaran'),
(5, 'Pejabat Penata Usaha Keuangan', 'PPK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sasaran`
--

CREATE TABLE `tb_sasaran` (
  `id_sasaran` varchar(50) NOT NULL,
  `id_jenis_sasaran` int(11) NOT NULL,
  `indikator_kerja` text NOT NULL,
  `formulasi_indikator` text NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sasaran`
--

INSERT INTO `tb_sasaran` (`id_sasaran`, `id_jenis_sasaran`, `indikator_kerja`, `formulasi_indikator`, `satuan`) VALUES
('tx0rfkk3jx84n1ei81efxc1fud1wsa', 4, 'Rasio Luas Daerah Irigasi kewenangan kabupaten', 'Luas irigasi kewenangan kabupaten yang dilayani oleh jaringan irigasi yang dibangun / Luas Cakupan Wilayah Irigasi Kabupaten x 100 %', 'persen'),
('z1gev6dfq9f45wk1nqpg5wx3fd8xke', 3, 'Persentase Panjang Jalan Kabupaten dalam kondisi mantap', 'Panjang jalan dalam kondisi mantap/ total panjang jalan kab x 100', 'persen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
(3, 'Orang/bulan'),
(4, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_kegiatan`
--

CREATE TABLE `tb_sub_kegiatan` (
  `id_sub_kegiatan` varchar(50) NOT NULL,
  `id_jenis_sub_kegiatan` int(11) NOT NULL,
  `sasaran_sub_kegiatan` text NOT NULL,
  `indikator_kinerja_sub_kegiatan` text NOT NULL,
  `satuan_sub_kegiatan` text NOT NULL,
  `id_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sub_kegiatan`
--

INSERT INTO `tb_sub_kegiatan` (`id_sub_kegiatan`, `id_jenis_sub_kegiatan`, `sasaran_sub_kegiatan`, `indikator_kinerja_sub_kegiatan`, `satuan_sub_kegiatan`, `id_kegiatan`) VALUES
('hu6iy2hnq4419sf34hbmttsyq30r32', 3, 'Tercapainya Panjang jalan yang dibangun dan ditingkatkan', 'Panjang jalan yang dibangun', 'M', 'w9y9e4ihiuq030ctj93dq9e2cpusz2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_belanja` int(11) NOT NULL,
  `deskripsi_uraian` text NOT NULL,
  `no_kontrak` text NOT NULL,
  `tanggal_kontrak` text NOT NULL,
  `nama_bendahara` text NOT NULL,
  `nama_pa` text NOT NULL,
  `nama_kpa` text NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `nama_penerima` text NOT NULL,
  `nip_penerima` text NOT NULL,
  `jumlah_tagihan` double NOT NULL,
  `persentase_fisik` double NOT NULL,
  `foto_bukti` text NOT NULL,
  `nilai_fisik` double NOT NULL,
  `satuan_fisik` text NOT NULL,
  `status_approval` text NOT NULL,
  `tanggal_approval` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_target`
--

CREATE TABLE `tb_target` (
  `id_target` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `target` double NOT NULL,
  `status_target` text NOT NULL,
  `id_sasaran` varchar(50) NOT NULL,
  `status_dua` text NOT NULL,
  `status_tiga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_target`
--

INSERT INTO `tb_target` (`id_target`, `tahun`, `target`, `status_target`, `id_sasaran`, `status_dua`, `status_tiga`) VALUES
(6, 2022, 67, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu'),
(7, 2023, 70, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu'),
(8, 2024, 72, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu'),
(9, 2025, 75, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu'),
(10, 2026, 77, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu'),
(11, 2022, 80, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu'),
(12, 2023, 83, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu'),
(13, 2024, 85, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu'),
(14, 2025, 88, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu'),
(15, 2026, 90, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_target_kegiatan`
--

CREATE TABLE `tb_target_kegiatan` (
  `id_target_kegiatan` int(11) NOT NULL,
  `id_kegiatan` varchar(50) NOT NULL,
  `tahun_kegiatan` int(11) NOT NULL,
  `target_anggaran_keg` double NOT NULL,
  `target_fisik_keg` text NOT NULL,
  `status_kegiatan` text NOT NULL,
  `status_dua` text NOT NULL,
  `status_tiga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_target_kegiatan`
--

INSERT INTO `tb_target_kegiatan` (`id_target_kegiatan`, `id_kegiatan`, `tahun_kegiatan`, `target_anggaran_keg`, `target_fisik_keg`, `status_kegiatan`, `status_dua`, `status_tiga`) VALUES
(1, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2022, 13405402437, '226.62', 'renja', 'renwal', 'tunggu'),
(2, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2023, 14075672559, '239.89', 'renja', 'renwal', 'tunggu'),
(3, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2024, 14779456187, '246.75', 'tunggu', 'tunggu', 'tunggu'),
(4, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2025, 15518428996, '257.03', 'tunggu', 'tunggu', 'tunggu'),
(5, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2026, 16294350446, '263.88', 'tunggu', 'tunggu', 'tunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_target_program`
--

CREATE TABLE `tb_target_program` (
  `id_target_program` int(11) NOT NULL,
  `id_program` varchar(50) NOT NULL,
  `tahun_program` int(11) NOT NULL,
  `target_anggaran` double NOT NULL,
  `target_fisik` text NOT NULL,
  `status_program` text NOT NULL,
  `status_dua` text NOT NULL,
  `status_tiga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_target_program`
--

INSERT INTO `tb_target_program` (`id_target_program`, `id_program`, `tahun_program`, `target_anggaran`, `target_fisik`, `status_program`, `status_dua`, `status_tiga`) VALUES
(1, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2022, 13405402437, '226.62', 'renja', 'renwal', 'tunggu'),
(2, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2023, 14075672559, '239.89', 'renja', 'renwal', 'tunggu'),
(3, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2024, 14779456187, '246.75', 'tunggu', 'tunggu', 'tunggu'),
(4, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2025, 15518428996, '257.03', 'tunggu', 'tunggu', 'tunggu'),
(5, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2026, 16294350446, '263.88', 'tunggu', 'tunggu', 'tunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_target_sub`
--

CREATE TABLE `tb_target_sub` (
  `id_target_sub` int(11) NOT NULL,
  `id_sub_kegiatan` varchar(50) NOT NULL,
  `tahun_sub` int(11) NOT NULL,
  `target_anggaran_sub` double NOT NULL,
  `target_fisik_sub` text NOT NULL,
  `status_sub` text NOT NULL,
  `status_dua` text NOT NULL,
  `status_tiga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_target_sub`
--

INSERT INTO `tb_target_sub` (`id_target_sub`, `id_sub_kegiatan`, `tahun_sub`, `target_anggaran_sub`, `target_fisik_sub`, `status_sub`, `status_dua`, `status_tiga`) VALUES
(1, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2022, 0, '2300', 'renja', 'renwal', 'tunggu'),
(2, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2023, 0, '2500', 'renja', 'renwal', 'tunggu'),
(3, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2024, 0, '2700', 'tunggu', 'tunggu', 'tunggu'),
(4, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2025, 0, '3000', 'tunggu', 'tunggu', 'tunggu'),
(5, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2026, 0, '3300', 'tunggu', 'tunggu', 'tunggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `id_rek` (`id_kp_belanja`) USING BTREE;

--
-- Indexes for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD PRIMARY KEY (`id_belanja`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_kp_belanja` (`id_kp_belanja`) USING BTREE;

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`) USING BTREE;

--
-- Indexes for table `tb_jenis_kegiatan`
--
ALTER TABLE `tb_jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis_kegiatan`);

--
-- Indexes for table `tb_jenis_program`
--
ALTER TABLE `tb_jenis_program`
  ADD PRIMARY KEY (`id_jenis_program`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `tb_jenis_sasaran`
--
ALTER TABLE `tb_jenis_sasaran`
  ADD PRIMARY KEY (`id_jenis_sasaran`);

--
-- Indexes for table `tb_jenis_sub_kegiatan`
--
ALTER TABLE `tb_jenis_sub_kegiatan`
  ADD PRIMARY KEY (`id_jenis_sub_kegiatan`);

--
-- Indexes for table `tb_jenis_tagihan`
--
ALTER TABLE `tb_jenis_tagihan`
  ADD PRIMARY KEY (`id_jenis_tagihan`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`);

--
-- Indexes for table `tb_kp_belanja`
--
ALTER TABLE `tb_kp_belanja`
  ADD PRIMARY KEY (`id_kp_belanja`),
  ADD KEY `id_rek` (`id_rek`),
  ADD KEY `id_renja_sub` (`id_renja_sub`);

--
-- Indexes for table `tb_nota_pesanan`
--
ALTER TABLE `tb_nota_pesanan`
  ADD PRIMARY KEY (`id_nota_pesanan`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indexes for table `tb_potongan`
--
ALTER TABLE `tb_potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indexes for table `tb_pot_tagihan`
--
ALTER TABLE `tb_pot_tagihan`
  ADD PRIMARY KEY (`id_pot_tagihan`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_potongan` (`id_potongan`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `id_sasaran` (`id_sasaran`),
  ADD KEY `id_jenis_program` (`id_jenis_program`);

--
-- Indexes for table `tb_rek`
--
ALTER TABLE `tb_rek`
  ADD PRIMARY KEY (`id_rek`),
  ADD KEY `id_jenis_tagihan` (`id_jenis_tagihan`);

--
-- Indexes for table `tb_renja_kegiatan`
--
ALTER TABLE `tb_renja_kegiatan`
  ADD PRIMARY KEY (`id_renja_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `tb_renja_program`
--
ALTER TABLE `tb_renja_program`
  ADD PRIMARY KEY (`id_renja_program`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `tb_renja_sub`
--
ALTER TABLE `tb_renja_sub`
  ADD PRIMARY KEY (`id_renja_sub`),
  ADD KEY `id_sub_kegiatan` (`id_sub_kegiatan`);

--
-- Indexes for table `tb_respon`
--
ALTER TABLE `tb_respon`
  ADD PRIMARY KEY (`id_respon`),
  ADD KEY `id_role_respon` (`id_role_respon`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_role_respon`
--
ALTER TABLE `tb_role_respon`
  ADD PRIMARY KEY (`id_role_respon`);

--
-- Indexes for table `tb_sasaran`
--
ALTER TABLE `tb_sasaran`
  ADD PRIMARY KEY (`id_sasaran`),
  ADD KEY `id_jenis_sasaran` (`id_jenis_sasaran`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_sub_kegiatan`
--
ALTER TABLE `tb_sub_kegiatan`
  ADD PRIMARY KEY (`id_sub_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_jenis_sub_kegiatan` (`id_jenis_sub_kegiatan`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_belanja` (`id_belanja`);

--
-- Indexes for table `tb_target`
--
ALTER TABLE `tb_target`
  ADD PRIMARY KEY (`id_target`),
  ADD KEY `id_sasaran` (`id_sasaran`);

--
-- Indexes for table `tb_target_kegiatan`
--
ALTER TABLE `tb_target_kegiatan`
  ADD PRIMARY KEY (`id_target_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `tb_target_program`
--
ALTER TABLE `tb_target_program`
  ADD PRIMARY KEY (`id_target_program`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `tb_target_sub`
--
ALTER TABLE `tb_target_sub`
  ADD PRIMARY KEY (`id_target_sub`),
  ADD KEY `id_sub_kegiatan` (`id_sub_kegiatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jenis_kegiatan`
--
ALTER TABLE `tb_jenis_kegiatan`
  MODIFY `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenis_program`
--
ALTER TABLE `tb_jenis_program`
  MODIFY `id_jenis_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis_sasaran`
--
ALTER TABLE `tb_jenis_sasaran`
  MODIFY `id_jenis_sasaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis_sub_kegiatan`
--
ALTER TABLE `tb_jenis_sub_kegiatan`
  MODIFY `id_jenis_sub_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenis_tagihan`
--
ALTER TABLE `tb_jenis_tagihan`
  MODIFY `id_jenis_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kp_belanja`
--
ALTER TABLE `tb_kp_belanja`
  MODIFY `id_kp_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_nota_pesanan`
--
ALTER TABLE `tb_nota_pesanan`
  MODIFY `id_nota_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_potongan`
--
ALTER TABLE `tb_potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pot_tagihan`
--
ALTER TABLE `tb_pot_tagihan`
  MODIFY `id_pot_tagihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rek`
--
ALTER TABLE `tb_rek`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_renja_kegiatan`
--
ALTER TABLE `tb_renja_kegiatan`
  MODIFY `id_renja_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_renja_program`
--
ALTER TABLE `tb_renja_program`
  MODIFY `id_renja_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_renja_sub`
--
ALTER TABLE `tb_renja_sub`
  MODIFY `id_renja_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_respon`
--
ALTER TABLE `tb_respon`
  MODIFY `id_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_role_respon`
--
ALTER TABLE `tb_role_respon`
  MODIFY `id_role_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_target`
--
ALTER TABLE `tb_target`
  MODIFY `id_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_target_kegiatan`
--
ALTER TABLE `tb_target_kegiatan`
  MODIFY `id_target_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_target_program`
--
ALTER TABLE `tb_target_program`
  MODIFY `id_target_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_target_sub`
--
ALTER TABLE `tb_target_sub`
  MODIFY `id_target_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_admin_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD CONSTRAINT `tb_belanja_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_belanja_ibfk_4` FOREIGN KEY (`id_kp_belanja`) REFERENCES `tb_kp_belanja` (`id_kp_belanja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jenis_program`
--
ALTER TABLE `tb_jenis_program`
  ADD CONSTRAINT `tb_jenis_program_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD CONSTRAINT `tb_kegiatan_ibfk_2` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `tb_jenis_kegiatan` (`id_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kegiatan_ibfk_3` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kp_belanja`
--
ALTER TABLE `tb_kp_belanja`
  ADD CONSTRAINT `tb_kp_belanja_ibfk_1` FOREIGN KEY (`id_rek`) REFERENCES `tb_rek` (`id_rek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kp_belanja_ibfk_2` FOREIGN KEY (`id_renja_sub`) REFERENCES `tb_renja_sub` (`id_renja_sub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nota_pesanan`
--
ALTER TABLE `tb_nota_pesanan`
  ADD CONSTRAINT `tb_nota_pesanan_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pot_tagihan`
--
ALTER TABLE `tb_pot_tagihan`
  ADD CONSTRAINT `tb_pot_tagihan_ibfk_1` FOREIGN KEY (`id_potongan`) REFERENCES `tb_potongan` (`id_potongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pot_tagihan_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_program`
--
ALTER TABLE `tb_program`
  ADD CONSTRAINT `tb_program_ibfk_2` FOREIGN KEY (`id_jenis_program`) REFERENCES `tb_jenis_program` (`id_jenis_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rek`
--
ALTER TABLE `tb_rek`
  ADD CONSTRAINT `tb_rek_ibfk_1` FOREIGN KEY (`id_jenis_tagihan`) REFERENCES `tb_jenis_tagihan` (`id_jenis_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_renja_kegiatan`
--
ALTER TABLE `tb_renja_kegiatan`
  ADD CONSTRAINT `tb_renja_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_renja_program`
--
ALTER TABLE `tb_renja_program`
  ADD CONSTRAINT `tb_renja_program_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_renja_sub`
--
ALTER TABLE `tb_renja_sub`
  ADD CONSTRAINT `tb_renja_sub_ibfk_1` FOREIGN KEY (`id_sub_kegiatan`) REFERENCES `tb_sub_kegiatan` (`id_sub_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_respon`
--
ALTER TABLE `tb_respon`
  ADD CONSTRAINT `tb_respon_ibfk_1` FOREIGN KEY (`id_role_respon`) REFERENCES `tb_role_respon` (`id_role_respon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_respon_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sasaran`
--
ALTER TABLE `tb_sasaran`
  ADD CONSTRAINT `tb_sasaran_ibfk_1` FOREIGN KEY (`id_jenis_sasaran`) REFERENCES `tb_jenis_sasaran` (`id_jenis_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sub_kegiatan`
--
ALTER TABLE `tb_sub_kegiatan`
  ADD CONSTRAINT `tb_sub_kegiatan_ibfk_2` FOREIGN KEY (`id_jenis_sub_kegiatan`) REFERENCES `tb_jenis_sub_kegiatan` (`id_jenis_sub_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sub_kegiatan_ibfk_3` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_belanja`) REFERENCES `tb_belanja` (`id_belanja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_target`
--
ALTER TABLE `tb_target`
  ADD CONSTRAINT `tb_target_ibfk_1` FOREIGN KEY (`id_sasaran`) REFERENCES `tb_sasaran` (`id_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_target_kegiatan`
--
ALTER TABLE `tb_target_kegiatan`
  ADD CONSTRAINT `tb_target_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_target_program`
--
ALTER TABLE `tb_target_program`
  ADD CONSTRAINT `tb_target_program_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_target_sub`
--
ALTER TABLE `tb_target_sub`
  ADD CONSTRAINT `tb_target_sub_ibfk_1` FOREIGN KEY (`id_sub_kegiatan`) REFERENCES `tb_sub_kegiatan` (`id_sub_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
