<?php
	require('phpConexaoBD.php');
	session_start();
	if($_SESSION['cargo'] == 'instrutor'){
		
		$codigo='';
		$codigo = $_POST['hddCodigo'];
		
		// Variaveis de consulta
		$resultadoC = '';
		$resultadoI = '';
		
		$cargo = $_POST['selecao']; // Cargo: C ou I
		$COD_Cliente = '';
		$COD_Instrutor = '';
		$imagemI = '';

		// Valores coletados pelo formulário para CLIENTE
		$cpfC = $_POST['txtCPFPessoaC']; // CPF 
		$nomeC = $_POST['txtNomeC']; // Nome
		$telefoneC = $_POST['txtTelC']; // Telefone
		$emailC = $_POST['txtEmailC']; // Email
		$dataNascC = $_POST['txtDataC']; // Data de Nascimento
		$senhaC = $_POST['senhaPessoaC']; // Senha
		$planoC = $_POST['selecaoPlanoC']; // Plano adquirido	
		
		// Valores coletados pelo formulário para INSTRUTOR
		$cpfI = $_POST['txtCPFPessoaI']; // CPF 
		$nomeI = $_POST['txtNomeI']; // Nome
		$telefoneI = $_POST['txtTelI']; // Telefone
		$emailI = $_POST['txtEmailI']; // Email
		$dataNascI = $_POST['txtDataI']; // Data de Nascimento
		$senhaI = $_POST['senhaPessoaI']; // Senha
		$salarioI = $_POST['txtSalarioI']; // Salario
		$cargaHI = $_POST['txtHorariaI']; // Carga Horaria
		$imagemI = $_FILES['image']; // Imagem Instrutor

		if($cargo == 'C'){

			$sql = "UPDATE Pessoa SET 	CPF = '".$cpfC."',
										Nome = '".$nomeC."',
										Telefone = '".$telefoneC."',
										E_MAIL = '".$emailC."',
										Data_nascimento = '".$dataNascC."',
										Senha = '".$senhaC."',
										Tipo_cargo = '".$cargo."'
					WHERE idPessoa = '".$codigo."';
			";
			$resultado = mysqli_query($conexao,$sql);
			
			$sql = "UPDATE Cliente SET 	PLANO_idPlano = '".$planoC."'
					WHERE Pessoa_idPessoa = '".$codigo."';
			";		

			$resultadoC = mysqli_query($conexao,$sql);
				
				
			// VERIFICA SE TUDO DEU CERTO
			if ($resultadoC == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Cliente alterado com sucesso!");
							window.location.replace("menu.php");
					</SCRIPT>';       
			}else{
				echo '<script>alert("Problema ao alterar CLIENTE no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
				echo '<a href="menu.php"> VOLTAR </a>';
			}
			
		}
		if($cargo == 'I'){
			$sql = "UPDATE Pessoa SET 	CPF = '".$cpfI."',
										Nome = '".$nomeI."',
										Telefone = '".$telefoneI."',
										E_MAIL = '".$emailI."',
										Data_nascimento = '".$dataNascI."',
										Senha = '".$senhaI."',
										Tipo_cargo = '".$cargo."'
					WHERE idPessoa = '".$codigo."';
			";
			$resultadoI = mysqli_query($conexao,$sql);
			
			$uploaddir = 'imgInstrutores/';
			$uploadfile = $uploaddir . basename($imagemI['name']);
			if (move_uploaded_file($imagemI['tmp_name'], $uploadfile)){
				echo "Imagem v&aacute;lido e enviado com sucesso.\n";
			}else{
				echo "Possível ataque de upload de arquivo!\n";
				echo 'Aqui está mais informações de debug:';
				print_r($_FILES);
			}
			
			$sql = "UPDATE Instrutor SET	salario = '".$salarioI."',
											Carga_horaria = '".$cargaHI."',
											imagem = '".$uploadfile."'
					WHERE Pessoa_idPessoa = '".$codigo."';
			";		
			$resultadoI = mysqli_query($conexao,$sql);
			
			// VERIFICA SE TUDO DEU CERTO
			if($resultadoI == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Instrutor alterado com sucesso!");
							window.location.replace("menu.php");
					</SCRIPT>';    
			}else{
				echo '<script>alert("Problema ao alterar INSTRUTOR no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
				echo '<a href="menu.php"> VOLTAR </a>';
			}
		}
		
		
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Você não tem permissão para entrar aqui.");
						window.location.replace("menu.php");
			  </SCRIPT>';
	}
?>
