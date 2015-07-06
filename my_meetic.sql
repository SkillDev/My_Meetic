-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 01 Février 2015 à 22:54
-- Version du serveur :  5.5.33-MariaDB
-- Version de PHP :  5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `my_meetic`
--
CREATE DATABASE IF NOT EXISTS `my_meetic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `my_meetic`;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_personne`
--

CREATE TABLE IF NOT EXISTS `fiche_personne` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sexe` int(5) NOT NULL,
  `age` varchar(11) NOT NULL,
  `activation` tinyint(1) NOT NULL,
  `token` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fiche_personne`
--

INSERT INTO `fiche_personne` (`id_user`, `username`, `prenom`, `nom`, `email`, `password`, `sexe`, `age`, `activation`, `token`, `pays`, `departement`, `ville`, `cp`) VALUES
(69, 'anton_m', 'mike', 'anton', 'mikebg@hotmail.fr', '1496aa696d9d35aa2c23b0f1ef3020df7f26f869', 3, '1995/07/24', 1, 1863448852, 'France', '75', 'Paris', 7700),
(70, 'Jenny_75', 'Jenny', 'Looop', 'Jenny@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '1980-02-21', 1, 1704498530, 'France', '75', 'Paris', 70),
(71, 'Nicki_Minaj', 'Nicki', 'Minaj', 'mike77@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '1990-02-14', 1, 1549744367, 'France', '77', 'Lieusaint', 77270),
(72, 'gs009', 'Alhan', 'Bosca', 'boscalhan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '1995-07-17', 1, 296898293, 'France', '92', 'Asniere', 92600),
(74, 'Coco_chonne', 'Alexia', 'Metra', 'Bdb@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '1985-02-14', 1, 1236887129, 'France', '93', 'BOIS DE BOULOGNE', 77250),
(76, 'maicmelan', 'mike', 'anton', 'mike7@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '1990-02-14', 1, 2049517063, 'France', 'seine-et-marne', 'Villeparisis', 77270),
(88, 'Lesbii77', 'Julie', 'Creme', 'jujulabii@yopmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '1987/07/07', 1, 140504729, 'France', 'seine-et-marne', 'Melun', 77250),
(95, 'mike', 'Hugo', 'Boss', 'hugoboss@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '1995-07-24', 1, 762689114, 'kjuy', '93', 'bondy', 88888),
(124, 'Homo_du_93', 'Jaque', 'Michel', 'michel@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, '1995-04-05', 1, 1780607595, 'france', '93', 'Saint-Denis', 93066),
(125, 'Brayan_Rs5', 'Brayan', 'Oduro', 'oduro_b@epitech.eu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '1995-07-24', 1, 1133895046, 'France', 'seine-et-marne', 'Val 2', 77277),
(126, 'Mami_en_Forme', 'Nani', 'NANA', 'mami_enForme@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '1940-07-29', 1, 1564033412, 'France', 'Pas-de-Calais', 'Calais', 62012),
(127, 'Miss_milf', 'Claudia', 'Claude', 'miss_milf@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '1977-02-12', 1, 553712251, 'France', 'seine-et-marne', 'Marne-la-valle', 77350),
(128, 'Lea77580', 'Lea', 'Gomes', 'lea77@yopmail.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '1995-07-21', 1, 408507999, 'France', 'seine-et-marne', 'Messy', 77240);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_sender`, `id_receiver`, `date`, `time`, `message`) VALUES
(14, 69, 88, '2015-02-01', '12:22:49', 'coucou'),
(15, 69, 88, '2015-02-01', '12:23:01', 'sava ?'),
(16, 69, 88, '2015-02-01', '12:23:57', 'yo'),
(17, 69, 88, '2015-02-01', '12:24:14', 'yo'),
(18, 69, 88, '2015-02-01', '12:25:56', 'oui et toi ?'),
(31, 69, 70, '2015-02-01', '13:13:48', 'salut'),
(32, 69, 70, '2015-02-01', '13:14:02', 'salut'),
(33, 69, 71, '2015-02-01', '13:15:36', 'salut'),
(34, 69, 88, '2015-02-01', '13:57:10', 'coucou'),
(35, 88, 69, '2015-02-01', '13:58:02', 'salut'),
(36, 88, 69, '2015-02-01', '13:59:48', 'tu va bien ?'),
(37, 69, 88, '2015-02-01', '14:01:27', 'sava :)'),
(38, 69, 88, '2015-02-01', '14:12:44', 'yeah'),
(39, 69, 88, '2015-02-01', '14:13:13', 'tu habite ou ?'),
(40, 88, 69, '2015-02-01', '14:13:50', 'A villeparisis et toi ?'),
(41, 69, 71, '2015-02-01', '14:17:07', 'tu va bien ?'),
(42, 71, 69, '2015-02-01', '14:17:47', 'oui sava ;)'),
(43, 69, 71, '2015-02-01', '14:38:28', 'tu hablite ou ?'),
(44, 71, 69, '2015-02-01', '14:38:52', 'ta bouche !!!'),
(45, 69, 72, '2015-02-01', '14:45:22', 'Wsh gro tu fait quoi ici ?'),
(46, 72, 69, '2015-02-01', '14:46:27', 'Jsui venu pécho gro mais c la crise ya pas grand monde :('),
(47, 69, 88, '2015-02-01', '15:48:19', 'Ah cool !!!'),
(49, 69, 71, '2015-02-01', '16:11:14', 'Hey'),
(50, 69, 71, '2015-02-01', '16:15:06', 'yoooo'),
(51, 76, 69, '2015-02-01', '16:22:12', 'yooo'),
(52, 76, 69, '2015-02-01', '16:25:40', 'bien ou quoi ?'),
(53, 71, 76, '2015-02-01', '16:26:18', 'Salut bg :p'),
(54, 69, 76, '2015-02-01', '16:27:49', 'wsh comment sa sfait ta le meme blaz que moi ?'),
(55, 71, 74, '2015-02-01', '16:58:51', 'COUCOUOUU'),
(56, 125, 76, '2015-02-01', '17:12:04', 'wsh ta trouver dla GO ???'),
(57, 125, 88, '2015-02-01', '17:15:18', 'yo'),
(58, 125, 88, '2015-02-01', '17:18:09', 'yo'),
(59, 125, 88, '2015-02-01', '17:18:18', 'tu va bien ?'),
(60, 125, 88, '2015-02-01', '17:18:25', 'oui sava'),
(61, 125, 0, '2015-02-01', '17:20:50', 'yo'),
(62, 125, 0, '2015-02-01', '17:21:15', 'yo'),
(63, 125, 0, '2015-02-01', '17:21:24', 'coucou'),
(64, 69, 0, '2015-02-01', '17:22:05', 'sa?'),
(65, 69, 88, '2015-02-01', '17:22:27', 'yo'),
(66, 69, 88, '2015-02-01', '17:23:17', 'cc'),
(67, 69, 69, '2015-02-01', '17:24:17', 'bien ?'),
(68, 69, 69, '2015-02-01', '17:24:27', 'bien ?'),
(69, 69, 76, '2015-02-01', '17:24:46', 'mdr répond la !!'),
(70, 69, 76, '2015-02-01', '17:24:56', 'mdr répond la !!'),
(71, 69, 69, '2015-02-01', '17:27:29', 'oui'),
(72, 69, 125, '2015-02-01', '17:31:40', 'wesh'),
(73, 69, 75, '2015-02-01', '17:32:04', 'repond !!!'),
(74, 69, 75, '2015-02-01', '17:33:21', 'cc'),
(75, 69, 76, '2015-02-01', '17:33:31', 'mdrr'),
(76, 69, 72, '2015-02-01', '17:35:56', 'ta vu c un nouveau site c\\''est pour ca !'),
(77, 69, 125, '2015-02-01', '18:56:11', 'wsh'),
(78, 125, 69, '2015-02-01', '18:56:39', 'BIen ou quoi ?'),
(79, 69, 127, '2015-02-01', '20:53:53', 'Coucou la milf :P'),
(80, 127, 69, '2015-02-01', '20:54:46', 'Coucou toi :)'),
(84, 69, 72, '2015-02-01', '21:44:28', 'izi'),
(87, 69, 125, '2015-02-01', '22:51:21', 'trkl et toi ?');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `fiche_personne`
--
ALTER TABLE `fiche_personne`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fiche_personne`
--
ALTER TABLE `fiche_personne`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
