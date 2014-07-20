<?php
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<title>:::Produtos:::</title>
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
	</head>
	
	<?php
	
	
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
		
		include_once("Classes/Conexao.class.php");
		include_once("Classes/Produto.class.php");
	
		$Conexao = new Conectar();
		$Produto = new Produto($codigoProduto,$nomeProduto,$descricaoProduto);
		
		if ($Produto->povoarCampos($id)) {
			
			$codigoProduto = $Produto->getCodigoProduto();
			$nomeProduto = $Produto->getNomeProduto();
			$descricaoProduto = $Produto->getDescricaoProduto();
		
		}
	?>
	
	<body>
		<div id="form">
			<form action="administracao.php?p=produtos-p.php&acao=3&id=<?php echo $id; ?>" method="POST">
				
				<table class="formulario">
				
					<thead>
						
						<tr>
							
							<th colspan="2"><span class="tituloForm">Produtos</th>
						
						</tr>
					
					</thead>
				
					
					<tbody>
						
						<tr>
							
							<td><label for="nomeProduto">Nome:</label></td>
							<td><input placeholder="Ex:Janela,Porta" value="<?php echo $nomeProduto;?>" type="text" name="nomeProduto" title="Insira o nome do produto" maxlength="32"></td>
							
						</tr>
						
						<tr>
							
							<td><label for="descricaoProduto">Descrição:</label></td>
							<td><textarea name="descricaoProduto" title="Escreva uma descrição para este produto" placeholder="Escreva uma descrição para o produto" maxlength="50"><?php echo $descricaoProduto;?></textarea></td>
							
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