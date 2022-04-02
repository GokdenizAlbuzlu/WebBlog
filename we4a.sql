-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 avr. 2022 à 19:38
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `we4a`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID_post` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL,
  `Commentaire` longtext NOT NULL,
  `Date_post` date NOT NULL,
  `Titre` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`ID_post`, `ID_utilisateur`, `Commentaire`, `Date_post`, `Titre`) VALUES
(42, 46, '          Le prix du Gas, déjà à un haut niveau en raison d’une stagnation de la production mondiale, connaît une envolée depuis le début de l’invasion russe en Ukraine.\r\nUne inflation directement visible sur les prix à la station-service, l’essence subissant de plein fouet cette hausse.\r\nJusqu’où les prix vont-ils monter, et y a-t-il au moins une limite ?\r\n', '2022-03-23', '            Guerre en Ukraine\r\n'),
(43, 45, '          La forte hausse des prix est devenue le sujet politique numéro un pour le président Joe Biden, d’autant que les salaires ne suivent pas.\r\n', '2022-03-23', '            Aux Etats-Unis, l’inflation atteint 8 %, un niveau inédit depuis 1982\r\n'),
(44, 47, 'CARBURANTS - Des prix de plus en plus hauts et un retour sur les niveaux de novembre 2021, si ce n’est plus. Les automobilistes l’ont sans doute remarqué en premier, mais le prix à la pompe atteint de nouveaux records en ce début d’année 2022, un coup dur de plus pour le portefeuille des Français.\r\n\r\nSans-plomb ou diesel, même combat pour les automobilistes: au dernier pointage officiel du ministère de la Transition écologique, daté du 7 janvier, le prix moyen du diesel était de 1,59 euro/litre, 1,66 euro/litre pour ce qui est du sans-plomb 95-E10 et même 1,75 euro/litre pour le sans-plomb 98. ', '2022-03-23', 'Pourquoi les prix du carburant n\'en finissent plus de grimper à la pompe.'),
(45, 45, '                                                  le 30/03/2022, on ne trouve toujours pas de playstation 5 sur le marché à cause de rupture de stockk.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '2022-03-25', '                                                            La rupture de stock des Playstation 5\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(46, 47, 'La seconde guerre mondiale se termine Europe,', '2022-03-25', 'Le 8 mai 1945\r\n'),
(49, 48, 'Après l’avoir qualifié de « boucher », le président américain a jugé que son homologue russe ne pouvait « pas rester au pouvoir » après l’invasion de l’Ukraine, une déclaration immédiatement tempérée par la Maison Blanche.', '2022-03-27', 'Guerre en Ukraine, en direct : Biden de plus en plus virulent envers Poutine'),
(50, 48, 'Découvert en Afrique du Sud, Omicron a changé la face de la pandémie. Son sous-variant BA.2 est encore plus contagieux. Mediapart a voulu comprendre si ce pays est une terre d’élection de mutants du Sars-CoV-2, hypothèse un temps avancée. Le plus frappant sur place : la faiblesse du taux de vaccination.', '2022-03-27', 'L’Afrique du Sud, réservoir à variants préoccupants ?'),
(58, 45, '                                                            And Where to find them...\r\n\r\n\r\n\r\n\r\n', '2022-03-30', '                                                                        Fantastic Beasts\r\n\r\n\r\n\r\n\r\n'),
(59, 46, 'Ussr broked into 11 independent states. ', '2022-03-31', 'in 1991 the USSR collapsed.'),
(60, 50, 'Dernière figure incontournable du XXe siècle, Fidel Castro est décédé le 25 novembre 2016 à La Havane. Resté accroché au pouvoir pendant 50 ans, le leader historique de la révolution cubaine reste une personnalité controversée difficile à percer à jour. Qui se cache vraiment derrière cette barbe légendaire ? Portrait d’un personnage complexe aux multiples facettes.', '2022-03-31', '1926-2016 FIDEL CASTRO ENTRE OMBRE ET LUMIÈRE'),
(62, 45, ' dit Jack Kennedy, communément appelé John Kennedy et par ses initiales JFK, né le 29 mai 1917 à Brooklyn (Massachusetts) et mort assassiné le 22 novembre 1963 à Dallas (Texas)\r\n\r\n\r\n\r\n\r\n', '2022-04-02', 'La vie de Kennedy\r\n\r\n\r\n\r\n\r\n'),
(63, 45, '  Dernière figuree incontournable du XXe siècle, Fidel Castro est décédé le 25 novembre 2016 à La Havane. Resté accroché au pouvoir pendant 50 ans, le leader historique de la révolution cubaine reste une personnalité controversée difficile à percer à jour. Qui se cache vraiment derrière cette barbe légendaire ? Portrait d’un personnage complexe aux multiples facettes.\r\n\r\n\r\n', '2022-04-02', 'Crise de Cuba 1962\r\n\r\n'),
(64, 45, 'La crise des missiles de Cuba est une suite d\'événements survenus du 14 octobre au 28 octobre 1962 et qui ont opposé les États-Unis et l\'Union soviétique au sujet des missiles nucléaires soviétiques pointés en direction du territoire des États-Unis depuis l\'île de Cuba. Cette crise a mené les deux blocs au bord de la guerre nucléaire.\r\n\r\nMoment paroxystique de la guerre froide, la crise de Cuba souligne les limites de la coexistence pacifique et se solde par un retrait des missiles par l\'URSS en échange d\'un retrait de certains missiles nucléaires américains de Turquie et d\'Italie, ainsi que par une promesse des États-Unis de ne plus jamais envahir Cuba (après la tentative avortée de 1961) sans provocation directe. Cet accord entre le gouvernement soviétique et l\'administration Kennedy, certes contraignant pour la future politique extérieure des États-Unis, a permis au monde d\'éviter un conflit militaire entre les deux puissances qui aurait pu mener à un affrontement nucléaire et à une troisième Guerre mondiale. Un « téléphone rouge » reliant directement la Maison-Blanche au Kremlin fut également installé après la crise afin de pouvoir établir une communication directe entre l\'exécutif des deux superpuissances et éviter qu\'une nouvelle crise ', '2022-04-02', 'Crise de Missiles Cuba');

-- --------------------------------------------------------

--
-- Structure de la table `image_profil`
--

CREATE TABLE `image_profil` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image_profil`
--

INSERT INTO `image_profil` (`id`, `userid`, `statut`) VALUES
(1, 45, 1),
(21, 46, 1),
(23, 48, 1),
(24, 45, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mot_de_passe` varchar(32) NOT NULL,
  `qstSecrete` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `Prenom`, `Nom`, `Email`, `Mot_de_passe`, `qstSecrete`) VALUES
(45, 'Fitzgerald', 'Kennedy', 'jkf@gmail.com', 'f2acc86c6e1ba3fc43c8db1dc84b8626', 'df5ea29924d39c3be8785734f13169c6'),
(46, 'Boris', 'Elstine', 'Be@gmail.com', 'df5ea29924d39c3be8785734f13169c6', 'df5ea29924d39c3be8785734f13169c6'),
(47, 'Franklin', 'Roosevelt', 'Fr@gmail.com', 'df5ea29924d39c3be8785734f13169c6', 'df5ea29924d39c3be8785734f13169c6'),
(48, 'Martin', 'Luther', 'MartinKing@gmail.com', 'df5ea29924d39c3be8785734f13169c6', 'df5ea29924d39c3be8785734f13169c6'),
(49, 'Harry', 'Trumann', 'Ht@gmail.com', 'df5ea29924d39c3be8785734f13169c6', 'df5ea29924d39c3be8785734f13169c6'),
(50, 'Fidel', 'Castro', 'FidelCastro@gmail.com', 'f2acc86c6e1ba3fc43c8db1dc84b8626', 'df5ea29924d39c3be8785734f13169c6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID_post`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`);

--
-- Index pour la table `image_profil`
--
ALTER TABLE `image_profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `image_profil`
--
ALTER TABLE `image_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
