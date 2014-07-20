<?php
	
	require_once("validaAdmin.php");

	include_once("Classes/Conexao.class.php");
	include_once("Classes/MidiaProduto.class.php");
	
	$Conexao = new Conectar();
	$MidiaProduto = new MidiaProduto ($codigoMidiaProduto,$codigoProduto,$codigoTipoMidia,$nomeArquivo,$descricaoMidiaProduto,$dataMidiaProduto,$enderecoMidiaProduto);
	
	$MidiaProduto->listarMidiasProdutos();





?>