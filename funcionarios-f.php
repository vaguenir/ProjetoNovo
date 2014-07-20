<?php
	require_once("validaAdmin.php");
?>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>:::Funcionarios:::</title>
	</head>
	
	<body>
		<div id="form">
			
			<form action="" id="formFuncionarios" name="funcionarios"  method="POST">
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
							
							<td><label for="codigoPermissao">Permissão:</label></td>
							<td>
								<select name="codigoPermissao" id="codigoPermissao">
									<option value="">Selecione</option>
									<option value="1">Administrador</option>
									<option value="2">Funcionario</option>
								</select>
							</td>
						
						
						</tr>
					
						<tr>
							<td><label for="nomeFuncionario">Nome:</label></td>
							<td><input type="text" required name="nomeFuncionario" id="nomeFuncionario" title="Insira o nome do funcionario" placeholder="Ex:Gustavo,Nilton" maxlength="50"></td>
							
						</tr>
						
						<tr>
							
							<td> <label for="sobrenomeFuncionario">Sobrenome:</label></td>
							<td><input type="text" name="sobrenomeFuncionario" id="sobrenomeFuncionario" title="Insira o sobrenome do funcionario" placeholder="Ex:Liesenfeld,Amaral" maxlength="50"></td>
						
						
						</tr>
						
						
						<tr>
							
							<td><label for="dataNascimentoFuncionario">Data Nascimento:</label></td>
							<td><input type="date" name="dataNascimentoFuncionario"  id="dataNascimentoFuncionario" title="Insira a data de nascimento" ></td>
						
						</tr>
						
						<tr>
							
							<td><label for="sexoFuncionario">Sexo:</label></td>
							<td>
								
								<input type="radio" name="sexoFuncionario" value="M"  id="sexoFuncionario" title="Escolha o sexo do funcionario" ><span class="textRadio">Masculino</span>
								<input type="radio" name="sexoFuncionario" value="F"  id="sexoFuncionario" title="Escolha o sexo do funcionario" ><span class="textRadio">Feminino</span>
							</td>
						
						</tr>
						
						<tr>
						
							<td><label for="emailFuncionario">Email:</label></td>
							<td><input type="text" name="emailFuncionario" id="emailFuncionario" title="Insira o email" placeholder="Informe o email" maxlength="50"></td>
						
						</tr>
						
						<tr>
							
							<td><label for="loginFuncionario">Login:</label></td>
							<td><input type="text" name="loginFuncionario" id="loginFuncionario" title="Insira o login do funcionario" placeholder="Ex:@vm,VMEsquadrias" maxlength="32"></td>
						
						</tr>
						
						<tr>
							
							<td><label for="senhaFuncionario">Senha:</label></td>
							<td><input type="password" name="senhaFuncionario" id="senhaFuncionario" title="Insira a senha do funcionario" maxlength="32"></td>
						
						</tr>
						
						<tr>
							
							<td><label for="confirmarSenha">Confirme a senha:</label></td>
							<td><input type="password" name="confirmeSenha" id="confirmeSenhaFuncionario" title="Confirme a senha" maxlength="32"></td>
							
						</tr>
						
						<tr>
							<td colspan="2">
								<div id="mensagem">
								</div>
							</td>
						</tr>
						
						<tr>
							
							<td colspan="2"><button type="submit" title="Cadastrar">Cadastrar</button></td>
						
						</tr>
						
						
					</tbody>
				</table>
			</form>
		</div>
	</body>
</html>