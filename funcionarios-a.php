<?php
	require_once("validaAdmin.php");
?>
<html>
	<head>
		<title>:::Funcionarios:::</title>
		<link rel="stylesheet" type="text/css" href="Css/forms.css">
		<script type="text/javascript" src="./js/validaFuncionario.js"></script>
	
		<?php
			if(isset($_GET['chave'])){
				
				$codigoFuncionario =  $_GET['chave'];			
			}
			
			include_once("Classes/Conexao.class.php");
			include_once("Classes/Funcionario.class.php");
			
			$Conexao = new Conectar();
			$Funcionario = new Funcionario($codigoFuncionario,$codigoPermissao, $nomeFuncionario, $sobrenomeFuncionario, $dataNascimentoFuncionario, $sexoFuncionario, $loginFuncionario, $senhaMD5, $emailFuncionario);
			
			if ($Funcionario->povoarCampos()) {
				
				$codigoFuncionario = $Funcionario->getCodigoFuncionario();
				$nomeFuncionario   = $Funcionario->getNomeFuncionario();
				$sobrenomeFuncionario = $Funcionario->getSobrenomeFuncionario();
				$sexoFuncionario = $Funcionario->getSexoFuncionario(); 
				$loginFuncionario = $Funcionario->getLoginFuncionario();
				$senhaFuncionario = $Funcionario->getSenhaMD5();
				$emailFuncionario = $Funcionario->getEmailFuncionario();
				$dataNascimentoFuncionario = $Funcionario->getDataNascimentoFuncionario();
				$codigoPermissao = $Funcionario->getCodigoPermissao();
				
			} 
			
		?>
	
	</head>
	
	<body>
		<div id="form">
			<form action="funcionarios-p.php?acao=3&chave=<?php echo $codigoFuncionario; ?>" name="funcionarios"  Onsubmit="return enviardados();" method="POST">
				<table class="formulario">
					
					<thead>
						
						<tr>
							
							<th colspan="2"> 
								<span class="tituloForm">Funcionários</span>
							</th>
							
						</tr>
					
					</thead>
					
					<tbody>
					
						<tr>
							
							<?php
						
								if ($codigoPermissao == 1) {
									
									$admin = "selected";
								
								} else {
								
									$funcionario = "selected";
								
								}
						
						
							?>
							
							<td><label for="codigoPermissao">Permissão:</label></td>
							<td>
								<select name="codigoPermissao">
									<option value="" >Selecione</option>
									<option <?php echo $admin; ?> value="1">Administrador</option>
									<option  <?php echo $funcionario; ?> value="2">Funcionario</option>
								</select>
							</td>
						
						
						</tr>
					
						<tr>
							<td><label for="nomeFuncionario">Nome:</label></td>
							<td><input type="text" required name="nomeFuncionario" value="<?php echo $nomeFuncionario?>" title="Insira o nome do funcionario" placeholder="Ex:Gustavo,Nilton" maxlength="50"></td>
							
						</tr>
						
						<tr>
							
							<td> <label for="sobrenomeFuncionario">Sobrenome:</label></td>
							<td><input type="text" name="sobrenomeFuncionario" value="<?php echo $sobrenomeFuncionario?>" title="Insira o sobrenome do funcionario" placeholder="Ex:Liesenfeld,Amaral" maxlength="50"></td>
						
						
						</tr>
						
						
						<tr>
							
							<td><label for="dataNascimentoFuncionario">Data Nascimento:</label></td>
							<td><input type="date" name="dataNascimentoFuncionario" value="<?php echo $dataNascimentoFuncionario?>" title="Insira a data de nascimento" ></td>
						
						</tr>
						
						<?php
					
							if ($sexoFuncionario == 'M') {
								$masculino = 'checked';
							} else {
								$feminino = 'checked';
							}
					
						?>
						
						<tr>
							
							<td><label for="sexoFuncionario">Sexo:</label></td>
							<td>
								
								<input type="radio" <?php echo $masculino ?> name="sexoFuncionario" value="M"  title="Escolha o sexo do funcionario" ><span class="textRadio">Masculino</span>
								<input type="radio" <?php echo $feminino?> name="sexoFuncionario" value="F"  title="Escolha o sexo do funcionario" ><span class="textRadio">Feminino</span>
							</td>
						
						</tr>
						
						<tr>
						
							<td><label for="emailFuncionario">Email:</label></td>
							<td><input type="text" value="<?php echo $emailFuncionario?>" name="emailFuncionario" title="Insira o email" placeholder="Informe o email" maxlength="50"></td>
						
						</tr>
						
						<tr>
							
							<td><label for="loginFuncionario">Login:</label></td>
							<td><input type="text" value="<?php echo $loginFuncionario?>" name="loginFuncionario" title="Insira o login do funcionario" placeholder="Ex:@vm,VMEsquadrias" maxlength="32"></td>
						
						</tr>
						
						<tr>
							
							<td><label for="senhaFuncionario">Senha:</label></td>
							<td><input type="password" name="senhaFuncionario" title="Insira a senha do funcionario" maxlength="32"></td>
						
						</tr>
						
						<tr>
							
							<td><label for="confirmarSenha">Confirme a senha:</label></td>
							<td><input type="password" name="confirmeSenha" title="Confirme a senha" maxlength="32"></td>
							
						</tr>
						
						<tr>
							
							<td colspan="2"><button type="submit" title="Cadastrar">Alterar</button></td>
						
						</tr>
					
					</tbody>
				
				
				
				</table>
				
					
					
			</form>
		</div>
	</body>
</html>