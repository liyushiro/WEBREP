<?include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS ?>

<?

	$pagina = new Pagina("exibir_mensagem.php", "Exibir Mensagem", "palavras chaves, separadas por vírgula", "Descrição desta página");
	
	
	
	
?>
<? include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS ?>


<!--CONTEÚDO DA PÁGINA-->


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
<!--FIM DO CONTEÚDO DA PÁGINA-->


<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>
