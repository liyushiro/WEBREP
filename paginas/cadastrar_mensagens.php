<?

include_once("../config/funcoes.php");

$pagina = new Pagina("cadastrar_mensagens", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS
?>

<script type="text/javascript" src="js/funcoes_javascript"></script>
<script type="text/javascript">
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
	
  function ValidaForm() {
	   if ((document.formNovaMensagem.txtMensagem.value == "") || (document.formNovaMensagem.txtMensagem.value.length < 1))
	   {
		alert("Por favor, preencha a Mensagem");
		document.formNovaRepublica.txtMensagem.focus();
		return false;
	   }
	   
	   }		
	   
  //document.body.onload = 
</script>




<form name="formNovaMensagem" method="post" action="grava_dados_mensagens.php" onSubmit="return ValidaForm();" enctype="application/x-www-form-urlencoded">


  <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td colspan="3"><b>Nova mensagem</b></td>
   </tr>
   <tr>
     <td colspan="3" align="center"><textarea name="txtMensagem" rows="5" cols="120"></textarea></td>
   </tr>
   
   
   <tr></td>
	</tr>
   
   <tr>
        
		<td colspan="3" align="center">	
 		<input class="botao" type="reset" name="limpar" value="Limpar">
 		<input class="botao" type="submit" name="enviar" value="Enviar">
        </td>
	
	</tr>


</form>

<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>