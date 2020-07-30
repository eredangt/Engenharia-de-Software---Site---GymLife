<?php
	// Modelo
	class Pessoa{
		private $cpf;
		private $nome;
		private $telefone;
		private $email;
		private $dataNascimento;
		private $senha;
		private $cargo;

		public function __construct($umCpf,	$umNome, $umTelefone, $umEmail, $umaDataNascimento, $umaSenha, $umCargo){
			$this->cpf = $umCpf;
			$this->nome = $umNome;
			$this->telefone = $umTelefone;
			$this->email = $umEmail;
			$this->dataNascimento = $umaDataNascimento;
			$this->senha = $umaSenha;
			$this->cargo = $umCargo;
		}

		public function getCPF(){
			return $this->cpf;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getDataNascimento(){
			return $this->dataNascimento;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function getCargo(){
			return $this->cargo;
		}
	}
	/*
	class Instrutor extends Pessoa {

		private $idInstrutor;
		private $salario;
		private $cargaHoraria;
		private $imagemInstrutor;

		public function __construct($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo, $umaId, $umSalario, $umaCH, $umaImagem){
			parent::__construct($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo);
			$this->idInstrutor = $umaId;
			$this->salario = $umSalario;
			$this->cargaHoraria = $umaCH;
			$this->imagemInstrutor = $umaImagem;
		}

		public function getIdInstrutor(){
			return $this->idInstrutor;
		}

		public function getSalario(){
			return $this->salario;
		}

		public function getCH(){
			return $this->cargaHoraria;
		}

		public function getImagem(){
			return $this->imagemInstrutor;
		}

	}*/
	/*
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

	}*/
	// Nos arquivos que precisam de conectar com o BD
	#$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC); // PARA CLIENTE
	#$c = new Cliente($COD_Cliente, $planoC);
	#$p = new Pessoa($cpfI, $nomeI, $telefoneI, $emailI, $dataNascI, $senhaI); // PARA INSTRUTOR
	#$i = new Instrutor($COD_Instrutor, $salarioI, .$cargaHI, $uploadfile);
?>
