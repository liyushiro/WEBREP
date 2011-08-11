<?

include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_anunciantes.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

//$con = ConectaDB();


	$tabela["nome"] = "anunciantes";
	$tabela["identificador"] = "id_anu";
	$tabela["nome_identificador"] = "ID";
	$tabela["pagina"] = $pagina->getNomeArquivo();

	//$arrayModulos = getInputFromSQL(mysql_query("SELECT id_mod AS ID, nome_mod AS DESCRICAO FROM modulos ORDER BY nome_mod"));
	//$arrayLiberada = array("1" => "Sim", "0" => "Não");


	$arrayImagens = getInputFromSQL(mysql_query("SELECT id_arq AS ID, caminho_arq AS DESCRICAO FROM arquivos ORDER BY caminho_arq"));	

	$campos["largura_anu"] = array("nome" => "Largura", "tipo" => "TEXT", "editavel" => true, "tamanho" => "4");
	$campos["altura_anu"] = array("nome" => "Altura", "tipo" => "TEXT", "editavel" => true, "tamanho" => "4");
	$campos["descricao_anu"] = array("nome" => "Descrição", "tipo" => "TEXTAREA", "editavel" => true, "linhas" => "20", "colunas" => "30");
	$campos["link_anu"] = array("nome" => "Link", "tipo" => "TEXT", "editavel" => true, "tamanho" => "30");
	$campos["id_arq_fk"] = array("nome" => "Imagem", "tipo" => "SELECT", "editavel" => true, "valores" => $arrayImagens);
	
	//$campos["liberada_age"] = array("nome" => "Acesso liberado", "tipo" => "SELECT", "editavel" => true, "valores" => $arrayLiberada);

	include("registrar.php.inc");
	
?>

