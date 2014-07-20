<?php


	//Classe de funcionairo
	
	class Funcionario {
		
		private $codigoFuncionario;
		private $codigoPermissao;
		private $nomeFuncionario;
		private $sobrenomeFuncionario;
		private $dataNascimentoFuncionario;
		private $sexoFuncionairo;
		private $loginFuncionario;
		private $senhaMD5;
		private $emailFuncionario;
		
		public function __construct($codigoFuncionario,$codigoPermissao, $nomeFuncionario = 0, $sobrenomeFuncionario = 0, $dataNascimentoFuncionario = 0, $sexoFuncionario = 0, $loginFuncionario = 0, $senhaMD5 = 0, $emailFuncionario = 0) {
		
		
			$this->setCodigoFuncionario($codigoFuncionario);
			$this->setCodigoPermissao($codigoPermissao);
			$this->setNomeFuncionario($nomeFuncionario);
			$this->setSobrenomeFuncionario($sobrenomeFuncionario);
			$this->setDataNascimentoFuncionario($dataNascimentoFuncionario);
			$this->setSexoFuncionario($sexoFuncionario);
			$this->setLoginFuncionario($loginFuncionario);
			$this->setSenhaMD5($senhaMD5);
			$this->setEmailFuncionario($emailFuncionario);
		}
		
		// ======================== SETS =====================================================\\
		public function setCodigoFuncionario($codigoFuncionario) {
			$this->codigoFuncionario = $codigoFuncionario;
		}
		
		public function setCodigoPermissao($codigoPermissao) {
			$this->codigoPermissao = $codigoPermissao;
		}
		
		public function setNomeFuncionario($nomeFuncionario) {
			$this->nomeFuncionario = ucfirst($nomeFuncionario);
		}
		
		public function setSobrenomeFuncionario($sobrenomeFuncionario) {
			$this->sobrenomeFuncionario = ucfirst($sobrenomeFuncionario);
		}
		
		public function setDataNascimentoFuncionario($dataNascimentoFuncionario) {
			$this->dataNascimentoFuncionario = $dataNascimentoFuncionario;
		}
		
		public function setsexoFuncionario($sexoFuncionario) {
			$this->sexoFuncionario = $sexoFuncionario;
		}
		
		public function setLoginFuncionario($loginFuncionario) {
			$this->loginFuncionario = $loginFuncionario;
		}
		
		public function setSenhaMD5($senhaMD5) {
			$this->senhaMD5 = md5($senhaMD5);
		}
		
		public function setEmailFuncionario($emailFuncionario) {
			$this->emailFuncionario = $emailFuncionario;
		}
		
		//========================== GETS =================================================================\\
		public function getCodigoFuncionario() {
			return $this->codigoFuncionario;
		}
		
		public function getCodigoPermissao() {
			return $this->codigoPermissao;
		}
		
		public function getNomeFuncionario() {
			return $this->nomeFuncionario;
		}
		
		public function getSobrenomeFuncionario() {
			return $this->sobrenomeFuncionario;
		}
		
		public function getDataNascimentoFuncionario() {
			return $this->dataNascimentoFuncionario;
		}
		
		public function getSexoFuncionario() {
			return $this->sexoFuncionario;
		}
		
		public function getLoginFuncionario() {
			return $this->loginFuncionario;
		}
		
		public function getSenhaMD5() {
			return $this->senhaMD5;
		}
		
		public function getEmailFuncionario() {
			return $this->emailFuncionario;
		}
		
		// ===================================== INSERT INTO ============================================================\\
		public function inserirFuncionario() {
		
			if ($this->verificaLogin()){ 
				//echo "ta aqui";
				$query = "INSERT INTO funcionarios (codigoFuncionario,codigoPermissao,nomeFuncionario,sobrenomeFuncionario,
													dataNascimentoFuncionario,sexoFuncionario,loginFuncionario,
													senhaFuncionario,emailFuncionario) VALUES ('".$this->getCodigoFuncionario()."','".$this->getCodigoPermissao()."',
													'".$this->getNomeFuncionario()."','".$this->getSobrenomeFuncionario()."',
													'".$this->getDataNascimentoFuncionario()."','".$this->getSexoFuncionario()."',
													'".$this->getLoginFuncionario()."','".$this->getSenhaMD5()."','".$this->getEmailFuncionario()."')";
													
				//echo $query;
				
				if (mysql_query($query) or die (mysql_error())) {
					return true;
				}else{
					return false;
				}
			}else{
				//echo "Aqui?";
				return false;
			}
			
		}
		
		public function verificaLogin(){
		
			$query = "SELECT loginFuncionario 
					  FROM funcionarios";
			
			if($dados = mysql_query($query)){
			
				$array = mysql_fetch_array($dados);
				
				if ($this->getLoginFuncionario() == $array['loginFuncionario']) {
					return false;
				} else {
					return true;
				}
			} else {
				return false;
			}
		
		
		} 
		
		public function excluirFuncionario(){
		
			$query = "DELETE
					  FROM	funcionarios
					  WHERE codigoFuncionario = ".$this->getCodigoFuncionario().";";
		
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		
		
		
		}
		
		public function alterarFuncionario(){
		
			$query = "UPDATE funcionarios
					  SET nomeFuncionario			= '".$this->getNomeFuncionario()."',
					      codigoPermissao           = '".$this->getCodigoPermissao()."',
						  sobrenomeFuncionario		= '".$this->getSobrenomeFuncionario()."',
						  dataNascimentoFuncionario	= '".$this->getDataNascimentoFuncionario()."',
						  sexoFuncionario			= '".$this->getSexoFuncionario()."',
						  loginFuncionario			= '".$this->getLoginFuncionario()."',
						  senhaFuncionario			= '".$this->getSenhaMD5()."',
						  emailFuncionario			= '".$this->getEmailFuncionario()."'
					  WHERE codigoFuncionario 		= ".$this->getCodigoFuncionario().";";	
					  
	
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		
		} 
		
		
		
		//ESTE METODO ESTA INACABADO, PRECISA COLOCAR TD E AS PARADAS AE Vaguenir JR 30/11/2013 03:08
		public function listarFuncionario(){
		
			$query = "SELECT * 
					  FROM funcionarios";
					  
			$result = mysql_query($query) or die (mysql_error());
			$linhas = (int)mysql_num_rows($result);
		
			if ($linhas === 0){
				echo "Não há registros !";
				echo "<a href=\"administracao.php?p=funcionarios-f.php\" title=\"Voltar ao formulario>Voltar ao formulário</a>";
			
			}else{
			
				echo "<table id=\"tabelaConsulta\">";
					echo"<tr>";
						echo "<th colspan=\"5\" class=\"tituloTabela\">Registros de funcionarios</th>";
					echo "</tr>";
					
					echo "<tr >";
						echo "<td class=\"cabecalho\">Codigo</td>";
						echo "<td class=\"cabecalho\">Nome</td>";
						echo "<td class=\"cabecalho\">Login</td>";
						echo "<td class=\"cabecalho\" colspan=\"2\">Opcao</td>";
					echo "</tr>";
				
				while($array = mysql_fetch_array($result)){
				
					echo "<tr>";
					echo "<td class=\"corpo\">".$array['codigoFuncionario']."</td>";
					echo "<td class=\"corpo\">".$array['nomeFuncionario']." ".$array['sobrenomeFuncionario']."</td>";
					echo "<td class=\"corpo\">".$array['loginFuncionario']."</td>";
					echo "<td><a  class=\"botaoAlterar\" href=administracao.php?p=funcionarios-p.php&acao=2&chave=" . $array['codigoFuncionario'] . ">Alterar</a></td>";
					echo "<td><a class=\"botaoExcluir\" href=administracao.php?p=funcionarios-p.php&acao=1&chave=" . $array['codigoFuncionario'] . ">Excluir</a></td>";	
					echo "</tr>";
				}
				echo "</table>";
			}

		}
		
		public function povoarCampos() {
		
			$query = "SELECT nomeFuncionario,
							 sobrenomeFuncionario,
							 dataNascimentoFuncionario,
							 sexoFuncionario,
							 loginFuncionario,
							 senhaFuncionario,
							 emailFuncionario,
							 codigoPermissao
							 FROM funcionarios 
							 WHERE codigoFuncionario = '".$this->getCodigoFuncionario()."'";
							 
			//echo $query;
				
			if ($dados = mysql_query($query) or die (mysql_error())) {
				
				$linhas = mysql_fetch_row($dados);
				$num = (int)mysql_num_rows($dados);
					
				if ($num === 1) {
					
					$this->setNomeFuncionario($linhas[0]);
					$this->setSobrenomeFuncionario($linhas[1]);
					$this->setDataNascimentoFuncionario($linhas[2]);
					$this->setSexoFuncionario($linhas[3]);
					$this->setLoginFuncionario($linhas[4]);
					$this->setSenhaMD5($linhas[5]);
					$this->setEmailFuncionario($linhas[6]);
					$this->setCodigoPermissao($linhas[7]);
						
					return true;
				
				} else {
					return false;
				}
				
			} else {
				return false;
			}
		
		
		}
	
	
	}
?>	