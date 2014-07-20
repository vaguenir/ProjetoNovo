<?php session_start();
	
	if (!isset($_SESSION['codigo'])) { //Se a session estiver fechada
		
		if (isset($_COOKIE['login'])) { //Se a session estiver fechada, mas se o usuario decidiu salvar os dados
		
			//Gambiarra
			$_SESSION['permissao'] = 1;
			
			
		} else {

			header("Location: index.php");
			
		
		}
	}
?>