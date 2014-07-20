<?php ob_start();

	session_start();
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Login.class.php");

	$login = $_POST['loginFuncionario']; 

	$senha = $_POST['senhaFuncionario']; 

	$opcao = $_POST['lembrar'];
	
	echo "<script type='text/javascript'> alert(".$opcao.") </script>";
	
	$Conexao = new Conectar();
	$Login = new Login($login , $senha);

	if ($Login->Login($opcao)) {
		header("Location: administracao.php");
	}else{

		//echo $Login->getSenhaUsuario();
		header("Location: erroLogin.php");
	}

?>