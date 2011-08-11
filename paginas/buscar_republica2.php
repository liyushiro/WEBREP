<?

include_once "../config/funcoes.php";

$pagina = new Pagina("buscar_republica.php", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

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

  
  function formataData(campo, evento){
		var data = campo.value;
		if(validaNumero(evento)){
		if(data.length == 2 || data.length == 5){
			data = data + "/";
		}
		campo.value = data;}
		else{
			return false;
		}
	}
	
	function VerificaData(digData, obj) 
	{
		if(digData != ""){
		var bissexto = 0;
        var data = digData; 
        var tam = data.length;
		var datasistema = new Date();
		var anosistema = datasistema.getFullYear();
		var idade
        if (tam == 10) 
        {
                var dia = data.substr(0,2)
                var mes = data.substr(3,2)
                var ano = data.substr(6,4)
				idade = parseInt(anosistema) - parseInt(ano);
                if (((ano > 1900)||(ano < 2100)) && (idade > 18) )
                {
                        switch (mes) 
                        {
                                case '01':
                                case '03':
                                case '05':
                                case '07':
                                case '08':
                                case '10':
                                case '12':
                                        if  (dia <= 31) 
                                        {
                                                return true;
                                        }
                                        break
                                
                                case '04':              
                                case '06':
                                case '09':
                                case '11':
                                        if  (dia <= 30) 
                                        {
                                                return true;
                                        }
                                        break
                                case '02':
                                        /* Validando ano Bissexto / fevereiro / dia */ 
                                        if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0)) 
                                        { 
                                                bissexto = 1; 
                                        } 
                                        if ((bissexto == 1) && (dia <= 29)) 
                                        { 
                                                return true;                             
                                        } 
                                        if ((bissexto != 1) && (dia <= 28)) 
                                        { 
                                                return true; 
                                        }                       
                                        break                                           
                        }
                }
        }       
        alert("A Data "+data+" é inválida!");
		obj.value = "";
		obj.focus();
        return false;
	}	
	}
	</script>
	<form name="formBuscaRepublica" method="post" action=".php" onSubmit="" enctype="application/x-www-form-urlencoded">
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td><b>Codigo Republica</b></td><td colspan="2"><b>Nome da republica</b></td>
   </tr>
   <tr>
     <td><input type="text" name="txtCodigo" size="30" maxlength="70" onBlur="return trim(this.value, this);"></td><td colspan="2"><input type="text" name="txtNome" size="100" maxlength="70" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr>
     <td colspan="2"><b>Endere&ccedil;o</b></td>
     <td><b>Complemento</b></td> 
   </tr>
   <tr>
     
     <td colspan="2"><input type="text" name="txtEndereco" size="90" maxlength="100"  onBlur="return trim(this.value, this); "></td>
     <td><input type="text" name="txtComplemento" size="30" maxlength="40"onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr>
	 <td><b>Data de Fundação</b></td>
     <td ><b>Quantidade de moradores</b></td>
     <td><b>Telefone</b></td> 
   </tr>
   <tr>
     <td><input type="text" name="txtDataFundacao" size="10" maxlength="10" onKeyPress = "return formataData(document.formNovaRepublica.txtDataFundacao, event);" onBlur="return VerificaData(this.value, this);" ></td>
     <td><input type="text" name="txtQuantMoradores" size="10" maxlength="10" onBlur="return trim(this.value, this);"></td>
     <td><input type="text" name="txtTelefone" size="60" maxlength="100"  onBlur="return trim(this.value, this);"></td>
   
   <tr>
     <td colspan="2"><b>Nome do responsavel</b></td>
     <td><b>Telefone para contato</b></td> 
   </tr>
   <tr>
     <td colspan="2"><input type="text" name="txtNomeResponsavel" size="90" maxlength="100"  onBlur="return trim(this.value, this);"></td>
     <td><input type="text" name="txtTelefoneContato" size="30" maxlength="40"onBlur="return trim(this.value, this);"></td>
   </tr>
   
   
   
   <tr></td>
	</tr>
   
   <tr>
        
		<td colspan="3" align="center">	
 		<input type="button" name="buscarRepublicas" value="Buscar Republicas">
		<input type="reset" name="limpar" value="Limpar campos">
        </td>
	
	</tr>

	
  </table> <br><br>
  <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Codigo Republica</b></td><td><b>Nome Republica</b></td><td><b>Endereço Republica</b></td><td><b>Clique para detalhar</b></td>
	</tr>
	<tr>
	<td><input type="text" name="txtBuscaRepCodigo" size="30" maxlength="40" readonly="readonly"></td><td><input type="text" name="txtBuscaRepNome" size="30" maxlength="40" readonly="readonly"></td><td><input type="text" name="txtBuscaRepEndereco" size="30" maxlength="40" readonly="readonly"></td><td><input type="button" name="verDetalhes" value="Ver detalhes"></td>
	</tr>
  </table>
  </form>
<?include("../layout/baixo.php");?>
