<?
include_once("../config/funcoes.php");

$pagina = new Pagina("nome do arquivo desta página", "Título desta página", "palavras chaves, separadas por vírgula", "Descrição desta página");

include_once("../layout/cima.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS
?>
<?
if(count($_POST)>0){
$txtNome	 		 = $_POST["txtNome"];
$txtRua	 	 		 = $_POST["txtRua"];
$txtNumero	 		 = $_POST["txtNumero"];
$txtBairro	 		 = $_POST["txtBairro"];
$txtCidade	 		 = $_POST["txtCidade"];
$txtDataFundacao	 = $_POST["txtDataFundacao"];
$txtQuantMoradores	 = $_POST["txtQuantMoradores"];
$txtTelefone	 	 = $_POST["txtTelefone"];
$foto	 	  		 = $_POST["foto"];
$txtDescricao	 	 = $_POST["txtDescricao"];
$latitude	 		 = $_POST["latitude"];
$longitude	 		 = $_POST["longitude"];
$caminho = SalvaArquivoServidor("foto");
$sql = "Insert into republicas (nome_rep, descricao_rep, capacidade_rep, tel_rep, rua_rep, num_rep, bairro_rep, cidade_rep, foto, latitude, longitude, data_fun) ";
$sql.= " values ('".$txtNome."','".$txtDescricao."','".$txtQuantMoradores."','".$txtTelefone."','".$txtRua."','".$txtNumero."','".$txtBairro."','".$txtCidade."','".$caminho."','".$latitude."','".$longitude."','".$txtDataFundacao."')";
if ($db=mysql_query($sql)) {
		echo "Dados registrados com sucesso";
	}
	else
		echo "Não foi possível gravar os dados. Tente Novamente";							  												
		}
?>






<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
		alert("Por favor, preencha o Nome");
		document.formNovaRepublica.txtNome.focus();
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
  
  function codificarEndereco() { // codifica endereço em coordenadas
    var address = document.getElementById("txtRua").value + "," + document.getElementById("txtNumero").value + "," + document.getElementById("txtCidade").value;
	alert(address)
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
      } else {
        alert("Não foi possivel encontrar as coordenadas do endereço fornecido");
      }
    });
  }
  //document.body.onload = 
</script>




<form name="formNovaRepublica" method="post" action="cadastrar_republica.php" onSubmit="return ValidaForm();" enctype="multipart/form-data">




     <b>Nome da republica</b><input type="text" name="txtNome" size="100" maxlength="70" onBlur="return trim(this.value, this);"><br>
	 

     <b>Rua</b><br>	  <input type="text" id="txtRua" name="txtRua" size="90" maxlength="100"  onBlur="return trim(this.value, this);"><br>
     <b>Numero</b><br><input type="text" id="txtNumero" name="txtNumero" size="20" maxlength="100"onBlur="return trim(this.value, this);"><br>
	 <b>Bairro</b><br><input type="text" id="txtBairro" name="txtBairro" size="20" maxlength="30"onBlur="return trim(this.value, this);"><br>

	 <b>Cidade</b><br><input type="text" id="txtCidade" name ="txtCidade" size="90" maxlength="100" onBlur="codificarEndereco(); "><br>
	 <b>Data de Fundação</b><br><input type="text" name="txtDataFundacao" size="10" maxlength="10" onKeyPress = "return formataData(document.formNovaRepublica.txtDataFundacao, event);" onBlur="return VerificaData(this.value, this);" ><br>
     <b>Quantidade de moradores</b><br><input type="text" name="txtQuantMoradores" size="10" maxlength="10" onBlur="return trim(this.value, this);"><br>
     <b>Telefone</b><br><input type="text" name="txtTelefone" size="30" maxlength="100"  onBlur="return trim(this.value, this);"><br>
   
     <b>Anexar Foto</b><br><input type="file" size="50" name="foto"><br>
	 <b>Breve Descrição</b><br><textarea name="txtDescricao" rows="5" cols="50"></textarea><br>
        
		
 	 <input class="botao" type="reset" name="limpar" value="Limpar">
 	 <input class="botao" type="submit" name="cadastrar" value="Cadastrar Republica">

	 <input type="hidden" name="latitude"  value="0000">
	 <input type="hidden" name="longitude" value="0000">

	 <div id="map_canvas" class="center" style="height:40%; width: 80%; top:10px">  
	 </div>

	 </form>

<script>document.body.onload = inicializaMapa();</script>

<?include_once("../layout/baixo.php"); //OBRIGATÓRIO EM TODAS AS PÁGINAS?>
