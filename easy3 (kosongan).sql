-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2024 at 04:14 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy3`
--

-- --------------------------------------------------------

--
-- Table structure for table `alatkalibrasi`
--

CREATE TABLE `alatkalibrasi` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(255) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `no_seri` varchar(255) DEFAULT NULL,
  `kode_inventaris` varchar(255) NOT NULL,
  `harga` decimal(14,2) DEFAULT NULL,
  `penyedia` varchar(255) NOT NULL,
  `rentang_ukur` varchar(255) NOT NULL,
  `resolusi` varchar(255) NOT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `tgl_kalibrasi` date DEFAULT NULL,
  `link_alat` text NOT NULL,
  `doc_alat` varchar(255) DEFAULT '',
  `kembali` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alatkalibrasi`
--

INSERT INTO `alatkalibrasi` (`id_alat`, `nama_alat`, `merek`, `tipe`, `no_seri`, `kode_inventaris`, `harga`, `penyedia`, `rentang_ukur`, `resolusi`, `tgl_diterima`, `tgl_kalibrasi`, `link_alat`, `doc_alat`, `kembali`) VALUES
(1, 'Data Logger (A)', 'HIOKI', 'LR8402-20', '180833483', 'ENS10/AK/DLG/01', 52053500.00, 'PT. Cahaya Murni Cemerlang', '0-100 C', '1 C', '2018-07-30', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1dg3OMg2ozVs1ZWgO9AVgI9W-Fj-y8w9f;;https://drive.google.com/uc?export=view&id=10-vHw3UED0B1sVxRl5ZFvakbHXGTwDIO;;https://drive.google.com/uc?export=view&id=1nc43ATzDWsKemaBpq2d59aFi7TLfx8Xy', '', 'Ya'),
(2, 'Defibrilator Analyzer', 'FLUKE', 'IMPLUSE 6000D', '4341044', 'ENS10/AK/DFA/02', 73513000.00, 'PT. Quantum Inti Akurasi', '', '', '2018-09-20', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1PpGmBgnfTKuejcNT9upztrmqW6VXpo-e;;https://drive.google.com/uc?export=view&id=1wXgarS-MlTEl_yiIpfLKB0uHcON-diJT', '', 'Ya'),
(3, 'Digital Pressure Meter 1G (A)', 'FLUKE', 'DPM4-1G', '4158039', 'ENS10/AK/DPM/03', 43392000.00, 'PT. Quantum Inti Akurasi', '-700 to 5000 mmHg', '0.5 mmHg', '2018-09-20', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1oGXDyiz87LXsjTmPEB4Q5ZkfJhmyus0_;;https://drive.google.com/uc?export=view&id=1TX40ODKF68j-zv-qdtKfXK4xGDZlMVTr;;https://drive.google.com/uc?export=view&id=18F34OyRQv7VEj2GYfS8P8dj4dhL2uh-p;;https://drive.google.com/uc?export=view&id=1UF9kGVpwo2SeFU4bvQz966OXKnt8Imbh;;https://drive.google.com/uc?export=view&id=17x4Qsxh0CaHmMwmcLzKEh9zB0dTN5um6', '', 'Ya'),
(4, 'Digital Pressure Meter 1H (A)', 'Fluke', 'DPM-1H', '3693042', 'ENS10/AK/DPM/04', 31680000.00, 'PT. Quantum Inti Akurasi', '-350 to 350 mmHg', '0.1 mmhg', '2017-11-07', '2019-08-09', 'https://drive.google.com/uc?export=view&id=1Cw0NDO-uKDWNAp9u29kn5DyxPhIlvQIF;;https://drive.google.com/uc?export=view&id=1uwv57WJbCnH1KTSoQ5plFKBeXw5l-pmC', '', 'Ya'),
(5, 'Electrical Safety Analyzer (A)', 'Rigel', 'Safe Test 60', '18J-0834', 'ENS10/AK/ESA/05', 32800000.00, 'PT. FANIA ERSA PRATAMA', '', '', '2018-02-22', '2021-04-22', '-', '', 'Ya'),
(6, 'Electro Surgical Analyzer', 'Rigel', 'UNI Therm', '28K-0404', 'ENS10/AK/ESU/06', 139500000.00, 'PT. Fania Ersa Pratama', '', '', '2018-08-04', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1yicpSVnXdbVHXnXDtjU3IxvQHr1502fK;;https://drive.google.com/uc?export=view&id=19h3nA3iUOKG_CPU7xlTvCbBQSkzvoU0e', '', 'Ya'),
(7, 'Fetal Simulator (A)', 'Fluke', 'PS320', '4040023', 'ENS10/AK/FSM/07', 100322727.00, 'PT. Quantum Inti Akurasi', '30-240 bpm', '30 bpm', '2018-09-12', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1WTIhPlTlKF8ddDpWF2j3m-0tVhiaDW3I;;https://drive.google.com/uc?export=view&id=1SCil1C6C2vi9SwpT1ZdqRZtruKtsKZio;;https://drive.google.com/uc?export=view&id=196UOPwKCgLmfNKRlwd3k_DJOnmCCspwN;;https://drive.google.com/uc?export=view&id=15uuNHjgYQkQRfEKF58vuoJwDAGP3H83x;;https://drive.google.com/uc?export=view&id=1A25hWDNqSbqpGskokwaAI6cChKGA8_HA', '', 'Ya'),
(8, 'X-Ray Multimeter', 'Black Piranha', 'Black Piranha 657 Premium', 'Black Piranha 657 Premium', 'ENS10/AK/RAY/57', 130625000.00, 'PT.Mitrafamed Farma Utama', '', '', '2021-04-27', '0000-00-00', '-', '', 'Ya'),
(9, 'Gas Detector', 'Riken Keiki', 'FI-8000', '51H0369901-1', 'ENS10/AK/GDC/08', 88200000.00, 'PT. Pratama Graha Semesta', '', '', '2018-07-12', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1s6OgS0PMAPTnG-yShyUmskOqhzgc1w7Q;;https://drive.google.com/uc?export=view&id=1Z-5t6iTjmCDcIjCxe3koyrv-V5h_ppx_', '', 'Ya'),
(10, 'Gas Flow Analyzer', 'Fluke', 'VT-650', '4246029', 'ENS10/AK/GFA/09', 117727000.00, 'PT. Quantum Inti Akurasi', '', '', '2018-09-12', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1KeSLS-Bv2LF93EbkckSyg9zXDh0gMmPA;;https://drive.google.com/uc?export=view&id=1gv7Im2eA8jIeKg4JlodubWQdnJmpH4AV', '', 'Ya'),
(11, 'Incu Analyzer', 'Fluke', 'INCU II', '42180041', 'ENS10/AK/INA/10', 168181800.00, 'PT. Quantum Inti Akurasi', '0 to 50 C', '0.01 C', '2018-09-12', '2018-10-02', 'https://drive.google.com/uc?export=view&id=1zvWtRwaTfVz7ROnntSrrXMBKib3erknm;;https://drive.google.com/uc?export=view&id=1weV52xNHMKuaSxLazwfMKC4ofLqF9RxN;;https://drive.google.com/uc?export=view&id=1UQsQM-cw5A9DkJ6mE9rZoqSag995Ahc3;;https://drive.google.com/uc?export=view&id=1MS9UcJQPdmM0bCw4fVH34ZI775Nz4_yM', '', 'Ya'),
(12, 'Kaliper (A)', 'SylVac', 'S-Cal Pro', '89103', 'ENS10/AK/KLP/11', 3650000.00, 'PT. Quantum Inti Akurasi', '', '', '2018-06-02', '2018-07-17', 'https://drive.google.com/uc?export=view&id=1fv4-IWZZyzaq1Yu_pSfwms3moB4FIooh;;https://drive.google.com/uc?export=view&id=1fv4-IWZZyzaq1Yu_pSfwms3moB4FIooh', '', 'Ya'),
(13, 'Light Meter', 'BK Precision', '615', '154K17119', 'ENS10/AK/LGM/12', 2223750.00, 'PT. Quantum Inti Akurasi', '', '', '2018-03-12', '2018-07-17', 'https://drive.google.com/uc?export=view&id=1hbHjXB7gegJEMUNffqfDY1w3icBqzlxc', '', 'Ya'),
(14, 'Lux meter (A)', 'Hioki', 'FT3424', '171129874', 'ENS10/AK/LUX/13', 7400000.00, 'PT. RADIUS ALLKINDO ELECTRIC', '', '', '0218-09-18', '2018-10-02', '-', '', 'Ya'),
(15, 'Hitemp Data Logger', 'Madgetech', 'AVS 140-6', 'Q74216, Q74217, Q74220, Q74224, Q74231', 'ENS10/AK/HDL/14', 165128500.00, 'Global Instrument', '', '', '2018-07-06', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1ZsjmSWJHNjCmUIl5QUsF0Sp6xOUBktgk', '', 'Ya'),
(16, 'Phototheraphy Radiometer', 'FLUKE', 'Dale40', '4614010', 'ENS10/AK/PHO/36', 40753570.00, 'PT. QUANTUM INTI AKURASI', '', '', '2019-06-28', '0000-00-00', '-', '', 'Ya'),
(17, 'Infusion Device Analyzer', 'Rigel', 'Multi-Flo', '13K-0167', 'ENS10/AK/IDA/15', 155200000.00, 'PT. Fania Ersa Pratama', '', '', '2018-02-22', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1tRMbvirFCJ73_5_c0ZOTFeHoKHm2kRp8;;https://drive.google.com/uc?export=view&id=1gbQphRpE-ITaS5pNxWq7EUWOBl9hUn3m;;https://drive.google.com/uc?export=view&id=1PVv5GG_o9Ok65naunjjLIqvSXHKSAjGu', '', 'Ya'),
(18, 'Phatom USG', 'CIRS', '054GS', '181212573', 'ENS10/AK/USG/16', 39000000.00, 'Nico Seco Adisaputra', '', '', '2018-10-19', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1UB8IU5N49SZkqFHysy55Vb0HstZEkzht', '', 'Ya'),
(19, 'Stopwatch (A)', 'Casio', 'HS-80TW', 'J806', 'ENS10/AK/STP/17', 730000.00, 'Tokopedia', '', '', '2018-10-09', '2020-01-16', 'https://drive.google.com/uc?export=view&id=1qP1ZRCiKpQE4TxB6STs43zH6OVT2aTLC', '', 'Ya'),
(20, 'Tachometer (A)', 'Ono Sokki', 'HT-5500', '170100255R', 'ENS10/AK/TCO/18', 11350000.00, 'PT. Quantum Inti Akurasi', '', '', '2018-02-06', '2019-08-09', 'https://drive.google.com/uc?export=view&id=1qrz-OK0UHYbu7aiEjzSdD0gTXcqPERib', '', 'Ya'),
(21, 'Thermo Higro Meter (A)', 'AND', 'AD-1687', 'TI00364', 'ENS10/AK/THG/19', 6300000.00, 'PT. Metro Abdibina Sentosa', '', '', '2019-10-25', '0000-00-00', 'https://drive.google.com/uc?export=view&id=139RdBNXt09NVzCV8NLIiJ6BsDbzB-nDv', '', 'Ya'),
(22, 'Thermo Higro Meter (B)', 'BK Precision', '625', '155E16116', 'ENS10/AK/THG/20', 5252000.00, 'PT. Quantum Inti Akurasi', '', '', '2018-02-06', '2020-08-22', 'https://drive.google.com/uc?export=view&id=1kTXiemVn76JYnGmaLSrqxbVEAjwKvpNh', '', 'Ya'),
(23, 'Vital Sign Simulator (A)', 'Rigel', 'Uni-SIM', '25K-0878', 'ENS10/AK/PSM/21', 115836364.00, 'PT. Fania Ersa Pratama', '', '', '2018-02-22', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1NFWd2O3kBJicXfwY4PdEUoVPaEsZWdfq;;https://drive.google.com/uc?export=view&id=12Ss8mB0k1bA3fH5lmQZMPX7ClMknbmWV', '', 'Ya'),
(24, 'Anak Timbangan Dewasa 20 kg (A)', 'Almega', 'F1', '12030718', 'ENS10/AK/ANT/22', 82280000.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(25, 'Anak Timbangan Bayi 5Kg (A)', 'SONIC', 'F1', 'A3858', 'ENS10/AK/ANT/30', 29111500.00, 'PT Almega Sejahtera', '', '', '2018-02-26', '2021-04-15', '-', '', 'Ya'),
(26, 'Waterbath', 'Memmert', 'WNB7', 'L218.0187', 'ENS10/AK/WTB/34', 13362800.00, 'PT SUMBER ANEKA KARYA ABADI', '', '', '2018-07-24', '0000-00-00', '-', '', 'Ya'),
(27, 'Set Anak Timbangan Analitik', 'Fuyue', 'F1', '-', 'ENS10/AK/ANT/37', 0.00, 'PT. Metro Abdibina Sentosa', '1 to 1000 mg', '1 mg', '0000-00-00', '2020-02-13', 'https://drive.google.com/uc?export=view&id=1EdxFG9_7f_lYrlgoP8UHbNut4ESNqtLS', '', 'Ya'),
(28, 'Set Kalibrator Mikroskop (B)', 'Optilab', 'viewer 2.2', '-', 'ENS10/AK/MKP/39', 5596000.00, 'Tokopedia', '', '', '2020-11-27', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1DrxtXM04pCDLq1_RfsquXiAzmg1ORsSX', '', 'Ya'),
(29, 'Thermo Higrometer (C)', 'AND', 'AD-1687', 'T1201481', 'ENS10/AK/THG/52', 4880000.00, 'PT. METRO ABDIBINA SENTOSA', '', '', '2018-07-31', '0000-00-00', '-', '', 'Ya'),
(30, 'Digital Spring Scale', 'Wei Heng', 'WH-A08', 'O28MGA2601', 'ENS10/AK/SPS/53', 56560.00, 'Tokopedia', '', '', '2021-02-11', '0000-00-00', '-', '', 'Ya'),
(31, 'Tachometer (B)', 'HTI', 'HT-522', '201901010849', 'ENS10/AK/TCO/54', 470000.00, 'PT. Quantum Inti Akurasi', '', '', '0000-00-00', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1R9aCppBybD1HYEvXv3dcduicXYVS2hao', '', 'Ya'),
(32, 'Lux Meter (B)', 'Hioki', 'FT3424', '200949475', 'ENS10/AK/LUX/55', 6678750.00, 'PT. Metro Abdibina Sentosa', '', '', '2021-01-06', '0000-00-00', '-', '', 'Ya'),
(33, 'Data Logger (B)', 'Hioki', 'LR8450LR8531', '201249386 201133104', 'ENS10/AK/DLG/56', 49627500.00, 'PT. Metro Abdibina Sentosa', '', '', '2021-01-06', '0000-00-00', 'https://drive.google.com/uc?export=view&id=14eNHPgM3LhRI8ySkcPGVgk-m1Ui-jaAA;;https://drive.google.com/uc?export=view&id=17PA00b5O3fGlK3UhWSdOVtefy9UFYFYj;;https://drive.google.com/uc?export=view&id=1m96oikf3A6SgXLlw8ve1Y49vq48HrTgH', '', 'Ya'),
(36, 'Set Kalibrator Mikroskop (A)', 'Optilab', 'viewer 3.0', 'C1711270285', 'ENS10/AK/MKP/38', 0.00, 'Tokopedia', '', '', '2020-11-23', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1iXkHJbzg6BFsYej1raLYyCKNekTBOykx', '', 'Ya'),
(37, 'Fetal Simulator (B)', 'FLUKE', 'PS320', '4662035', 'ENS10/AK/FSM/62', 179600000.00, 'PT. Quantum Inti Akurasi', '30-240 bpm', '30 bpm', '2021-07-03', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1zYeyhboTJeGCIkLuAlty7k_P6C_9mwRn;;https://drive.google.com/uc?export=view&id=1rulR6FyFtl7gG8HvENSRtU3QukGMWfxF;;https://drive.google.com/uc?export=view&id=1GscpquweFF_BF5-f5JYRb8NshYuyJL3d', '', 'Ya'),
(38, 'Digital Pressure Meter 1G (B)', 'FLUKE', 'DPM4-1G', '5159025', 'ENS10/AK/DPM/58', 189530000.00, 'PT. Quantum Inti Akurasi', '-700 to 5000 mmHg', '0.5 mmHg', '2021-07-22', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1bFzi7aO9pzMi9xSS1oTNhfolCZ_s4XZD;;https://drive.google.com/uc?export=view&id=1sOfWnqbvNvseiPbS7I4d0wqCcD_4cvEa', '', 'Ya'),
(39, 'Vital Sign Simulator (B)', 'FLUKE', 'Prosim 8', '5156686', 'ENS10/AK/PSM/61', 425940000.00, 'PT. Quantum Inti Akurasi', '', '', '2021-07-22', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1qDG45gE-K7FL8-7dxj4kml0uPtPgqwtJ;;https://drive.google.com/uc?export=view&id=1A6o5meZpiFnbYu_l3j1gTQewQiCIAguN;;https://drive.google.com/uc?export=view&id=1Oy2cP1rNVNZjDKUNZiAIpfYWM2hjeKIe', '', 'Ya'),
(40, 'Volume Syringe Calibrator', 'Hans Rudolf', '-', '-', 'ENS10/AK/SYR/64', 137610000.00, 'PT. Quantum Inti Akurasi', '', '', '2021-07-22', '0000-00-00', '-', '', 'Ya'),
(41, 'Electrical Safety Analyzer (B)', 'FLUKE', 'ESA 612', '5306014', 'ENS10/AK/ESA/60', 187550000.00, 'PT. Quantum Inti Akurasi', '', '', '2021-07-22', '0000-00-00', 'https://drive.google.com/uc?export=view&id=19IEREz_CnuFlaupSHlT_JGlZi5RuzwS6;;https://drive.google.com/uc?export=view&id=12dg36Sg2DvTFAdlCVO1te_BypZZkfsFY', '', 'Ya'),
(42, 'Air Flow Meter (B)', 'Siargo', 'MF5706', '-', 'ENS10/AK/DFM/66', 15620000.00, 'Tokopedia', '', '', '2021-07-22', '0000-00-00', '-', '', 'Ya'),
(43, 'Air Flow Meter (A)', '-', 'MF5712', '-', 'ENS10/AK/DFM/65', 15620000.00, 'Tokopedia', '', '', '2021-07-22', '0000-00-00', '-', '', 'Ya'),
(44, 'Survey Meter', 'FLUKE', 'Raysafe 452', '-', 'ENS10/AK/SRV/67', 9210991.00, 'PT. Quantum Inti Akurasi', '', '', '2021-07-12', '0000-00-00', '-', '', 'Ya'),
(45, 'Digital Pressure Meter 1H (B)', 'FLUKE', 'DPM-1H', '5478050', 'ENS10/AK/DPM/59', 59544091.00, 'PT Cahaya Intan Medika', '-350 to 350 mmHg', '0.1 mmhg', '2021-06-04', '0000-00-00', 'https://drive.google.com/uc?export=view&id=1SholY33uD0m87WLHMHpSnotnq_6WReq6;;https://drive.google.com/uc?export=view&id=1wMjEhBV6EzR7MDAs9-24wjb-hJ3hx5Zw', '', 'Ya'),
(48, 'Colimator Test Tool', 'Pro-Project', 'Pro-Fluo 150', 'R-FD-000519', 'ENS10/AK/CMT/63', 0.00, 'PT. Quantum Inti Akurasi', '', '', '2021-06-30', '0000-11-30', '-', '', 'Ya'),
(49, 'Waterlevel', 'Toho', 'Magnetic Level', '-', 'ENS10/AK/WTR/68', 2000000.00, 'Ace Hardware', '', '', '0000-11-30', '0000-11-30', '-', '', 'Ya'),
(50, 'Meteran Digital', 'Krisbow', 'LRMTL1', '-', 'ENS10/AK/MTR/72', 999999.00, 'Ace Hardware', '', '', '2021-07-22', '2022-06-25', '-', '', 'Ya'),
(51, 'Thermometer Digital', 'Krisbow', 'KW06-277', '160829855', 'ENS10/AK/THM/35', 999999.00, 'Ace Hardware', '', '', '0000-11-30', '0000-11-30', '-', '', 'Ya'),
(52, 'Clinical Chamber', 'Memmert', 'HPP110eco', 'W421.0399', 'ENS10/AK/CLI/71', 100000000.00, 'PT SUMBER ANEKA KARYA ABADI', '', '', '2022-06-10', '2022-07-11', '-', '', 'Ya'),
(53, 'Stopwatch (B)', 'Casio', 'HS-80TW', 'J009Q03', 'ENS10/AK/STP/73', 999999.00, '-', '', '', '2022-07-04', '2022-07-04', '-', '', 'Ya'),
(54, 'Thermo Higrometer Digital (A)', 'Extech', 'Humidity Alert II', '445815', 'ENS10/AK/THM/74', 100000.00, '-', '', '', '2018-07-04', '2018-07-04', '-', '', 'Ya'),
(55, 'Thermometer Digital (A)', 'Modern L', 'Thermometer', '-', 'ENS10/AK/TMP/75', 99999.00, '-', '', '', '2018-07-04', '2018-07-17', '-', '', 'Ya'),
(56, 'Thermometer Digital (B)', 'Modern L', 'Thermometer', '-', 'ENS10/AK/TMP/76', 99999.00, '-', '', '', '2018-07-04', '2018-07-11', '-', '', 'Ya'),
(57, 'Kaliper (B)', 'Mitutoyo', 'CD-6 CSX', '07415021', 'ENS10/AK/KLP/77', 1750000.00, 'PT. Quantum Inti Akurasi', '', '', '2022-07-01', '2022-07-04', '-', '', 'Ya'),
(58, 'Anak Timbangan Dewasa 20 kg (B)', 'Almega', 'F1', '12030718', 'ENS10/AK/ANT/23', 99999999.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(59, 'Anak Timbangan Dewasa 20 kg (C)', 'Almega', 'F1', '12030718', 'ENS10/AK/ANT/24', 899999.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(60, 'Anak Timbangan Dewasa 20 kg (D)', 'Almega', 'F1', '12030718', 'ENS10/AK/ANT/25', 9999999.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(61, 'Anak Timbangan Dewasa 20 kg (E)', 'Almega', 'F1', '12030718', 'ENS10/AK/ANT/26', 99999999.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(62, 'Anak Timbangan Bayi 2Kg (A)', 'SONIC', 'F1', 'A3820', 'ENS10/AK/ANT/31', 0.00, 'PT Almega Sejahtera', '', '', '2018-02-27', '2018-02-27', '-', '', 'Ya'),
(63, 'Anak Timbangan Bayi 2Kg (B)', 'SONIC', 'F1', 'A3860', 'ENS10/AK/ANT/32', 0.00, 'PT Almega Sejahtera', '', '', '2018-02-26', '2018-02-27', '-', '', 'Ya'),
(64, 'Anak Timbangan Dewasa 10 kg (A)', 'Almega', 'F1', '11030718', 'ENS10/AK/ANT/27', 9999999.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(65, 'Anak Timbangan Dewasa 10 kg (B)', 'Almega', 'F1', '11030718', 'ENS10/AK/ANT/28', 9999999.00, 'PT. ALMEGA SEJAHTERA', '', '', '2018-09-12', '2018-10-02', '-', '', 'Ya'),
(66, 'Anak Timbangan Bayi 1Kg (A)', 'SONIC', 'F1', 'A3857', 'ENS10/AK/ANT/33', 0.00, 'PT Almega Sejahtera', '', '', '2018-02-26', '2018-02-27', '-', '', 'Ya'),
(67, 'Anak Timbangan Bayi 10Kg (A)', 'SONIC', 'F1', '-', 'ENS10/AK/ANT/29', 0.00, 'PT Almega Sejahtera', '', '', '2018-02-26', '2018-02-27', '-', '', 'Ya'),
(68, 'Anak Timbangan Bayi 1Kg (B)', 'SONIC', 'M1', 'A7260', 'ENS10/AK/ANT/40', 0.00, 'PT. Interskala Mandiri Indonesia', '', '', '2020-02-26', '2020-02-27', '-', '', 'Ya'),
(69, 'Anak Timbangan Bayi 2Kg (C)', 'Yahong', 'M1', '2013649', 'ENS10/AK/ANT/41', 0.00, 'Salter Toko Waralaba', '', '', '2020-02-26', '2020-02-27', '-', '', 'Ya'),
(70, 'Anak Timbangan Dewasa 10 Kg (C)', '-', 'M2', '-', 'ENS10/AK/ANT/45', 99999999.00, 'Yahong Trading Indonesia', '', '', '2020-07-12', '2020-08-22', '-', '', 'Ya'),
(71, 'Anak Timbangan Bayi 2Kg (D)', 'Yahong', 'M1', '2013651', 'ENS10/AK/ANT/42', 0.00, 'Salter Toko Waralaba', '', '', '2020-02-26', '2020-02-27', '-', '', 'Ya'),
(72, 'Anak Timbangan Bayi 5Kg (B)', 'Yahong', 'M1', '2013663', 'ENS10/AK/ANT/43', 0.00, 'Yahong Trading Indonesia', '', '', '2020-02-26', '2020-02-27', '-', '', 'Ya'),
(73, 'Anak Timbangan Dewasa 10 kg (D)', '-', 'M2', '-', 'ENS10/AK/ANT/46', 9999999.00, 'Yahong Trading Indonesia', '', '', '2020-11-23', '2020-01-16', '-', '', 'Ya'),
(74, 'Anak Timbangan Bayi 10Kg (B)', 'Yahong', 'M1', '7121', 'ENS10/AK/ANT/44', 0.00, 'Yahong Trading Indonesia', '', '', '2020-02-26', '2020-02-27', '-', '', 'Ya'),
(75, 'Anak Timbangan Dewasa 20 kg (F)', '-', 'M2', '-', 'ENS10/AK/ANT/47', 999999.00, 'Yahong Trading Indonesia', '', '', '2022-07-04', '2022-07-04', '-', '', 'Ya'),
(76, 'Anak Timbangan Dewasa 20 kg (G)', '-', 'M2', '-', 'ENS10/AK/ANT/48', 9999999.00, 'Yahong Trading Indonesia', '', '', '2022-07-04', '2022-07-04', '-', '', 'Ya'),
(77, 'Anak Timbangan Dewasa 20 kg (H)', '-', 'M2', '-', 'ENS10/AK/ANT/49', 9999999.00, 'Yahong Trading Indonesia', '', '', '2022-07-04', '2022-07-04', '-', '', 'Ya'),
(78, 'Anak Timbangan Dewasa 20 kg (I)', '-', 'M2', '-', 'ENS10/AK/ANT/50', 9999999.00, 'Yahong Trading Indonesia', '', '', '2022-07-04', '2022-07-04', '-', '', 'Ya'),
(79, 'Anak Timbangan Dewasa 20 kg (J)', '-', 'M2', '-', 'ENS10/AK/ANT/51', 9999999.00, 'Yahong Trading Indonesia', '', '', '2022-07-04', '2022-07-04', '-', '', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `berkasteknisi`
--

CREATE TABLE `berkasteknisi` (
  `id_berkasteknisi` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `kondisi_berkasteknisi` varchar(20) DEFAULT NULL,
  `kelengkapan_berkasteknisi` varchar(255) DEFAULT NULL,
  `kembali_berkasteknisi` varchar(1) NOT NULL,
  `lastupdate_berkasteknisi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailpeminjamanmikropipet`
--

CREATE TABLE `detailpeminjamanmikropipet` (
  `id_detailpeminjaman` int(11) NOT NULL,
  `no_proyek` varchar(255) NOT NULL,
  `id_mikropipet` int(11) NOT NULL,
  `kembali` varchar(255) DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kajiulang`
--

CREATE TABLE `kajiulang` (
  `id_kajiulang` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_barang_kajiulang` varchar(255) NOT NULL,
  `jumlah_barang_kajiulang` int(11) NOT NULL,
  `penyedia_kajiulang` varchar(255) DEFAULT '',
  `catatan_kajiulang` varchar(255) NOT NULL,
  `kategori_kajiulang` varchar(255) NOT NULL,
  `kp_kajiulang` varchar(255) NOT NULL,
  `kal_kajiulang` varchar(255) NOT NULL,
  `bpl_kajiulang` varchar(255) NOT NULL,
  `kpk_kajiulang` varchar(255) NOT NULL,
  `kmk_kajiulang` varchar(255) NOT NULL,
  `lastupdate_kajiulang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `waktu_layanan` int(11) NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `daftaralat_layanan` varchar(255) DEFAULT NULL,
  `link_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `waktu_layanan`, `harga_layanan`, `daftaralat_layanan`, `link_layanan`) VALUES
(1, 'Anestesi Unit tanpa Vaporizer', 60, 770000, '10;42;43;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAXPYMlJO1_nmE16A?e=HipQwA'),
(2, 'Anestesi Ventilator', 90, 1210000, '10;42;43;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAceR3grjdZVytxOQ?e=wahlRg'),
(3, 'Autoclave / Steam Sterilizer', 95, 880000, '5;41;21;22;29;54;1;33;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAVL_v90IRSXgi_XQ?e=H54t4i'),
(4, 'Bed Side Monitor (Patient Monitor)', 75, 715000, '23;39;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htASiRD8YF8nywbM7g?e=5s42yu'),
(5, 'Blood Solution Warmer', 90, 550000, '1;33;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAQqHLfVZKHCmGhhQ?e=co0PQO'),
(14, 'Blood Bank Refrigerator', 90, 670000, '1;33;50;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htATBxgCJhHg4DstTw?e=snNSAy'),
(15, 'Centrifuge', 75, 330000, '20;31;19;53;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htARWlvcOnCEcw6XoQ?e=KrswdH'),
(16, 'Cardiotocograph (CTG) / Non-Stress Test (NST)', 50, 330000, '7;37;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAUhY9O-1CD9N31pw?e=SquYy1'),
(17, 'Defibrilator (DC Shock)', 75, 385000, '2;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAIKxYt34LmlQUy9A?e=4oLI1c'),
(18, 'Electrocardiogram (ECG)', 82, 330000, '23;39;12;57;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAK7jpmcXqJjSI6GA?e=RVBySK'),
(19, 'Electrosurgical Unit / Electro Cauter (ESU)', 90, 715000, '6;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAGKkm_tdI-GeHR0g?e=4CQ5ra'),
(20, 'Fetal Doppler', 45, 330000, '7;37;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAFfwtqtpFOu8bQOg?e=V4EjHl'),
(21, 'Infant Incubator / Baby Incubator', 150, 660000, '11;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAWqmbC0Hoo_G99dg?e=xMHfla'),
(22, 'Infant Warmer', 75, 473000, '11;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9_NpnY_vqZuq0QZA?e=eb14Ku'),
(23, 'Infusion Pump', 75, 550000, '17;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htADkb6phGrsUxcuzw?e=Ya1EC9'),
(24, 'Lampu Operasi', 60, 550000, '14;32;50;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9-6_q70gDRZNXY-w?e=rIIaKH'),
(25, 'Light Source (Lampu Tindakan)', 60, 330000, '14;32;50;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs98Yfi8kZy88-EKoQ?e=d7MVvS'),
(26, 'Medical Freezer', 75, 880000, '1;33;50;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs99nL1B-kT8mkCfIA?e=CnR41Y'),
(27, 'Medical Refrigerator', 75, 880000, '1;33;50;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs99nL1B-kT8mkCfIA?e=V0KaWm'),
(28, 'Mikroskop', 90, 385000, '28;36;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs93aCzQ5jTZa4gnsg?e=JRpann'),
(29, 'Nebulizer (Compressor Nebulizer / Ultrasonic)', 45, 330000, '10;42;43;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs91jWPEJr0I4EyDtg?e=WocwTW'),
(30, 'Oxygen Therapy (Regulator/Flow Meter)', 40, 385000, '10;42;43;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAE9oLirGZ_8lJ3-g?e=DCuCv3'),
(31, 'Pulse Oxymeter (Saturasi Oxygen)', 40, 352000, '23;39;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9rX2NqTTUCt_9WSw?e=huwMzd'),
(33, 'Rotator', 50, 330000, '20;31;19;53;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9pv-MelFhXQ1YeTw?e=ReSHZ9'),
(34, 'Sterilisator Kering', 75, 880000, '1;33;50;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9nEsfdLq1J1fMl1w?e=CUlGLv'),
(35, 'Stirer', 40, 330000, '20;31;19;53;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9pv-MelFhXQ1YeTw?e=ReSHZ9'),
(36, 'Suction Pump', 55, 324500, '3;38;4;45;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9iXBBPBzmRD5uQnQ?e=ClKCxJ'),
(37, 'Syringe Pump', 75, 550000, '17;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9hOjOPuAq2q6vhHw?e=F6bfxI'),
(38, 'Sphygmomanometer (Tensimeter) / Analog / Digital', 55, 330000, '3;38;4;45;19;53;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9q02zkY4yJ6Qxl6Q?e=A0hNeG'),
(39, 'Thermometer Clinical (Contact)', 90, 350000, '1;33;26;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9erj7T0xSej5632w?e=q5RUfe'),
(40, 'Timbangan Bayi (0 - 20 kg)', 90, 473000, '66;68;62;63;69;71;25;72;67;74;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9fRuQWblgqU3TlDw?e=biwbZ5'),
(41, 'Timbangan Badan Dewasa (0-120 kg)', 90, 473000, '24;58;59;60;61;75;76;77;78;79;64;65;70;73;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9ggApcmYg0PRjUqw?e=OaMUcs'),
(43, 'Ultrasonograph (USG)', 90, 550000, '18;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9XXNo251lii7p-XA?e=OS9WXe'),
(44, 'Vaporizer', 55, 700000, '9;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9YlwiP5HhOlQsodg?e=U3EeRu'),
(45, 'Non Invasive Blood Presure (NIBP) / Tensi Otomatis', 50, 330000, '23;39;21;22;29;54;5;41;', '-'),
(47, 'Ventilator', 90, 770000, '10;42;43;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9d6NK-pbDvL2sYuA?e=YKvW88'),
(51, 'CPAP', 60, 726000, '10;42;43;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htANzDp-mKa9jh5c8A?e=0e1pHe'),
(55, 'Cold Chain / Kulkas Vaksin', 75, 880000, '1;33;50;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAOgtdcQtIQ4XUiPw?e=qBHFGb'),
(56, 'Mikropipet*', 90, 770000, NULL, 'https://1drv.ms/b/s!AiYdCU0EPW29hs96jXBFF5PokiIk6Q?e=5L3ISP'),
(58, 'Phototherapy (Blue Light)', 50, 390000, '16;50;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9tx60CSF4SOJeJng?e=qoBscM'),
(59, 'Platelet Agitator Inkubator', 63, 680000, '1;33;50;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9yBvFyve6kR_cRgw?e=X22CV2'),
(60, 'Spirometer', 65, 650000, '40;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9oEGvZZ9TaGuR-eg?e=2No1Zb'),
(61, 'Traksi', 70, 515000, '30;19;53;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9bfCkvOR9oGp7x_Q?e=qjbCqb'),
(62, 'Stress Test (Treadmill + ECG + NIBP)', 65, 530000, '20;31;23;39;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9jopw7WEtNsu-rXg?e=Jyu3ai'),
(63, 'CT Scan', 180, 3100000, '8;50;21;22;29;54;', '-'),
(65, 'X-Ray Dental Panoramic', 180, 2820000, '8;50;49;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9UJfwE2kE1GnvKFg?e=Oa79sb'),
(66, 'X-Ray Fluoroscopy', 180, 3031600, '8;50;21;22;29;54;49;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9aUNAufg-mz_cHNw?e=uRC698'),
(67, 'X-Ray General Purpose (Radiografi Umum)', 180, 3031600, '8;50;21;22;29;54;49;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9TLyI8_ccXqbuoCg?e=4apZSN'),
(69, 'X-Ray Mobile Unit', 180, 3031600, '8;50;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9QF_fcWcsK6CeqGQ?e=N9eUo0'),
(72, 'Anestesi Unit + 1 Vaporizer tanpa Liquid', 33, 1250000, '10;42;43;9;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAba5uDos9rpcVRhA?e=JprWBa'),
(73, 'Waterbath', 90, 615000, '1;33;50;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9VlvoDW-jXW0M5zg?e=5r0yjF'),
(74, 'Anestesi Unit + Ventilator + 1 Vaporizer tanpa Liquid', 145, 1765000, '10;42;43;9;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAceR3grjdZVytxOQ?e=zLonVI'),
(75, 'Anestesi Unit + Ventilator + 2 Vaporizer tanpa Liquid', 200, 2168000, '10;42;43;9;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAceR3grjdZVytxOQ?e=zLonVI'),
(80, 'Layanan Tidak/Belum Mampu', 0, 0, NULL, ''),
(81, 'Dental Unit', 90, 418000, '14;32;20;31;50;3;38;4;45;5;41;10;42;43;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAHMGSTRzaPhwgr-w?e=qZKI8P'),
(82, 'Pengukur Tinggi Badan', 30, 250000, '50;5;41;', '-'),
(87, 'Echocardiograph', 90, 550000, '18;23;39;12;57;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAL8_T0VzAsRlKF8w?e=sIX7VU'),
(88, 'Uji Keselamatan Listrik', 60, 312000, '5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9wru9oyaxmYCoRgA?e=430mJ5'),
(90, 'Analitical Balance (1 - 1000g)', 60, 629500, '5;41;21;22;29;54;27;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAeTDCFwQKg0DFOVw?e=6v7cMe'),
(91, 'Neopuff (Resusitator)', 60, 660000, '10;42;43;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9xSFwTz6UpEdjbfg?e=dKVv4c'),
(93, 'Mixer', 40, 330000, '20;31;19;53;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9pv-MelFhXQ1YeTw?e=a9cVYc'),
(96, 'Pulse Oxymeter + NIBP (Vital Sign Monitor)', 75, 426000, '23;39;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9ububk5hY1-IMdzg?e=djPgix'),
(97, 'Defibrilator + ECG', 65, 400000, '23;39;21;22;29;54;5;41;12;57;2;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAMfvDdyXkGkD2gFg?e=czpi8x'),
(99, 'Thermohygrometer 1 Sensor', 120, 430000, '1;33;52;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9lU80jFy2Jtwe65w?e=YUeXGe'),
(100, 'Parafin Bath', 120, 615000, '1;33;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9zMc-74wJF6zjnQQ?e=hAqTLx'),
(101, 'Oven', 75, 828000, '1;33;50;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs90lJeEmdd9ktHz3w?e=8Qz1RN'),
(102, 'C-Arm', 180, 3000000, '8;50;21;22;29;54;49;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9QF_fcWcsK6CeqGQ?e=ba43ue'),
(103, 'AED', 60, 385000, '2;21;22;29;54;5;41;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs92Gy6n-4FLz_ADtQ?e=618xSk'),
(104, 'Centrifuge Refrigerator', 120, 650000, '10;42;43;9;5;41;21;22;29;54;1;33;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAP4Q5NWF-iEcOlrw?e=Q8H3Ra'),
(105, 'Humidifier', 60, 550000, '1;33;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htAAC9GhoSRHpnybOw?e=0hhPYb'),
(106, 'Treadmill', 65, 395000, '20;31;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29hs9ZEkBtS8JF2Emfag?e=ze9Kl1'),
(107, 'Headlamp', 60, 330000, '14;32;50;5;41;21;22;29;54;', 'https://1drv.ms/b/s!AiYdCU0EPW29htABzzXTWwo2PslRrA?e=bORyDW'),
(108, 'Holter Monitor', 82, 330000, '23;39;12;57;21;22;29;54', ''),
(109, 'Timbangan + Pengukur Tinggi Badan', 150, 723000, '24;58;59;60;61;75;76;77;78;79;64;65;70;73;21;22;29;54;50;5;41;', ''),
(110, 'Operating Mikroskop ENT', 90, 440000, '28;36;21;22;29;54;5;41;', ''),
(111, 'Operating Mikroskop Mata', 90, 440000, '28;36;21;22;29;54;5;41;', ''),
(112, 'Operating Mikroskop Syaraf', 90, 440000, '28;36;21;22;29;54;5;41;', ''),
(113, 'Blanket Warmer', 63, 695000, '1;33;21;22;29;54;5;41;', ''),
(114, 'Electrostimulator (TENS)', 61, 550000, '19;53;5;41;21;22;29;54;', ''),
(115, 'Electro Accupunture', 61, 580000, NULL, ''),
(116, 'Electro Convulsive Teraphy (ECT)', 61, 580000, NULL, '-'),
(117, 'ENT Treatment', 90, 550000, '3;38;4;45;5;41;21;22;29;54;', ''),
(118, 'HFNC (High Flow Nasal Cannula)', 60, 473000, NULL, ''),
(119, 'Oxygen Concentrator', 40, 527000, '28;36;21;22;29;54;5;41;', ''),
(120, 'Anestesi Unit + 2 Vaporizer tanpa Liquid', 33, 1341000, '10;42;43;9;5;41;21;22;29;54;', ''),
(121, 'Operating Table + Weight Scales', 95, 550000, '5;41;24;58;59;60;61;75;76;77;78;79;64;65;70;73;21;22;29;54;', ''),
(122, 'Bor Bedah', 50, 330000, '20;31;5;41;21;22;29;54;', ''),
(123, 'Pneumatic Torniquet', 60, 550000, '3;38;4;45;5;41;21;22;29;54;', ''),
(124, 'Dry Incubator', 75, 660000, '1;33;50;21;22;29;54;5;41;', ''),
(125, 'Incubator Laboratorium', 70, 660000, '1;33;50;21;22;29;54;5;41;', ''),
(126, 'Thermohygrometer 2 Sensor', 120, 520000, '1;33;52;21;22;29;54;', ''),
(127, 'Thermometer Kulkas', 120, 380000, '1;33;52;21;22;29;54;', ''),
(128, 'Thermometer Ruangan', 120, 350000, '1;33;50;21;22;29;54;5;41;', ''),
(129, 'Roller Mixer', 40, 390000, '20;31;19;53;5;41;21;22;29;54;', '-'),
(130, 'X-Ray Dental Periapikal', 120, 2610400, '8;50;49;21;22;29;54;', ''),
(131, 'Sub Kontrak', 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `mikropipet`
--

CREATE TABLE `mikropipet` (
  `id_mikropipet` int(11) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `no_seri` varchar(255) NOT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tgl_kalibrasi` date DEFAULT NULL,
  `penyedia` varchar(255) DEFAULT NULL,
  `link_mikropipet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mikropipet`
--

INSERT INTO `mikropipet` (`id_mikropipet`, `merek`, `tipe`, `no_seri`, `volume`, `lokasi`, `tgl_kalibrasi`, `penyedia`, `link_mikropipet`) VALUES
(1, 'Onemed', 'Dragon', 'YL184AF0002420', '5-50', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(2, 'Hospital Homecare', 'Variabel', 'YE196AL0455072', '10-100', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(3, 'Hospital Homecare', 'Variabel', 'YE196AL0455140', '10-100', 'TABANAN', '0000-00-00', 'PT CMC', ''),
(4, 'Hospital Homecare', 'Variabel', 'YE196AL0455075', '10-100', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(5, 'Hospital Homecare', 'Variabel', 'YE196AL0455890', '100-1000', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(6, 'Eco Dialine', 'Variabel', 'ND978871', '10-100', 'TABANAN', '0000-00-00', 'PT Cahaya Intan Medika', ''),
(7, 'Eco Dialine', 'Variabel', 'ND978868', '10-100', 'TABANAN', '0000-00-00', 'PT Cahaya Intan Medika', ''),
(8, 'Eco Dialine', 'Variabel', 'ND978870', '10-100', 'TABANAN', '0000-00-00', 'PT Cahaya Intan Medika', '-'),
(9, 'Onemed', 'Dragon', 'VL184AF0002606', '100-1000', 'TABANAN', '0000-00-00', 'PT Cahaya Intan Medika', ''),
(10, 'Onemed', 'Dragon', 'VL184AF0002381', '5-50', 'TABANAN', '0000-00-00', 'PT Cahaya Intan Medika', '-'),
(11, 'Lichen', 'Adjustable', '183764', '5-50', 'TABANAN', '0000-00-00', 'Tokped (Ahya Toko Lab Kimia)', '-'),
(12, 'Lichen', 'Adjustable', '183792', '5-50', 'TABANAN', '0000-00-00', 'Tokped (Ahya Toko Lab Kimia)', '-'),
(13, 'Linchen', 'Adjustable', '183641', '5-50', 'TABANAN', '0000-00-00', 'Tokped (Ahya Toko Lab Kimia)', '-'),
(14, 'Hospital Homecare', 'Adjustable', 'YE196AL0454873', '0.5-10', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(15, 'Hospital Homecare', 'Adjustable', 'YE196AL0454874', '0.5-10', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(16, 'Hospital Homecare', 'Adjustable', 'YE196AL0455094', '10-100', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(17, 'Hospital Homecare', 'Adjustable', 'YE196AL0455095', '10-100', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(18, 'DLAB', 'Adjustable', 'YL218AK0083202', '10-100', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(19, 'DLAB', 'Adjustable', 'YL218AK0083201', '100-1000', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(20, 'DLAB', 'Adjustable', 'YL218AK0083200', '100-1000', 'TABANAN', '0000-00-00', 'PT CMC', '-'),
(21, 'DRAGONLAB', 'Variabel', 'YE21AAV0080661-20-200', '0.5-10', 'TABANAN', '2023-05-11', 'INI 20-200 UL PT CMC', 'INI 20-200'),
(22, 'DRAGONLAB', 'Variabel', 'YE21AAV0080660-20-200', '0.5-10', 'TABANAN', '2023-05-11', 'INI 20-200 UL PT CMC', '20-200');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT '',
  `npwp_pelanggan` varchar(255) DEFAULT '',
  `namanpwp_pelanggan` varchar(255) DEFAULT '',
  `kontak_pelanggan` varchar(255) DEFAULT '',
  `kategori_pelanggan` varchar(255) DEFAULT '',
  `logo_pelanggan` varchar(255) DEFAULT '',
  `keuangan_pelanggan` varchar(255) DEFAULT '',
  `teknis_pelanggan` varchar(255) DEFAULT '',
  `catatan_pelanggan` text DEFAULT NULL,
  `username_pelanggan` varchar(255) DEFAULT NULL,
  `pass_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `npwp_pelanggan`, `namanpwp_pelanggan`, `kontak_pelanggan`, `kategori_pelanggan`, `logo_pelanggan`, `keuangan_pelanggan`, `teknis_pelanggan`, `catatan_pelanggan`, `username_pelanggan`, `pass_pelanggan`) VALUES
(1, 'Dinas Kesehatan Kabupaten Badung', 'Jl. Raya Sempidi Mangupura, Badung, Sempidi, Kec. Mengwi,', '2141752906000', '', '81338553589', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(2, 'Dinas Kesehatan Kabupaten Bangli', '', '2927729907000', '', '', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(3, 'Dinas Kesehatan Kota Bima', 'Jln. Soekarno Hatta No. 66 Raba-Bima', '2926335912000', '', '374646044', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(4, 'Dinas Kesehatan Kabupaten Buleleng', 'Jl. Veteran No.15, Singaraja', '3054141902000', '', '8123763532', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(5, 'Dinas Kesehatan Kabupaten Gianyar', 'Jl. Sakura, Gianyar', '6084909907000', '', '', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(6, 'Dinas Kesehatan Kabupaten Jembrana', 'Jl. Surapati No.1, Dauhwaru, Kec. Jembrana', '2925725908000', '', '8123609504', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(7, 'Dinas Kesehatan Kabupaten Karangasem', 'Jl. Ahmad Yani, Galiran, Amlapura, Karangasem', '2770956907000', '', '85238094783', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(8, 'Dinas Kesehatan Kabupaten Klungkung', 'Jl. Gajah Mada No. 55, Semarapura, Klungkung, Bali', '2925907907000', '', '87762157701', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(9, 'Dinas Kesehatan Kabupaten Lombok Utara', 'Jl. Raya Tj., Tanjung, Kabupaten Lombok Utara, Nusa Tenggara', '0', '', '', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(10, 'Dinas Kesehatan Kabupaten Lombok Tengah', 'Jl. Basuki Rahmat, Praya, Lombok Tengah,', '3340569915000', '', '', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(11, 'Dinas Kesehatan Mataram', 'Jl.Dr. Soedjono Lingkar Selatan Sekarbela Mataram', '0', '', '85934887488', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(12, 'Dinas Kesehatan Provinsi Bali', 'Jl. Melati No.20, Dangin Puri, Kec. Denpasr Utara, Denpasar, Bal', '1437201901000', '', '81338119344', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(13, 'Dinas Kesehatan Kabupaten Tabanan', 'Jl. Gunung Agung No. 82, Dajan Peken,', '3327699908000', '', '82237391262', 'Dinas Kesehatan', '', NULL, NULL, NULL, NULL, NULL),
(14, 'PT. AMS Medika Healthcare', 'Jl. Sedap Malam 88', '807692181901000', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(15, 'Apotek Kartika Medika', '', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(16, 'BIMC Hospital Kuta', 'Jl. Bypass Ngurah Rai No.100X, Kuta,', '0', '', '818,560,186', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1ualNWzgNwPRF7s958_4HF8i8IQ_Jgt56', NULL, NULL, NULL, NULL, NULL),
(17, 'PT. Bali Wahyu Abadi', 'JL Gatot Subroto II D No.3', '20178463901000', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(18, 'PT. Bali Artha Seduh', 'Keramas', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(19, 'PT. Berliando Mitra Abadi', 'Jl. Bung Tomo No.27, Denpasar', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(20, 'PT. Cahaya Murni Cemerlang', 'Jl. Gatot Subroto IID/1, Denpasar', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(21, 'Kyoai Medical Services', 'Jl. Mertanadi Ruko Sunset Jaya No.5 Sunset Road Kuta', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(22, 'PT Hospi Niaga Utama', 'Jl. Lengkong Kecil No. 66, Bandung', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(23, 'PT. Charoen Pokphand', 'Jl Banjar Dinas Tireman, Desa Bengkel Sari, Kec Selemadeg Bara', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(24, 'Apotek Adapotek Padang Sambian', 'Jl. Gunung Agung No. 174, Denpasar', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(25, 'Apotek Adapotik Batubulan', 'Jl. Batuyang, Batubulan, Sukawati, Gianyar', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(27, 'Apotek Nadi Farma', 'Jl. Mertanadi No.11, Kerobokan, Kec. Kuta Utara, Kabupaten Ba', '0', '-', '081339546272', 'General', '', NULL, NULL, '', NULL, NULL),
(28, 'AMDK Be Gianyar', 'Unnamed Road, Bukian, Payangan, Kabupaten Gianyar, Bali', '0', '-', '-', 'General', '', NULL, NULL, 'Tes Karakter', NULL, NULL),
(29, 'PT Triarta Mulia Indonesia', 'Jl. Raya Abianbase, Kapal Mengwi Badung', '0', '', '-', 'General', 'https://pt-einsten.com/easy2/images/pel/triata.jpg', NULL, NULL, NULL, NULL, NULL),
(30, 'Apotek Adapotek Renon', 'Jl. Tukad Bilok No 100 Ruko C Renon, Denpasar selatan', '0', '-', '', 'General', '', '-', '-', '-', NULL, NULL),
(31, 'Praktek Mandiri drg. Komang Sujartini Aryanti', '', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(32, 'PT. Citra Dian Pratama', 'Jl. Panjang No. 38, RW. 11, Kb. Jeruk, DKI Jakarta', '17558388039000', '', '85286796578', 'General', '', NULL, NULL, NULL, NULL, NULL),
(33, 'Draeger Medical Indonesia', 'Jl. TB. Simatupang, Kav.23-24 Cilandak-Jakarta Selatan', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(34, 'PT Grhasti Persada Nusantara', 'Jl. Drupadi No.35, Sumerta Klod, Denpasar Timur, Panjer, Kec.', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(35, 'PT. Syahid Husada Dewata', 'PADANG INDAH II16 ,PADANG SAMBIAN KELOD DENPASAR ,B', '21526660901000', '', '85738984157', 'General', '', NULL, NULL, NULL, NULL, NULL),
(36, 'PT. Teco Lab Medika', '', '312816515901000', '', '81380853422', 'General', '', NULL, NULL, NULL, NULL, NULL),
(37, 'PT Tri Tunggal Alkesindo', 'Jl. Panjang No.38 RT.001, RW.011', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(38, 'PT Wahyu Artha Medika', 'Jl. Tukad Barito, No.8 B, Panjer Denpasar', '313423857903000', '', '81239319150', 'General', '', NULL, NULL, NULL, NULL, NULL),
(39, 'PT. Jakarta Kyoai Medical Center', 'Ruko Sunset Jaya No. 5, Jl. Mertanadi,', '10709244905001', '', '85102839289', 'General', '', NULL, NULL, NULL, NULL, NULL),
(40, 'Teknisi', '', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(41, 'PT Teras Sejahtera Teknik', '', '0', '', '', 'General', '', NULL, NULL, NULL, NULL, NULL),
(42, 'Badan Narkotika Nasional Kabupaten Badung', 'Jalan Raya Abianbase - Kapal, Mengwi', '1337831906000', '-', '-', 'Instansi Pemerintah', 'https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png', NULL, NULL, NULL, NULL, NULL),
(43, 'Badan Narkotika Nasional Kota Denpasar', 'Jl. Melati No. 21, Dangin Puri Kangin, Denpasar Utara', '00.133.782.3-901.000', 'Badan Narkotika Nasional Kota Denpasar', '\'085738141427', 'Instansi Pemerintah', 'https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png', NULL, NULL, '', NULL, NULL),
(44, 'Badan Narkotika Nasional Povinsi Bali', 'Jl. Kamboja No. 8, Dangin Puri Kangin', '3372968901000', '-', '-', 'Instansi Pemerintah', 'https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png', NULL, NULL, NULL, NULL, NULL),
(45, 'Badan Narkotika Nasional Kabupaten Buleleng', 'l. Teleng, Banyuasri, Kec. Buleleng, Kabupaten Buleleng', '851891424902000', '-', '-', 'Instansi Pemerintah', 'https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png', NULL, NULL, NULL, NULL, NULL),
(46, 'Badan Narkotika Nasional Kabupaten Gianyar', 'Jl. Kebo Iwa, Blahbatuh, Gianyar', '300935145907000', '-', '-', 'Instansi Pemerintah', 'https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png', NULL, NULL, NULL, NULL, NULL),
(47, 'BPBD Provinsi Bali', 'JL PANJAITAN NO 6 MANDALA RENON', '300966603903000', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(48, 'UPTD Balai Kesehatan Tradisional Provinsi Bali', 'Jl. Cut Nyak Dien No 1 Denpasar', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(49, 'Biddokkes Polda Bali', 'Jl. Seruni No.8, Sumerta Kauh, Denpasar Timur, Bali', '1186436901000', '', '-', 'Instansi Pemerintah', 'https://pt-einsten.com/easy2/images/pel/biddokes.jpg', NULL, NULL, NULL, NULL, NULL),
(50, 'Kantor Kesehatan Pelabuhan Kelas II Mataram', 'Jl. Adi Sucipto No. 14, Rembiga, Mataram', '1571769911000', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(51, 'Stikes Kesdam IX/Udayana', 'Jl. Taman Kanak-Kanak Kartika, Dauh Puri, Kec. Denpasar Barat', '3373776901000', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(52, 'UPTD Laboratorium Kesehatan Karangasem', 'Jl. Ahmad Yani, Amlapura', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(53, 'PMI Kabupaten Lombok Timur', 'Jl. Prof.M Yamin SH No.45, Pancor, Selong, Lombok', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(54, 'Biddokkes Polda Papua Barat', '', '747692457955000', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(55, 'Politeknik Transportasi Darat Bali', 'Jl Batuyang No 109X Batubulan, Sukawati, Gianyar Bali', '1584689907000', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(56, 'Polres Jembrana', 'Jl. Pahlawan No. 27, Pendem,', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(57, 'Polres Badung', '', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(58, 'Polres Bangli', '', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(59, 'Polres Buleleng', '', '0', '', '', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(60, 'Polres Denpasar', '', '0', '', '+62 896-7045-9769', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(61, 'Polres Gianyar', '', '0', '', '+62 819-3623-7206', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(62, 'Polres Karangasem', '', '0', '', '+62 813-3982-2772', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(63, 'Polres Klungkung', '', '0', '', '+62 852-3854-2287', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(64, 'Polres Tabanan', '', '0', '', '+62 812-4858-876', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(65, 'Kesehatan Pegawai Telkom', 'Jl. Serma Tugir No.16, Dauh Puri Kelod, Kec. Denpasar Barat', '0', '', '82144120117', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(66, 'Yakes Telkom Denpasar', 'Jl. Serma Tugir No.16, Dauh Puri Kelod, Kec. Denpasar Barat', '0', '', '361225664', 'Instansi Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(67, 'Klinik Sudi Santhi', 'Jl. Cokroaminoto No.147, Ubung, Kec. Denpasar Utara, Kota Denpasar', '140132291903000', '-', '8123811822', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(68, 'ARC Anti-aging Beauty Clinics', 'Jl. Sunset Road No. 819. Kuta', '21696885905001', '-', '87861476909', 'Klinik', 'https://www.arcclinics.com/images/logo/logo.png', NULL, NULL, NULL, NULL, NULL),
(69, 'Klinik Pratama Anugerah', '', '0', '', '87860197081', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(70, 'Bali Implant Aesthetic', '', '0', '', '82139396161', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(71, 'Klinik Bali Sudirman', '', '865518823901000', '', '87855607273', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(72, 'Klinik Batu Tua Tembaga Raya', '', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(73, 'Klinik Bhaksena IDT', '-', '0', '-', '87861417695', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(74, 'Klinik Bhakti Rahayu IDT', '-', '0', '-', '-', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(75, 'Klinik Pratama Maha Bhoga Marga', '', '15436819906000', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(76, 'Klinik Sari Dharma', '', '0', '', '87862465505', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(77, 'Klinik Sai Husada', '', '803925056908000', '', '81703774633', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(78, 'Klinik Pramita Denpasar', '-', '0', '', '-', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/pramita.jpg', NULL, NULL, NULL, NULL, NULL),
(79, 'Klinik Kulhen', 'Jl. Raya Padang Luwih 187A Dalung Kuta Utara', '810635029906000', 'PT Apik Yasa Usada', '08113806422', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/kulhen.jpg', NULL, NULL, '', NULL, NULL),
(80, 'Laboratorium Klinik Bio Medika', 'Jalan WR Supratman No. 62, Denpasar', '03.339.919.7-903.000', 'BIO MEDIKA PUTRA DEWATA', '081933072529', 'Klinik', 'https://images.glints.com/unsafe/180x0/glints-dashboard.s3.amazonaws.com/company-logo/d95fab13cad188277b04f36dc20ca529.jpg', NULL, NULL, '', NULL, NULL),
(81, 'Klinik Ratih', 'Jl. Raya Padonan No.108, Tibubeneng, Kec. Kuta Utara, Kabupate Badung', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(82, 'Klinik Natasha', 'RENON', '25422338541000', '', '85640125669', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(83, 'EMWE Skin Clinic', '', '859632937903000', '', '82141225577', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(84, 'DNI Skin Centre Marlboro', 'Jl. Teuku Umar Barat 38C', '824626766901000', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(85, 'Klinik Graha Medika', 'Jln. Trenggana No. 111, Penatih, Denpasar, Bali', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(86, 'Happy Dentist Bali', 'Jl. Teuku Umar No. 1, Dauh Puri Klod,', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(87, 'Happy Dentist Clinic', 'Jl. Teuku Umar Ruko Perniagaan, Dauh Puri Klod,', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(88, 'House Klinik', 'Jl. Pulau Serangan No.7, Dauh Puri Klod, Kec. Denpasar', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(89, 'Klinik Jejaring Bhakti Rahayu', '-', '0', '-', '82236127492', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(90, 'Klinik Kimia Farma', 'Jl. Diponegoro No.125, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bal', '10613321901001', '-', '85352180222', 'Klinik', 'https://drive.google.com/uc?export=view&id=1lxN558A7Gke2pHYCWPtEsEd4CQxdGTSu', NULL, NULL, NULL, NULL, NULL),
(91, 'Klinik Adi Medika', 'Jl. Raya Canggu, Tibubeneng, Kec. Kuta Utara, Kabupaten Badu Bali', '729677096906000', '', '81999473638', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(92, 'Klinik Bhakti Rahayu Dalung', 'Jl. Padang Luwih No. 88B, Dalung,', '0', '-', '-', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(93, 'Klinik Be Health Medika', 'Jl. Imam Bonjol 251 Denpasar', '0', '', '8123956625', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(94, 'Klinik Bhaksena Nusa Dua', 'Jl. By Pass Nusa Dua, Kab. Badung, Bali', '0', '-', '081236707290', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(95, 'Klinik Bhaksena Tragia', 'JL By Pass Ngurah Rai, Komp Pertokoan Tragia Blok D21-22 Ben Kuta Selatan', '0', '', '81918331260', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(96, 'Klinik Bina Usada', 'Jl Gatot Subroto Barat No.101, Ubung, Kec. Denpasar Utara,', '0', '', '81237458474', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/bina_usada.png', NULL, NULL, NULL, NULL, NULL),
(97, 'Klinik Cahaya Bunda', 'JL Raya Tuban No 333 X Tuban-Kuta Badung', '02.047.089.4-905.000', 'CV. BALI ASIH', '81339706644', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(98, 'Klinik Pratama Calleza', 'Jl Pulau Serangan No. 16, Negara', '0', '', '82141240079', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(99, 'Klinik Catur Warga', 'Jl. Gatot Subroto IV No. 6,', '0', '', '8122985377', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(100, 'Praktik Bersama Dokter Gigi Dentes', 'Jl. Gn. Sanghyang No. 89C, Kerobokan,', '719622573542000', '', '8174797727', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(101, 'Klinik FKTP Rindam', 'Kediri, Tabanan', '0', '', '8117811765', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(102, 'Klinik Gangga Medika', 'Bukit Hijau Residence Blok A-I,', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(103, 'Klinik Karya Prima', 'Jl. Raya Sesetan No. 342, Denpasar Selatan', '900624859903000', '', '81237575050', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(104, 'Klinik Kenak Medika', 'Jalan Raya Ubud, Bali', '0', '-', '-', 'Klinik', 'https://kenakmedika.com/webkenak/assets/img/logonew.png', NULL, NULL, NULL, NULL, NULL),
(105, 'Klinik Medika Plaza', 'Tanah Merah, Kamp. Tanah Merah Sumuri,', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(106, 'Klinik Miracle Kuta', 'Jl. Diponegoro No. 148, Denpasar', '20794780903000', '', '81339310657', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(107, 'Klinik  Pratama Rawat Inap Pedungan Medika', '', '0', '', '81805326004', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(108, 'Klinik Perawatan dan Kecantikan Kulit Prasanti', 'Kompleks Ruko Sanur Raya No. 23 JI. By Pas Ngurah', '58956095907000', '', '81338538888', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(109, 'Klinik Pratama Rawat Inap Petanu Medical Center', 'Jl. Tukad Petanu, No.9C', '0', '', '81320204006', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(110, 'Klinik Pratama Bhaksena Klungkung', 'Jl. Gajah Mada No.29, Klungkung', '0', '-', '081237836223', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(111, 'Klinik Pratama Dewani', '', '0', '', '8123954150', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(112, 'Klinik Pratama TPKK Serma Tugir', 'Jl. Serma Tugir, No. 16, Denpasar', '\'018273870901001', 'KESEHATAN PEGAWAI TELKOM', '\'08113868966', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(113, 'Klinik Utama Quantum (PT Quantum Sarana Medik)', 'Jl. Raya Sesetan, No. 20 Denpasar, Bali', '14136204904000', '', '87862281925', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(114, 'Klinik Utama Quantum Kedonganan', 'Jl. Toyoning No. 8, Kedonganan', '0', '', '87862281925', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(115, 'Klinik SMC', '1.P.B Sudirman No.1A,  Dauh Puri Kelod, Denpasar', '0', '', '85851265041', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(116, 'Klinik Pratama SOS Gatotkaca', 'Jl. Gatotkca No. 21, Denpasar', '317802114901000', '', '85101421022', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(117, 'Klinik Sambandha', 'Perumahan Sambandha, Jl. Bypass Ngurah Rai Jl. By Pass Ngura', '0', '', '+62 812-3888-942', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(119, 'Klinik Semesta Mandiri', '-', '669000903903000', '-', '81353674189', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(120, 'Klinik Utama WM Medika', 'Gedung WM Jl. Raya Sesetan No. 270', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(121, 'Klinik Pratama Wahyu Medika', 'Jl. Udaya No. 117, Buruan, Kecamatan Blahbatuh', '0', '', '87860344758', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(122, 'UD. Hanna Bali Jaya', 'Jl. Drupadi V No. 8 Denpasar', '0', '', '89606752995', 'Klinik', 'https://images.tokopedia.net/img/cache/215-square/GAnVPX/2020/12/16/83d67723-02b8-4419-b738-a7d643f26dd6.jpg', NULL, NULL, NULL, NULL, NULL),
(123, 'Klinik Werdhi Ayu', 'Gunung Agung No.233 Kel.Padang Sambian, Kec.Denpasar Bar', '711582940901000', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(124, 'Klinik Wijaya Kusuma', 'Jl. Dr. Ir. Soekarno, By Pass Kediri, Br. Sanggulan', '0', '', '+62 813-3826-4682', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(125, 'Klinik Pratama Wirati', 'Jl. Pulau Saelus II, No.3, Pedungan, Denpasar Selatan', '91.923.442.7-903.000', 'CV. KLINIK PRATAMA RAWAT JALAN  WIRATI', '081353672870', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(126, 'Larissa Aesthetic Clinic', 'Jl. Pulau Misol', '22519672901001', '', '81916435150', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(127, 'Lumi Clinic', 'Jl. Teuku Umar No. 185, Denpasar, Bali', '838282028901000', '', '8123976737', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(128, 'Manika Aesthetic Clinic', 'Jalan Tukad Irawadi No. 10 Panjer', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(129, 'OMSA MEDIC', 'Jl Kembar Kampus Unud No.1, Jimbaran 80361', '863409868903000', '', '-', 'Klinik', 'https://pt-einsten.com/easy2/images/pel/omsa1.png', NULL, NULL, NULL, NULL, NULL),
(130, 'Penta Medica Clinic', 'Jl. Mahendradata Selatan No88 Br. Abiantimbul Denpasar', '22785497901000', '-', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(131, 'Praktik Dr. Fernando Natanael', 'Jl. Diponegoro No. 150 Blok A - 14 Ruko IDT,', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(132, 'Praktik Mandiri Bida Jaba P. Rahguslani', '', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(133, 'Klinik Puri Medical', 'Jl. Batu Belig No.8, Kerobokan Kelod', '0', '', '85737347499', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(134, 'Klinik Puri Sinartha', 'Jl. Batuyang No. 99X, Batubulan, Sukawati, Gianyar', '90.696.018.2-907.000', 'CV. KLINIK PURI SINARTHA', '81239300791', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(135, 'Klinik Rahayu Asih', 'Jl. Uluwatu II, No 100K Jimbaran, Kuta Selatan, Badung', '802999037905000', '', '85237075554', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(136, 'Raya Kuta Klinik', 'Jl Raya Tuban No.62, Kuta-Bali', '0', '', '', 'Klinik', NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Klinik Rejuvie', 'Jl. Dewi Sri No. 4, Legian, Kuta', '33399874905000', '', '8124614325', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(138, 'Klinik Remedium Care', 'Jl. Baypass Ngurah Rai, Sanur, Denpasar', '674218391901000', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(139, 'Klinik SOS Uluwatu', 'Jl. Uluwatu No. 111X Jimbaran', '0', '', '81997667935', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(140, 'Lab Sentra Diagnostik Patologi Bali', 'Jl. Tukad Yeh Aya No. 69 B Renon', '0', '-', '85737359866', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(141, 'Klinik Pratama Sidhi Sai', 'Jalan Oleg, Banjar Batan Buah, Desa Abiansemal', '868383860906000', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(142, 'Smile Medical Centre', 'Jl. Hayam Wuruk No.242, Panjer, Kec. Denpasar Sel., Kota Denp', '907336804903000', 'CV SMILE MEDICAL CENTRE DEWATA', '\'087712378934', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(143, 'Taksu Laboratorium Klinik', 'Jl. Ngurah Rai, No. 43 Banjar Anyar, Kediri, Tabanan', '0', '', '+62 877-6011-0066', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(144, 'Klinik Tulus Ayu', 'Jl. Tukad Batanghari No. 22, Panjer', '0', '', '8921499109', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(145, 'Puskesmas Banjarangkan II', 'Ds. Takmung, Kec. Banjarangkan', '963274063907000', '', '+62 813-3774-6999', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(146, 'Puskesmas Blahbatuh II', 'Gianyar', '961850203907000', '-', '8123663237', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(147, 'UPTD Puskesmas Blahbatuh I', 'Jl. Maruti, Keramas, Kec. Blahbatuh, Kab. Gianyar,', '0', '-', '-', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(148, 'UPT Kesmas Ubud I', 'Jl. Dewi Sita No. 1, Ubud, Gianyar, Bali', '300682705907000', '', '81338654201', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(149, 'Puskesmas Penebel I', 'Jl. Raya Buruan, Pitra, Penebel, Kabupaten Tabanan, Bali', '705146942908000', '', '+62 813-2714-7396', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(150, 'Puskesmas Kediri I', 'Jl, Teuku Umar No. 10, Kediri, Tabanan', '963564059908000', '', '8563865008', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(151, 'Puskesmas Kintamani I', '', '0', '', '+62 812-3925-6083', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(152, 'Puskemas Kintamani III', '', '0', '', '+62 821-4528-3566', 'Puskesmas', '', NULL, NULL, NULL, NULL, NULL),
(153, 'Puskesmas Kubutambahan I', '', '0', '', '+62 831-1776-1716', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(154, 'Puskesmas II Mendoyo', 'Jl. Raya Denpasar Gilimanuk, Desa Yehembang, Kec. Mendoyo', '301441507908000', '', '81999905820', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(155, 'Puskesmas Kuta Selatan', 'Jl. Sri Kandi No.40A, Nusa Dua, Kuta Selatan', '0', '', '+62 853-3727-4433', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(156, 'UPTD Puskesmas Gianyar II', '', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(157, 'UPTD Puskesmas Pupuan I', 'Jln. Raya Pupuan-Seririt, Ds Bantiran Kec. Pupuan', '963575428908000', '', '+62 813-3875-6729', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(158, 'Puskesmas Pupuan II', 'Jl. Raya Antosari, Pupuan Kabupaten Tabanan, Bali', '0', '', '85792565454', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(159, 'Puskesmas Banjarangkan I', 'Ds. Tusan, Kec. Banjarangkan, Klungkung', '300443249907000', '', '82266162560', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(160, 'Puskesmas Klungkung II', '', '7491822907000', '', '87760057640', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(161, 'Puskesmas Kerambitan II', 'Jl I Wayan Bered No.1 Kerambitan', '0', '', '87783153256', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(162, 'Puskesmas Klungkung I', '', '200438042907000', '', '8179783338', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(163, 'UPTD. Puskesmas Kopang', 'Jl. Bung Hatta, Kopang Rembiga,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(164, 'UPTD Puskesmas Manggis I', 'Jln Raya Ulaka Manggis', '0', '', '82247411488', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(165, 'UPT. Puskesmas Mengwi III', 'Jl. Raya Sempidi, Mengwi, Badung, Bali', '711739987906000', '', '85738112197', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(166, 'Puskesmas Nusa Penida II', 'Ds. Jungutbatu, Nusa Penida, Klungkung', '964376735907000', '', '895494616131', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(167, 'UPTD. BLUD Puskesmas Puyung', 'Jl. Raya Puyung, Jonggat, Lombok', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(168, 'UPTD Puskesmas Sukawati II', 'Jl. Kesawa No. 1, Singapadu Tengah,', '963665138907000', '', '8993456725', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(169, 'UPTD. Puskesmas Wajageseng', '', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(170, 'UPTD. Puskesmas Aik Darek', 'Ds. Aik Darek, Kec. Batuklliang, Lombok', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(171, 'UPTD. Puskesmas Bagu', 'Jl. H. Badrudin, Bagu, Kec. Pringgarata,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(172, 'UPTD. Puskesmas Batu Jangkih', 'Jl. Raya Batu Jangkih, Kec. Praya Barat,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(173, 'UPT. Puskesmas Batujai', 'Desa Batujai, Kec. Praya Barat,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(174, 'UPTD Puskesmas Batunyala', 'Jl. Raya Praya-Mujur, Batunyala, Praya Tengah', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(175, 'Puskesmas Bolo', 'Desa Rato, Kec. Bolo, Kab. Bima, NTB', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(176, 'UPTD. Puskesmas Bonjeruk', 'Desa Bonjeruk, Kec. Jonggat,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(177, 'Puskesmas Dawan II', '', '7491848907000', '', '81337472007', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(178, 'UPTD. Puskesmas Darek', 'Jl. Raya Darek, Kec. Praya Barat Daya,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(179, 'Puskesmas Dawan I', 'Pikat, Dawan, Klungkung', '963357256907000', '', '81999040344', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(180, 'Puskesmas Denpasar Selatan I', 'Jl. Gurita No.8, Sesetan, Denpasar Selatan,', '714859188903000', '', '81339605627', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(181, 'Puskesmas Donggo', 'Jl. Pesanggrahan Desa Oo Kec. Donggo', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(182, 'UPTD Puskesmas Ganti', 'Jl. Raya Sengkerang, Ganti, Kec. Praya Timur', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(183, 'UPTD. Puskesmas I Melaya', 'Jl. Jaya Sakti', '968515467908000', '', '87762507164', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(184, 'Puskesmas I Negara', 'Kaliakah, Negara, Jembrana', '301020970908000', '', '81553038149', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(185, 'UPT. BLUD Puskesmas Janapria', '', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(186, 'UPTD Puskesmas Kuta Lombok Tengah', 'JL. Raya Kuta, Kec. Pujut, Lombok Tengah', '3340569915000', '-', '-', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, '', NULL, NULL),
(187, 'UPTD Puskesmas Langko', 'Ds. Selebung Rembiga, Kec. Janapria,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(188, 'UPTD. Puskesmas Mangkung', 'Ds. Mangkung, Kec. Praya Barat,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(189, 'UPTD. Puskesmas Mantang', 'Jl. Raya Bung Karno No. 1000, Mantang', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(190, 'Puskesmas Marga II', '', '963499538908000', '', '878611116039', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(191, 'UPTD. Puskesmas I Mendoyo', 'Jl. Denpasa-Gilimanuk Km 90, Desa Pergung,', '301001202908000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(192, 'Puskesmas Monta', 'Desa Tangga, Kec. Monta, Kab. Bima, NTB', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(193, 'UPT Puskesmas Mujur', 'Jl. Raya Praya-Mujur, Praya Timur,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(194, 'Puskesmas Palibelo', 'Desa Teke, Kec. Palibelo, Kab. Bima, NTB', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(195, 'Puskesmas Parado', 'Jl. Lintas parado Desa Parado Rato,', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(196, 'UPTD. Puskesmas Pengadang', '', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(197, 'UPTD. Puskesmas Penujak', 'Jl. Raya Mandalika No. 16, Penujak,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(198, 'UPTD. BLUD Puskesmas Praya', 'Jl. Diponegoro, Praya 83, Kec. Praya,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(199, 'UPTD. Puskesmas Pringgarata', 'Jl. Diponegoro, Pringgarata,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(200, 'Puskesmas Sanggar', 'Desa Kore Kece, Kec. Sanggar, Kab. Bima', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(201, 'Puskesmas Sape', 'Desa Bugis, Kec. Sape, Kab. Bima, NTB', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(202, 'Puskesmas Selemadeg Barat', 'Jl. Raya Denpasar Barat-Gilimanuk No. 104, Lalanglinggah', '963454558908000', '', '82147182112', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(203, 'UPT. Puskesmas Sengkol', 'Jl. Raya Sengkol-Kuta, Sengkol, Kec.', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(204, 'Puskesmas Soromandi', 'Desa Bajo, Kec. Soromandi, Kab. Bima, NTB', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(205, 'Puskesmas Tabanan III', 'Jl. Gunung Agung No 82 Desa Dajan Peken Tabanan', '963413364908000', 'UPTD Puskesmas Tabanan III', '082144373989', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, '', NULL, NULL),
(206, 'UPTD Puskesmas Tabanan II', '', '705819241908000', '', '85935243509', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(207, 'UPTD Puskesmas Tampaksiring II', 'Jl. Raya Pejeng Tampaksiring, Pejeng,', '300743770907000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(208, 'UPTD Puskesmas Tampaksiring I', 'JL. DR. IR. Soekarno, Tampaksiring', '300661238907000', '-', '082144636377', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, '', NULL, NULL),
(209, 'UPTD. Puskesmas Tanak Beak', 'Ds. Tanak Beak, Kec. Batukliang, Lombok', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(210, 'UPTD. Puskesmas Teratak', 'Ds. Teratak, Kec. Batukliang Utara,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(211, 'UPTD. Puskesmas Teruwai', 'Jl. Dangah, Truwai, Kec. Pujut,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(212, 'UPTD. Puskesmas Ubung', 'Jl. Raya Ubung, Kec. Jonggat,', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(213, 'Puskesmas Wera', 'Desa Tawali, Kec. Wera, Kab. Bima, NTB', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(214, 'Puskesmas Woha', 'Jl. Buya HAmka Desan Tente, Kec. Woha,', '2926335912000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(215, 'UPTD. Puskesmas  Muncan', '', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(216, 'UPTD Puskesmas Rendang', 'Ds.Menanga,Kec.Rendang', '002770956907000', 'DINAS KESEHATAN KABUPATEN KARANGASEM', '-', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, '', NULL, NULL),
(218, 'UPTD Puskesmas Selemadeg', 'Jl. Rajawali No. 20, Bajera, Selemadeg', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(219, 'Puskesmas Sawan I', '', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(220, 'Puskesmas Susut I', '', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(221, 'Puskesmas Tejakula I', '', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(222, 'Puskesmas Tembuku II', '', '0', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(223, 'UPT. BLUD Puskesmas Aikmual', '', '3340569915000', '', '', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(224, 'Badan Rumah Sakit Umum Tabanan', 'Jl. Pahlawan No. 14, Delod Peken', '0', '-', '-', 'Puskesmas', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(225, 'RSUP Sanglah', 'Jl. Diponegoro, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpa Bali', '0', '-', '-', 'RS Pemerintah', 'https://drive.google.com/uc?export=view&id=1MXDBRLaXYbsIXDOn-TiK8EhXxFe1vKtg', NULL, NULL, '', NULL, NULL),
(226, 'Klinik Miracle Putra', 'Jl. Dewi Sri 12A Kuta Bali', '0', '', '', 'Klinik', '', NULL, NULL, NULL, NULL, NULL),
(228, 'Direktur Rs Mata Bali Mandara', 'Jl. Angsoka No.8, Dangin Puri Kangin', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(229, 'RSUD Grati Pasuruan', '', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(230, 'RSUD dr. M. Haulussy', '', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(231, 'UPTD. RSUD Gema Santi Nusa Penida', 'Nusa Penida', '953985496907000', '-', '081326219341', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(232, 'Rumah Sakit Bali Mandara', '', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(233, 'Rumah Sakit Mata Bali Mandara', 'Jl. Angsoka No. 8, Dangin Puri Kangin', '371534901000', '', '81339665415', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(234, 'Rumah Sakit Marsudi Waluyo', 'Jl. Raya Mondoroko Km 9 Singosari, Malang', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(235, 'RSUD Awet Muda Narmada', 'Jl. Ahmad Yani No. 69 Narmada', '00.317.494.3.914.000', '-', '-', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(236, 'Rumah Sakit TNI AD Wirasatya Singaraja', 'Jl. Ngurah Rai No.70, Banjar Jawa, Kec. Buleleng, Singaraja, Bali', '00.103.059.2.901.000', 'Kesdam IX/UDY Markas Besar TNI AD Kementrian Pertahanan', '87762534776', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(237, 'Rumah Sakit Universitas Udayana', '', '757994207905000', '', '82341257654', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(238, 'Rumah Sakit dr. Agung', 'Jl. Ir Sutami No. 1, Robadompu Barat,', '721162584912000', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(239, 'Rumah Sakit Daerah Mangusada', 'Jalan Raya Kapal, Mengwi, Badung', '002927937906000', 'Rumah Sakit Daerah Mangusada Kabupaten Badung', '81236209695', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(240, 'Direktur Rumah Sakit Umum Dompu', 'Jl. Teuku Umar No. 1, Simpasai, Woja,', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(241, 'Rumah Sakit Umum Daerah Negara', 'Jl Wijaya Kusuma No.17 Baler Bale Agung,', '2925733908000', '', '87711875609', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(242, 'Rumah Sakit Umum Daerah Bangli', 'Jl. Brigjen Ngurah Rai. No 99X Bangli', '2927747907000', '', '3669152191002', 'RS Pemerintah', 'https://pt-einsten.com/easy2/images/pel/rsud_bangli.jpg', NULL, NULL, NULL, NULL, NULL),
(243, 'Rumah Sakit Umum Daerah Bima', 'Jl. Langsat No. 1, Raba, Bima, NTB', '377309912000', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(244, 'RSUD Kabupaten Buleleng', 'Jl. Ngurah Rai No.30, SIngaraja, Kec. Buleleng', '0', '-', '-', 'RS Pemerintah', 'https://drive.google.com/uc?export=view&id=1f0XEDDEDWi9M6ZEy7NkD6yTeUBrnsz2H', NULL, NULL, '', NULL, NULL),
(245, 'RSUD Kabupaten Lombok Utara', 'Jl. Tioq Tunaq, Tanjung, Kab. Lombok Utara, NTB', '0', '-', '-', 'RS Pemerintah', 'https://pt-einsten.com/easy2/images/pel/rsudlombokutara.png', NULL, NULL, NULL, NULL, NULL),
(246, 'Rumah Sakit Daerah Karangasem', 'Jl. Ngurah Rai No. 58, Amlapura, Karangasem', '0', '', '85238443567', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(247, 'Rumah Sakit Umum Daerah Klungkung', 'Jl. Flamboyan No. 40, Semarapura, Klungkung, Bali', '0356643467', 'Klungkung', '817354021', 'RS Pemerintah', 'https://pt-einsten.com/easy2/images/pel/rsudklk.png', 'Mawar', 'Indah', 'ruwet', NULL, NULL),
(248, 'RSUD Praya Lombok Tengah', 'Jl. H Lalu Hasim, Kel Tiwu Galih Kec. Praya Kab Lombok Tengah, Nusa Tenggara Barat', '003336708915000', 'RUMAH SAKIT UMUM DAERAH PRAYA KABUPATEN LOMBOK TENGAH', '-', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(249, 'Rumah Sakit Bhayangkara Denpasar', 'JL. Trijata No. 32 Sumerta Kelod 2F, Denpasar', '0', '-', '8112169069', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(250, 'UPTD Rumah Sakit Jiwa', 'Jl. Kusuma Yudha No. 29, Bangli', '0', '', '3661073', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(251, 'Rumah Sakit Umum Daerah Singasana', 'JL. Antungan Nyitdah, Kediri Kab. TAbanan Bali', '53.436.536.6-908.000', 'RUMAH SAKIT UMUM DAERAH SINGASANA', '81246911575', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(252, 'Rumah Sakit Payangan', 'Jl. Raya Payangan, Melinggih, Payangan', '0', '', '85739464782', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(253, 'Rumah Sakit Umum Daerah  Giri Emas', 'jln Raya Sangsit-Singaraja Desa Giri Emas Kecamatan  Sawan', '00.309.414.1-902.000', 'Dinas Kesehatan Kabupaten Buleleng', '\'081805338040', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(254, 'Rumah Sakit Umum Daerah Sanjiwani', 'Jl. Ciung Wanara-Gianyar No.2, Gianyar, Bali', '0', '', '82146798006', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL),
(255, 'Rumah Sakit Umum Daerah Wangaya', 'Jl. Kartini No.133, Dauh Puri Kaja', '0', '', '', 'RS Pemerintah', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `npwp_pelanggan`, `namanpwp_pelanggan`, `kontak_pelanggan`, `kategori_pelanggan`, `logo_pelanggan`, `keuangan_pelanggan`, `teknis_pelanggan`, `catatan_pelanggan`, `username_pelanggan`, `pass_pelanggan`) VALUES
(256, 'BIMC Hospital Nusa Dua', 'Kawasan ITDC Blok D, Jl. Nusa Dua, Benoa', '24583858904001', '', '81936200107', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1ualNWzgNwPRF7s958_4HF8i8IQ_Jgt56', NULL, NULL, NULL, NULL, NULL),
(257, 'RS Balimed Karangasem', '-', '0', '-', '85333679263', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1cNaDHMren2N3OdrIq7UKjkQ6_w2-611V', NULL, NULL, '', NULL, NULL),
(258, 'RSU Balimed Denpasar', 'Jl. Mahendradata No. 57 X, PadangsambianJL.Mahendradatta No.57 X Denpasar-Bali', '002.601.599.0-904.000', 'PT.BALI DHARMA MEDISTRA-', '-Sutrisnawati/087860603660', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1cNaDHMren2N3OdrIq7UKjkQ6_w2-611V', NULL, NULL, '', NULL, NULL),
(259, 'RSU Balimed Negara', 'Jl. Hayam Wuruk No. 23, Kelurahan Dangin Tukadaya', '0', '-', '85739062601', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1cNaDHMren2N3OdrIq7UKjkQ6_w2-611V', NULL, NULL, '', NULL, NULL),
(260, 'RSU Bintang', 'Jalan Ngurah Rai No.10, Semarapura Tengah, Klungkung, Bali', '210643201907000', 'Yayasan Astiti Apti Ngupadi Rahayu', '\'081918144133', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(261, 'RSU Muhamadiyah Babat', 'Jl. Raya Babat-Surabaya ,', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(262, 'RS Balimed Singaraja', 'Jl. Gn. Lempuyang No.9X, Banjar Tegal, Kec. Buleleng, Kabupate', '0', '-', '-', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1cNaDHMren2N3OdrIq7UKjkQ6_w2-611V', NULL, NULL, '', NULL, NULL),
(263, 'RS Surya Medika PKU Mumahamadiyah Sumbawa', 'Jalan Hasanudin 3384313 Sumbawa Nusa Tenggara Barat', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(264, 'RSU Kasih Ibu Saba', 'Jl. Saba No 9, Saba Kec. Blahbatuh, KAb Gianyar', '0', '', '', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=13QLunwBZ1AcVuEJhSRtGCMcC3GCOAxO0', NULL, NULL, NULL, NULL, NULL),
(265, 'RSIA Kasih Ibu Tabanan', 'Jalan Flamboyan No 9, Kampung Kodok, Dauh Peken, Tabanan', '0', '', '', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=13QLunwBZ1AcVuEJhSRtGCMcC3GCOAxO0', NULL, NULL, NULL, NULL, NULL),
(266, 'RSIA Cahaya Bunda', 'Jl. Dr. Ir. Soekarno No.88X, Banjar Anyar, Kediri,', '0', '', '+62 812-3916-6061', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(267, 'RSU Dharma Yadnya', 'Jl. Wr Supratman No.256, Kesiman Kertalangu, Kec Denpasar', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(268, 'Rumah Sakit Ibu & Anak Galeri Chandra', 'Jl. Andong No.3, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(269, 'RSIA Harapan Bunda', 'Jl. Tukad Unda No. 1, Panjer', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(270, 'RSU Karya Dharma Husadha', 'Jl. Yudistira No.7, Singaraja, Kendran, Kec. Buleleng, Kab. Bulelen', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(271, 'Lotim Medical Center', 'Jl. Pejanggik  No. 78A, Kel. Rakam, Kec.Selong,', '0', '-', '-', 'RS Swasta', 'https://lotimmedicalcenter.com/wp-content/uploads/2020/04/LMC-logo-final-primary-color.png', NULL, NULL, NULL, NULL, NULL),
(272, 'RSIA Permata Hati Lombok', 'Jl. Majapahit No. 10C, Kelakik Jaya, Sekarbela, Mataram', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(273, 'RSIA Puri Bunda Denpasar', 'Jl. Gatot Subroto VI No. 19, Dauh Puri Kaja', '0', '', '', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1pHnA9qxee91gLQI-5hZODzsKQm9CKjXH', NULL, NULL, NULL, NULL, NULL),
(274, 'RSU Puri Raharja', 'Jl. WR Supratman 14 & 19 Denpasar, Bali', '22180798904000', '-', '8123834861', 'RS Swasta', 'https://puriraharja.com/img/logo.png', NULL, NULL, NULL, NULL, NULL),
(275, 'Rumah Sakit Ari Canti', 'Jl Raya Mas, Kec. Ubud, Kab. Gianyar Bali', '02.096.764.2-904.000', 'PT ARI CANTI HUSADA', '+62 852-3747-4765', 'RS Swasta', 'https://www.aricantihospital.com/theme/images/logo.png', NULL, NULL, '', NULL, NULL),
(276, 'Rumah Sakit Bali Royal Hospital', 'Jl. Tantular No.6, Renon, Denpasar', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(277, 'Rs Grha Ultima Medika', 'Jl. Majapahit No. 10 Kekalik Jaya, Sekarbela, Kota Mataram,', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(278, 'Rumah Sakit Harapan Keluarga', 'Jl. Ahmad Yani No. 9, Selagalas,', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(279, 'Rumah Sakit Umum Karya Dharma Husada', 'Jl. Yudistira No. 7 Singaraja, Kendran, Buleleng', '0', '', '81936510235', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(280, 'Rumah Sakit Kasih Ibu Denpasar', 'Jl Teuku Umar 120 Denpasar', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(281, 'Kasih Ibu General Hospital Kedonganan', 'Jl. Uluwatu No. 69A, Kedonganan, Kuta,', '0', '', '89516667269', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(282, 'Rumah Sakit Prima Medika', '', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(283, 'Rumah Sakit Ibu Dan Anak Puri Bunda Tabanan', 'Jl. Dr. Ir. Soekarno, Banjar Anyar, Kec. Kediri, Kabupaten Tabana', '0', '-', '+62 812-3079-4858', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(284, 'RS Mata Ramata', 'Jl. Gatot Subroto Barat No.429, Padangsambian Kaja, Kec. Denp', '0', '-', '0822-2226-0042', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1jWUpApqbis3pwNrwE_qdZqQ8kXebGJ8X', NULL, NULL, '', NULL, NULL),
(285, 'Rumah Sakit Umum Shanti Graha', '', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(286, 'Rumah Sakit Sido Waras', 'Jl. Raya Pasar Sawahan, Sumber Bendo,', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(287, 'Surya Husadha Hospital', 'Jl. Pulau Serangan No.7, Dauh Puri Klod, Kec. Denpasar', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(288, 'RS.H.L. Manambai Abdulkadir', 'Jl. Lintas Sumbawa, Bima KM 5, Seketeng,', '0', '-', '-', 'RS Swasta', 'https://rsmanambai.ntbprov.go.id/po-includes/images/logo.png', NULL, NULL, NULL, NULL, NULL),
(289, 'Rumah Sakit Bhakti Rahayu Denpasar', 'Jl. Gatot Subroto II No.11, Dangin Puri Kaja, Kec. Denpasar Utar', '0', '-', '', '', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', 'Coba Mira', 'Coba Avil', '', 'RSBR', '12345'),
(290, 'Rumah Sakit Bhakti Rahayu Tabanan', 'Jl. Batukaru No. 2, Denbantas, Tabanan, Bali', '0', '', '-', 'RS Swasta', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, NULL, NULL, NULL),
(291, 'Rumah Sakit Gigi dan Mulut Saraswati Denpasar', 'Jl. Kamboja No. 11 A, Denpasar Utara', '0', '-', '81326662229', 'RS Swasta', 'https://rsgm.unmas.ac.id/assets/img/icon/logo-unmas-denpasar_yellow.png', NULL, NULL, NULL, NULL, NULL),
(292, 'RSI Namira Lombok Timur', 'Jl. kh. Ahmad dahlan, No.17 Pancor Lotim', '30642797915000', 'YAY. RUMAH SAKIT NAMIRA PANCOR', '-', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(293, 'RSI Yatofa', 'JI. Raya Praya-Mantang No. KM.7, Montong Terep, Praya, Lomb', '80.916.611.9-915.000', 'PT. YATOFA SEHAT WAL AFIAT', '-', 'RS Swasta', 'https://rsiyatofa.com/wp-content/uploads/2019/05/RSIYATOFA.png', NULL, NULL, '', NULL, NULL),
(294, 'Rumah Sakit Kristen Lindimara', 'Jl. Profesor Dokter WZ. Johanes, No. 6, Prailiu', '0', '', '85238992009', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(295, 'Rumah Sakit Umum Bali Holistik', 'Jl. Raya Umabian Desa Belayu Kec.Marga,', '764507265908000', '', '8123918414', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(296, 'Rumah Sakit Umum Bunda', 'Jl. Rajawali No. 36, Jembrana, Bali', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(297, 'Rumah Sakit Umum Ganesha', 'Jalan Raya Celuk Sukawati, Batubulan, Gianyar', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(298, 'RSU Kertayasa', 'Jl. Ngurah Rai No. 143, Dauhwaru', '0', '-', '+62 822-3648-6343/  Chrisentiana Osf', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(299, 'RSU Premagana', 'Jl. Hyang Sangsi No. 2, Komp. Perumahan', '0', '', '83119640747', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(300, 'Rumah Sakit Umum Semara Ratih', 'Jl. Raya Denpasar - Singaraja,', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(301, 'Rumah Sakit Umum Surya Husadha Ubung', 'Jl. Cokroaminoto No. 356, Ubung Kaja', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(302, 'Rumah Sakit Umum Surya Husadha Nusa Dua', 'Jalan Siligita, Jl. Nusa Dua No.14, Benoa', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(303, 'Rumah Sakit Umum Daerah Dr. Soedjono Selong', 'Jl Prof. M Yamin SH No.55, Khusus Kota Selong, Lombok Timur,', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(304, 'Rumah Sakit Risa Sentra Medika', 'Jl. Pejanggik, No. 115, Cilinaya, Cakranegara', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(305, 'Rumah Sakit Dharma Kerti Tabanan', 'Jl Teratai No.16, Dauh Peken, Kec.Tabanan, Kab Tabanan, Bali', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(306, 'Rs Graha Medika Banyuwangi', '', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(307, 'RS Siloam Hospital Mataram', 'Jl. Majapahit, Pagesangan, Kec. Mataram, Nusa Tenggara, Barat', '0', '', '', 'RS Swasta', 'https://drive.google.com/uc?export=view&id=1mx2et5ArpNiipfIT5A4oXgWPvSY3yCJ8', NULL, NULL, NULL, NULL, NULL),
(308, 'Rumah Sakit Manuaba', 'Jl Cokroaminoto No 28 Denpasar', '01.209.604.6-901.000', 'Yayasan Keluarga Manuaba', '+62 858-5796-8252', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(309, 'Surya Husadha Group', 'Jl. Pulau Serangan No. 7, Denpasar, Bali', '0', '', '82144732983', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(310, 'Rumah Sakit Wiyung Sejahtera', 'Jl. Raya Menganti Karangan No.490, Babatan, Kec. Wiyung, Kot', '0', '', '', 'RS Swasta', '', NULL, NULL, NULL, NULL, NULL),
(311, 'Rumah Sakit Umum Wisma Prashanti', 'Jl. Yeh Gangga I No.9, Gubug, Kec. Tabanan, Kabupaten Tabana', '02 863 868 2 908 000', 'WISMA PRASHANTI', '-', 'RS Swasta', 'https://bajo.jumbomark.com/labels/JID2021039343', NULL, NULL, '', NULL, NULL),
(312, 'Putu Sri Sumartini', '', '0', '', '', 'Nakes', NULL, NULL, NULL, NULL, NULL, NULL),
(313, 'Kadek Trisnadewi', 'JL TUKAD ASAHAN NO 2 PANJER-DENPASAR SELATAN', '0', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(314, 'Praktek Mandiri Bidan Ni Nyoman Yanti, Amd Keb', 'Br. Tengah Desa Sibangkaja, Kec. Abiansemal', '0', '', '85792133707', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(315, 'Bidan Ni Nyoman Admini, SST', 'Jl. Gelogor Carik Gg. Flamboyan', '470729294901000', '', '85333426042', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(316, 'Bidan Lilik Erfaniah, A.Md. Keb', 'Jl. Nusantara I No. 11, Kuta, Tuban, Badung', '852967447905000', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(317, 'Dr. AA Gede Swandewi,M.Biomed', '', '693492381609000', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(318, 'Dr. IGAM Suartini', 'Jl. Tukad Badung VII/1 Renon Denpasar Selatan,', '98257686901000', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(319, 'Ni Luh Eko Juliartini', '', '0', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(320, 'Ni Luh Sukadani A.Md.Keb', 'Jl. Kubu Anyar, Gg.Sadasari Anyar No.6 Kuta,', '0', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(321, 'Nyoman Marheni, A.Md.Keb', 'Br. Bersih, Darmasaba, Abiansemal-Badung', '470586298901000', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(322, 'Praktek Mandiri drg. Ni Nyoman Suweni', 'Jl Raya Pantai Seseh No 9X, Cemagi, Mengwi, Badung', '0', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(323, 'dr. I Made Sudiana', 'Jl. WR Supratman No. 303 F,', '98000169903000', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(324, 'drg. Rai Purnawati', '', '346380967906000', '', '', 'Nakes', '', NULL, NULL, NULL, NULL, NULL),
(325, 'Barta Medika Clinic', 'Jl. Pulau Nias No. 5 Tabanan', '06.736.337.4-908.000', 'dr. I Ketut Sumiarta, M.Kes', '\'08123659799', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(326, 'PMB Anom Artini', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(327, 'Labkes Tabanan', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(328, 'RS Permata Hati', 'Jl. Kecubung No.22, Semarapura Kelod, Kec. Klungkung, Kabupaten Klungkung', '0', '-', '-', 'RS Swasta', 'https://rsupermatahati.com/images/logo-rsuph.png', NULL, NULL, NULL, NULL, NULL),
(329, 'UPTD Instalasi Farmasi Kabupaten Klungkung', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(330, 'Klinik SMC Banyusari', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(331, 'RSU Grha Bhakti Medika', 'Jl. Prof. Dr. Ida Bagus Mantra No.99, Negari, Kec. Banjarangkan, Kabupaten Klungkung', '0', '-', '-', 'RS Swasta', 'https://gbmhospital.com/wp-content/uploads/2020/03/logo-grha-bhakti-medika-125.png', NULL, NULL, NULL, NULL, NULL),
(333, 'UPTD Puskesmas Kerambitan II', '', '', '', '', '', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, NULL, NULL, NULL),
(334, 'Apotek Kita Ubung', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(335, 'Rumah Sakit Umum Bunda Negara', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(336, 'Klinik Utama Bali Puri Medika', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(337, 'ibu dokter tjok nila', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(339, 'Apotek PIP Renon', 'Jl. Raya Puputan No.8, Renon, Denpasar Selatan, Kota Denpasar', '47.632.392.901.000', 'Dr Made Hemadewi', '+62 812-4600-835', 'General', '', NULL, NULL, '', NULL, NULL),
(340, 'Ni Luh Adhi Darayana', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(341, 'Puskesmas Tejakula II', 'Jl. Singaraja- Amlapura, Tejakula, Kab. Buleleng. Bali Indonesia', '-', '-', '082237651013', '', 'https://4.bp.blogspot.com/-lBQfphxJ4NI/WjFdnbCBhEI/AAAAAAAAECg/74ZtmQxr8jckDyypvWEGJdwSI77XrzXCwCLcBGAs/s1600/Logo%2BPuskesmas%2BTanpa%2BBackground.png', NULL, NULL, '', NULL, NULL),
(342, 'Rumah Sakit Bhakti Rahayu Surabaya', '-', '0', '-', '-', '', 'https://pt-einsten.com/easy2/images/pel/br_tbn.png', NULL, NULL, '', NULL, NULL),
(343, 'Klinik Kimia Farma Sanur', '', '', '', '', '', 'https://drive.google.com/uc?export=view&id=1lxN558A7Gke2pHYCWPtEsEd4CQxdGTSu', NULL, NULL, NULL, NULL, NULL),
(344, 'dr. Ketut Wiradharma.M.Biomed.Sp.Pd', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(345, 'BIMC UBUD', '', '', '', '', '', 'https://drive.google.com/uc?export=view&id=1ualNWzgNwPRF7s958_4HF8i8IQ_Jgt56', NULL, NULL, NULL, NULL, NULL),
(346, 'PMB Maharani', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(347, 'BIMC Hospital Canggu', '', '', '', '', '', 'https://drive.google.com/uc?export=view&id=1ualNWzgNwPRF7s958_4HF8i8IQ_Jgt56', NULL, NULL, NULL, NULL, NULL),
(349, 'RSU Parama Sidhi', 'l. A. Yani No.171, Baktiseraga, Kec. Buleleng, Kabupaten Buleleng', '-', '-', '-', 'RS Swasta', '', NULL, NULL, '-', NULL, NULL),
(350, 'Rumah Sakit Ganesha', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(352, 'Klinik Prasanti Sanur', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(353, 'UPTD Puskesmas Buleleng III', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(354, 'UPTD Puskesmas Kuta I', 'Jl. Merdeka Raya II Abianbase Kuta', '-', '-', '081338648116', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(355, 'Klinik Asih Usadha', 'Jl. Nangka No.11C, Dangin Puri Kaja, Kec. Denpasar Utara, Kota Denpasar', '-', '-', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(356, 'Klinik Infinity Medicare Denpasar', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(357, 'Apotik Gunung Agung', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(358, 'Politeknik Kesehatan Denpasar', 'Jl. Sanitasi No 1 Sidakarya Denpasar Selatan', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(359, 'Apotek Adapotek Abiansemal', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(360, 'RUMAH SAKIT TINGKAT II Prof. dr.J. A. LATUMETEN', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(362, 'UPTD Lab. Dan Pengujian Obat Tradisional Dinas Kesehatan Provinsi Bali', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(363, 'PENGERJAAN THERMOHYGRO RS WISMA & DINKES OBAT TRADISIONAL', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(364, 'Apotek Raeja Farma', 'Jalan Campuhan III, Depan Wantilan Pura Ambar Sari, Jl. Katik Lantang No.Br, Singakerta, Kecamatan Ubud, Kabupaten Gianyar', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(365, 'Klinik Permana', 'Jl. Raya Kesambi Kerobokan Kuta Utara Badung Bali', '-', '-', '081239637093', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(366, 'Rumah Sakit Bangli Medika Canti', 'Jl Tirta Giri Kutri LC Subak Aya Bebalang Bangli', '313553562907000', 'PT. Bangli Medical Center', '\'082144677418', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(367, 'petrofin', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(368, 'PT Petrofin', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(369, 'Klinik Nurjaya', 'Jl. Raya Sempidi, No.45C,Lukluk,Kec.Mengwi, Kab.Badung', '92.248.183.3-906.000', 'PT. KULHEN NUR JAYA', '\'081236786654', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(370, 'Klinik Utama Mata JEC Bali', 'l. Teuku Umar Barat No.170, Padangsambian Klod, Kec. Denpasar Bar., Kota Denpasar', '-', '-', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(371, 'Apotek Sunari Medika', 'Jl. Trengguli No.100 Penatih Denpasar', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(372, 'Apotek Barito Farma', 'Tukad Barito Timur No. 17', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(373, 'Apotek K24 Tabanan', 'JL. By Pass Jl. Dr. Ir. Soekarno No.999, Dauh Peken, Tabanan', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(374, 'Puskesmas Selemadeg Timur I', 'Ds. Megati, Kec. Selemadeg Timur, Kab. Tabanan, Bali', '-', '-', '81338727664', '', '', NULL, NULL, '', NULL, NULL),
(375, 'KIMIA FARMA DIPONOGORO', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(376, 'PT  Borneo Etam Mandiri', 'Ruko Carwash Priority, Jl. Mayor TNI A.D. Imat Saili No.64, Damai, Balikpapan Baru, Kota Balikpapan, Kalimantan Timur', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(377, 'Rumah Sakit Umum Surya Husada Denpasar', 'Jl. Pulau Serangan No.7  Denpasar', '-', '-', '-', 'RS Swasta', '', NULL, NULL, 'hati2 input harga tarik DO, jangan langsung di kirim ke kostamer soalnya teliti, harus via marketing', NULL, NULL),
(378, 'Rumah Sakit Umum Daerah Tangguwisia', 'Tangguwisia, Seririt, Buleleng Regency', '-', '-', '087766566787', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(379, 'PMB Bidan Putu Budiartini', 'Jl. Perintis No. 6 Denpasar, Br/ Link Taruna BHIN Kelurahan Pemogan Kecamatan Denpasar Selatan', '-', '-', '081338669837', '', '', NULL, NULL, 'eksitu', NULL, NULL),
(380, 'Kimia Farma Batu Bulan', 'Jl. Raya Batubulan No.63X, Batubulan, Kec. Sukawati, Kabupaten Gianyar,', '01.061.332.1-051.000', 'PT. Kimia Farma Diagnostik', '+62 822-4051-0388', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(381, 'PT Bintang Mahkota Alkesindo', 'Jl. Raya Sesetan No.7', '-', '-', '081291334897', 'General', '', NULL, NULL, '', NULL, NULL),
(382, 'Klinik Laboratorium Prodia Tabanan', 'Jl. By Pass Ngurah Rai Jl. Dr. Ir. Soekarno, Banjar Anyar, Kec. Kediri, Kabupaten Tabanan', '-', '-', '085213199779', '', '', NULL, NULL, '', NULL, NULL),
(383, 'RS Bhayangkara Mataram', 'Jl. Langko No. 64, Pejeruk, Kec. Ampenan, Kota Mataram, Nusa Tengara Barat.', '00.142.838.2-911.000', 'RUMKIT BHAYANGKARA MATARAM KEPOLISIAN NEGARA REPUBLIK', '087864952365', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(384, 'Clinik Miracle Renon', 'Renon, Jl. Letda Tantular No.47A, Dangin Puri Klod, Kec. Denpasar Tim., Kota Denpasar', '-', '-', '081337125202', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(385, 'PT Aby Medika Sejahtera', 'Jl.  Medeka No.8, Dauh Peken, Kecamatan Tabanan, Kabupaten Tabanan', '63.738.382.9-908.000', 'PT Aby Medika Sejahtera', '087846098530', 'General', '', NULL, NULL, '', NULL, NULL),
(386, 'Klinik Pratama Bhawani Husada', 'Jl. Raya Mengwitani No.55, Mengwitani, Kec Mengwi Badung', '-', '-', '081338199599', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(387, 'Rumah Sakit Umum Suya Husada Ubung', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(388, 'UPTD Puskesmas Baturiti I', 'Jl. Baturiti - Mekarsari Jl. Gunung Agung, Mekarsari, Kec. Baturiti, Kabupaten Tabanan', '96.375.240.7-908.000', 'Puskesmas Baturiti 1', '081999777230', '', '', NULL, NULL, '', NULL, NULL),
(390, 'PT Citra Dian Pratama (Bali)', 'Jln Nuansa Hijau utama No.30, Ubung Kaja', '-', '-', '085737368914', 'General', '', NULL, NULL, '', NULL, NULL),
(391, 'Klinik Utama Bunga Emas', 'Jl. Melati No.1, Dangin Puri, Kec. Denpasar Tim., Kota Denpasar', '-', '-', '08124670993', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(392, 'Klinik Bali Nusa Medika', 'Jl. Mertasari no 65A, Sidakarya, Denpasar Selatan', '91.968.595.8-903.000', 'CV. Klinik Bali Nusa Medika', '\'08123603648', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(393, 'RS Citra Sari Husada (Karawang)', 'Jl. Raya Telagasari-Kosambi no.3, Cibolangsari, Kec. klari, Karawang, Jawa Barat', '-', '-', '-', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(394, 'Puskesmas Penebel II', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(396, 'PT. BALI SANO UTAMA', 'JL. TEUKU UMAR BARAT NO. 170B', '70.704.034.1-901.000', 'PT. BALI SANO UTAMA', '\'081238205400', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(397, 'Praktek dr. I Gusti PT Mayun Mayura, SP.OG', 'Jl Pulau Tarakan No.3C', '06.633.763.5-901.000', 'Mayun Mayura I Gusti Putu, DR.SP.OG', '+62812-3808-588/0812-3800-923', 'Nakes', '', NULL, NULL, '', NULL, NULL),
(398, 'Klinik Kimia Farma 126 Nusa Dua', 'Jalan Bypass Ngurah Rai No.890 Benoa Kuta Selatan Badung', '010613321051000', 'PT. Kimia Farma Diagnostika', '082145911511', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(399, 'Klinik Kimia farma 236 Taman Griya', 'Perumahan Taman Griya, Jl. Danau Batur Raya No.1C, Jimbaran, Kec. Kuta Sel., Kabupaten Badung', '-', '-', '081337894429', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(400, 'Klinik Kimia Farma 082 Kartika Plaza', 'Jl. Kartika Plaza No.67, Tuban, Kec. Kuta, Kabupaten Badung', '-', '-', '081338376868', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(401, 'Apotekku Gunung Agung Denpasar', 'Jln. Gunung Agung 178 B Denpasar', '603575978908000', 'PT. Aby Apotekku Bersinar', '081803130398', 'General', '', NULL, NULL, '', NULL, NULL),
(402, 'OMSA MEDIC Denpasar', 'Jl. Pulau Kawe No.9B, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar', '96.999.318.7-905.000', 'PT. Omsa Medik Nusantara', '(0881037194214)', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(403, 'Klinik Tiara Husada', 'Klinik Tiara Husada, 100-X, Kuta, 80361, Jl. Raya Tuban, Kuta, Badung', '71.322.813.8-653.000', 'Rindha Dwi Sihanto', '+6285730277771', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(404, 'UPTD Puskesmas Selat (Karangasem)', 'Pering Sari, Kec. Selat, Kabupaten Karangasem', '002770956907000', 'DINAS KESEHATAN KABUPATEN KARANGASEM', '-', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(405, 'Klinik Pratama Rawat Jalan Wiratni', 'Jalan Nangka No 26 Denpasar', '72.174.837.4-901.000', 'PT.WIRATNI INTI NUGRAHA', '081338376338', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(406, 'RSU Garba Med', 'Jl. Raya Kerobokan No.53, Lingkungan Jambe, Kerobokan Kaja, Kec. Kuta Utara, Kabupaten Badung', '724054259906000', 'PT. ADHI GARBA SAKTI', '\'081338422193', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(408, 'UPTD PUSKESMAS MARGA I', 'Jln. Wisnu marga, kec. Marga, kab. Tabanan', '96.341.532.8-908.000-', 'UPTD PUSKESMAS MARGA I-', '-+62 852-3744-5500 (wikan)', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(410, 'Apotekku Marlboro', 'Jln Teuku Umar Barat, Denpasar', '603575978908000', 'PT. Aby Apotekku Bersinar', '081803130398', 'General', '', NULL, NULL, '', NULL, NULL),
(411, 'Klinik Pratama PPK 1 Medika Wirasatya Singaraja', 'Jl. Surapati No 121 A Singaraja', '00.103.059.2-901.000', 'KESDAM IX /UDY MARKAS BESAR TNI AD KEMENTERIAN PERTAHANAN', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(412, 'Klinik Eswen Medica', 'Jl. Teuku Umar Barat 369, No Ruko R7-8, Denpasar, Bali', '435808191901000', 'PT. SAKTI EIR REMEDIOS', '813397607140', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(413, 'Barta Medika Clinik Denpasar', 'JALAN GUNUNG ANDAKASA 7XX, DENPASAR, BALI', '-', '-', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(414, 'Praktek Mandiri drg Yuwanti', 'Jln by pass ngurah rai no 113 sanur', '5171045009900004', 'Drg Ni made yuwanti praptini', '\'08174779664', 'Nakes', '', NULL, NULL, '', NULL, NULL),
(415, 'RSU Bali Jimbaran', 'Jalan Raya Kampus Unud Nomor 52 Jimbaran', '31.685.165.8-905.000', 'PT Jimbaran', '081996988889 (dr Aditya)', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(416, 'PMB Ni Wayan Susianti, S.S.T. Keb., Bdn', 'Br. Lebah Sari, Mambal, Abiansemal, Badung', '471846774901000', 'NI WAYAN SUSIANTI', '081338495728', 'Nakes', '', NULL, NULL, '', NULL, NULL),
(417, 'UPTD Puskesmas Manggis II', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(418, 'Bali Forages', 'Jl. Padang Tawang No. 17 Canggu', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(419, 'Made Ita Clinic', 'Jl. Beraban No. 38 Seminyak Kerobokan Bali', '76.617.027.8-906.000', 'PT. CITRA JAYA ESTETIKA', '08123665 9998/08121022072', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(420, 'UPTD Puskesmas Sidemen', 'Jl. Raya Sidemen-Amlapura', '002770956907000', 'DINAS KESEHATAN KABUPATEN KARANGASEM', '(0366)5551654', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(421, 'Klinik Putu Parwata', 'Jalan Bhineka Nusa Kangin no:1x, Dalung, Kuta Utara', '31.585.649.2-906.000', 'Yay Cerdas Sehat Sejahtera-', '082144575174/ bpk Arya', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(422, 'Rumah Sakit Cahaya Medika', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(423, 'Klinik Prameka Denpasar', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(424, 'BIC Clinic', 'Jl. Gatot Subroto Barat No.455x, Padangsambian Kaja, Kec. Denpasar Bar., Kota Denpasar, Bali', '-', '-', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(425, 'Putu Pradnya Dyasmita Fisioteraphy SMC', 'Br Tegal Saat Kapal- Mengwi', '-', '-', '-', 'Nakes', '', NULL, NULL, '', NULL, NULL),
(426, 'Puskesmas Kubutambahan II', 'Puskesmas Kubutambahan II, Desa Tamblang-Buleleng', '\'003094141902000', 'dinas kesehatan kabupaten buleleng', '\'081237250717', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(427, 'UPTD Puskesmas Karangasem I', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(428, 'Apotek Bhakti Rahayu', 'Jl. Gatot Subroto II No 11', '642611990901000', 'NYOMAN SWITRI', 'indrasuari (085737604293)', 'General', '', NULL, NULL, '', NULL, NULL),
(429, 'UPTD PUSKEMAS KEDIRI II', 'JALAN RAYA KABA-KABA KEDIRI TABANAN', '964026546908000', 'UPTD PUSKESMAS KEDIRI II', '\'085792010401', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(430, 'UPTD Puskesmas Payangan', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(431, 'Apotek KR 24', 'Jl. Raya Mengwitani No.55', '638006213906000', 'Pt Krisna Dewata Sembilan Sembilan', '085737188376', 'General', '', NULL, NULL, '', NULL, NULL),
(432, 'Puskesmas Pekutatan', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(433, 'KLINIK BRI MEDIKA DENPASAR', 'Jalan bung Tomo no. 25b, Pemecutan Kaja, Denpasar Utara', '02.793.536.0-901.001', 'PT UPAYA PURNABHAKTI SEJAHTERA', '\'081337186251', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(434, 'Klinik Sidhi Sai', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(435, 'PMB  Bdn Ida Ayu Putu Diah Jayadi, S.S T.keb', 'Jl. Ngurah Rai No.4, Sangeh, Abiansemal - Badung', '-', '-', '08123684630', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(436, 'CV Vidjitha Group', 'Banjar Dinas Batulumbang, Desa Penuktukan, Kecamatan Tejakula, Kabupaten Buleleng', '433250842902000', 'CV Vidjitha Group', '082229342957/peggy', 'General', '', NULL, NULL, '', NULL, NULL),
(437, 'Mayapada Hospital Surabaya (MHSB)', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(438, 'Puskesmas Banjar I', 'Buleleng', '-', '-', '-', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(439, 'PT Ensten', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(440, 'PT Einsten', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(441, 'Klinik Sekata Medical Center Samarinda', 'Jln. Pangeran Suryanata No. 027 RT. 015,  Air Putih Samarinda Ulu', '94.696.686.8-722.000', 'PT. Sekata Borneo Jaya', 'Cp : Reza ( 085225999474 )', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(442, 'KKP Kelas II Mataram', 'Jl. Adi Sucipto No.13B, Rembiga, Kec. Ampenan, Kota Mataram, Nusa Tenggara Barat', '001571769911000', 'KANTOR KESEHATAN PELABUHAN KELAS II MATARAM DITJEN PENCEGANAN', '-', 'Instansi Pemerintah', '', NULL, NULL, '', NULL, NULL),
(443, 'Klinik Sekata Medical Center Batu Kajang Kalimantan Timur', 'Jl. Negara KM. 142 RT. 24 Batu Kajang Kec. Batu Sopang Kab. Paser', '946966868722000', 'PT. Sekata Borneo Jaya', '+62 821-5354-6670', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(444, 'RS Kenak Medika', 'Banjar batanancak, desamas ubud gianyar', '-', '-', '-', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(445, 'UPTD Puskesmas Bebandem', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(446, 'UPTD Laboratorium Kesehatan Masyarakat Kabupaten Buleleng', 'Jl. Serma Karma, Baktiseraga, Kec. Buleleng, Kabupaten Buleleng', '-', '-', '0812-3886-8680', 'Instansi Pemerintah', '', NULL, NULL, '', NULL, NULL),
(447, 'Bapak Sutanirmawan ( Penanggung Jawab Fisoteraphy Surya Husadha)', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(448, 'Dinas Kesehatan Sumbawa Barat', 'Jl. Bung Karno Komplek KTC Kecamatan Taliwang', '001207398913000', '-', '-', 'Dinas Kesehatan', '', NULL, NULL, '', NULL, NULL),
(449, 'KLINIK UTAMA RAWAT JALAN KHUSUS GIGI DAN MULUT GIO', 'Jalan Mahendradatta 5, Padangsambian Klod, Denpasar Barat, Denpasar, Bali 80117', '65.150.619.8-901.000', 'PT. BALI JAYA MANDIRI DENPASAR', '\'082146011905/drg. Asnul Arfani, Sp.BM', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(450, 'Dinas Kesehatan Minahasa', '-', '-', '-', '-', 'Dinas Kesehatan', '', NULL, NULL, '', NULL, NULL),
(451, 'PT Tristanisa Global Indonesia', 'Jl. Subak Dalem IA Perum Griya Laksmi Artha No 12', '03.326.086.0-901.000', 'PT. Tristanisa Global Indonesia', '\'085238321148', 'General', '', NULL, NULL, '', NULL, NULL),
(452, 'Puskesmas Selemadeg Timur II', 'Beraban, Kec. Selemadeg Tim., Kabupaten Tabanan, Bali', '964100556908000', 'UPTD PUSKESMAS SELEMADEG TIMUR II', '087761793023/ bu sri murdeni', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(453, 'SMC Samarinda', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(454, 'Rumah Sakit Bhakti Rahayu Ambon', 'Jl. Jend. A Yani, Kel Batu Gaja, Kec. Sirimau, Kota Ambon, Maluku', '86.452.517.5-941.000', 'PT. BHAKTI RAHAYU NUSANTARA', '08994121444 (Marta Dinata)', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(455, 'Nyoman Manik Artari. A', 'Br. Bengkel Wangaya Gede', '-', '-', '085858413919', 'Nakes', '', NULL, NULL, '', NULL, NULL),
(456, 'Ni Ketut Sari Murni', 'Jl. Cempaka Putih, Gg Lotus', '-', '-', '085378373073', 'General', '', NULL, NULL, '', NULL, NULL),
(457, 'Akara Klinik', 'Jl. Pulau Kawe No.46, Denpasar', '41.340.187.8-903.000', 'CV. CV. Karsa Medika Jaya', '\'082237909075', 'Klinik', '', 'Coba Mira', 'Coba Avil', 'Bawel', NULL, NULL),
(458, 'Rumah Sakit Mata Nusa Tenggara Barat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(459, 'Puriva Klinik (Puriva aesthetic lifestyle clinic)', 'Ruko Sunset indah kavling 3, sunset road 89, kuta-Bali', '92.065.221.1-905.000', 'PT. Puriva Estetika Maju', '\'081936090837', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(460, 'Inhouse Klinik Mitra Prodin', 'Jl. Prof. Ida Bagus Mantra Pabean Ketewel', '93.107.964.4-907.000', 'Dewa Ayu Agung Dwita Arthaningsih', '\'082181991133', 'General', '', NULL, NULL, '', NULL, NULL),
(461, 'PT PHC ( Pelindo Benoa)', 'Jl. Dermaga II, Pelabuhan Benoa, Pedungan, Denpasar Selatan - Kota Denpasar Bali', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(462, 'PT PHC (Lembar)', 'Jl. Pelabuhan No.5, Lembar, Lombok Barat, NTB', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(463, 'PT PHC (Kupang)', 'Jln Yos Sudarso No.23 Tenau- Kupang NTT', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(464, 'PT PHC (Badas)', 'Jln Raya Pelabuhan No.11 Sumbawa, Kantor PT Pelindo Pelabuhan Badas', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(465, 'PT PHC (Pelindo Maumere)', 'Pelabuhan Lorens Say, Jln. Kureng No.2 NTT', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(466, 'PT PHC (Pelindo Waingapu)', 'Jln Nanga Mesi, No.16 Kel. Hambala, Kec Kota Waingapu Sumba- NTT', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(467, 'Apotekku Grup (PT Orifarma Apotekku Gumilang)', 'Jalan Tukad Balian no 4, Perumnas Sanggulan, Kediri Tabanan-Bali', '-', '-', '0812 3933 8196/ Yogi Suara', 'General', '', NULL, NULL, '', NULL, NULL),
(468, 'Klinik Penyakit Dalam Dharmanatha', 'Desa Kalianget, Seririt, Buleleng', '-', '-', '082359176262/ bu pipin', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(469, 'ApotekKu Healing Pharmacy Kuta', 'Jalan Pantai Kuta No 46 D, Kuta, Badung', '60.418.459.8-905.000', 'PT. RAGA JAYA MEDIKA', '\'0895630317008', 'General', '', NULL, NULL, '', NULL, NULL),
(470, 'ApotekKU Marga', 'Jalan Wisnu Marga, Banjar Basa, Desa Marga, Kec. Marga, Tabanan (Depan Puskesmas Marga I)', '61.951.673.5-908.000', 'PT. Marga Jaya Sejahtera', '\'081238223141', '', '', NULL, NULL, '', NULL, NULL),
(471, 'Klinik Pratama Warmadewa', 'JL. AKASIA NO.17, SUMERTA , DENPASAR', '\'014132989904000', 'YAYASAN KESEJAHTERAAN KORPRI PROPINSI BALI', '\'085739505303', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(472, 'PT Panureksa Utama', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(473, 'PT Raga Jaya Utama (Apotekku Grup)', 'Jalan Wisnu Marga, Banjar Basa, Desa Marga, Kec. Marga, Tabanan (Depan Puskesmas Marga I)', 'PT Marga Jaya Sejahtera', '61.951.673.5-908.000', '081238223141', 'General', '', NULL, NULL, '', NULL, NULL),
(474, 'PT INDO ARC (ARC Dental Clinic)', 'Jalan Sunset Road No 819 Kuta Badung', '02.169.688.5-905.001', 'PT. INDO ARC', '\'085738849462', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(475, 'Praktek Mandiri Arya Gunawan', 'Jln. Trenggana No 111 Penatih', '610755654903000', 'I Nyoman Arya Gunawan', '0', 'Nakes', '', NULL, NULL, '', NULL, NULL),
(476, 'Awe Beauty Clinic', 'Jl. Nangka Utara no. 305 Denpasar', '5171037112720196', 'Asri indriani', '\'081238646747', '', '', NULL, NULL, '', NULL, NULL),
(477, 'Apotek Sumber Waras', 'Jln. Nenas, Kecicang Islam, Bungaya Kangin, Bebandem, Karangasem', '85.557.538.7-807.000', 'Hidayatul ulyah', '\'085804890081', 'General', '', NULL, NULL, '', NULL, NULL),
(478, 'Klinik Penta Medika Candidasa', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(479, 'Bali Mental Health Clinic', 'Jl. Imam bonjol no 125 denpasar', '61.891.981.5-901.000', 'PT.DHARMA SEJAHTERA RAHAYU', '\'085851265041', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(480, 'RUMAH SAKIT UMUM DAERAH BULA KABUPATEN SERAM BAGIAN TIMUR', 'JL. WAILOLA, BULA KAB. SBT MALUKU', '96.436.611.6-941.000', 'RUMAH SAKIT UMUM DAERAH KABUPATEN SERAM BAGIAN TIMUR', '\'085399803984', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(481, 'Apotek Widi Farma', 'Jalan Yudistira No. 47, Br. Dinas Megati Kelod, Desa Megati, Kecamatan Selemadeg Timur, Tabanan', '466412152908000', 'Ni Made Widi Astuti', 'Ni Made Widi Astuti (085101433704)', 'General', '', NULL, NULL, '', NULL, NULL),
(482, 'Apotek Asaku', 'Jalan Pulau Bungin No.58 Denpasar', '11.935.676.4-903.000', 'I Nyoman Sudina', '\'081236435046', '', '', NULL, NULL, '', NULL, NULL),
(483, 'PT Denta Medika Perkasa', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(484, 'RS Balimed Buleleng', 'Jalan Gunung Lempuyang No. 9X Banjar Tegal Buleleng', '73.365.565.8-902.000', 'PT. Dharma Medika Buleleng', '\'081338586194', '', '', NULL, NULL, '', NULL, NULL),
(485, 'Dinas Kesehatan Provinsi Nusa Tenggara Timur', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(486, 'Apotek Arsha Bakti Farma II', 'Jln raya denpasar _gilimanuk bajera selemadeg Tabanan', '\'083983874908000', 'I Made Sudiarsa, SE', '\'081238108488', 'General', '', NULL, NULL, '', NULL, NULL),
(487, 'Klinik Tulus Ayu Amlapura', 'Jl. Jendral Sudirman No 28X Amlapura', '\'022180079903000', 'Pers. Penyelenggara Diklat dan Pelayanan Kesehatan (P3LPK) Bali', '\'087846140246', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(488, 'Apotek Sehati Medika', 'Jl. Raya Alas Kedaton, Desa Kukuh, Marga, Tabanan', '91.986.653.3-908.000', 'I PUTU YOGA ADI BERATA', '\'085739999300', '', '', NULL, NULL, '', NULL, NULL),
(489, 'Braia Klinik Spesialis Kulit dan Kelamin', 'Jalan Gatot Subroto Barat No 361, Denpasar', '83.070.304.7-901.000', 'PT SAPTABRAYA BALI DERMA', 'Suprawisanti (081339850861)', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(490, 'Apotek Rita Farma Kediri', '-', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(491, 'Apotek Wisada Farma', 'Br. Sengguan Nyitdah, Kediri, Tabanan', '90.471.528.1-908.000', 'I PUTU EKA APRIL YANTO', '085739024292', 'General', '', NULL, NULL, '', NULL, NULL),
(492, 'Klinik Dwi Karya Usadha', 'Jln Raya Kerobokan. Br Campuan.Kerobokan.Kuta Utara.Badung', '90.252.351.3-906.000', 'CV DWI KARYA USADHA', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(493, 'Apotekku Padu Karya', 'JALAN AHMAD YANI NO.9X, BANJAR ANYAR, KEDIRI, TABANAN, BALI', '60.998.204.6-908.000', 'PT. PADU PUTRA MANDIRI', '\'085647001878', 'General', '', NULL, NULL, '', NULL, NULL),
(494, 'PT. Adiska Sarana Medika', 'jalan kartini no 216 denpasar bali', '70.604.422.9-901.000', 'PT. Adiska Sarana Medika', '\'081353377448', 'General', '', NULL, NULL, '', NULL, NULL),
(495, 'Apotek Marta Farma', 'Lingkungan umegunung no 20 sempidi', '363689407906000', 'Luh Putu Wiryani Martatika', '\'081931529119', '', '', NULL, NULL, '', NULL, NULL),
(496, 'Rumah Sakit Umum Banda Maluku Tengah', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(497, 'Klinik Pratama Bayu Suta', 'Jln Dharmawangsa No. 55 Br. Ancak Kampial', '93.045.385.7-905.000', 'PT PURISURYA AMERTHA MESARI', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(498, 'Intibios Lab Klinik Farmasi Bali', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(499, 'Klinik Kuta Emergency', 'jln raya kuta mong 2, Desa Kuta, Kec. Pujut, Kab. Lombok Tengah', '93 948 717 9 915 000', 'PT KUTA EMS LOMBOK', '-', '', '', NULL, NULL, '', NULL, NULL),
(500, 'Klinik Prasada', 'Jl. Gunung Sanghyang No. 17 B Kerobokan', '91.383.276.2-906.000', 'Yayasan Prasada', '\'087855469397', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(501, 'Klinik Cerebro', 'Jl. Pulau Batam No.8, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar', '822979100901000', 'BAGUS DIVA INDRA DHARMA', '085792250304', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(502, 'Dinas Kesehatan Kabupaten Sumbawa', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(503, 'Apotekku Pulau Kawe', 'Jalan Pulau Kawe No. 74, Dauh Puri Kelod, Denpasar Selatan, Kota Denpasar, Bali', '60.341.505.0-908.000', 'PT. FARMASI APOTEKKU GUMILANG', '\'085647001878', '', '', NULL, NULL, '', NULL, NULL),
(504, 'Apotek Assa Farma Penyalin', 'Jalan Raya Penyalin No. 8 Tabanan', '260672084908000', 'I Made Deva Suaryadnya', '\'087761186639', '', '', NULL, NULL, '', NULL, NULL),
(505, 'PMB Ni Wayan Yanik Sariati', 'Jalan Ngurah Rai No 48A ,Banjar Ubud Desa Getasan, Kecamatan Petang', '471847673906000', 'Ni Wayan Yanik Sariati', '-', '', '', NULL, NULL, '', NULL, NULL),
(506, 'PT Perintis Citra Fajar', 'Jl. Antosari Pupuan, Banjar Sanda, Desa Sanda, Kecamatan Pupuan, Kabupaten Tabanan', '01.773.208.2-402.000', '-', 'IDA BAGUS PUTU SUDIADNYANA (+62 813-3819-7515)', '', '', NULL, NULL, '', NULL, NULL),
(507, 'Apotek Ettra Farma', 'Jalan Yeh Gangga no 33', '63.813.394.2-908.000', 'PT. DEWAYU UTAMA MEDIKA', '\'081338198376', '', '', NULL, NULL, '', NULL, NULL),
(508, 'Rumah Sakit Katolik Marianum', 'Atambua RT 017 RW 006 Kota Atambua Belu, NTT', '02.926.195.5-925.000', 'YAY.MARIA VIRGO', '-', 'RS Swasta', '', NULL, NULL, '', NULL, NULL),
(509, 'RS KDH Bros Singaraja', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(510, 'Klinik Tunas Harapan', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(511, 'Rumah Sakit Daerah Malaka', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(512, 'Klinik Prima Husadha', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(513, 'Rumah Sakit Angkatan Laut', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(514, 'Rumah Sakit Umum Daerah Kefamenanu', 'Jalan Letjen Suprapto, Kefamenanu Tengah, Kefamenanu, Kefamenanu Tengah, Kec. Kota Kefamenanu, Kabupaten Timor Tengah Utara, Nusa Tenggara Tim.', '00.277.033.7-925.000', 'RUMAH SAKIT UMUM DERAH KEFAMENANU KABUPATEN TIMOR', '-', 'RS Pemerintah', '', NULL, NULL, '', NULL, NULL),
(515, 'Kimia Farma 102 Tabanan', 'Jalan Ngurah Rai No 74A Banjar Anyar, Kediri, Tabanan', '01.061.227.3-051.000', 'PT. Kimia Farma Apotek', '\'08970254497', '', '', NULL, NULL, '', NULL, NULL),
(516, 'PT Cahaya Mahkota Indah Kupang', 'JL. Neten Lila Jalur 40. Kupang NTT', '73.981.944.9-922.000', 'PT CAHAYA MAHKOTA INDAH KUPANG', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(518, 'Apotek Aditya Farma', 'Jln. Nenas kecicang, bungaya kangin,bebandem karangasem', '62.821.835.6-907.000', 'PT. SARI MERTA JAYA', '\'08123881082', '', '', NULL, NULL, '', NULL, NULL),
(519, 'Apotek Rita Farma', 'jln raya kapal munggu, br. Batanduren desa cepaka kediri tabanan', '369370747908000', 'Luh Putu Mas Ritawasyuni', '\'081805305503', 'General', '', NULL, NULL, '', NULL, NULL),
(520, 'Apotek Jyothi Farma', 'Jalan Banjar Dauh Peken, Desa Kaba-Kaba, Kediri, Tabanan', '96.293.425.3-908.000', 'Ni Made Swasti Wandhini', '\'085237832052', '', '', NULL, NULL, '', NULL, NULL),
(521, 'Klinik Grup NTB', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(522, 'Apotek Perisa Farma', 'Jalan Nusa Indah no.49', '411619737901000', 'Komang Ayu Sarini', '\'081999006604', '', '', NULL, NULL, '', NULL, NULL),
(523, 'PT Surya Bali Makmur', 'Office : Jl. Diponegoro 135-137 Blok B 24-15 Denpasar - Bali Warehouse : Jl. Gunung Catur No. 8A (Gatot Subroto Barat) Denpasar - Bali', '02.252.265.0-904.000', 'PT. Surya Bali Makmur', 'Ibu Indah (Logistic SPV)  - 089618534911', '', '', NULL, NULL, '', NULL, NULL),
(524, 'Rumah Sakit Permata Hati Palang Karaya', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(525, 'Rumah Sakit Umum Daerah Waibakul', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(526, 'Apotekku Ahmad Yani', 'Jalan Ahmad Yani Utara, No. 428, Peguyangan Kaja, Kecamatan Denpasar Utara, Kota Denpasar, Bali, 80239', '-', '-', '\'085647001878', '', '', NULL, NULL, '', NULL, NULL),
(527, 'Rumah Sakit Windu Husada', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(528, 'Apotek palguna', 'Jln Raya Tanah Lot No.86 Beraban Kediri Tabanan', '439688920908000', 'PT Sri Dana Asih', '081236037119', 'General', '', NULL, NULL, '', NULL, NULL),
(529, 'Apotekku Batubulan', 'Jl. Raya Batubulan No.11, Batubulan, Kec. Sukawati, Kabupaten Gianyar,', '60.341.505.0-908.000', 'PT. FARMASI APOTEKKU GUMILANG', '\'085647001878', 'General', '', NULL, NULL, '', NULL, NULL),
(530, 'Apotek Manik Niroga Farma', 'Jalan Subur No. 59A Denpasar', '62.536.492.2-901.000', 'PT. Manik Derma Niroga Amerta', '\'081339850861', '', '', NULL, NULL, '', NULL, NULL),
(531, 'Apotek  Adi Wida Farma (AW Farma)', 'Jl. Gunung athena, padang sambian kelod', '464295690901000', 'I Gede Adi wiguna', '\'08174731215', '', '', NULL, NULL, '', NULL, NULL),
(532, 'UPTD Puskesmas Sukawati I', '-', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(533, 'Rumah Sakit Umum Daerah Manggelewa', 'Jln. Lintas Calabai Desa Doromelo Kec Manggelewa Kab. Dompu NTB', '002928232912000', 'RUMAH SAKIT PRATAMA MANGGELEWA KABUPATEN DOMPU', '-', '', '', NULL, NULL, '', NULL, NULL),
(535, 'Apotek Mahosada Medika', 'Jalan Diponegoro No.50A Tabanan', '627497654908000', 'PT. Maha Purnama Berjaya', '\'081339113216', 'General', '', NULL, NULL, '', NULL, NULL),
(536, 'Puskesmas Nusa Penida III', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(537, 'Klinik Wahyu Cendana Medika Jembrana', 'Jl. Cendrawasih, Pendem, Kec. Jembrana, Kabupaten Jembrana', '82.977.609.5-908.000', 'CV. WAHYU CENDANA MEDIKA', '-', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(538, 'CV Graha Sari Karya', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(539, 'Klinik Sidhi Sai Penatih', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(540, 'PT Wisa Internasional', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(541, 'PT. AMARA PERKASA MEDIKA', 'JL. SENGANAN-APUAN, NO. 8, BR. TINUNGAN, APUAN, BATURITI, TABANAN, BALI', '43.831.903.0-908.000', 'PT. AMARA PERKASA MEDIKA', '\'081239731990', 'General', '', NULL, NULL, '', NULL, NULL),
(542, 'Apotekku Kamasan', 'Jl. Majapahit, Br. Kamasan, Kelurahan Dajan Peken', '-', '-', 'I Made Myasa Darmika (085647001878)', 'General', '', NULL, NULL, '', NULL, NULL),
(543, 'CV Harta Surya Dewata', 'Jl Bedugul Selatan Asri No 126 Bypass Ir Soekarno Tabanan Bali', '657590154908000', 'CV Harta Surya Dewata', '\'081213999922', 'General', '', 'Budi Santoso', 'Ardian Saputra', 'Banyak duit tapi pelit', 'cv_hsd', '123456'),
(544, 'UPTD Puskesmas Nusa Penida I', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(545, 'UPTD Puskesmas Ubud II', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(546, 'Bali International Dental Center', 'Jalan Diponegoro 150/A 32 Denpasar', '76.886.204.7-901.000', 'CV. Bali International Dental Center', 'Cipto Yuwono 081353265432', '', '', NULL, NULL, '', NULL, NULL),
(547, 'Rumah Sakit Mandalika', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(548, 'Badan Penanggulangan Bencana Daerah (BPBD) Provinsi Bali', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(549, 'Puskesmas Wini', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(550, 'Puskesmas Oeolo', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(551, 'Puskesmas Tasinifu', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(552, 'Puskesmas Oenopu', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(553, 'Puskesmas Tamis', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(554, 'Puskesmas Lurasik', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(555, 'Puskesmas Haekto', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(556, 'Puskesmas neomuti', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(557, 'Puskesmas Tublopo', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(558, 'Puskesmas Bijaepasu', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(559, 'Puskesmas Kaubele', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(560, 'Puskesmas Manufui', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(561, 'Puskesmas Sasi', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(562, 'Puskesmas Inbate', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(563, 'Puskesmas Nunpene', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(564, 'Puskesmas Oelolok', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(565, 'Puskesmas Manamas', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(566, 'Puskesmas Manumean', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(567, 'Puskesmas Eban', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(568, 'Puskesmas Bitefa', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(569, 'Puskesmas Mamsena', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(570, 'Puskesmas Ponu', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(571, 'Puskesmas Maubesi', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(572, 'Puskesmas Napan', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(573, 'Puskesmas Oemeu', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(574, 'Puskesmas Nimasi', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(575, 'Grill\'d Healthy Burgers', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(576, 'PT Citra Sedayuh', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(577, 'UPTD Puskesmas Buleleng II', '-', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(578, 'CV Bakti Bumi Berseri', 'Jalan Pondok Indah Cargo I Denpasar', '93.586.493.4-901.000', 'CV. BAKTI BUMI BERSERI', '\'0818351106', 'General', '', NULL, NULL, '', NULL, NULL),
(579, 'Klinik Sanur Medical', 'Jl. Bypass Ngurah Rai No. 243 Sanur Denpasar Selatan', '86.056.696.7-903.000', 'PT. SANUR MAHARDHIKA MEDIKA', '082146442293 (IKA)', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(580, 'APOTEKKU HEALING PHARMACY UBUD 9', 'BR. TENGAH KAUH, PELIATAN, UBUD, GIANYAR', '43.016.875.7-907.001', 'PT. APOTEKKU SOLUSI KESEHATAN KELUARGA', '\'085647001878', 'General', '', NULL, NULL, '', NULL, NULL),
(581, 'PT Tamba Sanjiwani Bali', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(582, 'Apotek Karunia  Sehat Farma', 'Teuku Umar barat no 38 ab denpasar', '44.239.944.0-901.000', 'Sonia', '\'08113900523', 'General', '', NULL, NULL, '', NULL, NULL),
(583, 'Klinik Pratama Payana Medica', 'Jalan I Gusti Ngurah Rai,Br.Samuan Kawan,Ds.Carangsari,Kec.Petang,Kab.Badung,Bali', '963647516906000', 'CV.Payana Makmur Mandiri', '\'081916443840', '', '', NULL, NULL, '', NULL, NULL),
(584, 'Praktek Mandiri dr Intan Lestari Putri', 'jln trenggana banjar pelagan ds penatih denpasar timur', '82.934.058.7-903.000', 'INTAN LESTARI PUTRI', '+62 897-0531-163', '', '', NULL, NULL, '', NULL, NULL),
(585, 'Puskesmas Mpunda Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(586, 'Puskesmas Penanae Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(587, 'Puskesmas Kumbe Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(588, 'Puskesmas  Kolo Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(589, 'Puskesmas Rasanae Timur Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(590, 'Puskesmas Paruga Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(591, 'Puskesmas Jatibaru Kota Bima', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `npwp_pelanggan`, `namanpwp_pelanggan`, `kontak_pelanggan`, `kategori_pelanggan`, `logo_pelanggan`, `keuangan_pelanggan`, `teknis_pelanggan`, `catatan_pelanggan`, `username_pelanggan`, `pass_pelanggan`) VALUES
(592, 'Klinik Universitas Udayana', 'Jln. Raya Kampus Unud, Jimbaran, Badung, Bali', '00.173.489.6-905.000', 'UNIVERSITAS UDAYANA SEKERTARIAT UTAMA KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN', '\'082144800618', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(593, 'Apotekku By Pass', 'Jalan Ir Soekarno - Tabanan', '60.420.121.0-908.000', 'PT. APOTEKKU MAJU BERSAMA', 'I Made Myasa Darmika (085647001878)', 'General', '', NULL, NULL, '', NULL, NULL),
(594, 'Rumah Sakit Muhamadiyah Palembang', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(595, 'Apotek Nerisa', 'Jl Tukad Balian No,123D Renon Denpasar Selatan', '73.332.244.0-901.000', 'Putu Kusuma Dwi Wulandari', '-', '', '', NULL, NULL, '', NULL, NULL),
(596, 'KLINIK PRATAMA SILOAM CLINIC MERTANADI', 'Jl Mertanadi No.4C Kuta, Badung, Bali', '02.988.291.7-905.001', 'PT. SILOAM MEDIKA CEMERLANG', 'Ruth 081779098320', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(597, 'Apotekku Mengwi', 'Jl. Jurs. Denpasar - Tabanan, Mengwi', '-', '-', '+62 856 4700 1878', 'General', '', NULL, NULL, '', NULL, NULL),
(598, 'UPTD Puskesmas Kediri III', 'l. Raya Munggu-By Pass Tanah Lot, Beraban, Kec. Kediri, Kabupaten Tabanan, Bali', '96.341.568.2-908.000', 'UPTD Puskesmas Kediri III', '0361811419', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(599, 'WIJAYA PLATINUM CLINIC BALI', 'JALAN PUPUTAN SUMERTA KELOD DENPASAR', '852888478903000', 'CV BUMI DEWATA', '\'085792428087', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(600, 'Rumah Sakit Murni Teguh', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(601, 'Apotek ARIA', 'Jl. Pulau Batam No. 14 B, Tabanan-Bali', '46.433.347.5-908.000', 'Ni Made Maharianingsih', '\'081805398614', '', '', NULL, NULL, '', NULL, NULL),
(602, 'Puskesmas Sukasada II', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(603, 'Puskesmas Kintamani IV', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(604, 'Apotek Dharma Medika', 'Jl. Gunung Agung No.94 Tabanan', '464294008901000', 'Benny Indra Yasa', '\'085338078054', 'General', '', NULL, NULL, '', NULL, NULL),
(605, 'RSIA Kuncup Bunga', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(606, 'Apotek Berkat', 'JL. MAWAR NO. 63 TABANAN', '736682782908000', 'MELISA MARTIN', '\'081916483591', 'General', '', 'Nana', 'Nini', 'ok', NULL, NULL),
(607, 'Apotek Amerta Jaya', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(608, 'UPTD Puskesmas Banjar II', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(609, 'Praktek Mandiri Prananda Fisioteraphy', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(610, 'Apotek Sembung Medika', 'Kec. Penebel, Kabupaten Tabanan, Bali 82181', '95988416908000', 'I Made Subur', '\'085205881364', 'General', '', NULL, NULL, '', NULL, NULL),
(611, 'PMB Gusti Ayu Supiyani', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(612, 'Bidan Praktek Mandiri Gst. Putu Supiyani, Amd Keb', 'Jl Flamboyan III, Br Agung Desa Mambal, Kecamatan Abiansemal, Kabupaten Badung', '47.692.633.2-901.000', 'Gst. Putu Supiyani, Amd Keb', '\'081353358029', 'General', '', NULL, NULL, '', NULL, NULL),
(613, 'Apotek Sembung Usada', 'Jl. Raya Denpasar - Gilimanuk No.8, Berembeng, Kec. Selemadeg, Kabupaten Tabanan, Bali 82162', '95988416908000', 'I Made Subur', '\'085205881364', '', '', NULL, NULL, '', NULL, NULL),
(614, 'Apotek Sembung Farma', 'Sembung Gede, Kec. Kerambitan, Kabupaten Tabanan, Bali 82161', '95988416908000', 'I Made Subur', '\'085205881364', '', '', NULL, NULL, '', NULL, NULL),
(615, 'Puskesmas Tompaso', 'Jaga II Desa Talikuran Kecamatan Tompaso Kabupaten Minahasa Propinsi Sulawesi Utara', '161464896823000', 'Kristiana Maringka', '\'085298416536', 'General', '', NULL, NULL, '', NULL, NULL),
(616, 'Puskesmas Tumaratas', 'Tumaratas, Kec. Langowan Bar., Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'082396719735', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(617, 'Puskesmas Walantakan', 'Toraget, Kec. Langowan Utara, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '082373735716', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(618, 'Puskesmas Wolaang', 'Komplek Pasar Lama, Amongena II, Kec. Langowan Tim., Kabupaten Minahasa, Sulawesi Utara', '-', '-', '-', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(619, 'Puskesmas Kawangkoan', 'Uner, Kec. Kawangkoan Utara, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'081340223462', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(620, 'Puskesmas Kawangkoan Barat', 'Jl.pekuburan No.desa, Aombasian Atas, Kec. Kawangkoan Bar., Kabupaten Minahasa, Sulawesi Utara', '-', '-', '085341952231', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(621, 'Puskesmas Sonder', 'Kauneran, Kec. Sonder, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '852-5678-6074', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(622, 'Puskesmas Kakas', 'Tounelet, Kec. Kakas, Kabupaten Minahasa, Sulawesi Utara', '-', '-', 'Joksan Huragana,S.Kep 082396719735', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(623, 'Puskesmas Kakas Barat', 'Talikuran, Kec. Kakas, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'082393551505', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(624, 'Puskesmas Romboken', 'Leleko, Kec. Remboken, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '-', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(625, 'Puskesmas Kombi', 'Ranowangko II, Kecamatan Kombi, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '085796006007', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(626, 'Puskesmas Seretan', 'Seretan Timur, Kec. Lembean Tim., Kabupaten Minahasa, Sulawesi Utara', '-', '-', '081523977296', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(627, 'Puskesmas Tandengan', 'Tondano - Kakas, Tandengan, Kec. Eris, Kabupaten Minahasa, Sulawesi Utara', '45.672.954.0-823.000', 'Siska Oroh', '\'0852401931800', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(628, 'Puskesmas Koya', 'Masarang, Kec. Tondano Bar., Kabupaten Minahasa, Sulawesi Utara', '-', '-', '-', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(629, 'Puskesmas Papakelan', 'Papakelan, Tondano Tim., Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'081356569945', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(630, 'Puskesmas Tonsea Lama', 'Tonsea Lama, Kec. Tondano Utara, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'082293777370', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(631, 'Puskesmas Lolah', 'Lolah Satu, Kec. Tombariri, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'085340128917', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(632, 'Puskesmas Tanawangko', 'l. Raya Tanawangko Amurang, Ranowangko, Kec. Tombariri, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'082344404237', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(633, 'Puskesmas Tateli', 'Kalasey Satu, Kec. Pineleng, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'08988112115', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(634, 'Puskesmas Pineleng', 'Pineleng I, Kec. Pineleng, Kabupaten Minahasa, Sulawesi Utara', '74.886.969.0-821.000', 'Agustina Kuamano', '085824608071', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(635, 'Puskesmas Tombulu', 'Kembes II, Kec. Tombulu, Kabupaten Minahasa, Sulawesi Utara', '-', '-', '\'08990608050', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(636, 'Apotek Gia Medika', 'Jln. Wyn Gentuh No. 9 C Kwanji Dalung', '-', '-', '-', 'General', '', NULL, NULL, '', NULL, NULL),
(637, 'PT Kongruen Denpasar', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(638, 'Klinik Komodo', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(639, 'Klinik Siligita', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(640, 'Praktek Mandiri dr. Arita', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(641, 'Apotekku Bajra', 'Jl.Raya Denpasar-Gilimanuk', '604201210908002', 'PT.Apotekku Maju Bersama', '\'082146429474', 'General', '', NULL, NULL, '', NULL, NULL),
(642, 'Klinik Ganecadha', 'Jl Raya Terminal Mengwi, Mengwi Badung', '73.571.296.0.906.000', 'CV. GANECADHA MANGUPURA', '\'083838457550', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(643, 'Klinik Sada Jiwa', 'Sembung, kecamatan mengwi, kabupaten badung, bali', '03.322.119.3-906.000', 'PT Tegal Nadhi Jaya', '0857-9236-2016', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(644, 'Klinik Pratama Prima', 'Jalan Subak Sari No. 90-A, Br. Dinas Tegal Gundul, Canggu, Bali', 'CV. Klinik Pratama Prima', 'CV. Klinik Pratama Prima', '\'081230270747', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(645, 'Puskesmas Billa Cenge', 'Unnamed Road, Bukambero, Kodi Utara, Southwest Sumba Regency, East Nusa Tenggara', '-', '-', '-', 'Puskesmas', '', NULL, NULL, '', NULL, NULL),
(646, 'Puskesmas Elopada', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(647, 'Puskesmas Kori', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(648, 'Puskesmas Palla', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(649, 'Puskesmas Radamata', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(650, 'Puskesmas Waimangura', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(651, 'Puskesmas Watu Kawula', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(652, 'Puskesmas Weekombaka', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(653, 'Puskesmas Bondo Kodi', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(654, 'Puskesmas Kawangohari', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(655, 'Puskesmas Panenggo Ede', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(656, 'Puskesmas Tanggara', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(657, 'Puskesmas Tena Teke', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(658, 'Puskesmas Walla Ndimu', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(659, 'Puskesmas Weri Lolo', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(660, 'Puskesmas Delu Depa', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(661, 'PMB Desiani Artin Ni Komang, A.Md.Keb', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(662, 'Apotek Lepang Medika', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(663, 'Puskesmas Buleleng I', '-', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(664, 'Apotek adina Farma', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(665, 'Klinik karunia balikpapan baru', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(666, 'Puskesmas Tegalalang I', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(667, 'Klinik Catur Warga Selong Lotim', '-', '-', '-', '-', '', '', NULL, NULL, '', NULL, NULL),
(668, 'KLINIK PRATAMA HYDRO MEDICAL', 'Jalan Batu Belig No 88A, Seminyak, Kerobokan Kelod, Kecamatan Kuta Utara, Kabupaten Badung', '93.957.392.9-903.000', 'CV. HYDROMEDICAL NUSANTARA SUKSES', '\'085847741499', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(669, 'Klinik Catur Warga Mataram', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(670, 'UPTD Puskesmas Sukasada I', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(671, 'Klinik Pratama Panti Swasti Tangeb', 'Jl. Raya Tangeb - Kapal No. 25, Banjar Tengah Tangeb, Abianbase, Mengwi, Badung', '02.754.378.4-901.000', 'Yayasan Valentia Dendios', '\'082340340370', 'Klinik', '', NULL, NULL, '', NULL, NULL),
(673, 'buah', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(674, 'buahbuah', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(675, 'klinik abc', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(677, 'CV Harta Surya Dewata gfdrw', 'Jl Bedugul Selatan Asri No 126 Bypass Ir Soekarno Tabanan Bali', '657590154908000', 'CV Harta Surya Dewata', '\'081213999900', 'Instansi Pemerintah', '', '', '', '', 'cvgf', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `peminjamanmikropipet`
--

CREATE TABLE `peminjamanmikropipet` (
  `id_peminjaman` int(11) NOT NULL,
  `no_proyek` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `link_peminjaman` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `no_proyek` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `marketing_proyek` varchar(255) NOT NULL,
  `catatan_proyek` text NOT NULL,
  `status_proyek` varchar(255) NOT NULL DEFAULT 'NEGO',
  `tglorder_proyek` date NOT NULL,
  `namapemilik_proyek` varchar(255) NOT NULL DEFAULT '',
  `alamatpemilik_proyek` varchar(255) NOT NULL DEFAULT '',
  `permohonan_proyek` varchar(255) NOT NULL,
  `insitu_proyek` int(11) DEFAULT NULL,
  `insitu_progres_proyek` varchar(255) DEFAULT NULL,
  `eksitu_proyek` int(11) DEFAULT NULL,
  `eksitu_progres_proyek` varchar(255) DEFAULT NULL,
  `subkon_proyek` int(11) DEFAULT NULL,
  `subkon_progres_proyek` varchar(255) DEFAULT NULL,
  `lastupdate_proyek` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `deskripsi_riwayat` text NOT NULL,
  `tgl_riwayat` date NOT NULL,
  `kategori_riwayat` varchar(255) NOT NULL,
  `tindakan_riwayat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_alat`, `deskripsi_riwayat`, `tgl_riwayat`, `kategori_riwayat`, `tindakan_riwayat`) VALUES
(2, 45, 'baterai', '2022-06-14', 'Kerusakan', 'Ganti'),
(4, 4, 'Ganti Baterai', '2023-02-01', 'Pemeliharaan', 'Penggantian baterai telah dilakukan'),
(6, 4, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Uji Banding antar Lab di BPFK Jakarta'),
(7, 4, 'daya baterai habis', '2022-12-20', 'Pemeliharaan', 'penggantian baterai'),
(8, 4, 'baterai habis', '2022-09-14', 'Pemeliharaan', 'penggantian baterai'),
(9, 4, 'baterai alat habis', '2022-07-05', 'Pemeliharaan', 'pennggantian baterai'),
(10, 20, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Uji Banding di BPFK Jakarta'),
(11, 20, 'baterai habis', '2022-03-21', 'Pemeliharaan', 'penggantian baterai'),
(12, 20, 'daya baterai habis', '2022-07-29', 'Pemeliharaan', 'dilakukan penggantian baterai'),
(13, 20, 'baterai habis', '2022-11-16', 'Pemeliharaan', 'pergantian baterai'),
(14, 19, 'baterai perlu diganti', '2022-07-04', 'Pemeliharaan', 'pergantian baterai'),
(15, 19, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Uji Banding di BPFK Jakarta'),
(16, 67, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Melakukan Uji Banding di BPFK Jakarta'),
(17, 67, 'Pemeliharaan Unit', '2023-01-19', 'Pemeliharaan', 'Pembersihan unit'),
(18, 67, 'Pemeliharan  Unit', '2022-12-14', 'Pemeliharaan', 'Pembersihan Unit'),
(19, 67, 'Pemeliharan Unit', '2022-10-12', 'Pemeliharaan', 'Pengecekan fisik, Pembersihan Unit'),
(20, 67, 'Pemeliharan Unit', '2022-08-25', 'Pemeliharaan', 'Pengecekan fisik fungsi ,pembersihan Unit'),
(21, 67, 'Pemeliharan Unit', '2022-06-17', 'Pemeliharaan', 'Pengecekan fisik fungsi ,pembersihan Unit'),
(22, 66, 'Pemeliharan Unit', '2022-06-17', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(23, 66, 'Pemeliharan Unit', '2022-08-25', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(24, 66, 'Pemeliharan', '2022-10-12', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(25, 66, 'Pemeliharan', '2022-12-14', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(26, 66, 'Pemeliharan', '2023-01-19', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(27, 66, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Uji Banding dilakukan Di BPFK Jakarta'),
(28, 63, 'Pemeliharan', '2022-06-17', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(29, 63, 'Pemeliharan', '2022-08-25', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(30, 63, 'Pemeliharan', '2022-10-12', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(31, 63, 'Pemeliharan', '2022-12-14', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(32, 63, 'Pemeliharan', '2023-01-19', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(33, 63, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Uji Banding dilakukan di BPFK Jakarta'),
(34, 62, 'Pemeliharan', '2022-06-17', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(35, 62, 'Pemeliharan', '2022-08-25', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(36, 62, 'Pemeliharaan', '2022-10-12', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(37, 62, 'Pemeliharaan', '2022-12-14', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(38, 62, 'Pemeliharan', '2023-01-19', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(39, 62, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Uji Banding dilakukan di BPFK Jakarta'),
(40, 25, 'Pemeliharan', '2022-06-17', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(41, 25, 'Pemeliharaan', '2022-08-25', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(42, 25, 'Pemeliharaan', '2022-10-12', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(43, 25, 'Pemeliharaan', '2022-12-14', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(44, 25, 'Pemeliharaan', '2023-01-19', 'Pemeliharaan', 'Pengecekan fisik fungsi ,Pembersihan Unit'),
(45, 25, 'Uji Banding', '2023-02-06', 'Uji Banding', 'Melakukan Uji Banding Di BPFK Jakarta'),
(46, 1, 'rekal', '2023-10-03', 'Kalibrasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `kode_stiker_sertifikat` varchar(255) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `nama_alat_sertifikat` varchar(255) NOT NULL,
  `merek_sertifikat` varchar(255) DEFAULT NULL,
  `tipe_sertifikat` varchar(255) DEFAULT NULL,
  `no_seri_sertifikat` varchar(255) DEFAULT NULL,
  `ruangan_sertifikat` varchar(255) DEFAULT NULL,
  `penguji_sertifikat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `koordinator_spk` int(11) NOT NULL,
  `pelaksana_spk` varchar(255) NOT NULL,
  `stgl_spk` date DEFAULT NULL,
  `etgl_spk` date DEFAULT NULL,
  `sjam_spk` time DEFAULT '00:00:00',
  `ejam_spk` time DEFAULT '00:00:00',
  `jml_akomodasi_spk` int(11) NOT NULL,
  `ket_akomodasi_spk` varchar(255) NOT NULL,
  `jml_transportasi_spk` int(11) NOT NULL,
  `ket_transportasi_spk` varchar(255) NOT NULL,
  `jml_penginapan_spk` int(11) NOT NULL,
  `ket_penginapan_spk` varchar(255) NOT NULL,
  `jml_cadangan_spk` int(11) NOT NULL,
  `ket_cadangan_spk` varchar(255) NOT NULL,
  `lastupdate_spk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_multiple`
--

CREATE TABLE `tb_multiple` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `document_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `nama_teknisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama_teknisi`) VALUES
(1, 'Dewa Gde Ardha Putra, S.T'),
(2, 'Erlangga, S.T'),
(3, 'I Kadek Eman Giyana M, S.Tr.Kes'),
(4, 'I Putu Anna Andika, S.Tr.Kes'),
(5, 'Juli Hendrawan, S.T'),
(6, 'Kadek Adi Erawan, S.Tr.T'),
(7, 'Dewa Gede Alit Darma P.S, S.T'),
(8, 'I Putu Cahya Gunawan, S.Tr.Kes'),
(9, 'L. Wirio Supriadi, A.Md.T');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `foto_user` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT '',
  `divisi_user` varchar(255) DEFAULT NULL,
  `posisi_user` varchar(255) DEFAULT NULL,
  `telp_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `join_user` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_user` varchar(255) DEFAULT NULL,
  `status_pernikahan` varchar(255) DEFAULT NULL,
  `agama_user` varchar(255) DEFAULT NULL,
  `npwp_user` varchar(255) DEFAULT NULL,
  `pendidikan_user` varchar(255) DEFAULT NULL,
  `pengalaman_user` text DEFAULT NULL,
  `kelamin_user` varchar(255) DEFAULT NULL,
  `status_kontrak` varchar(255) DEFAULT NULL,
  `status_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `foto_user`, `nama_user`, `pass`, `username`, `divisi_user`, `posisi_user`, `telp_user`, `email_user`, `join_user`, `tempat_lahir`, `tgl_lahir`, `alamat_user`, `status_pernikahan`, `agama_user`, `npwp_user`, `pendidikan_user`, `pengalaman_user`, `kelamin_user`, `status_kontrak`, `status_user`) VALUES
(1, '1.jpg', 'Super Admin', 'DvsxaKWClnK+FSG3VTRECw==', 'admin', 'SA', 'SA', '-', '-', '2022-03-10', '-', '2022-03-10', '-', 'Belum Kawin', 'Hindu', '-', '-', '-', 'Laki-laki', NULL, 'Aktif'),
(2, '2.jpg', 'Elista Risky Indianti', '/1uTpsHY+Tk1gQqUrYoLiw==', '3.3.6.22.2', 'Staff', 'Admin Teknis', '089680910960', 'indiantielista@gmail.com', '2022-02-10', 'Malang', '1997-12-10', 'Jl. Sedap Malam RT 43 RW 13, TUREN', 'Belum Kawin', 'Protestan', '', 'D4 Teknik Elektromedik', '-', 'Perempuan', 'Internal', 'Aktif'),
(3, '3.jpeg', 'Dewa Gede Alit Darma Putra Sukradinatha', 'IUD/orSqr/GLaz5ioShwsg==', '3.3.5.22.3', 'Staff', 'Teknisi', '087836602126', 'dewagedealit442@gmail.com', '2022-01-01', 'Denpasar', '1997-05-30', 'Jalan Tukad Yeh Aya IX No. 15 Kelurahan Renon Denpasar', 'Belum Kawin', 'Hindu', '', 'S1 - Teknik Elektro', '-', 'Laki-laki', 'Internal', 'Tidak Aktif'),
(4, '4.png', 'Kadek Adi Erawan', 'm777nvV1CRYEyboLyqbrNg==', '3.3.5.22.4', 'Staff', 'Teknisi', '082237909075', 'kadekadi817@gmail.com', '2022-01-01', 'Klungkung', '1998-11-22', 'Dusun Jelantik Kuribatu, Desa Tojan, Klungkung', 'Belum Kawin', 'Hindu', '', 'DIV Teknik Elektromedik', 'PT. ENS10', 'Laki-laki', 'Internal', 'Tidak Aktif'),
(5, '5.jpg', 'I Putu Cahya Gunawan', 'BSTDXVqo0vh7GvA5CgPRAg==', '3.2.2.22.5', 'Manager', 'PJ Teknis', '081805521480', 'ccahya.ggunawan@gmail.com', '2022-01-01', 'Pajahan', '1997-02-04', 'Br. Dinas Tangis, Desa Pajahan, Kec. Pupuan, Tabanan, Bali', 'Belum Kawin', 'Hindu', '', 'D-IV Teknik Elektromedik', 'PT. Ensten Tabanan', 'Laki-laki', 'Internal', 'Aktif'),
(6, '6.jpg', 'Ni Nym Sukadani', 'gtuxfY5xD8IdmgnWLEJyrg==', '3.2.9.22.6', 'Manager', 'Marketing', '081236790271', 'nym.sukadani@gmail.com', '2022-01-01', 'Denpasar', '1978-09-07', 'Ds cau belayu marga tabanan', 'Kawin Tercatat', 'Hindu', '', 'D3 Farmasi', '', 'Perempuan', 'Internal', 'Aktif'),
(7, '7.jpg', 'Ni Luh Putu Ayu Pujayanti', '0VO67dv4QxHGOfV5ywlHbg==', '3.3.7.22.7', 'Staff', 'Admin Umum', '085851275287', 'ayupujayanti4@gmail.com', '2022-01-01', 'Denpasar', '1999-07-08', 'Desa Cau Belayu Marga Tabanan', 'Belum Kawin', 'Hindu', '', 'S1 Agribisnis', '-', 'Perempuan', 'Internal', 'Aktif'),
(8, '8.jpg', 'Gst Ayu Putu Savitri Ulandari', 'k8me8Py/5Evj9PFL5WpXVw==', '3.3.8.22.8', 'Staff', 'Finance', '087860182990', 'Savitriulandari@yahoo.com', '2022-01-01', 'Kesiut, Tabanan, Bali', '1996-05-12', 'Desa Gadung Sari, Selemadeg Timur, Tabanan, Bali', 'Kawin Tercatat', 'Hindu', '', 'S1 Ekonomi Akuntansi', '', 'Perempuan', 'Internal', 'Aktif'),
(9, '9.jpg', 'L Wirio Supriadi', 'btee+E042oM4Dg/rkq2Reg==', '3.3.5.22.9', 'Staff', 'Teknisi', '087814052642', 'laluwirio07@gmail.com', '2022-01-01', 'Tenaru', '1996-09-01', 'Jl. Pinguin no 13', 'Belum Kawin', 'Islam', '', 'D-III Teknik Elektromedik', '1. TEKNISI RS HEERMINA TANGKUBANPRAHU\r\n2. TEKNISI ELEKTROMEDIKA INSTRUMEN TERA NUSANTARA', 'Laki-laki', 'Internal', 'Aktif'),
(10, '10.jpg', 'I Kadek Eman Giyana Mahardika', 'Mrg0bdvk9FbJXp8xI2V3bRWMAddbIFzGWWcluP6c/jU=', '3.3.5.22.10', 'Staff', 'Teknisi', '081239690159', 'giyanamahardika31@gmail.com', '2022-01-01', 'Tabanan', '1998-07-09', 'Dsn. Kukuh Kawan,  Desa Kukuh,  Kerambitan,  Tabanan', 'Belum Kawin', 'Hindu', '', 'DIV Teknik Elektromedik', 'PT. ENS10', 'Laki-laki', 'Internal', 'Aktif'),
(11, '1.png', 'Ni Nyoman Sri Malini', '/1uTpsHY+Tk1gQqUrYoLiw==', '3.3.7.22.11', 'Staff', 'Admin Umum', '0812973332967', '', '2022-03-01', 'Klungkung', '1997-01-21', 'Jl. Lepang', 'Belum Kawin', 'Hindu', '', 'D III Teknik Elektromedis', '', 'Perempuan', 'Internal', 'Tidak Aktif'),
(16, '16.jpeg', 'Ni Putu Anggi Trisna Dewi', 'OtGzDQ2KV2X9k0DDZNj+Og==', '3.3.4.19.16', 'Staff', 'Penyelia', '081330628038', 'zulgadita@gmail.com', '2019-12-03', 'Tanggahan Gunung', '1997-01-07', 'Klungkung', 'Kawin Tercatat', 'Hindu', '-', 'DIV Teknik Elektromedik', '-', 'Perempuan', 'Eksternal', 'Tidak Aktif'),
(17, '17.jpg', 'Dewa Gde Ardha Putra', '2OA5XfVVCu1jNmo9m1J7fw==', '3.3.5.22.17', 'Staff', 'Teknisi', '081916345253', 'ardha.ptens10@gmail.com', '2022-01-01', 'Br. Ubud', '1994-08-16', 'Jr. Ir soekarno tampalsiring, Br. Ubud Belusung, Pejeng Kaja, Tampaksiring Gianyar', 'Belum Kawin', 'Hindu', '', 'S1 Teknik Elektro', '', 'Laki-laki', 'Internal', 'Aktif'),
(19, NULL, 'Juli Hendrawan', 'Fg7KYA/zZpq6X+yEtaGyuQ==', '3.3.5.22.19', 'Staff', 'Teknisi', '087771118422', NULL, '2022-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Eksternal', 'Aktif'),
(20, '20.jpg', 'Laila Susanti', 'cXx10A952RpAbQNLfknzdw==', '3.3.10.22.20', 'Staff', 'HRGA', '087853136885', 'Lsusanti44@gmail.com', '2022-01-01', 'Denpasar', '1996-12-09', 'Jl.Puputan Baru IV No.10 S', 'Belum Kawin', 'Islam', '00', 'S1 Akuntansi', '', 'Perempuan', 'Internal', 'Aktif'),
(24, '24.jpg', 'Nyoman Mira Oktariani', '/1uTpsHY+Tk1gQqUrYoLiw==', '3.3.4.22.24', 'Staff', 'Penyelia', '081936064689', 'mira.oktariani72@gmail.com', '2022-07-01', 'Singaraja', '1996-10-18', 'Jalan Pulau Komodo Gang Strawberry No. 5', 'Belum Kawin', 'Hindu', '93.646.6408-902.000', 'Teknik Fisika', '1. PT. Certus Metrology Indonesia\r\n2. Badan Pertanahan Nasional Kabupaten Badung\r\n3. PT. Dainan 2 Indonesia', 'Perempuan', 'Internal', 'Aktif'),
(26, '26.jpg', 'pegawai baru super hot', 'PWMSfllyg1h6d5JaQYUBdA==', '3.2.2.23.26', 'Manager', 'PJ Teknis', '0811246989444', '', '2023-11-25', 'Maldive', '2000-02-22', 'jl kawe', 'Belum Kawin', 'Katolik', '', 'marketing', '', 'Perempuan', 'Internal', 'Aktif'),
(27, NULL, 'Super Admin2', '/1uTpsHY+Tk1gQqUrYoLiw==', 'admin2', 'SA', 'SA', '-', NULL, '2022-01-01', NULL, '2022-01-01', NULL, 'Belum Kawin', 'Hindu', '-', '-', '-', 'Perempuan', 'Internal', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alatkalibrasi`
--
ALTER TABLE `alatkalibrasi`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `berkasteknisi`
--
ALTER TABLE `berkasteknisi`
  ADD PRIMARY KEY (`id_berkasteknisi`);

--
-- Indexes for table `detailpeminjamanmikropipet`
--
ALTER TABLE `detailpeminjamanmikropipet`
  ADD PRIMARY KEY (`id_detailpeminjaman`);

--
-- Indexes for table `kajiulang`
--
ALTER TABLE `kajiulang`
  ADD PRIMARY KEY (`id_kajiulang`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `mikropipet`
--
ALTER TABLE `mikropipet`
  ADD PRIMARY KEY (`id_mikropipet`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `peminjamanmikropipet`
--
ALTER TABLE `peminjamanmikropipet`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`);

--
-- Indexes for table `tb_multiple`
--
ALTER TABLE `tb_multiple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alatkalibrasi`
--
ALTER TABLE `alatkalibrasi`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `berkasteknisi`
--
ALTER TABLE `berkasteknisi`
  MODIFY `id_berkasteknisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detailpeminjamanmikropipet`
--
ALTER TABLE `detailpeminjamanmikropipet`
  MODIFY `id_detailpeminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kajiulang`
--
ALTER TABLE `kajiulang`
  MODIFY `id_kajiulang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `mikropipet`
--
ALTER TABLE `mikropipet`
  MODIFY `id_mikropipet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678;

--
-- AUTO_INCREMENT for table `peminjamanmikropipet`
--
ALTER TABLE `peminjamanmikropipet`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_multiple`
--
ALTER TABLE `tb_multiple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
