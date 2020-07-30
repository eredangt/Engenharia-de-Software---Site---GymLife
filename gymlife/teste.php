<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('../Controle/PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('../Controle/ClienteDAO.php');
	include_once('../Modelo/Instrutor.php');
	include_once('../Controle/InstrutorDAO.php');
	
	$cpfC = '01889640';
	$nomeC = 'Fabio';
	$telefoneC = '150';
	$emailC = 'marians@o';
	$dataNascC = '10-01-1977';
	$senhaC = 'marineao';
	$cargo = 'C';
	$planoC = '1';
	$salarioI = '450.00';
	$cHI = '30';
	$imagem = 'abc.jpeg'; 
	
	// Nos arquivos que precisam de conectar com o BD
	$conexao = new ConexaoBD();
	$conexao = $conexao->abreConexao();
	$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE
	
	
	$pessoaDAO = new PessoaDAO();
	$pessoaDAO->addPessoa($p,$conexao);
	$pessoaDAO->teste($p);
	/*
	$c = new Cliente($planoC);
	$c1 = new ClienteDAO();
	$c1->addCliente($c,$conexao, $p->getCPF());*/
	
	$i = new Instrutor($salarioI, $cHI, $imagem);
	$i1 = new InstrutorDAO();
	$i1->addInstrutor($i,$conexao, $p->getCPF());
	
	/*
	$cliente1 = new Cliente($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $plano);
	$clienteDAO = new ClienteDAO();
	$clienteDAO->addCliente($cliente1,$conexao);*/
	
?>
