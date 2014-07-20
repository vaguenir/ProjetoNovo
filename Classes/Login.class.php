<?php
	
	/*Classe criada para controlar a parte referente ao login de funcionarios*/
	/*Atirbutos: nomeUsuario = String , senhaUsuario = String
	/*Casos espaciais: senhaUsuario usa MD5, e ambas recebem a funcao do php addslashes, para retirar sinais que possam causar SQL Injection*/
	/*Autor:Gustavo Liesenfeld*/
	/*For:Prime:Solutions For You*/
	/*Data:11/01/2014*/
	
	class Login{
	
		private $nomeUsuario;
		private $senhaUsuario;
		
		
		public function __construct ($nomeUsuario , $senhaUsuario){
		
			$this->setNomeUsuario ($nomeUsuario);
			$this->setSenhaUsuario ($senhaUsuario);
		
		}
		
		public function getNomeUsuario () {
			
			return $this->nomeUsuario;
		
		}
		
		public function getSenhaUsuario () {
			
			return $this->senhaUsuario;
		
		}
		
		
		
		
		public function setNomeUsuario ($nomeUsuario) {
		
			$this->nomeUsuario = addslashes($nomeUsuario);
		
		}
		
		public function setSenhaUsuario ($senhaUsuario) {
			
			$this->senhaUsuario = md5(addslashes($senhaUsuario));
		
		}
		
		
		
		
		/*Funcão que faz a consulta no banco para ver se os dados foram digitados corretamente*/
		/*Recebe um parametro Bool, que é definido no formulario*/
		/*Retorna true caso sucesso, e false em caso de erro*/
		
		public function Login ($var) {
			
			$query = "SELECT codigoFuncionario , codigoPermissao , loginFuncionario  FROM funcionarios WHERE loginFuncionario = '".$this->getNomeUsuario()."' AND senhaFuncionario = '".$this->getSenhaUsuario()."' ";
			
			
			$dados = mysql_query ($query) or die (mysql_error()) ;
			
			$results = mysql_num_rows ($dados); 
			
			//echo "\nResultados".$results;
			
			if ($results === 1) {
				
				$linha = mysql_fetch_row($dados);
				
				$this->CriarSession ($linha[0] , $linha[1], $linha[2]); /*Cria a session*/
				
				if ($var) {
					
					$this->CriarCookie(); /*Cria o cookie*/
					
				}
				
				
				return true;
				
			
			} else {
				
				return false;
			
			}
			
		
		
		}
		
		/*Funcao que cria a session*/
		/*Retorno: Void*/
		
		public function CriarSession ($codigoFuncionario , $codigoPermissao, $loginFuncionario){
			
			session_start();
			
			$_SESSION['codigo'] = $codigoFuncionario;
			$_SESSION['permissao'] = $codigoPermissao;
			$_SESSION['usuario'] = $loginFuncionario;
			
		
		}
		
		
		
		public function CriarCookie() {
			
			setcookie("login" , "s" , time()+3600);
		
		}



	}



?>