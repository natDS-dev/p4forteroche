-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 mars 2020 à 06:11
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
  `status_chapter` varchar(128) NOT NULL DEFAULT 'published',
  `admin_id` int(11) NOT NULL,
  `number_chapter` int(11) NOT NULL,
  `picture_chapter` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_chapter` (`number_chapter`),
  KEY `fk_posts_users1_idx` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title_chapter`, `content_chapter`, `date_chapter`, `status_chapter`, `admin_id`, `number_chapter`, `picture_chapter`) VALUES
(1, 'L\'Alaska via phpmyadmin', 'L\'Alaska, au nord-ouest du Canada, est le plus grand État des États-Unis ; il est également le moins densément peuplé. Il est connu pour la diversité de son paysage, qui se compose de grands espaces, de montagnes et de forêts qui accueillent une faune abondante et de nombreuses petites villes. C\'est une destination idéale pour les activités de plein air comme le ski, le VTT et le kayak. L\'immense parc national de Denali abrite le mont Denali (autrefois appelé mont McKinley), le plus haut sommet d\'Amérique du Nord', '2020-02-18 10:08:57', 'published', 1, 1, 'public/images/extract1.jpg'),
(2, 'Retour à pinces de l\'Alaska', 'Un kilomètre à pied, ça use, ça use\r\nUn kilomètre à pied, ça use les souliers.\r\nLa peinture à l\'huile c\'est bien difficile\r\nmais c\'est bien plus beau\r\nque la peinture à l\'eau\r\n\r\nDeux kilomètres à pied etc.....', '2020-02-18 08:56:01', 'published', 1, 3, 'public/images/extract2.jpg'),
(3, 'J\'aime bien la neige', 'La neige est d\'abord une forme de précipitations1,2 atmosphériques constituée de particules de glace ramifiées contenant de l\'air qui sont la plupart du temps cristallisées2,3 et agglomérées en flocons3, de structure et d\'aspect très variables. Mais cette glace peut aussi être sous forme de grains : neige en grains et neige roulée. Lorsqu\'il y a suffisamment de froid et d\'humidité dans l\'atmosphère, la neige se forme naturellement par condensation solide de la vapeur d\'eau à saturation autour des noyaux de congélation. Selon sa structure et le vent, la neige tombe plus ou moins vite vers le sol. Sa formation dans l\'atmosphère en réseau ramifié de particules solides distingue la neige d\'autres précipitations relativement voisines comme la grêle ou le grésil.', '2020-02-18 08:56:01', 'published', 1, 5, 'public/images/extract3.jpg'),
(9, 'Géographie de l\'Alaska', 'L\'Alaska ne possède aucune frontière terrestre commune avec un autre État américain. Il partage cette caractéristique avec Hawaii. Il est bordé à l\'est par le territoire du Yukon et la province de Colombie-Britannique, deux régions du Canada. La frontière entre l\'Alaska et le Canada mesure 2 477 km de longueur1. Ailleurs, trois ensembles maritimes entourent l\'Alaska : le golfe d\'Alaska, qui se trouve au nord de l\'océan Pacifique ; la mer de Béring et la mer des Tchouktches, qui le sépare de l\'Asie à l\'ouest ; la mer de Beaufort enfin, qui borde les côtes nord et fait partie de l\'océan Arctique. Le détroit de Béring sépare naturellement l\'Alaska de la Russie.\r\n\r\nL\'Alaska est le plus vaste État des États-Unis : il mesure 1 717 854 km2 dont 1 481 305 km2 de terres, ce qui représente 18,7 % du territoire américain et trois fois la superficie de la France métropolitaine2. Il s\'étale sur environ 43° de longitude (130/173°W) et 16° de latitude (71/55°N) : c\'est donc en Alaska que se trouvent le lieu le plus à l\'ouest (île Attu) et le lieu le plus au nord (Barrow) des États-Unis. Le centre géographique de l\'État se situe à 63°50\' de latitude nord et 152°00\' de longitude ouest3.\r\n\r\nSelon une étude de l’United States Bureau of Land Management datant de 1998, environ 65 % du territoire est la propriété du Gouvernement fédéral des États-Unis, qui gère les forêts, les parcs et les réserves naturelles nationales de l\'Alaska. Le reste appartient à l\'État d\'Alaska (25 %) et aux organisations indigènes créées par l\'Alaska Native Claims Settlement Act de 1971 (10 %).\r\nSource Wikipédia', '2020-03-05 11:12:42', 'published', 1, 2, 'https://cdn.pixabay.com/photo/2017/01/16/15/26/humpback-whale-1984341_960_720.jpg'),
(10, 'hgg', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;hbioo&lt;/p&gt;', '2020-03-08 11:25:00', 'draft', 1, 4, 'http://jjhj'),
(17, 'Population', 'Le Bureau du recensement des États-Unis estime la population de l\'Alaska à 737 438 habitants au 1er juillet 2018, soit une hausse de 3,83 % depuis le recensement des États-Unis de 2010 qui tablait la population à 710 231 habitants1. Depuis 2010, l\'État connaît la 9e croissance démographique la plus soutenue des États-Unis.\r\n\r\nSelon des projections démographiques publiées par l’AARP, l\'Alaska devrait atteindre une population de 947 040 habitants en 2060 si les tendances démographiques actuelles se poursuivent, soit une hausse de 32,7 % par rapport à 201032.\r\n\r\nAvec 710 231 habitants en 2010, l\'Alaska était le 4e État le moins peuplé des États-Unis après le Wyoming (563 626 habitants), le Vermont (625 741 habitants) et le Dakota du Nord (672 591 habitants). Sa population comptait pour 0,23 % de la population du pays. Le centre démographique de l\'État était localisé dans le nord de la municipalité d\'Anchorage33.\r\n\r\nAvec 0,48 hab./km2 en 2010, l\'Alaska était l\'État le moins dense des États-Unis.', '2020-03-08 11:49:22', 'published', 1, 7, 'https://cdn.pixabay.com/photo/2015/03/11/17/31/train-668964_960_720.jpg'),
(18, 'Alaskan Husky', '&lt;p style=&quot;margin: 0.5em 0px; color: #222222; font-family: sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;L\'&lt;strong&gt;Alaskan Husky&lt;/strong&gt;&amp;nbsp;ou simplement l\'&lt;strong&gt;Alaskan&lt;/strong&gt;&amp;nbsp;d&amp;eacute;signe un type de chien qui n\'est pas d&amp;eacute;fini par une standardisation sous forme de race, mais par sa fonction, qui est d\'&amp;ecirc;tre un chien d\'attelage&amp;nbsp;efficace en milieu nordique. Le croisement est ainsi d&amp;eacute;lib&amp;eacute;r&amp;eacute; et l\'ascendance pr&amp;eacute;cise du chien est g&amp;eacute;n&amp;eacute;ralement connue, notamment en comp&amp;eacute;tition. Son nom vient de l\'Etat am&amp;eacute;ricain d\'Alaska o&amp;ugrave; des chiens de type husky (husky Sib&amp;eacute;rien, husky de Sakhaline,husky crois&amp;eacute;s) ont &amp;eacute;t&amp;eacute; crois&amp;eacute;s avec des chiens locaux, des american indian dogs, puis d\'autres chiens europ&amp;eacute;ens (grandes races de l&amp;eacute;vriers,Pointer anglais, Setter anglais, Braques et chiens courants crois&amp;eacute;s) aptes &amp;agrave; la course dans le but unique d\'en am&amp;eacute;liorer les performances.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0.5em 0px; color: #222222; font-family: sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;L\'Alaskan Husky est le chien le plus fr&amp;eacute;quent dans les comp&amp;eacute;titions de chiens d\'attelage au niveau mondial. Aucun chien de race ne rivalise avec ces chiens au niveau de la vitesse. Les courses de vitesse comme le championnat de Fairbanks alaska ou celui d\'Anchorage (Alaska) sont toujours gagn&amp;eacute;es par des &amp;eacute;quipes d\'Alaskan Huskies. Leur vitesse moyenne peut aller jusqu\'&amp;agrave;&amp;nbsp;&lt;span title=&quot;8,611&amp;nbsp;118 m/s&quot;&gt;31&lt;/span&gt;&amp;nbsp;&lt;abbr class=&quot;abbr&quot; style=&quot;border-bottom: 0px; cursor: help; text-decoration-line: none; text-decoration-style: initial;&quot; title=&quot;kilom&amp;egrave;tre par heure&quot;&gt;km/h&lt;/abbr&gt;&amp;nbsp;sur trois jours, ou 32 &amp;agrave;&amp;nbsp;&lt;span title=&quot;13,333&amp;nbsp;344 m/s&quot;&gt;48&lt;/span&gt;&amp;nbsp;&lt;abbr class=&quot;abbr&quot; style=&quot;border-bottom: 0px; cursor: help; text-decoration-line: none; text-decoration-style: initial;&quot; title=&quot;kilom&amp;egrave;tre par heure&quot;&gt;km/h&lt;/abbr&gt;&amp;nbsp;sur un jour. Des sp&amp;eacute;cialit&amp;eacute;s existent, comme les Alaskan Huskies de &amp;laquo; charge &amp;raquo;, les Alaskan Huskies de sprint, et les Alaskan Huskies de distance.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0.5em 0px; color: #222222; font-family: sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&amp;nbsp;&lt;/p&gt;', '2020-03-09 06:08:00', 'draft', 1, 6, 'https://cdn.pixabay.com/photo/2018/12/17/04/06/dogs-3879745_960_720.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `title_comment`, `author_comment`, `date_comment`, `content_comment`, `chapters_id`, `statut_user_comment`) VALUES
(1, 'Superbe aventure !', 'Lala SKA', '2020-02-18 10:33:13', 'Quel plaisir de vous lire, de sentir le froid à travers vos mots, du coup je n\'ai pas besoin de clim pour cet été ! ', 1, 'validated'),
(2, 'Les fanons m\'en tombent !', 'Baba LAINE', '2020-02-24 16:27:16', 'Quel beau plongeon dans l\'encre vive de votre roman. ', 2, 'validated'),
(3, 'Gel\'ial', 'LALA SKA', '2020-02-25 11:36:29', 'Un roman glaçant !', 1, 'validated'),
(10, ':P', 'Nana NERRE', '2020-03-06 09:59:55', 'hihi', 1, 'reported'),
(11, 'Brrrr...', 'SAKAÏ SEK', '2020-03-06 11:07:36', 'Jean, à quand un roman sous les cocotiers ? ', 1, 'validated');

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
  `status_mail_contact` varchar(128) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_name_contact`, `user_mail_contact`, `subject_contact`, `message_contact`, `date_contact`, `status_mail_contact`) VALUES
(1, 'Nat', 'machintructesttt@yahoo.bidule', 'Demande de renseignements', 'Bonjour Mr Forteroche,\r\nJ\'aurais aimé savoir si votre livre existe ou existera un jour au format papier, car en ce cas, je serais ravie de pouvoir l\'offrir à une amie.\r\nVous remerciant,\r\nBonne journée \r\n', '2020-02-29 12:09:09', 'read'),
(5, 'LALA SKA', 'machinchosetruc@yahoo.truc', 'Salon écrivains', 'Mr Forteroche,\r\nTout d\'abord, bravo pour votre roman qui est vraiment passionnant.\r\nAussi, à l\'égard de votre talent, je serais ravie de vous convier au Salon des écrivains qui se tiendra cet été à Romans.\r\nSi cela vous intéresse, je vous laisse me recontacter au plus vite.\r\nCordialement,\r\nL. SKA', '2020-02-29 12:13:57', 'read'),
(9, 'SAKAÏ Sek', 'ndstrucchose@yestest.comtest', 'Vague de froid', 'Merci pour la fraîcheur de votre roman.\r\nSAKAÏ S.', '2020-03-01 07:27:59', 'read'),
(10, 'Baba LAINE', 'uheuhih@huhiuh.v', 'Remise de prix', 'Mr Forteroche,\r\nJe tenais à vous informer du prix qu\'il a été décidé de vous donner pour votre roman en ligne.\r\nMerci de me contacter\r\n', '2020-03-01 18:25:37', 'read'),
(11, 'Nat', 'rerfe@hgiui.f', 'L\'éléPHPant et les baleines', 'Bonjour Jeannot,\r\nJ\'espère que tu vas bien.\r\nJe voulais te proposer une idée pour un nouveau roman, qui s\'intitulerait \"L\'éléPHPant et les baleines\".Je souhaiterais que l\'on puisse allier nos compétences, l\'écriture et l\'informatique, afin que nous proposions un roman ludique pour l\'apprentissage du langage PHP, ce à travers diverses métaphores relatives à l\'Alaska.\r\nTiens moi au jus\r\nBises', '2020-03-01 18:26:08', 'read'),
(14, 'POOline', 'jnkjnkn@jnj.dd', 'POOOO', 'POOOOOOOOOOO', '2020-03-06 11:08:50', 'unread');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
