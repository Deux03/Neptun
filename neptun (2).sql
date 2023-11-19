-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 18. 18:19
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
('angela', 0, 'science', '2003-09-13', 'Kentbury', '$2b$12$RX1ivZwcwGN3FUFmANd0T.O2AmsFA4MeQ9K2c3yzwWAEkW78xB6XS', 'Mary Phelps', 1),
('brentr', 1, 'math', '1990-08-07', 'Donnaburgh', '$2b$12$EGvgmntrtWcKDYiepehWM.gu4Asta7DDtgGV9pT/qvj4IS8ljEGcm', 'Dr. Chambers', 0),
('cburns', 1, 'history', '1987-05-01', 'West Valerie', '$2b$12$zjSV7XZIdoEp9iS.yrh47u3mW1FweFhQbrTTvYKB.QCkfoByeFOZG', 'Dr. Ruiz', 0),
('christ', 1, 'science', '1987-08-05', 'Charlotteburgh', '$2b$12$IvNA7X5kOqLcOg/tvGag3uRzRj/TGYNOnwU0wwrbVqeY65/YfJNf.', 'Dr. Cooper', 0),
('crobin', 0, 'science', '1999-08-15', 'Gavinfurt', '$2b$12$g.4mJjYOxBwXU.EYYzWbqef/wkiyD37K2FS92TMdUbChTYx0M/5Da', 'Jamie Reyes', 1),
('cwhite', 0, 'engineering', '2003-03-30', 'Mcphersonville', '$2b$12$YTume/lUPZGfC8c1LTPDcuWVrhpNifi5yFpiGy74qGyOjOkG8OVXu', 'Ashley Brooks', 1),
('daniel', 1, 'history', '1975-04-04', 'South Paulburgh', '$2b$12$LWYNNN1mG1YQNiJ9XdKLo.SdrUIWpPcYsP6uhZM163B..W40d1R72', 'Dr. Allen', 0),
('gcolem', 1, 'engineering', '1999-08-22', 'Andreafurt', '$2b$12$MYZq./gVAR3m/kBSKO8RlOXkPQArW48cfLaxp6msknHsJn.u7mkiu', 'John Rogers', 1),
('gonzal', 1, 'science', '2005-09-11', 'East Kellybury', '$2b$12$EXlAYyocKf3vTKHkxMjwJ.spObwD89vsdhI7IkGWecB1srNstxCIK', 'Anthony Hernandez', 1),
('ihayes', 1, 'history', '1979-11-04', 'Jacksonbury', '$2b$12$FxenZZyGw2hReiSQNoPX4uAUqJl.BpGkxInvLGbFPsPggL7pLva8u', 'Dr. Fitzgerald', 0),
('jessic', 1, 'math', '1992-06-25', 'Ericmouth', '$2b$12$Yugynl6k/L3NYxNk1y72LeCe6bzlBenfvro4GCNh8GnqFgrh8XvQq', 'Dr. George', 0),
('johnso', 1, 'math', '1985-06-24', 'Port Jeremyshire', '$2b$12$aiUMRVjOfitJPmGUpXNFIugUVKhvFzNPFg.0M/BZIMvYNkU7iQ83K', 'Dr. Murray', 0),
('michae', 1, 'science', '1978-09-17', 'Barbarachester', '$2b$12$4bGH1EQlDV7BG5zKGvlc8.NLRQlxpm35uPhXGGjKiKIz7jx8hqBba', 'Dr. Ramos', 0),
('oliver', 1, 'science', '1978-06-07', 'Port Andrea', '$2b$12$lgk/OPAgl48ow2GFBEikpOECC7pMQjD0t9kfrLoZTbElqWQh9azQ.', 'Dr. Daniel', 0),
('pperez', 0, 'arts', '1999-08-21', 'Caseyville', '$2b$12$EHeqfqCgXa6jZpQV4P/oEuN2KPo594N.BlbwWVloK4gtj56niLt3y', 'Eric Ross', 1),
('QWE34Z', 1, 'teaching', '2001-05-28', 'Debrecen', '$2y$10$Tmyo8/vU9w7kxHYqJ7ENxesIWuJgblEKTjmjKmUAz9hXfUFYERYam', 'Halász Gergő', 0),
('QWERT4', 0, 'teaching', '1999-12-30', 'Budapest', '$2y$10$WuL/tBXYMgdMSjEtK2c6OecZ3sWi9XsztyQb6JZPbmpc.0bCmwtA.', 'Palkó Lilla', 0),
('QWERTZ', 1, 'info', '2002-06-07', 'Szeged', '$2y$10$81MFusD0AVju.4sL215UHemz47b7zFDxxnMWHQs1CS1jLPvfnAjY2', 'Nagy János', 0),
('richmo', 0, 'science', '2002-01-24', 'Lake Pamelafort', '$2b$12$9condw.b/FcKPgmHyxwnLOO6sex/WD/RUfOUdWtLmLSy3EtpxFFaS', 'James Campbell', 1),
('she9ri', 1, 'math', '1974-05-08', 'Port Carlos', '$2b$12$o69DVHbb3JUr4X7C49VEaegjZp7QOiT3q3YUpSYikQEeYrB3NM9hG', 'Dr. Kelly', 0),
('sherri', 1, 'science', '1969-12-14', 'South Williamchester', '$2b$12$8peWF2POzeXx2SZPDEV18O4Vs0MZT0G2P3GFaaimkBsh6K4B3EmVS', 'Dr. Curtis', 0),
('stepha', 1, 'business', '2000-11-28', 'Brittanyville', '$2b$12$IM6.WnnDe/smbn.BAQX1H.DXdQVKSOA.eNU65LDhQLdQt5CZeZp0u', 'Lindsay Chapman', 1),
('steve9', 0, 'engineering', '2003-02-07', 'South Scott', '$2b$12$zszpdf.2rHDYeMqON6deHeOllXE6cLeQf6eP39J8fbUnGSvJB.mm6', 'Patricia Hoffman', 1),
('teache', 1, 'info', '2000-02-02', 'Szeged', '$2y$10$/gh2jM.3LBwAPILdkCHCy.3ozLXEK2Fb7rBX.Iej8sLZM3KXwgSQu', 'Dr. Nagy Gábor', 1),
('timoth', 1, 'science', '2003-09-30', 'East Shawnchester', '$2b$12$cTMrVxv.oIu4uUG6CezBMee0CHH000jM/PCfEOKggLbZaDooBDZeq', 'George Cole', 1),
('torres', 1, 'math', '1989-02-18', 'Lake Ashleyland', '$2b$12$HwC3sAtg.Jrr9uPDlwjX.uwnmcm6fvHnpI8MYDQ1QpuxPd0DyLppm', 'Dr. Phillips', 0),
('veroni', 1, 'science', '1980-05-25', 'Duarteview', '$2b$12$kkq6GTD6s62Ngps3tRtiKe/Obf2WMOLh8lWYXlZp5Lk4CQktXAEw2', 'Dr. Green', 0),
('vguerr', 1, 'science', '1999-10-11', 'Katelynberg', '$2b$12$4aG6nHIawf6U88HSddymQuzPAQ/YAc0.DGjsYWTQoIIWuWehEPYnu', 'Courtney Wagner', 1),
('watson', 1, 'science', '1972-06-19', 'Josemouth', '$2b$12$T7G2DKi.n8JT0fcEOci5D.8j0az0fbUlRj11/wUTB6BhfQcwJ3qVy', 'Dr. Silva', 0),
('wilson', 1, 'history', '1986-09-10', 'Melissaville', '$2b$12$11cHFs6mQTFii4HrDocx6ORJjysK4Sxlwu5NdJNxN50B4btUYdCnq', 'Dr. Wilson', 0),
('xherre', 0, 'science', '2004-11-21', 'Hoffmanmouth', '$2b$12$xSia/Is5aKGHfUFXTis5vubsyO0kNLqimFtITMktzZa7lfGJv3Odi', 'Michael Rodriguez', 1);

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

--
-- A tábla adatainak kiíratása `szemeszter`
--

INSERT INTO `szemeszter` (`kód`, `szemeszter`) VALUES
('I604e-1', 1),
('I604e-1', 3),
('IB370G-7', 6);

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
  ADD UNIQUE KEY `kód` (`kód`);

--
-- A tábla indexei `jelentkezik`
--
ALTER TABLE `jelentkezik`
  ADD PRIMARY KEY (`felhasználó név`,`kód`,`időpont`),
  ADD UNIQUE KEY `kód` (`kód`),
  ADD UNIQUE KEY `időpont` (`időpont`);

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
  ADD KEY `oktat_ibfk_2` (`kód`);

--
-- A tábla indexei `szemeszter`
--
ALTER TABLE `szemeszter`
  ADD PRIMARY KEY (`kód`,`szemeszter`);

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
