<?
//INACABADO...
	class Paginacao{
		private $sqlPedaco;
		private $sqlSelect;
		private $sqlCount;
		private $sqlCompleto;
		private $numPaginaAtual;
		private $qtdPaginas;
		private $qtdRegistrosPagina;
		private $totalRegistros;
		
		public function __construct($sqlPedaco, $quantidade_registros){
			
			$this->sqlPedaco = $sqlPedaco;
			$this->qtdRegistrosPagina = $qtdRegistros;
			$this->constuirSqlCompleto();
			$this->totalRegistros = getAtrQuery(mysql_num_rows(mysql_query($this->sqlCompleto)));
			
			
			$this->validaNumPagina();
		}
/*******************      FUNCTIONS  *********************/
		public function getSqlCompleto(){
			$numPagina = get("n_p");
			if($numPagina == "")
				$numPagina = 0;

			
		}
		
		public function getNumeroPagina(){
			$numPagina = get("n_p");
			if($numPagina == "")
				$numPagina = 0;

			validaNumPagina();
		}
	}
?>
