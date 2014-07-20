<?php

//Classe de Tipos de Midias

class TipoMidia {

	private $codigoTipoMidia;
	private $descricaoTipoMidia;
	
	public function __construct ($codigoTipoMidia,$descricaoTipoMidia = 0 ) {
		$this->setCodigoTipoMidia($codigoTipoMidia);
		$this->setDescricaoTipoMidia($descricaoTipoMidia);
	}
	
// -------------------- GETS -------------------------------

	public function getCodigoTipoMidia () {
		return $this->codigoTipoMidia;
	}
	
	public function getDescricaoTipoMidia () {
		return $this->descricaoTipoMidia;
	}
	
// -------------------- SETS --------------------------------

	public function setCodigoTipoMidia ($codigoTipoMidia) {
	
		$this->codigoTipoMidia = $codigoTipoMidia;
	}
	
	public function setDescricaoTipoMidia ($descricaoTipoMidia) {
	
	
		$this->descricaoTipoMidia = ucfirst($descricaoTipoMidia);
	}
	
// ----------------------- INSERT INTO --------------------------------------

	public function inserirTipoMidia () {
	
		$query = "INSERT INTO tiposmidias (codigoTipoMidia,descricaoTipoMidia) VALUES ('".$this->getCodigoTipoMidia()."', '".$this->getDescricaoTipoMidia()."')";
		
		//echo $query;
		
		if (mysql_query($query) or die (mysql_error())) {
			return true; // Retorna true para o processamento se tudo deu certo 
		} else {
			return false; //Retorna falso caso algo deu errado
		}
	
	}
	
	public function alterarTipoMidia () {
	
		$query = "UPDATE tiposmidias SET descricaoTipoMidia = '".$this->getDescricaoTipoMidia()."' WHERE codigoTipoMidia = '".$this->getCodigoTipoMidia()."'";
		
		//echo $query;
	
		if (mysql_query($query) or die (mysql_error())) {
			return true; //Retorna true para o processamento se a alteração deu certo
		} else {
			return false; //Retorna falso para o processamento se não deu certo e ocorreu algum erro
		}
	}
	
	public function excluirTipoMidia () {
	
		$query = "DELETE FROM tiposmidias WHERE codigoTipoMidia = '".$this->getCodigoTipoMidia()."'";
		
		if (mysql_query($query)) {
			return true; //Retorna true para o processamento se a exclusão deu certo
		} else {
			return false; //Retorna falso para o processamento se algo deu errado
		}
		
	}
	
	public function listarTipoMidia() {
	
		$query = "SELECT codigoTipoMidia,descricaoTipoMidia FROM tiposmidias";
		
		if ( $dados = mysql_query($query)) {
		
			echo "<table id=\"tabelaConsulta\" >"; //Cria tabela para colocar os tipos de midias
			
			echo "<tr>";
				echo "<th class=\"tituloTabela\" colspan=\"4\">Tipos de m&iacute;dias</th>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td class=\"cabecalho\">C&oacute;digo</td>";
			echo "<td class=\"cabecalho\">M&iacute;dia</td>";
			echo "<td class=\"cabecalho\" colspan=\"2\">Op&ccedil;&atilde;o</td>";
			echo "</tr>";
			
			while ($array = mysql_fetch_array($dados)) {
				//Laço de repetição para mostrar TODOS os tipos de midias
				echo "<tr>";
				echo "<td class=\"corpo\">".$array['codigoTipoMidia']."</td>";
				echo "<td class=\"corpo\">".$array['descricaoTipoMidia']."</td>";
				echo "<td><a class=\"botaoAlterar\" href=\"tiposMidias-p.php?acao=1&id=".$array['codigoTipoMidia']."\">Alterar</a></td>";
				echo "<td><a class=\"botaoExcluir\" href=\"tiposMidias-p.php?acao=2&id=".$array['codigoTipoMidia']."\">Excluir</a></td>";
				echo "</tr>";
			}
			echo "</table>";
		
		}
	
	}
	
	public function povoarCampos() {

		$query = "SELECT codigoTipoMidia,descricaoTipoMidia FROM tiposmidias WHERE codigoTipoMidia = ".$this->getCodigoTipoMidia()."";
		
		
		if ($dados = mysql_query($query) or die (mysql_error())) {
		
			$linhas = mysql_fetch_row($dados);
			$num = mysql_num_rows($dados);
			
			if ($num === 1) {
				
				$this->setCodigoTipoMidia($linhas[0]);
				$this->setDescricaoTipoMidia($linhas[1]);
				
				return true;
			
			} else {
				//echo "else do num!";
				return false;
				
			}

		} else {
			
			
			return false;
		}

	}
	

}
?>