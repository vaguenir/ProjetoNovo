<?php ob_start();
	
	require_once("validaAdmin.php");
	//Processamento de TIPOS DE MIDIAS
	$codigoTipoMidia    = $_POST['codigoTipoMidia']; //Vem de tiposMidias-f.php por POST
	$descricaoTipoMidia = $_POST['descricaoTipoMidia']; //Vem de tiposMidias-f.php por POST
	
	include_once("Classes/Conexao.class.php"); //Inlcui a classe de CONEXAO
	include_once("Classes/TipoMidia.class.php"); //Inclui a classe de TIPOS MIDIAS
	
	$Conexao = new Conectar(); //Instancia a classe de conexao - cria objeto
	$TipoMidia = new TipoMidia($codigoTipoMidia,$descricaoTipoMidia); //Instancia a classe de TIPOS MIDIAS - cria objeto
	
	if (isset($_GET['acao'])) {
		$acao = $_GET['acao']; // Atribui a variavel de tipo midia
	}
	
	if (isset($_GET['id'])) {
		$TipoMidia->setCodigoTipoMidia($_GET['id']); //Seta a variavel de codigo tipo midia
		$id = $_GET['id'];
	}
	
	switch ($acao) {
	
		case 0:
			//Vem de tiposMidias-f.php como 0 a ACAO, hora de chamar o método INSERIR da classe de TIPO MIDIAS
			if ($TipoMidia->inserirTipoMidia()) {
				//Mensagem de dados cadastrados
				echo "<script>";
				echo "alert(\"Tipo de midia cadastrada com sucesso!\");";
				echo "location.href='administracao.php?p=tiposMidias-f.php'";
				echo "</script>";
			} else {
				//Mensagem de erro
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao cadastrar!\");";
				echo "location.href='administracao.php?p=tiposMidias-f.php'";
				echo "</script>";
			}
			break;
		
		case 1:
			//Alterar
			echo "<script>";
			echo "location.href='administracao.php?p=tiposMidias-a.php&id=$id'";
			echo "</script>";
			break;
		case 2:
			//Vem do método listar da CLASSE como 2 a ACAO, Exclui
			if ($TipoMidia->excluirTipoMidia()) {
				//Mensagem de dados cadastrados
				echo "<script>";
				echo "alert(\"Tipo de mídia excluida com sucesso!\");";
				echo "location.href='administracao.php?p=tiposMidias-f.php'";
				echo "</script>";
			} else {
				//Mensagem de erro
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao excluir. Algum cadastrado depende desse tipo de midia!\");";
				echo "location.href='administracao.php?p=tiposMidias-f.php'";
				echo "</script>";
			}
			break;
		
		case 3:
			if ($TipoMidia->alterarTipoMidia()) {
				//Mensagem de dados cadastrados
				echo "<script>";
				echo "alert(\"Tipo de mídia alterada com sucesso!\");";
				echo "location.href='administracao.php?p=tiposMidias-f.php'";
				echo "</script>";
			} else {
				//Mensagem de erro
				echo "<script>";
				echo "alert(\"Ocorreu um erro ao alterar.Verifique!\");";
				echo "location.href='administracao.php?p=tiposMidias-f.php'";
				echo "</script>";
			}
			break;
	}
?>