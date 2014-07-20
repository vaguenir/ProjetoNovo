<?php ob_start();
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<title>:::Tipos de Midia:::</title>
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
	</head>
	
	<?php
		
		
		
		include_once ("Classes/Conexao.class.php"); //Inlcui a classe de CONEXAO
		include_once ("Classes/TipoMidia.class.php"); //Inclui a classe de TIPOS MIDIAS
		
		if (isset($_GET['id'])) {
			$codigoTipoMidia = $_GET['id'];
		}
		
		$Conexao   = new Conectar();
		$TipoMidia = new TipoMidia($codigoTipoMidia);
		
		if ($TipoMidia->povoarCampos()) {
			$codigoTipoMidia = $TipoMidia->getCodigoTipoMidia();
			$descricaoTipoMidia = $TipoMidia->getDescricaoTipoMidia();
		}
	?>
	
	<body>
		<div id="form">
			<form action="administracao.php?p=tiposMidias-p.php&acao=3&id=<?php echo $codigoTipoMidia; ?>" method="POST">
				
				
				<table class="formulario">
				
					<thead>
						
						<tr>
							
							<th colspan="2"> <span class="tituloForm"> Alterar midias</span></th>
						
						</tr>
					
					</thead>
						
					<tbody>
						
						<tr>
							
							<td><label for="descricaoTipoMidia">Midia:</label></td>
							<td><input placeholder="Ex:Foto,Vídeo" type="text" value="<?php echo $descricaoTipoMidia?>" name="descricaoTipoMidia" title="Insira o nome do tipo de midia" maxlength="32"></td>
						
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