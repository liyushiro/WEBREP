
	<span class="dadosFundo">
		<a href="<?echo $tabela["pagina"]?>?ACAO=listar"><img alt="listar" title="listar" src="../layout/imagens/icon_search.png" /></a>
		<a href="<?echo $tabela["pagina"]?>?ACAO=inserir"><img alt="inserir" title="inserir" src="../layout/imagens/icon_add.png" /></a>
		<a href="javascript:removerDados(<?echo get("ID")?>)"><img alt="remover item" title="remover item" src="../layout/imagens/icon_delete.png" /></a>
	</span><br />
	
	<table id="blocoEdicao" class="dadosFrente">
		<form id="formEdicao" method="POST" action="<?echo $tabela["pagina"]?>?ACAO=alterar&ID=<?echo get("ID")?>" <?if($tabela["tem_arquivo"]) echo 'enctype="multipart/form-data"'?> >
					<? $linha = mysql_fetch_assoc($res);
					foreach($campos as $campo => $valor){
						if($valor["editavel"]){
							echo "<tr>";
								echo "<td><b>". $valor["nome"] ."</b></td>";
								echo "<td>";
								if($valor["tipo"] == "SELECT"){
									inputSelect($campo, $valor["valores"], $linha[$campo]);
								}else if($valor["tipo"] == "TEXT"){
									inputText($campo, $linha[$campo], $valor["tamanho"]);
								}else if($valor["tipo"] == "TEXTAREA"){
									inputTextarea($campo, $linha[$campo], $valor["linhas"], $valor["colunas"]);
								}else if($valor["tipo"] == "FILE"){
									inputFile($campo, $valor["tamanho"]);
								}
								echo "</td>";
							echo "</tr>";
						}
					}?>
					<tr><td><input type="Submit" value="Confirmar"></td></tr>
		</form>
	</table>
