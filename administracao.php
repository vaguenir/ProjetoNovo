<?php ob_start();
	require_once("validaAdmin.php");
	
?>
<!DOCKTYPE html>
<html>
	
	<head>
		<title>:::VM Esquadrias - Admin:::</title>
		<script type="text/javascript" src="Scripts/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="Scripts/geral.js"></script>
		<script src="Scripts/jquery.validate.min.js"></script>
		
		
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
		<link rel="stylesheet" type="text/css" href="Css/valida.css">
		<link rel="stylesheet" href="Css/administracao.css" type="text/css">
		<link rel="stylesheet" href="Css/tabelaProdutosAdmin.css" type="text/css">
		<link rel="stylesheet" href="Css/tabelaConsulta.css" type="text/css">
		<!--<link rel="stylesheet" href="Css/style.css" type="text/css"> -->
		<meta charset="UTF-8">
		
		
		
		<script>
            
			$ (document).ready ( function () {
				
				$ ("#site #conteudoP #menuLateral .Menu li").hover ( function () {
					
					$ (".subLista",this).toggle();
					
				
				
				});  
			
			
			
			}); 			
			
        </script>
	</head>
	
	<body>
		
		<div id="site">
			
			<div id="barraSuperior">
				
				<div id="topo">
					Usuário logado: <?php session_start(); echo $_SESSION['usuario'];?>
				</div>
			
			
			
			</div>
			
			
			<div id="conteudoP">
				
				<div id="menuLateral">
				
					<?php
						session_start();
							
						if ($_SESSION['permissao'] == 1) { // Verifica a permissão do funcionário 
								
							echo "<div class=\"lista\">";
				
								echo "<ul class=\"menu\">";
									
									echo "<li><a href=\"administracao.php\">Home</a></li>";
									
									//Novo Item do MENU
									echo "<li>";
									
										echo "<a href=\"#\" title=\"Funcionarios\">Funcionarios</a>";
										
										echo  "<ul class=\"subLista\">";
										
											echo "<li><a title=\"Cadastrar um novo funcionário\" href=\"?p=funcionarios-f.php\">Novo</a></li>";
											echo "<li><a title=\"Consultar funcionários\" href=\"?p=funcionarios-c.php\">Consultar</a></li>";
										
										
										echo "</ul>";
									
									echo "</li>";
									
									//Novo Item do MENU
									echo "<li>";
										
										echo "<a href=\"#\" title=\"Produtos\">Produtos</a>";
											
										echo "<ul class=\"subLista\">";
										
											echo "<li><a title=\"Cadastrar um novo produto\" href=\"?p=produtos-f.php\">Novo</a></li>";
											echo "<li><a title=\"Consultar produtos\" href=\"?p=produtos-c.php\">Consultar</a></li>";
										echo "</ul>";
									
									echo "</li>";
									
									
									echo "<li>";
										
										echo "<a title=\"Gerenciar midias\" href=\"#\">Fotos/Videos</a>";
											
										echo "<ul class=\"subLista\">";
										
											echo "<li><a title=\"Upload de arquivos\" href=\"?p=midiasProdutos-f.php\">Upload</a></li>";
											
											echo "<li><a title=\"Listar todas as imagens/videos\" href=\"?p=midiasProdutos-c.php\">Listar</a></li>";
										
										
										echo "</ul>";
										
									echo "</li>";
									
									echo "<li>";
										
										echo "<a title=\"Obras\" href=\"#\">Obras</a>";
										
										echo "<ul class=\"subLista\">";
											
											echo "<li><a title=\"Cadastrar uma obra\" href=\"?p=obras-f.php\">Novo</a></li>";
											
											echo "<li><a title=\"Consultar uma obra\" href=\"?p=obras-c.php\">Consultar</a></li>";
											
											echo "<li><a title=\"Envie uma foto de uma obra\" href=\"?p=MidiasObras-f.php\">Upload</a></li>";
											
											
											
											echo "<li><a href=\"?p=MidiasObras-c.php\" title=\"Listar imagens das obras\">Listar</a></li>";
											
										echo "</ul>";
									echo "</li>";
									
									echo "<li>";
										
										echo "<a href=\"#\">Tipos Midias</a>";
										
										echo "<ul class=\"subLista\">";
											
											echo "<li><a href=\"?p=tiposMidias-f.php\">Cadastrar</a></li>";
											echo "<li><a href=\"?p=tiposMidias-c.php\">Consultar</a></li>";
											
										echo "</ul>";
									
									echo "</li>";
									
									
									echo "<li><a href=\"logout.php\">Sair</a></li>";

									
									
								echo "</ul>";
							echo "</div>";
						
						
						}
					?>
				
				
				</div>
				
				<div id="conteudoSite">
					
										
					<div id="conteudoPrincipal">
						
						<?php
							
							if (isset($_GET['p'])) {
								
								if (!@include_once($_GET['p'])) {
								
									echo "A página solicitada não foi encontrada";
								
								}
							
							
							} else {
							
								echo "Bem vindo ";
								
								
								echo $COOKIE['login'];
								
								
							
							
							}
						
						
						?>
					
					</div>
				
				
				</div>
			
			
			
			</div>
			
			<div id="rodape">
				
				<p>Telefone: 3339-8986 - Porto Alegre - <a href="https://www.google.com/maps?f=q&source=embed&hl=pt-BR&geocode=&q=VM+Esquadrias,Porto+Alegre,+Av.+Bento+Gon%C3%A7alves,+6787&aq=&sll=-30.076967,-51.124878&sspn=0.090911,0.169086&ie=UTF8&hq=VM+Esquadrias&hnear=Avenida+Bento+Gon%C3%A7alves,+6787+-+Partenon,+Rio+Grande+do+Sul,+90650-002,+Brasil&ll=-30.076912,-51.124922&spn=0.090331,0.169086&t=m&z=13&iwloc=A&cid=14541888176581807902">Avenida Bento Goncalves,6787 - Bairro Paternon</a></p>
			
				<?php
					if ($_SESSION['permissao'] == 1) {
						echo "<ul>";
							
							echo "<li><a href=\"administracao.php?p=funcionarios-f.php\">Funcionarios</a></li>";
							echo "<li><a href=\"administracao.php?p=produtos-f.php\">Produtos</a></li>";
							echo "<li><a href=\"administracao.php?p=midiasProdutos-f.php\">Midias produtos</a></li>";
							echo "<li><a href=\"administracao.php?p=tiposMidias-f.php\">Tipos midias</a></li>";
							
						echo "</ul>";
					} else {
						echo "<ul>";
							echo "<li><a href=\"administracao.php?p=produtos-f.php\">Produtos</a></li>";
							echo "<li><a href=\"administracao.php?p=midiasProdutos-f.php\">Midias produtos</a></li>";
							echo "<li><a href=\"administracao.php?p=tiposMidias-f.php\">Tipos midias</a></li>";
							
						echo "</ul>";
					
					
					}
				?>
			</div>

		</div>
	
	
	</body>

</html>