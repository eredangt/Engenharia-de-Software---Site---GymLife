<?php
	// Persistence
	class InstrutorDAO{

		public function __construct(){}

        public function addInstrutor($instrutor, $con, $pegaCPF){
            $sql="SELECT idPessoa FROM PESSOA WHERE CPF ='".$pegaCPF."';";
            //$tabela=mysqli_query($con,$sql) or die(mysqli_error($con));
            $con->executaSQL($sql);

            while($linha=mysqli_fetch_row($tabela)){
                $COD_Instrutor= $linha[0];
            }
            $sql = "INSERT INTO Instrutor(Pessoa_idPessoa, salario, Carga_horaria, imagem)
                    VALUES('".$COD_Instrutor."','".$instrutor->getSalario()."','".$instrutor->getCH()."','".$instrutor->getImagem()."');";
            //$resultadoC = mysqli_query($con,$sql);
            //$sql = "INSERT INTO Cliente($cliente->getIdCliente(), $cliente->getPlano())
            //VALUES('".$pessoa->getCPF()."','".$pessoa->getNome()."','".$pessoa->getTelefone()."','".$pessoa->getEmail()."','".$pessoa->getDataNascimento()."','".$pessoa->getSenha()."','".$pessoa->getCargo()."');";
            echo $sql;
            $resultadoC = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoC == true){
                echo 'Cliente cadastrado.';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }
	}
?>
