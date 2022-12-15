-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 20 Juin 2016 à 08:54
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `GLV`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `cartebancaire`
--

CREATE TABLE `cartebancaire` (
  `id_carte` int(3) NOT NULL,
  `date_expiration` varchar(20) NOT NULL,
  `Nom_carte` varchar(20) NOT NULL,
  `num_carte` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cartebancaire`
--

INSERT INTO `cartebancaire` (`id_carte`, `date_expiration`, `Nom_carte`, `num_carte`) VALUES
(4, '23/23', 'dfsf', 434554),
(6, '04/13', 'Diners Club', 235543),
(7, '09/34', 'American Express', 2222222),
(13, '09/09', 'Card Visa', 23455),
(15, '12/12', 'Card Visa', 232323),
(89, '12/22', 'American Express', 23),
(90, '12/22', 'American Express', 23);

-- --------------------------------------------------------

--
-- Structure de la table `cheque`
--

CREATE TABLE `cheque` (
  `id_cheque` int(3) NOT NULL,
  `numer_cheque` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cheque`
--

INSERT INTO `cheque` (`id_cheque`, `numer_cheque`) VALUES

(98, 2345),
(99, 2345),
(10, 23232),
(6, 34556),
(5, 43432),
(3, 234234),
(2, 12343554),
(1, 234567899);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_cl` int(3) NOT NULL,
  `nom` char(10) NOT NULL,
  `prenom` char(10) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_cl`, `nom`, `prenom`, `adresse`, `cin`, `phone`, `password`) VALUES
(19, 'anass', 'khoya', 'blad l3arbe rue de rincon', 'LB181818', 93423434, '101010'),
(40, 'harrak', 'mohaed', 'tihron et sakniya', 'LB3434', 23456, '1010'),
(41, 'hmed', 'reda', 'rue de larache', 'LG2323', 9, '202020');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) NOT NULL,
  `nom` varchar(8) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `phone`, `message`) VALUES
(1, 'mohamed', 'revol@revol.fr', 623454556, 'salut je besion reserver le voiture de type BMW'),
(2, 'Rachi', 'rachi@rachi.com', 678344589, 'votre site web il bien travaille'),
(3, 'hamid', 'hamid@hamid.com', 987653456, 'je suis hamid voila mon nume de tele'),
(5, 'reda', 'reda@reda.com', 612233445, 'hey broder how are you');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `id_cl` int(11) NOT NULL,
  `id_v` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `H_debut` time NOT NULL,
  `H_fin` time NOT NULL,
  `km_debut` int(11) NOT NULL,
  `km_fin` int(11) NOT NULL,
  `dist_parc` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emprunter`
--

INSERT INTO `emprunter` (`id_cl`, `id_v`, `date_debut`, `date_fin`, `H_debut`, `H_fin`, `km_debut`, `km_fin`, `dist_parc`) VALUES
(40, 4, '2016-06-14 00:00:00', '2016-06-17 00:00:00', '03:08:15', '08:09:15', 23, 23, 23),
(19, 2, '2016-06-09 00:00:00', '2016-06-21 00:00:00', '12:12:00', '03:03:00', 67, 76, 98);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_f` int(3) NOT NULL,
  `id_cl` int(20) NOT NULL,
  `id_v` int(20) NOT NULL,
  `id_g` int(20) NOT NULL,
  `id_cheque` int(20) NOT NULL,
  `id_carte` int(20) NOT NULL,
  `date_f` varchar(20) NOT NULL,
  `sous_total` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `tva` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id_f`, `id_cl`, `id_v`, `id_g`, `id_cheque`, `id_carte`, `date_f`, `sous_total`, `total`, `tva`) VALUES
(1, 19, 2, 3, 3, 6, '2016-06-08', 123, 23, 15),
(2, 40, 2, 3, 6, 22, '2016-06-13', 23, 22, 20),
(3, 19, 3, 2, 25, 22, '2016-06-13', 230, 202, 200),
(4, 19, 2, 7, 98, 89, '20-06-2016', 230, 202, 200),
(5, 19, 2, 7, 98, 89, '20-06-2016', 230, 202, 200);

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

CREATE TABLE `garage` (
  `id_g` int(20) NOT NULL,
  `nomgar` varchar(20) NOT NULL,
  `adressegar` varchar(50) NOT NULL,
  `villegar` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `garage`
--

INSERT INTO `garage` (`id_g`, `nomgar`, `adressegar`, `villegar`) VALUES
(1, 'Kenitra-location', 'rude de kenitra', 'Kenitra'),
(2, 'Casa-location', 'rude de Casa', 'Casa'),
(3, 'Rebat-location', 'rue agdale ', 'Rebat'),
(4, 'Tetouan-location', 'rue de mhanech', 'Rebat'),
(5, 'Tanger-location', 'rue de malabata', 'Tanger'),
(6, 'Martile-location', 'rue de miramar', 'Martile'),
(7, 'Ksar-location', 'rue de ksar city', 'Ksar EL Kebir'),
(9, 'Larache-location', 'massira for life', 'Larache');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_v` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `puissance` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `prix` varchar(20) NOT NULL,
  `nomGar` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id_v`, `image`, `marque`, `modele`, `numero`, `puissance`, `type`, `prix`, `nomGar`) VALUES
(1, 'assets/PRODUIT/prod1.jpg', '   VW Golf ouy semblable', '2015', '456', '345', 'new', '138.99', 'Kenitra-location'),
(2, 'assets/PRODUIT/prod8.png', 'Hyundai Solus Genesi', '2014', '234', '29', 'new', '199.23', 'Casa-location'),
(3, 'assets/PRODUIT/prod13.jpg', 'La Fiat 500L du pape', '2016', '23', '45 km/h', 'nouveau', '172.99', 'Casa-location'),
(4, 'assets/PRODUIT/prod12.png', '  Suzuki Vitara TCSS', '2016', '454', '45 km/h', 'essais', '219.40', 'Kenitra-location'),
(6, 'assets/PRODUIT/prod6.png', ' Merrsediss', '2015', '23', '340', 'essais', '239.99', 'Martile-location');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `cartebancaire`
--
ALTER TABLE `cartebancaire`
  ADD PRIMARY KEY (`id_carte`),
  ADD KEY `id_carte` (`id_carte`);

--
-- Index pour la table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id_cheque`),
  ADD KEY `numer_cheque` (`numer_cheque`),
  ADD KEY `id_cheque` (`id_cheque`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_cl`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `id_v` (`id_v`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `id_v` (`id_v`),
  ADD KEY `id_g` (`id_g`),
  ADD KEY `num_cheque` (`id_cheque`),
  ADD KEY `num_carte` (`id_carte`);

--
-- Index pour la table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id_g`),
  ADD KEY `nomgar` (`nomgar`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_v`),
  ADD KEY `nomGar` (`nomGar`),
  ADD KEY `id_v` (`id_v`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cartebancaire`
--
ALTER TABLE `cartebancaire`
  MODIFY `id_carte` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT pour la table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id_cheque` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_cl` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_f` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `garage`
--
ALTER TABLE `garage`
  MODIFY `id_g` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_v` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`id_v`) REFERENCES `vehicule` (`id_v`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`id_v`) REFERENCES `vehicule` (`id_v`),
  ADD CONSTRAINT `facture_ibfk_3` FOREIGN KEY (`id_g`) REFERENCES `garage` (`id_g`),
  ADD CONSTRAINT `facture_ibfk_5` FOREIGN KEY (`id_carte`) REFERENCES `cartebancaire` (`id_carte`),
  ADD CONSTRAINT `facture_ibfk_6` FOREIGN KEY (`id_cheque`) REFERENCES `cheque` (`id_cheque`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_nomGar` FOREIGN KEY (`nomGar`) REFERENCES `garage` (`nomgar`) ON DELETE CASCADE ON UPDATE CASCADE;
