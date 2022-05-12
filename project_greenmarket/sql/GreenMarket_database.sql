-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql212.byetcluster.com
-- Tempo de geração: 12-Maio-2022 às 13:48
-- Versão do servidor: 10.3.27-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_31612828_GreenMarket`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_addr_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `zip` smallint(6) NOT NULL,
  `province` smallint(6) NOT NULL,
  `city` smallint(6) NOT NULL,
  `district` smallint(6) NOT NULL,
  `address` varchar(200) NOT NULL,
  `coordinate` varchar(200) NOT NULL,
  `is_default` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer_login`
--

CREATE TABLE `customer_login` (
  `customer_id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `name` char(32) DEFAULT NULL,
  `email` char(32) NOT NULL,
  `accountType` char(32) DEFAULT NULL,
  `birthday` char(32) DEFAULT NULL,
  `gender` char(32) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `phone` char(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `customer_login`
--

INSERT INTO `customer_login` (`customer_id`, `username`, `password`, `name`, `email`, `accountType`, `birthday`, `gender`, `registration_date`, `phone`, `created_at`) VALUES
(10, 'lucas', 'lucas1234', NULL, 'lucas@hotmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-05 18:09:25'),
(5, 'jacobino', 'jacobino1234', NULL, 'jacobino@hotmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-03 23:00:14'),
(6, 'frfrfrfr', 'frfrfrfrfrfr', NULL, 'franciscofdias2@gmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-03 23:37:34'),
(7, 'Filipe00', 'Filipe00', NULL, 'filipeOMaior@gmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-03 23:37:42'),
(8, 'francisco', 'francisco123', NULL, 'franciscofdias248@gmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-04 10:59:11'),
(9, 'jerondino', 'jerondino123', NULL, 'jerondino@hotmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-05 16:52:29'),
(13, 'hugo', 'hugo1234', NULL, 'hugo@hotmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-05 19:48:23'),
(12, 'daniel', 'daniel12345', NULL, 'daniel@hotmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-05 18:35:22'),
(14, 'tom@hotmail.com', 'tomtom', NULL, 'tom', NULL, NULL, NULL, NULL, NULL, '2022-05-05 19:49:34'),
(15, 'Manuel', 'manuel1234', NULL, 'Manuel@hotmail.com', NULL, NULL, NULL, NULL, NULL, '2022-05-08 17:38:30'),
(16, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '2022-05-08 18:20:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_cart`
--

CREATE TABLE `order_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_amount` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_detail`
--

CREATE TABLE `order_detail` (
  `item_id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(8,2) DEFAULT NULL,
  `procuct_cnt` int(11) NOT NULL DEFAULT 1,
  `all_amount` decimal(8,2) DEFAULT NULL,
  `buy_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_addr_id` int(11) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_time` datetime DEFAULT NULL,
  `shipping_time` datetime DEFAULT NULL,
  `receive_time` datetime DEFAULT NULL,
  `cancel_time` datetime DEFAULT NULL,
  `closed_type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `one_category_id` smallint(5) UNSIGNED NOT NULL,
  `one_category_type` varchar(50) DEFAULT NULL,
  `one_category_subtype` varchar(50) DEFAULT NULL,
  `two_category_id` smallint(5) UNSIGNED NOT NULL,
  `two_category_type` varchar(50) DEFAULT NULL,
  `two_category_subtype` varchar(50) DEFAULT NULL,
  `w_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `production_date` datetime NOT NULL,
  `resoure_cast` int(11) NOT NULL,
  `poluition_caused` int(11) NOT NULL,
  `shelf_life` int(11) NOT NULL,
  `descript` text NOT NULL,
  `pic_desc` varchar(50) NOT NULL DEFAULT '',
  `eletricity_cast` int(11) DEFAULT NULL,
  `water_cast` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `product_info`
--

INSERT INTO `product_info` (`product_id`, `product_name`, `one_category_id`, `one_category_type`, `one_category_subtype`, `two_category_id`, `two_category_type`, `two_category_subtype`, `w_id`, `price`, `production_date`, `resoure_cast`, `poluition_caused`, `shelf_life`, `descript`, `pic_desc`, `eletricity_cast`, `water_cast`) VALUES
(1, 'Máquina de Lavar Rou', 1, NULL, NULL, 1, NULL, NULL, 1, '549.00', '2022-05-03 00:00:00', 25, 3, 11, '', '', 11, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `shipping_info`
--

CREATE TABLE `shipping_info` (
  `ship_id` tinyint(4) NOT NULL,
  `transporter_id` int(10) UNSIGNED NOT NULL,
  `reveiver_id` int(10) UNSIGNED NOT NULL,
  `v_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `distance_value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veichle_info`
--

CREATE TABLE `veichle_info` (
  `v_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `veiche_type` char(50) NOT NULL,
  `poluition_caused` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `warehouse_info`
--

CREATE TABLE `warehouse_info` (
  `w_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_sn` char(5) NOT NULL,
  `warehouse_name` varchar(10) NOT NULL,
  `warehouse_phone` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `province` smallint(6) NOT NULL,
  `city` smallint(6) NOT NULL,
  `district` smallint(6) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_addr_id`),
  ADD KEY `fk_customer_login_customer_address` (`customer_id`);

--
-- Índices para tabela `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_order_cart_customer_login` (`customer_id`),
  ADD KEY `fk_order_cart_product_info` (`product_id`);

--
-- Índices para tabela `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_detail_product_info` (`product_id`);

--
-- Índices para tabela `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_master_customer_login` (`customer_id`),
  ADD KEY `fk_order_master_custome_address` (`customer_addr_id`);

--
-- Índices para tabela `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_info_warehouse_info` (`w_id`);

--
-- Índices para tabela `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`ship_id`),
  ADD KEY `fk_shipping_info_order_detail` (`transporter_id`),
  ADD KEY `reveiver_id` (`reveiver_id`),
  ADD KEY `fk_shipping_info_order_master` (`order_id`),
  ADD KEY `fk_shipping_info_veichel_info` (`v_id`);

--
-- Índices para tabela `veichle_info`
--
ALTER TABLE `veichle_info`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `fk_veichle_info_customer_login` (`customer_id`);

--
-- Índices para tabela `warehouse_info`
--
ALTER TABLE `warehouse_info`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `fk_warehouse_info_customer_login` (`customer_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_addr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veichle_info`
--
ALTER TABLE `veichle_info`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `warehouse_info`
--
ALTER TABLE `warehouse_info`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
