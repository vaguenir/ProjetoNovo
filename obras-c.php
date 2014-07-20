<?php
	require_once("validaAdmin.php");
	//Consulta
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Obra.class.php");
	
	$Conexao = new Conectar();
	$Obra = new Obra($codigoObra,$descricaoObra);
	
	$Obra->listarObra();


?>