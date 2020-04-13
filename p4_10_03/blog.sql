-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1:3306
-- Čas nastanka: 10. mar 2020 ob 16.57
-- Različica strežnika: 5.7.26
-- Različica PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabele `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date_of_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `comment`, `date_of_comment`) VALUES
(1, 8, 'un bon commentaire', '2020-03-09 09:40:47'),
(2, 8, 'ah ca va mieux deja', '2020-03-09 09:40:47'),
(3, 22, 'ok', '2020-03-09 09:40:47'),
(5, 25, 'Le lorem ipsum c\'est barbant, mais bien utile.', '2020-03-09 09:40:47'),
(6, 25, 'J\'en rajoute encore', '2020-03-09 09:40:47'),
(7, 23, 'Le lorem ipsum...', '2020-03-09 09:40:47'),
(8, 24, 'Ces origines sont inconnues pour moi.', '2020-03-09 09:40:47'),
(9, 23, 'allez', '2020-03-09 09:40:47'),
(10, 23, 'allwe', '2020-03-09 09:40:47'),
(11, 23, 'le 23', '2020-03-09 09:40:47'),
(12, 23, 'envoyer le commentaire\r\n', '2020-03-09 09:40:47'),
(13, 23, 'envoyer le commentaire et voir\r\n', '2020-03-09 09:40:47'),
(17, 23, 'encore un petit', '2020-03-09 09:40:47'),
(18, 23, '', '2020-03-09 09:40:47'),
(21, 23, 'que de compliments', '2020-03-09 09:40:47'),
(22, 28, 'Pagination reussie', '2020-03-09 09:40:47'),
(23, 29, 'super article', '2020-03-09 09:40:47'),
(24, 23, '', '2020-03-09 20:59:58'),
(25, 23, 'alors', '2020-03-09 21:00:47'),
(26, 23, 'un compliment', '2020-03-10 14:52:00'),
(27, 23, 'recommencons', '2020-03-10 14:53:55'),
(28, 23, 'moi aussi', '2020-03-10 15:04:44'),
(29, 23, 'que les compliments', '2020-03-10 15:07:29'),
(30, 23, 'que les compliments', '2020-03-10 15:09:32'),
(31, 23, 'que les compliments', '2020-03-10 15:09:36'),
(32, 23, 'Allez', '2020-03-10 15:16:57'),
(33, 23, 'Allez', '2020-03-10 15:20:07');

-- --------------------------------------------------------

--
-- Struktura tabele `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `posts`
--

INSERT INTO `posts` (`id`, `article`, `creation_date`) VALUES
(23, '<h2 style=\"margin: 0px 0px 10px; padding: 0px; text-align: left; color: #000000; text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: DauphinPlain; font-size: 24px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">Qu\'est-ce que le Lorem Ipsum?</h2>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">Le&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;est simplement du faux texte employ&eacute; dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les ann&eacute;es 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour r&eacute;aliser un livre sp&eacute;cimen de polices de texte. Il n\'a pas fait que survivre cinq si&egrave;cles, mais s\'est aussi adapt&eacute; &agrave; la bureautique informatique, sans que son contenu n\'en soit modifi&eacute;. Il a &eacute;t&eacute; popularis&eacute; dans les ann&eacute;es 1960 gr&acirc;ce &agrave; la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus r&eacute;cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>', '2020-03-06 18:15:16'),
(24, '<h2 style=\"margin: 0px 0px 10px; padding: 0px; text-align: left; color: #000000; text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: DauphinPlain; font-size: 24px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">D\'o&ugrave; vient-il?</h2>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">Contrairement &agrave; une opinion r&eacute;pandue, le Lorem Ipsum n\'est pas simplement du texte al&eacute;atoire. Il trouve ses racines dans une oeuvre de la litt&eacute;rature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est int&eacute;ress&eacute; &agrave; un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en &eacute;tudiant tous les usages de ce mot dans la litt&eacute;rature classique, d&eacute;couvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Supr&ecirc;mes Biens et des Supr&ecirc;mes Maux) de Cic&eacute;ron. Cet ouvrage, tr&egrave;s populaire pendant la Renaissance, est un trait&eacute; sur la th&eacute;orie de l\'&eacute;thique. Les premi&egrave;res lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.</p>', '2020-03-06 18:15:53'),
(25, '<h2 style=\"margin: 0px 0px 10px; padding: 0px; text-align: left; color: #000000; text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: DauphinPlain; font-size: 24px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">Pourquoi l\'utiliser?</h2>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; color: #000000; text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&ecirc;che de se concentrer sur la mise en page elle-m&ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&eacute;n&eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).</p>', '2020-03-06 18:16:35'),
(30, '<p>11/3/2020:</p>\r\n<p>Do what is asked/necessary only: <strong>oop model </strong>= <strong>minimum, MVC</strong></p>\r\n<p>modifs a apporter:</p>\r\n<p>-pagination commentaires&nbsp; ET REPORTED COMMENTSa faire,</p>\r\n<p>-slider ne fonctionne pas</p>\r\n<p>-page admin: presentation des posts en dessous de la barre de nav (meilleure option?)</p>\r\n<p>-Effacement des commentaires a moderer OK MAIS il faut aussi effacer la ligne dans la base reported_comments,</p>\r\n<p>-qd modification posts doit voir le meme post en haut et en bas, il faut\"voir le resultat\" apres modif de suite (pas de retour a l\'index mais a la page du post avec form vide),</p>\r\n<p>-slider et menu (pour naviguer entre le peux de pages) a integrer,</p>\r\n<p>-limiter la hauteur de la div post a 10 lignes et un lien \"lire en details...\", photos a droite et gauche si possible</p>\r\n<p>-le design doit ressembler au Projet 1</p>', '2020-03-07 22:58:51');

-- --------------------------------------------------------

--
-- Struktura tabele `reported_comments`
--

DROP TABLE IF EXISTS `reported_comments`;
CREATE TABLE IF NOT EXISTS `reported_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comment` int(11) NOT NULL,
  `date_of _reporting` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `reported_comments`
--

INSERT INTO `reported_comments` (`id`, `id_comment`, `date_of _reporting`) VALUES
(1, 4, '2020-03-09 09:41:55'),
(2, 5, '2020-03-09 09:41:55'),
(3, 15, '2020-03-09 09:41:55'),
(4, 16, '2020-03-09 09:41:55'),
(5, 19, '2020-03-09 09:41:55'),
(6, 20, '2020-03-09 09:41:55'),
(7, 14, '2020-03-09 09:41:55'),
(8, 35, '2020-03-10 17:43:06'),
(9, 35, '2020-03-10 17:46:29'),
(10, 34, '2020-03-10 17:46:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
