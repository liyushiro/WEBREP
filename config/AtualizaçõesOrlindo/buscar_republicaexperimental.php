<?php
include_once("../config/funcoes.php");
$pagina = new Pagina("buscar_republicaexperimental.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

$idRep = $_POST['rep'];

include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS		
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
</script>
	<form name="formBuscaRepublica" method="post" action="buscar_republicaexperimental.php" onSubmit="" enctype="application/x-www-form-urlencoded">
	
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td colspan="2"><b>Nome da republica</b></td>
   </tr>
   <tr>
     <td colspan="2">

	 <select name="rep" >
		 <option></option>
		 <?php
		$sql = "select * from republicas";
		$query = mysql_query($sql);
		while($res = mysql_fetch_array($query))
		{
			echo "<option value=".$res['id_rep'].">".$res['nome_rep']."</option>";
		}
	?>
	</select>
	 <input type="submit" value="Buscar">
	 </td>
   </tr>
   </table>
   <input type="hidden" name="latitude"  value="<?echo $res['latitude'] ?>">
   <input type="hidden" name="longitude" value="<?echo $res['longitude']?>">
   <br><br>
   <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Nome da Republica</b></td><td><b>Clique para detalhar</b></td>
	</tr>
	<?php
		if($idRep != "")
		{
			$sql = "select * from republicas rep where rep.id_rep = '$idRep'";
		}
		$query = mysql_query($sql) or die($sql);
		while($res2 = mysql_fetch_array($query))
		{
		?>
			<tr>
			<td>
				<input type="text" name="txtBuscaRepublica" size="30" maxlength="40" readonly="readonly" value="<?php echo $res2['nome_rep']; ?>">
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

