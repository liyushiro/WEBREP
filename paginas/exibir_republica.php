	<?include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS 

	$pagina = new Pagina("exibir_republica.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");
	
	

	$nomeRepublica = $_POST['txtNomeRepublica'];
	
?>
<? include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS ?>


<!--CONTEÚDO DA PÁGINA-->


<form name="formExibirRepublica" method="post" action="exibir_republica.php" onSubmit="" enctype="application/x-www-form-urlencoded">
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Nome da Republica</b></td>
	</tr>
	<tr>
	<td>
	<select name="txtNomeRepublica">
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

	
	   
  
   
	<tr>
        
		<td colspan="3" align="center">	
 		<input type="submit" name="exibirRepublica" value="Exibir Republicas">
                <input type="reset" name="limpar" value="Limpar campos">
				
        </td>
	
	</tr>
	</table>
	
	
	<br><br>
	
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	
	
	<?php
		if($nomeRepublica != "")
		{
			$sql = "select * from republicas where id_rep = '$nomeRepublica' ";
		}
		
		
		$query = mysql_query($sql) or die($sql);
		while($res2 = mysql_fetch_array($query))
		{
			?>
			
			
	
	
  </table>
  


<table width="80%"   cellspacing="0" cellpadding="5">
   <tr>
     <td><b>Nome da republica</b></td>
     <td><input type="text" name="txtExibeNomeRepublica" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['nome_rep']; ?>"></td>
   </tr>

   <tr>
     <td><b>Endere&ccedil;o</b></td>  
     <td><input type="text" name="txtExibeEndRepublica" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['end_rep']; ?>"></td>
     
   </tr>
   <tr>
     
     <td><b>Complemento</b></td> 
     <td><input type="text" name="txtExibeComplementoRepublica" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['comp_rep']; ?>"></td>
   </tr>
   
   <tr>
      <td><b>Data de Fundação</b></td>
      <td><input type="text" name="txtDataFundacao" size="50" maxlength="50" onKeyPress = "return formataData(document.formNovaRepublica.txtDataFundacao, event);" onBlur="return VerificaData(this.value, this);" ></td>
      
   </tr>
   <tr>
       <td ><b>Quantidade de moradores</b></td> 
       <td><input type="text" name="txtExibeCapacidadeRepublica" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['capacidade_rep']; ?>"></td>
   </tr> 
   <tr>  
      <td><b>Telefone</b></td>
      <td><input type="text" name="txtExibeTelRepublica" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['tel_rep']; ?>"></td>
   </tr>
   
   <tr>
      <td ><b>Nome do responsavel</b></td>
      <td ><input type="text" name="txtExibeNomeResponsavelRepublica" size="50" maxlength="50" readonly="readonly" value="<?php echo $res2['nomeresp_rep']; ?>"></td>
     
   </tr>
   <tr>
     <td><b>Telefone para contato</b></td> 
     <td><input type="text" name="txtTelefoneContato" size="50" maxlength="50" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   
   <tr>
        <td><img src="../imagens/casa_propria.jpg" align="center"></td>
   </tr>
   
  
   
   <tr>
       <td> <u>MAPA do google map</u></br> Localização no mapa o local </td>
   </tr>
 
 
  <tr>
     
   
        </table> 




 <?php
		}
		
	?>  	

</form>
<!--FIM DO CONTEÚDO DA PÁGINA-->


<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>
