<?

include_once "../config/funcoes.php";

$pagina = new Pagina("registrar_permissoes.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");


//$con = ConectaDB();

$grup = post("grupo");


if(get("b") == "gravar"){
	mysql_query("DELETE FROM `permissao_grupo` WHERE `permissao_grupo`.`id_gru_fk` = '$grup'") or die(mysql_error());
	foreach($_POST["permissao"] as $c => $id_pag) //todas as paginas selecionadas
		mysql_query("INSERT INTO `permissao_grupo` (`id_gru_fk`, `id_pag_fk`) VALUES ('$grup', '$id_pag')");
	
}
else if(get("b") == "grupo"){
	
}


$rsPag = mysql_query("SELECT * FROM `paginas_menu`");
$rsGru = mysql_query("SELECT * FROM `grupos`");


//DesconectaDB($con);
?>

<?include("../layout/cima.php");?>


					<form action="registrar_permissoes.php" method="post">Grupo 
						<select name="grupo" size="1" onchange="action = 'registrar_permissoes.php?b=grupo'; submit();">
							<option value="">Selecione</option>
							<?while($linha = mysql_fetch_assoc($rsGru)){?>
							<option value="<?echo $linha["id_gru"]?>" <? if($linha["id_gru"] == post("grupo")) echo "SELECTED";?>> <?echo $linha["nome_gru"]?> </option>
							<?}?>
						</select>
						<br/>
						<table>
							<tr style="text-align: center; font-weight:bold">
								<td>Página</td>
								<td>Permissão</td>
							</tr>
							<?
							while($linha = mysql_fetch_assoc($rsPag)){?>
							<tr>
								<td><?echo $linha["nome_pag"]?></td>
								<td style="text-align: center">
									<input type="checkbox" value="<?echo $linha["id_pag"]?>" name="permissao[]" 
									<?if(mysql_num_rows(mysql_query("SELECT * FROM `permissao_grupo` WHERE `permissao_grupo`.`id_gru_fk` = '".post("grupo")."' AND `permissao_grupo`.`id_pag_fk` = '".$linha["id_pag"]."'")) == 1)
										echo "CHECKED";
									?>
									/>
								</td>
							</tr>
							<?}?>
						</table>
						<br/>
						<input type="submit" value="Gravar" onclick="action = 'registrar_permissoes.php?b=gravar';"/>
					</form>


<?include("../layout/baixo.php");?>

