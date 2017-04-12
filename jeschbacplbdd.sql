-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  jeschbacplbdd.mysql.db
-- Généré le :  Dim 09 Avril 2017 à 22:03
-- Version du serveur :  5.6.29-log
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeschbacplbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `article_site`
--

CREATE TABLE IF NOT EXISTS `article_site` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article_site`
--

INSERT INTO `article_site` (`id`, `name`, `categorie`, `description`) VALUES
(28, 'The PenPrinter', 'diy', 'The PenPrinter is a drawing machine who draw point to make images from a computer. Click to learn more'),
(23, 'test5', 'diy', '      ');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_` date NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `auteur`, `date_`, `subject`) VALUES
(7, 'Oh It''s a very good idea ! I like it ! I hope you can win money with your work ! ', 'Mariuss', '2016-07-22', 'moonSurvival'),
(8, 'Amazing ! You have done an incredible work ! ', 'Nicholas', '2016-07-24', 'penPrinter'),
(9, 'Re', 'Nicholas', '2016-07-26', 'penPrinter'),
(10, 'Ouuuuuaaaaahhhh youu''re thé best', 'Gabriel', '2016-08-08', 'moonSurvival'),
(11, 'Waw  !', 'Momo', '2016-08-08', 'moonSurvival'),
(12, 'Olala ( ͡° ͜ʖ ͡°) ', 'Inspecteur Gadjet', '2016-08-30', 'moonSurvival'),
(13, 'interressant', 'test', '2017-01-28', ''),
(14, 'I suggest while refitbushmenrs of school buildings take place, that the minister would do a field trip to witness the burning of the garbage/waste of the island below St. John&#8217;s, from which toxic fumes are inhaled by the very same pupils attending the schools there.Perhaps then she might consider a solution to alleviate a major public health hazard.', 'qdt2M0qKoQu', '2017-03-02', 'moonSurvival'),
(15, 'Wow. Picked a rotten week to start to catch up. Hope everything is better for this podcast and everyone has taken a turn for the better. Of course, we may not get to this podcast because the world ended this morning. Merry happy Chmtairahannukwanzskah to one and all.', 'riIJRjOIy', '2017-03-02', ''),
(16, 'I like how you wrote this.  You have made your points with unique thoughts and content.  Your points are so clear and concise your readers can determine what they agree with and what they dot1#82&7;n.', 'qXEeluGcHUB', '2017-03-02', ''),
(17, 'Wait, I cannot fathom it being so <a href="http://dskpgbrxg.com">stdtfghaiorwarr.</a>', 'ndgT5G1d5BCo', '2017-03-03', 'moonSurvival'),
(18, 'That''s an apt answer to an intriesteng question http://fbbnasef.com [url=http://usxaqiokcib.com]usxaqiokcib[/url] [link=http://tiduxl.com]tiduxl[/link]', 'POrNCEU9k9T', '2017-03-09', 'moonSurvival'),
(19, 'There''s a secret about your post. <a href="http://xumkyfge.com">ICTTKYIHTBY</a>', '3dxxDLJFXu', '2017-03-09', 'moonSurvival'),
(20, 'This "free sharing" of inrtamfoion seems too good to be true. Like communism. http://yntoitdbb.com [url=http://sncwbitsbn.com]sncwbitsbn[/url] [link=http://euzeysrvbdf.com]euzeysrvbdf[/link]', 'GO3FZTd8', '2017-03-10', 'moonSurvival');

-- --------------------------------------------------------

--
-- Structure de la table `currentId`
--

CREATE TABLE IF NOT EXISTS `currentId` (
  `id` int(11) NOT NULL,
  `id_value` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `currentId`
--

INSERT INTO `currentId` (`id`, `id_value`) VALUES
(1, 37);

-- --------------------------------------------------------

--
-- Structure de la table `markas_allBook`
--

CREATE TABLE IF NOT EXISTS `markas_allBook` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `markas_allBook`
--

INSERT INTO `markas_allBook` (`id`, `name`, `description`, `auteur`, `pages`, `annee`) VALUES
(36, 'test', '-', 'test', 0, 0),
(25, 'Bible', '-', 'Jesus', 1000, 0),
(26, 'juled', '-', 'es', 23, 0),
(27, 'pases0axe', '-', 'guk', 56, 0),
(28, 'hui£jk', '-', 'hi', 23, 0),
(29, 'jules huk', '-', 'esib', 25, 0),
(30, 'test', '-', 'Guillaume ', 543979, 0),
(31, 'bible', '-', 'jules', 0, 0),
(32, 'test', '-', 'hyu', 23, 0),
(33, 'new', '-', 'moi', 5349, 0),
(34, 'La bible', '-', 'Jesus', 1000, 0),
(35, 'un autre livre ', '-', 'de moi', 123, 0),
(37, 'test2', '-', 'test2', 0, 0),
(38, 'Jule', '-', 'hsisk', 0, 0),
(39, 'h', '-', 'h', 0, 0),
(40, 'jules', '-', 'test', 0, 0),
(41, 'test ', '-', '2', 0, 0),
(42, 'tewt', '-', '3', 0, 0),
(43, 'j', '-', 'j', 0, 0),
(44, 'a', '-', 'b', 0, 0),
(45, 't', '-', 'b', 0, 0),
(46, 'test579p', '-', 'jukes', 12364, 0),
(47, 't', '-', 't', 2, 0),
(48, 'teqt5', '-', 'hqusj', 6435, 0),
(49, 'test', '-', 'jdis', 94648, 0),
(50, 'ysk', '-', 'dbkd', 8434, 0),
(51, 'srj', '-', 'gki', 56, 0),
(52, 'bsijd', '-', 'hsisb', 97679, 0),
(53, 'hdod', '-', 'dvid', 846, 0),
(54, 'fun', '-', 'xhn', 839, 0),
(55, 'tinf', '-', 'func5', 439, 0),
(56, 'hsijd', '-', 'vsuvd', 84395, 0),
(57, 'ydibf', '-', 'svdibx', 84359, 0),
(58, 'heud', '-', 'hdibf', 946, 0),
(59, 'gsuhd', '-', 'hdivd', 94395, 0),
(60, 'yolo', '-', 'teis', 84695, 0),
(61, 'tdoke', '-', 'ejeo', 83, 0),
(62, 'testet', '-', 'gehV', 876, 0),
(63, 'ted', '-', 'gub', 53, 0),
(64, 'teshko', '-', 'div', 869, 0),
(65, 'tcj', '-', 'fuv', 569, 0),
(66, 'fug', '-', 'cbd', 868, 0),
(67, 'ydkd', '-', 'dhdn', 4946, 0),
(68, 'd', '-', 'v', 9, 0),
(69, 'uzjvd', '-', 'shdibd', 97, 0),
(70, 'v', '-', 'h', 9, 0),
(71, 'h', '-', 'dtj', 5, 0),
(72, 'ud', '-', 'hdu', 89, 0),
(73, 'tv', '-', 'vyb', 8, 0),
(74, 'g', '-', 'g', 5, 0),
(75, 't', '-', 'n', 5, 0),
(76, 'f', '-', 'j', 5, 0),
(77, 'h', '-', 'g', 6, 0),
(78, 'etud', '-', 'fgui', 556, 0),
(79, 'dû ', '-', 'ch', 86, 0),
(80, 'g', '-', 'h', 6, 0),
(81, 'l', '-', 'l', 6, 0),
(82, 't', '-', 'g', 8, 0),
(83, 't', '-', 'u', 3, 0),
(84, 'y', '-', 'j', 6, 0),
(85, 'u', '-', 'h', 5, 0),
(86, 'i', '-', 'b', 0, 0),
(87, 'm', '-', 'm', 6, 0),
(88, 'k', '-', 'm', 3, 0),
(89, 'tum', '-', 'bl', 96, 0),
(90, 'l', '-', 'h', 6, 0),
(91, 'q', '-', 'j', 0, 0),
(92, 'jfpl', '-', 'jdolf', 95365, 0),
(93, 't', '-', 'j', 5, 0),
(94, 'fey', '-', 'gi6', 82, 0),
(95, 'tk', '-', 'hij', 86, 0),
(96, 'eyip', '-', 'sgio', 4236, 0),
(97, 'hqo', '-', 'jsl', 643, 0),
(98, 'Ah ça marche enfin ', '-', 'moi et encore moi ', 123, 0),
(99, 'tom', '-', 'tom', 0, 0),
(100, 'hifl', '-', 'hdid', 0, 0),
(101, 'pastom', '-', 'jd', 65, 0),
(102, 'pajdid', '-', 'gdis', 8467, 0),
(103, 'luv', '-', 'luc', 65, 0),
(104, 'etio', '-', 'fhio', 886, 0),
(105, 'rjl', '-', 'gjo', 86, 0),
(106, 'testt', '-', 'hhhh', 534, 0),
(107, '', '-', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `markas_book`
--

CREATE TABLE IF NOT EXISTS `markas_book` (
  `id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `hasBook` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `nb_comment` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `markas_book`
--

INSERT INTO `markas_book` (`id`, `user_id_from`, `id_livre`, `hasBook`, `id_photo`, `nb_like`, `nb_comment`) VALUES
(116, 10, 102, 1, 31, 0, 0),
(115, 10, 99, 1, 30, 0, 0),
(120, 10, 106, 1, 35, 0, 0),
(121, 13, 99, 1, 36, 0, 0),
(122, 10, 107, 1, 37, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `markas_follow`
--

CREATE TABLE IF NOT EXISTS `markas_follow` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `date_` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `markas_follow`
--

INSERT INTO `markas_follow` (`id`, `from_id`, `to_id`, `date_`) VALUES
(54, 13, 10, '2017-01-24'),
(53, 10, 14, '2017-01-23');

-- --------------------------------------------------------

--
-- Structure de la table `markas_photo`
--

CREATE TABLE IF NOT EXISTS `markas_photo` (
  `id` int(11) NOT NULL,
  `base64` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `markas_photo`
--

INSERT INTO `markas_photo` (`id`, `base64`) VALUES
(3, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB\nAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEB\nAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAChAHkDASIA\nAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQA\nAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3\nODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWm\np6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEA\nAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSEx\nBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElK\nU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3\nuLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD8u7/w\n3Fo0T3moRt8zIwjWNmaUh2DJHucFkRGDCVmXJwCS8i598+GNpFZSvFEkbKsyyCRUT99DOvmQ3DDM\nmPOtjFNklsLtiYjEiC34++Huq+deXWo2ph81X+xKsbqhig8z5YWUNuHOXXO5g6NwjJGXfDhgotTI\npiktXTTLkMw4USTzWMrgnJ3N9qtmJZcItkgyEdg8TgZTwrrNXk0tYu8eV8ySj7utrO+l+a172Tf6\nDnGbYeeZ1crwd4YTBTlTi7xvWrQlJTrSs2nK6vF3tD3oq6lzH3V4GsY9lu21WAKlRgrnaSctkLzg\nnBXgM68Eh931h4V03zY4z5YJIXClTguNzD5SWJBKryflCqiDBD182/DG2E8Nuh+Y5VsFRlcZ2gNv\n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\n'),
(4, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB\nAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEB\nAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAChAHkDASIA\nAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQA\nAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3\nODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWm\np6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEA\nAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSEx\nBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElK\nU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3\nuLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD2nWbQ\n+H9ekSQNDYalvhaUDBhmdleKUKCcMkqR3CKvzHYFRSpda9O8Fau8MiI7osqyiKZBkiOcb42UtuVS\noHIZeCoU7gpCt2/xs+H5hknnij2xSJJJbuhKMJVeRigRVGzy25DIrDDAhCULn5+0PVmt5oZZiwmU\ni0vQCAy3VureQ8o3Y3XNum1VjA3TRSzH7xr6LN8HHEYZYiEVdxSm0tedOVpOyaTvFqTvq+TmScY3\n5MmxMqFSdKpNaTur3a5HKS2vra6bj0bd76X/AEO8F6kJI0BdTwgJUg/Lu4zgkAK2QAWJII5Zxur6\nB0eaFkyMMSF4C8MCSN/I65zhSd2MZB+U18S/DvxAkkUQLHHyBmyAckquWP1VV+bpyBhTgfWfhu+3\n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\n');

-- --------------------------------------------------------

--
-- Structure de la table `markas_user`
--

CREATE TABLE IF NOT EXISTS `markas_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `following` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `markas_user`
--

INSERT INTO `markas_user` (`id`, `username`, `password`, `email`, `following`, `follower`) VALUES
(9, 'jules', '0d78a4a11319458cc61682939dedbb31c009e2d4', 'jules.eschbach@icloud.com', 0, 0),
(10, '0', 'b6589fc6ab0dc82cf12099d1c2d40ab994e8410c', '0', 1, 1),
(13, 'momo', '77add44f8f13cf5b3298a7833613aca42430386d', 'simon.t42@free.fr', 1, 0),
(14, 'jean', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 'jemengou', 0, 1),
(15, 'pixover', '03de6c570bfe24bfc328ccd7ca46b76eadaf4334', 'pixoverkdozksi', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date_` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `date_`) VALUES
(1, ' givdzvi kvjk uv tipgkrxv jrej draljtlcvj ez trirtkvivj grikztlczvij', '2016-09-14'),
(2, ' gg pur le site lel', '2016-09-14'),
(3, ' yr tiy xvst kvmw pi jsrh xy tiyb tew ensyxiv yri mqeki ', '2016-09-14'),
(4, ' bhnv prfg cerih gxg', '2016-09-14'),
(5, ' bhnv prfg cerih gxg', '2016-09-14'),
(6, ' yr tiy xvst kvmw pi jsrh xy tiyb tew ensyxiv yri mqeki ', '2016-09-14'),
(7, ' env ghkftexfxgm be ixnm itl tohbk tvvxll wxgbxw', '2016-09-14'),
(8, ' env ghkftexfxgm be ixnm itl tohbk tvvxll wxgbxw', '2016-09-14'),
(9, ' fnyhg cvreer', '2016-09-14'),
(10, ' b', '2016-09-14'),
(11, ' hfcd rif zo ta', '2016-09-14'),
(12, ' a', '2016-09-14'),
(13, ' tbpe ix pqobbq', '2016-09-15'),
(14, ' sbj lzzhfl kl kljvkly jl tlzzhnl', '2016-09-15'),
(15, ' aalut la street', '2016-09-15'),
(16, ' salut la street', '2016-09-15'),
(17, ' hpaji ap higtti', '2016-09-15'),
(18, ' gh erpbvf pr zrffntr cbvag qvagreebtngvba ', '2016-09-15'),
(19, ' g ha tebf svyf qr chgr thvthv', '2016-09-15'),
(20, ' thb tnllb ixmbm mahftl', '2016-09-15'),
(21, ' xsm eywwm tixmx xlsqew', '2016-09-15'),
(22, ' nmzpq pq ruxe pq bgfqe mddqfql pq baxxgqd oq ymszurucgq eufq', '2016-09-15'),
(23, ' ufcg twzg rs dihs ', '2016-09-15'),
(24, ' vwsf xs as giwg towh pfoeisf sh u jws acb dsfs gs towfs hisf aowg xs giwg gif r ibs qvdgs hcb gwhs q sgh qcaas ho jws rs zo asfrs', '2016-09-15'),
(25, ' test encore encore et encore', '2016-09-15'),
(26, ' atnqf ts jxy xtz tam rfnsyjsfsy', '2016-09-15'),
(27, ' zzzzzzzzzzzzzzzzz', '2016-09-15'),
(28, ' putin on se fait chier par ici', '2016-09-15'),
(29, ' yy ajc bc bcapwryec cqr tgler osyrpc', '2016-09-15'),
(30, ' ycq zyppcq ', '2016-09-15'),
(31, ' bbb ccc ddd eee fff', '2016-09-15'),
(32, ' bcafgddpc byzmpq acjsg bs bcqqsq oo bi zmcaaq i lmkpqnnzmz twt wv aiucam jqmv', '2016-09-15'),
(33, ' dechiffre dabors celui du dessus qq dk boeccs k nomrsppbob vyv yx ckweco lsox', '2016-09-15'),
(34, ' gfli cv tfuv ve srj zc wrlk hlv kl dvkkv uflqv rl dvjjrxv tipgkvi ve uvjjflj glzj hlv kl kiflmv crrlkiv tcv gfli cv uvtyzwwivi', '2016-09-15'),
(35, ' gfli cv tfuv ve srj zc wrlk hlv kl dvkkv uflqv rl dvjjrxv tipgkvi ve uvjjflj glzj hlv kl kiflmv crrlkiv tcv gfli cv uvtyzwwivi', '2016-09-15'),
(36, ' aff caest quoi ca', '2016-09-15'),
(37, ' aff caest quoi ca', '2016-09-15'),
(38, ' pc gjepgg wqytmv e eiwb syk wg pgzgrv xqxa fiu pg lwmv sexqfti c xtikdg lgytiu xtipxgawgtva gjitgjib hgw krfmeiu wwv ni umvi a niu tgvuixitepxu wgvqrv wcru hqyvi tiesotgruiuaaa', '2016-09-16'),
(39, ' gg', '2016-09-16'),
(40, ' sf jmhsjj ztbwpy h hlze vbn zj sjcjuy atad ilx sj ozpy vhatiwl f awlngj ojbwlx awlsajdzjwyd jmlwjmle kjz nuiphlx zzy ql xpyl d qlx wjyxlalwhsax zjytuy zfux ktbyl wlhvrwjuxlxddd', '2016-09-16'),
(41, ' fs wzufww mgojcl u uymr ioa mw fwpwhl ngnq vyk fw bmcl iungvjy s njyatw bwojyk njyfnwqmwjlq wzyjwzyr xwm ahvcuyk mml dy kcly q dyk jwlkynyjufnk mwlghl mshk xgoly jyuiejwhkykqqq', '2016-09-16'),
(42, ' vq fqefq gz yqeemsq qz oxq paglq', '2016-09-17'),
(43, ' cpeqtg wp cwvtg vguv rqwt vguvgt ng uauvgog fg fgejkhhtcig fg lwngu', '2016-09-17'),
(44, ' cpeqtg wp cwvtg vguv rqwt vguvgt ng uauvgog fg fgejkhhtcig fg lwngu', '2016-09-17'),
(45, ' iqbkj qbehi bu iyju yb uij ryud qlus ideef tew ', '2016-09-17'),
(46, ' sirmf kl rj irrljjz rr urrtipgkvi tv dvjjrxv', '2016-09-17'),
(47, ' uihdiolm u niom cwc zluhwicm biffuhxy uodiolxboc hiom miggy ohy diolhyy julncwofcyly ohy diolhyy io dy pucm piom yhwofyl upyw ohy vigvy howfyucly jiol fy guf koy piom gupucm zucn movcl duc lydichm xuymb yn dyh mocm zcyl uffyl dy pucm uffyl uo juluxcm xym uuu pcylaym uffyl nwbi vuhxy xy vunulx wilxcufygyhn fy jlymcxyhn zluhwucm', '2016-09-17'),
(48, ' jajjbrmnwc mn uj jjjydkurzdnj sjjbbdvnajr yunrwnvnwc unb anbyxwbjkrurcjjb nglnycrxwwnuunb mn lnccn qjdcn vrbbrxwj jn orgnajr unb yarxarcjjb vjrb sn wn mjjlrmnajr yjb mn cxdc wr jj uj yujln mn cxdbj jxwoxavjjvnwc jj uj jxwbcrcdcrxwj un pxdenawnvnwc mjjcnavrwnaj nc lxwmdraj uj yxurcrzdn mn uj jjcrxwj jn jjaunvnwc bnaj anbynlcjj mjwb bnb maxrcbj jj sdbcrln mrbyxbnaj mn cxdcnb unb pjajwcrnb mn bxw rwmjjynwmjwlnj jn yxdexra mjjcjc bnaj ngnaljj jenl mrpwrcjj vjrb brvyurlrcjjj jenl dwn pajwmn jvkrcrxw yxda un yjhbj jc dwn bladydundbn bxkarjjcjj mjwb unb lxvyxacnvnwcbj jjjcjc bnaj rvyjacrju yjaln zdjru nbc uj yaxyarjjcjj mn cxdb unb jajwjjjrb nc zdjru wjjyyjacrnwc mxwl yjb jj lndg zdr nw xwc anjjd uj lqjapnj jnb ajjpunb mn wxvrwjcrxw mnb anbyxwbjkunb ydkurlb bnaxwc nwljmajjnbj jc uj uxhjdcjjj uj lxvyjjcnwlnj nc un bnwb mn ujrwcjjajjc pjjwjjaju bnaxwc unb bndub larcjjanb yxda mjjcnavrwna vnb lqxrg yxda unb yudb qjdcb bnaercndab mn ujjcjcj jj jajwln j uj lqjwln mn mrbyxbna mjdwn oxwlcrxw ydkurzdn mn zdjurcjjj jn endg udr mran vj anlxwwjrbbjwln nc ujjccnwcn zdn sn yujln nw nuun nc nw lqjldw mn bnb jpnwcbj jj lxworjwlnj nuun nbc mjwb uj mjjvxlajcrn nuunjvjjvnj jn laxrb nw uj mjjvxlajcrn uxljun nc sjnwcnwmb uj anererorna yja dw wxdenu jlcn mn mjjlnwcajurbjcrxw bdblnycrkun mn mxwwna mn wxdenuunb urknacjjb yxda un mjjenuxyynvnwc mn wxb cnaarcxranbj jn laxrb nw uj mjjvxlajcrn bxlrjunj nc mn wxdenjdg nbyjlnb mn wjjpxlrjcrxw bnaxwc xdenacb jdg yjacnwjranb bxlrjdgj zdn sn anbynlcnajrj jdbbr krnw unb anyajjbnwcjwcb mnb bjujarjjb zdn unb xapjwrbjcrxwb yaxonbbrxwwnuunbj jn laxrb nw uj mjjvxlajcrn lrcxhnwwnj lnuun mnb jbbxlrjcrxwb nc mnb nwpjpnvnwcb lrerzdnb zdr bnaxwc bxdcnwdb yxda unb vruurxwb mn kjjwjjexunb zdr bjh mjjexdnwcj jj lxworjwlnj nuun anyxbn bda uj sdbcrln mjwb unb lqxrgj jj sdbcrln mjwb uj lxwlnycrxw vjjvn mn uj lajjjcrxw mn arlqnbbnj ju nbc cnvyb mn anvnccan uj yaxmdlcrxw jejwc uj byjjldujcrxwj ujrwenbcrbbnvnwc mjjenwra jejwc uj bjcrbojlcrxw md yajjbnwcj ujnvyuxr mdajkun jejwc un yaxorc rvvjjmrjcj ju nbc cnvyb mjnwpjpna uj cajwbrcrxw jjwnapjjcrzdn nc jjlxuxprzdnj ju nbc cnvyb mjxdeara dwn wxdenuun oaxwcrjjan yxda un mjjenuxyynvnwc cnlqwxuxprzdn nc yxda ujrwwxejcrxwj jjrb uj sdbcrln nuun jdbbr mjwb uj ajjyjacrcrxw mn ujnooxac rwmrbynwbjkunj ju wn yndc yjb h jexra mnb bjlarorlnb yxda unb dwbj cxdsxdab yudb wxvkandgj nc mnb yarerujjpnb yxda unb jdcanbj bjwb lnbbn vxrwb wxvkandgj jn bnaj un bnwb mnb ajjoxavnb zdn un pxdenawnvnwc lxwmdraj jenl un bxdlr mn ajjlxvynwbna un vjjarcnj un cajejruj ujrwrcrjcrenj nc mn mjjlxdajpna uj anwcn nc unb ajjvdwjjajcrxwb ngxakrcjwcnbj jj sdbcrlnj ln bnaj un larcjjan bda unzdnu lqjzdn mjjlrbrxw ydkurzdn bnaj yarbnj jworw uj lxworjwlnj ljnbc jj uj sndwnbbn zdn uj jjjydkurzdn mxrc ujjllxamnaj jn udr anwmajr uj yujln zdr mxrc jjcan uj brnwwnj uj yanvrjjanj jjnbc un oxwmnvnwc mn vxw nwpjpnvnwc yxda ujjjlxun mn uj jjjydkurzdn lja bj vrbbrxw nbc ercjun yxda uj lxqjjbrxw mn wxcan yjhbj uj ajjdbbrcn mn wxcan jjlxwxvrnj jjnbc uj exuxwcjj zdr vjjwrvn yxda ajjwxena uj oxavjcrxw yaxonbbrxwwnuunj ujjllxvyjpwnvnwc mnb sndwnb enab ujnvyuxr nc udccna lxwcan uj yajjljarcjjj jjnbc jdbbr uj knuun rmjjn md bnaerln lrerzdn zdn sjnwcnwmb anujwlnaj', '2016-09-17'),
(49, ' uihdiolm u niom cwc zluhwicm biffuhxy uodiolxboc hiom miggy ohy diolhyy julncwofcyly ohy diolhyy io dy pucm piom yhwofyl upyw ohy vigvy howfyucly jiol fy guf koy piom gupucm zucn movcl duc lydichm xuymb yn dyh mocm zcyl uffyl dy pucm uffyl uo juluxcm xym uuu pcylaym uffyl nwbi vuhxy xy vunulx wilxcufygyhn fy jlymcxyhn zluhwucm', '2016-09-17'),
(50, ' sirmf kl rj irrljjz rr urrtipgkvi tv dvjjrxv', '2016-09-19'),
(51, ' ozrjx', '2016-09-19'),
(52, '        ', '2016-09-19'),
(53, ' rtrx thi jc bthhpvt sthixct p tigt strgneit', '2016-09-19');

-- --------------------------------------------------------

--
-- Structure de la table `messagesPP`
--

CREATE TABLE IF NOT EXISTS `messagesPP` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `publicPrivate` int(11) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `date_` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messagesPP`
--

INSERT INTO `messagesPP` (`id`, `message`, `publicPrivate`, `expediteur`, `destinataire`, `date_`) VALUES
(1, ' ujyny yjxy', 0, 2, 7, '2016-09-21'),
(2, ' xfqzy ozqjx', 0, 9, 2, '2016-09-21'),
(3, ' xfqzy ojfs', 0, 2, 9, '2016-09-21'),
(4, ' osgh ooo hsgh', 0, 11, 2, '2016-09-21'),
(5, ' osgh ooo hsgh', 0, 11, 2, '2016-09-21'),
(6, ' xfqzy ytrfyj yz kfny ufwynj ijx ymzlx iz qdhjj', 0, 2, 11, '2016-09-21'),
(7, ' aa marche paaaaaaas', 0, 13, 2, '2016-09-21'),
(8, ' xfqzy qf xywjjy', 0, 14, 2, '2016-09-21'),
(9, ' z ky zkrrksktz ruaxj wak wagtj za zgyyuoy za vkxik rkyvgik zksvy', 0, 2, 14, '2016-09-21'),
(10, ' ygraz vokxxk', 0, 2, 8, '2016-09-21'),
(11, ' acoute le cours  aaest pour ton avenir ', 0, 8, 2, '2016-09-21'),
(12, ' tu pense que t a combien a peux pres en maths', 0, 8, 2, '2016-09-21'),
(13, ' franchement je pense avoir entre quinze au pire et dix neuf normalement lol', 0, 2, 8, '2016-09-21'),
(14, ' a est bon tu m a soulaa j ai aa grand max moi fais chier', 0, 8, 2, '2016-09-21'),
(15, ' a est bon tu m a soulaa j ai quinze grand max moi fais chier', 0, 8, 2, '2016-09-21'),
(16, ' ca me dit quelque chose ce coursaaaa', 0, 8, 2, '2016-09-21'),
(17, ' lol ', 0, 2, 8, '2016-09-21'),
(18, ' qintee bai bien sur ', 0, 2, 2, '2016-09-21'),
(19, ' ae auia sar qua au vaa aiaa aomarenara a ca aaassaga', 0, 8, 2, '2016-09-21'),
(20, ' arrete de mettre des majucukes partout stp', 0, 2, 8, '2016-09-21'),
(21, ' oui je sais faut que tu code tout ca et tu l envoie dans la conv de la classe', 0, 8, 2, '2016-09-21'),
(22, ' lourd ', 0, 14, 2, '2016-09-22'),
(23, ' fnyhg sqc ', 0, 14, 15, '2016-09-22'),
(24, ' salut julien', 0, 2, 18, '2016-09-22'),
(25, ' jules le matheux ou le geni', 0, 18, 2, '2016-09-22'),
(26, ' jules le matheux ou le geni', 0, 18, 2, '2016-09-22'),
(27, ' yjxy', 0, 2, 21, '2016-09-23'),
(28, ' xicx', 0, 2, 14, '2016-09-23'),
(29, ' yjxy', 0, 2, 14, '2016-09-23'),
(30, ' yjxy', 0, 2, 7, '2016-09-23'),
(31, ' yjxy', 0, 2, 7, '2016-09-23'),
(32, ' xix', 0, 2, 14, '2016-09-23'),
(33, ' xix', 0, 2, 14, '2016-09-23'),
(34, ' yjxy', 0, 2, 2, '2016-09-23'),
(35, ' vo uftu qpvs kvmft', 0, 2, 2, '2016-09-23'),
(36, ' zsg asggousg dzipzwq tcbqhwcbbs ci dog', 0, 8, 2, '2016-09-23'),
(37, ' dog sbqcfs aowg zsg dfwjsg aofqvsbh pwsb', 0, 2, 8, '2016-09-23'),
(38, ' qo aofqvs bwysz', 0, 8, 2, '2016-09-23'),
(45, ' whv jurv jxloodxph ', 0, 2, 14, '2016-09-26'),
(46, ' owhqp cqehhwqia ykiiajp pq rwo', 0, 14, 14, '2016-09-26'),
(59, ' ocbxcif xs aooddszzs sjs xs jcig hfobgash qs asggous', 1, 2, 0, '2017-01-23'),
(60, ' p', 1, 2, 0, '2017-01-23'),
(61, ' su jfu uij wudyqb', 1, -1, 0, '2017-02-17'),
(62, ' fsbrsn jcig rsaowb o gswns vsifs bs zs rwhsg o dsfgcbbs', 1, -1, 0, '2017-02-24'),
(63, ' a', 0, 2, 16, '2017-02-27'),
(64, ' tpeppppppppppppppppppp', 1, 2, 0, '2017-02-27'),
(65, ' ub nfsf', 1, 2, 0, '2017-02-27'),
(66, ' x owas zsg gwbusg', 1, 2, 0, '2017-02-27'),
(67, ' hello', 1, -1, 0, '2017-02-28'),
(68, ' teiatuxm ihnk exl gnel t u v w x y z a b c d e f g h i j k l m n o p k r s vhkwbtexfxgm', 1, -1, 0, '2017-02-28'),
(58, ' mp c e yr tvsfpiqi ezig pe zepmwi uyi xy qe hsrrie mp qeruyi tpywmiyvw qmppmsrw h iyvsw', 1, 2, 0, '2016-12-13'),
(57, ' xs giwg zs dfsgwrsbh rsg shohg ibwg r oasfweis sh xs hwsbg o jcig dfsjsbwf eis xs jowg zobqsf ibs pcaps biqzsowfs gif zs doywghob rsaowb aohwb', 1, 2, 0, '2016-12-08'),
(53, ' erqmrxu d wrxv lo qb d soxv wurs gh wudilf fhv whpsv fl hw mh qh vxlv sdv wurs udyl gh fd', 0, 2, 14, '2016-11-23'),
(56, ' obawbhe n gbhf abhf hgvyvfbaf qrf zrffntrf gry dhr pryhv pv cbhe rssrpghre qrf grfg qr pelcgntr rg qr qrpelcgntr', 1, 2, 0, '2016-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `raspberry`
--

CREATE TABLE IF NOT EXISTS `raspberry` (
  `id` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `raspberry`
--

INSERT INTO `raspberry` (`id`, `state`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sesl`
--

CREATE TABLE IF NOT EXISTS `sesl` (
  `id` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `id_bac` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sesl`
--

INSERT INTO `sesl` (`id`, `id_pic`, `id_bac`) VALUES
(34, 16, 1),
(33, 15, 0),
(32, 14, 0),
(31, 13, 0),
(30, 12, 0),
(29, 11, 0),
(23, 5, 1),
(22, 4, 1),
(21, 3, 3),
(20, 2, 0),
(19, 1, 0),
(18, 0, 0),
(24, 6, 2),
(26, 8, 1),
(27, 9, 0),
(28, 10, 0),
(25, 7, 0),
(35, 17, 1),
(36, 18, 0),
(37, 19, 1),
(38, 20, 0),
(39, 21, 0),
(40, 22, 0),
(41, 23, 0),
(42, 24, 3);

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `id` int(11) NOT NULL,
  `nameUp` varchar(255) NOT NULL,
  `desUp` text NOT NULL,
  `linkData` varchar(255) NOT NULL,
  `linkExe` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `station`
--

INSERT INTO `station` (`id`, `nameUp`, `desUp`, `linkData`, `linkExe`) VALUES
(5, 'Station Edge ver beta 0.0.3.3', 'Ajout du launcher', '0.0.3.3', ''),
(6, 'Station Edge ver beta 0.0.3.4', 'Resolution de quelques bugs', '0.0.3.4', '');

-- --------------------------------------------------------

--
-- Structure de la table `stationManag`
--

CREATE TABLE IF NOT EXISTS `stationManag` (
  `id` int(11) NOT NULL,
  `ver_num` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stationManag`
--

INSERT INTO `stationManag` (`id`, `ver_num`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `password`) VALUES
(4, 'ZbeubZbeub', 'fb665164a1d1af85b5b2f0bad28034d97a0b4f20'),
(2, 'jules', '0d78a4a11319458cc61682939dedbb31c009e2d4'),
(3, 'romain', 'f6e1126cedebf23e1463aee73f9df08783640400'),
(8, 'Razorcrafta', 'e91939426a6c6d8a4913769f0d5c35c6b12931d2'),
(12, 'Thomas', '1938b79762f018cf11cc7d1011b8157840d37e60'),
(13, 'Platypus', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(14, 'Guillaume Dupuis', 'e123a04019055970f6ce5f438e8accd135b05fb9'),
(16, 'Noemie', '5657f68d2908addbd5693e51252a8eae5648fbc6'),
(18, 'zecksoor', 'f8ac4ac330f688a233e5fb3afbb266782365967c'),
(20, 'test', '1b6453892473a467d07372d45eb05abc2031647a'),
(21, 'Jean', '6e79f4ca26f7ed989cc814f9dd8490fecbadd84f'),
(22, 'Jacques', '381be0093c78dc23f52ac7a2357c8db4d86635b1'),
(24, 'tom', '7c94800aad28ca76ca7570eb11cf918e7562265e');

-- --------------------------------------------------------

--
-- Structure de la table `yape_bookday`
--

CREATE TABLE IF NOT EXISTS `yape_bookday` (
  `id` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `date_` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `yape_bookday`
--

INSERT INTO `yape_bookday` (`id`, `book_id`, `date_`) VALUES
(1, 'https://www.googleapis.com/books/v1/volumes/nHcPAwAAQBAJ', '2017-04-09');

-- --------------------------------------------------------

--
-- Structure de la table `yape_books`
--

CREATE TABLE IF NOT EXISTS `yape_books` (
  `id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `image_id` varchar(255) NOT NULL,
  `date_` date NOT NULL,
  `nb_like` int(11) NOT NULL,
  `nb_comment` int(11) NOT NULL,
  `des` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `yape_books`
--

INSERT INTO `yape_books` (`id`, `user_id_from`, `book_id`, `image_id`, `date_`, `nb_like`, `nb_comment`, `des`, `title`, `auteur`, `pages`) VALUES
(60, 11, 'https://www.googleapis.com/books/v1/volumes/3TJbAAAAQAAJ', 'http://books.google.com/books/content?id=3TJbAAAAQAAJ&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE70FeLVzccAZm3RcAMXEbEDHMZtbMKZN9oxLEi5g4oGHJRVb1MQa2PpnBbK_luc3Sp194d7i_rW3gcKcieyiwjXV9dKpv7iWD39SmyC9N1u7VkNNJ4pZMYHfxycBZdLveMwxE1aR&source=gbs_', '2017-02-17', 1, 0, '', 'Dictionnaire français-italien', 'Catineau', 772),
(59, 11, 'https://www.googleapis.com/books/v1/volumes/IwLhJ5bv2xsC', 'http://books.google.com/books/content?id=IwLhJ5bv2xsC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73UdgtBwlNzOPeL-L13ijmQhoqqelIzawb4cbnEjSPBNAEohMsCux4v9LS94bC5ZI9tQhA6MM4w3KuXlimO4Uo3YTfURTccQu8fh15E7AX8EcN2nChh-sKxMI3STg-Yf3HYMDSp&source=gbs_', '2017-02-17', 3, 0, '', 'L'' Interne Dans Le Style Thieu-Lam Yang- Pai Lao-Ji', 'Jose Valery', 86),
(58, 11, 'https://www.googleapis.com/books/v1/volumes/rJ5kSvG6GI4C', 'http://books.google.com/books/content?id=rJ5kSvG6GI4C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE70DDMsVAO1l_s9FinHaqP2MNgFDzzhEJ0Lc-r6jB-0eGgmJ4VvTRqcjAy8fpsYaZoO3vB7KDK9zzoDR5CkNJRVFenhXWauxe2_aw_RcJ1a4BdG2ehsrJPAeoTDkyTAHJzfua17D&source=gbs_', '2017-02-16', 0, 0, '', 'Santa Monica', 'Paula A. Scott', 160),
(57, 11, 'https://www.googleapis.com/books/v1/volumes/nHcPAwAAQBAJ', 'http://books.google.com/books/content?id=nHcPAwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73Q5iRGnPHJgeciW3u6RtoNRtCI8sCSnCYGRiqlqhRcNG3qawT7oilYHCssKofQL8SmxLWPprlBdxmiVJqNPwdHFlZvrP1B6S_6TnrBq-bbhC6rD6LNdjTxAo8syZxT465wtTYl&source=gbs_', '2017-02-16', 0, 0, 'je l''ai pas lu encore', 'Divergente 3', 'Veronica Roth', 355),
(56, 11, 'https://www.googleapis.com/books/v1/volumes/k7PxE0M5DDcC', 'http://books.google.com/books/content?id=k7PxE0M5DDcC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72YLtacTzxTPG3ffnl-qw-R9WFonbLFeSnLFXsKcP0Si_Y5ghuYt_67N7aGDnuzLcBA0uURJYe4c6JyRe09pzStjPT6Ds5PRTNIIbnC5rwiAJP_avbSTNMaYEw0ae__iO5iMW2K&source=gbs_', '2017-02-16', 0, 0, '', 'Best practices PHP 5', 'Guillaume Ponçon', 470),
(55, 11, 'https://www.googleapis.com/books/v1/volumes/iAWxMhooztMC', 'http://books.google.com/books/content?id=iAWxMhooztMC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73xLnu-LKNbsaqdJAEv5sUSTCoVzsD0AWuye-RoXhgFN0TwT858o4wmQRmKz2VAaH5p0xsDox9-eRm08il6wWQC35V6x4qmlrvqbEMvesYGZoq73H0M0cBuI__VIlcCGfn197AY&source=gbs_', '2017-02-16', 1, 0, '', 'Metro 4 Vert', 'Gill Ramage', 192),
(54, 11, 'https://www.googleapis.com/books/v1/volumes/oTP3sjBdqh0C', 'http://books.google.com/books/content?id=oTP3sjBdqh0C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73VgPG2fI3dM43Hk7irr0chIJS145jpU_oGQ4bRJF7uAkqKHcZVQvlg0efnpaEckk7Hm54grLAdEluk-b58VPtAQPHBovfNOyc-FYLXbThqIRcmFFG5sbcKoSDnxGjpaGZbWAnl&source=gbs_', '2017-02-16', 0, 0, '', 'Encore Tricolore 3', 'Heather Mascie-Taylor', 175),
(52, 11, 'https://www.googleapis.com/books/v1/volumes/YxtTx1LjB_MC', 'http://books.google.com/books/content?id=YxtTx1LjB_MC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73UvG3EaOdUYJ07PxUNWfCEuyKm46H0bKeWDSNqMy8QC0TXbPs5IJ-JnZHRHLr_ix8I1QPQ1TyA5-jXaBtzyaAn2w28HCplyt5VPMDWgy2agZ5qmHHTv6maZA-LNvBjmW3sbp3-&source=gbs_', '2017-02-16', 0, 0, '', 'Expo 1', 'Jon Meier', 156),
(53, 11, 'https://www.googleapis.com/books/v1/volumes/O5PGED8x0WgC', 'http://books.google.com/books/content?id=O5PGED8x0WgC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72mfbtqL4Evs4Lo5D9PgdEsSk_XSqTmsaCBNI8q3l45YJnq5-38-b1PhfqkXBVLp4hECphbfEkXC1Skn3LNIYMV1hwxNJ55tZHEDzFs-PyABaCsuevlEVC0yTlRDkuG_5-_qscR&source=gbs_', '2017-02-16', 1, 0, '', 'Expo 2 Vert Pupil Book', 'Jon Meier', 157),
(51, 11, 'https://www.googleapis.com/books/v1/volumes/vWxokFDTpy4C', 'http://books.google.com/books/content?id=vWxokFDTpy4C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72ir6EekvbbzVW_swtcr0ifs8a3YcujkMFFnFEgBYGrusr_UIW1JkIyArh0amOfuhLt7t32KLhwdH_TgYDAOzMPHWoAWAgFyorlT26R3vHbioSZhreb_IxV04DrMmWHi-U92SYn&source=gbs_', '2017-02-16', 0, 0, '', 'Harry Potter et le Prisonnier d’Azkaban', 'J.K. Rowling', 448),
(50, 11, 'https://www.googleapis.com/books/v1/volumes/d1Fm_U1LzY4C', 'http://books.google.com/books/content?id=d1Fm_U1LzY4C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE71IdfKXkBYB5Fc0GxXnALm-8fe4JZSozP4lpAqDv1MONZ-sbzg4z40I53um5HM3Cd6YOa5G4OCz6dUBne-2KvkpoiRJu9q_HbzXcBC-B97iaGXm8txKa_UWco0TZOKn8_QKD8bg&source=gbs_', '2017-02-16', 0, 0, '', 'Harry Potter et l’Ordre du Phénix', 'J.K. Rowling', 1036),
(49, 11, 'https://www.googleapis.com/books/v1/volumes/nvijsUyJYR4C', 'http://books.google.com/books/content?id=nvijsUyJYR4C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73GAKVa-WeOQIR4-jU9ZsfmjJMaF2rzd_JgzUaZz4ecqRbCf4gD26hDhrGddLWgkhrcUYPT0IviYH1MbNv-VR33qS-Me20kIBoKHQIX_HjP26QDen4SYc3TWLFaUmrAERy-0tCV&source=gbs_', '2017-02-16', 0, 0, '', 'Harry Potter à L’école des Sorciers', 'J.K. Rowling', 322),
(61, 17, 'https://www.googleapis.com/books/v1/volumes/VaqoIfDlRoMC', 'http://books.google.com/books/content?id=VaqoIfDlRoMC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE717uU0wS81VuFu6X0HG-jVKIE41rFfbTXs9OZgEI-249MtoPl3OOr0IBR-0ghhDqDbNd7w2-36PcOIYRMb--3_7cF7M-cHhVEMLczzuQ0HWWRtRBwVdwSHLQGYjlSoucvtjeh6D&source=gbs_', '2017-02-17', 0, 0, '', '', 'Jean-Luc Desnier', 207),
(62, 17, 'https://www.googleapis.com/books/v1/volumes/sUzQr8dnM2gC', 'http://books.google.com/books/content?id=sUzQr8dnM2gC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72JraHNuToAFgrc1EvUOVF0g-vvHZY3G3-XJC0vXbkaFN62dHOkyPFTw95AtFW61rk1hO5PVSdOT2p-aYa5B2bk1sRAl3T9avpeOQ-aCmyOs-qXtAuK6VHjbL-Or3RYAUeAMMX3&source=gbs_', '2017-02-17', 0, 0, '', 'Y-a-t-il (vraiment) des technologies de l''information ?', 'Yves Jeanneret', 200),
(63, 17, 'https://www.googleapis.com/books/v1/volumes/xkHL24ntGPQC', 'http://books.google.com/books/content?id=xkHL24ntGPQC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE70g24Mjo78mUyPCB2KsOsKwEWazkr53bwzMKV7JJWtk4fuT8uA8oinU50gQFJcgqx4Lj6BB03ADStpilfZHbSnof1tOUTLTP9X-TmuPYp_hKnKPTTKllczP5ZHL-xlRyALej7Zo&source=gbs_', '2017-02-17', 0, 0, '', 'C''est bizarre l''écriture', 'Christiane Rochefort', 160),
(64, 11, 'https://www.googleapis.com/books/v1/volumes/H9Qw9o7gJp8C', 'http://books.google.com/books/content?id=H9Qw9o7gJp8C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72PM28Z69exx7EBmkQD7sIaqogzY6Oc0kOCQmB89PwBVhACeSUl0zjf0MSU85XTM1_K7_PNBVa3Es0Vxec_ao5vy-2KaW4OWd3g6EOlHcFRuEquOWN2RRNs2g4oBV6XT6yfX_54&source=gbs_', '2017-02-17', 4, 0, 'Un livre tres enfantin et une histoire originale mais il n''y avait pas trop d''action . les personnages nsont ien choisis.', 'La guerre des clans', 'Erin HUNTER', 229),
(65, 11, 'https://www.googleapis.com/books/v1/volumes/a8pU1qgdZkwC', 'http://books.google.com/books/content?id=a8pU1qgdZkwC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72V7wsWuZxoLDMfPgF7hI7mduerh3rdmsoWMokc6tfUtzgdIqSrbLCrwPmSmFpeCSVNIIeryJqkuIeeS4gZ5aJCpkPpF186ASVM9wWcW9OgsM6PeQO12-cvIST2AYYg8eDHuKaj&source=gbs_', '2017-02-17', 5, 0, '', 'Ju Jitsu', 'Pamela Randall', 24),
(66, 18, 'https://www.googleapis.com/books/v1/volumes/ahBPDAAAQBAJ', 'http://books.google.com/books/content?id=ahBPDAAAQBAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE72vQ-DuO4HNMILnxb87msMQaNIkM1sEWW1l29e9QvvCtBzOrUwdMT-I4PCypR2WUwHLK1yiXTnksG8RkniuVIO-vSGNaYYWsM-Sbu6D5miE5mDazIOZvQeC9BKFgzNZdb8Us6z3&source=gbs_api', '2017-02-18', 0, 0, '', 'Harry Potter et l''Enfant Maudit Parties Un et Deux (Le texte intégral de la pièce de théâtre)', 'J.K. Rowling', 352),
(67, 11, 'https://www.googleapis.com/books/v1/volumes/9ysba1A1UF8C', 'http://books.google.com/books/content?id=9ysba1A1UF8C&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE726yjAbZVgj_kc27BBAtvOZQRe0ogRv5ngQ1HZtRJm0260UnXfUNCReWrqw8NxUpb5o2OH0YDP1w_WGDJ3qZj05LACQFC_jLFzFqmchjaczSxVTdTIPVy7BAAFZ2k3ugvqukR4Z&source=gbs_', '2017-02-21', 120, 0, '', 'A Brief History Of Time', 'Stephen Hawking', 272),
(68, 11, 'https://www.googleapis.com/books/v1/volumes/fPMIjYxKhPoC', 'http://books.google.com/books/content?id=fPMIjYxKhPoC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73oNGkQDTwHRbt7RfAvA0D0rdqTMHJxIOmn04MpKDLBwdB2uH8tBfyP2iMIXYxe1Uj7HQ1SEOELeOquSgb6Zk9Or-IAIOCcjIg42favftemM9q72s1HW8Mwgy6DdKAe3lYb9WWp&source=gbs_', '2017-02-22', 0, 0, '', 'Abba', 'Frédéric Manns', 234),
(69, 11, 'https://www.googleapis.com/books/v1/volumes/Tjn3W5RKMBQC', 'http://books.google.com/books/content?id=Tjn3W5RKMBQC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72wA8PGnc8Y_wqRhVPoCbPXWFL-SLPsNxBAnK_ZBvWYpJiOIJ6PlsNJwWSHelXTPiD5UZkLDcuo34oP6wj6qx3DVqjoa0XMnqOUbte5fGRA6usmB0cPbcMkUBvQXkri6eLxFQBg&source=gbs_', '2017-02-24', 1, 0, 'basd', '20 000 lieues sous Bercy', 'Guy Maillet', 366),
(70, 11, 'https://www.googleapis.com/books/v1/volumes/c4buvQAACAAJ', 'http://books.google.com/books/content?id=c4buvQAACAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE70LCxPe0ARAnHPvKoT8s9D5bpMu41D6E2ADqPi7C2zJiuGgB2j5RJchN_8aPC9oN8gO0or9uwPpUe2wjMozp-sGjm28KCSNUpkqSQ70FxHxDijkNmq-1wNC9GckhoToIQtz3PSV&source=gbs_api', '2017-02-24', 0, 0, '', 'Mein Kampf', 'Adolf Hitler', 354),
(75, 11, 'https://www.googleapis.com/books/v1/volumes/ebtRdip1-0IC', 'http://books.google.com/books/content?id=ebtRdip1-0IC&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE702mn0PNFGvvvIkWpEox7LKhhM4IKoVz3uElS95-MNJp-WHpxrv3C5s7Xyf4_vJbgwbTviepB4lyU5Ba_mphGur1l60agQklYAaLDedQlCJGN_WObiGGe_-yv0XOPs-f0NVxW4z&source=gbs_', '2017-03-24', 0, 0, '', 'The Role of HGF/SF-Met on Forebrain GABAergic Interneuron Development', 'Gabriela J. Martins', 220),
(71, 11, 'https://www.googleapis.com/books/v1/volumes/3Hl9ev3SuIoC', 'http://books.google.com/books/content?id=3Hl9ev3SuIoC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73lAXa8RzO3GFCkaomonCPzEvGAg7ZU-_5C1cqv5JV7VKhxLndzxCpVOuWwHe1SYiUw2QVAwKm03VOOVI3-rSFrU8uVVJdYUhKbZ5dy6K9QiXT8QIoJu1JsBYc5X-_qVYeqwsiV&source=gbs_', '2017-02-24', 0, 0, '', 'Les SDF', 'Véronique Mougin', 125),
(72, 11, 'https://www.googleapis.com/books/v1/volumes/Ra9RAQAAQBAJ', 'http://books.google.com/books/content?id=Ra9RAQAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE70L5npq8P2Jnbwsirj-6SVN8evi4q5eh9yPpPcZxWOchgjQN7lyYZiVWXytgFCUP-LmfqKqp6dWnNMdAfpONosM5ZYT650BNy40iC3wQYgVwHzTjskTdPUoNS3jBkJ2nmNJv_II&source=gbs_', '2017-02-25', 0, 0, 'everyone should read it according To bill Gates ', 'The Sixth Extinction', 'Elizabeth Kolbert', 336),
(73, 11, 'https://www.googleapis.com/books/v1/volumes/YN0WAAAAYAAJ', 'http://books.google.com/books/content?id=YN0WAAAAYAAJ&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE73Ft7lopEQN-Q9E5BWRrGrqVQjN-JVG09tHQlmdoZYA-Za95ZlDCqSC-ue-J5_4PXEZUQpFBYO0KFwiJI3_ZcDwPnEpgM87hmZX1yv6b7iammU83GftzNGpb4IyBGwHq6f54213&source=gbs_', '2017-03-04', 0, 0, '', 'H. A. Taine', 'Henri Van Laun', 171),
(74, 11, 'https://www.googleapis.com/books/v1/volumes/7_H8AwAAQBAJ', 'http://books.google.com/books/content?id=7_H8AwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&imgtk=AFLRE72ODXoDK-WpMPS9qqUmRYZ79qseEaJYbdBwtp85RiPOs9uh1384LncQ0iY4uZ-ie83srgTm5llOFsXzfHJTjK9dky-mLlVsic2QsNDz64VD2NB-yyNnf2lEkhJkPeUz1oIFbhym&source=gbs_', '2017-03-21', 0, 0, 'fucking great. Thx Elon for recommanding', 'Superintelligence', 'Nick Bostrom', 328);

-- --------------------------------------------------------

--
-- Structure de la table `yape_friend`
--

CREATE TABLE IF NOT EXISTS `yape_friend` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `yape_friend`
--

INSERT INTO `yape_friend` (`id`, `from_id`, `to_id`) VALUES
(1, 11, 14),
(2, 11, 14),
(3, 11, 12),
(4, 11, 14),
(5, 17, 11),
(6, 11, 14),
(7, 11, 14),
(8, 11, 14),
(9, 11, 14),
(10, 11, 14),
(11, 11, 14),
(12, 11, 14),
(13, 11, 14),
(14, 11, 14),
(15, 11, 14),
(16, 11, 14),
(17, 11, 14),
(18, 11, 14),
(19, 11, 14),
(20, 11, 12),
(21, 11, 13),
(22, 11, 16),
(23, 11, 18);

-- --------------------------------------------------------

--
-- Structure de la table `yape_likecomment`
--

CREATE TABLE IF NOT EXISTS `yape_likecomment` (
  `id` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `by_id` int(11) NOT NULL,
  `comment` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `yape_likecomment`
--

INSERT INTO `yape_likecomment` (`id`, `book_id`, `type`, `by_id`, `comment`) VALUES
(1, '', 'like', 11, 0),
(2, '', 'like', 11, 0),
(3, '', 'like', 11, 0),
(4, '', 'like', 11, 0),
(5, '', 'like', 11, 0),
(6, '', 'like', 11, 0),
(7, '', 'like', 11, 0),
(8, '', 'like', 11, 0),
(9, '', 'like', 11, 0),
(10, '', 'like', 11, 0),
(11, '', 'like', 11, 0),
(12, '', 'like', 11, 0),
(13, '', 'like', 11, 0),
(14, '', 'like', 11, 0),
(15, '', 'like', 11, 0),
(16, '', 'like', 11, 0),
(17, '', 'like', 11, 0),
(18, '', 'like', 11, 0),
(19, '', 'like', 11, 0),
(20, '', 'like', 11, 0),
(21, '', 'like', 11, 0),
(22, '', 'like', 11, 0),
(23, '', 'like', 11, 0),
(24, '', 'like', 11, 0),
(25, '', 'like', 11, 0),
(26, '', 'like', 11, 0),
(27, '', 'like', 11, 0),
(28, '', 'like', 11, 0),
(29, '', 'like', 11, 0),
(30, '', 'like', 11, 0),
(31, '', 'like', 11, 0),
(32, '', 'like', 11, 0),
(33, '', 'like', 11, 0),
(34, '', 'like', 11, 0),
(35, '', 'like', 11, 0),
(36, '', 'like', 11, 0),
(37, '', 'like', 11, 0),
(38, '', 'like', 11, 0),
(67, 'https://www.googleapis.com/books/v1/volumes/Tjn3W5RKMBQC', 'like', 11, 0),
(42, 'https://www.googleapis.com/books/v1/volumes/3TJbAAAAQAAJ', 'like', 11, 0),
(48, 'https://www.googleapis.com/books/v1/volumes/iAWxMhooztMC', 'like', 11, 0),
(52, '67', 'like', 11, 0),
(53, '67', 'like', 11, 0),
(54, '67', 'like', 11, 0),
(55, '67', 'like', 11, 0),
(56, '67', 'like', 11, 0),
(57, '67', 'like', 11, 0);

-- --------------------------------------------------------

--
-- Structure de la table `yape_nbUsers`
--

CREATE TABLE IF NOT EXISTS `yape_nbUsers` (
  `id` int(11) NOT NULL,
  `number_` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `yape_nbUsers`
--

INSERT INTO `yape_nbUsers` (`id`, `number_`) VALUES
(1, 23);

-- --------------------------------------------------------

--
-- Structure de la table `yape_users`
--

CREATE TABLE IF NOT EXISTS `yape_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_` date NOT NULL,
  `local_profil` varchar(255) NOT NULL,
  `following` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `bio` text NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `yape_users`
--

INSERT INTO `yape_users` (`id`, `email`, `password`, `date_`, `local_profil`, `following`, `follower`, `bio`, `fname`, `lname`) VALUES
(11, 'jules', '0d78a4a11319458cc61682939dedbb31c009e2d4', '2017-01-31', '../images/thumbnails/16463437_1681221348843472_842783573747543248_o - Copie.png', 2, 1, 'I am the founder of Yape. Send me a message if you find anything that bother you. Here, I am the king!                                ', ' Jules', 'Eschbach'),
(28, 'jules.eschbach@icloud.com', '0d78a4a11319458cc61682939dedbb31c009e2d4', '2017-03-26', '../images/user.png', 0, 0, 'Hey! I am using Yape!', 'romain', 'eschbach');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article_site`
--
ALTER TABLE `article_site`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `currentId`
--
ALTER TABLE `currentId`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `markas_allBook`
--
ALTER TABLE `markas_allBook`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `markas_book`
--
ALTER TABLE `markas_book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `markas_follow`
--
ALTER TABLE `markas_follow`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `markas_photo`
--
ALTER TABLE `markas_photo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `markas_user`
--
ALTER TABLE `markas_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messagesPP`
--
ALTER TABLE `messagesPP`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `raspberry`
--
ALTER TABLE `raspberry`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sesl`
--
ALTER TABLE `sesl`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stationManag`
--
ALTER TABLE `stationManag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yape_bookday`
--
ALTER TABLE `yape_bookday`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yape_books`
--
ALTER TABLE `yape_books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yape_friend`
--
ALTER TABLE `yape_friend`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yape_likecomment`
--
ALTER TABLE `yape_likecomment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yape_nbUsers`
--
ALTER TABLE `yape_nbUsers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yape_users`
--
ALTER TABLE `yape_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article_site`
--
ALTER TABLE `article_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `currentId`
--
ALTER TABLE `currentId`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `markas_allBook`
--
ALTER TABLE `markas_allBook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT pour la table `markas_book`
--
ALTER TABLE `markas_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `markas_follow`
--
ALTER TABLE `markas_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `markas_photo`
--
ALTER TABLE `markas_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `markas_user`
--
ALTER TABLE `markas_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `messagesPP`
--
ALTER TABLE `messagesPP`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `raspberry`
--
ALTER TABLE `raspberry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sesl`
--
ALTER TABLE `sesl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `stationManag`
--
ALTER TABLE `stationManag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `yape_bookday`
--
ALTER TABLE `yape_bookday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `yape_books`
--
ALTER TABLE `yape_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `yape_friend`
--
ALTER TABLE `yape_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `yape_likecomment`
--
ALTER TABLE `yape_likecomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT pour la table `yape_nbUsers`
--
ALTER TABLE `yape_nbUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `yape_users`
--
ALTER TABLE `yape_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
