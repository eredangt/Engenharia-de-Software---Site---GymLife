<?php
	require('phpConexaoBD.php'); 
	session_start();
	
	if ($_SESSION['cargo'] == 'instrutor'){
		$codigo = $_GET['codigo'];

		//criar a string sql que exclui o usuario do banco de dados
		$sql = "DELETE FROM Pessoa WHERE idPessoa=".$codigo.";";

		//executa o comando DELETE no banco de dados para o usuario que tem
		//aquele codigo especifico
		$resultado = mysqli_query($conexao, $sql);

		//avaliando o resultado
		if ($resultado == true){
			echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Pessoa excluída com sucesso");
							window.location.replace("listarpessoas.php");
					</SCRIPT>';
		}else{
			echo 'Problema ao apagar o registro no banco de dados <br>';
			echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
			echo '<a href="menu.php"> MENU </a>';
		}
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("menu.php");
			  </SCRIPT>';
	}
	
?>
