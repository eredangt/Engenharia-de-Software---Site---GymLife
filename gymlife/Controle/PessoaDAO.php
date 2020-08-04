<?php
	// Persistence
	class PessoaDAO{
		
		public function __construct(){}
		
		public function teste($pessoa){
			echo $pessoa->getNome();
		}
		
		public function implementaLogOut($login){
			if(isset($login)){
				echo '<a href="logout.php">Log Out</a>';
			}
		}
		
		public function implementaRodape($login){
			if(isset($login)) {
				echo '<li><a href="./menu.php">Menu</a></li>';
			} else{
				echo '<li><a href="./entrar.php">Login</a></li>';
			}
		}
		
		public function implementaMenu($nome, $cargo){
			if(isset($nome))
					{
						echo '<li><a href="./menu.php">Menu</a></li>';
						
						if($cargo == 'instrutor'){
							echo '<li><a href="cadastrar.php">Cadastrar</a>
										<ul class="dropdown">
											<li><a href="cadastrarpessoa.php">Pessoa</a></li>
											<li><a href="cadastrartreino.php">Treino</a></li>
											<li><a href="cadastrarequipamento.php">Equipamento</a></li>
											<li><a href="cadastrarplano.php">Plano</a></li>
										</ul>
									</li>
									<li><a href="listar.php">Listar</a>
										<ul class="dropdown">
											<li><a href="listarpessoas.php">Pessoas</a></li>
											<li><a href="listartreinos.php">Treinos</a></li>
											<li><a href="listarequipamentos.php">Equipamentos</a></li>
											<li><a href="listarplanos.php">Planos</a></li>
										</ul>
									</li>';
						}
						
					}
					else{
						echo '<li><a href="./entrar.php">Login</a></li>';
					}
		}
		
		public function minhaEquipe($conexao){
			$sql = "SELECT P.nome, I.imagem FROM Pessoa as P, Instrutor as I 
							WHERE P.idPessoa = I.Pessoa_idPessoa ORDER BY P.nome ASC";
							
					$tabela = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

					while ($linha = mysqli_fetch_row($tabela)) {
						echo '<div class="col-lg-4 col-sm-6">
									<div class="ts-item set-bg" data-setbg="' . $linha[1] .'">
									<div class="ts_text">
											<h4>'.$linha[0].'</h4>
											<span>Treinador</span>
										</div>
									</div>
								</div>';
					}
		}
		
		public function addPessoa($pessoa, $con){
			$sql = "INSERT INTO Pessoa(CPF,Nome,Telefone,E_MAIL, Data_nascimento, senha, Tipo_cargo)
			  VALUES('".$pessoa->getCPF()."','".$pessoa->getNome()."','".$pessoa->getTelefone()."','".$pessoa->getEmail()."','".$pessoa->getDataNascimento()."','".$pessoa->getSenha()."','".$pessoa->getCargo()."');";
			echo $sql; 
			$resultadoP = mysqli_query($con,$sql) or die(mysqli_error($con));
			if($resultadoP == true){
				//echo 'Cadastrada pessoa.';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa cadastrada com sucesso!");
								window.location.replace("listarpessoas.php");
						</SCRIPT>';*/
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
				//echo 'Alterada a pessoa.';
				/*echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa alterada com sucesso!");
								window.location.replace("listarpessoas.php");
						</SCRIPT>';*/
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
				//echo 'Excluída a Pessoa';
				echo '<SCRIPT type="text/javascript"> //not showing me this
								alert("Pessoa excluída com sucesso!");
								window.location.replace("listarpessoas.php");
						</SCRIPT>';
			}else{
				echo 'Problema ao apagar o registro no banco de dados <br>';
				echo 'O erro que aconteceu foi este: ' . mysqli_error($con);
				echo '<a href="menu.php"> MENU </a>';
			}
		}
		
	}
	
?>
