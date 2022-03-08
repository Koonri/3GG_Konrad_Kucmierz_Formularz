-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Mar 2022, 13:37
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwer_logowania`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Passhash` varchar(255) NOT NULL,
  `Imie` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`ID`, `email`, `Passhash`, `Imie`, `Nazwisko`) VALUES
(1, 'JanKowal@protonmail.com', '$argon2i$v=19$m=16,t=2,p=1$T0dReWZsMjVBTVNBYmIyYw$7kEAsiMHsPvP+JFPq3HE+A', 'Jan', 'Kowal'),
(2, '1@1', '$argon2i$v=19$m=65536,t=4,p=1$Qzk3QzlRUWtDaFYzczUxRw$Fo/r52TS76LIH2/QnkjfqSo3/HY4tR8rCh16EG6DC+M', '3', '4'),
(3, '2@1', '$argon2i$v=19$m=65536,t=4,p=1$V2FPQ0Y3NjU1OEkzZUdaRQ$jiousOUeX7PRv2vJQXewpXHriGW9Q4G2eSRARgyZW+M', '2', '2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
