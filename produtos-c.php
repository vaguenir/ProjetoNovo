<?php
	require_once("validaAdmin.php");
	//Consulta de PRODUTOS
	
	include_once ("Classes/Conexao.class.php");
	include_once ("Classes/Produto.class.php");
	
	$Conexao = new Conectar();
	$Produto =  new Produto($codigoProduto,$nomeProduto,$descricaoProduto);
	
	$Produto->listarProduto(); //Chama o método listar da classe de PRODUTOS
?>