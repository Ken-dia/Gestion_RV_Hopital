-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 14 Octobre 2019 à 15:49
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.23-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `RV_hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `num_telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `num_telephone`, `email`, `id_service`) VALUES
(14, 'Dia', 'Hamidou', '784581242', 'diahamidou10@gmail.com', 1),
(15, 'Thiam', 'Fatou', '774581242', 'fatou@gmail.com', 15),
(22, 'dfghj', 'qsedrty', '784581242', 'qsdfg@Qdfr.com', 4),
(23, 'sdrty', 'sdrtyu', '774581242', 'qsdfg@Qdfr.com', 4);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `dateNaiss` date NOT NULL,
  `num_telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `nom`, `prenom`, `dateNaiss`, `num_telephone`, `email`) VALUES
(5, 'Loum', 'Fallou', '2000-05-06', '774580245', 'falou@gmail.com'),
(7, 'Pam', 'Issa', '1999-09-12', '778520320', 'issa@hotmail.com'),
(8, 'Wade', 'sidi', '1984-08-12', '776582051', 'sidy@hotmail.com'),
(9, 'Mbacke', 'Fallou', '1993-03-12', '774580242', 'fall@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id_RV` int(11) NOT NULL,
  `date_RV` date DEFAULT NULL,
  `heure_RV` varchar(20) DEFAULT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `id_secretaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_RV`, `date_RV`, `heure_RV`, `id_patient`, `id_medecin`, `id_secretaire`) VALUES
(1, '2019-10-18', '09:00', 5, 14, 1),
(2, '2019-10-18', '08:00', 7, 14, 1),
(3, '2019-10-15', '15:00', 7, 15, 8),
(16, '2019-11-15', '16:00', 5, 14, 1),
(18, '2019-10-29', '15:45', 5, 23, 9),
(19, '2019-10-25', '11:30', 5, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `id_secretaire` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `num_telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `secretaire`
--

INSERT INTO `secretaire` (`id_secretaire`, `nom`, `prenom`, `num_telephone`, `email`) VALUES
(1, 'Diouf', 'Fama', '774581240', 'fatou@gmail.com'),
(8, 'Diallo', 'Aissata', '775286296', 'dialloAiss@gmail.com'),
(9, 'Mboum', 'Moustapha', '788522566', 'moustapha@gmail.com'),
(10, 'Dione', 'Fama', '776582201', 'fadione@gmail.com'),
(11, 'Ba', 'Khadidiatou', '701234569', 'khadji@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `id_secretaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `nom`, `id_secretaire`) VALUES
(1, 'Cardiologie', 9),
(2, 'Neurologie', 1),
(4, 'Chirurgie', 10),
(15, 'Darmotologie', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `password_user` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `profil`, `password_user`) VALUES
(1, 'admin', '$1$cBfyGFJ.$UoOGAucLAR.iFM75VR9c/1'),
(2, 'medecin', '$1$0YJ7mAaj$N2k69ae83L6Jn5aWO5UAN1'),
(3, 'secretaire', '$1$Ov95OvzJ$eSkznnGykSaMH3Vm0/vno.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`),
  ADD UNIQUE KEY `num_telephone` (`num_telephone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id_RV`),
  ADD KEY `id_patient` (`id_patient`,`id_medecin`,`id_secretaire`),
  ADD KEY `id_secretaire` (`id_secretaire`),
  ADD KEY `id_medecin` (`id_medecin`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`id_secretaire`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id_specialite`),
  ADD UNIQUE KEY `id_secretaire_3` (`id_secretaire`),
  ADD KEY `id_secretaire` (`id_secretaire`),
  ADD KEY `id_secretaire_2` (`id_secretaire`),
  ADD KEY `id_secretaire_4` (`id_secretaire`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id_RV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `secretaire`
--
ALTER TABLE `secretaire`
  MODIFY `id_secretaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `specialite` (`id_specialite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`id_secretaire`) REFERENCES `secretaire` (`id_secretaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendez_vous_ibfk_3` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `specialite_ibfk_1` FOREIGN KEY (`id_secretaire`) REFERENCES `secretaire` (`id_secretaire`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
