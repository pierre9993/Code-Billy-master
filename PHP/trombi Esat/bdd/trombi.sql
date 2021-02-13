-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Février 2021 à 15:22
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `trombi`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `nom_cat`) VALUES
(1, 'Compétences'),
(2, 'Expérience Professionelle'),
(4, 'Dîplomes'),
(8, 'Logiciel');

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE `contenus` (
  `id_contenu` int(11) NOT NULL,
  `nom_contenus` varchar(255) DEFAULT NULL,
  `description_contenus` text,
  `id_cat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenus`
--

INSERT INTO `contenus` (`id_contenu`, `nom_contenus`, `description_contenus`, `id_cat`, `id_user`) VALUES
(1, 'Developpement Front End', '- HTML/CSS/JavaScript', 1, 1),
(2, 'Developpement Back End', '- PHP/MySQL', 1, 1),
(3, 'EN 2020', 'J\'ai fait des choses', 2, 1),
(4, 'Front-End', 'html', 1, 6),
(5, 'Back-end', 'Mysql', 1, 6),
(6, 'Titre Professionnel', '10/2020 - 06/2021', 2, 6),
(7, 'Titre Professionnel', 'Développeur web\r\n', 4, 14);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'Eleve'),
(2, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `info`, `image`, `email`, `mdp`, `cv`, `id_role`) VALUES
(1, 'Boy', 'Billy', 'blablabla', 'https://picsum.photos/201', 'gdfgdg@gmail.com', '1234', 'a', 1),
(3, 'Caribou', 'Joshua', 'Plutot bg', 'https://picsum.photos/202', 'fdfdf@gmail.com', '1234', 'dfsfsdf', 2),
(4, 'B.', 'Esat', 'Formateur', 'https://picsum.photos/199', 'B.E@gmail.com', '1234', 'https://www.linkedin.com/feed/update/urn:li:activity:6759877308804292608/', 2),
(5, 'Dupont', 'Gab', 'dsfsfsdfsdfsf', 'https://picsum.photos/199', 'dg@gmail.com', '$2y$10$VoowqMmrh5fxJJtyxSP5feo6oB.wRj/0.Wk9UH/QJ/iKuBCwqb0zK', 'https://www.linkedin.com/feed/update/urn:li:activity:6759877308804292608/', 1),
(6, 'MORLE', 'Lucas', 'vgv', 'photos/MORLEimage.png', 'ml@gmail.com', '$2y$10$cCW23/POx9q1WPB/fhVceO335WgSANrnXv9kNZI6chd.6qXpCz0he', 'cv/MORLEcv.pdf', 2),
(10, 'ooolM', 'RpENOaa', 'hfgh', 'https://picsum.photos/199', 'ytr29277@aaza.com', '$2y$10$8b5paUWAjOAD6gNFWJdziuYXCdNwCj476yryNwe0zfBoix1yZp9te', 'gfdgdfg', 2),
(14, 'Marana', 'Piplo', 'dsf', 'photos/Maranaimage.jpg', 'mp@gmail.com', '$2y$10$vpn8cC0lEFyH.qB.0f3zvexu9KOUSKsxSVqnELyiLCPKwNUDKQcda', 'cv/Maranacv.pdf', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD PRIMARY KEY (`id_contenu`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `contenus`
--
ALTER TABLE `contenus`
  MODIFY `id_contenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD CONSTRAINT `contenus_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`),
  ADD CONSTRAINT `contenus_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
