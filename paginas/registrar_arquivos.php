<?
include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_arquivos.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

//$con = ConectaDB();


	$tabela["nome"] = "arquivos";
	$tabela["identificador"] = "id_arq";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();

	$tabela["tem_arquivo"] = true;
	
	$campos["caminho_arq"] = array("nome" => "Caminho do Arquivo", "tipo" => "FILE", "editavel" => true, "tamanho" => "30");

	include("registrar.php.inc");
?>

