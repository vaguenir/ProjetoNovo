<?php

	
	class Conectar {
		
		protected $dados;
		protected $conexao;
		
		public function __construct () {
		
			$host = "localhost";
			$banco = "esqua903_vm";
			//$usuario = "esqua903_vmuser";
			$usuario = "root";
			//$senha = "prime";
			$senha = "";
			
			$this->dados = mysql_connect($host,$usuario,$senha) or die ("Falha na conexão!");
			
			$conexao = mysql_select_db ($banco,$this->dados) or die ("Não foi possível acessar o banco");
		
		}
		
	
		
	}
	
?>