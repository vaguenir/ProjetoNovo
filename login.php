<?php
	
	include_once("validaCookie.php");

?>
<!DOCKTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>:::LOGIN:::</title>
		<link rel="stylesheet" type="text/css" href="Css/login.css">
		<script src="Scripts/jquery-2.0.3.min.js"></script>
		<script src="Scripts/jquery.validate.min.js"></script>
		
		
		<script>
			
			$ (document).ready(function () {
			
				$ ("form").validate({
				
				
					rules: {
					
						loginFuncionario: {
						
							required: true
						
						},
						senhaFuncionario: {
							
							required:true
						
						}
					
					
					} ,
					
					messages: {
						
						loginFuncionario: {
							
							required: "O campo de login deve ser preenchido"
						
						} ,
						
						senhaFuncionario : {
						
							required: "O campo de senha deve ser preenchido"
						
						}
						
						
						
					
					
					}
				
				
				
				});
				
			
			
			});
		
		</script>
	</head>

	<body> 
	
		<div id="site">
			
			<div id="login">
				<form action="validaLogin.php" method="POST" name="formLogin">
				
					<table class="Espaco" id="tabela">
						
						<tr>
							<td><img src="Imgs/miniLogo.png"></td>
						</tr>
						
						<tr>
							<td>Acesse a sua conta aqui!</td>	
						</tr>						
						
						
						<tr>	
							<td><input type="text" class="inputTexto" name="loginFuncionario" title="Insira o seu login"  placeholder="Nome de usuário"></td>
						</tr>
						
						<tr>
							<td><input type="password" class="inputTexto" name="senhaFuncionario" title="Insira a sua senha" placeholder="Senha"></td>
						</tr>
						
						<tr>
						  <td class="penultima"> <input type="checkbox" name="lembrar"> <span class="checkText">Lembrar senha</span></td>
						</tr>
						
						<tr >
							<td class="ultima"><input  type="submit" name="enviar" value="Login" class="botao"></td>
						</tr>
						
					</table>
					
				</form>
			</div>
		</div>
	</body>
</html>