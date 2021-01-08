-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 04:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infreelancer`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getFreelancer` ()  NO SQL
SELECT COUNT(*) FROM freelancer$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUser` ()  NO SQL
SELECT * FROM user$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `plaporan` (IN `nodep` INT)  BEGIN
DECLARE no INT DEFAULT 0;
DECLARE vnama VARCHAR(46) DEFAULT '';
DECLARE vnama_perusahaan VARCHAR(25) DEFAULT '';
DECLARE vlokasi VARCHAR(25) DEFAULT '';
DECLARE vkota VARCHAR(25) DEFAULT '';
DECLARE vlevel VARCHAR(25) DEFAULT '';
DECLARE vemail VARCHAR(25) DEFAULT '';
DECLARE vfrole VARCHAR(15) DEFAULT '';
DECLARE medali VARCHAR(15) DEFAULT '';
DECLARE hasil TEXT DEFAULT '';
DECLARE selesai INT DEFAULT 0;
DECLARE i CURSOR FOR 
SELECT Nama,frole(role_id) FROM user WHERE id=nodep ;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET selesai = 1;
SELECT Nama ,nama_perusahaan , kota, Email
FROM perusahaan JOIN user USING(id) WHERE id=nodep INTO vnama, vnama_perusahaan, vlokasi, vemail;
SET hasil = CONCAT(hasil,'\nNomor Perusahaan: ', 
nodep,'\nNama Perusahaan: ',vnama_perusahaan, 
'\nLokasi: ',vlokasi,'\n','\nEmail: ',vemail,'\n');

SET hasil = CONCAT(hasil,
'------------------------------------------------------------------------------------------------------------------\n',
RPAD('No',3,' '),
RPAD('NIK',5,' '),
RPAD('Nama',45,' '),
RPAD('kategori',15,' '),
RPAD('Medali',15,' '),'\n',
'------------------------------------------------------------------------------------------------------------------\n');
OPEN i;
REPEAT IF selesai = 0 THEN
FETCH i INTO  vnama, vfrole;
END IF;
CALL pmedali(nodep,medali);
SET no=no+1;
SET hasil = CONCAT(hasil,'\n',
RPAD(no,3,' '),
RPAD(nodep,5,' '),
RPAD(vnama,45,' '),
RPAD(vfrole,15,' '),
RPAD(medali,15,' '),'\n');
UNTIL selesai = 1 END REPEAT;
CLOSE i;
SELECT hasil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `plowongan` (IN `nodep` INT)  BEGIN
DECLARE no INT DEFAULT 0;
DECLARE sname VARCHAR(46) DEFAULT '';
DECLARE snama_perusahaan VARCHAR(25) DEFAULT '';
DECLARE sjudul VARCHAR(55) DEFAULT '';
DECLARE smedali VARCHAR(15) DEFAULT '';
DECLARE shasil TEXT DEFAULT '';
DECLARE selsai INT DEFAULT 0;
DECLARE i CURSOR FOR 
SELECT id_freelancer,nama_lengkap  FROM freelancer WHERE id_freelancer=nodep;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET selsai = 1;
SELECT nama_lengkap ,judul , nama_perusahaan 
FROM freelancer JOIN buat_lowongan USING(id_freelancer) WHERE id_freelancer=nodep INTO sname, sjudul, snama_perusahaan;
SET shasil = CONCAT(shasil,'\nNama Freelancer: ', 
sname,'\nNama lowongan: ',sjudul, 
'\nDari Perusahaan: ',snama_perusahaan,'\n');

SET shasil = CONCAT(shasil,
'------------------------------------------------------------------------------------------------------------------\n',
RPAD('No',3,' '),
RPAD('NIK',5,' '),
RPAD('Nama',45,' '),
RPAD('Nama Lowongan',55,' '),
RPAD('Jenis',15,' '),
'------------------------------------------------------------------------------------------------------------------\n');
OPEN i;
REPEAT IF selsai = 0 THEN
FETCH i INTO sname,sjudul;
END IF;
CALL pmedali(nodep,smedali);
SET no=no+1;
SET shasil = CONCAT(shasil,'\n',
RPAD(no,3,' '),
RPAD(nodep,5,' '),
RPAD(sname,46,' '),
RPAD(sjudul,55,' '),
RPAD(smedali,15,' '),'\n');
UNTIL selsai = 1 END REPEAT;
CLOSE i;
SELECT shasil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pmedali` (IN `level` INT, OUT `medali` VARCHAR(30))  BEGIN
IF level = 1 THEN
SET medali = 'Admin';
SELECT CONCAT('level : ', level,' Jenis : ',medali) AS 'Keterangan';
ELSEIF level = 2 THEN
SET medali = 'Premium';
SELECT CONCAT('level : ', level,' Jenis : ',medali) AS 'Keterangan';
ELSEIF level = 3 THEN
SET medali = 'Golden';
ELSE
SET medali = 'Tidak diketahui';
SELECT CONCAT('level : ', level,' Jenis : ',medali) AS 'Keterangan';
END IF;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `frole` (`lama` INT) RETURNS VARCHAR(15) CHARSET latin1 BEGIN
DECLARE level VARCHAR(15);
IF lama = 1 THEN
SET level = 'Admin';
ELSEIF lama = 2 THEN
SET level = 'Freelancer';
ELSE
SET level = 'Perusahaan';
END if;
RETURN(level);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_freelancer`
--

CREATE TABLE `audit_freelancer` (
  `id_freelancer` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `gol_darah` varchar(11) NOT NULL,
  `kewarganegaraan` varchar(11) NOT NULL,
  `sd` varchar(15) NOT NULL,
  `smp` varchar(15) NOT NULL,
  `sma` varchar(15) NOT NULL,
  `universitas` varchar(15) NOT NULL,
  `date_created` date NOT NULL,
  `aksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_freelancer`
--

INSERT INTO `audit_freelancer` (`id_freelancer`, `nama_lengkap`, `tgl_lahir`, `no_telp`, `jenis_kelamin`, `agama`, `status`, `tinggi`, `berat`, `gol_darah`, `kewarganegaraan`, `sd`, `smp`, `sma`, `universitas`, `date_created`, `aksi`) VALUES
(1, '0', '1999-08-12', 838236979, '0', '0', '0', 170, 56, '0', '0', '0', '0', '0', '0', '0000-00-00', '0'),
(1, 'Ahmed Sumaya', '1999-08-12', 838236979, 'Laki-Laki', 'Islam', 'Belum Kawin', 170, 56, 'B', 'WNI', 'SD Tadika MESRA', 'SMP N Kapitalis', 'SMA N Korporat', 'Harapan Dunia', '2020-04-27', 'Update'),
(1, 'Ahmed Sumaya', '1999-08-12', 838236979, 'Laki-Laki', 'Islam', 'Belum Kawin', 170, 56, 'B', 'WNI', 'SD Tadika MESRA', 'SMP N Kapitalis', 'SMA N Korporat', 'Harapan Dunia', '2020-04-27', 'Update'),
(1, 'Ahmed Sumaya', '1999-08-12', 838236979, 'Laki-Laki', 'Islam', 'Belum Kawin', 170, 56, 'B', 'WNI', 'SD Tadika MESRA', 'SMP N Kapitalis', 'SMA N Korporat', 'Harapan Dunia', '2020-04-27', 'Update'),
(1, 'Ahmed Sumaya', '1999-08-13', 838236979, 'Laki-Laki', 'Islam', 'Belum Kawin', 170, 56, 'B', 'WNI', 'SD Tadika MESRA', 'SMP N Kapitalis', 'SMA N Korporat', 'Harapan Dunia', '2020-04-27', 'Update'),
(4, 'GANESHA', '1992-04-02', 823654789, 'PEREMPUAN', 'Budha', 'Belum kawin', 181, 75, 'AB', 'WNI', 'SD RIANG', 'SMP RIANG PERTA', 'SMA RIANG ATAS', 'UNIVERSITAS SIA', '2020-04-27', 'Deleted'),
(7, 'Rohani', '1980-04-02', 54615238, 'Perempuan', 'Islam', 'Kawin', 150, 50, 'AB', 'WNI', 'sd 1', 'smp 1', 'sma 1 ', 'UI', '2020-04-27', 'Insert'),
(4, 'Rohani', '1980-04-02', 54615238, 'Perempuan', 'Islam', 'Kawin', 150, 50, 'AB', 'WNI', 'sd 1', 'smp 1', 'sma 1 ', 'UI', '2020-04-27', 'Update'),
(8, 'fayakun', '1997-04-03', 789455522, 'Laki-Laki', 'Islam', 'Kawin', 175, 59, 'A', 'WNI', 'SD 3', 'SMP 3', 'SMA MDA', '-', '2020-04-27', 'Insert'),
(9, 'Asmaul', '1995-04-17', 82665447, 'Laki-Laki', 'Islam', 'Belum Kawin', 145, 52, 'O', 'WNI', 'SD 2', 'SMP DA', 'MTS', '-', '2020-04-27', 'Insert'),
(5, 'fayakun', '1997-04-03', 789455522, 'Laki-Laki', 'Islam', 'Kawin', 175, 59, 'A', 'WNI', 'SD 3', 'SMP 3', 'SMA MDA', '-', '2020-04-27', 'Update'),
(6, 'Asmaul', '1995-04-17', 82665447, 'Laki-Laki', 'Islam', 'Belum Kawin', 145, 52, 'O', 'WNI', 'SD 2', 'SMP DA', 'MTS', '-', '2020-04-27', 'Update'),
(5, 'fayakun Iksan', '1997-04-03', 789455522, 'Laki-Laki', 'Islam', 'Belum Kawin', 175, 59, 'A', 'WNA', 'SD 3', 'SMP 3', 'SMA MDA', '-', '2020-04-27', 'Update'),
(2, 'Setiadi Riyanto', '1998-10-23', 897845787, 'Laki - Laki', 'Islam', 'Kawin', 180, 59, 'A', 'WNI', 'SD SIBORONG BOR', 'SMP N KAPITALIS', 'SMA N KORPORAT', 'MASYARAKAT BORJ', '2020-05-06', 'Update'),
(3, 'Atoy siregar', '1990-04-01', 821578987, 'Laki - laki', 'Kristen', 'Kawin', 178, 67, 'O', 'WNI', 'SD Suka Suka', 'SMP HURA HURA', 'SMA ENJOYING', 'UNOVERSITAS PRO', '2020-05-06', 'Update'),
(4, 'Rohani', '1980-04-02', 54615238, 'Perempuan', 'Islam', 'Kawin', 150, 50, 'AB', 'WNI', 'sd 1', 'smp 1', 'sma 1 ', 'UI', '2020-05-06', 'Update'),
(5, 'fayakun Iksan', '1997-04-03', 789455522, 'Laki-Laki', 'Islam', 'Belum Kawin', 175, 59, 'A', 'WNA', 'SD 3', 'SMP 3', 'SMA MDA', '-', '2020-05-06', 'Update'),
(6, 'Asmaul', '1995-04-17', 82665447, 'Laki-Laki', 'Islam', 'Belum Kawin', 145, 52, 'O', 'WNI', 'SD 2', 'SMP DA', 'MTS', '-', '2020-05-06', 'Update');

-- --------------------------------------------------------

--
-- Table structure for table `audit_lowongan`
--

CREATE TABLE `audit_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_freelancer` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `Nama_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_userr`
--

CREATE TABLE `audit_userr` (
  `id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `aksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_userr`
--

INSERT INTO `audit_userr` (`id`, `Nama`, `Email`, `password`, `role_id`, `date_created`, `aksi`) VALUES
(1, 'Slamet Setiadi riyanto', 'slamet@gmail.com', '1234', 0, '2020-04-27', 'update'),
(2, 'Ahmed Sumail', 'dotaimba@gmail.com', '1234', 0, '2020-04-27', 'update'),
(3, 'Bakoye Group', 'bakoye@gmail.com', '1234', 0, '2020-04-27', 'update'),
(4, 'Setiadi', 'setiadi@gmail.com', '1234', 0, '2020-04-27', 'update'),
(5, 'BAKOYEY', 'bak@gmail.com', '1234', 0, '2020-04-27', 'update'),
(6, 'Haryanto', 'yanto@gmail.com', '1234', 0, '2020-04-27', 'update'),
(8, 'ato', 'ato@gmail.com', '1234', 0, '2020-04-27', 'update'),
(9, 'atoy', 'atoy@gmail.com', '1234', 0, '2020-04-27', 'update'),
(14, 'BAKOYEY', 'bak@gmail.com', '1234', 0, '2020-04-21', 'update'),
(15, 'Haryanto', 'yanto@gmail.com', '1234', 0, '2020-04-21', 'update'),
(17, 'ato', 'ato@gmail.com', '1234', 3, '2020-04-21', 'update'),
(18, 'ato', 'ato@gmail.com', '1234', 0, '2020-04-21', 'update'),
(19, 'atoy', 'atoy@gmail.com', '1234', 0, '2020-04-21', 'update'),
(20, 'anton', 'anton@gmail.com', '1234', 0, '2020-04-21', 'update'),
(27, 'lana', 'lana@gmail.com', '1234', 0, '2020-04-21', 'insert'),
(30, 'Ganesha', 'ganes@gmail.com', '1234', 2, '2020-04-27', 'insert'),
(31, 'Lil Ken', 'ken@gmail.com', '1234', 2, '2020-04-27', 'insert'),
(32, 'slamet riyanto', 'slametsss@gmail.com', '1234', 2, '2020-04-27', 'insert'),
(33, 'Fayakun', 'Fayakun@gmail.com', '1234', 2, '2020-04-27', 'insert'),
(34, 'Asmaul', 'maul@gmail.com', '4321', 2, '2020-04-27', 'insert'),
(35, 'WIKA', 'wika1@gmail.com', '12345', 3, '2020-04-27', 'insert'),
(36, 'PT.AAA ', 'AAA23@gmail.com', '5432', 3, '2020-04-27', 'insert'),
(37, 'Setiadi Rianto', 'SR@gmail.com', '23455', 2, '2020-04-27', 'insert'),
(38, 'Medco Energi', 'Medco@gmail.com', '1234', 3, '2020-04-27', 'insert');

-- --------------------------------------------------------

--
-- Table structure for table `buat_lowongan`
--

CREATE TABLE `buat_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_freelancer` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `bidang_pekerjaan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buat_lowongan`
--

INSERT INTO `buat_lowongan` (`id_lowongan`, `id_perusahaan`, `id_freelancer`, `nama_perusahaan`, `judul`, `kota`, `provinsi`, `alamat`, `bidang_pekerjaan`, `deskripsi`, `persyaratan`, `gaji`) VALUES
(1, 1, 1, 'Bakoye Group', 'Konsultan IT', 'Bandung', 'Jawa Barat', 'Jl. Dago', 'Programmer', 'dibutuhkan segera miinimal 3 bahasa pemrograman, dibidang IT', 'Minimal D3/S1 Jurusan IT', 5000000),
(2, 0, 3, 'Bakoye Group', 'System Analyst', 'Jakarta Pusat', 'DKI Jakarta', 'Deket Bunderan HI', 'Database analisis', 'berpengalaman didunia basisdata atau database', 'Minimal S1 dan paham Bahasa Oracle ataupun SQL', 7500000),
(3, 3, 4, 'Pertamina', 'Dibutuhkan Sopir', 'Cepu', 'Jawa Tengah', 'Cepu', 'Sopir Mobil ', 'Dibutuhkan sopir berpengalaman, mampu mengendarai berbagai mobil', 'minimal lulus SIM B1 Umum', 4500000);

--
-- Triggers `buat_lowongan`
--
DELIMITER $$
CREATE TRIGGER `after_insert_lowongan` AFTER INSERT ON `buat_lowongan` FOR EACH ROW INSERT INTO `audit_lowongan`
VALUES (NEW.id_lowongan,
        NEW.id_perusahaan,
        NEW.id_freelancer,
        NEW.judul,
        NEW.Nama_perusahaan,
        NOW(),
        'Insert')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_lowongan` AFTER UPDATE ON `buat_lowongan` FOR EACH ROW INSERT INTO `audit_lowongan`
VALUES (NEW.id_lowongan,
        NEW.id_perusahaan,
        NEW.id_freelancer,
        NEW.judul,
        NEW.Nama_perusahaan,
        NOW(),
        'Updated')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `id_freelancer` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kota_kel` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` int(12) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `sd` varchar(255) NOT NULL,
  `smp` varchar(255) NOT NULL,
  `sma` varchar(255) NOT NULL,
  `universitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`id_freelancer`, `id`, `nama_lengkap`, `kota_kel`, `tgl_lahir`, `no_telp`, `jenis_kelamin`, `agama`, `status`, `tinggi`, `berat`, `gol_darah`, `kewarganegaraan`, `sd`, `smp`, `sma`, `universitas`) VALUES
(1, 2, 'Ahmed Sumaya', 'jakarta', '1999-08-13', 838236979, 'Laki-Laki', 'Islam', 'Belum Kawin', 170, 56, 'B', 'WNI', 'SD Tadika MESRA', 'SMP N Kapitalisme', 'SMA N Korporat', 'Harapan Dunia'),
(2, 3, 'Setiadi Riyanto', 'Jakarta', '1998-10-23', 897845787, 'Laki - Laki', 'Islam', 'Kawin', 180, 59, 'A', 'WNI', 'SD SIBORONG BORONG', 'SMP N KAPITALISME', 'SMA N KORPORAT', 'MASYARAKAT BORJOUIS'),
(3, 4, 'Atoy siregar', 'Medan', '1990-04-01', 821578987, 'Laki - laki', 'Kristen', 'Kawin', 178, 67, 'O', 'WNI', 'SD Suka Suka', 'SMP HURA HURA', 'SMA ENJOYING', 'UNOVERSITAS PRO RAKYAT'),
(4, 5, 'Rohani', 'Depok', '1980-04-02', 54615238, 'Perempuan', 'Islam', 'Kawin', 150, 50, 'AB', 'WNI', 'sd 1', 'smp 1', 'sma 1 ', 'UI'),
(5, 6, 'fayakun Iksan', 'Indramayu', '1997-04-03', 789455522, 'Laki-Laki', 'Islam', 'Belum Kawin', 175, 59, 'A', 'WNA', 'SD 3', 'SMP 3', 'SMA MDA', '-'),
(6, 7, 'Asmaul', 'Kediri', '1995-04-17', 82665447, 'Laki-Laki', 'Islam', 'Belum Kawin', 145, 52, 'O', 'WNI', 'SD 2', 'SMP DA', 'MTS', '-');

--
-- Triggers `freelancer`
--
DELIMITER $$
CREATE TRIGGER `after_delete_freelancer` AFTER DELETE ON `freelancer` FOR EACH ROW INSERT INTO `audit_freelancer`
VALUES (OLD.id_freelancer,
        OLD.nama_lengkap,
        OLD.tgl_lahir,
        OLD.no_telp,
        OLD.jenis_kelamin,
        OLD.agama,
        OLD.status,
        OLD.tinggi,
        OLD.berat,
        OLD.gol_darah,
        OLD.kewarganegaraan,
        OLD.sd,
        OLD.smp,
        OLD.sma,
        OLD.universitas,
        NOW(),
        'Deleted')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_freelancer` AFTER INSERT ON `freelancer` FOR EACH ROW INSERT INTO `audit_freelancer`
VALUES (NEW.id_freelancer,
        NEW.nama_lengkap,
        NEW.tgl_lahir,
        NEW.no_telp,
        NEW.jenis_kelamin,
        NEW.agama,
        NEW.status,
        NEW.tinggi,
        NEW.berat,
        NEW.gol_darah,
        NEW.kewarganegaraan,
        NEW.sd,
        NEW.smp,
        NEW.sma,
        NEW.universitas,
        NOW(),
        'Insert')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_freelancer` AFTER UPDATE ON `freelancer` FOR EACH ROW INSERT INTO `audit_freelancer`
VALUES (NEW.id_freelancer,
        NEW.nama_lengkap,
        NEW.tgl_lahir,
        NEW.no_telp,
        NEW.jenis_kelamin,
        NEW.agama,
        NEW.status,
        NEW.tinggi,
        NEW.berat,
        NEW.gol_darah,
        NEW.kewarganegaraan,
        NEW.sd,
        NEW.smp,
        NEW.sma,
        NEW.universitas,
        NOW(),
        'Update')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `bidang_perusahaan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `id`, `nama_perusahaan`, `bidang_perusahaan`, `kota`, `provinsi`, `alamat`, `deskripsi`) VALUES
(1, 1, 'Bakoye Group', 'Konsultan IT', 'Indramayu', 'Jawa Barat', 'Jl.letnan Joni Gg.Sinar No 295', 'Sebuah perusahaan berbasis IT, berjalan dalam dunia web'),
(2, 2, 'ProgIt', 'KonsultanIT', 'Serang', 'Banten', 'Serang', 'Perusahaan IT dibidang jasa pembuatan Web'),
(3, 3, 'Pertamina', 'MInyak Bumi', 'Cepu', 'Jawa TEngah', 'Cepu', 'Perusahaan dibidang pengeboran minyak bumi'),
(4, 4, 'WIKA', 'Proyek Pembanguanan', 'Jakarta', 'DKI Jakarta', 'Menteng', 'Perusahaan dibidang Proyek Jalan'),
(5, 5, 'Pt. AAA', 'Farmasi', 'Cianjur', 'Jawa Barat', 'Cianjur kota', 'Perusahaan yang berdiri dari tahun 1805');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Nama`, `Email`, `password`, `image`, `is_active`, `role_id`, `date_created`) VALUES
(1, 'Slamet Setiadi riyanto', 'slamet@gmail.com', '1234', 'profil.png', 1, 1, '2020-04-21'),
(2, 'Ahmed Sumail', 'dotaimba@gmail.com', '1234', 'default.jpg', 1, 2, '0000-00-00'),
(3, 'Bakoye Group', 'bakoye@gmail.com', '1234', 'default.jpg', 1, 3, '0000-00-00'),
(4, 'Setiadi', 'setiadi@gmail.com', '1234', 'Profil.png', 1, 2, '2020-04-14'),
(5, 'BAKOYEY', 'bak@gmail.com', '1234', 'profil.png', 1, 3, '2020-04-21'),
(6, 'Haryanto', 'yanto@gmail.com', '1234', 'profil.png', 1, 3, '2020-04-21'),
(8, 'ato', 'ato@gmail.com', '1234', 'profil.png', 1, 3, '2020-04-21'),
(9, 'atoy', 'atoy@gmail.com', '1234', 'Profil', 1, 2, '2020-04-20'),
(17, 'Billy', 'ato@gmail.com', '1234', 'profil.png', 1, 0, '2020-04-21'),
(20, 'Lestari Saja', 'anton@gmail.com', '1234', 'Profil', 1, 0, '2020-04-20'),
(27, 'lana', 'lana@gmail.com', '1234', 'profil', 1, 0, '2020-04-20'),
(30, 'Ganesha', 'ganes@gmail.com', '1234', 'profile.jpg', 1, 2, '2020-04-21'),
(31, 'Lil Ken', 'ken@gmail.com', '1234', 'profile.jav', 1, 2, '2020-04-21'),
(32, 'slamet riyanto', 'slametsss@gmail.com', '1234', 'profile.jpg', 1, 2, '2020-04-27'),
(33, 'Fayakun', 'Fayakun@gmail.com', '1234', 'Profile', 1, 2, '2020-04-26'),
(34, 'Asmaul', 'maul@gmail.com', '4321', 'Profile.jpg', 1, 2, '2020-04-26'),
(35, 'WIKA', 'wika1@gmail.com', '12345', 'profile', 1, 3, '2020-04-26'),
(36, 'PT.AAA ', 'AAA23@gmail.com', '5432', 'profile.jpg', 1, 3, '2020-04-26'),
(37, 'Setiadi Rianto', 'SR@gmail.com', '23455', 'Profile.jpg', 1, 2, '2020-04-27'),
(38, 'Medco Energi', 'Medco@gmail.com', '1234', 'Profile.jpg', 1, 3, '2020-04-26');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_userr_insert` AFTER INSERT ON `user` FOR EACH ROW BEGIN 
INSERT INTO audit_userr 
SET aksi ='insert', 
id = NEW.id, 
Nama = NEW.Nama, 
Email = NEW.Email, 
password =NEW.password, 
role_id =NEW.role_id,
date_created = NOW(); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_userr_update` AFTER UPDATE ON `user` FOR EACH ROW INSERT INTO `audit_userr`
VALUES (NEW.id,
        NEW.Nama,
        NEW.Email,
        NEW.password,
        NEW.role_id,
        NOW(),
        'update')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `audit_userr`
--
ALTER TABLE `audit_userr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buat_lowongan`
--
ALTER TABLE `buat_lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD UNIQUE KEY `id_freelancer` (`id_freelancer`),
  ADD UNIQUE KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`id_freelancer`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_userr`
--
ALTER TABLE `audit_userr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `buat_lowongan`
--
ALTER TABLE `buat_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `id_freelancer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
