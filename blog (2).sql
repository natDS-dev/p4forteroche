-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 fév. 2020 à 11:17
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_chapter` varchar(255) NOT NULL,
  `content_chapter` longtext NOT NULL,
  `date_chapter` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onlinepost` tinyint(1) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `number_chapter` int(11) NOT NULL,
  `picture_chapter` text,
  PRIMARY KEY (`id`),
  KEY `fk_posts_users1_idx` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title_chapter`, `content_chapter`, `date_chapter`, `onlinepost`, `admin_id`, `number_chapter`, `picture_chapter`) VALUES
(1, 'L\'Alaska via phpmyadmin', 'L\'Alaska, au nord-ouest du Canada, est le plus grand État des États-Unis ; il est également le moins densément peuplé. Il est connu pour la diversité de son paysage, qui se compose de grands espaces, de montagnes et de forêts qui accueillent une faune abondante et de nombreuses petites villes. C\'est une destination idéale pour les activités de plein air comme le ski, le VTT et le kayak. L\'immense parc national de Denali abrite le mont Denali (autrefois appelé mont McKinley), le plus haut sommet d\'Amérique du Nord', '2020-02-18 10:08:57', 1, 1, 1, 'public/images/extract1.jpg'),
(2, 'Retour à pinces de l\'Alaska', 'Un kilomètre à pied, ça use, ça use\r\nUn kilomètre à pied, ça use les souliers.\r\nLa peinture à l\'huile c\'est bien difficile\r\nmais c\'est bien plus beau\r\nque la peinture à l\'eau\r\n\r\nDeux kilomètres à pied etc.....', '2020-02-18 08:56:01', 1, 1, 3, 'public/images/extract2.jpg'),
(4, 'J\'aime bien la neige', 'La neige est d\'abord une forme de précipitations1,2 atmosphériques constituée de particules de glace ramifiées contenant de l\'air qui sont la plupart du temps cristallisées2,3 et agglomérées en flocons3, de structure et d\'aspect très variables. Mais cette glace peut aussi être sous forme de grains : neige en grains et neige roulée. Lorsqu\'il y a suffisamment de froid et d\'humidité dans l\'atmosphère, la neige se forme naturellement par condensation solide de la vapeur d\'eau à saturation autour des noyaux de congélation. Selon sa structure et le vent, la neige tombe plus ou moins vite vers le sol. Sa formation dans l\'atmosphère en réseau ramifié de particules solides distingue la neige d\'autres précipitations relativement voisines comme la grêle ou le grésil.', '2020-02-18 08:56:01', 1, 1, 5, 'public/images/extract3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_comment` varchar(255) NOT NULL,
  `author_comment` varchar(255) NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content_comment` mediumtext NOT NULL,
  `chapters_id` int(11) NOT NULL,
  `post_user_comment` tinyint(1) NOT NULL DEFAULT '1',
  `signal_user_comment` tinyint(1) DEFAULT NULL,
  `erase_user_comment` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_chapters1_idx` (`chapters_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `title_comment`, `author_comment`, `date_comment`, `content_comment`, `chapters_id`, `post_user_comment`, `signal_user_comment`, `erase_user_comment`) VALUES
(1, 'Superbe aventure !', 'Lala SKA', '2020-02-18 10:33:13', 'Quel plaisir de vous lire, de sentir le froid à travers vos mots, du coup je n\'ai pas besoin de clim pour cet été ! ', 1, 1, NULL, NULL),
(2, 'Les fanons m\'en tombent !', 'Baba LAINE', '2020-02-24 16:27:16', 'Quel beau plongeon dans l\'encre vive de votre roman. ', 2, 1, NULL, NULL),
(3, 'Gel\'ial', 'LALA SKA', '2020-02-25 11:36:29', 'Un roman glaçant !', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name_contact` varchar(255) DEFAULT NULL,
  `user_mail_contact` varchar(255) DEFAULT NULL,
  `subject_contact` varchar(255) DEFAULT NULL,
  `message_contact` mediumtext,
  `date_contact` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
