

<?php

//Classe de produtos
class Produto {

	private $codigoProduto;
	private $nomeProduto;
	private $descricaoProduto;
	
	public function __construct ($codigoProduto,$nomeProduto,$descricaoProduto) {
	
		$this->setCodigoProduto($codigoProduto);
		$this->setNomeProduto($nomeProduto);
		$this->setDescricaoProduto($descricaoProduto);
	}
// --------------- GETS ------------------------------------	
	public function getCodigoProduto () {
	
		return $this->codigoProduto;	
	}
	
	public function getNomeProduto () {
	
		return $this->nomeProduto;
	}
	
	public function getDescricaoProduto () {
	
		return $this->descricaoProduto;
	}
	
// ------------- SETS ----------------------------------------
	
	public function setCodigoProduto ($codigoProduto) {
	
		$this->codigoProduto = $codigoProduto;
	}
	
	public function setNomeProduto ($nomeProduto) {
	
		$this->nomeProduto = ltrim(ucfirst($nomeProduto));
	} 
	
	public function setDescricaoProduto ($descricaoProduto) {
	
		$this->descricaoProduto = ltrim(ucfirst($descricaoProduto));
	}
	
// ----------------------- INSERT INTO -----------------------------------

	public function inserirProduto () {
	
		$query = "INSERT INTO produtos (codigoProduto,nomeProduto,descricaoProduto) VALUES ('".$this->getCodigoProduto()."','".$this->getNomeProduto()."', '".$this->getDescricaoProduto()."')";
		
		//echo $query;
		
		if (mysql_query($query)) {
			// Se não der nenhum erro na inserção para o banco retorna o valor verdadeiro para o processamento
			return true;
		} else {
			//Caso ocorra algum erro retorna falso para o processamento
			return false;
		}	
	
	}
	
// -------------------- UPDATE SET ---------------------------------------

	public function alterarProduto () {
	
		$query = "UPDATE produtos SET nomeProduto = '".$this->getNomeProduto()."', descricaoProduto = '".$this->getDescricaoProduto()."' WHERE codigoProduto = '".$this->getCodigoProduto()."'";
		
		//echo $query;
		
		if (mysql_query($query)) {
			return true; //Retorna true caso a alteração seja bem sucedida
		
		} else {
			return false; //Caso ocorra algum erro retorna false para o processamento
		}
	}

// ----------------- DELETE FROM ------------------------------------------------	
	public function excluirProduto () {
	
		$query = "DELETE FROM produtos WHERE codigoProduto = '".$this->getCodigoProduto()."'";
		
		//echo $query;
		
		if (mysql_query($query)) {
			return true; //Retorna verdadeiro se a exclusão foi concluida
		} else {
			return false; //Retorna falso caso a exclusão tenha algum erro
		}
		
	}
	
// ------------------- LISTAR PRODUTOS ------------------------------------------------

	public function listarProduto() {
	
		$query = "SELECT codigoProduto,nomeProduto,descricaoProduto FROM produtos";
		
		if ($dados = mysql_query($query) or die (mysql_error())) {
		
		
			echo "<table id=\"tabelaConsulta\">";
				echo "<tr>";
					echo "<th class=\"tituloTabela\" colspan=\"5\">Registro de produtos</th>";
				echo "</tr>";
			
			echo "<tr>";
				echo "<td class=\"cabecalho\">C&oacute;digo</td>";
				echo "<td class=\"cabecalho\">Nome</td>";
				echo "<td class=\"cabecalho\">Descri&ccedil;&atilde;o</td>";
				echo "<td class=\"cabecalho\" colspan=\"2\">Op&ccedil;&atilde;o</td>";
			echo "</tr>";
			
			while ($array = mysql_fetch_array($dados)) {
			
			echo "<tr>";
				echo "<td class=\"corpo\">".$array['codigoProduto']."</td>";
				echo "<td class=\"corpo\">".$array['nomeProduto']."</td>";
				echo "<td class=\"corpo\">".$array['descricaoProduto']."</td>";
				echo "<td><a class=\"botaoAlterar\" href=\"produtos-p.php?acao=1&id=".$array['codigoProduto']."\">Alterar</a></td>";
				echo "<td><a class=\"botaoExcluir\" href=\"produtos-p.php?acao=2&id=".$array['codigoProduto']."\">Excluir</a></td>";
			echo "</tr>";
			}
			echo "</table>";
		}
	}
	
	public function povoarCampos($id) {
	
		if (isset($id)) {
		
			$query = "SELECT codigoProduto,nomeProduto,descricaoProduto FROM produtos WHERE codigoProduto = $id";
			
			if ($dados = mysql_query($query) or die (mysql_error())) {
			
				$linhas = mysql_fetch_row($dados);
				$num = mysql_num_rows($dados);
				
				if ($num === 1) {
					
					$this->setCodigoProduto($linhas[0]);
					$this->setNomeProduto($linhas[1]);
					$this->setDescricaoProduto($linhas[2]);
					
					return true;
				
				} else {
					return false;
				}
		
			} else {
				return false;
			}
		
		} else {
			return false;
		}
	
	
	}
	
	public function listarLinksProdutos ($pagina) {
	
		$limite = 4; // DEVE SER IGUAL AO MÉTODO "Listar Paginas Produtos"
			
		if ($pagina > 0) {
				
				
			$paginaFinal = ($pagina * $limite) - $limite;
				
				
			
		} else {
				
			$paginaFinal = 0;
				
				
		}
		
		$query = "SELECT p.nomeProduto , p.codigoProduto ,COUNT(mp.codigoProduto), mp.enderecoMidiaProduto FROM produtos p INNER JOIN midiasprodutos mp ON mp.codigoProduto = p.codigoProduto GROUP BY p.nomeProduto DESC LIMIT $paginaFinal,$limite";
		
		$dados = mysql_query($query) or die(mysql_error());
		
		
		while ($array = mysql_fetch_array($dados)) {
				
				
			echo "<div id=\"categoriaProduto\">";
				
				echo "<div title=\"".$array['COUNT(mp.codigoProduto)']." produto(s) nessa categoria\" id=\"numeroProdutos\">".$array['COUNT(mp.codigoProduto)']."</div>"; // Pega a quantidade de produtos existentes nessa categoria
				
				echo "<a title=\"Listar todos os produtos da categoria - ".$array['nomeProduto']."\"   class=\"linkCategoria\" href=\"index.php?p=produtosCategoria.php&cat=".$array['codigoProduto']." \"> ".$array['nomeProduto']." </a>";
				
				echo "<div id=\"imgCategoria\">";
					echo "<a href=\"index.php?p=produtosCategoria.php&cat=".$array['codigoProduto']." \">";
						echo "<img src=image.php?img=".$array['enderecoMidiaProduto']."&w=340&h=200 width=\"340\" height=\"200\" />";
					echo "</a>";
				echo "</div>";
				
			echo "</div>";
				
		}
	}
	
	public function listarPaginasProdutos($pagina) {
		
			$limite = 4;
		
			$query = "SELECT COUNT(p.codigoProduto) FROM produtos p";
			//echo $query;
			
			$dados = mysql_query($query) or die (mysql_error());
			
			$array = mysql_fetch_array($dados);
			
			$numeroPagina = $array['COUNT(p.codigoProduto)'] / $limite; //Divide a quantidade de obras pelo limite, para ver quantas paginas serão criadas
			
			//echo $array['COUNT(p.codigoProduto)'];
			
			$numeroPagina = ceil($numeroPagina);
			
			echo "<div id=\"paginacao\">";
			
				if ($pagina != 1) {
				
					echo "<a title=\"Ir para a primeira página\" class=\"firstPage\" href=\"index.php?p=categorias.php&pag=1\">Primeira</a>";
				}
				
				if ($array['COUNT(p.codigoProduto)'] > $limite) { //Se o array for maior que o limite, é necessário fazer paginação
				
					for ($i = 1; $i <= $numeroPagina; $i++) {
					
						if ($i === $pagina) {
						
							echo "<a title=\"Página ".$i."\">".$i."</a>";
						} else {
						
							echo "<a title=\"Página ".$i."\" class=\"page\" href=\"index.php?p=categorias.php&pag=".$i."\">$i</a>";
						}
					
					}
				
				
				}
				
				
				if ($pagina != $numeroPagina) {
				
					echo "<a title=\"Ir para a última página\" class=\"lastPage\" href=\"index.php?p=categorias.php&pag=".$numeroPagina."\">Última página</a>";
				}
			
			echo "</div>";
			
		
		}
}
?>