<?php
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>:::Produtos:::</title>
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
		<link rel="stylesheet" type="text/css" href="Css/valida.css">
		<script src="Scripts/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/validaFuncionario.js"></script>
	</head>
	
	<body>
		<div id="form">
			<form action="" id="formProdutos" method="POST">
				
				<table class="formulario">
				
					<thead>
						
						<tr>
							
							<th colspan="2"><span class="tituloForm">Produtos</th>
						
						</tr>
					
					</thead>
				
					
					<tbody>
						
						<tr>
							
							<td><label for="nomeProduto">Nome:</label></td>
							<td><input placeholder="Ex:Janela,Porta" type="text" id="nomeProduto" name="nomeProduto" title="Insira o nome do produto" maxlength="32"></td>
							
						</tr>
						
						<tr>
							
							<td><label for="descricaoProduto">Descrição:</label></td>
							<td><textarea name="descricaoProduto" id="descricaoProduto" title="Escreva uma descrição para este produto" placeholder="Escreva uma descrição para o produto" maxlength="50"></textarea></td>
							
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