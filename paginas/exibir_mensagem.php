<?include_once "../config/funcoes.php"; //OBRIGAT�RIO EM TODAS AS P�GINAS ?>

<?

	$pagina = new Pagina("exibir_mensagem.php", "Exibir Mensagem", "palavras chaves, separadas por v�rgula", "Descri��o desta p�gina");
	
	
	
	
?>
<? include_once("../layout/cima.php"); //OBRIGAT�RIO EM TODAS AS P�GINAS ?>


<!--CONTE�DO DA P�GINA-->


<table width="80%"   cellspacing="0" cellpadding="5">
   <tr>
     <td align="right"><b>Mensagem</b></td></tr>
     <tr>
	 <td colspan="3" align="center"><textarea name="txtMensagem" rows="5" cols="120"></textarea></td>
   </tr>
 
  <tr>
        
		<td align="right"><input type="reset" name="alterar" value="Alterar"></td>
 		<td align="left"><input type="submit" name="excluir" value="Excluir">
   </td>
  
   
   
        </table>
<!--FIM DO CONTE�DO DA P�GINA-->


<?include_once("../layout/baixo.php"); //OBRIGAT�RIO EM TODAS AS P�GINAS?>
