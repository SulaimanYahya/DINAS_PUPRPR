/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100113 (10.1.13-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : dinas_pupr

 Target Server Type    : MySQL
 Target Server Version : 100113 (10.1.13-MariaDB)
 File Encoding         : 65001

 Date: 13/08/2023 21:42:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crud
-- ----------------------------
DROP TABLE IF EXISTS `crud`;
CREATE TABLE `crud`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of crud
-- ----------------------------

-- ----------------------------
-- Table structure for daftar_nama_ttd
-- ----------------------------
DROP TABLE IF EXISTS `daftar_nama_ttd`;
CREATE TABLE `daftar_nama_ttd`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pegawai` int NULL DEFAULT NULL,
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of daftar_nama_ttd
-- ----------------------------
INSERT INTO `daftar_nama_ttd` VALUES (29, 7, 'iYKCZWVoZmpna2JlbGJqZWZp');
INSERT INTO `daftar_nama_ttd` VALUES (30, 8, 'iYKCZWVoZmpna2JlbGJqZWZp');
INSERT INTO `daftar_nama_ttd` VALUES (31, 9, 'iYKCZWVoZmpna2JlbGJqZWZp');
INSERT INTO `daftar_nama_ttd` VALUES (32, 10, 'iYKCZWVoZmpna2JlbGJqZWZp');

-- ----------------------------
-- Table structure for dt_desa
-- ----------------------------
DROP TABLE IF EXISTS `dt_desa`;
CREATE TABLE `dt_desa`  (
  `id` int NOT NULL,
  `kd_desa` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_kecamatan` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desa` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kd_kecamatan`(`kd_kecamatan` ASC) USING BTREE,
  INDEX `kd_desa`(`kd_desa` ASC) USING BTREE,
  CONSTRAINT `dt_desa_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `dt_kecamatan` (`kd_kecamatan`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_desa
-- ----------------------------
INSERT INTO `dt_desa` VALUES (1, '75.03.01.2004', '75.03.01', 'TALUMOPATU');
INSERT INTO `dt_desa` VALUES (2, '75.03.01.2005', '75.03.01', 'TALULOBUTU');
INSERT INTO `dt_desa` VALUES (3, '75.03.01.2006', '75.03.01', 'DUNGGALA');
INSERT INTO `dt_desa` VALUES (4, '75.03.01.2007', '75.03.01', 'LANGGE');
INSERT INTO `dt_desa` VALUES (5, '75.03.01.2027', '75.03.01', 'TALULOBUTU SELATAN');
INSERT INTO `dt_desa` VALUES (6, '75.03.01.2028', '75.03.01', 'KERAMAT');
INSERT INTO `dt_desa` VALUES (7, '75.03.01.2029', '75.03.01', 'MERANTI');
INSERT INTO `dt_desa` VALUES (8, '75.03.02.1008', '75.03.02', 'PADENGO');
INSERT INTO `dt_desa` VALUES (9, '75.03.02.1009', '75.03.02', 'OLOHUTA');
INSERT INTO `dt_desa` VALUES (10, '75.03.02.1010', '75.03.02', 'TUMBIHE');
INSERT INTO `dt_desa` VALUES (11, '75.03.02.1011', '75.03.02', 'PAUWO');
INSERT INTO `dt_desa` VALUES (12, '75.03.02.1028', '75.03.02', 'OLOHUTA UTARA');
INSERT INTO `dt_desa` VALUES (13, '75.03.02.2006', '75.03.02', 'DUTOHE');
INSERT INTO `dt_desa` VALUES (14, '75.03.02.2007', '75.03.02', 'TANGGILINGO');
INSERT INTO `dt_desa` VALUES (15, '75.03.02.2012', '75.03.02', 'TOTO SELATAN');
INSERT INTO `dt_desa` VALUES (16, '75.03.02.2013', '75.03.02', 'POOWO');
INSERT INTO `dt_desa` VALUES (17, '75.03.02.2024', '75.03.02', 'TALANGO');
INSERT INTO `dt_desa` VALUES (18, '75.03.02.2026', '75.03.02', 'POOWO BARAT');
INSERT INTO `dt_desa` VALUES (19, '75.03.02.2029', '75.03.02', 'DUTOHE BARAT');
INSERT INTO `dt_desa` VALUES (20, '75.03.03.2011', '75.03.03', 'TINGKOHUBU');
INSERT INTO `dt_desa` VALUES (21, '75.03.03.2012', '75.03.03', 'BOLUDAWA');
INSERT INTO `dt_desa` VALUES (22, '75.03.03.2013', '75.03.03', 'BUBE');
INSERT INTO `dt_desa` VALUES (23, '75.03.03.2014', '75.03.03', 'HULUDUOTAMO');
INSERT INTO `dt_desa` VALUES (24, '75.03.03.2020', '75.03.03', 'ULANTA');
INSERT INTO `dt_desa` VALUES (25, '75.03.03.2021', '75.03.03', 'TINELO');
INSERT INTO `dt_desa` VALUES (26, '75.03.03.2022', '75.03.03', 'BUBEYA');
INSERT INTO `dt_desa` VALUES (27, '75.03.03.2023', '75.03.03', 'BUBE BARU');
INSERT INTO `dt_desa` VALUES (28, '75.03.03.2027', '75.03.03', 'TINGKOHUBU TIMUR');
INSERT INTO `dt_desa` VALUES (29, '75.03.03.2028', '75.03.03', 'HELUMO');
INSERT INTO `dt_desa` VALUES (30, '75.03.04.2003', '75.03.04', 'BILUNGALA');
INSERT INTO `dt_desa` VALUES (31, '75.03.04.2004', '75.03.04', 'BILUNGALA');
INSERT INTO `dt_desa` VALUES (32, '75.03.04.2005', '75.03.04', 'UABANGA');
INSERT INTO `dt_desa` VALUES (33, '75.03.04.2008', '75.03.04', 'TOLOTIO');
INSERT INTO `dt_desa` VALUES (34, '75.03.04.2012', '75.03.04', 'TONGO');
INSERT INTO `dt_desa` VALUES (35, '75.03.04.2025', '75.03.04', 'BILUNGALA UTARA');
INSERT INTO `dt_desa` VALUES (36, '75.03.04.2026', '75.03.04', 'TIHU');
INSERT INTO `dt_desa` VALUES (37, '75.03.04.2027', '75.03.04', 'TUNAS JAYA');
INSERT INTO `dt_desa` VALUES (38, '75.03.04.2028', '75.03.04', 'LEMBAH HIJAU');
INSERT INTO `dt_desa` VALUES (39, '75.03.04.2029', '75.03.04', 'BATU HIJAU');
INSERT INTO `dt_desa` VALUES (40, '75.03.04.2031', '75.03.04', 'OMBULO HIJAU');
INSERT INTO `dt_desa` VALUES (41, '75.03.04.2032', '75.03.04', 'KEMIRI');
INSERT INTO `dt_desa` VALUES (42, '75.03.04.2033', '75.03.04', 'PELITA HIJAU');
INSERT INTO `dt_desa` VALUES (43, '75.03.05.2001', '75.03.05', 'BOIDU');
INSERT INTO `dt_desa` VALUES (44, '75.03.05.2002', '75.03.05', 'BANDUNGAN');
INSERT INTO `dt_desa` VALUES (45, '75.03.05.2003', '75.03.05', 'TUPA');
INSERT INTO `dt_desa` VALUES (46, '75.03.05.2004', '75.03.05', 'LONGALO');
INSERT INTO `dt_desa` VALUES (47, '75.03.05.2009', '75.03.05', 'TULOA');
INSERT INTO `dt_desa` VALUES (48, '75.03.05.2010', '75.03.05', 'KOPI');
INSERT INTO `dt_desa` VALUES (49, '75.03.05.2011', '75.03.05', 'LOMAYA');
INSERT INTO `dt_desa` VALUES (50, '75.03.05.2012', '75.03.05', 'SUKA DAMAI');
INSERT INTO `dt_desa` VALUES (51, '75.03.05.2015', '75.03.05', 'BUNUO');
INSERT INTO `dt_desa` VALUES (52, '75.03.06.2001', '75.03.06', 'BONGOIME');
INSERT INTO `dt_desa` VALUES (53, '75.03.06.2002', '75.03.06', 'BONGOPINI');
INSERT INTO `dt_desa` VALUES (54, '75.03.06.2003', '75.03.06', 'TOTO UTARA');
INSERT INTO `dt_desa` VALUES (55, '75.03.06.2004', '75.03.06', 'MOUTONG');
INSERT INTO `dt_desa` VALUES (56, '75.03.06.2005', '75.03.06', 'TUNGGULO');
INSERT INTO `dt_desa` VALUES (57, '75.03.06.2006', '75.03.06', 'LONUO');
INSERT INTO `dt_desa` VALUES (58, '75.03.06.2007', '75.03.06', 'TAMBOO');
INSERT INTO `dt_desa` VALUES (59, '75.03.06.2008', '75.03.06', 'ILOHELUMA');
INSERT INTO `dt_desa` VALUES (60, '75.03.06.2009', '75.03.06', 'MOTILANGO');
INSERT INTO `dt_desa` VALUES (61, '75.03.06.2010', '75.03.06', 'BUTU');
INSERT INTO `dt_desa` VALUES (62, '75.03.06.2011', '75.03.06', 'PERMATA');
INSERT INTO `dt_desa` VALUES (63, '75.03.06.2012', '75.03.06', 'TUNGGULO SELATAN');
INSERT INTO `dt_desa` VALUES (64, '75.03.06.2013', '75.03.06', 'BONGOHULAWA');
INSERT INTO `dt_desa` VALUES (65, '75.03.06.2014', '75.03.06', 'BERLIAN');
INSERT INTO `dt_desa` VALUES (66, '75.03.07.2001', '75.03.07', 'TIMBUOLO');
INSERT INTO `dt_desa` VALUES (67, '75.03.07.2002', '75.03.07', 'PANGGULO');
INSERT INTO `dt_desa` VALUES (68, '75.03.07.2003', '75.03.07', 'LUWOHU');
INSERT INTO `dt_desa` VALUES (69, '75.03.07.2004', '75.03.07', 'BUATA');
INSERT INTO `dt_desa` VALUES (70, '75.03.07.2005', '75.03.07', 'TIMBUOLO TIMUR');
INSERT INTO `dt_desa` VALUES (71, '75.03.07.2006', '75.03.07', 'TANAH PUTIH');
INSERT INTO `dt_desa` VALUES (72, '75.03.07.2007', '75.03.07', 'PANGGULO BARAT');
INSERT INTO `dt_desa` VALUES (73, '75.03.07.2008', '75.03.07', 'TIMBUOLO TENGAH');
INSERT INTO `dt_desa` VALUES (74, '75.03.07.2009', '75.03.07', 'SUKMA');
INSERT INTO `dt_desa` VALUES (75, '75.03.08.2001', '75.03.08', 'HUANGOBOTU');
INSERT INTO `dt_desa` VALUES (76, '75.03.08.2002', '75.03.08', 'MOLUTABU');
INSERT INTO `dt_desa` VALUES (77, '75.03.08.2003', '75.03.08', 'OLUHUTA');
INSERT INTO `dt_desa` VALUES (78, '75.03.08.2004', '75.03.08', 'OLELE');
INSERT INTO `dt_desa` VALUES (79, '75.03.08.2005', '75.03.08', 'BOTUTONUO');
INSERT INTO `dt_desa` VALUES (80, '75.03.08.2006', '75.03.08', 'MODELOMO');
INSERT INTO `dt_desa` VALUES (81, '75.03.08.2007', '75.03.08', 'BILUANGO');
INSERT INTO `dt_desa` VALUES (82, '75.03.08.2008', '75.03.08', 'BOTUBARANI');
INSERT INTO `dt_desa` VALUES (83, '75.03.08.2009', '75.03.08', 'BINTALAHE');
INSERT INTO `dt_desa` VALUES (84, '75.03.09.2001', '75.03.09', 'TALUDAA');
INSERT INTO `dt_desa` VALUES (85, '75.03.09.2002', '75.03.09', 'SOGITIA');
INSERT INTO `dt_desa` VALUES (86, '75.03.09.2003', '75.03.09', 'MOODULIO');
INSERT INTO `dt_desa` VALUES (87, '75.03.09.2004', '75.03.09', 'BILONLANTUNGA');
INSERT INTO `dt_desa` VALUES (88, '75.03.09.2005', '75.03.09', 'INOGALUMA');
INSERT INTO `dt_desa` VALUES (89, '75.03.09.2006', '75.03.09', 'MONANO');
INSERT INTO `dt_desa` VALUES (90, '75.03.09.2007', '75.03.09', 'TUMBUH MEKAR');
INSERT INTO `dt_desa` VALUES (91, '75.03.09.2008', '75.03.09', 'MOLAMAHU');
INSERT INTO `dt_desa` VALUES (92, '75.03.09.2009', '75.03.09', 'MASIAGA');
INSERT INTO `dt_desa` VALUES (93, '75.03.09.2010', '75.03.09', 'ILOHUUWA');
INSERT INTO `dt_desa` VALUES (94, '75.03.09.2011', '75.03.09', 'MUARA BONE');
INSERT INTO `dt_desa` VALUES (95, '75.03.09.2012', '75.03.09', 'CENDANA PUTIH');
INSERT INTO `dt_desa` VALUES (96, '75.03.09.2013', '75.03.09', 'WALUHU');
INSERT INTO `dt_desa` VALUES (97, '75.03.09.2014', '75.03.09', 'PERMATA');
INSERT INTO `dt_desa` VALUES (98, '75.03.10.2001', '75.03.10', 'INOMATA');
INSERT INTO `dt_desa` VALUES (99, '75.03.10.2003', '75.03.10', 'TUMBULILATO');
INSERT INTO `dt_desa` VALUES (100, '75.03.10.2004', '75.03.10', 'MOOTAYU');
INSERT INTO `dt_desa` VALUES (101, '75.03.10.2006', '75.03.10', 'MOOTINELO');
INSERT INTO `dt_desa` VALUES (102, '75.03.10.2009', '75.03.10', 'PELITA JAYA');
INSERT INTO `dt_desa` VALUES (103, '75.03.10.2010', '75.03.10', 'MOOPIYA');
INSERT INTO `dt_desa` VALUES (104, '75.03.10.2011', '75.03.10', 'ALO');
INSERT INTO `dt_desa` VALUES (105, '75.03.10.2012', '75.03.10', 'LAUT BIRU');
INSERT INTO `dt_desa` VALUES (106, '75.03.10.2014', '75.03.10', 'BUNGA');
INSERT INTO `dt_desa` VALUES (107, '75.03.10.2015', '75.03.10', 'MOOTAWA');
INSERT INTO `dt_desa` VALUES (108, '75.03.11.2001', '75.03.11', 'TULABOLO');
INSERT INTO `dt_desa` VALUES (109, '75.03.11.2003', '75.03.11', 'DUMBAYA BULAN');
INSERT INTO `dt_desa` VALUES (110, '75.03.11.2004', '75.03.11', 'TULABOLO TIMUR');
INSERT INTO `dt_desa` VALUES (111, '75.03.11.2005', '75.03.11', 'TILANGOBULA');
INSERT INTO `dt_desa` VALUES (112, '75.03.11.2007', '75.03.11', 'PODUWOMA');
INSERT INTO `dt_desa` VALUES (113, '75.03.11.2008', '75.03.11', 'PANGGULO');
INSERT INTO `dt_desa` VALUES (114, '75.03.11.2009', '75.03.11', 'TULABOLO BARAT');
INSERT INTO `dt_desa` VALUES (115, '75.03.11.2010', '75.03.11', 'PANGI');
INSERT INTO `dt_desa` VALUES (116, '75.03.11.2011', '75.03.11', 'TINEMBA');
INSERT INTO `dt_desa` VALUES (117, '75.03.12.2001', '75.03.12', 'BULONTALA');
INSERT INTO `dt_desa` VALUES (118, '75.03.12.2002', '75.03.12', 'LIBUNGO');
INSERT INTO `dt_desa` VALUES (119, '75.03.12.2003', '75.03.12', 'MOLINTOGUPO');
INSERT INTO `dt_desa` VALUES (120, '75.03.12.2004', '75.03.12', 'BONEDAA');
INSERT INTO `dt_desa` VALUES (121, '75.03.12.2005', '75.03.12', 'BONDAWUNA');
INSERT INTO `dt_desa` VALUES (122, '75.03.12.2006', '75.03.12', 'BULONTALA TIMUR');
INSERT INTO `dt_desa` VALUES (123, '75.03.12.2007', '75.03.12', 'PANCURAN');
INSERT INTO `dt_desa` VALUES (124, '75.03.12.2008', '75.03.12', 'BONDARAYA');
INSERT INTO `dt_desa` VALUES (125, '75.03.13.2001', '75.03.13', 'LOMPOTOO');
INSERT INTO `dt_desa` VALUES (126, '75.03.13.2002', '75.03.13', 'LOMBONGO');
INSERT INTO `dt_desa` VALUES (127, '75.03.13.2003', '75.03.13', 'DUANO');
INSERT INTO `dt_desa` VALUES (128, '75.03.13.2004', '75.03.13', 'TOLOMATO');
INSERT INTO `dt_desa` VALUES (129, '75.03.13.2005', '75.03.13', 'ALALE');
INSERT INTO `dt_desa` VALUES (130, '75.03.13.2006', '75.03.13', 'TAPADAA');
INSERT INTO `dt_desa` VALUES (131, '75.03.14.2001', '75.03.14', 'MONGIILO');
INSERT INTO `dt_desa` VALUES (132, '75.03.14.2002', '75.03.14', 'OWATA');
INSERT INTO `dt_desa` VALUES (133, '75.03.14.2003', '75.03.14', 'MONGIILO UTARA');
INSERT INTO `dt_desa` VALUES (134, '75.03.14.2004', '75.03.14', 'PILOLAHEYA');
INSERT INTO `dt_desa` VALUES (135, '75.03.14.2005', '75.03.14', 'ILOMATA');
INSERT INTO `dt_desa` VALUES (136, '75.03.14.2006', '75.03.14', 'SUKA MAKMUR');
INSERT INTO `dt_desa` VALUES (137, '75.03.15.2001', '75.03.15', 'AYULA SELATAN');
INSERT INTO `dt_desa` VALUES (138, '75.03.15.2002', '75.03.15', 'HUNTU UTARA');
INSERT INTO `dt_desa` VALUES (139, '75.03.15.2003', '75.03.15', 'AYULA UTARA');
INSERT INTO `dt_desa` VALUES (140, '75.03.15.2004', '75.03.15', 'HUNTU SELATAN');
INSERT INTO `dt_desa` VALUES (141, '75.03.15.2006', '75.03.15', 'AYULA TILANGO');
INSERT INTO `dt_desa` VALUES (142, '75.03.15.2007', '75.03.15', 'AYULA TIMUR');
INSERT INTO `dt_desa` VALUES (143, '75.03.15.2008', '75.03.15', 'LAMAHU');
INSERT INTO `dt_desa` VALUES (144, '75.03.15.2009', '75.03.15', 'TINELO AYULA');
INSERT INTO `dt_desa` VALUES (145, '75.03.15.2010', '75.03.15', 'SEJAHTERA');
INSERT INTO `dt_desa` VALUES (146, '75.03.15.2011', '75.03.15', 'HUNTU BARAT');
INSERT INTO `dt_desa` VALUES (147, '75.03.16.2001', '75.03.16', 'BULOTALANGI');
INSERT INTO `dt_desa` VALUES (148, '75.03.16.2002', '75.03.16', 'TOLUWAYA');
INSERT INTO `dt_desa` VALUES (149, '75.03.16.2003', '75.03.16', 'POPODU');
INSERT INTO `dt_desa` VALUES (150, '75.03.16.2004', '75.03.16', 'BULOTALANGI TIMUR');
INSERT INTO `dt_desa` VALUES (151, '75.03.16.2005', '75.03.16', 'BULOTALANGI BARAT');
INSERT INTO `dt_desa` VALUES (152, '75.03.17.2001', '75.03.17', 'MAMUNGAA');
INSERT INTO `dt_desa` VALUES (153, '75.03.17.2002', '75.03.17', 'KAIDUNDU BARAT');
INSERT INTO `dt_desa` VALUES (154, '75.03.17.2003', '75.03.17', 'MOPUYA');
INSERT INTO `dt_desa` VALUES (155, '75.03.17.2004', '75.03.17', 'KAIDUNDU');
INSERT INTO `dt_desa` VALUES (156, '75.03.17.2005', '75.03.17', 'BUKIT HIJAU');
INSERT INTO `dt_desa` VALUES (157, '75.03.17.2006', '75.03.17', 'MAMUNGAA TIMUR');
INSERT INTO `dt_desa` VALUES (158, '75.03.17.2007', '75.03.17', 'DUNGGILATA');
INSERT INTO `dt_desa` VALUES (159, '75.03.17.2008', '75.03.17', 'PINOMOTIGA');
INSERT INTO `dt_desa` VALUES (160, '75.03.17.2009', '75.03.17', 'PATOA');
INSERT INTO `dt_desa` VALUES (161, '75.03.18.2001', '75.03.18', 'PINOGU');
INSERT INTO `dt_desa` VALUES (162, '75.03.18.2002', '75.03.18', 'BANGIO');
INSERT INTO `dt_desa` VALUES (163, '75.03.18.2003', '75.03.18', 'DATARAN HIJAU');
INSERT INTO `dt_desa` VALUES (164, '75.03.18.2004', '75.03.18', 'PINOGU PERMAI');
INSERT INTO `dt_desa` VALUES (165, '75.03.18.2005', '75.03.18', 'TILONGGIBILA');

-- ----------------------------
-- Table structure for dt_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `dt_kecamatan`;
CREATE TABLE `dt_kecamatan`  (
  `kd_kecamatan` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kecamatan` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_kecamatan`) USING BTREE,
  INDEX `KD_KECAMATAN`(`kd_kecamatan` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dt_kecamatan
-- ----------------------------
INSERT INTO `dt_kecamatan` VALUES ('75.03.01', 'TAPA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.02', 'KABILA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.03', 'SUWAWA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.04', 'BONE PANTAI');
INSERT INTO `dt_kecamatan` VALUES ('75.03.05', 'BULANGO UTARA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.06', 'TILONGKABILA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.07', 'BOTUPINGGE');
INSERT INTO `dt_kecamatan` VALUES ('75.03.08', 'KABILA BONE');
INSERT INTO `dt_kecamatan` VALUES ('75.03.09', 'BONE');
INSERT INTO `dt_kecamatan` VALUES ('75.03.10', 'BONE RAYA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.11', 'SUWAWA TIMUR');
INSERT INTO `dt_kecamatan` VALUES ('75.03.12', 'SUWAWA SELATAN');
INSERT INTO `dt_kecamatan` VALUES ('75.03.13', 'SUWAWA TENGAH');
INSERT INTO `dt_kecamatan` VALUES ('75.03.14', 'BULANGO ULU');
INSERT INTO `dt_kecamatan` VALUES ('75.03.15', 'BULANGO SELATAN');
INSERT INTO `dt_kecamatan` VALUES ('75.03.16', 'BULANGO TIMUR');
INSERT INTO `dt_kecamatan` VALUES ('75.03.17', 'BULAWA');
INSERT INTO `dt_kecamatan` VALUES ('75.03.18', 'PINOGU');

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_role` int NOT NULL,
  `id_bidang` int NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(127) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(127) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip` int NULL DEFAULT NULL,
  `date_created` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_role`(`id_role` ASC) USING BTREE,
  INDEX `id_bidang`(`id_bidang` ASC) USING BTREE,
  CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_admin_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES (1, 1, 8, 'Holis Nur', 'Limboto', '085256874123', 'holis@gmail.com', 'admin', '$2y$10$sI77M2IUJVG0PT5cHDurDOP0heBN0G82bU33uURX27N2I.Y/f.JkC', 'abbc88ca7948e082d34f8cd03f34e37e.jpg', 12345678, 1676297536);
INSERT INTO `tb_admin` VALUES (8, 2, 2, 'Nur Anisa Antula', 'Belum Diisi', 'Belum Disi', 'Belum Disi', 'nur123', '$2y$10$AIwZhq6lHwgpMAB6LhiMTu6DuF4o7t6G/XUBcOkvkOkWGpxoIPV7e', 'Fiqah.jpg', 12345678, 1691834508);

-- ----------------------------
-- Table structure for tb_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `tb_aktivitas`;
CREATE TABLE `tb_aktivitas`  (
  `id_aktivitas` int NOT NULL AUTO_INCREMENT,
  `id_kp_belanja` int NOT NULL,
  `nama_aktivitas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_belanja_aktivitas` double NOT NULL,
  PRIMARY KEY (`id_aktivitas`) USING BTREE,
  INDEX `id_rek`(`id_kp_belanja` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_aktivitas
-- ----------------------------

-- ----------------------------
-- Table structure for tb_belanja
-- ----------------------------
DROP TABLE IF EXISTS `tb_belanja`;
CREATE TABLE `tb_belanja`  (
  `id_belanja` int NOT NULL AUTO_INCREMENT,
  `id_kp_belanja` int NOT NULL,
  `uraian_belanja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_satuan` int NOT NULL,
  `volume` double NOT NULL,
  `harga_satuan` double NOT NULL,
  `total` double NOT NULL,
  `sisa_anggaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_rup` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_rek` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_belanja`) USING BTREE,
  INDEX `id_satuan`(`id_satuan` ASC) USING BTREE,
  INDEX `id_kp_belanja`(`id_kp_belanja` ASC) USING BTREE,
  CONSTRAINT `tb_belanja_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_belanja_ibfk_4` FOREIGN KEY (`id_kp_belanja`) REFERENCES `tb_kp_belanja` (`id_kp_belanja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_belanja
-- ----------------------------
INSERT INTO `tb_belanja` VALUES (6, 1, 'BAYAR BELANJA TAGIHAN REKENING LISTRIK PRA BAYAR S.B OKTOBER TAHUN 2022 PADA DINAS PU, PENATAAN RUANG DAN PERUMAHAN RAKYAT MEL. KEG. URUSAN PENYELENGGARAAN PSU PERUMAHAN TA. 2022 (PAD)', 4, 5, 3000000, 20, NULL, '12323.23123', '4');
INSERT INTO `tb_belanja` VALUES (7, 1, 'Uraian lagi', 4, 2, 2000000, 20, NULL, '12323.2312', '7');
INSERT INTO `tb_belanja` VALUES (8, 2, 'URAIAN 1', 4, 2, 740000, 1621500000, '1621500000', '12323.2312', '7');
INSERT INTO `tb_belanja` VALUES (9, 2, 'URAIAN 2', 4, 2, 740000, 60, NULL, '12323.2312', '7');

-- ----------------------------
-- Table structure for tb_bidang
-- ----------------------------
DROP TABLE IF EXISTS `tb_bidang`;
CREATE TABLE `tb_bidang`  (
  `id_bidang` int NOT NULL AUTO_INCREMENT,
  `nama_bidang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_bidang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_bidang
-- ----------------------------
INSERT INTO `tb_bidang` VALUES (1, 'Cipta Karya');
INSERT INTO `tb_bidang` VALUES (2, 'Bina Marga');
INSERT INTO `tb_bidang` VALUES (3, 'Tata Ruang');
INSERT INTO `tb_bidang` VALUES (5, 'Perumahan dan Permukiman');
INSERT INTO `tb_bidang` VALUES (6, 'Sekertariat');
INSERT INTO `tb_bidang` VALUES (8, 'Tidak Ada');

-- ----------------------------
-- Table structure for tb_format3
-- ----------------------------
DROP TABLE IF EXISTS `tb_format3`;
CREATE TABLE `tb_format3`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_belanja` int NULL DEFAULT NULL,
  `bendahara` int NULL DEFAULT NULL,
  `penerima` int NULL DEFAULT NULL,
  `pengguna_angg` int NULL DEFAULT NULL,
  `ppk` int NULL DEFAULT NULL,
  `pptk` int NULL DEFAULT NULL,
  `no_sppls` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_spm` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_spm` date NULL DEFAULT NULL,
  `nilai` int NULL DEFAULT NULL,
  `jml_angg` int NULL DEFAULT NULL,
  `realisasi` int NULL DEFAULT NULL,
  `sisa_angg1` int NULL DEFAULT NULL,
  `jml_diminta` int NULL DEFAULT NULL,
  `sisa_angg2` int NULL DEFAULT NULL,
  `id_prog` int NULL DEFAULT NULL,
  `id_keg` int NULL DEFAULT NULL,
  `id_subkeg` int NULL DEFAULT NULL,
  `ppn` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph21` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph22` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph23` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph25` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('PROCESS','DONE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'PROCESS',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode_spm`(`kode_spm` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_format3
-- ----------------------------
INSERT INTO `tb_format3` VALUES (33, 8, NULL, 2, 3, 4, 5, '', '02/SPM-LS-DPUPRPR/VII/2023', NULL, '2023-08-05', 10000000, 2000000, 200000, 1800000, 1000000, 800000, 3, 5, 5, '0', '0', '0', '0', '0', 'iYKCZWRqZmpna2Fm', 'PROCESS');

-- ----------------------------
-- Table structure for tb_format4
-- ----------------------------
DROP TABLE IF EXISTS `tb_format4`;
CREATE TABLE `tb_format4`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_belanja` int NULL DEFAULT NULL,
  `bendahara` int NULL DEFAULT NULL,
  `penerima` int NULL DEFAULT NULL,
  `pengguna_angg` int NULL DEFAULT NULL,
  `ppk_keuangan` int NULL DEFAULT NULL,
  `ppk` int NULL DEFAULT NULL,
  `no_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kadis` int NULL DEFAULT NULL,
  `no_sppls` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_kwitansi` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_pembayaran` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_spm` date NULL DEFAULT NULL,
  `nilai` int NULL DEFAULT NULL,
  `jml_angg` int NULL DEFAULT NULL,
  `realisasi` int NULL DEFAULT NULL,
  `sisa_angg1` int NULL DEFAULT NULL,
  `jml_diminta` int NULL DEFAULT NULL,
  `sisa_angg2` int NULL DEFAULT NULL,
  `id_prog` int NULL DEFAULT NULL,
  `id_keg` int NULL DEFAULT NULL,
  `id_subkeg` int NULL DEFAULT NULL,
  `ppn` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph21` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph22` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph23` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph25` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('PROCESS','DONE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'PROCESS',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode_spm`(`kode_spm` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_format4
-- ----------------------------
INSERT INTO `tb_format4` VALUES (34, 8, 1, 2, 3, 4, 5, '097/.SPM/DPUPRPR-BB/2023', 6, '100/PUPR/2023', '100/DPUPR.PR-BB/2023', 'LS', '2023-08-06', 10000000, 2000000, 500000, 1500000, 200000, 1300000, 3, 4, 4, '0', '0', '0', '0', '0', 'iYKCZWRrZmpna2Jqa2ZlZWU=', 'PROCESS');

-- ----------------------------
-- Table structure for tb_format5
-- ----------------------------
DROP TABLE IF EXISTS `tb_format5`;
CREATE TABLE `tb_format5`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_spm` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_no_spm` date NULL DEFAULT NULL,
  `besaran` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ppk_keuangan_skpd` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun_anggaran` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_uang` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `untuk_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pptk` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_tagihan` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rekening_belanja` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_belanja` int NULL DEFAULT NULL,
  `pihak_penyedia` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_perusahaan` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pihak_kesatu` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pihak_kedua` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npwp` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_rekening` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bank` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_kontrak` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_kontrak` date NULL DEFAULT NULL,
  `no_amandemen` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_amandemen` date NULL DEFAULT NULL,
  `nilai_kontrak` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pembayaran` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `realisasi_bln_lalu1` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pot_uang_muka1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ppn` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'PROCESS',
  `pph11` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pot40` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `realisasi_bln_lalu2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pot45` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_pot_pajak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sisa_dana` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('PROCESS','DONE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'PROCESS',
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode_spm`(`pot_uang_muka1` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_format5
-- ----------------------------
INSERT INTO `tb_format5` VALUES (35, 'NOMOR SPM', '2023-08-09', '10000000', '1', '2023', '20000000', 'UNTUK PEMBAYARAN', 'PPTK', '5', '7', 8, 'Pihak Penyedia', 'Nama Perusahaan', '1', '1', 'PEKERJAAN', 'NPWP', '123121231', 'BNI', 'NOMOR KONTRAK', '2023-08-09', 'NOMOR AMANDEMEN', '2023-08-09', '3.099.148.533', '3.099.148.533', '0', '929.744.566', '81.387.549', '739.886.810', '1.239.659.413', NULL, '418.385.054', '821.274.359', '14.797.736', '96.185.285', '725.089.074', 'PROCESS', 'iYKCZWRuZmpna2JlbWVlZWZo');

-- ----------------------------
-- Table structure for tb_jenis_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_kegiatan`;
CREATE TABLE `tb_jenis_kegiatan`  (
  `id_jenis_kegiatan` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_jenis_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_jenis_kegiatan
-- ----------------------------
INSERT INTO `tb_jenis_kegiatan` VALUES (3, 'Penyelenggaran Jalan Kabupaten / Kota');
INSERT INTO `tb_jenis_kegiatan` VALUES (4, 'Pengembangan dan Pengelolaan Sistem Irigasi Primer dan Sekunder pada Daerah Irigasi yang Luasnya dibawah 1000 Ha dalam 1 (Satu) Daerah\r\nKabupaten/Kota');
INSERT INTO `tb_jenis_kegiatan` VALUES (5, 'Pengelolaan SDA dan Bangunan Pengaman Pantai pada Wilayah Sungai (WS) dalam 1 (Satu) Daerah Kabupaten/Kota');

-- ----------------------------
-- Table structure for tb_jenis_program
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_program`;
CREATE TABLE `tb_jenis_program`  (
  `id_jenis_program` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_bidang` int NOT NULL,
  PRIMARY KEY (`id_jenis_program`) USING BTREE,
  INDEX `id_bidang`(`id_bidang` ASC) USING BTREE,
  CONSTRAINT `tb_jenis_program_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_jenis_program
-- ----------------------------
INSERT INTO `tb_jenis_program` VALUES (3, 'PENYELENGGARAAN JALAN', 2);
INSERT INTO `tb_jenis_program` VALUES (4, 'PROGRAM TES', 2);

-- ----------------------------
-- Table structure for tb_jenis_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_sasaran`;
CREATE TABLE `tb_jenis_sasaran`  (
  `id_jenis_sasaran` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_sasaran` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_jenis_sasaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_jenis_sasaran
-- ----------------------------
INSERT INTO `tb_jenis_sasaran` VALUES (3, 'Meningkatnya kemantapan infrastruktur kondisi jalan');
INSERT INTO `tb_jenis_sasaran` VALUES (4, 'Meningkatnya jumlah kualitas daerah irigasi');

-- ----------------------------
-- Table structure for tb_jenis_sub_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_sub_kegiatan`;
CREATE TABLE `tb_jenis_sub_kegiatan`  (
  `id_jenis_sub_kegiatan` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_sub_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_jenis_sub_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_jenis_sub_kegiatan
-- ----------------------------
INSERT INTO `tb_jenis_sub_kegiatan` VALUES (3, 'Penyusunan Rencana, Kebijakan, Strategi dan Teknis Sistem Pengembangan Jalan');
INSERT INTO `tb_jenis_sub_kegiatan` VALUES (4, 'Pembangunan Bendung Irigasi');
INSERT INTO `tb_jenis_sub_kegiatan` VALUES (5, 'Pembangunan Bangunan Perkuatan Tebing');

-- ----------------------------
-- Table structure for tb_jenis_tagihan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_tagihan`;
CREATE TABLE `tb_jenis_tagihan`  (
  `id_jenis_tagihan` int NOT NULL AUTO_INCREMENT,
  `nama_jenis_tagihan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_jenis_tagihan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_jenis_tagihan
-- ----------------------------
INSERT INTO `tb_jenis_tagihan` VALUES (1, 'Tidak Ada');
INSERT INTO `tb_jenis_tagihan` VALUES (2, 'Belanja Modal');
INSERT INTO `tb_jenis_tagihan` VALUES (3, 'Belanja Barang & Jasa');
INSERT INTO `tb_jenis_tagihan` VALUES (5, 'Belanja Pegawai');

-- ----------------------------
-- Table structure for tb_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kegiatan`;
CREATE TABLE `tb_kegiatan`  (
  `id_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis_kegiatan` int NOT NULL,
  `sasaran_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `indikator_kinerja_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_program` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE,
  INDEX `id_program`(`id_program` ASC) USING BTREE,
  INDEX `id_jenis_kegiatan`(`id_jenis_kegiatan` ASC) USING BTREE,
  CONSTRAINT `tb_kegiatan_ibfk_2` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `tb_jenis_kegiatan` (`id_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_kegiatan_ibfk_3` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kegiatan
-- ----------------------------
INSERT INTO `tb_kegiatan` VALUES ('w9y9e4ihiuq030ctj93dq9e2cpusz2', 3, 'Tercapainya panjang Jalan yang dibangun dan ditingkatkan', 'Panjang Jalan yang diselenggarakan', 'KM', 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n');

-- ----------------------------
-- Table structure for tb_kode
-- ----------------------------
DROP TABLE IF EXISTS `tb_kode`;
CREATE TABLE `tb_kode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kode
-- ----------------------------
INSERT INTO `tb_kode` VALUES (21, 'iYKCZWRrZmpna2Jqa2ZlZWU=');
INSERT INTO `tb_kode` VALUES (22, 'iYKCZWRuZmpna2JlbGVuZWZn');
INSERT INTO `tb_kode` VALUES (23, 'iYKCZWRuZmpna2JlbWVlZWZo');

-- ----------------------------
-- Table structure for tb_kp_belanja
-- ----------------------------
DROP TABLE IF EXISTS `tb_kp_belanja`;
CREATE TABLE `tb_kp_belanja`  (
  `id_kp_belanja` int NOT NULL AUTO_INCREMENT,
  `id_rek` int NOT NULL,
  `id_renja_sub` int NOT NULL,
  `total_kp_belanja` double NOT NULL,
  `status_kp_belanja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kp_belanja`) USING BTREE,
  INDEX `id_rek`(`id_rek` ASC) USING BTREE,
  INDEX `id_renja_sub`(`id_renja_sub` ASC) USING BTREE,
  CONSTRAINT `tb_kp_belanja_ibfk_1` FOREIGN KEY (`id_rek`) REFERENCES `tb_rek` (`id_rek`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_kp_belanja_ibfk_2` FOREIGN KEY (`id_renja_sub`) REFERENCES `tb_renja_sub` (`id_renja_sub`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kp_belanja
-- ----------------------------
INSERT INTO `tb_kp_belanja` VALUES (1, 4, 1, 0, 'tunggu');
INSERT INTO `tb_kp_belanja` VALUES (2, 4, 2, 40000000, 'tunggu');
INSERT INTO `tb_kp_belanja` VALUES (3, 6, 1, 40, 'tunggu');
INSERT INTO `tb_kp_belanja` VALUES (4, 7, 1, 100, 'tunggu');

-- ----------------------------
-- Table structure for tb_lampiran_format3
-- ----------------------------
DROP TABLE IF EXISTS `tb_lampiran_format3`;
CREATE TABLE `tb_lampiran_format3`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pegawai` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `pg_dari` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pg_tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pg_jml_satuan` int NULL DEFAULT NULL,
  `pg_qty` int NULL DEFAULT NULL,
  `pg_hari` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pg_total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pl_dari` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pl_tujuan` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pl_jml_satuan` int NULL DEFAULT NULL,
  `pl_qty` int NULL DEFAULT NULL,
  `pl_hari` int NULL DEFAULT NULL,
  `pl_total` int NULL DEFAULT NULL,
  `pangkat1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_uh1` int NULL DEFAULT NULL,
  `qty_uh1` int NULL DEFAULT NULL,
  `jml_huh1` int NULL DEFAULT NULL,
  `total_uh1` int NULL DEFAULT NULL,
  `pangkat2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_uh2` int NULL DEFAULT NULL,
  `qty_uh2` int NULL DEFAULT NULL,
  `jml_huh2` int NULL DEFAULT NULL,
  `total_uh2` int NULL DEFAULT NULL,
  `pangkat3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_uh3` int NULL DEFAULT NULL,
  `qty_uh3` int NULL DEFAULT NULL,
  `jml_huh3` int NULL DEFAULT NULL,
  `total_uh3` int NULL DEFAULT NULL,
  `tempat_penginapan1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_up1` int NULL DEFAULT NULL,
  `qty_up1` int NULL DEFAULT NULL,
  `jml_hup1` int NULL DEFAULT NULL,
  `total_up1` int NULL DEFAULT NULL,
  `tempat_penginapan2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml_up2` int NULL DEFAULT NULL,
  `qty_up2` int NULL DEFAULT NULL,
  `jml_hup2` int NULL DEFAULT NULL,
  `total_up2` int NULL DEFAULT NULL,
  `total_semua_pp` int NULL DEFAULT NULL,
  `total_semua_uh` int NULL DEFAULT NULL,
  `total_semua_up` int NULL DEFAULT NULL,
  `total_semua` int NULL DEFAULT NULL,
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('PROCESS','DONE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_lampiran_format3
-- ----------------------------
INSERT INTO `tb_lampiran_format3` VALUES (5, 6, '2023-08-06', 'GORONTALO', 'JAKARATA', 1686368, 1, '1', '1686368', '', '', 2272589, 1, 1, 2272589, 'Gol. III', 530000, 1, 4, 2120000, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 'Hotel', 540000, 1, 1, 540000, NULL, 450000, 1, 2, 900000, 3958957, 2120000, 1440000, 8890957, 'iYKCZWRrZmpna2JpaWNlZWU=', 'PROCESS');

-- ----------------------------
-- Table structure for tb_lampiran_format5
-- ----------------------------
DROP TABLE IF EXISTS `tb_lampiran_format5`;
CREATE TABLE `tb_lampiran_format5`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_fisik` int NULL DEFAULT NULL,
  `ppn` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `pptk` int NULL DEFAULT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direktur_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_lampiran_format5
-- ----------------------------
INSERT INTO `tb_lampiran_format5` VALUES (1, 'Nilai Kontrak', 2147483647, 307122830, 309914853, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tb_nota_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_nota_pesanan`;
CREATE TABLE `tb_nota_pesanan`  (
  `id_nota_pesanan` int NOT NULL AUTO_INCREMENT,
  `id_tagihan` int NOT NULL,
  `nama_barang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `merek` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jml_brg` double NOT NULL,
  `satuan_brg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hrg_satuan` double NOT NULL,
  `total_hrg` double NOT NULL,
  `ket_nota` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_nota_pesanan`) USING BTREE,
  INDEX `id_tagihan`(`id_tagihan` ASC) USING BTREE,
  CONSTRAINT `tb_nota_pesanan_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_nota_pesanan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `golongan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bidang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pegawai
-- ----------------------------
INSERT INTO `tb_pegawai` VALUES (1, 'Hi. NIRWAN UTIARAHMAN, ST., M.Si', '12345678 123456 1 001', 'KEPALA DINAS', 'PENATA III/d', 'DINAS PUPR');
INSERT INTO `tb_pegawai` VALUES (2, 'VERONIKA ALI, S.Akun.', '12345678 123456 1 001', 'BENDAHARA', 'PENATA III/d', 'SEKRETARIAT');
INSERT INTO `tb_pegawai` VALUES (3, 'ANITA THERESIA DJAKARIA, ST', '19810811 200604 2 014', 'SEKRETARIS', NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (4, 'HI. NIRWAN UTIARAHMAN, ST.,M.Si', '19731013 200312 1 007', 'KEPALA DINAS', NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (5, 'FEVI PONGOLIU, S.AP', '19821219 201407 2 002', NULL, NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (6, 'AZWAR KABADO, ST', NULL, NULL, NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (7, 'RAHMAN HASAN., ST. M.Si', '19700619 200501 1 011', 'KUASA PENGGUNA ANGGARAN', NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (8, 'NASRUDIN M., ST.', '1980015 201001 1 019', 'PPTK', NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (9, 'WAHYUDIN USULU, SE', '19770719 200604 1 012', 'PEJABAT PENATAUSAHAAN KEUANGAN', NULL, NULL);
INSERT INTO `tb_pegawai` VALUES (10, 'SRI YULIN VAN GOBEL', '19840703 201407 2 005', 'BENDAHARA PENGELUARAN PEMBANTU', NULL, NULL);

-- ----------------------------
-- Table structure for tb_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_pembayaran`;
CREATE TABLE `tb_pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_belanja` int NULL DEFAULT NULL,
  `no_kwitansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_pembayaran` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `no_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_spm` date NULL DEFAULT NULL,
  `nilai` int NULL DEFAULT NULL,
  `jml_angg` int NULL DEFAULT NULL,
  `realisasi` int NULL DEFAULT NULL,
  `sisa_angg1` int NULL DEFAULT NULL,
  `jml_diminta` int NULL DEFAULT NULL,
  `sisa_angg2` int NULL DEFAULT NULL,
  `id_prog` int NULL DEFAULT NULL,
  `id_keg` int NULL DEFAULT NULL,
  `id_subkeg` int NULL DEFAULT NULL,
  `ppn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph21` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph22` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph23` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pph25` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bendahara` int NULL DEFAULT NULL,
  `penerima` int NULL DEFAULT NULL,
  `pengguna_angg` int NULL DEFAULT NULL,
  `tanda_bukti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('PROCESS','DONE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for tb_perumahan_rakyat
-- ----------------------------
DROP TABLE IF EXISTS `tb_perumahan_rakyat`;
CREATE TABLE `tb_perumahan_rakyat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nm_pju` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_meter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `daya` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_desa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kd_desa`(`kd_desa` ASC) USING BTREE,
  INDEX `kd_kecamatan`(`kd_kecamatan` ASC) USING BTREE,
  CONSTRAINT `desa` FOREIGN KEY (`kd_desa`) REFERENCES `dt_desa` (`kd_desa`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `kecamatan` FOREIGN KEY (`kd_kecamatan`) REFERENCES `dt_kecamatan` (`kd_kecamatan`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_perumahan_rakyat
-- ----------------------------
INSERT INTO `tb_perumahan_rakyat` VALUES (1, 'PJU LONGALO', '32 - 1480 - 2628 - 2', '450', 'DESA LONGALO, KEC. BULANGO UTARA', '75.03.05.2004', '75.03.05', 502500);
INSERT INTO `tb_perumahan_rakyat` VALUES (2, 'PJU LONGALO IV', '32 - 1480 - 2625 - 8', '450', 'LONGALO', '75.03.05.2004', '75.03.05', 502500);
INSERT INTO `tb_perumahan_rakyat` VALUES (3, 'PJU SUKA DAMAI', '86 - 0260 - 4674 - 7', '1300', 'SUKA DAMAI, KEC. BULANGO UTARA', '75.03.05.2012', '75.03.05', 1002500);
INSERT INTO `tb_perumahan_rakyat` VALUES (4, 'PJU BULANGO UTARA 2', '86 - 0260 - 5905 - 4', '1300', 'KEC. BULANGO UTARA', NULL, '75.03.05', 1002500);
INSERT INTO `tb_perumahan_rakyat` VALUES (5, 'PJU TAPA 1', '32 - 1700 - 4656 - 2', '4400', 'PERTIGAAN DESA POPODU', '75.03.16.2003', '75.03.16', 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (6, 'PJU TAPA 2', '45 - 0573 - 5763 - 9', '5500', 'KOMPLEKS LAPANGAN IPPOT TAPA', NULL, NULL, 5003600);
INSERT INTO `tb_perumahan_rakyat` VALUES (7, 'PJU TAPA 3', '32 - 0152 - 3799 - 6', '3500', 'BUNDARAN PASAR KAMIS TAPA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (8, 'PJU KABILA 1', '86 - 0244 - 0905 - 3', '1300', 'JLN. PERPAT PAUWO - TUMBIHE', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (9, 'PJU KABILA 2', '86 - 0244 - 3156 - 0', '1300', 'JLN. SAWAH BESAR PEREMPATAN LEPING', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (10, 'PJU BYPASS 6', '32 - 1195 - 3847 - 1', '7700', 'TOTO UTARA, KEC. KABILA', NULL, NULL, 5002500);
INSERT INTO `tb_perumahan_rakyat` VALUES (11, 'PJU BYPASS 7', '32 - 1195 - 3847 - 1', '7700', 'TOTO UTARA, KEC. KABILA', NULL, NULL, 5002500);
INSERT INTO `tb_perumahan_rakyat` VALUES (12, 'PJU BOTUPINGGE BB 1', '86 - 0119 - 5183 - 6', '4400', 'DESA PANGGULO, KEC. BOTUPINGGE', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (13, 'PJU BOTUPINGGE BB 3', '14 - 0137 - 8073 - 0', '5500', 'DESA LUWOHU, KEC. BOTUPINGGE', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (14, 'PJU BOTUPINGGE BB 4', '32 - 1750 - 6891 - 8', '3500', 'DESA TIMBUOLO, KEC. BOTUPINGGE', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (15, 'PJU BOTUPINGGE BB 5', '86 - 0260 - 4844 - 5', '5500', 'DESA BUATA, KEC. BOTUPINGGE', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (16, 'PJU BOTUPINGGE BB 7', '32 - 9001 - 2483 - 8', '16500', 'KEC. BOTUPINGGE', NULL, NULL, 2005000);
INSERT INTO `tb_perumahan_rakyat` VALUES (17, 'PJU BY PASS 2', '32 - 1341 - 4782 - 9', '5500', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 5002500);
INSERT INTO `tb_perumahan_rakyat` VALUES (18, 'PJU BY PASS 3', '32 - 0158 - 3189 - 7', '4400', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (19, 'PJU BY PASS 4 (ALUN - ALUN)', '32 - 1341 - 4790 - 2', '5500', 'DESA ILOHELUMA, KEC. TILONGKABILA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (20, 'LAMPU TAMAN KOTA BARU', '14 - 0436 - 6439 - 1', '1300', 'DESA ILOHELUMA KEC. TILONGKABILA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (21, 'PJU PESANTREN AL - MADINAH', '31 - 6500 - 7510 - 31', '2200', 'ILOHELUMA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (22, 'PJU MANDIRI', '86 - 0614 - 3400 - 6', '1300', 'DESA BUTU, TILONGKABILA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (23, 'PJU BY PASS X', '14 - 4373 - 0029 - 7', '3500', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 2005000);
INSERT INTO `tb_perumahan_rakyat` VALUES (24, 'PJU BY PASS XI', '14 - 4373 - 1004 - 9', '3500', 'DESA MOUTONG, KEC. TILONGKABILA', NULL, NULL, 2005000);
INSERT INTO `tb_perumahan_rakyat` VALUES (25, 'LAMPU TAMAN KOTA 2 BONBOL', '14 - 0436 - 1061 - 8', '900', 'DESA ILOHELUMA, KEC. TILONGKABILA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (26, 'PJU BY PASS 1', '14 - 0707 - 7858 - 5', '6600', 'DESA ULANTA, KEC. SUWAWA', NULL, NULL, 3007500);
INSERT INTO `tb_perumahan_rakyat` VALUES (27, 'TAMAN TAQWA', '32 - 9023 - 6456 - 4', '23000', 'DESA ULANTA', NULL, NULL, 5002500);
INSERT INTO `tb_perumahan_rakyat` VALUES (28, 'PJU 1 SUWAWA (KANTOR BUPATI)', '86 - 0244 - 0748 - 7', '1300', 'KANTOR BUPATI (POS SATPOL)', NULL, NULL, 3007500);

-- ----------------------------
-- Table structure for tb_pihak_kedua
-- ----------------------------
DROP TABLE IF EXISTS `tb_pihak_kedua`;
CREATE TABLE `tb_pihak_kedua`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nm_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pihak_kedua
-- ----------------------------
INSERT INTO `tb_pihak_kedua` VALUES (1, 'CV. BANGUNTAMA JOHAN SEJAHTERA', 'TUTIK FERAWATI', 'Direktur Cabang');

-- ----------------------------
-- Table structure for tb_pot_tagihan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pot_tagihan`;
CREATE TABLE `tb_pot_tagihan`  (
  `id_pot_tagihan` int NOT NULL AUTO_INCREMENT,
  `id_tagihan` int NOT NULL,
  `id_potongan` int NOT NULL,
  `ket_tambahan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pot_tagihan`) USING BTREE,
  INDEX `id_tagihan`(`id_tagihan` ASC) USING BTREE,
  INDEX `id_potongan`(`id_potongan` ASC) USING BTREE,
  CONSTRAINT `tb_pot_tagihan_ibfk_1` FOREIGN KEY (`id_potongan`) REFERENCES `tb_potongan` (`id_potongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_pot_tagihan_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pot_tagihan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_potongan
-- ----------------------------
DROP TABLE IF EXISTS `tb_potongan`;
CREATE TABLE `tb_potongan`  (
  `id_potongan` int NOT NULL AUTO_INCREMENT,
  `nama_potongan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `persentase` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket_pot` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_pot` int NOT NULL,
  PRIMARY KEY (`id_potongan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_potongan
-- ----------------------------
INSERT INTO `tb_potongan` VALUES (1, 'PPN', '11/100', 'PPN 11%', 1);
INSERT INTO `tb_potongan` VALUES (2, 'PPN', '11/111', 'PPN 11/111', 0);
INSERT INTO `tb_potongan` VALUES (3, 'PPH PSL 21', '5/100', 'PPH 5%', 1);
INSERT INTO `tb_potongan` VALUES (4, 'PPH PSL 21', '15/100', 'PPH 15%', 1);
INSERT INTO `tb_potongan` VALUES (5, 'PPH PSL 22', '1.5/100', 'PPH PSL 23 1.5%', 1);
INSERT INTO `tb_potongan` VALUES (6, 'PPH PSL 4 AYAT 2', '2/100', 'PPH PSL 4 AYAT 2 2%', 1);
INSERT INTO `tb_potongan` VALUES (7, 'PPH PSL 4 AYAT 2', '3/100', 'PPH PSL 4 AYAT 2 3%', 1);
INSERT INTO `tb_potongan` VALUES (8, 'Potongan Uang Muka', '-', 'Potongan Uang Muka', 2);
INSERT INTO `tb_potongan` VALUES (9, 'Potongan Denda', '-', 'Potongan Denda', 2);

-- ----------------------------
-- Table structure for tb_ppb
-- ----------------------------
DROP TABLE IF EXISTS `tb_ppb`;
CREATE TABLE `tb_ppb`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_diterima` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `transport` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_ppb
-- ----------------------------

-- ----------------------------
-- Table structure for tb_program
-- ----------------------------
DROP TABLE IF EXISTS `tb_program`;
CREATE TABLE `tb_program`  (
  `id_program` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis_program` int NOT NULL,
  `sasaran_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `indikator_kinerja_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `formulasi_indikator_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_sasaran` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_program`) USING BTREE,
  INDEX `id_sasaran`(`id_sasaran` ASC) USING BTREE,
  INDEX `id_jenis_program`(`id_jenis_program` ASC) USING BTREE,
  CONSTRAINT `tb_program_ibfk_2` FOREIGN KEY (`id_jenis_program`) REFERENCES `tb_jenis_program` (`id_jenis_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_program
-- ----------------------------
INSERT INTO `tb_program` VALUES ('dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 3, 'Meningkatnya kualitas jalan', 'Persentase Jalan Dalaam Kondisi Mantap', 'Panjang jalan yang dibangun/panjang jalan kabupaten X 100', 'KM', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke');

-- ----------------------------
-- Table structure for tb_rek
-- ----------------------------
DROP TABLE IF EXISTS `tb_rek`;
CREATE TABLE `tb_rek`  (
  `id_rek` int NOT NULL AUTO_INCREMENT,
  `no_rek` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_rek` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis_tagihan` int NOT NULL,
  PRIMARY KEY (`id_rek`) USING BTREE,
  INDEX `id_jenis_tagihan`(`id_jenis_tagihan` ASC) USING BTREE,
  CONSTRAINT `tb_rek_ibfk_1` FOREIGN KEY (`id_jenis_tagihan`) REFERENCES `tb_jenis_tagihan` (`id_jenis_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_rek
-- ----------------------------
INSERT INTO `tb_rek` VALUES (3, '5.1.01.03.07.0001', 'Belanja Honorarium Penanggungjawaban Pengelola Keuangan', 3);
INSERT INTO `tb_rek` VALUES (4, '5.1.02.02.01.0041', 'Belanja Honorarium Pengadaan Barang/Jasa', 3);
INSERT INTO `tb_rek` VALUES (5, '5.1.02.01.01.0024', 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor', 2);
INSERT INTO `tb_rek` VALUES (6, '5.1.02.02.01.0026', 'Belanja Jasa Tenaga Administrasi', 3);
INSERT INTO `tb_rek` VALUES (7, '5.1.02.04.01.0001', 'Belanja Perjalanan Dinas', 5);

-- ----------------------------
-- Table structure for tb_renja_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_renja_kegiatan`;
CREATE TABLE `tb_renja_kegiatan`  (
  `id_renja_kegiatan` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rk_tahun` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rk_target_fisik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rk_target_anggaran` double NOT NULL,
  PRIMARY KEY (`id_renja_kegiatan`) USING BTREE,
  INDEX `id_kegiatan`(`id_kegiatan` ASC) USING BTREE,
  CONSTRAINT `tb_renja_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_renja_kegiatan
-- ----------------------------
INSERT INTO `tb_renja_kegiatan` VALUES (2, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', '2022', '0', 0);
INSERT INTO `tb_renja_kegiatan` VALUES (3, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', '2023', '0', 0);

-- ----------------------------
-- Table structure for tb_renja_program
-- ----------------------------
DROP TABLE IF EXISTS `tb_renja_program`;
CREATE TABLE `tb_renja_program`  (
  `id_renja_program` int NOT NULL AUTO_INCREMENT,
  `id_program` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rp_tahun` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rp_target_fisik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rp_target_anggaran` double NOT NULL,
  PRIMARY KEY (`id_renja_program`) USING BTREE,
  INDEX `id_program`(`id_program` ASC) USING BTREE,
  CONSTRAINT `tb_renja_program_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_renja_program
-- ----------------------------
INSERT INTO `tb_renja_program` VALUES (1, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', '2022', '0', 0);
INSERT INTO `tb_renja_program` VALUES (2, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', '2023', '0', 0);

-- ----------------------------
-- Table structure for tb_renja_sub
-- ----------------------------
DROP TABLE IF EXISTS `tb_renja_sub`;
CREATE TABLE `tb_renja_sub`  (
  `id_renja_sub` int NOT NULL AUTO_INCREMENT,
  `id_sub_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rs_tahun` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rs_target_fisik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rs_target_anggaran` double NOT NULL,
  PRIMARY KEY (`id_renja_sub`) USING BTREE,
  INDEX `id_sub_kegiatan`(`id_sub_kegiatan` ASC) USING BTREE,
  CONSTRAINT `tb_renja_sub_ibfk_1` FOREIGN KEY (`id_sub_kegiatan`) REFERENCES `tb_sub_kegiatan` (`id_sub_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_renja_sub
-- ----------------------------
INSERT INTO `tb_renja_sub` VALUES (1, 'hu6iy2hnq4419sf34hbmttsyq30r32', '2022', '0', 0);
INSERT INTO `tb_renja_sub` VALUES (2, 'hu6iy2hnq4419sf34hbmttsyq30r32', '2023', '0', 0);

-- ----------------------------
-- Table structure for tb_respon
-- ----------------------------
DROP TABLE IF EXISTS `tb_respon`;
CREATE TABLE `tb_respon`  (
  `id_respon` int NOT NULL AUTO_INCREMENT,
  `nama_respon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_role_respon` int NOT NULL,
  `id_bidang` int NOT NULL,
  PRIMARY KEY (`id_respon`) USING BTREE,
  INDEX `id_role_respon`(`id_role_respon` ASC) USING BTREE,
  INDEX `id_bidang`(`id_bidang` ASC) USING BTREE,
  CONSTRAINT `tb_respon_ibfk_1` FOREIGN KEY (`id_role_respon`) REFERENCES `tb_role_respon` (`id_role_respon`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_respon_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_respon
-- ----------------------------
INSERT INTO `tb_respon` VALUES (1, 'Holis Nur, S.Kom', '196111051981122006', 1, 2);
INSERT INTO `tb_respon` VALUES (2, 'Afdal Yado, S.Kom', '196111051981124213', 3, 2);
INSERT INTO `tb_respon` VALUES (4, 'Halim Iyou, S.Kom', '110200937005', 3, 2);
INSERT INTO `tb_respon` VALUES (5, 'Abd. Rahim A. Bagu, S.Kom', '110200937006', 2, 2);

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role`  (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES (1, 'Perencanaan');
INSERT INTO `tb_role` VALUES (2, 'Keuangan');
INSERT INTO `tb_role` VALUES (3, 'Kepegawaian');
INSERT INTO `tb_role` VALUES (4, 'Admin');

-- ----------------------------
-- Table structure for tb_role_respon
-- ----------------------------
DROP TABLE IF EXISTS `tb_role_respon`;
CREATE TABLE `tb_role_respon`  (
  `id_role_respon` int NOT NULL AUTO_INCREMENT,
  `nama_role` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `singkatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_role_respon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_role_respon
-- ----------------------------
INSERT INTO `tb_role_respon` VALUES (1, 'Pengguna Anggaran', 'PA');
INSERT INTO `tb_role_respon` VALUES (2, 'Kuasa Pengguna Anggaran', 'KPA');
INSERT INTO `tb_role_respon` VALUES (3, 'Pejabat Pelaksana Teknis Kegiatan', 'PPTK');
INSERT INTO `tb_role_respon` VALUES (4, 'Bendahara Pengeluaran', 'Bendahara Pengeluaran');
INSERT INTO `tb_role_respon` VALUES (5, 'Pejabat Penata Usaha Keuangan', 'PPK');

-- ----------------------------
-- Table structure for tb_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_sasaran`;
CREATE TABLE `tb_sasaran`  (
  `id_sasaran` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis_sasaran` int NOT NULL,
  `indikator_kerja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `formulasi_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_sasaran`) USING BTREE,
  INDEX `id_jenis_sasaran`(`id_jenis_sasaran` ASC) USING BTREE,
  CONSTRAINT `tb_sasaran_ibfk_1` FOREIGN KEY (`id_jenis_sasaran`) REFERENCES `tb_jenis_sasaran` (`id_jenis_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_sasaran
-- ----------------------------
INSERT INTO `tb_sasaran` VALUES ('tx0rfkk3jx84n1ei81efxc1fud1wsa', 4, 'Rasio Luas Daerah Irigasi kewenangan kabupaten', 'Luas irigasi kewenangan kabupaten yang dilayani oleh jaringan irigasi yang dibangun / Luas Cakupan Wilayah Irigasi Kabupaten x 100 %', 'persen');
INSERT INTO `tb_sasaran` VALUES ('z1gev6dfq9f45wk1nqpg5wx3fd8xke', 3, 'Persentase Panjang Jalan Kabupaten dalam kondisi mantap', 'Panjang jalan dalam kondisi mantap/ total panjang jalan kab x 100', 'persen');

-- ----------------------------
-- Table structure for tb_satuan
-- ----------------------------
DROP TABLE IF EXISTS `tb_satuan`;
CREATE TABLE `tb_satuan`  (
  `id_satuan` int NOT NULL AUTO_INCREMENT,
  `satuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_satuan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_satuan
-- ----------------------------
INSERT INTO `tb_satuan` VALUES (3, 'Orang/bulan');
INSERT INTO `tb_satuan` VALUES (4, 'Buah');

-- ----------------------------
-- Table structure for tb_spm
-- ----------------------------
DROP TABLE IF EXISTS `tb_spm`;
CREATE TABLE `tb_spm`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_belanja` int NULL DEFAULT NULL,
  `no_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_spm` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_spm` date NULL DEFAULT NULL,
  `nilai` int NULL DEFAULT NULL,
  `jml_angg` int NULL DEFAULT NULL,
  `realisasi` int NULL DEFAULT NULL,
  `sisa_angg1` int NULL DEFAULT NULL,
  `jml_diminta` int NULL DEFAULT NULL,
  `sisa_angg2` int NULL DEFAULT NULL,
  `id_prog` int NULL DEFAULT NULL,
  `id_keg` int NULL DEFAULT NULL,
  `id_subkeg` int NULL DEFAULT NULL,
  `ppn` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pp21` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pp22` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pp23` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pp25` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_spm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanda_bukti` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('PROCESS','DONE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'PROCESS',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode_spm`(`kode_spm` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_spm
-- ----------------------------
INSERT INTO `tb_spm` VALUES (2, 8, '776/SPM-LS/DPUPRPR/2022', 'LS', '2022-10-17', 84165400, 1621500000, 946960666, 674539334, 84165400, 590373934, 3, 3, NULL, '0', '0', '0', '0', '0', 'iYKCZWVoZmpna2JlbGJqZWZp', 'BonBolfix4.jpg', 'PROCESS');

-- ----------------------------
-- Table structure for tb_sub_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_sub_kegiatan`;
CREATE TABLE `tb_sub_kegiatan`  (
  `id_sub_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis_sub_kegiatan` int NOT NULL,
  `sasaran_sub_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `indikator_kinerja_sub_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_sub_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_sub_kegiatan`) USING BTREE,
  INDEX `id_kegiatan`(`id_kegiatan` ASC) USING BTREE,
  INDEX `id_jenis_sub_kegiatan`(`id_jenis_sub_kegiatan` ASC) USING BTREE,
  CONSTRAINT `tb_sub_kegiatan_ibfk_2` FOREIGN KEY (`id_jenis_sub_kegiatan`) REFERENCES `tb_jenis_sub_kegiatan` (`id_jenis_sub_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_sub_kegiatan_ibfk_3` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_sub_kegiatan
-- ----------------------------
INSERT INTO `tb_sub_kegiatan` VALUES ('hu6iy2hnq4419sf34hbmttsyq30r32', 3, 'Tercapainya Panjang jalan yang dibangun dan ditingkatkan', 'Panjang jalan yang dibangun', 'M', 'w9y9e4ihiuq030ctj93dq9e2cpusz2');

-- ----------------------------
-- Table structure for tb_tagihan
-- ----------------------------
DROP TABLE IF EXISTS `tb_tagihan`;
CREATE TABLE `tb_tagihan`  (
  `id_tagihan` int NOT NULL AUTO_INCREMENT,
  `id_belanja` int NOT NULL,
  `deskripsi_uraian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_kontrak` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_kontrak` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_bendahara` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kpa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_perusahaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_penerima` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip_penerima` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_tagihan` double NOT NULL,
  `persentase_fisik` double NOT NULL,
  `foto_bukti` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai_fisik` double NOT NULL,
  `satuan_fisik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_approval` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_approval` date NOT NULL,
  PRIMARY KEY (`id_tagihan`) USING BTREE,
  INDEX `id_belanja`(`id_belanja` ASC) USING BTREE,
  CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_belanja`) REFERENCES `tb_belanja` (`id_belanja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_tagihan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_target
-- ----------------------------
DROP TABLE IF EXISTS `tb_target`;
CREATE TABLE `tb_target`  (
  `id_target` int NOT NULL AUTO_INCREMENT,
  `tahun` int NOT NULL,
  `target` double NOT NULL,
  `status_target` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_sasaran` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_dua` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_tiga` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_target`) USING BTREE,
  INDEX `id_sasaran`(`id_sasaran` ASC) USING BTREE,
  CONSTRAINT `tb_target_ibfk_1` FOREIGN KEY (`id_sasaran`) REFERENCES `tb_sasaran` (`id_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_target
-- ----------------------------
INSERT INTO `tb_target` VALUES (6, 2022, 67, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (7, 2023, 70, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (8, 2024, 72, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (9, 2025, 75, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (10, 2026, 77, 'tunggu', 'z1gev6dfq9f45wk1nqpg5wx3fd8xke', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (11, 2022, 80, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (12, 2023, 83, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (13, 2024, 85, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (14, 2025, 88, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu');
INSERT INTO `tb_target` VALUES (15, 2026, 90, 'tunggu', 'tx0rfkk3jx84n1ei81efxc1fud1wsa', 'tunggu', 'tunggu');

-- ----------------------------
-- Table structure for tb_target_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_target_kegiatan`;
CREATE TABLE `tb_target_kegiatan`  (
  `id_target_kegiatan` int NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_kegiatan` int NOT NULL,
  `target_anggaran_keg` double NOT NULL,
  `target_fisik_keg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_dua` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_tiga` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_target_kegiatan`) USING BTREE,
  INDEX `id_kegiatan`(`id_kegiatan` ASC) USING BTREE,
  CONSTRAINT `tb_target_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_target_kegiatan
-- ----------------------------
INSERT INTO `tb_target_kegiatan` VALUES (1, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2022, 13405402437, '226.62', 'renja', 'renwal', 'tunggu');
INSERT INTO `tb_target_kegiatan` VALUES (2, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2023, 14075672559, '239.89', 'renja', 'renwal', 'tunggu');
INSERT INTO `tb_target_kegiatan` VALUES (3, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2024, 14779456187, '246.75', 'tunggu', 'tunggu', 'tunggu');
INSERT INTO `tb_target_kegiatan` VALUES (4, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2025, 15518428996, '257.03', 'tunggu', 'tunggu', 'tunggu');
INSERT INTO `tb_target_kegiatan` VALUES (5, 'w9y9e4ihiuq030ctj93dq9e2cpusz2', 2026, 16294350446, '263.88', 'tunggu', 'tunggu', 'tunggu');

-- ----------------------------
-- Table structure for tb_target_program
-- ----------------------------
DROP TABLE IF EXISTS `tb_target_program`;
CREATE TABLE `tb_target_program`  (
  `id_target_program` int NOT NULL AUTO_INCREMENT,
  `id_program` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_program` int NOT NULL,
  `target_anggaran` double NOT NULL,
  `target_fisik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_dua` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_tiga` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_target_program`) USING BTREE,
  INDEX `id_program`(`id_program` ASC) USING BTREE,
  CONSTRAINT `tb_target_program_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_target_program
-- ----------------------------
INSERT INTO `tb_target_program` VALUES (1, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2022, 13405402437, '226.62', 'renja', 'renwal', 'tunggu');
INSERT INTO `tb_target_program` VALUES (2, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2023, 14075672559, '239.89', 'renja', 'renwal', 'tunggu');
INSERT INTO `tb_target_program` VALUES (3, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2024, 14779456187, '246.75', 'tunggu', 'tunggu', 'tunggu');
INSERT INTO `tb_target_program` VALUES (4, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2025, 15518428996, '257.03', 'tunggu', 'tunggu', 'tunggu');
INSERT INTO `tb_target_program` VALUES (5, 'dhzdyea9xwwn9a4nyf38f6qaqc1r1n', 2026, 16294350446, '263.88', 'tunggu', 'tunggu', 'tunggu');

-- ----------------------------
-- Table structure for tb_target_sub
-- ----------------------------
DROP TABLE IF EXISTS `tb_target_sub`;
CREATE TABLE `tb_target_sub`  (
  `id_target_sub` int NOT NULL AUTO_INCREMENT,
  `id_sub_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_sub` int NOT NULL,
  `target_anggaran_sub` double NOT NULL,
  `target_fisik_sub` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_sub` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_dua` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_tiga` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_target_sub`) USING BTREE,
  INDEX `id_sub_kegiatan`(`id_sub_kegiatan` ASC) USING BTREE,
  CONSTRAINT `tb_target_sub_ibfk_1` FOREIGN KEY (`id_sub_kegiatan`) REFERENCES `tb_sub_kegiatan` (`id_sub_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_target_sub
-- ----------------------------
INSERT INTO `tb_target_sub` VALUES (1, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2022, 0, '2300', 'renja', 'renwal', 'tunggu');
INSERT INTO `tb_target_sub` VALUES (2, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2023, 0, '2500', 'renja', 'renwal', 'tunggu');
INSERT INTO `tb_target_sub` VALUES (3, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2024, 0, '2700', 'tunggu', 'tunggu', 'tunggu');
INSERT INTO `tb_target_sub` VALUES (4, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2025, 0, '3000', 'tunggu', 'tunggu', 'tunggu');
INSERT INTO `tb_target_sub` VALUES (5, 'hu6iy2hnq4419sf34hbmttsyq30r32', 2026, 0, '3300', 'tunggu', 'tunggu', 'tunggu');

SET FOREIGN_KEY_CHECKS = 1;
