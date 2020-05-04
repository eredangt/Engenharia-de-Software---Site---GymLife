<?php
	session_start();
	// Faz a ligação com o arquivo de banco de dados
	// require('bd_conexao.php');
	
	$login = $_POST['txtLogin'];
	$senha = $_POST['txtSenha'];
	
	/* 
	//Ao conectar no banco de dados, faz o SELECT buscando pelo nome do usuário.
	$sql="SELECT * FROM usuario WHERE login_usuario='".$login."';";
	
	$tabela = mysqli_query($conexao, $sql)or die(mysqli_error($conexao));
	
	$login_bd = '';
	$senha_bd = '';

	while ($linha = mysqli_fetch_row($tabela)){
		$login_bd = $linha[1];
		$senha_bd = $linha[3];
	}
	
	if ($login==$login_bd && $senha==$senha_bd){
		$_SESSION['login'] = $login;
		header('location:menu.php');
	}else{
		echo '<script>alert("Problema ao logar. Verifique se login e senha est&atilde;o corretos!";</script>';
		header('location:login.php');
		
	}
	*/
	
	if ($login == 'm' && $senha == 'm'){
		$_SESSION['login'] = 'Voc&ecirc; est&aacute logado no sistema!';
		$_SESSION['cargo'] = 'instrutor'; // TESTES (instrutor e aluno) Essa variavel é responsável por determinar a ocupação da pessoa na academia
		echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Você está logado!!");
                            window.location.replace("menu.php");
              </SCRIPT>';
	}else{
		echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Login ou senha incorretos. Tente novamente.");
                            window.location.replace("entrar.php");
			  </SCRIPT>';
		/*
		$_SESSION['erro'] = 'Usu&aacute;rio ou senha incorreto!';
		header('location: entrar.php');
		*/
	}
	/*
	 *  echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Para entrar nesta p&acute;gina, logue primeiro!");
                            window.location.replace("contact.html");
                 </SCRIPT>';
	 * */
?>
