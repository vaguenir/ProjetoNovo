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
			<form action="" id="formTiposMidias" method="POST">
				
				
				<table class="formulario">
				
					<thead>
						
						<tr>
							
							<th colspan="2"> <span class="tituloForm"> Tipos de mídias</span></th>
						
						</tr>
					
					</thead>
						
					<tbody>
						
						<tr>
							
							<td><label for="descricaoTipoMidia">Mídia:</label></td>
							<td><input placeholder="Ex:Foto,Vídeo" type="text" id="descricaoTipoMidia" name="descricaoTipoMidia" title="Insira o nome do tipo de midia" maxlength="32"></td>
						
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