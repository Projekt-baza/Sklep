-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Paź 2020, 18:07
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--
drop database if exists sklep;
create database if not exists sklep;
use sklep;
CREATE TABLE `adres` (
  `id_adres` int NOT NULL primary key auto_increment,
  `miasto` varchar(45) NOT NULL,
  `miejscowosc` varchar(45) NOT NULL,
  `wojewodztwo` varchar(45) NOT NULL,
  `kod-pocztowy` varchar(45) NOT NULL,
  `ulica` varchar(45) NOT NULL,
  `nr_domu` varchar(45) NOT NULL,
  `nr_mieszkania` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria`
--

CREATE TABLE `galeria` (
  `id_jpg` int NOT NULL primary key auto_increment,
  `id_produkt` int NULL,
  `nazwa_zdj` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategoria` int NOT NULL primary key auto_increment,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategoria`, `nazwa`) VALUES
(1, 'bluza'),
(2, 'spodnie'),
(3, 'buty'),
(4, 'tshirt');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klient` int NOT NULL primary key auto_increment,
  `id_adres` int NULL,
  `email` varchar(45) NOT NULL UNIQUE,
  `login` varchar(45) NOT NULL UNIQUE,
  `haslo` varchar(255) NOT NULL,
  `firma` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `token` varchar(50) not null,
  `potwierdz` int default '0' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `id_prac` int NOT NULL primary key auto_increment,
  `id_adres` int  NULL,
  `email` varchar(45) NOT NULL UNIQUE,
  `login` varchar(45) NOT NULL UNIQUE,
  `haslo` varchar(255) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `rodzaj_pracownika` text NOT NULL,
  `token` varchar(50) not null,
  `potwierdz` int default '0' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `id_producent` int NOT NULL primary key auto_increment,
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
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `id_produkt` int NOT NULL primary key auto_increment,
  `nazwa` varchar(45) NOT NULL,
  `typ` varchar(45) NOT NULL,
  `opis` varchar(45) NOT NULL,
  `zdj` varchar(45) NOT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `cena_brutto` decimal(10,2) NOT NULL,
  `procent_vat` decimal(8,2) NOT NULL,
  `id_kategoria` int  NULL,
  `id_producent` int  NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`id_produkt`, `nazwa`, `typ`, `opis`, `zdj`, `cena_netto`, `cena_brutto`, `procent_vat`, `id_kategoria`, `id_producent`, `ilosc`) VALUES
(1, 'koszulka czarna flex', 'długa', 'z nadrukiem, bawelniana', 'koszulkaczflex.png', '40.64', '49.99', '23.00', 4, 1, 100),
(2, 'koszulka biala flex', 'długa', 'z nadrukiem, bawelniana', 'koszulkabiflex.png', '40.64', '49.99', '23.00', 4, 1, 200),
(3, 'bluza biala flex', 'długa', 'z nadrukiem, bawelniana', 'bluzabiflex.png', '81.29', '99.99', '23.00', 1, 3, 100),
(4, 'bluza czarna flex', 'długa', 'z nadrukiem, bawelniana', 'bluzaczflex.png', '81.29', '99.99', '23.00', 1, 3, 200),
(5, 'dresy czarne flex', 'długie', 'poliestrowe', 'dresyczflex.png', '97.56', '119.99', '23.00', 2, 2, 50),
(6, 'dresy biale flex', 'długie', 'poliestrowe', 'dresybiflex.png', '97.56', '119.99', '23.00', 2, 2, 50),
(7, 'sneakersy biale flex', 'krótkie', 'we wzory', 'sneakbiflex.png', '81.29', '99.99', '23.00', 3, 1, 50),
(8, 'sneakersy czarne flex', 'krótkie', 'we wzory', 'sneakczflex.png', '81.29', '99.99', '23.00', 3, 1, 50);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int NOT NULL primary key auto_increment,
  `id_klient` int NULL,
  `data_zamowienia` datetime NOT NULL DEFAULT NOW(),
  `przyjeto` int DEFAULT null,
  `data_przyjecia` date DEFAULT null
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkty`
--

CREATE TABLE `zamowienia_produkty` (
  `id_zamowienia_produkty` int NOT NULL primary key auto_increment,
  `id_zamowienia` int  NULL,
  `id_produkt` int  NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `cena_brutto` decimal(10,2) NOT NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--
alter table `pracownik`
add key `fk_pracownik_adres` (`id_adres`);

--
-- Indeksy dla tabeli `adres`
--


--
-- Indeksy dla tabeli `galeria`
--
ALTER TABLE `galeria`
  ADD KEY `fk_galeria_produkt_idx` (`id_produkt`);

--
-- Indeksy dla tabeli `kategoria`
--


--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
 
  ADD KEY `fk_klient_adres_idx` (`id_adres`);

--
-- Indeksy dla tabeli `pracownik`
--


--
-- Indeksy dla tabeli `producent`
--


--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD KEY `fk_produkt_kategoria_idx` (`id_kategoria`),
  ADD KEY `fk_produce_idx` (`id_producent`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
 
  ADD KEY `fk_zamowienia_klient_idx` (`id_klient`);

--
-- Indeksy dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  ADD KEY `fk_zamowienia-produkty_zamowienia_idx` (`id_zamowienia`),
  ADD KEY `fk_zamowienia-produkty_produkty_idx` (`id_produkt`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `galeria`
--


--
-- AUTO_INCREMENT dla tabeli `kategoria`
--


--
-- AUTO_INCREMENT dla tabeli `klient`
--


--
-- AUTO_INCREMENT dla tabeli `pracownik`
--


--
-- AUTO_INCREMENT dla tabeli `zamowienia_produkty`
--


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

alter table `pracownik` 
ADD CONSTRAINT `fk_pracownik_adres` FOREIGN KEY (`id_adres`) references `adres` (`id_adres`) ON DELETE CASCADE ON UPDATE CASCADE;  
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
