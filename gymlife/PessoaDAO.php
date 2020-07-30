<?php
	// Persistence
	class PessoaDAO{
		
		public function __construct(){}
		
		public function teste($pessoa){
			echo $pessoa->getNome();
		}
		public function addPessoa($pessoa, $con){
			$sql = "INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, senha, Tipo_cargo)
			  VALUES('".$pessoa->getCPF()."','".$pessoa->getNome()."','".$pessoa->getTelefone()."','".$pessoa->getEmail()."','".$pessoa->getDataNascimento()."','".$pessoa->getSenha()."','".$pessoa->getCargo()."');";
			echo $sql; 
			$resultadoP = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoP == true){
				echo 'Cadastrada pessoa.';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}
		
	}
	
?>
