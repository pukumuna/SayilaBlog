# SayilaBlog
Le Blog  de Sayila Philippe

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- HÃ´te : 127.0.0.1:3306
-- GÃ©nÃ©rÃ© le :  sam. 12 oct. 2019 Ã  11:35
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es :  `bloggk`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `post` tinyint(3) NOT NULL,
  `auteur` varchar(70) NOT NULL,
  `content` text NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `dateMaj` datetime NOT NULL,
  `datePublic` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_post` (`post`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- DÃ©chargement des donnÃ©es de la table `comments`
--

INSERT INTO `comments` (`id`, `post`, `auteur`, `content`, `validation`, `dateMaj`, `datePublic`) VALUES
(1, 1, 'Thierry Burdon', 'Les Â« gilets jaunes Â» cherchent Ã  se structurer et appellent Ã  un Â« acte 2 Â» samedi', 0, '2018-11-15 00:00:00', '2005-01-01 10:15:12'),
(2, 2, 'BenoÃ®t BrÃ©ville', 'Une molÃ©cule Ã©trange ferait maigrir et rajeunir le corps aprÃ¨s 40.', 0, '2018-11-16 00:00:00', '2005-01-01 10:17:15'),
(3, 3, 'Michel Ostrogoff', 'Tigresse abattue Ã  Paris: OÃ¹ en est-on un an aprÃ¨s?   Faites vos commentaires', 0, '2019-06-05 19:05:37', '2005-01-01 10:19:11'),
(4, 4, 'Jean-Baptiste Malet ', 'Les alÃ©as climatiques affectent irrÃ©mÃ©diablement six aspects cruciaux de la vie humaine.', 0, '2018-11-17 00:00:00', '2011-04-03 22:15:21'),
(6, 4, 'Jean Samu', 'Changement climatique : une bombe Ã  retardement\r\nEditorial. Il faut arrÃªter de croire que le climatosceptique, câ€™est toujours lâ€™autre, et rÃ©aliser enfin que, comme pour la menace nuclÃ©aire, lâ€™humanitÃ© est Ã  lâ€™origine de ce qui peut la dÃ©truire.', 0, '2018-11-20 18:25:49', '2011-04-03 22:15:57'),
(14, 2, 'Albert Cormier', 'Pendant deux jours, des dÃ©cideurs, penseurs, professeurs et entrepreneurs audacieux viendront partager leurs expÃ©riences, leurs idÃ©es et des projets innovants contribuant Ã  amÃ©liorer non seulement lâ€™accÃ¨s des jeunes Ã  une Ã©ducation de qualitÃ©, mais Ã©galement la pertinence de leur orientation et de leurs choix', 0, '2018-11-21 13:04:07', '2012-07-06 12:05:51'),
(13, 5, 'Philippe Bardoin', 'Pendant deux jours, des dÃ©cideurs, penseurs, professeurs et entrepreneurs audacieux viendront partager leurs expÃ©riences, leurs idÃ©es et des projets innovants contribuant Ã  amÃ©liorer non seulement lâ€™accÃ¨s des jeunes Ã  une Ã©ducation de qualitÃ©, mais Ã©galement la pertinence de leur orientation et de leurs choix. OK', 0, '2018-11-21 12:57:39', '2012-07-06 13:16:18'),
(11, 5, 'Philippe Mallaron', 'Lâ€™affaire secoue le secteur automobile mondial. Carlos Ghosn, 64 ans, prÃ©sident-directeur gÃ©nÃ©ral de Renault, Ã©galement prÃ©sident du conseil dâ€™administration de Nissan et Mitsubishi Motors. La garde Ã  vue du PDG est-elle appropriÃ©e ? ', 0, '2018-11-20 19:01:55', '2012-07-06 13:21:07'),
(12, 4, 'Philippe Mallaron', 'Les dÃ©bats du Monde Afrique reviennent Ã  Dakar le 22 & 23 novembre pour aborder les grands enjeux de lâ€™Ã©ducation et la formation des jeunes en Afrique de lâ€™Ouest.', 0, '2019-06-05 22:20:01', '2012-07-06 13:29:11'),
(48, 4, 'Georges Samuel Kabuku', 'Qu\'est ce qui rentre comme contenu pour le commentaire de ce news', 0, '2019-06-05 21:42:08', '2013-05-09 10:23:19'),
(50, 6, 'Georges Samuel', 'Les champs de Ndingi-ndingi sont superbes, fantastiques.', 4, '2019-09-13 15:57:20', '2019-09-29 15:33:48'),
(39, 0, 'Albert Cormier', 'albert cormier\r\n', 0, '1901-01-01 00:00:01', '2013-05-09 17:14:05'),
(40, 0, 'Albert Cormier', 'albert cormier\r\n', 0, '1901-01-01 00:00:01', '2017-02-08 09:12:16'),
(41, 0, 'Albert Cormier', 'albert cormier\r\n', 0, '1901-01-01 00:00:01', '2017-02-08 09:13:24'),
(42, 0, 'Philippe Mallaron', 'samuel  umtiti', 0, '1901-01-01 00:00:01', '2017-02-08 09:14:03'),
(43, 0, 'Philippe Mallaron', 'samuel  umtiti', 0, '1901-01-01 00:00:01', '2017-02-08 09:15:18'),
(44, 0, 'Thierry Burdon', 'Burdon a commentÃ©', 0, '1901-01-01 00:00:01', '2017-02-08 09:16:47'),
(45, 0, 'Philippe Bardoin', 'xxxxxxxxxxxxxxxxxxxxx', 0, '1901-01-01 00:00:01', '2017-02-08 09:26:34'),
(46, 2, 'Albert Cormier', 'Maintenant je suis sÃ»r de ce commentaire, car j\'en ai beaucoup bavÃ© pour y arriver.', 0, '1901-01-01 00:00:01', '2017-02-08 09:31:08'),
(51, 6, 'koffi', 'c\'est un vrai connard, n\'est ce pas ! il est parti chez les cannibales !', 1, '2019-09-28 16:10:26', '2018-10-21 14:30:11'),
(52, 3, 'bardon', 'comment faire prÃ©venir mieux ', 0, '2019-04-18 19:43:47', '2018-10-21 14:35:26'),
(53, 5, 'Jean Samu', 'commentaire aprÃ¨s frayeur, virus dans ordinateur.\r\nFaut-il acheter un anti-virus ? Quels sont les tendances actuelles ?', 0, '2019-09-29 13:52:06', '2018-10-21 15:04:55'),
(54, 5, 'Remuald', 'Les matchs prÃ©vues aujourd\'hui sur Roland Garros sont annulÃ©es Ã  cause de la pluie, tour.', 0, '2019-09-26 19:17:05', '2018-10-21 15:13:50'),
(57, 9, 'Marthe Kabuku', 'Ce dispositif est important, mieux vaut prÃ©venir que guÃ©rir !\r\nCela me fait penser au cancer de sein qui fait beaucoup de ravages au sein des femmes avant la mÃ©nopause. !!\r\nEt aprÃ¨s cela ? c\'est mon commentaire.', 1, '2019-10-12 09:38:42', '2018-10-21 15:19:41'),
(59, 9, 'Belinda Kabuku', 'Revoir le cours de comptabilitÃ© pendant le week-end permet de terminer la semaine et de se prÃ©parer pour la suite. Mais il ne faut pas oublier de se dÃ©tendre pendant le week-end ! ', 0, '2019-09-29 18:37:27', '2019-09-29 18:33:41'),
(60, 6, 'Nicolas Hulot', 'Il faut choyer les tigres.', 0, '2019-10-07 22:58:52', '2019-10-07 22:58:52');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(70) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `chapo` varchar(750) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `dateCre` datetime NOT NULL,
  `dateMaj` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- DÃ©chargement des donnÃ©es de la table `posts`
--

INSERT INTO `posts` (`id`, `auteur`, `titre`, `chapo`, `content`, `slug`, `dateCre`, `dateMaj`) VALUES
(1, 'Aline Leclerc', 'Les Â« gilets jaunes Â» cherchent Ã  se structurer et appellent Ã  un Â« acte 2 Â» samedi', 'chapo', 'Câ€™est la fin dâ€™aprÃ¨s-midi, samedi 17 novembre, Ã  Paris. Toute la journÃ©e, des petites grappes de Â« gilets jaunes Â» ont jouÃ© au chat et Ã  la souris avec les CRS sur les Champs-ElysÃ©es, lanÃ§ant des actions totalement improvisÃ©es. Les manifestants parisiens ont mÃªme rÃ©ussi Ã  scander des Â« Macron dÃ©mission ! Â» aux abords de lâ€™ElysÃ©e, concrÃ©tisant ainsi lâ€™un de leurs objectifs affichÃ©s. Mais en cette fin de journÃ©e, la mÃªme question revient sur toutes les lÃ¨vres : et maintenant, quâ€™est-ce quâ€™on fait ?\r\n\r\nElle anime, par exemple, un petit ceracle qui sâ€™est formÃ© au milieu de la place de la Concorde, oÃ¹ plus dâ€™un millier de Â« gilets jaunes Â» ont rÃ©ussi Ã  couper la circulation. Â« Il faut continuer ce soir, tout bloquer maintenant quâ€™on est lÃ  ! Â», lance Farouk, 43 ans, technicien lumiÃ¨re. Â« Les gens ne sont pas prÃªts, rÃ©torque Franck, 29 ans, cadre dans une sociÃ©tÃ© de consulting. Nous ne sommes pas assez nombreux. Il faut construire le mouvement. Â» Lui fait partie du groupe parvenu aux abords de lâ€™ElysÃ©e : Â« On y est allÃ© trois fois et trois fois on sâ€™est fait gazer ! A quoi Ã§a sert ? Il faut dâ€™autres rendez-vous, insiste-t-il. Câ€™est comme Ã§a quâ€™on gagnera en popularitÃ©. Aujourdâ€™hui, on Ã©tait les premiers. Câ€™est important, Ã§a, dâ€™avoir fait le premier pas. Â»\r\n\r\nCe Â« premier pas Â», expression dâ€™un ras-le-bol sur lâ€™augmentation du prix des carburants et, plus gÃ©nÃ©ralement, sur lâ€™impression de perdre en pouvoir dâ€™achat, au moins 290 000 Â« gilets jaunes Â» lâ€™ont fait samedi, sur plus de 2 000 points de blocage en France, selon les chiffres du ministÃ¨re de lâ€™intÃ©rieur. Des chiffres que les manifestants jugent trÃ¨s sous-estimÃ©s.\r\n\r\nÂ« Pour un mouvement aussi spontanÃ©, horizontal, sans base professionnelle, politique, ou rÃ©gionale, on peut parler dâ€™un succÃ¨s, estime le politologue JÃ©rÃ´me Sainte-Marie. Il nâ€™y avait rien dâ€™Ã©vident Ã  ce que cette excitation sur Internet dÃ©bouche sur une action rÃ©elle, coordonnÃ©e. Câ€™est Ã©tonnant et inquiÃ©tant pour le gouvernement. Car ce 17 novembre, les gens ont pris conscience de leur force. Ils ont dÃ©couvert leur capacitÃ© Ã  faire. Â»\r\nArticle rÃ©servÃ© Ã  nos abonnÃ©s Lire aussi Â« Gilets jaunes Â» : pour Laurent Berger, la rÃ©ponse du premier ministre Â« manque de cap et de sens Â»\r\n\r\nOrganisatrice dâ€™un rassemblement Ã  La Tour-du-Pin, commune de 8 000 habitants dans lâ€™IsÃ¨re, Cyrille, 47 ans, employÃ©e dans le secteur social, nâ€™en revient toujours pas : Â« Le DauphinÃ© LibÃ©rÃ© ne parle que de 500 personnes, mais on Ã©tait au moins 800. Le maire nâ€™avait jamais vu Ã§a ! Â» Elle prÃ©voit une rÃ©union cette semaine sur la suite Ã  donner Ã  la mobilisation. Sans attendre, en IsÃ¨re comme dans toute la France, certains Â« gilets jaunes Â» ont poursuivi les blocages dimanche. Environ 150 sites Ã©taient concernÃ©s, Ã  MontÃ©limar, Chalon-sur-SaÃ´ne, Caen, dans la Meuse, le Vaucluse ou en Nouvelle-Aquitaine.\r\n', 'slug', '2018-12-14 15:24:45', '2018-12-14 15:24:45'),
(2, 'Marine Lenoir', 'Une molÃ©cule Ã©trange ferait maigrir et rajeunir le corps aprÃ¨s 40.', 'Une molÃ©cule Ã©trange ferait maigrir et rajeunir le corps aprÃ¨s 40.', 'Une molÃ©cule Ã©trange ferait maigrir et rajeunir le corps aprÃ¨s 40 ans, affirme un prix Nobel de MÃ©decine.\r\nEncore la possibilitÃ© d\'une cure de Jouvence !\r\n(Paris, FR) â€“ â€“ Le secret des gens qui mangent ce qu\'ils veulent sans prendre un gramme vient peut-Ãªtre dâ€™Ãªtre enfin rÃ©vÃ©lÃ© au grand public.\r\n\r\nLâ€™expert en nutrition Fabien Delcourt, responsable de lâ€™Ã©quipe de recherche de Nutrition Optimale et dÃ©jÃ  passÃ© sur France 3 et Radio France Bleu, a dÃ©jÃ  Ã©tÃ© responsable de nombreuses rÃ©vÃ©lations choquantes.\r\n\r\nMais sa derniÃ¨re annonce pourrait bien Ãªtre le meilleur accomplissement de sa jeune carriÃ¨re:\r\n\r\nDans une confÃ©rence de presse dramatique hier, M.Delcourt et le fondateur de Nutrition Optimale, Emmanuel Fredenrich, auteur de renom d\'un livre bestseller sur la nutrition, ont annoncÃ© avoir dÃ©couvert une molÃ©cule quâ€™ils ont qualifiÃ©e de â€œmolÃ©cule Fontaine de Jouvenceâ€, qui serait le secret nÂ°1 pour maigrir et rajeunir aprÃ¨s 40 ans.\r\n\r\nâ€œLa plupart des gens suivent des rÃ©gimes, mais ils ne maigrissent jamais, car sans cette molÃ©cule, il est strictement impossible de maigrirâ€, ont-ils indiquÃ© Ã  un groupe de journalistes et de chercheurs.\r\n\r\nLa solution radicale de Nutrition Optimale a Ã©tÃ© inspirÃ©e par plus de 1073 Ã©tudes cliniques qui ont Ã©tÃ© analysÃ©es en dÃ©tails. Elle est basÃ©e sur la dÃ©couverte du prix Nobel de mÃ©decine Elizabeth Blackburn, et a depuis Ã©tÃ© validÃ©e par les universitÃ©s d\'Harvard et d\'Oxford dans des Ã©tudes dÃ©taillÃ©es.\r\n\r\nSelon le jeune coach en nutrition Ã  la reconnaissance dÃ©jÃ  mondiale, â€œil existe un rituel Ã©tonnant de 2 minutes dÃ©couvert par ce prix Nobel de mÃ©decine qui permettrait de relancer la production de cette molÃ©cule. Il sâ€™agit du mÃªme rituel utilisÃ© par les acteurs et cÃ©lÃ©britÃ©s pour perdre du poids rapidement avant un rÃ´le dans un filmâ€, a-t-il indiquÃ©.\r\n\r\nMais ce nâ€™est pas tout. Selon lâ€™expert, â€œil y a un certain nombre dâ€™aliments mortels que lâ€™on mange rÃ©guliÃ¨rement en croyant quâ€™ils sont â€œsainsâ€,â€ M.Delcourt a annoncÃ©. â€œSi on peut arrÃªter la consommation de ces aliments terribles, la perte de poids qui sâ€™ensuit est impressionnante.â€\r\n\r\nâ€œLa puissante industrie agroalimentaire a dÃ©pensÃ© plus de 31,7 milliards dâ€™euros pour vous cacher la vÃ©ritÃ© sur ces aliments, et ils rÃ©duisent fortement cette molÃ©cule miracle.â€, a-t-il continuÃ©.\r\n\r\nCes dÃ©couvertes choquantes sont donc ce qui a menÃ© Nutrition Optimale Ã  crÃ©er ce rituel rÃ©volutionnaire de perte de poids rapide ne prenant que 2 minutes par jour â€” qui a dÃ©jÃ  fourni des rÃ©sultats remarquables Ã  des centaines de patients. AprÃ¨s avoir investi, selon leurs chiffres, plus de 77 951,14â‚¬, ils ont fini par crÃ©er ce quâ€™ils appellent dÃ©jÃ  â€œla meilleure dÃ©couverte de lâ€™histoire de notre entrepriseâ€. Une dÃ©couverte qui aurait dÃ©jÃ  Ã©tÃ© utilisÃ©e par plusieurs acteurs amÃ©ricains reconnus.\r\n\r\nâ€œLes 128 patients du groupe dâ€™essai ayant suivi ce rituel rapportent une perte de poids moyenne de 3,89 kilos en 30 jours, sans avoir Ã  manger moins ou Ã  se priver - ainsi qu\'une rÃ©duction de prÃ¨s de 62,3% de l\'apparence de leurs ridesâ€, a-t-il rÃ©vÃ©lÃ© hier.\r\n\r\nDepuis, des articles dans les journaux Le Monde, Le Figaro et Le Parisien ont fait beaucoup de bruit quand ils ont fait l\'Ã©loge de ce rituel Ã©tonnant dÃ©veloppÃ© par la jeune sociÃ©tÃ© et ce prix Nobel de MÃ©decine. Et des articles parus dans les publications scientifiques des universitÃ©s d\'Harvard et d\'Oxford ont validÃ© son efficacitÃ© pour la perte de poids et le rajeunissement du corps.\r\n\r\nLa science derriÃ¨re ce rituel est complÃ¨tement nouvelle, et a Ã©tÃ© accueillie avec un mÃ©lange de fascination et dâ€™enthousiasme chez les journalistes. Juste aprÃ¨s leur annonce, les responsables de Nutrition Optimale ont publiÃ© une prÃ©sentation en vidÃ©o, pour que le public puisse Ãªtre informÃ© concernant ces aliments qui favorisent la prise de poids Ã  Ã©viter absolument, et pour en apprendre plus sur ce rituel secret de perte de poids basÃ©e sur la science.\r\n\r\nRegardez la prÃ©sentation ici:\r\n\r\n', 'slug', '2018-12-14 15:24:45', '2019-09-28 12:55:26'),
(3, 'Romain Lescurieux', 'Tigresse abattue Ã  Paris: OÃ¹ en est-on un an aprÃ¨s?   ', 'chapo', 'Lâ€™association Paris Animaux Zoopolis organise ce lundi un happening sur le parvis du TrocadÃ©ro en hommage Ã  la tigresse Merovy abattue en plein Paris, lâ€™an dernierâ€¦ \r\nUn tigre de SibÃ©rie a attaquÃ©e une soigneuse dans un zoo russe (illustration) â€” Pixabay\r\n\r\n    Fin novembre 2017, la tigresse Merovy sâ€™Ã©tait Ã©chappÃ©e de son cirque et son propriÃ©taire avait Ã©tÃ© contraint de lâ€™abattre. En sa mÃ©moire, Paris Animaux Zoopolis prÃ©pare un happening lundi matin.\r\n    Â« Cette action nationale a pour objectif dâ€™exiger du prÃ©sident de la RÃ©publique une loi interdisant la prÃ©sence des animaux dans les cirques Â», rappelle la prÃ©sidente de lâ€™association.\r\n    Le rapport Â« Animaux en ville Â» a Ã©tÃ© prÃ©sentÃ© au dernier conseil de Paris. Au total, plus de 200 participants ont ainsi pris part aux travaux de la mission et 61 prÃ©conisations ont Ã©tÃ© retenues.\r\n\r\nUne scÃ¨ne de crime avec une silhouette dessinÃ©e au sol avec du faux sangâ€¦ Ce lundi midi, l\'association Paris Animaux Zoopolis organise un happening trÃ¨s visuel sur le parvis du TrocadÃ©ro en hommage Ã  la tigresse Mevy abattue en plein Paris, lâ€™an dernier. Â« Des ballons en forme de lettres M, E, V et Y ainsi que des pancartes seront brandis pour ne pas lâ€™oublier Â», indique le collectif. Des Ã©lus seront prÃ©sents, notamment les dÃ©putÃ©s Vincent Ledoux et Dimitri Houbron, le maire du 2e Jacques Boutault (EELV) et la conseillÃ¨re de Paris Danielle Simonnet (LFI).\r\n\r\nÂ« Cette action nationale a pour objectif dâ€™exiger du prÃ©sident de la RÃ©publique une loi interdisant la prÃ©sence des animaux dans les cirques Â», rappelle, Amandine Sivens, cofondatrice de lâ€™association Paris Animaux Zoopolis. ', 'slug', '2018-12-14 15:24:45', '2018-12-14 15:24:45'),
(4, 'AndrÃ© Garric', 'Les alÃ©as climatiques affectent irrÃ©mÃ©diablement sept aspects cruciaux de vie humaine.', 'Les alÃ©as climatiques affectent irrÃ©mÃ©diablement sept aspects cruciaux de vie humaine.', 'DÃ©cÃ¨s, famines, pÃ©nuries dâ€™eau, migrations : tous les secteurs touchÃ©s par le changement climatique\r\nLes alÃ©as climatiques et la pollution atmosphÃ©riques affectent irrÃ©mÃ©diablement six aspects cruciaux de la vie humaine : santÃ©, alimentation, eau, Ã©conomie, infrastructures et sÃ©curitÃ©.\r\nCeux qui croient que les effets du changement climatique se rÃ©sument aux incendies en Californie ou aux inondations dans lâ€™Aude, aussi meurtriers soient-ils, nâ€™ont quâ€™une mince idÃ©e de la gravitÃ© de la situation. Selon la vaste Ã©tude publiÃ©e dans Nature Climate Change lundi 19 novembre, lâ€™humanitÃ© fait les CÃ´tÃ© santÃ©, les alÃ©as climatiques sÃ¨ment la mort, en raison dâ€™hyperthermies (plus de 780 Ã©vÃ©nements de surmortalitÃ© ont Ã©tÃ© recensÃ©s dans le monde entre 1980 et 2014 sous lâ€™effet de vagues de chaleur), de noyades (3 000 personnes sont mortes dans des inondations en Chine en 1998), de famines (800 000 dÃ©cÃ¨s aprÃ¨s les sÃ©cheresses qui ont frappÃ© lâ€™Ethiopie dans les annÃ©es 1980), de traumatismes contondants durant des tempÃªtes ou dâ€™asphyxies lors dâ€™incendies.\r\n\r\nLa morbiditÃ© est Ã©galement en augmentation, par exemple lorsque des troubles cardiaques ou respiratoires surviennent lors de pics de chaleur. Les blessures sont lÃ©gion sous lâ€™effet dâ€™incendies, dâ€™inondations ou de tempÃªtes. Ces deux derniers alÃ©as, de mÃªme que les changements de tempÃ©ratures et de prÃ©cipitations, favorisent la recrudescence dâ€™Ã©pidÃ©mies, telles que le paludisme, la dengue, le cholÃ©ra ou des diarrhÃ©es. Les risques climatiques touchent Ã©galement la santÃ© mentale : des dÃ©pressions et des stress post-traumatiques ont Ã©tÃ© recensÃ©s aprÃ¨s des tempÃªtes aux Etats-Unis, comme lâ€™ouragan Katrina en 2005, des inondations au Royaume-Uni en 2007 et ou la canicule en France en 2003. En Australie, dÃ©pression et suicides guettent les fermiers, alors que le pays connaÃ®t la pire sÃ©cheresse de son histoire.\r\nFaramineuses pertes Ã©conomiques\r\n\r\nLe dÃ©rÃ¨glement climatique affecte par ailleurs la production agroalimentaire de maniÃ¨re directe (un tiers de la production de cÃ©rÃ©ales russe a Ã©tÃ© perdue en raison des incendies et de la sÃ©cheresse de 2010 ; les trois quarts du bÃ©tail ont succombÃ© Ã  la sÃ©cheresse au Kenya en 2000) ou indirecte (chaque journÃ©e oÃ¹ la tempÃ©rature dÃ©passe 38 Â°C rÃ©duit les rendements annuels de 5 % aux Etats-Unis ; lâ€™acidification des ocÃ©ans augmente le blanchissement des coraux, limitant ainsi lâ€™habitat des poissons). La quantitÃ© et la qualitÃ© de lâ€™eau potable sont un autre enjeu crucial, avec des pÃ©nuries, des pollutions et des maladies entraÃ®nÃ©es par les vagues de chaleur, des inondations, des feux et des sÃ©cheresses.\r\n\r\n \r\n', 'slug', '2018-12-14 15:24:45', '2019-10-03 19:29:25'),
(5, 'Jean Baptiste Jacquin', 'Une agence du travail dâ€™intÃ©rÃªt gÃ©nÃ©ral pour dÃ©velopper les alternatives Ã  la prison', 'chapo', 'Le gouvernement veut prouver que les choses peuvent changer en matiÃ¨re de peine de travail dâ€™intÃ©rÃªt gÃ©nÃ©ral (TIG) et crÃ©e une agence nationale pour la dÃ©velopper Ã  grande Ã©chelle. Une mesure parÃ©e de nombreuses vertus dans la lutte contre la rÃ©cidive car elle est Ã  la fois une sanction (un travail non rÃ©munÃ©rÃ©), une rÃ©paration (une mesure qui profite Ã  la sociÃ©tÃ©) et un cadre socialisant (le respect dâ€™horaires, de contraintes techniques, dâ€™une hiÃ©rarchie).\r\nSur la base dâ€™un rapport remis en dÃ©but dâ€™annÃ©e au premier ministre par le dÃ©putÃ© LRM Didier Paris et lâ€™entrepreneur du numÃ©rique David Layani, la ministre de la justice, Nicole Belloubet, devait dÃ©voiler lundi 19 novembre les contours dâ€™une Â« Agence du travail dâ€™intÃ©rÃªt gÃ©nÃ©ral et de lâ€™insertion professionnelle des personnes placÃ©es sous main de justice Â» qui sera crÃ©Ã©e le 10 dÃ©cembre.\r\n\r\nSa mission sera dâ€™abord de stimuler lâ€™offre de TIG auprÃ¨s des collectivitÃ©s territoriales, Ã©tablissements publics, associations et bientÃ´t, si la disposition figurant dans la loi de programmation de la justice est votÃ©e, dans les entreprises du secteur de lâ€™Ã©conomie sociale et solidaire. Mais aussi de fluidifier lâ€™information et donc la possibilitÃ© pour la justice de recourir aisÃ©ment Ã  cette sanction grÃ¢ce Ã  une plate-forme numÃ©rique. Celle-ci permettra au juge dâ€™avoir sur son Ã©cran au tribunal la disponibilitÃ© des TIG, leur nature et leur localisation. Le plafond dâ€™un TIG devrait Ã©galement Ãªtre portÃ© par la loi de 280 Ã  400 heures.\r\nRelancer la formation en dÃ©tention\r\n\r\nCar les magistrats se plaignent souvent dâ€™une inadÃ©quation des TIG proposÃ©s avec le profil des dÃ©linquants, dâ€™une insuffisance dâ€™offres et dâ€™un manque de suivi. Le Forum du TIG, regroupant des associations qui accueillent des Â« tigistes Â», dÃ©plore au contraire un manque de confiance des juges dans cette mesure. \r\n\r\nLe prÃ©sident de la RÃ©publique a plaidÃ© pour le dÃ©veloppement du TIG en lieu et place des courtes peines de prison. Les deux sanctions ne sont pas substituables, mais, pour avoir une idÃ©e des ordres de grandeur, quelque 90 000 peines dâ€™emprisonnement infÃ©rieures Ã  six mois ont Ã©tÃ© prononcÃ©es en 2017 tandis que 35 000 mesures de TIG ont Ã©tÃ© mises Ã  exÃ©cution.\r\n\r\nUn pilote de la plate-forme devrait Ãªtre expÃ©rimentÃ© dÃ¨s janvier 2019 dans quatre juridictions avant dâ€™Ãªtre dÃ©ployÃ© sans doute au second semestre. Une Ã©quipe dâ€™une dizaine de personnes emmenÃ©es par Thierry Alves, jusquâ€™ici directeur gÃ©nÃ©ral adjoint chargÃ© de la formation et de lâ€™emploi au conseil rÃ©gional Nouvelle-Aquitaine, devrait diriger lâ€™agence, qui aura 58 dÃ©lÃ©guÃ©s territoriaux rÃ©partis dans les services pÃ©nitentiaires dâ€™insertion et de probation.\r\n\r\nPar ailleurs, lâ€™agence va intÃ©grer les 215 agents du Service de lâ€™emploi pÃ©nitentiaire, basÃ© Ã  Tulle (CorrÃ¨ze). Avec pour objectif de relancer la formation en dÃ©tention, en relation avec les rÃ©gions, et le travail afin de lutter contre lâ€™oisivetÃ© et mieux prÃ©parer la rÃ©insertion des dÃ©tenus. La part des personnes exerÃ§ant une activitÃ© rÃ©munÃ©rÃ©e en prison est passÃ©e de 46,2 % en 2000 Ã  moins de 29 % aujourdâ€™hui.\r\n', 'slug', '2018-12-14 15:24:45', '2018-12-14 15:24:45'),
(6, 'Romain Lescurieux', 'Tigresse abattue Ã  Paris: OÃ¹ en est-on un 3 ans aprÃ¨s?   ', 'Tigresse abattue Ã  Paris: OÃ¹ en est-on un 3 ans aprÃ¨s?   ', 'Lâ€™association Paris Animaux Zoopolis organise ce lundi un happening sur le parvis du TrocadÃ©ro en hommage Ã  la tigresse Merovy abattue en plein Paris, lâ€™an dernierâ€¦ \r\nUn tigre de SibÃ©rie a attaquÃ©e une soigneuse dans un zoo russe (illustration) â€” Pixabay\r\n\r\n    Fin novembre 2017, la tigresse Merovy sâ€™Ã©tait Ã©chappÃ©e de son cirque et son propriÃ©taire avait Ã©tÃ© contraint de lâ€™abattre. En sa mÃ©moire, Paris Animaux Zoopolis prÃ©pare un happening lundi matin.\r\n    Â« Cette action nationale a pour objectif dâ€™exiger du prÃ©sident de la RÃ©publique une loi interdisant la prÃ©sence des animaux dans les cirques Â», rappelle la prÃ©sidente de lâ€™association.\r\n    Le rapport Â« Animaux en ville Â» a Ã©tÃ© prÃ©sentÃ© au dernier conseil de Paris. Au total, plus de 200 participants ont ainsi pris part aux travaux de la mission et 61 prÃ©conisations ont Ã©tÃ© retenues.\r\n\r\nUne scÃ¨ne de crime avec une silhouette dessinÃ©e au sol avec du faux sangâ€¦ Ce lundi midi, l\'association Paris Animaux Zoopolis organise un happening trÃ¨s visuel sur le parvis du TrocadÃ©ro en hommage Ã  la tigresse Mevy abattue en plein Paris, lâ€™an dernier. Â« Des ballons en forme de lettres M, E, V et Y ainsi que des pancartes seront brandis pour ne pas lâ€™oublier Â», indique le collectif. Des Ã©lus seront prÃ©sents, notamment les dÃ©putÃ©s Vincent Ledoux et Dimitri Houbron, le maire du 2e Jacques Boutault (EELV) et la conseillÃ¨re de Paris Danielle Simonnet (LFI).\r\n\r\nÂ« Cette action nationale a pour objectif dâ€™exiger du prÃ©sident de la RÃ©publique une loi interdisant la prÃ©sence des animaux dans les cirques Â», rappelle, Amandine Sivens, cofondatrice de lâ€™association Paris Animaux Zoopolis. ', 'slug', '2018-12-14 15:24:45', '2019-09-28 12:54:24'),
(9, 'Institut National de Cancer', 'DÃ©pistage du cancer colorectal', 'DÃ©pistage du cancer colorectal', 'Pourquoi ce dÃ©pistage est-il important ?\r\nLe cancer colorectal est la 2e cause dÃ©cÃ¨s en France. Il se dÃ©veloppe lentement Ã  l\'intÃ©rieur du colon ou du rectum, le plus souvent dans Ã  partir de petites lÃ©sions dÃ©nommÃ©es polypes. Ce cancer est l\'un des plus frÃ©quents et touche 4 hommes sur 100 et 3 femmes sur 100, le plus souvent aprÃ¨s l\'Ã¢ge de 50 ans.\r\nL\'age de courir est passÃ©,il suffit de marcher couramment.', 'DÃ©pistage du cancer colorectal', '2019-09-02 15:20:36', '2019-10-11 18:18:30'),
(10, 'Gerard Darmarin', 'Taxe d\'habitation', 'Taxe d\'habitation', 'Le gouvernement a engagÃ© comme prÃ©vu une large reforme de la fiscalitÃ© locale, dont la taxe d\'habitation.\r\nConcrÃ¨tement elle concerne 80% des mÃ©nages pour leur habitation principale. cette annÃ©e la rÃ©duction peut aller jusqu\'Ã  65% et pourrait atteindre 100% pour un certain nombre de mÃ©nages Ã  l\'horizon 2020.\r\nSeront Ã©ligibles Ã  une rÃ©duction Ã  100% les mÃ©nages qui respectent les conditions de revenu fiscal de rÃ©fÃ©rence (RFR). Et puis ! ', 'Taxe d\'habitation', '2019-10-03 13:41:05', '2019-10-12 10:57:23');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role` varchar(20) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `dateMaj` datetime NOT NULL,
  PRIMARY KEY (`role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- DÃ©chargement des donnÃ©es de la table `roles`
--

INSERT INTO `roles` (`role`, `libelle`, `dateMaj`) VALUES
('admin', 'peut tout faire sans aucune restriction', '2018-12-07 00:00:00'),
('abonnÃ©', 'peut uniquement Ã©crire et gÃ©rer ses commentaires', '2018-12-07 00:00:00'),
('auteur', 'abonnÃ© + publication (validation) de ses comment', '2018-12-07 00:00:00'),
('Ã©diteur', 'auteur + publier et gestion des autres + posts', '2018-12-07 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateMaj` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- DÃ©chargement des donnÃ©es de la table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `pseudo`, `password`, `dateMaj`, `email`, `actif`, `role`) VALUES
(1, 'Ndundu', 'Philippe', 'ya nsayila', 'ndundu', '2019-04-07 16:19:02', 'philippe', 1, 'abonne'),
(2, 'Philippe', 'Bardoin', 'Philippe', 'bardoin', '2018-12-07 00:00:00', 'bardoin', 1, 'abonnÃ©'),
(3, 'Thierry', 'Bardon', 'Thierry', 'bardon', '2018-12-07 00:00:00', 'bardon', 1, 'abonnÃ©'),
(4, 'Benoit', 'Breville', 'Benoit', 'breville', '2018-12-07 00:00:00', 'breville', 1, 'abonnÃ©'),
(5, 'Albert', 'Cormier', 'Albert', 'cormier', '2018-12-07 00:00:00', 'cormier', 1, 'abonnÃ©'),
(6, 'philippe', 'sayila', 'sayila', 'sayila', '2018-12-07 00:00:00', 'gesak@orange.fr', 1, 'admin'),
(7, 'Jean-Baptiste', 'Mallet', 'Jean-Baptiste', 'mallet', '2018-12-07 00:00:00', 'mallet', 1, 'abonnÃ©'),
(8, 'Philippe', 'Malloron', 'Philipon', 'malloron', '2018-12-07 00:00:00', 'malloron', 1, 'abonnÃ©'),
(9, 'Michel', 'Ostrogoff', 'Michel', 'ostrogoff', '2018-12-07 00:00:00', 'ostrogoff', 1, 'abonnÃ©'),
(10, 'antoine', 'misisa', 'koffi', 'olomide', '2019-04-15 19:52:45', 'tony@antoine', 1, 'abonne'),
(22, 'muzola', 'marthe', 'mathy', 'kiange', '2019-05-11 16:09:51', 'kiange@orange.fr', 1, 'abonne'),
(23, 'carthy', 'mccarthy', 'paulin', 'beatles', '2019-05-11 16:14:39', 'beatles@orange.fr', 1, 'abonne'),
(24, 'Becker', 'Boris', 'Bboum', 'bboum', '2019-05-11 16:23:03', 'bboum@orange.fr', 1, 'abonne'),
(25, 'Kumuna', 'Elisabeth', 'Mbangi', 'kumuna', '2019-09-02 13:43:53', 'mayunda@orange.fr', 1, 'admin'),
(26, 'Kabuku', 'Belinda', 'Belinde', 'belinda', '2019-09-27 13:09:29', 'belinda@orange.fr', 1, 'abonne'),
(27, 'Elise', 'Berthy', 'Bedime', 'elise', '2019-10-08 15:06:52', 'eliseÃ @orange.fr', 1, 'abonne'),
(28, 'Tom', 'sakala', 'Roland', 'sakala', '2019-10-08 15:09:51', 'sakala@bbox.fr', 1, 'abonne');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
