-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Máj 26. 21:02
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hscards`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kartyak`
--

CREATE TABLE `kartyak` (
  `ID` int(11) NOT NULL,
  `ImageSrc` varchar(255) DEFAULT NULL,
  `HP` int(11) DEFAULT NULL,
  `Attack` int(11) DEFAULT NULL,
  `Mana` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kartyak`
--

INSERT INTO `kartyak` (`ID`, `ImageSrc`, `HP`, `Attack`, `Mana`, `Description`, `Title`, `Type`) VALUES
(1, 'Ragnaros.webp', 8, 8, 8, 'Cant attack. At the end of your turn, deal 8 damage to a random enemy.', 'Ragnaros', 'Minion'),
(2, 'imp.jpg', 1, 1, 1, NULL, 'Imp', 'Minion'),
(4, 'lava_shock.jpg', NULL, NULL, 2, 'Deal 2 damage. Unlock your Overloaded Mana Crystals.', 'Lava shock', 'Spell'),
(5, 'razorgores_claw.jpg', 5, 1, 1, 'Whenever a Corrupted Egg dies, gain +1 Attack.', 'Razorgores Claws', 'Weapon'),
(6, 'baron_geddon.jpg', 7, 7, 7, 'At the end of your turn, deal 2 damage to ALL other characters.', 'Baron Geddon', 'Minion'),
(7, 'black_whelp.jpg', 1, 2, 1, NULL, 'Black Whelp', 'Minion'),
(9, 'Drakkisaths_Command.jpg', NULL, NULL, 1, 'Destroy a minion. Gain 10 Armor.', 'Drakkisaths C.', 'Spell'),
(10, 'majordo.jpg', 7, 9, 9, 'Deathrattle: Replace your hero with Ragnaros the Firelord.', 'Majordomo Executus', 'Minion');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kartyak`
--
ALTER TABLE `kartyak`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kartyak`
--
ALTER TABLE `kartyak`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
