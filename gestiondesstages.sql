-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 avr. 2022 à 14:16
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondesstages`
--

-- --------------------------------------------------------

--
-- Structure de la table `encadrants`
--

CREATE TABLE `encadrants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_encadrant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_encadrant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_id` bigint(20) UNSIGNED NOT NULL,
  `soutenance` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non valide',
  `note` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `encadrants`
--

INSERT INTO `encadrants` (`id`, `nom_encadrant`, `prenom_encadrant`, `stage_id`, `soutenance`, `note`, `created_at`, `updated_at`) VALUES
(12, 'bouhamda', 'karim', 9, 'valide', 15.5, '2022-02-26 10:39:44', '2022-02-27 13:40:29'),
(13, 'ayou', 'ismail', 10, 'non valide', NULL, '2022-02-27 14:06:51', '2022-02-27 14:06:51'),
(22, 'moha', 'karim', 13, 'valide', 17, '2022-03-03 12:04:50', '2022-03-03 12:05:11');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_entreprise` int(20) NOT NULL,
  `ville_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom_entreprise`, `adress_entreprise`, `tel_entreprise`, `ville_entreprise`, `created_at`, `updated_at`) VALUES
(1, 'RENAULT TANGER EXPLOITATION', 'znket ramsi 1', 654653735, 'tanger', '2022-02-23 14:23:06', '2022-02-13 14:23:06'),
(2, 'infoTech', 'rue rais marcail 32', 634829402, 'casa', '2022-02-18 13:35:08', '2022-02-18 13:35:08'),
(3, 'majjane', 'el yousofia rue rachad 65', 545362749, 'rabat', '2022-02-19 10:29:27', '2022-02-19 10:29:27'),
(4, 'Axa services', 'el yousofia rue rachad 65', 537456437, 'tanger', '2022-02-25 11:35:42', '2022-02-25 11:35:42'),
(5, 'Office nationale de l\'électricité et de l\'eau potable', 'hay riad rabat', 532647483, 'rabat', '2022-02-26 10:35:03', '2022-02-26 10:35:03'),
(6, 'Maroc Telecom', 'rue chafia 324', 655434254, 'casa', '2022-02-27 13:52:47', '2022-02-27 13:52:47'),
(7, 'Banque centrale populaire', 'hay rachad', 534235432, 'sale', '2022-02-27 13:54:31', '2022-02-27 13:54:31'),
(8, 'saham assurance', 'hay rachad casa', 534253782, 'sale', '2022-03-02 11:09:31', '2022-03-02 11:09:31'),
(9, 'addoha', 'hay naaim rue 12', 546354637, 'tanger', '2022-03-03 12:02:08', '2022-03-03 12:02:08');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `rapport_prv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rapport_crv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attestation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiche_ev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`id`, `student_id`, `rapport_prv`, `rapport_crv`, `presentation`, `attestation`, `fiche_ev`, `created_at`, `updated_at`) VALUES
(11, 95, 'rapport_prv/W6Np0erMhmcNx1pDb94C0uJNdrthz5z7o0lVwqx2.pdf', NULL, NULL, NULL, NULL, '2022-02-26 10:37:29', '2022-02-26 10:37:29'),
(16, 102, NULL, 'rapport_crv/oC1B6QSAVxaX7BGCT1gtUGneluAQ94yMGcfoR7J8.pdf', 'presentation/0xW7MY1HT6Vp7XXkBmQjBfmyDGSegTOg2uQzSOoS.pptx', 'attestation/Jn3aa1t9X7Y67TDl1qVvcqQiPzxRr204Ha3qbmzV.pdf', 'fiche_ev/XRQAhpyZqEy2mtI7qyCcJAQ5zVNmFkKMVxkVlN60.pdf', '2022-03-03 12:03:35', '2022-04-05 10:10:16'),
(17, 104, NULL, 'rapport_crv/cIgdnJ8lTUAxy6MzQ95hvAZaJqHnQEQVPR5xZicF.pdf', NULL, NULL, NULL, '2022-03-29 09:43:59', '2022-03-29 09:43:59');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_05_105621_laratrust_setup_tables', 2),
(6, '2022_02_15_125826_create_profiles_table', 3),
(7, '2022_02_18_115119_create_stages_table', 4),
(8, '2022_02_18_133832_create_stages_table', 5),
(9, '2022_02_18_135924_create_entreprises_table', 6),
(10, '2022_02_18_140603_create_stages_table', 7),
(11, '2022_02_21_130118_create_fichiers_table', 8),
(12, '2022_02_21_134148_create_fichiers_table', 9),
(13, '2022_02_22_133456_create_encadrants_table', 10);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('soukainalaaroussi139@gmail.com', '$2y$10$oeF62SQna0CDtq3plmEUCeIxVVnvHUPaaE7A3JQ34/wzxHWdx.WAi', '2022-02-22 13:25:41');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(2, 'users-read', 'Read Users', 'Read Users', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(3, 'users-update', 'Update Users', 'Update Users', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2022-02-05 10:03:45', '2022-02-05 10:03:45'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2022-02-05 10:03:45', '2022-02-05 10:03:45');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2022-02-05 10:03:44', '2022-02-05 10:03:44'),
(2, 'teacher', 'Teacher', 'Teachers', '2022-02-05 10:03:46', '2022-02-05 10:03:46'),
(3, 'student', 'Student', 'Student', '2022-02-05 10:03:46', '2022-02-05 10:03:46');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 11, 'App\\Models\\User'),
(2, 68, 'App\\Models\\User'),
(3, 71, 'App\\Models\\User'),
(3, 72, 'App\\Models\\User'),
(3, 74, 'App\\Models\\User'),
(3, 75, 'App\\Models\\User'),
(3, 78, 'App\\Models\\User'),
(2, 80, 'App\\Models\\User'),
(3, 83, 'App\\Models\\User'),
(3, 84, 'App\\Models\\User'),
(3, 87, 'App\\Models\\User'),
(3, 89, 'App\\Models\\User'),
(2, 91, 'App\\Models\\User'),
(2, 92, 'App\\Models\\User'),
(2, 93, 'App\\Models\\User'),
(3, 94, 'App\\Models\\User'),
(3, 95, 'App\\Models\\User'),
(2, 96, 'App\\Models\\User'),
(3, 99, 'App\\Models\\User'),
(3, 102, 'App\\Models\\User'),
(2, 103, 'App\\Models\\User'),
(3, 104, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Structure de la table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `nom_encadrant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_encadrant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet_titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technologies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student1_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student1_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student2_nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student2_prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stages`
--

INSERT INTO `stages` (`id`, `student_id`, `entreprise_id`, `nom_encadrant`, `prenom_encadrant`, `sujet_titre`, `sujet_description`, `technologies`, `student1_nom`, `student1_prenom`, `student2_nom`, `student2_prenom`, `created_at`, `updated_at`) VALUES
(9, 95, 5, 'slimani', 'abdalmjid', 'gestion des pânnes', 'l\'application affiche et gére tout les pannes d\'électricité', 'ASP.net core , html css bootsrap', 'farid', 'halima', NULL, NULL, '2022-02-26 10:37:03', '2022-02-26 10:37:03'),
(10, 94, 1, 'fhrawi', 'farid', 'gestion d\'automobile', 'application mobile gére les types d\'auto renault', 'android studio , firebase', 'el madani', 'kamal', NULL, NULL, '2022-02-27 13:59:35', '2022-02-27 13:59:35'),
(13, 102, 9, 'mohamed', 'alaoui', 'gestion des incidents', 'La gestion des incidents se situe au niveau du Service Operation(SO) dont l’objectif est de s’assurer que la gestion des technologies de l’information soit efficace et efficiente.', 'laravel html css php', 'laaroussi', 'soukaina', 'boutaib', 'ihssan', '2022-03-03 12:02:39', '2022-03-03 12:02:39'),
(14, 75, 5, 'sidik', 'khadija', 'gestion de stock', 'description1', 'django html css php python', 'milal', 'assia', NULL, NULL, '2022-03-03 12:09:59', '2022-03-03 12:09:59'),
(15, 104, 1, 'fahrawi', 'jalal', 'gestion navette autocars', 'description navette', 'ASP.net core , html css bootsrap', 'dawdi', 'samira', 'abdallah', 'ali', '2022-03-29 09:43:38', '2022-03-29 09:43:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users/undraw_profile.svg',
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0600000000',
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `cin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XXXXXXX',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `email_verified_at`, `password`, `profile_pic`, `phone`, `adress`, `cin`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$tJhXM2zSxxF7wUYLZy0XNOblNa//BhuFTbIRK80O6fTN9HKTuLxqm', 'users/undraw_profile.svg', '', '', '', 'xvXIyre7RHX4zVWWFUPAjTWkMVCqN4SsrT7RHqgGMBu5bPZGl4ED13So7NS8', '2022-02-05 11:41:00', '2022-02-05 11:41:00'),
(68, 'ismail', 'ayou', 'ismail@uit.ac.ma', NULL, '$2y$10$UsUDQN7I5tbk0JRgu9Mhzugj0/LSTjNuhk.tslpd2AX9PaVvfqASK', 'users/CjNrOcZUO8X0hKPcQgqFNzf3GcIIl5yMZrqVfh4O.jpg', '0663546372', 'hay nahda 1 rabat', 'AA763536', NULL, '2022-02-16 12:13:38', '2022-02-27 14:01:53'),
(75, 'assia', 'milal', 'assia.21@uit.ac.ma', NULL, '$2y$10$aGVtwfNPcoy/5IkQAChlRerGJ68rJgTgUUhXVnX8ZgIljDS20Cp3C', 'users/undraw_profile.svg', '0600000000', '-', 'XXXXXXX', NULL, '2022-02-24 12:40:37', '2022-02-25 14:42:16'),
(80, 'asmae', 'el mourabet', 'asma@uit.ac.ma', NULL, '$2y$10$hWRE.seM7ZlBN5KQ0iwOXe8nleZSM1RixcVu/pdxppcSeMSv/gdBW', 'users/0j1f71Hb4Qdvs0azsq3VEU4oLiabzmqsjgm8Bf2Y.jpg', '0600000000', '-', 'XXXXXXX', NULL, '2022-02-25 11:53:28', '2022-03-02 12:00:56'),
(91, 'karim', 'bouhamda', 'karim.karim@uit.ac.ma', NULL, '$2y$10$ZNsxOiq5OcSSWAlE254wAuqHTLUZ.3UUrFGcwJ1CoeaAqQucK44hq', 'users/undraw_profile.svg', '0600000000', '-', 'XXXXXXX', NULL, '2022-02-26 10:13:28', '2022-02-26 10:13:28'),
(92, 'fatima', 'chafai', 'fatima.12@uit.ac.ma', NULL, '$2y$10$IXnL5qjbK7zUHvrIzwAqCOYptu.wqSyDaqXsLJWuX35n1BL4LoPWK', 'users/undraw_profile.svg', '0600000000', '-', 'XXXXXXX', NULL, '2022-02-26 10:14:22', '2022-02-26 10:14:22'),
(93, 'farid', 'sadik', 'faridfarid@uit.ac.ma', NULL, '$2y$10$L/w6iVXhk9EDAk/fAXbFd.3QHI3Z6WdDkac3tb7I1Epnpda/io6dK', 'users/undraw_profile.svg', '0600000000', '-', 'XXXXXXX', NULL, '2022-02-26 10:15:23', '2022-02-26 10:15:23'),
(94, 'kamal', 'el madani', 'kamal@uit.ac.ma', NULL, '$2y$10$EiBP79oHqmSeabyLsht73uAvSV/PePu92OTirwmt0PZozv8L7AWNm', 'users/undraw_profile.svg', '0600000000', '-', 'XXXXXXX', NULL, '2022-02-26 10:17:14', '2022-02-26 10:17:14'),
(95, 'halima', 'farid', 'halima@uit.ac.ma', NULL, '$2y$10$nzNhJZyVF/xdGs3GE0bx0OQvzUR/WCA4Rvp4LF/rydAtOHoXgXWcG', 'users/5kCdRjPv0KaDNQYJop2OeE008Xjx3exkGAYrTQkm.jpg', '0654353983', NULL, 'AA763536', NULL, '2022-02-26 10:18:05', '2022-02-26 10:32:35'),
(96, 'hah', 'haha', 'hah@gmail.com', NULL, '$2y$10$OTxOQJxyD.1kncsLEb.r1eMsYmVwI8akpn6qFbWzy4txm7ISYQcxC', 'users/undraw_profile.svg', '0600000000', '-', 'XXXXXXX', NULL, '2022-03-02 10:50:18', '2022-03-02 10:50:18'),
(102, 'soukaina', 'laaroussi', 'soukaina.laaroussi1@uit.ac.ma', NULL, '$2y$10$9G3mKKQk.OBZKAFewlKBy.uMEdCGunrL3IzJdqBDJYi67ftcw51t.', 'users/Fb6qEQ50ufM9YqgTvdJ6KFN9NWveVLbqpzIMREdC.png', '0623836453', 'hay nahda 1 groupe el ahd rabat 642', 'AA82992', NULL, '2022-03-03 11:59:05', '2022-04-03 10:40:48'),
(103, 'karim', 'moha', 'karim.moha@uit.ac.ma', NULL, '$2y$10$pmYWRlUKz9sKlgnZHqkDPe4d2.jPKVpl.rvCe6Q.GTzdgIlrcZ4Li', 'users/taFVxt6rw1gRulr827nKHsfmciN2r1wxme5dlYGb.jpg', '0600000000', '-', 'XXXXXXX', NULL, '2022-03-03 11:59:50', '2022-03-04 12:40:11'),
(104, 'samira', 'dawdi', 'samira12@uit.ac.ma', NULL, '$2y$10$YIbOpSyjL0Z/QNOyLV72JOGh7hb..eF5z5/ZLfouZplYmsUEfqV8i', 'users/o3vKLPpTAcQ6C7wMwj0X1fiWAmJYouNdRm4f0Gfr.jpg', '0600000000', '-', 'XXXXXXX', NULL, '2022-03-29 09:39:00', '2022-03-29 09:41:55');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `encadrants`
--
ALTER TABLE `encadrants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stage_id` (`stage_id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fichiers_student_id_foreign` (`student_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Index pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Index pour la table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Index pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Index pour la table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_student_id_foreign` (`student_id`),
  ADD KEY `stages_entreprise_id_foreign` (`entreprise_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `encadrants`
--
ALTER TABLE `encadrants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `encadrants`
--
ALTER TABLE `encadrants`
  ADD CONSTRAINT `encadrants_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`);

--
-- Contraintes pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD CONSTRAINT `fichiers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`),
  ADD CONSTRAINT `stages_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
