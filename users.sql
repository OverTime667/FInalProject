-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 avr. 2021 à 21:09
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `finalProject`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE users (
  user_id int(6) UNSIGNED NOT NULL,
  email varchar(30) NOT NULL,
  username varchar(30) NOT NULL,
  phone varchar(10) NOT NULL,
  password varchar(16) NOT NULL,
  subscription varchar(10) NOT NULL,
  status varchar(10) NOT NULL,
  reg_date timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) 

--
-- Déchargement des données de la table `users`
--
INSERT INTO users (user_id, email, username, phone, password, subscription, status, reg_date) VALUES
(1, 'joel@gmail.com', 'Joel', '1112223333','123','no','admin', '2021-04-12 18:03:42'),
(2, 'raji@gmail.com', 'Raji', '2223334444','222','no','admin', '2021-04-12 16:52:24');



--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (user_id);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE users
  MODIFY user_id int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
