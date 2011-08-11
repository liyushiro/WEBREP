<?
	$grupo = $pagina->getUsuario()->getIdGrupo();

	//$perm = mysql_query("SELECT `id_menu_FK` FROM `paginas`, `permissao_grupo`, `grupos` WHERE `paginas`.`id_pag` = `permissao_grupo`.`id_pag_FK` AND `permissao_grupo`.`id_gru_FK` = `grupos`.`id_gru` AND `grupos`.`nome_gru` = '$grupo'") or die(mysql_error());
$SQL = "SELECT * FROM `menus` WHERE `menus`.`id_men` IN (SELECT `id_men_fk` FROM `paginas_menu`, `permissao_grupo`, `grupos` WHERE `paginas_menu`.`id_pag` = `permissao_grupo`.`id_pag_fk` AND `permissao_grupo`.`id_gru_fk` = '$grupo') ORDER BY `posicao_men`, `nome_men`";

$menus = mysql_query($SQL) or die(mysql_error());

?>
		<?if(!$pagina->userLogado()){?>
			<div class="menu_titulo">Entrar</div>
				<div class="menu_links">
					<form action="user_logar.php" method="post">
						Login:
						<input type="text" name="login" class="login"></input>
						Senha:
						<input type="password" name="senha" class="senha"></input>
						<div class="centralizar">
							<input type="submit" value="entrar" class="botao"/>
							<a href="user_recuperar.php">Recuperar Senha</a>
							<a href="user_cadastrar.php">Cadastrar-se</a>
						</div>
					</form>
				</div>
			<div class="menu_fim"></div>
		<?}else{?>
			<div class="menu_titulo">Bem Vindo <?echo $pagina->getUsuario()->getNomeUsuario()?></div>
				<div class="menu_links">
					<img src="../imagens/Koala.jpg" width="150"/>
					<div class="centralizar">
						<a href="senha_alterar.php">Alterar Senha</a>
						<a href="perfil_alterar.php">Editar Perfil</a>
						<a href="opcoes_alterar.php">Opções</a>
						<a href="user_logar.php?a=out">Sair</a>
					</div>
				</div>
			<div class="menu_fim"></div>
		<?}?>

			
  <?while($menu = mysql_fetch_assoc($menus)){?>
			<div class="menu_titulo"><?echo $menu["nome_men"]?></div>
				<ul class="menu_links">
				
					<?
						$m = $menu["id_men"];
						$itens = mysql_query("SELECT * FROM `paginas_menu`, `permissao_grupo` WHERE `paginas_menu`.`id_pag` = `permissao_grupo`.`id_pag_fk` AND `permissao_grupo`.`id_gru_fk` = '$grupo' AND `paginas_menu`.`id_men_fk` = '$m' ORDER BY `posicao_pag`, `nome_pag`") or die(mysql_error());
					   
						while($item = mysql_fetch_assoc($itens)){
							if($item["visivel_pag"] == "1"){
					?>
						<li><a class="menu_links_style" href="<?echo "../paginas/".$item["caminho_pag"]?>">  <?echo $item["nome_pag"]?>  </a></li>
					<?}}?>
				
				</ul>
			<div class="menu_fim"></div>
			<?}?>
