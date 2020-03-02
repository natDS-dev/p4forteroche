-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 mars 2020 à 06:22
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
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'Jeannot', '$2y$10$nDLA1hFFK.gWVqht81UdHucIWkolZ5nhWuP2SPb6dBQTCqJVGpJ8C');

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
  `statut_post` varchar(128) NOT NULL DEFAULT 'published',
  `admin_id` int(11) NOT NULL,
  `number_chapter` int(11) NOT NULL,
  `picture_chapter` text,
  PRIMARY KEY (`id`),
  KEY `fk_posts_users1_idx` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title_chapter`, `content_chapter`, `date_chapter`, `statut_post`, `admin_id`, `number_chapter`, `picture_chapter`) VALUES
(1, 'L\'Alaska via phpmyadmin', 'L\'Alaska, au nord-ouest du Canada, est le plus grand État des États-Unis ; il est également le moins densément peuplé. Il est connu pour la diversité de son paysage, qui se compose de grands espaces, de montagnes et de forêts qui accueillent une faune abondante et de nombreuses petites villes. C\'est une destination idéale pour les activités de plein air comme le ski, le VTT et le kayak. L\'immense parc national de Denali abrite le mont Denali (autrefois appelé mont McKinley), le plus haut sommet d\'Amérique du Nord', '2020-02-18 10:08:57', '1', 1, 1, 'public/images/extract1.jpg'),
(2, 'Retour à pinces de l\'Alaska', 'Un kilomètre à pied, ça use, ça use\r\nUn kilomètre à pied, ça use les souliers.\r\nLa peinture à l\'huile c\'est bien difficile\r\nmais c\'est bien plus beau\r\nque la peinture à l\'eau\r\n\r\nDeux kilomètres à pied etc.....', '2020-02-18 08:56:01', '1', 1, 3, 'public/images/extract2.jpg'),
(3, 'J\'aime bien la neige', 'La neige est d\'abord une forme de précipitations1,2 atmosphériques constituée de particules de glace ramifiées contenant de l\'air qui sont la plupart du temps cristallisées2,3 et agglomérées en flocons3, de structure et d\'aspect très variables. Mais cette glace peut aussi être sous forme de grains : neige en grains et neige roulée. Lorsqu\'il y a suffisamment de froid et d\'humidité dans l\'atmosphère, la neige se forme naturellement par condensation solide de la vapeur d\'eau à saturation autour des noyaux de congélation. Selon sa structure et le vent, la neige tombe plus ou moins vite vers le sol. Sa formation dans l\'atmosphère en réseau ramifié de particules solides distingue la neige d\'autres précipitations relativement voisines comme la grêle ou le grésil.', '2020-02-18 08:56:01', '1', 1, 5, 'public/images/extract3.jpg');

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
  `statut_user_comment` varchar(128) NOT NULL DEFAULT 'posted',
  PRIMARY KEY (`id`),
  KEY `fk_comments_chapters1_idx` (`chapters_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `title_comment`, `author_comment`, `date_comment`, `content_comment`, `chapters_id`, `statut_user_comment`) VALUES
(1, 'Superbe aventure !', 'Lala SKA', '2020-02-18 10:33:13', 'Quel plaisir de vous lire, de sentir le froid à travers vos mots, du coup je n\'ai pas besoin de clim pour cet été ! ', 1, 'reported'),
(2, 'Les fanons m\'en tombent !', 'Baba LAINE', '2020-02-24 16:27:16', 'Quel beau plongeon dans l\'encre vive de votre roman. ', 2, 'reported'),
(3, 'Gel\'ial', 'LALA SKA', '2020-02-25 11:36:29', 'Un roman glaçant !', 1, 'validated'),
(4, 'yes', 'yop', '2020-02-29 16:36:34', '<script>alert(\"ahhhhhh!\")</script>', 1, 'posted'),
(5, 'klnlknm!', 'uibiobb', '2020-03-01 18:10:48', 'lknM?M?M.!', 1, 'posted');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name_contact` varchar(255) NOT NULL,
  `user_mail_contact` varchar(255) NOT NULL,
  `subject_contact` varchar(255) NOT NULL,
  `message_contact` mediumtext NOT NULL,
  `date_contact` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_name_contact`, `user_mail_contact`, `subject_contact`, `message_contact`, `date_contact`) VALUES
(1, 'Nat', 'machintructesttt@yahoo.bidule', 'Demande de renseignements', 'Bonjour Mr Forteroche,\r\nJ\'aurais aimé savoir si votre livre existe ou existera un jour au format papier, car en ce cas, je serais ravie de pouvoir l\'offrir à une amie.\r\nVous remerciant,\r\nBonne journée \r\n', '2020-02-29 12:09:09'),
(5, 'LALA SKA', 'machinchosetruc@yahoo.truc', 'Salon écrivains', 'Mr Forteroche,\r\nTout d\'abord, bravo pour votre roman qui est vraiment passionnant.\r\nAussi, à l\'égard de votre talent, je serais ravie de vous convier au Salon des écrivains qui se tiendra cet été à Romans.\r\nSi cela vous intéresse, je vous laisse me recontacter au plus vite.\r\nCordialement,\r\nL. SKA', '2020-02-29 12:13:57'),
(8, 'Nat', 'trucmuche@yo.com', 'Super', 'Bravo encore !', '2020-02-29 16:32:08'),
(9, 'SAKAÏ Sek', 'ndstrucchose@yestest.comtest', 'Vague de froid', 'Merci pour la fraîcheur de votre roman.\r\nSAKAÏ S.', '2020-03-01 07:27:59'),
(10, 'Baba LAINE', 'uheuhih@huhiuh.v', 'Remise de prix', 'Mr Forteroche,\r\nJe tenais à vous informer du prix qu\'il a été décidé de vous donner pour votre roman en ligne.\r\nMerci de me contacter\r\n', '2020-03-01 18:25:37'),
(11, 'Nat', 'rerfe@hgiui.f', 'L\'éléPHPant et les baleines', 'Bonjour Jeannot,\r\nJ\'espère que tu vas bien.\r\nJe voulais te proposer une idée pour un nouveau roman, qui s\'intitulerait \"L\'éléPHPant et les baleines\".Je souhaiterais que l\'on puisse allier nos compétences, l\'écriture et l\'informatique, afin que nous proposions un roman ludique pour l\'apprentissage du langage PHP, ce à travers diverses métaphores relatives à l\'Alaska.\r\nTiens moi au jus\r\nBises', '2020-03-01 18:26:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
