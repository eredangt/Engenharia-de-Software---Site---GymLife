<?php
	// Persistence
	class ClienteDAO{
		
		public function __construct(){}
		
		public function addCliente($cliente, $con){
			/*
			$sql = "INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, senha, Tipo_cargo)
			  VALUES('".$cliente->getCPF()."','".$cliente->getNome()."','".$cliente->getTelefone()."','".$cliente->getEmail()."','".$cliente->getDataNascimento()."','".$cliente->getSenha()."','".$cliente->getCargo()."');";
			echo $sql; 
			$resultadoP = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoP == true){
				echo 'Cadastrada pessoa.';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
			
			$sql="SELECT idPessoa FROM PESSOA WHERE CPF ='".$cliente->getCPF()."';"; 
			$tabela=mysqli_query($con,$sql) or die(mysqli_error($con));			
										
			while($linha=mysqli_fetch_row($tabela)){
				$COD_Cliente= $linha[0];
			}	
			*/
			$sql = "INSERT INTO Cliente(cpf,Nome,Telefone,E_MAIL, Data_nascimento, Senha, Tipo_cargo, PLANO_idPlano)
			VALUES('".$cliente->getCPF()."','".$cliente->getNome()."','".$cliente->getTelefone()."',
			'".$cliente->getEmail()."','".$cliente->getDataNascimento()."','".$cliente->getSenha()."',
			'".$cliente->getCargo()."','".$cliente->getPlano()."');";

			$resultadoC = mysqli_query($con,$sql);
			
			//$sql = "INSERT INTO Cliente($cliente->getIdCliente(), $cliente->getPlano())
			  //VALUES('".$pessoa->getCPF()."','".$pessoa->getNome()."','".$pessoa->getTelefone()."','".$pessoa->getEmail()."','".$pessoa->getDataNascimento()."','".$pessoa->getSenha()."','".$pessoa->getCargo()."');";
			echo $sql; 
			$resultadoC = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoC == true){
				echo 'Cliente cadastrado.';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}
		
		
	}
	
	/*class Instrutor extends Pessoa {
		private $idInstrutor;
		private $salario;
		private $cargaHoraria;
		private $imagemInstrutor;
		
		public function __construct($umaId, $umSalario, $umaCH, $umaImagem){
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
		
	}
	
	class Cliente extends Pessoa {
		private $idCliente;
		private $plano;
		
		public function __construct($umaIdC, $umPlano){
			$this->idCliente = $umaIdC;
			$this->plano = $umPlano;
		}
		
		public function getIdCliente(){
			return $this->idCliente;
		}
		
		public function getPlano(){
			return $this->plano;
		}
		
	}*/
	// Nos arquivos que precisam de conectar com o BD - CONTROLLER
	#$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE
	#$c = new Cliente($COD_Cliente, $planoC);
	#$pessoaDAO = new PessoaDAO();
	#$pessoaDAO = cadastrarPessoa($p);
	#$p = new Pessoa($cpfI, $nomeI, $telefoneI, $emailI, $dataNascI, $senhaI, $cargo); // PARA INSTRUTOR
	#$i = new Instrutor($COD_Instrutor, $salarioI, .$cargaHI, $uploadfile);
?>
