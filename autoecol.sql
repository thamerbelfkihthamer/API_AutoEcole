-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 11 Décembre 2015 à 16:02
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `type_piece`, `num_piece`, `name`, `prenom`, `email`, `tel`, `date_naisssance`, `adresss`, `autoecoletable_id`, `examen_id`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'CIN', 0, 'thamer', 'brbr', 'midouweldsbs@gamil.com', 22046453, '2015-12-10', 'ttuuttgg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'PASSPORT', 9345678, 'aymen', 'abidi', 'goalsinhd@hotmail.fr', 24872691, '2015-10-07', 'bizerte tunis', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'CIN', 922345, 'aymen', 'saad', 'joutmh@gmail.com', 50983456, '2015-10-25', 'bouargoub nabeul', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'CIN', 2147483647, 'thamer', 'thamer', 'goalsinhd@hotmail.fr', 24872691, '2015-10-12', 'hammamet nabeul', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client_cours`
--

CREATE TABLE IF NOT EXISTS `client_cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `cour_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client_cours`
--

INSERT INTO `client_cours` (`id`, `client_id`, `cour_id`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `client_examen`
--

CREATE TABLE IF NOT EXISTS `client_examen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client_examen`
--

INSERT INTO `client_examen` (`id`, `client_id`, `examen_id`) VALUES
(1, 2, 1);

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
  `moniteur_id` int(11) NOT NULL,
  `autoecoletable_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `type`, `sujet`, `starttime`, `endtime`, `vehicules_id`, `moniteur_id`, `autoecoletable_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'conduite', '', '2015-12-07 10:00:00', '2015-12-07 12:00:00', 3, 2, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'code', '', '2015-12-09 10:00:00', '2015-12-09 12:00:00', 0, 2, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `examens`
--

CREATE TABLE IF NOT EXISTS `examens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `resultat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicules_id` int(11) NOT NULL,
  `moniteur_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `examens`
--

INSERT INTO `examens` (`id`, `type`, `starttime`, `endtime`, `resultat`, `vehicules_id`, `moniteur_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'conduite', '2015-12-08 10:00:00', '2015-12-08 12:00:00', '', 2, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('2015_10_19_084625_create_moniteur_table', 1),
('2015_12_07_144406_entrust_setup_tables', 1);

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
-- Structure de la table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'app owner', 'user is the owner of a givin project', '2015-12-10 12:30:55', '2015-12-10 12:30:55'),
(2, 'manager autoecole', 'User Administration', 'user is allowed to manage and edit other users', '2015-12-10 12:32:20', '2015-12-10 12:32:20'),
(3, 'simple autoecole employe', 'simple employe', NULL, '2015-12-10 12:33:26', '2015-12-10 12:33:26');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 1),
(2, 2),
(3, 3);

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
  `roles_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `autoecoletable_id`, `roles_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'owner aymen', 'thamer.belfkih@hotmail.com', '250940321', 0, 0, NULL, '2015-12-10 12:27:41', '2015-12-10 13:43:49'),
(2, 'thamerdod', 'thamerdod@gmail.com', '$2y$10$hIC8S4DWL3t8dAku.Mk9reLkghN5jjN3QAzuLREYfxExACDic9u1q', 0, 0, NULL, '2015-12-10 13:20:17', '2015-12-11 10:58:38'),
(3, 'bilel', 'bilel@gmail.com', '$2y$10$7JYysMSl5wyOd1.NTQnWnOEXVOqfEEZ0Qzq/1aOZF1mTas2jqfdky', 0, 0, NULL, '2015-12-10 13:31:18', '2015-12-10 13:31:18'),
(4, 'thamerowner', 'thamerowner.belfkih@hotmail.com', '$2y$10$GH/O6GB2NaCAbLOUto1.Gu5JWpBp45w5xGi34t735tkq47MCGKHoq', 0, 0, NULL, '2015-12-11 08:12:14', '2015-12-11 08:12:14');

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
