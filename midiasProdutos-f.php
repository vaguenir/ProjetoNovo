<?php ob_start();
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>:::MidiasProdutos:::</title>
	</head>
	
	<?php
		include("Classes/Conexao.class.php");
		//include("/Classes/Produto.class.php");
		//include("/Classes/TipoMidia.class.php");
		include("Classes/MidiaProduto.class.php");
		
		$Conexao   = new Conectar();
		//$Produto   = new Produto($codigoProduto,$nomeProduto);
		//$TipoMidia = new TipoMidia($codigoTipoMidia,$nomeTipoMidia);
		$MidiaProduto = new MidiaProduto($codigoMidiaProduto,$codigoProduto,$codigoTipoMidia,$nomeArquivo,$descricaoMidiaProduto,$dataMidiaProduto,$enderecoMidiaProduto);
	
	?>
	
	<body>
		<div id="form">
			<form action=""  id="formMidiasProdutos" method="POST" enctype="multipart/form-data"> <!-- enctype é usado por que especifica o conteudo como arquivo-->
				
				
				<table class="formulario">
					
					
					<thead>
						
						<tr>
							
							<th colspan="2"><span class="tituloForm">Upload<span></th>
						
						</tr>
					
					
					</thead>
					
					
					<tbody>
					
						<tr>
							
							<td><label for="codigoProduto">Produto:</label></td>
							
							<td>
							
								<?php
									
									$MidiaProduto->selecionarProduto();
							
								?>
							</td>
						
							
						</tr>
					
						<tr>
							
							<td><label for="codigoMidia">Tipo de upload:</label></td>
							
							<td>
								<?php
									$MidiaProduto->selecionarTipoMidia();
						
								?>
							</td>
						
						
						</tr>
						
						
						<tr>
							
							<td><label for="descricaoMidiaProduto">Descricao:</label></td>
							<td><textarea type="text" name="descricaoMidiaProduto"  placeholder="Escreva uma descrição" maxlength="50"></textarea></td>
						
						
						</tr>
						
						
						<tr>
							
							
							<td colspan="2"><input type="file" name="Arquivo" title="Escolha o arquivo" ></td>
						
						
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