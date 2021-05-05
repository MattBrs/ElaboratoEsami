-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 05, 2021 alle 17:17
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DatabaseAziendale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti_azienda`
--

CREATE TABLE `prodotti_azienda` (
  `id_prodotto` int(255) NOT NULL,
  `nome_prodotto` varchar(60) NOT NULL,
  `info_prodotto` varchar(255) NOT NULL,
  `sede` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `sedi_azienda`
--

CREATE TABLE `sedi_azienda` (
  `id_sede` int(255) NOT NULL,
  `nome_sede` varchar(60) NOT NULL,
  `posizione_sede` varchar(255) NOT NULL,
  `stato_sede` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `servizi_azienda`
--

CREATE TABLE `servizi_azienda` (
  `id_servizio` int(255) NOT NULL,
  `nome_servizio` varchar(100) NOT NULL,
  `info_servizio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti_azienda`
--

CREATE TABLE `utenti_azienda` (
  `id_utente` int(255) NOT NULL,
  `nome_utente` varchar(255) NOT NULL,
  `email_utente` varchar(100) NOT NULL,
  `password_utente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prodotti_azienda`
--
ALTER TABLE `prodotti_azienda`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD KEY `sedeProdotto` (`sede`);

--
-- Indici per le tabelle `sedi_azienda`
--
ALTER TABLE `sedi_azienda`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indici per le tabelle `servizi_azienda`
--
ALTER TABLE `servizi_azienda`
  ADD PRIMARY KEY (`id_servizio`);

--
-- Indici per le tabelle `utenti_azienda`
--
ALTER TABLE `utenti_azienda`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `utenti_azienda_email_utente_uindex` (`email_utente`),
  ADD UNIQUE KEY `utenti_azienda_nome_utente_uindex` (`nome_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prodotti_azienda`
--
ALTER TABLE `prodotti_azienda`
  MODIFY `id_prodotto` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `sedi_azienda`
--
ALTER TABLE `sedi_azienda`
  MODIFY `id_sede` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `servizi_azienda`
--
ALTER TABLE `servizi_azienda`
  MODIFY `id_servizio` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti_azienda`
--
ALTER TABLE `utenti_azienda`
  MODIFY `id_utente` int(255) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prodotti_azienda`
--
ALTER TABLE `prodotti_azienda`
  ADD CONSTRAINT `sedeProdotto` FOREIGN KEY (`sede`) REFERENCES `sedi_azienda` (`id_sede`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
