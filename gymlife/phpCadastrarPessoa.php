<?php
	require('phpConexaoBD.php');
	session_start();
	if($_SESSION['cargo'] == 'instrutor'){
		
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
			
			$sql = 'INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, Senha, Tipo_cargo)
			  VALUES("'.$cpfC.'","'.$nomeC.'","'.$telefoneC.'","'.$emailC.'","'.$dataNascC.'","'.$senhaC.'","'.$cargo.'")';
			$resultado = mysqli_query($conexao,$sql);
			
			$sql='SELECT idPessoa FROM PESSOA WHERE CPF ="'.$cpfC.'";'; 
			$tabela=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
							
										
			while($linha=mysqli_fetch_row($tabela)){
				$COD_Cliente= $linha[0];
			}	
			
			$sql = 'INSERT INTO Cliente(Pessoa_idPessoa,PLANO_idPlano)
					VALUES("'.$COD_Cliente.'","'.$planoC.'")';
			$resultadoC = mysqli_query($conexao,$sql);
				
				
			// VERIFICA SE TUDO DEU CERTO
			if ($resultadoC == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Cliente inserido com sucesso!");
							 window.location.replace("menu.php");
					</SCRIPT>';       
			}else{
				echo '<script>alert("Problema ao adicionar CLIENTE no banco de dados");</script>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
				echo '<a href="menu.php"> VOLTAR </a>';
			}
			
		}
		if($cargo == 'I'){
			
			$sql = 'INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, Senha, Tipo_cargo)
			  VALUES("'.$cpfI.'","'.$nomeI.'","'.$telefoneI.'","'.$emailI.'","'.$dataNascI.'","'.$senhaI.'","'.$cargo.'")';
			$resultadoI = mysqli_query($conexao,$sql);
			
			$sql='SELECT idPessoa FROM Pessoa WHERE CPF ="'.$cpfI.'";'; 
			$tabela=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			
			while($linha=mysqli_fetch_row($tabela)){
				$COD_Instrutor = $linha[0];
			}
			
			$uploaddir = 'imgInstrutores/';
			$uploadfile = $uploaddir . basename($imagemI['name']);
			if (move_uploaded_file($imagemI['tmp_name'], $uploadfile)){
				echo "Imagem v&aacute;lido e enviado com sucesso.\n";
			}else{
				echo "Possível ataque de upload de arquivo!\n";
				echo 'Aqui está mais informações de debug:';
				print_r($_FILES);
			}
			
			
			$sql = 'INSERT INTO Instrutor(Pessoa_idPessoa,Salario,Carga_horaria, imagem)
					VALUES("'.$COD_Instrutor.'","'.$salarioI.'","'.$cargaHI.'","'.$uploadfile.'")';
			$resultadoI = mysqli_query($conexao,$sql);
			
			// VERIFICA SE TUDO DEU CERTO
			if($resultadoI == true){
				echo '<SCRIPT type="text/javascript"> //not showing me this
							alert("Instrutor inserido com sucesso!");
							 window.location.replace("menu.php");
					</SCRIPT>';    
			}else{
				echo '<script>alert("Problema ao adicionar INSTRUTOR no banco de dados");</script>';
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
