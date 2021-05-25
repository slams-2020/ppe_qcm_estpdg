-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 déc. 2020 à 10:42
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qcm`
--
CREATE DATABASE IF NOT EXISTS `qcm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qcm`;

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `caption` varchar(42) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `idQuestion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `caption`, `score`, `idQuestion`) VALUES
(1, '50', 0, 1),
(2, '300', 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `dated` datetime DEFAULT NULL,
  `datef` datetime DEFAULT NULL,
  `status` varchar(42) DEFAULT NULL,
  `idGroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `examoption`
--

DROP TABLE IF EXISTS `examoption`;
CREATE TABLE `examoption` (
  `idExam` int(11) NOT NULL,
  `idOption` int(11) NOT NULL,
  `value` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(42) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`id`, `name`, `description`, `idUser`) VALUES
(1, '2 SIO SLAM', 'Les SLAMS', 1);

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `key` varchar(42) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE `qcm` (
  `id` int(11) NOT NULL,
  `name` varchar(42) DEFAULT NULL,
  `description` varchar(42) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `idExam` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`id`, `name`, `description`, `cdate`, `status`, `idExam`, `idUser`) VALUES
(1, 'QCM 1', 'QCM difficile', '2021-02-17 04:03:00', '', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `qcmquestion`
--

DROP TABLE IF EXISTS `qcmquestion`;
CREATE TABLE `qcmquestion` (
  `idQuestion` int(11) NOT NULL,
  `idQcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `qcmquestion`
--

INSERT INTO `qcmquestion` (`idQuestion`, `idQcm`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `caption` varchar(42) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `caption`, `points`, `idUser`, `idType`) VALUES
(1, 'Quelle est la hauteur de la tour Eiffel', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(42) DEFAULT NULL,
  `color` varchar(42) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `name`, `color`, `idUser`) VALUES
(1, 'sql', 'red', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeq`
--

DROP TABLE IF EXISTS `typeq`;
CREATE TABLE `typeq` (
  `id` int(11) NOT NULL,
  `caption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeq`
--

INSERT INTO `typeq` (`id`, `caption`) VALUES
(1, 'choix multiple'),
(2, 'ouverte');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(42) DEFAULT NULL,
  `password` varchar(42) DEFAULT NULL,
  `firstname` varchar(42) DEFAULT NULL,
  `lastname` varchar(42) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `firstname`, `lastname`, `email`) VALUES
(1, 'jcheron', '0000', 'jc', 'h', 'jc@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `useranswer`
--

DROP TABLE IF EXISTS `useranswer`;
CREATE TABLE `useranswer` (
  `idUser` int(11) NOT NULL,
  `idAnswer` int(11) NOT NULL,
  `idQcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `useranswer`
--

INSERT INTO `useranswer` (`idUser`, `idAnswer`, `idQcm`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE `usergroup` (
  `idGroup` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Index pour la table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGroup` (`idGroup`);

--
-- Index pour la table `examoption`
--
ALTER TABLE `examoption`
  ADD PRIMARY KEY (`idExam`,`idOption`),
  ADD KEY `idOption` (`idOption`);

--
-- Index pour la table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idExam` (`idExam`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `qcmquestion`
--
ALTER TABLE `qcmquestion`
  ADD PRIMARY KEY (`idQuestion`,`idQcm`),
  ADD KEY `idQcm` (`idQcm`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idType_Index` (`idType`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `typeq`
--
ALTER TABLE `typeq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `useranswer`
--
ALTER TABLE `useranswer`
  ADD PRIMARY KEY (`idUser`,`idAnswer`,`idQcm`),
  ADD KEY `idAnswer` (`idAnswer`),
  ADD KEY `idQcm` (`idQcm`);

--
-- Index pour la table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`idGroup`,`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `typeq`
--
ALTER TABLE `typeq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `group` (`id`);

--
-- Contraintes pour la table `examoption`
--
ALTER TABLE `examoption`
  ADD CONSTRAINT `examoption_ibfk_1` FOREIGN KEY (`idExam`) REFERENCES `exam` (`id`),
  ADD CONSTRAINT `examoption_ibfk_2` FOREIGN KEY (`idOption`) REFERENCES `option` (`id`);

--
-- Contraintes pour la table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `qcm_ibfk_1` FOREIGN KEY (`idExam`) REFERENCES `exam` (`id`),
  ADD CONSTRAINT `qcm_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `qcmquestion`
--
ALTER TABLE `qcmquestion`
  ADD CONSTRAINT `qcmquestion_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `qcmquestion_ibfk_2` FOREIGN KEY (`idQcm`) REFERENCES `qcm` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `typeq` (`id`);

--
-- Contraintes pour la table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `useranswer`
--
ALTER TABLE `useranswer`
  ADD CONSTRAINT `useranswer_ibfk_1` FOREIGN KEY (`idAnswer`) REFERENCES `answer` (`id`),
  ADD CONSTRAINT `useranswer_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `useranswer_ibfk_3` FOREIGN KEY (`idQcm`) REFERENCES `qcm` (`id`);

--
-- Contraintes pour la table `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `usergroup_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usergroup_ibfk_2` FOREIGN KEY (`idGroup`) REFERENCES `group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
