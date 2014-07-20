<?php
	
	include_once("Classes/MidiaProduto.class.php");

	if (isset($_GET['cat'])) {
		
		
		
		$codigoProduto = (int)$_GET['cat'];
		
		$midiaProduto = new MidiaProduto(0,$codigoProduto);
			
		if (isset($_GET['pag'])) {
			
			$pagina = (int) $_GET['pag'];
			
			$paginaListar = (int) $_GET['pag'];
		
		} else {
			
			$pagina = 0;
			$paginaListar = 1;
		
		}
	
	}
	
	

?>

<!DOCKTYPE html>

<html>
	
	<head>
	
		<title>Galeria dos produtos</title>
		
		
		
	</head>
	
	
	<body>
		
		<div id="galeria">
				
			<h1>Produtos da categoria: <?php echo $midiaProduto->nomeCategoria() ?></h1>	
			
			<div id="conteudoGaleria">
				
				<?php
					
					$midiaProduto->listarImagensGaleria($pagina);
					
					$midiaProduto->listarPaginasProdutos($paginaListar);
				
				?>
			
			
			</div>
			
		
		</div>
		
		
	
	
	</body>

</html>

