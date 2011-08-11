<?

	class Pagina{
		private $titulo;
		private $palavras_chaves;
		private $nomeArquivo;
		private $descricao;
		private $avisos = ""; 
		private $advertencias = "";

		public function __construct($nomeArquivo, $titulo, $palavras_chaves = "", $descricao = ""){
			session_start();
			ConectaDB();

			$this->identificaUsuario();
			
			$this->nomeArquivo = $nomeAsrquivo;
			$this->titulo = $titulo;
			$this->palavras_chaves = $palavras_chaves;
			$this->descricao = $descricao;

			if(!$this->isPermitido()){
				header('Location: sem_permissao.php');
			}
		}
/*******************      SETs  *********************/



/*******************      GETs  *********************/
		public function getTitulo(){
			return $this->titulo;
		}
		public function getPalavras_chaves(){
			return $this->palavras_chaves;
		}
		public function getNomeArquivo(){
			return $this->nomeArquivo;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function getAvisos(){
			return $this->avisos;
		}
		public function getAdvertencias(){
			return $this->advertencias;
		}
/*******************      USER SESSION  *********************/	
		public function getUsuario(){
			return $_SESSION["usuario_S"];
		}
		public function setUsuario($usuario){
			$_SESSION["usuario_S"] = $usuario;
		}
		public function identificaUsuario(){
			if(!isset($_SESSION["usuario_S"]))
				$this->setUsuario(new Usuario());
		}
		public function userLogado(){
			if($this->getUsuario()->getIdGrupo() == 1)
				return false;
			else
				return true;
		}
/*******************      FUNCOES  *********************/
		public function addAviso($aviso){
			$this->avisos .= "$aviso<br>";
		}
		public function addAdvertencia($advertencia){
			$this->advertencias .= "$advertencia<br>";
		}
		
		public function temAvisos(){
			if($this->avisos == "")
				return false;
			else
				return true;
		}
		public function temAdvertencias(){
			if($this->advertencias == "")
				return false;
			else
				return true;
		}
		public function isPermitido(){
			return true;
			$usu = $this->getUsuario();

			$sql = "SELECT * FROM `permissao_grupo`, `paginas_menu`, `grupos` 
			WHERE `permissao_grupo`.`id_pag_FK` = `paginas_menu`.`id_pag` AND `paginas_menu`.`caminho_pag` = '".$this->getNomeArquivo()."' AND `permissao_grupo`.`id_gru_fk` = `grupos`.`id_gru`
			AND `grupos`.`nome_gru` = '".$usu->getIdGrupo()."'";
			
			$res = mysql_query($sql) or die(mysql_error());
			
			if(mysql_num_rows($res) != 1)
				return false;

			return true;
		}

	}
?>
