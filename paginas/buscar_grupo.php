<?php
include_once("../config/funcoes.php");
$pagina = new Pagina("buscar_grupo.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

$idRep = $_POST['rep'];

include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS		
?>
<script type="text/javascript">
</script>
	<form name="formBuscaGrupo" method="post" action="buscar_grupo.php" onSubmit="" enctype="application/x-www-form-urlencoded">
	
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td colspan="2"><b>Nome do Grupo</b></td>
   </tr>
   <tr>
     <td colspan="2">

	 <select name="rep" >
		 <option></option>
		 <?php
		$sql = "select * from grupos";
		$query = mysql_query($sql);
		while($res = mysql_fetch_array($query))
		{
			echo "<option value=".$res['id_gru'].">".$res['nome_gru']."</option>";
		}
	?>
	</select>
	 <input type="submit" value="Buscar">
	 </td>
   </tr>
   </table>
   <br><br>
   <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Nome do Grupo</b></td><td><b>Clique para detalhar</b></td>
	</tr>
	<?php
		if($idGrupo != "")
		{
			$sql = "select * from grupos g where g.id_gru = '$idGrupo'";
		}
		$query = mysql_query($sql) or die($sql);
		while($res2 = mysql_fetch_array($query))
		{
		?>
			<tr>
			<td>
				<input type="text" name="txtBuscaGrupo" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['nome_gru']; ?>">
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
  <?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>