-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Hip-Hop'),
(4, 'R&B'),
(5, 'Classic'),
(6, 'Indie'),
(7, 'Latin'),
(8, 'Dance'),
(9, 'Alternative'),
(10, 'EDM'),
(11, 'Vtuber'),
(12, 'J-Pop'),
(13, 'K-Pop'),
(14, 'Jazz'),
(15, 'Dangdut');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `metatext` varchar(255) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'F-Share', 'member.png', 'admin.png', 'fsharemedia@gmail.com', '089090988877', 'Jl. sekian', 'f-share', 'f-share', 'F-share dibuat pada tahun 2023', 'Fshare-Media masih dalam pengembangan', 'Website ini dibuat untuk saling berbagi');

-- --------------------------------------------------------

--
-- Table structure for table `lagu`
--

CREATE TABLE `lagu` (
  `id_lagu` int(100) NOT NULL,
  `judul_lagu` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tahun_rilis` year(4) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tanggal_up` date NOT NULL,
  `upload_by` varchar(255) NOT NULL,
  `downloaded` int(255) NOT NULL,
  `link_flac` text NOT NULL,
  `link_mp3` text NOT NULL,
  `link_archive` text NOT NULL,
  `footage` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lagu`
--

INSERT INTO `lagu` (`id_lagu`, `judul_lagu`, `artist`, `album`, `id_kategori`, `tahun_rilis`, `photo`, `tanggal_up`, `upload_by`, `downloaded`, `link_flac`, `link_mp3`, `link_archive`, `footage`, `deskripsi`) VALUES
(1, 'Sial', 'Mahalini', 'Fabula', 1, '2023', '1686644692268.jpg', '2023-05-30', 'admintest', 0, 'https://drive.google.com/file/d/13EAU9-qHqp2ezotMgU8Y22I1mDkBpBSQ/view?usp=drive_link', '', '', '', 'Fábula adalah album pertama dari Mahalini yang dirilis padaa tanggal 23 Januari 2023. Album ini memuat 10 lagu yang terdiri dari 6 lagu baru dan 4 singel yang pernah dirilis sebelumnya, yaitu versi baru dari lagu Bawa Dia Kembali, Melawan Restu, Sisa Rasa, dan Kisah Sempurna. Album ini merupakan salah satu impian terbesar Mahalini serta merupakan bentuk persembahan darinya kepada pihak yang selama ini mendukungnya, terutama para fansnya yang telah mendukungnya sejak dia menjadi peserta Indonesia Idol pada musim kesepuluh.'),
(74, 'High Tide', 'Moona Hoshinova', 'High Tide', 11, '2022', '1700122859583.jpg', '2023-11-22', 'admintest', 9, '1700122859598.flac', '1700122859590.mp3', '#', '1700624493633.mp4', 'Moona Hoshinova (ムーナ・ホシノヴァ) adalah Virtual YouTuber perempuan Indonesia yang terkait dengan Hololive, sebagai bagian dari VTubers cabang Indonesia (ID) generasi pertama bersama Airani Iofifteen dan Ayunda Risu.'),
(78, 'Pelan Pelan Saja', 'Kotak', 'Energi', 1, '2011', '1700124606969.jpg', '2023-11-16', 'aditya', 3, '1700124606985.flac', '1700124606975.mp3', '#', '#', 'Lagu Pelan Pelan Saja dari Kotak sangat hits saat awal dirilis, bahkan lagu ciptaan mereka yang masih beranggotakan Posan Tobing sebagai drummer pada saat itu masih banyak dinikmati hingga kini.'),
(79, 'Kiss You', 'One Direction', 'Take Me Home', 1, '2012', '1700124875977.jpg', '2023-11-16', 'uhuyyy', 0, '#', '1700124875984.mp3', '#', '', '\" Kiss You \" adalah lagu yang direkam oleh boy band Inggris-Irlandia One Direction untuk album studio kedua mereka,Take Me Home (2012).'),
(80, 'Whistle', 'Flo Rida', 'Whistle', 3, '2012', '1700124951063.jpg', '2023-11-16', 'admintest', 0, '1700124951080.flac', '1700124951071.mp3', '#', '', 'Tramar Dillard (lahir 16 September 1979) atau lebih dikenal sebagai Flo Rida adalah rapper asal Amerika Serikat. Lahir di Opa-locka, Florida, nama panggung \"Flo Rida\" diambil dari nama negara bagian tempatnya berasal. Dibesarkan di Carol City, dia masih berusia 15 tahun ketika menjadi anggota grup rap 2 Live Crew.'),
(81, 'Friend Like Me (End Title) (feat. DJ Khaled)', 'Will smith', 'Various', 12, '2019', '1700125164884.jpg', '2023-11-16', 'aditya', 1, '1700125164898.flac', '1700125164890.mp3', '#', '', 'Will Smith said about this version of \"Friend Like Me\", \"I started playing with the hip-hop flavor, and the Genie was really born in my mind from the music'),
(82, 'Back For You', 'One Direction', 'Take Me Home', 1, '2012', '1700648731292.jpg', '2023-11-16', 'uhuyyy', 0, '1700125306949.flac', '1700125306939.mp3', '#', '', 'Lagu Back For You Ini termasuk ke Dalam Lagu Pop Album Take Me Home  Dari (One Direction)'),
(83, 'it wil rain', 'Bruno Mars', 'single', 1, '2011', '1700125586536.jpg', '2023-11-16', 'aditya', 1, '1700125586552.flac', '1700125586542.mp3', '#', '', 'It Will Rain yang dinyanyikan Bruno Mars lengkap dengan liriknya menarik untuk diulas. Lagu ini mengisahkan tentang kekecewaan seorang pria yang harus mengakhiri hubungannya karena tidak mendapat restu dari orang tua kekasihnya\r\n\r\n'),
(84, 'Dalan Liyane', 'Happy Asmara', 'Single', 1, '2020', '1700125735110.jpg', '2023-11-16', 'uhuyyy', 0, '1700125735127.flac', '1700125735117.mp3', '#', '', '\"Dalan Liyane\" adalah sebuah lagu yang populer dalam bahasa Jawa yang dinyanyikan oleh Denny Caknan. Lagu ini dikenal karena liriknya yang menggambarkan perasaan kehilangan dan rasa sakit hati karena pasangan yang pergi meninggalkan. Secara harfiah, \"Dalan Liyane\" dapat diterjemahkan sebagai \"jalan yang lain\" atau \"jalan yang berbeda\". Lagu ini mengungkapkan perasaan patah hati dan kekecewaan dalam hubungan, di mana seseorang merasa ditinggalkan dan harus menghadapi jalan hidup yang berbeda tanpa kehadiran pasangan tersebut. Melalui melodi yang emosional dan lirik yang menyentuh, lagu ini menciptakan atmosfer melankolis yang dapat terasa oleh pendengar.'),
(85, 'That\'s What I Like', 'Bruno Mars', 'bruno mars', 1, '2019', '1700126459648.jpg', '2023-11-16', 'aditya', 1, '1700126459664.flac', '1700126459654.mp3', '#', '', 'Lirik lagu That\'s What I Like yang dinyanyikan Bruno Mars bercerita tentang seorang pria yang mencoba membuat kekasihnya terkesan dengan kemewahan dan kekayaan yang dimilikinya'),
(87, 'Los Dol', 'Denny Caknan', 'Single', 1, '2020', '1700460626405.jpg', '2023-11-20', 'uhuyyy', 0, '1700460626468.flac', '1700460626436.mp3', '#', '', '\"Lor Dol\" adalah sebuah lagu yang berasal dari Indonesia yang populer pada tahun 2020. Lagu ini diciptakan oleh Denny Caknan dan dinyanyikan oleh Purnama. \"Los Dol\" menjadi viral di media sosial dan mendapatkan popularitas di kalangan masyarakat Indonesia. Lagu ini memiliki lirik yang unik dan ritme yang mudah diingat, sehingga menjadi fenomena di dunia musik tanah air pada masa itu. Lagu ini mencerminkan nuansa humor dan kehidupan sehari-hari, dan menjadi sorotan di berbagai platform digital.'),
(88, 'Kartonyono Medot Janji', 'Denny Caknan', 'Single', 1, '2019', '1700461074142.jpg', '2023-11-20', 'uhuyyy', 0, '1700461074162.flac', '1700461074148.mp3', '#', '', '\"Lagu \'Kartonyono Medot Janji\' adalah sebuah dangdut koplo populer di Indonesia yang dirilis pada 2019. Diciptakan oleh Denny Caknan dan dinyanyikan oleh Nella Kharisma, lagu ini mengisahkan tentang kehilangan dan kerinduan terhadap pasangan hidup.\"'),
(90, 'klebus', 'Denny Caknan', 'Single', 1, '2022', '1686645318154.jpg', '2023-11-20', 'uhuyyy', 0, '1700462221189.flac', '1700462221178.mp3', '#', '', 'Klebus menceritakan cinta yang bertepuk sebelah tangan. Ketika diberi harapan hingga merasa nyaman, ujung-ujungnya mendapati fakta yang selama ini yang dicintai malah mencintai orang lain.'),
(91, 'True', 'Hoyo-Mix', 'Hoyo-Mix', 12, '2022', '1700462376028.jpg', '2023-11-20', 'udin1', 2, '1700462376049.flac', '1700462376037.mp3', '#', '', 'Dia sendiri tahu di dalam lubuk hatinya, saat meninggalkan dunia, seseorang harus membawa pergi semua miliknya, jangan sampai orang lain berduka.\r\nDia juga mengerti bahwa hal itu tidak mungkin bisa dilakukan.\r\nApa yang dia tinggalkan di dunia ini sangat banyak... mencakup segalanya sampai ke keabadian.\r\nJadi, dia memutuskan... untuk melakukan apa yang dia mau terakhir kalinya.\r\nSemua yang disaksikan, semua yang dicintai, semua yang ditinggalkannya...\r\nSemua yang berada di dunia ini, dikumpulkan dan disusun menjadi sebuah buku...\r\nBenar, pada akhirnya yang dia tinggalkan hanyalah sebuah buku cerita.\r\nTentang masa lalu yang indah, tentang 13 orang yang tidak menjadi pahlawan...\r\nHanya sebuah cerita yang sederhana.\r\n\r\nLagu tema ini diproduksi oleh tim musik internal miHoYo, HOYO-MiX, dan dibawakan oleh penyanyi ternama 黄龄.'),
(92, 'Havana', 'Camila Cbello', 'Single', 4, '2017', '1700462695639.jpg', '2023-11-20', 'uhuyyy', 0, '1700462695657.flac', '1700462695647.mp3', '#', '', '\"Havana\" adalah lagu pop Latin yang dinyanyikan oleh Camila Cabello, featuring Young Thug, dirilis pada tahun 2017. Liriknya menggambarkan kerinduan terhadap kota Havana, Kuba, sambil menyampaikan cerita cinta. Lagu ini meraih popularitas besar berkat penggabungan elemen musik pop dan Latin.'),
(94, 'On My Way', 'Alan Walker', 'World Of Walker', 8, '2021', '1700463136598.jpg', '2023-11-20', 'uhuyyy', 0, '1700463136617.flac', '1700463136606.mp3', '#', '1701332041505.mp4', '\"On My Way\" adalah lagu kolaborasi antara Alan Walker, Sabrina Carpenter, dan Farruko yang dirilis pada tahun 2019. Lagu ini mencampur elemen musik elektronik, pop, dan reggaeton, dengan lirik yang menggambarkan semangat untuk mengatasi hambatan dalam hidup.'),
(95, 'Rewrite The Stars', 'James Arthur & Anne-Marrie', 'The Greatest ShowMan Reimagined', 1, '2017', '1700463620954.jpg', '2023-11-20', 'uhuyyy', 0, '1700463620973.flac', '1700463620961.mp3', '#', '', '\"Rewrite the Stars\" adalah lagu dari film \"The Greatest Showman,\" dinyanyikan oleh Zac Efron dan Zendaya. Lagu ini menggambarkan perasaan cinta dan keinginan untuk mengubah takdir.'),
(100, 'We Go Down Together', 'Dove Cameron', 'We Go Down Together - Single', 1, '2023', '1701761755069.jpg', '2023-12-05', 'admintest', 0, '1701761755103.flac', '1701761755083.mp3', '#', '1701762252535.mp4', 'Dove Olivia Cameron (born Chloe Celeste Hosterman; January 15, 1996) is an American singer and actress. She gained recognition for her dual role of the eponymous characters in the Disney Channel comedy series Liv and Maddie (2013–17), for which she won the Daytime Emmy Award for Outstanding Performer in Children\'s Programming. She also starred in the Disney Channel Descendants franchise (2015–2021).\r\n\r\nCameron has starred in several feature films including Barely Lethal (2015), Monsterville: Cabinet of Souls (2015), Dumplin\' (2018), Good Mourning (2022) and Vengeance (2022). She also starred in the NBC live television musical Hairspray Live! (2016). She has appeared in several television shows, including Agents of S.H.I.E.L.D. and the Marvel Rising franchise.\r\n\r\nIn 2015, Cameron lent her vocals the soundtrack albums for Liv and Maddie and Descendants, the latter which topped the US Billboard 200 and was certified gold by the Recording Industry Association of America (RIAA). In 2023, she released her debut album Alchemical: Vol 1 which was preceded by the single \"Boyfriend\", which received critical success, reached the top 20 in the Billboard Hot 100, and was certified platinum by the RIAA.');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `user_id` int(25) NOT NULL,
  `id_lagu` int(11) NOT NULL,
  `title_lagu` varchar(255) NOT NULL,
  `url_lagu` varchar(255) NOT NULL,
  `thumb_lagu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `id_lagu`, `title_lagu`, `url_lagu`, `thumb_lagu`) VALUES
(7, 6, 78, 'Pelan Pelan Saja', '1700124606975.mp3', '1700124606969.jpg'),
(8, 6, 79, 'Kiss You', '1700124875984.mp3', '1700124875977.jpg'),
(9, 6, 74, 'High Tide', '1700122859590.mp3', '1700122859583.jpg'),
(10, 6, 84, 'Dalan Liyane', '1700125735117.mp3', '1700125735110.jpg'),
(13, 6, 74, 'High Tide', '1700122859590.mp3', '1700122859583.jpg'),
(14, 21, 79, 'Kiss You', '1700124875984.mp3', '1700124875977.jpg'),
(15, 21, 84, 'Dalan Liyane', '1700125735117.mp3', '1700125735110.jpg'),
(16, 6, 86, 'Thinking Bout You', '1700126727575.mp3', '1700126727557.jpg'),
(17, 21, 86, 'Thinking Bout You', '1700126727575.mp3', '1700126727557.jpg'),
(18, 21, 82, 'Back For You', '1700125306939.mp3', '1700125306922.jpg'),
(19, 6, 74, 'High Tide', '1700122859590.mp3', '1700122859583.jpg'),
(20, 21, 87, 'Los Dol', '1700460626436.mp3', '1700460626405.jpg'),
(21, 5, 100, 'We Go Down Together', '1701761755083.mp3', '1701761755069.jpg'),
(22, 5, 74, 'High Tide', '1700122859590.mp3', '1700122859583.jpg'),
(23, 5, 84, 'Dalan Liyane', '1700125735117.mp3', '1700125735110.jpg'),
(26, 23, 74, 'High Tide', '1700122859590.mp3', '1700122859583.jpg'),
(27, 23, 78, 'Pelan Pelan Saja', '1700124606975.mp3', '1700124606969.jpg'),
(28, 23, 79, 'Kiss You', '1700124875984.mp3', '1700124875977.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Hak Admin'),
(2, 'Member', 'Hak Member Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `negara` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_login` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.jpeg',
  `last_login` datetime DEFAULT NULL,
  `activated` int(1) NOT NULL,
  `uploaded` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `negara`, `kota`, `tanggal_lahir`, `id_role`, `is_login`, `created_at`, `updated_at`, `photo`, `last_login`, `activated`, `uploaded`) VALUES
(1, '', 'akun1', 'akun1@gmail.com', '$2y$05$KEYzW1mR0m2K0WdS3J92C.86KEhYHbxBY02zGErnuc5HNTET3r7cm', '', '', '0000-00-00', 2, 0, '2023-06-11 13:10:57', NULL, 'default.jpeg', '2023-06-11 13:10:57', 1, 0),
(5, 'admin yang baik', 'admintest', 'admintest@admintest.com', '$2y$05$ysE4MkdmqiM1ysg5i2HtyOA0YmJOFF8rC9yI/w5YKm0/dJU5Boom6', 'Konoha', 'Batavia', '2023-06-01', 1, 0, '2023-06-06 09:38:37', NULL, '1686629287669.jpg', '2023-11-27 15:55:35', 1, 1),
(6, 'ahboong nih', 'ahboong', 'ahboong@ahboong.com', '$2y$10$vjSItEbS62t7h.pnon9/5uvQBF8oxDmcad1oNQP98HIaFnX/xUsiG', 'Indonesia', 'Jakarta Selatan', '2023-06-14', 2, 0, '2023-06-06 09:59:12', NULL, '1686629725944.jpg', '2023-11-27 15:55:47', 1, 0),
(8, '', 'akun2', 'akun2@akun.com', '$2y$05$B1U70GcA5lUPpCTz0fcx8.8lG6s2i2/H7WxhW0Jn/ffViv/VIMsWm', '', '', '0000-00-00', 2, 0, '2023-06-11 13:11:13', NULL, 'default.jpeg', '2023-06-11 13:11:13', 1, 0),
(9, '', 'akun3', 'akun3@akun.com', '$2y$05$0i9ZHqAhs8JeT0Nk6LbOTurn.e3KU2DsM3bAMwmckIUcQZ7lkitKW', '', '', '0000-00-00', 2, 0, '2023-06-11 13:11:26', NULL, 'default.jpeg', '2023-06-11 13:11:26', 1, 0),
(10, '', 'akun4', 'akun4@akun.com', '$2y$05$6EYh0ENgsMvncyXDpjzFKe/CvATaeYYTdY3RKASlykjLr10ad7.C6', '', '', '0000-00-00', 2, 0, '2023-06-11 13:11:38', NULL, 'default.jpeg', '2023-06-11 13:11:38', 1, 0),
(11, '', 'akun5', 'akun5@akun.com', '$2y$05$LkHyzWtQ8XUxVwNK5i.dD.oPRPMpjyB7fehka8yqFAqaqeZdlPCaK', '', '', '0000-00-00', 2, 0, '2023-06-11 13:11:51', NULL, 'default.jpeg', '2023-06-11 13:11:51', 1, 0),
(12, '', 'akun6', 'akun6@akun.com', '$2y$05$ddXWPx2/r0sVgiYf87lCBOzAkYZ.ZKDqeRq8/AaTicAD9M6AKv5uG', '', '', '0000-00-00', 2, 0, '2023-06-11 13:12:16', NULL, 'default.jpeg', '2023-06-11 13:12:16', 1, 0),
(13, '', 'akun7', 'akun7@akun.com', '$2y$05$MsIsg8xQNwHa.3ACfFFrEuykPsX/tetJD5NAXmapyZvgSenZdqrH6', '', '', '0000-00-00', 2, 0, '2023-06-11 13:12:27', NULL, 'default.jpeg', '2023-06-11 13:12:27', 1, 0),
(14, '', 'akun8', 'akun8@akun.com', '$2y$05$Rlsv0lsqgN2u.LDQyfrDjO7PWGiGRE/O2M.mOfjObm5KmSXIRT2uS', '', '', '0000-00-00', 2, 0, '2023-06-11 13:12:38', NULL, 'default.jpeg', '2023-06-11 13:12:38', 1, 0),
(15, '', 'akun9', 'akun9@akun.com', '$2y$05$WKsRaCo6ZXGVSzPiexYqLeliHug9XSta8MW3UyDkojNEK.z4bmLfe', '', '', '0000-00-00', 2, 0, '2023-06-11 13:12:49', NULL, 'default.jpeg', '2023-06-11 13:12:49', 1, 0),
(16, '', 'akun10', 'akun10@akun.com', '$2y$05$kOFKhO/RPllImSrTAWajtOoq8NuNoXwnBypVLD/f0IFG/6MpCzHau', '', '', '0000-00-00', 2, 0, '2023-06-11 13:13:02', NULL, 'default.jpeg', '2023-06-11 13:13:02', 1, 0),
(17, '', 'akun11', 'akun11@akun.com', '$2y$05$wO8PJ.cQ47rW0shTp/fh4eYPRs3icI7o6i9n5j96aKTZasURyWRLi', '', '', '0000-00-00', 2, 0, '2023-06-11 13:14:49', NULL, 'default.jpeg', '2023-06-11 13:14:49', 1, 0),
(18, '', '2110511117', 'admin@admin.com', '$2y$05$CINqI/5JskYU18g8V1Rf1eNZDLqAS9m0tZQlsVkSBQQtqxkG95YFi', '', '', '0000-00-00', 2, 0, '2023-06-12 13:39:12', NULL, 'default.jpeg', '2023-06-12 13:41:00', 1, 0),
(19, '', 'hezooo', 'hezooo@gmail.com', '$2y$05$SOAHWuq08rPaekZNnb4fQ.g/P7.rBrlbfvkyzLklOvnGjYGO0C5/G', '', '', '0000-00-00', 2, 0, '2023-09-26 12:38:45', NULL, 'default.jpeg', '2023-09-26 12:38:45', 1, 0),
(20, '', 'anjay', 'anjay@gmail.com', '$2y$05$AdVtktVJHkCTl1virtgiQ.3fKOOLJV3c2YZfAzwiJoPBqjpRiT276', '', '', '0000-00-00', 2, 0, '2023-10-19 16:03:52', NULL, 'default.jpeg', '2023-10-19 16:03:52', 1, 0),
(21, '', 'uhuyyy', 'uhuy@gmail.com', '$2y$05$AyR2tT7sTWNG/aX0KIKpcOv.suV5QbV2pZ1xMyYIEsCB/Amq4c5XS', '', '', '0000-00-00', 2, 0, '2023-10-19 16:04:14', NULL, 'default.jpeg', '2023-11-16 11:18:34', 1, 0),
(22, '', 'aditya', 'adityaamran08@gmail.com', '$2y$05$066VEZlPoyk3R2JUNS8YWuBLjFJSmi0vH.QK8QNJb6qW/t2sgxECm', '', '', '0000-00-00', 2, 0, '2023-10-19 16:11:23', NULL, 'default.jpeg', '2023-10-19 16:11:23', 1, 0),
(23, '', 'udin1', 'kocai@gmail.com', '$2y$05$fRfXVs8DTzMKKF2XObWBpOJdEfWk.kfy/0VE1Gvp0CBhJKF.6iZ8y', '', '', '0000-00-00', 2, 0, '2023-10-23 14:24:02', NULL, 'default.jpeg', '2023-12-07 14:20:00', 1, 0),
(25, 'Aghies', '15210194', '15210194@bsi.ac.id', '$2y$05$uAKKsCkm0jr/6qBAz.UH1.Eqg9ZgNecV7lDc6bQRY0ciAUG.IWrrm', '', '', '0000-00-00', 2, 0, '2023-11-09 22:54:19', NULL, '1699546362241.jpg', '2023-11-09 22:54:19', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`id_lagu`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lagu`
--
ALTER TABLE `lagu`
  MODIFY `id_lagu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
