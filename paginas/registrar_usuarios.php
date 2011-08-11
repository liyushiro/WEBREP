<?

include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_usuarios.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

//$con = ConectaDB();


	$tabela["nome"] = "usuarios";
	$tabela["identificador"] = "id_usu";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();

	$arrayGrupo = getInputFromSQL(mysql_query("SELECT id_gru AS ID, nome_gru AS DESCRICAO FROM grupos ORDER BY nome_gru"));

	$campos["id_gru_fk"] = array("nome" => "Grupo", "tipo" => "SELECT", "editavel" => true, "valores" => $arrayGrupo);
	$campos["nome_usu"] = array("nome" => "Nome", "tipo" => "TEXT", "editavel" => true, "tamanho" => "20");
	$campos["email_usu"] = array("nome" => "Email", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	$campos["login_usu"] = array("nome" => "Login", "tipo" => "TEXT", "editavel" => true, "tamanho" => "10");
	$campos["senha_usu"] = array("nome" => "Senha", "tipo" => "TEXT", "editavel" => true, "tamanho" => "10");
	

	include("registrar.php.inc");
?>

