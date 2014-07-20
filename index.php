<?php 
	
	ob_start();
	include_once("Classes/Conexao.class.php");
	include_once("Classes/MidiaProduto.class.php");
	
	$conexao = new Conectar();
	$midiaProduto = new MidiaProduto();
	

?>
<!DOCKTYPE html>

<html>
	
	<head>
		
		
		<title> 
		
			<?php
				
				if (isset($_GET['p'])) {
					
					$pagina = @file_get_contents($_GET['p']);
					
					preg_match_all('#<title>([^<\/]{1,})<\/title>#i',$pagina,$title);
					
					echo "VM Esquadrias - " . $title [1][0];
				
				
				} else {
					
					echo "VM Esquadrias";
				
				}
		
		
			?> 	
		
		
		
		</title>
		
		
		
		
		<link rel="stylesheet" href="Css/main.css" type="text/css">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="Css/nivo-slider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="Css/default.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="Css/produtos.css">
		<link rel="stylesheet" href='Css/lightbox.css' type="text/css">
		<link rel="stylesheet" type="text/css" href="Css/map.css"/>
	
		<script type="text/javascript" src="scripts/jquery-1.6.1.min.js"></script>
		<script type="text/javascript" src="Scripts/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript" src="Scripts/html5lightbox.js"></script>
		<script type="text/javascript" src="Scripts/jquery.nivo.slider.pack.js"></script>
		
		<script type="text/javascript">
			$(window).load(function() {
				$('#bannerConteudo').nivoSlider();
			});
		</script>
	
	
	</head>
	
	<body>
		
		<div id="site">
			
			<div id="barraSuperior">
				
				<div id="topo">
					
						
					<a href="index.php?p=contato.php">Fale Conosco</a>
						
				</div>
			
			
			
			</div>
			
			
			<div id="conteudoP">
				
				<div id="menuLateral">
					
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?p=categorias.php">Galeria de Produtos</a></li>
						<li><a href="index.php?p=garantia.php">Garantia</a></li>
						<li><a href="index.php?p=tecnologia.php">Tecnologia</a></li>
						<li><a href="index.php?p=obras.php">Obras</a></li>
						<li><a href="index.php?p=localizacao.php">Localização</a></li>
						
					
					</ul>
				
				
				</div>
				
				<div id="conteudoSite">
					
					<?php
						if (!isset($_GET['p'])) {
							
							echo "<div class=\"default\">";
					
								echo "<div id=\"bannerConteudo\" class=\"nivoSlider\">";
										
									$midiaProduto->listarImagensBanner();
									
								echo "</div>";

							echo "</div>";
						
						
						
						}
						
					
					?>
					
					<div id="conteudoPrincipal">
						
						<?php
							
							if (isset($_GET['p'])) {
								
								if (!@include_once($_GET['p'])) {
								
									echo "A página solicitada não foi encontrada";
								
								}
							
							
							} else {
							
								echo "Bem vindo!";
								echo "<img src=\"Imgs/miniLogo.png\"/>";

								


								
							}	
						?>
						
					</div>


				
				
				</div>
			
			
			
			</div>
			
			<div id="rodape">
				
				<p>Telefone: 3339-8986 - Porto Alegre - <a href="https://www.google.com/maps?f=q&source=embed&hl=pt-BR&geocode=&q=VM+Esquadrias,Porto+Alegre,+Av.+Bento+Gon%C3%A7alves,+6787&aq=&sll=-30.076967,-51.124878&sspn=0.090911,0.169086&ie=UTF8&hq=VM+Esquadrias&hnear=Avenida+Bento+Gon%C3%A7alves,+6787+-+Partenon,+Rio+Grande+do+Sul,+90650-002,+Brasil&ll=-30.076912,-51.124922&spn=0.090331,0.169086&t=m&z=13&iwloc=A&cid=14541888176581807902">Avenida Bento Goncalves,6787</a> - Bairro Paternon</p>
			
				<ul>
					
					<li><a href="index.php?p=produtos.php">Galeria de Produtos</a></li>
					<li><a href="index.php?p=garantia.php">Garantia</a></li>
					<li><a href="index.php?p=tecnologia.php">Tecnologia</a></li>
					<li><a href="index.php?p=obras.php">Obras</a></li>
					<li><a href="index.php?p=localização.php">Localização</a></li>
					
				</ul>
			
			
			
			
			</div>
			
				
				
			
		
		
		
		</div>
	
	
	</body>



</html>