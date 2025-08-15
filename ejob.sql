-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 avr. 2023 à 23:09
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ejob`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `pseudo`, `nom`, `prenom`, `mot_de_passe`) VALUES
(5, 'Admin', 'SOUKROUMDE', 'MARCELLIN', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `priorite` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date_publication` date NOT NULL DEFAULT current_timestamp(),
  `pseudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `priorite`, `texte`, `date_publication`, `pseudo`) VALUES
(7, 'high', 'wwww', '2023-03-02', 'Alidou1'),
(8, 'medium', 'Reunion 10h', '2023-03-16', 'Alidou123'),
(9, 'medium', 'consultation des candidature 10h', '2023-03-16', 'Alidou26');

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_annonce` int(11) NOT NULL,
  `description` text NOT NULL,
  `salaire` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_annonce` date NOT NULL DEFAULT current_timestamp(),
  `date_fin` date NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `id_localisation` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `description`, `salaire`, `type`, `date_annonce`, `date_fin`, `id_categorie`, `id_entreprise`, `id_localisation`, `titre`) VALUES
(3, 'recrutement', 2500, 'Stage', '2023-01-22', '2023-05-05', 11, 5, 2, 'DEVELOPPEUR JAVA'),
(15, 'Data scientist', 2500, 'Temps Partiel', '2023-03-15', '2023-03-24', 1, 5, 1, 'DEVELOPPEUR'),
(16, 'Développeur Web et Mobile** (Flutter)\r\nNous recherchons actuellement un développeur Web et Mobile De formation Bac+3 à Bac+5 en informatique pour un stage PFE\r\n\r\nVotre profil :\r\n⁃ Développement web (front et back end)\r\n⁃ Vous maîtrisez Flutter pour le développement et la maintenance des applications mobiles hybrides\r\n⁃ Vous maîtrisez l’architecture base de donnée\r\n⁃ Le développement et la maintenance d’applications web et multimédia (Framework Vue.js, Symfony,Laravel…)', 1500, 'Stage', '2023-03-22', '2023-04-07', 11, 6, 4, 'STAGE PFE DEVELOPPEUR WEB ET MOBILE'),
(17, 'Mettre en avant nos produits et nos services auprès des clients potentielsAccompagner et conseiller les clientsFidéliser les clientsVeiller à garder un contact régulier avec les clients\r\nGérer et suivre les dossiers en coursFaire du recouvrement terrain.Profil recherché pour le poste : Chargés de Portefeuille H/F - CasablancaTitulaire d’un Bac+2 minimum en Comptabilité, Finance, Commerce ou en Gestion\r\nJeune diplômé ou justifiant d’une première expérience réussie comme commercialDynamique, doté d’une aisance relationnelle avec un goût prononcé pour les challengesBonne résistance à la pression et au stressAvoir l’esprit d\'initiative\r\nBonne capacité d’adaptationHabileté à créer du lien avec les clients.', 5000, 'Pleins Temps', '2023-03-22', '2023-04-08', 5, 7, 5, 'CHARGE DE PORTEFEUILLE '),
(18, 'Vous avez un bac+2 en gestion d\'entreprise ou en gestion RH ou bien une licence, et voulez vous devenir des gestionnaires de paie professionnels. Envoyer nous vos demandes par WhatsApp sur le N° 066xxxx et bénéficier d\'une formation garanties à 100% en Gestion de la paie pratique sur SAGE PAIE.', 2000, 'Temps Partiel', '2023-03-22', '2023-04-09', 9, 8, 1, 'GESTION'),
(19, 'offre d\'emploi', 4000, 'Pleins Temps', '2023-03-30', '2023-04-08', 4, 9, 143, 'CHARGE DE PORTEFEUILLE ');

-- --------------------------------------------------------

--
-- Structure de la table `avis_ejob`
--

CREATE TABLE `avis_ejob` (
  `id_avis` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `note_satisfaction` int(11) NOT NULL,
  `avis` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis_ejob`
--

INSERT INTO `avis_ejob` (`id_avis`, `pseudo`, `designation`, `type`, `note_satisfaction`, `avis`, `date`) VALUES
(6, 'Alidou1', 'BOUBA EL HAJ', 'Utilisateur', 4, 'J aime beaucoup ejob', '2023-01-21 00:00:00'),
(7, 'Alidou26', 'KI ALIDOU-RB', 'Recruteur', 4, 'cela m\'a beaucoup aide', '2023-01-22 00:00:00'),
(8, 'Alidou26', 'KI ALIDOU-RB', 'Recruteur', 5, 'waouh', '2023-01-22 00:00:00'),
(9, 'Alidou26', 'KI ALIDOU-RB', 'Recruteur', 4, 'nice', '2023-01-22 20:39:09'),
(10, 'Alidou26', 'KI ALIDOU-RB', 'Recruteur', 2, 'hummmm', '2023-01-22 20:39:57'),
(12, 'Alidou5', 'DARO FALL AMINE', 'Utilisateur', 4, 'ice', '2023-02-15 18:39:23'),
(13, 'Alidou6', 'ABDOU FLAYOU', 'Utilisateur', 4, 'Tres interessant', '2023-03-22 22:50:36');

-- --------------------------------------------------------

--
-- Structure de la table `avis_entreprises`
--

CREATE TABLE `avis_entreprises` (
  `id_avis` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `avis` text NOT NULL,
  `date_ajout` date NOT NULL DEFAULT current_timestamp(),
  `id_entreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis_entreprises`
--

INSERT INTO `avis_entreprises` (`id_avis`, `id_utilisateur`, `note`, `avis`, `date_ajout`, `id_entreprise`) VALUES
(1, 41, 4, 'Tres bonne entreprise', '2023-01-22', 5),
(2, 41, 2, 'ice', '2023-01-22', 5),
(3, 49, 5, 'Une entreprise dynamique', '2023-03-22', 6),
(4, 50, 2, 'Fiable', '2023-03-22', 7),
(5, 50, 4, 'Competent', '2023-03-22', 8);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL,
  `photo_categorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`, `photo_categorie`) VALUES
(1, 'Data Science', 'image-categories/data_science_1.jpg'),
(2, 'Marketing Digital', 'image-categories/marketing-digital.jpg'),
(3, 'Design et Graphisme', 'image-categories/Designer-graphique.webp'),
(4, 'Tourisme/Hôtellerie/Restauration', 'image-categories/arton78688.jpg'),
(5, 'Banque/Finance/Assurance', 'image-categories/arton82404.jpg'),
(6, 'Comptabilité/Gestion/Audit', 'image-categories/licence-pro-banque-finance-assurance.jpg'),
(7, 'Commercial/Vente', 'image-categories/creer-site-vente-en-ligne.webp'),
(8, 'Agriculture et Environnement', 'image-categories/téléchargement.jpeg'),
(9, 'Ressources humaines et recrutement', 'image-categories/recrutement-896x423.jpg'),
(10, 'Télécommunication et MultiMedia', 'image-categories/Radio-wave-dish-type-antennas-diameter-satellite-communications.webp'),
(11, 'Informatique et développement web', 'image-categories/developpement-web-featured.jpg'),
(12, 'Sante et Médical', 'image-categories/check-up_bilan-sante_concilio_718x452.jpg'),
(13, 'Education et Social', 'image-categories/thumb_26847_news_wide.jpeg'),
(14, 'Mediaş/Arts/Cultures', 'image-categories/Expeditions_Header_Artwork_Card_Size_1.max-1000x1000.jpg'),
(15, 'Transports et Logistiques', 'image-categories/histoire-logistique.jpg'),
(16, 'Biologie/Chimie/Pharmaceutique', 'image-categories/fond_filiere_pharmacie.jpg'),
(17, 'Autres', 'image-categories/metier-isometrique-professions_1284-20065.webp');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_poste` int(11) NOT NULL,
  `commentaires` text NOT NULL,
  `date_creation` date NOT NULL,
  `pseudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_utilisateur`, `id_poste`, `commentaires`, `date_creation`, `pseudo`) VALUES
(73, 63, 156, 'ffff', '2023-02-11', 'soukroumde2'),
(75, 41, 159, 'f', '2023-02-12', 'Alidou123'),
(76, 45, 160, 'ho', '2023-02-12', 'daouda12'),
(77, 41, 160, 'ok', '2023-02-12', 'Alidou123'),
(78, 41, 159, ' ', '2023-02-12', 'Alidou123'),
(79, 45, 162, 'cool', '2023-02-12', 'daouda12'),
(80, 45, 161, ' ', '2023-02-12', 'daouda12'),
(81, 45, 160, ' ', '2023-02-12', 'daouda12'),
(82, 45, 159, ' ', '2023-02-12', 'daouda12'),
(83, 41, 162, 'e', '2023-02-12', 'Alidou123'),
(84, 41, 161, ' ', '2023-02-12', 'Alidou123'),
(85, 46, 162, 'ccc', '2023-02-12', 'Alidou1'),
(86, 46, 162, ' ee', '2023-02-12', 'Alidou1'),
(87, 41, 162, 'rr', '2023-02-12', 'Alidou123'),
(88, 41, 160, 'eee', '2023-02-12', 'Alidou123'),
(89, 41, 159, 'rrr', '2023-02-12', 'Alidou123'),
(90, 46, 162, 'cc', '2023-02-12', 'Alidou1'),
(91, 46, 161, 'c', '2023-02-12', 'Alidou1'),
(92, 41, 162, 'e', '2023-02-12', 'Alidou123'),
(93, 41, 161, 'r', '2023-02-12', 'Alidou123'),
(94, 46, 164, 'e', '2023-02-12', 'Alidou1'),
(95, 41, 164, 'ee', '2023-02-12', 'Alidou123'),
(96, 41, 163, 'e', '2023-02-12', 'Alidou123'),
(97, 46, 163, 'ee', '2023-02-12', 'Alidou1'),
(98, 46, 162, 'ee', '2023-02-12', 'Alidou1'),
(99, 46, 160, 'ffkv', '2023-02-12', 'Alidou1'),
(100, 46, 167, 'ee', '2023-02-12', 'Alidou1'),
(101, 47, 169, 'e', '2023-02-12', 'Alidou2'),
(102, 47, 168, 'e', '2023-02-12', 'Alidou2'),
(103, 47, 164, 'e', '2023-02-12', 'Alidou2'),
(104, 48, 172, 'cool', '2023-02-15', 'Alidou5'),
(105, 49, 173, 'Annonce', '2023-03-22', 'Alidou6'),
(106, 49, 173, 'Importante', '2023-03-22', 'Alidou6');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id_competence` int(11) NOT NULL,
  `nom_competence` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_competence`, `nom_competence`, `id_utilisateur`) VALUES
(1, 'PHP', 41),
(3, 'CSS', 41),
(6, 'CSS', 48),
(7, 'JAVA', 49);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_document` int(11) NOT NULL,
  `lien_document` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id_entreprise` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'DECONNECTE',
  `derniere_connexion` datetime NOT NULL DEFAULT current_timestamp(),
  `face_id` text NOT NULL DEFAULT 'NON',
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `nom_e` varchar(255) NOT NULL,
  `sigle_e` varchar(255) NOT NULL,
  `date_de_creation` date NOT NULL,
  `nombre_employe` int(11) NOT NULL,
  `description_e` text NOT NULL,
  `email_e` varchar(255) NOT NULL,
  `pays_e` varchar(255) NOT NULL,
  `photo_e` text NOT NULL,
  `telephone_e` varchar(100) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `connectionID` text NOT NULL,
  `sessionID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id_entreprise`, `pseudo`, `mot_de_passe`, `status`, `derniere_connexion`, `face_id`, `date_inscription`, `nom_e`, `sigle_e`, `date_de_creation`, `nombre_employe`, `description_e`, `email_e`, `pays_e`, `photo_e`, `telephone_e`, `latitude`, `longitude`, `connectionID`, `sessionID`) VALUES
(5, 'Alidou26', '$2y$10$IYdSO3qKRIZMV4XvrufloeREXgXD3EKln0UH0lHF6kPKgIsWFIg7S', 'DECONNECTE', '2023-03-30 20:44:14', 'NON', '2023-01-16 20:43:30', 'ALIDOU SARL', 'ALSARL', '2023-01-13', 5, 'cool entreprise et ice', 'kialidou10@gmail.com', 'bf', 'image-entreprise/KI-ALIDOUface-scan.png', '+212 06 45 45 54', '23.7043712', '-15.9449088', '120', 'nav8ssnhegl726quto9tkt549d'),
(6, 'Alidou27', '$2y$10$UASQncyKsQubmBpwGbdQzOJkp1/XBisazXsG/YwjR6RoQmP8fW6.y', 'DECONNECTE', '2023-03-30 21:06:58', 'e6aa5309a8b741e2acd98ff6a91a8c27fioaa37e', '2023-03-22 22:13:08', 'TECHPARK SARL', 'TECHPARK', '2023-03-02', 11, 'TechPark est une petite entreprise de tech basée dans le secteur de l&#039;informatique. Elle est spécialisée dans la création de sites web et d&#039;applications mobiles pour les entreprises.  Avec une équipe de 11 personnes, TechPark est une entreprise relativement petite, mais qui peut offrir des solutions de qualité à ses clients. L&#039;entreprise se concentre sur l&#039;innovation et l&#039;utilisation des dernières technologies pour développer des produits de pointe pour ses clients.  En plus de la création de sites web et d&#039;applications mobiles, TechPark peut également fournir des services de conseil en stratégie numérique pour aider ses clients à améliorer leur présence en ligne et à atteindre leurs objectifs commerciaux.', 'kialidou1@gmail.com', 'ma', 'image-entreprise/Alidou27e1.jpg', '+212 06 45 45 54', '26.7517952', '-11.6555776', '102', '1ngesrqvark5memvi5ldmruiqo'),
(7, 'Alidou28', '$2y$10$wg81dhvyYHa5DQY8RB6xgui3p18NQy9fGQxIvUI/WrxgLM1EaNA/a', 'DECONNECTE', '2023-03-22 23:30:26', 'c47987d8557644ee9c28a21d3eb53fc4fioaa37e', '2023-03-22 23:16:22', 'SAMBANK', 'SMBANK', '2023-03-01', 20, 'SMBANK est une banque commerciale qui fournit une large gamme de services financiers à ses clients. Elle se concentre principalement sur les clients de détail et les petites et moyennes entreprises, offrant des services bancaires courants tels que des comptes d&#039;épargne et des comptes courants, des cartes de crédit et de débit, des prêts personnels et des prêts commerciaux, ainsi que des services de change et de transfert d&#039;argent.  La banque est connue pour son engagement envers la satisfaction du client et sa volonté de fournir des produits et des services de haute qualité adaptés aux besoins individuels de chaque client. Elle dispose d&#039;un réseau d&#039;agences bancaires bien établi dans plusieurs villes et régions, ainsi que d&#039;une plateforme de banque en ligne pour offrir une expérience bancaire transparente et pratique.', 'kialidou1@gmail.com', 'ma', 'image-entreprise/Alidou28e2.jpg', '+212 06 45 45 54', '26.7517952', '-11.6555776', '141', '72erfae90cud9lbunntbmfogfo'),
(8, 'Alidou29', '$2y$10$9FDcA8D4.mv6.dWK97WSu.26gfyA6ad2KsOjMozbW1GTFTX.fqM0S', 'DECONNECTE', '2023-03-30 16:05:57', 'f4d993fa3a1d4b1891141bbc228d70c2fioaa37e', '2023-03-22 23:38:51', 'RH_SERVICE', 'RHS', '2023-03-02', 15, 'Le recrutement et la sélection de candidats pour des postes vacants dans une entreprise donnée. Cela peut inclure la rédaction et la publication d&#039;offres d&#039;emploi, la collecte de CV et la conduite d&#039;entretiens d&#039;embauche.  La gestion des contrats de travail et de la documentation liée à l&#039;emploi, comme les fiches de paie, les relevés d&#039;impôt et les contrats de travail.  La gestion des avantages sociaux pour les employés, tels que les régimes d&#039;assurance-maladie, les plans de retraite et les congés payés.  La gestion de la formation et du développement professionnel pour les employés, tels que des programmes de formation, de mentorat et de coaching.  La gestion des relations avec les employés, y compris la résolution des conflits et des problèmes de performance.', 'kialidou1@gmail.com', 'ma', 'image-entreprise/Alidou29e3.jpg', '+212 06 45 45 54', '26.7517952', '-11.6555776', '129', 'jd8goohv0g0uqi3hulfes7vq07'),
(9, 'Daro1', '$2y$10$cdHsrYkcFnSTX/UcMJKMwexWrew7xAji2RmLiySzPAq5YxI4Qf6w6', 'DECONNECTE', '2023-03-30 16:24:14', '25ad58e770be4c9a8b9f1a9116df8d59fioa3d5f', '2023-03-30 16:16:40', 'DARO', 'DR', '2023-03-17', 7, 'TechPark est une petite entreprise de tech basée dans le secteur de l&#039;informatique. Elle est spécialisée dans la création de sites web et d&#039;applications mobiles pour les entreprises.  Avec une équipe de 11 personnes, TechPark est une entreprise relativement petite, mais qui peut offrir des solutions de qualité à ses clients. L&#039;entreprise se concentre sur l&#039;innovation et l&#039;utilisation des dernières technologies pour développer des produits de pointe pour ses clients.  En plus de la création de sites web et d&#039;applications mobiles, TechPark peut également fournir des services de conseil en stratégie numérique pour aider ses clients à améliorer leur présence en ligne et à atteindre leurs objectifs commerciaux.', 'falldaro@gmail.com', 'sn', 'image-entreprise/Daro12489136.jpg', '+212 06 45 45 54', '26.1423104', '-14.4605184', '180', 'ftshc8eu54joeknfe6o69u05qq');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` varchar(50) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `photo_organisme` text NOT NULL,
  `tache` text NOT NULL,
  `nom_organisme` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_experience`, `date_debut`, `date_fin`, `poste`, `photo_organisme`, `tache`, `nom_organisme`, `id_utilisateur`) VALUES
(2, '2022-08-25', '2023-01-10', 'DEVELOPPEUR', 'image experiences/Alidou123logobelevit.jpeg8219', 'cocneption d&#039;un site web\r\npour la societe', 'BELEV-IT', 41),
(3, '2023-01-17', 'Présent', 'DIRECTEUR', 'image experiences/Alidou123E-job 1.png128581', 'dirigeant', 'ALIDOUSARL', 41),
(4, '2023-02-03', '2023-02-18', 'STAGIAIRE', 'image experiences/Alidou5128581E-job 1.png', 'JJJJJ', 'BELEV-IT', 48),
(5, '2023-03-08', '2023-03-30', 'ASSISTANT DE DIRECTION', 'image experiences/Alidou6833864assistante-de-direction-1280x720.png', 'Charge de prendre les decisions ', 'KA SARL', 49);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(11) NOT NULL,
  `lieu_formation` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `photo_ecole` text NOT NULL,
  `nom_ecole` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `lieu_formation`, `date_debut`, `date_fin`, `photo_ecole`, `nom_ecole`, `filiere`, `id_utilisateur`) VALUES
(2, 'ma', '2021', '2023', 'image formations/Alidou123logoest.jpeg80379', 'EST DAKHLA', 'GENIE INFORMATIQUE', 41),
(3, 'ma', '2023', 'Présent', 'image formations/Alidou580379logoest.jpeg', 'ESTD', 'GENIE INFORMATIQUE', 48),
(4, 'ma', '2009', '2011', 'image formations/Alidou6138643estd.jpg', 'EST AGADIR', 'MANAGEMENT', 49);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_poste` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_poste`, `id_utilisateur`) VALUES
(74, 159, 45),
(76, 168, 47),
(77, 164, 47),
(78, 172, 48),
(79, 173, 49);

-- --------------------------------------------------------

--
-- Structure de la table `localisations`
--

CREATE TABLE `localisations` (
  `id_localisation` int(11) NOT NULL,
  `nom_localisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id_localisation`, `nom_localisation`) VALUES
(1, 'Tanger'),
(2, 'Dakhla'),
(3, 'Larache'),
(4, 'Casablanca\r\n'),
(5, 'Rabat'),
(6, 'Chefchaouen\r\n'),
(7, 'Essaouira'),
(8, 'Tinghir'),
(9, 'El Jadida'),
(10, 'Tetouan'),
(11, 'Agadir'),
(12, ' Meknes'),
(13, 'Ouarzazate'),
(14, 'Fez'),
(15, 'Kouribga'),
(16, 'Berkane'),
(17, 'Sidi Slimane'),
(18, 'Ben Guerir'),
(19, 'Tiznit'),
(20, 'Martil'),
(21, 'Sidi Bennour'),
(22, 'Mehdya'),
(23, 'El Kelaa des Srarhna'),
(24, 'Taza'),
(25, 'Sale'),
(26, 'Temara'),
(27, 'Mohammedia'),
(28, 'Laâyoune'),
(29, 'Maroc'),
(30, 'China'),
(60, 'Berlin'),
(62, 'Munich'),
(68, 'Leipzig'),
(69, 'Dortmund'),
(82, 'Allemagne'),
(83, 'Italie'),
(84, 'Rome'),
(85, 'Milan'),
(86, 'Naples'),
(87, 'Turin'),
(98, 'Trieste'),
(113, 'France'),
(114, 'Paris'),
(115, 'Nice'),
(116, 'Toulouse'),
(117, 'Marseille'),
(118, 'Rennes'),
(119, 'Grenoble'),
(120, 'Nantes'),
(121, 'Montpellier'),
(122, 'Lyon'),
(124, 'Strasbourg'),
(125, 'Nancy'),
(126, 'Metz'),
(127, 'Brest'),
(132, 'Le Havre'),
(133, 'Lille'),
(134, 'Reims'),
(135, 'Saint-Étienne'),
(137, 'Dijon'),
(138, 'Angers'),
(139, 'Côte D’Ivoire'),
(140, 'Abidjan'),
(141, 'Bouaké'),
(143, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `pseudo_envoyeur` varchar(255) NOT NULL,
  `pseudo_recepteur` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `pseudo_envoyeur`, `pseudo_recepteur`, `message`, `date_envoi`) VALUES
(48, 'Alidou123', 'Alidou26', 'Salut,c&#039;est bien note', '2023-03-20 22:00:06'),
(49, 'Alidou29', 'Alidou7', 'Salut\r\n', '2023-03-22 23:47:02'),
(50, 'Alidou7', 'Alidou29', 'salut rh service\r\n', '2023-03-22 23:51:45'),
(51, 'Alidou26', 'Alidou7', 'Hi', '2023-03-23 00:09:10'),
(52, 'Alidou7', 'Alidou26', 'hi ', '2023-03-23 00:09:33'),
(53, 'Alidou27', 'Alidou7', 'cv', '2023-03-23 00:12:33'),
(54, 'Alidou29', 'Alidou6', 'hi', '2023-03-30 15:36:58'),
(55, 'Alidou27', 'Alidou6', 'hi', '2023-03-30 15:39:54'),
(56, 'Alidou6', 'Alidou27', 'salut', '2023-03-30 16:04:43'),
(57, 'Daro1', 'Alidou1', 'Hi', '2023-03-30 16:20:38'),
(58, 'Alidou27', 'Alidou1', 'cc', '2023-03-30 16:27:27'),
(59, 'Alidou27', 'Alidou3', 'cc', '2023-03-30 16:47:57'),
(60, 'Alidou26', 'Alidou1', 'cc', '2023-03-30 17:54:14'),
(61, 'Alidou6', 'Alidou27', 'Que puis-je faire pour vous', '2023-03-30 20:59:50'),
(62, 'Alidou6', 'Alidou27', '?\r\n', '2023-03-30 20:59:54');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `notif` text NOT NULL,
  `lecture` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id_notification`, `pseudo`, `notif`, `lecture`) VALUES
(3, 'Alidou123', '<a href=\"annonces.php?id_annonce=15&id_notif=3\">\n    <span class=\"notification-icon\"><i class=\"icon-material-outline-group\"></i></span>\n    <span class=\"notification-text\">\n        <strong>KI ALIDOU</strong> recherche <span class=\"color\">DEVELOPPEUR</span>\n    </span>\n</a>', 1),
(4, 'Alidou26', '<a href=\"offre.php?id_annonce=15&id_notif=4\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'entreprise BOUBA EL HAJ</strong> a candidaté a <span class=\"color\">DEVELOPPEUR</span>\r\n    </span>\r\n</a>', 1),
(5, 'Alidou7', '<a href=\"annonces.php?id_annonce=17&id_notif=5\">\r\n    <span class=\"notification-icon\"><i class=\"icon-material-outline-group\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'entreprise SAMBANK</strong> recherche <span class=\"color\">CHARGé DE PORTEFEUILLE </span>\r\n    </span>\r\n</a>', 1),
(6, 'Alidou28', '<a href=\"offre.php?id_annonce=17&id_notif=6\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur SOUKROUMDE  MARCELIN</strong> a candidaté a <span class=\"color\">CHARGE DE PORTEFEUILLE </span>\r\n    </span>\r\n</a>', 1),
(7, 'Alidou7', '<a href=\"annonces.php?id_annonce=18&id_notif=7\">\r\n    <span class=\"notification-icon\"><i class=\"icon-material-outline-group\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'entreprise RH_SERVICE</strong> recherche <span class=\"color\">GESTION</span>\r\n    </span>\r\n</a>', 1),
(8, 'Alidou29', '<a href=\"offre.php?id_annonce=18&id_notif=8\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur SOUKROUMDE  MARCELIN</strong> a candidaté a <span class=\"color\">GESTION</span>\r\n    </span>\r\n</a>', 1),
(9, 'Alidou26', '<a href=\"offre.php?id_annonce=15&id_notif=9\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur SOUKROUMDE  MARCELIN</strong> a candidaté a <span class=\"color\">DEVELOPPEUR</span>\r\n    </span>\r\n</a>', 0),
(10, 'Alidou27', '<a href=\"offre.php?id_annonce=16&id_notif=10\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur SOUKROUMDE  MARCELIN</strong> a candidaté a <span class=\"color\">STAGE PFE DEVELOPPEUR WEB ET MOBILE</span>\r\n    </span>\r\n</a>', 1),
(11, 'Alidou29', '<a href=\"offre.php?id_annonce=18&id_notif=11\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur ABDOU FLAYOU</strong> a candidaté a <span class=\"color\">GESTION</span>\r\n    </span>\r\n</a>', 0),
(12, 'Alidou27', '<a href=\"offre.php?id_annonce=16&id_notif=12\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur ABDOU FLAYOU</strong> a candidaté a <span class=\"color\">STAGE PFE DEVELOPPEUR WEB ET MOBILE</span>\r\n    </span>\r\n</a>', 1),
(13, 'Daro1', '<a href=\"offre.php?id_annonce=19&id_notif=13\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur KI ALASSANE</strong> a candidaté a <span class=\"color\">CHARGE DE PORTEFEUILLE </span>\r\n    </span>\r\n</a>', 0),
(14, 'Alidou27', '<a href=\"offre.php?id_annonce=16&id_notif=14\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur KI ALASSANE</strong> a candidaté a <span class=\"color\">STAGE PFE DEVELOPPEUR WEB ET MOBILE</span>\r\n    </span>\r\n</a>', 1),
(15, 'Alidou27', '<a href=\"offre.php?id_annonce=16&id_notif=15\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur KI ALIDOU MARCELIN</strong> a candidaté a <span class=\"color\">STAGE PFE DEVELOPPEUR WEB ET MOBILE</span>\r\n    </span>\r\n</a>', 0),
(16, 'Alidou26', '<a href=\"offre.php?id_annonce=3&id_notif=16\">\r\n    <span class=\"notification-icon\"><i class=\" icon-material-outline-gavel\"></i></span>\r\n    <span class=\"notification-text\">\r\n        <strong>l\'utilisateur KI ALASSANE</strong> a candidaté a <span class=\"color\">DEVELOPPEUR JAVA</span>\r\n    </span>\r\n</a>', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id_poste` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `image_poste` text NOT NULL,
  `texte` text NOT NULL,
  `date_poste` date NOT NULL,
  `pseudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_poste`, `id_utilisateur`, `image_poste`, `texte`, `date_poste`, `pseudo`) VALUES
(173, 49, 'poste/16795257742489136.jpg', 'Rattaché à la Direction Réseau, vous aurez les activités suivantes:Prospecter les clients et commercialiser les produits.Analyser les demandes de crédits et projets des clients.Accompagner, sensibiliser, former et suivre les clients dans leurs projets.Assurer le recouvrement à l\'amiable des créances.Lesqualités requises:Avoir la capacité relationnelle et aptitude à communiquer avec la population cible.Ayant le sens de responsabilité, d\'engagement et rigueur.Avoir la capacité d\'analyse et de synthèse.Avoir le sens de travail en équipe.Familiariser avec l\'outil informatique.Condition de Participation:Âgé de « 2S ans et plus »,Résident (e) de la ville ERRACHIDIA.Titulaire d\'un niveau BAC + Diplôme en comptabilité, gestion, commerce ou équivalentTitulaire d\'un BAC+2 (Gestion d\'entreprise, finance, commerce, économie, comptabilité,informatique ou équivalent ...).De préférence avec une 1ère expérience professionnelle ou associative.', '2023-03-22', 'Alidou6');

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE `postulation` (
  `id_postulation` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `date_postulation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `postulation`
--

INSERT INTO `postulation` (`id_postulation`, `id_utilisateur`, `id_annonce`, `date_postulation`) VALUES
(5, 47, 3, '2023-02-18'),
(7, 48, 3, '2023-02-28'),
(10, 41, 15, '2023-03-15'),
(11, 50, 17, '2023-03-22'),
(12, 50, 18, '2023-03-22'),
(13, 50, 15, '2023-03-23'),
(14, 50, 16, '2023-03-23'),
(15, 49, 18, '2023-03-30'),
(16, 49, 16, '2023-03-30'),
(17, 41, 19, '2023-03-30'),
(18, 41, 16, '2023-03-30'),
(19, 46, 16, '2023-03-30'),
(20, 41, 3, '2023-03-30');

-- --------------------------------------------------------

--
-- Structure de la table `preferences`
--

CREATE TABLE `preferences` (
  `id_preference` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `preferences`
--

INSERT INTO `preferences` (`id_preference`, `id_categorie`, `id_utilisateur`) VALUES
(2, 1, 41),
(3, 2, 48),
(4, 7, 49),
(5, 11, 49),
(6, 5, 50),
(7, 9, 50);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'DECONNECTE',
  `derniere_connexion` datetime NOT NULL DEFAULT current_timestamp(),
  `face_id` text NOT NULL DEFAULT 'NON',
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `pays` varchar(255) NOT NULL,
  `pretention_salarial` decimal(10,0) NOT NULL,
  `cv` text NOT NULL,
  `presentation` text NOT NULL,
  `verifie` varchar(50) NOT NULL DEFAULT 'NON',
  `connectionID` text NOT NULL,
  `sessionID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `telephone`, `email`, `pseudo`, `mot_de_passe`, `photo`, `status`, `derniere_connexion`, `face_id`, `date_inscription`, `pays`, `pretention_salarial`, `cv`, `presentation`, `verifie`, `connectionID`, `sessionID`) VALUES
(41, 'KI', 'ALASSANE', '+212 06 45 45 54', 'kialidou10@gmail.com', 'Alidou1', '$2y$10$VUxxsS6qYPzH6UTPR0A.uOUwPnLRijlmqnELaGaBS1hOz0jiYfmOq', 'image-utilisateurs/BOUBAAlidou1dms.jpg', 'DECONNECTE', '2023-03-30 20:56:13', 'NON', '2023-01-18 20:51:12', 'bf', '100498', 'cv/Alidou123288046ki_alidou_cv.pdf', 'Je suis Bouba , je suis tres dynamique et j&#039;espere avoir un bon boulot.\r\nSHUKRAN BEZZAF.', 'OUI', '123', 'ga2hb35jthqruuh0rpn481ng85'),
(45, 'ZIZAAN', 'DAOUDA', '+212 06 45 45 54', 'daouda@gmail.com', 'Alidou2', '$2y$10$JuKw6rgnWavhW1D.3/qe8ekz1VnBM8adyowmcBJCYtA.y0wNnSO3W', 'image-utilisateurs/daouda12s.PNG', 'DECONNECTE', '2023-02-12 03:03:30', 'NON', '2023-02-12 03:03:30', 'bf', '0', '', '', 'NON', '', '0'),
(46, 'KI ALIDOU', 'MARCELIN', '+212 06 45 45 54', 'kialidou10@gmail.com', 'Alidou3', '$2y$10$8GbR9zp.2Ka8z/HdPBstM.EWEyWrZn21eQQnFbHTOkyeRL71n8GF6', 'image-utilisateurs/Alidou1dms.jpg', 'DECONNECTE', '2023-03-30 18:18:35', '84461b11b6954dffba25fd2b45823afcfioa3b58', '2023-02-12 15:25:56', 'bf', '0', '', '', 'NON', '90', '2865vpfmgp02q125iv2lm2dj65'),
(47, 'DARO FALL', 'MARCELIN', '+212 06 45 45 54', 'soukroumdem777@gmail.com', 'Alidou4', '$2y$10$P/I/uRnra4QlPWsxmCjahe/r.uX7sUzcQqhPc6RZT/pZYV/tJ4xHS', 'image-utilisateurs/Alidou2E-job 1.png', 'DECONNECTE', '2023-03-18 04:20:44', '2b9c7de2af39454b8fa8491178393b86fioa0e27', '2023-02-12 19:43:39', 'bf', '0', '', '', 'NON', '', '0'),
(48, 'DARO FALL', 'AMINE', '+212 06 45 45 54', 'kialidou1@gmail.com', 'Alidou5', '$2y$10$uaqY.kCBXfkfzPaeWzJ9E.oiq7A4x6cGhhMUkGkQHaA/7pddg.GWy', 'image-utilisateurs/Alidou5E-job 1.png', 'DECONNECTE', '2023-02-15 18:44:35', '508a88f9756f43d1b1fc46488a6b4f01fioa129b', '2023-02-15 18:37:45', 'bf', '34080', 'cv/Alidou5288046ki_alidou_cv.pdf', 'vvvvvvvvvvvvvv', 'OUI', '', '0'),
(49, 'ABDOU', 'FLAYOU', '+212 06 45 45 54', 'kialidou1@gmail.com', 'Alidou6', '$2y$10$CVTH1zDGk2E7JbOd.U1vd.CbYBPqgHHLYCBP0l8vUzU22KIyI8siu', 'image-utilisateurs/Alidou6Abdou12Abdou12abdou.jpeg', 'DECONNECTE', '2023-03-30 21:00:05', '3446f2dd44d84da3825ec31e2eb30a66fioaa37e', '2023-03-22 22:34:38', 'ma', '5721', 'cv/Alidou6285336ki_alidou_cv.pdf', 'Personne tres dynamique,passionne', 'OUI', '93', 'vltb16u1hcvg7u7gv9bsn5i748'),
(50, 'SOUKROUMDE ', 'MARCELIN', '+212 06 45 45 54', 'kialidou1@gmail.com', 'Alidou7', '$2y$10$Ddna6ogRxSaYMm8j506AyeqFiFStp4ZI2lLPDqMLEOJpSjEoEg8qK', 'image-utilisateurs/Alidou7Marcelin12Marcelin12Marcelin12sousou.jpeg', 'DECONNECTE', '2023-03-30 18:29:16', '184860d51a264f4da679f6d500957eb2fioaa37e', '2023-03-22 23:09:57', 'bf', '0', '', '', 'NON', '105', '08k0sfabhrplupv7aignqn76qg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `fk5` (`id_categorie`),
  ADD KEY `fk6` (`id_entreprise`),
  ADD KEY `fkb` (`id_localisation`);

--
-- Index pour la table `avis_ejob`
--
ALTER TABLE `avis_ejob`
  ADD PRIMARY KEY (`id_avis`);

--
-- Index pour la table `avis_entreprises`
--
ALTER TABLE `avis_entreprises`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `fka1` (`id_utilisateur`),
  ADD KEY `fka2` (`id_entreprise`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `fk_com` (`id_utilisateur`),
  ADD KEY `fk_p` (`id_poste`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id_competence`),
  ADD KEY `fk3` (`id_utilisateur`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `fk2` (`id_utilisateur`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `fk1` (`id_utilisateur`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `fk4` (`id_utilisateur`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_like` (`id_utilisateur`);

--
-- Index pour la table `localisations`
--
ALTER TABLE `localisations`
  ADD PRIMARY KEY (`id_localisation`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `fkMessageUtilisateurs1` (`pseudo_recepteur`),
  ADD KEY `fkMessagesUtilisateurs` (`pseudo_envoyeur`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notification`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_poste`),
  ADD KEY `fkID` (`id_utilisateur`);

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_postulation`),
  ADD KEY `FK8` (`id_annonce`),
  ADD KEY `fk9` (`id_utilisateur`);

--
-- Index pour la table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id_preference`),
  ADD KEY `fk123` (`id_categorie`),
  ADD KEY `fk12` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `avis_ejob`
--
ALTER TABLE `avis_ejob`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `avis_entreprises`
--
ALTER TABLE `avis_entreprises`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `localisations`
--
ALTER TABLE `localisations`
  MODIFY `id_localisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_poste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_postulation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id_preference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprises` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkb` FOREIGN KEY (`id_localisation`) REFERENCES `localisations` (`id_localisation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis_entreprises`
--
ALTER TABLE `avis_entreprises`
  ADD CONSTRAINT `fka1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fka2` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprises` (`id_entreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_like` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id_annonce`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk9` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `fk12` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `fk123` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
