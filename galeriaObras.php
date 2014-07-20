<?php
	include_once("Classes/MidiaObra.class.php");
	include_once("Classes/Conexao.class.php");


	$Conexao = new Conectar();
	
	if (isset($_GET['ob'])) {


		$codigoObra = (int)$_GET['ob'];
		$MidiaObra = new MidiaObra(0,$codigoObra);

	
		if (isset($_GET['pag'])) {
			
			$pagina = (int) $_GET['pag'];
			
			$paginaListar = (int) $_GET['pag'];
		
		} else {
			
			$pagina = 0;
			$paginaListar = 1;
		
		}
	
	}

?>


<html>
	<head>
		<title>Galeria de obras</title>
		
		
		<script>
			
			
			
			$(document).ready (function () {
					
					$ (".lightBox").lightBox({
						
						imageLoading: 'Obras/lightbox-ico-loading.gif',
						imageBtnClose: 'Obras/lightbox-btn-close.gif',
						imageBtnPrev: 'Obras/lightbox-btn-prev.gif',
						imageBtnNext: 'Obras/lightbox-btn-next.gif',
						txtOf: 'de',
						keyToClose:27
					
					
					});
					
					
			});
			
		
		</script>
	</head>
	
	<body>
		<div id="galeria">
			
			<h1><?php echo $MidiaObra->nomeObra() ?> </h1>
			
			<div id="conteudoGaleria">
			
				<?php
				
					$MidiaObra->listarImgsObras($pagina);
					
					$MidiaObra->listarPaginasGaleriaObra($paginaListar);
				
				?>
			</div>
		</div>
	</body>
</html>