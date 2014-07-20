<?php ob_start();
	session_start();
	
	//Tira o valor das sessoes
	unset($_SESSION['codigo']);
	unset($_SESSION['permissao']);
	
	setcookie("login", "" , time()-3600*24*30*12);
		
		
	
	
	
	//Redireciona para a pagina
	header ("Location: login.php");
	

?>