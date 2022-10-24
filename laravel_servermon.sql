-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2022 pada 09.27
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_servermon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id`, `nama`) VALUES
(1, 'YULIANA'),
(2, 'FARIYANI'),
(3, 'SITTI BANAWIAH'),
(4, 'AMZAH'),
(5, 'KALIMI'),
(6, 'INDAH DWI S.'),
(7, 'KGS. M. NUR SYAMSURI'),
(8, 'SITI HASANAH'),
(9, 'KARISMA KUSUMA N'),
(10, 'HENDRA SETIAJI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `brand` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servers`
--

INSERT INTO `servers` (`id`, `name`, `ip_address`, `username`, `password`, `description`, `brand`, `type`) VALUES
(1, 'ESX-01', '192.168.15.41', 'moni', 'monitoring123!', 'Host Virtualisasi', 1, 1),
(2, 'ESX-02', '192.168.15.42', 'moni', 'monitoring123!', 'Host Virtualisasi', 1, 1),
(3, 'ESX-03', '192.168.15.43', 'moni', 'monitoring123!', 'Host Virtualisasi', 1, 1),
(4, 'BMKGSOFT-DB', '192.168.15.50', 'moni', 'monitoring123!', 'DB Oracle BMKGSOFT', 1, 1),
(7, 'NUTANIX-1', '192.168.15.85', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(8, 'NUTANIX-2', '192.168.15.86', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(9, 'NUTANIX-3', '192.168.15.87', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(11, 'Dev Big Data', '192.168.15.46', 'moni', 'monitoring123!', 'Dev Big Data', 1, 1),
(12, 'Dev Big Data', '192.168.15.47', 'moni', 'monitoring123!', 'Dev Big Data', 1, 1),
(13, 'Dev Big Data', '192.168.15.48', 'moni', 'monitoring123!', 'Dev Big Data', 1, 1),
(16, 'Dev Big Data', '192.168.15.59', 'moni', 'monitoring123!', 'Dev Big Data', 1, 1),
(19, 'DC1-BCK01', '192.168.15.44', 'moni', 'monitoring123!', 'Host Backup HP Data Protector', 1, 1),
(21, 'FTP Backup AWS Center', '192.168.15.173', 'monitoring', 'Moni@bmkg123!', 'FTP Backup AWS Center', 1, 1),
(23, 'Web Magnet', '192.168.15.171', 'monitoring', 'Moni@bmkg123!', 'Host Web Magnet', 1, 1),
(24, 'NUTANIX-A', '192.168.15.111', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(25, 'NUTANIX-B', '192.168.15.112', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(27, 'NUTANIX-C', '192.168.15.113', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(28, 'NTNX-1', '192.168.15.109', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(37, 'NTNX-05A', '192.168.15.116', 'moni', 'monitoring123!', 'Sistem HCI Nutanix', 2, 2),
(38, 'AWS Center Portal', '192.168.15.71', 'monitoring', 'Moni@bmkg123!', 'Server AWS Center Portal', 3, 3),
(39, 'AWS Center Processing & DB', '192.168.15.215', 'monitoring', 'Moni@bmkg123!', 'Server AWS Center Processing & DB', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `servers_brand`
--

CREATE TABLE `servers_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servers_brand`
--

INSERT INTO `servers_brand` (`id`, `brand`) VALUES
(1, 'HP'),
(2, 'Nutanix'),
(3, 'Lenovo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servers_history`
--

CREATE TABLE `servers_history` (
  `serverid` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `power_state` varchar(50) DEFAULT NULL,
  `health_summary` varchar(50) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servers_history`
--

INSERT INTO `servers_history` (`serverid`, `datetime`, `power_state`, `health_summary`, `detail`) VALUES
(4, '2021-11-25 08:50:07', 'ON', 'OK', 'ams_ready'),
(19, '2021-11-25 08:50:08', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2021-11-25 08:50:08', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2021-11-25 08:50:09', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2021-11-25 08:50:09', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2021-11-25 08:50:10', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2021-11-25 08:50:10', 'ON', 'OK', 'battery_status'),
(2, '2021-11-25 08:50:11', 'ON', 'OK', 'battery_status'),
(3, '2021-11-25 08:50:11', 'ON', 'OK', 'battery_status'),
(21, '2021-11-25 08:50:12', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(28, '2021-11-25 08:50:13', 'ON', 'OK', ''),
(7, '2021-11-25 08:50:14', 'ON', 'OK', ''),
(8, '2021-11-25 08:50:14', 'ON', 'OK', ''),
(9, '2021-11-25 08:50:15', 'ON', 'OK', ''),
(24, '2021-11-25 08:50:16', 'ON', 'OK', ''),
(25, '2021-11-25 08:50:17', 'ON', 'OK', ''),
(27, '2021-11-25 08:50:17', 'ON', 'OK', ''),
(23, '2021-11-25 08:50:18', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2021-11-26 15:56:29', 'ON', 'OK', 'ams_ready'),
(19, '2021-11-26 15:56:29', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2021-11-26 15:56:30', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2021-11-26 15:56:31', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2021-11-26 15:56:36', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2021-11-26 15:56:36', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2021-11-26 15:56:37', 'ON', 'OK', 'battery_status'),
(2, '2021-11-26 15:56:38', 'ON', 'OK', 'battery_status'),
(3, '2021-11-26 15:56:38', 'ON', 'OK', 'battery_status'),
(21, '2021-11-26 15:56:39', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(28, '2021-11-26 15:56:40', 'ON', 'OK', ''),
(7, '2021-11-26 15:56:41', 'ON', 'OK', ''),
(8, '2021-11-26 15:56:42', 'ON', 'OK', ''),
(9, '2021-11-26 15:56:43', 'ON', 'OK', ''),
(24, '2021-11-26 15:56:44', 'ON', 'OK', ''),
(25, '2021-11-26 15:56:45', 'ON', 'OK', ''),
(27, '2021-11-26 15:56:46', 'ON', 'OK', ''),
(23, '2021-11-26 15:56:47', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2021-11-26 15:56:49', 'ON', 'OK', 'ams_ready'),
(19, '2021-11-26 15:56:49', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2021-11-26 15:56:53', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2021-11-26 15:56:54', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2021-11-26 15:56:58', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2021-11-26 15:56:59', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2021-11-26 15:57:00', 'ON', 'OK', 'battery_status'),
(2, '2021-11-26 15:57:00', 'ON', 'OK', 'battery_status'),
(3, '2021-11-26 15:57:01', 'ON', 'OK', 'battery_status'),
(21, '2021-11-26 15:57:03', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(28, '2021-11-26 15:57:04', 'ON', 'OK', ''),
(7, '2021-11-26 15:57:05', 'ON', 'OK', ''),
(8, '2021-11-26 15:57:06', 'ON', 'OK', ''),
(9, '2021-11-26 15:57:07', 'ON', 'OK', ''),
(24, '2021-11-26 15:57:08', 'ON', 'OK', ''),
(25, '2021-11-26 15:57:09', 'ON', 'OK', ''),
(27, '2021-11-26 15:57:10', 'ON', 'OK', ''),
(23, '2021-11-26 15:57:11', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2021-12-03 15:10:41', 'ON', 'OK', 'ams_ready'),
(19, '2021-12-03 15:10:41', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2021-12-03 15:10:42', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2021-12-03 15:10:42', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2021-12-03 15:10:44', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2021-12-03 15:10:45', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2021-12-03 15:10:50', 'ON', 'OK', 'battery_status'),
(2, '2021-12-03 15:10:50', 'ON', 'OK', 'battery_status'),
(3, '2021-12-03 15:10:51', 'ON', 'OK', 'battery_status'),
(21, '2021-12-03 15:10:52', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(28, '2021-12-03 15:10:53', 'ON', 'OK', ''),
(7, '2021-12-03 15:10:54', 'ON', 'OK', ''),
(8, '2021-12-03 15:10:55', 'ON', 'OK', ''),
(9, '2021-12-03 15:10:56', 'ON', 'OK', ''),
(24, '2021-12-03 15:10:57', 'ON', 'OK', ''),
(25, '2021-12-03 15:10:57', 'ON', 'OK', ''),
(27, '2021-12-03 15:10:59', 'ON', 'OK', ''),
(23, '2021-12-03 15:11:00', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2021-12-03 15:11:01', 'ON', 'OK', 'ams_ready'),
(19, '2021-12-03 15:11:02', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2021-12-03 15:11:03', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2021-12-03 15:11:03', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2021-12-03 15:11:04', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2021-12-03 15:11:05', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2021-12-03 15:11:06', 'ON', 'OK', 'battery_status'),
(2, '2021-12-03 15:11:06', 'ON', 'OK', 'battery_status'),
(3, '2021-12-03 15:11:07', 'ON', 'OK', 'battery_status'),
(21, '2021-12-03 15:11:08', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(28, '2021-12-03 15:11:09', 'ON', 'OK', ''),
(7, '2021-12-03 15:11:10', 'ON', 'OK', ''),
(8, '2021-12-03 15:11:11', 'ON', 'OK', ''),
(9, '2021-12-03 15:11:13', 'ON', 'OK', ''),
(24, '2021-12-03 15:11:15', 'ON', 'OK', ''),
(25, '2021-12-03 15:11:16', 'ON', 'OK', ''),
(27, '2021-12-03 15:11:17', 'ON', 'OK', ''),
(23, '2021-12-03 15:11:18', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2021-12-20 14:22:56', 'Failed', 'Failed', 'Failed'),
(19, '2021-12-20 14:23:06', 'Failed', 'Failed', 'Failed'),
(13, '2021-12-20 14:23:16', 'Failed', 'Failed', 'Failed'),
(16, '2021-12-20 14:23:26', 'Failed', 'Failed', 'Failed'),
(12, '2021-12-20 14:23:36', 'Failed', 'Failed', 'Failed'),
(4, '2021-12-20 14:29:58', 'ON', 'OK', 'ams_ready'),
(19, '2021-12-20 14:29:58', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2021-12-20 14:29:59', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2021-12-20 14:29:59', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2021-12-20 14:30:00', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2021-12-20 14:30:00', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2021-12-20 14:30:01', 'ON', 'OK', 'battery_status'),
(2, '2021-12-20 14:30:01', 'ON', 'OK', 'battery_status'),
(3, '2021-12-20 14:30:02', 'ON', 'OK', 'battery_status'),
(21, '2021-12-20 14:30:03', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(28, '2021-12-20 14:30:03', 'ON', 'OK', ''),
(7, '2021-12-20 14:30:04', 'ON', 'OK', ''),
(8, '2021-12-20 14:30:05', 'ON', 'OK', ''),
(9, '2021-12-20 14:30:05', 'ON', 'OK', ''),
(24, '2021-12-20 14:30:06', 'ON', 'OK', ''),
(25, '2021-12-20 14:30:07', 'ON', 'OK', ''),
(27, '2021-12-20 14:30:08', 'ON', 'OK', ''),
(23, '2021-12-20 14:30:09', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2022-04-11 21:15:31', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-11 21:15:32', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2022-04-11 21:15:34', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2022-04-11 21:15:35', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2022-04-11 21:15:36', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-11 21:15:37', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-11 21:15:39', 'ON', 'OK', 'battery_status'),
(2, '2022-04-11 21:15:40', 'ON', 'OK', 'battery_status'),
(3, '2022-04-11 21:15:41', 'ON', 'OK', 'battery_status'),
(21, '2022-04-11 21:15:42', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-11 21:15:43', 'ON', 'CRITICAL', ''),
(28, '2022-04-11 21:15:45', 'ON', 'OK', ''),
(7, '2022-04-11 21:15:47', 'ON', 'OK', ''),
(8, '2022-04-11 21:15:49', 'ON', 'OK', ''),
(9, '2022-04-11 21:15:51', 'ON', 'OK', ''),
(24, '2022-04-11 21:15:54', 'ON', 'OK', ''),
(25, '2022-04-11 21:15:56', 'ON', 'OK', ''),
(27, '2022-04-11 21:15:58', 'ON', 'OK', ''),
(23, '2022-04-11 21:16:00', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2022-04-11 21:24:41', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-11 21:24:42', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2022-04-11 21:24:45', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2022-04-11 21:24:46', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2022-04-11 21:24:47', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-11 21:24:48', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-11 21:24:50', 'ON', 'OK', 'battery_status'),
(2, '2022-04-11 21:24:51', 'ON', 'OK', 'battery_status'),
(3, '2022-04-11 21:24:52', 'ON', 'OK', 'battery_status'),
(21, '2022-04-11 21:24:53', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-11 21:24:54', 'ON', 'CRITICAL', ''),
(28, '2022-04-11 21:24:57', 'ON', 'OK', ''),
(7, '2022-04-11 21:24:59', 'ON', 'OK', ''),
(8, '2022-04-11 21:25:02', 'ON', 'OK', ''),
(9, '2022-04-11 21:25:04', 'ON', 'OK', ''),
(24, '2022-04-11 21:25:07', 'ON', 'OK', ''),
(25, '2022-04-11 21:25:09', 'ON', 'OK', ''),
(27, '2022-04-11 21:25:11', 'ON', 'OK', ''),
(23, '2022-04-11 21:25:13', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2022-04-11 22:30:39', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-11 22:30:42', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2022-04-11 22:30:43', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2022-04-11 22:30:44', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2022-04-11 22:30:46', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-11 22:30:47', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-11 22:30:48', 'ON', 'OK', 'battery_status'),
(2, '2022-04-11 22:30:49', 'ON', 'OK', 'battery_status'),
(3, '2022-04-11 22:30:50', 'ON', 'OK', 'battery_status'),
(21, '2022-04-11 22:30:51', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-11 22:30:52', 'ON', 'CRITICAL', ''),
(28, '2022-04-11 22:30:55', 'ON', 'OK', ''),
(7, '2022-04-11 22:30:56', 'ON', 'OK', ''),
(8, '2022-04-11 22:30:58', 'ON', 'OK', ''),
(9, '2022-04-11 22:31:00', 'ON', 'OK', ''),
(24, '2022-04-11 22:31:03', 'ON', 'OK', ''),
(25, '2022-04-11 22:31:06', 'ON', 'OK', ''),
(27, '2022-04-11 22:31:08', 'ON', 'OK', ''),
(23, '2022-04-11 22:31:09', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2022-04-12 07:55:25', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-12 07:55:26', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2022-04-12 07:55:27', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2022-04-12 07:55:28', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2022-04-12 07:55:28', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-12 07:55:29', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-12 07:55:30', 'ON', 'OK', 'battery_status'),
(2, '2022-04-12 07:55:30', 'ON', 'OK', 'battery_status'),
(3, '2022-04-12 07:55:31', 'ON', 'OK', 'battery_status'),
(21, '2022-04-12 07:55:32', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-12 07:55:33', 'ON', 'CRITICAL', ''),
(28, '2022-04-12 07:55:35', 'ON', 'OK', ''),
(7, '2022-04-12 07:55:36', 'ON', 'OK', ''),
(8, '2022-04-12 07:55:38', 'ON', 'OK', ''),
(9, '2022-04-12 07:55:39', 'ON', 'OK', ''),
(24, '2022-04-12 07:55:41', 'ON', 'OK', ''),
(25, '2022-04-12 07:55:43', 'ON', 'OK', ''),
(27, '2022-04-12 07:55:45', 'ON', 'OK', ''),
(23, '2022-04-12 07:55:46', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2022-04-13 08:23:01', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-13 08:23:02', 'ON', 'OK', 'battery_status, ams_ready'),
(13, '2022-04-13 08:23:02', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(16, '2022-04-13 08:23:02', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(12, '2022-04-13 08:23:03', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-13 08:23:03', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-13 08:23:04', 'ON', 'OK', 'battery_status'),
(2, '2022-04-13 08:23:04', 'ON', 'OK', 'battery_status'),
(3, '2022-04-13 08:23:05', 'ON', 'OK', 'battery_status'),
(21, '2022-04-13 08:23:05', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-13 08:23:06', 'ON', 'CRITICAL', ''),
(28, '2022-04-13 08:23:07', 'ON', 'OK', ''),
(7, '2022-04-13 08:23:08', 'ON', 'OK', ''),
(8, '2022-04-13 08:23:10', 'ON', 'OK', ''),
(9, '2022-04-13 08:23:11', 'ON', 'OK', ''),
(24, '2022-04-13 08:23:12', 'ON', 'OK', ''),
(25, '2022-04-13 08:23:14', 'ON', 'OK', ''),
(27, '2022-04-13 08:23:15', 'ON', 'OK', ''),
(23, '2022-04-13 08:23:16', 'ON', 'OK', 'battery_status, ams_ready'),
(4, '2022-04-13 11:27:19', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-13 11:27:19', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-13 11:27:20', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-13 11:27:20', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-13 11:27:21', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-13 11:27:21', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-13 11:27:22', 'ON', 'OK', 'battery_status'),
(2, '2022-04-13 11:27:22', 'ON', 'OK', 'battery_status'),
(3, '2022-04-13 11:27:23', 'ON', 'OK', 'battery_status'),
(21, '2022-04-13 11:27:23', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(23, '2022-04-13 11:27:24', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-13 11:33:04', 'ON', 'OK', ''),
(4, '2022-04-13 11:33:04', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-13 11:33:05', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-13 11:33:05', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-13 11:33:06', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-13 11:33:06', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-13 11:33:07', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-13 11:33:07', 'ON', 'OK', 'battery_status'),
(2, '2022-04-13 11:33:07', 'ON', 'OK', 'battery_status'),
(3, '2022-04-13 11:33:08', 'ON', 'OK', 'battery_status'),
(21, '2022-04-13 11:33:09', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-13 11:33:09', 'ON', 'CRITICAL', ''),
(28, '2022-04-13 11:33:11', 'ON', 'OK', ''),
(7, '2022-04-13 11:33:13', 'ON', 'OK', ''),
(8, '2022-04-13 11:33:14', 'ON', 'OK', ''),
(9, '2022-04-13 11:33:15', 'ON', 'OK', ''),
(24, '2022-04-13 11:33:17', 'ON', 'OK', ''),
(25, '2022-04-13 11:33:19', 'ON', 'OK', ''),
(27, '2022-04-13 11:33:21', 'ON', 'OK', ''),
(23, '2022-04-13 11:33:22', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-14 07:56:32', 'ON', 'OK', ''),
(4, '2022-04-14 07:56:32', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-14 07:56:32', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-14 07:56:33', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-14 07:56:33', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-14 07:56:34', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-14 07:56:35', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-14 07:56:36', 'ON', 'OK', 'battery_status'),
(2, '2022-04-14 07:56:36', 'ON', 'OK', 'battery_status'),
(3, '2022-04-14 07:56:36', 'ON', 'OK', 'battery_status'),
(21, '2022-04-14 07:56:37', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-14 07:56:37', 'ON', 'CRITICAL', ''),
(28, '2022-04-14 07:56:39', 'ON', 'OK', ''),
(7, '2022-04-14 07:56:41', 'ON', 'OK', ''),
(8, '2022-04-14 07:56:43', 'ON', 'OK', ''),
(9, '2022-04-14 07:56:44', 'ON', 'OK', ''),
(24, '2022-04-14 07:56:45', 'ON', 'OK', ''),
(25, '2022-04-14 07:56:47', 'ON', 'OK', ''),
(27, '2022-04-14 07:56:48', 'ON', 'OK', ''),
(23, '2022-04-14 07:56:49', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-14 09:39:09', 'ON', 'OK', ''),
(4, '2022-04-14 09:39:10', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-14 09:39:10', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-14 09:39:11', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-14 09:39:12', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-14 09:39:12', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-14 09:39:13', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-14 09:39:13', 'ON', 'OK', 'battery_status'),
(2, '2022-04-14 09:39:13', 'ON', 'OK', 'battery_status'),
(3, '2022-04-14 09:39:14', 'ON', 'OK', 'battery_status'),
(21, '2022-04-14 09:39:15', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-14 09:39:15', 'ON', 'OK', ''),
(28, '2022-04-14 09:39:17', 'ON', 'OK', ''),
(7, '2022-04-14 09:39:18', 'ON', 'OK', ''),
(8, '2022-04-14 09:39:19', 'ON', 'OK', ''),
(9, '2022-04-14 09:39:20', 'ON', 'OK', ''),
(24, '2022-04-14 09:39:22', 'ON', 'OK', ''),
(25, '2022-04-14 09:39:23', 'ON', 'OK', ''),
(27, '2022-04-14 09:39:25', 'ON', 'OK', ''),
(23, '2022-04-14 09:39:25', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-14 14:02:11', 'ON', 'OK', ''),
(38, '2022-04-14 14:46:01', 'ON', 'OK', ''),
(39, '2022-04-14 14:46:02', 'ON', 'OK', ''),
(4, '2022-04-14 14:46:02', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-14 14:46:02', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-14 14:46:03', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-14 14:46:04', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-14 14:46:04', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-14 14:46:04', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-14 14:46:05', 'ON', 'OK', 'battery_status'),
(2, '2022-04-14 14:46:05', 'ON', 'OK', 'battery_status'),
(3, '2022-04-14 14:46:06', 'ON', 'OK', 'battery_status'),
(21, '2022-04-14 14:46:07', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-14 14:46:07', 'ON', 'OK', ''),
(28, '2022-04-14 14:46:09', 'ON', 'OK', ''),
(7, '2022-04-14 14:46:10', 'ON', 'OK', ''),
(8, '2022-04-14 14:46:12', 'ON', 'OK', ''),
(9, '2022-04-14 14:46:13', 'ON', 'OK', ''),
(24, '2022-04-14 14:46:14', 'ON', 'OK', ''),
(25, '2022-04-14 14:46:16', 'ON', 'OK', ''),
(27, '2022-04-14 14:46:18', 'ON', 'OK', ''),
(23, '2022-04-14 14:46:19', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-18 08:26:17', 'ON', 'OK', ''),
(39, '2022-04-18 08:26:18', 'ON', 'OK', ''),
(4, '2022-04-18 08:26:18', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-18 08:26:18', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-18 08:26:19', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-18 08:26:19', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-18 08:26:20', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-18 08:26:20', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-18 08:26:21', 'ON', 'OK', 'battery_status'),
(2, '2022-04-18 08:26:21', 'ON', 'OK', 'battery_status'),
(3, '2022-04-18 08:26:22', 'ON', 'OK', 'battery_status'),
(21, '2022-04-18 08:26:23', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-18 08:26:23', 'ON', 'OK', ''),
(28, '2022-04-18 08:26:24', 'ON', 'OK', ''),
(7, '2022-04-18 08:26:26', 'ON', 'OK', ''),
(8, '2022-04-18 08:26:27', 'ON', 'OK', ''),
(9, '2022-04-18 08:26:29', 'ON', 'OK', ''),
(24, '2022-04-18 08:26:30', 'ON', 'OK', ''),
(25, '2022-04-18 08:26:32', 'ON', 'OK', ''),
(27, '2022-04-18 08:26:34', 'ON', 'OK', ''),
(23, '2022-04-18 08:26:35', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-19 08:37:30', 'ON', 'OK', ''),
(39, '2022-04-19 08:37:31', 'ON', 'OK', ''),
(4, '2022-04-19 08:37:32', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-19 08:37:32', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-19 08:37:33', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-19 08:37:33', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-19 08:37:33', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-19 08:37:34', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-19 08:37:34', 'ON', 'OK', 'battery_status'),
(2, '2022-04-19 08:37:35', 'ON', 'OK', 'battery_status'),
(3, '2022-04-19 08:37:35', 'ON', 'OK', 'battery_status'),
(21, '2022-04-19 08:37:36', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-19 08:37:36', 'ON', 'OK', ''),
(28, '2022-04-19 08:37:38', 'ON', 'OK', ''),
(7, '2022-04-19 08:37:39', 'ON', 'OK', ''),
(8, '2022-04-19 08:37:41', 'ON', 'OK', ''),
(9, '2022-04-19 08:37:42', 'ON', 'OK', ''),
(24, '2022-04-19 08:37:43', 'ON', 'OK', ''),
(25, '2022-04-19 08:37:45', 'ON', 'OK', ''),
(27, '2022-04-19 08:37:46', 'ON', 'OK', ''),
(23, '2022-04-19 08:37:47', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-20 08:21:27', 'ON', 'OK', ''),
(39, '2022-04-20 08:21:28', 'ON', 'OK', ''),
(4, '2022-04-20 08:21:29', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-20 08:21:29', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-20 08:21:29', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-20 08:21:30', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-20 08:21:30', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-20 08:21:31', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-20 08:21:31', 'ON', 'OK', 'battery_status'),
(2, '2022-04-20 08:21:31', 'ON', 'OK', 'battery_status'),
(3, '2022-04-20 08:21:32', 'ON', 'OK', 'battery_status'),
(21, '2022-04-20 08:21:33', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-20 08:21:33', 'ON', 'OK', ''),
(28, '2022-04-20 08:21:35', 'ON', 'OK', ''),
(7, '2022-04-20 08:21:37', 'ON', 'OK', ''),
(8, '2022-04-20 08:21:38', 'ON', 'OK', ''),
(9, '2022-04-20 08:21:40', 'ON', 'OK', ''),
(24, '2022-04-20 08:21:42', 'ON', 'OK', ''),
(25, '2022-04-20 08:21:44', 'ON', 'OK', ''),
(27, '2022-04-20 08:21:45', 'ON', 'OK', ''),
(23, '2022-04-20 08:21:46', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-21 08:16:16', 'ON', 'OK', ''),
(39, '2022-04-21 08:16:17', 'ON', 'OK', ''),
(4, '2022-04-21 08:16:17', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-21 08:16:17', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-21 08:16:18', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-21 08:16:19', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-21 08:16:19', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-21 08:16:20', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-21 08:16:20', 'ON', 'OK', 'battery_status'),
(2, '2022-04-21 08:16:20', 'ON', 'OK', 'battery_status'),
(3, '2022-04-21 08:16:21', 'ON', 'OK', 'battery_status'),
(21, '2022-04-21 08:16:22', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-21 08:16:22', 'ON', 'OK', ''),
(28, '2022-04-21 08:16:23', 'ON', 'OK', ''),
(7, '2022-04-21 08:16:25', 'ON', 'OK', ''),
(8, '2022-04-21 08:16:27', 'ON', 'OK', ''),
(9, '2022-04-21 08:16:29', 'ON', 'OK', ''),
(24, '2022-04-21 08:16:30', 'ON', 'OK', ''),
(25, '2022-04-21 08:16:31', 'ON', 'OK', ''),
(27, '2022-04-21 08:16:33', 'ON', 'OK', ''),
(23, '2022-04-21 08:16:34', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-22 09:44:00', 'ON', 'OK', ''),
(39, '2022-04-22 09:44:01', 'ON', 'OK', ''),
(4, '2022-04-22 09:44:01', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-22 09:44:02', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-22 09:44:02', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-22 09:44:03', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-22 09:44:03', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-22 09:44:04', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-22 09:44:04', 'ON', 'OK', 'battery_status'),
(2, '2022-04-22 09:44:04', 'ON', 'OK', 'battery_status'),
(3, '2022-04-22 09:44:05', 'ON', 'OK', 'battery_status'),
(21, '2022-04-22 09:44:06', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-22 09:44:06', 'ON', 'OK', ''),
(28, '2022-04-22 09:44:08', 'ON', 'OK', ''),
(7, '2022-04-22 09:44:09', 'ON', 'OK', ''),
(8, '2022-04-22 09:44:10', 'ON', 'OK', ''),
(9, '2022-04-22 09:44:12', 'ON', 'OK', ''),
(24, '2022-04-22 09:44:13', 'ON', 'OK', ''),
(25, '2022-04-22 09:44:15', 'ON', 'OK', ''),
(27, '2022-04-22 09:44:16', 'ON', 'OK', ''),
(23, '2022-04-22 09:44:17', 'ON', 'OK', 'battery_status, ams_ready'),
(38, '2022-04-25 08:57:09', 'ON', 'OK', ''),
(39, '2022-04-25 08:57:10', 'ON', 'OK', ''),
(4, '2022-04-25 08:57:10', 'ON', 'OK', 'ams_ready'),
(19, '2022-04-25 08:57:11', 'ON', 'OK', 'battery_status, ams_ready'),
(16, '2022-04-25 08:57:11', 'ON', 'DEGRADED', 'system_health, storage_status, nic_status, battery_status, ams_ready'),
(13, '2022-04-25 08:57:11', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(12, '2022-04-25 08:57:12', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status, ams_ready'),
(11, '2022-04-25 08:57:12', 'ON', 'DEGRADED', 'system_health, storage_status, battery_status'),
(1, '2022-04-25 08:57:13', 'ON', 'OK', 'battery_status'),
(2, '2022-04-25 08:57:13', 'ON', 'OK', 'battery_status'),
(3, '2022-04-25 08:57:14', 'ON', 'OK', 'battery_status'),
(21, '2022-04-25 08:57:14', 'ON', 'OK', 'power_supplies_redundancy, battery_status, ams_ready'),
(37, '2022-04-25 08:57:15', 'ON', 'OK', ''),
(28, '2022-04-25 08:57:16', 'ON', 'OK', ''),
(7, '2022-04-25 08:57:18', 'ON', 'OK', ''),
(8, '2022-04-25 08:57:19', 'ON', 'OK', ''),
(9, '2022-04-25 08:57:21', 'ON', 'OK', ''),
(24, '2022-04-25 08:57:22', 'ON', 'OK', ''),
(25, '2022-04-25 08:57:23', 'ON', 'OK', ''),
(27, '2022-04-25 08:57:25', 'ON', 'OK', ''),
(23, '2022-04-25 08:57:27', 'ON', 'OK', 'battery_status, ams_ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servers_type`
--

CREATE TABLE `servers_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servers_type`
--

INSERT INTO `servers_type` (`id`, `type`) VALUES
(1, 'ilo'),
(2, 'ipmi'),
(3, 'xclarity');

-- --------------------------------------------------------

--
-- Struktur dari tabel `storages`
--

CREATE TABLE `storages` (
  `id` int(2) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `brand` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `storages`
--

INSERT INTO `storages` (`id`, `uuid`, `description`, `brand`) VALUES
(1, '5a610fca-9437-11ea-bdf6-d039ea1722ff', 'BMKGJKTCL-01', 1),
(2, '5ad8250f-9437-11ea-a85e-d039ea171364', 'BMKGJKTCL-02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `storages_brand`
--

CREATE TABLE `storages_brand` (
  `id` int(2) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `storages_brand`
--

INSERT INTO `storages_brand` (`id`, `brand`) VALUES
(1, 'NetApp'),
(2, 'QNap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2a$10$zBt.4TZ49.7.2vnBIcgmjeGwwBW9mtr.v2fpEOhWGx4a1Ahf8KC/2', 1),
(4, 'karisma', '$2y$10$LoXgAmblU.j1Wjp6Zw2Bz.KRsCVRwXx5QZcLBVo/UiwlUNqNPkTb2', 1),
(6, 'sldm', '$2y$10$TINntvFHbWQRzcJGzSkI8OHJPORiD6YnR2UMbc7OiXIx4FrTw7/BG', 2),
(7, 'esx', '$2y$10$u8StC/TEQVDhdRtZ2gQ1guxc1klLJvyBgo3JKSl2vCiSqcMv6iH7K', 2),
(8, 'nutanix', '$2y$10$MNMR6t5/54of6sHsks2yD.dQXH2XqhT90rhkkV2foAeV91/o.uRLm', 2),
(13, 'harian', '$2y$10$n1Y1yKb7gqCyl4tNYR4SmOkp5SJPELLuekXag6tB7/rp2bQ5pK9Wa', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_level`
--

CREATE TABLE `users_level` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_level`
--

INSERT INTO `users_level` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_server_permission`
--

CREATE TABLE `user_server_permission` (
  `userid` int(11) DEFAULT NULL,
  `serverid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_server_permission`
--

INSERT INTO `user_server_permission` (`userid`, `serverid`) VALUES
(7, 1),
(7, 2),
(7, 3),
(8, 28),
(8, 7),
(8, 8),
(8, 9),
(8, 24),
(8, 25),
(8, 27),
(6, 38),
(6, 4),
(6, 21),
(6, 23),
(4, 38),
(4, 4),
(4, 19),
(4, 16),
(4, 13),
(4, 12),
(4, 11),
(4, 1),
(4, 2),
(4, 3),
(4, 21),
(4, 37),
(4, 28),
(4, 7),
(4, 8),
(4, 9),
(4, 24),
(4, 25),
(4, 27),
(4, 23),
(13, 38),
(13, 39),
(13, 4),
(13, 19),
(13, 1),
(13, 2),
(13, 3),
(13, 37),
(13, 28),
(13, 7),
(13, 8),
(13, 9),
(13, 24),
(13, 25),
(13, 27),
(13, 23),
(1, 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_servers_servers_type` (`type`),
  ADD KEY `FK_servers_servers_brand` (`brand`);

--
-- Indeks untuk tabel `servers_brand`
--
ALTER TABLE `servers_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `servers_history`
--
ALTER TABLE `servers_history`
  ADD KEY `FK_servers_history_servers` (`serverid`);

--
-- Indeks untuk tabel `servers_type`
--
ALTER TABLE `servers_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand`);

--
-- Indeks untuk tabel `storages_brand`
--
ALTER TABLE `storages_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_users_level` (`level`);

--
-- Indeks untuk tabel `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_server_permission`
--
ALTER TABLE `user_server_permission`
  ADD KEY `FK_users_server_permission_servers` (`serverid`),
  ADD KEY `FK_users_server_permission_users` (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `servers_brand`
--
ALTER TABLE `servers_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `servers_type`
--
ALTER TABLE `servers_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `storages`
--
ALTER TABLE `storages`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `storages_brand`
--
ALTER TABLE `storages_brand`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `servers`
--
ALTER TABLE `servers`
  ADD CONSTRAINT `FK_servers_servers_brand` FOREIGN KEY (`brand`) REFERENCES `servers_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_servers_servers_type` FOREIGN KEY (`type`) REFERENCES `servers_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `servers_history`
--
ALTER TABLE `servers_history`
  ADD CONSTRAINT `FK_servers_history_servers` FOREIGN KEY (`serverid`) REFERENCES `servers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `storages`
--
ALTER TABLE `storages`
  ADD CONSTRAINT `storages_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `storages_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_users_level` FOREIGN KEY (`level`) REFERENCES `users_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_server_permission`
--
ALTER TABLE `user_server_permission`
  ADD CONSTRAINT `FK_users_server_permission_servers` FOREIGN KEY (`serverid`) REFERENCES `servers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_server_permission_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
