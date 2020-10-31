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
  `id_adres` int NOT NULL,
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
  `id_jpg` int NOT NULL,
  `id_produkt` int NOT NULL,
  `nazwa_zdj` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategoria` int NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klient` int NOT NULL,
  `id_adres` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `haslo` varchar(45) NOT NULL,
  `firma` varchar(45) DEFAULT NULL,
  `region` varchar(45) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `token` int not null,
  `potwierdz` int default '0' 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `id_prac` int NOT NULL,
  `id_adres` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `haslo` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) NOT NULL,
  `imie` varchar(45) NOT NULL,
  `rodzaj_pracownika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `id_producent` int NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `cena-netto` decimal(10,2) NOT NULL,
  `cena-brutto` decimal(10,2) NOT NULL,
  `procent-vat` decimal(8,2) NOT NULL,
  `id_kategoria` int NOT NULL,
  `id_producent` int NOT NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int NOT NULL,
  `id_klient` int NOT NULL,
  `data_zamowienia` datetime NOT NULL,
  `przyjeto` tinytext DEFAULT NULL,
  `data_przyjecia` datetime DEFAULT NULL,
  `zaplacono` varchar(45) DEFAULT NULL,
  `data_wysylki` varchar(45) DEFAULT NULL,
  `zrealizowano` tinytext DEFAULT NULL,
  `data_realizacji` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkty`
--

CREATE TABLE `zamowienia_produkty` (
  `id_zamowienia_produkty` int NOT NULL,
  `id_zamowienia` int NOT NULL,
  `id_produkt` int NOT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `cena_brutto` decimal(10,2) NOT NULL,
  `ilosc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_klient_adres_idx` (`id_adres`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`id_prac`);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_jpg` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategoria` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `id_prac` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamowienia_produkty`
--
ALTER TABLE `zamowienia_produkty`
  MODIFY `id_zamowienia_produkty` int NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
