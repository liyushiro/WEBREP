<?
include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS

	$pagina = new Pagina("user_cadastrar.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

$nome=post("nome");
$email=post("email");
$login=post("login");
$senha=post("senha");
$grup=3; //permissão de cadastrado
if($nome != "" && $email != "" && $login != "" && $senha != "" && $grup != "" ){
	
	if(mysql_num_rows(mysql_query("SELECT `login_usu` FROM `usuarios` WHERE `login_usu` = '$login'")) == 0){
		if(mysql_num_rows(mysql_query("SELECT `email_usu` FROM `usuarios` WHERE `email_usu` = '$email'")) == 0){
			$c_senha = criptografa($senha);
			$SQL = "INSERT INTO `usuarios` (`nome_usu`, `email_usu`, `login_usu`, `senha_usu`, `id_gru_fk`) VALUES ('$nome', '$email', '$login', '$c_senha', '$grup')";
			mysql_query($SQL) or die(mysql_error());

			$cabecalho = "From: REP-WEB\n";
			$assunto = "Cadastro  Rep-WEB";
			//Enviar email para o cadastrado
			$dest = $email;
			$mensagem = 
			"Olá $nome,\n
			Obrigado por se cadastrar na rede social Rep-WEB, \n
			abaixo, segue seus dados de cadastro:\n\n
			
			Nome: $nome\n
			Login: $login\n
			Senha: $senha\n
			Email: $email\n

			Comece a utilizar agora mesmo, e monte sua vizinhança.
			
			Atenciosamente,
			Equipe Rep-WEB.";
			if(mail("$dest", "$assunto", "$mensagem", "$cabecalho")) 
			//=========================================================== 
				$pagina->addAviso("Cadastro efetuado com sucesso!<br> Foi Enviado um email com seus dados de cadastro");
			else
				$pagina->addAdvertencia("ERRO no envio de email, contate os administradores do sistema");
		}
		else{
			$pagina->addAdvertencia("Email já existe cadastrado em nossa base");
		}
	}
	else{
		$pagina->addAdvertencia("Login já existe"); 
	}
	
}
else{
	$pagina->addAdvertencia("Preencha todos os campos");
}

?>
<?include("../layout/cima.php");?>


					<div class="format_cont">
						<form action="user_cadastrar.php" method="post">
							<p>Nome: <input type="text" name="nome" size="30"/></p>
							<p>Email: <input type="text" name="email" size="30"/></p>
							<p>Login: <input type="text" name="login" size="30"/></p>
							<p id="p2">Senha: <input type="password" name="senha" size="20"/></p>
							<p>Confirmar Senha: <input type="password" name="senha_confirm" size="20"/></p>
							
							<p><input type="submit" value="Enviar"/></p>
						</form>
					</div>


<?include("../layout/baixo.php");?>

