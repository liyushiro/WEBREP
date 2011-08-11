<html>
<head>
<title>Republicas - Cadastro de localidade</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/funcoes_javascript.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/other.js"></script>
<script type="text/javascript" src="js/gaia.js"></script>
<script type="text/javascript">
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
		alert("Por favor, preencha o Nome");
		document.formNovaRepublica.txtNome.focus();
		return false;
	   }
		if(document.formNovaRepublica.txtComplemento.value ==""){
		alert("Preencha Complemento");
		return false;
	   }
	   if(document.formNovaRepublica.txtEndereco.value ==""){
		alert("Preencha Endereco");
		return false;
	   }

	   if(document.formNovaRepublica.txtQuantMoradores.value==""){
		alert("Preencha a quantidade de moradores");
		return false;
	   }
	  
	   if(document.formNovaRepublica.txtNomeResponsavel.value==""){
		alert("Preencha o nome do responsavel");
		return false;
	   }
	   if(document.formNovaRepublica.txtTelefoneContato.value==""){
		alert("Preencha o telefone para contato");
		return false;
	   }
	   
	   }		
	
  
  function inicializaMapa() { // inicializa google map
    geocoder = new google.maps.Geocoder();	
    var latlng = new google.maps.LatLng("-34.397" , "150.644"); // inicializa coordenadas 
    var myOptions = { // opões de vizualização
      zoom: 8,
      center: latlng, // seta centro da imagem do mapa
      mapTypeId: google.maps.MapTypeId.ROADMAP // seleciona tipo de mapa
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  }
  
  function codificarEndereco(endereco) { // codifica endereço em coordenadas
    var address = endereco;
	var localizacoes;
    geocoder.geocode( { 'address': address}, function(results, status) { // codifica endereço e retorna array de resultados de coordenadas
      if (status == google.maps.GeocoderStatus.OK) { // verifica se conseguiu codificar
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map, 
            position: results[0].geometry.location
	    
        });
	localizacoes = results[0].geometry.location.toString().split(",");
	document.formNovaRepublica.latitude.value = localizacoes[0].slice(1, localizacoes[0].length);
	document.formNovaRepublica.longitude.value = localizacoes[1].slice(0, localizacoes[1].length-1);
	alert(document.formNovaRepublica.latitude.value);
	alert(document.formNovaRepublica.longitude.value);
      } else {
        alert("Não foi possivel encontrar as coordenadas do endereço fornecido" + status);
      }
    });
  }
</script>
</head>
<body onload="inicializaMapa()">
  <form name="formNovaRepublica" method="post" action="grava_dados_republica.php" onSubmit="return ValidaForm();" enctype="application/x-www-form-urlencoded">
  <div id="header">
	<div class="head">
		<!--LOGO Begin-->
		<div id="logo"><a href="index.html">REP WEB</a></div>
		<!--LOGO END-->
		<!--Menu Begin-->
		<div id="menu">
		<ul>
		<li><a class="active" href="index.html">Home</a></li>
		<li class="submenu"><a href="about.html">Sobre</a><ul></ul></li>
		<li class="submenu"><a href="#">Serviços</a><ul><li><a href="cadastroRepublica.html">Nova Republica</a></li><li><a href="novoUsuario.html">Novo Usuario</a></li><li><a href="#">Service3</a></li></ul></li>
		<li><a href="#">Contato</a></li>
		</ul>
		</div>
		
		<!--Menu END-->
	</div>
</div>

  <table width="80%" align="center" border="1" cellspacing="0" cellpadding="5">
   <tr>
     <td colspan="3"><b>Nome da republica</b></td>
   </tr>
   <tr>
     <td colspan="3"><input type="text" name="txtNome" size="165" maxlength="70" onBlur="return trim(this.value, this);"></td>
   </tr>
   
   <tr>
     <td colspan="2"><b>Endere&ccedil;o</b></td>
     <td><b>Complemento</b></td> 
   </tr>
   <tr>
     
     <td colspan="2"><input type="text" name="txtEndereco" size="90" maxlength="100"  onBlur="codificarEndereco(this.value); "></td>
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
   
   <tr>
	<td colspan="3"><b>Anexar Foto</b></td>
   </tr>
   <tr>
	<td colspan="3"><input type="file" size="100" name="foto"></td>
   </tr>
   
   <tr></td>
	</tr>
   
   <tr>
        
		<td colspan="3" align="center">	
 		<input type="reset" name="limpar" value="Limpar">
 		<input type="submit" name="cadastrar" value="Cadastrar Republica">
        </td>
	
	</tr>

	
  </table>
  <input type="hidden" name="latitude"  value="">
  <input type="hidden" name="longitude" value="">
<div id="map_canvas" class="center" style="height:40%; width: 80%; top:10px">  
 </div>
 </form>
 </body>
</html>