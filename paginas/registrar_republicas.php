<?

include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_republicas.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

//$con = ConectaDB();


	$tabela["nome"] = "republicas";
	$tabela["identificador"] = "id_rep";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();

	//$arrayModulos = getInputFromSQL(mysql_query("SELECT id_mod AS ID, nome_mod AS DESCRICAO FROM modulos ORDER BY nome_mod"));
	//$arrayLiberada = array("1" => "Sim", "0" => "Não");


	

	$campos["nome_rep"] = array("nome" => "Nome", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	$campos["descricao_rep"] = array("nome" => "Descrição", "tipo" => "TEXTAREA", "editavel" => true, "linhas" => "20", "colunas" => "30");
	$campos["capacidade_rep"] = array("nome" => "Capacidade", "tipo" => "TEXT", "editavel" => true, "tamanho" => "5");
	$campos["id_loc_fk"] = array("nome" => "Localização", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	
	//$campos["liberada_age"] = array("nome" => "Acesso liberado", "tipo" => "SELECT", "editavel" => true, "valores" => $arrayLiberada);

	include("registrar.php.inc");
	
?>

