<?php ob_start();
	require_once("validaAdmin.php");
?>
<!DOCKTYPE html>

<html>
	
	<head>
		<title>VM Esquadrias - Admin</title>
		<link rel="stylesheet" href="Css/administracao.css" type="text/css">
		<link rel="stylesheet" href="Css/tabelaProdutosAdmin.css" type="text/css">
		<link rel="stylesheet" href="Css/tabelaConsulta.css" type="text/css">
		<!--<link rel="stylesheet" href="Css/style.css" type="text/css"> -->
		<meta charset="UTF-8">
		
		
		<script src="Scripts/jquery.js" type="text/javascript"></script>
		<script>
            
			$(function(){
				
				//$("a:first", ".menuv li.submenu", ".menuh li.submenu").addClass("seta");
				
                $(".Menu .subMenu").each(function(){
                    var el = $('#' + $(this).attr('id') + ' ul:eq(0)');
                    
					$("#barraSuperior").append(el);
                    
					$(this).hover(function(){
						el.slideDown();
                    }, function(){
                   
						el.slideUp();
                    });
                });
            });
        </script>
	</head>
	
	<body>
		
		<div id="site">
			
			<div id="barraSuperior">
				
				<div id="topo">
				</div>
			
			
			
			</div>
			
			
			<div id="conteudoP">
				
				<div id="menuLateral">
				
					<?php
						session_start();
							
						if ($_SESSION['permissao'] == 1) { // Verifica a permissão do funcionário 
								
							echo "<div class=\"lista\">";
				
								echo "<ul class=\"Menu\">";
									echo "<li><a href=\"administracao.php\">Home</a></li>";
								
									echo "<li id=\"submenuv-1\"class=\"subMenu\">"; //Aquela classe SUBMENUV-1 não pra que serve, mas só funciona com aquilo - ORDENA mas neh
										//Funcionario
										echo "<a href=\"#\">Funcionarios</a>";
										echo "<ul class=\"subMenu\">";
											echo "<li>";
												echo "<a href=\"administracao.php?p=funcionarios-f.php\">Cadastro</a>";
											echo "</li>";
											
											echo "<li>";
												echo "<a href=\"administracao.php?p=funcionarios-c.php\">Consulta</a>";
											echo "</li>";
										
										echo "</ul>";
									echo "</li>";
									
									//PRODUTOS
									echo "<li id=\"submenuv-2\"class=\"subMenu\">"; //Aquela classe SUBMENUV-2 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Produtos</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=produtos-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=produtos-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									//MIDIAS PRODUTOS
									echo "<li id=\"submenuv-3\"class=\"subMenu\">"; //Aquela classe SUBMENUV-3 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Midias produtos</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=midiasProdutos-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=midiasProdutos-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									
									//TIPOS MIDIAS 
									echo "<li id=\"submenuv-4\"class=\"subMenu\">"; //Aquela classe SUBMENUV-4 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Tipos midias</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=tiposMidias-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=tiposMidias-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									//OBRAS
									echo "<li id=\"submenuv-5\"class=\"subMenu\">"; //Aquela classe SUBMENUV-5 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Obras</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=obras-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=obras-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									//MIDIAS OBRAS
									echo "<li id=\"submenuv-6\"class=\"subMenu\">"; //Aquela classe SUBMENUV-3 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Midias obras</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=midiasObras-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=midiasObras-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									session_start();
									if (isset($_SESSION['codigo'])) {
										echo "<li><a href=\"logout.php\">Sair</a></li>";
									}					
								
							
								echo "</ul>";
							echo "</div>";
						} else {
						
							echo "<div class=\"lista\">";
				
								echo "<ul class=\"Menu\">";
									echo "<li><a href=\"administracao.php\">Home</a></li>";
								
									//PRODUTOS
									echo "<li id=\"submenuv-2\"class=\"subMenu\">"; //Aquela classe SUBMENUV-2 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Produtos</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=produtos-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=produtos-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									//MIDIAS PRODUTOS
									echo "<li id=\"submenuv-3\"class=\"subMenu\">"; //Aquela classe SUBMENUV-3 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Midias produtos</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=midiasProdutos-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=midiasProdutos-c.php\">Consulta</a>";
											echo "</li>";
										echo "</ul>";
									echo "</li>";
									
									//TIPOS MIDIAS 
									echo "<li id=\"submenuv-4\"class=\"subMenu\">"; //Aquela classe SUBMENUV-4 não pra que serve, mas só funciona com aquilo
										echo "<a href=\"#\">Tipos midias</a>";
										echo "<ul class=\"Menu\">";
											echo "<li>";
											echo "<a href=\"administracao.php?p=tiposMidias-f.php\">Cadastro</a>";
											echo "<a href=\"administracao.php?p=tiposMidias-c.php\">Consulta</a>";
											echo "</li>";
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
							
								session_start();
								echo "Bem vindo " . $_SESSION['nome'];
							}
						
						
						?>
					
					</div>
				
				
				</div>
			
			
			
			</div>
			
			<div id="rodape">
				
				<p>Telefone: 3339-8986 - Porto Alegre - Avenida Bento Goncalves,6787 - Bairro Paternon</p>
			
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