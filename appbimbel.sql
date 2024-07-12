-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2024 pada 16.12
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appbimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_karyawans`
--

CREATE TABLE `absensi_karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keterangan` enum('izin','sakit','alpha') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi_karyawans`
--

INSERT INTO `absensi_karyawans` (`id`, `karyawan_id`, `tanggal`, `jam_masuk`, `jam_keluar`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 25, '2024-06-01', '07:12:21', '18:12:21', NULL, NULL, NULL),
(3, 24, '2024-06-03', '00:00:00', '00:00:00', NULL, '2024-06-02 15:04:22', '2024-06-02 15:14:07'),
(4, 25, '2024-06-03', '09:00:00', '17:00:00', NULL, '2024-06-02 15:07:40', '2024-06-02 15:07:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_siswas`
--

CREATE TABLE `absensi_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` enum('hadir','izin','sakit','alpha') NOT NULL DEFAULT 'hadir',
  `tanggal` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi_siswas`
--

INSERT INTO `absensi_siswas` (`id`, `siswa_id`, `keterangan`, `tanggal`, `catatan`, `created_at`, `updated_at`) VALUES
(2, 1, 'hadir', '2024-05-15', '-', NULL, NULL),
(3, 3, 'alpha', '2024-05-15', 'Pergi ke rumah sakit, jenguk nenek.', NULL, '2024-05-15 04:26:49'),
(4, 2, 'sakit', '2024-05-15', 'Sakit flu', '2024-05-15 04:01:32', '2024-05-15 04:09:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instrukturs`
--

CREATE TABLE `instrukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_instruktur` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instrukturs`
--

INSERT INTO `instrukturs` (`id`, `nama_instruktur`, `email`, `no_telp`, `created_at`, `updated_at`) VALUES
(5, 'Nadhifa Farah Alya', 'nadhifafa13@gmail.com', '082319143187', '2024-05-04 04:27:05', '2024-05-04 04:27:05'),
(6, 'Ichsan Mochammad Fachrurroji', 'ichsanmf14@gmail.com', '087726916540', '2024-05-04 06:10:28', '2024-05-04 06:10:28'),
(8, 'Laura Poetri Tanjung', 'laurauzbek@yahoo.com', '089654876223', '2024-05-04 14:38:22', '2024-05-04 14:38:22'),
(9, 'Ilham Achmad Firdaus', 'firdausilhamachmad@gmail.com', '087726916540', '2024-05-04 23:30:23', '2024-05-04 23:30:23'),
(10, 'Zesika Salsa Zahara', 'zesikasalsazahra@yahoo.co.id', '087726916540', '2024-05-06 06:28:13', '2024-05-06 06:28:13'),
(11, 'Fauzi Ahmad Ya Sallam', 'asdad@gmail.com', '08882350151', '2024-05-06 08:34:16', '2024-05-06 08:34:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gaji` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tunjangan_transport` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tunjangan_makan` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_gaji` decimal(10,2) GENERATED ALWAYS AS (`gaji` + `tunjangan_transport` + `tunjangan_makan`) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `deskripsi`, `gaji`, `tunjangan_transport`, `tunjangan_makan`, `created_at`, `updated_at`) VALUES
(11, 'Owner', 'Memantau pengelolaan keuntungan perusahaan.', 2000000.00, 300000.00, 200000.00, '2024-05-22 18:30:58', '2024-05-23 00:18:50'),
(13, 'Staff', 'Membantu pekerjaan owner', 1000000.00, 300000.00, 300000.00, '2024-05-23 00:16:29', '2024-05-23 00:16:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_siswas`
--

CREATE TABLE `jadwal_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kursus_id` bigint(20) UNSIGNED NOT NULL,
  `instruktur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_siswas`
--

INSERT INTO `jadwal_siswas` (`id`, `hari`, `jam_mulai`, `jam_selesai`, `siswa_id`, `kursus_id`, `instruktur_id`, `created_at`, `updated_at`) VALUES
(1, 'Senin, Selasa, Rabu', '09:00:00', '10:00:10', 1, 15, 11, NULL, NULL),
(3, 'Kamis, Sabtu', '12:00:00', '13:00:00', 3, 17, 5, '2024-05-12 05:08:26', '2024-05-12 05:08:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumbotrons`
--

CREATE TABLE `jumbotrons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jumbotrons`
--

INSERT INTO `jumbotrons` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Mengasah Potensi Menyongsong Masa Depan Gemilang', '2024-04-03hero1.png', 'Bimbel Rumah Pinus, sebuah destinasi pendidikan yang mengubah cara anda memandang belajar. Di sini, kami tidak hanya memberikan pelajaran, tetapi menciptakan pengalaman pembelajaran yang tak terlupakan.', '2024-04-02 06:14:09', '2024-04-03 00:31:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pend_akhir` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama`, `jk`, `no_telp`, `email`, `pend_akhir`, `alamat`, `tanggal_lahir`, `jabatan_id`, `created_at`, `updated_at`) VALUES
(24, 'Ichsan Mochammad Fachrurroji', 'Laki-laki', '087726916540', 'ichsanmf14@gmail.com', 'Strata-1', 'Jalan Pinus 1 No 252', '1999-11-14', 11, '2024-05-28 02:55:18', '2024-05-29 16:59:19'),
(25, 'Zesika Salsa Zahara', 'Perempuan', '089654876223', 'zesikasalsazahra@yahoo.co.id', 'SMA/SMK', '-', '2024-06-04', 13, '2024-06-02 06:06:19', '2024-06-02 06:06:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursuses`
--

CREATE TABLE `kursuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kursus` varchar(30) NOT NULL,
  `harga` decimal(8,2) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `instruktur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kursuses`
--

INSERT INTO `kursuses` (`id`, `nama_kursus`, `harga`, `deskripsi`, `instruktur_id`, `created_at`, `updated_at`) VALUES
(15, 'Calistung Ahe', 100000.00, 'Les Membaca, Menulis dan Menghitung', 5, '2024-05-06 08:24:15', '2024-05-06 08:24:15'),
(16, 'Prisma Kulator Tangan', 150000.00, 'Les Menghitung cepat menggunakan tangan.', 5, '2024-05-06 21:06:23', '2024-05-06 21:08:25'),
(17, 'Bahasa Inggris', 250000.00, 'Les Belajar Bahasa Inggris', 10, '2024-05-06 21:07:11', '2024-05-06 21:07:11'),
(18, 'Pracalis', 120000.00, 'Belajar melatih saraf bayi', 6, '2024-05-06 21:56:13', '2024-05-06 21:56:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(54, '2014_10_12_000000_create_users_table', 1),
(55, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(56, '2019_08_19_000000_create_failed_jobs_table', 1),
(57, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(58, '2024_03_22_011752_create_sections_table', 1),
(59, '2024_03_22_014027_create_jumbotrons_table', 1),
(60, '2024_03_29_063459_add_column_deleted_at_in_users_table', 2),
(61, '2024_04_02_025854_create_settings_table', 3),
(62, '2024_04_02_081342_create_jumbotrons_table', 4),
(63, '2024_04_03_025431_create_reviews_table', 5),
(64, '2024_04_03_031813_review', 6),
(65, '2024_04_03_081141_create_questions_table', 7),
(66, '2024_04_06_065003_question', 8),
(69, '2024_05_02_012126_create_jabatans_table', 9),
(70, '2024_05_02_102301_create_karyawans_table', 10),
(71, '2024_05_03_140918_create_kursuses_table', 11),
(72, '2024_05_04_025943_create_instrukturs_table', 11),
(73, '2024_05_04_104449_create_kursuses_table', 12),
(74, '2024_05_04_143406_create_siswas_table', 13),
(75, '2024_05_05_114402_create_jadwal_siswas_table', 14),
(76, '2024_05_05_125122_create_absensi_contohs_table', 15),
(77, '2024_05_06_005146_create_kursuses_table', 16),
(78, '2024_05_06_012354_create_kursuses_table', 17),
(79, '2024_05_06_014348_create_siswas_table', 18),
(80, '2024_05_06_113113_create_siswa_kursus_table', 19),
(81, '2024_05_07_050320_create_siswas_table', 20),
(82, '2024_05_07_050958_create_siswa_kursus_table', 21),
(83, '2024_05_07_060952_create_siswa_kursuses_table', 22),
(84, '2024_05_10_103136_create_jadwal_siswas_table', 23),
(85, '2024_05_12_133034_create_absensi_siswas_table', 24),
(86, '2024_05_23_065513_add_tunjangan_and_total_gaji_to_jabatans_table', 25),
(87, '2024_05_28_121927_create_pembayaran_spps_table', 26),
(88, '2024_05_31_092215_create_pembayaranspps_table', 27),
(96, '2024_05_31_235919_create_pembayaran_spps_table', 28),
(97, '2024_06_01_131701_create_absensi_karyawans_table', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_spps`
--

CREATE TABLE `pembayaran_spps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bulan_pembayaran` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `status_pembayaran` enum('lunas','belum-lunas') NOT NULL DEFAULT 'belum-lunas',
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran_spps`
--

INSERT INTO `pembayaran_spps` (`id`, `siswa_id`, `tanggal_pembayaran`, `bulan_pembayaran`, `status_pembayaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-01', 'Januari', 'lunas', '-', NULL, '2024-06-02 05:33:33'),
(2, 1, '2024-06-01', 'Mei', 'lunas', NULL, '2024-06-02 05:33:49', '2024-06-02 05:33:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`answers`)),
  `correct_answer` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id`, `question`, `answers`, `correct_answer`, `created_at`, `updated_at`) VALUES
(3, 'Apa Makanan Khas Daerah Cirebon', '[\"Gudeg\",\"Empal Gentong\",\"Rawon\",\"Papeda\"]', 2, '2024-04-22 19:48:28', '2024-04-23 05:41:35'),
(4, 'Siapakah Presiden Republik Indonesia ke-1 ?', '[\"Ir.H.Joko Widodo\",\"Drs.Moh Hatta\",\"Ir.Soekarno\",\"Drs.Prof.Megawati Soekarno Putri\"]', 3, '2024-04-22 19:50:13', '2024-04-22 19:50:13'),
(6, 'Apakah Warna Bendera Indonesia?', '[\"Hijau Kuning\",\"Merah Putih\",\"Hitam Putih\",\"Biru Oren\"]', 2, '2024-04-22 19:59:05', '2024-04-22 19:59:05'),
(7, 'Apa ibu kota Indonesia?', '[\"Bogor\",\"Medan\",\"Padang\",\"Jakarta\"]', 4, '2024-04-23 05:13:05', '2024-04-23 05:42:36'),
(8, 'Apa nama bahasa inggrisnya kuda', '[\"Cat\",\"Horse\",\"Cow\",\"Pig\"]', 2, '2024-04-23 23:58:12', '2024-04-23 23:58:12'),
(9, 'Apa Makanan Khas Daerah Bandung', '[\"seblak\",\"papeda\",\"mie kwetiauw\",\"sushi\"]', 1, '2024-04-30 20:51:29', '2024-04-30 20:51:29'),
(10, 'Lagu Indonesia raya diciptakan oleh?', '[\"W.R Supratman\",\"iwan\",\"dito\",\"anto\"]', 1, '2024-05-01 03:23:00', '2024-05-01 03:23:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `komentar` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `nama`, `gambar`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 'Iwan Khamdani', '2024-04-03john.jpg', 'Les disni menyenangkan karena pembelajar mudah dipahami dan guru guru yang sangat baik dan ramah :) Menyenangkan sekali pokok nya mah', '2024-04-02 19:51:23', '2024-04-02 23:00:53'),
(2, 'Nadhifa Farah Alya', '2024-04-03gambar-transparent-muslimah-vector-berhijab-thumbnail_59371.png', 'Belajar disini sangat seru, aku jadi lebih mudah dan paham tentang matematika =D', '2024-04-02 19:55:10', '2024-04-02 19:55:10'),
(3, 'Zesika Salsa Zahara', '2024-04-03gambar-transparent-beautiful-hijab-girl-illustration-thumbnail_46910.png', 'Aku yang tadi nya tidak bahasa inggris semenjak les disini aku bisa hafal 50 kosa kata bahasa inggris dalam sehari.', '2024-04-02 19:56:36', '2024-04-02 19:56:36'),
(4, 'Mira Mawar', '2024-04-03sarah.jpg', 'Asyik, Menyenangkan, guru guru nya sangat ramah dan baik hehehehe', '2024-04-02 21:54:36', '2024-04-02 23:01:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sections`
--

INSERT INTO `sections` (`id`, `title`, `thumbnail`, `content`, `created_at`, `updated_at`) VALUES
(12, 'Calistung Ahe', '2024-04-02burger.jpg', 'Les membaca, menulis serta menghitung menggunakan metode Ahe dengan pembelajaran yang interaktif dan guru yang telah berpengalaman dibidang nya yayayaya', '2024-03-31 23:08:31', '2024-04-23 23:56:40'),
(13, 'Pracalis', '2024-04-02Rdx9XqMvUuRipPLZ3vT7.jpg', 'Bimbingan belajar untuk prakarya dan kewirausahaan, membantu siswa mengembangkan keterampilan merancang, membuat, dan memasarkan produk serta jasa dengan pendekatan interaktif dan pengajar berpengalaman.', '2024-04-01 18:49:18', '2024-04-01 23:45:37'),
(14, 'MatHe', '2024-04-02pngtree-large-wooden-abacus-is-shown-with-a-variety-of-colored-balls-image_2489013.jpg', 'Les Matematika menggunakan metode Mathe untuk membantu siswa memahami konsep-konsep matematika secara menyeluruh dan mendalam. Metode ini menghadirkan pembelajaran interaktif yang menggabungkan teori dengan penerapan praktis.', '2024-04-01 23:47:39', '2024-04-01 23:47:39'),
(15, 'Les Bahasa Inggris', '2024-04-02belajar-bahasa-inggris.jpg', 'Naikkan potensi anak dalam bahasa Inggris dengan pelajaran ahli kami. Baik pemula atau ingin menyempurnakan keterampilan, sesi interaktif kami melayani semua tingkat kemampuan.', '2024-04-01 23:59:42', '2024-04-01 23:59:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `label`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, '_site-name', 'Judul Situs', 'RumahPinus', 'text', '2024-04-01 19:27:47', '2024-04-01 21:46:34'),
(2, '_location', 'Alamat Kantor', 'Bumi Arum Sari, Jalan Pinus 1 No. 252 Blok IX Cirebon Girang, Talun, 45171', 'text', '2024-04-01 19:27:47', '2024-04-01 21:47:57'),
(3, '_tiktok', 'Tiktok', 'https://www.tiktok.com/ichsnmf', 'text', '2024-04-01 19:27:47', '2024-05-03 20:31:05'),
(4, '_instagram', 'Instagram', 'https://www.instagram.com/ichsnmf_', 'text', '2024-04-01 19:27:47', '2024-04-01 21:25:43'),
(5, '_facebook', 'Facebook', 'https://www.facebook.com', 'text', '2024-04-01 19:27:47', '2024-04-01 19:27:47'),
(6, '_email', 'Email', 'bimbelrumahpinus@yahoo.co.id', 'text', '2024-04-01 19:27:47', '2024-04-01 21:58:36'),
(7, '_site_description', 'Site Description', 'Bimbel Rumah Pinus berdiri sejak 2018 dengan misi membantu anak-anak SD membaca dengan baik, didirikan oleh Ibu Yulia Suryanti.', 'text', '2024-04-01 19:27:47', '2024-04-01 21:56:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `orangtua` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kursus_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `foto`, `nama`, `orangtua`, `jk`, `email`, `no_telp`, `alamat`, `kursus_id`, `tgl_lahir`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-05-07john.jpg', 'Ichsan Mochammad Fachrurroji', 'Iwan Khamdani', 'Laki-laki', 'ichsanmf14@gmail.com', '087726916540', 'Perumahan Bumi Arum Sari', 16, '1999-11-14', 'active', '2024-05-06 21:04:52', '2024-05-06 21:14:55'),
(2, '2024-05-07burger.jpg', 'Ilham Achmad Firdaus', 'Yulia Suryanti', 'Laki-laki', 'firdausilhamachmad@gmail.com', '089654876223', 'Bumi Arum Sari Jalan Pinus 1', 15, '2002-04-09', 'active', '2024-05-06 21:05:50', '2024-05-06 21:05:50'),
(3, '2024-05-07sarah.jpg', 'Zesika Salsa Zahara', 'Titin', 'Perempuan', 'zesikasalsazahra@yahoo.co.id', '085864719134', 'SidangKempeng Kuningan', 17, '2002-02-20', 'active', '2024-05-06 21:13:55', '2024-05-06 21:13:55'),
(4, '2024-05-07pizza.jpg', 'Nadhifa Farah Alya', 'Yulia Suryanti', 'Perempuan', 'nadhifafa13@gmail.com', '089654876223', 'Diamana Aja', 16, '3333-12-12', 'active', '2024-05-06 21:44:25', '2024-05-06 21:44:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kursuses`
--

CREATE TABLE `siswa_kursuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kursus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa_kursuses`
--

INSERT INTO `siswa_kursuses` (`id`, `siswa_id`, `kursus_id`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '2024-05-08 05:07:18', '2024-05-10 02:22:58'),
(6, 2, 16, '2024-05-08 05:42:59', '2024-05-08 05:42:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','operator','owner','guru','orantua','siswa','calonsiswa') NOT NULL DEFAULT 'calonsiswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ichsan Mochammad Fachrurroji', 'ichsanmf14@gmail.com', NULL, '$2y$12$5kVfFxCgk6mCVadXbMhyn.xKqty3sBoK8oPfbHvzROk0cdvsHrCEG', 'admin', NULL, '2024-03-26 18:48:17', '2024-03-26 22:48:26', NULL),
(2, 'Nadhifa Farah Alyaa', 'nadhifafa13@gmail.com', NULL, '$2y$12$JJScjekGZHMe.iA.epneCu6JV6nL.ZNZJSbyHhzqedUGITtfbmJMe', 'orantua', NULL, '2024-03-26 19:05:39', '2024-04-02 07:01:35', NULL),
(3, 'Zesika Salsa Zahara', 'zesikazahara@gmail.com', NULL, '$2y$12$vuyf5SY1jqvjIuQ/PlkI5uvABgfp8OQRKzTWtXqA.xSHXvksTdo6S', 'operator', NULL, '2024-03-26 19:39:43', '2024-05-01 17:18:14', NULL),
(6, 'Ilham Achmad Firdaus', 'firdausilhamachmad@yahoo.co.id', NULL, '$2y$12$bIFUH9UhWd/WehbJV4prmeALtr7JHP7.KLagvnq8iCAMJPSa2uSzC', 'siswa', NULL, '2024-04-23 05:47:45', '2024-04-23 05:47:45', NULL),
(7, 'agu ssemabada', 'agus123@gmail.com', NULL, '$2y$12$KunAqoYLlS82PdIqC7ghM.PlSgNChQes8A9VKOq6UaMS.v6TnYuh6', 'siswa', NULL, '2024-05-01 20:01:36', '2024-05-01 20:04:51', NULL),
(9, 'Rakha Eka', 'rakaeka@yahoo.com', NULL, '$2y$12$nKVjM1kIBq6NfIKhdd37m.5fXWEkFsq2EQ2llR6i7C6Zisr.p70Yy', 'calonsiswa', NULL, '2024-05-04 16:34:13', '2024-05-04 16:34:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_karyawans`
--
ALTER TABLE `absensi_karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_karyawans_karyawan_id_foreign` (`karyawan_id`);

--
-- Indeks untuk tabel `absensi_siswas`
--
ALTER TABLE `absensi_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_siswas_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `instrukturs`
--
ALTER TABLE `instrukturs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instrukturs_email_unique` (`email`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_siswas_siswa_id_foreign` (`siswa_id`),
  ADD KEY `jadwal_siswas_kursus_id_foreign` (`kursus_id`),
  ADD KEY `jadwal_siswas_instruktur_id_foreign` (`instruktur_id`);

--
-- Indeks untuk tabel `jumbotrons`
--
ALTER TABLE `jumbotrons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `kursuses`
--
ALTER TABLE `kursuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kursuses_instruktur_id_foreign` (`instruktur_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayaran_spps`
--
ALTER TABLE `pembayaran_spps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_spps_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_kursus_id_foreign` (`kursus_id`);

--
-- Indeks untuk tabel `siswa_kursuses`
--
ALTER TABLE `siswa_kursuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_kursuses_siswa_id_foreign` (`siswa_id`),
  ADD KEY `siswa_kursuses_kursus_id_foreign` (`kursus_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_karyawans`
--
ALTER TABLE `absensi_karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `absensi_siswas`
--
ALTER TABLE `absensi_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `instrukturs`
--
ALTER TABLE `instrukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jumbotrons`
--
ALTER TABLE `jumbotrons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kursuses`
--
ALTER TABLE `kursuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_spps`
--
ALTER TABLE `pembayaran_spps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa_kursuses`
--
ALTER TABLE `siswa_kursuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_karyawans`
--
ALTER TABLE `absensi_karyawans`
  ADD CONSTRAINT `absensi_karyawans_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absensi_siswas`
--
ALTER TABLE `absensi_siswas`
  ADD CONSTRAINT `absensi_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_siswas`
--
ALTER TABLE `jadwal_siswas`
  ADD CONSTRAINT `jadwal_siswas_instruktur_id_foreign` FOREIGN KEY (`instruktur_id`) REFERENCES `instrukturs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_siswas_kursus_id_foreign` FOREIGN KEY (`kursus_id`) REFERENCES `kursuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`);

--
-- Ketidakleluasaan untuk tabel `kursuses`
--
ALTER TABLE `kursuses`
  ADD CONSTRAINT `kursuses_instruktur_id_foreign` FOREIGN KEY (`instruktur_id`) REFERENCES `instrukturs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran_spps`
--
ALTER TABLE `pembayaran_spps`
  ADD CONSTRAINT `pembayaran_spps_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kursus_id_foreign` FOREIGN KEY (`kursus_id`) REFERENCES `kursuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_kursuses`
--
ALTER TABLE `siswa_kursuses`
  ADD CONSTRAINT `siswa_kursuses_kursus_id_foreign` FOREIGN KEY (`kursus_id`) REFERENCES `kursuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_kursuses_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
