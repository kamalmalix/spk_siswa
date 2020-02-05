-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 09:27 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spksiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_guru`
--

CREATE TABLE `dt_guru` (
  `id_gr` int(50) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `nama_gr` varchar(200) DEFAULT NULL,
  `alamat_gr` text,
  `tlp_gr` varchar(15) DEFAULT NULL,
  `tempat_gr` varchar(50) NOT NULL,
  `tgl_gr` date NOT NULL,
  `gender_gr` varchar(50) NOT NULL,
  `kelas_gr` varchar(50) NOT NULL,
  `level` int(50) NOT NULL,
  `password_gr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_guru`
--

INSERT INTO `dt_guru` (`id_gr`, `nip`, `nama_gr`, `alamat_gr`, `tlp_gr`, `tempat_gr`, `tgl_gr`, `gender_gr`, `kelas_gr`, `level`, `password_gr`) VALUES
(6, '123456789', 'Abdul Malik', 'Kp. Jembatan No.30 , Cipinang Besar Selatan, Jatinegara ', '081315749722', 'Purworejo', '1994-07-29', 'laki-laki', '7C', 1, '123456789'),
(7, '12345', 'Sumardi', 'Jakarta', '0852723927763', 'jakarta', '1970-01-07', 'laki-laki', '7B', 1, '12345'),
(8, '2014200001', 'Dwi Setyawati', 'Jakarta', '0863576726', 'Purworejo', '1970-06-02', 'Perempuan', '7A', 1, '2014200001'),
(9, '2014200002', 'Imam Saputra', 'Cipinang Muara', '081320987654', 'Jakarta', '1983-06-06', 'laki-laki', '7D', 1, '2014200002');

-- --------------------------------------------------------

--
-- Table structure for table `dt_sw`
--

CREATE TABLE `dt_sw` (
  `id_sw` int(50) NOT NULL,
  `nis` bigint(50) NOT NULL,
  `nama_sw` varchar(200) DEFAULT NULL,
  `alamat_sw` text,
  `tlp_sw` bigint(50) NOT NULL,
  `tempat_sw` varchar(50) NOT NULL,
  `tgl_sw` date NOT NULL,
  `gender_sw` varchar(50) NOT NULL,
  `kelas_sw` varchar(50) NOT NULL,
  `level` int(50) NOT NULL,
  `password_sw` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_sw`
--

INSERT INTO `dt_sw` (`id_sw`, `nis`, `nama_sw`, `alamat_sw`, `tlp_sw`, `tempat_sw`, `tgl_sw`, `gender_sw`, `kelas_sw`, `level`, `password_sw`, `status`) VALUES
(28, 12345678, 'Zain Fuady', 'Jl. Permata, Kampung Melayu, Jatinegara', 12345678999, 'Jakarta', '2003-04-02', 'laki-laki', '7C', 2, '0012345678', 'Belum Diproses'),
(29, 98765, 'Faqih', 'jakarta', 838363367, 'Jakarta', '2008-05-07', 'laki-laki', '7B', 2, '98765', 'Verifikasi'),
(30, 54321, 'cika', 'jakarta', 87363526563, 'jakarta', '2008-02-09', 'Perempuan', '7B', 2, '54321', 'Verifikasi'),
(31, 2014230028, 'Recita Aziza', 'Jakarta', 9887656567, 'jakarta', '2007-07-12', 'Perempuan', '7A', 2, '2014230028', 'Verifikasi'),
(32, 2014230030, 'Doni', 'Bekasi', 9782736237, 'Jakarta', '2007-05-27', 'laki-laki', '7A', 2, '2014230030', 'Verifikasi'),
(33, 676767, 'aqila', 'jakarta', 89367373323, 'Jakarta', '2007-08-29', 'Perempuan', '7B', 2, '676767', 'Verifikasi'),
(34, 8585858, 'raditya', 'jakarta', 8233787826, 'jakarta', '2007-02-02', 'laki-laki', '7B', 2, '8585858', 'Verifikasi'),
(35, 43536, 'riko', 'cipinang', 862656352, 'jakarta', '2007-03-05', 'laki-laki', '7B', 2, '43536', 'Verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(5) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jls` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `jls`) VALUES
(1, 'KBM', 'Penilaian ini berhubungan dengan penilaian sikap atau perilaku maupun penilaian mata pelajaran siswa siswi pada kegiatan belajar mengajar di dalam kelas.'),
(2, 'Spiritual', 'Penilaian yang dilakukan pada kriteria ini yaitu berdasarkan kegiataan yang berhubungan dengan keagamaan yang dapat juga diperoleh dari guru mata pelajaran agama sebagai referensi penilaiannya.'),
(3, 'Sosial', 'Penilaian sikap sosial dilakukan dengan penilaian kepada siswa siswi terhadap lingkungan sekitar sekolah, tidak hanya tentang kebersihan melainkan sikap siswa siswi dalam menjaga nama baik sekolah.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kls` int(10) NOT NULL,
  `nama_kls` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kls`, `nama_kls`) VALUES
(7, '7A'),
(8, '7B'),
(9, '7C'),
(10, '8A'),
(11, '8B'),
(12, '7D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quesioner`
--

CREATE TABLE `tb_quesioner` (
  `id_que` int(50) NOT NULL,
  `id_sw` int(50) NOT NULL,
  `nis` bigint(50) NOT NULL,
  `nama_sw` varchar(50) NOT NULL,
  `kelas_sw` varchar(50) NOT NULL,
  `1_1` int(50) NOT NULL,
  `1_2` int(50) NOT NULL,
  `1_3` int(50) NOT NULL,
  `1_4` int(50) NOT NULL,
  `1_5` int(50) NOT NULL,
  `2_1` int(50) NOT NULL,
  `2_2` int(50) NOT NULL,
  `2_3` int(50) NOT NULL,
  `2_4` int(50) NOT NULL,
  `2_5` int(50) NOT NULL,
  `3_1` int(50) NOT NULL,
  `3_2` int(50) NOT NULL,
  `3_3` int(50) NOT NULL,
  `3_4` int(50) NOT NULL,
  `3_5` int(50) NOT NULL,
  `kbm` int(50) NOT NULL,
  `spiritual` int(50) NOT NULL,
  `sosial` int(50) NOT NULL,
  `tgl_quesioner` date NOT NULL,
  `note` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_quesioner`
--

INSERT INTO `tb_quesioner` (`id_que`, `id_sw`, `nis`, `nama_sw`, `kelas_sw`, `1_1`, `1_2`, `1_3`, `1_4`, `1_5`, `2_1`, `2_2`, `2_3`, `2_4`, `2_5`, `3_1`, `3_2`, `3_3`, `3_4`, `3_5`, `kbm`, `spiritual`, `sosial`, `tgl_quesioner`, `note`, `status`) VALUES
(6, 29, 98765, 'Faqih', '7B', 3, 3, 2, 4, 2, 3, 3, 2, 1, 2, 3, 1, 4, 3, 2, 14, 11, 13, '2019-08-09', 'nilainya selalu turun', 'Verifikasi'),
(7, 30, 54321, 'cika', '7B', 2, 1, 3, 1, 1, 3, 3, 3, 3, 4, 1, 3, 3, 4, 3, 8, 16, 14, '2019-08-09', 'lebih tingkatkan nilai matakuliah matematika', 'Verifikasi'),
(8, 33, 676767, 'aqila', '7B', 1, 3, 2, 2, 3, 3, 2, 3, 1, 3, 2, 4, 2, 4, 2, 11, 12, 14, '2019-08-09', 'dkhksfhkfhfkjf', 'Verifikasi'),
(9, 34, 8585858, 'raditya', '7B', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 5, 5, '2019-08-09', 'sangat baik', 'Verifikasi'),
(10, 35, 43536, 'riko', '7B', 2, 3, 1, 2, 3, 3, 2, 3, 3, 3, 1, 2, 3, 2, 2, 11, 14, 10, '2019-08-09', 'perbaiki sikap', 'Verifikasi'),
(43, 31, 2014230028, 'Recita Aziza', '7A', 2, 4, 3, 3, 3, 3, 2, 3, 1, 2, 1, 3, 2, 2, 1, 15, 11, 9, '2019-08-27', 'jkhdksddkjs', 'Verifikasi'),
(44, 32, 2014230030, 'Doni', '7A', 2, 2, 4, 3, 3, 2, 3, 3, 2, 4, 3, 2, 4, 4, 4, 14, 14, 17, '2019-08-27', 'sjshhsjhsj', 'Verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `id_rank` int(50) NOT NULL,
  `id_sw` int(50) NOT NULL,
  `nis` bigint(50) NOT NULL,
  `nama_sw` varchar(50) NOT NULL,
  `kelas_sw` varchar(50) NOT NULL,
  `prefrensi` float NOT NULL,
  `note` text NOT NULL,
  `tanggal_verifikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ranking`
--

INSERT INTO `tb_ranking` (`id_rank`, `id_sw`, `nis`, `nama_sw`, `kelas_sw`, `prefrensi`, `note`, `tanggal_verifikasi`) VALUES
(4, 29, 98765, 'Faqih', '7B', 0.93099, 'nilainya selalu turun', '2019-08-09'),
(5, 30, 54321, 'cika', '7B', 0.878783, 'lebih tingkatkan nilai matakuliah matematika', '2019-08-09'),
(6, 33, 676767, 'aqila', '7B', 0.920949, 'dkhksfhkfhfkjf', '2019-08-09'),
(7, 34, 8585858, 'raditya', '7B', 0.353849, 'sangat baik', '2019-08-09'),
(8, 35, 43536, 'riko', '7B', 0.746345, 'perbaiki sikap', '2019-08-09'),
(29, 31, 2014230028, 'Recita Aziza', '7A', 0.966725, 'Belajar lebih giat', '2019-08-24'),
(30, 32, 2014230030, 'Doni', '7A', 0.886621, 'Kerjakan tugas tepat waktu', '2019-08-24'),
(31, 31, 2014230028, 'Recita Aziza', '7A', 0.584953, 'Tingkatkan belajarnya', '2019-08-25'),
(32, 32, 2014230030, 'Doni', '7A', 1, 'Perhatikan tingkah anak anda', '2019-08-25'),
(33, 31, 2014230028, 'Recita Aziza', '7A', 0.575924, 'Tingkatkan belajar anak', '2019-08-26'),
(34, 32, 2014230030, 'Doni', '7A', 1, 'Lebih diperhatikan sikap anak .', '2019-08-26'),
(35, 31, 2014230028, 'Recita Aziza', '7A', 0.68142, 'Turun nilai bahasa inggris nya', '2019-08-27'),
(36, 32, 2014230030, 'Doni', '7A', 0.981144, 'Nilai nya anjlok', '2019-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(25) NOT NULL,
  `id_guru` bigint(50) NOT NULL,
  `id_siswa` bigint(50) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(10) NOT NULL DEFAULT '0',
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_guru`, `id_siswa`, `nama_user`, `username`, `password`, `level`, `kelas`) VALUES
(1, 0, 0, 'Admin', 'admin', 'admin', 0, 'Admin'),
(44, 6, 0, 'Abdul Malik', '123456789', '123456789', 1, '7C'),
(45, 0, 28, 'Zain Fuady', '12345678', '0012345678', 2, '7C'),
(46, 7, 0, 'Sumardi', '12345', '12345', 1, '7B'),
(47, 0, 29, 'Faqih', '98765', '98765', 2, '7B'),
(48, 0, 30, 'cika', '54321', '54321', 2, '7B'),
(49, 0, 31, 'Recita Aziza', '2014230028', '2014230028', 2, '7A'),
(50, 0, 32, 'Doni', '2014230030', '2014230030', 2, '7A'),
(51, 8, 0, 'Dwi Setyawati', '2014200001', '2014200001', 1, '7A'),
(52, 0, 33, 'aqila', '676767', '676767', 2, '7B'),
(53, 0, 34, 'raditya', '8585858', '8585858', 2, '7B'),
(54, 0, 35, 'riko', '43536', '43536', 2, '7B'),
(55, 9, 0, 'Imam Saputra', '2014200002', '2014200002', 1, '7D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_guru`
--
ALTER TABLE `dt_guru`
  ADD PRIMARY KEY (`id_gr`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `dt_sw`
--
ALTER TABLE `dt_sw`
  ADD PRIMARY KEY (`id_sw`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kls`);

--
-- Indexes for table `tb_quesioner`
--
ALTER TABLE `tb_quesioner`
  ADD PRIMARY KEY (`id_que`);

--
-- Indexes for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  ADD PRIMARY KEY (`id_rank`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_guru`
--
ALTER TABLE `dt_guru`
  MODIFY `id_gr` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dt_sw`
--
ALTER TABLE `dt_sw`
  MODIFY `id_sw` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kls` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_quesioner`
--
ALTER TABLE `tb_quesioner`
  MODIFY `id_que` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  MODIFY `id_rank` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
