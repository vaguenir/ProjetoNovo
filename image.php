<?php
	ob_start();
	include_once ("Classes/Image.class.php");
	
	if (isset($_GET['img'])) {

		$src = $_GET['img'];
		
		$largura = $_GET['w'];

		$altura = $_GET['h'];

		$Imagem = new Image($src , $largura , $altura);

		$Imagem->CriarImagem();

		$mime = $Imagem->RetornarMime();
		
	
		
		header("Content-type: $mime");

		

		$Imagem->ExibirImagem($Imagem->RedimensionarImg());

	}
	ob_end_flush();

?>