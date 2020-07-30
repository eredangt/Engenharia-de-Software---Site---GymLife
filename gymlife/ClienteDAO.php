<?php
	// Persistence
	include_once('../Modelo/Cliente.php');
	include_once('../Modelo/Pessoa.php');
	class ClienteDAO{
		
		public function __construct(){}
		
		public function addCliente($cliente, $con, $pegaCPF){
			
			$sql = "SELECT idPessoa FROM PESSOA WHERE CPF ='".$pegaCPF."';"; 
			$tabela = mysqli_query($con,$sql) or die(mysqli_error($con));
						
			$COD_Cliente='';	
						
			while($linha = mysqli_fetch_row($tabela)){
				$COD_Cliente= $linha[0];
			}	
			
			$sql = "INSERT INTO Cliente(Pessoa_idPessoa,PLANO_idPlano)
					VALUES('".$COD_Cliente."','".$cliente->getPlano()."');";
			
			echo $sql; 
			$resultadoC = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoC == true){
				echo 'Cliente cadastrado.';
			}else{
				echo 'Algo ocorreu: ' . mysqli_error($con);
			}
		}
	}
?>
