-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 août 2024 à 16:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_congee`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` text DEFAULT NULL,
  `prenom` text DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` text DEFAULT NULL,
  `sexe` text DEFAULT NULL,
  `situation_familiale` text DEFAULT NULL,
  `nombre_enfants` int(11) DEFAULT NULL,
  `cin` int(11) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `ville` text DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `departement` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `statut` text DEFAULT NULL,
  `salaire` int(11) DEFAULT NULL,
  `banque` text DEFAULT NULL,
  `type_compte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `sexe`, `situation_familiale`, `nombre_enfants`, `cin`, `telephone`, `adresse`, `ville`, `date_debut`, `departement`, `position`, `statut`, `salaire`, `banque`, `type_compte`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Amdouni', 'Nesrine', '1998-12-22', 'tunis', 'Femme', 'Célibataire', 0, 22222222, 22222222, 'bizerte', 'bizerte', '2024-08-01', 'Développement web', 'développeuse web	', 'développeuse web	', 2000, 'STB', 'admin'),
(2, 'employe@gmail.com', '202cb962ac59075b964b07152d234b70', 'Rezgui', 'Sarra', '1989-03-08', 'Tunis', 'Femme', 'Marié(e)', 3, 52453985, 52485962, 'Tunis', 'Tunis', '0003-02-20', 'Développement mobile', 'Développeur mobile', 'Développeur mobile', 1500, 'Zaitouna', 'employe'),
(3, 'rh@gmail.com', '202cb962ac59075b964b07152d234b70', 'Mahmoudi', 'Sabra', '1988-01-01', 'Tunis', 'Femme', 'Marié(e)', 2, 52528965, 52448162, 'Tunis', 'Tunis', '2023-02-02', 'Design Graphique', 'Désigneur Graphique', 'Désigneur Graphique', 3000, 'BH', 'rh'),
(4, 'mathlouthi.rahma@gmail.com', '202cb962ac59075b964b07152d234b70', 'Mathlouthi', 'Rahma', '1987-08-15', 'Sousse', 'Femme', 'Divorcé(e)', 2, 13658555, 23525148, 'Sousse', 'Sousse', '2024-08-20', 'Développement mobile', 'Développeuse mobile', 'Développeuse mobile', 2500, 'STB', 'employe'),
(6, 'benhsin.omar@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ben hsin', 'Omar', '1996-08-25', 'tunis', 'Homme', 'Célibataire', 0, 25425896, 22536988, 'tunis', 'tunis', '2022-02-01', 'Développement web', 'Développeur web', 'Développeur web', 2000, 'ATB', 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE `conge` (
  `id` int(11) NOT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `type_absence` text DEFAULT NULL,
  `nom` text DEFAULT NULL,
  `prenom` text DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `etat` text DEFAULT NULL,
  `type_compte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `conge`
--

INSERT INTO `conge` (`id`, `date_depart`, `date_retour`, `type_absence`, `nom`, `prenom`, `id_utilisateur`, `etat`, `type_compte`) VALUES
(11, '2024-08-20', '2024-08-22', 'Congé de formation', 'Mahmoudi', 'Sabra', 3, 'Congé accepté', 'rh'),
(13, '2024-08-20', '2024-08-21', 'Congé annuel', 'Rezgui ', 'Sarra', 2, 'Congé accepté', 'employe'),
(15, '2024-08-18', '2024-08-31', 'Congé de maladie', 'Rezgui', 'Sarra', 2, 'Congé accepté', 'employe'),
(16, '2024-06-12', '2024-06-29', 'Congé sans solde', 'Rezgui', 'Sarra', 2, 'Congé accepté', 'employe'),
(17, '2024-05-17', '2024-05-31', 'Congé de maternité', 'Rezgui', 'Sarra', 2, 'Congé accepté', 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `manager` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `nom`, `manager`, `email`, `telephone`) VALUES
(2, 'Développement mobile', 'Oussama Sfaxi', 'sfaxioussame@gmail.com', 24524965),
(3, 'Développement web', 'Lassad Mohammedi', 'mohammedilassad@gmail.com', 55478512),
(4, 'Design Graphique', 'Sahli Montassar', 'montassarsahli@gmail.com', 23512478),
(5, 'Ressources Humaines', 'Ahmed Ben Salah', 'bensalahahmed@gmail.com', 56325875),
(6, 'Test', 'Saber Ben Youssef', 'benyoussefsaber@gmail.com', 21521325);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `conge`
--
ALTER TABLE `conge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
