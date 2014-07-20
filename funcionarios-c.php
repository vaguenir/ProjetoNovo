<?php
	require_once("validaAdmin.php");
	//Consulta
	
	include_once("Classes/Funcionario.class.php");
	include_once("Classes/Conexao.class.php");
	
	$Conexao = new Conectar();
	$Funcionario = new Funcionario($codigoFuncionario,$codigoPermissao, $nomeFuncionario, $sobrenomeFuncionario, $dataNascimentoFuncionario, $sexoFuncionario, $loginFuncionario, $senhaMD5, $emailFuncionario);
	
	$Funcionario->listarFuncionario();


?>