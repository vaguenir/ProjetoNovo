<?php ob_start();
	require_once("validaAdmin.php");
	//Processamento de produtos
	
	$codigoProduto    = $_POST['codigoProduto']; //Pega o código do produto por POST - vem de produtos-f.php
	$nomeProduto      = $_POST['nomeProduto']; //Pega o nome do produto por POST - vem de produtos-f.php
	$descricaoProduto = $_POST['descricaoProduto']; //Pega a descricao do produto por POST - vem de produtos-f.php
	
	include_once ("Classes/Conexao.class.php"); //Inclui a classe de conexão
	include_once ("Classes/Produto.class.php"); //Inclui a classe de produtos
	
	$Conexao = new Conectar(); //Instancia a classe de conexao
	$Produto = new Produto ($codigoProduto,$nomeProduto,$descricaoProduto); //Instancia a classe de produtos
	
	if (isset($_GET['acao'])) {
		$acao = $_GET['acao']; //Atribui a variavel acao a ACAO que vem do metodo listar da classe de PRODUTOS
		
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$Produto->setCodigoProduto ($_GET['id']); // Coloca no objeto o codigoProduto o valor
			
		}
		
	}
	
	switch ($acao) {
	
		case 0:
			// Vem do formulario 0, chama o método INSERIR da classe de PRODUTOS
			if ($Produto->inserirProduto()) {
				//Mensagem de dados cadastrados
				echo "<script>";
				echo "alert(\"Produto cadastrado com sucesso!\");";
				echo "location.href='administracao.php?p=produtos-f.php'";
				echo "</script>";
				
			} else {
				//Caso ocorra algum erro mostra a mensagem de erro
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao cadastrar!\");";
				echo "location.href='administracao.php?p=produtos-f.php'";
				echo "</script>";
			
			}
			break;
			
		case 1: //Alteração - envia pro form de alteração 
			echo "<script>";
			echo "location.href='administracao.php?p=produtos-a.php&id=$id'";
			echo "</script>";
			break;
			
		case 2:
			//Vem do método listar da classe a ACAO como 2, EXCLUIR
			if ($Produto->excluirProduto()) {
				//Mensagem de dados cadastrados
				echo "<script>";
				echo "alert(\"Produto excluido com sucesso!\");";
				echo "location.href='administracao.php?p=produtos-f.php'";
				echo "</script>";
			
			} else {
				//Caso ocorra algum erro mostra a mensagem de erro
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao excluir!Verifique se este produto não depende de outra tabela!\");";
				echo "location.href='administracao.php?p=produtos-f.php'";
				echo "</script>";
			
			}
			break;
			
		case 3:
			
			if ($Produto->alterarProduto()) {
				//Mensagem de dados cadastrados
				echo "<script>";
				echo "alert(\"Produto alterado com sucesso!\");";
				echo "location.href='administracao.php?p=produtos-f.php'";
				echo "</script>";
			
			} else {
				//Caso ocorra algum erro mostra a mensagem de erro
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao alterar!\");";
				echo "location.href='administracao.php?p=produtos-f.php'";
				echo "</script>";
			
			}
			break;
					
	}




?>