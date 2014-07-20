<?php
	require_once("validaAdmin.php");
	//P de obras
	$codigoObra = $_POST['codigoObra'];
	$descricaoObra = $_POST['descricaoObra'];
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Obra.class.php");
	
	$Conexao = new Conectar();
	$Obra = new Obra($codigoObra,$descricaoObra);
	
	if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
		$id = $_GET['id'];
		$Obra->setCodigoObra($_GET['id']);
	}
	
	switch ($acao) {
	
		case 0:
			if ($Obra->inserirObra()) {
				//Alterar
				echo "<script>";
				echo "alert(\"Dados inseridos com sucesso!\");";
				echo "location.href='administracao.php?p=obras-c.php'";
				echo "</script>";
			
			} else {
			
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao inserir!\");";
				echo "location.href='administracao.php?p=obras-a.php'";
				echo "</script>";


			}
			break;
			
		case 1:
			//Alterar
			echo "<script>";
			echo "location.href='administracao.php?p=obras-a.php&id=$id'";
			echo "</script>";
		break;
		
		case 2:
			if ($Obra->excluirObra()) {
				echo "<script>";
				echo "alert(\"Dados excluidos com sucesso!\");";
				echo "location.href='administracao.php?p=obras-c.php'";
				echo "</script>";

			
			} else {
			
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao excluir! Verifique se esta obra não depende de outra tabela!\");";
				echo "location.href='administracao.php?p=obras-c.php'";
				echo "</script>";


			}
			break;
		
		case 3:
			if ($Obra->alterarObra()) {
				//Alterar
				echo "<script>";
				echo "alert(\"Dados alterados com sucesso!\");";
				echo "location.href='administracao.php?p=obras-c.php'";
				echo "</script>";
			
			} else {
			
				echo "<script>";
				echo "alert(\"Obra alterada com sucesso!\")";
				echo "location.href='administracao.php?p=obras-c.php'";
				echo "</script>";

			}
			break;

	}

?>