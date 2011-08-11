<?
include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS

	$pagina = new Pagina("user_logar.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

	$login = post("login");
	$senha = post("senha"); 

if(get("a") == "out")
	$pagina->setUsuario(new Usuario());
	
if($login!= "" && $senha != ""){
		$senha = criptografa($senha);
		$alu = mysql_query("SELECT * FROM `usuarios` WHERE `login_usu` = '$login' AND `senha_usu` = '$senha'") or die(mysql_error());
		if(mysql_num_rows($alu) == 1){
			//session_start();
			$alu = mysql_fetch_assoc($alu);

			$usuario = new Usuario($alu["id_usu"], $alu["nome_usu"], $alu["id_gru_fk"]);
			
			$pagina->setUsuario($usuario);
			
			//echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal.php'>";
			//header("Location: principal.php");
			$mens = "Bem-vindo ".$usuario->getNomeUsuario();
		}
		else{
			$mens = "Dados inválidos";
			$pagina->setUsuario(new Usuario());
			//echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal.php'>";
			//header("Location: principal.php");
			
		}
		//DesconectaDB($con);
}
else{
	$mens = "Preencha os campos para acessar o sistema";
	//header("Location: index_new2.php");
}

if (get("acao") == "logout"){
	$pagina->setUsuario(new Usuario());
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal.php'>";
	//header("Location: principal.php");
}

?>
<?include("../layout/cima.php");?>

		<?echo $mens?>
		<form action="user_logar.php" method="post">
			<div class="noCentro">Login: <a><input type="text" name="login" size="30"/></a></div>
			<div class="noCentro">Senha: <a><input type="password" name="senha" size="30"/></a></div>
			<div class="noCentro"><a><input type="submit" value="Enviar" /></a></div>
		
			<div class="naEsquerda"><a href="recuperar_senha.php">Esqueci minha senha</a></div>
			<div class="naEsquerda"><a href="user_cadastrar.php">Cadastrar-se</a></div>
		
		</form>
 
<?include("../layout/baixo.php");?>
