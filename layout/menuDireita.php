<?
$rsEve = mysql_query("SELECT * FROM eventos ORDER BY id_eve DESC LIMIT 10");
$rsUsu = mysql_query("SELECT * FROM usuarios ORDER BY id_usu DESC LIMIT 10");
$rsRep = mysql_query("SELECT * FROM republicas ORDER BY id_rep DESC LIMIT 10");
$rsAnu = mysql_query("SELECT * FROM anunciantes, arquivos WHERE id_arq_fk = id_arq ORDER BY rand() DESC LIMIT 10");

?>
	<?if(mysql_num_rows($rsUsu) > 0){?>
		<div class="menu_titulo">Usuários</div>
			<div class="menu_links">
				<?while($linha = mysql_fetch_assoc($rsUsu)){?>
					<?if($pagina->userLogado()){?>
						<a class="foto_pequena" href="usuario_exibir.php?id=<?echo $linha["IDDDD"]?>"><img src="<?echo $linha["SRC_IMAGEM"]?>" width="35" alt="<?echo $linha["nome_usu"]?>" title="<?echo $linha["nome_usu"]?>"/></a>
					<?}else{?>
						<img class="foto_pequena" src="<?echo $linha["SRC_IMAGEM"]?>" width="35" />
					<?}?>
				<?}?>
			</div>
		<div class="menu_fim"></div>
	<?}?>

	<?if(mysql_num_rows($rsRep) > 0){?>
		<div class="menu_titulo">Repúblicas</div>
			<div class="menu_links">
				<?while($linha = mysql_fetch_assoc($rsRep)){?>
					<?if($pagina->userLogado()){?>
						<a class="foto_pequena" href="usuario_exibir.php?id=<?echo $linha["IDDDD"]?>"><img src="<?echo $linha["SRC_IMAGEM"]?>" width="35" alt="<?echo $linha["nome_usu"]?>" title="<?echo $linha["nome_usu"]?>"/></a>
					<?}else{?>
						<img class="foto_pequena" src="<?echo $linha["SRC_IMAGEM"]?>" width="35" />
					<?}?>
				<?}?>
			</div>
		<div class="menu_fim"></div>
	<?}?>

	<?if(mysql_num_rows($rsEve) > 0){?>
		<div class="menu_titulo">Eventos</div>
			<div class="menu_links">
				<?while($linha = mysql_fetch_assoc($rsEve)){?>
					<?if($pagina->userLogado()){?>
						<a class="foto_pequena" href="usuario_exibir.php?id=<?echo $linha["IDDDD"]?>"><img src="<?echo $linha["SRC_IMAGEM"]?>" width="35" alt="<?echo $linha["nome_usu"]?>" title="<?echo $linha["nome_usu"]?>"/></a>
					<?}else{?>
						<img class="foto_pequena" src="<?echo $linha["SRC_IMAGEM"]?>" width="35" />
					<?}?>
				<?}?>
			</div>
		<div class="menu_fim"></div>
	<?}?>

	<?if(mysql_num_rows($rsAnu) > 0){?>
		<div class="menu_titulo">Anunciantes</div>
			<div class="menu_links">.
				<div class="centralizar">
					<?while($linha = mysql_fetch_assoc($rsAnu)){?>
						<a href="<?echo $linha["link_anu"]?>"><img src="<?echo $linha["caminho_arq"]?>" width="<?echo $linha["largura_anu"]?>" height="<?echo $linha["altura_anu"]?>" title="<?echo $linha["descricao_anu"]?>" alt="<?echo $linha["descricao_anu"]?>"/></a>
					<?}?>
				</div>
			</div>
		<div class="menu_fim"></div>
	<?}?>
