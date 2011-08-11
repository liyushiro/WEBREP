<?include_once "../config/funcoes.php"; //OBRIGATÓRIO EM TODAS AS PÁGINAS ?>

<?

	$pagina = new Pagina("exibir_grupo.php", "Exibir Grupo", "palavras chaves, separadas por vírgula", "Descrição desta página");
	
	
	
	
?>
<? include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS ?>


<!--CONTEÚDO DA PÁGINA-->


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
<!--FIM DO CONTEÚDO DA PÁGINA-->


<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>
