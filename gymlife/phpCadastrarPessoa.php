<?php
	require('phpConexaoBD.php');
	
	// Variaveis de consulta
	$resultadoC = '';
	$resultadoI = '';
	
	$cargo = $_POST['selecao']; // Cargo: C ou I
	

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
	

    if($cargo = 'C'){
		
		$sql = 'INSERT INTO Pessoa(CPF,Nome,Telefone,Email, Data_nascimento, Senha, Tipo_cargo)
          VALUES("'.$cpfC.'","'.$nomeC.'","'.$telefoneC.'","'.$emailC.'","'.$dataNascC.'","'.$senhaC.'","'.$cargo.'")';
		$resultadoC = mysqli_query($conexao,$sql);
					
		$sql='SELECT idPessoa FROM PESSOA WHERE CPF ="'.$cpfC.'";'; 
		$tabela=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
												
		while($linha=mysqli_fetch_row($tabela)){
			$COD_CLIENTE = $linha[0];
		}	
		
		$sql = 'INSERT INTO Cliente(Pessoa_idPessoa,PLANO_idPlano)
				VALUES("'.$COD_CLIENTE.'","'.$planoC.'")';
		$resultadoC = mysqli_query($conexao,$sql);
			
			
		// VERIFICA SE TUDO DEU CERTO
		if ($resultadoC == true){
			echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Cliente inserido com sucesso!");
						
				</SCRIPT>';       
		}else{
			echo '<script>alert("Problema ao adicionar CLIENTE no banco de dados");</script>';
			echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
			echo '<a href="menu.php"> VOLTAR </a>';
		}
		
	}
	if($cargo = 'I'){
		
		
		
		$sql = 'INSERT INTO Pessoa(CPF,Nome,Telefone,Email, Data_nascimento, Senha, Tipo_cargo)
          VALUES("'.$cpfI.'","'.$nomeI.'","'.$telefoneI.'","'.$emailI.'","'.$dataNascI.'","'.$senhaI.'","'.$cargo.'")';
		$resultadoI = mysqli_query($conexao,$sql);
		
		$sql='SELECT idPessoa FROM PESSOA WHERE CPF ="'.$cpfI.'";'; 
		$tabela=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
												
		while($linha=mysqli_fetch_row($tabela)){
			$COD_INSTRUTOR = $linha[0];
		}
		
		$sql = 'INSERT INTO Instrutor(Pessoa_idPessoa,Salario,Carga_horaria)
				VALUES("'.$COD_INSTRUTOR.'","'.$salarioI.'","'.$cargaHI.'")';
		$resultadoI = mysqli_query($conexao,$sql);
		
		// VERIFICA SE TUDO DEU CERTO
		if($resultadoI == true){
			echo '<SCRIPT type="text/javascript"> //not showing me this
						alert("Instrutor inserido com sucesso!");
						
				</SCRIPT>';    
		}else{
			echo '<script>alert("Problema ao adicionar INSTRUTOR no banco de dados");</script>';
			echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao).'<br>';
			echo '<a href="menu.php"> VOLTAR </a>';
		}
	}
	
	
?>
