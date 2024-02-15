-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 09:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_proizvod` int(11) NOT NULL,
  `ime_proizvod` varchar(64) NOT NULL,
  `kolicina_proizvod` int(11) NOT NULL,
  `cena_proizvod` int(11) NOT NULL,
  `slika_proizvod` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`id`, `id_korisnik`, `id_proizvod`, `ime_proizvod`, `kolicina_proizvod`, `cena_proizvod`, `slika_proizvod`) VALUES
(102, 6, 15, 'Kingston DIMM DDR4 16GB 3200MHz', 1, 8500, 'kingston-dimm-ddr4-16gb-3200mhz-kf432c16bb1-16-fury-beast-ram-memorija-cene.jpg'),
(103, 7, 13, 'Asus Prime B550A-CMS Maticna Ploca', 1, 13000, 'asus-prime-b550m-a-maticna-ploca-6540ea0c7e986.jpeg'),
(104, 7, 12, 'AMD Ryzen 5 5600x -Box Kuler', 1, 19000, 'ryzen.png'),
(105, 7, 14, 'AMD RX 6650 XT 8GB DDR6 - Power Color', 1, 31000, 'image64ec8d7ae5881.jpg'),
(106, 7, 15, 'Kingston DIMM DDR4 16GB 3200MHz', 1, 8500, 'kingston-dimm-ddr4-16gb-3200mhz-kf432c16bb1-16-fury-beast-ram-memorija-cene.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `ime_proizvoda` varchar(64) NOT NULL,
  `opis_proizvoda` text NOT NULL,
  `cena_proizvoda` int(11) NOT NULL,
  `kolicina_proizvoda` int(11) NOT NULL,
  `kategorija_proizvoda` varchar(42) NOT NULL,
  `slika_proizvoda` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `ime_proizvoda`, `opis_proizvoda`, `cena_proizvoda`, `kolicina_proizvoda`, `kategorija_proizvoda`, `slika_proizvoda`) VALUES
(12, 'AMD Ryzen 5 5600x -Box Kuler', 'Procesor: AMD Ryzen 5 5600x\r\nSoket:AM4\r\n\r\nSavrsen gaming procesor spreman za igranjae', 19000, 99, 'procesori', 'ryzen.png'),
(13, 'Asus Prime B550A-CMS Maticna Ploca', 'Soket:AM4\r\nRam Support : DDR4\r\nRGB:yes', 13000, 100, 'maticne_ploce', 'asus-prime-b550m-a-maticna-ploca-6540ea0c7e986.jpeg'),
(14, 'AMD RX 6650 XT 8GB DDR6 - Power Color', 'Savrsena grafika za sve moderne igre.\r\n\r\nSa ovom grafikom mozete igrati sve najnovije naslove na max detaljima u FULL HD rezoluciji', 31000, 100, 'graficke', 'image64ec8d7ae5881.jpg'),
(15, 'Kingston DIMM DDR4 16GB 3200MHz', '16GB DDR4 brza memorija sve sto vam je potrebno za vase ugodno koriscenje', 8500, 100, 'ram_memorije', 'kingston-dimm-ddr4-16gb-3200mhz-kf432c16bb1-16-fury-beast-ram-memorija-cene.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(64) NOT NULL,
  `ime` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `lozinka` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `korisnicko_ime`, `ime`, `email`, `lozinka`) VALUES
(4, 'kcblaze', 'Igor', 'igor@gmail.com', '$2y$10$JgHxox72Fj1VkvELHPWrO.zC.omWVhxECwW88ZZRqOZam0r/2auNu'),
(5, 'kcblaze97', 'Igor', 'igor123@gmail.com', '$2y$10$n7KD/GVTi1vsvKvAXS78f.gQhZRQqaRP2z03Y2nMNo83wbbu6d9HS'),
(6, 'admin', 'admin', 'admin@gmail.com', '$2y$10$bDkhxys8SSts784kNGCJ/eMx1wNBvCmxwC4OcE.3kr9Oyjjys5nTm'),
(7, 'igor123', 'Igor Stojadinovic', 'igorstojadinovic977@gmail.com', '$2y$10$5UZiv8/0aHtmUhTLiiKNkuVW7gai9Ydnt2zHbaOyuuaavH8ITwviO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
