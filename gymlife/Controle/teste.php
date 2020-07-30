<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('../Controle/PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('../Modelo/Instrutor.php');
	include_once('../Controle/ClienteDAO.php');
	include_once('../Controle/InstrutorDAO.php');

	$cpfC = "23231431423";
	$nomeC = 'Maria';
	$telefoneC = '345023422';
	$emailC = 'marians@o342e34';
	$dataNascC = '16-08-1982';
	$senhaC = 'marineao333';
	$cargo = 'I';
	//$plano = '1';
	$salario = "450.00";
	$ch = "3";
	$imagem = "abc.jpg";


	// Nos arquivos que precisam de conectar com o BD
	$conexao = new ConexaoBD();
	$conexao = $conexao->abreConexao();
/*	$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE

	#$c = new Cliente($COD_Cliente, $planoC);
	$pessoaDAO = new PessoaDAO();
	$pessoaDAO->addPessoa($p,$conexao);
	$pessoaDAO->teste($p);*/

	//$cliente1 = new Cliente($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $plano);
	$instrutor1 = new Instrutor($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $salario, $ch, $imagem);
	$instrutorDAO = new InstrutorDAO();
	$instrutorDAO->addInstrutor($instrutor1,$conexao);

?>
