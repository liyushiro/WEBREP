<?

include_once("banco.php");
include_once("DynamicForm.php");

function randomString($dim){
	$conteudo = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$str = "";
	for($i=0;$i<$dim;$i++) {
		$str .= $conteudo{rand(0,35)};
	}

	return $str;
}

function __autoload($class_name) {
    include_once "../config/".$class_name.'.php';
}


//Criptografa a senha para armazenar no banco de dados
function criptografa($senha){
	return crypt($senha,"SA");
}

function br2nl($text) {
	return  preg_replace('/<br\\s*?\/??>/i', '', $text);
}
function nl2br2($text){
	return str_replace("\r\n","",trim(nl2br($text)));
}


//retorna o atributo unico da SQL
function getAtrQuery($sql){
	//$con = ConectaDB();
	$rs = mysql_query($sql/*, $con*/);
	$rs = mysql_fetch_row($rs);
	//DesconectaDB($con);
}
// =====================================================================CONTROLE DE USUARIO
function getNomeGrupo(){
	//session_start();
	return $_SESSION["nome_grupo_user_S"];
}
function getIdGrupo(){
	//session_start();
	return $_SESSION["id_grupo_user_S"];
}
function getIdEquipe(){
	//session_start();
	return $_SESSION["id_equipe_user_S"];
}
function getNome(){
	//session_start();
	return $_SESSION["nome_user_S"];
}
function getId(){
	//session_start();
	return $_SESSION["id_user_S"];
}

function setNomeGrupo($v){
	//session_start();
	$_SESSION["nome_grupo_user_S"] = $v;
}
function setIdGrupo($v){
	//session_start();
	$_SESSION["id_grupo_user_S"] = $v;
}
function setIdEquipe($v){
	//session_start();
	$_SESSION["id_equipe_user_S"] = $v;
}
function setNome($v){
	//session_start();
	$_SESSION["nome_user_S"] = $v;
}
function setId($v){
	//session_start();
	$_SESSION["id_user_S"] = $v;
}

function getIdAdminGroup(){
	return 2;
}

function getEmailsAdmins(){
			$rsAdm = mysql_query("SELECT * FROM `integrantes` WHERE `integrantes`.`id_gru_FK` = '".getIdAdminGroup()."'");
			$dest = "";
			while($linha = mysql_fetch_assoc($rsAdm)){
				$dest.=$linha["email_integ"].", ";
			}
			return $dest;
}

function VerificaPermissao($pagina){
	if(!PodeVerPagina($pagina))
		die("Voce nao tem permissao para ver");
		
}

function PodeVerPagina($pagina){
	$grupo = getIdGrupo();
	//internauta
	if($grupo == ""){
		setIdGrupo(1);
		setNome("Internauta");
		setNomeGrupo("Internauta");
		$grupo = 1;
	}
	
	$sql = "SELECT * FROM `permissao_grupo`, `paginas`
			WHERE `permissao_grupo`.`id_pag_FK` = `paginas`.`id_pag` AND `permissao_grupo`.`id_gru_FK` =  '$grupo' AND `paginas`.`caminho_pag` = '$pagina'";
	
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) != 1)
		return false;
	
	return true;
}



// =====================================================================
function UltimoIDInserido(/*$conexao*/){
	$res = mysql_fetch_row(mysql_query("SELECT LAST_INSERT_ID()"/*, $conexao*/));
	$id= $res[0];
	return $id;
}

function post($post)
{
//	$var = htmlspecialchars(trim($_POST["$post"]));
	$var = (trim($_POST["$post"]));
	$var = str_replace("'", "`", $var);	
	return $var;
}

function get($get)
{
//	$var = htmlspecialchars(trim($_GET["$get"]));
	$var = trim($_GET["$get"]);
	$var = str_replace("'", "`", $var);	
	return $var;
}

function ArquivoPermitido($nome){
		$arquivo = isset($_FILES[$nome]) ? $_FILES[$nome] : FALSE;
		if($arquivo["name"] == ""){
			echo "<br />Nome de arquivo vazio";
			return false;
		}
		else if (
				($arquivo["type"] != "application/msword") &&
				($arquivo["type"] != "text/plain") &&
				($arquivo["type"] != "text/richtext") &&
				($arquivo["type"] != "application/vnd.ms-excel") &&
				($arquivo["type"] != "application/zip") &&
				($arquivo["type"] != "application/x-zip-compressed") &&
				($arquivo["type"] != "application/rar") &&
				($arquivo["type"] != "application/x-rar") && 
				($arquivo["type"] != "application/x-php") &&
				($arquivo["type"] != "application/octet-stream") &&
				($arquivo["type"] != "text/html") && (0!=0)
		){
			echo "<br />Arquivo com extensão ".$arquivo["type"];
			echo "<br />São permitidos apenas arquivos .zip, .rar, Word, Excel, .txt, .rtx";
			return false;			
		}
		else if ($arquivo["size"] > (10*1024*1024)){ //10MB
			echo "<br />Arquivo muito grande, tamanho: ".($arquivo["size"]/1024.0)." KB";
			echo "<br />São permitidos apenas arquivos menores que 10 MB";
			return false;
		}else{
			return true;
		}
}

function getExtensao($mime){
	if($mime == "application/msword") return ".doc";
	if($mime == "text/plain") return ".txt";
	if($mime == "text/richtext") return ".rtx";
	if($mime == "application/vnd.ms-excel") return ".xlt";
	if($mime == "application/zip") return ".zip";
	if($mime == "application/x-rar") return ".rar";
	if($mime == "application/rar") return ".rar";
	if($mime == "application/x-php") return "";
	if($mime == "text/html") return "";
	if($mime == "application/octet-stream") return "";
	
}

function SalvaArquivoServidor($nome, $pasta = "../imagens/", $nome_arquivo = ""){
	$arq = $_FILES[$nome];
	$file_temp = $arq["tmp_name"];
	$nome_orig = $arq["name"];
	$ext_orig = end(explode(".", strtolower($nome_orig)));
	//$novo_nome = $pasta . str_replace(" ", "_", $nome_arquivo).getExtensao($arq["type"]);
	if($nomeArquivo != "")
		$novo_nome = $pasta . str_replace(" ", "_", $nome_arquivo).".".$ext_orig;
	else
		$novo_nome = $pasta . $nome_orig;
	if($novo_nome != ""){
		if(ArquivoPermitido($nome)){
			//ENVIA O ARQUIVO PARA A PASTA
			if(!copy($file_temp, $novo_nome)){
				die("Erro 654: Ocorreu um erro na cópia do arquivo para o servidor!");
			}
			else{
				return $novo_nome;
			}
		}
		else{
			die("Tipo de Arquivo não permitido");
		}
	}
	else
		die("ERRO 123: Erro ao configurar novo nome do arquivo no servidor");
}

function getStringConsulta($sql/*, $con*/){
	$rs = mysql_query($sql/*, $con*/) or die(mysql_error());	
	$rs = mysql_fetch_array($rs);
	return $rs[0];
}

?>
