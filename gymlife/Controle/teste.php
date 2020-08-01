<?php
	include_once('../Persistencia/ConexaoBD.php');
	include_once('../Modelo/Pessoa.php');
	include_once('../Controle/PessoaDAO.php');
	include_once('../Modelo/Cliente.php');
	include_once('../Controle/ClienteDAO.php');
	include_once('../Modelo/Instrutor.php');
	include_once('../Controle/InstrutorDAO.php');
	include_once('../Modelo/Plano.php');
	include_once('../Controle/PlanoDAO.php');
	include_once('../Modelo/Equipamento.php');
	include_once('../Controle/EquipamentoDAO.php');
	include_once('../Modelo/Treino.php');
	include_once('../Controle/TreinoDAO.php');
	
	
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
	$codigo = '1';
	
	// Nos arquivos que precisam de conectar com o BD
	$conexao = new ConexaoBD();
	$conexao = $conexao->abreConexao();
	$p = new Pessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo); // PARA CLIENTE
	
	$pessoaDAO = new PessoaDAO();
	//$pessoaDAO->addPessoa($p,$conexao);
	//$pessoaDAO->teste($p);
	
	//$pessoaDAO->atualizarPessoa($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $codigo, $conexao);
	//$pessoaDAO->excluirPessoa($codigo, $conexao);
	
	//$c = new Cliente($planoC);
	//$c1 = new ClienteDAO();
	//$c1->addCliente($c,$conexao, $p->getCPF());
	//$c1->atualizarCliente($planoC, $codigo, $conexao);
	
	//$i = new Instrutor($salarioI, $cHI, $imagem);
	//$i1 = new InstrutorDAO();
	//$i1->addInstrutor($i,$conexao, $p->getCPF());
	//$i1->atualizarInstrutor($salarioI, $cHI, $imagem, $codigo, $conexao);
	
	
	$nomeP = 'SEMESTRAL';
	$qtdP = '6';
	$valorP = '79.99';
	//$plan = new Plano($nomeP, $qtdP, $valorP);
	//$planDAO = new PlanoDAO();
	//$planDAO->addPlano($plan, $conexao);
	//$planDAO->atualizarPlano($nomeP, $qtdP, $valorP, $codigo, $conexao);
	//$planDAO->excluirPlano($codigo, $conexao);
	
	$nomeEquip = 'Supino Duplo';
	$qtdEquip = '2';
	$marcaEquip = 'Stronger';
	$anoEquip = '2014';
	
	//$equip = new Equipamento($nomeEquip, $qtdEquip, $marcaEquip, $anoEquip);
	//$equipDAO = new EquipamentoDAO();
	//$equipDAO->addEquipamento($equip, $conexao);
	//$equipDAO->atualizarEquipamento($nomeEquip, $qtdEquip, $marcaEquip, $anoEquip, $codigo, $conexao);
	//$equipDAO->excluirEquipamento($codigo, $conexao);
	
	$idPes = '50';
	$idFunc = '53';
	$idEquip = '2';
	$tipo = 'A';
	$serie = '4';
	$repeticoes = '20';
	$peso = '5';
	
	$trein = new Treino($idPes, $idFunc, $idEquip, $tipo, $serie, $repeticoes, $peso);
	$treinDAO = new TreinoDAO();
	$treinDAO->addTreino($trein, $conexao);
	//$treinDAO->atualizarTreino($idPes, $idFunc, $idEquip, $tipo, $serie, $repeticoes, $peso, $codigo, $conexao);
	//$treinDAO->excluirTreino($codigo, $conexao);
	
	
	/*
	$cliente1 = new Cliente($cpfC, $nomeC, $telefoneC, $emailC, $dataNascC, $senhaC, $cargo, $plano);
	$clienteDAO = new ClienteDAO();
	$clienteDAO->addCliente($cliente1,$conexao);*/
	
?>
