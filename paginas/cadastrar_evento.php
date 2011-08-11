<?php
 include_once "../config/funcoes.php";
 	$pagina = new Pagina("cadastrar_evento.php", "Cadastrar evento", "Cadastrar evento", "Cadastrar evento");
	$nomeEvento = $_POST['txtNomeEvento'];
	$dataEvento = $_POST['txtDataEvento'];
	$republicaEvento = $_POST['txtNomeRepublica'];
	$descricaoEvento = $_POST['txtDescricao'];
	$localEvento = $_POST['txtLocalEvento'];
	
	if($nomeEvento != "" && $dataEvento != "" && $republicaEvento != "")
	{
		$sql = "insert into eventos(nome_eve,descricao_eve,local_eve,data_eve,id_rep_fk) values('$nomeEvento','$descricaoEvento','$localEvento','$dataEvento','$republicaEvento')";
		$query = mysql_query($sql) or die($sql);
?>
		<script language="javascript">
			alert("Evento cadastrado com sucesso.");
		</script>
<?php
	}
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
	  function ValidaForm() {
	   if(document.formNovoEvento.txtNomeEvento.value ==""){
		alert("Preencha nome do evento");
		return false;
	   }

	   if(document.formNovoEvento.txtDataEvento.value==""){
		alert("Preencha a data do evento");
		return false;
	   }
	  
	   if(document.formNovoEvento.txtNomeRepublica.value==""){
		alert("Preencha o nome da republica responsavel pelo evento");
		return false;
	   }
	   if(document.formNovoEvento.txtDescricao.value==""){
		alert("Preencha a descrição do evento");
		return false;
	   }
	   
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
	<form name="formNovoEvento" method="post" action="cadastrar_evento.php" onSubmit="return ValidaForm();" enctype="application/x-www-form-urlencoded">
	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
	<tr>
	<td><b>Nome do evento</b></td><td><b>Data do evento</b></td>
	</tr>
	<tr>
	<td><input type="text" name="txtNomeEvento" size="70" maxlength="70" onBlur="return trim(this.value, this);"></td>
	<td><input type="text" name="txtDataEvento" size="30" maxlength="70" onKeyPress = "return formataData(document.formNovoEvento.txtDataFundacao, event);" ><!-- onBlur="return VerificaData(this.value, this);" --></td>	
	</tr>
	
	<tr>
	<td><b> Republica responsavel pelo evento<b></td><td><b>Local do Evento</b></td>
	</tr>
	<tr>
	<td><select name="txtNomeRepublica">
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
	<td><input type="text" name="txtLocalEvento" size="70" maxlength="70" onBlur="return trim(this.value, this);"></td>
	</tr>
	<tr>
	 <td colspan="3"><b>Breve Descrição do evento</b></td>	
    </tr>
    <tr>
		<td colspan="3" align="center"><textarea name="txtDescricao" rows="5" cols="120"onBlur="return trim(this.value, this);"></textarea></td>
    </tr>
	<tr>
        
		<td colspan="3" align="center">	
 		<input type="reset" name="limpar" value="Limpar">
 		<input type="submit" name="cadastrar" value="Cadastrar evento">
        </td>
	
	</tr>
   
	
	</table>


<?include("../layout/baixo.php");?>
