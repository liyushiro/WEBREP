<?

include_once("../config/funcoes.php");

$pagina = new Pagina("nome do arquivo desta página", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

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
	
  function ValidaForm() {
	   if ((document.formNovaRepublica.txtNome.value == "") || (document.formNovaRepublica.txtNome.value.length < 5))
	   {
		alert("Por favor, preencha o Nome.");
		document.formNovaRepublica.txtNome.focus();
		return false;
	   }
	   if(document.formNovaRepublica.txtDataNascimento.value ==""){
		alert("Preencha Data de nascimento.");
		return false;
	   }

	   if(document.formNovaRepublica.txtLogin.value==""){
		alert("Preencha o login");
		return false;
	   }
	  
	   if(document.formNovaRepublica.txtSenha.value==""){
		alert("Preencha a senha.");
		return false;
	   }
	   if(document.formNovaRepublica.txtEmail.value==""){
		alert("Preencha o e-mail.");
		return false;
	   }
	   if(document.formNovaRepublica.txtSituacao.value==""){
		alert("Preencha a situacao.");
		return false;
	   }
	   if(document.formNovaRepublica.txtDataEntrada.value==""){
		alert("Preencha a data de entrada.");
		return false;
	   }
	   if(document.formNovaRepublica.txtDataSaida.value==""){
		alert("Preencha a data de saida.");
		return false;
	   }
	   
	   }		
	   
  //document.body.onload = 
</script>




<form name="formNovoUsuarioRep" method="post" action="grava_dados_usu_rep.php" onSubmit="return ValidaForm();" enctype="application/x-www-form-urlencoded">


  <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td><b>Nome do usu&aacute;rio</b></td>
	 <td><b>Data de nascimento</b></td>
	 <td><b>ID do Usu&aacute;rio</b></td>
   </tr>
   <tr>
     <td><input type="text" name="txtNome" size="50" maxlength="50" onBlur="return trim(this.value, this);"></td>
	 <td><input type = "text" name = "txtDataNascimento" size = "10"></td>
	 <td><input type = "text" name = "txtIdUsuario" size="10" maxlength="10" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr>
     <td><b>Login</b></td>
     <td><b>Senha</b></td>
     <td><b>ID da Rep&uacute;blica</b></td>	 
   </tr>
   <tr>
     <td><input type="text" name="txtLogin" size="30" maxlength="30"  onBlur="codificarEndereco(this.value); "></td>
     <td><input type="text" name="txtSenha" size="30" maxlength="40"onBlur="return trim(this.value, this);"></td>
	 <td><input type = "text" name = "txtIdUsuario" size="10" maxlength="10" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr>
     <td colspan="2"><b>E-mail</b></td>
     <td><b>Telefone para contato</b></td> 
   </tr>
   <tr>
     <td colspan="2"><input type="text" name="txtEmail" size="55" maxlength="55"  onBlur="return trim(this.value, this);"></td>
     <td><input type="text" name="txtTelefoneContato" size="30" maxlength="40"onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr>
	<td><b>Situa&ccedil;&atilde;o</b></td>
	<td><b>Data de Entrada</b></td>
    <td><b>Data de Sa&iacute;da</b></td> 
   </tr>
   <tr>
	<td colspan="1"><input type="text" size="20" name="txtSituacao" maxlength = "20" onBlur="return trim(this.value, this);"></td>
	<td colspan="1"><input type="text" size="10" name="txtDataEntrada" maxlength = "10" onBlur="return trim(this.value, this);"></td>
    <td colspan="1"><input type="text" size="10" name="txtDataSaida" maxlength = "10" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr></td>
	</tr>
   
   <tr>
        
		<td colspan="3" align="center">	
 		<input class="botao" type="reset" name="limpar" value="Limpar">
 		<input class="botao" type="submit" name="cadastrar" value="Salvar">
        </td>
	
	</tr>


</form>

<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>