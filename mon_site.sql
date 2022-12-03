-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 mars. 2019 à 15:47
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon site`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `prenom`, `mail`, `pass`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_uti` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `nb_l` int(11) NOT NULL,
  `nb_j` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `etat` enum('Louer','Acheter') NOT NULL,
  `dateL` date DEFAULT NULL,
  `livraison` enum('livré','non livré') NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_uti`, `id_livre`, `nb_l`, `nb_j`, `prix`, `num`, `etat`, `dateL`, `livraison`, `date`) VALUES
(36, 4, 4, 1, 0, 90, 549358532, 'Acheter', NULL, 'non livré', '2019-10-01'),
(37, 4, 6, 23, 0, 13800, 549358532, 'Acheter', NULL, 'non livré', '2019-10-01'),
(38, 4, 2, 5, 0, 500, 549358532, 'Acheter', NULL, 'non livré', '2019-10-01'),
(39, 4, 5, 4, 0, 1600, 549358532, 'Acheter', NULL, 'non livré', '2019-10-01'),
(40, 4, 10, 2, 0, 800, 549358532, 'Acheter', NULL, 'non livré', '2019-10-01'),
(41, 4, 14, 2, 0, 2000, 549358532, 'Acheter', NULL, 'non livré', '2022-11-01'),
(42, 4, 21, 1, 0, 400, 549358532, 'Acheter', NULL, 'non livré', '2022-11-01'),
(45, 4, 28, 1, 0, 1250, 549358532, 'Acheter', NULL, 'non livré', '2022-11-01'),
(46, 5, 5, 1, 0, 400, 549358532, 'Acheter', NULL, 'non livré', '2022-11-01'),
(47, 1, 4, 2, 0, 180, 12, 'Acheter', NULL, 'non livré', '2022-11-02');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `p_ach` int(11) NOT NULL,
  `dispo` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `nb_v` int(11) NOT NULL,
  `disc` text NOT NULL,
  `promo` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `p_ach`, `dispo`, `stock`, `cat`, `nb_v`, `disc`, `promo`, `image`) VALUES
(1, 'Harry Potter 1', 'JK. Roling', 200, 'non', 143, 'Fantastiques', 0, 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l\'effroyable V., le mage dont personne n\'ose prononcer le nom.', 3, 'harry_potter_1.jpg'),
(2, 'Harry Potter 2', 'JK. Roling', 200, 'oui', 156, 'Fantastiques', 1, 'Une rentrée fracassante en voiture volante, une étrange malédiction quis\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos ! Entre les cours de potions magiques, les matchs de Quidditch et les combats de mauvais sorts, Harry et ses amis Ron et Hermione trouveront-ils le temps de percer le mystère de la Chambre des Secrets ?', 3, 'harry_potter_2.jpg'),
(4, 'La Maison biscornue', 'Agatha Christie', 300, 'oui', 148, 'Policier', 1, 'Trois générations de la famille Léonides vivent sous le même toit. Celui d’une vaste maison un rien biscornue… Quand le grand-père, un patriarche tyrannique, meurt assassiné, tout le monde est soupçonné, même ses petits enfants ! Et justement, Joséphine, douze ans, semble s’intéresser de près au crime et aux différentes façons d’éliminer son prochain. Un véritable petit monstre… Or on devrait toujours se méfier des petits monstres, aussi adorables soient-ils.', 1, 'La_Maison_biscornue.jpeg'),
(5, 'Un appartement à paris', 'Guillaume Musso', 1000, 'oui', 152, 'Thriller', 2, 'Paris, un atelier d\'artiste au fond d\'une allée verdoyante. \r\nMadeline, une ex-flic londonienne, y est venue pour panser ses blessures. \r\nGaspard, un auteur misanthrope, l\'a loué pour écrire dans la solitude. \r\nÀ la suite d\'une méprise, ces deux écorchés vifs sont contraints de cohabiter quelque temps. \r\nDans l\'atelier, où plane encore le fantôme de l\'ancien propriétaire, Madeline et Gaspard vont mettre au jour un secret terrifiant. \r\nEt cette découverte glaçante va les forcer à affronter leurs propres démons dans une enquête vertigineuse qui les changera à jamais.', 2, 'appartement_a_paris.jpg'),
(6, 'Fairy Tail', 'Hiro Mashima', 1500, 'oui', 138, 'Manga', 1, 'Les guildes magiques sont des associations. \r\nElles proposent différentes tâches aux magiciens, \r\nallant de la recherche d\'un objet à l\'attaque en règle. \r\nLucy, Une jeune fille, rêve de devenir magicienne.\r\nUn jour, elle rencontre Natsu, un magicien maîtrisant le feu. \r\nCe dernier l\'invite alors à rejoindre sa guilde. \r\nIl s\'agit de la célèbre Fairy Tail, le sujet de tous les rêves de Lucy.\r\nMais celle-ci est bien mystérieuse semble être à l\'origine de nombreux scandales...', 2, 'fairy_tail.jpg'),
(7, 'Your Lie In April', 'Naoshi Arakawa', 1500, 'oui', 161, 'Manga', 0, 'À 11 ans, Kôsei Arima est déjà un virtuose du piano. Formé avec la plus grande sévérité par une mère qui lui inflige d’interminables séances de répétition, il écume inlassablement tous les concours nationaux, où son talent éblouit les juges. Mais le jour où sa mère meurt d’une longue maladie, il perd complètement la faculté de jouer de son instrument : victime d’un blocage psychologique, le jeune garçon n’entend plus le son du piano quand il essaie d’en jouer…', 2, 'your_lie_in_april.png'),
(8, 'Violet Evergarden', 'Kana Akatsuki', 1500, 'non', 157, 'Light novel', 0, 'L\'histoire se déroule autour d\'une jeune fille qui effectue le métier de « poupées de souvenirs automatiques » : des poupées initialement créées par le professeur Orland pour aider sa femme aveugle Mollie à écrire ses romans, et plus tard louées à d\'autres personnes qui avaient besoin de leurs services. Le terme se réfère aux personnes qui remplissent la fonction d\'écrivain public, dont le but est de retranscrire la parole et les sentiments des gens. Suite à 4 ans de guerre acharnée, cette jeune fille au lourd passé tente non sans mal de reconstruire son avenir, à commencer par l\'exercice de ce métier. Cependant, parmi toutes les blessures qui lui auront été infligées au cours de la guerre, il y en a une qui semble ne pas vouloir se refermer. Les mots d\'un être cher résonnent encore dans son cœur, sans que la jeune fille en sache la véritable raison. Elle veut savoir, comprendre leur signification. Ainsi commence la quête de Violet Evergarden, apprentissage mêlé de lettres, de rencontres et d\'émotions variées…', 1, 'Violet_Evergarden.jpg'),
(9, 'La Tresse', 'Laetitia Colombani', 3000, 'oui', 157, 'Fiction', 0, 'Inde. Smita est une Intouchable. Elle rêve de voir sa fille échapper à sa condition misérable et entrer à l’école.\r\nSicile. Giulia travaille dans l’atelier de son père. Lorsqu’il est victime d’un accident, elle découvre que l’entreprise familiale est ruinée.\r\nCanada. Sarah, avocate réputée, va être promue à la tête de son cabinet quand elle apprend qu’elle est gravement malade.\r\nLiées sans le savoir par ce qu’elles ont de plus intime et de plus singulier, Smita, Giulia et Sarah refusent le sort qui leur est réservé et décident de se battre. Vibrantes d’humanité, leurs histoires tissent une tresse d’espoir et de solidarité.\r\nTrois femmes, trois vies, trois continents. Une même soif de liberté.\r\n', 2, 'la_tresse.jpg'),
(10, 'Harry Potter 3', 'JK Roling', 800, 'oui', 156, 'Fantastiques', 1, 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherche Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa troisième rentrée. Au programme : des cours de divination, la fabrication d\'une potion de Ratatinage, le dressage des hippogriffes... Mais Harry est-il vraiment à l\'abri du danger qui le menace ?', 3, 'harry_potter_3.jpg'),
(11, 'Les animaux fantastiques 1', 'JK. Roling', 2000, 'oui', 156, 'Fantastiques', 0, 'Toute nouvelle édition de cet incontournable ouvrage inscrit dans l\'univers de la saga Harry Potter, avec de splendides illustrations, une préface inédite de J. K. Rowling (signée Norbert Dragonneau) et six nouvelles créatures ! Manuel étudié à l’école de sorcellerie de Poudlard depuis sa publication, le chef-d’œuvre de Norbert Dragonneau a fait le bonheur de générations de familles de sorciers. Les Animaux fantastiques, vie et habitat est une indispensable introduction aux créatures magiques du monde des sorciers. Les années de voyage et de recherches de Dragonneau ont abouti à ce volume d’une importance inégalée. Certains animaux seront familiers aux lecteurs de la saga Harry Potter – L’hippogriphe, le basilic, le Magyar à pointes…', 0, 'Les_animeaux_fantastiques_1.jpg'),
(12, 'Les animaux fantastiques 2', 'JK. Roling', 2000, 'oui', 158, 'Fantastiques', 0, 'Le précédent film Les Animaux fantastiques se terminait sur la capture du puissant mage noir Gellert Grindelwald à New York grâce à Norbert Dragonneau. Mais, mettant sa menace à exécution, Grindelwald s’échappe de prison et s’attèle à recruter des partisans, dont la plupart ignorent sa réelle intention : faire régner les sorciers de sang pur sur les êtres non-magiques.', 0, 'Les_animeaux_fantastiques_2.jpg'),
(13, 'Harry Potter 4', 'JK. Roling', 2000, 'oui', 142, 'Fantastiques', 0, 'Harry Potter a quatorze ans et entre en quatrième année à Poudlard. Une grande nouvelle attend Harry, Ron et Hermione à leur arrivée : la tenue d\'un tournoi de magie exceptionnel entre les plus célèbres écoles de sorcellerie. Déjà les délégations étrangères font leur entrée. Harry se réjouit... Trop vite. Il va se trouver plongé au cœur des événements les plus dramatiques qu\'il ait jamais eu à affronter.', 3, 'harry_potter_4.jpg'),
(14, 'Harry Potter 5', 'JK. Roling', 2000, 'oui', 98, 'Fantastiques', 1, 'À quinze ans, Harry s\'apprête à entrer en cinquième année à Poudlard. Et s\'il est heureux de retrouver le monde des sorciers, il n\'a jamais été aussi anxieux. L\'adolescence, la perspective des examens importants en fin d\'année et ces étranges cauchemars... Car Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom est de retour et, plus que jamais, Harry sent peser sur lui une terrible menace. Une menace que le ministère de la Magie ne semble pas prendre au sérieux, contrairement à Dumbledore. Poudlard devient alors le terrain d\'une véritable lutte de pouvoir. La résistance s\'organise autour de Harry qui va devoir compter sur le courage et la fidélité de ses amis de toujours...', 3, 'harry_potter_5.jpg'),
(15, 'La légende de SPELLMAN', 'Daryl Delight', 2000, 'oui', 155, 'Thriller', 0, 'Trois jeunes garçons se racontent chacun leur tour une histoire sur la légende de Spellman. Une légende qui hante les esprits, depuis que quatre adolescents ont été retrouvés massacrés.\r\nLe premier évoque un tueur en série sanguinaire.\r\nLe second imagine un sorcier avec un pouvoir de résurrection sur les animaux.\r\nLe troisième explique que l’esprit de Spellman se nourrit d’âmes humaines.', 0, 'la_legende_de_spellman.jpg'),
(16, 'A Silent Voice 1', 'Yoshitoki Oima', 2000, 'oui', 161, 'Light Novel', 0, 'Shoko Nishimiya est sourde depuis la naissance. Même équipée d\'un appareil auditif, elle peine à saisir les conversations, à comprendre ce qui se passe autour d\'elle. Effrayé par ce handicap, son père a fini par l\'abandonner, laissant sa mère l\'élever seule. \r\nQuand Shoko est transférée dans une nouvelle école, elle fait de son mieux pour dépasser ce handicap, mais malgré ses efforts pour s\'intégrer dans ce nouvel environnement, rien n\'y fait : les persécutions se multiplient, menées par Shoya Ishida, le leader de la classe. Tour à tour intrigué, fasciné, puis finalement exaspéré par cette jeune fille qui ne sait pas communiquer avec sa voix, Shoya décide de consacrer toute son énergie à lui rendre la vie impossible.', 1, 'A_silent_voice_1.jpg'),
(17, 'A Silent Voice 2', 'Yoshitoki Oima', 2000, 'oui', 150, 'Light Novel', 0, 'Pour Shoya, devenu le nouveau souffre-douleur de sa classe, rien ne change après le départ de Shoko. Pire, le jeune garçon se rend compte qu’elle faisait preuve de gentillesse à son égard et se sent d’autant plus coupable ! Mis à l’écart pendant toute sa scolarité, il ne parvient plus à se lier aux autres. Il se coupe du monde et finit par perdre toute envie de vivre.\r\nMais l’adolescent n’a jamais oublié la jeune sourde. Il prend donc la résolution de la retrouver pour lui présenter ses excuses avant de mettre fin à ses jours…', 3, 'A_silent_voice_2.jpg'),
(18, 'BIRD BOX', 'Josh Malerman', 350, 'oui', 50, 'Policier', 0, 'Bird Box est un roman post-apocalyptique américain écrit par Josh Malerman , mieux connu comme le chanteur du groupe The High Strung. Le livre est publié au royaume-Uni le 27 mars 2014 par Harper Voyager.', 0, 'Bird_box.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `vue` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_l` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_l`, `id_u`) VALUES
(29, 1, 3),
(28, 21, 3),
(32, 21, 2),
(33, 19, 1),
(34, 21, 1),
(35, 20, 1),
(36, 26, 4),
(37, 14, 72),
(38, 2, 3),
(39, 21, 4),
(40, 8, 4),
(41, 4, 4),
(42, 2, 4),
(43, 14, 4),
(44, 12, 4),
(45, 10, 4),
(46, 5, 5),
(48, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `pr` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `titre`, `slogan`, `pr`, `image`) VALUES
(1, 'Promotions pour le ramadan', 'Rassasiez-vous avec notre sélections de livres pour ce ramadan, et oublié votre faim !', 30, 'ramadan.jpg'),
(2, 'Promotions d\'été', 'Que ce soit a la plage ou la nuit dans votre hôtel n\'oubliez pas votre passe-temps préféré !', 40, 'ete.jpg'),
(3, 'Promotion 20ans Harry Potter', 'découvrez ou redécouvrez le monde magique d\'Harry Potter avec notre promotion 20ans.', 50, '2019-Planificateur-Livre-Magique-Harry-Potter-Cahier-Journal-Avec-2018-2019-Calendrier-Rétro-Couverture-Rigide.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
