<?php
	
	session_start();
	if (isset($_SESSION['codigo'])) {
		
		header("Location: administracao.php");
	
	}
	
	
	if ($_COOKIE['login'] === 's' ) {
		
		header("Location: administracao.php");
	
	} 

?>