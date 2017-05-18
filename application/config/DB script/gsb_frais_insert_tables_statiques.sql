-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Novembre 2016 à 13:46
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gsb_frais`
--

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Fiche Signée, saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('MP', 'Mise en paiement'),
('RB', 'Remboursée'),
('VA', 'Validée');

--
-- Contenu de la table `fichefrais`
--

INSERT INTO `fichefrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
('a131', '201604', 0, '0.00', '2016-09-20', 'CR'),
('a131', '201605', 0, '0.00', '2016-09-20', 'CR'),
('a131', '201606', 0, '0.00', '2016-09-20', 'CR'),
('a131', '201607', 0, '0.00', '2016-09-20', 'CR'),
('a131', '201608', 0, '19764.14', '2016-11-08', 'CR'),
('a131', '201609', 0, '0.00', '2016-11-08', 'CR'),
('a131', '201610', 0, '951.00', '2016-11-22', 'MP'),
('a131', '201611', 0, '0.00', '2016-11-08', 'CR'),
('a17', '201605', 0, '440.00', '2016-11-15', 'CR'),
('a17', '201606', 0, '0.00', '2016-10-18', 'CR'),
('a17', '201607', 0, '27940.00', '2016-11-15', 'CL'),
('a17', '201608', 0, '5234.80', '2016-11-15', 'RB'),
('a17', '201609', 0, '0.00', '2016-11-15', 'MP'),
('a17', '201610', 0, '0.00', '2016-10-18', 'CR'),
('a17', '201611', 0, '80081.50', '2016-11-15', 'RB');

--
-- Contenu de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', '110.00'),
('KM', 'Frais Kilométrique', '0.62'),
('NUI', 'Nuitée Hôtel', '80.00'),
('REP', 'Repas Restaurant', '25.00');

--
-- Contenu de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`, `montantApplique`) VALUES
('a131', '201604', 'ETP', 0, '110.00'),
('a131', '201604', 'KM', 0, '0.62'),
('a131', '201604', 'NUI', 0, '80.00'),
('a131', '201604', 'REP', 0, '25.00'),
('a131', '201605', 'ETP', 0, '110.00'),
('a131', '201605', 'KM', 0, '0.62'),
('a131', '201605', 'NUI', 0, '80.00'),
('a131', '201605', 'REP', 0, '25.00'),
('a131', '201606', 'ETP', 0, '110.00'),
('a131', '201606', 'KM', 0, '0.62'),
('a131', '201606', 'NUI', 0, '80.00'),
('a131', '201606', 'REP', 0, '25.00'),
('a131', '201607', 'ETP', 0, '110.00'),
('a131', '201607', 'KM', 0, '0.62'),
('a131', '201607', 'NUI', 0, '80.00'),
('a131', '201607', 'REP', 0, '25.00'),
('a131', '201608', 'ETP', 45, '110.00'),
('a131', '201608', 'KM', 47, '0.62'),
('a131', '201608', 'NUI', 2, '80.00'),
('a131', '201608', 'REP', 585, '25.00'),
('a131', '201609', 'ETP', 0, '110.00'),
('a131', '201609', 'KM', 0, '0.62'),
('a131', '201609', 'NUI', 0, '80.00'),
('a131', '201609', 'REP', 0, '25.00'),
('a131', '201610', 'ETP', 1, '110.00'),
('a131', '201610', 'KM', 50, '0.62'),
('a131', '201610', 'NUI', 2, '80.00'),
('a131', '201610', 'REP', 4, '25.00'),
('a131', '201611', 'ETP', 0, '110.00'),
('a131', '201611', 'KM', 0, '0.62'),
('a131', '201611', 'NUI', 0, '80.00'),
('a131', '201611', 'REP', 0, '25.00'),
('a17', '201605', 'ETP', 4, '110.00'),
('a17', '201605', 'KM', 0, '0.62'),
('a17', '201605', 'NUI', 0, '80.00'),
('a17', '201605', 'REP', 0, '25.00'),
('a17', '201606', 'ETP', 0, '110.00'),
('a17', '201606', 'KM', 0, '0.62'),
('a17', '201606', 'NUI', 0, '80.00'),
('a17', '201606', 'REP', 0, '25.00'),
('a17', '201607', 'ETP', 254, '110.00'),
('a17', '201607', 'KM', 0, '0.62'),
('a17', '201607', 'NUI', 0, '80.00'),
('a17', '201607', 'REP', 0, '25.00'),
('a17', '201608', 'ETP', 45, '110.00'),
('a17', '201608', 'KM', 40, '0.62'),
('a17', '201608', 'NUI', 2, '80.00'),
('a17', '201608', 'REP', 4, '25.00'),
('a17', '201609', 'ETP', 0, '110.00'),
('a17', '201609', 'KM', 0, '0.62'),
('a17', '201609', 'NUI', 0, '80.00'),
('a17', '201609', 'REP', 0, '25.00'),
('a17', '201610', 'ETP', 0, '110.00'),
('a17', '201610', 'KM', 0, '0.62'),
('a17', '201610', 'NUI', 0, '80.00'),
('a17', '201610', 'REP', 0, '25.00'),
('a17', '201611', 'ETP', 545, '110.00'),
('a17', '201611', 'KM', 5325, '0.62'),
('a17', '201611', 'NUI', 41, '80.00'),
('a17', '201611', 'REP', 542, '25.00');

--
-- Contenu de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idVisiteur`, `mois`, `libelle`, `date`, `montant`) VALUES
(1, 'a131', '201610', 'yey', '1996-12-12', '550.00');

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `libelleStatut`) VALUES
(0, 'Visiteur'),
(1, 'Comptable');

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `comptable`) VALUES
('a131', 'Villachane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21', 1),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23', 0),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12', 0),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01', 0),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09', 0),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11', 0),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21', 0),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05', 0),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12', 0),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23', 0),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12', 0),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11', 0),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18', 0),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11', 0),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14', 0),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23', 0),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11', 0),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17', 0),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12', 0),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05', 0),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01', 0),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10', 0),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01', 0),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01', 0),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10', 0),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01', 0),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '1985-11-01', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
