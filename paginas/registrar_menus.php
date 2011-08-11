<?

include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_menus.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

//$con = ConectaDB();


	$tabela["nome"] = "menus";
	$tabela["identificador"] = "id_men";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();

	$campos["posicao_men"] = array("nome" => "Posição do Menu", "tipo" => "TEXT", "editavel" => true, "tamanho" => "3");
	$campos["nome_men"] = array("nome" => "Nome do Menu", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	$campos["caminho_men"] = array("nome" => "Link do Menu", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");

	include("registrar.php.inc");
?>

