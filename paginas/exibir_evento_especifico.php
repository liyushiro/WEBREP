<?php
 include_once "../config/funcoes.php";
	$pagina = new Pagina("exibir_evento_especifico.php", "Exibir evento especifico", "Exibir evento especifico", "Exibir evento especifico");
	$idEvento = $_GET['id'];
	
	$sql = "select * from eventos eve,republicas rep where eve.id_eve = '$idEvento' AND eve.id_rep_fk = rep.id_rep";
	$query = mysql_query($sql) or die($sql);
	$res = mysql_fetch_array($query);
	
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
		
		$sql = "insert into mensagens_eve(nome_men_eve,id_men_fk,id_eve_fk) values('$nomeComentarista',$idMensagem,$idEvento)";
		$query = mysql_query($sql) or die($sql);
		?>
		<script language="javascript">
			alert("Comentário cadastrado com sucesso.");
		</script>
		<?php
	}
	?>

<?include("../layout/cima.php");?>

<form name="formDetalhesEvento" method="post" action="exibir_evento_especifico.php?id=<?php echo $idEvento; ?>" onSubmit="" enctype="application/x-www-form-urlencoded">
	<p><b>Nome do Evento: <?php echo $res['nome_eve']; ?></b></p>
	<p>Descrição do Evento:<?php echo $res['descricao_eve']; ?></p>
	<p><u><b>Nome da república responsável: <?php echo $res['nome_rep']; ?></b></u></p><p><u><b>DATA DO EVENTO: <?php echo $res['data_eve']; ?></b></u></p><br><br>
	
	Comentarios:
	
	<?php
		$sql = "select * from mensagens ms, mensagens_eve mse where id_eve_fk = '$idEvento' AND ms.id_men = mse.id_men_fk";
		$query = mysql_query($sql) or die($sql);
		while($res = mysql_fetch_array($query))
		{
			echo $res['nome_men_eve']." escreveu...<br/><br/>";
			echo $res['texto_men']."<hr>";
		}
	?>
	
	<p><u>Adicione um comentario</u></p><br>
	Nome
	<input type="text" name="txtNomeComentarista" size="85" maxlength="70" onBlur="return trim(this.value, this);"><br><br>
	Comentario<br>
	<td	align="center"><textarea name="txtDescricao" rows="5" cols="70"></textarea></td><br><br>
	<input class="botao" type="submit" name="comentar" value="Comentar">
   

</form>

<?include("../layout/baixo.php");?>
