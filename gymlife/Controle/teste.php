<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('../Controle/PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('../Controle/ClienteDAO.php');
	include_once('../Modelo/Instrutor.php');
	include_once('../Controle/InstrutorDAO.php');
	
	$cpfC = '321456';
	$nomeC = 'FabioPaes';
	$telefoneC = '1504';
	$emailC = 'marians@o';
	$dataNascC = '12-12-1990';
	$senhaC = 'faubu';
	$cargo = 'C';
	$planoC = '2';
	$salarioI = '900.00';
	$cHI = '20';
	$imagem = 'abcdef.jpeg'; 
	
	// Nos arquivos que precisam de conectar com o BD
	$conexao = new ConexaoBD();
	$conexao = $conexao->abreConexao();
	$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE
	
	$pessoaDAO = new PessoaDAO();
	//$pessoaDAO->addPessoa($p,$conexao);
	//$pessoaDAO->teste($p);
	$codigo = '18';
	//$pessoaDAO->atualizarPessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $codigo, $conexao);
	
	//$c = new Cliente($planoC);
	//$c1 = new ClienteDAO();
	//$c1->addCliente($c,$conexao, $p->getCPF());
	
	
	//$i = new Instrutor($salarioI, $cHI, $imagem);
	//$i1 = new InstrutorDAO();
	//$i1->addInstrutor($i,$conexao, $p->getCPF());
	
	
	//$c1->atualizarCliente($planoC, $codigo, $conexao);
	//$i1->atualizarInstrutor($salarioI, $cHI, $imagem, $codigo, $conexao);
	
	$pessoaDAO->excluirPessoa($codigo, $conexao);
	
	/*
	$cliente1 = new Cliente($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $plano);
	$clienteDAO = new ClienteDAO();
	$clienteDAO->addCliente($cliente1,$conexao);*/
	
?>
