-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 23 fév. 2018 à 09:18
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cin` varchar(255) NOT NULL,
  `cne` int(11) NOT NULL,
  `nom_elv` varchar(255) NOT NULL,
  `prenom_elv` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `sexe` varchar(200) NOT NULL,
  `nivetude` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`cin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `cin`, `cne`, `nom_elv`, `prenom_elv`, `date_naissance`, `nationalite`, `sexe`, `nivetude`, `email`, `motdepasse`) VALUES
(1, 'CD265547', 589528528, 'ALAMI MEJJATI', 'Mehdi', '1995-06-14', 'Marocain', 'Masculin', '1ère année Master système d\'information', 'goodcharlou@gmail.com', 'motdepasse'),
(2, 'CD58685', 52663, 'ALAOUI', 'Mohammed', '1995-02-03', 'Marocain', 'Masculin', '1ère année master sysrème d\'information', 'alaouiMed@gmail.com', 'mdpmdp');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_groupe`
--

DROP TABLE IF EXISTS `etudiant_groupe`;
CREATE TABLE IF NOT EXISTS `etudiant_groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant_groupe`
--

INSERT INTO `etudiant_groupe` (`id`, `id_etudiant`, `id_groupe`) VALUES
(12, 1, 7),
(11, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `id_prof` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `code`, `id_prof`) VALUES
(8, 'Groupe A', 'codeaccès1', 1),
(9, 'Groupe B', 'code1456', 1),
(5, 'Groupe A - 10 12', 'code456', 2),
(7, 'Groupe 2 ', 'code', 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_theme`
--

DROP TABLE IF EXISTS `groupe_theme`;
CREATE TABLE IF NOT EXISTS `groupe_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe_theme`
--

INSERT INTO `groupe_theme` (`id`, `id_groupe`, `id_theme`, `status`) VALUES
(20, 8, 1, 1),
(22, 8, 3, 1),
(4, 5, 4, 0),
(21, 8, 2, 1),
(23, 9, 1, 0),
(9, 7, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(250) NOT NULL,
  `nom_prof` varchar(255) NOT NULL,
  `prenom_prof` varchar(255) NOT NULL,
  `responsable_matière` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `email`, `motdepasse`, `nom_prof`, `prenom_prof`, `responsable_matière`) VALUES
(1, 'medi-alami@hotmail.fr', 'mdpmdp', 'Alami', 'Mehdi', 'Programmation Web'),
(2, 'iraqi@gmail.com', 'mdpmdp', 'Iraqi', 'Mehdi', 'C/C++');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `id_theme` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
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
(18, 'Dans quel type de programmation  on peut utiliser le polymorphisme', 4);

-- --------------------------------------------------------

--
-- Structure de la table `quizz_passer`
--

DROP TABLE IF EXISTS `quizz_passer`;
CREATE TABLE IF NOT EXISTS `quizz_passer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_theme` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text NOT NULL,
  `id_question` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponses`
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
(33, 'Le polymorphisme est est le concept consistant à fournir une interface unique à des entités pouvant avoir différents', 17, 0),
(34, 'le polymophisme est une technique particulière d\'héritage. Elle consiste, lorsqu\'on hérite d\'une classe, à redéfinir l\'une des méthodes pour la spécialiser.', 17, 0),
(35, 'le polymorphisme est relatif aux méthodes des objets. ', 17, 1),
(36, 'Programmation orienté objet', 18, 1),
(37, 'Programmation procédurale ', 18, 0),
(51, 'Yep', 8, 1),
(50, 'Yep', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponses_etudiant`
--

DROP TABLE IF EXISTS `reponses_etudiant`;
CREATE TABLE IF NOT EXISTS `reponses_etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `id_theme` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_prof` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `nom`, `id_prof`) VALUES
(1, 'Propos oraux', 1),
(2, 'Général', 1),
(3, 'Références et Internet', 1),
(4, 'Polymorphisme ', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
