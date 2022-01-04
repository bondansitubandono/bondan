/*
 Navicat Premium Data Transfer

 Source Server         : conn
 Source Server Type    : MySQL
 Source Server Version : 100116
 Source Host           : localhost:3306
 Source Schema         : db_csp

 Target Server Type    : MySQL
 Target Server Version : 100116
 File Encoding         : 65001

 Date: 10/09/2020 13:01:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_history_ticket
-- ----------------------------
DROP TABLE IF EXISTS `t_history_ticket`;
CREATE TABLE `t_history_ticket`  (
  `fc_id` int NOT NULL,
  `fc_member` int NULL DEFAULT NULL,
  `fd_transaksi` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `fn_topup` double NULL DEFAULT NULL,
  `fn_total` double NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_history_ticket
-- ----------------------------
INSERT INTO `t_history_ticket` VALUES (1, 29, '2020-09-03 13:25:41', 10, 150000);
INSERT INTO `t_history_ticket` VALUES (0, 29, '2020-09-03 13:58:17', 150000, 0);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 13:33:24', 40, 480000);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 13:35:27', 50, 600000);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 13:38:07', 100, 0);
INSERT INTO `t_history_ticket` VALUES (0, 66, '2020-09-09 13:40:24', 10, 120000);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 13:43:25', 20, 240000);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 13:47:56', 110, 0);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 13:49:31', 70, 0);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 14:03:40', 30, 360000);
INSERT INTO `t_history_ticket` VALUES (0, 22, '2020-09-09 17:54:35', 40, 480000);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 17:59:53', 10, 120000);
INSERT INTO `t_history_ticket` VALUES (0, 67, '2020-09-09 18:00:36', 30, 360000);
INSERT INTO `t_history_ticket` VALUES (0, 68, '2020-09-10 02:43:42', 20, 240000);
INSERT INTO `t_history_ticket` VALUES (0, 68, '2020-09-10 02:45:09', 50, 600000);
INSERT INTO `t_history_ticket` VALUES (0, 68, '2020-09-10 02:46:46', 70, 0);
INSERT INTO `t_history_ticket` VALUES (0, 68, '2020-09-10 02:49:25', 50, 600000);
INSERT INTO `t_history_ticket` VALUES (0, 68, '2020-09-10 02:55:19', 60, 720000);

-- ----------------------------
-- Table structure for t_message
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message`  (
  `fc_id` int NOT NULL,
  `fc_member` int NULL DEFAULT NULL,
  `fc_jenis` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fv_message` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fd_message` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `fc_read` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_message
-- ----------------------------
INSERT INTO `t_message` VALUES (0, 29, 'TOPUP', 'TopUp 150000 ticket senilai 0', '2020-09-03 13:58:17', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 40 ticket senilai 480.000', '2020-09-09 13:33:24', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 50 ticket senilai 600.000', '2020-09-09 13:35:27', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 100 ticket senilai 0', '2020-09-09 13:38:07', 'N');
INSERT INTO `t_message` VALUES (0, 66, 'TOPUP', 'TopUp 10 ticket senilai 120.000', '2020-09-09 13:40:24', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 20 ticket senilai 240.000', '2020-09-09 13:43:25', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 110 ticket senilai 0', '2020-09-09 13:47:55', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 70 ticket senilai 0', '2020-09-09 13:49:31', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 30 ticket senilai 360.000', '2020-09-09 14:03:40', 'N');
INSERT INTO `t_message` VALUES (0, 22, 'TOPUP', 'TopUp 40 ticket senilai 480.000', '2020-09-09 17:54:35', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 10 ticket senilai 120.000', '2020-09-09 17:59:53', 'N');
INSERT INTO `t_message` VALUES (0, 67, 'TOPUP', 'TopUp 30 ticket senilai 360.000', '2020-09-09 18:00:36', 'N');
INSERT INTO `t_message` VALUES (0, 68, 'TOPUP', 'TopUp 20 ticket senilai 240.000', '2020-09-10 02:43:42', 'N');
INSERT INTO `t_message` VALUES (0, 68, 'TOPUP', 'TopUp 50 ticket senilai 600.000', '2020-09-10 02:45:09', 'N');
INSERT INTO `t_message` VALUES (0, 68, 'TOPUP', 'TopUp 70 ticket senilai 0', '2020-09-10 02:46:46', 'N');
INSERT INTO `t_message` VALUES (0, 68, 'TOPUP', 'TopUp 50 ticket senilai 600.000', '2020-09-10 02:49:25', 'N');
INSERT INTO `t_message` VALUES (0, 68, 'TOPUP', 'TopUp 60 ticket senilai 720.000', '2020-09-10 02:55:19', 'N');

-- ----------------------------
-- Table structure for t_nomor
-- ----------------------------
DROP TABLE IF EXISTS `t_nomor`;
CREATE TABLE `t_nomor`  (
  `fc_param` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_prefix` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fn_nomor` int NULL DEFAULT NULL,
  `fn_long` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_nomor
-- ----------------------------
INSERT INTO `t_nomor` VALUES ('TRAN', 'TRX', 1, 6);
INSERT INTO `t_nomor` VALUES ('WD', 'WDR', 1, 6);
INSERT INTO `t_nomor` VALUES ('BUY', 'PH', 1, 6);
INSERT INTO `t_nomor` VALUES ('SELL', 'GH', 1, 6);

-- ----------------------------
-- Table structure for t_referral
-- ----------------------------
DROP TABLE IF EXISTS `t_referral`;
CREATE TABLE `t_referral`  (
  `fc_referral` int NOT NULL AUTO_INCREMENT,
  `fc_referral_id` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fd_join` date NULL DEFAULT NULL,
  `fc_hold` enum('N','Y') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fc_referral`, `fc_referral_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_referral
-- ----------------------------
INSERT INTO `t_referral` VALUES (1, 'COBAAJA', '2020-08-25', 'Y');
INSERT INTO `t_referral` VALUES (2, 'COBAAJA', '2020-08-26', 'Y');
INSERT INTO `t_referral` VALUES (3, '', '2020-08-26', 'N');
INSERT INTO `t_referral` VALUES (4, 'COBAAJA', '2020-08-26', 'Y');
INSERT INTO `t_referral` VALUES (5, 'COBAAJA', '2020-08-27', 'Y');
INSERT INTO `t_referral` VALUES (6, 'COBAABA', '2020-08-27', 'Y');
INSERT INTO `t_referral` VALUES (7, 'COBAAJA', '2020-09-01', 'Y');
INSERT INTO `t_referral` VALUES (8, 'COBAAJA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (9, 'COBAAJA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (10, 'COBAAJA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (11, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (12, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (13, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (14, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (15, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (16, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (17, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (18, 'COBAABA', '2020-09-02', 'Y');
INSERT INTO `t_referral` VALUES (19, 'COBAAJA', '2020-09-03', 'Y');
INSERT INTO `t_referral` VALUES (20, 'COBAAJA', '2020-09-03', 'Y');
INSERT INTO `t_referral` VALUES (21, 'COBAAJA', '2020-09-03', 'Y');
INSERT INTO `t_referral` VALUES (22, 'COBAAJA', '2020-09-03', 'Y');
INSERT INTO `t_referral` VALUES (23, 'COBAAJA', '2020-09-03', 'Y');
INSERT INTO `t_referral` VALUES (24, 'COBAAJA', '2020-09-03', 'Y');
INSERT INTO `t_referral` VALUES (25, 'COBAAJA', '2020-09-04', 'Y');
INSERT INTO `t_referral` VALUES (26, 'COBAABA', '2020-09-04', 'Y');
INSERT INTO `t_referral` VALUES (27, 'COBAAJA', '2020-09-04', 'Y');
INSERT INTO `t_referral` VALUES (28, 'COBAAJA', '2020-09-04', 'Y');
INSERT INTO `t_referral` VALUES (29, 'COBAAJA', '2020-09-04', 'Y');

-- ----------------------------
-- Table structure for t_setup
-- ----------------------------
DROP TABLE IF EXISTS `t_setup`;
CREATE TABLE `t_setup`  (
  `fc_param` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fv_value` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fv_ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_setup
-- ----------------------------
INSERT INTO `t_setup` VALUES ('KEY_SA', 'SA_DEV', '');
INSERT INTO `t_setup` VALUES ('LIMIT_AKUN', '50', NULL);
INSERT INTO `t_setup` VALUES ('TICKET_PRICE', '15000', NULL);
INSERT INTO `t_setup` VALUES ('CLAIM_REWARD', '375000', NULL);
INSERT INTO `t_setup` VALUES ('SMTP_MAIL', 'automail@cspnetwork.net', NULL);
INSERT INTO `t_setup` VALUES ('SMTP_PASS', 'FxHChbJ4WqhbdS3', NULL);
INSERT INTO `t_setup` VALUES ('SMTP_HOST', 'ssl://mail.cspnetwork.net', NULL);
INSERT INTO `t_setup` VALUES ('LEVEL', '1', 'SUPERADMIN');
INSERT INTO `t_setup` VALUES ('LEVEL', '2', 'ADMIN');
INSERT INTO `t_setup` VALUES ('LEVEL', '3', 'ADMIN-USER');
INSERT INTO `t_setup` VALUES ('TICKET_DISC_MNG', '20', NULL);

-- ----------------------------
-- Table structure for tm_bank
-- ----------------------------
DROP TABLE IF EXISTS `tm_bank`;
CREATE TABLE `tm_bank`  (
  `fc_bank` int NOT NULL,
  `fv_bank` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fc_bank`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_bank
-- ----------------------------
INSERT INTO `tm_bank` VALUES (2, 'BANK BRI');
INSERT INTO `tm_bank` VALUES (3, 'BANK EKSPOR INDONESIA');
INSERT INTO `tm_bank` VALUES (8, 'BANK MANDIRI');
INSERT INTO `tm_bank` VALUES (9, 'BANK BNI');
INSERT INTO `tm_bank` VALUES (11, 'BANK DANAMON');
INSERT INTO `tm_bank` VALUES (13, 'PERMATA BANK');
INSERT INTO `tm_bank` VALUES (14, 'BANK BCA');
INSERT INTO `tm_bank` VALUES (16, 'BANK BII');
INSERT INTO `tm_bank` VALUES (19, 'BANK PANIN');
INSERT INTO `tm_bank` VALUES (20, 'BANK ARTA NIAGA KENCANA');
INSERT INTO `tm_bank` VALUES (22, 'BANK NIAGA');
INSERT INTO `tm_bank` VALUES (23, 'BANK BUANA IND');
INSERT INTO `tm_bank` VALUES (26, 'BANK LIPPO');
INSERT INTO `tm_bank` VALUES (28, 'BANK NISP');
INSERT INTO `tm_bank` VALUES (30, 'AMERICAN EXPRESS BANK LTD');
INSERT INTO `tm_bank` VALUES (31, 'CITIBANK N.A.');
INSERT INTO `tm_bank` VALUES (32, 'JP. MORGAN CHASE BANK, N.A.');
INSERT INTO `tm_bank` VALUES (33, 'BANK OF AMERICA, N.A');
INSERT INTO `tm_bank` VALUES (34, 'ING INDONESIA BANK');
INSERT INTO `tm_bank` VALUES (36, 'BANK MULTICOR TBK.');
INSERT INTO `tm_bank` VALUES (37, 'BANK ARTHA GRAHA');
INSERT INTO `tm_bank` VALUES (39, 'BANK CREDIT AGRICOLE INDOSUEZ');
INSERT INTO `tm_bank` VALUES (40, 'THE BANGKOK BANK COMP. LTD');
INSERT INTO `tm_bank` VALUES (41, 'THE HONGKONG & SHANGHAI B.C.');
INSERT INTO `tm_bank` VALUES (42, 'THE BANK OF TOKYO MITSUBISHI UFJ LTD');
INSERT INTO `tm_bank` VALUES (45, 'BANK SUMITOMO MITSUI INDONESIA');
INSERT INTO `tm_bank` VALUES (46, 'BANK DBS INDONESIA');
INSERT INTO `tm_bank` VALUES (47, 'BANK RESONA PERDANIA');
INSERT INTO `tm_bank` VALUES (48, 'BANK MIZUHO INDONESIA');
INSERT INTO `tm_bank` VALUES (50, 'STANDARD CHARTERED BANK');
INSERT INTO `tm_bank` VALUES (52, 'BANK ABN AMRO');
INSERT INTO `tm_bank` VALUES (53, 'BANK KEPPEL TATLEE BUANA');
INSERT INTO `tm_bank` VALUES (54, 'BANK CAPITAL INDONESIA, TBK.');
INSERT INTO `tm_bank` VALUES (57, 'BANK BNP PARIBAS INDONESIA');
INSERT INTO `tm_bank` VALUES (58, 'BANK UOB INDONESIA');
INSERT INTO `tm_bank` VALUES (59, 'KOREA EXCHANGE BANK DANAMON');
INSERT INTO `tm_bank` VALUES (60, 'RABOBANK INTERNASIONAL INDONESIA');
INSERT INTO `tm_bank` VALUES (61, 'ANZ PANIN BANK');
INSERT INTO `tm_bank` VALUES (67, 'DEUTSCHE BANK AG.');
INSERT INTO `tm_bank` VALUES (68, 'BANK WOORI INDONESIA');
INSERT INTO `tm_bank` VALUES (69, 'BANK OF CHINA LIMITED');
INSERT INTO `tm_bank` VALUES (76, 'BANK BUMI ARTA');
INSERT INTO `tm_bank` VALUES (87, 'BANK EKONOMI');
INSERT INTO `tm_bank` VALUES (88, 'BANK ANTARDAERAH');
INSERT INTO `tm_bank` VALUES (89, 'BANK HAGA');
INSERT INTO `tm_bank` VALUES (93, 'BANK IFI');
INSERT INTO `tm_bank` VALUES (95, 'BANK CENTURY, TBK.');
INSERT INTO `tm_bank` VALUES (97, 'BANK MAYAPADA');
INSERT INTO `tm_bank` VALUES (110, 'BANK JABAR');
INSERT INTO `tm_bank` VALUES (111, 'BANK DKI');
INSERT INTO `tm_bank` VALUES (112, 'BPD DIY');
INSERT INTO `tm_bank` VALUES (113, 'BANK JATENG');
INSERT INTO `tm_bank` VALUES (114, 'BANK JATIM');
INSERT INTO `tm_bank` VALUES (115, 'BPD JAMBI');
INSERT INTO `tm_bank` VALUES (116, 'BPD ACEH');
INSERT INTO `tm_bank` VALUES (117, 'BANK SUMUT');
INSERT INTO `tm_bank` VALUES (118, 'BANK NAGARI');
INSERT INTO `tm_bank` VALUES (119, 'BANK RIAU');
INSERT INTO `tm_bank` VALUES (120, 'BANK SUMSEL');
INSERT INTO `tm_bank` VALUES (121, 'BANK LAMPUNG');
INSERT INTO `tm_bank` VALUES (122, 'BPD KALSEL');
INSERT INTO `tm_bank` VALUES (123, 'BPD KALIMANTAN BARAT');
INSERT INTO `tm_bank` VALUES (124, 'BPD KALTIM');
INSERT INTO `tm_bank` VALUES (125, 'BPD KALTENG');
INSERT INTO `tm_bank` VALUES (126, 'BPD SULSEL');
INSERT INTO `tm_bank` VALUES (127, 'BANK SULUT');
INSERT INTO `tm_bank` VALUES (128, 'BPD NTB');
INSERT INTO `tm_bank` VALUES (129, 'BPD BALI');
INSERT INTO `tm_bank` VALUES (130, 'BANK NTT');
INSERT INTO `tm_bank` VALUES (131, 'BANK MALUKU');
INSERT INTO `tm_bank` VALUES (132, 'BPD PAPUA');
INSERT INTO `tm_bank` VALUES (133, 'BANK BENGKULU');
INSERT INTO `tm_bank` VALUES (134, 'BPD SULAWESI TENGAH');
INSERT INTO `tm_bank` VALUES (135, 'BANK SULTRA');
INSERT INTO `tm_bank` VALUES (145, 'BANK NUSANTARA PARAHYANGAN');
INSERT INTO `tm_bank` VALUES (146, 'BANK SWADESI');
INSERT INTO `tm_bank` VALUES (147, 'BANK MUAMALAT');
INSERT INTO `tm_bank` VALUES (151, 'BANK MESTIKA');
INSERT INTO `tm_bank` VALUES (152, 'BANK METRO EXPRESS');
INSERT INTO `tm_bank` VALUES (153, 'BANK SHINTA INDONESIA');
INSERT INTO `tm_bank` VALUES (157, 'BANK MASPION');
INSERT INTO `tm_bank` VALUES (159, 'BANK HAGAKITA');
INSERT INTO `tm_bank` VALUES (161, 'BANK GANESHA');
INSERT INTO `tm_bank` VALUES (162, 'BANK WINDU KENTJANA');
INSERT INTO `tm_bank` VALUES (164, 'HALIM INDONESIA BANK');
INSERT INTO `tm_bank` VALUES (166, 'BANK HARMONI INTERNATIONAL');
INSERT INTO `tm_bank` VALUES (167, 'BANK KESAWAN');
INSERT INTO `tm_bank` VALUES (200, 'BANK TABUNGAN NEGARA (PERSERO)');
INSERT INTO `tm_bank` VALUES (212, 'BANK HIMPUNAN SAUDARA 1906, TBK .');
INSERT INTO `tm_bank` VALUES (213, 'BANK TABUNGAN PENSIUNAN NASIONAL');
INSERT INTO `tm_bank` VALUES (405, 'BANK SWAGUNA');
INSERT INTO `tm_bank` VALUES (422, 'BANK JASA ARTA');
INSERT INTO `tm_bank` VALUES (426, 'BANK MEGA');
INSERT INTO `tm_bank` VALUES (427, 'BANK JASA JAKARTA');
INSERT INTO `tm_bank` VALUES (441, 'BANK BUKOPIN');
INSERT INTO `tm_bank` VALUES (451, 'BANK SYARIAH MANDIRI');
INSERT INTO `tm_bank` VALUES (459, 'BANK BISNIS INTERNASIONAL');
INSERT INTO `tm_bank` VALUES (466, 'BANK SRI PARTHA');
INSERT INTO `tm_bank` VALUES (472, 'BANK JASA JAKARTA');
INSERT INTO `tm_bank` VALUES (484, 'BANK BINTANG MANUNGGAL');
INSERT INTO `tm_bank` VALUES (485, 'BANK BUMIPUTERA');
INSERT INTO `tm_bank` VALUES (490, 'BANK YUDHA BHAKTI');
INSERT INTO `tm_bank` VALUES (491, 'BANK MITRANIAGA');
INSERT INTO `tm_bank` VALUES (494, 'BANK AGRO NIAGA');
INSERT INTO `tm_bank` VALUES (498, 'BANK INDOMONEX');
INSERT INTO `tm_bank` VALUES (501, 'BANK ROYAL INDONESIA');
INSERT INTO `tm_bank` VALUES (503, 'BANK ALFINDO');
INSERT INTO `tm_bank` VALUES (506, 'BANK SYARIAH MEGA');
INSERT INTO `tm_bank` VALUES (513, 'BANK INA PERDANA');
INSERT INTO `tm_bank` VALUES (517, 'BANK HARFA');
INSERT INTO `tm_bank` VALUES (520, 'PRIMA MASTER BANK');
INSERT INTO `tm_bank` VALUES (521, 'BANK PERSYARIKATAN INDONESIA');
INSERT INTO `tm_bank` VALUES (523, 'BANK DIPO INTERNATIONAL');
INSERT INTO `tm_bank` VALUES (525, 'BANK AKITA');
INSERT INTO `tm_bank` VALUES (526, 'LIMAN INTERNATIONAL BANK');
INSERT INTO `tm_bank` VALUES (531, 'ANGLOMAS INTERNASIONAL BANK');
INSERT INTO `tm_bank` VALUES (535, 'BANK KESEJAHTERAAN EKONOMI');
INSERT INTO `tm_bank` VALUES (536, 'BANK UIB');
INSERT INTO `tm_bank` VALUES (542, 'BANK ARTOS IND');
INSERT INTO `tm_bank` VALUES (547, 'BANK PURBA DANARTA');
INSERT INTO `tm_bank` VALUES (548, 'BANK MULTI ARTA SENTOSA');
INSERT INTO `tm_bank` VALUES (553, 'BANK MAYORA');
INSERT INTO `tm_bank` VALUES (555, 'BANK INDEX SELINDO');
INSERT INTO `tm_bank` VALUES (558, 'BANK EKSEKUTIF');
INSERT INTO `tm_bank` VALUES (559, 'CENTRATAMA NASIONAL BANK');
INSERT INTO `tm_bank` VALUES (562, 'BANK FAMA INTERNASIONAL');
INSERT INTO `tm_bank` VALUES (564, 'BANK SINAR HARAPAN BALI');
INSERT INTO `tm_bank` VALUES (566, 'BANK VICTORIA INTERNATIONAL');
INSERT INTO `tm_bank` VALUES (567, 'BANK HARDA');
INSERT INTO `tm_bank` VALUES (945, 'BANK FINCONESIA');
INSERT INTO `tm_bank` VALUES (946, 'BANK MERINCORP');
INSERT INTO `tm_bank` VALUES (947, 'BANK MAYBANK INDOCORP');
INSERT INTO `tm_bank` VALUES (948, 'BANK OCBC – INDONESIA');
INSERT INTO `tm_bank` VALUES (949, 'BANK CHINA TRUST INDONESIA');
INSERT INTO `tm_bank` VALUES (950, 'BANK COMMONWEALTH');

-- ----------------------------
-- Table structure for tm_city
-- ----------------------------
DROP TABLE IF EXISTS `tm_city`;
CREATE TABLE `tm_city`  (
  `fc_city` int NOT NULL,
  `fc_province` int NOT NULL,
  `fc_jenis` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fv_city` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fc_city`, `fc_province`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_city
-- ----------------------------
INSERT INTO `tm_city` VALUES (1, 21, 'Kabupaten', 'Aceh Barat');
INSERT INTO `tm_city` VALUES (2, 21, 'Kabupaten', 'Aceh Barat Daya');
INSERT INTO `tm_city` VALUES (3, 21, 'Kabupaten', 'Aceh Besar');
INSERT INTO `tm_city` VALUES (4, 21, 'Kabupaten', 'Aceh Jaya');
INSERT INTO `tm_city` VALUES (5, 21, 'Kabupaten', 'Aceh Selatan');
INSERT INTO `tm_city` VALUES (6, 21, 'Kabupaten', 'Aceh Singkil');
INSERT INTO `tm_city` VALUES (7, 21, 'Kabupaten', 'Aceh Tamiang');
INSERT INTO `tm_city` VALUES (8, 21, 'Kabupaten', 'Aceh Tengah');
INSERT INTO `tm_city` VALUES (9, 21, 'Kabupaten', 'Aceh Tenggara');
INSERT INTO `tm_city` VALUES (10, 21, 'Kabupaten', 'Aceh Timur');
INSERT INTO `tm_city` VALUES (11, 21, 'Kabupaten', 'Aceh Utara');
INSERT INTO `tm_city` VALUES (12, 32, 'Kabupaten', 'Agam');
INSERT INTO `tm_city` VALUES (13, 23, 'Kabupaten', 'Alor');
INSERT INTO `tm_city` VALUES (14, 19, 'Kota', 'Ambon');
INSERT INTO `tm_city` VALUES (15, 34, 'Kabupaten', 'Asahan');
INSERT INTO `tm_city` VALUES (16, 24, 'Kabupaten', 'Asmat');
INSERT INTO `tm_city` VALUES (17, 1, 'Kabupaten', 'Badung');
INSERT INTO `tm_city` VALUES (18, 13, 'Kabupaten', 'Balangan');
INSERT INTO `tm_city` VALUES (19, 15, 'Kota', 'Balikpapan');
INSERT INTO `tm_city` VALUES (20, 21, 'Kota', 'Banda Aceh');
INSERT INTO `tm_city` VALUES (21, 18, 'Kota', 'Bandar Lampung');
INSERT INTO `tm_city` VALUES (22, 9, 'Kabupaten', 'Bandung');
INSERT INTO `tm_city` VALUES (23, 9, 'Kota', 'Bandung');
INSERT INTO `tm_city` VALUES (24, 9, 'Kabupaten', 'Bandung Barat');
INSERT INTO `tm_city` VALUES (25, 29, 'Kabupaten', 'Banggai');
INSERT INTO `tm_city` VALUES (26, 29, 'Kabupaten', 'Banggai Kepulauan');
INSERT INTO `tm_city` VALUES (27, 2, 'Kabupaten', 'Bangka');
INSERT INTO `tm_city` VALUES (28, 2, 'Kabupaten', 'Bangka Barat');
INSERT INTO `tm_city` VALUES (29, 2, 'Kabupaten', 'Bangka Selatan');
INSERT INTO `tm_city` VALUES (30, 2, 'Kabupaten', 'Bangka Tengah');
INSERT INTO `tm_city` VALUES (31, 11, 'Kabupaten', 'Bangkalan');
INSERT INTO `tm_city` VALUES (32, 1, 'Kabupaten', 'Bangli');
INSERT INTO `tm_city` VALUES (33, 13, 'Kabupaten', 'Banjar');
INSERT INTO `tm_city` VALUES (34, 9, 'Kota', 'Banjar');
INSERT INTO `tm_city` VALUES (35, 13, 'Kota', 'Banjarbaru');
INSERT INTO `tm_city` VALUES (36, 13, 'Kota', 'Banjarmasin');
INSERT INTO `tm_city` VALUES (37, 10, 'Kabupaten', 'Banjarnegara');
INSERT INTO `tm_city` VALUES (38, 28, 'Kabupaten', 'Bantaeng');
INSERT INTO `tm_city` VALUES (39, 5, 'Kabupaten', 'Bantul');
INSERT INTO `tm_city` VALUES (40, 33, 'Kabupaten', 'Banyuasin');
INSERT INTO `tm_city` VALUES (41, 10, 'Kabupaten', 'Banyumas');
INSERT INTO `tm_city` VALUES (42, 11, 'Kabupaten', 'Banyuwangi');
INSERT INTO `tm_city` VALUES (43, 13, 'Kabupaten', 'Barito Kuala');
INSERT INTO `tm_city` VALUES (44, 14, 'Kabupaten', 'Barito Selatan');
INSERT INTO `tm_city` VALUES (45, 14, 'Kabupaten', 'Barito Timur');
INSERT INTO `tm_city` VALUES (46, 14, 'Kabupaten', 'Barito Utara');
INSERT INTO `tm_city` VALUES (47, 28, 'Kabupaten', 'Barru');
INSERT INTO `tm_city` VALUES (48, 17, 'Kota', 'Batam');
INSERT INTO `tm_city` VALUES (49, 10, 'Kabupaten', 'Batang');
INSERT INTO `tm_city` VALUES (50, 8, 'Kabupaten', 'Batang Hari');
INSERT INTO `tm_city` VALUES (51, 11, 'Kota', 'Batu');
INSERT INTO `tm_city` VALUES (52, 34, 'Kabupaten', 'Batu Bara');
INSERT INTO `tm_city` VALUES (53, 30, 'Kota', 'Bau-Bau');
INSERT INTO `tm_city` VALUES (54, 9, 'Kabupaten', 'Bekasi');
INSERT INTO `tm_city` VALUES (55, 9, 'Kota', 'Bekasi');
INSERT INTO `tm_city` VALUES (56, 2, 'Kabupaten', 'Belitung');
INSERT INTO `tm_city` VALUES (57, 2, 'Kabupaten', 'Belitung Timur');
INSERT INTO `tm_city` VALUES (58, 23, 'Kabupaten', 'Belu');
INSERT INTO `tm_city` VALUES (59, 21, 'Kabupaten', 'Bener Meriah');
INSERT INTO `tm_city` VALUES (60, 26, 'Kabupaten', 'Bengkalis');
INSERT INTO `tm_city` VALUES (61, 12, 'Kabupaten', 'Bengkayang');
INSERT INTO `tm_city` VALUES (62, 4, 'Kota', 'Bengkulu');
INSERT INTO `tm_city` VALUES (63, 4, 'Kabupaten', 'Bengkulu Selatan');
INSERT INTO `tm_city` VALUES (64, 4, 'Kabupaten', 'Bengkulu Tengah');
INSERT INTO `tm_city` VALUES (65, 4, 'Kabupaten', 'Bengkulu Utara');
INSERT INTO `tm_city` VALUES (66, 15, 'Kabupaten', 'Berau');
INSERT INTO `tm_city` VALUES (67, 24, 'Kabupaten', 'Biak Numfor');
INSERT INTO `tm_city` VALUES (68, 22, 'Kabupaten', 'Bima');
INSERT INTO `tm_city` VALUES (69, 22, 'Kota', 'Bima');
INSERT INTO `tm_city` VALUES (70, 34, 'Kota', 'Binjai');
INSERT INTO `tm_city` VALUES (71, 17, 'Kabupaten', 'Bintan');
INSERT INTO `tm_city` VALUES (72, 21, 'Kabupaten', 'Bireuen');
INSERT INTO `tm_city` VALUES (73, 31, 'Kota', 'Bitung');
INSERT INTO `tm_city` VALUES (74, 11, 'Kabupaten', 'Blitar');
INSERT INTO `tm_city` VALUES (75, 11, 'Kota', 'Blitar');
INSERT INTO `tm_city` VALUES (76, 10, 'Kabupaten', 'Blora');
INSERT INTO `tm_city` VALUES (77, 7, 'Kabupaten', 'Boalemo');
INSERT INTO `tm_city` VALUES (78, 9, 'Kabupaten', 'Bogor');
INSERT INTO `tm_city` VALUES (79, 9, 'Kota', 'Bogor');
INSERT INTO `tm_city` VALUES (80, 11, 'Kabupaten', 'Bojonegoro');
INSERT INTO `tm_city` VALUES (81, 31, 'Kabupaten', 'Bolaang Mongondow (Bolmong)');
INSERT INTO `tm_city` VALUES (82, 31, 'Kabupaten', 'Bolaang Mongondow Selatan');
INSERT INTO `tm_city` VALUES (83, 31, 'Kabupaten', 'Bolaang Mongondow Timur');
INSERT INTO `tm_city` VALUES (84, 31, 'Kabupaten', 'Bolaang Mongondow Utara');
INSERT INTO `tm_city` VALUES (85, 30, 'Kabupaten', 'Bombana');
INSERT INTO `tm_city` VALUES (86, 11, 'Kabupaten', 'Bondowoso');
INSERT INTO `tm_city` VALUES (87, 28, 'Kabupaten', 'Bone');
INSERT INTO `tm_city` VALUES (88, 7, 'Kabupaten', 'Bone Bolango');
INSERT INTO `tm_city` VALUES (89, 15, 'Kota', 'Bontang');
INSERT INTO `tm_city` VALUES (90, 24, 'Kabupaten', 'Boven Digoel');
INSERT INTO `tm_city` VALUES (91, 10, 'Kabupaten', 'Boyolali');
INSERT INTO `tm_city` VALUES (92, 10, 'Kabupaten', 'Brebes');
INSERT INTO `tm_city` VALUES (93, 32, 'Kota', 'Bukittinggi');
INSERT INTO `tm_city` VALUES (94, 1, 'Kabupaten', 'Buleleng');
INSERT INTO `tm_city` VALUES (95, 28, 'Kabupaten', 'Bulukumba');
INSERT INTO `tm_city` VALUES (96, 16, 'Kabupaten', 'Bulungan (Bulongan)');
INSERT INTO `tm_city` VALUES (97, 8, 'Kabupaten', 'Bungo');
INSERT INTO `tm_city` VALUES (98, 29, 'Kabupaten', 'Buol');
INSERT INTO `tm_city` VALUES (99, 19, 'Kabupaten', 'Buru');
INSERT INTO `tm_city` VALUES (100, 19, 'Kabupaten', 'Buru Selatan');
INSERT INTO `tm_city` VALUES (101, 30, 'Kabupaten', 'Buton');
INSERT INTO `tm_city` VALUES (102, 30, 'Kabupaten', 'Buton Utara');
INSERT INTO `tm_city` VALUES (103, 9, 'Kabupaten', 'Ciamis');
INSERT INTO `tm_city` VALUES (104, 9, 'Kabupaten', 'Cianjur');
INSERT INTO `tm_city` VALUES (105, 10, 'Kabupaten', 'Cilacap');
INSERT INTO `tm_city` VALUES (106, 3, 'Kota', 'Cilegon');
INSERT INTO `tm_city` VALUES (107, 9, 'Kota', 'Cimahi');
INSERT INTO `tm_city` VALUES (108, 9, 'Kabupaten', 'Cirebon');
INSERT INTO `tm_city` VALUES (109, 9, 'Kota', 'Cirebon');
INSERT INTO `tm_city` VALUES (110, 34, 'Kabupaten', 'Dairi');
INSERT INTO `tm_city` VALUES (111, 24, 'Kabupaten', 'Deiyai (Deliyai)');
INSERT INTO `tm_city` VALUES (112, 34, 'Kabupaten', 'Deli Serdang');
INSERT INTO `tm_city` VALUES (113, 10, 'Kabupaten', 'Demak');
INSERT INTO `tm_city` VALUES (114, 1, 'Kota', 'Denpasar');
INSERT INTO `tm_city` VALUES (115, 9, 'Kota', 'Depok');
INSERT INTO `tm_city` VALUES (116, 32, 'Kabupaten', 'Dharmasraya');
INSERT INTO `tm_city` VALUES (117, 24, 'Kabupaten', 'Dogiyai');
INSERT INTO `tm_city` VALUES (118, 22, 'Kabupaten', 'Dompu');
INSERT INTO `tm_city` VALUES (119, 29, 'Kabupaten', 'Donggala');
INSERT INTO `tm_city` VALUES (120, 26, 'Kota', 'Dumai');
INSERT INTO `tm_city` VALUES (121, 33, 'Kabupaten', 'Empat Lawang');
INSERT INTO `tm_city` VALUES (122, 23, 'Kabupaten', 'Ende');
INSERT INTO `tm_city` VALUES (123, 28, 'Kabupaten', 'Enrekang');
INSERT INTO `tm_city` VALUES (124, 25, 'Kabupaten', 'Fakfak');
INSERT INTO `tm_city` VALUES (125, 23, 'Kabupaten', 'Flores Timur');
INSERT INTO `tm_city` VALUES (126, 9, 'Kabupaten', 'Garut');
INSERT INTO `tm_city` VALUES (127, 21, 'Kabupaten', 'Gayo Lues');
INSERT INTO `tm_city` VALUES (128, 1, 'Kabupaten', 'Gianyar');
INSERT INTO `tm_city` VALUES (129, 7, 'Kabupaten', 'Gorontalo');
INSERT INTO `tm_city` VALUES (130, 7, 'Kota', 'Gorontalo');
INSERT INTO `tm_city` VALUES (131, 7, 'Kabupaten', 'Gorontalo Utara');
INSERT INTO `tm_city` VALUES (132, 28, 'Kabupaten', 'Gowa');
INSERT INTO `tm_city` VALUES (133, 11, 'Kabupaten', 'Gresik');
INSERT INTO `tm_city` VALUES (134, 10, 'Kabupaten', 'Grobogan');
INSERT INTO `tm_city` VALUES (135, 5, 'Kabupaten', 'Gunung Kidul');
INSERT INTO `tm_city` VALUES (136, 14, 'Kabupaten', 'Gunung Mas');
INSERT INTO `tm_city` VALUES (137, 34, 'Kota', 'Gunungsitoli');
INSERT INTO `tm_city` VALUES (138, 20, 'Kabupaten', 'Halmahera Barat');
INSERT INTO `tm_city` VALUES (139, 20, 'Kabupaten', 'Halmahera Selatan');
INSERT INTO `tm_city` VALUES (140, 20, 'Kabupaten', 'Halmahera Tengah');
INSERT INTO `tm_city` VALUES (141, 20, 'Kabupaten', 'Halmahera Timur');
INSERT INTO `tm_city` VALUES (142, 20, 'Kabupaten', 'Halmahera Utara');
INSERT INTO `tm_city` VALUES (143, 13, 'Kabupaten', 'Hulu Sungai Selatan');
INSERT INTO `tm_city` VALUES (144, 13, 'Kabupaten', 'Hulu Sungai Tengah');
INSERT INTO `tm_city` VALUES (145, 13, 'Kabupaten', 'Hulu Sungai Utara');
INSERT INTO `tm_city` VALUES (146, 34, 'Kabupaten', 'Humbang Hasundutan');
INSERT INTO `tm_city` VALUES (147, 26, 'Kabupaten', 'Indragiri Hilir');
INSERT INTO `tm_city` VALUES (148, 26, 'Kabupaten', 'Indragiri Hulu');
INSERT INTO `tm_city` VALUES (149, 9, 'Kabupaten', 'Indramayu');
INSERT INTO `tm_city` VALUES (150, 24, 'Kabupaten', 'Intan Jaya');
INSERT INTO `tm_city` VALUES (151, 6, 'Kota', 'Jakarta Barat');
INSERT INTO `tm_city` VALUES (152, 6, 'Kota', 'Jakarta Pusat');
INSERT INTO `tm_city` VALUES (153, 6, 'Kota', 'Jakarta Selatan');
INSERT INTO `tm_city` VALUES (154, 6, 'Kota', 'Jakarta Timur');
INSERT INTO `tm_city` VALUES (155, 6, 'Kota', 'Jakarta Utara');
INSERT INTO `tm_city` VALUES (156, 8, 'Kota', 'Jambi');
INSERT INTO `tm_city` VALUES (157, 24, 'Kabupaten', 'Jayapura');
INSERT INTO `tm_city` VALUES (158, 24, 'Kota', 'Jayapura');
INSERT INTO `tm_city` VALUES (159, 24, 'Kabupaten', 'Jayawijaya');
INSERT INTO `tm_city` VALUES (160, 11, 'Kabupaten', 'Jember');
INSERT INTO `tm_city` VALUES (161, 1, 'Kabupaten', 'Jembrana');
INSERT INTO `tm_city` VALUES (162, 28, 'Kabupaten', 'Jeneponto');
INSERT INTO `tm_city` VALUES (163, 10, 'Kabupaten', 'Jepara');
INSERT INTO `tm_city` VALUES (164, 11, 'Kabupaten', 'Jombang');
INSERT INTO `tm_city` VALUES (165, 25, 'Kabupaten', 'Kaimana');
INSERT INTO `tm_city` VALUES (166, 26, 'Kabupaten', 'Kampar');
INSERT INTO `tm_city` VALUES (167, 14, 'Kabupaten', 'Kapuas');
INSERT INTO `tm_city` VALUES (168, 12, 'Kabupaten', 'Kapuas Hulu');
INSERT INTO `tm_city` VALUES (169, 10, 'Kabupaten', 'Karanganyar');
INSERT INTO `tm_city` VALUES (170, 1, 'Kabupaten', 'Karangasem');
INSERT INTO `tm_city` VALUES (171, 9, 'Kabupaten', 'Karawang');
INSERT INTO `tm_city` VALUES (172, 17, 'Kabupaten', 'Karimun');
INSERT INTO `tm_city` VALUES (173, 34, 'Kabupaten', 'Karo');
INSERT INTO `tm_city` VALUES (174, 14, 'Kabupaten', 'Katingan');
INSERT INTO `tm_city` VALUES (175, 4, 'Kabupaten', 'Kaur');
INSERT INTO `tm_city` VALUES (176, 12, 'Kabupaten', 'Kayong Utara');
INSERT INTO `tm_city` VALUES (177, 10, 'Kabupaten', 'Kebumen');
INSERT INTO `tm_city` VALUES (178, 11, 'Kabupaten', 'Kediri');
INSERT INTO `tm_city` VALUES (179, 11, 'Kota', 'Kediri');
INSERT INTO `tm_city` VALUES (180, 24, 'Kabupaten', 'Keerom');
INSERT INTO `tm_city` VALUES (181, 10, 'Kabupaten', 'Kendal');
INSERT INTO `tm_city` VALUES (182, 30, 'Kota', 'Kendari');
INSERT INTO `tm_city` VALUES (183, 4, 'Kabupaten', 'Kepahiang');
INSERT INTO `tm_city` VALUES (184, 17, 'Kabupaten', 'Kepulauan Anambas');
INSERT INTO `tm_city` VALUES (185, 19, 'Kabupaten', 'Kepulauan Aru');
INSERT INTO `tm_city` VALUES (186, 32, 'Kabupaten', 'Kepulauan Mentawai');
INSERT INTO `tm_city` VALUES (187, 26, 'Kabupaten', 'Kepulauan Meranti');
INSERT INTO `tm_city` VALUES (188, 31, 'Kabupaten', 'Kepulauan Sangihe');
INSERT INTO `tm_city` VALUES (189, 6, 'Kabupaten', 'Kepulauan Seribu');
INSERT INTO `tm_city` VALUES (190, 31, 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)');
INSERT INTO `tm_city` VALUES (191, 20, 'Kabupaten', 'Kepulauan Sula');
INSERT INTO `tm_city` VALUES (192, 31, 'Kabupaten', 'Kepulauan Talaud');
INSERT INTO `tm_city` VALUES (193, 24, 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)');
INSERT INTO `tm_city` VALUES (194, 8, 'Kabupaten', 'Kerinci');
INSERT INTO `tm_city` VALUES (195, 12, 'Kabupaten', 'Ketapang');
INSERT INTO `tm_city` VALUES (196, 10, 'Kabupaten', 'Klaten');
INSERT INTO `tm_city` VALUES (197, 1, 'Kabupaten', 'Klungkung');
INSERT INTO `tm_city` VALUES (198, 30, 'Kabupaten', 'Kolaka');
INSERT INTO `tm_city` VALUES (199, 30, 'Kabupaten', 'Kolaka Utara');
INSERT INTO `tm_city` VALUES (200, 30, 'Kabupaten', 'Konawe');
INSERT INTO `tm_city` VALUES (201, 30, 'Kabupaten', 'Konawe Selatan');
INSERT INTO `tm_city` VALUES (202, 30, 'Kabupaten', 'Konawe Utara');
INSERT INTO `tm_city` VALUES (203, 13, 'Kabupaten', 'Kotabaru');
INSERT INTO `tm_city` VALUES (204, 31, 'Kota', 'Kotamobagu');
INSERT INTO `tm_city` VALUES (205, 14, 'Kabupaten', 'Kotawaringin Barat');
INSERT INTO `tm_city` VALUES (206, 14, 'Kabupaten', 'Kotawaringin Timur');
INSERT INTO `tm_city` VALUES (207, 26, 'Kabupaten', 'Kuantan Singingi');
INSERT INTO `tm_city` VALUES (208, 12, 'Kabupaten', 'Kubu Raya');
INSERT INTO `tm_city` VALUES (209, 10, 'Kabupaten', 'Kudus');
INSERT INTO `tm_city` VALUES (210, 5, 'Kabupaten', 'Kulon Progo');
INSERT INTO `tm_city` VALUES (211, 9, 'Kabupaten', 'Kuningan');
INSERT INTO `tm_city` VALUES (212, 23, 'Kabupaten', 'Kupang');
INSERT INTO `tm_city` VALUES (213, 23, 'Kota', 'Kupang');
INSERT INTO `tm_city` VALUES (214, 15, 'Kabupaten', 'Kutai Barat');
INSERT INTO `tm_city` VALUES (215, 15, 'Kabupaten', 'Kutai Kartanegara');
INSERT INTO `tm_city` VALUES (216, 15, 'Kabupaten', 'Kutai Timur');
INSERT INTO `tm_city` VALUES (217, 34, 'Kabupaten', 'Labuhan Batu');
INSERT INTO `tm_city` VALUES (218, 34, 'Kabupaten', 'Labuhan Batu Selatan');
INSERT INTO `tm_city` VALUES (219, 34, 'Kabupaten', 'Labuhan Batu Utara');
INSERT INTO `tm_city` VALUES (220, 33, 'Kabupaten', 'Lahat');
INSERT INTO `tm_city` VALUES (221, 14, 'Kabupaten', 'Lamandau');
INSERT INTO `tm_city` VALUES (222, 11, 'Kabupaten', 'Lamongan');
INSERT INTO `tm_city` VALUES (223, 18, 'Kabupaten', 'Lampung Barat');
INSERT INTO `tm_city` VALUES (224, 18, 'Kabupaten', 'Lampung Selatan');
INSERT INTO `tm_city` VALUES (225, 18, 'Kabupaten', 'Lampung Tengah');
INSERT INTO `tm_city` VALUES (226, 18, 'Kabupaten', 'Lampung Timur');
INSERT INTO `tm_city` VALUES (227, 18, 'Kabupaten', 'Lampung Utara');
INSERT INTO `tm_city` VALUES (228, 12, 'Kabupaten', 'Landak');
INSERT INTO `tm_city` VALUES (229, 34, 'Kabupaten', 'Langkat');
INSERT INTO `tm_city` VALUES (230, 21, 'Kota', 'Langsa');
INSERT INTO `tm_city` VALUES (231, 24, 'Kabupaten', 'Lanny Jaya');
INSERT INTO `tm_city` VALUES (232, 3, 'Kabupaten', 'Lebak');
INSERT INTO `tm_city` VALUES (233, 4, 'Kabupaten', 'Lebong');
INSERT INTO `tm_city` VALUES (234, 23, 'Kabupaten', 'Lembata');
INSERT INTO `tm_city` VALUES (235, 21, 'Kota', 'Lhokseumawe');
INSERT INTO `tm_city` VALUES (236, 32, 'Kabupaten', 'Lima Puluh Koto/Kota');
INSERT INTO `tm_city` VALUES (237, 17, 'Kabupaten', 'Lingga');
INSERT INTO `tm_city` VALUES (238, 22, 'Kabupaten', 'Lombok Barat');
INSERT INTO `tm_city` VALUES (239, 22, 'Kabupaten', 'Lombok Tengah');
INSERT INTO `tm_city` VALUES (240, 22, 'Kabupaten', 'Lombok Timur');
INSERT INTO `tm_city` VALUES (241, 22, 'Kabupaten', 'Lombok Utara');
INSERT INTO `tm_city` VALUES (242, 33, 'Kota', 'Lubuk Linggau');
INSERT INTO `tm_city` VALUES (243, 11, 'Kabupaten', 'Lumajang');
INSERT INTO `tm_city` VALUES (244, 28, 'Kabupaten', 'Luwu');
INSERT INTO `tm_city` VALUES (245, 28, 'Kabupaten', 'Luwu Timur');
INSERT INTO `tm_city` VALUES (246, 28, 'Kabupaten', 'Luwu Utara');
INSERT INTO `tm_city` VALUES (247, 11, 'Kabupaten', 'Madiun');
INSERT INTO `tm_city` VALUES (248, 11, 'Kota', 'Madiun');
INSERT INTO `tm_city` VALUES (249, 10, 'Kabupaten', 'Magelang');
INSERT INTO `tm_city` VALUES (250, 10, 'Kota', 'Magelang');
INSERT INTO `tm_city` VALUES (251, 11, 'Kabupaten', 'Magetan');
INSERT INTO `tm_city` VALUES (252, 9, 'Kabupaten', 'Majalengka');
INSERT INTO `tm_city` VALUES (253, 27, 'Kabupaten', 'Majene');
INSERT INTO `tm_city` VALUES (254, 28, 'Kota', 'Makassar');
INSERT INTO `tm_city` VALUES (255, 11, 'Kabupaten', 'Malang');
INSERT INTO `tm_city` VALUES (256, 11, 'Kota', 'Malang');
INSERT INTO `tm_city` VALUES (257, 16, 'Kabupaten', 'Malinau');
INSERT INTO `tm_city` VALUES (258, 19, 'Kabupaten', 'Maluku Barat Daya');
INSERT INTO `tm_city` VALUES (259, 19, 'Kabupaten', 'Maluku Tengah');
INSERT INTO `tm_city` VALUES (260, 19, 'Kabupaten', 'Maluku Tenggara');
INSERT INTO `tm_city` VALUES (261, 19, 'Kabupaten', 'Maluku Tenggara Barat');
INSERT INTO `tm_city` VALUES (262, 27, 'Kabupaten', 'Mamasa');
INSERT INTO `tm_city` VALUES (263, 24, 'Kabupaten', 'Mamberamo Raya');
INSERT INTO `tm_city` VALUES (264, 24, 'Kabupaten', 'Mamberamo Tengah');
INSERT INTO `tm_city` VALUES (265, 27, 'Kabupaten', 'Mamuju');
INSERT INTO `tm_city` VALUES (266, 27, 'Kabupaten', 'Mamuju Utara');
INSERT INTO `tm_city` VALUES (267, 31, 'Kota', 'Manado');
INSERT INTO `tm_city` VALUES (268, 34, 'Kabupaten', 'Mandailing Natal');
INSERT INTO `tm_city` VALUES (269, 23, 'Kabupaten', 'Manggarai');
INSERT INTO `tm_city` VALUES (270, 23, 'Kabupaten', 'Manggarai Barat');
INSERT INTO `tm_city` VALUES (271, 23, 'Kabupaten', 'Manggarai Timur');
INSERT INTO `tm_city` VALUES (272, 25, 'Kabupaten', 'Manokwari');
INSERT INTO `tm_city` VALUES (273, 25, 'Kabupaten', 'Manokwari Selatan');
INSERT INTO `tm_city` VALUES (274, 24, 'Kabupaten', 'Mappi');
INSERT INTO `tm_city` VALUES (275, 28, 'Kabupaten', 'Maros');
INSERT INTO `tm_city` VALUES (276, 22, 'Kota', 'Mataram');
INSERT INTO `tm_city` VALUES (277, 25, 'Kabupaten', 'Maybrat');
INSERT INTO `tm_city` VALUES (278, 34, 'Kota', 'Medan');
INSERT INTO `tm_city` VALUES (279, 12, 'Kabupaten', 'Melawi');
INSERT INTO `tm_city` VALUES (280, 8, 'Kabupaten', 'Merangin');
INSERT INTO `tm_city` VALUES (281, 24, 'Kabupaten', 'Merauke');
INSERT INTO `tm_city` VALUES (282, 18, 'Kabupaten', 'Mesuji');
INSERT INTO `tm_city` VALUES (283, 18, 'Kota', 'Metro');
INSERT INTO `tm_city` VALUES (284, 24, 'Kabupaten', 'Mimika');
INSERT INTO `tm_city` VALUES (285, 31, 'Kabupaten', 'Minahasa');
INSERT INTO `tm_city` VALUES (286, 31, 'Kabupaten', 'Minahasa Selatan');
INSERT INTO `tm_city` VALUES (287, 31, 'Kabupaten', 'Minahasa Tenggara');
INSERT INTO `tm_city` VALUES (288, 31, 'Kabupaten', 'Minahasa Utara');
INSERT INTO `tm_city` VALUES (289, 11, 'Kabupaten', 'Mojokerto');
INSERT INTO `tm_city` VALUES (290, 11, 'Kota', 'Mojokerto');
INSERT INTO `tm_city` VALUES (291, 29, 'Kabupaten', 'Morowali');
INSERT INTO `tm_city` VALUES (292, 33, 'Kabupaten', 'Muara Enim');
INSERT INTO `tm_city` VALUES (293, 8, 'Kabupaten', 'Muaro Jambi');
INSERT INTO `tm_city` VALUES (294, 4, 'Kabupaten', 'Muko Muko');
INSERT INTO `tm_city` VALUES (295, 30, 'Kabupaten', 'Muna');
INSERT INTO `tm_city` VALUES (296, 14, 'Kabupaten', 'Murung Raya');
INSERT INTO `tm_city` VALUES (297, 33, 'Kabupaten', 'Musi Banyuasin');
INSERT INTO `tm_city` VALUES (298, 33, 'Kabupaten', 'Musi Rawas');
INSERT INTO `tm_city` VALUES (299, 24, 'Kabupaten', 'Nabire');
INSERT INTO `tm_city` VALUES (300, 21, 'Kabupaten', 'Nagan Raya');
INSERT INTO `tm_city` VALUES (301, 23, 'Kabupaten', 'Nagekeo');
INSERT INTO `tm_city` VALUES (302, 17, 'Kabupaten', 'Natuna');
INSERT INTO `tm_city` VALUES (303, 24, 'Kabupaten', 'Nduga');
INSERT INTO `tm_city` VALUES (304, 23, 'Kabupaten', 'Ngada');
INSERT INTO `tm_city` VALUES (305, 11, 'Kabupaten', 'Nganjuk');
INSERT INTO `tm_city` VALUES (306, 11, 'Kabupaten', 'Ngawi');
INSERT INTO `tm_city` VALUES (307, 34, 'Kabupaten', 'Nias');
INSERT INTO `tm_city` VALUES (308, 34, 'Kabupaten', 'Nias Barat');
INSERT INTO `tm_city` VALUES (309, 34, 'Kabupaten', 'Nias Selatan');
INSERT INTO `tm_city` VALUES (310, 34, 'Kabupaten', 'Nias Utara');
INSERT INTO `tm_city` VALUES (311, 16, 'Kabupaten', 'Nunukan');
INSERT INTO `tm_city` VALUES (312, 33, 'Kabupaten', 'Ogan Ilir');
INSERT INTO `tm_city` VALUES (313, 33, 'Kabupaten', 'Ogan Komering Ilir');
INSERT INTO `tm_city` VALUES (314, 33, 'Kabupaten', 'Ogan Komering Ulu');
INSERT INTO `tm_city` VALUES (315, 33, 'Kabupaten', 'Ogan Komering Ulu Selatan');
INSERT INTO `tm_city` VALUES (316, 33, 'Kabupaten', 'Ogan Komering Ulu Timur');
INSERT INTO `tm_city` VALUES (317, 11, 'Kabupaten', 'Pacitan');
INSERT INTO `tm_city` VALUES (318, 32, 'Kota', 'Padang');
INSERT INTO `tm_city` VALUES (319, 34, 'Kabupaten', 'Padang Lawas');
INSERT INTO `tm_city` VALUES (320, 34, 'Kabupaten', 'Padang Lawas Utara');
INSERT INTO `tm_city` VALUES (321, 32, 'Kota', 'Padang Panjang');
INSERT INTO `tm_city` VALUES (322, 32, 'Kabupaten', 'Padang Pariaman');
INSERT INTO `tm_city` VALUES (323, 34, 'Kota', 'Padang Sidempuan');
INSERT INTO `tm_city` VALUES (324, 33, 'Kota', 'Pagar Alam');
INSERT INTO `tm_city` VALUES (325, 34, 'Kabupaten', 'Pakpak Bharat');
INSERT INTO `tm_city` VALUES (326, 14, 'Kota', 'Palangka Raya');
INSERT INTO `tm_city` VALUES (327, 33, 'Kota', 'Palembang');
INSERT INTO `tm_city` VALUES (328, 28, 'Kota', 'Palopo');
INSERT INTO `tm_city` VALUES (329, 29, 'Kota', 'Palu');
INSERT INTO `tm_city` VALUES (330, 11, 'Kabupaten', 'Pamekasan');
INSERT INTO `tm_city` VALUES (331, 3, 'Kabupaten', 'Pandeglang');
INSERT INTO `tm_city` VALUES (332, 9, 'Kabupaten', 'Pangandaran');
INSERT INTO `tm_city` VALUES (333, 28, 'Kabupaten', 'Pangkajene Kepulauan');
INSERT INTO `tm_city` VALUES (334, 2, 'Kota', 'Pangkal Pinang');
INSERT INTO `tm_city` VALUES (335, 24, 'Kabupaten', 'Paniai');
INSERT INTO `tm_city` VALUES (336, 28, 'Kota', 'Parepare');
INSERT INTO `tm_city` VALUES (337, 32, 'Kota', 'Pariaman');
INSERT INTO `tm_city` VALUES (338, 29, 'Kabupaten', 'Parigi Moutong');
INSERT INTO `tm_city` VALUES (339, 32, 'Kabupaten', 'Pasaman');
INSERT INTO `tm_city` VALUES (340, 32, 'Kabupaten', 'Pasaman Barat');
INSERT INTO `tm_city` VALUES (341, 15, 'Kabupaten', 'Paser');
INSERT INTO `tm_city` VALUES (342, 11, 'Kabupaten', 'Pasuruan');
INSERT INTO `tm_city` VALUES (343, 11, 'Kota', 'Pasuruan');
INSERT INTO `tm_city` VALUES (344, 10, 'Kabupaten', 'Pati');
INSERT INTO `tm_city` VALUES (345, 32, 'Kota', 'Payakumbuh');
INSERT INTO `tm_city` VALUES (346, 25, 'Kabupaten', 'Pegunungan Arfak');
INSERT INTO `tm_city` VALUES (347, 24, 'Kabupaten', 'Pegunungan Bintang');
INSERT INTO `tm_city` VALUES (348, 10, 'Kabupaten', 'Pekalongan');
INSERT INTO `tm_city` VALUES (349, 10, 'Kota', 'Pekalongan');
INSERT INTO `tm_city` VALUES (350, 26, 'Kota', 'Pekanbaru');
INSERT INTO `tm_city` VALUES (351, 26, 'Kabupaten', 'Pelalawan');
INSERT INTO `tm_city` VALUES (352, 10, 'Kabupaten', 'Pemalang');
INSERT INTO `tm_city` VALUES (353, 34, 'Kota', 'Pematang Siantar');
INSERT INTO `tm_city` VALUES (354, 15, 'Kabupaten', 'Penajam Paser Utara');
INSERT INTO `tm_city` VALUES (355, 18, 'Kabupaten', 'Pesawaran');
INSERT INTO `tm_city` VALUES (356, 18, 'Kabupaten', 'Pesisir Barat');
INSERT INTO `tm_city` VALUES (357, 32, 'Kabupaten', 'Pesisir Selatan');
INSERT INTO `tm_city` VALUES (358, 21, 'Kabupaten', 'Pidie');
INSERT INTO `tm_city` VALUES (359, 21, 'Kabupaten', 'Pidie Jaya');
INSERT INTO `tm_city` VALUES (360, 28, 'Kabupaten', 'Pinrang');
INSERT INTO `tm_city` VALUES (361, 7, 'Kabupaten', 'Pohuwato');
INSERT INTO `tm_city` VALUES (362, 27, 'Kabupaten', 'Polewali Mandar');
INSERT INTO `tm_city` VALUES (363, 11, 'Kabupaten', 'Ponorogo');
INSERT INTO `tm_city` VALUES (364, 12, 'Kabupaten', 'Pontianak');
INSERT INTO `tm_city` VALUES (365, 12, 'Kota', 'Pontianak');
INSERT INTO `tm_city` VALUES (366, 29, 'Kabupaten', 'Poso');
INSERT INTO `tm_city` VALUES (367, 33, 'Kota', 'Prabumulih');
INSERT INTO `tm_city` VALUES (368, 18, 'Kabupaten', 'Pringsewu');
INSERT INTO `tm_city` VALUES (369, 11, 'Kabupaten', 'Probolinggo');
INSERT INTO `tm_city` VALUES (370, 11, 'Kota', 'Probolinggo');
INSERT INTO `tm_city` VALUES (371, 14, 'Kabupaten', 'Pulang Pisau');
INSERT INTO `tm_city` VALUES (372, 20, 'Kabupaten', 'Pulau Morotai');
INSERT INTO `tm_city` VALUES (373, 24, 'Kabupaten', 'Puncak');
INSERT INTO `tm_city` VALUES (374, 24, 'Kabupaten', 'Puncak Jaya');
INSERT INTO `tm_city` VALUES (375, 10, 'Kabupaten', 'Purbalingga');
INSERT INTO `tm_city` VALUES (376, 9, 'Kabupaten', 'Purwakarta');
INSERT INTO `tm_city` VALUES (377, 10, 'Kabupaten', 'Purworejo');
INSERT INTO `tm_city` VALUES (378, 25, 'Kabupaten', 'Raja Ampat');
INSERT INTO `tm_city` VALUES (379, 4, 'Kabupaten', 'Rejang Lebong');
INSERT INTO `tm_city` VALUES (380, 10, 'Kabupaten', 'Rembang');
INSERT INTO `tm_city` VALUES (381, 26, 'Kabupaten', 'Rokan Hilir');
INSERT INTO `tm_city` VALUES (382, 26, 'Kabupaten', 'Rokan Hulu');
INSERT INTO `tm_city` VALUES (383, 23, 'Kabupaten', 'Rote Ndao');
INSERT INTO `tm_city` VALUES (384, 21, 'Kota', 'Sabang');
INSERT INTO `tm_city` VALUES (385, 23, 'Kabupaten', 'Sabu Raijua');
INSERT INTO `tm_city` VALUES (386, 10, 'Kota', 'Salatiga');
INSERT INTO `tm_city` VALUES (387, 15, 'Kota', 'Samarinda');
INSERT INTO `tm_city` VALUES (388, 12, 'Kabupaten', 'Sambas');
INSERT INTO `tm_city` VALUES (389, 34, 'Kabupaten', 'Samosir');
INSERT INTO `tm_city` VALUES (390, 11, 'Kabupaten', 'Sampang');
INSERT INTO `tm_city` VALUES (391, 12, 'Kabupaten', 'Sanggau');
INSERT INTO `tm_city` VALUES (392, 24, 'Kabupaten', 'Sarmi');
INSERT INTO `tm_city` VALUES (393, 8, 'Kabupaten', 'Sarolangun');
INSERT INTO `tm_city` VALUES (394, 32, 'Kota', 'Sawah Lunto');
INSERT INTO `tm_city` VALUES (395, 12, 'Kabupaten', 'Sekadau');
INSERT INTO `tm_city` VALUES (396, 28, 'Kabupaten', 'Selayar (Kepulauan Selayar)');
INSERT INTO `tm_city` VALUES (397, 4, 'Kabupaten', 'Seluma');
INSERT INTO `tm_city` VALUES (398, 10, 'Kabupaten', 'Semarang');
INSERT INTO `tm_city` VALUES (399, 10, 'Kota', 'Semarang');
INSERT INTO `tm_city` VALUES (400, 19, 'Kabupaten', 'Seram Bagian Barat');
INSERT INTO `tm_city` VALUES (401, 19, 'Kabupaten', 'Seram Bagian Timur');
INSERT INTO `tm_city` VALUES (402, 3, 'Kabupaten', 'Serang');
INSERT INTO `tm_city` VALUES (403, 3, 'Kota', 'Serang');
INSERT INTO `tm_city` VALUES (404, 34, 'Kabupaten', 'Serdang Bedagai');
INSERT INTO `tm_city` VALUES (405, 14, 'Kabupaten', 'Seruyan');
INSERT INTO `tm_city` VALUES (406, 26, 'Kabupaten', 'Siak');
INSERT INTO `tm_city` VALUES (407, 34, 'Kota', 'Sibolga');
INSERT INTO `tm_city` VALUES (408, 28, 'Kabupaten', 'Sidenreng Rappang/Rapang');
INSERT INTO `tm_city` VALUES (409, 11, 'Kabupaten', 'Sidoarjo');
INSERT INTO `tm_city` VALUES (410, 29, 'Kabupaten', 'Sigi');
INSERT INTO `tm_city` VALUES (411, 32, 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)');
INSERT INTO `tm_city` VALUES (412, 23, 'Kabupaten', 'Sikka');
INSERT INTO `tm_city` VALUES (413, 34, 'Kabupaten', 'Simalungun');
INSERT INTO `tm_city` VALUES (414, 21, 'Kabupaten', 'Simeulue');
INSERT INTO `tm_city` VALUES (415, 12, 'Kota', 'Singkawang');
INSERT INTO `tm_city` VALUES (416, 28, 'Kabupaten', 'Sinjai');
INSERT INTO `tm_city` VALUES (417, 12, 'Kabupaten', 'Sintang');
INSERT INTO `tm_city` VALUES (418, 11, 'Kabupaten', 'Situbondo');
INSERT INTO `tm_city` VALUES (419, 5, 'Kabupaten', 'Sleman');
INSERT INTO `tm_city` VALUES (420, 32, 'Kabupaten', 'Solok');
INSERT INTO `tm_city` VALUES (421, 32, 'Kota', 'Solok');
INSERT INTO `tm_city` VALUES (422, 32, 'Kabupaten', 'Solok Selatan');
INSERT INTO `tm_city` VALUES (423, 28, 'Kabupaten', 'Soppeng');
INSERT INTO `tm_city` VALUES (424, 25, 'Kabupaten', 'Sorong');
INSERT INTO `tm_city` VALUES (425, 25, 'Kota', 'Sorong');
INSERT INTO `tm_city` VALUES (426, 25, 'Kabupaten', 'Sorong Selatan');
INSERT INTO `tm_city` VALUES (427, 10, 'Kabupaten', 'Sragen');
INSERT INTO `tm_city` VALUES (428, 9, 'Kabupaten', 'Subang');
INSERT INTO `tm_city` VALUES (429, 21, 'Kota', 'Subulussalam');
INSERT INTO `tm_city` VALUES (430, 9, 'Kabupaten', 'Sukabumi');
INSERT INTO `tm_city` VALUES (431, 9, 'Kota', 'Sukabumi');
INSERT INTO `tm_city` VALUES (432, 14, 'Kabupaten', 'Sukamara');
INSERT INTO `tm_city` VALUES (433, 10, 'Kabupaten', 'Sukoharjo');
INSERT INTO `tm_city` VALUES (434, 23, 'Kabupaten', 'Sumba Barat');
INSERT INTO `tm_city` VALUES (435, 23, 'Kabupaten', 'Sumba Barat Daya');
INSERT INTO `tm_city` VALUES (436, 23, 'Kabupaten', 'Sumba Tengah');
INSERT INTO `tm_city` VALUES (437, 23, 'Kabupaten', 'Sumba Timur');
INSERT INTO `tm_city` VALUES (438, 22, 'Kabupaten', 'Sumbawa');
INSERT INTO `tm_city` VALUES (439, 22, 'Kabupaten', 'Sumbawa Barat');
INSERT INTO `tm_city` VALUES (440, 9, 'Kabupaten', 'Sumedang');
INSERT INTO `tm_city` VALUES (441, 11, 'Kabupaten', 'Sumenep');
INSERT INTO `tm_city` VALUES (442, 8, 'Kota', 'Sungaipenuh');
INSERT INTO `tm_city` VALUES (443, 24, 'Kabupaten', 'Supiori');
INSERT INTO `tm_city` VALUES (444, 11, 'Kota', 'Surabaya');
INSERT INTO `tm_city` VALUES (445, 10, 'Kota', 'Surakarta (Solo)');
INSERT INTO `tm_city` VALUES (446, 13, 'Kabupaten', 'Tabalong');
INSERT INTO `tm_city` VALUES (447, 1, 'Kabupaten', 'Tabanan');
INSERT INTO `tm_city` VALUES (448, 28, 'Kabupaten', 'Takalar');
INSERT INTO `tm_city` VALUES (449, 25, 'Kabupaten', 'Tambrauw');
INSERT INTO `tm_city` VALUES (450, 16, 'Kabupaten', 'Tana Tidung');
INSERT INTO `tm_city` VALUES (451, 28, 'Kabupaten', 'Tana Toraja');
INSERT INTO `tm_city` VALUES (452, 13, 'Kabupaten', 'Tanah Bumbu');
INSERT INTO `tm_city` VALUES (453, 32, 'Kabupaten', 'Tanah Datar');
INSERT INTO `tm_city` VALUES (454, 13, 'Kabupaten', 'Tanah Laut');
INSERT INTO `tm_city` VALUES (455, 3, 'Kabupaten', 'Tangerang');
INSERT INTO `tm_city` VALUES (456, 3, 'Kota', 'Tangerang');
INSERT INTO `tm_city` VALUES (457, 3, 'Kota', 'Tangerang Selatan');
INSERT INTO `tm_city` VALUES (458, 18, 'Kabupaten', 'Tanggamus');
INSERT INTO `tm_city` VALUES (459, 34, 'Kota', 'Tanjung Balai');
INSERT INTO `tm_city` VALUES (460, 8, 'Kabupaten', 'Tanjung Jabung Barat');
INSERT INTO `tm_city` VALUES (461, 8, 'Kabupaten', 'Tanjung Jabung Timur');
INSERT INTO `tm_city` VALUES (462, 17, 'Kota', 'Tanjung Pinang');
INSERT INTO `tm_city` VALUES (463, 34, 'Kabupaten', 'Tapanuli Selatan');
INSERT INTO `tm_city` VALUES (464, 34, 'Kabupaten', 'Tapanuli Tengah');
INSERT INTO `tm_city` VALUES (465, 34, 'Kabupaten', 'Tapanuli Utara');
INSERT INTO `tm_city` VALUES (466, 13, 'Kabupaten', 'Tapin');
INSERT INTO `tm_city` VALUES (467, 16, 'Kota', 'Tarakan');
INSERT INTO `tm_city` VALUES (468, 9, 'Kabupaten', 'Tasikmalaya');
INSERT INTO `tm_city` VALUES (469, 9, 'Kota', 'Tasikmalaya');
INSERT INTO `tm_city` VALUES (470, 34, 'Kota', 'Tebing Tinggi');
INSERT INTO `tm_city` VALUES (471, 8, 'Kabupaten', 'Tebo');
INSERT INTO `tm_city` VALUES (472, 10, 'Kabupaten', 'Tegal');
INSERT INTO `tm_city` VALUES (473, 10, 'Kota', 'Tegal');
INSERT INTO `tm_city` VALUES (474, 25, 'Kabupaten', 'Teluk Bintuni');
INSERT INTO `tm_city` VALUES (475, 25, 'Kabupaten', 'Teluk Wondama');
INSERT INTO `tm_city` VALUES (476, 10, 'Kabupaten', 'Temanggung');
INSERT INTO `tm_city` VALUES (477, 20, 'Kota', 'Ternate');
INSERT INTO `tm_city` VALUES (478, 20, 'Kota', 'Tidore Kepulauan');
INSERT INTO `tm_city` VALUES (479, 23, 'Kabupaten', 'Timor Tengah Selatan');
INSERT INTO `tm_city` VALUES (480, 23, 'Kabupaten', 'Timor Tengah Utara');
INSERT INTO `tm_city` VALUES (481, 34, 'Kabupaten', 'Toba Samosir');
INSERT INTO `tm_city` VALUES (482, 29, 'Kabupaten', 'Tojo Una-Una');
INSERT INTO `tm_city` VALUES (483, 29, 'Kabupaten', 'Toli-Toli');
INSERT INTO `tm_city` VALUES (484, 24, 'Kabupaten', 'Tolikara');
INSERT INTO `tm_city` VALUES (485, 31, 'Kota', 'Tomohon');
INSERT INTO `tm_city` VALUES (486, 28, 'Kabupaten', 'Toraja Utara');
INSERT INTO `tm_city` VALUES (487, 11, 'Kabupaten', 'Trenggalek');
INSERT INTO `tm_city` VALUES (488, 19, 'Kota', 'Tual');
INSERT INTO `tm_city` VALUES (489, 11, 'Kabupaten', 'Tuban');
INSERT INTO `tm_city` VALUES (490, 18, 'Kabupaten', 'Tulang Bawang');
INSERT INTO `tm_city` VALUES (491, 18, 'Kabupaten', 'Tulang Bawang Barat');
INSERT INTO `tm_city` VALUES (492, 11, 'Kabupaten', 'Tulungagung');
INSERT INTO `tm_city` VALUES (493, 28, 'Kabupaten', 'Wajo');
INSERT INTO `tm_city` VALUES (494, 30, 'Kabupaten', 'Wakatobi');
INSERT INTO `tm_city` VALUES (495, 24, 'Kabupaten', 'Waropen');
INSERT INTO `tm_city` VALUES (496, 18, 'Kabupaten', 'Way Kanan');
INSERT INTO `tm_city` VALUES (497, 10, 'Kabupaten', 'Wonogiri');
INSERT INTO `tm_city` VALUES (498, 10, 'Kabupaten', 'Wonosobo');
INSERT INTO `tm_city` VALUES (499, 24, 'Kabupaten', 'Yahukimo');
INSERT INTO `tm_city` VALUES (500, 24, 'Kabupaten', 'Yalimo');
INSERT INTO `tm_city` VALUES (501, 5, 'Kota', 'Yogyakarta');

-- ----------------------------
-- Table structure for tm_level
-- ----------------------------
DROP TABLE IF EXISTS `tm_level`;
CREATE TABLE `tm_level`  (
  `fc_level` int NOT NULL AUTO_INCREMENT,
  `fv_level` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`fc_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_level
-- ----------------------------
INSERT INTO `tm_level` VALUES (1, 'LEADER', 'Y');
INSERT INTO `tm_level` VALUES (2, 'MEMBER', 'Y');

-- ----------------------------
-- Table structure for tm_member
-- ----------------------------
DROP TABLE IF EXISTS `tm_member`;
CREATE TABLE `tm_member`  (
  `fc_member` int NOT NULL AUTO_INCREMENT,
  `fv_member` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_gender` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_province` int NOT NULL,
  `fc_city` int NOT NULL,
  `fv_addr` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_mail` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_phone` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_level` int NOT NULL,
  `fc_referral_id` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_referral_from` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fc_pin` int NOT NULL,
  `fc_username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_password` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_bank` int NOT NULL,
  `fc_norek` int NULL DEFAULT NULL,
  `fv_name_rek` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_approved` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  `fc_hold` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  `fd_join` datetime(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`fc_member`, `fc_referral_id`, `fc_pin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_member
-- ----------------------------
INSERT INTO `tm_member` VALUES (22, 'QODRIS SYAFAATUZIAD', 'L', 11, 178, 'DS.BESOWO DSN.KRAJAN RT.024/007 KEC.KEPUNG', 'qodrisziad95@gmail.com', '085736695302', 2, 'COBAABA', 'COBAAJA', 0, 'qodris', '13c001435271785', 14, 513534132, 'QODRIS SYAFAATUZIAD', 'Y', 'N', '2020-08-27 18:32:03');
INSERT INTO `tm_member` VALUES (29, 'Bandono', 'L', 1, 17, 'SDASD', 'qodrisziad95@gmail.com', '08576', 2, 'COBAAJA', 'x', 0, 'a', '13c001435271785', 14, 2324, 'Bandono', 'Y', 'N', '2020-08-31 22:17:18');
INSERT INTO `tm_member` VALUES (30, 'judi', 'L', 19, 488, 'pare pare', 'simanboi8@gmail.com', '0902', 2, 'klPXj8UeIb', 'COBAAJA', 0, 'x1', 'b061aa12f0cb135', 37, 12000, 'judi', 'Y', 'N', '2020-08-26 06:22:54');
INSERT INTO `tm_member` VALUES (37, 'x', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, '12', 'klPXj8UeIb', 0, 's', '13c001435271785', 3, 833838, 'Binos', 'Y', 'N', '2020-08-30 12:47:41');
INSERT INTO `tm_member` VALUES (38, 'y', 'L', 1, 21, 'kediri', 'siman@gmail.com', '293993', 2, '122', 'COBAABA', 0, 'm', NULL, 7, 3893838, 'Rudy', 'Y', 'N', '2020-08-31 10:10:02');
INSERT INTO `tm_member` VALUES (40, 'juju', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, '90', 'sk', 0, 's', '13c001435271785', 3, 833838, 'Binos23', 'Y', 'N', '2020-08-31 10:30:50');
INSERT INTO `tm_member` VALUES (41, 'robbu', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'jk', 'mk', 0, 's', '13c001435271785', 3, 833838, 'kaf', 'Y', 'N', '2020-08-31 10:37:08');
INSERT INTO `tm_member` VALUES (42, 'susu', 'L', 1, 21, 'kediri', 'siman@gmail.com', '293993', 2, 'sk', '122', 0, 'm', NULL, 7, 3893838, 'nucj', 'Y', 'N', '2020-09-04 07:04:00');
INSERT INTO `tm_member` VALUES (43, 'hihu', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'mk', '12', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 09:55:42');
INSERT INTO `tm_member` VALUES (44, '', 'L', 0, 0, '', '', '', 0, '', '', 0, NULL, NULL, 0, NULL, NULL, 'N', 'N', '0000-00-00 00:00:00');
INSERT INTO `tm_member` VALUES (44, 'juja', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'lol', 'jk', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 10:49:13');
INSERT INTO `tm_member` VALUES (45, 'bagong', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'xl', 'lol', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:03:46');
INSERT INTO `tm_member` VALUES (46, 'jovi', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'lop', 'lol', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:03:55');
INSERT INTO `tm_member` VALUES (47, 'bagong 1', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'gu', 'xl', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:20:35');
INSERT INTO `tm_member` VALUES (48, 'jovi 1', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'req', 'lop', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:20:42');
INSERT INTO `tm_member` VALUES (49, 'jumik', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'iuy', 'gu', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:22:03');
INSERT INTO `tm_member` VALUES (50, 'bonjovi', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'yui', 'req', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:22:09');
INSERT INTO `tm_member` VALUES (51, 'lendra', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'ihsan', 'iuy', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:31:14');
INSERT INTO `tm_member` VALUES (52, 'londry', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'suyit', 'yui', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:31:23');
INSERT INTO `tm_member` VALUES (53, 'jay', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'somat', 'suyit', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:32:45');
INSERT INTO `tm_member` VALUES (54, 'jopsk', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'ahmad', 'suyit', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-08-31 11:32:39');
INSERT INTO `tm_member` VALUES (55, 'Hallo', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'oki', 'suyit', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-09-01 13:57:17');
INSERT INTO `tm_member` VALUES (56, 'Huha', 'L', 1, 21, 'pare', 'siman@gmail.com', '9393849', 2, 'kio', 'suyit', 0, 's', '13c001435271785', 3, 833838, 'joy', 'Y', 'N', '2020-09-01 13:57:14');
INSERT INTO `tm_member` VALUES (57, 'jomik', 'L', 1, 17, 'bondan', 'qodrisziad95@gmail.com', '90909', 2, '4a01hilFxm', 'COBAAJA', 0, '12', '8d3ccd9d0535c7c', 2, 102002030, 'jomik', 'Y', 'N', '2020-09-01 01:56:55');
INSERT INTO `tm_member` VALUES (58, 'bans', 'L', 1, 17, 'simans', 'simanboi8@gmail.com', '093090', 2, 'FQ2Uo3hPpL', 'COBAAJA', 0, 'as', '745b3eee77cde20', 8, 930494049, 'bans', 'Y', 'N', '2020-09-01 02:00:45');
INSERT INTO `tm_member` VALUES (59, 'bondan', 'L', 10, 380, 'pantura', 'simanboi8@gmail.com', '090', 2, 'ZiOKSanEGJ', 'COBAAJA', 0, 'x', '67ec9b3dfb08e34', 33, 8393839, 'bondan', 'Y', 'N', '2020-09-01 02:31:01');
INSERT INTO `tm_member` VALUES (60, 'KARTO MARMO', 'L', 18, 491, '123000', 'qodrisziad95@gmail.com', '929', 2, '5apOIMqTuv', 'COBAAJA', 0, 'x', '7b6253fbeb64af9', 8, 8393893, 'KARTO MARMO', 'Y', 'N', '2020-09-01 02:46:02');
INSERT INTO `tm_member` VALUES (61, 'KARTO MARMO 1', 'L', 18, 491, '123000', 'qodrisziad95@gmail.com', '929', 2, 'KM01', 'COBAABA', 0, 'x', '7b6253fbeb64af9', 8, 8393893, 'KARTO MARMO', 'Y', 'Y', '2020-09-08 06:19:49');
INSERT INTO `tm_member` VALUES (62, 'KARTO MARMO 2', 'L', 18, 491, '123000', 'qodrisziad95@gmail.com', '929', 2, 'KM02', 'COBAABA', 0, 'x', '7b6253fbeb64af9', 8, 8393893, 'KARTO MARMO', 'Y', 'Y', '2020-09-08 07:04:36');
INSERT INTO `tm_member` VALUES (63, 'Hujp', 'L', 6, 155, 'a', 'simanboi8@gmail.com', '9292929', 2, 'aXBvnRINkw', 'COBAABA', 0, 'as', '13c001435271785', 8, 9292992, 'Hujp', 'Y', 'N', '2020-09-08 09:41:00');
INSERT INTO `tm_member` VALUES (64, 'KOMI', 'L', 18, 496, '120000', 'simanboi8@gmail.com', '82982928', 2, 'PqXBbSQwda', 'COBAAJA', 0, 'KOMI', '13c001435271785', 37, 829228, 'KOMI', 'Y', 'N', '2020-09-09 07:41:43');
INSERT INTO `tm_member` VALUES (65, 'JIKO', 'L', 21, 384, 'qw', 'qodrisziad95@gmail.com', '1209029', 2, 'ygAm2MilxX', 'COBAAJA', 0, 'JIKO', '0e1f0aec5704d18', 32, 333333, 'JIKO', 'Y', 'N', '2020-09-09 08:11:00');
INSERT INTO `tm_member` VALUES (66, 'TYO PAKU', 'L', 6, 152, 'swop', 'simanboi8@gmail.com', '292992838', 2, 'eTZQWP8ipy', 'COBAAJA', 0, 'TYO', '13c001435271785', 33, 627262726, 'TYO PAKU', 'Y', 'N', '2020-09-09 08:19:57');
INSERT INTO `tm_member` VALUES (67, 'IWAN', 'L', 18, 496, 'qw', 'simanboi8@gmail.com', '7878', 2, 'qOvU7k2DX0', 'COBAABA', 0, 'RAMBO', '5c0f033c3a7e0ab', 9, 789, 'IWAN', 'Y', 'N', '2020-09-09 08:30:24');
INSERT INTO `tm_member` VALUES (68, 'IPUL', 'L', 2, 28, 'aaa', 'simanboi8@gmail.com', '1221', 2, '8FEsobh9HN', 'COBAAJA', 0, 'ipul', '5c0f033c3a7e0ab', 3, 12, 'IPUL', 'Y', 'N', '2020-09-09 02:54:50');
INSERT INTO `tm_member` VALUES (69, 'UPIL', 'L', 2, 28, 'barat', 'bondansitubandono@yahooo.com', '829282', 2, 'L53keKxFJO', 'COBAAJA', 0, 'UPIL', '5c0f033c3a7e0ab', 3, 829828, 'UPIL', 'Y', 'N', '2020-09-09 02:56:58');

-- ----------------------------
-- Table structure for tm_plan
-- ----------------------------
DROP TABLE IF EXISTS `tm_plan`;
CREATE TABLE `tm_plan`  (
  `fc_plan` int NOT NULL AUTO_INCREMENT,
  `fv_plan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fn_min_trade` double NOT NULL DEFAULT 0,
  `fn_max_trade` double NOT NULL,
  `ft_min_trade` time(0) NOT NULL,
  `ft_max_trade` time(0) NOT NULL,
  `fn_profit` tinyint(1) NOT NULL,
  `fn_tax` double NOT NULL,
  `fc_status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`fc_plan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_plan
-- ----------------------------

-- ----------------------------
-- Table structure for tm_province
-- ----------------------------
DROP TABLE IF EXISTS `tm_province`;
CREATE TABLE `tm_province`  (
  `fc_province` int NOT NULL,
  `fv_province` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fc_province`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_province
-- ----------------------------
INSERT INTO `tm_province` VALUES (1, 'Bali');
INSERT INTO `tm_province` VALUES (2, 'Bangka Belitung');
INSERT INTO `tm_province` VALUES (3, 'Banten');
INSERT INTO `tm_province` VALUES (4, 'Bengkulu');
INSERT INTO `tm_province` VALUES (5, 'DI Yogyakarta');
INSERT INTO `tm_province` VALUES (6, 'DKI Jakarta');
INSERT INTO `tm_province` VALUES (7, 'Gorontalo');
INSERT INTO `tm_province` VALUES (8, 'Jambi');
INSERT INTO `tm_province` VALUES (9, 'Jawa Barat');
INSERT INTO `tm_province` VALUES (10, 'Jawa Tengah');
INSERT INTO `tm_province` VALUES (11, 'Jawa Timur');
INSERT INTO `tm_province` VALUES (12, 'Kalimantan Barat');
INSERT INTO `tm_province` VALUES (13, 'Kalimantan Selatan');
INSERT INTO `tm_province` VALUES (14, 'Kalimantan Tengah');
INSERT INTO `tm_province` VALUES (15, 'Kalimantan Timur');
INSERT INTO `tm_province` VALUES (16, 'Kalimantan Utara');
INSERT INTO `tm_province` VALUES (17, 'Kepulauan Riau');
INSERT INTO `tm_province` VALUES (18, 'Lampung');
INSERT INTO `tm_province` VALUES (19, 'Maluku');
INSERT INTO `tm_province` VALUES (20, 'Maluku Utara');
INSERT INTO `tm_province` VALUES (21, 'Nanggroe Aceh Darussalam (NAD)');
INSERT INTO `tm_province` VALUES (22, 'Nusa Tenggara Barat (NTB)');
INSERT INTO `tm_province` VALUES (23, 'Nusa Tenggara Timur (NTT)');
INSERT INTO `tm_province` VALUES (24, 'Papua');
INSERT INTO `tm_province` VALUES (25, 'Papua Barat');
INSERT INTO `tm_province` VALUES (26, 'Riau');
INSERT INTO `tm_province` VALUES (27, 'Sulawesi Barat');
INSERT INTO `tm_province` VALUES (28, 'Sulawesi Selatan');
INSERT INTO `tm_province` VALUES (29, 'Sulawesi Tengah');
INSERT INTO `tm_province` VALUES (30, 'Sulawesi Tenggara');
INSERT INTO `tm_province` VALUES (31, 'Sulawesi Utara');
INSERT INTO `tm_province` VALUES (32, 'Sumatera Barat');
INSERT INTO `tm_province` VALUES (33, 'Sumatera Selatan');
INSERT INTO `tm_province` VALUES (34, 'Sumatera Utara');

-- ----------------------------
-- Table structure for tm_ticket
-- ----------------------------
DROP TABLE IF EXISTS `tm_ticket`;
CREATE TABLE `tm_ticket`  (
  `fc_member` int NOT NULL,
  `fn_saldo` double NULL DEFAULT 0,
  `fn_request` double NULL DEFAULT 0,
  `fn_total` double NULL DEFAULT 0,
  `fd_request` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `fc_proses` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'N',
  PRIMARY KEY (`fc_member`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_ticket
-- ----------------------------
INSERT INTO `tm_ticket` VALUES (22, 145, 0, 0, '2020-09-09 17:54:35', 'Y');
INSERT INTO `tm_ticket` VALUES (29, 150000, 30, 0, '2020-09-09 12:39:58', 'Y');
INSERT INTO `tm_ticket` VALUES (30, 0, 20, 0, '2020-09-09 12:51:18', 'N');
INSERT INTO `tm_ticket` VALUES (38, 0, 10, 0, '2020-09-10 04:04:07', 'N');
INSERT INTO `tm_ticket` VALUES (44, 0, 0, 0, '2020-09-09 12:49:31', 'N');
INSERT INTO `tm_ticket` VALUES (58, 0, 10, 0, '2020-09-09 12:58:48', 'N');
INSERT INTO `tm_ticket` VALUES (61, 0, 0, 0, '2020-09-09 12:49:29', 'N');
INSERT INTO `tm_ticket` VALUES (62, 0, 0, 0, '2020-09-09 13:51:30', 'N');
INSERT INTO `tm_ticket` VALUES (63, 0, 0, 0, '2020-09-09 12:49:35', 'N');
INSERT INTO `tm_ticket` VALUES (64, 0, 30, 0, '2020-09-09 12:59:32', 'N');
INSERT INTO `tm_ticket` VALUES (65, 0, 20, 0, '2020-09-09 13:12:16', 'N');
INSERT INTO `tm_ticket` VALUES (66, 10, 0, 0, '2020-09-10 02:42:41', 'N');
INSERT INTO `tm_ticket` VALUES (67, 460, 0, 0, '2020-09-09 18:00:36', 'Y');
INSERT INTO `tm_ticket` VALUES (68, 250, 60, 0, '2020-09-10 02:59:23', 'N');
INSERT INTO `tm_ticket` VALUES (69, 0, 0, 0, '2020-09-09 19:56:58', 'N');

-- ----------------------------
-- Table structure for tm_user
-- ----------------------------
DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE `tm_user`  (
  `fc_id` int NOT NULL AUTO_INCREMENT,
  `fv_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_userid` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_password` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_hold` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fc_level` int NULL DEFAULT NULL,
  `fd_input` date NULL DEFAULT NULL,
  PRIMARY KEY (`fc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_user
-- ----------------------------
INSERT INTO `tm_user` VALUES (4, 'DONI ALFONSO', 'admin', '0da0b427c0f62a1', 'N', 1, '2018-10-19');

-- ----------------------------
-- View structure for t_jo
-- ----------------------------
DROP VIEW IF EXISTS `t_jo`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `t_jo` AS -- Level 1
SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city, 1 AS level
, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
, t1.fc_referral_id AS path
FROM tm_member AS t1
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 2
UNION ALL
SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, 2 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 3
UNION ALL
SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, 3 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 4
UNION ALL
SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, 4 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 5
UNION ALL
SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, 5 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"

-- Level 6
UNION ALL
SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, 6 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"

-- Level 7
UNION ALL
SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, 7 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"

-- Level 8
UNION ALL
SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city, 8 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"

-- Level 9
UNION ALL
SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city, 9 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA"


-- Level 10
UNION ALL
SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city, 10 AS level
, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
JOIN tm_member AS t5 ON t5.fc_referral_from = t4.fc_referral_id
JOIN tm_member AS t6 ON t6.fc_referral_from = t5.fc_referral_id
JOIN tm_member AS t7 ON t7.fc_referral_from = t6.fc_referral_id
JOIN tm_member AS t8 ON t8.fc_referral_from = t7.fc_referral_id
JOIN tm_member AS t9 ON t9.fc_referral_from = t8.fc_referral_id
JOIN tm_member AS t10 ON t10.fc_referral_from = t9.fc_referral_id
JOIN tm_province AS p ON p.fc_province =t1.fc_province
JOIN tm_city AS c ON c.fc_city =t1.fc_city
WHERE t1.fc_referral_from ="COBAAJA" ;

-- ----------------------------
-- View structure for v_view
-- ----------------------------
DROP VIEW IF EXISTS `v_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_view` AS SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 1 AS level
			, t1.fc_referral_from, t1.fc_approved, t1.fc_mail, t1.fc_hold, t1.fc_referral_id AS level1, null as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, t1.fc_referral_id AS path
			FROM tm_member AS t1 
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 2 AS level
			,t2.fc_referral_from, t2.fc_approved, t2.fc_mail, t2.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, null as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 3 AS level
			,t3.fc_referral_from, t3.fc_approved,t3.fc_mail, t3.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, null as level4, null as level5,null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 4 AS level
			,t4.fc_referral_from, t4.fc_approved, t4.fc_mail, t4.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, null as level5, null as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t5.fc_member, t5.fc_referral_id, t5.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 5 AS level
			,t5.fc_referral_from, t5.fc_approved, t5.fc_mail, t5.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, null as level6, null as level7,null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_member AS t5 ON t5.fc_referral_id = t4.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t6.fc_member, t6.fc_referral_id, t6.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 6 AS level
			,t6.fc_referral_from, t6.fc_approved, t6.fc_mail, t6.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, null as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_member AS t5 ON t5.fc_referral_id = t4.fc_referral_from
			JOIN tm_member AS t6 ON t6.fc_referral_id = t5.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t7.fc_member, t7.fc_referral_id, t7.fv_member,p.fv_province,c.fv_city, c.fc_jenis, 7 AS level
			,t7.fc_referral_from, t7.fc_approved, t7.fc_mail, t7.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, null as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_member AS t5 ON t5.fc_referral_id = t4.fc_referral_from
			JOIN tm_member AS t6 ON t6.fc_referral_id = t5.fc_referral_from
			JOIN tm_member AS t7 ON t7.fc_referral_id = t6.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t8.fc_member, t8.fc_referral_id, t8.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 8 AS level
			,t8.fc_referral_from, t8.fc_approved, t8.fc_mail, t8.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8, null as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_member AS t5 ON t5.fc_referral_id = t4.fc_referral_from
			JOIN tm_member AS t6 ON t6.fc_referral_id = t5.fc_referral_from
			JOIN tm_member AS t7 ON t7.fc_referral_id = t6.fc_referral_from
			JOIN tm_member AS t8 ON t8.fc_referral_id = t7.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t9.fc_member, t9.fc_referral_id, t9.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 9 AS level
			,t9.fc_referral_from, t9.fc_approved, t9.fc_mail, t9.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, null as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_member AS t5 ON t5.fc_referral_id = t4.fc_referral_from
			JOIN tm_member AS t6 ON t6.fc_referral_id = t5.fc_referral_from
			JOIN tm_member AS t7 ON t7.fc_referral_id = t6.fc_referral_from
			JOIN tm_member AS t8 ON t8.fc_referral_id = t7.fc_referral_from
			JOIN tm_member AS t9 ON t9.fc_referral_id = t8.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk'
			UNION ALL
			SELECT t10.fc_member, t10.fc_referral_id, t10.fv_member,p.fv_province,c.fv_city,c.fc_jenis, 10 AS level
			,t10.fc_referral_from, t10.fc_approved, t10.fc_mail, t10.fc_hold, t1.fc_referral_id AS level1, t2.fc_referral_id as level2, t3.fc_referral_id as level3, t4.fc_referral_id as level4, 
			t5.fc_referral_id as level5, t6.fc_referral_id as level6, t7.fc_referral_id as level7, t8.fc_referral_id as level8,  t9.fc_referral_id as level9, t10.fc_referral_id as level10
			, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id,'/',t5.fc_referral_id,'/',t6.fc_referral_id,'/',t7.fc_referral_id,'/',t8.fc_referral_id,'/',t9.fc_referral_id,'/',t10.fc_referral_id) AS path
			FROM tm_member AS t1
			JOIN tm_member AS t2 ON t2.fc_referral_id = t1.fc_referral_from
			JOIN tm_member AS t3 ON t3.fc_referral_id = t2.fc_referral_from
			JOIN tm_member AS t4 ON t4.fc_referral_id = t3.fc_referral_from
			JOIN tm_member AS t5 ON t5.fc_referral_id = t4.fc_referral_from
			JOIN tm_member AS t6 ON t6.fc_referral_id = t5.fc_referral_from
			JOIN tm_member AS t7 ON t7.fc_referral_id = t6.fc_referral_from
			JOIN tm_member AS t8 ON t8.fc_referral_id = t7.fc_referral_from
			JOIN tm_member AS t9 ON t9.fc_referral_id = t8.fc_referral_from
			JOIN tm_member AS t10 ON t10.fc_referral_id = t9.fc_referral_from
			JOIN tm_province AS p ON p.fc_province =t1.fc_province
			JOIN tm_city AS c ON c.fc_city =t1.fc_city
			WHERE t1.fc_referral_from ='jk' ;

-- ----------------------------
-- Procedure structure for alamatMahasiswa
-- ----------------------------
DROP PROCEDURE IF EXISTS `alamatMahasiswa`;
delimiter ;;
CREATE PROCEDURE `alamatMahasiswa`(fc_referral_from VARCHAR(100))
BEGIN
    -- Level 1
SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member, 1 AS level
, t1.fv_member AS name_level1, null as name_level2
, null as name_level3, null as name_level4
, t1.fc_referral_id AS path
FROM tm_member AS t1
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 2
UNION ALL
SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member, 2 AS level
, t1.fv_member AS name_level1, t2.fv_member as name_level2
, null as name_level3, null as name_level4
, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 3
UNION ALL
SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member, 3 AS level
, t1.fv_member AS name_level1, t2.fv_member as name_level2
, t3.fv_member AS name_level3, null as name_level4
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
WHERE t1.fc_referral_from ="COBAAJA"
-- Level 3
UNION ALL
SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member, 4 AS level
, t1.fv_member AS name_level1, t2.fv_member as name_level2
, t3.fv_member AS name_level3, t4.fv_member as name_level4
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
WHERE t1.fc_referral_from ="COBAAJA"
-- Ordering Result
ORDER BY path;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for alamatMahasiswas
-- ----------------------------
DROP PROCEDURE IF EXISTS `alamatMahasiswas`;
delimiter ;;
CREATE PROCEDURE `alamatMahasiswas`(fc_referral_from VARCHAR(100))
BEGIN
    -- Level 1
SELECT t1.fc_member, t1.fc_referral_id, t1.fv_member, 1 AS level
, t1.fv_member AS name_level1, null as name_level2
, null as name_level3, null as name_level4
, t1.fc_referral_id AS path
FROM tm_member AS t1
-- Level 2
UNION ALL
SELECT t2.fc_member, t2.fc_referral_id, t2.fv_member, 2 AS level
, t1.fv_member AS name_level1, t2.fv_member as name_level2
, null as name_level3, null as name_level4
, concat(t1.fc_referral_id,'/',t2.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
-- Level 3
UNION ALL
SELECT t3.fc_member, t3.fc_referral_id, t3.fv_member, 3 AS level
, t1.fv_member AS name_level1, t2.fv_member as name_level2
, t3.fv_member AS name_level3, null as name_level4
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
-- Level 3
UNION ALL
SELECT t4.fc_member, t4.fc_referral_id, t4.fv_member, 4 AS level
, t1.fv_member AS name_level1, t2.fv_member as name_level2
, t3.fv_member AS name_level3, t4.fv_member as name_level4
, concat(t1.fc_referral_id,'/',t2.fc_referral_id,'/',t3.fc_referral_id,'/',t4.fc_referral_id) AS path
FROM tm_member AS t1
JOIN tm_member AS t2 ON t2.fc_referral_from = t1.fc_referral_id
JOIN tm_member AS t3 ON t3.fc_referral_from = t2.fc_referral_id
JOIN tm_member AS t4 ON t4.fc_referral_from = t3.fc_referral_id
-- Ordering Result
ORDER BY path;

END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tm_member
-- ----------------------------
DROP TRIGGER IF EXISTS `add_ticket`;
delimiter ;;
CREATE TRIGGER `add_ticket` AFTER INSERT ON `tm_member` FOR EACH ROW insert into tm_ticket set fc_member=new.fc_member,fn_saldo=0, fd_request= NOW()
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
