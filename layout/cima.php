<?
include_once("../config/funcoes.php");

if(!isset($pagina))
	die("Instancie a pagina!!!!");

?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="pt-br" />
		<meta name="robots" content="index,follow" />
		<meta name="author" content="Alisson Fernando Coelho do Carmo" />
		<meta name="description" content="<?echo $pagina->getDescricao();?>" />
		<meta name="keywords" content="<?echo $pagina->getPalavras_chaves();?>" />
	
		<link rel="stylesheet" href="../layout/reset.css" type="text/css" />
		<link rel="stylesheet" href="../layout/estilo.css" type="text/css" />
 
		<title> 
			<?echo $pagina->getTitulo();?>
		</title> 
	</head>
	<body>
		<div id="conteinerSite">
			<div id="conteinerTopo"><?include_once("topo.php");?></div>
			<div id="conteinerCorpo">
				<div id="conteinerEsquerda"><?include_once("menuEsquerda.php");?></div>
				<div id="conteinerDireita"><?include_once("menuDireita.php");?></div>
				<div id="conteinerConteudo">
					<?if($pagina->temAvisos() || $pagina->temAdvertencias()){?>
						<div class="box">
							<div class="box_titulo"></div>
							<div class="box_conteudo">
								<?if($pagina->temAvisos()){?>
									<div class="aviso"> <?echo $pagina->getAvisos();?> </div>
								<?}if($pagina->temAdvertencias()){?>
									<div class="advertencia"> <?echo $pagina->getAdvertencias();?> </div>
								<?}?>
							</div>
						</div>
					<?}?>
					<div class="box">
						<div class="box_titulo"></div>
						<div class="box_conteudo">


