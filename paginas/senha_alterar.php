<?

include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS

	$pagina = new Pagina("senha_alterar.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

	
	$senha = post("senha");
	
	if($senha != ""){
		$id_usu = $pagina->getUsuario()->getIdUsuario();
		$senha_crip = criptografa($senha);
		$alu = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE id_usu = '$id_usu'"));
		$email = $alu["email_usu"];
			mysql_query("UPDATE `usuarios` SET `senha_usu` = '$senha_crip' WHERE `id_usu` = '$id_usu'") or die(mysql_error());
			$nome = $alu["nome_usu"];
			$login = $alu["login_usu"];
			
			$cabecalho = "From: Rep-WEB\n";
			$assunto = "Recuperar Senha";
			$mensagem = 
			"Caro $nome,\n\n
			Sua senha foi alterada, e seu login e senha de acesso ao sistema Rep-WEB é: \n\n
			Login: $login \n
			Senha: $senha \n\n
			\n
			\n
			Atenciosamente,
			Equipe Rep-WEB.";
			if(/*mail("$email", "$assunto", "$mensagem", "$cabecalho")*/true)
				$pagina->addAviso("Atenção $nome. A nova senha foi enviada para seu email ".$email);
			else
				$pagina->addAdvertencia("Houve um erro no envio do email, contate os administradores");
	}
	else{
		$pagina->addAviso("Insira a nova senha.");
		//header("Location: index.php");
	}
?>

<?include("../layout/cima.php");?>


					<div class="format_cont">
						<p><?echo $msg?></p>
						<form action="senha_alterar.php" method="post">
							<p><input type="password" name="senha" size="40"/></p>
							<p><input type="password" name="re_senha" size="40"/></p>
							<p><input type="submit" value="Enviar"/></p>
						</form>
					</div>


<?include("../layout/baixo.php");?>

