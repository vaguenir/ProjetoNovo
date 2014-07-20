<?php ob_start();
	require_once("validaAdmin.php");
	include_once("Classes/Conexao.class.php");
	include_once("Classes/MidiaObra.class.php");
	
	$Conexao = new Conectar();
	$MidiaObra = new MidiaObra($codigoMidiaObra,$codigoObra,$codigoTipoMidia,$enderecoMidiaObra);

?>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>:::Cadastro de Midia Obra:::</title>
	</head>
	
	<body>
		<div id="form">
			<form action="" id="formMidiasObras" method="POST"  enctype="multipart/form-data">
				
				
				<table class="formulario">
				
					<thead>
						
						<tr>
							
							<th colspan="2"><span class="tituloForm">Upload</span></th>
						
						</tr>
					
					</thead>
					
					<tbody>
					
						<tr>
							
							<td><label for="codigoObra"> Obra:</label></td>
							<td> <?php $MidiaObra->selecionarObra(); ?></td>
							
						
						</tr>
						
						<tr>
							
							<td><label for="codigoMidia"> Tipo:</label></td>
							<td> <?php $MidiaObra->selecionarTipoMidia(); ?></td>
							
						
						</tr>
						
						<tr>
							
							
							<td colspan="2"><input type="file" name="Arquivo" title="Escolha o arquivo"></td>
						
						
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