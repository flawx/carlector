-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 mars 2020 à 19:31
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogart20`
--

-- --------------------------------------------------------

--
-- Structure de la table `angle`
--

DROP TABLE IF EXISTS `angle`;
CREATE TABLE IF NOT EXISTS `angle` (
  `NumAngl` char(8) NOT NULL,
  `LibAngl` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumAngl`),
  KEY `ANGLE_FK` (`NumAngl`),
  KEY `FK_ASSOCIATION_6` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `angle`
--

INSERT INTO `angle` (`NumAngl`, `LibAngl`, `NumLang`) VALUES
('ANGL0101', 'Handicap', 'FRAN01'),
('ANGL0102', 'Handicap', 'ANGL01'),
('ANGL0103', 'Handikap', 'ALLE01'),
('ANGL0201', 'Grandes figures littéraires', 'FRAN01'),
('ANGL0202', 'Great literary figures', 'ANGL01'),
('ANGL0203', 'Große literarische Persönlichkeiten', 'ALLE01'),
('ANGL0301', 'Happy hours', 'FRAN01'),
('ANGL0302', 'Happy hours', 'ANGL01'),
('ANGL0303', 'Happy hours', 'ALLE01'),
('ANGL0401', 'Histoire médiévale', 'FRAN01'),
('ANGL0402', 'Medieval History', 'ANGL01'),
('ANGL0403', 'Mittelalterliche Geschichte', 'ALLE01'),
('ANGL0501', 'Intelligence collective', 'FRAN01'),
('ANGL0502', 'Collective Intelligence', 'ANGL01'),
('ANGL0503', 'Gemeinsame Intelligenz', 'ALLE01'),
('ANGL0601', 'Expérience 3.0', 'FRAN01'),
('ANGL0602', 'Experience 3.0', 'ANGL01'),
('ANGL0603', 'Erfahrung 3.0', 'ALLE01'),
('ANGL0701', 'Chatbot et IA', 'FRAN01'),
('ANGL0702', 'Chatbot and IA', 'ANGL01'),
('ANGL0703', 'Chatbot und KI', 'ALLE01'),
('ANGL0801', 'Stories', 'FRAN01'),
('ANGL0802', 'Stories', 'ANGL01'),
('ANGL0803', 'Geschichten', 'ALLE01'),
('ANGL0901', 'Secret', 'FRAN01'),
('ANGL0902', 'Secret', 'ANGL01'),
('ANGL0903', 'Geheimnis', 'ALLE01'),
('ANGL1001', 'We heart it', 'FRAN01'),
('ANGL1002', 'We heart it', 'ANGL01'),
('ANGL1003', 'Wir lieben es', 'ALLE01'),
('ANGL1101', 'Yik Yak', 'FRAN01'),
('ANGL1102', 'Yik Yak', 'ANGL01'),
('ANGL1103', 'Yik Yak', 'ALLE01'),
('ANGL1201', 'Shots', 'FRAN01'),
('ANGL1202', 'Shots', 'ANGL01'),
('ANGL1203', 'Aufnahmen', 'ALLE01'),
('ANGL1301', 'Tik Tok', 'FRAN01'),
('ANGL1302', 'Tik Tok', 'ANGL01'),
('ANGL1303', 'Tik Tok', 'ALLE01'),
('ANGL1401', 'Recherche vocale', 'FRAN01'),
('ANGL1402', 'Voice search', 'ANGL01'),
('ANGL1501', 'ggg', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `NumArt` char(10) NOT NULL,
  `DtCreA` date DEFAULT NULL,
  `LibTitrA` text DEFAULT NULL,
  `LibChapoA` text DEFAULT NULL,
  `LibAccrochA` text DEFAULT NULL,
  `Parag1A` text DEFAULT NULL,
  `LibSsTitr1` text DEFAULT NULL,
  `Parag2A` text DEFAULT NULL,
  `LibSsTitr2` text DEFAULT NULL,
  `Parag3A` text DEFAULT NULL,
  `LibConclA` text DEFAULT NULL,
  `UrlPhotA` char(62) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `NumAngl` char(8) NOT NULL,
  `NumThem` char(8) NOT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`),
  KEY `ARTICLE_FK` (`NumArt`),
  KEY `FK_ASSOCIATION_1` (`NumAngl`),
  KEY `FK_ASSOCIATION_2` (`NumThem`),
  KEY `FK_ASSOCIATION_3` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('1', '2020-03-29', 'Bordeaux : quand les voitures de collection s’invitent à Darwin !', 'Mais quand aller à ce lieu emblématique pour se rincer l’oeil devant de belles Américaines, Française, Italiennes ou Allemandes sorties toutes droit du siècle dernier ?', 'Le Bordeaux classic day ouvre ses porte chaque mois, le premier dimanche est un événement emblématique pour la ville qui fait se rencontrer passionnés, propriétaires et curieux de tout âge. Cette évènement a lieu depuis 2016 à l’écosystème Darwin, un cadre parfait composé à la fois de vieux bâtiments industriel, d’une ancienne caserne militaire, le tout recouvert de tags tous plus originaux les uns que les autres, donnant un cachet unique et décalé au lieu, permettant de mettre en valeur ces bijoux de collection et de les montrer sous leur meilleur jour. C’est le moment pour vous de découvrir/redécouvrir ces voitures vintage. Elles n’ont rien à envier aux voitures d\'aujourd\'hui qui ont la direction assistée, tant le temps n’as fait que rendre honneur à leur beauté, et qui proviennent de toutes horizon et de n’importe quelle marque : Ford Mustang, Renault, Porsche, seront au rendez vous. Le 2 février c’était plus de 400 voitures et motos qui étaient mises en valeur à Darwin ! En plus, si vous le souhaitez vous aurez une possibilité de restauration/brunch sur place sous la halle majestueuse qui confère un bonus supplémentaire ! Alors, rendez-vous le premier dimanche d’avril !', 'Chaque année en plus du classic day l’organisme ATLANTIC OLDTIMER organise aussi une traversée de Bordeaux en véhicule anciens, pour le régal des yeux des grands comme des petits. On ne peut que vous pousser à aller assister au passage des voitures près de chez vous, et de profiter de l’évènement pour déambuler dans notre belle ville. ATLANTIC OLDTIMER organise aussi un rally des oeufs de Pâques, Lundi 13 Avril, en collaboration avec AQUITAINE DESTINATION ENFANCE (ADE) (Association qui œuvre en faveur des enfants traités au service d’oncologie de l’hôpital Pellegrin, et leur famille). C’est un rallye touristique en véhicules vintage (voitures de collection), centré sur le thème : la chasse aux œufs de Pâques. C’est un rally caritatif, en faveur d’ADE, et il est ouvert à tous. Au programme : série d’énigmes, chasse aux œufs de Pâques dans des parcs, jardins, Châteaux du Médoc, et sites remarquables. Cette balade regroupe : des voitures mises à disposition d’ADE, pour les enfants et leurs parents, des voitures, conduites par leur propriétaire et transportant enfants et parents d’ADE, des voitures avec des équipages extérieurs inscrits qui souhaitent soutenir l\'opération.', 'Classic day mais pas que :', 'En effet, l’ESF nouvelle Aquitaine met en place une collecte de sang au palais de la bourse, en partenariat avec les Rotary clubs de Gironde. Un rassemblement d’engins vintage est attendu devant le palais de la bourse, et avec l\'aide du collectif Bordeaux Open Air, l\'EFS a prévu des animations (danses, DJ set, village Décathlon...) tout au long des deux jours pour faire vivre aux donneurs une expérience du don festive. Alors surtout n’hésitez pas, et venez nombreux donner votre sang et profiter de cette expérience unique, inédite et caritative. Vous êtes 1700 à être attendus pour la collecte, devenue incontournable à Bordeaux, ne faites pas faux bond, vous avez une occasion en or de sauver des vies, tout en passant un super week-end, entouré de beautés mécaniques à découvrir pour les plus jeunes, et à redécouvrir pour les plus expérimentés, tout en profitant de musique, sports, et animations. Quoi de mieux qu’un week-end en famille, pour partager votre passion avec les petits et grands, et rencontrer d’autres passionnés ou amateurs comme vous, le tout en ayant le sentiment de faire une bonne action, et de savoir que cet agréable moment sauvera 3 vies.', 'Votre passion pour sauver des vies ?', NULL, 'N’hésitez pas à aller voir la liste des évènements autour de Bordeaux concernant ces merveilles antiques, disponible sur notre site !', NULL, NULL, 'ANGL0101', 'THE0101', 'FRAN01'),
('2', '2020-03-29', 'Location de voiture de collection: pourquoi attendre ?', 'Imaginez vous rendre à un mariage ou à un anniversaire. Maintenant imaginez y aller au volant d’une Rolls Royce Silver Shadow de 1969! Quelle entrée plus spectaculaire auriez vous imaginé ?', NULL, 'Vous habitez Bordeaux et vous aviez secrètement envie de piloter une triumph TR3 de 1958, de sentir le moteur d’une Alfa romeo spider 2000 de 1974 vrombir sous vos pieds, où encore de vous sentir l’âme d’un justicier à bord d’une Dodge Dart Police de 1971? Sachez que dès maintenant il est possible de louer une voiture de collection. Une véritable pièce d’art qui saura ravir vos pulsions de vitesse, vos envies de vintage et vous faire ressentir la puissance d’un moteur du siècle passé, qui n’a rien à envier aux voitures d’aujourd’hui. Le plaisir est sans précédent pour un amoureux de mécanique, et d’une agréable surprise pour un amateur non initié aux joies du moteur Vintage. Dévaler les rues de la belle ville de Bordeaux au volant d’un bolide à la rareté sans égale vous procurera un sentiment de plénitude incroyable. Pouvoir admirer les quais de Bordeaux, La place de la victoire où encore déambuler dans le vieux quartier Saint Michel tout en exposant fièrement une cylindrée d’époque vous assurera de passer ce qui peut être la meilleure journée de votre vie!\r\nAlors n’attendez pas et lancez vous dans l’aventure, réservez dès maintenant la votre! ', 'Vous avez toujours rêvé de louer une voiture de collection? C’est maintenant possible!', 'Si vous n’êtes toujours pas convaincus que louer un bolide de collection, ou plutôt une pièce de collection pour un événement ou simplement pour votre plaisir personnel afin de vous promener fièrement dans les rues pavées de Bordeaux en ayant l’air d’un collectionneur averti sera une expérience hors du commun, Bordeaux Authentics Cars saura parfaitement le faire pour nous. En effet cette société basée à Eysines est spécialisée dans la location de voitures anciennes de collection. Bordeaux Authentics Cars compte parmis ses membres, des passionnés d’automobile, férus de mécanique, d’anciens objets et de belles choses, ils proposent à leurs clients une vaste gamme de voitures, devenues oeuvres d’art à louer pour un événement spécial tel qu’un mariage, un anniversaire, une comité d’entreprise etc… Vous trouverez forcément votre bonheur métallisé parmis les dizaines de véhicules d’époque proposés, que vous ayez besoin d’un cabriolet mignon et discret comme la Volkswagen Coccinelle 1972, ou bien d’une berline aux courbes acérées comme la Jaguar XJ6 4,2L série 2, Bordeaux Authentics Cars saura parfaitement répondre à vos attentes.', 'Les classieuses bordelaises enfin à portée de main!', 'La puissance et l\'authenticité!\r\n\r\nMême si aujourd\'hui, louer une voiture de collection est considéré comme étant un luxe que peu peuvent s\'offrir, les pris sont toute fois beaucoup moins onéreux que fût un temps. Un vrai amoureux du moteur, un collectionneur chevronné vous affirmera que quand on aime, on ne compte pas. En effet la qualité du service rendu autour de cette location, le soin apporté à chaque détail, de l\'écrou authentique certifié d\'origine à l\'odeur de cuir ancien qui règne dans l\'habitacle en passant par le crissement des pneus en gomme qui n\'a rien à voir avec ce que l\'on entend aujourd\'hui. Il est d\'avis de croire cet amoureux de la mécanique qui tente de vous convaincre de vous rendre à votre prochain mariage au volant d\'un bolide que l\'on ne peut pas rater, sans le côté \"m\'a tu vu\" dont peut donner l\'impression une sportive moderne aux courbes tranchantes et futuristes. Alors laissez vous séduire par la puissance et l\'authenticité d\'une voiture de collection à louer. D\'autant plus que pouvoir visiter sa propre ville, la magnifique Bordeaux pavée dans notre cas, tout en se plongeant 50 ans en arrière procure une sensation de nostalgie sortie de nulle part, et ça ça n\'a pas de prix ! Chacun sera heureux et quiconque tentera l\'aventure sera comblé au point de vouloir réessayer!', 'N’hésitez pas à aller visiter les différents sites de location de ces merveilles antiques disponibles autour de Bordeaux !', NULL, NULL, 'ANGL0101', 'THE0101', 'FRAN01'),
('3', '2020-03-29', 'Une passion qui fait fantasmer !', 'L’automobile de collection est une passion qui fait rêver petits et grands. Tandis que certains vivent leurs rêves, d’autres tombent des nues… Voici un florilège d’histoires incroyables sur de l’automobile de collection, autour du monde.', NULL, 'Cette histoire est connue de tous les passionnés de voitures de collection: Un couple de retraités new-yorkais décide de quitter les Etats-Unis pour s’installer au Portugal, où ils achètent une maison détenue par l’état, car les anciens propriétaires sont morts sans laisser de testament ni de légataire. Personne n’ayant voulu l’acheter pendant plus de 15 ans, ils ont pu l’acquérir pour une bouchée de pain. Plusieurs mois après avoir emménagé dans la maison de campagne de leurs rêves, le couple ne peut plus contenir sa curiosité à la vue de l’immense grange dans leur jardin, et décide d’acheter le matériel nécessaire pour faire sauter les soudures reliant les deux portes métalliques. Après un dur labeur, le  vieil homme finit par venir à bout des portes et quelle ne fut pas sa surprise : c’est non pas une mais une dizaine de voitures de collection qui se trouvaient dans cette grange, le tout pour une valeur d’au moins 35 millions de dollars. Comme vous l’aurez compris, cette histoire n’est pas entièrement vraie, mais la collection, elle, l’est. C’est celle d’un vieil homme, qui décida, dans les années 70-80, de préserver chacune des voitures qu’il trouverait intéressantes.', 'Une légende bien connue :', 'A paris, dans le 15e, un passionné automobile tient un garage dans lequel il a rassemblé grand nombre de voitures de collection, et pas n’importe lesquelles. Ce passionné avait décidé de rassembler les voitures “vues à la télé”, dans les films américains des années 50 à nos jours, de marques telles que Jaguar, Corvette, Lotus….. Mais dans la nuit du 7 au 8 décembre dernier, 12 véhicules ont disparus, dont un modèle de Jaguar estimé à environ 350.000 euros. Le propriétaire, amoureux des Etats-Unis, s’y trouvait le jour du vol, et c’est le directeur du centre commercial qui s’est aperçu du vol en se rendant à son bureau. Des voitures de sport de collection appartenant au centre commercial ont également été volées. Finalement, c’est un préjudice d’au moins 1 million d’euros qu\'aurait subi le pauvre collectionneur. Mais l’histoire ne s’arrête pas là. La police, vu la logistique nécessaire pour faire sortir autant d\'autos, avait demandé le renfort de la police judiciaire pour mener l\'enquête, qui ne fait que commencer. Cependant, la magistrate de la permanence criminelle avait été prévenue dans la nuit et a rembarré les policiers, prétendant qu\'elle n\'avait pas à être prévenue/dérangée. ', 'Un collectionneur dépouillé :', 'Une passion indémodable :\r\n\r\nPour clôturer notre article, nous finiront en parlant de la plus vieille voiture du monde en état de marche (une française !) : la marquise ! Créée par De Dion-Bouton et Trépardoux, cette voiture à vapeur peut atteindre une vitesse maximale de 61 km/h, et atteindre 32 km d’autonomie (Son réservoir de 20 litres lui permet de parcourir 32 km.) D\'une longueur de 2,7 mètres pour 952 kg, «La Marquise», ornée de pièces dorées, est une élégante quatre places noire aux roues fines.. L’idée de cette voiture vient à De dion après avoir remarqué le travail de deux artisans, Georges Bouton et Charles-Armand Trépardoux, qui travaillaient dans un magasin de jouets à Paris en 1881. Jules-Albert de Dion recrute les deux hommes et ouvre alors une nouvelle page de l\'aventure automobile. Cette voiture a participé à la toute première course automobile en 1887 entre Paris et Versailles. Cette voiture légendaire n’a eu que 4 propriétaire avant sa mise aux enchères, et le précédent, John O\'Quinn, un collectionneur du Texas, avait acquis la voiture en 2007 pour 3,5 millions de dollars. Avec 127 ans au compteur: la plus vieille voiture du monde en état de marche a été vendue 4,62 millions de dollars lors d\'enchères organisées aux Etats-Unis en 2011, mais l’identité de l’acquéreur n’a jamais été révélée.', 'Voilà qui clôture notre article sur les anecdotes insolites sur les voitures de collection, et ce que cette passion a pu engendrer.', NULL, NULL, 'ANGL0101', 'THE0101', 'FRAN01'),
('4', '2020-03-29', 'Ces automobiles qui prédisent l’avenir !', 'C\'est à partir des années 70 que les concepteurs automobiles se mettent à imaginer ces fameux concept-cars, bijoux unique et technologiques de l\'automobile ! Si vous ne connaissez pas ces modèles mythiques venez donc les découvrir avec nous.', 'Aujourd\'hui ce sont les nouvelles et modernes sportives qui rencontrent un franc succès, mais il a bien fallu les concevoir, c\'est dans ce contexte-là que les concept-cars rencontrent leurs succès, elles sont indémodables et flattent notre rétine, mais ce sont aussi des prédictrices d\'avenir bourrés de technologies avant-gardiste. La première voiture que nous allons découvrir est une Française de chez Renault. La Racoon, sortie en 1992, c\'est une voiture aussi à l\'aise sur terre que sur l\'eau et oui, une des premières voitures amphibie et un 4x4 qui plus est. Le moteur de ce Renault Racoon est un v6 biturbo de 262 chevaux avec des pneus increvables, des vérins hydrauliques indépendant pour chaque roue et une technologie ultrason sur le pare brise pour casser les gouttelettes d\'eau sans essuie glace. Et oui cette voiture avait son lot de technologies assez fantaisistes mais certaines se retrouve encore aujourd\'hui, l\'affichage holographique tête haute est un très bon exemple. On retrouve aujourd\'hui les technologies des concept-cars sur toutes les voitures : clé infrarouge, système de géolocalisation, “la totale de l\'époque” faisait partie de ce Racoon et ce dès 1992 impressionnant non ? ', 'Plus récemment les designers sortent des voitures de plus en plus originales, les formes organiques prennent le devant comme le prouve la Mercedes Vision AVTR de 2020 tout droit sorti d\'un univers proche de celui d\'avatar, mais certain designer étaient eux aussi en avance sur leurs temps c\'est le cas de Luigi Colani qui avant les années 90 était considéré comme le « Léonard de Vinci du XXe siècle » et en 1970 il sort une voiture nommée Le Mans prototype et devient l\'inventeur du bio-design courant du design industriel qui s\'inspire des solutions techniques qu\'offre la nature, avec cette forme de goutte d\'eau allongée et un moteur hors du commun issu de la Lamborghini Miura cette voiture deviendra vite célèbre et fera du bruit. Cette voiture a été produite qu\'une seule fois, une voiture futuriste unique au monde avec une valeur inestimable qui a apporté un souffle de renouveau pour le design automobile. C\'est maintenant autour de l\'automobile de rentrer dans le monde du septième art je vous présente une star du cinéma : la DeLorean DMC-12 il s\'agit du véhicule mythique de la fameuse trilogie : Retour vers le Futur. Avec ces deux portes papillon en inox et une caisse en fibre de verre elle deviendra vite une des voitures les plus célèbres des 80\'s.', 'La nature au service de l’automobile', 'Place maintenant à l\'auto pilote, la symbiose entre l\'homme et la machine et le changement de taille et oui, c\'est maintenant possible avec encore une fois Renault et leur modèle Morphoz, après avoir réalisé des prototypes capables de se conduire tout seul Renault frappe fort dès ce début d\'année avec un concept-car qui est capable de changer de taille pour s\'adapter à deux situations : la ville en restant compacte pour pouvoir se garer plus facilement et la campagne et les grandes routes pour plus de place dans le coffre et un confort intérieur augmenter et contrairement à une voiture autonome celle-ci ne s\'occupe pas de vous, mais s\'adapte à vous. Une voiture totalement électrique qui s\'allonge de 40cm ! Cela laisse plus de part et d\'autonomie, pourquoi ? Car il est possible de fixer sur une nouvelle partie des batteries externes pour augmenter l\'autonomie pour les longs voyages en ajoutant 50 kwh de batterie pour un total de 90 kwh et atteindre les 700 km d\'autonomie sur autoroute. Le design de la voiture est vraiment pure et la technologie embarquée est incroyable, la voiture vous détecte et d\'un simple geste de la main vous ouvrez la portière et le siège passager peut se retourner et adopter une configuration familiale.', 'Et maintenant ?', NULL, 'Je ne vous ai listé ici qu\'un nombre infime de voitures, des centaines d\'autre concept-car vous attendent ce n\'était qu\'une introduction au sujet alors n\'hésitez pas à vous renseigner et venez faire un tour du côté de notre top 10 des voitures extraordinaires.', NULL, NULL, 'ANGL0101', 'THE0101', 'FRAN01'),
('5', '2020-03-29', 'Bordeaux : quand les voitures de collection débarquent à la base sous-marine', 'Envie de découvrir ou de redécouvrir des véhicules d\'exception à Bordeaux ? Bergès Cuir invite tous les fans de voitures anciennes, sportives et de collection à se réunir sur le parking de la base sous-marine le dernier dimanche de chaque mois.', 'Les ateliers Bordelais Bergès Cuir vous invite chaque mois à contempler de magnifiques véhicules, exposés par des passionnés et conservateurs de leur petit bijoux de collection. Bien entendu, c\'est avant tout la chance de voir des véhicules rares, soit parce qu\'ils sont anciens, soit parce que ce sont des sportives que l\'on peut admirer de près. Il y en a pour tous les goûts et toutes les couleurs, avec tous styles de voitures, anciennes ou récentes, et de différentes marques. Le rassemblement est très bien géré, avec des bénévoles aimables et très efficaces. Pour les simples curieux, les passionnés et les collectionneurs, ce rassemblement est sans aucun doute une excellente occasion de faire de belles rencontres !', 'Un rassemblement automobile sur le parking d’une base sous-marine : le parfait mélange insolite de deux univers ! La base sous-marine de Bordeaux, construite par les allemands au cours de la seconde guerre mondiale, a vu passer de nombreux événements, des expos artistiques locales aux boiler room de musique électronique. L’occasion rêvé pour les non bordelais parmis nos lecteurs qui souhaitent découvrir un nouvel endroit où sortir pour visiter, entre autres, des d\'expositions temporaires dédiée à la création contemporaine et un espace dédiée aux Bassins des lumières, centre d\'art numérique.', 'Un lieu insolite', 'Vous serez surpris de voir non seulement des voitures atypiques, mais aussi des véhicules bien particuliers : anciens Jeep de l’armée, side-cars, camionnettes, motocycles et bien plus encore. Des véhicules inédits conservés à merveille avec amour et passion par leurs propriétaires. Mais le plus important, c’est bien évidemment la rencontre des passionnés, l’ambiance, les conversations enrichissantes et les découvertes mémorables. Pour nos lecteurs photographes, sachez que c’est également un excellent endroit pour faire de sublimes photos pour enrichir votre portfolio avec des clichés de voitures exceptionnelles.', 'Voitures, mais pas seulement', NULL, 'Alors, si vous avez envie de rencontrer des passionnés, vous rincer l\'oeil en admirant de sublimes véhicules ou si vous voulez simplement sortir, rendez-vous le dernier dimanche de chaque mois, au parking de la base sous-marine !', NULL, NULL, 'ANGL0101', 'THE0101', 'FRAN01'),
('6', '2020-03-29', 'Comment visiter Bordeaux en famille avec originalité et authenticité ?', ' Bordeaux, ville renfermant un cœur historique et architectural riche, 5e destination française la plus fréquentée en 2018, peut, dès à présent, être visiter en 2cv, modèle créé en 1939 juste avant la guerre. Amoureux de voiture historique, voulant partager ou faire à sa famille sa passion, employeur cherchant à renforcer les liens entre ses employés ou tout simplement curieux en quête d’originalité, cet article est pour vous.', NULL, 'Citroën 2 cv, communément connue sous le sobriquet « Deudeuche », voiture française mythique d’entre 1948 et 1990, plus de 5,1 millions d’exemplaires vendus, cette voiture qui a étonné par son esthétisme peut maintenant être dans vos mains.\r\nNé d’un besoin de la population : 4 places assises pour la famille, 50 kg de bagages pour les vacances, 60km/h en vitesse de pointe, facile d’entretien, une suspension pour les affaires transportées fragiles, et faible consommatrice en carburant.\r\nMême si la Seconde Guerre Mondiale a suspendu la conception de la voiture, elle est devenue l’une des plus marquante de l’histoire automobile.\r\nSitué à Mérignac, ils proposent de vous prendre en charge dès l’aéroport, au terminus du TRAM A ou ils vous livrent la voiture où vous le souhaiter.\r\nPlusieurs modèles sont à votre disposition selon vos préférences, allant de la Charleston grise de 1984 à la Dolly bleue et noire de 1976, en passant par l’AZA de 1966 ou encore une rouge vive de 1982.\r\nLes services sont multiples, du personnel au professionnel, de la passion à la simple curiosité, chacun y trouvera son bonheur pour l’événement qu’il souhaite.', 'Découvrez la location de 2cv, Citroën des années quarante', 'Avec votre 2cv nouvellement acquise, le monde est à vous ! Vous voulez visiter la ville de Bordeaux du Nord au Sud, d’Est en Ouest, vous pouvez !\r\nPasser par la Place de la Bourse, traverser les ponts historiques de la Garonne, se rendre à la cité du vin, que de possibilité.\r\nPlutôt groupe de passionnés ? Vous pouvez organiser des rallyes entre amis, faire le tour des lieux de votre enfance dans les véhicules de votre enfance selon les disponibilités des voitures que vous choisirez auprès de l’agence de location\r\nLes services proposés par lavoituredemonpere.com permettent aussi d’inviter une 2cv à votre mariage ou autre événement personnel pour le rendre plus qu’inoubliable et encore plus original, quoi de mieux pour des passionnés de voitures authentiques.\r\nDe plus, pas d’inquiétude, un GPS peut être fournis pour pouvoir découvrir la ville sans désagréments, vous pouvez aussi demander un conducteur supplémentaire, il aura sûrement quelques anecdotes à vous raconter.\r\nPour pouvoir louer une 2cv, il vous faudra minimum un permis de plus de 3 ans et avoir plus de 21 ans, quoi de plus simple.', 'Pour vos escapades en ville ou événements personnels', 'Mais aussi pour tout événement professionnel !Au sein d’une entreprise, nous savons à quel point les relations humaines sont importantes. Il est donc primordial d’organiser des événements professionnels pour la bonne cohésion d’une équipe, afin d’augmenter la productivité, limiter les conflits et tout simplement être de bonne humeur pour soi et pour les autres. C’est pourquoi les événements professionnels se doivent d’être le plus marquant possible pour un employé afin que leurs effets durent dans le temps. Pourquoi ne pas opter pour la location de 2cv pour souder votre équipe ?\r\nSéminaires, incentives, team building, week-end de récompenses, journée challenge, appreciation events, … peu importe l’événements, 4 dans une voiture mythique, un objective commun, voici une belle analogie de ce que vous recherchez au sein de votre entreprise et qu’il est possible de réaliser sans le moindre effort pour vous.\r\nDe nombreuses entreprises ont déjà sauté le pas et on fait confiance à l’authenticité, au charme que dis-je à l’essence de l’automobile pour leur team-building, d’autant plus que l’événement peut être adapté à vos impératifs.', 'La fameuse « Deudeuche » intergénérationnelle peut désormais, ou peut-être derechef, être dans vos mains pour de nouveaux souvenirs à créer. Vos balades en voitures ont dès à présent un cachet qui leurs est propre et qui vous ressemble en tant que passionnés automobiles.\r\nLa location de voitures anciennes vous permet donc aussi d’enchanter les événements que vous organiser, qu’ils soient personnels ou professionnels, ce plus pourrait être LE plus qui fait la réussite.\r\nLe tout dans une atmosphère paisible, lavoituredemonpere.com vous accueille, vous aide à vous organiser selon les disponibilités, vous permet d’être pris en charge dès la sortie des transports en commun afin de profiter totalement de l’ambiance d’une Citroën 2cv.', NULL, NULL, 'ANGL0101', 'THE0101', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `NumCom` char(6) NOT NULL,
  `DtCreC` datetime DEFAULT NULL,
  `PseudoAuteur` char(20) NOT NULL,
  `EmailAuteur` char(60) NOT NULL,
  `TitrCom` char(60) NOT NULL,
  `LibCom` text NOT NULL,
  `NumArt` char(10) NOT NULL,
  PRIMARY KEY (`NumCom`),
  KEY `COMMENT_FK` (`NumCom`),
  KEY `FK_ASSOCIATION_7` (`NumArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `DtJour` datetime NOT NULL,
  PRIMARY KEY (`DtJour`),
  KEY `DATE_FK` (`DtJour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `date`
--

INSERT INTO `date` (`DtJour`) VALUES
('2017-12-12 00:00:00'),
('2018-11-09 00:00:00'),
('2018-12-01 00:00:00'),
('2018-12-12 00:00:00'),
('2018-12-12 09:00:00'),
('2018-12-12 11:00:00'),
('2018-12-13 00:00:00'),
('2018-12-17 00:00:00'),
('2018-12-18 00:00:00'),
('2019-01-11 00:00:00'),
('2019-01-13 00:00:00'),
('2019-01-17 00:00:00'),
('2019-02-22 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `NumLang` char(8) NOT NULL,
  `Lib1Lang` char(25) DEFAULT NULL,
  `Lib2Lang` char(45) DEFAULT NULL,
  `NumPays` char(4) DEFAULT NULL,
  PRIMARY KEY (`NumLang`),
  KEY `LANGUE_FK` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`NumLang`, `Lib1Lang`, `Lib2Lang`, `NumPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS');

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

DROP TABLE IF EXISTS `motcle`;
CREATE TABLE IF NOT EXISTS `motcle` (
  `NumMoCle` char(8) NOT NULL,
  `LibMoCle` char(30) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumMoCle`),
  KEY `MOTCLE_FK` (`NumMoCle`),
  KEY `FK_ASSOCIATION_5` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motcle`
--

INSERT INTO `motcle` (`NumMoCle`, `LibMoCle`, `NumLang`) VALUES
('MTCL0101', 'Mot1', 'FRAN01'),
('MTCL0102', 'Mot2', 'FRAN01'),
('MTCL0103', 'Mot3', 'FRAN01'),
('MTCL0104', 'Mot4', 'FRAN01'),
('MTCL0105', 'Mot5', 'FRAN01'),
('MTCL0106', 'Mot6', 'FRAN01'),
('MTCL0107', 'Mot7', 'FRAN01'),
('MTCL0108', 'Mot8', 'FRAN01'),
('MTCL0109', 'Mot9', 'FRAN01'),
('MTCL0110', 'Mot10', 'FRAN01'),
('MTCL0111', 'Mot11', 'FRAN01'),
('MTCL0112', 'Mot12', 'FRAN01'),
('MTCL0113', 'Mot13', 'FRAN01'),
('MTCL0114', 'Mot14', 'FRAN01'),
('MTCL0115', 'Mot15', 'FRAN01'),
('MTCL0201', 'Word1', 'ANGL01'),
('MTCL0202', 'Word2', 'ANGL01'),
('MTCL0203', 'Word3', 'ANGL01'),
('MTCL0204', 'Word4', 'ANGL01'),
('MTCL0205', 'Word5', 'ANGL01'),
('MTCL0206', 'Word6', 'ANGL01'),
('MTCL0207', 'Word7', 'ANGL01'),
('MTCL0208', 'Word8', 'ANGL01'),
('MTCL0209', 'Word9', 'ANGL01'),
('MTCL0210', 'Word10', 'ANGL01'),
('MTCL0211', 'Word11', 'ANGL01'),
('MTCL0212', 'Word12', 'ANGL01'),
('MTCL0301', 'Wort1', 'ALLE01'),
('MTCL0302', 'Wort2', 'ALLE01'),
('MTCL0303', 'Wort3', 'ALLE01'),
('MTCL0304', 'Wort4', 'ALLE01'),
('MTCL0305', 'Wort5', 'ALLE01'),
('MTCL0306', 'Wort6', 'ALLE01'),
('MTCL0307', 'Wort7', 'ALLE01'),
('MTCL0308', 'Wort8', 'ALLE01'),
('MTCL0309', 'Wort9', 'ALLE01'),
('MTCL0310', 'Wort10', 'ALLE01'),
('MTCL0311', 'Wort11', 'ALLE01'),
('MTCL0312', 'Wort12', 'ALLE01'),
('MTCL0401', 'дума 1', 'BULG01'),
('MTCL0402', 'дума 2', 'BULG01'),
('MTCL0403', 'дума 3', 'BULG01'),
('MTCL0404', 'дума 4', 'BULG01'),
('MTCL0405', 'дума 5', 'BULG01'),
('MTCL0406', 'дума 6', 'BULG01'),
('MTCL0501', 'Palabra 1', 'ESPA01'),
('MTCL0502', 'Palabra 2', 'ESPA01'),
('MTCL0503', 'Palabra 3', 'ESPA01'),
('MTCL0504', 'Palabra 4', 'ESPA01'),
('MTCL0505', 'Palabra 5', 'ESPA01'),
('MTCL0506', 'Palabra 6', 'ESPA01'),
('MTCL0601', 'Parola 1', 'ITAL01'),
('MTCL0602', 'Parola 2', 'ITAL01'),
('MTCL0603', 'Parola 3', 'ITAL01'),
('MTCL0604', 'Parola 4', 'ITAL01'),
('MTCL0605', 'Parola 5', 'ITAL01'),
('MTCL0606', 'Parola 6', 'ITAL01'),
('MTCL0701', 'Cлово 1', 'RUSS01'),
('MTCL0702', 'Cлово 2', 'RUSS01'),
('MTCL0703', 'Cлово 3', 'RUSS01'),
('MTCL0704', 'Cлово 4', 'RUSS01'),
('MTCL0705', 'Cлово 5', 'RUSS01'),
('MTCL0706', 'Cлово 6', 'RUSS01');

-- --------------------------------------------------------

--
-- Structure de la table `motclearticle`
--

DROP TABLE IF EXISTS `motclearticle`;
CREATE TABLE IF NOT EXISTS `motclearticle` (
  `NumArt` char(10) NOT NULL,
  `NumMoCle` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`,`NumMoCle`),
  KEY `MOTCLEARTICLE_FK` (`NumArt`),
  KEY `MOTCLEARTICLE2_FK` (`NumMoCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `cdPays` char(2) NOT NULL,
  `numPays` char(4) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPays`),
  KEY `PAYS_FK` (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`idPays`, `cdPays`, `numPays`, `frPays`, `enPays`) VALUES
(1, 'AF', 'AFGH', 'Afghanistan', 'Afghanistan'),
(2, 'ZA', 'AFRI', 'Afrique du Sud', 'South Africa'),
(3, 'AL', 'ALBA', 'Albanie', 'Albania'),
(4, 'DZ', 'ALGE', 'Algérie', 'Algeria'),
(5, 'DE', 'ALLE', 'Allemagne', 'Germany'),
(6, 'AD', 'ANDO', 'Andorre', 'Andorra'),
(7, 'AO', 'ANGO', 'Angola', 'Angola'),
(8, 'AI', 'ANGU', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'ARTA', 'Antarctique', 'Antarctica'),
(10, 'AG', 'ANTG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
(11, 'AN', 'ANTI', 'Antilles néerlandaises', 'Netherlands Antilles'),
(12, 'SA', 'ARAB', 'Arabie saoudite', 'Saudi Arabia'),
(13, 'AR', 'ARGE', 'Argentine', 'Argentina'),
(14, 'AM', 'ARME', 'Arménie', 'Armenia'),
(15, 'AW', 'ARUB', 'Aruba', 'Aruba'),
(16, 'AU', 'AUST', 'Australie', 'Australia'),
(17, 'AT', 'AUTR', 'Autriche', 'Austria'),
(18, 'AZ', 'AZER', 'Azerbaïdjan', 'Azerbaijan'),
(19, 'BJ', 'BENI', 'Bénin', 'Benin'),
(20, 'BS', 'BAHA', 'Bahamas', 'Bahamas, The'),
(21, 'BH', 'BAHR', 'Bahreïn', 'Bahrain'),
(22, 'BD', 'BANG', 'Bangladesh', 'Bangladesh'),
(23, 'BB', 'BARB', 'Barbade', 'Barbados'),
(24, 'PW', 'BELA', 'Belau', 'Palau'),
(25, 'BE', 'BELG', 'Belgique', 'Belgium'),
(26, 'BZ', 'BELI', 'Belize', 'Belize'),
(27, 'BM', 'BERM', 'Bermudes', 'Bermuda'),
(28, 'BT', 'BHOU', 'Bhoutan', 'Bhutan'),
(29, 'BY', 'BIEL', 'Biélorussie', 'Belarus'),
(30, 'MM', 'BIRM', 'Birmanie', 'Myanmar (ex-Burma)'),
(31, 'BO', 'BOLV', 'Bolivie', 'Bolivia'),
(32, 'BA', 'BOSN', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
(33, 'BW', 'BOTS', 'Botswana', 'Botswana'),
(34, 'BR', 'BRES', 'Brésil', 'Brazil'),
(35, 'BN', 'BRUN', 'Brunei', 'Brunei Darussalam'),
(36, 'BG', 'BULG', 'Bulgarie', 'Bulgaria'),
(37, 'BF', 'BURK', 'Burkina Faso', 'Burkina Faso'),
(38, 'BI', 'BURU', 'Burundi', 'Burundi'),
(39, 'CI', 'IVOI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
(40, 'KH', 'CAMB', 'Cambodge', 'Cambodia'),
(41, 'CM', 'CAME', 'Cameroun', 'Cameroon'),
(42, 'CA', 'CANA', 'Canada', 'Canada'),
(43, 'CV', 'CVER', 'Cap-Vert', 'Cape Verde'),
(44, 'CL', 'CHIL', 'Chili', 'Chile'),
(45, 'CN', 'CHIN', 'Chine', 'China'),
(46, 'CY', 'CHYP', 'Chypre', 'Cyprus'),
(47, 'CO', 'COLO', 'Colombie', 'Colombia'),
(48, 'KM', 'COMO', 'Comores', 'Comoros'),
(49, 'CG', 'CONG', 'Congo', 'Congo'),
(50, 'KP', 'CNOR', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
(51, 'KR', 'CSUD', 'Corée du Sud', 'Korea, (South) Republic of'),
(52, 'CR', 'RICA', 'Costa Rica', 'Costa Rica'),
(53, 'HR', 'CROA', 'Croatie', 'Croatia'),
(54, 'CU', 'CUBA', 'Cuba', 'Cuba'),
(55, 'DK', 'DANE', 'Danemark', 'Denmark'),
(56, 'DJ', 'DJIB', 'Djibouti', 'Djibouti'),
(57, 'DM', 'DOMI', 'Dominique', 'Dominica'),
(58, 'EG', 'EGYP', 'Égypte', 'Egypt'),
(59, 'AE', 'EMIR', 'Émirats arabes unis', 'United Arab Emirates'),
(60, 'EC', 'EQUA', 'Équateur', 'Ecuador'),
(61, 'ER', 'ERYT', 'Érythrée', 'Eritrea'),
(62, 'ES', 'ESPA', 'Espagne', 'Spain'),
(63, 'EE', 'ESTO', 'Estonie', 'Estonia'),
(64, 'US', 'USA_', 'États-Unis', 'United States'),
(65, 'ET', 'ETHO', 'Éthiopie', 'Ethiopia'),
(66, 'FI', 'FINL', 'Finlande', 'Finland'),
(67, 'FR', 'FRAN', 'France', 'France'),
(68, 'GE', 'GEOR', 'Géorgie', 'Georgia'),
(69, 'GA', 'GABO', 'Gabon', 'Gabon'),
(70, 'GM', 'GAMB', 'Gambie', 'Gambia, the'),
(71, 'GH', 'GANA', 'Ghana', 'Ghana'),
(72, 'GI', 'GIBR', 'Gibraltar', 'Gibraltar'),
(73, 'GR', 'GREC', 'Grèce', 'Greece'),
(74, 'GD', 'GREN', 'Grenade', 'Grenada'),
(75, 'GL', 'GROE', 'Groenland', 'Greenland'),
(76, 'GP', 'GUAD', 'Guadeloupe', 'Guinea, Equatorial'),
(77, 'GU', 'GUAM', 'Guam', 'Guam'),
(78, 'GT', 'GUAT', 'Guatemala', 'Guatemala'),
(79, 'GN', 'GUIN', 'Guinée', 'Guinea'),
(80, 'GQ', 'GUIE', 'Guinée équatoriale', 'Equatorial Guinea'),
(81, 'GW', 'GUIB', 'Guinée-Bissao', 'Guinea-Bissau'),
(82, 'GY', 'GUYA', 'Guyana', 'Guyana'),
(83, 'GF', 'GUYF', 'Guyane française', 'Guiana, French'),
(84, 'HT', 'HAIT', 'Haïti', 'Haiti'),
(85, 'HN', 'HOND', 'Honduras', 'Honduras'),
(86, 'HK', 'KONG', 'Hong Kong', 'Hong Kong, (China)'),
(87, 'HU', 'HONG', 'Hongrie', 'Hungary'),
(88, 'BV', 'BOUV', 'Ile Bouvet', 'Bouvet Island'),
(89, 'CX', 'CHRI', 'Ile Christmas', 'Christmas Island'),
(90, 'NF', 'NORF', 'Ile Norfolk', 'Norfolk Island'),
(91, 'KY', 'CAYM', 'Iles Cayman', 'Cayman Islands'),
(92, 'CK', 'COOK', 'Iles Cook', 'Cook Islands'),
(93, 'FO', 'FERO', 'Iles Féroé', 'Faroe Islands'),
(94, 'FK', 'FALK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
(95, 'FJ', 'FIDJ', 'Iles Fidji', 'Fiji'),
(96, 'GS', 'GEOR', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
(97, 'HM', 'HEAR', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
(98, 'MH', 'MARS', 'Iles Marshall', 'Marshall Islands'),
(99, 'PN', 'PITC', 'Iles Pitcairn', 'Pitcairn Island'),
(100, 'SB', 'SALO', 'Iles Salomon', 'Solomon Islands'),
(101, 'SJ', 'SVAL', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
(102, 'TC', 'TURK', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
(103, 'VI', 'VIEA', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
(104, 'VG', 'VIEB', 'Iles Vierges britanniques', 'Virgin Islands, British'),
(105, 'CC', 'COCO', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
(106, 'UM', 'MINE', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
(107, 'IN', 'INDE', 'Inde', 'India'),
(108, 'ID', 'INDO', 'Indonésie', 'Indonesia'),
(109, 'IR', 'IRAN', 'Iran', 'Iran, Islamic Republic of'),
(110, 'IQ', 'IRAQ', 'Iraq', 'Iraq'),
(111, 'IE', 'IRLA', 'Irlande', 'Ireland'),
(112, 'IS', 'ISLA', 'Islande', 'Iceland'),
(113, 'IL', 'ISRA', 'Israël', 'Israel'),
(114, 'IT', 'ITAL', 'Italie', 'Italy'),
(115, 'JM', 'JAMA', 'Jamaïque', 'Jamaica'),
(116, 'JP', 'JAPO', 'Japon', 'Japan'),
(117, 'JO', 'JORD', 'Jordanie', 'Jordan'),
(118, 'KZ', 'KAZA', 'Kazakhstan', 'Kazakhstan'),
(119, 'KE', 'KNYA', 'Kenya', 'Kenya'),
(120, 'KG', 'KIRG', 'Kirghizistan', 'Kyrgyzstan'),
(121, 'KI', 'KIRI', 'Kiribati', 'Kiribati'),
(122, 'KW', 'KWEI', 'Koweït', 'Kuwait'),
(123, 'LA', 'LAOS', 'Laos', 'Lao People s Democratic Republic'),
(124, 'LS', 'LESO', 'Lesotho', 'Lesotho'),
(125, 'LV', 'LETT', 'Lettonie', 'Latvia'),
(126, 'LB', 'LIBA', 'Liban', 'Lebanon'),
(127, 'LR', 'LIBE', 'Liberia', 'Liberia'),
(128, 'LY', 'LIBY', 'Libye', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'LIEC', 'Liechtenstein', 'Liechtenstein'),
(130, 'LT', 'LITU', 'Lituanie', 'Lithuania'),
(131, 'LU', 'LUXE', 'Luxembourg', 'Luxembourg'),
(132, 'MO', 'MACA', 'Macao', 'Macao, (China)'),
(133, 'MG', 'MADA', 'Madagascar', 'Madagascar'),
(134, 'MY', 'MALA', 'Malaisie', 'Malaysia'),
(135, 'MW', 'MALW', 'Malawi', 'Malawi'),
(136, 'MV', 'MALD', 'Maldives', 'Maldives'),
(137, 'ML', 'MALI', 'Mali', 'Mali'),
(138, 'MT', 'MALT', 'Malte', 'Malta'),
(139, 'MP', 'MARI', 'Mariannes du Nord', 'Northern Mariana Islands'),
(140, 'MA', 'MARO', 'Maroc', 'Morocco'),
(141, 'MQ', 'MART', 'Martinique', 'Martinique'),
(142, 'MU', 'MAUC', 'Maurice', 'Mauritius'),
(143, 'MR', 'MAUR', 'Mauritanie', 'Mauritania'),
(144, 'YT', 'MAYO', 'Mayotte', 'Mayotte'),
(145, 'MX', 'MEXI', 'Mexique', 'Mexico'),
(146, 'FM', 'MICR', 'Micronésie', 'Micronesia, Federated States of'),
(147, 'MD', 'MOLD', 'Moldavie', 'Moldova, Republic of'),
(148, 'MC', 'MONA', 'Monaco', 'Monaco'),
(149, 'MN', 'MONG', 'Mongolie', 'Mongolia'),
(150, 'MS', 'MONS', 'Montserrat', 'Montserrat'),
(151, 'MZ', 'MOZA', 'Mozambique', 'Mozambique'),
(152, 'NP', 'NEPA', 'Népal', 'Nepal'),
(153, 'NA', 'NAMI', 'Namibie', 'Namibia'),
(154, 'NR', 'NAUR', 'Nauru', 'Nauru'),
(155, 'NI', 'NICA', 'Nicaragua', 'Nicaragua'),
(156, 'NE', 'NIGE', 'Niger', 'Niger'),
(157, 'NG', 'NIGA', 'Nigeria', 'Nigeria'),
(158, 'NU', 'NIOU', 'Nioué', 'Niue'),
(159, 'NO', 'NORV', 'Norvège', 'Norway'),
(160, 'NC', 'NOUC', 'Nouvelle-Calédonie', 'New Caledonia'),
(161, 'NZ', 'NOUZ', 'Nouvelle-Zélande', 'New Zealand'),
(162, 'OM', 'OMAN', 'Oman', 'Oman'),
(163, 'UG', 'OUGA', 'Ouganda', 'Uganda'),
(164, 'UZ', 'OUZE', 'Ouzbékistan', 'Uzbekistan'),
(165, 'PE', 'PERO', 'Pérou', 'Peru'),
(166, 'PK', 'PAKI', 'Pakistan', 'Pakistan'),
(167, 'PA', 'PANA', 'Panama', 'Panama'),
(168, 'PG', 'PAPU', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
(169, 'PY', 'PARA', 'Paraguay', 'Paraguay'),
(170, 'NL', 'PBAS', 'pays-Bas', 'Netherlands'),
(171, 'PH', 'PHIL', 'Philippines', 'Philippines'),
(172, 'PL', 'POLO', 'Pologne', 'Poland'),
(173, 'PF', 'POLY', 'Polynésie française', 'French Polynesia'),
(174, 'PR', 'RICO', 'Porto Rico', 'Puerto Rico'),
(175, 'PT', 'PORT', 'Portugal', 'Portugal'),
(176, 'QA', 'QATA', 'Qatar', 'Qatar'),
(177, 'CF', 'CAFR', 'République centrafricaine', 'Central African Republic'),
(178, 'CD', 'CONG', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
(179, 'DO', 'DOMI', 'République dominicaine', 'Dominican Republic'),
(180, 'CZ', 'TCHE', 'République tchèque', 'Czech Republic'),
(181, 'RE', 'REUN', 'Réunion', 'Reunion'),
(182, 'RO', 'ROUM', 'Roumanie', 'Romania'),
(183, 'GB', 'MIQU', 'Royaume-Uni', 'Saint Pierre and Miquelon'),
(184, 'RU', 'RUSS', 'Russie', 'Russia (Russian Federation)'),
(185, 'RW', 'RWAN', 'Rwanda', 'Rwanda'),
(186, 'SN', 'SENE', 'Sénégal', 'Senegal'),
(187, 'EH', 'SAHA', 'Sahara occidental', 'Western Sahara'),
(188, 'KN', 'NIEV', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
(189, 'SM', 'SMAR', 'Saint-Marin', 'San Marino'),
(190, 'PM', 'SPIE', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
(191, 'VA', 'SSIE', 'Saint-Siège ', 'Vatican City State (Holy See)'),
(192, 'VC', 'SVIN', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
(193, 'SH', 'SLN_', 'Sainte-Hélène', 'Saint Helena'),
(194, 'LC', 'SLUC', 'Sainte-Lucie', 'Saint Lucia'),
(195, 'SV', 'SALV', 'Salvador', 'El Salvador'),
(196, 'WS', 'SAMO', 'Samoa', 'Samoa'),
(197, 'AS', 'SAMA', 'Samoa américaines', 'American Samoa'),
(198, 'ST', 'TOME', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
(199, 'SC', 'SEYC', 'Seychelles', 'Seychelles'),
(200, 'SL', 'LEON', 'Sierra Leone', 'Sierra Leone'),
(201, 'SG', 'SING', 'Singapour', 'Singapore'),
(202, 'SI', 'SLOV', 'Slovénie', 'Slovenia'),
(203, 'SK', 'SLOQ', 'Slovaquie', 'Slovakia'),
(204, 'SO', 'SOMA', 'Somalie', 'Somalia'),
(205, 'SD', 'SOUD', 'Soudan', 'Sudan'),
(206, 'LK', 'SRIL', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
(207, 'SE', 'SUED', 'Suède', 'Sweden'),
(208, 'CH', 'SUIS', 'Suisse', 'Switzerland'),
(209, 'SR', 'SURI', 'Suriname', 'Suriname'),
(210, 'SZ', 'SWAZ', 'Swaziland', 'Swaziland'),
(211, 'SY', 'SYRI', 'Syrie', 'Syrian Arab Republic'),
(212, 'TW', 'TAIW', 'Taïwan', 'Taiwan'),
(213, 'TJ', 'TADJ', 'Tadjikistan', 'Tajikistan'),
(214, 'TZ', 'TANZ', 'Tanzanie', 'Tanzania, United Republic of'),
(215, 'TD', 'TCHA', 'Tchad', 'Chad'),
(216, 'TF', 'TERR', 'Terres australes françaises', 'French Southern Territories - TF'),
(217, 'IO', 'BOIN', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
(218, 'TH', 'THAI', 'Thaïlande', 'Thailand'),
(219, 'TL', 'TIMO', 'Timor Oriental', 'Timor-Leste (East Timor)'),
(220, 'TG', 'TOGO', 'Togo', 'Togo'),
(221, 'TK', 'TOKE', 'Tokélaou', 'Tokelau'),
(222, 'TO', 'TONG', 'Tonga', 'Tonga'),
(223, 'TT', 'TOBA', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
(224, 'TN', 'TUNI', 'Tunisie', 'Tunisia'),
(225, 'TM', 'TURK', 'Turkménistan', 'Turkmenistan'),
(226, 'TR', 'TURQ', 'Turquie', 'Turkey'),
(227, 'TV', 'TUVA', 'Tuvalu', 'Tuvalu'),
(228, 'UA', 'UKRA', 'Ukraine', 'Ukraine'),
(229, 'UY', 'URUG', 'Uruguay', 'Uruguay'),
(230, 'VU', 'VANU', 'Vanuatu', 'Vanuatu'),
(231, 'VE', 'VENE', 'Venezuela', 'Venezuela'),
(232, 'VN', 'VIET', 'Viêt Nam', 'Viet Nam'),
(233, 'WF', 'WALI', 'Wallis-et-Futuna', 'Wallis and Futuna'),
(234, 'YE', 'YEME', 'Yémen', 'Yemen'),
(235, 'YU', 'YOUG', 'Yougoslavie', 'Saint Pierre and Miquelon'),
(236, 'ZM', 'ZAMB', 'Zambie', 'Zambia'),
(237, 'ZW', 'ZIMB', 'Zimbabwe', 'Zimbabwe'),
(238, 'MK', 'MACE', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR');

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
CREATE TABLE IF NOT EXISTS `thematique` (
  `NumThem` char(8) NOT NULL,
  `LibThem` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumThem`),
  KEY `THEMATIQUE_FK` (`NumThem`),
  KEY `FK_ASSOCIATION_4` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thematique`
--

INSERT INTO `thematique` (`NumThem`, `LibThem`, `NumLang`) VALUES
('THE0101', 'L\'événement', 'FRAN01'),
('THE0102', 'L\'acteur-clé', 'FRAN01'),
('THE0103', 'Le mouvement émergeant', 'FRAN01'),
('THE0104', 'L\'insolite / le clin d\'oeil', 'FRAN01'),
('THE0201', 'The event', 'ANGL01'),
('THE0202', 'The key player', 'ANGL01'),
('THE0203', 'The emerging movement', 'ANGL01'),
('THE0204', 'The unusual / the wink', 'ANGL01'),
('THE0301', 'Die Veranstaltung', 'ALLE01'),
('THE0302', 'Der Schlüsselakteur', 'ALLE01'),
('THE0303', 'Die entstehende Bewegung', 'ALLE01'),
('THE0304', 'Das Ungewöhnliche / das Augenzwinkern', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Login` char(30) NOT NULL,
  `Pass` char(15) NOT NULL,
  `LastName` char(30) DEFAULT NULL,
  `FirstName` char(30) DEFAULT NULL,
  `EMail` char(50) NOT NULL,
  PRIMARY KEY (`Login`,`Pass`),
  KEY `USER_FK` (`Login`,`Pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Login`, `Pass`, `LastName`, `FirstName`, `EMail`) VALUES
('BarbieS9', 'P9#7xL', 'La Rousse', 'Julie', 'titou@gmail.com'),
('Chris45', 'Ut!D5?h0', 'Dupont', 'Jean', 'cricri@srf.fr'),
('Cruella', 'qL:5R!1', 'Mercury', 'Freddy', 'Cruella@free.fr'),
('PitouF', 'G0_f2;A', 'Durand', 'Joe', 'JoeStarr@free.fr');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `angle`
--
ALTER TABLE `angle`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`NumAngl`) REFERENCES `angle` (`NumAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`NumThem`) REFERENCES `thematique` (`NumThem`),
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`);

--
-- Contraintes pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`NumMoCle`) REFERENCES `motcle` (`NumMoCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`);

--
-- Contraintes pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
