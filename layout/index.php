<?
include_once("config.php");

$aviso="avvv";
$advertencia="addd";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-language" content="pt-br">
		<meta name="robots" content="index,follow">
		<meta name="author" content="Alisson F. Coelho do Carmo">
		<meta name="description" content="<?echo $descricaoPagina;?>">
		<meta name="keywords" content="<?echo $chavesPagina;?>">
	
		<link rel="stylesheet" href="<?echo $CFG["layRoot"]?>reset.css" type="text/css">
		<link rel="stylesheet" href="<?echo $CFG["layRoot"]?>estilo.css" type="text/css">
 
		<title> 
			<?echo $tituloPagina;?>
		</title> 
	</head>
	<body>
		<div id="conteinerSite">
			<div id="conteinerTopo"><?include_once("topo.php");?></div>
			<div id="conteinerCorpo">
				<div id="conteinerEsquerda"><?include_once("menuEsquerda.php");?></div>
				<div id="conteinerDireita"><?include_once("menuDireita.php");?></div>
				<div id="conteinerConteudo">
					<?if($aviso != "" || $advertencia != ""){?>
					<div class="alertas">
						<?if($aviso != ""){?>
						<div class="aviso"> <?echo $aviso;?> </div>
						<?}if($advertencia != ""){?>
						<div class="advertencia"> <?echo $advertencia;?> </div>
						<?}?>
					</div>
					<?}?>
					fdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhffdfsdgfd gdf gdfhgfhfghfgh fghfghfghf ghgfhf
					hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
				</div>
			</div>
			<div id="conteinerRodape"><?include_once("rodape.php");?></div>
 		</div>
	</body>
</html> 
 
