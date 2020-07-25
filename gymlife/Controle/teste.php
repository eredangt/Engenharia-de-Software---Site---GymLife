<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('../Controle/PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('../Controle/ClienteDAO.php');
	
	$cpfC = '012';
	$nomeC = 'Marianinha';
	$telefoneC = '3450';
	$emailC = 'marians@o';
	$dataNascC = '16-08-1977';
	$senhaC = 'marineao';
	$cargo = 'C';
	$plano = '1';
	
	// Nos arquivos que precisam de conectar com o BD
	$conexao = new ConexaoBD();
	$conexao = $conexao->abreConexao();
/*	$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE
	
	#$c = new Cliente($COD_Cliente, $planoC);
	$pessoaDAO = new PessoaDAO();
	$pessoaDAO->addPessoa($p,$conexao);
	$pessoaDAO->teste($p);*/
	
	$cliente1 = new Cliente($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $plano);
	$clienteDAO = new ClienteDAO();
	$clienteDAO->addCliente($cliente1,$conexao);
	
?>
