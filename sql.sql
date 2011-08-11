-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2011 at 02:38 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rep_web`
--
CREATE DATABASE `rep_web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rep_web`;

-- --------------------------------------------------------

--
-- Table structure for table `anunciantes`
--

CREATE TABLE IF NOT EXISTS `anunciantes` (
  `id_anu` int(10) NOT NULL auto_increment,
  `largura_anu` int(4) NOT NULL default '100',
  `altura_anu` int(4) NOT NULL default '100',
  `descricao_anu` varchar(255) NOT NULL,
  `link_anu` varchar(255) NOT NULL,
  `id_arq_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_anu`),
  KEY `id_arq_fk` (`id_arq_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `anunciantes`
--

INSERT INTO `anunciantes` (`id_anu`, `largura_anu`, `altura_anu`, `descricao_anu`, `link_anu`, `id_arq_fk`) VALUES
(1, 100, 100, 'Validator HTML', 'http://www.google.com.br', 1);

-- --------------------------------------------------------

--
-- Table structure for table `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `id_arq` int(10) NOT NULL auto_increment,
  `caminho_arq` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_arq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `arquivos`
--

INSERT INTO `arquivos` (`id_arq`, `caminho_arq`) VALUES
(1, '../imagens/validator_html.png');

-- --------------------------------------------------------

--
-- Table structure for table `citacoes_mensagens`
--

CREATE TABLE IF NOT EXISTS `citacoes_mensagens` (
  `id_cit_men` varchar(10) NOT NULL,
  `id_men_fk` int(10) NOT NULL,
  `id_usu_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_cit_men`),
  KEY `id_usu_fk` (`id_usu_fk`),
  KEY `id_men_fk` (`id_men_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citacoes_mensagens`
--


-- --------------------------------------------------------

--
-- Table structure for table `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id_end` int(10) NOT NULL auto_increment,
  `rua_end` varchar(255) NOT NULL,
  `numero_end` varchar(255) NOT NULL,
  `bairro_end` varchar(255) NOT NULL,
  `cep_end` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_end`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enderecos`
--


-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id_eve` int(10) NOT NULL auto_increment,
  `nome_eve` varchar(255) NOT NULL,
  `descricao_eve` text NOT NULL,
  `local_eve` text NOT NULL,
  `data_eve` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `id_rep_fk` int(10) NOT NULL,
  `id_end_fk` int(10) default NULL,
  `id_loc_fk` int(10) default NULL COMMENT 'localiza��o do evento',
  PRIMARY KEY  (`id_eve`),
  KEY `id_loc_fk` (`id_loc_fk`),
  KEY `id_rep_fk` (`id_rep_fk`),
  KEY `id_end_fk` (`id_end_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `eventos`
--


-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_gru` int(10) NOT NULL auto_increment,
  `nome_gru` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_gru`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id_gru`, `nome_gru`) VALUES
(1, 'Internauta'),
(2, 'Administradores'),
(3, 'Usuário');

-- --------------------------------------------------------

--
-- Table structure for table `localizacoes`
--

CREATE TABLE IF NOT EXISTS `localizacoes` (
  `id_loc` int(10) NOT NULL,
  `latitude_loc` double NOT NULL,
  `longitude_loc` double NOT NULL,
  PRIMARY KEY  (`id_loc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localizacoes`
--


-- --------------------------------------------------------

--
-- Table structure for table `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id_men` int(10) NOT NULL auto_increment,
  `id_usu_from_fk` int(10) NOT NULL,
  `texto_men` text NOT NULL,
  `data_men` date default NULL,
  PRIMARY KEY  (`id_men`),
  KEY `id_usu_from` (`id_usu_from_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mensagens`
--


-- --------------------------------------------------------

--
-- Table structure for table `mensagens_eve`
--

CREATE TABLE IF NOT EXISTS `mensagens_eve` (
  `id_men_eve` int(10) NOT NULL auto_increment,
  `id_men_fk` int(10) NOT NULL,
  `id_eve_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_men_eve`),
  KEY `id_men_fk` (`id_men_fk`),
  KEY `id_eve_fk` (`id_eve_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mensagens_eve`
--


-- --------------------------------------------------------

--
-- Table structure for table `mensagens_rep`
--

CREATE TABLE IF NOT EXISTS `mensagens_rep` (
  `id_men_rep` int(10) NOT NULL,
  `id_rep_fk` int(10) NOT NULL,
  `id_men_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_men_rep`),
  KEY `id_rep_fk` (`id_rep_fk`),
  KEY `id_men_fk` (`id_men_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensagens_rep`
--


-- --------------------------------------------------------

--
-- Table structure for table `mensagens_usu`
--

CREATE TABLE IF NOT EXISTS `mensagens_usu` (
  `id_men_usu` int(10) NOT NULL auto_increment,
  `id_men_fk` int(10) NOT NULL,
  `id_usu_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_men_usu`),
  KEY `id_usu_fk` (`id_usu_fk`),
  KEY `id_men_fk` (`id_men_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mensagens_usu`
--


-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_men` int(10) NOT NULL auto_increment,
  `nome_men` varchar(255) default NULL,
  `caminho_men` varchar(255) NOT NULL,
  `posicao_men` int(5) NOT NULL,
  PRIMARY KEY  (`id_men`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_men`, `nome_men`, `caminho_men`, `posicao_men`) VALUES
(1, 'Administração Sistema', '', 2),
(2, 'Rep-WEB', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paginas_dinamicas`
--

CREATE TABLE IF NOT EXISTS `paginas_dinamicas` (
  `id_pag` int(10) NOT NULL auto_increment,
  `texto_pag` text NOT NULL,
  PRIMARY KEY  (`id_pag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paginas_dinamicas`
--


-- --------------------------------------------------------

--
-- Table structure for table `paginas_menu`
--

CREATE TABLE IF NOT EXISTS `paginas_menu` (
  `id_pag` int(10) NOT NULL auto_increment,
  `caminho_pag` varchar(255) NOT NULL,
  `nome_pag` varchar(255) NOT NULL,
  `posicao_pag` int(5) NOT NULL,
  `visivel_pag` int(1) NOT NULL default '1',
  `id_men_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_pag`),
  KEY `id_men_fk` (`id_men_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `paginas_menu`
--

INSERT INTO `paginas_menu` (`id_pag`, `caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_pag`, `id_men_fk`) VALUES
(1, 'registrar_paginas.php', 'Registrar Páginas', 1, 1, 1),
(2, 'registrar_permissoes.php', 'Registrar Permissões', 2, 1, 1),
(3, 'registrar_grupos.php', 'Registrar Grupos', 3, 1, 1),
(4, 'registrar_menus.php', 'Registrar Menus', 4, 1, 1),
(5, 'registrar_republicas.php', 'Registrar Repúblicas', 5, 1, 1),
(6, 'registrar_usuarios.php', 'Registrar Usuários', 6, 1, 1),
(7, 'buscar_evento.php', 'Buscar Evento', 1, 1, 2),
(8, 'buscar_republica.php', 'Buscar República', 2, 1, 2),
(9, 'buscar_usuario.php', 'Buscar Usuario', 3, 1, 2),
(10, 'cadastrar_evento.php', 'Cadastrar Evento', 4, 1, 2),
(11, 'cadastrar_mensagens.php', 'Cadastrar Mensagens', 5, 1, 2),
(12, 'cadastrar_republica.php', 'Cadastrar República', 6, 1, 2),
(13, 'exibir_evento_especifico.php', 'Exibir Evento Específico', 7, 1, 2),
(14, 'exibir_eventos.php', 'Exibir Eventos', 8, 1, 2),
(15, 'exibir_republica.php', 'Exibir Republica', 9, 1, 2),
(16, 'registrar_arquivos.php', 'Registrar Arquivos', 7, 1, 1),
(17, 'registrar_anunciantes.php', 'Registrar Anunciantes', 8, 1, 1),
(18, 'senha_alterar.php', 'Alterar Senha', 9, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
  `id_perf_usu` int(10) NOT NULL auto_increment,
  `id_usu_fk` int(10) NOT NULL,
  `nome_perf_usu` varchar(255) NOT NULL,
  `nascimento_perf_usu` varchar(10) NOT NULL,
  `imagem_perf_usu` varchar(255) NOT NULL,
  `cidade_perf_usu` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_perf_usu`),
  KEY `id_usu_fk` (`id_usu_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `perfil_usuario`
--


-- --------------------------------------------------------

--
-- Table structure for table `permissao_grupo`
--

CREATE TABLE IF NOT EXISTS `permissao_grupo` (
  `id_perm` int(10) NOT NULL auto_increment,
  `id_gru_fk` int(10) NOT NULL,
  `id_pag_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_perm`),
  UNIQUE KEY `id_gru_fk` (`id_gru_fk`,`id_pag_fk`),
  KEY `id_pag_fk` (`id_pag_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `permissao_grupo`
--

INSERT INTO `permissao_grupo` (`id_perm`, `id_gru_fk`, `id_pag_fk`) VALUES
(18, 2, 1),
(19, 2, 2),
(20, 2, 3),
(21, 2, 4),
(22, 2, 5),
(23, 2, 6),
(24, 2, 7),
(25, 2, 8),
(26, 2, 9),
(27, 2, 10),
(28, 2, 11),
(29, 2, 12),
(30, 2, 13),
(31, 2, 14),
(32, 2, 15),
(33, 2, 16),
(34, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `presenca_evento`
--

CREATE TABLE IF NOT EXISTS `presenca_evento` (
  `id_pres_eve` int(10) NOT NULL auto_increment,
  `id_usu_fk` int(10) NOT NULL,
  `id_eve_fk` int(10) NOT NULL,
  `situacao_pres_eve` varchar(1) NOT NULL,
  `data_pres_eve` date NOT NULL,
  PRIMARY KEY  (`id_pres_eve`),
  KEY `id_eve_fk` (`id_eve_fk`),
  KEY `id_usu_fk` (`id_usu_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `presenca_evento`
--


-- --------------------------------------------------------

--
-- Table structure for table `republicas`
--

CREATE TABLE IF NOT EXISTS `republicas` (
  `id_rep` int(10) NOT NULL auto_increment,
  `nome_rep` varchar(255) NOT NULL,
  `descricao_rep` text NOT NULL,
  `capacidade_rep` int(2) NOT NULL COMMENT 'quantidade m�xima de moradores',
  `tel_rep` varchar(15) default NULL,
  `rua_rep` varchar(80) NOT NULL,
  `num_rep` varchar(10) NOT NULL,
  `bairro_rep` varchar(50) default NULL,
  `cidade_rep` varchar(60) NOT NULL,
  `foto` varchar(100) default NULL,
  `data_fun` varchar(20) default NULL,
  `id_loc_fk` int(10) default NULL,
  PRIMARY KEY  (`id_rep`),
  KEY `id_loc_fk` (`id_loc_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `republicas`
--


-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(10) NOT NULL auto_increment,
  `nome_usu` varchar(255) NOT NULL,
  `login_usu` varchar(255) NOT NULL,
  `senha_usu` varchar(255) NOT NULL,
  `email_usu` varchar(255) NOT NULL,
  `id_end_fk` int(10) default NULL,
  `id_gru_fk` int(10) NOT NULL,
  PRIMARY KEY  (`id_usu`),
  KEY `id_end_fk` (`id_end_fk`),
  KEY `id_gru_fk` (`id_gru_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nome_usu`, `login_usu`, `senha_usu`, `email_usu`, `id_end_fk`, `id_gru_fk`) VALUES
(1, 'Alisson Fernando Coelho do Carmo', 'alisondocarmo', 'SA1Fh0bVghQyE', 'alisondocarmo@gmail.com', NULL, 2),
(2, 'Raphael Garcia', 'raphael-web-rep', 'SA.d/yogzCwpI', 'rapahel@fct.unesp.br', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_republicas`
--

CREATE TABLE IF NOT EXISTS `usuarios_republicas` (
  `id_usu_rep` int(10) NOT NULL,
  `id_usu_fk` int(10) NOT NULL,
  `id_rep_fk` int(10) NOT NULL,
  `situacao_usu_rep` varchar(1) NOT NULL COMMENT 'indica se o usu�rio mora atualmente ou n�o na republica',
  `data_entrada_usu_rep` date NOT NULL,
  `data_saida_usu_rep` date default NULL,
  PRIMARY KEY  (`id_usu_rep`),
  KEY `id_usu_fk` (`id_usu_fk`),
  KEY `id_rep_fk` (`id_rep_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios_republicas`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `anunciantes`
--
ALTER TABLE `anunciantes`
  ADD CONSTRAINT `anunciantes_ibfk_1` FOREIGN KEY (`id_arq_fk`) REFERENCES `arquivos` (`id_arq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `citacoes_mensagens`
--
ALTER TABLE `citacoes_mensagens`
  ADD CONSTRAINT `citacoes_mensagens_ibfk_1` FOREIGN KEY (`id_men_fk`) REFERENCES `mensagens` (`id_men`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citacoes_mensagens_ibfk_2` FOREIGN KEY (`id_usu_fk`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_rep_fk`) REFERENCES `republicas` (`id_rep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_end_fk`) REFERENCES `enderecos` (`id_end`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventos_ibfk_3` FOREIGN KEY (`id_loc_fk`) REFERENCES `localizacoes` (`id_loc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`id_usu_from_fk`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mensagens_eve`
--
ALTER TABLE `mensagens_eve`
  ADD CONSTRAINT `mensagens_eve_ibfk_1` FOREIGN KEY (`id_men_fk`) REFERENCES `mensagens` (`id_men`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensagens_eve_ibfk_2` FOREIGN KEY (`id_eve_fk`) REFERENCES `eventos` (`id_eve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mensagens_rep`
--
ALTER TABLE `mensagens_rep`
  ADD CONSTRAINT `mensagens_rep_ibfk_1` FOREIGN KEY (`id_rep_fk`) REFERENCES `republicas` (`id_rep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensagens_rep_ibfk_2` FOREIGN KEY (`id_men_fk`) REFERENCES `mensagens` (`id_men`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mensagens_usu`
--
ALTER TABLE `mensagens_usu`
  ADD CONSTRAINT `mensagens_usu_ibfk_1` FOREIGN KEY (`id_men_fk`) REFERENCES `mensagens` (`id_men`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensagens_usu_ibfk_2` FOREIGN KEY (`id_usu_fk`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paginas_menu`
--
ALTER TABLE `paginas_menu`
  ADD CONSTRAINT `paginas_menu_ibfk_1` FOREIGN KEY (`id_men_fk`) REFERENCES `menus` (`id_men`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD CONSTRAINT `perfil_usuario_ibfk_1` FOREIGN KEY (`id_usu_fk`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissao_grupo`
--
ALTER TABLE `permissao_grupo`
  ADD CONSTRAINT `permissao_grupo_ibfk_1` FOREIGN KEY (`id_gru_fk`) REFERENCES `grupos` (`id_gru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permissao_grupo_ibfk_2` FOREIGN KEY (`id_pag_fk`) REFERENCES `paginas_menu` (`id_pag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presenca_evento`
--
ALTER TABLE `presenca_evento`
  ADD CONSTRAINT `presenca_evento_ibfk_1` FOREIGN KEY (`id_eve_fk`) REFERENCES `eventos` (`id_eve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presenca_evento_ibfk_2` FOREIGN KEY (`id_usu_fk`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `republicas`
--
ALTER TABLE `republicas`
  ADD CONSTRAINT `republicas_ibfk_1` FOREIGN KEY (`id_loc_fk`) REFERENCES `localizacoes` (`id_loc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_gru_fk`) REFERENCES `grupos` (`id_gru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_end_fk`) REFERENCES `enderecos` (`id_end`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios_republicas`
--
ALTER TABLE `usuarios_republicas`
  ADD CONSTRAINT `usuarios_republicas_ibfk_1` FOREIGN KEY (`id_usu_fk`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_republicas_ibfk_2` FOREIGN KEY (`id_rep_fk`) REFERENCES `republicas` (`id_rep`) ON DELETE CASCADE ON UPDATE CASCADE;

