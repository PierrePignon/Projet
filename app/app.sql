-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 mai 2019 à 12:06
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `customer_number` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `administrator_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_number`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`customer_number`, `login`, `mail`, `phone_number`, `password`, `last_name`, `first_name`, `administrator_id`) VALUES
(1, 'paul', 'paul@gmail.com', 676453423, '$2y$10$pcYHJ8sztL7Lf/aDYTOLZ.yPbQ1N7WWzh6Ytl8RBmoN9qkm6ciuK6', 'Lapage', 'Paul', 1),
(2, 'elise', 'elise@gmail.com', 746532247, '$2y$10$z2pg2HMyu94xczj58vavw.wZVAmMolZAsSpGobcXw49rcT5MBjihq', 'Mounia', 'Elise', 1),
(3, 'valentin', 'valentin@gmail.com', 657687987, '$2y$10$/ZbuY8k47gslG8URiq7zYu2cknMW7yu0eX7y1ry2VEEXuSEkjK1F2', 'Jar', 'Valentin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `actuator`
--

DROP TABLE IF EXISTS `actuator`;
CREATE TABLE IF NOT EXISTS `actuator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `account_customer_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `numero`, `street`, `zip_code`, `city`, `country`, `account_customer_number`) VALUES
(1, 9, 'Rue de la délivrance', 75000, 'Paris', 'France', 1),
(2, 7, 'Rue des champs', 75000, 'Paris', 'France', 2),
(3, 76, 'Route de l\'air', 75000, 'Paris', 'France', 3);

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`id`, `login`, `password`, `last_name`, `first_name`, `mail`, `phone_number`) VALUES
(1, 'admin', '$2y$10$IQ.F1pk.1nqnMa6KEOaF0.0kCGprR4GgiZx36f60mPZBcSa0vQuVq', 'Enova', 'Damien', 'damien@enova.fr', 678654323);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `title`, `content`, `date_time`) VALUES
(3, 'Vol de compte.', 'Dans le cadre d\'un vol de compte ou d\'usurpation d’identité,  il faut impérativement et le plus rapidement contacter notre support téléphonique afin de réinitialiser la sécurité du compte.', '2019-05-19 22:42:29'),
(4, 'Mon fournisseur internet ne marche plus, je ne peux plus voir mes données ?', 'Dans le cadre d\'une défaillance technique au niveau du fournisseur d\'accès internet, les données de vos capteurs ne seront pas envoyées à notre serveur. Il faudra alors directement régler ce problème avec votre fournisseur.', '2019-05-19 22:44:19'),
(5, 'J\'ai déménager, comment changer mes informations.', 'A l\'aide de notre onglet mes logements il est possible d\'ajouter des adresses. De ce fait vous pouvez ajouter un nombre infini d\'adresse à votre compte. Il vous est aussi possible de supprimer les adresses à tout moment. ATTENTION ! La suppression d\'adresse est irréversible et entraîne la suppression de tout les capteurs qui lui sont associés. Cet action est donc à effectuer avec précaution. ', '2019-05-19 22:49:13'),
(1, 'Mon capteur n\'affiche plus de valeur sur le site.', 'Allez vérifier  le voyant lumineux derrière votre capteur \"défectueux\". Si ce dernier est allumé cela signifie que le capteur est encore fonctionnel. Le problème peut venir de nos serveurs et il faut malheureusement attendre. Si au bout de 24h la valeur du capteur n\'est toujours pas affiché sur votre espace client merci de nous contacter via messagerie dans l\'espace assistance dédié. \r\nSi le voyant est éteint cela signifie que votre capteur est endommagé et ne fonctionne plus. Pour toute défaillance technique une garantie de 2 ans est proposé pour chaque capteur. Au delà de cette durée il faudra acheter un autre capteur de remplacement.   ', '2019-05-19 22:35:38'),
(2, 'Je n\'arrive pas a me connecter.', 'Soit votre identifiant ou votre mot de passe est incorrect. Dans ce cas il est nécessaire de réinitialisée votre mot de passe et/ou identifiant via la page défié à cet effet.\r\nDans le cas ou vous ne vous souvenez plus ni de votre identifiant, ni de votre mot de passe il sera nécessaire de passer par notre support téléphonique.  ', '2019-05-19 22:39:52');

-- --------------------------------------------------------

--
-- Structure de la table `mailbox`
--

DROP TABLE IF EXISTS `mailbox`;
CREATE TABLE IF NOT EXISTS `mailbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  `account_customer_number` int(11) NOT NULL,
  `administrator_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mailbox`
--

INSERT INTO `mailbox` (`id`, `content`, `date_time`, `account_customer_number`, `administrator_id`, `sender`) VALUES
(1, 'a', '2019-05-24 13:28:13', 1, 1, 'user'),
(2, 'a', '2019-05-24 13:28:15', 1, 1, 'user'),
(3, 'a', '2019-05-24 13:28:16', 1, 1, 'user'),
(4, 'a', '2019-05-24 13:28:18', 1, 1, 'user'),
(5, 'a', '2019-05-24 13:28:19', 1, 1, 'user'),
(6, 'a', '2019-05-24 13:28:21', 1, 1, 'user'),
(7, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-05-24 13:28:26', 1, 1, 'user'),
(8, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-05-24 13:28:29', 1, 1, 'user'),
(9, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-05-24 13:28:33', 1, 1, 'user'),
(10, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-05-24 13:28:38', 1, 1, 'user'),
(11, 'bonjour', '2019-05-24 13:28:42', 1, 1, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `measure`
--

DROP TABLE IF EXISTS `measure`;
CREATE TABLE IF NOT EXISTS `measure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `sensor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surface` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`, `surface`, `address_id`) VALUES
(1, 'Cuisine', 23, 1),
(2, 'Chambre', 16, 1),
(3, 'Salon', 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_device`
--

DROP TABLE IF EXISTS `type_device`;
CREATE TABLE IF NOT EXISTS `type_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_device`
--

INSERT INTO `type_device` (`id`, `name`, `type`) VALUES
(1, 'Thermomètre', 'sensor'),
(2, 'Infrarouge', 'sensor'),
(3, 'Luminosité', 'sensor'),
(4, 'Humidité', 'sensor'),
(5, 'Store', 'actuator'),
(6, 'Ventilateur', 'actuator'),
(7, 'Caméra', 'actuator'),
(8, 'Lumière', 'actuator'),
(9, 'Arrosage', 'actuator');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonym` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_level` tinyint(1) NOT NULL,
  `account_customer_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudonym`, `password`, `security_level`, `account_customer_number`) VALUES
(1, 'Parent', 'parent', 1, 1),
(2, 'Parent', 'parent', 1, 2),
(3, 'Parent', 'parent', 1, 3),
(4, 'Enfant', 'enfant', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
