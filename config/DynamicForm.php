<?

function getInputFromSQL($resSQL){
	$array = array();
	while ($linha = mysql_fetch_assoc($resSQL)){
		$array[$linha["ID"]] = $linha["DESCRICAO"];
	}
	return $array;
}

function previaArquivo($caminho, $tamanho){
	$extensao = end(explode(".", strtolower($caminho)));
	if($extensao == "jpg" || $extensao == "bmp" || $extensao == "png" || $extensao == "gif"){
		
		echo "<br><img src='$caminho' width='$tamanho' /></br>";
	}
}

function inputText($name, $value=null, $size=100, $maxlength=100){
	$valor = (($value!==null)?$value:$_POST["$name"]);
	$valor = br2nl($valor);
	echo "<input type='text' name='$name' value='" . $valor . "' size='$size' maxlength='$maxlength' />";
}

function inputTextarea($name, $value=null, $rows=10, $cols=10){
	echo "<textarea name='$name' rows='$rows' cols='$cols' >" . (($value!==null)?$value:$_POST["$name"]) . "</textarea>";
}

function inputHidden($name, $value=null){
	echo "<input type='hidden' name='$name' value='" . (($value!==null)?$value:$_POST["$name"]) . "' />";
}

function inputPassword($name, $value=null, $size=100, $maxlength=100){
	echo "<input type='password' name='$name' value='" . (($value!==null)?$value:$_POST["$name"]) . "' size='$size' maxlength='$maxlength' />";
}

function inputRadiobutton($name, $value, $selecionado = null){
	$selecionado = ($selecionado!==null)?$selecionado : $_POST["$name"];
	echo "<input type='radio' name='$name' value='$value' " . (($selecionado == "$value")?" CHECKED ":"") . "/>";
	
}

function inputCheckbox($name, $value, $selecionado = null){
	$selecionado = ($selecionado!==null)?$selecionado : $_POST["$name"];
	echo "<input type='checkbox' name='$name' value='$value' " . (($selecionado == "$value")?" CHECKED ":"") . "/>";
}


function inputSelect($name, $value, $selecionado = null, $size=1){
	$selecionado = ($selecionado!==null)?$selecionado : $_POST["$name"];
	echo "<select name='$name' size='$size' >";
			echo "<option value=''>SELECIONE</option>";
		foreach($value as $campo=>$valor)	
			echo "<option value='$campo'" . (($selecionado == "$campo")?" SELECTED ":"") . ">$valor</option>";

	echo "</select>";
}

function inputFile($name, $size = 50){
	echo "<input type='file' name='$name' size='$size'/>";
}


function inputSubmit($value){
	echo "<input type='submit' value='$value' />";
}

function inputReset($value){
	echo "<input type='reset' value='$value' />";
}


?>
