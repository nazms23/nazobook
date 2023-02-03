-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Şub 2023, 01:46:03
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `nazobook`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gonderiler`
--

CREATE TABLE `gonderiler` (
  `gonderi_id` int(11) NOT NULL,
  `gonderi_kadi` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `gonderi_baslik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `gonderi_mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `gonderi_resim` int(11) NOT NULL DEFAULT 0,
  `gonderi_no` int(11) NOT NULL,
  `gonderi_duyuru` int(11) NOT NULL DEFAULT 0,
  `gonderi_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gonderiler`
--

INSERT INTO `gonderiler` (`gonderi_id`, `gonderi_kadi`, `gonderi_baslik`, `gonderi_mesaj`, `gonderi_resim`, `gonderi_no`, `gonderi_duyuru`, `gonderi_tarih`) VALUES
(7, 'Ender', 'Kei ', 'Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei Kei ', 1, 3, 1, '2022-12-01 19:54:39'),
(8, 'xLouy', 'Ayanokouji-kun', 'Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. Ayanokouji-kun hep sakin ve soğukkanlısın. ', 1, 1, 0, '2022-12-01 20:01:33'),
(26, 'xLouy', 'sfsdf', 'sdfsdf', 1, 7, 0, '2022-12-03 01:42:23'),
(29, 'xLouy', 'dasdsa', 'asdasd', 1, 5, 1, '2022-12-03 01:43:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kelimeler`
--

CREATE TABLE `kelimeler` (
  `kelime_id` int(11) NOT NULL,
  `kelime_isim` varchar(5000) COLLATE utf8_turkish_ci NOT NULL,
  `kelime_esanlam` varchar(8000) COLLATE utf8_turkish_ci NOT NULL,
  `kelime_turkce` varchar(8000) COLLATE utf8_turkish_ci NOT NULL,
  `kelime_isaret` int(11) NOT NULL DEFAULT 0,
  `kelime_ogrenildi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kelimeler`
--

INSERT INTO `kelimeler` (`kelime_id`, `kelime_isim`, `kelime_esanlam`, `kelime_turkce`, `kelime_isaret`, `kelime_ogrenildi`) VALUES
(1, '0', 'cum', 'gelmek', 0, 1),
(4, 'come4', 'cum4', 'gelmek4', 1, 1),
(6, 'asd', 'asda', 'asdsa', 1, 1),
(7, 'come7', 'cum7', 'gelmek7', 0, 0),
(8, '0', 'cum8', 'gelmek8', 0, 0),
(9, 'come9', 'cum9', 'gelmek9', 1, 1),
(10, 'come10', 'cum10', 'gelmek10', 1, 0),
(11, 'come11', 'cum11', 'gelmek11', 0, 0),
(12, 'kelime1', 'kelime1', 'kelime1', 0, 0),
(13, '3131', '31', '3', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sohbet`
--

CREATE TABLE `sohbet` (
  `sohbet_id` int(11) NOT NULL,
  `sohbet_mesaj` varchar(5000) COLLATE utf8_turkish_ci NOT NULL,
  `sohbet_tutucu` varchar(5000) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_kadi` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `uye_eposta` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `uye_ban` int(11) NOT NULL DEFAULT 0,
  `uye_gonderisayi` int(11) NOT NULL,
  `uye_gonderisayi2` int(11) NOT NULL DEFAULT 0,
  `sucuk` int(11) NOT NULL DEFAULT 0,
  `uye_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `uye_pp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_kadi`, `uye_eposta`, `uye_sifre`, `uye_ban`, `uye_gonderisayi`, `uye_gonderisayi2`, `sucuk`, `uye_tarih`, `uye_pp`) VALUES
(1, 'xLouy', 'xlouyeposta@gmail.com', 'nazobookadmin', 0, 5, 3, 1, '2022-12-01 12:34:03', 4),
(11, 'Ender', 'ender@gmail.com', 'ender', 0, 6, 1, 1, '2022-12-01 16:18:15', 0),
(12, 'MAXCODEGEASFAN', 'kaan@gmail.com', 'kaan', 0, 6, 0, 0, '2022-12-01 20:11:51', 0),
(13, 'MAXDEMONSLAYERFAN', 'nezukoyusiktim@gmail.com', 'tanjiro', 0, 2, 0, 0, '2022-12-01 21:33:05', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gonderiler`
--
ALTER TABLE `gonderiler`
  ADD PRIMARY KEY (`gonderi_id`);

--
-- Tablo için indeksler `kelimeler`
--
ALTER TABLE `kelimeler`
  ADD PRIMARY KEY (`kelime_id`);

--
-- Tablo için indeksler `sohbet`
--
ALTER TABLE `sohbet`
  ADD PRIMARY KEY (`sohbet_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `gonderiler`
--
ALTER TABLE `gonderiler`
  MODIFY `gonderi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `kelimeler`
--
ALTER TABLE `kelimeler`
  MODIFY `kelime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `sohbet`
--
ALTER TABLE `sohbet`
  MODIFY `sohbet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
