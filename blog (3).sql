-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 14 mars 2020 à 08:27
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title_chapter`, `content_chapter`, `date_chapter`, `status_chapter`, `admin_id`, `number_chapter`, `picture_chapter`) VALUES
(1, 'L\'Alaska via phpmyadmin', '&lt;p style=&quot;text-align: justify;&quot;&gt;L\'Alaska, au nord-ouest du Canada, est le plus grand &amp;Eacute;tat des &amp;Eacute;tats-Unis ; il est &amp;eacute;galement le moins dens&amp;eacute;ment peupl&amp;eacute; . Il est connu pour la diversit&amp;eacute; de son paysage, qui se compose de grands espaces, de montagnes et de for&amp;ecirc;ts qui accueillent une faune abondante et de nombreuses petites villes. C\'est une destination id&amp;eacute;ale pour les activit&amp;eacute;s de plein air comme le ski, le VTT et le kayak. L\'immense parc national de Denali abrite le mont Denali (autrefois appel&amp;eacute; mont McKinley), le plus haut sommet d\'Am&amp;eacute;rique du Nord&lt;/p&gt;', '2020-03-13 15:58:45', 'published', 1, 1, '1_extract1.jpg'),
(2, 'Back to Alaska', '&lt;p&gt;Un kilom&amp;egrave;tre &amp;agrave; pied, &amp;ccedil;a use, &amp;ccedil;a use Un kilom&amp;egrave;tre &amp;agrave; pied, &amp;ccedil;a use les souliers. La peinture &amp;agrave; l\'huile c\'est bien difficile mais c\'est bien plus beau que la peinture &amp;agrave; l\'eau Deux kilom&amp;egrave;tres &amp;agrave; pied etc.....&lt;/p&gt;', '2020-03-11 08:50:01', 'published', 1, 3, '2_extract3.jpg'),
(3, 'J\'aime bien la neige', '&lt;p&gt;La neige est d\'abord une forme de pr&amp;eacute;cipitations1,2 atmosph&amp;eacute;riques constitu&amp;eacute;e de particules de glace ramifi&amp;eacute;es contenant de l\'air qui sont la plupart du temps cristallis&amp;eacute;es2,3 et agglom&amp;eacute;r&amp;eacute;es en flocons3, de structure et d\'aspect tr&amp;egrave;s variables. Mais cette glace peut aussi &amp;ecirc;tre sous forme de grains : neige en grains et neige roul&amp;eacute;e. Lorsqu\'il y a suffisamment de froid et d\'humidit&amp;eacute; dans l\'atmosph&amp;egrave;re, la neige se forme naturellement par condensation solide de la vapeur d\'eau &amp;agrave; saturation autour des noyaux de cong&amp;eacute;lation. Selon sa structure et le vent, la neige tombe plus ou moins vite vers le sol. Sa formation dans l\'atmosph&amp;egrave;re en r&amp;eacute;seau ramifi&amp;eacute; de particules solides distingue la neige d\'autres pr&amp;eacute;cipitations relativement voisines comme la gr&amp;ecirc;le ou le gr&amp;eacute;sil.&lt;/p&gt;', '2020-03-11 08:49:34', 'published', 1, 5, '3_extract5.jpg'),
(9, 'Géographie de l\'Alaska', '&lt;p style=&quot;padding-left: 40px; text-align: justify;&quot;&gt;L\'Alaska ne poss&amp;egrave;de aucune fronti&amp;egrave;re terrestre commune avec un autre &amp;Eacute;tat am&amp;eacute;ricain. Il partage cette caract&amp;eacute;ristique avec Hawaii. Il est bord&amp;eacute; &amp;agrave; l\'est par le territoire du Yukon et la province de Colombie-Britannique, deux r&amp;eacute;gions du Canada. La fronti&amp;egrave;re entre l\'Alaska et le Canada mesure 2 477 km de longueur1. Ailleurs, trois ensembles maritimes entourent l\'Alaska : le golfe d\'Alaska, qui se trouve au nord de l\'oc&amp;eacute;an Pacifique ; la mer de B&amp;eacute;ring et la mer des Tchouktches, qui le s&amp;eacute;pare de l\'Asie &amp;agrave; l\'ouest ; la mer de Beaufort enfin, qui borde les c&amp;ocirc;tes nord et fait partie de l\'oc&amp;eacute;an Arctique. Le d&amp;eacute;troit de B&amp;eacute;ring s&amp;eacute;pare naturellement l\'Alaska de la Russie. L\'Alaska est le plus vaste &amp;Eacute;tat des &amp;Eacute;tats-Unis : il mesure 1 717 854 km2 dont 1 481 305 km2 de terres, ce qui repr&amp;eacute;sente 18,7 % du territoire am&amp;eacute;ricain et trois fois la superficie de la France m&amp;eacute;tropolitaine2. Il s\'&amp;eacute;tale sur environ 43&amp;deg; de longitude (130/173&amp;deg;W) et 16&amp;deg; de latitude (71/55&amp;deg;N) : c\'est donc en Alaska que se trouvent le lieu le plus &amp;agrave; l\'ouest (&amp;icirc;le Attu) et le lieu le plus au nord (Barrow) des &amp;Eacute;tats-Unis. Le centre g&amp;eacute;ographique de l\'&amp;Eacute;tat se situe &amp;agrave; 63&amp;deg;50\' de latitude nord et 152&amp;deg;00\' de longitude ouest3. Selon une &amp;eacute;tude de l&amp;rsquo;United States Bureau of Land Management datant de 1998, environ 65 % du territoire est la propri&amp;eacute;t&amp;eacute; du Gouvernement f&amp;eacute;d&amp;eacute;ral des &amp;Eacute;tats-Unis, qui g&amp;egrave;re les for&amp;ecirc;ts, les parcs et les r&amp;eacute;serves naturelles nationales de l\'Alaska. Le reste appartient &amp;agrave; l\'&amp;Eacute;tat d\'Alaska (25 %) et aux organisations indig&amp;egrave;nes cr&amp;eacute;&amp;eacute;es par l\'Alaska Native Claims Settlement Act de 1971 (10 %). Source Wikip&amp;eacute;dia&lt;/p&gt;', '2020-03-11 09:36:58', 'published', 1, 2, '9_extract2.jpg'),
(10, 'hgg', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;hbioo&lt;/p&gt;', '2020-03-08 11:25:00', 'draft', 1, 4, 'admin/undefined.jpg'),
(17, 'Population', '&lt;p&gt;Le Bureau du recensement des &amp;Eacute;tats-Unis estime la population de l\'Alaska &amp;agrave; 737 438 habitants au 1er juillet 2018, soit une hausse de 3,83 % depuis le recensement des &amp;Eacute;tats-Unis de 2010 qui tablait la population &amp;agrave; 710 231 habitants1. Depuis 2010, l\'&amp;Eacute;tat conna&amp;icirc;t la 9e croissance d&amp;eacute;mographique la plus soutenue des &amp;Eacute;tats-Unis. Selon des projections d&amp;eacute;mographiques publi&amp;eacute;es par l&amp;rsquo;AARP, l\'Alaska devrait atteindre une population de 947 040 habitants en 2060 si les tendances d&amp;eacute;mographiques actuelles se poursuivent, soit une hausse de 32,7 % par rapport &amp;agrave; 201032. Avec 710 231 habitants en 2010, l\'Alaska &amp;eacute;tait le 4e &amp;Eacute;tat le moins peupl&amp;eacute; des &amp;Eacute;tats-Unis apr&amp;egrave;s le Wyoming (563 626 habitants), le Vermont (625 741 habitants) et le Dakota du Nord (672 591 habitants). Sa population comptait pour 0,23 % de la population du pays. Le centre d&amp;eacute;mographique de l\'&amp;Eacute;tat &amp;eacute;tait localis&amp;eacute; dans le nord de la municipalit&amp;eacute; d\'Anchorage33. Avec 0,48 hab./km2 en 2010, l\'Alaska &amp;eacute;tait l\'&amp;Eacute;tat le moins dense des &amp;Eacute;tats-Unis.&lt;/p&gt;', '2020-03-11 08:50:20', 'published', 1, 7, 'admin/undefined.jpg'),
(26, 'Alaskan Husky', '&lt;p&gt;L\'Alaskan Husky ou simplement l\'Alaskan d&amp;eacute;signe un type de chien qui n\'est pas d&amp;eacute;fini par une standardisation sous forme de race, mais par sa fonction, qui est d\'&amp;ecirc;tre un chien d\'attelage efficace en milieu nordique. Le croisement est ainsi d&amp;eacute;lib&amp;eacute;r&amp;eacute; et l\'ascendance pr&amp;eacute;cise du chien est g&amp;eacute;n&amp;eacute;ralement connue, notamment en comp&amp;eacute;tition. Son nom vient de l\'&amp;Eacute;tat am&amp;eacute;ricain d\'Alaska o&amp;ugrave; des chiens de type husky (husky sib&amp;eacute;rien, Husky de Sakhaline, husky crois&amp;eacute;s) ont &amp;eacute;t&amp;eacute; crois&amp;eacute;s avec des chiens locaux, des american indian dogs, puis d\'autres chiens europ&amp;eacute;ens (grandes races de l&amp;eacute;vriers, Pointer anglais, Setter anglais, Braques et chiens courants crois&amp;eacute;s) aptes &amp;agrave; la course dans le but unique d\'en am&amp;eacute;liorer les performances.&lt;/p&gt;\r\n&lt;p&gt;L\'Alaskan Husky est le chien le plus fr&amp;eacute;quent dans les comp&amp;eacute;titions de chiens d\'attelage au niveau mondial. Aucun chien de race ne rivalise avec ces chiens au niveau de la vitesse. Les courses de vitesse comme le championnat de Fairbanks (Alaska) ou celui d\'Anchorage (Alaska) sont toujours gagn&amp;eacute;es par des &amp;eacute;quipes d\'Alaskan Huskies. Leur vitesse moyenne peut aller jusqu\'&amp;agrave; 31 km/h sur trois jours, ou 32 &amp;agrave; 48 km/h sur un jour. Des sp&amp;eacute;cialit&amp;eacute;s existent, comme les Alaskan Huskies de &amp;laquo; charge &amp;raquo;, les Alaskan Huskies de sprint, et les Alaskan Huskies de distance.&lt;/p&gt;\r\n&lt;p&gt;Dans une vision d\'am&amp;eacute;lioration continue, l\'Alaskan Husky n\'a pas vocation &amp;agrave; &amp;ecirc;tre un type de chien reproduit dans un &amp;eacute;chantillon ferm&amp;eacute; (logique de race et de standard) mais &amp;agrave; recevoir tout apport qui conduirait &amp;agrave; renforcer sa performance de chien de traineau nordique. Le seul crit&amp;egrave;re informel qui distingue l\'Alaskan Husky des autres croisements de chiens courants d\'attelage est son adaptation aux conditions climatiques nordiques. L\'Alaskan Husky est donc cens&amp;eacute; poss&amp;eacute;der une certaine proportion de chien nordique ou de chiens capables de supporter des conditions de froid extr&amp;ecirc;me.&lt;/p&gt;', '2020-03-11 08:48:43', 'published', 1, 6, '26_husky-1160768_640.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `title_comment`, `author_comment`, `date_comment`, `content_comment`, `chapters_id`, `statut_user_comment`) VALUES
(1, 'Superbe aventure !', 'Lala SKA', '2020-02-18 10:33:13', 'Quel plaisir de vous lire, de sentir le froid à travers vos mots, du coup je n\'ai pas besoin de clim pour cet été ! ', 1, 'validated'),
(2, 'Les fanons m\'en tombent !', 'Baba LAINE', '2020-02-24 16:27:16', 'Quel beau plongeon dans l\'encre vive de votre roman. ', 2, 'validated'),
(3, 'Gel\'ial', 'LALA SKA', '2020-02-25 11:36:29', 'Un roman glaçant !', 1, 'validated'),
(10, ':P', 'Nana NERRE', '2020-03-06 09:59:55', 'hihi', 1, 'reported'),
(11, 'Brrrr...', 'SAKAÏ SEK', '2020-03-06 11:07:36', 'Jean, à quand un roman sous les cocotiers ? ', 1, 'validated'),
(12, 'J\'aime mon roman', 'Jeannot', '2020-03-09 09:51:24', 'Se flatter ne fait pas de mal :)', 3, 'posted');

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
(11, 'Nat', 'rerfe@hgiui.f', 'L\'éléPHPant et les baleines', 'Bonjour Jeannot,\r\nJ\'espère que tu vas bien.\r\nJe voulais te proposer une idée pour un nouveau roman, qui s\'intitulerait \"L\'éléPHPant et les baleines\".Je souhaiterais que l\'on puisse allier nos compétences, l\'écriture et l\'informatique, afin que nous proposions un roman ludique pour l\'apprentissage du langage PHP, ce à travers diverses métaphores relatives à l\'Alaska.\r\nTiens moi au jus\r\nBises', '2020-03-01 18:26:08', 'unread');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
