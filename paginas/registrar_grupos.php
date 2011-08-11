<?
include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_grupos.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

//$con = ConectaDB();


	$tabela["nome"] = "grupos";
	$tabela["identificador"] = "id_gru";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();
	
	$campos["nome_gru"] = array("nome" => "Nome do Grupo", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");

	include("registrar.php.inc");
?>

