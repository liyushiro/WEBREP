<?

include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_paginas.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");


//$con = ConectaDB();


	$tabela["nome"] = "paginas_menu";
	$tabela["identificador"] = "id_pag";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();

	$arrayMenu = getInputFromSQL(mysql_query("SELECT id_men AS ID, nome_men AS DESCRICAO FROM menus ORDER BY posicao_men, nome_men"));
	$arrayVisivel = array("1" => "Sim", "0" => "Não");

	$campos["id_men_fk"] = array("nome" => "Menu", "tipo" => "SELECT", "editavel" => true, "valores" => $arrayMenu);
	$campos["posicao_pag"] = array("nome" => "Posição", "tipo" => "TEXT", "editavel" => true, "tamanho" => "2");
	$campos["nome_pag"] = array("nome" => "Nome da página", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	$campos["caminho_pag"] = array("nome" => "Link", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	$campos["visivel_pag"] = array("nome" => "Visível no Menu", "tipo" => "SELECT", "editavel" => true, "valores" => $arrayVisivel);

	include("registrar.php.inc");
?>

