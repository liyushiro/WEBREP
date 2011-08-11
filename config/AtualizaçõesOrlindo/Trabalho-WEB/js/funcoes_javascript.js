var VerifiqueTAB = true;

function PararTAB(campo)
{ 
   VerifiqueTAB=false;
} 

function ChecarTAB()
{ 
   VerifiqueTAB=true;
} 

function LimpaCampo (campo)
{
	campo.value = "";
	campo.focus();
}

function ajusta_telefone(campo)
{
	if(campo.value.length == 0)
	   campo.value += "("; 
	if(campo.value.length == 3)
	   campo.value += ")";
	if(campo.value.length == 8)
	   campo.value += "-";  
}

function ajusta_celular(campo)
{
	if(campo.value.length == 0)
	   campo.value += "("; 
	if(campo.value.length == 3)
	   campo.value += ")";
	if(campo.value.length == 8)
	   campo.value += "-";  
}

function ajusta_cep(campo)
{
	if(campo.value.length == 5)
	   campo.value += "-"; 
}


function LimpaZerosEsquerda(campo)
{
	var conta_qtde_zeros_esquerda = 0;
	
	for (inicio = 0; campo.value.substring(inicio,inicio+1) == "0"; inicio++)
	{
		conta_qtde_zeros_esquerda ++;
	}
	campo.value = campo.value.substring(conta_qtde_zeros_esquerda,campo.value.length);
}

function PreparaValorJScript(campo)
{
	var valor_preparado="";
	
	for (inicio = 0; inicio <= campo.value.length-1; inicio++)
	{
		if (!isNaN(campo.value.substring(inicio,inicio+1)) || (campo.value.substring(inicio,inicio+1) == ","))
		{
			if (campo.value.substring(inicio,inicio+1) == ",")
			{
				valor_preparado = valor_preparado+".";
			}
			else
			{
				valor_preparado = valor_preparado+""+campo.value.substring(inicio,inicio+1);
			}
		}
	}
	return valor_preparado;
}


function TrocaPontoPorVirgula(valor)
{
	var encontrouponto = false;
	valor = valor.toString( );

	for (inicio = 0; inicio <= valor.length-1; inicio++)
	{
		if (valor.substring(inicio,inicio+1) == ".")
		{
			encontrouponto = true;
			valor = valor.substring(0,inicio)+","+valor.substring(inicio+1,valor.length);
		}
	}
		
	return valor;
}

// para tratamento da funcao VerificaInvalidos
var letra               = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
var numero              = "0123456789";
var espaco              = " ";
var virgula				= ",";
var hifen				= "-";
var ponto				= ".";
var letra_espaco        = letra  + espaco;
var numero_espaco		= numero + espaco;
var letra_numero        = letra  + numero;
var letra_numero_espaco = letra  + numero + espaco;
var endereco			= letra_numero_espaco + virgula + hifen + ponto;

function VerificaInvalidos(campo,validos)
{
    var inicio;
	var conteudo = campo;

	for (inicio = 0; inicio <= conteudo.length-1; inicio++)
	{	
		if (validos.indexOf(conteudo.substring(inicio,inicio+1)) == -1)
		{
			return false;
			//conteudo = conteudo.substring(0,inicio)+""+conteudo.substring(inicio+1,conteudo.length);
		}
	}
		
	return true;
}


function ProcuraPonto(valor)
{
	var encontrou = false;
	for (inicio = 0; inicio <= valor.length-1; inicio++)
	{
		if (valor.substring(inicio,inicio+1) == ".")
			encontrou = true
	}
	
	return encontrou;
}


function Limpar(campo, validos)
{ 
	// retira caracteres invalidos da string 
	var result = ""; 
	var aux; 
	for (var i=0; i < campo.length; i++)
	{ 
		aux = validos.indexOf(campo.substring(i, i+1)); 
		if (aux>=0) { 
		result += aux; 
		} 
	} 
	
	return result; 
} 

function Mostra(campo, tammax)
{
   if ( (campo.value.length == tammax) && (VerifiqueTAB) )
   { 
      var i=0,j=0, indice=-1;
      for (i=0; i<document.forms.length; i++) 
      { 
          for (j=0; j<document.forms[i].elements.length; j++)  
          { 
               if (document.forms[i].elements[j].name == campo.name) 
               { 
                     indice=i;
                     break;
          } 
          } 
          if (indice != -1)
            break; 
      } 
      for (i=0; i<=document.forms[indice].elements.length; i++) 
      { 
          if (document.forms[indice].elements[i].name == campo.name) 
          { 
              while ( (document.forms[indice].elements[(i+1)].type == "hidden") && (i < document.forms[indice].elements.length) )
              { 
                   i++;
              } 
              document.forms[indice].elements[(i+1)].focus();
              VerifiqueTAB=false;
              break;
          } 
      } 
   } 
} 


// formata após digitação
function FormataNumeros(campo,tammax,teclapres,decimal)
{ 
	var tecla = teclapres.keyCode; 
	vr = Limpar(campo.value,"0123456789"); 
	tam = vr.length; 
	dec=decimal 
	
	if (tam < tammax && tecla != 8)
	{ 
		tam = vr.length + 1 ; 
	} 
	
	if (tecla == 8 ) 
	{ 
		tam = tam - 1 ; 
	} 
	
	if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ) 
	{ 
	
		if ( tam <= dec ) 
		{ 
			campo.value = vr ; 
		} 
	
		if ( (tam > dec) && (tam <= 5) )
		{ 
			campo.value = vr.substr( 0, tam - 2 ) + "," + vr.substr( tam - dec, tam ) ; 
		} 
		if ( (tam >= 6) && (tam <= 8) )
		{ 
			campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
		} 
		if ( (tam >= 9) && (tam <= 11) )
		{ 
			campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
		} 
		if ( (tam >= 12) && (tam <= 14) )
		{ 
			campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
		} 
		if ( (tam >= 15) && (tam <= 17) )
		{ 
			campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;
		} 

	} 
} 

function MascaraValorMonetario(valor,decimais)
{
  var posicaoPontoDecimal;
  var campo = '';
  var resultado = '';
  var pos,sep,dec;

  
  valor = valor * 1.00; // retira os zeros à esquerda  
  
  valor = TrocaPontoPorVirgula(valor);
 
  //Retira possiveis separadores de milhar
  for (pos=0; pos < valor.length; pos ++)
  {
    if (valor.charAt(pos)!='.')
        campo = campo + valor.charAt(pos);
  }     

//Formata valor monetário com decimais
  posicaoPontoDecimal = campo.indexOf(',');
  if (posicaoPontoDecimal != -1)
   {
      sep = 0;
      for (pos=posicaoPontoDecimal-1;pos >= 0;pos--)
      {
        sep ++;
        if (sep > 3)
        {
           resultado = '.' + resultado;
           sep = 1;
        }

        resultado = campo.charAt(pos) + resultado;   
      }

      // Trata parte decimal
      if (parseInt(decimais) > 0 )
      {
         resultado = resultado + ',';
      
         pos=posicaoPontoDecimal+1;
         for (dec = 1;dec <= parseInt(decimais); dec++)
         {
           if (pos < campo.length)
           {
              resultado = resultado + campo.charAt(pos);
              pos++;
           }
           else
              resultado = resultado + '0';   
         }

      } // trata decimais
   }
   // Trata valor monetário sem decimais
   else
   {
      sep = 0;
      for (pos=campo.length-1;pos >= 0;pos--)
      {
        sep ++;
        if (sep > 3)
        {
           resultado = '.' + resultado;
           sep = 1;
        }
        resultado = campo.charAt(pos) + resultado;   
      }
      // Trata parte decimal
      if (parseInt(decimais) > 0 )
      {
         resultado = resultado + ',';
         for (dec = 1;dec <= parseInt(decimais); dec++)
         {
              resultado = resultado + '0';   
         }
      } // trata decimais
   }
   
   //campooriginal.value = resultado;

   	return resultado;
  
}

function TestaDataDividida(campo_dia, campo_mes, campo_ano)
{
    var dia = campo_dia.value;
    var mes = campo_mes.value;
    var ano = campo_ano.value;
	
    if ( (isNaN(dia)) || (isNaN(mes)) || (isNaN(ano)) ) 
    {
        campo_dia.value = "";
        campo_dia.focus();
        return false;
     }
  
    if ( (dia=="") && (mes=="") && (ano=="") ) 
    {
        campo_dia.value = "";
        campo_dia.focus();
        return false;
    }  
    else
    {           
        if ( (dia=="") || (mes=="") || (ano=="") ) 
        {
            campo_dia.value = "";
            campo_dia.focus();
            return false;
        } 
        else
        {
            if ((dia > 31)||(dia < 1))
            {
                campo_dia.value = "";
                campo_dia.focus();
                return false;
            }
            if ((mes > 12)||(mes < 1))
            {
                campo_mes.value = "";
                campo_mes.focus();
                return false;
            }
            if (ano.length < 4) 
            {
                campo_ano.value = "";
                campo_ano.focus();
                return false;
            }   
            if (mes==2)
            {
                if (((dia)>29)||(dia=='29' && (ano)%4!=0)) 
                {
                    campo_dia.value = "";
                    campo_dia.focus();
                    return false;
                }
            }
            else
            {
                if ( ( (mes==4) || (mes==6) || (mes==9) || mes=='11') && (dia>30) ) 
                {
                    campo_dia.value = "";
                    campo_dia.focus();
                    return false;
                }    
                else
                { 
                    if (dia > 31)
                    {
                        campo_dia.value = "";
                        campo_dia.focus();
                        return false;
                    }  
                } 
				   
            } 
        }
    }
    return true;
}

function TestaIntervaloDatas(dia1, mes1, ano1, dia2, mes2, ano2)
{
    data1= new Date(ano1,mes1,dia1)
	data2= new Date(ano2,mes2,dia2)

    if (data1 < data2) 
    {   
        return 1;
    }
    if (data1 > data2) 
    {   
        return 2;
    }
    else
    {   
        return 0;
    }    
}
// Fim da função DataMaiorDividida

function TestaComboSelecionado(combo)
{
   indice = combo.selectedIndex; 
   selecionado = combo.options[indice].value; 
   return selecionado;
}

function ajusta_cpf(campo)
{
 	if(campo.value.length == 3)
	   campo.value += ".";
	if(campo.value.length == 7)
	   campo.value += ".";
	if(campo.value.length == 11)
	   campo.value += "-";
}

function Valida_CPF(CPF)
{
    var x = 0 ;
    var y = 0 ;
    var soma = 0 ;
    var resto = 0 ;
    var Cic_calc = 0 ;

	var SOMENTE_NUMERO = "";
	for (inicio = 0; inicio <= CPF.length-1; inicio++)
	{
		if (!isNaN(CPF.substring(inicio,inicio+1)))
		{	
			SOMENTE_NUMERO = SOMENTE_NUMERO+""+CPF.substring(inicio,inicio+1);
		}
	}

    Cic_calc = SOMENTE_NUMERO.substring(0, 9);

    x = SOMENTE_NUMERO.substring(0, 1) ;
    for (y = 1; y < 11; y++)
    {
         if (SOMENTE_NUMERO.substr(y , 1) != x)
         {
             break ;
         }
         else
         {
             soma++ ;
         }
    }
    if (soma == 10)
    {
        Cic_calc = "1" ;
    }
    soma = 0 ;
    y = 10 ;
    for (x = 0 ; x < 9 ; x++)
    {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y ) ;
         y-- ;
    }
    soma = soma * 10 ;
    resto = soma % 11 ;
    if (resto == 10)
    {
        resto = 0 ;
    }
    Cic_calc = Cic_calc + resto.toString() ;

    x = 0 ;
    y = 11 ;
    soma = 0 ;
    for (x = 0 ; x < 10 ; x++)
    {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y ) ;
         y-- ;
    }
    soma = soma * 10  ;
    resto = soma % 11  ;
    if (resto == 10)
    {
        resto = 0 ;
    }
    Cic_calc = Cic_calc + resto.toString() ;

    if (Cic_calc != SOMENTE_NUMERO)
    {
        return false;
    }
    return true ;
}

function ajusta_cnpj(campo)
{
	 if(campo.value.length == 2)
	   campo.value += ".";
	 if(campo.value.length == 6)
	   campo.value += ".";
	 if(campo.value.length == 10)
	  campo.value += "/";
	 if(campo.value.length == 15)
	   campo.value += "-";
}

function allValidChars(email) {
  var parsed = true;
  var validchars = "abcdefghijklmnopqrstuvwxyz0123456789@.-_";
  for (var i=0; i < email.length; i++) {
    var letter = email.charAt(i).toLowerCase();
    if (validchars.indexOf(letter) != -1)
      continue;
    parsed = false;
    break;
  }
  return parsed;
}

function ValidaEmail(email, required) {
    if (required==undefined) {   // if not specified, assume it's required
        required=true;
    }
    if (email==null) {
        if (required) {
            return false;
        }
        return true;
    }
    if (email.length==0) {  
        if (required) {
            return false;
        }
        return true;
    }
    if (! allValidChars(email)) {  // check to make sure all characters are valid
        return false;
    }
    if (email.indexOf("@") < 1) { //  must contain @, and it must not be the first character
        return false;
    } else if (email.lastIndexOf(".") <= email.indexOf("@")) {  // last dot must be after the @
        return false;
    } else if (email.indexOf("@") == email.length) {  // @ must not be the last character
        return false;
    }
	
    return true;
}

function SomenteLetraNumero(e)
{
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}
	
	// 8 = backspace
	
	if (!(tecla >= 48 && tecla <= 57) && !(tecla >= 65 && tecla <= 90) && !(tecla >= 97 && tecla <= 122) && (tecla != 8))
	{
		return false;
	}

}


function SomenteLetraNumeroEspaco(e)
{ 
	
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}

	// 8 = backspace
	// 32 = espaço
		
	if (!(tecla >= 48 && tecla <= 57) && !(tecla >= 65 && tecla <= 90) && !(tecla >= 97 && tecla <= 122) && (tecla != 32) && (tecla != 8))
	{
		return false;
	}
}

function SomenteLetraNumeroEspacoVirgulaHifenPonto(e)
{ 
	
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}

	// 8 = backspace
	// 32 = espaço
	// 44 = vírgula
	// 45 = hífen -
	// 46 = ponto .
		
	if (!(tecla >= 48 && tecla <= 57) && !(tecla >= 65 && tecla <= 90) && !(tecla >= 97 && tecla <= 122) && (tecla != 32) && (tecla != 8) && (tecla != 44) && (tecla != 45) && (tecla != 46))
	{
		return false;
	}
}


function SomenteLetraEspaco(e)
{ 
	
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}
	
	// 8 = backspace
	// 32 = espaço
	
	if (!(tecla >= 65 && tecla <= 90) && !(tecla >= 97 && tecla <= 122) && (tecla != 32) && (tecla != 8))
	{
		return false;
	}
}


function SomenteNumero(e)
{ 
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}

	// 8 = backspace
	
	if (!(tecla >= 48 && tecla <= 57) && (tecla != 8))
	{
		return false;
	}
}


function SomenteNumeroEspaco(e)
{
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}

	// 8 = backspace
	// 32 = espaço
	
	if (!(tecla >= 48 && tecla <= 57) && (tecla != 32) && (tecla != 8))
	{
		return false;
	}
	
}

function SomenteCPF_RG(e)
{
	var tecla = new Number();
	if(window.event)
	{
		tecla = e.keyCode;
	}
	else if(e.which) 
	{
		tecla = e.which;
	}
	else 
	{
		return true;
	}

	// 8 = backspace
	// 45 = - (hífen)
	// 46 = . (ponto)
	
	if (!(tecla >= 48 && tecla <= 57) && (tecla != 8) && (tecla != 45) && (tecla != 46))
	{
		return false;
	}
	
}

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

function LimitaDigitacao(campo,tamanho)
{
	if (campo.value.length >= tamanho)
	{
		event.returnValue = false;	
	}
}

function Maiusculo(campo)
{
  campo.value = campo.value.toUpperCase();
}

function Minusculo(campo)
{
  campo.value = campo.value.toLowerCase();
}
