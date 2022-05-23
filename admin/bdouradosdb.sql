-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 04:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdouradosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) DEFAULT NULL,
  `emailCliente` varchar(100) DEFAULT NULL,
  `senhaCliente` varchar(45) DEFAULT NULL,
  `statusCliente` varchar(20) DEFAULT NULL,
  `dataCadCliente` date DEFAULT NULL,
  `fotoCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contato`
--

CREATE TABLE `contato` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(50) NOT NULL,
  `emailContato` varchar(50) NOT NULL,
  `foneContato` varchar(15) NOT NULL,
  `mensagemContato` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(100) DEFAULT NULL,
  `cnpjCpfEmpresa` varchar(45) DEFAULT NULL,
  `razaoSocialEmpresa` varchar(100) DEFAULT NULL,
  `emailEmpresa` varchar(100) DEFAULT NULL,
  `statusEmpresa` varchar(20) DEFAULT NULL,
  `dataCadEmpresa` date DEFAULT NULL,
  `horarioAtendEmpresa` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fonecliente`
--

CREATE TABLE `fonecliente` (
  `idFoneCliente` int(11) NOT NULL,
  `numeroCliente` varchar(15) DEFAULT NULL,
  `operFoneCliente` varchar(45) DEFAULT NULL,
  `descFoneCliente` varchar(45) DEFAULT NULL,
  `statusFoneCliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foneempresa`
--

CREATE TABLE `foneempresa` (
  `idFoneEmpresa` int(11) NOT NULL,
  `numeroFoneEmpresa` varchar(15) DEFAULT NULL,
  `operFoneEmpresa` varchar(45) DEFAULT NULL,
  `descFoneEmpresa` varchar(45) DEFAULT NULL,
  `statusFoneEmpresa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fonefuncionario`
--

CREATE TABLE `fonefuncionario` (
  `idFoneFuncionario` int(11) NOT NULL,
  `numeroFoneFuncionario` varchar(15) DEFAULT NULL,
  `operFoneFuncionario` varchar(45) DEFAULT NULL,
  `descFoneFuncionario` varchar(45) DEFAULT NULL,
  `statusFoneFuncionario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nomeFuncionario` varchar(100) DEFAULT NULL,
  `emailFuncionario` varchar(100) DEFAULT NULL,
  `senhaFuncionario` varchar(45) DEFAULT NULL,
  `nivelFuncionario` varchar(45) DEFAULT NULL,
  `statusFuncionario` varchar(20) DEFAULT NULL,
  `dataCadFuncionario` date DEFAULT NULL,
  `fotoFuncionario` varchar(100) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `obsReserva` text DEFAULT NULL,
  `dataReserva` date DEFAULT NULL,
  `horaReserva` time DEFAULT NULL,
  `statusReserva` varchar(20) DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idServico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `nomeServico` varchar(100) DEFAULT NULL,
  `descricaoServico` varchar(200) DEFAULT NULL,
  `valorServico` decimal(10,2) DEFAULT NULL,
  `statusServico` varchar(20) DEFAULT NULL,
  `dataCadServico` date DEFAULT NULL,
  `tempoExecServico` time DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servico`
--

INSERT INTO `servico` (`idServico`, `nomeServico`, `descricaoServico`, `valorServico`, `statusServico`, `dataCadServico`, `tempoExecServico`, `idEmpresa`) VALUES
(1, 'Corte', 'Corte masculino/feminino de cabelo, com todo o charme e qualidade dourados!', '40.00', 'ATIVO', '2022-05-18', '00:45:00', 1),
(2, 'Corte e Barba', 'Corte masculino de cabelo e de barba para ficar na régua!', '70.00', 'ATIVO', '2022-05-18', '01:15:00', 1),
(3, 'Barba', 'Uma barba feitinha muda o homem! Feita com as melhores técnicas e toalha quente.', '30.00', 'ATIVO', '2022-05-18', '00:30:00', 1),
(4, 'Progressiva', 'Progressiva com Salon Line para deixar o cabelo liso!', '60.00', 'ATIVO', '2022-05-18', '00:45:00', 1),
(5, 'Relaxamento', 'Menos agressivo que a progressiva, deixa seu cabelo alisado e no estilo!', '40.00', 'ATIVO', '2022-05-18', '00:30:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idContato`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indexes for table `fonecliente`
--
ALTER TABLE `fonecliente`
  ADD PRIMARY KEY (`idFoneCliente`);

--
-- Indexes for table `foneempresa`
--
ALTER TABLE `foneempresa`
  ADD PRIMARY KEY (`idFoneEmpresa`);

--
-- Indexes for table `fonefuncionario`
--
ALTER TABLE `fonefuncionario`
  ADD PRIMARY KEY (`idFoneFuncionario`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonecliente`
--
ALTER TABLE `fonecliente`
  MODIFY `idFoneCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foneempresa`
--
ALTER TABLE `foneempresa`
  MODIFY `idFoneEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonefuncionario`
--
ALTER TABLE `fonefuncionario`
  MODIFY `idFoneFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
