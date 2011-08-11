<?include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS
	$pagina = new Pagina("exibir_usuario.php", "Exibir Usuario", "palavras chaves, separadas por vírgula", "Descrição desta página");
	
	$idUsuario = $_GET['id'];
	
	if($idUsuario != "")
	{
		$sql = "select * from usuarios where id_usu = '$idUsuario'";
		$query = mysql_query($sql) or die($sql);
		$res = mysql_fetch_array($query);
	}
	
	//adiciona comentario
	$nomeComentarista = $_POST['txtNomeComentarista'];
	$comentario = $_POST['txtDescricao'];
	
	if($nomeComentarista != "" && $comentario != "")
	{
		$data = date('Y-m-d');
		$sql = "insert into mensagens(texto_men,data_men) values('$comentario','$data')";
		$query = mysql_query($sql) or die($sql);
		
		$sql = "select * from mensagens";
		$query = mysql_query($sql) or die($sql);
		while($res = mysql_fetch_array($query))if($res['id_men'] != "")$idMensagem = $res['id_men'];
		
		$sql = "insert into mensagens_usu(nome_men_usu,id_men_fk,id_usu_fk) values('$nomeComentarista',$idMensagem,$idUsuario)";
		$query = mysql_query($sql) or die($sql);
		?>
		<script language="javascript">
			alert("Comentário cadastrado com sucesso.");
		</script>
		<?php
	}
	
?>
<? include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS ?>


<!--CONTEÚDO DA PÁGINA-->

<form action="exibir_usuario.php?id=<?php echo $idUsuario; ?>" method="POST" name="formularioExibirUsuario">
<table width="80%"   cellspacing="0" cellpadding="5">
   <tr>
     <td><b>Nome do usu&aacute;rio</b></td>
     <td><input type="text" name="txtNome" size="50" maxlength="50" onBlur="return trim(this.value, this);" value="<?php echo $res['nome_usu']; ?>"></td>
   </tr>
   
   <tr>
     <td><b>Data de nascimento</b></td>  
     <td><input type="text" name="txtDataNascimento" size="10" maxlength="10"  onBlur="codificarEndereco(this.value); " value="<?php echo $res['data_nascimento']; ?>"></td>
     
   </tr>
   <tr>
       <td ><b>E-mail</b></td> 
       <td><input type="text" name="txtEmail" size="50" maxlength="50" onBlur="return trim(this.value, this);" value="<?php echo $res['email']; ?>"></td>
   </tr> 
   <tr>
	<td align="center"><u>Adicione um comentario</u></td>
	</tr>
	<tr>

	<td>Nome</td>
	<td><input type="text" name="txtNomeComentarista" size="85" maxlength="70" onBlur="return trim(this.value, this);"></td>
	</tr>
	<tr>
	<td>Comentario</td>
	<td><textarea name="txtDescricao" rows="5" cols="70"></textarea></td><br><br>
	
	</tr> 
	
 
  <tr>
        
		<td align="center">	
 		<input class="botao" type="submit" name="comentar" value="Comentar">
   </td>
   </tr>
  
   
   
        </table>
		
		Comentarios:<br/><br/>
	
	<?php
		$sql = "select * from mensagens ms, mensagens_usu mse where id_usu_fk = '$idUsuario' AND ms.id_men = mse.id_men_fk";
		$query = mysql_query($sql) or die($sql);
		while($res = mysql_fetch_array($query))
		{
			echo $res['nome_men_usu']." escreveu...<br/><br/>";
			echo $res['texto_men']."<hr>";
		}
	?>
<!--FIM DO CONTEÚDO DA PÁGINA-->
</fomt>

<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>
