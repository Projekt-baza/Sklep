-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql.ct8.pl
-- Czas generowania: 01 Gru 2020, 23:39
-- Wersja serwera: 5.7.31-34-log
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m18580_sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--
use m1850_sklep;
CREATE TABLE `adres` (
  `id_adres` int NOT NULL,
  `miasto` varchar(45) NOT NULL,
  `miejscowosc` varchar(45) NOT NULL,
  `wojewodztwo` varchar(45) NOT NULL,
  `kod_pocztowy` varchar(45) NOT NULL,
  `ulica` varchar(45) NOT NULL,
  `nr_domu` varchar(45) NOT NULL,
  `nr_mieszkania` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`id_adres`, `miasto`, `miejscowosc`, `wojewodztwo`, `kod_pocztowy`, `ulica`, `nr_domu`, `nr_mieszkania`) VALUES
(1, 'Warszawa', 'Warszawa', 'Mazowieckie', '12-234', 'Aleje Krakowskie', '21', '37'),
(2, 'Siedlce', 'Siedlce', 'Mazowieckie', '08-110', 'Warszawska', '69', '1'),
(3, 'Elbląg', 'Elbląg', 'Warmińsko-Mazurskie', '21-150', 'Ulicowa', '4', '20'),
(4, 'Józefów', 'Warszawa', 'Mazowieckie', '64-284', 'Fajna', '13', '37'),
(5, 'Poznań', 'Poznań', 'Wielkopolskie', '77-777', 'Kwiatowa', '1', '23'),
(6, 'Stoczek Łukowski', 'ęśąćż', 'ęśąćż', '21-450', 'Stara', '74a', ''),
(7, 'Stoczek Lukowski', 'Stara Prawda', 'Lubelskie', '21-450', 'Stara Prawda', '74a', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria`
--

CREATE TABLE `galeria` (
  `id_jpg` int NOT NULL,
  `id_produkt` int DEFAULT NULL,
  `nazwa_zdj` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `galeria`
--

INSERT INTO `galeria` (`id_jpg`, `id_produkt`, `nazwa_zdj`) VALUES
(1, 1, 'koszulka czarna flex2.jpg'),
(2, 1, 'koszulka czarna flex3.jpg'),
(3, 2, 'koszulka biala flex2.jpg'),
(4, 2, 'koszulka biala flex3.jpg'),
(5, 3, 'bluza biala flex2.jpg'),
(6, 3, 'bluza biala flex3.jpg'),
(7, 4, 'bluza czarna flex2.jpg'),
(8, 4, 'bluza czarna flex3.jpg'),
(9, 5, 'dresy czarne flex2.jpg'),
(10, 5, 'dresy czarne flex3.jpg'),
(11, 6, 'dresy biale flex2.jpg'),
(12, 6, 'dresy biale flex3.jpg'),
(13, 7, 'sneakersy biale flex2.jpg'),
(14, 7, 'sneakersy biale flex3.jpg'),
(15, 8, 'sneakersy czarne flex2.jpg'),
(16, 8, 'sneakersy czarne flex2.jpg'),
(17, 9, 'longsleeve czarny flex2.jpg'),
(18, 9, 'longsleeve czarny flex3.jpg'),
(19, 10, 'longsleeve bialy flex2.jpg'),
(20, 10, 'longsleeve bialy flex3.jpg'),
(21, 11, 'longsleeve szary flex2.jpg'),
(22, 11, 'longsleeve szary flex3.jpg'),
(23, 12, 'longsleeve granatowy flex2.jpg'),
(24, 12, 'longsleeve granatowy flex3.jpg'),
(25, 13, 'koszulka szara flex2.jpg'),
(26, 13, 'koszulka szara flex3.jpg'),
(27, 14, 'koszulka granatowa flex2.jpg'),
(28, 14, 'koszulka granatowa flex3.jpg'),
(29, 15, 'koszulka czerwona flex2.jpg'),
(30, 15, 'koszulka czerwona flex3.jpg'),
(31, 16, 'bluza szara flex2.jpg'),
(32, 16, 'bluza szara flex3.jpg'),
(33, 17, 'bluza granatowa flex2.php'),
(34, 17, 'bluza granatowa flex3.php'),
(35, 18, 'bluza czerwona flex2.jpg'),
(36, 18, 'bluza czerwona flex3.jpg'),
(37, 19, 'dresy szare flex2.jpg'),
(38, 19, 'dresy szare flex3.jpg'),
(39, 20, 'dresy granatowe flex2.jpg'),
(40, 20, 'dresy granatowe flex3.jpg'),
(41, 21, 'dresy czerwone flex2.jpg'),
(42, 21, 'dresy czerwone flex3.jpg'),
(43, 22, 'dresy szare flex2.jpg'),
(44, 22, 'dresy szare flex3.jpg'),
(45, 23, 'sneakersy granatowe flex2.jpg'),
(46, 23, 'sneakersy granatowe flex3.jpg'),
(47, 24, 'sneakersy czerwone flex2.jpg'),
(48, 24, 'sneakersy czerwone flex3.jpg'),
(49, 25, 'croptop bialy flex2.jfif'),
(50, 25, 'croptop bialy flex3.jfif'),
(51, 26, 'croptop czarny flex2.jfif'),
(52, 26, 'croptop czarny flex3.jfif'),
(53, 27, 'croptop granatowy flex2.jfif'),
(54, 29, 'croptop szary flex2.jfif'),
(55, 28, 'croptop szary flex3.jfif'),
(56, 29, 'croptop czerwony flex2.jfif'),
(57, 29, 'croptop czerwony flex3.jfif'),
(58, 30, 'koszulka edycja limitowana2.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategoria` int NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategoria`, `nazwa`) VALUES
(1, 'Bluzy'),
(2, 'Spodnie'),
(3, 'Buty'),
(4, 'T-shirty');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `kategoria_produkt`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `kategoria_produkt` (
`kat` int
,`produkt` int
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klient` int NOT NULL,
  `id_adres` int DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `firma` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `token` varchar(50) NOT NULL,
  `potwierdz` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`id_klient`, `id_adres`, `email`, `login`, `haslo`, `firma`, `nip`, `nazwisko`, `imie`, `token`, `potwierdz`) VALUES
(8, 7, 'uzytkownik1@wp.pl', 'gastolekdo88', '$2y$10$z92D7fJ2N6ZjeGe3OcKOXe3yFs/va7kGG9Jieq92ijNo.PodHIiXi', '', '', 'Gastolek', 'Jakub', 'd804e001e2e87fb5c75f5b7dcfd8937f', 1),
(9, 6, 'uzytkownik2@wp.pl', 'chlebki124', '$2y$10$G8yPyrhOVPrrOUhaS1JlLeNTxnYpSiQTKYo7NS6oRMd2Q2yhmugVm', '', '', 'Gastolek', 'Danana', '8e207a0b5e94cdacf88062027f396724', 1);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `niedawno_dodane`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `niedawno_dodane` (
`id_produkt` int
,`nazwa` varchar(45)
,`typ` varchar(45)
,`opis` varchar(45)
,`zdj` varchar(45)
,`cena_netto` decimal(10,2)
,`cena_brutto` decimal(10,2)
,`procent_vat` decimal(8,2)
,`id_kategoria` int
,`id_producent` int
,`ilosc` int
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `id_prac` int NOT NULL,
  `id_adres` int DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `rodzaj_pracownika` varchar(45) NOT NULL,
  `token` varchar(50) NOT NULL,
  `potwierdz` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pracownik`
--

INSERT INTO `pracownik` (`id_prac`, `id_adres`, `email`, `login`, `haslo`, `nip`, `nazwisko`, `imie`, `rodzaj_pracownika`, `token`, `potwierdz`) VALUES
(5, 1, 'admin@wp.pl', 'radeven1232', '$2y$10$736ICxc5PZBNVxQ0Kst1d.s7VIZ/VIl2kY7eagnD0Y6DrR.ZX6LpG', NULL, 'Gastolek', 'Jakub', 'Admin', '026018d8bd81698e886e58d5e5114c83', 1),
(6, 2, 'pracownik@wp.pl', 'Pracownik', '$2y$10$736ICxc5PZBNVxQ0Kst1d.s7VIZ/VIl2kY7eagnD0Y6DrR.ZX6LpG', NULL, 'Hepner', 'Bartłomiej', 'Pracownik', '046e18r8bd81698e856e58d5e1114c83', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `id_producent` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `producent`
--

INSERT INTO `producent` (`id_producent`, `nazwa`) VALUES
(1, 'CiuchyProduction'),
(2, 'FajneSzmaty'),
(3, 'TurboBawełna');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `producent_produkt`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `producent_produkt` (
`pro` int
,`produkt` int
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `id_produkt` int NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `typ` varchar(45) NOT NULL,
  `opis` varchar(45) NOT NULL,
  `zdj` varchar(45) NOT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `cena_brutto` decimal(10,2) NOT NULL,
  `procent_vat` decimal(8,2) NOT NULL,
  `id_kategoria` int DEFAULT NULL,
  `id_producent` int DEFAULT NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`id_produkt`, `nazwa`, `typ`, `opis`, `zdj`, `cena_netto`, `cena_brutto`, `procent_vat`, `id_kategoria`, `id_producent`, `ilosc`) VALUES
(1, 'koszulka czarna flex', 'długa', 'z nadrukiem, bawelniana', 'koszulka czarna flex.jpg', '40.64', '49.99', '23.00', 4, 1, 100),
(2, 'koszulka biala flex', 'długa', 'z nadrukiem, bawelniana', 'koszulka biala flex.jpg', '40.64', '49.99', '23.00', 4, 1, 200),
(3, 'bluza biala flex', 'długa', 'z nadrukiem, bawelniana', 'bluza biala flex.jpg', '81.29', '99.99', '23.00', 1, 3, 100),
(4, 'bluza czarna flex', 'długa', 'z nadrukiem, bawelniana', 'bluza czarna flex.jpg', '81.29', '99.99', '23.00', 1, 3, 200),
(5, 'dresy czarne flex', 'długie', 'poliestrowe', 'dresy czarne flex.jpg', '97.56', '119.99', '23.00', 2, 2, 50),
(6, 'dresy biale flex', 'długie', 'poliestrowe', 'dresy biale flex.jpg', '97.56', '119.99', '23.00', 2, 2, 50),
(7, 'sneakersy biale flex', 'krótkie', 'we wzory', 'sneakersy biale flex.jpg', '81.29', '99.99', '23.00', 3, 1, 50),
(8, 'sneakersy czarne flex', 'krótkie', 'we wzory', 'sneakersy czarne flex.jpg', '81.29', '99.99', '23.00', 3, 1, 50),
(9, 'longsleeve czarny flex', 'długi', 'z nadrukiem, bawelniany', 'longsleeve czarny flex.jpg', '40.64', '49.99', '23.00', 1, 1, 100),
(10, 'longsleeve bialy flex', 'długi', 'z nadrukiem, bawelniany', 'longsleeve bialy flex.jpg', '40.64', '49.99', '23.00', 1, 1, 100),
(11, 'longsleeve szary flex', 'długi', 'z nadrukiem, bawelniany', 'longsleeve szary flex.jpg', '40.64', '49.99', '23.00', 1, 1, 50),
(12, 'longsleeve granatowy flex', 'długi', 'z nadrukiem, bawelniany', 'longsleeve granatowy flex.jpg', '40.64', '49.99', '23.00', 1, 1, 50),
(13, 'koszulka szara flex', 'długa', 'z nadrukiem, bawelniana', 'koszulka szara flex.jpg', '40.64', '49.99', '23.00', 4, 1, 50),
(14, 'koszulka granatowa flex', 'długa', 'z nadrukiem, bawelniana', 'koszulka granatowa flex.jpg', '40.64', '49.99', '23.00', 4, 1, 50),
(15, 'koszulka czerwona flex', 'długa', 'z nadrukiem, bawelniana', 'koszulka czerwona flex.jpg', '40.64', '49.99', '23.00', 4, 1, 50),
(16, 'bluza szara flex', 'długa', 'z nadrukiem, bawelniana', 'bluza szara flex.jpg', '81.29', '99.99', '23.00', 1, 3, 50),
(17, 'bluza granatowa flex', 'długa', 'z nadrukiem, bawelniana', 'bluza granatowa flex.jpg', '81.29', '99.99', '23.00', 1, 3, 50),
(18, 'bluza czerwona flex', 'długa', 'z nadrukiem, bawelniana', 'bluza czerwona flex.jpg', '81.29', '99.99', '23.00', 1, 3, 50),
(19, 'dresy szare flex', 'długie', 'poliestrowe', 'dresy szare flex.jpg', '97.56', '119.99', '23.00', 2, 2, 50),
(20, 'dresy granatowe flex', 'długie', 'poliestrowe', 'dresy granatowe flex.jpg', '97.56', '119.99', '23.00', 2, 2, 50),
(21, 'dresy czerwone flex', 'długie', 'poliestrowe', 'dresy czerwone flex.jpg', '97.56', '119.99', '23.00', 2, 2, 50),
(22, 'sneakersy szare flex', 'krótkie', 'we wzory', 'sneakersy szare flex.jpg', '81.29', '99.99', '23.00', 3, 1, 50),
(23, 'sneakersy granatowe flex', 'krótkie', 'we wzory', 'sneakersy granatowe flex.jpg', '81.29', '99.99', '23.00', 3, 1, 50),
(24, 'sneakersy czerwone flex', 'krótkie', 'we wzory', 'sneakersy czerwone flex.jpg', '81.29', '99.99', '23.00', 3, 1, 50),
(25, 'croptop bialy flex', 'krótki', 'we wzory', 'croptop bialy flex.jfif', '81.29', '99.99', '23.00', 4, 1, 50),
(26, 'croptop czarny flex', 'krótki', 'we wzory', 'croptop czarny flex.jfif', '81.29', '99.99', '23.00', 4, 1, 50),
(27, 'croptop granatowy flex', 'krótki', 'we wzory', 'croptop granatowy flex.jfif', '81.29', '99.99', '23.00', 4, 1, 50),
(28, 'croptop szary flex', 'krótki', 'we wzory', 'croptop szary flex.jfif', '81.29', '99.99', '23.00', 4, 1, 48),
(29, 'croptop czerwony flex', 'krótki', 'we wzory', 'croptop czerwony flex.jfif', '81.29', '99.99', '23.00', 4, 1, 47),
(30, 'koszulka edycja limitowana', 'długa', 'z nadrukiem, bawelniana', 'koszulka edycja limitowana.jpg', '40.64', '49.99', '23.00', 4, 1, 20);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `wypisz_kategorie`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `wypisz_kategorie` (
`kategoria` int
,`nazwa` varchar(45)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `wypisz_producent`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `wypisz_producent` (
`producent` int
,`nazwa` varchar(45)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int NOT NULL,
  `id_klient` int DEFAULT NULL,
  `data_zamowienia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `przyjeto` int DEFAULT NULL,
  `data_przyjecia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Wyzwalacze `zamowienia`
--
DELIMITER $$
CREATE TRIGGER `data_dodania` BEFORE INSERT ON `zamowienia` FOR EACH ROW SET NEW.data_zamowienia = now()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `data_zatw` BEFORE UPDATE ON `zamowienia` FOR EACH ROW SET NEW.data_przyjecia = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkty`
--

CREATE TABLE `zamowienia_produkty` (
  `id_zamowienia_produkty` int NOT NULL,
  `id_zamowienia` int DEFAULT NULL,
  `id_produkt` int DEFAULT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `cena_brutto` decimal(10,2) NOT NULL,
  `ilosc` int NOT NULL,
  `potwierdz` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura widoku `kategoria_produkt`
--
DROP TABLE IF EXISTS `kategoria_produkt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`m18580_user`@`%.devil` SQL SECURITY DEFINER VIEW `kategoria_produkt`  AS  select `produkt`.`id_kategoria` AS `kat`,`produkt`.`id_produkt` AS `produkt` from `produkt` ;

-- --------------------------------------------------------

--
-- Struktura widoku `niedawno_dodane`
--
DROP TABLE IF EXISTS `niedawno_dodane`;

CREATE ALGORITHM=UNDEFINED DEFINER=`m18580_user`@`%.devil` SQL SECURITY DEFINER VIEW `niedawno_dodane`  AS  select `produkt`.`id_produkt` AS `id_produkt`,`produkt`.`nazwa` AS `nazwa`,`produkt`.`typ` AS `typ`,`produkt`.`opis` AS `opis`,`produkt`.`zdj` AS `zdj`,`produkt`.`cena_netto` AS `cena_netto`,`produkt`.`cena_brutto` AS `cena_brutto`,`produkt`.`procent_vat` AS `procent_vat`,`produkt`.`id_kategoria` AS `id_kategoria`,`produkt`.`id_producent` AS `id_producent`,`produkt`.`ilosc` AS `ilosc` from `produkt` order by `produkt`.`id_produkt` desc limit 4 ;

-- --------------------------------------------------------

--
-- Struktura widoku `producent_produkt`
--
DROP TABLE IF EXISTS `producent_produkt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`m18580_user`@`%.devil` SQL SECURITY DEFINER VIEW `producent_produkt`  AS  select `produkt`.`id_producent` AS `pro`,`produkt`.`id_produkt` AS `produkt` from `produkt` ;

-- --------------------------------------------------------

--
-- Struktura widoku `wypisz_kategorie`
--
DROP TABLE IF EXISTS `wypisz_kategorie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`m18580_user`@`%.devil` SQL SECURITY DEFINER VIEW `wypisz_kategorie`  AS  select `kategoria`.`id_kategoria` AS `kategoria`,`kategoria`.`nazwa` AS `nazwa` from `kategoria` ;

-- --------------------------------------------------------

--
-- Struktura widoku `wypisz_producent`
--
DROP TABLE IF EXISTS `wypisz_producent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`m18580_user`@`%.devil` SQL SECURITY DEFINER VIEW `wypisz_producent`  AS  select `producent`.`id_producent` AS `producent`,`producent`.`nazwa` AS `nazwa` from `producent` ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id_adres`);

--
-- Indeksy dla tabeli `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_jpg`),
  ADD KEY `fk_galeria_produkt_idx` (`id_produkt`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategoria`);

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_klient_adres_idx` (`id_adres`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`id_prac`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_pracownik_adres` (`id_adres`);

--
-- Indeksy dla tabeli `producent`
--
ALTER TABLE `producent`
  ADD PRIMARY KEY (`id_producent`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id_produkt`),
  ADD KEY `fk_produkt_kategoria_idx` (`id_kategoria`),
  ADD KEY `fk_produce_idx` (`id_producent`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `fk_zamowienia_klient_idx` (`id_klient`);

--
-- Indeksy dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  ADD PRIMARY KEY (`id_zamowienia_produkty`),
  ADD KEY `fk_zamowienia-produkty_zamowienia_idx` (`id_zamowienia`),
  ADD KEY `fk_zamowienia-produkty_produkty_idx` (`id_produkt`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `id_adres` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_jpg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `id_prac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
  MODIFY `id_producent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id_produkt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  MODIFY `id_zamowienia_produkty` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_produkt` FOREIGN KEY (`id_produkt`) REFERENCES `produkt` (`id_produkt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD CONSTRAINT `fk_klient_adres` FOREIGN KEY (`id_adres`) REFERENCES `adres` (`id_adres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD CONSTRAINT `fk_pracownik_adres` FOREIGN KEY (`id_adres`) REFERENCES `adres` (`id_adres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `fk_produce` FOREIGN KEY (`id_producent`) REFERENCES `producent` (`id_producent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produkt_kategoria` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `fk_zamowienia_klient` FOREIGN KEY (`id_klient`) REFERENCES `klient` (`id_klient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  ADD CONSTRAINT `fk_zamowienia_produkty_produkty` FOREIGN KEY (`id_produkt`) REFERENCES `produkt` (`id_produkt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zamowienia_produkty_zamowienia` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id_zamowienia`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
