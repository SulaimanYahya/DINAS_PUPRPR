-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Agu 2023 pada 15.13
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_nama_ttd`
--

CREATE TABLE `daftar_nama_ttd` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_role_respon` varchar(255) DEFAULT NULL,
  `kode_spm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `daftar_nama_ttd`
--

INSERT INTO `daftar_nama_ttd` (`id`, `id_pegawai`, `id_role_respon`, `kode_spm`) VALUES
(1, 1, '1', 'iYKCZWZlZmpna2JlbGRoZWZp'),
(2, 3, '3', 'iYKCZWZlZmpna2JlbGRoZWZp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_desa`
--

CREATE TABLE `dt_desa` (
  `id` int(11) NOT NULL,
  `kd_desa` varchar(512) DEFAULT NULL,
  `kd_kecamatan` varchar(512) DEFAULT NULL,
  `desa` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `dt_desa`
--

INSERT INTO `dt_desa` (`id`, `kd_desa`, `kd_kecamatan`, `desa`) VALUES
(1, '75.03.01.2004', '75.03.01', 'TALUMOPATU'),
(2, '75.03.01.2005', '75.03.01', 'TALULOBUTU'),
(3, '75.03.01.2006', '75.03.01', 'DUNGGALA'),
(4, '75.03.01.2007', '75.03.01', 'LANGGE'),
(5, '75.03.01.2027', '75.03.01', 'TALULOBUTU SELATAN'),
(6, '75.03.01.2028', '75.03.01', 'KERAMAT'),
(7, '75.03.01.2029', '75.03.01', 'MERANTI'),
(8, '75.03.02.1008', '75.03.02', 'PADENGO'),
(9, '75.03.02.1009', '75.03.02', 'OLOHUTA'),
(10, '75.03.02.1010', '75.03.02', 'TUMBIHE'),
(11, '75.03.02.1011', '75.03.02', 'PAUWO'),
(12, '75.03.02.1028', '75.03.02', 'OLOHUTA UTARA'),
(13, '75.03.02.2006', '75.03.02', 'DUTOHE'),
(14, '75.03.02.2007', '75.03.02', 'TANGGILINGO'),
(15, '75.03.02.2012', '75.03.02', 'TOTO SELATAN'),
(16, '75.03.02.2013', '75.03.02', 'POOWO'),
(17, '75.03.02.2024', '75.03.02', 'TALANGO'),
(18, '75.03.02.2026', '75.03.02', 'POOWO BARAT'),
(19, '75.03.02.2029', '75.03.02', 'DUTOHE BARAT'),
(20, '75.03.03.2011', '75.03.03', 'TINGKOHUBU'),
(21, '75.03.03.2012', '75.03.03', 'BOLUDAWA'),
(22, '75.03.03.2013', '75.03.03', 'BUBE'),
(23, '75.03.03.2014', '75.03.03', 'HULUDUOTAMO'),
(24, '75.03.03.2020', '75.03.03', 'ULANTA'),
(25, '75.03.03.2021', '75.03.03', 'TINELO'),
(26, '75.03.03.2022', '75.03.03', 'BUBEYA'),
(27, '75.03.03.2023', '75.03.03', 'BUBE BARU'),
(28, '75.03.03.2027', '75.03.03', 'TINGKOHUBU TIMUR'),
(29, '75.03.03.2028', '75.03.03', 'HELUMO'),
(30, '75.03.04.2003', '75.03.04', 'BILUNGALA'),
(31, '75.03.04.2004', '75.03.04', 'BILUNGALA'),
(32, '75.03.04.2005', '75.03.04', 'UABANGA'),
(33, '75.03.04.2008', '75.03.04', 'TOLOTIO'),
(34, '75.03.04.2012', '75.03.04', 'TONGO'),
(35, '75.03.04.2025', '75.03.04', 'BILUNGALA UTARA'),
(36, '75.03.04.2026', '75.03.04', 'TIHU'),
(37, '75.03.04.2027', '75.03.04', 'TUNAS JAYA'),
(38, '75.03.04.2028', '75.03.04', 'LEMBAH HIJAU'),
(39, '75.03.04.2029', '75.03.04', 'BATU HIJAU'),
(40, '75.03.04.2031', '75.03.04', 'OMBULO HIJAU'),
(41, '75.03.04.2032', '75.03.04', 'KEMIRI'),
(42, '75.03.04.2033', '75.03.04', 'PELITA HIJAU'),
(43, '75.03.05.2001', '75.03.05', 'BOIDU'),
(44, '75.03.05.2002', '75.03.05', 'BANDUNGAN'),
(45, '75.03.05.2003', '75.03.05', 'TUPA'),
(46, '75.03.05.2004', '75.03.05', 'LONGALO'),
(47, '75.03.05.2009', '75.03.05', 'TULOA'),
(48, '75.03.05.2010', '75.03.05', 'KOPI'),
(49, '75.03.05.2011', '75.03.05', 'LOMAYA'),
(50, '75.03.05.2012', '75.03.05', 'SUKA DAMAI'),
(51, '75.03.05.2015', '75.03.05', 'BUNUO'),
(52, '75.03.06.2001', '75.03.06', 'BONGOIME'),
(53, '75.03.06.2002', '75.03.06', 'BONGOPINI'),
(54, '75.03.06.2003', '75.03.06', 'TOTO UTARA'),
(55, '75.03.06.2004', '75.03.06', 'MOUTONG'),
(56, '75.03.06.2005', '75.03.06', 'TUNGGULO'),
(57, '75.03.06.2006', '75.03.06', 'LONUO'),
(58, '75.03.06.2007', '75.03.06', 'TAMBOO'),
(59, '75.03.06.2008', '75.03.06', 'ILOHELUMA'),
(60, '75.03.06.2009', '75.03.06', 'MOTILANGO'),
(61, '75.03.06.2010', '75.03.06', 'BUTU'),
(62, '75.03.06.2011', '75.03.06', 'PERMATA'),
(63, '75.03.06.2012', '75.03.06', 'TUNGGULO SELATAN'),
(64, '75.03.06.2013', '75.03.06', 'BONGOHULAWA'),
(65, '75.03.06.2014', '75.03.06', 'BERLIAN'),
(66, '75.03.07.2001', '75.03.07', 'TIMBUOLO'),
(67, '75.03.07.2002', '75.03.07', 'PANGGULO'),
(68, '75.03.07.2003', '75.03.07', 'LUWOHU'),
(69, '75.03.07.2004', '75.03.07', 'BUATA'),
(70, '75.03.07.2005', '75.03.07', 'TIMBUOLO TIMUR'),
(71, '75.03.07.2006', '75.03.07', 'TANAH PUTIH'),
(72, '75.03.07.2007', '75.03.07', 'PANGGULO BARAT'),
(73, '75.03.07.2008', '75.03.07', 'TIMBUOLO TENGAH'),
(74, '75.03.07.2009', '75.03.07', 'SUKMA'),
(75, '75.03.08.2001', '75.03.08', 'HUANGOBOTU'),
(76, '75.03.08.2002', '75.03.08', 'MOLUTABU'),
(77, '75.03.08.2003', '75.03.08', 'OLUHUTA'),
(78, '75.03.08.2004', '75.03.08', 'OLELE'),
(79, '75.03.08.2005', '75.03.08', 'BOTUTONUO'),
(80, '75.03.08.2006', '75.03.08', 'MODELOMO'),
(81, '75.03.08.2007', '75.03.08', 'BILUANGO'),
(82, '75.03.08.2008', '75.03.08', 'BOTUBARANI'),
(83, '75.03.08.2009', '75.03.08', 'BINTALAHE'),
(84, '75.03.09.2001', '75.03.09', 'TALUDAA'),
(85, '75.03.09.2002', '75.03.09', 'SOGITIA'),
(86, '75.03.09.2003', '75.03.09', 'MOODULIO'),
(87, '75.03.09.2004', '75.03.09', 'BILONLANTUNGA'),
(88, '75.03.09.2005', '75.03.09', 'INOGALUMA'),
(89, '75.03.09.2006', '75.03.09', 'MONANO'),
(90, '75.03.09.2007', '75.03.09', 'TUMBUH MEKAR'),
(91, '75.03.09.2008', '75.03.09', 'MOLAMAHU'),
(92, '75.03.09.2009', '75.03.09', 'MASIAGA'),
(93, '75.03.09.2010', '75.03.09', 'ILOHUUWA'),
(94, '75.03.09.2011', '75.03.09', 'MUARA BONE'),
(95, '75.03.09.2012', '75.03.09', 'CENDANA PUTIH'),
(96, '75.03.09.2013', '75.03.09', 'WALUHU'),
(97, '75.03.09.2014', '75.03.09', 'PERMATA'),
(98, '75.03.10.2001', '75.03.10', 'INOMATA'),
(99, '75.03.10.2003', '75.03.10', 'TUMBULILATO'),
(100, '75.03.10.2004', '75.03.10', 'MOOTAYU'),
(101, '75.03.10.2006', '75.03.10', 'MOOTINELO'),
(102, '75.03.10.2009', '75.03.10', 'PELITA JAYA'),
(103, '75.03.10.2010', '75.03.10', 'MOOPIYA'),
(104, '75.03.10.2011', '75.03.10', 'ALO'),
(105, '75.03.10.2012', '75.03.10', 'LAUT BIRU'),
(106, '75.03.10.2014', '75.03.10', 'BUNGA'),
(107, '75.03.10.2015', '75.03.10', 'MOOTAWA'),
(108, '75.03.11.2001', '75.03.11', 'TULABOLO'),
(109, '75.03.11.2003', '75.03.11', 'DUMBAYA BULAN'),
(110, '75.03.11.2004', '75.03.11', 'TULABOLO TIMUR'),
(111, '75.03.11.2005', '75.03.11', 'TILANGOBULA'),
(112, '75.03.11.2007', '75.03.11', 'PODUWOMA'),
(113, '75.03.11.2008', '75.03.11', 'PANGGULO'),
(114, '75.03.11.2009', '75.03.11', 'TULABOLO BARAT'),
(115, '75.03.11.2010', '75.03.11', 'PANGI'),
(116, '75.03.11.2011', '75.03.11', 'TINEMBA'),
(117, '75.03.12.2001', '75.03.12', 'BULONTALA'),
(118, '75.03.12.2002', '75.03.12', 'LIBUNGO'),
(119, '75.03.12.2003', '75.03.12', 'MOLINTOGUPO'),
(120, '75.03.12.2004', '75.03.12', 'BONEDAA'),
(121, '75.03.12.2005', '75.03.12', 'BONDAWUNA'),
(122, '75.03.12.2006', '75.03.12', 'BULONTALA TIMUR'),
(123, '75.03.12.2007', '75.03.12', 'PANCURAN'),
(124, '75.03.12.2008', '75.03.12', 'BONDARAYA'),
(125, '75.03.13.2001', '75.03.13', 'LOMPOTOO'),
(126, '75.03.13.2002', '75.03.13', 'LOMBONGO'),
(127, '75.03.13.2003', '75.03.13', 'DUANO'),
(128, '75.03.13.2004', '75.03.13', 'TOLOMATO'),
(129, '75.03.13.2005', '75.03.13', 'ALALE'),
(130, '75.03.13.2006', '75.03.13', 'TAPADAA'),
(131, '75.03.14.2001', '75.03.14', 'MONGIILO'),
(132, '75.03.14.2002', '75.03.14', 'OWATA'),
(133, '75.03.14.2003', '75.03.14', 'MONGIILO UTARA'),
(134, '75.03.14.2004', '75.03.14', 'PILOLAHEYA'),
(135, '75.03.14.2005', '75.03.14', 'ILOMATA'),
(136, '75.03.14.2006', '75.03.14', 'SUKA MAKMUR'),
(137, '75.03.15.2001', '75.03.15', 'AYULA SELATAN'),
(138, '75.03.15.2002', '75.03.15', 'HUNTU UTARA'),
(139, '75.03.15.2003', '75.03.15', 'AYULA UTARA'),
(140, '75.03.15.2004', '75.03.15', 'HUNTU SELATAN'),
(141, '75.03.15.2006', '75.03.15', 'AYULA TILANGO'),
(142, '75.03.15.2007', '75.03.15', 'AYULA TIMUR'),
(143, '75.03.15.2008', '75.03.15', 'LAMAHU'),
(144, '75.03.15.2009', '75.03.15', 'TINELO AYULA'),
(145, '75.03.15.2010', '75.03.15', 'SEJAHTERA'),
(146, '75.03.15.2011', '75.03.15', 'HUNTU BARAT'),
(147, '75.03.16.2001', '75.03.16', 'BULOTALANGI'),
(148, '75.03.16.2002', '75.03.16', 'TOLUWAYA'),
(149, '75.03.16.2003', '75.03.16', 'POPODU'),
(150, '75.03.16.2004', '75.03.16', 'BULOTALANGI TIMUR'),
(151, '75.03.16.2005', '75.03.16', 'BULOTALANGI BARAT'),
(152, '75.03.17.2001', '75.03.17', 'MAMUNGAA'),
(153, '75.03.17.2002', '75.03.17', 'KAIDUNDU BARAT'),
(154, '75.03.17.2003', '75.03.17', 'MOPUYA'),
(155, '75.03.17.2004', '75.03.17', 'KAIDUNDU'),
(156, '75.03.17.2005', '75.03.17', 'BUKIT HIJAU'),
(157, '75.03.17.2006', '75.03.17', 'MAMUNGAA TIMUR'),
(158, '75.03.17.2007', '75.03.17', 'DUNGGILATA'),
(159, '75.03.17.2008', '75.03.17', 'PINOMOTIGA'),
(160, '75.03.17.2009', '75.03.17', 'PATOA'),
(161, '75.03.18.2001', '75.03.18', 'PINOGU'),
(162, '75.03.18.2002', '75.03.18', 'BANGIO'),
(163, '75.03.18.2003', '75.03.18', 'DATARAN HIJAU'),
(164, '75.03.18.2004', '75.03.18', 'PINOGU PERMAI'),
(165, '75.03.18.2005', '75.03.18', 'TILONGGIBILA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_kecamatan`
--

CREATE TABLE `dt_kecamatan` (
  `kd_kecamatan` varchar(512) NOT NULL,
  `kecamatan` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `dt_kecamatan`
--

INSERT INTO `dt_kecamatan` (`kd_kecamatan`, `kecamatan`) VALUES
('75.03.01', 'TAPA'),
('75.03.02', 'KABILA'),
('75.03.03', 'SUWAWA'),
('75.03.04', 'BONE PANTAI'),
('75.03.05', 'BULANGO UTARA'),
('75.03.06', 'TILONGKABILA'),
('75.03.07', 'BOTUPINGGE'),
('75.03.08', 'KABILA BONE'),
('75.03.09', 'BONE'),
('75.03.10', 'BONE RAYA'),
('75.03.11', 'SUWAWA TIMUR'),
('75.03.12', 'SUWAWA SELATAN'),
('75.03.13', 'SUWAWA TENGAH'),
('75.03.14', 'BULANGO ULU'),
('75.03.15', 'BULANGO SELATAN'),
('75.03.16', 'BULANGO TIMUR'),
('75.03.17', 'BULAWA'),
('75.03.18', 'PINOGU');

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
  `nip` int(11) DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `id_role`, `id_bidang`, `nama`, `alamat`, `no_hp`, `email`, `username`, `password`, `foto`, `nip`, `date_created`) VALUES
(1, 1, 8, 'Holis Nur', 'Limboto', '085256874123', 'holis@gmail.com', 'admin', '$2y$10$sI77M2IUJVG0PT5cHDurDOP0heBN0G82bU33uURX27N2I.Y/f.JkC', 'abbc88ca7948e082d34f8cd03f34e37e.jpg', 12345678, 1676297536),
(8, 2, 2, 'Nur Anisa Antula', 'Belum Diisi', 'Belum Disi', 'Belum Disi', 'nur123', '$2y$10$AIwZhq6lHwgpMAB6LhiMTu6DuF4o7t6G/XUBcOkvkOkWGpxoIPV7e', 'Fiqah.jpg', 12345678, 1691834508);

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
  `total_realisasi` double DEFAULT NULL,
  `kode_rup` text NOT NULL,
  `id_rek` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_belanja`
--

INSERT INTO `tb_belanja` (`id_belanja`, `id_kp_belanja`, `uraian_belanja`, `id_satuan`, `volume`, `harga_satuan`, `total`, `total_realisasi`, `kode_rup`, `id_rek`) VALUES
(6, 1, 'BAYAR BELANJA TAGIHAN REKENING LISTRIK PRA BAYAR S.B OKTOBER TAHUN 2022 PADA DINAS PU, PENATAAN RUANG DAN PERUMAHAN RAKYAT MEL. KEG. URUSAN PENYELENGGARAAN PSU PERUMAHAN TA. 2022 (PAD)', 4, 1, 84165400, 84165400, 2000000, '12323.23123', '4'),
(7, 1, 'Uraian lagi', 4, 2, 2000000, 20, 20, '12323.2312', '7'),
(8, 2, 'URAIAN 1', 4, 2, 740000, 1621500000, 0, '12323.2312', '7'),
(9, 2, 'URAIAN 2', 4, 2, 740000, 60, NULL, '12323.2312', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Struktur dari tabel `tb_format3`
--

CREATE TABLE `tb_format3` (
  `id` int(11) NOT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `bendahara` int(11) DEFAULT NULL,
  `penerima` int(11) DEFAULT NULL,
  `pengguna_angg` int(11) DEFAULT NULL,
  `ppk` int(11) DEFAULT NULL,
  `pptk` int(11) DEFAULT NULL,
  `no_sppls` varchar(225) DEFAULT NULL,
  `no_spm` varchar(255) DEFAULT NULL,
  `jenis_spm` varchar(2) DEFAULT NULL,
  `tgl_spm` date DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jml_angg` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL,
  `sisa_angg1` int(11) DEFAULT NULL,
  `jml_diminta` int(11) DEFAULT NULL,
  `sisa_angg2` int(11) DEFAULT NULL,
  `id_prog` int(11) DEFAULT NULL,
  `id_keg` int(11) DEFAULT NULL,
  `id_subkeg` int(11) DEFAULT NULL,
  `ppn` varchar(11) DEFAULT NULL,
  `pph21` varchar(11) DEFAULT NULL,
  `pph22` varchar(11) DEFAULT NULL,
  `pph23` varchar(11) DEFAULT NULL,
  `pph25` varchar(11) DEFAULT NULL,
  `kode_spm` varchar(255) DEFAULT NULL,
  `status` enum('PROCESS','DONE') DEFAULT 'PROCESS'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_format3`
--

INSERT INTO `tb_format3` (`id`, `id_belanja`, `bendahara`, `penerima`, `pengguna_angg`, `ppk`, `pptk`, `no_sppls`, `no_spm`, `jenis_spm`, `tgl_spm`, `nilai`, `jml_angg`, `realisasi`, `sisa_angg1`, `jml_diminta`, `sisa_angg2`, `id_prog`, `id_keg`, `id_subkeg`, `ppn`, `pph21`, `pph22`, `pph23`, `pph25`, `kode_spm`, `status`) VALUES
(33, 8, NULL, 2, 3, 4, 5, '', '02/SPM-LS-DPUPRPR/VII/2023', NULL, '2023-08-05', 10000000, 2000000, 200000, 1800000, 1000000, 800000, 3, 5, 5, '0', '0', '0', '0', '0', 'iYKCZWRqZmpna2Fm', 'PROCESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_format4`
--

CREATE TABLE `tb_format4` (
  `id` int(11) NOT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `bendahara` int(11) DEFAULT NULL,
  `penerima` int(11) DEFAULT NULL,
  `pengguna_angg` int(11) DEFAULT NULL,
  `ppk_keuangan` int(11) DEFAULT NULL,
  `ppk` int(11) DEFAULT NULL,
  `no_spm` varchar(255) DEFAULT NULL,
  `kadis` int(11) DEFAULT NULL,
  `no_sppls` varchar(225) DEFAULT NULL,
  `no_kwitansi` varchar(225) DEFAULT NULL,
  `jenis_pembayaran` varchar(2) DEFAULT NULL,
  `tgl_spm` date DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jml_angg` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL,
  `sisa_angg1` int(11) DEFAULT NULL,
  `jml_diminta` int(11) DEFAULT NULL,
  `sisa_angg2` int(11) DEFAULT NULL,
  `id_prog` int(11) DEFAULT NULL,
  `id_keg` int(11) DEFAULT NULL,
  `id_subkeg` int(11) DEFAULT NULL,
  `ppn` varchar(11) DEFAULT NULL,
  `pph21` varchar(11) DEFAULT NULL,
  `pph22` varchar(11) DEFAULT NULL,
  `pph23` varchar(11) DEFAULT NULL,
  `pph25` varchar(11) DEFAULT NULL,
  `kode_spm` varchar(255) DEFAULT NULL,
  `status` enum('PROCESS','DONE') DEFAULT 'PROCESS'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_format4`
--

INSERT INTO `tb_format4` (`id`, `id_belanja`, `bendahara`, `penerima`, `pengguna_angg`, `ppk_keuangan`, `ppk`, `no_spm`, `kadis`, `no_sppls`, `no_kwitansi`, `jenis_pembayaran`, `tgl_spm`, `nilai`, `jml_angg`, `realisasi`, `sisa_angg1`, `jml_diminta`, `sisa_angg2`, `id_prog`, `id_keg`, `id_subkeg`, `ppn`, `pph21`, `pph22`, `pph23`, `pph25`, `kode_spm`, `status`) VALUES
(34, 8, 1, 2, 3, 4, 5, '097/.SPM/DPUPRPR-BB/2023', 6, '100/PUPR/2023', '100/DPUPR.PR-BB/2023', 'LS', '2023-08-06', 10000000, 2000000, 500000, 1500000, 200000, 1300000, 3, 4, 4, '0', '0', '0', '0', '0', 'iYKCZWRrZmpna2Jqa2ZlZWU=', 'PROCESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_format5`
--

CREATE TABLE `tb_format5` (
  `id` int(11) NOT NULL,
  `no_spm` varchar(225) DEFAULT NULL,
  `tanggal_no_spm` date DEFAULT NULL,
  `besaran` varchar(225) DEFAULT NULL,
  `ppk_keuangan_skpd` varchar(225) DEFAULT NULL,
  `tahun_anggaran` varchar(225) DEFAULT NULL,
  `jml_uang` varchar(225) NOT NULL,
  `untuk_pembayaran` varchar(255) DEFAULT NULL,
  `pptk` varchar(225) DEFAULT NULL,
  `jenis_tagihan` varchar(225) DEFAULT NULL,
  `rekening_belanja` varchar(225) DEFAULT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `pihak_penyedia` varchar(225) DEFAULT NULL,
  `nama_perusahaan` varchar(225) DEFAULT NULL,
  `pihak_kesatu` varchar(225) DEFAULT NULL,
  `pihak_kedua` varchar(225) DEFAULT NULL,
  `pekerjaan` varchar(225) DEFAULT NULL,
  `npwp` varchar(225) DEFAULT NULL,
  `no_rekening` varchar(225) DEFAULT NULL,
  `bank` varchar(225) DEFAULT NULL,
  `no_kontrak` varchar(225) DEFAULT NULL,
  `tgl_kontrak` date DEFAULT NULL,
  `no_amandemen` varchar(225) DEFAULT NULL,
  `tgl_amandemen` date DEFAULT NULL,
  `nilai_kontrak` varchar(225) DEFAULT NULL,
  `pembayaran` varchar(225) DEFAULT NULL,
  `realisasi_bln_lalu1` varchar(225) DEFAULT NULL,
  `pot_uang_muka1` varchar(255) DEFAULT NULL,
  `ppn` varchar(225) DEFAULT 'PROCESS',
  `pph11` varchar(255) DEFAULT NULL,
  `pot40` varchar(255) DEFAULT NULL,
  `realisasi_bln_lalu2` varchar(255) DEFAULT NULL,
  `pot45` varchar(255) DEFAULT NULL,
  `jumlah_pembayaran` varchar(255) DEFAULT NULL,
  `pph` varchar(255) DEFAULT NULL,
  `jml_pot_pajak` varchar(255) DEFAULT NULL,
  `sisa_dana` varchar(255) DEFAULT NULL,
  `status` enum('PROCESS','DONE') DEFAULT 'PROCESS',
  `kode_spm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_format5`
--

INSERT INTO `tb_format5` (`id`, `no_spm`, `tanggal_no_spm`, `besaran`, `ppk_keuangan_skpd`, `tahun_anggaran`, `jml_uang`, `untuk_pembayaran`, `pptk`, `jenis_tagihan`, `rekening_belanja`, `id_belanja`, `pihak_penyedia`, `nama_perusahaan`, `pihak_kesatu`, `pihak_kedua`, `pekerjaan`, `npwp`, `no_rekening`, `bank`, `no_kontrak`, `tgl_kontrak`, `no_amandemen`, `tgl_amandemen`, `nilai_kontrak`, `pembayaran`, `realisasi_bln_lalu1`, `pot_uang_muka1`, `ppn`, `pph11`, `pot40`, `realisasi_bln_lalu2`, `pot45`, `jumlah_pembayaran`, `pph`, `jml_pot_pajak`, `sisa_dana`, `status`, `kode_spm`) VALUES
(35, 'NOMOR SPM', '2023-08-09', '10000000', '1', '2023', '20000000', 'UNTUK PEMBAYARAN', 'PPTK', '5', '7', 8, 'Pihak Penyedia', 'Nama Perusahaan', '1', '1', 'PEKERJAAN', 'NPWP', '123121231', 'BNI', 'NOMOR KONTRAK', '2023-08-09', 'NOMOR AMANDEMEN', '2023-08-09', '3.099.148.533', '3.099.148.533', '0', '929.744.566', '81.387.549', '739.886.810', '1.239.659.413', NULL, '418.385.054', '821.274.359', '14.797.736', '96.185.285', '725.089.074', 'PROCESS', 'iYKCZWRuZmpna2JlbWVlZWZo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kegiatan`
--

CREATE TABLE `tb_jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_jenis_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jenis_kegiatan`
--

INSERT INTO `tb_jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`) VALUES
(3, 'Urusan Penyelenggaraan PSU Rumah'),
(4, 'Pengembangan dan Pengelolaan Sistem Irigasi Primer dan Sekunder pada Daerah Irigasi yang Luasnya dibawah 1000 Ha dalam 1 (Satu) Daerah\r\nKabupaten/Kota'),
(5, 'Pengelolaan SDA dan Bangunan Pengaman Pantai pada Wilayah Sungai (WS) dalam 1 (Satu) Daerah Kabupaten/Kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_program`
--

CREATE TABLE `tb_jenis_program` (
  `id_jenis_program` int(11) NOT NULL,
  `nama_jenis_program` text NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jenis_program`
--

INSERT INTO `tb_jenis_program` (`id_jenis_program`, `nama_jenis_program`, `id_bidang`) VALUES
(3, 'PROGRAM PENINGKATAN SARANA DAN PRASARANA, SARANA DAN UTILITAS UMUM (PSU)', 2),
(4, 'PROGRAM TES', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_sasaran`
--

CREATE TABLE `tb_jenis_sasaran` (
  `id_jenis_sasaran` int(11) NOT NULL,
  `nama_jenis_sasaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jenis_sub_kegiatan`
--

INSERT INTO `tb_jenis_sub_kegiatan` (`id_jenis_sub_kegiatan`, `nama_jenis_sub_kegiatan`) VALUES
(3, 'Penyediaan Prasarana, Sarana, dan Utilitas Umum di Perumahan untuk Menunjang Fungsi Hunian'),
(4, 'Pembangunan Bendung Irigasi'),
(5, 'Pembangunan Bangunan Perkuatan Tebing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_tagihan`
--

CREATE TABLE `tb_jenis_tagihan` (
  `id_jenis_tagihan` int(11) NOT NULL,
  `nama_jenis_tagihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jenis_tagihan`
--

INSERT INTO `tb_jenis_tagihan` (`id_jenis_tagihan`, `nama_jenis_tagihan`) VALUES
(1, 'Tidak Ada'),
(2, 'Belanja Modal'),
(3, 'Belanja Barang & Jasa'),
(5, 'Belanja Pegawai'),
(6, 'Belanja Pemeliharaan');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `id_jenis_kegiatan`, `sasaran_kegiatan`, `indikator_kinerja_kegiatan`, `satuan_kegiatan`, `id_program`) VALUES
('w9y9e4ihiuq030ctj93dq9e2cpusz2', 3, 'Tercapainya panjang Jalan yang dibangun dan ditingkatkan', 'Panjang Jalan yang diselenggarakan', 'KM', 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kode`
--

CREATE TABLE `tb_kode` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kode`
--

INSERT INTO `tb_kode` (`id`, `kode`) VALUES
(21, 'iYKCZWRrZmpna2Jqa2ZlZWU='),
(22, 'iYKCZWRuZmpna2JlbGVuZWZn'),
(23, 'iYKCZWRuZmpna2JlbWVlZWZo');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kp_belanja`
--

INSERT INTO `tb_kp_belanja` (`id_kp_belanja`, `id_rek`, `id_renja_sub`, `total_kp_belanja`, `status_kp_belanja`) VALUES
(1, 4, 1, 84165400, 'tunggu'),
(2, 4, 2, 40000000, 'tunggu'),
(3, 6, 1, 40, 'tunggu'),
(4, 7, 1, 100, 'tunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lampiran_format1`
--

CREATE TABLE `tb_lampiran_format1` (
  `id` int(11) NOT NULL,
  `bahan` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `jml_harga` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lampiran_format3`
--

CREATE TABLE `tb_lampiran_format3` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pg_dari` varchar(255) DEFAULT NULL,
  `pg_tujuan` varchar(255) DEFAULT NULL,
  `pg_jml_satuan` int(11) DEFAULT NULL,
  `pg_qty` int(11) DEFAULT NULL,
  `pg_hari` varchar(255) DEFAULT NULL,
  `pg_total` varchar(255) DEFAULT NULL,
  `pl_dari` varchar(255) DEFAULT NULL,
  `pl_tujuan` varchar(225) DEFAULT NULL,
  `pl_jml_satuan` int(11) DEFAULT NULL,
  `pl_qty` int(11) DEFAULT NULL,
  `pl_hari` int(11) DEFAULT NULL,
  `pl_total` int(11) DEFAULT NULL,
  `pangkat1` varchar(255) DEFAULT NULL,
  `jml_uh1` int(11) DEFAULT NULL,
  `qty_uh1` int(11) DEFAULT NULL,
  `jml_huh1` int(11) DEFAULT NULL,
  `total_uh1` int(11) DEFAULT NULL,
  `pangkat2` varchar(255) DEFAULT NULL,
  `jml_uh2` int(11) DEFAULT NULL,
  `qty_uh2` int(11) DEFAULT NULL,
  `jml_huh2` int(11) DEFAULT NULL,
  `total_uh2` int(11) DEFAULT NULL,
  `pangkat3` varchar(255) DEFAULT NULL,
  `jml_uh3` int(11) DEFAULT NULL,
  `qty_uh3` int(11) DEFAULT NULL,
  `jml_huh3` int(11) DEFAULT NULL,
  `total_uh3` int(11) DEFAULT NULL,
  `tempat_penginapan1` varchar(255) DEFAULT NULL,
  `jml_up1` int(11) DEFAULT NULL,
  `qty_up1` int(11) DEFAULT NULL,
  `jml_hup1` int(11) DEFAULT NULL,
  `total_up1` int(11) DEFAULT NULL,
  `tempat_penginapan2` varchar(255) DEFAULT NULL,
  `jml_up2` int(11) DEFAULT NULL,
  `qty_up2` int(11) DEFAULT NULL,
  `jml_hup2` int(11) DEFAULT NULL,
  `total_up2` int(11) DEFAULT NULL,
  `total_semua_pp` int(11) DEFAULT NULL,
  `total_semua_uh` int(11) DEFAULT NULL,
  `total_semua_up` int(11) DEFAULT NULL,
  `total_semua` int(11) DEFAULT NULL,
  `kode_spm` varchar(255) DEFAULT NULL,
  `status` enum('PROCESS','DONE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_lampiran_format3`
--

INSERT INTO `tb_lampiran_format3` (`id`, `id_pegawai`, `tanggal`, `pg_dari`, `pg_tujuan`, `pg_jml_satuan`, `pg_qty`, `pg_hari`, `pg_total`, `pl_dari`, `pl_tujuan`, `pl_jml_satuan`, `pl_qty`, `pl_hari`, `pl_total`, `pangkat1`, `jml_uh1`, `qty_uh1`, `jml_huh1`, `total_uh1`, `pangkat2`, `jml_uh2`, `qty_uh2`, `jml_huh2`, `total_uh2`, `pangkat3`, `jml_uh3`, `qty_uh3`, `jml_huh3`, `total_uh3`, `tempat_penginapan1`, `jml_up1`, `qty_up1`, `jml_hup1`, `total_up1`, `tempat_penginapan2`, `jml_up2`, `qty_up2`, `jml_hup2`, `total_up2`, `total_semua_pp`, `total_semua_uh`, `total_semua_up`, `total_semua`, `kode_spm`, `status`) VALUES
(5, 6, '2023-08-06', 'GORONTALO', 'JAKARATA', 1686368, 1, '1', '1686368', '', '', 2272589, 1, 1, 2272589, 'Gol. III', 530000, 1, 4, 2120000, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 'Hotel', 540000, 1, 1, 540000, NULL, 450000, 1, 2, 900000, 3958957, 2120000, 1440000, 8890957, 'iYKCZWRrZmpna2JpaWNlZWU=', 'PROCESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lampiran_format5`
--

CREATE TABLE `tb_lampiran_format5` (
  `id` int(11) NOT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `nilai_fisik` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `pptk` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `direktur_perusahaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_lampiran_format5`
--

INSERT INTO `tb_lampiran_format5` (`id`, `uraian`, `nilai_fisik`, `ppn`, `jumlah`, `pptk`, `nama_perusahaan`, `direktur_perusahaan`) VALUES
(1, 'Nilai Kontrak', 2147483647, 307122830, 309914853, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `jabatan`, `golongan`, `bidang`) VALUES
(1, 'Hi. NIRWAN UTIARAHMAN, ST., M.Si', '197310132003121007', 'KEPALA DINAS', 'PENATA III/d', 'DINAS PUPR'),
(2, 'VERONIKA ALI, S.Akun.', '12345678 123456 1 001', 'BENDAHARA', 'PENATA III/d', 'SEKRETARIAT'),
(3, 'ANITA THERESIA DJAKARIA, ST', '19810811 200604 2 014', 'SEKRETARIS', NULL, NULL),
(5, 'FEVI PONGOLIU, S.AP', '19821219 201407 2 002', NULL, NULL, NULL),
(6, 'AZWAR KABADO, ST', NULL, NULL, NULL, NULL),
(7, 'RAHMAN HASAN., ST. M.Si', '19700619 200501 1 011', 'KUASA PENGGUNA ANGGARAN', 'PENATA III/d', NULL),
(8, 'NASRUDIN M., ST.', '1980015 201001 1 019', 'PPTK', NULL, NULL),
(9, 'WAHYUDIN USULU, SE', '19770719 200604 1 012', 'PEJABAT PENATAUSAHAAN KEUANGAN', NULL, NULL),
(10, 'SRI YULIN VAN GOBEL', '19840703 201407 2 005', 'BENDAHARA PENGELUARAN PEMBANTU', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `no_kwitansi` varchar(255) DEFAULT NULL,
  `jenis_pembayaran` varchar(2) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `no_spm` varchar(255) DEFAULT NULL,
  `tgl_spm` date DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jml_angg` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL,
  `sisa_angg1` int(11) DEFAULT NULL,
  `jml_diminta` int(11) DEFAULT NULL,
  `sisa_angg2` int(11) DEFAULT NULL,
  `id_prog` int(11) DEFAULT NULL,
  `id_keg` int(11) DEFAULT NULL,
  `id_subkeg` int(11) DEFAULT NULL,
  `ppn` varchar(255) DEFAULT NULL,
  `pph21` varchar(255) DEFAULT NULL,
  `pph22` varchar(255) DEFAULT NULL,
  `pph23` varchar(255) DEFAULT NULL,
  `pph25` varchar(255) DEFAULT NULL,
  `bendahara` int(11) DEFAULT NULL,
  `penerima` int(11) DEFAULT NULL,
  `pengguna_angg` int(11) DEFAULT NULL,
  `tanda_bukti` varchar(255) DEFAULT NULL,
  `kode_spm` varchar(255) DEFAULT NULL,
  `status` enum('PROCESS','DONE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perumahan_rakyat`
--

CREATE TABLE `tb_perumahan_rakyat` (
  `id` int(11) NOT NULL,
  `nm_pju` varchar(255) DEFAULT NULL,
  `no_meter` varchar(255) DEFAULT NULL,
  `daya` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kd_desa` varchar(255) DEFAULT NULL,
  `kd_kecamatan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_perumahan_rakyat`
--

INSERT INTO `tb_perumahan_rakyat` (`id`, `nm_pju`, `no_meter`, `daya`, `alamat`, `kd_desa`, `kd_kecamatan`, `jumlah`) VALUES
(1, 'PJU LONGALO', '32 - 1480 - 2628 - 2', '450', 'DESA LONGALO, KEC. BULANGO UTARA', '75.03.05.2004', '75.03.05', 502500),
(2, 'PJU LONGALO IV', '32 - 1480 - 2625 - 8', '450', 'LONGALO', '75.03.05.2004', '75.03.05', 502500),
(3, 'PJU SUKA DAMAI', '86 - 0260 - 4674 - 7', '1300', 'SUKA DAMAI, KEC. BULANGO UTARA', '75.03.05.2012', '75.03.05', 1002500),
(4, 'PJU BULANGO UTARA 2', '86 - 0260 - 5905 - 4', '1300', 'KEC. BULANGO UTARA', NULL, '75.03.05', 1002500),
(5, 'PJU TAPA 1', '32 - 1700 - 4656 - 2', '4400', 'PERTIGAAN DESA POPODU', '75.03.16.2003', '75.03.16', 3007500),
(6, 'PJU TAPA 2', '45 - 0573 - 5763 - 9', '5500', 'KOMPLEKS LAPANGAN IPPOT TAPA', NULL, NULL, 5003600),
(7, 'PJU TAPA 3', '32 - 0152 - 3799 - 6', '3500', 'BUNDARAN PASAR KAMIS TAPA', NULL, NULL, 3007500),
(8, 'PJU KABILA 1', '86 - 0244 - 0905 - 3', '1300', 'JLN. PERPAT PAUWO - TUMBIHE', NULL, NULL, 3007500),
(9, 'PJU KABILA 2', '86 - 0244 - 3156 - 0', '1300', 'JLN. SAWAH BESAR PEREMPATAN LEPING', NULL, NULL, 3007500),
(10, 'PJU BYPASS 6', '32 - 1195 - 3847 - 1', '7700', 'TOTO UTARA, KEC. KABILA', NULL, NULL, 5002500),
(11, 'PJU BYPASS 7', '32 - 1195 - 3847 - 1', '7700', 'TOTO UTARA, KEC. KABILA', NULL, NULL, 5002500),
(12, 'PJU BOTUPINGGE BB 1', '86 - 0119 - 5183 - 6', '4400', 'DESA PANGGULO, KEC. BOTUPINGGE', NULL, NULL, 3007500),
(13, 'PJU BOTUPINGGE BB 3', '14 - 0137 - 8073 - 0', '5500', 'DESA LUWOHU, KEC. BOTUPINGGE', NULL, NULL, 3007500),
(14, 'PJU BOTUPINGGE BB 4', '32 - 1750 - 6891 - 8', '3500', 'DESA TIMBUOLO, KEC. BOTUPINGGE', NULL, NULL, 3007500),
(15, 'PJU BOTUPINGGE BB 5', '86 - 0260 - 4844 - 5', '5500', 'DESA BUATA, KEC. BOTUPINGGE', NULL, NULL, 3007500),
(16, 'PJU BOTUPINGGE BB 7', '32 - 9001 - 2483 - 8', '16500', 'KEC. BOTUPINGGE', NULL, NULL, 2005000),
(17, 'PJU BY PASS 2', '32 - 1341 - 4782 - 9', '5500', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 5002500),
(18, 'PJU BY PASS 3', '32 - 0158 - 3189 - 7', '4400', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 3007500),
(19, 'PJU BY PASS 4 (ALUN - ALUN)', '32 - 1341 - 4790 - 2', '5500', 'DESA ILOHELUMA, KEC. TILONGKABILA', NULL, NULL, 3007500),
(20, 'LAMPU TAMAN KOTA BARU', '14 - 0436 - 6439 - 1', '1300', 'DESA ILOHELUMA KEC. TILONGKABILA', NULL, NULL, 3007500),
(21, 'PJU PESANTREN AL - MADINAH', '31 - 6500 - 7510 - 31', '2200', 'ILOHELUMA', NULL, NULL, 3007500),
(22, 'PJU MANDIRI', '86 - 0614 - 3400 - 6', '1300', 'DESA BUTU, TILONGKABILA', NULL, NULL, 3007500),
(23, 'PJU BY PASS X', '14 - 4373 - 0029 - 7', '3500', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 2005000),
(24, 'PJU BY PASS XI', '14 - 4373 - 1004 - 9', '3500', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 2005000),
(25, 'LAMPU TAMAN KOTA 2 BONBOL', '14 - 0436 - 1061 - 8', '900', 'DESA ILOHELUMA, KEC. TILONGKABILA', NULL, NULL, 3007500),
(26, 'PJU BY PASS 1', '14 - 0707 - 7858 - 5', '6600', 'DESA ULANTA, KEC. SUWAWA', NULL, NULL, 3007500),
(27, 'TAMAN TAQWA', '32 - 9023 - 6456 - 4', '23000', 'DESA ULANTA', NULL, NULL, 5002500),
(28, 'PJU 1 SUWAWA (KANTOR BUPATI)', '86 - 0244 - 0748 - 7', '1300', 'KANTOR BUPATI (POS SATPOL)', NULL, NULL, 3007500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pihak_kedua`
--

CREATE TABLE `tb_pihak_kedua` (
  `id` int(11) NOT NULL,
  `nm_perusahaan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_pihak_kedua`
--

INSERT INTO `tb_pihak_kedua` (`id`, `nm_perusahaan`, `nama`, `jabatan`) VALUES
(1, 'CV. BANGUNTAMA JOHAN SEJAHTERA', 'TUTIK FERAWATI', 'Direktur Cabang');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `id_potongan` int(11) NOT NULL,
  `ket_tambahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ppb`
--

CREATE TABLE `tb_ppb` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `jumlah_diterima` varchar(255) DEFAULT NULL,
  `transport` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `kd_spm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_rek`
--

INSERT INTO `tb_rek` (`id_rek`, `no_rek`, `nama_rek`, `id_jenis_tagihan`) VALUES
(3, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 3),
(4, '5.1.02.02.01.0041', 'Belanja Jasa Pemasangan Instalasi Telepon, Air, dan Listrik', 3),
(5, '5.1.02.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor', 2),
(6, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 3),
(7, '5.1.02.04.01.0001', 'Belanja Perjalanan Dinas', 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
(3, 'Orang/bulan'),
(4, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spm`
--

CREATE TABLE `tb_spm` (
  `id` int(11) NOT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `no_spm` varchar(255) DEFAULT NULL,
  `jenis_spm` varchar(2) DEFAULT NULL,
  `tgl_spm` date DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jml_angg` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL,
  `sisa_angg1` int(11) DEFAULT NULL,
  `jml_diminta` int(11) DEFAULT NULL,
  `sisa_angg2` int(11) DEFAULT NULL,
  `id_prog` int(11) DEFAULT NULL,
  `id_keg` int(11) DEFAULT NULL,
  `id_subkeg` int(11) DEFAULT NULL,
  `ppn` varchar(11) DEFAULT NULL,
  `pp21` varchar(11) DEFAULT NULL,
  `pp22` varchar(11) DEFAULT NULL,
  `pp23` varchar(11) DEFAULT NULL,
  `pp25` varchar(11) DEFAULT NULL,
  `kode_spm` varchar(255) DEFAULT NULL,
  `tanda_bukti` varchar(255) DEFAULT NULL,
  `status` enum('PROCESS','DONE') DEFAULT 'PROCESS'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_spm`
--

INSERT INTO `tb_spm` (`id`, `id_belanja`, `no_spm`, `jenis_spm`, `tgl_spm`, `nilai`, `jml_angg`, `realisasi`, `sisa_angg1`, `jml_diminta`, `sisa_angg2`, `id_prog`, `id_keg`, `id_subkeg`, `ppn`, `pp21`, `pp22`, `pp23`, `pp25`, `kode_spm`, `tanda_bukti`, `status`) VALUES
(2, 6, '776/SPM-LS/DPUPRPR/2022', 'LS', '2022-10-17', 84165400, 84165400, 0, 84165400, 84165400, 0, 3, 3, 3, '0', '0', '0', '0', '0', 'iYKCZWVoZmpna2JlbGJqZWZp', 'BonBolfix4.jpg', 'PROCESS'),
(3, 8, '2134', 'LS', '2022-12-12', 2333345, 1621500000, 1000000000, 621500000, 621500000, 0, 3, 3, 3, '0', '0', '0', '0', '0', 'iYKCZWVoZmpna2Jlb2VmZWZp', 'logo_honda.png', 'PROCESS'),
(4, 6, 'TES NOMOR SPM', 'LS', '2023-08-20', 20000000, 84165400, 0, 84165400, 2000000, 82165400, 3, 3, 3, '0', '0', '0', '0', '0', 'iYKCZWZlZmpna2JlbGRoZWZp', 'Gorontalo.png', 'PROCESS');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_sub_kegiatan`
--

INSERT INTO `tb_sub_kegiatan` (`id_sub_kegiatan`, `id_jenis_sub_kegiatan`, `sasaran_sub_kegiatan`, `indikator_kinerja_sub_kegiatan`, `satuan_sub_kegiatan`, `id_kegiatan`) VALUES
('hu6iy2hnq4419sf34hbmttsyq30r32', 3, 'Tercapainya Panjang jalan yang dibangun dan ditingkatkan', 'Panjang jalan yang dibangun', 'M', 'w9y9e4ihiuq030ctj93dq9e2cpusz2');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `daftar_nama_ttd`
--
ALTER TABLE `daftar_nama_ttd`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `dt_desa`
--
ALTER TABLE `dt_desa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kd_kecamatan` (`kd_kecamatan`) USING BTREE,
  ADD KEY `kd_desa` (`kd_desa`) USING BTREE;

--
-- Indexes for table `dt_kecamatan`
--
ALTER TABLE `dt_kecamatan`
  ADD PRIMARY KEY (`kd_kecamatan`) USING BTREE,
  ADD KEY `KD_KECAMATAN` (`kd_kecamatan`) USING BTREE;

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_role` (`id_role`) USING BTREE,
  ADD KEY `id_bidang` (`id_bidang`) USING BTREE;

--
-- Indexes for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD PRIMARY KEY (`id_belanja`) USING BTREE,
  ADD KEY `id_satuan` (`id_satuan`) USING BTREE,
  ADD KEY `id_kp_belanja` (`id_kp_belanja`) USING BTREE;

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`) USING BTREE;

--
-- Indexes for table `tb_format3`
--
ALTER TABLE `tb_format3`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kode_spm` (`kode_spm`) USING BTREE;

--
-- Indexes for table `tb_format4`
--
ALTER TABLE `tb_format4`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kode_spm` (`kode_spm`) USING BTREE;

--
-- Indexes for table `tb_format5`
--
ALTER TABLE `tb_format5`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kode_spm` (`pot_uang_muka1`) USING BTREE;

--
-- Indexes for table `tb_jenis_kegiatan`
--
ALTER TABLE `tb_jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_jenis_program`
--
ALTER TABLE `tb_jenis_program`
  ADD PRIMARY KEY (`id_jenis_program`) USING BTREE,
  ADD KEY `id_bidang` (`id_bidang`) USING BTREE;

--
-- Indexes for table `tb_jenis_sasaran`
--
ALTER TABLE `tb_jenis_sasaran`
  ADD PRIMARY KEY (`id_jenis_sasaran`) USING BTREE;

--
-- Indexes for table `tb_jenis_sub_kegiatan`
--
ALTER TABLE `tb_jenis_sub_kegiatan`
  ADD PRIMARY KEY (`id_jenis_sub_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_jenis_tagihan`
--
ALTER TABLE `tb_jenis_tagihan`
  ADD PRIMARY KEY (`id_jenis_tagihan`) USING BTREE;

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`) USING BTREE,
  ADD KEY `id_program` (`id_program`) USING BTREE,
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_kode`
--
ALTER TABLE `tb_kode`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_kp_belanja`
--
ALTER TABLE `tb_kp_belanja`
  ADD PRIMARY KEY (`id_kp_belanja`) USING BTREE,
  ADD KEY `id_rek` (`id_rek`) USING BTREE,
  ADD KEY `id_renja_sub` (`id_renja_sub`) USING BTREE;

--
-- Indexes for table `tb_lampiran_format1`
--
ALTER TABLE `tb_lampiran_format1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lampiran_format3`
--
ALTER TABLE `tb_lampiran_format3`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_lampiran_format5`
--
ALTER TABLE `tb_lampiran_format5`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_perumahan_rakyat`
--
ALTER TABLE `tb_perumahan_rakyat`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kd_desa` (`kd_desa`) USING BTREE,
  ADD KEY `kd_kecamatan` (`kd_kecamatan`) USING BTREE;

--
-- Indexes for table `tb_pihak_kedua`
--
ALTER TABLE `tb_pihak_kedua`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_potongan`
--
ALTER TABLE `tb_potongan`
  ADD PRIMARY KEY (`id_potongan`) USING BTREE;

--
-- Indexes for table `tb_pot_tagihan`
--
ALTER TABLE `tb_pot_tagihan`
  ADD PRIMARY KEY (`id_pot_tagihan`) USING BTREE,
  ADD KEY `id_potongan` (`id_potongan`) USING BTREE;

--
-- Indexes for table `tb_ppb`
--
ALTER TABLE `tb_ppb`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`) USING BTREE,
  ADD KEY `id_sasaran` (`id_sasaran`) USING BTREE,
  ADD KEY `id_jenis_program` (`id_jenis_program`) USING BTREE;

--
-- Indexes for table `tb_rek`
--
ALTER TABLE `tb_rek`
  ADD PRIMARY KEY (`id_rek`) USING BTREE,
  ADD KEY `id_jenis_tagihan` (`id_jenis_tagihan`) USING BTREE;

--
-- Indexes for table `tb_renja_kegiatan`
--
ALTER TABLE `tb_renja_kegiatan`
  ADD PRIMARY KEY (`id_renja_kegiatan`) USING BTREE,
  ADD KEY `id_kegiatan` (`id_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_renja_program`
--
ALTER TABLE `tb_renja_program`
  ADD PRIMARY KEY (`id_renja_program`) USING BTREE,
  ADD KEY `id_program` (`id_program`) USING BTREE;

--
-- Indexes for table `tb_renja_sub`
--
ALTER TABLE `tb_renja_sub`
  ADD PRIMARY KEY (`id_renja_sub`) USING BTREE,
  ADD KEY `id_sub_kegiatan` (`id_sub_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_respon`
--
ALTER TABLE `tb_respon`
  ADD PRIMARY KEY (`id_respon`) USING BTREE,
  ADD KEY `id_role_respon` (`id_role_respon`) USING BTREE,
  ADD KEY `id_bidang` (`id_bidang`) USING BTREE;

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`) USING BTREE;

--
-- Indexes for table `tb_role_respon`
--
ALTER TABLE `tb_role_respon`
  ADD PRIMARY KEY (`id_role_respon`) USING BTREE;

--
-- Indexes for table `tb_sasaran`
--
ALTER TABLE `tb_sasaran`
  ADD PRIMARY KEY (`id_sasaran`) USING BTREE,
  ADD KEY `id_jenis_sasaran` (`id_jenis_sasaran`) USING BTREE;

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`) USING BTREE;

--
-- Indexes for table `tb_spm`
--
ALTER TABLE `tb_spm`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `kode_spm` (`kode_spm`) USING BTREE;

--
-- Indexes for table `tb_sub_kegiatan`
--
ALTER TABLE `tb_sub_kegiatan`
  ADD PRIMARY KEY (`id_sub_kegiatan`) USING BTREE,
  ADD KEY `id_kegiatan` (`id_kegiatan`) USING BTREE,
  ADD KEY `id_jenis_sub_kegiatan` (`id_jenis_sub_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_target`
--
ALTER TABLE `tb_target`
  ADD PRIMARY KEY (`id_target`) USING BTREE,
  ADD KEY `id_sasaran` (`id_sasaran`) USING BTREE;

--
-- Indexes for table `tb_target_kegiatan`
--
ALTER TABLE `tb_target_kegiatan`
  ADD PRIMARY KEY (`id_target_kegiatan`) USING BTREE,
  ADD KEY `id_kegiatan` (`id_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_target_program`
--
ALTER TABLE `tb_target_program`
  ADD PRIMARY KEY (`id_target_program`) USING BTREE,
  ADD KEY `id_program` (`id_program`) USING BTREE;

--
-- Indexes for table `tb_target_sub`
--
ALTER TABLE `tb_target_sub`
  ADD PRIMARY KEY (`id_target_sub`) USING BTREE,
  ADD KEY `id_sub_kegiatan` (`id_sub_kegiatan`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daftar_nama_ttd`
--
ALTER TABLE `daftar_nama_ttd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_format3`
--
ALTER TABLE `tb_format3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_format4`
--
ALTER TABLE `tb_format4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_format5`
--
ALTER TABLE `tb_format5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_jenis_kegiatan`
--
ALTER TABLE `tb_jenis_kegiatan`
  MODIFY `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_jenis_program`
--
ALTER TABLE `tb_jenis_program`
  MODIFY `id_jenis_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id_jenis_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kode`
--
ALTER TABLE `tb_kode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_kp_belanja`
--
ALTER TABLE `tb_kp_belanja`
  MODIFY `id_kp_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_lampiran_format1`
--
ALTER TABLE `tb_lampiran_format1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_lampiran_format3`
--
ALTER TABLE `tb_lampiran_format3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_lampiran_format5`
--
ALTER TABLE `tb_lampiran_format5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_perumahan_rakyat`
--
ALTER TABLE `tb_perumahan_rakyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_pihak_kedua`
--
ALTER TABLE `tb_pihak_kedua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `tb_ppb`
--
ALTER TABLE `tb_ppb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_rek`
--
ALTER TABLE `tb_rek`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `tb_spm`
--
ALTER TABLE `tb_spm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- Ketidakleluasaan untuk tabel `dt_desa`
--
ALTER TABLE `dt_desa`
  ADD CONSTRAINT `dt_desa_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `dt_kecamatan` (`kd_kecamatan`) ON DELETE SET NULL ON UPDATE SET NULL;

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
-- Ketidakleluasaan untuk tabel `tb_perumahan_rakyat`
--
ALTER TABLE `tb_perumahan_rakyat`
  ADD CONSTRAINT `desa` FOREIGN KEY (`kd_desa`) REFERENCES `dt_desa` (`kd_desa`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `kecamatan` FOREIGN KEY (`kd_kecamatan`) REFERENCES `dt_kecamatan` (`kd_kecamatan`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tb_pot_tagihan`
--
ALTER TABLE `tb_pot_tagihan`
  ADD CONSTRAINT `tb_pot_tagihan_ibfk_1` FOREIGN KEY (`id_potongan`) REFERENCES `tb_potongan` (`id_potongan`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
