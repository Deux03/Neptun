-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 15. 22:28
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
-- Adatbázis: `neptun projekt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasználó`
--

CREATE TABLE `felhasználó` (
  `felhasználó név` varchar(6) NOT NULL,
  `státusz` tinyint(1) NOT NULL,
  `szak` varchar(30) NOT NULL,
  `születési dátum` date DEFAULT NULL,
  `jelszó` varchar(250) NOT NULL,
  `név` int(40) NOT NULL,
  `hallgató-e` tinyint(1) NOT NULL,
  `születési hely` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kurzus`
--

CREATE TABLE `kurzus` (
  `kód` varchar(20) NOT NULL,
  `férőhely` int(3) NOT NULL,
  `heti óraszám` int(2) NOT NULL,
  `szemeszter` int(1) NOT NULL,
  `jelleg` varchar(20) DEFAULT NULL,
  `cím` varchar(150) NOT NULL
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
  `jelleg` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vizsga`
--

CREATE TABLE `vizsga` (
  `kurzus.kód` varchar(20) NOT NULL,
  `időpont` date NOT NULL,
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
-- A tábla indexei `kurzus`
--
ALTER TABLE `kurzus`
  ADD PRIMARY KEY (`kód`),
  ADD UNIQUE KEY `kód` (`kód`);

--
-- A tábla indexei `terem`
--
ALTER TABLE `terem`
  ADD PRIMARY KEY (`cím`,`emelet`,`ajtó`);

--
-- A tábla indexei `vizsga`
--
ALTER TABLE `vizsga`
  ADD PRIMARY KEY (`kurzus.kód`,`időpont`),
  ADD UNIQUE KEY `kurzus.kód` (`kurzus.kód`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `vizsga`
--
ALTER TABLE `vizsga`
  ADD CONSTRAINT `vizsga_ibfk_1` FOREIGN KEY (`kurzus.kód`) REFERENCES `kurzus` (`kód`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
