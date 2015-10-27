-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 23 Octobre 2015 à 10:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `autoecol`
--

-- --------------------------------------------------------

--
-- Structure de la table `autoecoletable`
--

CREATE TABLE IF NOT EXISTS `autoecoletable` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_piece` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_piece` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `date_naisssance` date NOT NULL,
  `adresss` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autoecoletable_id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `type_piece`, `num_piece`, `name`, `prenom`, `email`, `tel`, `date_naisssance`, `adresss`, `autoecoletable_id`, `examen_id`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'CIN', 2147483647, 'thamer', 'thamer', 'goalsinhd@hotmail.fr', 24872691, '2015-10-12', 'hammamet nabeul', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'PASSPORT', 9345678, 'aymen', 'abidi', 'goalsinhd@hotmail.fr', 24872691, '2015-10-07', 'bizerte tunis', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'CIN', 922345, 'aymen', 'saad', 'joutmh@gmail.com', 50983456, '2015-10-25', 'bouargoub nabeul', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client_cours`
--

CREATE TABLE IF NOT EXISTS `client_cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `vehicules_id` int(11) NOT NULL,
  `autoecoletable_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `examens`
--

CREATE TABLE IF NOT EXISTS `examens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_examen` date NOT NULL,
  `resultat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_liste` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `examentype_id` int(11) NOT NULL,
  `autoecoletable_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `examenstype`
--

CREATE TABLE IF NOT EXISTS `examenstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_examen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_09_15_110407_create_Client_Table', 1),
('2015_09_18_092718_create_examen_table', 1),
('2015_09_18_093531_create_examentype_table', 1),
('2015_09_21_150918_create_autoecoletable_table', 1),
('2015_09_21_151354_create_cours_table', 1),
('2015_09_21_151458_create_vehicules_table', 1),
('2015_10_19_084625_create_moniteur_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE IF NOT EXISTS `moniteur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cin` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `moniteur`
--

INSERT INTO `moniteur` (`id`, `cin`, `name`, `prenom`, `email`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 9486847, 'mohamed', 'bouraoui', 'ghazidhaouadi@yahoo.fr', 24872691, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 9788536, 'lasaad', 'nouio', 'joutmh@gmail.com', 32567989, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `autoecoletable_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `autoecoletable_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thamer', 'thamer.belfkih@hotmail.com', '$2y$10$Eo1IgX8qmRycpx1pAjj5de5Z2cIbv7lOYLs6LGpk7g3f2nCpmX.ji', 0, NULL, '2015-10-23 07:21:56', '2015-10-23 07:21:56');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matricule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_visite_technique` date NOT NULL,
  `date_fin_assurence` date NOT NULL,
  `vidange` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autoecoletable_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `name`, `matricule`, `date_visite_technique`, `date_fin_assurence`, `vidange`, `autoecoletable_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'mercedes benz', '09244677', '2015-10-05', '2015-10-04', '565755', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'polo 6', '09244677', '2015-10-19', '2015-10-26', '1243656', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ferrari 4', '094385', '2015-10-10', '2015-10-30', '1243656', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
