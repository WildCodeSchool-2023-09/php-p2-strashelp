-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `title`) VALUES
(1, 'Stuff'),
(2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE DATABASE `StrasHelp`;
USE `StrasHelp`;

CREATE TABLE `Contact` (
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`firstname` VARCHAR(100) NOT NULL,
`lastname` VARCHAR(100) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`message` VARCHAR(3000) NOT NULL,
`users_id` INT NULL,
FOREIGN KEY (users_id) REFERENCES users(id)
)

CREATE TABLE `ReportAds`(
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`Inappropriated_content` BOOL,
`categorie_Error` BOOL,
`Baking_infos` BOOL,
`users_id` INT NULL,
FOREIGN KEY (users_id) REFERENCES users(id)
)

CREATE TABLE `Users` (
`id` INT PRIMARY KEY AUTO_INCREMENT  NOT NULL,
`firstname` VARCHAR(100) NOT NULL,
`lastname` VARCHAR(100) NOT NULL,
`username`VARCHAR(100) NOT NULL,
`password` VARCHAR(100) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`phone_number` INT(11) NOT NULL,
`birthdate` date NOT NULL,
`localisation` VARCHAR(150) NOT NULL,
`is_admin` bool
)

CREATE TABLE `Ads` (
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`title` VARCHAR(100) NOT NULL,
`image` VARCHAR(500),
`description` VARCHAR(6000) NOT NULL,
`ads_type` bool NOT NULL,
`username` VARCHAR(100) NOT NULL,
`localisation` VARCHAR(150) NOT NULL,
`published_date` date,
`users_id` INT NOT NULL,
FOREIGN KEY (users_id) REFERENCES users(id)
)

CREATE TABLE `Offer_users` (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`users_id` INT NOT NULL,
FOREIGN KEY (users_id) REFERENCES users(id),
`ads_id` INT NOT NULL,
FOREIGN KEY (ads_id) REFERENCES ads(id)
)

CREATE TABLE `Images` (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`ImageName` VARCHAR(500),
`ads_id` INT NOT NULL,
FOREIGN KEY (ads_id) REFERENCES ads(id)
)

CREATE TABLE `Categories` (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`is_jardinage` BOOL,
`is_bricolage` BOOL,
`is_mecanique` BOOL,
`is_soutienscolaire` BOOL
)

CREATE TABLE `CategorieAds` (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`categories_id` INT NOT NULL,
FOREIGN KEY (categories_id) REFERENCES categories(id),
`ads_id` INT NOT NULL,
FOREIGN KEY (ads_id) REFERENCES ads(id)
)

insert into `ads` (title, image, description, ads_type, username, localisation, published_date, users_id) VALUES ('jardin', 'assetimage', 'une belle moto', '1', 'Zama', 'bordeaux', '2023-10-10', '1')