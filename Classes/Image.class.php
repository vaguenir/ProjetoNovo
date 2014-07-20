<?php

	
	class Image {
	
		private $nomeImagem;
		private $alturaImagem;
		private $larguraImagem;
		private $extensaoImagem;
		private $imagem;


		public function __construct ($nomeImagem , $larguraImagem ,$alturaImagem ) {

			$this->setNomeImagem($nomeImagem);

			$this->setAlturaImagem($alturaImagem);

			$this->setLarguraImagem($larguraImagem);

			$this->setExtensaoImagem($nomeImagem);


		}


		public function getNomeImagem (){

			return $this->nomeImagem;

		}


		public function getAlturaImagem () {

			return $this->alturaImagem;


		}

		public function getLarguraImagem () {


			return $this->larguraImagem;

		}

		public function getExtensaoImagem () {

			return $this->extensaoImagem;

		}

		public function getImagem () {

			return $this->imagem;

		}

		public function setNomeImagem ($nomeImagem) {

			$this->nomeImagem = $nomeImagem;


		}

		public function setAlturaImagem ($alturaImagem) {

			$this->alturaImagem = $alturaImagem;

		}


		public function setLarguraImagem ($larguraImagem) {

			$this->larguraImagem = $larguraImagem;

		} 

		public function setExtensaoImagem ($nomeImagem) {

			$extensao = explode('.', $nomeImagem);

			$this->extensaoImagem = end($extensao);

		} 

		public function setImagem ($imagem) {

			$this->imagem = $imagem;

		}


		public function CriarImagem () {

			switch ($this->getExtensaoImagem()) {
				
				case 'jpg':
					
					$this->criarJpg();



					break;

				case 'png':
					$this->criarPng();

					break;
				
				
				case 'gif':
					$this->criarGif();
					break;				
				default:
					return false;
					break;
			}



		}


		public function criarJpg () {

			$src = $this->getNomeImagem();

			$this->setImagem(imagecreatefromjpeg($src));


		}


		public function criarPng () {

			$src = $this->getNomeImagem();

			$this->setImagem(imagecreatefrompng($src));
			

		}

		public function criarGif () {

			$src = $this->getNomeImagem();

			$this->setImagem(imagecreatefromgif($src));

		}


		public function RedimensionarImg () {
			

			$tmp_img = imagecreatetruecolor($this->getLarguraImagem(), $this->getAlturaImagem());


			$size = getimagesize($this->getNomeImagem());

			imagecopyresampled($tmp_img, $this->getImagem() ,  0 , 0, 0, 0, $this->getLarguraImagem(), $this->getAlturaImagem(), $size[0], $size[1]);

			imagedestroy($this->getImagem());


			return $tmp_img;


		}


		public function ExibirImagem ($img) {

			switch ($this->getExtensaoImagem()) {
				case 'jpg':
					imagejpeg($img);
					imagedestroy($img);
					break;
				
				case 'png':
					imagepng($img);
					imagedestroy($img);
					break;


				case 'gif':
					imagegif($img);
					imagedestroy($img);
					break;

				
			}


		}


		public function RetornarMime () {
			
			$dados = getimagesize($this->getNomeImagem());

			return $dados[mime];


		}










	}



?>