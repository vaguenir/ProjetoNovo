<?php ob_start();
	require_once("validaAdmin.php");
	//Consulta de TiposMidias
	
	include_once ("Classes/Conexao.class.php");
	include_once ("Classes/TipoMidia.class.php");
	
	$Conexao = new Conectar ();
	$TipoMidia = new TipoMidia($codigoTipoMidia,$descricaoTipoMidia);
	
	$TipoMidia->listarTipoMidia(); //Chama o método de LISTAR da classe de TIPOS MIDIAS
	
?>