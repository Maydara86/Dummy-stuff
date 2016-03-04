-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Décembre 2015 à 16:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C''est officiel, l''éléPHPant a annoncé à la radio hier soir "J''ai l''intention de conquérir le monde !".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu''il n''en fallait pour dire "éléPHPant". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11'),
(5, '15 Excellent PHP Tools', 'PHP is a scripting language that is used for a lot of web development.', '2015-02-23 14:00:32'),
(6, '15 Best Node.js Tools for 2015', 'Node.js is really getting popular + being used more and more each day and it deserves this attention with the flexibility and performance if offers.', '2015-02-23 14:01:48'),
(7, '15 Best HTML5 Frameworks for 2015', 'HTML5 is one of the most popular language amongst developer community as it offers number of features such as modern browser support.', '2015-02-23 14:02:16'),
(8, 'Collection of Google Material Design Resources', 'At Google they say, “Focus on the user and all else will follow.” They embrace that principle in their design by seeking to build experiences that surprise.', '2015-02-23 14:03:46'),
(9, '15 Fresh Tools for Developers', 'Valentine’s Day is about to come and we all are gearing up to welcome it. So while people fill up their wardrobes for this Valentine.', '2015-02-23 14:04:26'),
(10, '10 Best AngularJS Frameworks', 'AngularJS is one of the most popular and open-source web application framework maintained by Google and a community of individual developers.', '2015-02-23 14:04:55'),
(15, 'Le Récap'' : Oscars 2015, ce qu''il faut retenir du palmarès', 'Les Oscars ont consacré la virtuosité avec "Birdman", même si Michael Keaton n''a pas gagné. Cette année, la maladie a payé avec les victoires de Julianne Moore .', '2015-02-25 12:02:09'),
(14, 'Oscars 2015 : best-of des meilleurs moments de la cérémonie', 'Pendant la soirée, le présentateur des Oscars, Neil Patrick Harris, est apparu sur scène en slip. Crédits photo : Kevin Winter/AFP. ', '2015-02-25 12:01:08'),
(13, 'Créer une pagination', 'Dans ce tutoriel vidéo nous verrons la création d''une pagination en PHP. Pour ce faire nous verrons la création de requêtes SQL avancées avec entre autre : LIMIT et COUNT.', '2015-02-25 11:58:39');

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `degat` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `experience` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `niveau` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `puissance` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `coup` tinyint(3) NOT NULL DEFAULT '0',
  `date_coup` datetime DEFAULT NULL,
  `date_connection` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Contenu de la table `characters`
--

INSERT INTO `characters` (`id`, `nom`, `degat`, `experience`, `niveau`, `puissance`, `coup`, `date_coup`, `date_connection`) VALUES
(82, 'zoudak', 14, 0, 10, 2, 3, '2015-11-14 00:35:23', '2015-11-14 00:35:15'),
(79, 'Hamma', 15, 0, 13, 2, 3, '2015-11-14 00:31:31', '2015-11-14 00:30:29'),
(78, 'Vander', 0, 50, 11, 2, 3, '2015-11-14 00:34:43', '2015-11-14 00:34:30'),
(77, 'maydara', 38, 0, 16, 2, 3, '2015-11-14 00:34:01', '2015-11-14 00:32:32'),
(76, 'serena', 34, 0, 49, 5, 3, '2015-11-14 00:34:24', '2015-11-14 00:34:16');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum''s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu''on ne le pense !', '2010-03-27 22:02:13');

-- --------------------------------------------------------

--
-- Structure de la table `jeux_video`
--

CREATE TABLE IF NOT EXISTS `jeux_video` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `possesseur` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `nbre_joueurs_max` int(11) NOT NULL DEFAULT '0',
  `commentaires` text NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `jeux_video`
--

INSERT INTO `jeux_video` (`ID`, `nom`, `possesseur`, `console`, `prix`, `nbre_joueurs_max`, `commentaires`) VALUES
(1, 'Super Mario Bros', 'Florent', 'NES', 4, 1, 'Un jeu d''anthologie !'),
(2, 'Sonic', 'Patrick', 'Megadrive', 2, 1, 'Pour moi, le meilleur jeu du monde !'),
(3, 'Zelda : ocarina of time', 'Florent', 'Nintendo 64', 15, 1, 'Un jeu grand, beau et complet comme on en voit rarement de nos jours'),
(4, 'Mario Kart 64', 'Florent', 'Nintendo 64', 25, 4, 'Un excellent jeu de kart !'),
(5, 'Super Smash Bros Melee', 'Michel', 'GameCube', 55, 4, 'Un jeu de baston délirant !'),
(6, 'Dead or Alive', 'Patrick', 'Xbox', 60, 4, 'Le plus beau jeu de baston jamais créé'),
(7, 'Dead or Alive Xtreme Beach Volley Ball', 'Patrick', 'Xbox', 60, 4, 'Un jeu de beach volley de toute beauté o_O'),
(8, 'Enter the Matrix', 'Michel', 'PC', 45, 1, 'Plutôt bof comme jeu, mais ça complète bien le film'),
(9, 'Max Payne 2', 'Michel', 'PC', 50, 1, 'Très réaliste, une sorte de film noir sur fond d''histoire d''amour. A essayer !'),
(10, 'Yoshi''s Island', 'Florent', 'SuperNES', 6, 1, 'Le paradis des Yoshis :o)'),
(11, 'Commandos 3', 'Florent', 'PC', 44, 12, 'Un bon jeu d''action où on dirige un commando pendant la 2ème guerre mondiale !'),
(12, 'Final Fantasy X', 'Patrick', 'PS2', 40, 1, 'Encore un Final Fantasy mais celui la est encore plus beau !'),
(13, 'Pokemon Rubis', 'Florent', 'GBA', 44, 4, 'Pika-Pika-chu !!!'),
(14, 'Starcraft', 'Michel', 'PC', 19, 8, 'Le meilleur jeux pc de tout les temps !'),
(15, 'Grand Theft Auto 3', 'Michel', 'PS2', 30, 1, 'Comme dans les autres Gta on ecrase tout le monde :) .'),
(16, 'Homeworld 2', 'Michel', 'PC', 45, 6, 'Superbe ! o_O'),
(17, 'Aladin', 'Patrick', 'SuperNES', 10, 1, 'Comme le dessin Animé !'),
(18, 'Super Mario Bros 3', 'Michel', 'SuperNES', 10, 2, 'Le meilleur Mario selon moi.'),
(19, 'SSX 3', 'Florent', 'Xbox', 56, 2, 'Un très bon jeu de snow !'),
(20, 'Star Wars : Jedi outcast', 'Patrick', 'Xbox', 33, 1, 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !'),
(21, 'Actua Soccer 3', 'Patrick', 'PS', 30, 2, 'Un jeu de foot assez bof ...'),
(22, 'Time Crisis 3', 'Florent', 'PS2', 40, 1, 'Un troisième volet efficace mais pas vraiment surprenant'),
(23, 'X-FILES', 'Patrick', 'PS', 25, 1, 'Un jeu censé ressembler a la série mais assez raté ...'),
(24, 'Soul Calibur 2', 'Patrick', 'Xbox', 54, 1, 'Un jeu bien axé sur le combat'),
(25, 'Diablo', 'Florent', 'PS', 20, 1, 'Comme sur PC mais la c''est sur un ecran de télé :) !'),
(26, 'Street Fighter 2', 'Patrick', 'Megadrive', 10, 2, 'Le célèbre jeu de combat !'),
(27, 'Gundam Battle Assault 2', 'Florent', 'PS', 29, 1, 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement'),
(28, 'Spider-Man', 'Florent', 'Megadrive', 15, 1, 'Vivez l''aventure de l''homme araignée'),
(29, 'Midtown Madness 3', 'Michel', 'Xbox', 59, 6, 'Dans la suite des autres versions de Midtown Madness'),
(30, 'Tetris', 'Florent', 'Gameboy', 5, 1, 'Qui ne connait pas ? '),
(31, 'The Rocketeer', 'Michel', 'NES', 2, 1, 'Un super un film et un jeu de m*rde ...'),
(32, 'Pro Evolution Soccer 3', 'Patrick', 'PS2', 59, 2, 'Un petit jeu de foot sur PS2'),
(33, 'Ice Hockey', 'Michel', 'NES', 7, 2, 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)'),
(34, 'Sydney 2000', 'Florent', 'Dreamcast', 15, 2, 'Les JO de Sydney dans votre salon !'),
(35, 'NBA 2k', 'Patrick', 'Dreamcast', 12, 2, 'A votre avis :p ?'),
(36, 'Aliens Versus Predator : Extinction', 'Michel', 'PS2', 20, 2, 'Un shoot''em up pour pc'),
(37, 'Crazy Taxi', 'Florent', 'Dreamcast', 11, 1, 'Conduite de taxi en folie !'),
(38, 'Le Maillon Faible', 'Mathieu', 'PS2', 10, 1, 'Le jeu de l''émission'),
(39, 'FIFA 64', 'Michel', 'Nintendo 64', 25, 2, 'Le premier jeu de foot sur la N64 =) !'),
(40, 'Qui Veut Gagner Des Millions', 'Florent', 'PS2', 10, 1, 'Le jeu de l''émission'),
(41, 'Monopoly', 'Sebastien', 'Nintendo 64', 21, 4, 'Bheuuu le monopoly sur N64 !'),
(42, 'Taxi 3', 'Corentin', 'PS2', 19, 4, 'Un jeu de voiture sur le film'),
(43, 'Indiana Jones Et Le Tombeau De L''Empereur', 'Florent', 'PS2', 25, 1, 'Notre aventurier préféré est de retour !!!'),
(44, 'F-ZERO', 'Mathieu', 'GBA', 25, 4, 'Un super jeu de course futuriste !'),
(45, 'Harry Potter Et La Chambre Des Secrets', 'Mathieu', 'Xbox', 30, 1, 'Abracadabra !! Le célebre magicien est de retour !'),
(46, 'Half-Life', 'Corentin', 'PC', 15, 32, 'L''autre meilleur jeu de tout les temps (surtout ses mods).'),
(47, 'Myst III Exile', 'Sébastien', 'Xbox', 49, 1, 'Un jeu de réflexion'),
(48, 'Wario World', 'Sebastien', 'Gamecube', 40, 4, 'Wario vs Mario ! Qui gagnera ! ?'),
(49, 'Rollercoaster Tycoon', 'Florent', 'Xbox', 29, 1, 'Jeu de gestion d''un parc d''attraction'),
(50, 'Splinter Cell', 'Patrick', 'Xbox', 53, 1, 'Jeu magnifique !'),
(51, 'World of Warcraft', 'Hamma', 'PC', 50, 5000, 'jeu MMORPG.'),
(52, 'hearthstone', 'Hamma', 'PC', 0.1, 2, 'jeu de carte sympa.'),
(53, 'GTA V', 'Hamma', 'PS4', 45, 10, 'On parle de GTA là'),
(54, 'Diablo III', 'hamma', 'pc', 40.5, 5, 'j''aime bien ce jeu'),
(55, 'Need for Speed Most Wanted', 'Hamma', 'PS4', 30, 8, ''),
(56, 'Need for Speed Most Wanted', 'Hamma', 'PS4', 30, 8, '');

-- --------------------------------------------------------

--
-- Structure de la table `jeux_video2`
--

CREATE TABLE IF NOT EXISTS `jeux_video2` (
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `id_proprietaire` int(11) NOT NULL,
  `console` varchar(255) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `nbre_joueurs_max` int(11) NOT NULL DEFAULT '0',
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeux_video2`
--

INSERT INTO `jeux_video2` (`ID`, `nom`, `id_proprietaire`, `console`, `prix`, `nbre_joueurs_max`, `commentaires`) VALUES
(1, 'Super Mario Bros', 2, 'NES', 4, 1, 'Un jeu d''anthologie !'),
(2, 'Sonic', 6, 'Megadrive', 2, 1, 'Pour moi, le meilleur jeu du monde !'),
(3, 'Zelda : ocarina of time', 2, 'Nintendo 64', 15, 1, 'Un jeu grand, beau et complet comme on en voit rarement de nos jours'),
(4, 'Mario Kart 64', 2, 'Nintendo 64', 25, 4, 'Un excellent jeu de kart !'),
(5, 'Super Smash Bros Melee', 5, 'GameCube', 55, 4, 'Un jeu de baston délirant !'),
(6, 'Dead or Alive', 6, 'Xbox', 60, 4, 'Le plus beau jeu de baston jamais créé'),
(7, 'Dead or Alive Xtreme Beach Volley Ball', 6, 'Xbox', 60, 4, 'Un jeu de beach volley de toute beauté o_O'),
(8, 'Enter the Matrix', 5, 'PC', 45, 1, 'Plutôt bof comme jeu, mais ça complète bien le film'),
(9, 'Max Payne 2', 5, 'PC', 50, 1, 'Très réaliste, une sorte de film noir sur fond d''histoire d''amour. A essayer !'),
(10, 'Yoshi''s Island', 2, 'SuperNES', 6, 1, 'Le paradis des Yoshis :o)'),
(11, 'Commandos 3', 2, 'PC', 44, 12, 'Un bon jeu d''action où on dirige un commando pendant la 2ème guerre mondiale !'),
(12, 'Final Fantasy X', 6, 'PS2', 40, 1, 'Encore un Final Fantasy mais celui la est encore plus beau !'),
(13, 'Pokemon Rubis', 2, 'GBA', 44, 4, 'Pika-Pika-chu !!!'),
(14, 'Starcraft', 5, 'PC', 19, 8, 'Le meilleur jeux pc de tout les temps !'),
(15, 'Grand Theft Auto 3', 5, 'PS2', 30, 1, 'Comme dans les autres Gta on ecrase tout le monde :) .'),
(16, 'Homeworld 2', 5, 'PC', 45, 6, 'Superbe ! o_O'),
(17, 'Aladin', 6, 'SuperNES', 10, 1, 'Comme le dessin Animé !'),
(18, 'Super Mario Bros 3', 5, 'SuperNES', 10, 2, 'Le meilleur Mario selon moi.'),
(19, 'SSX 3', 2, 'Xbox', 56, 2, 'Un très bon jeu de snow !'),
(20, 'Star Wars : Jedi outcast', 6, 'Xbox', 33, 1, 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !'),
(21, 'Actua Soccer 3', 6, 'PS', 30, 2, 'Un jeu de foot assez bof ...'),
(22, 'Time Crisis 3', 2, 'PS2', 40, 1, 'Un troisième volet efficace mais pas vraiment surprenant'),
(23, 'X-FILES', 6, 'PS', 25, 1, 'Un jeu censé ressembler a la série mais assez raté ...'),
(24, 'Soul Calibur 2', 6, 'Xbox', 54, 1, 'Un jeu bien axé sur le combat'),
(25, 'Diablo', 2, 'PS', 20, 1, 'Comme sur PC mais la c''est sur un ecran de télé :) !'),
(26, 'Street Fighter 2', 6, 'Megadrive', 10, 2, 'Le célèbre jeu de combat !'),
(27, 'Gundam Battle Assault 2', 2, 'PS', 29, 1, 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement'),
(28, 'Spider-Man', 2, 'Megadrive', 15, 1, 'Vivez l''aventure de l''homme araignée'),
(29, 'Midtown Madness 3', 5, 'Xbox', 59, 6, 'Dans la suite des autres versions de Midtown Madness'),
(30, 'Tetris', 2, 'Gameboy', 5, 1, 'Qui ne connait pas ? '),
(31, 'The Rocketeer', 5, 'NES', 2, 1, 'Un super un film et un jeu de m*rde ...'),
(32, 'Pro Evolution Soccer 3', 6, 'PS2', 59, 2, 'Un petit jeu de foot sur PS2'),
(33, 'Ice Hockey', 5, 'NES', 7, 2, 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)'),
(34, 'Sydney 2000', 2, 'Dreamcast', 15, 2, 'Les JO de Sydney dans votre salon !'),
(35, 'NBA 2k', 6, 'Dreamcast', 12, 2, 'A votre avis :p ?'),
(36, 'Aliens Versus Predator : Extinction', 5, 'PS2', 20, 2, 'Un shoot''em up pour pc'),
(37, 'Crazy Taxi', 2, 'Dreamcast', 11, 1, 'Conduite de taxi en folie !'),
(38, 'Le Maillon Faible', 4, 'PS2', 10, 1, 'Le jeu de l''émission'),
(39, 'FIFA 64', 5, 'Nintendo 64', 25, 2, 'Le premier jeu de foot sur la N64 =) !'),
(40, 'Qui Veut Gagner Des Millions', 2, 'PS2', 10, 1, 'Le jeu de l''émission'),
(41, 'Monopoly', 7, 'Nintendo 64', 21, 4, 'Bheuuu le monopoly sur N64 !'),
(42, 'Taxi 3', 1, 'PS2', 19, 4, 'Un jeu de voiture sur le film'),
(43, 'Indiana Jones Et Le Tombeau De L''Empereur', 2, 'PS2', 25, 1, 'Notre aventurier préféré est de retour !!!'),
(44, 'F-ZERO', 4, 'GBA', 25, 4, 'Un super jeu de course futuriste !'),
(45, 'Harry Potter Et La Chambre Des Secrets', 4, 'Xbox', 30, 1, 'Abracadabra !! Le célebre magicien est de retour !'),
(46, 'Half-Life', 1, 'PC', 15, 32, 'L''autre meilleur jeu de tout les temps (surtout ses mods).'),
(47, 'Myst III Exile', 7, 'Xbox', 49, 1, 'Un jeu de réflexion'),
(48, 'Wario World', 7, 'Gamecube', 40, 4, 'Wario vs Mario ! Qui gagnera ! ?'),
(49, 'Rollercoaster Tycoon', 2, 'Xbox', 29, 1, 'Jeu de gestion d''un parc d''attraction'),
(50, 'Splinter Cell', 6, 'Xbox', 53, 1, 'Jeu magnifique !'),
(51, 'World of Warcraft', 3, 'PC', 50, 5000, 'jeu MMORPG.'),
(52, 'hearthstone', 3, 'PC', 0.1, 2, 'jeu de carte sympa.'),
(53, 'GTA V', 3, 'PS4', 45, 10, 'On parle de GTA là'),
(54, 'Diablo III', 3, 'pc', 40.5, 5, 'j''aime bien ce jeu'),
(55, 'Need for Speed Most Wanted', 3, 'PS4', 30, 8, ''),
(56, 'Need for Speed Most Wanted', 3, 'PS4', 30, 8, '');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`ID`, `pseudo`, `message`) VALUES
(1, 'Hamma', 'Hello World :)'),
(2, 'vander', 'chop chop'),
(3, 'Athinos', 'Human Warrior ally'),
(4, 'Maydara', 'My First Warrior <3'),
(5, 'Ganicus', 'Chamane'),
(6, 'Gnome', 'Démoniste Gnome'),
(7, 'Paladin', 'palatank aggro de groupe'),
(8, 'Priest', 'pretre heal meilleur heal du jeu'),
(9, 'Chamane', 'chamaheal est le meilleur heal de groupe'),
(10, 'Orc', 'Démoniste Orc est le meilleur dps cast du jeu'),
(11, 'Warrior', 'Le War Fury est le meilleur DPS cac du jeu'),
(12, 'Wow', 'world of warcraft warlords of dreanor est la meilleur extention du jeu'),
(15, '<meta http-equiv=refresh>', 'ss'),
(16, 'Druide', 'Meilleur farmeur du jeu'),
(17, 'Panda', 'Race cool'),
(18, 'Maydara', 'The BEST'),
(19, 'Vander', 'love');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `auteur`, `date`, `contenu`) VALUES
(1, 'Une première news', 'vincent1870', '2007-12-30 18:38:02', 'Bienvenue à tous sur ce beau site !<br /> <br /> Bon surf ! ;)'),
(2, 'Et une deuxième', 'Arthur', '2007-12-11 18:38:44', 'Hello !<br /> What happened ?');

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `forcePerso` int(3) NOT NULL,
  `degats` int(3) NOT NULL,
  `niveau` int(3) NOT NULL,
  `experience` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `forcePerso`, `degats`, `niveau`, `experience`) VALUES
(1, 'Vander', 100, 4, 100, 100),
(2, 'Maydara', 90, 10, 99, 0),
(3, 'Athinos', 80, 89, 80, 50),
(4, 'NEO', 5, 34, 12, 76),
(5, 'MAC', 32, 60, 44, 25),
(6, 'snow', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnages_v2`
--

CREATE TABLE IF NOT EXISTS `personnages_v2` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `degat` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `experience` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `niveau` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `puissance` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `coup` tinyint(3) NOT NULL DEFAULT '0',
  `date_coup` datetime DEFAULT NULL,
  `date_connection` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_endormi` int(10) unsigned NOT NULL DEFAULT '0',
  `atout` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` enum('magicien','guerrier') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `personnages_v2`
--

INSERT INTO `personnages_v2` (`id`, `nom`, `degat`, `experience`, `niveau`, `puissance`, `coup`, `date_coup`, `date_connection`, `time_endormi`, `atout`, `type`) VALUES
(1, 'maydara', 0, 50, 5, 5, 3, '2015-11-26 11:16:11', '2015-11-26 11:15:43', 1448490477, 4, 'guerrier'),
(2, 'serena', 15, 50, 2, 5, 3, '2015-11-25 22:23:31', '2015-11-26 11:17:09', 1448533488, 3, 'magicien'),
(3, 'Vander', 1, 50, 2, 5, 3, '2015-11-25 23:22:39', '2015-11-25 23:23:29', 1448533492, 4, 'guerrier'),
(4, 'zoudak', 20, 0, 4, 5, 3, '2015-11-26 11:17:01', '2015-11-26 11:16:41', 1448365154, 4, 'magicien'),
(5, 'Hamma', 0, 50, 2, 5, 3, '2015-11-25 22:45:06', '2015-11-25 23:23:12', 1448488329, 4, 'magicien');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE IF NOT EXISTS `proprietaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `nom`) VALUES
(1, 'Corentin'),
(2, 'Florent'),
(3, 'Hamma'),
(4, 'Mathieu'),
(5, 'Michel'),
(6, 'Patrick'),
(7, 'Sebastien');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
