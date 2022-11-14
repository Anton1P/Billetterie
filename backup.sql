-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 31 mai 2022 à 17:02
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db-paredant`
--

-- --------------------------------------------------------

--
-- Structure de la table `sae203_event`
--

CREATE TABLE `sae203_event` (
  `id_event` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `date1` date NOT NULL,
  `places_max` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sae203_event`
--

INSERT INTO `sae203_event` (`id_event`, `titre`, `date1`, `places_max`) VALUES
(1, 'event 1', '2023-02-21', 100),
(2, 'event 2', '2023-02-22', 200);

-- --------------------------------------------------------

--
-- Structure de la table `sae203_reserve`
--

CREATE TABLE `sae203_reserve` (
  `id_reserve` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `places` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sae203_reserve`
--

INSERT INTO `sae203_reserve` (`id_reserve`, `id_user`, `id_event`, `places`) VALUES
(39, 3, 2, 20),
(41, 3, 2, 20),
(42, 4, 2, 20),
(43, 4, 2, 1),
(44, 4, 1, 20),
(45, 3, 2, 20),
(46, 4, 1, 20),
(47, 4, 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `sae203_user`
--

CREATE TABLE `sae203_user` (
  `id_user` int(11) NOT NULL,
  `civ` varchar(3) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sae203_user`
--

INSERT INTO `sae203_user` (`id_user`, `civ`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(3, 'M', 'Admin', 'admin', 'admin@zer', 'zerzerzer'),
(4, 'M', 'zer', 'zer', 'zer@zer', 'zerzerzer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sae203_event`
--
ALTER TABLE `sae203_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `sae203_reserve`
--
ALTER TABLE `sae203_reserve`
  ADD PRIMARY KEY (`id_reserve`),
  ADD KEY `id_user` (`id_user`,`id_event`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `sae203_user`
--
ALTER TABLE `sae203_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sae203_event`
--
ALTER TABLE `sae203_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sae203_reserve`
--
ALTER TABLE `sae203_reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `sae203_user`
--
ALTER TABLE `sae203_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sae203_reserve`
--
ALTER TABLE `sae203_reserve`
  ADD CONSTRAINT `sae203_reserve_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `sae203_event` (`id_event`),
  ADD CONSTRAINT `sae203_reserve_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `sae203_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
