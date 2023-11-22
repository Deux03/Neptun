-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 18. 16:57
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `neptun`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasználó`
--

CREATE TABLE `felhasználó` (
  `felhasználó név` varchar(6) NOT NULL,
  `státusz` tinyint(1) NOT NULL,
  `szak` varchar(30) NOT NULL,
  `születési dátum` date NOT NULL,
  `születési hely` varchar(20) NOT NULL,
  `jelszó` varchar(250) NOT NULL,
  `név` varchar(40) NOT NULL,
  `hallgató-e` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasználó`
--

INSERT INTO `felhasználó` (`felhasználó név`, `státusz`, `szak`, `születési dátum`, `születési hely`, `jelszó`, `név`, `hallgató-e`) VALUES
('QWE34Z', 1, 'teaching', '2001-05-28', 'Debrecen', '$2y$10$Tmyo8/vU9w7kxHYqJ7ENxesIWuJgblEKTjmjKmUAz9hXfUFYERYam', 'Halász Gergő', 0),
('QWERT4', 0, 'teaching', '1999-12-30', 'Budapest', '$2y$10$WuL/tBXYMgdMSjEtK2c6OecZ3sWi9XsztyQb6JZPbmpc.0bCmwtA.', 'Palkó Lilla', 0),
('QWERTZ', 1, 'info', '2002-06-07', 'Szeged', '$2y$10$81MFusD0AVju.4sL215UHemz47b7zFDxxnMWHQs1CS1jLPvfnAjY2', 'Nagy János', 0),
('teache', 1, 'info', '2000-02-02', 'Szeged', '$2y$10$/gh2jM.3LBwAPILdkCHCy.3ozLXEK2Fb7rBX.Iej8sLZM3KXwgSQu', 'Dr. Nagy Gábor', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hallgatja`
--

CREATE TABLE `hallgatja` (
  `felhasználó név` varchar(6) NOT NULL,
  `kód` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jelentkezik`
--

CREATE TABLE `jelentkezik` (
  `felhasználó név` varchar(6) NOT NULL,
  `kód` varchar(20) NOT NULL,
  `időpont` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kurzus`
--

CREATE TABLE `kurzus` (
  `kód` varchar(20) NOT NULL,
  `férőhely` int(3) NOT NULL,
  `heti óraszám` int(2) NOT NULL,
  `jelleg` varchar(20) NOT NULL,
  `cím` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kurzus`
--

INSERT INTO `kurzus` (`kód`, `férőhely`, `heti óraszám`, `jelleg`, `cím`) VALUES
('I604e-1', 600, 2, 'Előadás', 'Logika és informatikai alkalmazásai Előadás'),
('IB097L', 36, 2, 'Labor', 'Alkalmazásfejlesztés c# alapokon'),
('IB153e-1', 300, 2, 'Előadás', 'Rendszerfejlesztés I. Előadás'),
('IB153I-7', 24, 1, 'Gyakorlat', 'Rendszerfejlesztés I. gyakorlat'),
('IB204E-1', 600, 3, 'Előadás', 'Programozás I. Előadás'),
('IB204L-4', 60, 2, 'Labor', 'Programozás I. gyakorlat'),
('IB302e-1', 600, 2, 'Előadás', 'Programozás II. Előadás'),
('IB302g-1', 30, 1, 'Gyakorlat', 'Programozás II. gyakorlat'),
('IB370E-1', 540, 2, 'Előadás', 'Szkriptnyelvek Előadás'),
('IB370G-7', 18, 1, 'Gyakorlat', 'Szkriptnyelvek gyakorlat'),
('IB402E-1', 600, 2, 'Előadás', 'Operációs rendszerek Előadás'),
('IB402g-7', 40, 1, 'Gyakorlat', 'Operációs rendszerek gyakorlat'),
('IB501e-1', 520, 2, 'Előadás', 'Adatbázisok'),
('IB501g-12', 30, 1, 'Gyakorlat', 'Adatbázisok gyakorlat'),
('IB714E-1', 650, 2, 'Előadás', 'Web tervezés Előadás'),
('IB714g-10', 25, 1, 'Labor', 'Web tervezés gyakorlat'),
('IBK203E-1', 800, 2, 'Előadás', 'Operációkutatás I. Előadás'),
('IBK203G-10', 20, 1, 'Gyakorlat', 'Operációkutatás I. gyakorlat'),
('IBK304E-1', 600, 2, 'Előadás', 'Algoritmusok és adatszerkezetek I. Előadás'),
('IBK304g-7', 30, 1, 'Gyakorlat', 'Algoritmusok és adatszerkezetek I. gyakorlat'),
('IBK604G-5', 30, 1, 'Gyakorlat', 'Logika és informatikai alkalmazásai gyakorlat'),
('MBNXK112E-1', 600, 2, 'Előadás', 'Diszkrét matematika II. Előadás'),
('MBNXK112G-10', 30, 3, 'Gyakorlat', 'Diszkrét matematika II. gyakorlat'),
('MBNXK114E-1', 600, 2, 'Előadás', 'Diszkrét matematika III. Előadás'),
('MBNXK114G-7', 30, 2, 'Gyakorlat', 'Diszkrét matematika III. gyakorlat'),
('MBNXK311E-1', 540, 2, 'Előadás', 'Kalkulus I. Előadás'),
('XA0021-HlgJog', 900, 2, 'Előadás', 'Hallgatói jogok a felsőoktatásban'),
('XA0021-IJövMuAdó-TTI', 900, 2, 'Szeminárium', 'Ismerd meg jövőbeli munkaadódat!');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oktat`
--

CREATE TABLE `oktat` (
  `felhasználó név` varchar(6) NOT NULL,
  `kód` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemeszter`
--

CREATE TABLE `szemeszter` (
  `kód` varchar(20) NOT NULL,
  `szemeszter` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terem`
--

CREATE TABLE `terem` (
  `cím` varchar(150) NOT NULL,
  `emelet` int(1) NOT NULL,
  `ajtó` int(3) NOT NULL,
  `név` varchar(30) NOT NULL,
  `férőhely` int(1) NOT NULL,
  `jelleg` varchar(20) NOT NULL,
  `kód` varchar(20) NOT NULL,
  `időpont` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vizsga`
--

CREATE TABLE `vizsga` (
  `kód` varchar(20) NOT NULL,
  `időpont` datetime NOT NULL,
  `férőhely` int(3) NOT NULL,
  `jelleg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasználó`
--
ALTER TABLE `felhasználó`
  ADD PRIMARY KEY (`felhasználó név`),
  ADD UNIQUE KEY `felhasználó név` (`felhasználó név`);

--
-- A tábla indexei `hallgatja`
--
ALTER TABLE `hallgatja`
  ADD PRIMARY KEY (`felhasználó név`,`kód`),
  ADD UNIQUE KEY `felhasználó név` (`felhasználó név`,`kód`),
  ADD KEY `kód` (`kód`);

--
-- A tábla indexei `jelentkezik`
--
ALTER TABLE `jelentkezik`
  ADD PRIMARY KEY (`felhasználó név`,`kód`,`időpont`),
  ADD UNIQUE KEY `felhasználó név` (`felhasználó név`),
  ADD UNIQUE KEY `kód` (`kód`);

--
-- A tábla indexei `kurzus`
--
ALTER TABLE `kurzus`
  ADD PRIMARY KEY (`kód`),
  ADD UNIQUE KEY `kód` (`kód`);

--
-- A tábla indexei `oktat`
--
ALTER TABLE `oktat`
  ADD PRIMARY KEY (`felhasználó név`,`kód`),
  ADD UNIQUE KEY `felhasználó név` (`felhasználó név`,`kód`),
  ADD KEY `kód` (`kód`);

--
-- A tábla indexei `szemeszter`
--
ALTER TABLE `szemeszter`
  ADD PRIMARY KEY (`kód`,`szemeszter`),
  ADD UNIQUE KEY `kód` (`kód`);

--
-- A tábla indexei `terem`
--
ALTER TABLE `terem`
  ADD PRIMARY KEY (`cím`,`emelet`,`ajtó`),
  ADD KEY `kód` (`kód`);

--
-- A tábla indexei `vizsga`
--
ALTER TABLE `vizsga`
  ADD PRIMARY KEY (`kód`,`időpont`),
  ADD UNIQUE KEY `kurzus.kód` (`kód`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `hallgatja`
--
ALTER TABLE `hallgatja`
  ADD CONSTRAINT `hallgatja_ibfk_1` FOREIGN KEY (`felhasználó név`) REFERENCES `felhasználó` (`felhasználó név`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hallgatja_ibfk_2` FOREIGN KEY (`kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `jelentkezik`
--
ALTER TABLE `jelentkezik`
  ADD CONSTRAINT `jelentkezik_ibfk_1` FOREIGN KEY (`felhasználó név`) REFERENCES `felhasználó` (`felhasználó név`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jelentkezik_ibfk_2` FOREIGN KEY (`kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `oktat`
--
ALTER TABLE `oktat`
  ADD CONSTRAINT `oktat_ibfk_1` FOREIGN KEY (`felhasználó név`) REFERENCES `felhasználó` (`felhasználó név`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oktat_ibfk_2` FOREIGN KEY (`kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `szemeszter`
--
ALTER TABLE `szemeszter`
  ADD CONSTRAINT `szemeszter_ibfk_1` FOREIGN KEY (`kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `terem`
--
ALTER TABLE `terem`
  ADD CONSTRAINT `terem_ibfk_1` FOREIGN KEY (`kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `vizsga`
--
ALTER TABLE `vizsga`
  ADD CONSTRAINT `vizsga_ibfk_1` FOREIGN KEY (`kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
