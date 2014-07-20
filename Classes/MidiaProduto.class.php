<?php
	class MidiaProduto {
	
		private $codigoMidiaProduto;
		private $codigoProduto;
		private $codigoTipoMidia;
		private $descricaoMidiaProduto;
		private $dataMidiaProduto;
		private $horaMidiaProduto;
		private $enderecoMidiaProduto;
		private $nomeArquivo;
		
		public function __construct ($codigoMidiaProduto = 0,$codigoProduto = 0,$codigoTipoMidia = 0,$nomeArquivo = 0,$descricaoMidiaProduto = 0,$dataMidiaProduto = 0,$enderecoMidiaProduto = 0 , $horaMidiaProduto = 0) {
		
			$this->setCodigoMidiaProduto($codigoMidiaProduto);
			$this->setCodigoProduto($codigoProduto);
			$this->setCodigoTipoMidia($codigoTipoMidia);
			$this->setDescricaoMidiaProduto($descricaoMidiaProduto);
			$this->setDataMidiaProduto($dataMidiaProduto);
			$this->setEnderecoMidiaProduto($enderecoMidiaProduto);
			$this->setNomeArquivo($nomeArquivo);
			$this->setHoraMidiaProduto($horaMidiaProduto);
		
		}
		
		//------------------SETS ------------------------------------------------------------------------------\\
		
		public function setCodigoMidiaProduto ($codigoMidiaProduto) {
		
			$this->codigoMidiaProduto = $codigoMidiaProduto;
		}
		
		public function setCodigoProduto ($codigoProduto) {
		
			$this->codigoProduto = $codigoProduto;
		}
		
		public function setCodigoTipoMidia ($codigoTipoMidia) {
		
			$this->codigoTipoMidia = $codigoTipoMidia;
		}
		
		public function setDescricaoMidiaProduto ($descricaoMidiaProduto) {
		
			
			$this->descricaoMidiaProduto = ucfirst($descricaoMidiaProduto);
			
		}
		
		public function setDataMidiaProduto ($dataMidiaProduto) {
			
			$dataMidiaProduto = date('Y').'-'.date('m').'-'.date('d');
			
		
			$this->dataMidiaProduto = $dataMidiaProduto;
		}
		
		public function setEnderecoMidiaProduto ($enderecoMidiaProduto) {
			
			//$nomeFinal = preg_replace('/\(|\)/','_',$enderecoMidiaProduto);
			$this->enderecoMidiaProduto = $enderecoMidiaProduto;
		}
		
		public function setNomeArquivo($nomeArquivo) {
			
			$this->nomeArquivo = $nomeArquivo; 
			
		}
		
		public function setHoraMidiaProduto ($horaMidiaProduto) {
		
			$horaMidiaProduto = date('H').":".date('i').":".date('s');
			
			$this->horaMidiaProduto = $horaMidiaProduto;
		
		}
		
		//----------------GETS-----------------------------------------------------------------------\\
		
		public function getCodigoMidiaProduto () {
			return $this->codigoMidiaProduto;
		}
		
		public function getCodigoProduto () {
			return $this->codigoProduto;
		}
		
		public function getCodigoTipoMidia () {
			return $this->codigoTipoMidia;
		}
		
		public function getDescricaoMidiaProduto () {
			return $this->descricaoMidiaProduto;
		}
		
		public function getDataMidiaProduto () {
			return $this->dataMidiaProduto;
		}
		
		public function getEnderecoMidiaProduto () {
			return $this->enderecoMidiaProduto;
		}
		
		public function getNomeArquivo () {
			return $this->nomeArquivo;
		}
		
		public function getHoraMidiaProduto () {
			
			return $this->horaMidiaProduto;
		
		}
		
		public function selecionarProduto () {
			
			$query = "SELECT codigoProduto,nomeProduto FROM produtos";
			
			if ($dados = mysql_query($query)) {
			
				echo "<select name=\"codigoProduto\">";
				
				echo "<option value=\"\">Selecionar</option>";
			
				while ($array = mysql_fetch_array($dados)) {
				
					echo "<option value=\"".$array['codigoProduto']."\">".$array['nomeProduto']."</option>";
				}
			}
			
				echo "</select>";
		}
		
		public function selecionarTipoMidia() {
		
			$query = "SELECT codigoTipoMidia,descricaoTipoMidia FROM tiposmidias";
			
			if ($dados = mysql_query($query)) {
				
				echo "<select name=\"codigoTipoMidia\">";
				
				echo "<option name\"descricaoTipoMidia\" value=\"\">Selecionar</option>";
				
				while ($array = mysql_fetch_array($dados)) {
				
					echo "<option name=\"descricaoTipoMidia\" value=\"".$array['codigoTipoMidia']."\">".$array['descricaoTipoMidia']."</option>";
				}
				
			}
			
			echo "</select>";
		}
		
		public function validaTipoArquivo() {
			
			$tipo = array(png=>'png',jpg=>'jpg',JPG=>'JPG', jpeg=>'jpeg',avi=>'avi',mp4=>'mp4'); //Array com todos os tipos de Arquivos suportados
			$Arquivo = explode(".", $this->getNomeArquivo()); //Essa parte separa a STRINGs em Array, ou seja, isola a string
			
			
			$extensao = end($Arquivo); //Retorna o ultimo valor do array
			
			//echo "Extensao do arquivo".$extensao ."<br/>";
			
			
			if ($extensao == $tipo['png'] || $extensao == $tipo['JPG'] || $extensao == $tipo['jpg'] //Arquivo é o name do FILE
				|| $extensao == $tipo['jpeg'] || $extensao == $tipo['avi'] 
				|| $extensao == $tipo['mp4'] 
				) {
				//Verifica se o tipo de Arquivo colocado é compativel com os suportados pelo sistema
				if($extensao == $tipo['JPG']){
				
						$extensao = $tipo['jpg'];
				}
				$nomeNovo = $this->getUltimoNomeMidiaProduto();
				
				
				$this->setNomeArquivo (md5($nomeNovo).'.'.$extensao);
				
				if ($this->validaTamanhoArquivo()) {
					//Chama o método de validação do tamanho do Arquivo
					
					if ($this->uploadArquivo()){
						//Chama método de upload
						
						if ($this->inserirMidiaProduto()) {
						
							
							return true;
						
						} else{ 
						
						
								
							
							return false;
						
						}
						
					
					} else {
						
						
						return false;
					}
					
					
				}else{
				
					
				}
				
			} else {
				//else do primeiro IF - caso o Arquivo não seja suportado
				
				
				echo "O tipo de Arquivo n&atilde;o &eacute; suportado. Verifique!";
			}
		}
		
		public function validaTamanhoArquivo () {
		
			if ($_FILES['Arquivo']['size'] > 20000) {
				
				
				return true;
			
			} else {
				
				return false;
			}
		}
		
		
		
		public function uploadArquivo () {
			//Método de upload de Arquivo
			
			$nomeArquivo = $this->getNomeArquivo();
			$destinoUpload = "Classes/Imgs/"; //Nome da pasta
			
			//echo "Nome temporario do arquivo: " . $_FILES['Arquivo']['tmp_name'];
			//echo "<br/>Nome da pasta de destino:: " . $destinoUpload.$nomeArquivo;
			
			if (move_uploaded_file($_FILES['Arquivo']['tmp_name'], $destinoUpload.$nomeArquivo)) {
				return true;
			}else{
				echo "<br><br> ERRADO";
				return false;
			}
			
		}
		
		public function inserirMidiaProduto () {
			
			
			
			$nomeFinal = "Classes/Imgs/" . $this->getNomeArquivo();
			
			
			$query = "INSERT INTO midiasprodutos (codigoMidiaProduto,codigoTipoMidia,codigoProduto,dataMidiaProduto,descricaoMidiaProduto,enderecoMidiaProduto,horaMidiaProduto)
					   VALUES ('".$this->getCodigoMidiaProduto()."','".$this->getCodigoTipoMidia()."', '".$this->getCodigoProduto()."', '".$this->getDataMidiaProduto()."', '".$this->getDescricaoMidiaProduto()."', '".$nomeFinal."', '".$this->getHoraMidiaProduto()."');";
		
			//echo $query;
			if (mysql_query($query)) {
				
				return true;
			} else {
				return false;
			}
		}
		
		public function excluirMidiaProduto () {
		
			$query = "DELETE FROM midiasprodutos WHERE codigoMidiaProduto = '".$this->getCodigoMidiaProduto()."'";
			
			//echo $query;
			
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function getUltimoNomeMidiaProduto () {
			
			$query = "SELECT codigoMidiaProduto FROM midiasprodutos ORDER BY codigoMidiaProduto DESC LIMIT 1";
			
			$dados = mysql_query($query) or die (mysql_error());
			
			$linha = mysql_fetch_row ($dados);
			
			return (String) $linha[0] + 1;
			
			
		
		}
		
		public function excluirUpload () {
		
			 $nomeArquivo = $this->getNomeArquivo();
			// echo "Arquivo" . $nomeArquivo;
			//echo "AQUI";
			
		    //$destinoUpload = "Classes/Imgs/"; //Nome da pasta
			
			//$Arquivo = explode(".", $_FILES['Arquivo']['name']); //Essa parte separa o STRINGs em STRINGS, ou seja, isola a string
			
			//$extensao = end($Arquivo); //Retorna o ultimo valor do array
			
			
			if ($this->excluirMidiaProduto()) {
				if (unlink($nomeArquivo)) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
				
					
				
			
		
		}
		
		//METODO PARA LISTAR AS MIDIAS E PARA EXCLUIR A MIDIA DESEJADA
		public function listarMidiasProdutos() {
			
			$query = "SELECT mp.codigoMidiaProduto, p.nomeProduto,tm.descricaoTipoMidia, mp.dataMidiaProduto, mp.enderecoMidiaProduto,mp.descricaoMidiaProduto
			          FROM midiasprodutos mp 
					  INNER JOIN produtos p ON p.codigoProduto = mp.codigoProduto 
					  INNER JOIN tiposmidias tm ON tm.codigoTipoMidia = mp.codigoTipoMidia";
					  
			if ( $dados = mysql_query($query) or die (mysql_error())) {
				
				$numRows = mysql_num_rows($dados);
				
				if ($numRows >= 1) {
				
					while ($array = mysql_fetch_array($dados)) {
					
						//print_r($array['enderecoMidiaProduto']."&w=200&h=150");
						
						echo "<div id=\"mostraProduto\">";
							
							echo "<div class=\"dadosProduto\">";
								echo "<span class=\"nomeProduto\">".$array['nomeProduto']."</span>";
								
								echo "<span class=\"descricaoProduto\">".$array['descricaoMidiaProduto']."</span>";
							echo "</div>";
							
							echo "<div class=\"imgProduto\">";
								
								echo "<img src=image.php?img=".$array['enderecoMidiaProduto']."&w=200&h=150 alt=".$array['nomeProduto']." title=Data:" .$array['dataMidiaProduto']." width=\"200\" height=\"150\">";
								
								echo "<a id=\"botaoExcluir\" title=\"Excluir Imagem\" href=\"administracao.php?p=midiasProdutos-p.php&acao=1&cp=".$array['codigoMidiaProduto']."&en=".$array['enderecoMidiaProduto']."\">Excluir</a>";
							
							echo "</div>";
						echo "</div>";
					
					
					}	
				
				
				
				} else {
				
					echo "<div class=\"infoProdutos\">";
						
						echo "Não há produtos cadastrados no sistema";
					
					echo "</div>";
				
				}
				
				
			}

		}
		
		public function listarImagensBanner () {
			
			$query = "SELECT p.nomeProduto,mp.enderecoMidiaProduto FROM midiasprodutos mp INNER JOIN produtos p ON p.codigoProduto = mp.codigoProduto ORDER BY codigoMidiaProduto DESC LIMIT 4";
			
			$dados = mysql_query($query) or die (mysql_error());
			
			
			
			while ($array = mysql_fetch_array($dados)) {
				
				echo "<img title=".$array['nomeProduto']." src=".$array['enderecoMidiaProduto'].">";
				
			}
			
			
			
		
		}
		
		public function listarImagensGaleria ($pagina) {
			
			$limite = 5; // DEVE SER IGUAL AO MÉTODO "Listar Paginas Produtos"
			
			if ($pagina > 0) {
				
				
				$paginaFinal = ($pagina * $limite) - $limite;
				
				
			
			} else {
				
				$paginaFinal = 0;
				
				
			}
			
			
			
			$consulta = "SELECT mp.codigoProduto , mp.codigoTipoMidia, p.nomeProduto, mp.descricaoMidiaProduto, mp.enderecoMidiaProduto FROM midiasprodutos mp INNER JOIN produtos p ON p.codigoProduto = mp.codigoProduto WHERE mp.codigoProduto = '".$this->getCodigoProduto()."' ORDER BY  mp.horaMidiaProduto DESC LIMIT $paginaFinal, $limite";
			
			//echo $consulta;


			
			$dados = mysql_query ($consulta) or die (mysql_error());
			
			while ($array = mysql_fetch_array($dados)) {
				
				echo "<div id=\"imgGaleria\">";
					
					$titulo = $array['descricaoMidiaProduto'];
					
					echo "<a class=\"html5lightbox\" data-group=\"obras\" data-width=\"800\" data-height=\"600\" title=\"$titulo\" href=".$array['enderecoMidiaProduto'].">";
						
						
						
						if ($array['codigoTipoMidia'] == 3) {
							
							/*echo "<video width=200 height=200 controls>";

								echo "<source src=".$array['enderecoMidiaProduto']." type=\"video/mp4\">";

							echo "</video>";*/
							echo "<img src=\"Imgs/i.png\" width=200 height=200>";


						} else {

							echo "<img src=image.php?img=".$array['enderecoMidiaProduto']."&w=200&h=200 alt=".$array['nomeProduto']."  >";


						}

											
					echo "</a>";
					echo "<p>".$array['descricaoMidiaProduto']."</p>";
				
				
				echo "</div>";
			
			
			
			
			}
		
		
		
		
		}
		
		public function listarPaginasProdutos ($pagina) {
			
			$limite = 5; // DEVE SER IGUAL AO MÉTODO "listarImagensGaleria"
			
			$select  = "SELECT COUNT(mp.codigoProduto) FROM midiasprodutos mp WHERE mp.codigoProduto = '".$this->getCodigoProduto()."'";
			
			$dados = mysql_query($select) or die (mysql_error());
			
			$array = mysql_fetch_array($dados);
			
			$numeroPagina = $array['COUNT(mp.codigoProduto)'] / $limite ; // Divide a quantidade de resultados pelo limite permitido, para saber quantas páginas terão que ser criadas
			
			$numeroPagina = ceil($numeroPagina); // Arredonda o valor
			
			echo "<div id=\"paginacao\">";
			
				if ($pagina != 1) {
					
					echo "<a title=\"Ir para a primeira página\" class=\"firstPage\" href=\"index.php?p=produtosCategoria.php&cat=".$this->getCodigoProduto()."&pag=1\">Primeira</a>";
				
				}
				
				if ($array['COUNT(mp.codigoProduto)'] > $limite) { //Se o numero de registros for maior que o limite, então será necessário fazer a paginação
					
					for ($i = 1 ; $i <= $numeroPagina ; $i++) {
					
						if ($i === $pagina) {
								
							echo "<a title=\"Página ".$i."\" >$i</a>";
							
						} else {
								
								
							echo "<a title=\"Página ".$i."\" class=\"page\" href=\"index.php?p=produtosCategoria.php&cat=".$this->getCodigoProduto()."&pag=".$i."\">$i</a>";
							
						}
						
					
					}	
				
				
				}
				
				
				
				if ($pagina != $numeroPagina) {
					
					
					echo "<a title=\"Ir para a última página\" class=\"lastPage\" href=\"index.php?p=produtosCategoria.php&cat=".$this->getCodigoProduto()."&pag=".$numeroPagina."\">Última</a>";
				
				
				}
				
			echo "</div>";
			
			
			
			
			
			
		
		}
		
		public function nomeCategoria () {
			
			$query = "SELECT nomeProduto FROM produtos WHERE codigoProduto = '".$this->getCodigoProduto()."'";
			
			$dados = mysql_query($query) or die(mysql_error());
			
			$array = mysql_fetch_array($dados);
			
			return $array['nomeProduto'];
		
		}
	
	}
?>