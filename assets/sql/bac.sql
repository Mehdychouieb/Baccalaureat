-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 21 Novembre 2016 à 15:19
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Bac`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_video` int(11) NOT NULL,
  `categories_id_categorie` int(11) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `vignette` varchar(255) NOT NULL,
  `titre_video` varchar(255) NOT NULL,
  `desc_video` varchar(10000) NOT NULL,
  `categorie_video` varchar(255) NOT NULL,
  `date_video` date NOT NULL,
  `publier` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_video`, `categories_id_categorie`, `url_video`, `vignette`, `titre_video`, `desc_video`, `categorie_video`, `date_video`, `publier`) VALUES
(1, 0, 'ublchJYzhao', 'tafete.jpg', 'Stromae - Ta Fête', 'stromae - √ (racine carrée) http://po.st/RacineCiT<br> http://www.stromae.net<br> http://www.facebook.com/stromae<br>http://twitter.com/stromae.net ', '1 ', '2016-11-18', 'oui'),
(2, 0, 'oiKj0Z_Xnjc', 'papaouté.jpg', 'Stromae - Papoutai', 'papaoutai (official video / clip officiel)album √ (racine carrée) http://po.st/RacineCiT---http://www.stromae.nethttp://www.facebook.com/stromaehttp://twitter.com/stromaeCatégorie', '2', '2016-11-18', 'oui'),
(3, 0, 'fatfDUPiJ5U', 'batard.jpg', 'Stromae - Batârd ', 'stromae - √ (racine carrée) http://po.st/RacineCiT http://www.stromae.net http://www.facebook.com/stromae http://twitter.com/stromae.net ', '1 ', '2016-11-18', 'oui'),
(4, 0, '8kmzvE6su5I', 'ave.jpg', 'Stromae - Ave Cesaria', 'stromae - √ (racine carrée) http://po.st/RacineCiT http://www.stromae.net http://www.facebook.com/stromae http://twitter.com/stromae.net ', '1 ', '2016-11-18', 'oui'),
(5, 0, 'eOZLDQm9c2E', 'live.jpg', 'Stromae - Racine Carrée Live (Full Concert)', 'Stromae - √ Live. Racine Carrée Official Live Concert. Filmed at Montreal’s Bell Center in September 2015.Directed by Luc Junior Tam and Gautier & LeducDVD / Blu Ray http://www.smarturl.it/StromaeLive---------------------------------------------------------------------------------------------------------------Chapters :1 0:00:00 Intro2 0:03:45 Ta fête3 0:08:03 Bâtard4 0:11:39 Peace or violence5 0:16:22 Te quiero6 0:20:53 Tous les mêmes7 0:29:28 Ave cesaria8 0:37:56 Sommeil9 0:41:47 Quand c’est ?10 0:46:14 Je cours11 0:50:40 Moules frites12 0:58:09 Formidable13 1:04:50 Silence14 1:10:06 Carmen15 1:15:00 Humain à l’eau16 1:22:30 Alors on danse17 1:27:28 Papaoutai18 1:40:23 Merci19 1:50:45 Tous les mêmes - a capella', '3', '2016-11-19', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Nouveautes'),
(2, 'Interviews'),
(3, 'Concerts');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `motDePasse`, `role`, `avatar`) VALUES
(1, 'Test', 'Test', 'test@test', 'test', 'membre', ''),
(2, 'Paul', 'Van Haver', 'stromae@gmail.com', 'maestro', 'admin', 'ave.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_video`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;