-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 05:44 PM
-- Server version: 10.1.28-MariaDB
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
-- Database: `trpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Analisa Sistem'),
(2, 'Desain Sistem'),
(3, 'Desain UI'),
(4, 'C++'),
(5, 'C'),
(6, 'Java'),
(7, 'Php'),
(8, 'HTML'),
(9, 'Javascript'),
(10, 'Python'),
(11, 'Visual Basic'),
(12, 'Pascal'),
(13, 'C#'),
(14, 'Artificial Intelligence'),
(15, 'Database'),
(16, 'Flash');

-- --------------------------------------------------------

--
-- Stand-in structure for view `deadlinetracker`
-- (See below for the actual view)
--
CREATE TABLE `deadlinetracker` (
`Username` varchar(16)
,`ProjectID` int(11)
,`TaskName` varchar(30)
,`TaskDueDate` date
,`Today` date
,`TaskStatus` tinyint(255)
,`UserID` int(11)
,`TaskID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expID` int(11) UNSIGNED NOT NULL,
  `expProjectID` int(11) NOT NULL,
  `expOwner` int(11) NOT NULL,
  `expType` enum('Konsumsi','Transportasi','Komunikasi') NOT NULL,
  `expNominal` int(255) NOT NULL,
  `expProof` varchar(75) NOT NULL COMMENT 'sha256 = 64 karakter, sisanya jaga2 buat format',
  `expStatus` enum('Lunas','Disetujui/Belum Lunas','Belum Diperiksa') NOT NULL DEFAULT 'Belum Diperiksa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expID`, `expProjectID`, `expOwner`, `expType`, `expNominal`, `expProof`, `expStatus`) VALUES
(1, 1, 3, 'Transportasi', 5000, 'bukti.jpg', 'Belum Diperiksa'),
(2, 1, 4, 'Konsumsi', 5000, '', 'Belum Diperiksa'),
(3, 1, 3, 'Konsumsi', 6000, '79a96ac97d700addf6112e0e18826185e0ff2cbbfde940fb674adab7afd853d6.jpg', 'Belum Diperiksa'),
(4, 1, 3, 'Konsumsi', 6000, '79a96ac97d700addf6112e0e18826185e0ff2cbbfde940fb674adab7afd853d6.jpg', 'Belum Diperiksa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `expenseview`
-- (See below for the actual view)
--
CREATE TABLE `expenseview` (
`expID` int(11) unsigned
,`expType` enum('Konsumsi','Transportasi','Komunikasi')
,`expNominal` int(255)
,`expProof` varchar(75)
,`expStatus` enum('Lunas','Disetujui/Belum Lunas','Belum Diperiksa')
,`expProject` varchar(50)
,`expOwner` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `overdueprojectview`
-- (See below for the actual view)
--
CREATE TABLE `overdueprojectview` (
`ProjectName` varchar(50)
,`Deadline` date
,`Today` date
,`PastDays` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `overduetaskview`
-- (See below for the actual view)
--
CREATE TABLE `overduetaskview` (
`TaskAuthor` varchar(16)
,`ProjectName` varchar(50)
,`TaskName` varchar(30)
,`TaskDueDate` date
,`Today` date
,`PastDays` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `penaltyview`
-- (See below for the actual view)
--
CREATE TABLE `penaltyview` (
`Username` varchar(16)
,`Today` date
,`TaskName` varchar(30)
,`TaskDueDate` date
,`PastDays` int(7)
,`TaskStatus` tinyint(255)
,`ProjectName` varchar(50)
,`UserID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `projectcategory`
--

CREATE TABLE `projectcategory` (
  `ProjectID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectcategory`
--

INSERT INTO `projectcategory` (`ProjectID`, `CategoryID`) VALUES
(21, 1),
(21, 3),
(22, 4),
(22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ProjectID` int(11) UNSIGNED NOT NULL,
  `ClientMail` varchar(256) NOT NULL,
  `ProjectName` varchar(50) NOT NULL,
  `Proposal` varchar(50) NOT NULL,
  `Deadline` date NOT NULL,
  `Deal` tinyint(4) NOT NULL DEFAULT '0',
  `Complete` tinyint(4) NOT NULL DEFAULT '0',
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectID`, `ClientMail`, `ProjectName`, `Proposal`, `Deadline`, `Deal`, `Complete`, `Price`) VALUES
(1, 'example@email.com', 'Dummy Proyek', 'Dummy_Proyek.pdf', '2017-12-07', 0, 0, NULL),
(2, 'example2@email.com', 'Dummy Proyek2', 'belumadalagi.pdf', '2017-10-14', 0, 0, NULL),
(3, 'contoh@email.com', 'Proyek Negara', 'belumbikinfungsiupload.pdf', '2017-11-01', 1, 0, NULL),
(5, 'hapuskanlah@gmail.com', 'Proyek Jembatan', 'belumada.pdf', '2017-10-25', 0, 0, NULL),
(6, 'emon@mone.id', 'Forrtnite', 'lom_ada.pdf', '2017-10-31', 0, 0, NULL),
(7, 'file@mail.com', 'Tes File', 'sakdik.png', '2017-11-03', 0, 0, NULL),
(8, 'dwakurniawan@gmail.com', 'Nama Proyek', 'Nama_Proyek.pdf', '2017-11-03', 0, 0, NULL),
(9, 'bxmailo@gmail.com', 'Testing', 'Testing.pdf', '2017-11-23', 0, 0, NULL),
(12, 'tes@mail.co.id', 'Project ', 'Project_.pdf', '2017-11-30', 0, 0, NULL),
(13, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(14, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(15, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(16, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(17, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(18, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(19, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(20, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-11-23', 0, 0, NULL),
(21, 'bxmailo@gmail.com', 'dsad', 'dsad.pdf', '2017-12-01', 0, 0, NULL),
(22, 'bxmailo@gmail.com', 'dsadad', 'dsadad.pdf', '2017-11-23', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(11) UNSIGNED NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `TaskName` varchar(30) NOT NULL,
  `TaskDesc` text,
  `TaskDueDate` date NOT NULL,
  `TaskAuthor` int(11) NOT NULL,
  `TaskStatus` tinyint(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `ProjectID`, `TaskName`, `TaskDesc`, `TaskDueDate`, `TaskAuthor`, `TaskStatus`) VALUES
(1, 1, 'Artificial Intelligence', 'Kecerdasan Buatan atau kecerdasan yang ditambahkan kepada suatu sistem yang bisa diatur dalam konteks ilmiah atau Intelegensi Artifisial atau Artificial Intelligence (AI) didefinisikan sebagai kecerdasan entitas ilmiah. Sistem seperti ini umumnya dianggap komputer. Kecerdasan diciptakan dan dimasukkan ke dalam suatu mesin (komputer) agar dapat melakukan pekerjaan seperti yang dapat dilakukan manusia. Beberapa macam bidang yang menggunakan kecerdasan buatan antara lain sistem pakar, permainan komputer (games), logika fuzzy, jaringan syaraf tiruan dan robotika.', '2017-10-24', 3, 0),
(2, 1, 'Robotika', 'Robotika adalah satu cabang teknologi yang berhubungan dengan desain, konstruksi, operasi, disposisi struktural, pembuatan, dan aplikasi dari robot.Robotika terkait dengan ilmu pengetahuan bidang elektronika, mesin, mekanika, dan perangkat lunak komputer.', '2017-10-31', 3, 1),
(3, 2, 'Sistem Informasi Manajemen', 'Sistem informasi manajemen atau SIM (management information system) adalah sistem perencanaan bagian dari pengendalian internal suatu bisnis yang meliputi pemanfaatan manusia, dokumen, teknologi, dan prosedur oleh akuntansi manajemen untuk memecahkan masalah bisnis seperti biaya produk, layanan, atau suatu strategi bisnis. Sistem informasi manajemen dibedakan dengan sistem informasi biasa karena SIM digunakan untuk menganalisis sistem informasi lain yang diterapkan pada aktivitas operasional organisasi. Secara akademis, istilah ini umumnya digunakan untuk merujuk pada kelompok metode manajemen informasi yang bertalian dengan otomasi atau dukungan terhadap pengambilan keputusan manusia, misalnya sistem pendukung keputusan, sistem pakar, dan sistem informasi eksekutif.', '2017-10-27', 3, 0),
(4, 2, 'Sistem Informasi Akuntansi', 'istem Informasi Akuntansi (SIA) adalah sebuah sistem informasi yang menangani segala sesuatu yang berkenaan dengan Akuntansi. Akuntansi sendiri sebenarnya adalah sebuah sistem informasi.fungsinya Mengumpulkan dan menyimpan data tentang aktivitas dan transaksi,Memproses data menjadi informasi yang dapat digunakan dalam proses pengambilan keputusan,Melakukan kontrol secara tepat terhadap aset organisasi.', '2017-10-28', 3, 0),
(5, 3, 'Sistem Pendukung Keputusan', 'Sistem pendukung keputusan atau decision support systems disingkat (DSS) adalah bagian dari sistem informasi berbasis komputer (termasuk sistem berbasis pengetahuan (manajemen pengetahuan)) yang dipakai untuk mendukung pengambilan keputusan dalam suatu organisasi atau perusahaan.Dapat juga dikatakan sebagai sistem komputer yang mengolah data menjadi informasi untuk mengambil keputusan dari masalah semi-terstruktur yang spesifik.', '2017-10-29', 3, 0),
(6, 3, 'Sistem Operasi', 'Sistem operasi (operating system) adalah perangkat lunak sistem yang mengatur sumber daya dari perangkat keras dan perangkat lunak, serta sebagai jurik (daemon) untuk program komputer. Tanpa sistem operasi, pengguna tidak dapat menjalankan program aplikasi pada komputer mereka, kecuali program booting.Sistem operasi mempunyai penjadwalan yang sistematis mencakup perhitungan penggunaan memori, pemrosesan data, penyimpanan data, dan sumber daya lainnya.', '2017-10-31', 3, 0),
(7, 4, 'Algoritma', 'Algoritma adalah urutan langkah-langkah logis penyelesaian masalah yang disusun secara sistematis dan logis.Langkah-langkah dalam algoritma harus logis dan harus dapat ditentukan bernilai salah atau benar.Dalam beberapa konteks, algoritma adalah spesifikasi urutan langkah untuk melakukan pekerjaan tertentu. Pertimbangan dalam pemilihan algoritma adalah, pertama, algoritma haruslah benar. Artinya algoritma akan memberikan keluaran yang dikehendaki dari sejumlah masukan yang diberikan. Tidak peduli sebagus apapun algoritma, kalau memberikan keluaran yang salah.', '2017-10-31', 3, 0),
(8, 4, 'Rekayasa Perangkat Lunak', 'Rekayasa perangkat lunak atau software Engineering adalah satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembanganan perangkat lunak dan manajemen kualitas.Rekayasa perangkat lunak adalah pengubahan perangkat lunak itu sendiri guna mengembangkan, memelihara, dan membangun kembali dengan menggunakan prinsip reakayasa untuk menghasilkan perangkat lunak yang dapat bekerja lebih efisien dan efektif untuk pengguna.', '2017-11-01', 3, 0),
(9, 5, 'Logika Fuzzy', 'Logika Fuzzy adalah peningkatan dari logika Boolean yang berhadapan dengan konsep kebenaran sebagian. Saat logika klasik menyatakan bahwa segala hal dapat diekspresikan dalam istilah biner (0 atau 1, hitam atau putih, ya atau tidak), logika fuzzy menggantikan kebenaran boolean dengan tingkat kebenaran.', '2017-11-03', 3, 0),
(10, 5, 'Java', 'Java adalah bahasa pemrograman yang dapat dijalankan di berbagai komputer termasuk telepon genggam. Bahasa ini awalnya dibuat oleh James Gosling saat masih bergabung di Sun Microsystems saat ini merupakan bagian dari Oracle dan dirilis tahun 1995. Bahasa ini banyak mengadopsi sintaksis yang terdapat pada C dan C++ namun dengan sintaksis model objek yang lebih sederhana serta dukungan rutin-rutin aras bawah yang minimal.', '2017-11-04', 3, 0),
(11, 6, 'HTML', 'Hypertext Markup Language (HTML) adalah sebuah bahasa markah yang digunakan untuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam sebuah penjelajah web Internet dan pemformatan hiperteks sederhana yang ditulis dalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang terintegerasi. Dengan kata lain, berkas yang dibuat dalam perangkat lunak pengolah kata dan disimpan dalam format ASCII normal sehingga menjadi halaman web dengan perintah-perintah HTML.', '2017-11-05', 3, 0),
(12, 6, 'Pascal', 'Pascal adalah bahasa pemrograman yang pertama kali di buat oleh Profesor Niklaus Wirth, seorang anggota International Federation of Information Processing (IFIP) pada tahun 1971. Dengan mengambil nama dari matematikawan Perancis, Blaise Pascal, yang pertama kali menciptakan mesin penghitung, Profesor Niklaus Wirth membuat bahasa Pascal ini sebagai alat bantu untuk mengajarkan konsep pemrograman komputer kepada mahasiswanya. Selain itu, Profesor Niklaus Wirth membuat Pascal juga untuk melengkapi kekurangan-kekurangan bahasa pemrograman yang ada pada saat itu.', '2017-11-07', 3, 0),
(13, 7, 'Programmer', 'Programmer adalah Seseorang yang melakukan penulisan dan pengubahan script atau kode dari sumber sehingga dapat membentuk suatu program. Penyuntingan kode sumber meliputi proses pengetesan, analisis, pembetulan kesalahan, pengoptimasian algoritma, dan normalisasi kode.', '2017-11-09', 3, 0),
(14, 7, 'System Analyst', 'Analis sistem atau system analyst adalah seseorang yang bertanggung jawab atas penelitian, perencanaan, pengkoordinasian, dan merekomendasikan pemilihan perangkat lunak dan sistem yang paling sesuai dengan kebutuhan organisasi bisnis atau perusahaan. Analis sistem memegang peranan yang sangat penting dalam proses pengembangan sistem.Analis sistem bisa pula menjadi perantara atau penghubung antara perusahaan penjual perangkat lunak dengan organisasi tempat ia bekerja, dan bertanggung jawab atas analisis biaya pengembangan, usulan desain dan pengembangan, serta menentukan rentang waktu yang diperlukan. Analis sistem bertanggung jawab pula atas studi kelayakan atas sistem komputer sebelum membuat satu usulan kepada pihak manajemen perusahaan.', '2017-11-11', 3, 0),
(15, 1, 'SPPK', 'Membuat SPPK Fuzzy', '2017-12-09', 3, 0),
(16, 1, 'Sistem Pakar', 'Sistem Pakar CF', '2017-12-07', 3, 0),
(17, 1, 'Sistem Pakar', 'Sistem Pakar CF', '2017-12-07', 3, 0),
(18, 1, 'Sistem Pakar 2', 'Sistem Pakar CF2', '2017-12-07', 3, 0),
(19, 1, 'Datamining', 'Metode Naive Bayes', '2017-12-08', 3, 0),
(20, 1, 'Datamining 2', 'Metode ANN', '2017-11-30', 3, 0),
(21, 1, 'Artificial Intelligence 2', 'A*', '2017-11-30', 3, 0),
(22, 1, 'Desain UI', 'UInya gini', '2017-11-23', 3, 0),
(23, 1, 'ERD', 'sadasdasczx', '2017-11-22', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taskcategory`
--

CREATE TABLE `taskcategory` (
  `taskID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskcategory`
--

INSERT INTO `taskcategory` (`taskID`, `categoryID`) VALUES
(1, 1),
(1, 3),
(23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `taskcomment`
--

CREATE TABLE `taskcomment` (
  `ComID` int(11) UNSIGNED NOT NULL,
  `ComAuthor` int(11) NOT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `ComTimestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `TaskFiles` varchar(50) DEFAULT NULL,
  `TaskID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `taskcomment`
--

INSERT INTO `taskcomment` (`ComID`, `ComAuthor`, `Comment`, `ComTimestamp`, `TaskFiles`, `TaskID`) VALUES
(1, 4, 'Tes Komentar 02.', '2017-10-24 16:30:21', NULL, 1),
(2, 3, 'Tes Komentar 01.', '2017-10-24 16:30:18', NULL, 1),
(3, 3, 'Tes Komentar 3', '2017-10-24 16:30:16', NULL, 2),
(4, 3, 'Tes Komentar Input.', '2017-10-24 16:45:22', NULL, 1),
(5, 3, 'Tes Komentar input 2.', '2017-10-24 16:48:03', NULL, 1),
(11, 2, 'Hai File', '2017-10-31 16:49:55', 'Weighted_Product.pdf', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `taskcommentview`
-- (See below for the actual view)
--
CREATE TABLE `taskcommentview` (
`TaskID` int(11)
,`Comment` varchar(255)
,`ComTimestamp` timestamp
,`ComID` int(11) unsigned
,`ComAuthorID` int(11)
,`ComAuthor` varchar(16)
,`TaskFiles` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `taskview`
-- (See below for the actual view)
--
CREATE TABLE `taskview` (
`TaskID` int(11) unsigned
,`TaskName` varchar(30)
,`TaskDesc` text
,`TaskDueDate` date
,`TaskStatus` tinyint(255)
,`TaskAuthor` varchar(16)
,`ProjectName` varchar(50)
,`ProjectID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `taskworker`
--

CREATE TABLE `taskworker` (
  `TaskID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `taskworker`
--

INSERT INTO `taskworker` (`TaskID`, `UserID`) VALUES
(14, 3),
(14, 4),
(16, 3),
(17, 3),
(17, 4),
(17, 5),
(18, 3),
(18, 4),
(18, 5),
(19, 3),
(19, 4),
(19, 5),
(20, 3),
(20, 4),
(20, 5),
(21, 3),
(21, 5),
(1, 3),
(1, 4),
(1, 5),
(22, 3),
(23, 3),
(23, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `taskworkerview`
-- (See below for the actual view)
--
CREATE TABLE `taskworkerview` (
`TaskID` int(11)
,`UserID` int(11)
,`TaskName` varchar(30)
,`Username` varchar(16)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(255) UNSIGNED NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `UserLevel` enum('SuperAdmin','CustomerService','Karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `UserLevel`) VALUES
(1, 'SuperAdmin', 'c4ca4238a0b923820dcc509a6f75849b', 'SuperAdmin'),
(2, 'CustServ', 'c81e728d9d4c2f636f067f89cc14862c', 'CustomerService'),
(3, 'Karyawan', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Karyawan'),
(4, 'KaryawanBaru', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Karyawan'),
(5, 'Karyawan3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Karyawan'),
(6, 'Karyawan4', 'e4da3b7fbbce2345d7772b0674a318d5', 'Karyawan'),
(7, 'KaryawanJones', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Karyawan');

-- --------------------------------------------------------

--
-- Structure for view `deadlinetracker`
--
DROP TABLE IF EXISTS `deadlinetracker`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deadlinetracker`  AS  select `user`.`Username` AS `Username`,`task`.`ProjectID` AS `ProjectID`,`task`.`TaskName` AS `TaskName`,`task`.`TaskDueDate` AS `TaskDueDate`,curdate() AS `Today`,`task`.`TaskStatus` AS `TaskStatus`,`taskworker`.`UserID` AS `UserID`,`taskworker`.`TaskID` AS `TaskID` from ((`user` join `taskworker` on((`taskworker`.`UserID` = `user`.`UserID`))) join `task` on((`taskworker`.`TaskID` = `task`.`TaskID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `expenseview`
--
DROP TABLE IF EXISTS `expenseview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `expenseview`  AS  select `expense`.`expID` AS `expID`,`expense`.`expType` AS `expType`,`expense`.`expNominal` AS `expNominal`,`expense`.`expProof` AS `expProof`,`expense`.`expStatus` AS `expStatus`,`projects`.`ProjectName` AS `expProject`,`user`.`Username` AS `expOwner` from ((`expense` join `user` on((`user`.`UserID` = `expense`.`expOwner`))) join `projects` on((`projects`.`ProjectID` = `expense`.`expProjectID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `overdueprojectview`
--
DROP TABLE IF EXISTS `overdueprojectview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `overdueprojectview`  AS  select `projects`.`ProjectName` AS `ProjectName`,`projects`.`Deadline` AS `Deadline`,curdate() AS `Today`,(to_days(curdate()) - to_days(`projects`.`Deadline`)) AS `PastDays` from `projects` where (curdate() > `projects`.`Deadline`) ;

-- --------------------------------------------------------

--
-- Structure for view `overduetaskview`
--
DROP TABLE IF EXISTS `overduetaskview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `overduetaskview`  AS  select `taskview`.`TaskAuthor` AS `TaskAuthor`,`taskview`.`ProjectName` AS `ProjectName`,`taskview`.`TaskName` AS `TaskName`,`taskview`.`TaskDueDate` AS `TaskDueDate`,curdate() AS `Today`,(to_days(curdate()) - to_days(`taskview`.`TaskDueDate`)) AS `PastDays` from `taskview` where (curdate() > `taskview`.`TaskDueDate`) ;

-- --------------------------------------------------------

--
-- Structure for view `penaltyview`
--
DROP TABLE IF EXISTS `penaltyview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penaltyview`  AS  select `user`.`Username` AS `Username`,curdate() AS `Today`,`taskview`.`TaskName` AS `TaskName`,`taskview`.`TaskDueDate` AS `TaskDueDate`,(to_days(curdate()) - to_days(`taskview`.`TaskDueDate`)) AS `PastDays`,`taskview`.`TaskStatus` AS `TaskStatus`,`taskview`.`ProjectName` AS `ProjectName`,`taskworker`.`UserID` AS `UserID` from ((`user` join `taskworker` on((`taskworker`.`UserID` = `user`.`UserID`))) join `taskview` on((`taskworker`.`TaskID` = `taskview`.`TaskID`))) where (curdate() > `taskview`.`TaskDueDate`) ;

-- --------------------------------------------------------

--
-- Structure for view `taskcommentview`
--
DROP TABLE IF EXISTS `taskcommentview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `taskcommentview`  AS  select `tc`.`TaskID` AS `TaskID`,`tc`.`Comment` AS `Comment`,`tc`.`ComTimestamp` AS `ComTimestamp`,`tc`.`ComID` AS `ComID`,`tc`.`ComAuthor` AS `ComAuthorID`,`u`.`Username` AS `ComAuthor`,`tc`.`TaskFiles` AS `TaskFiles` from (`taskcomment` `tc` join `user` `u` on((`tc`.`ComAuthor` = `u`.`UserID`))) order by `tc`.`ComTimestamp` ;

-- --------------------------------------------------------

--
-- Structure for view `taskview`
--
DROP TABLE IF EXISTS `taskview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `taskview`  AS  select `t`.`TaskID` AS `TaskID`,`t`.`TaskName` AS `TaskName`,`t`.`TaskDesc` AS `TaskDesc`,`t`.`TaskDueDate` AS `TaskDueDate`,`t`.`TaskStatus` AS `TaskStatus`,`u`.`Username` AS `TaskAuthor`,`p`.`ProjectName` AS `ProjectName`,`t`.`ProjectID` AS `ProjectID` from ((`task` `t` join `user` `u` on((`t`.`TaskAuthor` = `u`.`UserID`))) join `projects` `p` on((`t`.`ProjectID` = `p`.`ProjectID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `taskworkerview`
--
DROP TABLE IF EXISTS `taskworkerview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `taskworkerview`  AS  select `taskworker`.`TaskID` AS `TaskID`,`taskworker`.`UserID` AS `UserID`,`task`.`TaskName` AS `TaskName`,`user`.`Username` AS `Username` from ((`task` join `taskworker` on((`taskworker`.`TaskID` = `task`.`TaskID`))) join `user` on((`taskworker`.`UserID` = `user`.`UserID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`) USING BTREE;

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expID`) USING BTREE;

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectID`) USING BTREE;

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TaskID`) USING BTREE;

--
-- Indexes for table `taskcomment`
--
ALTER TABLE `taskcomment`
  ADD PRIMARY KEY (`ComID`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ProjectID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `taskcomment`
--
ALTER TABLE `taskcomment`
  MODIFY `ComID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
