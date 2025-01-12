-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 12, 2025 at 08:29 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `Id` int(11) NOT NULL,
  `ItemName` varchar(255) DEFAULT NULL,
  `Price` int(4) DEFAULT NULL,
  `Quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koszyk`
--

INSERT INTO `koszyk` (`Id`, `ItemName`, `Price`, `Quantity`) VALUES
(97, 'Komputer', 4198, 1),
(98, 'Telefon', 547, 1),
(99, 'słuchawki', 249, 5),
(100, 'Tablet', 1249, 3),
(101, 'Monitor', 799, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `Id` int(11) NOT NULL,
  `ItemName` varchar(255) DEFAULT NULL,
  `Price` int(4) DEFAULT NULL,
  `ImageUrl` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`Id`, `ItemName`, `Price`, `ImageUrl`, `Category`) VALUES
(1, 'Laptop', 999, 'product-laptop.png', 'elektronika'),
(2, 'Telefon', 547, 'product-phone.png', 'elektronika'),
(3, 'Tablet', 1249, 'product-tablet.png', 'elektronika'),
(4, 'Komputer', 4198, 'product-pc.png', 'elektronika'),
(5, 'Głośnik', 419, 'product-speaker.png', 'elektronika'),
(6, 'Monitor', 799, 'product-monitor.png', 'elektronika'),
(7, 'Zestaw ołówków', 25, 'product-pencils.png', 'przedmioty szkolne'),
(8, 'Zestaw kredek', 38, 'product-crayons.png', 'przedmioty szkolne'),
(9, 'Piórnik', 42, 'product-pencilcase.png', 'przedmioty szkolne'),
(10, 'Plecak', 119, 'product-backpack.png', 'przedmioty szkolne'),
(11, 'Długopis', 8, 'product-pen.png', 'przedmioty szkolne'),
(12, 'Pióro', 19, 'product-fountainpen.png', 'przedmioty szkolne'),
(13, 'Rower', 8799, 'product-rower.png', 'inne'),
(14, 'Poduszka', 95, 'product-poduszka.png', 'inne'),
(15, 'Etui na klucze', 69, 'product-etui.png', 'inne'),
(16, 'Okulary', 629, 'product-glasses.png', 'inne'),
(17, 'Grzebień', 84, 'product-brush.png', 'inne'),
(18, 'Smycz', 26, 'product-leash.png', 'inne'),
(19, 'słuchawki', 249, 'product-earbuds.png', 'elektronika');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
