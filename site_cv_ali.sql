-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Juillet 2017 à 16:03
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_cv_ali`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id_competences` int(11) NOT NULL,
  `competence` varchar(45) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'competence',
  `niveau` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id_competences`, `competence`, `Type`, `niveau`, `utilisateur_id`) VALUES
(219, 'HTML/CSS', 'Competence', 70, 1),
(228, 'jQuery', 'Competence', 70, 1),
(230, 'Angular 2+', 'Competence', 35, 1),
(231, 'WordPress', 'Front', 30, 1),
(232, 'Ajax', 'Back', 55, 1),
(233, 'PHP 7', 'Back', 75, 1),
(234, 'Algorithmes', 'Autre', 50, 1),
(235, 'C/C++', 'Autre', 40, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `pseudo_contact` varchar(255) NOT NULL,
  `email_contact` varchar(255) NOT NULL,
  `telephone_contact` varchar(255) NOT NULL,
  `sujet_contact` varchar(255) NOT NULL,
  `texte_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `pseudo_contact`, `email_contact`, `telephone_contact`, `sujet_contact`, `texte_contact`) VALUES
(3, 'rtegrzfe', 'ali.nizamuddin@lepoles.com', '069539935', 'Démission', 'grngdgrsdgrss'),
(4, 'mdnR', 'ali.nizamuddin@lepoles.com', '069539935', 'Démission', 'Je veux m''en aller de chez lePoles'),
(5, 'spam', 'stevy.makouezi@lepoles.com', '0695399935', 'spam', 'Spamspamspamsaps'),
(6, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'ujgyfhtgrzqzdqzdqzdqzdqzdqzdqzdqzdqzd'),
(7, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'grzqzdqzdqzdqzdqzdqzdqzdqzdqzd'),
(8, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'grzqzdqzdqzdqzdqzdqzdqzdqzdqzdee'),
(9, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'grzqzdqzdqzdqzdqzdqzdqzdqzdqzdee'),
(10, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'khj,hfgtdfrsdfjhgfdsqfshjgfdsqfshjgdf'),
(11, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(12, 'Ali', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', '123456789123456789123456789123'),
(13, 'rtegrzfe', 'ali.nizamuddin@lepoles.com', '0695399935', 'Démission', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id_experiences` int(11) NOT NULL,
  `titre_e` varchar(45) NOT NULL,
  `sous_titre_e` varchar(45) DEFAULT NULL,
  `dates_e` varchar(45) NOT NULL,
  `description_e` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id_experiences`, `titre_e`, `sous_titre_e`, `dates_e`, `description_e`, `utilisateur_id`) VALUES
(1, 'Réceptionniste ', 'Réception de nuit', '09/03/2017', 'Accueil des clients, préparation du buffet.', 1),
(2, 'Développeur web', 'Développement et intégration Web', '17/11/2017', 'Développeur web junior chez LePoleS ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formations` int(11) NOT NULL,
  `titre_f` varchar(45) NOT NULL,
  `sous_titre_f` varchar(45) DEFAULT NULL,
  `dates_f` varchar(45) NOT NULL,
  `description_f` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id_formations`, `titre_f`, `sous_titre_f`, `dates_f`, `description_f`, `utilisateur_id`) VALUES
(28, 'Lycée Général', 'Série Scientifique', '07/07/2014', 'Option ISN', 1),
(29, 'Webforce3', 'Certification Intégrateur/Développeur Web', '20/06/2017', 'Méthodes et langages du web (Front-End et Back-End)', 1);

-- --------------------------------------------------------

--
-- Structure de la table `intertitres`
--

CREATE TABLE `intertitres` (
  `id_intertitres` int(11) NOT NULL,
  `intertitre_1` varchar(45) NOT NULL,
  `intertitre_2` varchar(45) NOT NULL,
  `intertitre_3` varchar(45) DEFAULT NULL,
  `intertitre_4` varchar(45) DEFAULT NULL,
  `intertitre_5` varchar(45) DEFAULT NULL,
  `intertitre_6` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intertitres`
--

INSERT INTO `intertitres` (`id_intertitres`, `intertitre_1`, `intertitre_2`, `intertitre_3`, `intertitre_4`, `intertitre_5`, `intertitre_6`, `utilisateur_id`) VALUES
(1, 'Intertitre 1', 'Intertitre 2', 'Intertitre 3', 'Intertitre 4', 'Intertitre 5', 'Intertitre 6', 1),
(2, 'Intertitre 1', 'Intertitre 2', 'Intertitre 3', 'Intertitre 4', 'Intertitre 5', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

CREATE TABLE `loisirs` (
  `id_loisirs` int(11) NOT NULL,
  `loisir` varchar(45) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loisirs`
--

INSERT INTO `loisirs` (`id_loisirs`, `loisir`, `utilisateur_id`) VALUES
(1, 'Pokemon', 1),
(2, 'Re-lecture de lectures précédentes', 1),
(3, 'Lectures simultanées', 1),
(4, 'Analyses de lectures', 1),
(5, 'Déconstruction de lectures', 1),
(6, 'Méta-lecture', 1),
(39, 'gfd', 1),
(40, 'Ajout', 1),
(41, 'ajouter', 1),
(42, 'testas', 1),
(43, 'eeeee', 1),
(44, 'ttt', 1),
(45, 'dsdf', 1),
(46, 'ddddd', 1),
(47, 'ddddd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

CREATE TABLE `realisations` (
  `id_realisations` int(11) NOT NULL,
  `titre_r` varchar(45) NOT NULL,
  `sous_titre_r` varchar(45) DEFAULT NULL,
  `dates_r` varchar(45) NOT NULL,
  `description_r` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `realisations`
--

INSERT INTO `realisations` (`id_realisations`, `titre_r`, `sous_titre_r`, `dates_r`, `description_r`, `utilisateur_id`) VALUES
(1, 'Site CV', 'Le site que vous êtes en train de consulter', '03/07/2017', 'Réalisation d''un site vitrine pour me faire de la pub', 1),
(2, 'Agir pour réussir', 'Projet Wordpress', '24/07/2017', 'Réalisation d''un site Wordpress pour l''association Pontoise "Agir pour réussir" en compagnie de 2 collègues ponctuels et assidus.', 1),
(3, 'Association OPIRC', 'A la poursuite de la connaissance', '15/06/2017', 'Réalisation en cours du site de notre association. Ca avance pas tellement.', 1),
(5, 'swcwswscwqsdqsdqsfdqs', 'fhh', 'hg', 'ffghfh', 1),
(6, 'test', 'test', 'test', 'test', 1),
(7, 'qf', 'sdfgs', 'sdgsd', 'sdgsdg', 1),
(8, 'fff', 'ggg', 'ezezee', 'kkkk', 1),
(9, 'titre', 'soustitre', 'dates', 'description', 1),
(10, 'titre', 'soustitre', 'dates', 'description', 1),
(11, 'titras', 'soustitras', 'datas', 'descriptionas', 1),
(12, 'eee', 'dddd', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `titres_cv`
--

CREATE TABLE `titres_cv` (
  `id_titres_cv` int(11) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `titres_cv`
--

INSERT INTO `titres_cv` (`id_titres_cv`, `titre_cv`, `accroche`, `logo`, `utilisateur_id`) VALUES
(1, 'Développeur web full-stack', 'Intégrateur et Développeur web en recherche de stage', 'reseau_internet_monidal.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `statut` int(11) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mdp` varchar(13) NOT NULL,
  `pseudo` varchar(13) NOT NULL,
  `lien_avatar` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('Femme','Homme','Autre') NOT NULL,
  `etat_civil` enum('M.','Mme','Autre') NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`statut`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `lien_avatar`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `utilisateur_id`) VALUES
(1, 'Ali', 'MD Nizamuddin', 'nizamuddin.r.ali@gmail.com', '0695399935', 'mdp01', 'mdnR', '10852636_1512370885713561_966194995_n.jpg', '1996-07-12', 'Homme', 'M.', '16 rue Alcide d''Orbigny', 93380, 'Pierrefitte-Sur-Seine', 'France', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id_competences`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id_experiences`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formations`);

--
-- Index pour la table `intertitres`
--
ALTER TABLE `intertitres`
  ADD PRIMARY KEY (`id_intertitres`);

--
-- Index pour la table `loisirs`
--
ALTER TABLE `loisirs`
  ADD PRIMARY KEY (`id_loisirs`);

--
-- Index pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD PRIMARY KEY (`id_realisations`);

--
-- Index pour la table `titres_cv`
--
ALTER TABLE `titres_cv`
  ADD PRIMARY KEY (`id_titres_cv`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id_competences` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id_experiences` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `intertitres`
--
ALTER TABLE `intertitres`
  MODIFY `id_intertitres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `loisirs`
--
ALTER TABLE `loisirs`
  MODIFY `id_loisirs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `realisations`
--
ALTER TABLE `realisations`
  MODIFY `id_realisations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `titres_cv`
--
ALTER TABLE `titres_cv`
  MODIFY `id_titres_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
