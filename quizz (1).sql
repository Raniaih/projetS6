-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Mars 2018 à 14:51
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `motdepasse` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `nom`, `prenom`, `motdepasse`) VALUES
(1, 'admin@gmail.com', 'Iraqi Houssaini', 'Rania', 'mdpmdp');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `cne` int(11) NOT NULL,
  `nom_elv` varchar(255) NOT NULL,
  `prenom_elv` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `sexe` varchar(200) NOT NULL,
  `nivetude` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `cin`, `cne`, `nom_elv`, `prenom_elv`, `date_naissance`, `nationalite`, `sexe`, `nivetude`, `email`, `motdepasse`) VALUES
(1, 'CD265547', 589528528, 'ALAMI MEJJATI', 'Mehdi', '1995-06-14', 'Marocain', 'Masculin', '1ère année Master système d\'information', 'goodcharlou@gmail.com', 'motdepasse'),
(2, 'CD58685', 52663, 'ALAOUI', 'Mohammed', '1995-02-03', 'Marocain', 'Masculin', '1ère année master sysrème d\'information', 'alaouiMed@gmail.com', 'mdpmdp'),
(4, 'CD14525214', 1513782763, 'Nadir', 'Hajar', '1996-02-07', 'Marocaine', 'Feminin', '3ème année de licence ', 'nadir@gmail.com', '1212');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_groupe`
--

CREATE TABLE `etudiant_groupe` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant_groupe`
--

INSERT INTO `etudiant_groupe` (`id`, `id_etudiant`, `id_groupe`) VALUES
(22, 1, 12),
(31, 1, 8),
(29, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `code`, `id_prof`) VALUES
(8, 'Groupe A', 'codeaccès1', 1),
(9, 'Groupe B', 'code1456', 1),
(5, 'Groupe A - 10 12', 'code456', 2),
(7, 'Groupe 2 ', 'code', 2),
(12, 'Groupe SQL', 'mdpmdp', 5);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_theme`
--

CREATE TABLE `groupe_theme` (
  `id` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe_theme`
--

INSERT INTO `groupe_theme` (`id`, `id_groupe`, `id_theme`, `status`) VALUES
(27, 8, 1, 1),
(28, 8, 3, 1),
(24, 5, 4, 0),
(21, 8, 2, 1),
(23, 9, 1, 0),
(9, 7, 4, 1),
(25, 12, 12, 1),
(26, 5, 13, 0),
(30, 7, 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(250) NOT NULL,
  `nom_prof` varchar(255) NOT NULL,
  `prenom_prof` varchar(255) NOT NULL,
  `responsable_matière` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`id`, `email`, `motdepasse`, `nom_prof`, `prenom_prof`, `responsable_matière`) VALUES
(1, 'medi-real@hotmail.com', 'mdpmdp', 'Alami', 'Mehdi', 'Programmation Web'),
(2, 'iraqi@gmail.com', 'mdpmdp', 'Iraqi', 'Mehdi', 'C/C++'),
(5, 'raniairaqi@gmail.com', 'mdpmdp', 'Iraqi', 'Rania', 'Base de données SQL');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `question`, `id_theme`) VALUES
(1, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(2, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(3, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(4, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(5, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(6, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(7, 'VRAI ou FAUX ?<br/>\r\nLe plagiat induit le fait de reprendre sans en mentionner la source des propos oraux de présentations publique (exemples : conférences, entrevues, ...)', 1),
(8, 'VRAI ou FAUX?<br/>\r\nDans le cadre d\'un cours, un travail est à remettre dans une semaine et Léa n\'a pas encore commencé. Un de ses amis, qui a déjà suivi ce cours, lui propose de réutiliser tel quel son travail. Comme Léa a son accord, il ne s\'agit pas de plagiat', 2),
(9, 'VRAI ou FAUX?<br/>\r\nDans le cadre d\'un cours, un travail est à remettre dans une semaine et Léa n\'a pas encore commencé. Un de ses amis, qui a déjà suivi ce cours, lui propose de réutiliser tel quel son travail. Comme Léa a son accord, il ne s\'agit pas de plagiat', 2),
(10, 'VRAI ou FAUX?<br/>\r\nDans le cadre d\'un cours, un travail est à remettre dans une semaine et Léa n\'a pas encore commencé. Un de ses amis, qui a déjà suivi ce cours, lui propose de réutiliser tel quel son travail. Comme Léa a son accord, il ne s\'agit pas de plagiat', 2),
(11, 'VRAI ou FAUX?<br/>\r\nDans le cadre d\'un cours, un travail est à remettre dans une semaine et Léa n\'a pas encore commencé. Un de ses amis, qui a déjà suivi ce cours, lui propose de réutiliser tel quel son travail. Comme Léa a son accord, il ne s\'agit pas de plagiat', 2),
(12, 'VRAI ou FAUX?<br/>\r\nDans le cadre d\'un cours, un travail est à remettre dans une semaine et Léa n\'a pas encore commencé. Un de ses amis, qui a déjà suivi ce cours, lui propose de réutiliser tel quel son travail. Comme Léa a son accord, il ne s\'agit pas de plagiat', 2),
(13, 'VRAI ou FAUX?<br/>\r\nKhalil copie/colle quelques phrases d\'un site Internet dans son travail. Comme le site internet ne mentionne pas d\'auteur, d\'éditeur ou de date, Khalil peut utiliser le contenu sans avoir à mettre des guillemets (\"\") ni donner la source', 3),
(14, 'VRAI ou FAUX?<br/>\r\nKhalil copie/colle quelques phrases d\'un site Internet dans son travail. Comme le site internet ne mentionne pas d\'auteur, d\'éditeur ou de date, Khalil peut utiliser le contenu sans avoir à mettre des guillemets (\"\") ni donner la source', 3),
(15, 'VRAI ou FAUX?<br/>\r\nKhalil copie/colle quelques phrases d\'un site Internet dans son travail. Comme le site internet ne mentionne pas d\'auteur, d\'éditeur ou de date, Khalil peut utiliser le contenu sans avoir à mettre des guillemets (\"\") ni donner la source', 3),
(16, 'VRAI ou FAUX?<br/>\r\nKhalil copie/colle quelques phrases d\'un site Internet dans son travail. Comme le site internet ne mentionne pas d\'auteur, d\'éditeur ou de date, Khalil peut utiliser le contenu sans avoir à mettre des guillemets (\"\") ni donner la source', 3),
(17, 'C\'est quoi parmi ces proposition la définition exact de polymorphisme informatique ? ', 4),
(18, 'Dans quel type de programmation  on peut utiliser le polymorphisme', 4),
(36, 'Parmi les définitions suivantes  quel définition est plus correct pour le mot Database', 12),
(37, 'SELECT id FROM Audio;<br/>\r\nSa retourne quoi cette requête SQL ?', 12),
(38, 'SELECT * FROM Audio where id = 50;<br/>\r\nQue retourne la requête SQL?', 12),
(39, 'Un Vecteur est caractérisé par ', 13);

-- --------------------------------------------------------

--
-- Structure de la table `quizz_passer`
--

CREATE TABLE `quizz_passer` (
  `id` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quizz_passer`
--

INSERT INTO `quizz_passer` (`id`, `id_theme`, `id_etudiant`) VALUES
(4, 3, 1),
(2, 1, 1),
(3, 2, 1),
(6, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `id_question` int(11) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `reponse`, `id_question`, `correct`) VALUES
(1, 'VRAI', 1, 1),
(2, 'FAUX', 1, 0),
(3, 'FAUX', 2, 1),
(4, 'VRAI', 2, 0),
(5, 'VRAI', 3, 0),
(6, 'FAUX', 3, 1),
(7, 'FAUX', 4, 0),
(8, 'VRAI', 4, 1),
(9, 'FAUX', 5, 1),
(10, 'VRAI', 5, 0),
(11, 'VRAI', 6, 1),
(12, 'FAUX', 6, 0),
(13, 'VRAI', 7, 1),
(14, 'FAUX', 7, 0),
(15, 'VRAI', 8, 0),
(16, 'FAUX', 8, 1),
(17, 'FAUX', 9, 1),
(18, 'VRAI', 9, 0),
(19, 'VRAI', 10, 0),
(20, 'FAUX', 10, 1),
(21, 'FAUX', 11, 1),
(22, 'VRAI', 11, 0),
(23, 'VRAI', 12, 0),
(24, 'FAUX', 12, 1),
(25, 'VRAI', 13, 0),
(26, 'FAUX', 13, 1),
(27, 'FAUX', 14, 1),
(28, 'VRAI', 14, 0),
(29, 'FAUX', 15, 1),
(30, 'VRAI', 15, 0),
(31, 'FAUX', 16, 0),
(32, 'VRAI', 16, 1),
(56, 'permet de stocker et de retrouver l\'intégralité de données brutes ou d\'informations en rapport avec un thème ou une activité', 36, 1),
(34, 'le polymophisme est une technique particulière d\'héritage. Elle consiste, lorsqu\'on hérite d\'une classe, à redéfinir l\'une des méthodes pour la spécialiser.', 17, 0),
(35, 'le polymorphisme est relatif aux méthodes des objets. ', 17, 1),
(36, 'Programmation orienté objet', 18, 1),
(37, 'Programmation procédurale ', 18, 0),
(51, 'Yep', 8, 1),
(50, 'Yep', 1, 1),
(57, 'Une base de données est un « conteneur » stockant des données2 telles que des chiffres, des dates ou des mots, pouvant être retraités par des moyens informatiques pour produire une information', 36, 0),
(58, 'Une base donnée est une base ou les fichiers système de contrôle se trouve', 36, 0),
(59, 'id de la table Audio', 37, 0),
(60, 'tous les champs de la table Audio', 37, 0),
(61, 'tous les id de la table Audio', 37, 1),
(62, 'tous les champs de la table Audio', 38, 0),
(63, 'la ligne de la table Audio que l\'id a 50', 38, 1),
(64, 'Aucune Ligne', 38, 0),
(65, 'une liste', 39, 1),
(66, 'un tableau static', 39, 0),
(67, 'tableau dynamique', 39, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponses_etudiant`
--

CREATE TABLE `reponses_etudiant` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `id_theme` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponses_etudiant`
--

INSERT INTO `reponses_etudiant` (`id`, `id_etudiant`, `id_reponse`, `id_theme`) VALUES
(21, 1, 31, 3),
(20, 1, 29, 3),
(19, 1, 27, 3),
(18, 1, 26, 3),
(5, 1, 2, 1),
(6, 1, 50, 1),
(7, 1, 4, 1),
(8, 1, 6, 1),
(9, 1, 7, 1),
(10, 1, 9, 1),
(11, 1, 12, 1),
(12, 1, 13, 1),
(13, 1, 15, 2),
(14, 1, 16, 2),
(15, 1, 17, 2),
(16, 1, 20, 2),
(17, 1, 21, 2),
(27, 1, 64, 12),
(26, 1, 61, 12),
(25, 1, 56, 12);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `score` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `resultat`
--

INSERT INTO `resultat` (`id`, `id_etudiant`, `id_theme`, `score`) VALUES
(4, 1, 3, 3),
(2, 1, 1, 3.5),
(3, 1, 2, 3.5),
(6, 1, 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`, `id_prof`) VALUES
(1, 'Propos oraux', 1),
(2, 'Général', 1),
(3, 'Références et Internet', 1),
(4, 'Polymorphisme ', 2),
(12, 'Database', 5),
(13, 'Vector', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`cin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `etudiant_groupe`
--
ALTER TABLE `etudiant_groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe_theme`
--
ALTER TABLE `groupe_theme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quizz_passer`
--
ALTER TABLE `quizz_passer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses_etudiant`
--
ALTER TABLE `reponses_etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `etudiant_groupe`
--
ALTER TABLE `etudiant_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `groupe_theme`
--
ALTER TABLE `groupe_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `quizz_passer`
--
ALTER TABLE `quizz_passer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `reponses_etudiant`
--
ALTER TABLE `reponses_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
