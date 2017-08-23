-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 08:15 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ikmasor_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`idadmin` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `nama_lengkap`, `email`, `tlp`) VALUES
(1, 'ikmasor', '617c04872924efbdf00434b00dbb58e6', 'Nauw Noval', 'novalsmith69@gmail.com', '082230881021');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
`id_alumni` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `tahun_lulus` varchar(40) NOT NULL,
  `gelar` varchar(50) NOT NULL,
  `cumlaude` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_anggota`, `tahun_lulus`, `gelar`, `cumlaude`) VALUES
(7, 13, '2010', 'Sarjana Komputer (S.kom).', 'cumlaude'),
(8, 14, '2016', 'Sarjana Perikanan', 'cumlaude'),
(9, 15, '2015', 'Sarjana Teknik', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
`id_anggota` int(5) NOT NULL,
  `no_anggota` varchar(30) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `alamat_kelurahan` varchar(50) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kampus` varchar(50) NOT NULL,
  `angkatan` int(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `gambar_besar` blob NOT NULL,
  `gambar_kecil` blob NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `no_anggota`, `nama_panggilan`, `nama_lengkap`, `kota_asal`, `alamat_kelurahan`, `wilayah`, `email`, `tlp`, `jurusan`, `kampus`, `angkatan`, `agama`, `gambar_besar`, `gambar_kecil`, `status`) VALUES
(13, '2012.IT.IKMSR.01.1', 'Noval', 'Novalius Nauw', 'sorong', '<p>nginden jangkungan surabaya no.10</p>', '', 'novalsmith69@gmail.com', '082230881021', 'Teknik Informatika', 'unitomo', 2012, 'kristen', 0x70726f66696c732e6a7067, 0x70726f66696c732e6a7067, 'aktif'),
(14, '2011.IT.IKMSR.01.13', 'Yoab', 'Yoab Naa', 'sorong', '<p>jl. klampis ngasem surabaya</p>', '', 'yopydae@gmail.com', '099854754745', 'Perikanan', 'unitomo', 2011, 'islam', 0x31313934393438395f3530303932333638363733333034385f313234373737333136363537363039313831395f6e2e6a7067, 0x31313934393438395f3530303932333638363733333034385f313234373737333136363537363039313831395f6e2e6a7067, 'aktif'),
(15, '2013.IT.IKMSR.01.14', 'Aris', 'Aristoteles Duwit', 'sorong', '<p> gyujgityuityuiiiiiiiiiiii</p>', '', 'artisduwith@gmail.com', '081248431445', 'Teknik Arsitektur', 'untag', 2013, 'kristen', 0x7468756d626e61696c2d342e6a7067, 0x7468756d626e61696c2d342e6a7067, 'aktif'),
(16, '2013.IT.IKMSR.01.15', 'Okto Kambu', 'Oktofianus Kambu', 'sorong', '<p>jln semolowaru</p>', '', 'oktokambu@gmail.com', '9872985798375', 'Teknik Sipil', 'itats', 2013, 'kristen', 0x616e64726f69642e6a7067, 0x616e64726f69642e6a7067, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE IF NOT EXISTS `arsip_surat` (
`id_arsip` int(5) NOT NULL,
  `judul_surat` varchar(100) NOT NULL,
  `url_file_surat` text NOT NULL,
  `keterangan` text NOT NULL,
  `status_surat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`id_arsip`, `judul_surat`, `url_file_surat`, `keterangan`, `status_surat`) VALUES
(0, 'Peminjaman Tempat Natal 2015 Untag', 'https://docs.google.com/document/d/1iqW3ix85U3LmCPL3YsfPSHB4z-G9-FP2FEUARMCvmWQ/edit', '<p>Peminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 UntagPeminjaman Tempat Natal 2015 Untag</p>', 'surat_keluar');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`idberita` int(5) NOT NULL,
  `waktu` varchar(35) NOT NULL,
  `idkategori` int(5) NOT NULL,
  `judulberita` varchar(255) NOT NULL,
  `isiberita` text NOT NULL,
  `gambar_besar` varchar(150) NOT NULL,
  `gambar_kecil` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `waktu`, `idkategori`, `judulberita`, `isiberita`, `gambar_besar`, `gambar_kecil`, `status`) VALUES
(99, 'Sabtu 05 September 2015', 55, 'Database Mastering dengan Mysql 5', '<p>Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5Database Mastering dengan Mysql 5</p>', 'programer2.jpg', 'programer2.jpg', 'publish'),
(101, 'Kamis 17 September 2015', 54, 'jyguyg', '<p>ytguyguyuyguyguygugyugyug</p>', '3x4.jpg', '3x4.jpg', 'publish'),
(102, 'Senin 12 Oktober 2015', 56, 'Video Call dengan HTML5 css3', '<p>Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3Video Call dengan HTML5 css3</p>', '2.jpg', '2.jpg', 'pending'),
(104, 'Selasa 13 Oktober 2015', 55, 'Tabel', '<p>ffffffffffffffffffffffffffffffffffffffffffff</p>', 'b612-2015-08-12-15-40-10-1.jpg', 'b612-2015-08-12-15-40-10-1.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_anggota`
--

CREATE TABLE IF NOT EXISTS `kartu_anggota` (
`id_kartu` int(5) NOT NULL,
  `masa_berlaku` varchar(30) NOT NULL,
  `walpaper` blob NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kartu_anggota`
--

INSERT INTO `kartu_anggota` (`id_kartu`, `masa_berlaku`, `walpaper`, `status`) VALUES
(7, '3', 0x696b6d6173732e6a7067, 'aktif'),
(8, '2', 0x6e6f76616c5f31332e676966, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`idkategori` int(5) NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(53, 'Penyambutan Maba'),
(54, 'Kegiatan Rutin'),
(55, 'Prestasi Anggota'),
(56, 'Wisudah');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_berita`
--

CREATE TABLE IF NOT EXISTS `komentar_berita` (
`idkomentar_berita` int(5) NOT NULL,
  `idberita` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isikomentar` text NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
 ADD PRIMARY KEY (`id_alumni`), ADD KEY `id_anggota` (`id_anggota`), ADD KEY `id_anggota_2` (`id_anggota`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
 ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`idberita`), ADD KEY `idkategori` (`idkategori`);

--
-- Indexes for table `kartu_anggota`
--
ALTER TABLE `kartu_anggota`
 ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
 ADD PRIMARY KEY (`idkomentar_berita`), ADD KEY `idberita` (`idberita`), ADD KEY `idberita_2` (`idberita`), ADD KEY `idberita_3` (`idberita`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `idadmin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
MODIFY `id_alumni` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
MODIFY `id_arsip` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `idberita` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `kartu_anggota`
--
ALTER TABLE `kartu_anggota`
MODIFY `id_kartu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `idkategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
MODIFY `idkomentar_berita` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
ADD CONSTRAINT `anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
ADD CONSTRAINT `berriiitasss` FOREIGN KEY (`idberita`) REFERENCES `berita` (`idberita`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
