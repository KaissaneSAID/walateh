-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 juin 2024 à 06:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `walatech`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `photo`, `descriptions`, `dates`) VALUES
(5, 'kaissaneabdallah', 'Capture d’écran_22-2-2024_8651_.jpeg', 'dsffsd', '2024-03-05'),
(12, 'kaissaneabdallah', 'Capture d’écran_19-2-2024_10751_.jpeg', 'dff,ngs;gs', '2024-03-06'),
(13, 'KAISSANE SAID ', 'WhatsApp Image 2024-02-13 à 20.21.59_fce6d74d.jpg', 'la boîte d\'un élément via une liste d\'ombres séparées par des virgules. Une boîte d\'ombre est définie avec des décalages horizontal et vertical par rapport à l\'élément, avec des rayons de flou et d\'étalement et avec une couleur.', '2024-03-06'),
(14, 'kaissaneabdallah', 'JK-removebg-preview.jpg', 'kkklklklklkllk', '2024-03-08'),
(15, 'kaissaneabdallah', 'FB_IMG_1628873712414-1024x484-1-removebg-preview.png', 'kklkklkllk', '2024-03-08'),
(16, 'ordinateur', 'depositphotos_8350334-stock-photo-desktop-computer-with-wireless-keyboard.jpg', 'ordinateur de haute gamme', '2024-06-06');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nomClient` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nomClient`, `profession`, `images`, `texte`) VALUES
(1, 'Said Ahmed Kaissane', 'papa', 'Capture d’écran 2024-06-06 211057.png', 'nln'),
(2, 'Said Ahmed Kaissane', 'papa', 'Capture d’écran 2024-06-06 211057.png', 'nln'),
(3, 'Said Ahmed Kaissane', 'papa', 'Capture d’écran 2024-06-06 211057.png', 'nln'),
(4, 'MOUAN-OUIA', 'papa', 'WhatsApp Image 2024-05-16 à 14.51.48_ba475421.jpg', 'Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna'),
(5, 'KAISSANE', 'ingenieur', '004-removebg-preview.png', 'ondée le 22 juin 2023, Walatech est une entreprise spécialisée dans les nouvelles technologies, offrant des services innovants dans les domaines informatiques et télécom.');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idActu` int(11) NOT NULL,
  `date_envoi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `messages`) VALUES
(1, 'Amil@gmail.com', 'dfsrz', 'Amil@gmail.com', 'dsqdsqd'),
(2, 'Amil@gmail.com', 'Amil@gmail.com', 'dfsrz', 'dsqdsqd'),
(3, 'kaissane', 'Amil@gmail.com', 'info', 'qdqd'),
(4, 'jhghfgd', 'Amil@gmail.com', 'gdf', 'kkk'),
(5, 'Kaissane', 'skaissaneisidk@groupeisi.com', 'dfsh', 'fzmlrkr\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `domaineop`
--

CREATE TABLE `domaineop` (
  `id` int(11) NOT NULL,
  `libele` varchar(255) NOT NULL,
  `idDomServ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `photo` varchar(333) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `libelle`, `photo`, `description`) VALUES
(2, 'ordinateur', 'depositphotos_2120339-stock-photo-desktop-computer-isolated.jpg', 'ordinateur fixe'),
(3, 'ordinateur', 'depositphotos_2120339-stock-photo-desktop-computer-isolated.jpg', 'ordinateur fixe '),
(4, 'serveur', 'depositphotos_62027941-stock-photo-network-hub-cable-lan-close.jpg', 'serveur '),
(5, 'souris', 'depositphotos_666685580-stock-photo-wireless-computer-mouse-isolated-white.jpg', 'souris d\'une machine ');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `notif`) VALUES
(1, 'Amil@gmail.com', 'Said Ahmed', 'skaissaneisidk@groupeisi.com', 1),
(2, 'Amil@gmail.com', 'Said Ahmed', 'kaissaneabdallah22@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `instagram` text NOT NULL,
  `facebook` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `poste`, `tel`, `email`, `descriptions`, `photo`, `instagram`, `facebook`) VALUES
(1, 'kl', 'dfdf', 5766852, 'Amil@gmail.com', 'mllm', 'Capture d’écran 2024-06-06 211057.png', '', ''),
(2, 'kl', 'dfdf', 5766852, 'Amil@gmail.com', 'mllm', 'Capture d’écran 2024-06-06 211057.png', '', ''),
(3, 'papa', 'delfg', 3434334, 'skaissaneisidk@groupeisi.com', 'mlfamlk', 'blog-2.jpg', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `titre`, `photo`, `descriptions`, `prix`) VALUES
(8, 'Administrations systèmes et infrastructures informatiques ', '1.avif', 'Notre service d\'administration des systèmes et infrastructures informatiques offre une gestion complète et professionnelle de vos environnements IT. Nous nous chargeons de l\'installation, de la configuration, de la maintenance et de la surveillance de vos serveurs, réseaux, et équipements informatiques. Grâce à notre expertise, nous garantissons la performance, la sécurité et la fiabilité de vos systèmes, permettant à votre entreprise de se concentrer sur ses activités principales. Assurez la continuité de votre business avec notre support technique et nos solutions d\'infrastructure personnalisées.', 100000),
(9, 'Etablissement des document HLD, LLD, ', '2.avif', 'Nous offrons un service spécialisé dans l’établissement des documents HLD (High-Level Design) et LLD (Low-Level Design) pour vos projets informatiques. Nos experts créent des plans architecturaux détaillés qui définissent les aspects globaux et spécifiques de votre infrastructure IT.', 30000),
(10, 'Etablissement d’un cahier de charge sur un projet télécom et informatique au sein de l’entreprise.', '5.avif', 'Notre service d’établissement de cahiers des charges est conçu pour vous aider à définir clairement et précisément les exigences de vos projets télécom et informatiques au sein de votre entreprise.\r\n\r\nAvec un cahier des charges bien structuré, vous assurez la clarté et la cohérence de vos projets, facilitant ainsi la collaboration avec les prestataires et garantissant la réalisation de vos objectifs avec succès.', 40000),
(11, 'Dimensionnement et audite d’un réseau local d’entreprise et configuration des équipements réseaux.', 'Audit_analyse_reseau.jpeg', 'Nous offrons des services spécialisés de dimensionnement et d’audit de votre réseau local d’entreprise pour garantir une performance optimale et une sécurité renforcée.\r\n\r\nGrâce à nos services de dimensionnement et d’audit, vous bénéficierez d’un réseau local robuste, sécurisé et prêt à supporter la croissance de votre entreprise.', 90000),
(12, 'Installations et configuration d’un central Téléphonique IP professionnel sur le réseau local de l’entreprise. ', 'Systeme_VOIP.jpeg', 'Nous proposons des services complets pour l’installation et la configuration d’un central téléphonique IP professionnel sur le réseau local de votre entreprise, assurant une communication fluide et efficace.\r\n\r\nAvec notre expertise, transformez votre système de communication en un outil puissant et flexible, supportant vos opérations quotidiennes et contribuant à l\'efficacité globale de votre entreprise.', 50000),
(13, 'Installation et configuration des serveurs d’hébergements multi hosts et mails avec nom de domaine.', 'infrastricture reseau.jpg', 'Nous offrons des services complets pour l’installation et la configuration de serveurs d’hébergement multi-hosts et de serveurs de messagerie, intégrant vos noms de domaine pour une gestion centralisée et efficace.\r\n\r\nAvec notre expertise, bénéficiez d’une infrastructure web et mail performante, sécurisée et adaptée aux besoins de votre entreprise, vous permettant de vous concentrer sur vos activités principales.', 5000),
(14, 'Installation des équipements vidéos surveillances.', '3.avif', 'Nous proposons des services complets pour l’installation et la configuration de systèmes de vidéosurveillance de pointe, garantissant la sécurité et la surveillance efficaces de vos espaces professionnels.\r\n\r\nFaites confiance à notre expertise pour protéger vos installations et assurer la sécurité de vos employés et de vos biens grâce à des solutions de vidéosurveillance modernes et fiables.', 80000),
(15, 'Installation des appareil badgeuses.', '4.avif', 'Nous offrons des services d\'installation et de configuration de systèmes de badgeuses pour une gestion efficace des entrées et sorties au sein de votre entreprise.\r\n\r\nFaites confiance à notre expertise pour améliorer la gestion des accès et des présences au sein de votre entreprise grâce à des solutions de badgeuses modernes et fiables.', 59000),
(16, 'Installation d’un système de contrôle d’accès des portes.', 'controle_acces_port02.jpeg', 'Nous proposons des services professionnels pour l\'installation et la configuration de systèmes de contrôle d\'accès des portes, offrant à votre entreprise une solution fiable et efficace pour protéger ses locaux et ses ressources.\r\n\r\nAvec notre expertise en matière de sécurité des locaux, vous pouvez avoir l\'esprit tranquille en sachant que votre entreprise est protégée par un système de contrôle d\'accès des portes robuste et fiable.', 60000),
(17, 'Installation des énergies renouvelable comme des panneaux voltaïques solaire', 'kit-solaire-autonome.jpg', 'Nous proposons des services professionnels d\'installation de panneaux solaires photovoltaïques pour aider votre entreprise à passer à une source d\'énergie renouvelable et respectueuse de l\'environnement.\r\n\r\nAvec notre solution d\'énergie solaire, vous pouvez non seulement réduire vos coûts énergétiques à long terme, mais aussi contribuer à la protection de l\'environnement en utilisant une source d\'énergie propre et renouvelable.', 30200),
(18, 'Achats et ventes des équipements informatiques réseaux et télécom.', 'laptop-1502499.jpg', 'Nous proposons une gamme complète de services d\'achat et de vente d\'équipements informatiques, réseaux et télécom pour répondre aux besoins de votre entreprise.\r\n\r\n\r\nQue vous cherchiez à acheter de nouveaux équipements ou à vendre des équipements existants, nous sommes là pour vous aider à trouver les meilleures solutions pour votre entreprise. Faites confiance à notre expertise et à notre engagement envers la satisfaction client pour tous vos besoins en équipements informatiques, réseaux et télécom.', 70000),
(19, 'Configuration du VPN pour les entreprises dans le cadre du travail à distant (Télétravail).', '4.avif', 'Notre service de configuration VPN pour entreprises garantit une connexion sécurisée et fiable pour vos employés en télétravail. Grâce à notre VPN, vos équipes peuvent accéder aux ressources internes de l\'entreprise de manière sécurisée, où qu\'elles se trouvent. Nous utilisons des protocoles de chiffrement robustes pour protéger vos données sensibles et assurer une continuité de travail sans interruption. Optimisez votre télétravail', 50300);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comAct` (`idActu`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domaineop`
--
ALTER TABLE `domaineop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domServ` (`idDomServ`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `domaineop`
--
ALTER TABLE `domaineop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `comAct` FOREIGN KEY (`idActu`) REFERENCES `actualite` (`id`);

--
-- Contraintes pour la table `domaineop`
--
ALTER TABLE `domaineop`
  ADD CONSTRAINT `domServ` FOREIGN KEY (`idDomServ`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
