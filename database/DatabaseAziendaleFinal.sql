-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 25, 2021 alle 16:25
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
-- Struttura della tabella `categoria_prodotto_azienda`
--

CREATE TABLE `categoria_prodotto_azienda` (
  `id_categoria` int(255) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL,
  `info_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categoria_prodotto_azienda`
--

INSERT INTO `categoria_prodotto_azienda` (`id_categoria`, `nome_categoria`, `info_categoria`) VALUES
(1, 'Bottiglie', 'Tutti i prodotti a forma allungata adatti a contenere liquidi.'),
(2, 'Barattoli', 'Tutti i prodotti a forma schiacciata adatti a contenere liquidi.'),
(3, 'Lastre', 'Tutti i prodotti a forma sottile.');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti_azienda`
--

CREATE TABLE `prodotti_azienda` (
  `id_prodotto` int(255) NOT NULL,
  `nome_prodotto` varchar(60) NOT NULL,
  `info_prodotto` varchar(255) NOT NULL,
  `costo_prodotto` double(4,2) NOT NULL,
  `categoria` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti_azienda`
--

INSERT INTO `prodotti_azienda` (`id_prodotto`, `nome_prodotto`, `info_prodotto`, `costo_prodotto`, `categoria`) VALUES
(1, 'acqua_5dl', 'Bottiglia d\'acqua da mezzo litro', 4.99, 1),
(2, 'acqua_10dl', 'Bottiglia d\'acqua da litro', 7.99, 1),
(3, 'birra_5dl', 'Bottiglia per birra da mezzo litro', 6.99, 1),
(4, 'birra_10dl', 'Bottiglia per birra da litro', 9.99, 1),
(5, 'vino_10dl', 'Bottiglia per vino', 14.99, 1),
(6, 'aceto_05dl', 'Bottiglia per aceto', 6.99, 1),
(7, 'olio_10dl', 'Bottiglia per olio', 8.99, 1),
(14, 'olio_10dl', 'Bottiglia per olio', 8.99, 1),
(17, 'barattolo_piccolo', 'Barattolo piccolo', 2.99, 2),
(21, 'barattolo_grande', 'Barattolo grande', 4.99, 2),
(22, 'lastra_20x20', 'Lastra di vetro piccola quadrata 20cm x 20cm', 9.99, 3),
(23, 'lastra_20x40', 'Lastra di vetro piccola rettangolare 20 x 40xm', 11.99, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto_risiede`
--

CREATE TABLE `prodotto_risiede` (
  `id_collegamento` int(255) NOT NULL,
  `qta_prodotto` int(10) NOT NULL,
  `prodotto` int(255) NOT NULL,
  `sede` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto_risiede`
--

INSERT INTO `prodotto_risiede` (`id_collegamento`, `qta_prodotto`, `prodotto`, `sede`) VALUES
(1, 4, 1, 1),
(2, 10, 1, 2),
(3, 5, 2, 1),
(4, 6, 3, 2),
(5, 3, 1, 2),
(6, 2, 3, 3),
(7, 5, 5, 3),
(8, 7, 6, 3),
(9, 6, 7, 3),
(10, 2, 17, 2),
(11, 4, 17, 1),
(12, 4, 22, 3),
(13, 5, 23, 3);

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

--
-- Dump dei dati per la tabella `sedi_azienda`
--

INSERT INTO `sedi_azienda` (`id_sede`, `nome_sede`, `posizione_sede`, `stato_sede`) VALUES
(1, 'VetreriaGiavenale_Marano', 'Marano', 1),
(2, 'VetreriaGiavenale_Schio', 'Schio', 1),
(3, 'VetreriaGiavenale_Thiene', 'Thiene', 1),
(4, 'VetreriaGiavenale_Vicenza', 'Vicenza', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `servizi_azienda`
--

CREATE TABLE `servizi_azienda` (
  `id_servizio` int(255) NOT NULL,
  `nome_servizio` varchar(100) NOT NULL,
  `info_servizio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `servizi_azienda`
--

INSERT INTO `servizi_azienda` (`id_servizio`, `nome_servizio`, `info_servizio`) VALUES
(1, 'Consegna', 'Consegna nella zona abitativa dell\'utente.'),
(2, 'Restituzione', 'Invia email per procedura restituione'),
(3, 'contattaAssistenza', 'Invia email per chattare con assistenza');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente_richiede_servizio`
--

CREATE TABLE `utente_richiede_servizio` (
  `id_richiesta` int(255) NOT NULL,
  `utente` int(255) NOT NULL,
  `servizio` int(255) NOT NULL,
  `sede` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti_azienda`
--

CREATE TABLE `utenti_azienda` (
  `id_utente` int(255) NOT NULL,
  `nome_utente` varchar(255) NOT NULL,
  `email_utente` varchar(100) NOT NULL,
  `password_utente` varchar(255) NOT NULL,
  `abitazione_utente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti_azienda`
--

INSERT INTO `utenti_azienda` (`id_utente`, `nome_utente`, `email_utente`, `password_utente`, `abitazione_utente`) VALUES
(1, 'Matteo', 'mbrusarosco@chilesotti.it', '$2y$10$038YCT/kv38Wh5n8d4cAIOkQbUcn0TQBaiEyOk43savx4tWGFt3ee', 'schio'),
(6, 'Cristian', 'cscapin@chilesotti.it', '$2y$10$KeYKTeg.sKOWyMPojYJy2OQzUbfOK2W0CPGviay6XoAyldnEBztqy', 'schio'),
(7, 'testAccount', 'test@test.com', '$2y$10$R7JZeJIQWti8LNvQ8Nrc5uQ4gaGpf5xLomnZzFefDA0CLlq2/gnTq', 'thiene'),
(8, 'MarioRossi', 'marioRossi@gmail.com', '$2y$10$8TPFGFtQSeYfS7epKvXkmumRqfrsInYfIRVO52DRsJtW1BSAQFgN6', 'schio'),
(10, 'matteo2', 'kakka.kakka@gmail.com', '$2y$10$xzSSAmL2xhniFA5x8Q4gy.J6bcJ6b4wcVOYf0JlMB6oc9DgdL.BIi', 'schio');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categoria_prodotto_azienda`
--
ALTER TABLE `categoria_prodotto_azienda`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `categoria_prodotto_azienda_nome_categoria_uindex` (`nome_categoria`);

--
-- Indici per le tabelle `prodotti_azienda`
--
ALTER TABLE `prodotti_azienda`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD KEY `prodotti_azienda_categoria_prodotto_azienda_id_categoria_fk` (`categoria`);

--
-- Indici per le tabelle `prodotto_risiede`
--
ALTER TABLE `prodotto_risiede`
  ADD PRIMARY KEY (`id_collegamento`),
  ADD KEY `prodotto_risiede_prodotti_azienda_id_prodotto_fk` (`prodotto`),
  ADD KEY `prodotto_risiede_sedi_azienda_id_sede_fk` (`sede`);

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
-- Indici per le tabelle `utente_richiede_servizio`
--
ALTER TABLE `utente_richiede_servizio`
  ADD PRIMARY KEY (`id_richiesta`),
  ADD KEY `utente_richiede_servizio_sedi_azienda_id_sede_fk` (`sede`),
  ADD KEY `utente_richiede_servizio_servizi_azienda_id_servizio_fk` (`servizio`),
  ADD KEY `utente_richiede_servizio_utenti_azienda_id_utente_fk` (`utente`);

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
-- AUTO_INCREMENT per la tabella `categoria_prodotto_azienda`
--
ALTER TABLE `categoria_prodotto_azienda`
  MODIFY `id_categoria` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `prodotti_azienda`
--
ALTER TABLE `prodotti_azienda`
  MODIFY `id_prodotto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `prodotto_risiede`
--
ALTER TABLE `prodotto_risiede`
  MODIFY `id_collegamento` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `sedi_azienda`
--
ALTER TABLE `sedi_azienda`
  MODIFY `id_sede` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `servizi_azienda`
--
ALTER TABLE `servizi_azienda`
  MODIFY `id_servizio` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `utente_richiede_servizio`
--
ALTER TABLE `utente_richiede_servizio`
  MODIFY `id_richiesta` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti_azienda`
--
ALTER TABLE `utenti_azienda`
  MODIFY `id_utente` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prodotti_azienda`
--
ALTER TABLE `prodotti_azienda`
  ADD CONSTRAINT `prodotti_azienda_categoria_prodotto_azienda_id_categoria_fk` FOREIGN KEY (`categoria`) REFERENCES `categoria_prodotto_azienda` (`id_categoria`);

--
-- Limiti per la tabella `prodotto_risiede`
--
ALTER TABLE `prodotto_risiede`
  ADD CONSTRAINT `prodotto_risiede_prodotti_azienda_id_prodotto_fk` FOREIGN KEY (`prodotto`) REFERENCES `prodotti_azienda` (`id_prodotto`),
  ADD CONSTRAINT `prodotto_risiede_sedi_azienda_id_sede_fk` FOREIGN KEY (`sede`) REFERENCES `sedi_azienda` (`id_sede`);

--
-- Limiti per la tabella `utente_richiede_servizio`
--
ALTER TABLE `utente_richiede_servizio`
  ADD CONSTRAINT `utente_richiede_servizio_sedi_azienda_id_sede_fk` FOREIGN KEY (`sede`) REFERENCES `sedi_azienda` (`id_sede`),
  ADD CONSTRAINT `utente_richiede_servizio_servizi_azienda_id_servizio_fk` FOREIGN KEY (`servizio`) REFERENCES `servizi_azienda` (`id_servizio`),
  ADD CONSTRAINT `utente_richiede_servizio_utenti_azienda_id_utente_fk` FOREIGN KEY (`utente`) REFERENCES `utenti_azienda` (`id_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
