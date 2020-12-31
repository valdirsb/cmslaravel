-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Dez-2020 às 21:12
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelbase`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `slug`) VALUES
(1, 'Empresa 1', 'empresa1'),
(2, 'Outra Empresa', 'outra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagecontents`
--

CREATE TABLE `pagecontents` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `content` text,
  `icon` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagecontents`
--

INSERT INTO `pagecontents` (`id`, `page_id`, `title`, `subtitle`, `content`, `icon`, `image`, `type`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Texto da Pagina home', NULL, '/media/images/1608767825.jpeg', 1),
(5, 3, 'Direito Empresarial', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque. Aenean bibendum vulputate consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'flaticon-stats', NULL, 1),
(6, 2, 'Quem Somos', 'Subtitulo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis ante a nibh vestibulum efficitur tristique viverra justo. Fusce porttitor libero vel lorem dignissim, et pretium lectus bibendum. Integer aliquam nisl id magna auctor, ut volutpat massa tincidunt. Fusce lacinia nulla at pharetra porta. Mauris ut urna a velit luctus vulputate vel ultricies libero. Sed sit amet ipsum risus. Ut interdum ipsum eu erat malesuada, ac pellentesque arcu facilisis. Curabitur vel velit magna. Integer gravida neque nec leo pellentesque vehicula. Nunc eget egestas mi. In sit amet magna augue. Vivamus efficitur, felis placerat convallis varius, lorem augue sollicitudin ipsum, ac accumsan mauris justo et erat.', NULL, NULL, 1),
(11, 3, 'Direito Penal', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque. Aenean bibendum vulputate consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'flaticon-handcuffs', NULL, 1),
(12, 4, 'Dr. Fulano de Tal', 'Civil', 'I am an ambitious workaholic, but apart from that, pretty simple person.', NULL, '/media/images/1608762626.jpeg', 1),
(35, 1, 'Expert Attorneys', NULL, 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'flaticon-lawyer', NULL, 2),
(36, 1, 'Case Dismissed', NULL, 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'flaticon-auction', NULL, 2),
(37, 1, 'Court Performance', NULL, 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'flaticon-court', NULL, 2),
(38, 1, 'Court Performance', NULL, 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'flaticon-court', NULL, 2),
(39, 4, 'Dr. Beltrano', 'Advogado Criminalista', 'I am an ambitious workaholic, but apart from that, pretty simple person.', NULL, '/media/images/1608763397.jpeg', 1),
(40, 4, 'Dr. Sicrano', 'Direito Trabalhista', 'I am an ambitious workaholic, but apart from that, pretty simple person.', NULL, '/media/images/1608763515.jpeg', 1),
(41, 4, 'Dra. Fulana', 'Direito Empresarial', 'I am an ambitious workaholic, but apart from that, pretty simple person.', NULL, '/media/images/1608763562.jpeg', 1),
(42, 3, 'Direito Civil', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque. Aenean bibendum vulputate consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'flaticon-family', NULL, 1),
(43, 3, 'Direito Judicial', NULL, 'LoremLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque', 'flaticon-auction', NULL, 1),
(44, 2, 'Missão', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque. Aenean bibendum vulputate consequat.', NULL, NULL, 1),
(45, 2, 'Visão', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque. Aenean bibendum vulputate consequat.', NULL, NULL, 1),
(46, 2, 'Valores', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ipsum sed massa imperdiet, quis tristique purus efficitur. Etiam malesuada nisl a cursus pellentesque. Aenean bibendum vulputate consequat.', NULL, NULL, 1),
(47, 1, 'Lorem ipsum dolor sit amet', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat, enim sollicitudin molestie sagittis, ex justo faucibus ante, a venenatis libero ipsum vel diam. Nam viverra nisl dui, a aliquet ex molestie nec. Phasellus efficitur magna eros, sit amet suscipit nulla ultricies id. Sed pretium eu dolor nec semper. Vivamus urna magna, molestie a iaculis et, ullamcorper maximus mauris. Pellentesque quam metus, consectetur ut pulvinar vitae, consequat sollicitudin mauris. Mauris et quam mollis, pulvinar eros in, bibendum nunc. Quisque suscipit tristique ipsum. Aliquam tellus neque, luctus quis scelerisque et, laoreet id orci. Suspendisse ac convallis dui. In hac habitasse platea dictumst.', NULL, NULL, 3),
(50, 1, 'apagar tipo 1', 'apagar tipo 1', 'apagar tipo 1', NULL, NULL, 3),
(51, 3, 'nova', 'nova', 'nova', 'flaticon-case', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `customer_id`, `name`, `slug`) VALUES
(1, 1, 'Home', 'home'),
(2, 1, 'Quem Somos', 'quem-somos'),
(3, 1, 'Áreas de Atuação', 'areas-de-atuacao'),
(4, 1, 'Equipe', 'equipe'),
(11, 2, 'Pagina Lalala', 'pagina-lalala'),
(22, 1, 'Contato', 'contato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`) VALUES
(1, 'title', 'Leiming & Márcio'),
(2, 'subtitle', 'Advogados Associados'),
(3, 'email', 'exemplo@exemplo.com'),
(4, 'fone', '(81)90000-0000'),
(5, 'bgcolor', '#1f1f1f'),
(6, 'textcolor', '#0466e7'),
(7, 'image', '/media/images/logo.png'),
(8, 'address', 'Rua Bla bla bla, nº 125 Bairro Não sei');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'valdir', 'valdirsb@gmail.com', '$2y$10$Da/F740yYmOlStbXVwliOu/KWYw0e0wAJH0C9q1lPz65k/z.lBGpS', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagecontents`
--
ALTER TABLE `pagecontents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pagecontents`
--
ALTER TABLE `pagecontents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
