<?php
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>:::Tipos de Midia:::</title>
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
		<link rel="stylesheet" type="text/css" href="Css/valida.css">
		<script src="Scripts/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/validaFuncionario.js"></script>
	</head>
	
	<body>
		<div id="form">
			<form action="" id="formObras" name="obras" method="POST">
				
				
				<table class="formulario">
					
					<thead>
						
						<tr>
							
							<th colspan="2"><span class="tituloForm">Obras</span></th>
						
						</tr>
					
					</thead>
				
					
					<tbody>
						
						<tr>
							
							<td><label for="descricaoObra">Nome:</label></td>
							<td><input placeholder="Insira o nome da obra" type="text" name="descricaoObra" id="descricaoObra" title="Insira o nome da obra" maxlength="50"></td>
						
						</tr>
						
						<tr>
							<td colspan="2">
								<div id="mensagem">
								</div>
							</td>
						</tr>
						
						
						<tr>
							
							<td colspan="2"><button type="submit" title="Cadastrar">Enviar</button></td>
							
							
						</tr>
						
					</tbody>
				
				</table>
				
			</form>
		</div>
	</body>
</html>