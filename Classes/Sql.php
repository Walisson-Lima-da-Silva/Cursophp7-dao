<?php 

	// A classe Sql vai herdar de PDO. Essa classe sera unicamente destinada para conexoes e funções que seram utilizadas pelo o banco de dados, tudo será centralizado aqui.
	Class Sql extends PDO{

		private $conexao;

		// Metodo generico para passar apenas os parametros e conectar automaticamente no banco de dados.
		public function __construct(){

			$this->conexao = new PDO("mysql:dbname=dbphp7;host=localhost","root","");
		}

		// Setar todos os paremetros que vierem com o banco de dados.
		private function setParametros($queryDeConexao, $parametros = array()){

			foreach ($parametros as $key => $value) {
				$this->setParametro($key, $value);
			}
		}

		// Setar cada paremetro individualmente que vier da função "setParametros(no plural)"
		private function setParametro($queryDeConexao, $chave, $valor){

			$queryDeConexao->bindParam($chave, $valor);
		} 

		//Função para executar todos os comandos SQL.
		public function query($sqlTexto, $parametros = array()){

			$queryConexao = $this->conexao->prepare($sqlTexto);
			$this->setParametros($queryConexao, $parametros);

			$queryConexao->execute();

			return $queryConexao; //Retorna o objeto.
		} 

		//Vai retonar e tratar selects no banco de dados.
		public function select($sqlTexto, $parametros = array()): array
		{

			$queryConexao = $this->query($sqlTexto, $parametros);

			return $queryConexao->fetchAll(PDO::FETCH_ASSOC);// "PDO::FETCH_ASSOC" serve para trazer apenas os dados associativos, sem indexes.
		}

	}


?>