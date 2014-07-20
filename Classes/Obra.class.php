<?php
	//Classe de obras
	
	class Obra {
		
		private $codigoObra;
		private $descricaoObra;
		
		public function __construct ($codigoObra,$descricaoObra = 0) {
		
			$this->setCodigoObra($codigoObra);
			$this->setDescricaoObra($descricaoObra);
		}
		// ======================= SETS =============================================
		public function setCodigoObra($codigoObra) {
			$this->codigoObra = $codigoObra;
		}
		
		public function setDescricaoObra($descricaoObra) {
			$this->descricaoObra = ucfirst($descricaoObra);
		}
		
		//============================= GETS =========================================
		public function getCodigoObra () {
			return $this->codigoObra;
		}
		
		public function getDescricaoObra() {
			return $this->descricaoObra;
		}
		
		// ========================== INSERT INTO =================================================
		
		public function inserirObra() {
		
			$query = "INSERT INTO obras (codigoObra,descricaoObra) VALUES ('".$this->getCodigoObra()."', '".$this->getDescricaoObra()."')";
			
			if (mysql_query($query) or die (mysql_error())) {
			
				return true;
			} else {
				return false;
			}
		}
		
		public function alterarObra() {
		
			$query = "UPDATE obras SET descricaoObra = '".$this->getDescricaoObra()."' WHERE codigoObra = '".$this->getCodigoObra()."'";
			
			//echo $query;
			
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
			
		}
		
		public function excluirObra() {
			
			$query = "DELETE FROM obras WHERE codigoObra = '".$this->getCodigoObra()."'";
			
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function listarObra () {
	
			$query = "SELECT codigoObra,descricaoObra FROM obras";
			
			if ( $dados = mysql_query($query)) {
			
				echo "<table id=\"tabelaConsulta\" >"; //Cria tabela para colocar os tipos de midias
				
				echo "<tr>";
					echo "<th class=\"tituloTabela\" colspan=\"4\">Obras</th>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td class=\"cabecalho\">C&oacute;digo</td>";
				echo "<td class=\"cabecalho\">Obra</td>";
				echo "<td class=\"cabecalho\" colspan=\"2\">Op&ccedil;&atilde;o</td>";
				echo "</tr>";
				
				while ($array = mysql_fetch_array($dados)) {
					//Laço de repetição para mostrar TODOS os tipos de midias
					echo "<tr>";
					echo "<td class=\"corpo\">".$array['codigoObra']."</td>";
					echo "<td class=\"corpo\">".$array['descricaoObra']."</td>";
					echo "<td><a class=\"botaoAlterar\" href=\"obras-p.php?acao=1&id=".$array['codigoObra']."\">Alterar</a></td>";
					echo "<td><a class=\"botaoExcluir\" href=\"obras-p.php?acao=2&id=".$array['codigoObra']."\">Excluir</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		
		}
	
	
	
		public function povoarCampos($id) {

			$query = "SELECT codigoObra,descricaoObra FROM obras WHERE codigoObra = $id";
			
			//echo $query;
			if ($dados = mysql_query($query) or die (mysql_error())) {
			
				$linhas = mysql_fetch_array($dados);
				//$num = mysql_num_rows($dados);
				
				$this->setCodigoObra($linhas['codigoObra']);
				$this->setDescricaoObra($linhas['descricaoObra']);
					
				return true;

			} else {

				return false;
			}

		}
		
		
	
	
	
	}

?>