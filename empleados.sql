-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 09, 2020 at 08:01 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `direccion_usuario` varchar(250) NOT NULL,
  `membresia_usuario` int(10) NOT NULL,
  `rutina_usuario` varchar(400) NOT NULL,
  `comentario_usuario` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_usuario`, `nombre_usuario`, `direccion_usuario`, `membresia_usuario`, `rutina_usuario`, `comentario_usuario`) VALUES
(5, '3', '3', 3, '', ''),
(6, 'test', 'test', 23, '', ''),
(7, 'el edwin', 'ksdkdsak', 234, '', ''),
(8, 'asdf', 'asdf', 2, '', ''),
(9, 'test', 'dsf', 23, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;