<?

include_once("../config/funcoes.php");

$pagina = new Pagina("cadastrar_grupo", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

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
	   if ((document.formNovoGrupo.txtNome.value == "") || (document.formNovoGrupo.txtNome.value.length < 1))
	   {
		alert("Por favor, preencha o Nome do Grupo.");
		document.formNovoGrupo.txtNome.focus();
		return false;
	   }
	   
	   }		
	   
  //document.body.onload = 
</script>




<form name="formNovoGrupo" method="post" action="grava_dados_grupos.php" onSubmit="return ValidaForm();" enctype="application/x-www-form-urlencoded">


  <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td align="center"><b>Novo Grupo</b></td>
   </tr>
   <tr>
     <td align="center"><input type="text" name="txtNome" size="80" maxlength="80" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   
   <tr></td>
	</tr>
   
   <tr>
        
		<td align="center">	
 		<input class="botao" type="reset" name="limpar" value="Limpar">
 		<input class="botao" type="submit" name="cadastrar" value="Salvar">
        </td>
	
	</tr>


</form>

<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>