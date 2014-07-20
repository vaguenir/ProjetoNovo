<?php
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/MidiaObra.class.php");
	
	$conexao = new Conectar();
	$MidiaObra = new MidiaObra(0,$codigoObra);
	
		
	$codigoObra = (int)$_GET['ob'];
	
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
		<meta charset="UTF-8" />
		<title>Obras</title>
	
	</head>

	<body>
		
		<div id="categoriaObras">
			
			<h1>Selecione uma obra</h1>
			
			<div id="categorias">
			
				<?php
				
					$MidiaObra->listarObrasGaleria($pagina);	
					$MidiaObra->listarPaginasObras($paginaListar);
				?>
			
			
			</div>
			
		
		
		</div>
		
		
		
		
	
	</body>
	
</html>