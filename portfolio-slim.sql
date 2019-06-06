-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 06 juin 2019 à 11:55
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `portfolio-slim`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `data1` int(11) NOT NULL,
  `data2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `data1`, `data2`) VALUES
(1, 2017, 'The HTML legends'),
(2, 2018, 'Born to code'),
(3, 2019, 'The PHP brigade'),
(4, 2020, 'CSS savages'),
(5, 2021, 'WebGL magicians'),
(6, 2022, 'The JavaScript experts');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `content`) VALUES
(1, 'Warpcore audio', 'Design of a music producer\'s website'),
(2, 'Théâtres Parisiens Associés', 'Design of a mobile application'),
(3, 'So\'HETIC', 'Designer for the student association of my school'),
(4, 'Modalisa', 'Product design for a wordpress website');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `explainations` text NOT NULL,
  `link` text NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `project`, `explainations`, `link`, `thumbnail`) VALUES
(1, 'So\'HETIC', 'Poster collection for the student association', 'https://www.behance.net/gallery/76615467/SoHETIC-Poster-Collection-for-a-student-association', 'https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/e9341b76615467.5c6fc28f320e2.png'),
(2, 'Théâtres Parisiens Associés', 'Freelance : Mobile application design for a booking theater website.', 'https://www.behance.net/gallery/76821669/Thatres-Parisiens-Associs-Mobile-UI', 'https://mir-s3-cdn-cf.behance.net/projects/404/0e5f2176821669.Y3JvcCwxNjE2LDEyNjQsMCww.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(0, 'admin', '$2y$10$9JgyKj31c3p593TSzBAbkOuPNCtbeSTpboX/qhh21xgUz84d6hU5y');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
