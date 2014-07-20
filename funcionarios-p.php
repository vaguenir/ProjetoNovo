<?php
	require_once("validaAdmin.php");

	//Pegar por POST
	$codigoFuncionario 			= $_POST['codigoFuncionario'];
	$codigoPermissao            = $_POST['codigoPermissao'];
	$nomeFuncionario 			= $_POST['nomeFuncionario'];
	$sobrenomeFuncionario		= $_POST['sobrenomeFuncionario'];
	$dataNascimentoFuncionario 	= $_POST['dataNascimentoFuncionario'];
	$sexoFuncionario 			= $_POST['sexoFuncionario'];
	$loginFuncionario 			= $_POST['loginFuncionario'];
	$senhaFuncionario 			= $_POST['senhaFuncionario'];
	$emailFuncionario 			= $_POST['emailFuncionario'];

	
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Funcionario.class.php");
	
	$Conexao = new Conectar();
	
	$Funcionario = new Funcionario($codigoFuncionario,$codigoPermissao, $nomeFuncionario, $sobrenomeFuncionario, $dataNascimentoFuncionario, $sexoFuncionario, $loginFuncionario, $senhaFuncionario, $emailFuncionario);
	
	if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
	
	}
	
	if (isset($_GET['chave'])) {
		$chave = $_GET['chave'];
		$Funcionario->setCodigoFuncionario($_GET['chave']); //Seta o código do funcionario no objeto pra poder alterar
	}

	switch ($acao) {
		
		case 0:
			
		// DENTRO DESSE CASE, ACHO IMPORTANTE EXECUTAR UM METODO PRA VER SE O CARA NÃO COLOCOU UM  "LOGIN" IGUAL A DE OUTRO USUARIO, POIS PODE
		//DAR CONFLITO NA HORA DE LOGAR, APENAS UMA OPINIÃO Vaguenir JR 30/11/2013 03:12
			if ($Funcionario->inserirFuncionario()) {
				echo "<script>";
				echo "alert(\"Funcionario cadastrado com sucesso!\");";
				echo "location.href='administracao.php?p=funcionarios-f.php'";
				echo "</script>";
			
			} else {
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao cadastrar, verifique!\");";
				echo "location.href='administracao.php?p=funcionarios-f.php'";
				echo "</script>";
			}
			break;
		
		
		case 1:
			if ($Funcionario->excluirFuncionario()) {
				echo "<script>";
				echo "alert(\"Funcionario excluido com sucesso!\");";
				echo "location.href='administracao.php?p=funcionarios-f.php'";
				echo "</script>";
			
			} else {
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao excluir, verifique!\");";
				echo "location.href='administracao.php?p=funcionarios-f.php'";
				echo "</script>";
			}
			break;
	
	
		case 2:
		
			echo "<script>";
			echo "location.href='administracao.php?p=funcionarios-a.php&chave=$chave'";
			echo "</script>";
		
		break;
		
		case 3:
		
			if ($Funcionario->alterarFuncionario()) {
				echo "<script>";
				echo "alert(\"Funcionario alterado com sucesso!\");";
				echo "location.href='administracao.php?p=funcionarios-f.php'";
				echo "</script>";
		
			}else{
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao alterar, verifique!\");";
				echo "location.href='administracao.php?p=funcionarios-f.php'";
				echo "</script>";
			}
		break;
	

	}
?>