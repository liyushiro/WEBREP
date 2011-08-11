--
-- Banco de Dados: `cs_pes`
--

-- --------------------------------------------------------

--
--
DROP DATABASE IF EXISTS `cs_pes`;
CREATE DATABASE `cs_pes` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cs_pes`;


-- --------------------------------------------------------


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_usr` int(5) NOT NULL auto_increment,
  `id_gru_FK` int(5) NOT NULL,
  `nome_usr` varchar(100) default NULL,
  `email_usr` varchar(100) default NULL,
  `login_usr` varchar(100) default NULL,
  `senha_usr` varchar(50) default NULL,
  PRIMARY KEY  (`id_usr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- -------------------------------------------------------
-- CADASTROS DE TODAS AS PAGINAS, QUE APARECERRÃO COMO ITENS NO MENU
DROP TABLE IF EXISTS `paginas`;
CREATE TABLE IF NOT EXISTS `paginas` (
  `id_pag` int(5) NOT NULL auto_increment,
  `caminho_pag` varchar(255) NOT NULL,
  `nome_pag` varchar(255) NOT NULL,
  `posicao_pag` int(5) NOT NULL,
  `visivel_menu` int(1) NOT NULL,
  `id_menu_FK` int(5) NOT NULL,
  PRIMARY KEY  (`id_pag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- CADASTROS DE TODOS OS TÍTULOS DOS MENUS
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_men` int(5) NOT NULL auto_increment,
  `nome_men` varchar(255) default NULL,
  `posicao_men` int(5) NOT NULL,
  PRIMARY KEY  (`id_men`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- CADASTROS DOS GRUPOS DE ACESSO AO SISTEMA
DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id_gru` int(5) NOT NULL auto_increment,
  `nome_gru` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_gru`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- CONTROLE DE ACESSO DO GRUPO DE USUÁRIO, AOS ITENS DOS MENUS, se registrado, então ele pode visualizar
DROP TABLE IF EXISTS `permissao_grupo`;
CREATE TABLE IF NOT EXISTS `permissao_grupo` (
  `id_gru_FK` int(5) NOT NULL,
  `id_pag_FK` int(5) NOT NULL,
  PRIMARY KEY  (`id_gru_FK`, `id_pag_FK`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- =====================================================================
INSERT INTO `grupos` (`id_gru`, `nome_gru`) VALUES (1, 'Internauta');

INSERT INTO `menu` (`nome_men`, `posicao_men`) VALUES ('Administração', 1);

INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('menu_adicionar.php', 'Adicionar menu', '1', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('menus_alterar.php', 'Alterar menu', '2', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('paginas_alterar.php', 'Páginas alterar', '3', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('permissoes_alterar.php', 'Alterar permissões', '4', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('principal.php', 'Principal', '5', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('recuperar_senha.php', 'Recuperar senha', '6', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('user_adicionar.php', 'Cadastrar usuário', '7', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('user_alterar.php', 'Alterar usuário', '8', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('user_logar.php', 'Logar', '9', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('users_alterar.php', 'Alterar usuários', '10', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('pagina_adicionar.php', 'Adicionar página', '11', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('grupo_adicionar.php', 'Adicionar grupo', '12', '1', '1');
INSERT INTO `paginas` (`caminho_pag`, `nome_pag`, `posicao_pag`, `visivel_menu`, `id_menu_FK`) VALUES ('grupos_alterar.php', 'Alterar grupos', '13', '1', '1');

INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 1);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 2);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 3);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 4);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 5);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 6);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 7);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 8);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 9);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 10);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 11);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 12);
INSERT INTO `permissao_grupo` (`id_gru_FK`, `id_pag_FK`) VALUES ('1', 13);

ALTER DATABASE  `cs_pes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci
