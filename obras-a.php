<?php
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<title>:::Tipos de Midia:::</title>
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
	</head>
	
	<?php
		include_once("Classes/Conexao.class.php");
		include_once("Classes/Obra.class.php");
		
		$Conexao = new Conectar();
		$Obra = new Obra($codigoObra,$descricaoObra);
		
		if ($_GET['id']) {
			$id = $_GET['id'];
		}
		
		if ($Obra->povoarCampos($id)) {
			$codigoObra = $Obra->getCodigoObra();
			$descricaoObra = $Obra->getDescricaoObra();
		}
	
	
	?>
	
	<body>
		<div id="form">
			<form action="obras-p.php?acao=3&id=<?php echo $id; ?>" method="POST">
				
				<table class="formulario">
				
					<thead>
						
						<tr>
							
							<th colspan="2"> <span class="tituloForm">Obras</span></th>
						
						</tr>
					
					
					</thead>
					
					
					<tbody>
						
						<tr>
							
							<td><label for="descricaoObra">Nome:</label></td>
							<td><input placeholder="Insira o nome da obra" value="<?php echo $descricaoObra; ?>"type="text" name="descricaoObra" title="Insira o nome da obra" maxlength="50"></td>
						
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