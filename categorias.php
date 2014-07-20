<?php

	include_once("Classes/Conexao.class.php");
	include_once("Classes/Produto.class.php");
	
	
	$produto = new Produto(0,$codigoProduto);
	$Conexao = new Conectar();
	
	$codigoProduto = (int)$_GET['ob'];
	
	if (isset($_GET['pag'])) {
			
		$pagina = (int) $_GET['pag'];
			
		$paginaListar = (int) $_GET['pag'];
			
	} else {
			
		$pagina = 0;
		$paginaListar = 1;
		
	}
	
	

?>
<!DOCKTYPE html>

<html>
	
	<head>
	
		<title>Categorias</title>
		
	</head>
	
	
	<body>
		
		<div id="categoriaProdutos">
				
			<h1>Selecione uma categoria:</h1>	
			
			<div id="categorias">
				
				<?php
					
					$produto->listarLinksProdutos($pagina);
					$produto->listarPaginasProdutos($paginaListar);
				?>
			
			
			</div>
			
		
		</div>
		
		
	
	
	</body>

</html>