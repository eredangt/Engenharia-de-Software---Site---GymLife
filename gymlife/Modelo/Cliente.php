<?php
	include_once '../Modelo/Pessoa.php';
	class Cliente extends Pessoa {
		private $idCliente;
		private $plano;
		
		public function __construct($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo, $umPlano){
			parent::__construct($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo);
			//$this->idCliente = $umaIdC;
			$this->plano = $umPlano;
		}
		
		public function getIdCliente(){
			return $this->idCliente;
		}
		
		public function getPlano(){
			return $this->plano;
		}
		
	}

?>
