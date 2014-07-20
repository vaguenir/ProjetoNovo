<?php ob_start();
	require_once("validaAdmin.php");
	//Processamento de MIDIASPRODUTOS
	
	echo "<head>";
		
		echo "<meta charset = UTF-8 >";
		
	echo "</head>";
	
	
	$codigoMidiaProduto    = $_POST['codigoMidiaProduto'];
	$codigoTipoMidia       = $_POST['codigoTipoMidia'];
	$codigoProduto         = $_POST['codigoProduto'];
	
	$descricaoMidiaProduto = $_POST['descricaoMidiaProduto'];
	
	if (isset($_FILES['Arquivo'])) {
		
		$arquivo =  $_FILES['Arquivo']['name'];
		$enderecoMidiaProduto  = "Classes/Imgs/" .$arquivo;
	
	} else {
	
		//echo "Tem nada";
	}
	
	include("Classes/Conexao.class.php");
	include("Classes/MidiaProduto.class.php");
	
	
	$Conexao = new Conectar();
	$Upload = new MidiaProduto($codigoMidiaProduto,$codigoProduto,$codigoTipoMidia,$arquivo,$descricaoMidiaProduto,$dataMidiaProduto,$enderecoMidiaProduto);
	
	if (isset($_GET['acao'])) {
		
		$acao = $_GET['acao'];
		$cp = $_GET['cp'];
		$endereco = $_GET['en'];
		$Upload->setCodigoMidiaProduto($cp);
		$Upload->setNomeArquivo($endereco);
	}
		
	switch ($acao) {
		
		case 0 :
			if ($Upload->validaTipoArquivo()) {
				echo "<script>";
				echo "alert(\"Upload e o cadastro foram feitas com sucesso!\");";
				echo "location.href='administracao.php?p=midiasProdutos-f.php'";
				echo "</script>";
			
			} else {
				//echo "<script>";
				//echo "alert(\"Ocorreu um erro. Verifique!\");";
				//echo "location.href='administracao.php?p=midiasProdutos-f.php'";
				//echo "</script>";
			}
			
			break;
			
		case 1:
			
			if ($Upload->excluirUpload()) {

				echo "<script>";
				echo "alert(\"As exclusoes foram feitas com sucesso!\");";
				echo "location.href='administracao.php?p=midiasProdutos-f.php'";
				echo "</script>";
			
			} else {
				
				echo "<script>";
				echo "alert(\"Ocorreu um erro. Verifique!\");";
				echo "location.href='administracao.php?p=midiasProdutos-c.php'";
				echo "</script>";
			
			
			}
			
			break;
	
	
	}
	
	
	//$Upload->validaTipoArquivo();


?>