<?include_once "../config/funcoes.php"; //OBRIGAT�RIO EM TODAS AS P�GINAS ?>

<?

	$pagina = new Pagina("exibir_grupo.php", "Exibir Grupo", "palavras chaves, separadas por v�rgula", "Descri��o desta p�gina");
	
	
	
	
?>
<? include_once("../layout/cima.php"); //OBRIGAT�RIO EM TODAS AS P�GINAS ?>


<!--CONTE�DO DA P�GINA-->


<table width="80%"   cellspacing="0" cellpadding="5">
   <tr>
     <td><b>Nome do grupo</b></td>
     <td><input type="text" name="txtNome" size="50" maxlength="50" onBlur="return trim(this.value, this);"></td>
   </tr>
 
  <tr>
        
		<td align="center">	
 		<input type="reset" name="alterar" value="Alterar">
 		<input type="submit" name="excluir" value="Excluir">
   </td>
  
   
   
        </table>
<!--FIM DO CONTE�DO DA P�GINA-->


<?include_once("../layout/baixo.php"); //OBRIGAT�RIO EM TODAS AS P�GINAS?>
