/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100126
 Source Host           : localhost:3306
 Source Schema         : trpl

 Target Server Type    : MySQL
 Target Server Version : 100126
 File Encoding         : 65001

 Date: 07/11/2017 01:15:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`CategoryID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Java');
INSERT INTO `category` VALUES (2, 'PHP');
INSERT INTO `category` VALUES (3, 'Web Based');

-- ----------------------------
-- Table structure for expense
-- ----------------------------
DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense`  (
  `expID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expProjectID` int(11) NOT NULL,
  `expOwner` int(11) NOT NULL,
  `expType` enum('Konsumsi','Transportasi','Komunikasi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `expNominal` int(255) NOT NULL,
  `expProof` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'sha256 = 64 karakter, sisanya jaga2 buat format',
  `expStatus` enum('Lunas','Disetujui/Belum Lunas','Belum Diperiksa') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Belum Diperiksa',
  PRIMARY KEY (`expID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of expense
-- ----------------------------
INSERT INTO `expense` VALUES (1, 1, 3, 'Transportasi', 5000, 'bukti.jpg', 'Belum Diperiksa');
INSERT INTO `expense` VALUES (2, 1, 4, 'Konsumsi', 0, '', 'Belum Diperiksa');
INSERT INTO `expense` VALUES (3, 1, 3, 'Konsumsi', 6000, '79a96ac97d700addf6112e0e18826185e0ff2cbbfde940fb674adab7afd853d6.jpg', 'Belum Diperiksa');
INSERT INTO `expense` VALUES (4, 1, 3, 'Konsumsi', 6000, '79a96ac97d700addf6112e0e18826185e0ff2cbbfde940fb674adab7afd853d6.jpg', 'Belum Diperiksa');

-- ----------------------------
-- Table structure for penalty
-- ----------------------------
DROP TABLE IF EXISTS `penalty`;
CREATE TABLE `penalty`  (
  `PenaltyID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  PRIMARY KEY (`PenaltyID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for projectcategory
-- ----------------------------
DROP TABLE IF EXISTS `projectcategory`;
CREATE TABLE `projectcategory`  (
  `ProjectID` int(11) NOT NULL,
  `CategoryID` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ProjectID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects`  (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientMail` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ProjectName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Proposal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Deadline` date NOT NULL,
  `Deal` tinyint(4) NOT NULL DEFAULT 0,
  `Complete` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ProjectID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (1, 'example@email.com', 'Dummy Proyek', 'Dummy_Proyek.pdf', '2017-12-07', 0, 0);
INSERT INTO `projects` VALUES (2, 'example2@email.com', 'Dummy Proyek2', 'belumadalagi.pdf', '2017-10-14', 0, 0);
INSERT INTO `projects` VALUES (3, 'contoh@email.com', 'Proyek Negara', 'belumbikinfungsiupload.pdf', '2017-11-01', 1, 0);
INSERT INTO `projects` VALUES (4, 'email@contoh.com', 'Judul Example diedit', 'namaproposal.pdf', '2019-09-10', 0, 0);
INSERT INTO `projects` VALUES (5, 'hapuskanlah@gmail.com', 'Proyek Jembatan', 'belumada.pdf', '2017-10-25', 0, 0);
INSERT INTO `projects` VALUES (6, 'emon@mone.id', 'Forrtnite', 'lom_ada.pdf', '2017-10-31', 0, 0);
INSERT INTO `projects` VALUES (7, 'file@mail.com', 'Tes File', 'sakdik.png', '2017-11-03', 0, 0);
INSERT INTO `projects` VALUES (8, 'dwakurniawan@gmail.com', 'Nama Proyek', 'Nama_Proyek.pdf', '2017-11-03', 0, 0);
INSERT INTO `projects` VALUES (9, 'bxmailo@gmail.com', 'Testing', 'Testing.pdf', '2017-11-23', 0, 0);

-- ----------------------------
-- Table structure for task
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task`  (
  `TaskID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `TaskName` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TaskDesc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `TaskDueDate` date NOT NULL,
  `TaskAuthor` int(11) NOT NULL,
  `TaskStatus` tinyint(255) NULL DEFAULT 0,
  PRIMARY KEY (`TaskID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES (1, 1, 'Artificial Intelligence', 'Kecerdasan Buatan atau kecerdasan yang ditambahkan kepada suatu sistem yang bisa diatur dalam konteks ilmiah atau Intelegensi Artifisial atau Artificial Intelligence (AI) didefinisikan sebagai kecerdasan entitas ilmiah. Sistem seperti ini umumnya dianggap komputer. Kecerdasan diciptakan dan dimasukkan ke dalam suatu mesin (komputer) agar dapat melakukan pekerjaan seperti yang dapat dilakukan manusia. Beberapa macam bidang yang menggunakan kecerdasan buatan antara lain sistem pakar, permainan komputer (games), logika fuzzy, jaringan syaraf tiruan dan robotika.', '2017-10-24', 3, 0);
INSERT INTO `task` VALUES (2, 1, 'Robotika', 'Robotika adalah satu cabang teknologi yang berhubungan dengan desain, konstruksi, operasi, disposisi struktural, pembuatan, dan aplikasi dari robot.Robotika terkait dengan ilmu pengetahuan bidang elektronika, mesin, mekanika, dan perangkat lunak komputer.', '2017-10-31', 3, 1);
INSERT INTO `task` VALUES (3, 2, 'Sistem Informasi Manajemen', 'Sistem informasi manajemen atau SIM (management information system) adalah sistem perencanaan bagian dari pengendalian internal suatu bisnis yang meliputi pemanfaatan manusia, dokumen, teknologi, dan prosedur oleh akuntansi manajemen untuk memecahkan masalah bisnis seperti biaya produk, layanan, atau suatu strategi bisnis. Sistem informasi manajemen dibedakan dengan sistem informasi biasa karena SIM digunakan untuk menganalisis sistem informasi lain yang diterapkan pada aktivitas operasional organisasi. Secara akademis, istilah ini umumnya digunakan untuk merujuk pada kelompok metode manajemen informasi yang bertalian dengan otomasi atau dukungan terhadap pengambilan keputusan manusia, misalnya sistem pendukung keputusan, sistem pakar, dan sistem informasi eksekutif.', '2017-10-27', 3, 0);
INSERT INTO `task` VALUES (4, 2, 'Sistem Informasi Akuntansi', 'istem Informasi Akuntansi (SIA) adalah sebuah sistem informasi yang menangani segala sesuatu yang berkenaan dengan Akuntansi. Akuntansi sendiri sebenarnya adalah sebuah sistem informasi.fungsinya Mengumpulkan dan menyimpan data tentang aktivitas dan transaksi,Memproses data menjadi informasi yang dapat digunakan dalam proses pengambilan keputusan,Melakukan kontrol secara tepat terhadap aset organisasi.', '2017-10-28', 3, 0);
INSERT INTO `task` VALUES (5, 3, 'Sistem Pendukung Keputusan', 'Sistem pendukung keputusan atau decision support systems disingkat (DSS) adalah bagian dari sistem informasi berbasis komputer (termasuk sistem berbasis pengetahuan (manajemen pengetahuan)) yang dipakai untuk mendukung pengambilan keputusan dalam suatu organisasi atau perusahaan.Dapat juga dikatakan sebagai sistem komputer yang mengolah data menjadi informasi untuk mengambil keputusan dari masalah semi-terstruktur yang spesifik.', '2017-10-29', 3, 0);
INSERT INTO `task` VALUES (6, 3, 'Sistem Operasi', 'Sistem operasi (operating system) adalah perangkat lunak sistem yang mengatur sumber daya dari perangkat keras dan perangkat lunak, serta sebagai jurik (daemon) untuk program komputer. Tanpa sistem operasi, pengguna tidak dapat menjalankan program aplikasi pada komputer mereka, kecuali program booting.Sistem operasi mempunyai penjadwalan yang sistematis mencakup perhitungan penggunaan memori, pemrosesan data, penyimpanan data, dan sumber daya lainnya.', '2017-10-31', 3, 0);
INSERT INTO `task` VALUES (7, 4, 'Algoritma', 'Algoritma adalah urutan langkah-langkah logis penyelesaian masalah yang disusun secara sistematis dan logis.Langkah-langkah dalam algoritma harus logis dan harus dapat ditentukan bernilai salah atau benar.Dalam beberapa konteks, algoritma adalah spesifikasi urutan langkah untuk melakukan pekerjaan tertentu. Pertimbangan dalam pemilihan algoritma adalah, pertama, algoritma haruslah benar. Artinya algoritma akan memberikan keluaran yang dikehendaki dari sejumlah masukan yang diberikan. Tidak peduli sebagus apapun algoritma, kalau memberikan keluaran yang salah.', '2017-10-31', 3, 0);
INSERT INTO `task` VALUES (8, 4, 'Rekayasa Perangkat Lunak', 'Rekayasa perangkat lunak atau software Engineering adalah satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembanganan perangkat lunak dan manajemen kualitas.Rekayasa perangkat lunak adalah pengubahan perangkat lunak itu sendiri guna mengembangkan, memelihara, dan membangun kembali dengan menggunakan prinsip reakayasa untuk menghasilkan perangkat lunak yang dapat bekerja lebih efisien dan efektif untuk pengguna.', '2017-11-01', 3, 0);
INSERT INTO `task` VALUES (9, 5, 'Logika Fuzzy', 'Logika Fuzzy adalah peningkatan dari logika Boolean yang berhadapan dengan konsep kebenaran sebagian. Saat logika klasik menyatakan bahwa segala hal dapat diekspresikan dalam istilah biner (0 atau 1, hitam atau putih, ya atau tidak), logika fuzzy menggantikan kebenaran boolean dengan tingkat kebenaran.', '2017-11-03', 3, 0);
INSERT INTO `task` VALUES (10, 5, 'Java', 'Java adalah bahasa pemrograman yang dapat dijalankan di berbagai komputer termasuk telepon genggam. Bahasa ini awalnya dibuat oleh James Gosling saat masih bergabung di Sun Microsystems saat ini merupakan bagian dari Oracle dan dirilis tahun 1995. Bahasa ini banyak mengadopsi sintaksis yang terdapat pada C dan C++ namun dengan sintaksis model objek yang lebih sederhana serta dukungan rutin-rutin aras bawah yang minimal.', '2017-11-04', 3, 0);
INSERT INTO `task` VALUES (11, 6, 'HTML', 'Hypertext Markup Language (HTML) adalah sebuah bahasa markah yang digunakan untuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam sebuah penjelajah web Internet dan pemformatan hiperteks sederhana yang ditulis dalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang terintegerasi. Dengan kata lain, berkas yang dibuat dalam perangkat lunak pengolah kata dan disimpan dalam format ASCII normal sehingga menjadi halaman web dengan perintah-perintah HTML.', '2017-11-05', 3, 0);
INSERT INTO `task` VALUES (12, 6, 'Pascal', 'Pascal adalah bahasa pemrograman yang pertama kali di buat oleh Profesor Niklaus Wirth, seorang anggota International Federation of Information Processing (IFIP) pada tahun 1971. Dengan mengambil nama dari matematikawan Perancis, Blaise Pascal, yang pertama kali menciptakan mesin penghitung, Profesor Niklaus Wirth membuat bahasa Pascal ini sebagai alat bantu untuk mengajarkan konsep pemrograman komputer kepada mahasiswanya. Selain itu, Profesor Niklaus Wirth membuat Pascal juga untuk melengkapi kekurangan-kekurangan bahasa pemrograman yang ada pada saat itu.', '2017-11-07', 3, 0);
INSERT INTO `task` VALUES (13, 7, 'Programmer', 'Programmer adalah Seseorang yang melakukan penulisan dan pengubahan script atau kode dari sumber sehingga dapat membentuk suatu program. Penyuntingan kode sumber meliputi proses pengetesan, analisis, pembetulan kesalahan, pengoptimasian algoritma, dan normalisasi kode.', '2017-11-09', 3, 0);
INSERT INTO `task` VALUES (14, 7, 'System Analyst', 'Analis sistem atau system analyst adalah seseorang yang bertanggung jawab atas penelitian, perencanaan, pengkoordinasian, dan merekomendasikan pemilihan perangkat lunak dan sistem yang paling sesuai dengan kebutuhan organisasi bisnis atau perusahaan. Analis sistem memegang peranan yang sangat penting dalam proses pengembangan sistem.Analis sistem bisa pula menjadi perantara atau penghubung antara perusahaan penjual perangkat lunak dengan organisasi tempat ia bekerja, dan bertanggung jawab atas analisis biaya pengembangan, usulan desain dan pengembangan, serta menentukan rentang waktu yang diperlukan. Analis sistem bertanggung jawab pula atas studi kelayakan atas sistem komputer sebelum membuat satu usulan kepada pihak manajemen perusahaan.', '2017-11-11', 3, 0);
INSERT INTO `task` VALUES (15, 1, 'SPPK', 'Membuat SPPK Fuzzy', '2017-12-09', 3, 0);
INSERT INTO `task` VALUES (16, 1, 'Sistem Pakar', 'Sistem Pakar CF', '2017-12-07', 3, 0);
INSERT INTO `task` VALUES (17, 1, 'Sistem Pakar', 'Sistem Pakar CF', '2017-12-07', 3, 0);
INSERT INTO `task` VALUES (18, 1, 'Sistem Pakar 2', 'Sistem Pakar CF2', '2017-12-07', 3, 0);
INSERT INTO `task` VALUES (19, 1, 'Datamining', 'Metode Naive Bayes', '2017-12-08', 3, 0);
INSERT INTO `task` VALUES (20, 1, 'Datamining 2', 'Metode ANN', '2017-11-30', 3, 0);
INSERT INTO `task` VALUES (21, 1, 'Artificial Intelligence 2', 'A*', '2017-11-30', 3, 0);

-- ----------------------------
-- Table structure for taskcomment
-- ----------------------------
DROP TABLE IF EXISTS `taskcomment`;
CREATE TABLE `taskcomment`  (
  `ComID` int(11) NOT NULL AUTO_INCREMENT,
  `ComAuthor` int(11) NOT NULL,
  `Comment` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ComTimestamp` timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `TaskFiles` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TaskID` int(11) NOT NULL,
  PRIMARY KEY (`ComID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of taskcomment
-- ----------------------------
INSERT INTO `taskcomment` VALUES (1, 4, 'Tes Komentar 02.', '2017-10-24 23:30:21', NULL, 1);
INSERT INTO `taskcomment` VALUES (2, 3, 'Tes Komentar 01.', '2017-10-24 23:30:18', NULL, 1);
INSERT INTO `taskcomment` VALUES (3, 3, 'Tes Komentar 3', '2017-10-24 23:30:16', NULL, 2);
INSERT INTO `taskcomment` VALUES (4, 3, 'Tes Komentar Input.', '2017-10-24 23:45:22', NULL, 1);
INSERT INTO `taskcomment` VALUES (5, 3, 'Tes Komentar input 2.', '2017-10-24 23:48:03', NULL, 1);
INSERT INTO `taskcomment` VALUES (11, 2, 'Hai File', '2017-10-31 23:49:55', 'Weighted_Product.pdf', 1);

-- ----------------------------
-- Table structure for taskworker
-- ----------------------------
DROP TABLE IF EXISTS `taskworker`;
CREATE TABLE `taskworker`  (
  `TaskID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of taskworker
-- ----------------------------
INSERT INTO `taskworker` VALUES (14, 3);
INSERT INTO `taskworker` VALUES (14, 4);
INSERT INTO `taskworker` VALUES (16, 3);
INSERT INTO `taskworker` VALUES (17, 3);
INSERT INTO `taskworker` VALUES (17, 4);
INSERT INTO `taskworker` VALUES (17, 5);
INSERT INTO `taskworker` VALUES (18, 3);
INSERT INTO `taskworker` VALUES (18, 4);
INSERT INTO `taskworker` VALUES (18, 5);
INSERT INTO `taskworker` VALUES (19, 3);
INSERT INTO `taskworker` VALUES (19, 4);
INSERT INTO `taskworker` VALUES (19, 5);
INSERT INTO `taskworker` VALUES (20, 3);
INSERT INTO `taskworker` VALUES (20, 4);
INSERT INTO `taskworker` VALUES (20, 5);
INSERT INTO `taskworker` VALUES (1, 3);
INSERT INTO `taskworker` VALUES (1, 4);
INSERT INTO `taskworker` VALUES (1, 5);
INSERT INTO `taskworker` VALUES (21, 3);
INSERT INTO `taskworker` VALUES (21, 5);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `UserID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UserLevel` enum('SuperAdmin','CustomerService','Karyawan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'SuperAdmin', '1', 'SuperAdmin');
INSERT INTO `user` VALUES (2, 'CustServ', '2', 'CustomerService');
INSERT INTO `user` VALUES (3, 'Karyawan', '3', 'Karyawan');
INSERT INTO `user` VALUES (4, 'KaryawanBaru', '3', 'Karyawan');
INSERT INTO `user` VALUES (5, 'Karyawan3', '3', 'Karyawan');

-- ----------------------------
-- Table structure for userdetail
-- ----------------------------
DROP TABLE IF EXISTS `userdetail`;
CREATE TABLE `userdetail`  (
  `UserID` int(11) NOT NULL,
  `UserFullName` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `UserAvatar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of userdetail
-- ----------------------------
INSERT INTO `userdetail` VALUES (0, 'Budi', NULL, NULL);
INSERT INTO `userdetail` VALUES (1, 'Pak Boss', '', 'Jalan Raya');
INSERT INTO `userdetail` VALUES (2, 'CSman', NULL, 'Jalan Raya 2');
INSERT INTO `userdetail` VALUES (4, 'Joni', NULL, 'Jalan Raya');
INSERT INTO `userdetail` VALUES (5, 'Supreme', NULL, 'Jalan Kasir');

-- ----------------------------
-- View structure for expenseview
-- ----------------------------
DROP VIEW IF EXISTS `expenseview`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `expenseview` AS SELECT
expense.expID,
expense.expType,
expense.expNominal,
expense.expProof,
expense.expStatus,
projects.ProjectName AS expProject,
`user`.Username AS expOwner
FROM
expense
INNER JOIN `user` ON `user`.UserID = expense.expOwner
INNER JOIN projects ON projects.ProjectID = expense.expProjectID ;

-- ----------------------------
-- View structure for taskcommentview
-- ----------------------------
DROP VIEW IF EXISTS `taskcommentview`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `taskcommentview` AS SELECT
tc.TaskID AS TaskID,
tc.`Comment` AS `Comment`,
tc.ComTimestamp AS ComTimestamp,
tc.ComID AS ComID,
tc.ComAuthor AS ComAuthorID,
u.Username AS ComAuthor,
tc.TaskFiles
FROM
(taskcomment AS tc
JOIN `user` AS u ON ((tc.ComAuthor = u.UserID)))
ORDER BY
ComTimestamp ASC ;

-- ----------------------------
-- View structure for taskview
-- ----------------------------
DROP VIEW IF EXISTS `taskview`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `taskview` AS SELECT
t.TaskID AS TaskID,
t.TaskName AS TaskName,
t.TaskDesc AS TaskDesc,
t.TaskDueDate AS TaskDueDate,
t.TaskStatus AS TaskStatus,
u.Username AS TaskAuthor,
p.ProjectName AS ProjectName,
t.ProjectID AS ProjectID
FROM
((task AS t
JOIN `user` AS u ON ((t.TaskAuthor = u.UserID)))
JOIN projects AS p ON ((t.ProjectID = p.ProjectID))) ;

-- ----------------------------
-- View structure for taskworkerview
-- ----------------------------
DROP VIEW IF EXISTS `taskworkerview`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `taskworkerview` AS SELECT
taskworker.TaskID,
taskworker.WorkID,
taskworker.UserID,
`user`.Username
FROM
taskworker
INNER JOIN task ON task.TaskID = taskworker.TaskID
INNER JOIN `user` ON `user`.UserID = taskworker.UserID ;

SET FOREIGN_KEY_CHECKS = 1;
