<?

include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS

	$pagina = new Pagina("user_recuperar.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");


	$email = post("email");
	
	if($email != ""){
		$alu = mysql_query("SELECT * FROM `usuarios` WHERE `email_usu` = '$email'") or die(mysql_error());
		if(mysql_num_rows($alu) == 1){
			$alu = mysql_fetch_assoc($alu);
			$senha = randomString(6);
			$senha_crip = criptografa($senha);
			mysql_query("UPDATE `usuarios` SET `senha_usu` = '$senha_crip' WHERE `email_usu` = '$email'") or die(mysql_error());
			$nome = $alu["nome_usu"];
			$login = $alu["login_usu"];
			
			$cabecalho = "From: Rep-WEB\n";
			$assunto = "Recuperar Senha";
			$mensagem = 
			"Caro $nome,\n\n
			Seu login e senha de acesso ao sistema Rep-WEB é: \n\n
			Login: $login \n
			Senha: $senha \n\n
			Foi gerado uma nova senha aleatória,\n
			portanto efetue login no sistema, e altere sua senha\n\n
			\n
			Atenciosamente,
			Equipe Rep-WEB.";
			if(mail("$email", "$assunto", "$mensagem", "$cabecalho"))
				$pagina->addAviso("Atenção $nome. Uma nova senha foi enviada para seu email");
			else
				$pagina->addAdvertencia("Houve um erro no envio do email, contate os administradores");
		}
		else{
			$pagina->addAdvertencia("Email não está cadastrado em nossa base de dados.");
		}
	}
	else{
		$pagina->addAviso("Digite seu email no campo abaixo.");
		//header("Location: index.php");
	}
?>

<?include("../layout/cima.php");?>


					<div class="format_cont">
						<p><?echo $msg?></p>
						<form action="user_recuperar.php" method="post">
							<p><input type="text" name="email" size="40"/></p>
							<p><input type="submit" value="Enviar"/></p>
						</form>
					</div>


<?include("../layout/baixo.php");?>

