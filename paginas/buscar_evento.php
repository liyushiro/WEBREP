<?php

include_once "../config/funcoes.php";

$pagina = new Pagina("buscar_evento.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");


		$nomeEvento = $_POST['txtNomeEvento'];
		$dataEvento = $_POST['txtDataEvento'];
		$republicaEvento = $_POST['txtNomeRepublica'];
 ?>

<?include("../layout/cima.php");?>
 
 <script>
 function trim(String, campo)
{
    pos = 0; 
    str = String.substring(pos,pos+1); 
    cont = 0; 
    straux = String;

    while ((str==" ")&&(cont<=String.length)) {
        pos = pos + 1;
        straux = String.substring(pos, String.length); 
        str = String.substring(pos,pos+1); 
        cont = cont + 1;
    }

    String = straux;
    pos = String.length;
    str = String.substring(pos-1,pos);
    cont = 0;
    while ((str == " ") && (cont <= String.length)) 
	{
        pos = pos - 1;
        straux = String.substring(0, pos);
        str = String.substring(pos-1,pos);
        cont = cont + 1;
    }
    
	campo.value = straux; 
	return campo.value;
}
 </script>
 <form name="formBuscaEvento" method="post" action="buscar_evento.php" onSubmit="" enctype="application/x-www-form-urlencoded">
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Nome do evento</b></td><td><b>Data do evento</b></td>
	</tr>
	<tr>
	<td>
	<select name="txtNomeEvento">
		<option></option>
	<?php
		$sql = "select * from eventos";
		$query = mysql_query($sql);
		while($res = mysql_fetch_array($query))
		{
			echo "<option>".$res['nome_eve']."</option>";
		}
	?>
	</select></td>
	<td><input type="text" name="txtDataEvento" size="30" maxlength="70" onBlur="return trim(this.value, this);"></td>	
	</tr>
	
	<tr>
	<td colspan="2"><b> Republica responsavel pelo evento<b></td>
	</tr>
	<tr>
	<td colspan="2"><select name="txtNomeRepublica">
		<option></option>
	<?php
		$sql = "select * from republicas";
		$query = mysql_query($sql);
		while($res = mysql_fetch_array($query))
		{
			echo "<option value=".$res['id_rep'].">".$res['nome_rep']."</option>";
		}
	?>
	</select></td>
	</tr>
	<tr>
        
		<td colspan="3" align="center">	
 		<input type="submit" name="buscarEventos" value="Buscar Eventos">
		<input type="reset" name="limpar" value="Limpar campos">
        </td>
	
	</tr>
	</table>
	
	<br><br>
	
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Nome do evento</b></td><td><b>Data do evento</b></td><td><b>Republica Responsavel</b></td><td><b>Clique para detalhar</b></td>
	</tr>
	
	<?php
		if($nomeEvento != "")
		{
			$sql = "select * from republicas rep, eventos eve where nome_eve = '$nomeEvento' AND rep.id_rep = eve.id_rep_fk";
		}
		if($republicaEvento != "")
		{
			$sql = "select * from republicas rep, eventos eve where rep.id_rep = '$republicaEvento' AND rep.id_rep = eve.id_rep_fk";
			
		}
		if($dataEvento != "")
		{
			$sql = "select * from republicas rep, eventos eve where rep.id_rep = eve.id_rep_fk AND data_inicial_eve = '$dataEvento'";
		}
		
		$query = mysql_query($sql) or die($sql);
		while($res2 = mysql_fetch_array($query))
		{
			?>
			<tr>
			<td>
				<input type="text" name="txtBuscaEventoNome" size="30" maxlength="40" readonly="readonly" value="<?php echo $res2['nome_eve']; ?>">
			</td>
			<td>
				<input type="text" name="txtBuscaEventoData" size="30" maxlength="40" readonly="readonly" value="<?php echo $res2['data_inicial_eve']; ?>">
			</td>
			<td>
				<input type="text" name="txtBuscaEventoRepublica" size="30" maxlength="40" readonly="readonly" value="<?php echo $res2['nome_rep']; ?>">
			</td>
			<td>
				<input type="button" name="verDetalhes" value="Ver detalhes">
			</td>
			</tr>
			<?php
		}
		
	?>
	
	
  </table>
  
</form>

<?include("../layout/baixo.php");?>
