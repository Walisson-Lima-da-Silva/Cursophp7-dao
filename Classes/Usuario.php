<?php 

	// Interessante criar uma classe generica que vai conter todos os metodos de um banco de dados("sql") e outras classes somente para algumas tabelas, deixando tudo centralizado em lugar só.
	class Usuario {

		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($valor){
			$this->idusuario = $valor;
		}


		public function getDeslogin(){
			return $this->deslogin;
		}

		public function setDeslogin($valor){
			$this->deslogin = $valor;
		}


		public function getDessenha(){
			return $this->dessenha;
		}

		public function setDessenha($valor){
			$this->dessenha = $valor;
		}


		public function getDtcadastro(){
			return $this->dtcadastro;
		}

		public function setDtcadastro($valor){
			$this->dtcadastro = $valor;
		}


		public function buscarDados($id){

			//Instanciar a conexão
			$conectar = new Sql();

			//Fazer o select retornar em uma variavel.
			$resultado = $conectar->select("SELECT * FROM tb_usuarios where idusuario = :ID", array(
				":ID"=>$id
			));

			if (count($resultado) > 0 ){ // Retornar o resultado da pesquisa e instanciar as variaveis.

				$coluna = $resultado[0];

				$this->setIdusuario($coluna['idusuario']);
				$this->setDeslogin($coluna['deslogin']);
				$this->setDessenha($coluna['dessenha']);
				$this->setDtcadastro(new DateTime($coluna['dtcadastro']));

			}
		}

		public function __toString(){ //Função para quando o objeto ser instanciado e chamado pelo echo apresentar tudo que estivar feito aqui

			return json_encode(array (

				"Sequencial"=>$this->getIdusuario(),
				"Usuario"=>$this->getDeslogin(),
				"Senha"=>$this->getDessenha(),
				"Data"=>$this->getDtcadastro()->format('d/m/y H:i:s')
			));



		}

	}

?>