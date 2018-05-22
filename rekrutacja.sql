-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2018, 12:57
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rekrutacja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci,
  `pass` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `pass`) VALUES
(1, 'testowy', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_kandydata`
--

CREATE TABLE `dane_kandydata` (
  `lp` int(11) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `imie_ojca` varchar(30) NOT NULL,
  `telefon` int(9) NOT NULL,
  `adres` varchar(30) NOT NULL,
  `kod_pocztowy` varchar(6) NOT NULL,
  `poczta` varchar(30) NOT NULL,
  `gimnazjum` varchar(30) NOT NULL,
  `plec` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabela przechowuje dane kandydata';

--
-- Zrzut danych tabeli `dane_kandydata`
--

INSERT INTO `dane_kandydata` (`lp`, `pesel`, `imie`, `nazwisko`, `imie_ojca`, `telefon`, `adres`, `kod_pocztowy`, `poczta`, `gimnazjum`, `plec`) VALUES
(6, '12345678966', 'Wojciech', 'Marek', 'ehheheh', 123456789, 'werwerwer', '37-212', 'LEsdf', 'fetrertrt', 'mezczyzna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_who` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `log_whichDB` text COLLATE utf8_polish_ci NOT NULL,
  `log_ip` text COLLATE utf8_polish_ci NOT NULL,
  `log_type` text COLLATE utf8_polish_ci NOT NULL,
  `efekt` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='tabela zawierająca logi manipulowania danymi w bazie';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `punktacja`
--

CREATE TABLE `punktacja` (
  `pesel` varchar(11) NOT NULL,
  `j_polski` int(3) NOT NULL,
  `wos` int(3) NOT NULL,
  `matematyka` int(3) NOT NULL,
  `przyrodnicze` int(3) NOT NULL,
  `j_podstawowy` int(3) NOT NULL,
  `j_rozszerzony` int(3) NOT NULL,
  `s_polski` int(11) NOT NULL,
  `s_wos` int(11) NOT NULL,
  `s_matematyka` int(11) NOT NULL,
  `s_angielski` int(11) NOT NULL,
  `p_dodatkowy` int(11) NOT NULL,
  `s_j_rozszerzony` int(11) NOT NULL,
  `naukowe` int(3) NOT NULL,
  `sportowe` int(3) NOT NULL,
  `artystyczne` int(3) NOT NULL,
  `wolontariat` int(3) NOT NULL,
  `pasek` text NOT NULL,
  `kopia` varchar(10) NOT NULL,
  `j1_gimnazjum` varchar(30) NOT NULL,
  `j2_gimnazjum` varchar(30) NOT NULL,
  `j1_wybrany` varchar(30) NOT NULL,
  `j2_wybrany` varchar(30) NOT NULL,
  `typ1` varchar(30) NOT NULL,
  `typ2` varchar(30) NOT NULL,
  `typ3` varchar(30) NOT NULL,
  `przyjety` varchar(30) NOT NULL,
  `suma_punkty` int(3) NOT NULL,
  `suma_oke` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabela przechowuje punktacjekandydata';

--
-- Zrzut danych tabeli `punktacja`
--

INSERT INTO `punktacja` (`pesel`, `j_polski`, `wos`, `matematyka`, `przyrodnicze`, `j_podstawowy`, `j_rozszerzony`, `s_polski`, `s_wos`, `s_matematyka`, `s_angielski`, `p_dodatkowy`, `s_j_rozszerzony`, `naukowe`, `sportowe`, `artystyczne`, `wolontariat`, `pasek`, `kopia`, `j1_gimnazjum`, `j2_gimnazjum`, `j1_wybrany`, `j2_wybrany`, `typ1`, `typ2`, `typ3`, `przyjety`, `suma_punkty`, `suma_oke`) VALUES
('12345678966', 22, 22, 22, 22, 22, 22, 33, 33, 33, 3, 33, 3, 33, 33, 3, 3, '0', 'oryginal', 'angielski', 'angielski', 'angielski', 'angielski', 't.mech.poj.samochodowy', 't.mech.poj.samochodowy', 't.mech.poj.samochodowy', '', 342, 132);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ_szkoly`
--

CREATE TABLE `typ_szkoly` (
  `typ` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabela przechowuje nazy kierunków w szkole';

--
-- Zrzut danych tabeli `typ_szkoly`
--

INSERT INTO `typ_szkoly` (`typ`) VALUES
('t.elektronik'),
('t.handlowiec'),
('t.hotelarz'),
('t.informatyk'),
('t.mech.cad/cam'),
('t.mech.poj.samochodowy'),
('t.mech.rolnictwa'),
('t.mech.spawacz'),
('t.mechatronik'),
('t.urz.i.s.en.odnawialnej'),
('t.zyw.i.us.gastronomicznych'),
('zsz.cukiernik'),
('zsz.elektryk'),
('zsz.fryzjer'),
('zsz.kucharz'),
('zsz.mech.op.poj.i.m.rolnicznych'),
('zsz.mech.poj.samochodowych'),
('zsz.murarz-tynkarz'),
('zsz.op.ob.skrawajacych'),
('zsz.piekarz'),
('zsz.slusarz'),
('zsz.sprzedawca'),
('zsz.stolarz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `login`, `password`, `email`, `pin`) VALUES
(2, 'administrator', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dane_kandydata`
--
ALTER TABLE `dane_kandydata`
  ADD PRIMARY KEY (`pesel`),
  ADD UNIQUE KEY `lp` (`lp`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `punktacja`
--
ALTER TABLE `punktacja`
  ADD PRIMARY KEY (`pesel`);

--
-- Indexes for table `typ_szkoly`
--
ALTER TABLE `typ_szkoly`
  ADD PRIMARY KEY (`typ`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `dane_kandydata`
--
ALTER TABLE `dane_kandydata`
  MODIFY `lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
