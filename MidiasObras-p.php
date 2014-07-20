<?php ob_start();
	require_once("validaAdmin.php");
	//Processamento de MIDIASOBRAS
	
	$codigoMidiaObra    = $_POST['codigoMidiaObra'];
	$codigoTipoMidia    = $_POST['codigoTipoMidia'];
	$codigoObra         = $_POST['codigoObra'];
	
	if (isset($_FILES['Arquivo'])) {
		
		$arquivo =  $_FILES['Arquivo']['name'];
		$enderecoMidiaObra  = "Classes/Obras/" .$arquivo;
	
	} else {
	
		//echo "Tem nada";
	}
	
	include("Classes/Conexao.class.php");
	include("Classes/MidiaObra.class.php");
	
	
	$Conexao = new Conectar();
	$Upload = new MidiaObra($codigoMidiaObra,$codigoObra,$codigoTipoMidia,$arquivo,$enderecoMidiaObra);
	
	if (isset($_GET['acao'])) {
		
		$acao = $_GET['acao'];
		$cp = $_GET['cp'];
		$endereco = $_GET['en'];
		$Upload->setCodigoMidiaObra($cp);
		$Upload->setNomeArquivo($endereco);
	}
	
	
	
	switch ($acao) {
		
		case 0 :
			
			if ($Upload->validaTipoArquivo()) {
				echo "<script>";
				echo "alert(\"Upload e o cadastro foram feitas com sucesso!\");";
				echo "location.href='administracao.php?p=MidiasObras-f.php'";
				echo "</script>";
			
			} else {
				echo "<script>";
				echo "alert(\"Ocorreu um erro. Verifique!\");";
				echo "location.href='administracao.php?p=MidiasObras-f.php'";
				echo "</script>";
			}
			
		case 1:
			
			if ($Upload->excluirUpload()) {

				echo "<script>";
				echo "alert(\"As exclusoes foram feitas com sucesso!\");";
				echo "location.href='administracao.php?p=MidiasObras-f.php'";
				echo "</script>";
			
			} else {
				
				echo "<script>";
				echo "alert(\"Ocorreu um erro. Verifique!\");";
				echo "location.href='administracao.php?p=MidiasObras-c.php'";
				echo "</script>";
			
			
			}
	
	
	
	}
	
	
	//$Upload->validaTipoArquivo();


?>