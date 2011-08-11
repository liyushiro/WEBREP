<?

	class Usuario{
		private $idUsuario;
		private $nomeUsuario;
		private $idGrupo;
 
		public function __construct($idUsuario=0, $nomeUsuario="Internauta", $idGrupo=1){
			$this->idUsuario = $idUsuario;
			$this->nomeUsuario = $nomeUsuario;
			$this->idGrupo = $idGrupo;
		}

		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function getNomeUsuario(){
			return $this->nomeUsuario;
		}
		public function getIdGrupo(){
			return $this->idGrupo;
		}

		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
		public function setNomeUsuario($nomeUsuario){
			$this->nomeUsuario = $nomeUsuario;
		}
		public function setIdGrupo($idGrupo){
			$this->idGrupo = $idGrupo;
		}
	}
?>
