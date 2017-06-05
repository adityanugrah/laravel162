-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jun 2017 pada 05.47
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `KodeDepartemen` varchar(10) NOT NULL,
  `NamaDepartemen` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`KodeDepartemen`, `NamaDepartemen`, `Keterangan`) VALUES
('Dep001', 'Departemen Komunikasi Dan Informatika', 'Baru'),
('Dep002', 'Departemen Dalam Negeri', 'Baru'),
('Dep003', 'Departemen Energi Dan Sumber Daya Mineral', 'Baru'),
('Dep004', 'Departemen Kesehatan', 'Baru'),
('Dep005', 'Departemen Sosial', 'Baru'),
('Dep006', 'Departemen Perindustrian', 'Baru'),
('Dep007', 'Departemen Pertahanan', 'Baru'),
('Dep008', 'Departemen Pertanian', 'Baru'),
('Dep009', 'Departemen Perdagangan', 'Baru'),
('Dep010', 'Departemen Pendidikan Nasional', 'Baru'),
('Dep011', 'Departemen Perhubungan', 'Baru'),
('Dep012', 'Departemen Pekerjaan Umum', 'Baru'),
('Dep013', 'Departemen Komunikasi Dan Informatika', 'Baru'),
('Dep014', 'Departemen Kelautan Dan Perikanan', 'Baru'),
('Dep015', 'Departemen Produksi', 'Baru'),
('Dep016', 'Departemen Seragam', 'Baru'),
('Dep017', 'Departemen Keuangan', 'Baru'),
('Dep018', 'Departemen Teknologi', 'Baru'),
('Dep019', 'Departemen Kegiatan', 'Baru'),
('Dep020', 'Departemen Hubungan Eksternal', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailkeluar`
--

CREATE TABLE `detailkeluar` (
  `KodeKeluar` varchar(10) NOT NULL,
  `JenisBrg` varchar(25) NOT NULL,
  `NamaBrg` varchar(50) NOT NULL,
  `Size` varchar(5) DEFAULT NULL,
  `JumlahBrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailkeluar`
--

INSERT INTO `detailkeluar` (`KodeKeluar`, `JenisBrg`, `NamaBrg`, `Size`, `JumlahBrg`) VALUES
('P001', 'Seragam', 'Seragam 007', 'S', 2),
('P001', 'Loker', 'Loker 016', NULL, 2),
('P002', 'Tools', 'Hampelas', NULL, 2),
('P002', 'Preused', 'Boots', 'L', 4),
('P002', 'Loker', 'Loker 006', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailkembali`
--

CREATE TABLE `detailkembali` (
  `KodeKembali` varchar(10) NOT NULL,
  `JenisBarang` varchar(25) NOT NULL,
  `NamaBarang` varchar(50) NOT NULL,
  `SizeBarang` varchar(5) NOT NULL,
  `JmlBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailmasuk`
--

CREATE TABLE `detailmasuk` (
  `KodeMasuk` varchar(10) NOT NULL,
  `NamaSupplier` varchar(50) NOT NULL,
  `JenisBrg` varchar(25) NOT NULL,
  `NamaBrg` varchar(50) DEFAULT NULL,
  `JumlahBrg` int(11) NOT NULL,
  `HargaBrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailmasuk`
--

INSERT INTO `detailmasuk` (`KodeMasuk`, `NamaSupplier`, `JenisBrg`, `NamaBrg`, `JumlahBrg`, `HargaBrg`) VALUES
('K001', 'Toko Maju Jaya', 'Seragam', 'Seragam 005', 12, 22),
('K001', 'PT. Matahari Putra Prima Tbk.', 'Seragam', 'Seragam 004', 1, 21),
('K002', 'Barokah Rizki', 'Tools', 'Tang', 2, 24000),
('K002', 'Toko Maju Jaya', 'Seragam', 'Kemeja', 2, 100),
('K002', 'PT. Arya Buana Abadi', 'Seragam', 'Kemeja', 2, 100),
('K002', 'PT. Filia Fashion', 'Loker', 'Loker 003', 2, 12000),
('K002', 'PT. Filia Fashion', 'Preused', 'Sabuk', 2, 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `KodeKaryawan` varchar(50) DEFAULT NULL,
  `NamaKaryawan` varchar(50) DEFAULT NULL,
  `Status` varchar(12) DEFAULT NULL,
  `DepartemenKar` varchar(50) DEFAULT NULL,
  `Picture` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `KodeKaryawan`, `NamaKaryawan`, `Status`, `DepartemenKar`, `Picture`, `email`, `password`, `remember_token`) VALUES
(1, NULL, 'Abraham Alexi Pratama', 'Staff', 'Departemen Komunikasi Dan Informatika', '1.png', 'alex@gmail.com', '$2y$10$xzv/LlHVA6M2ALpMrfRKxu3JBb9EyhBo5FiNu8mUdRt37tTOMvVO2', 'aU8Y3klh5FQndWTYNarurIIo1n77NkSVp794lnFqyJntb68SSARgLQXKJOIg'),
(2, NULL, 'Abraham Reynand', 'Staff', 'Departemen Dalam Negeri', '2.png', 'reyn@gmail.com', '$2y$10$BC.eArFLbaDgCtl8uKWfNOil//ySniWNeeCvuTvAezR/dXlCIFmpy', 'JWRbtFIJuR1ul7RKvQPnNnp9R7sX2JJzJVKH0Hu54bUE5zPeyt8aFPIXm3Jf'),
(3, NULL, 'Achazia Brigit Aharon', 'Staff', 'Departemen Energi Dan Sumber Daya Mineral', '3.png', 'brig@gmail.com', '$2y$10$BFj6d303hp9m1imkOYnrR.XbyxbxDktm14WoVIhzFIIM35stuTrKC', NULL),
(4, NULL, 'Abdullah Abid', 'Staff', 'Departemen Kesehatan', '4.png', 'abid@gmail.com', '$2y$10$i5DSMmDsKYLpSfWPXmglO.qd9C1YBvTjBJgirgcnt30rBcfzqjrgW', NULL),
(5, NULL, 'Bagas Ozora', 'Staff', 'Departemen Sosial', '5.png', 'ozor@gmail.com', '$2y$10$mRT4TdDX/wlb5IMzwu6Q/O9Ksh7prAHMUtA2NUf.55waVzz0Il.XC', NULL),
(6, NULL, 'Bagas Prabaswara Baureksa', 'NonStaff', 'Departemen Perindustrian', '6.png', 'prab@gmail.com', '$2y$10$FnBF/lH4sRTjwfYJIlxwFuZvY.IOoUC76.ih4FP0BJiKfkPHNme06', NULL),
(7, NULL, 'Bagas Fadil Dhiaurraham', 'NonStaff', 'Departemen Pertahanan', '7.png', 'fadi@gmail.com', '$2y$10$sr0pUv77IBCB8aDU5vR1HuB5e9wz1zqDtOqrLK0W0CjVy4nZ/PjXW', NULL),
(8, NULL, 'Bagus Bagaskara', 'NonStaff', 'Departemen Pertanian', '8.png', 'baga@gmail.com', '$2y$10$v2JKeB65rlX5HZJORmYZCuJNZwf6KfVRefNWzbr5CCft.QxOImsQa', NULL),
(9, NULL, 'Darius Edward', 'NonStaff', 'Departemen Perdagangan', '9.png', 'edwa@gmail.com', '$2y$10$9ssETWaSFwkmDWhh0bWXd.Z07hRo2WityBzER.nsiHUSQkcqlhB/O', NULL),
(10, NULL, 'Darka Hastanta', 'NonStaff', 'Departemen Pendidikan Nasional', '10.png', 'hast@gmail.com', '$2y$10$F4oA81haxBnnepmzFsyQoOQy.qcw8NAkeiWM52EgNkjlgJzaz7Xry', NULL),
(11, NULL, 'Darrell Einstain Bastian', 'NonStaff', 'Departemen Perhubungan', '11.png', 'eins@gmail.com', '$2y$10$0rIQYXVhD.qlxXY6ucCl8uMAYyosISEjKnHliwbWqbHrgt/qOgqEe', NULL),
(12, NULL, 'Darsa Jagapati Jasmani', 'NonStaff', 'Departemen Pekerjaan Umum', '12.png', 'jaga@gmail.com', '$2y$10$BtoQmkd3/6T.zUApCTsH2elnbMOffReK58HW8EQuXP3KipIsfSHZC', NULL),
(13, NULL, 'Huanran Aiko Fausta', 'Staff', 'Departemen Komunikasi Dan Informatika', '13.png', 'aiko@gmail.com', '$2y$10$RkJCTLu/PZdiAtJup2JN5eaVnsgy2vYnY3g8z8zks3zvB3AmtAyDa', NULL),
(14, NULL, 'Ikrar Sastra Yogiswara', 'Staff', 'Departemen Kelautan Dan Perikanan', '14.png', 'sast@gmail.com', '$2y$10$L4Z5KaAwl39Uch0joVNIhuJ.HC8zrtVlnG1ioYBnGeLLNws/0o8J2', NULL),
(15, NULL, 'Ilham Abdul Tawwab', 'Staff', 'Departemen Produksi', '15.png', 'abdu@gmail.com', '$2y$10$m/4MyATgiotKnBymhicvl.4A39BErasaAtkXbP2QW0NVDsn8AbnP2', NULL),
(16, NULL, 'Isolde Irvin', 'Staff', 'Departemen Seragam', '16.png', 'irvi@gmail.com', '$2y$10$4Ux9Dn1bgo6Mk9eaErmZdu9v4sFNMmT7pvdzehAycWqSgFSjPqG4S', NULL),
(17, NULL, 'Ivander Nadhif Chaim', 'Staff', 'Departemen Keuangan', '17.png', 'nadh@gmail.com', '$2y$10$KDVcxDTRjhksXxmfQyaYw.hIgHfQap0fPTzoucR887oVzM.39x8ku', NULL),
(18, NULL, 'Nayaka Singgih', 'Staff', 'Departemen Teknologi', '18.png', 'sing@gmail.com', '$2y$10$69/TbtF6HyC7tmGql5DLsua7VOZS36/Y/zmgcXg.BiThlSO1iHLva', NULL),
(19, NULL, 'Nicholas Matius', 'Staff', 'Departemen Kegiatan', '19.png', 'mati@gmail.com', '$2y$10$mEKFlbtqujNIOXzf4E4PE.ti1yYRRAknbj/Km9CusxkkNKH4jNE12', NULL),
(20, NULL, 'Nismara Aryasatya', 'Staff', 'Departemen Hubungan Eksternal', '20.png', 'arya@gmail.com', '$2y$10$xYKjGU6bPOntZ1vgepil.uTZkq.7Z.929a5k5HBfF2UBdjGY/gmRy', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `KodeLoker` varchar(10) NOT NULL,
  `NamaLoker` varchar(50) NOT NULL,
  `Jeniskar` varchar(15) NOT NULL,
  `Keterangan` text NOT NULL,
  `HrgLoker` int(11) DEFAULT NULL,
  `StokLoker` int(11) DEFAULT NULL,
  `StokMasuk` int(11) DEFAULT NULL,
  `StokKeluar` int(11) DEFAULT NULL,
  `StokAkhir` int(11) DEFAULT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`KodeLoker`, `NamaLoker`, `Jeniskar`, `Keterangan`, `HrgLoker`, `StokLoker`, `StokMasuk`, `StokKeluar`, `StokAkhir`, `Picture`) VALUES
('L001', 'Loker 001', 'Subcon', 'Loker Lama', 10000, 63, 236, 97, 202, '1.PNG'),
('L002', 'Loker 002', 'Subcon', 'Loker Lama', 11000, 144, 192, 87, 249, '2.PNG'),
('L003', 'Loker 003', 'Subcon', 'Loker Baru', 12000, 34, 211, 126, 119, '3.PNG'),
('L004', 'Loker 004', 'Subcon', 'Loker Lama', 13000, 288, 315, 83, 520, '4.PNG'),
('L005', 'Loker 005', 'Employee', 'Loker Lama', 14000, 304, 301, 65, 540, '5.PNG'),
('L006', 'Loker 006', 'Subcon', 'Loker Baru', 15000, 238, 205, 50, 393, '6.PNG'),
('L007', 'Loker 007', 'Employee', 'Loker Lama', 16000, 149, 128, 66, 211, '7.PNG'),
('L008', 'Loker 008', 'Employee', 'Loker Baru', 17000, 317, 214, 95, 436, '8.PNG'),
('L009', 'Loker 009', 'Employee', 'Loker Baru', 18000, 138, 277, 98, 317, '9.PNG'),
('L010', 'Loker 010', 'Subcon', 'Loker Lama', 19000, 79, 293, 27, 345, '10.PNG'),
('L011', 'Loker 011', 'Employee', 'Loker Baru', 20000, 155, 192, 121, 226, '11.PNG'),
('L012', 'Loker 012', 'Employee', 'Loker Baru', 21, 348, 275, 77, 546, '12.PNG'),
('L013', 'Loker 013', 'Employee', 'Loker Lama', 22000, 121, 41, 125, 37, '13.PNG'),
('L014', 'Loker 014', 'Employee', 'Loker Lama', 23000, 255, 99, 81, 273, '14.PNG'),
('L015', 'Loker 015', 'Employee', 'Loker Lama', 24000, 134, 350, 65, 419, '15.PNG'),
('L016', 'Loker 016', 'Subcon', 'Loker Lama', 25000, 192, 66, 84, 174, '16.PNG'),
('L017', 'Loker 017', 'Subcon', 'Loker Lama', 26000, 269, 342, 111, 500, '17.PNG'),
('L018', 'Loker 018', 'Employee', 'Loker Baru', 27000, 130, 181, 35, 276, '18.PNG'),
('L019', 'Loker 019', 'Employee', 'Loker Baru', 28000, 350, 273, 43, 580, '19.PNG'),
('L020', 'Loker 020', 'Subcon', 'Loker Baru', 29000, 141, 102, 50, 193, '20.PNG'),
('L021', 'Loker 021', 'Employee', 'Loker Lama', 30000, 60, 219, 79, 200, '21.PNG'),
('L022', 'Loker 022', 'Employee', 'Loker Lama', 31000, 51, 89, 120, 20, '22.PNG'),
('L023', 'Loker 023', 'Subcon', 'Loker Baru', 32000, 113, 184, 62, 235, '23.PNG'),
('L024', 'Loker 024', 'Employee', 'Loker Baru', 33000, 295, 31, 84, 242, '24.PNG'),
('L025', 'Loker 025', 'Employee', 'Loker Lama', 34000, 73, 320, 135, 258, '25.PNG'),
('L026', 'Loker 026', 'Employee', 'Loker Lama', 35000, 225, 222, 132, 315, '26.PNG'),
('L027', 'Loker 027', 'Employee', 'Loker Baru', 36000, 340, 89, 150, 279, '27.PNG'),
('L028', 'Loker 028', 'Subcon', 'Loker Baru', 37000, 234, 266, 76, 424, '28.PNG'),
('L029', 'Loker 029', 'Subcon', 'Loker Lama', 38000, 155, 113, 95, 173, '29.PNG'),
('L030', 'Loker 030', 'Employee', 'Loker Lama', 39000, 160, 314, 86, 388, '30.PNG'),
('L031', 'Loker 031', 'Employee', 'Loker Lama', 40000, 235, 94, 134, 195, '31.PNG'),
('L032', 'Loker 032', 'Subcon', 'Loker Lama', 41000, 77, 306, 70, 313, '32.PNG'),
('L033', 'Loker 033', 'Employee', 'Loker Lama', 42000, 296, 339, 108, 527, '33.PNG'),
('L034', 'Loker 034', 'Subcon', 'Loker Lama', 43000, 224, 271, 36, 459, '34.PNG'),
('L035', 'Loker 035', 'Subcon', 'Loker Lama', 44000, 305, 304, 147, 462, '35.PNG'),
('L036', 'Loker 036', 'Subcon', 'Loker Baru', 45000, 204, 86, 62, 228, '36.PNG'),
('L037', 'Loker 037', 'Employee', 'Loker Lama', 46000, 160, 79, 139, 100, '37.PNG'),
('L038', 'Loker 038', 'Subcon', 'Loker Baru', 47000, 126, 88, 85, 129, '38.PNG'),
('L039', 'Loker 039', 'Employee', 'Loker Lama', 48000, 183, 194, 88, 289, '39.PNG'),
('L040', 'Loker 040', 'Employee', 'Loker Lama', 49000, 79, 242, 59, 262, '40.PNG'),
('L041', 'Loker 041', 'Subcon', 'Loker Lama', 50000, 33, 33, 35, 31, '41.PNG'),
('L042', 'Loker 042', 'Employee', 'Loker Baru', 51000, 44, 227, 98, 173, '42.PNG'),
('L043', 'Loker 043', 'Employee', 'Loker Baru', 52000, 135, 111, 65, 181, '43.PNG'),
('L044', 'Loker 044', 'Employee', 'Loker Lama', 53000, 209, 175, 135, 249, '44.PNG'),
('L045', 'Loker 045', 'Subcon', 'Loker Lama', 54000, 30, 243, 86, 187, '45.PNG'),
('L046', 'Loker 046', 'Subcon', 'Loker Baru', 55000, 219, 114, 84, 249, '46.PNG'),
('L047', 'Loker 047', 'Employee', 'Loker Baru', 56000, 187, 88, 63, 212, '47.PNG'),
('L048', 'Loker 048', 'Employee', 'Loker Baru', 57000, 103, 91, 83, 111, '48.PNG'),
('L049', 'Loker 049', 'Employee', 'Loker Baru', 58000, 301, 225, 32, 494, '49.PNG'),
('L050', 'Loker 050', 'Subcon', 'Loker Baru', 59000, 349, 338, 53, 634, '50.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_05_025844_laratrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'add-user', 'add-user', 'Tambah User', '2017-06-04 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `preused`
--

CREATE TABLE `preused` (
  `KodePreused` varchar(10) NOT NULL,
  `NamaPreused` varchar(50) NOT NULL,
  `JenisKar` varchar(15) NOT NULL,
  `Status` varchar(12) NOT NULL,
  `Ukuran` varchar(2) NOT NULL,
  `Keterangan` text NOT NULL,
  `HrgPreused` int(11) DEFAULT NULL,
  `StokPreused` int(11) DEFAULT NULL,
  `StokMasuk` int(11) DEFAULT NULL,
  `StokKeluar` int(11) DEFAULT NULL,
  `StokAkhir` int(11) DEFAULT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `preused`
--

INSERT INTO `preused` (`KodePreused`, `NamaPreused`, `JenisKar`, `Status`, `Ukuran`, `Keterangan`, `HrgPreused`, `StokPreused`, `StokMasuk`, `StokKeluar`, `StokAkhir`, `Picture`) VALUES
('P001', 'Kemeja', 'OJT', 'null', 'S', 'Preused', 10000, 291, 144, 135, 300, '1.PNG'),
('P002', 'Celana', 'OJT', 'null', 'S', 'Preused', 11000, 144, 122, 60, 206, '2.PNG'),
('P003', 'Sepatu', 'Employee', 'Staff', 'S', 'Preused', 12, 58, 344, 85, 317, '3.PNG'),
('P004', 'Sabuk', 'Subcon', 'Staff', 'XL', 'Preused', 13000, 270, 202, 136, 336, '4.PNG'),
('P005', 'Topi', 'Subcon', 'null', 'XL', 'Preused', 14, 228, 269, 48, 449, '5.PNG'),
('P006', 'Katelpak', 'Subcon', 'Staff', 'XL', 'Preused', 15000, 236, 44, 88, 192, '6.PNG'),
('P007', 'Boots', 'Employee', 'NonStaff', 'L', 'Preused', 16000, 292, 95, 63, 324, '7.PNG'),
('P008', 'Kaos Kaki', 'Employee', 'null', 'XL', 'Preused', 17000, 287, 183, 77, 393, '8.PNG'),
('P009', 'Seragam Preused', 'Subcon', 'Staff', 'XL', 'Preused', 18000, 301, 105, 27, 379, '9.PNG'),
('P010', 'Kemeja', 'Subcon', 'Staff', 'XL', 'Preused', 19000, 118, 79, 100, 97, '10.PNG'),
('P011', 'Celana', 'OJT', 'NonStaff', 'XL', 'Preused', 20000, 106, 170, 72, 204, '11.PNG'),
('P012', 'Sepatu', 'Employee', 'NonStaff', 'S', 'Preused', 21000, 178, 207, 46, 339, '12.PNG'),
('P013', 'Sabuk', 'Employee', 'null', 'XL', 'Preused', 22000, 111, 106, 58, 159, '13.PNG'),
('P014', 'Topi', 'OJT', 'NonStaff', 'L', 'Preused', 23000, 231, 89, 134, 186, '14.PNG'),
('P015', 'Katelpak', 'Subcon', 'NonStaff', 'XL', 'Preused', 24000, 221, 174, 43, 352, '15.PNG'),
('P016', 'Boots', 'Subcon', 'null', 'L', 'Preused', 25000, 120, 279, 83, 316, '16.PNG'),
('P017', 'Kaos Kaki', 'Employee', 'null', 'XL', 'Preused', 26000, 173, 297, 43, 427, '17.PNG'),
('P018', 'Seragam Preused', 'Employee', 'null', 'XL', 'Preused', 27000, 197, 46, 40, 203, '18.PNG'),
('P019', 'Kemeja', 'Subcon', 'Staff', 'XL', 'Preused', 28000, 121, 93, 136, 78, '19.PNG'),
('P020', 'Celana', 'Subcon', 'NonStaff', 'L', 'Preused', 29000, 111, 201, 86, 226, '20.PNG'),
('P021', 'Sepatu', 'Subcon', 'NonStaff', 'S', 'Preused', 30000, 29, 89, 59, 59, '21.PNG'),
('P022', 'Sabuk', 'Employee', 'NonStaff', 'XL', 'Preused', 31000, 85, 58, 84, 59, '22.PNG'),
('P023', 'Topi', 'OJT', 'null', 'XL', 'Preused', 32000, 207, 310, 126, 391, '23.PNG'),
('P024', 'Katelpak', 'Subcon', 'NonStaff', 'XL', 'Preused', 33000, 207, 149, 29, 327, '24.PNG'),
('P025', 'Boots', 'Subcon', 'Staff', 'S', 'Preused', 34000, 190, 59, 78, 171, '25.PNG'),
('P026', 'Kaos Kaki', 'Employee', 'Staff', 'L', 'Preused', 35000, 80, 233, 148, 165, '26.PNG'),
('P027', 'Seragam Preused', 'OJT', 'null', 'XL', 'Preused', 36000, 246, 118, 79, 285, '27.PNG'),
('P028', 'Kemeja', 'Subcon', 'NonStaff', 'L', 'Preused', 37000, 154, 313, 29, 438, '28.PNG'),
('P029', 'Celana', 'Subcon', 'NonStaff', 'S', 'Preused', 38000, 121, 49, 121, 49, '29.PNG'),
('P030', 'Sepatu', 'Subcon', 'null', 'S', 'Preused', 39000, 66, 254, 42, 278, '30.PNG'),
('P031', 'Sabuk', 'Employee', 'Staff', 'S', 'Preused', 40000, 225, 33, 32, 226, '31.PNG'),
('P032', 'Topi', 'OJT', 'null', 'S', 'Preused', 41000, 322, 219, 148, 393, '32.PNG'),
('P033', 'Katelpak', 'Subcon', 'Staff', 'L', 'Preused', 42000, 87, 234, 130, 191, '33.PNG'),
('P034', 'Boots', 'Employee', 'Staff', 'L', 'Preused', 43000, 336, 346, 130, 552, '34.PNG'),
('P035', 'Kaos Kaki', 'Subcon', 'Staff', 'L', 'Preused', 44000, 203, 349, 73, 479, '35.PNG'),
('P036', 'Seragam Preused', 'Employee', 'null', 'L', 'Preused', 45000, 34, 99, 98, 35, '36.PNG'),
('P037', 'Kemeja', 'OJT', 'NonStaff', 'XL', 'Preused', 46000, 267, 89, 30, 326, '37.PNG'),
('P038', 'Celana', 'Employee', 'Staff', 'S', 'Preused', 47000, 245, 59, 48, 256, '38.PNG'),
('P039', 'Sepatu', 'OJT', 'NonStaff', 'L', 'Preused', 48000, 296, 293, 89, 500, '39.PNG'),
('P040', 'Sabuk', 'Subcon', 'NonStaff', 'L', 'Preused', 49000, 55, 179, 145, 89, '40.PNG'),
('P041', 'Topi', 'Employee', 'Staff', 'L', 'Preused', 50000, 314, 306, 57, 563, '41.PNG'),
('P042', 'Katelpak', 'OJT', 'NonStaff', 'L', 'Preused', 51000, 233, 65, 79, 219, '42.PNG'),
('P043', 'Boots', 'Subcon', 'NonStaff', 'S', 'Preused', 52000, 271, 277, 135, 413, '43.PNG'),
('P044', 'Kaos Kaki', 'Employee', 'null', 'L', 'Preused', 53000, 41, 221, 52, 210, '44.PNG'),
('P045', 'Seragam Preused', 'OJT', 'NonStaff', 'XL', 'Preused', 54000, 195, 344, 146, 393, '45.PNG'),
('P046', 'Kemeja', 'OJT', 'Staff', 'XL', 'Preused', 55000, 98, 73, 25, 146, '46.PNG'),
('P047', 'Celana', 'Subcon', 'null', 'XL', 'Preused', 56000, 190, 302, 148, 344, '47.PNG'),
('P048', 'Sepatu', 'OJT', 'Staff', 'XL', 'Preused', 57000, 313, 165, 83, 395, '48.PNG'),
('P049', 'Sabuk', 'Employee', 'null', 'S', 'Preused', 58000, 77, 248, 56, 269, '49.PNG'),
('P050', 'Topi', 'Employee', 'Staff', 'L', 'Preused', 59000, 112, 212, 55, 269, '50.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2017-06-04 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `user_type`) VALUES
(1, 1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seragam`
--

CREATE TABLE `seragam` (
  `KodeSeragam` varchar(10) NOT NULL,
  `NamaSeragam` varchar(50) DEFAULT NULL,
  `JenisKar` varchar(15) DEFAULT NULL,
  `Status` varchar(12) NOT NULL,
  `Ukuran` varchar(2) NOT NULL,
  `Keterangan` text,
  `HrgSeragam` int(11) DEFAULT NULL,
  `StokSeragam` int(11) DEFAULT NULL,
  `StokMasuk` int(11) DEFAULT NULL,
  `StokKeluar` int(11) DEFAULT NULL,
  `StokAkhir` int(11) DEFAULT NULL,
  `Picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seragam`
--

INSERT INTO `seragam` (`KodeSeragam`, `NamaSeragam`, `JenisKar`, `Status`, `Ukuran`, `Keterangan`, `HrgSeragam`, `StokSeragam`, `StokMasuk`, `StokKeluar`, `StokAkhir`, `Picture`) VALUES
('A0111', 'Baju', 'OJT', 'Staff', 'S', 'Baju Lengkap', 10, 12, 6, 2, 16, '1496373553.jpg'),
('S001', 'Kemeja', 'Employee', 'NonStaff', 'S', 'Baru', 100, 205, 280, 33, 452, '1.PNG'),
('S002', 'Celana', 'OJT', 'NonStaff', 'XL', 'Baru', 11, 44, 350, 43, 351, '2.PNG'),
('S003', 'Sepatu', 'OJT', 'null', 'L', 'Baru', 12000, 26, 27, 37, 16, '3.PNG'),
('S004', 'Sabuk', 'Subcon', 'Staff', 'L', 'Baru', 13, 264, 350, 40, 574, '4.PNG'),
('S005', 'Topi', 'Employee', 'NonStaff', 'L', 'Baru', 14, 143, 287, 29, 401, '5.PNG'),
('S006', 'Katelpak', 'Subcon', 'NonStaff', 'S', 'Baru', 15, 332, 172, 47, 457, '6.PNG'),
('S007', 'Boots', 'OJT', 'Staff', 'L', 'Baru', 16, 30, 154, 33, 151, '7.PNG'),
('S008', 'Kaos Kaki', 'Employee', 'null', 'XL', 'Baru', 17000, 261, 235, 58, 438, '8.PNG'),
('S009', 'Seragam 001', 'OJT', 'Staff', 'L', 'Baru', 18000, 161, 99, 47, 213, '9.PNG'),
('S010', 'Seragam 002', 'Subcon', 'null', 'S', 'Baru', 19, 73, 107, 48, 132, '10.PNG'),
('S011', 'Seragam 003', 'OJT', 'null', 'S', 'Baru', 20, 112, 323, 51, 384, '11.PNG'),
('S012', 'Seragam 004', 'Subcon', 'Staff', 'XL', 'Baru', 21, 113, 112, 49, 176, '12.PNG'),
('S013', 'Seragam 005', 'Employee', 'null', 'L', 'Baru', 22, 239, 266, 38, 467, '13.PNG'),
('S014', 'Seragam 006', 'Employee', 'Staff', 'L', 'Baru', 23000, 325, 37, 49, 313, '14.PNG'),
('S015', 'Seragam 007', 'Subcon', 'null', 'S', 'Baru', 24000, 142, 164, 50, 256, '15.PNG'),
('S016', 'Seragam 008', 'Subcon', 'NonStaff', 'XL', 'Baru', 25000, 44, 342, 41, 345, '16.PNG'),
('S017', 'Seragam 009', 'Subcon', 'Staff', 'XL', 'Baru', 26, 295, 349, 37, 607, '17.PNG'),
('S018', 'Seragam 010', 'Subcon', 'null', 'S', 'Baru', 27000, 126, 213, 27, 312, '18.PNG'),
('S019', 'Seragam 011', 'OJT', 'Staff', 'L', 'Baru', 28000, 42, 230, 49, 223, '19.PNG'),
('S020', 'Seragam 012', 'Employee', 'Staff', 'S', 'Baru', 29000, 47, 236, 39, 244, '20.PNG'),
('S021', 'Seragam 013', 'Subcon', 'NonStaff', 'L', 'Baru', 30000, 255, 191, 30, 416, '21.PNG'),
('S022', 'Seragam 014', 'Subcon', 'NonStaff', 'XL', 'Baru', 31000, 105, 346, 32, 419, '22.PNG'),
('S023', 'Seragam 015', 'OJT', 'Staff', 'XL', 'Baru', 32000, 86, 272, 44, 314, '23.PNG'),
('S024', 'Seragam 016', 'Subcon', 'null', 'XL', 'Baru', 33000, 313, 137, 29, 421, '24.PNG'),
('S025', 'Seragam 017', 'Employee', 'NonStaff', 'XL', 'Baru', 34000, 103, 208, 35, 276, '25.PNG'),
('S026', 'Seragam 018', 'Employee', 'NonStaff', 'L', 'Baru', 35000, 117, 173, 40, 250, '26.PNG'),
('S027', 'Seragam 019', 'Subcon', 'NonStaff', 'L', 'Baru', 36000, 30, 171, 41, 160, '27.PNG'),
('S028', 'Seragam 020', 'Employee', 'Staff', 'XL', 'Baru', 37000, 143, 162, 36, 269, '28.PNG'),
('S029', 'Seragam 021', 'OJT', 'NonStaff', 'L', 'Baru', 38000, 295, 329, 29, 595, '29.PNG'),
('S030', 'Seragam 022', 'OJT', 'null', 'XL', 'Baru', 39000, 297, 66, 48, 315, '30.PNG'),
('S031', 'Seragam 023', 'OJT', 'NonStaff', 'S', 'Baru', 40000, 102, 53, 32, 123, '31.PNG'),
('S032', 'Seragam 024', 'Employee', 'Staff', 'S', 'Baru', 41000, 76, 58, 28, 106, '32.PNG'),
('S033', 'Seragam 025', 'Subcon', 'NonStaff', 'S', 'Baru', 42000, 326, 243, 48, 521, '33.PNG'),
('S034', 'Seragam 026', 'OJT', 'NonStaff', 'S', 'Baru', 43000, 301, 199, 43, 457, '34.PNG'),
('S035', 'Seragam 027', 'OJT', 'NonStaff', 'L', 'Baru', 44000, 257, 102, 38, 321, '35.PNG'),
('S036', 'Seragam 028', 'Employee', 'NonStaff', 'S', 'Baru', 45000, 243, 136, 26, 353, '36.PNG'),
('S037', 'Seragam 029', 'Subcon', 'Staff', 'XL', 'Baru', 46000, 64, 319, 47, 336, '37.PNG'),
('S038', 'Seragam 030', 'Subcon', 'Staff', 'L', 'Baru', 47000, 265, 107, 43, 329, '38.PNG'),
('S039', 'Seragam 031', 'Employee', 'Staff', 'L', 'Baru', 48000, 252, 190, 38, 404, '39.PNG'),
('S040', 'Seragam 032', 'Employee', 'null', 'S', 'Baru', 49000, 270, 218, 31, 457, '40.PNG'),
('S041', 'Seragam 033', 'Employee', 'Staff', 'XL', 'Baru', 50000, 181, 101, 45, 237, '41.PNG'),
('S042', 'Seragam 034', 'Employee', 'Staff', 'S', 'Baru', 51000, 212, 342, 33, 521, '42.PNG'),
('S043', 'Seragam 035', 'OJT', 'Staff', 'XL', 'Baru', 52000, 74, 164, 45, 193, '43.PNG'),
('S044', 'Seragam 036', 'OJT', 'Staff', 'L', 'Baru', 53000, 346, 194, 39, 501, '44.PNG'),
('S045', 'Seragam 037', 'OJT', 'null', 'S', 'Baru', 54000, 344, 243, 39, 548, '45.PNG'),
('S046', 'Seragam 038', 'Employee', 'Staff', 'XL', 'Baru', 55000, 28, 214, 48, 194, '46.PNG'),
('S047', 'Seragam 039', 'Employee', 'Staff', 'L', 'Baru', 56000, 99, 123, 47, 175, '47.PNG'),
('S048', 'Seragam 040', 'OJT', 'Staff', 'S', 'Baru', 57000, 258, 191, 33, 416, '48.PNG'),
('S049', 'Seragam 041', 'Subcon', 'null', 'XL', 'Baru', 58000, 170, 148, 36, 282, '49.PNG'),
('S050', 'Seragam 042', 'Subcon', 'NonStaff', 'XL', 'Baru', 59000, 316, 106, 44, 378, '50.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `KodeSupplier` varchar(10) NOT NULL,
  `NamaSupplier` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `KotaSupplier` varchar(25) NOT NULL,
  `Picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`KodeSupplier`, `NamaSupplier`, `Keterangan`, `Alamat`, `KotaSupplier`, `Picture`) VALUES
('SU01', 'Toko Maju Jaya', 'Perusahaan Celana', 'Jalan Manukan', 'Surabaya', '1.PNG'),
('SU02', 'PT. Matahari Putra Prima Tbk.', 'Perusahaan Baju', 'JL. Srigunting Raya No.1', 'Malang', '2.PNG'),
('SU03', 'PT. Arya Buana Abadi', 'Perusahaan Obeng', 'JL. Cisaranten Kulon', 'Jakarta', '3.PNG'),
('SU04', 'PT. Filia Fashion', 'Perusahaan Obeng', 'JL. A H Nasution No. 14', 'Bandung', '4.PNG'),
('SU05', 'Toko Natasya Collection', 'Perusahaan Obeng', 'JL. Bojongloa No.69', 'Semarang', '5.PNG'),
('SU06', 'Toko Yoim Store', 'Perusahaan Celana', 'JL. Babakan Ciparay', 'Yogyakarta', '6.PNG'),
('SU07', 'UD. F & F Production', 'Perusahaan Obeng', 'JL. Holis No.210/191', 'Surabaya', '7.PNG'),
('SU08', 'Barokah Rizki', 'Perusahaan Celana', 'JL. Batununggal', 'Malang', '8.PNG'),
('SU09', 'PT PT. FACHRIAN AKBAR', 'Perusahaan Celana', 'JL. Venus No. 6', 'Magelag', '9.PNG'),
('SU10', 'CV. Anugrah Insan Mandiri', 'Perusahaan Baju', 'JL. Taman Sari No.49', 'Tulung Agung', '10.PNG'),
('SU11', 'PT PRATAMA MANDIRI', 'Perusahaan Katelpak', 'Jl. KH. Wahid Hasyim', 'Makasar', '11.PNG'),
('SU12', 'CV. Java Centra', 'Perusahaan Obeng', 'JL. Cijawura Hilir No. 64', 'Sukabumi', '12.PNG'),
('SU13', 'PT Rupa Rupa Seragam', 'Perusahaan Baju', 'JL. Leuwi Panjang / Kebon Lega', 'Tasikmalaya', '13.PNG'),
('SU14', 'PT Anugerah raya karya mandiri', 'Perusahaan Celana', 'Jalan Raya Cigadung Selatan Nomor 100 C', 'Banjar', '14.PNG'),
('SU15', 'CV. Indosemeru Group', 'Perusahaan Baju', 'JL. Sukasenang No.11', 'Magelang', '15.PNG'),
('SU16', 'Supplier 015', 'Perusahaan Obeng', 'JL. Manisi No.13', 'Pekalongan', '16.PNG'),
('SU17', 'Supplier 016', 'Perusahaan Celana', 'JL. Purabaya No.1', 'Purwokerto', '17.PNG'),
('SU18', 'Supplier 017', 'Perusahaan Katelpak', 'JL. Hegarmanah Tengah No.1', 'Salatiga', '18.PNG'),
('SU19', 'Supplier 018', 'Perusahaan Obeng', 'JL.Jendral A.H. Nasution No. 82', 'Semarang', '19.PNG'),
('SU20', 'Supplier 019', 'Perusahaan Obeng', 'JL. Sangkuriang No. 10a', 'Surakarta', '20.PNG'),
('SU21', 'Supplier 020', 'Perusahaan Obeng', 'JL. Babakan Sari No. 117', 'Tegal', '21.PNG'),
('SU22', 'Supplier 021', 'Perusahaan Celana', 'JL. Talaga Bodas No.35', 'Batu', '22.PNG'),
('SU23', 'Supplier 022', 'Perusahaan Obeng', 'Jl. Soekarno Hatta KM 12,5', 'Blitar', '23.PNG'),
('SU24', 'Supplier 023', 'Perusahaan Celana', 'JL. Santosa Asih No.17', 'Kediri', '24.PNG'),
('SU25', 'Supplier 024', 'Perusahaan Katelpak', 'JL. Sukamulya No.4', 'Madiun', '25.PNG'),
('SU26', 'Supplier 025', 'Perusahaan Katelpak', 'JL. Denki No. 54', 'Malang', '26.PNG'),
('SU27', 'Supplier 026', 'Perusahaan Celana', 'JL. Lombok No.6', 'Mojokerto', '27.PNG'),
('SU28', 'Supplier 027', 'Perusahaan Baju', 'JL. Gegerkalong Hilir', 'Pasuruan', '28.PNG'),
('SU29', 'Supplier 028', 'Perusahaan Obeng', 'JL. Alun – Alun Utara', 'Probolinggo', '29.PNG'),
('SU30', 'Supplier 029', 'Perusahaan Katelpak', 'Jalan Supplier 001', 'Surabaya', '30.PNG'),
('SU31', 'Supplier 030', 'Perusahaan Celana', 'Jalan Supplier 002', 'Pontianak', '31.PNG'),
('SU32', 'Supplier 031', 'Perusahaan Loker', 'Jalan Supplier 003', 'Singkawang', '32.PNG'),
('SU33', 'Supplier 032', 'Perusahaan Celana', 'Jalan Supplier 004', 'Banjarbaru', '33.PNG'),
('SU34', 'Supplier 033', 'Perusahaan Celana', 'Jalan Supplier 005', 'Banjarmasin', '34.PNG'),
('SU35', 'Supplier 034', 'Perusahaan Loker', 'Jalan Supplier 006', 'Palangkaraya', '35.PNG'),
('SU36', 'Supplier 035', 'Perusahaan Baju', 'Jalan Supplier 007', 'Balikpapan', '36.PNG'),
('SU37', 'Supplier 036', 'Perusahaan Katelpak', 'Jalan Supplier 008', 'Bontang', '37.PNG'),
('SU38', 'Supplier 037', 'Perusahaan Baju', 'Jalan Supplier 009', 'Samarinda', '38.PNG'),
('SU39', 'Supplier 038', 'Perusahaan Baju', 'Jalan Supplier 010', 'Tarakan', '39.PNG'),
('SU40', 'Supplier 039', 'Perusahaan Katelpak', 'Jalan Supplier 011', 'Batam', '40.PNG'),
('SU41', 'Supplier 040', 'Perusahaan Celana', 'Jalan Supplier 012', 'Tanjungpinang', '41.PNG'),
('SU42', 'Supplier 041', 'Perusahaan Obeng', 'Jalan Supplier 013', 'Bandar Lampung', '42.PNG'),
('SU43', 'Supplier 042', 'Perusahaan Loker', 'Jalan Supplier 014', 'Kotabumi', '43.PNG'),
('SU44', 'Supplier 043', 'Perusahaan Katelpak', 'Jalan Supplier 015', 'Liwa', '44.PNG'),
('SU45', 'Supplier 044', 'Perusahaan Obeng', 'Jalan Supplier 016', 'Metro', '45.PNG'),
('SU46', 'Supplier 045', 'Perusahaan Baju', 'Jalan Supplier 017', 'Ternate', '46.PNG'),
('SU47', 'Supplier 046', 'Perusahaan Loker', 'Jalan Supplier 018', 'Sawahlunto', '47.PNG'),
('SU48', 'Supplier 047', 'Perusahaan Celana', 'Jalan Supplier 019', 'Solok', '48.PNG'),
('SU49', 'Supplier 048', 'Perusahaan Baju', 'Jalan Supplier 020', 'Lubuklinggau', '49.PNG'),
('SU50', 'Supplier 049', 'Perusahaan Celana', 'Jalan Supplier 021', 'Pagaralam', '50.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools`
--

CREATE TABLE `tools` (
  `KodeTools` varchar(10) NOT NULL,
  `NamaTools` varchar(50) NOT NULL,
  `JenisKar` varchar(15) DEFAULT NULL,
  `Keterangan` text NOT NULL,
  `HrgTools` int(11) DEFAULT NULL,
  `StokTools` int(11) DEFAULT NULL,
  `StokMasuk` int(11) DEFAULT NULL,
  `StokKeluar` int(11) DEFAULT NULL,
  `StokAkhir` int(11) DEFAULT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tools`
--

INSERT INTO `tools` (`KodeTools`, `NamaTools`, `JenisKar`, `Keterangan`, `HrgTools`, `StokTools`, `StokMasuk`, `StokKeluar`, `StokAkhir`, `Picture`) VALUES
('T001', 'Obeng Plus', 'Employee', 'Lama', 10000, 188, 181, 81, 288, '1.PNG'),
('T002', 'Baut', 'Employee', 'Baru', 11000, 259, 346, 141, 464, '2.PNG'),
('T003', 'Gergaji', 'Subcon', 'Lama', 12000, 322, 126, 29, 419, '3.PNG'),
('T004', 'Paku', 'Employee', 'Baru', 13000, 332, 72, 94, 310, '4.PNG'),
('T005', 'Palu', 'Employee', 'Baru', 14000, 147, 40, 120, 67, '5.PNG'),
('T006', 'Gergaji Besi', 'Subcon', 'Lama', 15000, 182, 303, 119, 366, '6.PNG'),
('T007', 'Obeng Minus', 'Subcon', 'Baru', 16000, 221, 136, 105, 252, '7.PNG'),
('T008', 'Kapak', 'Employee', 'Baru', 17000, 335, 217, 114, 438, '8.PNG'),
('T009', 'Gunting', 'Employee', 'Baru', 18000, 304, 52, 61, 295, '9.PNG'),
('T010', 'Mata Bor', 'Subcon', 'Baru', 19000, 112, 27, 32, 107, '10.PNG'),
('T011', 'Palu', 'Subcon', 'Lama', 20000, 59, 230, 60, 229, '11.PNG'),
('T012', 'Obeng', 'Subcon', 'Baru', 21000, 55, 255, 143, 167, '12.PNG'),
('T013', 'Obeng Kembang', 'Subcon', 'Lama', 22000, 74, 39, 121, -8, '13.PNG'),
('T014', 'Kunci Putaran', 'Employee', 'Lama', 23000, 39, 215, 97, 157, '14.PNG'),
('T015', 'Tang', 'Employee', 'Lama', 24000, 87, 284, 74, 297, '15.PNG'),
('T016', 'Gergaji besi', 'Employee', 'Lama', 25000, 114, 75, 69, 120, '16.PNG'),
('T017', 'Kapak kayu', 'Employee', 'Baru', 26000, 163, 325, 101, 387, '17.PNG'),
('T018', 'Kunci inggris', 'Subcon', 'Baru', 27000, 237, 255, 83, 409, '18.PNG'),
('T019', 'Gergaji', 'Subcon', 'Lama', 28000, 43, 188, 88, 143, '19.PNG'),
('T020', 'Bor tangan', 'Subcon', 'Lama', 29000, 196, 73, 103, 166, '20.PNG'),
('T021', 'Penjepit', 'Subcon', 'Baru', 30000, 284, 214, 81, 417, '21.PNG'),
('T022', 'Pahat', 'Subcon', 'Lama', 31000, 167, 265, 62, 370, '22.PNG'),
('T023', 'Alat pengerik', 'Employee', 'Lama', 32000, 338, 52, 121, 269, '23.PNG'),
('T024', 'Catok', 'Employee', 'Lama', 33000, 48, 103, 66, 85, '24.PNG'),
('T025', 'Bor listrik', 'Employee', 'Lama', 34000, 155, 96, 130, 121, '25.PNG'),
('T026', 'Mata bor', 'Employee', 'Baru', 35000, 220, 267, 127, 360, '26.PNG'),
('T027', 'Gergaji Mesin', 'Employee', 'Lama', 36000, 325, 249, 81, 493, '27.PNG'),
('T028', 'Timbangan datar', 'Subcon', 'Baru', 37000, 37, 64, 58, 43, '28.PNG'),
('T029', 'Pengetam', 'Employee', 'Lama', 38000, 277, 31, 60, 248, '29.PNG'),
('T030', 'Kotak perkekas', 'Subcon', 'Lama', 39000, 238, 106, 103, 241, '30.PNG'),
('T031', 'Tempat Cat', 'Subcon', 'Lama', 40000, 169, 144, 65, 248, '31.PNG'),
('T032', 'Kuas Rol', 'Subcon', 'Lama', 41000, 210, 263, 32, 441, '32.PNG'),
('T033', 'Kuas', 'Employee', 'Lama', 42000, 188, 290, 123, 355, '33.PNG'),
('T034', 'Cat', 'Subcon', 'Baru', 43000, 134, 278, 87, 325, '34.PNG'),
('T035', 'Thinner', 'Subcon', 'Lama', 44000, 98, 46, 124, 20, '35.PNG'),
('T036', 'Hampelas', 'Employee', 'Baru', 45000, 339, 327, 54, 612, '36.PNG'),
('T037', 'Kabel', 'Subcon', 'Lama', 46000, 26, 56, 142, -60, '37.PNG'),
('T038', 'Paku', 'Subcon', 'Lama', 47000, 275, 106, 41, 340, '38.PNG'),
('T039', 'Sekrup', 'Subcon', 'Lama', 48000, 83, 166, 25, 224, '39.PNG'),
('T040', 'Ring', 'Subcon', 'Lama', 49000, 242, 136, 30, 348, '40.PNG'),
('T041', 'Baut', 'Subcon', 'Lama', 50000, 71, 276, 117, 230, '41.PNG'),
('T042', 'Mur', 'Employee', 'Baru', 51000, 236, 31, 99, 168, '42.PNG'),
('T043', 'Pisau', 'Employee', 'Baru', 52000, 101, 180, 97, 184, '43.PNG'),
('T044', 'Bor listrik', 'Employee', 'Baru', 53000, 334, 120, 26, 428, '44.PNG'),
('T045', 'Bor tangan', 'Subcon', 'Baru', 54000, 281, 200, 29, 452, '45.PNG'),
('T046', 'Kalkulator', 'Subcon', 'Lama', 55000, 110, 161, 142, 129, '46.PNG'),
('T047', 'Jangka Sorong', 'Subcon', 'Lama', 56000, 187, 299, 122, 364, '47.PNG'),
('T048', 'Combo Stapler', 'Subcon', 'Baru', 57000, 349, 343, 84, 608, '48.PNG'),
('T049', 'Pensil', 'Employee', 'Baru', 58000, 52, 139, 34, 157, '49.PNG'),
('T050', 'Lem', 'Subcon', 'Lama', 59000, 82, 284, 30, 336, '50.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksikeluar`
--

CREATE TABLE `transaksikeluar` (
  `KodeKeluar` varchar(10) NOT NULL,
  `NamaKaryawan` varchar(50) NOT NULL,
  `NamaDepartemen` varchar(50) NOT NULL,
  `Tgl_Pinjam` date NOT NULL,
  `Tgl_Kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksikeluar`
--

INSERT INTO `transaksikeluar` (`KodeKeluar`, `NamaKaryawan`, `NamaDepartemen`, `Tgl_Pinjam`, `Tgl_Kembali`) VALUES
('P001', 'Ikrar Sastra Yogiswara', 'Departemen Kelautan Dan Perikanan', '2017-06-04', '2017-06-15'),
('P002', 'Abraham Alexi Pratama', 'Departemen Komunikasi Dan Informatika', '2017-06-04', '2017-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksikembali`
--

CREATE TABLE `transaksikembali` (
  `KodeKembali` varchar(10) NOT NULL,
  `Tgl_Pinjam` date NOT NULL,
  `Tgl_Kembali` date NOT NULL,
  `Tgl_Pengembalian` datetime NOT NULL,
  `NamaKaryawan` varchar(50) NOT NULL,
  `NamaDepartemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksimasuk`
--

CREATE TABLE `transaksimasuk` (
  `KodeMasuk` varchar(10) NOT NULL,
  `Tgl_Masuk` date NOT NULL,
  `GrandTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksimasuk`
--

INSERT INTO `transaksimasuk` (`KodeMasuk`, `Tgl_Masuk`, `GrandTotal`) VALUES
('K001', '2017-06-04', 285),
('K002', '2017-06-08', 98400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adit', 'adit@gmail.com', '$2y$10$gOHD18w5JDaMi2zK6etVnucNOVCiO3RdIMzHkeRDfepXK6N2CaY8C', 'jICnEbJbEM13oeYTXaXhs3rvh6mIrQFw6a6uiHPXu6q8nAMTl408OYYCZZqs', '2017-03-24 03:25:30', '2017-03-24 03:25:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`KodeDepartemen`);

--
-- Indexes for table `detailmasuk`
--
ALTER TABLE `detailmasuk`
  ADD KEY `KodeMasuk` (`KodeMasuk`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`KodeLoker`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`permission_id`,`user_id`,`user_type`);

--
-- Indexes for table `preused`
--
ALTER TABLE `preused`
  ADD PRIMARY KEY (`KodePreused`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `seragam`
--
ALTER TABLE `seragam`
  ADD PRIMARY KEY (`KodeSeragam`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`KodeSupplier`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`KodeTools`);

--
-- Indexes for table `transaksikeluar`
--
ALTER TABLE `transaksikeluar`
  ADD PRIMARY KEY (`KodeKeluar`);

--
-- Indexes for table `transaksikembali`
--
ALTER TABLE `transaksikembali`
  ADD PRIMARY KEY (`KodeKembali`,`Tgl_Pengembalian`);

--
-- Indexes for table `transaksimasuk`
--
ALTER TABLE `transaksimasuk`
  ADD PRIMARY KEY (`KodeMasuk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
