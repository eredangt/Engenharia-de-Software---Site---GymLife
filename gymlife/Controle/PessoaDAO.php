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
		
		public function atualizarPessoa($cpf, $nome, $telefone, $email, $dataNasc, $senha, $cargo, $codigo, $con){
			$sql = "UPDATE Pessoa SET 	CPF = '".$cpf."',
										Nome = '".$nome."',
										Telefone = '".$telefone."',
										E_MAIL = '".$email."',
										Data_nascimento = '".$dataNasc."',
										Senha = '".$senha."',
										Tipo_cargo = '".$cargo."'
					WHERE idPessoa = '".$codigo."';
			";
			$resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultado == true){
				echo 'Alterada a pessoa.';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}
		
		public function excluirPessoa($codigo, $con){
			//criar a string sql que exclui o usuario do banco de dados
			$sql = "DELETE FROM Pessoa WHERE idPessoa=".$codigo.";";

			//executa o comando DELETE no banco de dados para o usuario que tem
			//aquele codigo especifico
			$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

			//avaliando o resultado
			if ($resultado == true){
				echo 'Excluída a Pessoa';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa excluída com sucesso");
								window.location.replace("listarpessoas.php");
						</SCRIPT>';*/
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="menu.php"> MENU </a>';
			}
		}
		
	}
	
?>
