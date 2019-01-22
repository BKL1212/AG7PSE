-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jan 2019 um 00:57
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `login`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `securitytokens`
--

CREATE TABLE `securitytokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `securitytoken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `securitytokens`
--

INSERT INTO `securitytokens` (`id`, `user_id`, `identifier`, `securitytoken`, `created_at`) VALUES
(1, 1, 'f7b90759ddf5c96001fa98b9c47b343a', 'bf355f613ea2131cee0d0634ffe67402f3c53ad7', '2018-12-18 14:13:19'),
(2, 1, 'b8df7936af0291eaa79bd6239761e9bc', '70977e0b067c8411bd87ebaea85c075097c460f5', '2018-12-18 14:16:14'),
(3, 1, 'd03d2fa3aa0cb8b1ac93ef50aabd3772', '164eef22d627f02b494c89d677fc9b221ce072d8', '2018-12-19 10:51:33'),
(4, 1, '2077e261a017f5ab4bfd793a61e2de65', '53c9fd2598bd0986d6ba0278be1d344c8ed176c3', '2018-12-19 10:53:36'),
(5, 1, 'dbac17bfbf8d8fa9b268d6d84bfd5858', 'dcda4ad71cd249d09e4c7d3865d677d809a744b6', '2018-12-19 11:19:58'),
(6, 1, '64be761ef0dfb7d9fa4518022ac853db', '43f69884715050ee79f8727116c16d4539dfab4f', '2019-01-02 14:37:31'),
(7, 1, 'f79d9edf4c13afe9146dbc5817854949', '296088b448a15e85b34454fc8739a4303744fb65', '2019-01-02 15:54:31'),
(8, 1, '1023b8450fc2b45894ef9b64e989e09b', 'b87b1aa8a159c3fed4100472ad4155b572d00386', '2019-01-07 13:04:49'),
(9, 1, 'b53b3332406c9ffbe7636652c0a2fa00', 'b8fa611fd3d677750117f08b701f9a095e047a4b', '2019-01-07 17:47:27'),
(10, 1, '27bad671a761464e3f422e1c5b8efffb', '5b285a78c1385c30438e980bb60423b8342b620e', '2019-01-07 18:26:02'),
(11, 1, 'ab03b2dcd9b3bc0ed984b3c91c2da158', 'c840427289af6defb927950db71e4a7b24bcb0b5', '2019-01-07 18:29:05'),
(12, 1, 'f929a706a10e2e49d80de04b20989c66', '084809fa951388753e777421db4bae8002d28825', '2019-01-08 12:28:54'),
(13, 1, '78f45d67375213b60ad8d8fa7ce6b4e5', 'e6b6ed83231d054c4f86d536b57cbd203e7315b6', '2019-01-08 12:32:46'),
(14, 1, 'd2c3c0600367bf098991675d444087dc', 'c9ea769975316e8eb39c7f76d6d9e64ef5362305', '2019-01-08 22:42:36'),
(15, 1, 'f474cf85878fd089c0218835e079192a', 'b203b62acec9da82f18d785ee994ffff24bbb4a9', '2019-01-08 22:43:32'),
(16, 1, '7f9a495334032c2ccfa8a86b25e66e97', 'c39e0c39d6c55be9c651aa8aefc8b2a6f3efde60', '2019-01-09 09:28:13'),
(17, 1, 'f615130bdf8bf09cfb192537fceee084', '43b7f3275cc76129fb48bceccee4a8768a1bf4e6', '2019-01-09 10:16:10'),
(18, 1, '3d9370058b191865454818302e3fd043', 'f7836faf37741156f059300b86ea9c2d29d9b3dc', '2019-01-09 11:20:27'),
(19, 1, '5822f3e352a1bd874a296c730862c968', '51cde977fe198e53731a3c7b40489263448063e7', '2019-01-09 12:26:36'),
(20, 1, '29bffb863ba43e4b0df253873571b73f', '6cce5e884ab921e08d5de300a8e9722a783d55a3', '2019-01-09 12:51:58'),
(21, 1, 'ca4d8723f1c68908a46a766ef02f2c1d', 'b2f68c808f9cbe414707683eee453b2f14a9be27', '2019-01-09 12:52:27'),
(22, 1, '74beae6d94fa607cf64475eedabca056', 'ebfba86ae714c839ba37ebb40036e4ff1c15a11f', '2019-01-15 22:50:07'),
(23, 1, '7fcf714359fe3d4f91210da697c1c742', '8933b2581f8dad7f8d867848789603f547052cb9', '2019-01-15 22:51:53'),
(24, 1, 'e4d61613f91f52c5f5e3c7f7ddcbc9ea', 'e88727fff565f1ea7a526df15e0e0e69f098d0ff', '2019-01-16 00:06:26'),
(25, 1, '9e1586f87e1b7bcab830fbf5fc27efb0', 'c2a7063417a193fca17624d91269ea20d33b20bc', '2019-01-16 00:13:43'),
(26, 1, '51bceb59c6d5762ea7831bfb51b43904', '08629957b4e023c85189d6d5187ac7171247f33d', '2019-01-16 09:21:45'),
(27, 1, '36e84cdf956080ac4f1f8520ad9292b2', '6fa57a406fbb08503870855881855f9d714e2cd5', '2019-01-16 09:23:07'),
(28, 1, '22fdfcde528d57a814988ba3599e5123', 'f8126fc4538f444b744d83e6aa8ed93463b406a8', '2019-01-16 09:24:57'),
(29, 1, 'a0d8b4fdb341a9acbda309f29c92e1ec', '7154ff5a5066c44112465dd52136f8be73a3cdb5', '2019-01-16 09:26:30'),
(30, 1, 'f665e3cdc723c63d361d027d857c9948', 'c383c97e0653c004d1613f4bd4382ac485e30c38', '2019-01-16 09:29:36'),
(31, 1, '6483b4f79b2e2ded5497f519f1bb4a4c', 'd91046cf6e7ff25fa1089bf4a50c3d7c68b53c98', '2019-01-16 09:31:20'),
(32, 1, '538ec1040b738b6a0214c0b1f2acac00', 'a6ceaa6bcfee780d111e33166a53462893dc740d', '2019-01-16 09:38:09'),
(33, 1, '6aa573adb3ea7da7f3daf7a245a0cbfa', '9d383301cead9cc4d6f78e7ba1876ee98daa9115', '2019-01-16 10:17:53'),
(34, 1, '6252cdf4aac1c3a1a0161fa9e617784d', '2d85431509bb2ef3394445802beff6640ec9f9e0', '2019-01-16 10:21:05'),
(35, 1, '2b54bebcc5bf2f0f0b5529ed56ba2676', '3f5daa75090ef879b447935dd704c5ee33b6e102', '2019-01-16 10:25:28'),
(36, 1, '1dadb52a9d83101c3a23a0e39614f07c', 'bc3798a4b4e11ebbc33b83bed8edfe93ab0c82dc', '2019-01-20 14:10:17'),
(37, 1, 'b27ceb5d03a07c10e7b16b29f082744d', '187d9113d38fc1a9ad4a26e8d7fcb29e830e396e', '2019-01-20 15:21:36'),
(38, 1, '05f78c915ea9fa3bd155a3f10bc7ab89', 'ac63d976c56b063b4840a83f45e604e240476c1c', '2019-01-20 15:34:07'),
(39, 2, '1303cec8315c3c55efbdd7b89f8ab704', 'a7a92958559f769c6fda3ae2d3036e1809234f9e', '2019-01-21 23:07:25'),
(40, 1, '14e14c1873ac088ecf3c211fd9057426', '101147d64fb69517e6f8e8a4be79e7fabad64eb9', '2019-01-21 23:14:18');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passwortcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwortcode_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`, `passwortcode`, `passwortcode_time`) VALUES
(1, 'barkin96@hotmail.de', '$2y$10$QX5X7QrryFr60rfu/CXUN.vicLd9czrTk3HcRbASbAsscGtIVFiMe', 'John', 'as', '2019-01-03 15:14:46', '2019-01-07 17:49:56', NULL, NULL),
(2, 'amk@amk.amk', '$2y$10$UGKimib38hK5E.d3sYCruuZ4lqW/fgum9xGQ8QLxbx6wEvBwTiCN.', 'amk', 'amk', '2019-01-21 23:07:14', NULL, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
