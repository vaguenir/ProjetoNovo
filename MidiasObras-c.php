<?php
	require_once("validaAdmin.php");
	//CONSULTAD E MDIIAS OBRAS
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/MidiaObra.class.php");
	
	$Conexao = new Conectar();
	$MidiaObra = new MidiaObra($codigoMidiaObra,$codigoObra,$codigoTipoMidia,$enderecoMidiaObra);
	
	$MidiaObra->listarMidiasObras();


?>
