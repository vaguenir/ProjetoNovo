<?php


	class MidiaObra{
	
		private $codigoMidiaObra;
		private $codigoObra;
		private $codigoTipoMidia;
		private $enderecoMidiaObra;
		private $nomeArquivo;
		
		
		
		public function __construct ($codigoMidiaObra , $codigoObra = 0, $codigoTipoMidia = 0, $nomeArquivo = 0, $enderecoMidiaObra = 0){
		
			$this->setCodigoMidiaObra($codigoMidiaObra);
			$this->setCodigoObra($codigoObra);
			$this->setCodigoTipoMidia($codigoTipoMidia);
			$this->setEnderecoMidiaObra($enderecoMidiaObra);
			$this->setNomeArquivo($nomeArquivo);
		
		}
		
		public function getCodigoMidiaObra () {
			
			return $this->codigoMidiaObra;	
		}
	
		public function getCodigoObra () {
	
			return $this->codigoObra;
		}
	
		public function getCodigoTipoMidia () {
	
			return $this->codigoTipoMidia;
		}
		public function getEnderecoMidiaObra () {
	
			return $this->enderecoMidiaObra;
		}
		
		public function getNomeArquivo () {
			return $this->nomeArquivo;
		}
		
		//================================================================================================================================================
		//================================================================================================================================================
		//================================================================================================================================================
		
		public function setCodigoMidiaObra($codigoMidiaObra){
		
			$this->codigoMidiaObra = $codigoMidiaObra;
		
		}
		
		public function setCodigoObra($codigoObra){
		
			$this->codigoObra = $codigoObra;
		
		}
		
		public function setCodigoTipoMidia($codigoTipoMidia){
		
			$this->codigoTipoMidia = $codigoTipoMidia;
		
		}
		
		public function setEnderecoMidiaObra($enderecoMidiaObra){
		
			$this->enderecoMidiaObra = $enderecoMidiaObra;
		
		}
		
		public function setNomeArquivo($nomeArquivo) {
			
			$this->nomeArquivo = $nomeArquivo; 
			
		}
		
		//=========================================================================================================================================
		//=========================================================================================================================================
		//=========================================================================================================================================
		
		public function selecionarObra(){
		
		
			$query = "SELECT codigoObra ,descricaoObra FROM obras";
			
			if ($dados = mysql_query($query)) {
			
				echo "<select name=\"codigoObra\">";
				
				echo "<option value=\"\">Selecionar</option>";
			
				while ($array = mysql_fetch_array($dados)) {
				
					echo "<option value=\"".$array['codigoObra']."\">".$array['descricaoObra']."</option>";
				}
			}
			
				echo "</select>";
				
		}
		
		public function selecionarTipoMidia() {
		
			$query = "SELECT codigoTipoMidia,descricaoTipoMidia FROM tiposmidias";
			
			if ($dados = mysql_query($query)) {
				
				echo "<select name=\"codigoTipoMidia\">";
				
				echo "<option value=\"\">Selecionar</option>";
				
				while ($array = mysql_fetch_array($dados)) {
				
					echo "<option value=\"".$array['codigoTipoMidia']."\">".$array['descricaoTipoMidia']."</option>";
				}
				
				echo "</select>";
			}
			
			
		}
		
		
		//================================= COMEÇA PARTE DO UPLOAD ===============================================================
		public function validaTipoArquivo() {
			
			$tipo = array(png=>'png',gif=>'gif',jpg=>'jpg', jpeg=>'jpeg',avi=>'avi',rmvb=>'rmvb', mp4=>'mp4', mp3=>'mp3', bmp=>'bmp'); //Array com todos os tipos de Arquivos suportados
			$Arquivo = explode(".", $this->getNomeArquivo()); //Essa parte separa a STRINGs em Array, ou seja, isola a string
			
			//echo "AIAIAIAAI " . $Arquivo;
			
			//echo "O Arquivo é " . $Arquivo . "</br>";
			$extensao = end($Arquivo); //Retorna o ultimo valor do array
						
			//echo "Extensao do arquivo ". $extensao ."<br/>";
			if ($extensao == $tipo['png'] || $extensao == $tipo['jpg'] //Arquivo é o name do FILE
				|| $extensao == $tipo['jpeg'] || $extensao == $tipo['3gp'] 
				|| $extensao == $tipo['mp4'] 
				|| $extensao == $tipo['bmp']) {
				//Verifica se o tipo de Arquivo colocado é compativel com os suportados pelo sistema
				
				$novoNome = $this->getUltimoNomeMidiaObra();
				
				$this->setNomeArquivo(md5($novoNome).".".$extensao);
				
				if ($this->validaTamanhoArquivo()) {
					//Chama o método de validação do tamanho do Arquivo
					
					if ($this->uploadArquivo()) {
						
						
						
						//Chama método de upload
						if ($this->inserirMidiaObra()) {
						
							
							return true;
						
						} else {
							
							
							return false;
						
						}
						
					
					} else {
					
						
						return false;
					}
					
					
				}
				
			} else {
				//else do primeiro IF - caso o Arquivo não seja suportado
				echo "O tipo de Arquivo n&atilde; &ecute; suportado. Verifique!";
				
				
			}
		}
		
		public function validaTamanhoArquivo () {
			
			
			if ($_FILES['Arquivo']['size'] < 20000000) {
				
				
				return true;
			
			} else {
				
				return false;
			}
		}
		
		public function getUltimoNomeMidiaObra () {
		
			$query = "SELECT codigoMidiaObra FROM midiasobras ORDER BY codigoMidiaObra DESC LIMIT 1";
			
			$dado = mysql_query ($query) or die (mysql_error());
			
			$linha = mysql_fetch_row ($dado);

			return (String) $linha[0] + 1;
		
		}
		
		
		
		public function uploadArquivo () {
			//Método de upload de Arquivo
			
			$nomeArquivo = $this->getNomeArquivo();
			$destinoUpload = "Classes/Obras/"; //Nome da pasta
			
			//echo "Nome temporario do arquivo:" . $_FILES['Arquivo']['tmp_name'];
			//echo "<br/>Nome da pasta de destino::" . $destinoUpload . "/" . $nomeArquivo;
		
			if (move_uploaded_file( $_FILES['Arquivo']['tmp_name'], $destinoUpload.$nomeArquivo)) {
				return true;
			} else {
				
				return false;
			}
			
		}
		
		public function inserirMidiaObra () {
			
			$nomeFinal = "Classes/Obras/" . $this->getNomeArquivo();
			
			$query = "INSERT INTO midiasobras (codigoMidiaObra,codigoObra,codigoTipoMidia,enderecoMidiaObra) VALUES ('".$this->getCodigoMidiaObra()."', '".$this->getCodigoObra()."', '".$this->getCodigoTipoMidia()."', '".$nomeFinal."');";
			
			//echo "TIPO DE MIDIDA" . $this->getCodigoTipoMidia();
			
			//echo $query;
			
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		
		}
		
		public function excluirMidiaObra () {
		
			$query = "DELETE FROM midiasobras WHERE codigoMidiaObra = '".$this->getCodigoMidiaObra()."'";
			
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function excluirUpload () {
		
			 $nomeArquivo = $this->getNomeArquivo();
			// echo "Arquivo" . $nomeArquivo;
			//echo "AQUI";
			
		    //$destinoUpload = "Classes/Imgs/"; //Nome da pasta
			
			//$Arquivo = explode(".", $_FILES['Arquivo']['name']); //Essa parte separa o STRINGs em STRINGS, ou seja, isola a string
			
			//$extensao = end($Arquivo); //Retorna o ultimo valor do array
			
			
			if ($this->excluirMidiaObra()) {
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
		public function listarMidiasObras() {
		
			$query = "SELECT mo.codigoMidiaObra, o.descricaoObra,tm.descricaoTipoMidia, mo.enderecoMidiaObra
			          FROM midiasobras mo 
					  INNER JOIN obras o ON o.codigoObra = mo.codigoObra 
					  INNER JOIN tiposmidias tm ON tm.codigoTipoMidia = mo.codigoTipoMidia";
					  
			if ( $dados = mysql_query($query) or die (mysql_error())) {
				
				while ($array = mysql_fetch_array($dados)) {
						
					echo "<div id=\"mostraProduto\">";
						echo "<div class=\"dadosProduto\">";
							echo "<span class=\"nomeProduto\">".$array['descricaoObra']."</span>";
							
							echo "<span class=\"descricaoProduto\">".$array['descricaoTipoMidia']."</span>";
						echo "</div>";
						
						echo "<div class=\"imgProduto\">";
							
							echo "<img src =image.php?img=".$array['enderecoMidiaObra']."&w=200&h=150 width=\"200\" height=\"150\" alt=".$array['nomeObra'].">";
							
							echo "<a id=\"botaoExcluir\" title=\"Excluir Imagem\" href=\"MidiasObras-p.php?acao=1&cp=".$array['codigoMidiaObra']."&en=".$array['enderecoMidiaObra']."\">Excluir</a>";
						
						echo "</div>";
					echo "</div>";
					
					
				}
			}

		}
	
		
		public function listarObrasGaleria ($pagina) {
			
			$limite = 4;
			
			if ($pagina > 0) {
			
				$paginaFinal = ($pagina * $limite) - $limite;
			
			} else {
			
				$paginaFinal = 0;
				
			}
		
			$query = "SELECT o.codigoObra , mo.enderecoMidiaObra ,COUNT(mo.codigoObra), o.descricaoObra FROM obras o INNER JOIN midiasobras mo ON mo.codigoObra = o.codigoObra GROUP BY o.codigoObra DESC LIMIT $paginaFinal,$limite";
			
			//echo $query;
			
			$dados = mysql_query ( $query ) or die (mysql_error());
			
			$linhas = mysql_num_rows ($dados);
			
			if ($linhas > 0) {
				
				while ($array = mysql_fetch_array($dados)) {
				
				
					echo "<div id=\"catObra\">";
					
						echo "<div title=\"Há ".$array['COUNT(mo.codigoObra)']." fotos para essa obra\" id=\"numeroObras\">".$array['COUNT(mo.codigoObra)']."</div>";
						
						
						echo "<a class=\"linkCatObra\" title=\" Listar as fotos dessa obra \" href=index.php?p=galeriaObras&ob=".$array['codigoObra'].">".$array['descricaoObra']."</a>";
						
						
						echo "<div id=\"imgCatObra\">";
						
							echo "<a href=\"index.php?p=galeriaObras.php&ob=".$array['codigoObra']." \" >";
							
								echo "<img height=\"200\" width=\"340\" src=image.php?img=".$array['enderecoMidiaObra']."&w=340&h=200 alt=\"Img\" />";
							
							echo "</a>";
						
						
						echo "</div>";
						
					
					echo "</div>";
				
				
				}
			
			
			} else {
				
				echo "NÃO HÁ OBRAS CADASTRADAS NO SISTEMA";
			
			
			}
					
		
		}
		
		
		public function listarPaginasObras($pagina) {
		
			$limite = 4;
		
			$query = "SELECT COUNT(o.codigoObra) FROM obras o";
			//echo $query;
			
			$dados = mysql_query($query) or die (mysql_error());
			
			$array = mysql_fetch_array($dados);
			
			$numeroPagina = $array['COUNT(o.codigoObra)'] / $limite; //Divide a quantidade de obras pelo limite, para ver quantas paginas serão criadas
			
			//echo $array['COUNT(o.codigoObra)'];
			
			$numeroPagina = ceil($numeroPagina);
			
			echo "<div id=\"paginacao\">";
			
				if ($pagina != 1) {
				
					echo "<a title=\"Ir para a primeira página\" class=\"firstPage\" href=\"index.php?p=obras.php&pag=1\">Primeira</a>";
				}
				
				if ($array['COUNT(o.codigoObra)'] > $limite) { //Se o array for maior que o limite, é necessário fazer paginação
				
					for ($i = 1; $i <= $numeroPagina; $i++) {
					
						if ($i === $pagina) {
						
							echo "<a title=\"Página ".$i."\">".$i."</a>";
						} else {
						
							echo "<a title=\"Página ".$i."\" class=\"page\" href=\"index.php?p=obras.php&pag=".$i."\">$i</a>";
						}
					
					}
				
				
				}
				
				
				if ($pagina != $numeroPagina) {
				
					echo "<a title=\"Ir para a última página\" class=\"lastPage\" href=\"index.php?p=obras.php&pag=".$numeroPagina."\">Última página</a>";
				}
			
			echo "</div>";
			
		
		}
		
		

		public function listarImgsObras ($pagina) {
		
			$limite = 6; // DEVE SER IGUAL AO MÉTODO "Listar Paginas Produtos"
			
			if ($pagina > 0) {
				
				
				$paginaFinal = ($pagina * $limite) - $limite;
				
				
			
			} else {
				
				$paginaFinal = 0;
				
				
			}


			$query = "SELECT mo.enderecoMidiaObra , o.descricaoObra FROM midiasobras mo INNER JOIN obras o ON o.codigoObra = mo.codigoObra  WHERE mo.codigoObra = '".$this->getCodigoObra()."' ORDER BY mo.codigoMidiaObra DESC LIMIT $paginaFinal,$limite "; 

			$dados = mysql_query($query) or die(mysql_error());

			while ($array = mysql_fetch_array($dados)) {
				
				
				echo "<div id=\"imgGaleria\">";

					$title = $array['descricaoObra'];

					echo "<a class=\"html5lightbox\" data-group=\"obras\" data-width=\"800\" data-height=\"600\" title=\"$title\" href=".$array['enderecoMidiaObra'].">";

						echo "<img height=\"200\" width=\"200\" src=image.php?img=".$array['enderecoMidiaObra']."&w=200&h=200 alt=\"Img\" />";


					echo "</a>";

				echo "</div>";
				

				
			}

		}
		
		public function listarPaginasGaleriaObra($pagina) {
			
			$limite = 6;
		
			$query = "SELECT COUNT(mo.codigoObra) FROM midiasobras mo WHERE mo.codigoObra = '".$this->getCodigoObra()."'";
			
			$dados = mysql_query($query) or die (mysql_error());
			
			$array = mysql_fetch_array($dados);
			
			$numeroPagina = $array['COUNT(mo.codigoObra)'] / $limite; //Divide a quantidade de obras pelo limite, para ver quantas paginas serão criadas
			
			$numeroPagina = ceil($numeroPagina);
			
			echo "<div id=\"paginacao\">";
			
				if ($pagina != 1) {
				
					echo "<a title=\"Ir para a primeira página\" class=\"firstPage\" href=\"index.php?p=galeriaObras.php&ob=".$this->getCodigoObra()."&pag=1\">Primeira</a>";
				}
				
				if ($array['COUNT(mo.codigoObra)'] > $limite) { //Se o array for maior que o limite, é necessário fazer paginação
				
					for ($i = 1; $i <= $numeroPagina; $i++) {
					
						if ($i === $pagina) {
						
							echo "<a title=\"Página ".$i."\">".$i."</a>";
						} else {
						
							echo "<a title=\"Página ".$i."\" class=\"page\" href=\"index.php?p=galeriaObras.php&ob=".$this->getCodigoObra()."&pag=".$i."\">$i</a>";
						}
					
					}
				
				
				}
				
				
				if ($pagina != $numeroPagina) {
				
					echo "<a title=\"Ir para a última página\" class=\"lastPage\" href=\"index.php?p=galeriaObras.php&ob=".$this->getCodigoObra()."&pag=".$numeroPagina."\">Última página</a>";
				}
			
			echo "</div>";
			
			
		
		}


		public function nomeObra () {

			$query = "SELECT o.descricaoObra FROM obras o WHERE o.codigoObra = '".$this->getCodigoObra()."'";

			//echo "$query";

			$dados = mysql_query($query) or die(mysql_error());

			$linha = mysql_fetch_row($dados);

			return $linha[0];

		}
		
		
		
		
		
	
	
	
	
	
	
	}
?>