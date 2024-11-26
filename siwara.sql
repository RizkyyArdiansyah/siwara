-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2024 pada 12.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gunung`
--

CREATE TABLE `gunung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(10) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gunung`
--

INSERT INTO `gunung` (`id`, `nama`, `deskripsi`, `harga`, `lat`, `lon`, `img`) VALUES
(1, 'Gunung Bromo', 'Gunung berapi aktif di Jawa Timur yang terkenal dengan pemandangan matahari terbit yang spektakuler.', 54000, -7.942493, 112.953012, 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/1052/2024/02/16/IMG_20240216_075232-199804192.jpg'),
(2, 'Gunung Rinjani', 'Gunung tertinggi kedua di Indonesia yang terletak di Pulau Lombok dengan keindahan Danau Segara Anak.', 10000, -8.41163, 116.457157, 'https://traverse.id/wp-content/uploads/2019/08/cropped-Taman-Nasional-Gunung-Rinjani-Salah-Satu-Tempat-Menjelajah-Terbaik-di-Asia-Tenggara-@himsaifanah.jpg'),
(3, 'Gunung Merapi', 'Gunung berapi paling aktif di Indonesia yang terletak di perbatasan Jawa Tengah dan Yogyakarta.', 30000, -7.540708, 110.442268, 'https://asset-2.tstatic.net/sumsel/foto/bank/images/Gunung-Merapi-di-Sleman-DI-Yogyakarta-TwitterBPPTKG.jpg'),
(4, 'Gunung Semeru', 'Gunung tertinggi di Pulau Jawa yang menawarkan petualangan mendaki dan keindahan alam yang luar biasa.', 25000, -8.1082, 112.922636, 'https://pict.sindonews.net/dyn/850/pena/news/2023/09/05/704/1193581/6-fakta-gunung-semeru-puncak-tertinggi-di-jawa-yang-jadi-tempat-kematian-soe-hok-gie-qzw.jpg'),
(5, 'Gunung Kerinci', 'Gunung tertinggi di Sumatra dan gunung berapi tertinggi di Indonesia dengan pemandangan yang memukau.', 20000, -1.697045, 101.264177, 'https://www.djkn.kemenkeu.go.id/files/images/2024/02/WhatsApp_Image_2024-02-05_at_21_09_4.jpeg'),
(6, 'Gunung Ijen', 'Gunung dengan kawah belerang yang memukau dan fenomena api biru yang terkenal di Banyuwangi, Jawa Timur.', 10000, -8.058093, 114.242603, 'https://asset.kompas.com/crops/fu2SL2EKEzm5evOAXDv-SyvvD9Y=/0x0:1200x800/1200x800/data/photo/2021/08/19/611e162fed8b4.jpg'),
(7, 'Gunung Agung', 'Gunung tertinggi di Bali yang dianggap suci dan menawarkan pemandangan indah dari puncaknya.', 70000, -8.342726, 115.508391, 'https://indoraya.news/wp-content/uploads/2022/08/gunung-agung.jpg'),
(8, 'Gunung Gede Pangrango', 'Gunung yang terletak di Jawa Barat dan menjadi salah satu destinasi favorit pendaki.', 30000, -6.771673, 106.985704, 'https://javaprivatetour.com/wp-content/uploads/2023/08/gununggede.jpeg'),
(10, 'Gunung Lawu', 'Gunung di perbatasan Jawa Tengah dan Jawa Timur yang memiliki banyak situs sejarah dan budaya.', 20000, -7.62724, 111.194123, 'https://shelterjelajah.com/wp-content/uploads/2024/03/Estimasi-Pendakian-Gunung-Lawu-Via-Tambak.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pantai`
--

CREATE TABLE `pantai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(10) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pantai`
--

INSERT INTO `pantai` (`id`, `nama`, `deskripsi`, `harga`, `lat`, `lon`, `img`) VALUES
(1, 'Pantai Kuta', 'Pantai yang terkenal dengan ombak besar dan pasir putih di Bali, populer untuk surfing dan pemandangan matahari terbenam.', 50000, -8.714938, 115.169376, 'https://cove-blog-id.sgp1.cdn.digitaloceanspaces.com/cove-blog-id/2023/07/pantai-kuta.webp'),
(2, 'Pantai Parangtritis', 'Pantai di Yogyakarta yang terkenal dengan ombak besar dan keindahan matahari terbenamnya.', 20000, -8.028156, 110.320673, 'https://www.wisatala.com/wp-content/uploads/2023/03/pantai-parangtritis-1.jpg'),
(3, 'Pantai Pink', 'Pantai dengan pasir berwarna pink yang terletak di Pulau Komodo, Nusa Tenggara Timur, ideal untuk snorkeling.', 100000, -8.81933, 119.37586, 'https://rinjanilombok.net/wp-content/uploads/2014/12/pink-lombok.jpg'),
(4, 'Pantai Sanur', 'Pantai di Bali yang terkenal dengan keindahan sunrise dan suasana yang tenang untuk bersantai.', 40000, -8.694241, 115.263304, 'https://www.befreetour.com/img/attraction/sanur-beach20191019122349.jpg'),
(5, 'Pantai Tanjung Bira', 'Pantai dengan pasir putih dan air jernih di Sulawesi Selatan, cocok untuk snorkeling dan menyelam.', 30000, -5.01524, 120.445148, 'https://assets-a1.kompasiana.com/items/album/2023/04/28/tanjungbira1-644bc25ca7e0fa580a0b5d53.jpg'),
(6, 'Pantai Labuan Bajo', 'Pantai yang terletak di Labuan Bajo, Nusa Tenggara Timur, terkenal dengan keindahan bawah laut dan akses ke Pulau Komodo.', 150000, -8.508186, 119.892317, 'https://awsimages.detik.net.id/community/media/visual/2021/07/05/wisata-super-prioritas-labuan-bajo_169.jpeg?w=1200'),
(7, 'Pantai Balangan', 'Pantai di Bali yang menawarkan pemandangan menakjubkan dan suasana yang lebih sepi dan alami.', 35000, -8.794232, 115.117679, 'https://www.water-sport-bali.com/wp-content/uploads/2013/02/Pantai-Balangan-Bali-Facebook.jpg'),
(9, 'Pantai Nihiwatu', 'Pantai yang terletak di Pulau Sumba, Nusa Tenggara Timur, dengan pemandangan yang indah dan ombak yang sempurna untuk surfing.', 200000, -9.664122, 119.496803, 'https://backpackerjakarta.com/wp-content/uploads/2019/11/Pantai-Nihiwatu.jpg'),
(10, 'Pantai Labuana', 'Pantai yang terletak di Sulawesi Utara dengan pemandangan pantai yang indah dan cocok untuk kegiatan selam dan snorkeling.', 25000, 1.55057, 124.937801, 'https://www.mldspot.com/storage/generated/June2021/pantai-001.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `nama`, `nama_tempat`, `harga`, `jumlah_tiket`, `total_harga`, `tanggal_pemesanan`) VALUES
(1, 'Fufufafa', 'Gunung Semeru', 25000, 2, 50000, '2024-11-20 13:46:39'),
(2, 'D', 'Gunung Kerinci', 20000, 2, 40000, '2024-11-20 14:08:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, '', 'admin', '$2y$10$8a5SFQxhK8JZeDjrrwOsIOOP/lz3dAGWsJ6rMPxme3TNimf06kWhO', 'user'),
(2, '', 'dbjabdbsa', '$2y$10$VMnHYCX1/r/oKIDsEusZAOjsGRE.pwaI/Bv3VcmmGXZdRUQY48uOm', 'user'),
(3, '', 'adbabsdb', '$2y$10$lUhscvthIfP8ERWl7njHcOOtpr2xsp0eDEdy0AUQX8TjStqMNV.4q', 'user'),
(4, '', 'adand', '$2y$10$uApK1.6GHJcIlVV/iO4T2u2CvlOiD2L5ztyW0D05Y5rDeEghRVlrq', 'user'),
(5, '', 'DJBABDB', '$2y$10$Ghio0rt2x18wI6qv.Pv9LOcYDUQBiya2Mjd4UloSbLYaR1Zh4bUIS', 'user'),
(6, '', 'DJBABDB', '$2y$10$3z7gYNeFixjvBYvFEnYo1uXOfvVpjxrD676fwYRwpV9gWZAgBLe/S', 'user'),
(7, '', 'DJBABDB', '$2y$10$Tm4DpZ6eFyCQMxOlf64xOOEz3any/zUYIrwsEf/Gat6/HH8RXqsxi', 'user'),
(8, '', 'adbabdab', '$2y$10$uadL/UcYJp9CliXHDgvtfOzJ6JZRHRc7ADgEisni.p9F4n.Yzxntq', 'user'),
(9, '', 'adsass', '$2y$10$MbGTEWPW3mfCQwJmnsVkReiACvU/94Rty2yCQPHmkGXUg9FLxeBVG', 'user'),
(10, '', 'admin', '$2y$10$pHd8Bauyx56RspiiaZGA6eYQXMLZStHlfeqnP2evFgo8Es725q2SO', 'user'),
(11, 'aja', 'aja', '$2y$10$Xk3G90Sa5dsnqd.2LVQhVuUc3pXrp3VvezLNajjOT.3C3umq5B07y', 'user'),
(12, 'ladies how', 'dancokasu@mana.com', '$2y$10$wnfuSG2kTDA/L73/4LqmLuNwWc5BCO1F.ZLbP08TZ9yFD3ho7fAC.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pantai`
--
ALTER TABLE `pantai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pantai`
--
ALTER TABLE `pantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
