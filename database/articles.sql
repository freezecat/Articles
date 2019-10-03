-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2019 at 11:09 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet1`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `vote` float NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(10) NOT NULL,
  `date_post` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `vote`, `image`, `view`, `date_post`) VALUES
(1, 'article1', 'Qui cum venisset ob haec festinatis itineribus Antiochiam, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat, ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem.', 90.5, 'sakura.jpg', 3, '2019-08-14 00:00:00'),
(2, 'article2', 'Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in qui.', 42.5, 'ours_polaire.jpg', 5, '2019-08-22 00:00:00'),
(3, 'article3', 'Erat autem diritatis eius hoc quoque indicium nec obscurum nec latens, quod ludicris cruentis delectabatur et in circo sex vel septem aliquotiens vetitis certaminibus pugilum vicissim se concidentium perfusorumque sanguine specie ut lucratus ingentia laetabatur.', 64, 'equipement.jpg', 3, '2019-09-24 00:00:00'),
(4, 'article4', 'Palais imaginaire.', 68, 'palais.jpg', 3, '2019-09-30 15:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `COMMENT` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `nom`, `comments`, `date_comment`) VALUES
(1, 2, 'b', 'Hello', '2019-09-23 15:41:21'),
(2, 2, 'b', 'world!', '2019-09-23 15:53:11'),
(3, 1, 'b', 'Ah bon?!', '2019-09-23 16:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naissance` datetime DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passe` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `nom`, `prenom`, `pays`, `ville`, `genre`, `naissance`, `mail`, `passe`, `statut`) VALUES
(6, 'f', 'f', 'FRANCE', 'Paris', 'homme', '1940-01-01 00:00:00', 'f', '4a0a19218e082a343a1b17e5333409af9d98f0f5', 'membre'),
(7, 'b', 'b', 'FRANCE', 'Paris', 'homme', '1940-01-01 00:00:00', 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'membre'),
(8, 'Hu', 'Yifon', 'FRANCE', 'Paris', 'homme', '1977-05-21 00:00:00', 'freezecat.hu327@gmail.com', '057fd2ffdf45b9c5d8f2f76be6e19bf2fa794735', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ID`, `nom`) VALUES
(1, 'uhu'),
(2, 'uhu'),
(3, 'uhu'),
(4, 'uhu'),
(5, 'uhu'),
(6, 'uhu'),
(7, 'uhu'),
(8, 'uhu'),
(9, 'uhu'),
(10, 'uhu');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `article_id` int(4) NOT NULL,
  `user_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` bigint(6) NOT NULL,
  `view` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `VIEW_article` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `article_id`, `user_ip`, `date`, `view`) VALUES
(19, 2, '::1', 1570065947, 5),
(20, 3, '::1', 1569958071, 3),
(22, 1, '::1', 1569935781, 3),
(23, 4, '::1', 1570066083, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vote` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `article_id`, `nom`, `vote`) VALUES
(29, 2, 'f', 35),
(30, 3, 'f', 64),
(31, 1, 'f', 88),
(32, 1, 'b', 93),
(33, 4, 'Hu', 68),
(34, 2, 'Hu', 50);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `COMMENT` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `VIEW_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
