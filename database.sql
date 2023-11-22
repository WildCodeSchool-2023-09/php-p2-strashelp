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

CREATE TABLE `user` (
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

CREATE TABLE `contact` (
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`firstname` VARCHAR(100) NOT NULL,
`lastname` VARCHAR(100) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`message` VARCHAR(3000) NOT NULL,
`user_id` INT NULL,
FOREIGN KEY (user_id) REFERENCES user(id)
)

CREATE TABLE `ad_type` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `nametype` VARCHAR(100) NOT NULL
)

CREATE TABLE `category` (
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(255) NOT NULL
)

CREATE TABLE `ad` (
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`title` VARCHAR(100) NULL,
`image` VARCHAR(500),
`description` VARCHAR(6000) NULL,
`username` VARCHAR(100) NULL,
`localisation` VARCHAR(150) NULL,
`published_date` date,
`user_id` INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES user(id),
`category_id` INT NOT NULL,
FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE,
`ad_type_id` INT NOT NULL,
FOREIGN KEY (ad_type_id) REFERENCES ad_type(id)
)

CREATE TABLE `image` (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`image_name` VARCHAR(500),
`ad_id` INT NOT NULL,
FOREIGN KEY (ad_id) REFERENCES ad(id)
)

CREATE TABLE `report_ad`(
`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`report_reason` VARCHAR(255) DEFAULT NULL,
`ad_id` INT NULL,
FOREIGN KEY (ad_id) REFERENCES ad(id)
)

CREATE TABLE `signal_report` (
    `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `report_ad_id` INT NULL,
    FOREIGN KEY (report_ad_id) REFERENCES report_ad(id)
)
  