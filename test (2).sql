-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Mars 2017 à 16:14
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `fonction`, `telephone`, `email`) VALUES
(8, 'Mohamed el', 'directeur generale', '0611804678', 'mas_h_13@hotmail.fr'),
(10, 'ibrahim', 'employÃ©', '+212611804677', 'mas_h_13@hotmail.fr'),
(11, 'bjkl', 'directeur generale', '+212611804677', 'bjkl@gmail.com'),
(12, 'bjkl', 'directeur generale', '+212611804677', 'bjkl@gmail.com'),
(13, 'hjkl', ',kl', '+212611804677', 'n@gmail.com'),
(14, 'ghjk', 'hjbkl', 'hjl', 'jj@gmail.com'),
(15, 'mohamed ', 'employÃ©', '0678987876', 'mas@gmail.com'),
(16, 'ahmed', 'directeur generale', '0611804678', 'mas_h_13@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom`) VALUES
(1, 'Informatique'),
(2, 'industriel');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `joining_date` date NOT NULL,
  `localisation` varchar(25) NOT NULL,
  `industrie` varchar(60) NOT NULL,
  `type` varchar(25) NOT NULL,
  `adresse` text NOT NULL,
  `description` text,
  `telephone` varchar(25) NOT NULL,
  `siteweb` varchar(200) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `valide` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `name`, `email`, `password`, `joining_date`, `localisation`, `industrie`, `type`, `adresse`, `description`, `telephone`, `siteweb`, `logo`, `valide`) VALUES
(18, 'Centrale', 'mas_h_13@hotmail.fr', '$2y$11$bNelVv.WrBr2Vycr/AlyyeoOyAFNjWZYrZ/5tgKClBm8VvxqfQmnW', '2017-03-15', 'Rabat', 'Informatique', 'PrivÃ©e', 'hay moulay ismail', 'hjhihji', '+212611804677', 'facebook.com', 'uploads/logo/69/3322981237_7e723b609e.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `google_id` decimal(21,0) NOT NULL,
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `pays` varchar(60) NOT NULL,
  `adresse` text NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `lm` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`google_id`, `google_name`, `google_email`, `google_picture_link`, `ville`, `pays`, `adresse`, `date_naissance`, `telephone`, `cv`, `lm`) VALUES
('110182453052811117384', 'HATIM SETTI', 'h.setti@mundiapolis.ma', 'https://lh4.googleusercontent.com/-qweJX_JYHSw/AAAAAAAAAAI/AAAAAAAAACk/KoF5FuTHh1E/photo.jpg', 'Rabat', 'Maroc', '17 secteur 1 hay moulay ismail', '2017-03-05', '+212611804677', 'uploads/cv/110182453052811117384_00/rapport.docx', 'uploads/lm/110182453052811117384_00/rapport.docx');

-- --------------------------------------------------------

--
-- Structure de la table `offre_stage`
--

CREATE TABLE `offre_stage` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `nbr_poste` int(11) NOT NULL,
  `remuneration` varchar(60) NOT NULL,
  `localisation` varchar(60) NOT NULL,
  `industrie` varchar(60) NOT NULL,
  `demarrage` date NOT NULL,
  `date_publication` datetime NOT NULL,
  `duree` varchar(60) NOT NULL,
  `profil` text NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offre_stage`
--

INSERT INTO `offre_stage` (`id`, `title`, `description`, `nbr_poste`, `remuneration`, `localisation`, `industrie`, `demarrage`, `date_publication`, `duree`, `profil`, `valide`, `id_entreprise`, `id_contact`) VALUES
(9, 'Java developer', 'bonsoir,nous recrutons un profil', 3, 'de 1000DH Ã  1500dh', 'Casablanca', 'Unspecified', '2017-02-17', '2017-02-26 07:02:07', 'de 3 Ã  6 mois', 'etudiant bac+3', 1, 18, 8),
(11, 'php developer', 'bonsoir,nous recrutons un profil', 2, 'de 1000DH Ã  1500dh', 'Casablanca', 'Unspecified', '2017-02-26', '2017-02-26 07:02:59', 'de 3 Ã  6 mois', 'etudiant bac+3', 1, 18, 8),
(12, 'Ruby developer', 'bonsoir,nous recrutons un profil', 3, 'Non', 'Casablanca', 'Pools', '2017-02-28', '2017-03-05 05:03:25', 'de 3 Ã  6 mois', 'etudiant bac+3', 1, 18, 8),
(13, 'html css', 'bonsoir,nous recrutons un profil', 1, '', 'Casablanca', 'Unspecified', '2017-04-15', '2017-03-05 06:03:13', 'de 3 Ã  6 mois', 'etudiant bac+3', 1, 18, 8);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'Maroc'),
(2, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `postule`
--

CREATE TABLE `postule` (
  `id_utilisateur` decimal(21,0) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `message` text NOT NULL,
  `nv_cv` varchar(200) DEFAULT NULL,
  `nv_lm` varchar(200) DEFAULT NULL,
  `date_postulation` datetime NOT NULL,
  `valide_postule` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `postule`
--

INSERT INTO `postule` (`id_utilisateur`, `id_offre`, `message`, `nv_cv`, `nv_lm`, `date_postulation`, `valide_postule`) VALUES
('110182453052811117384', 12, 'kk', 'uploads/cv/110182453052811117384_12/authentification.docx', 'uploads/lm/110182453052811117384_12/authentification.docx', '2017-03-05 00:00:00', '0'),
('110182453052811117384', 13, 'uu', 'uploads/cv/110182453052811117384_13/authentification.docx', 'uploads/lm/110182453052811117384_13/authentification.docx', '2017-03-05 06:03:17', '0');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `numero_telephone` varchar(20) NOT NULL,
  `valide` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id`, `name`, `email`, `numero_telephone`, `valide`) VALUES
(3, 'AYOUB LACHHAB', 'a.lachhab@mundiapolis.ma', '06166357567', 1);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `code_profil` int(11) NOT NULL,
  `nom_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profil` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id`, `nom`) VALUES
(1, 'Rabat'),
(2, 'Casablanca');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`google_id`);

--
-- Index pour la table `offre_stage`
--
ALTER TABLE `offre_stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entreprise` (`id_entreprise`),
  ADD KEY `id_contact` (`id_contact`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `postule`
--
ALTER TABLE `postule`
  ADD PRIMARY KEY (`id_utilisateur`,`id_offre`),
  ADD KEY `postule_ibfk_1` (`id_offre`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`code_profil`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil` (`profil`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `offre_stage`
--
ALTER TABLE `offre_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `code_profil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `postule`
--
ALTER TABLE `postule`
  ADD CONSTRAINT `postule_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `etudiant` (`google_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postule_ibfk_2` FOREIGN KEY (`id_offre`) REFERENCES `offre_stage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
