<?php
	// Persistence
	include_once('../Modelo/Instrutor.php');
	include_once('../Modelo/Pessoa.php');
	class InstrutorDAO{

		public function __construct(){}

        public function addInstrutor($instrutor, $con, $pegaCPF){
            $sql="SELECT idPessoa FROM PESSOA WHERE CPF ='".$pegaCPF."';";
            $tabela=mysqli_query($con,$sql) or die(mysqli_error($con));

            while($linha=mysqli_fetch_row($tabela)){
                $COD_Instrutor= $linha[0];
            }
            $sql = "INSERT INTO Instrutor(Pessoa_idPessoa, salario, Carga_horaria, imagem)
                    VALUES('".$COD_Instrutor."','".$instrutor->getSalario()."','".$instrutor->getCH()."','".$instrutor->getImagem()."');";
            
            echo $sql;
            $resultadoI = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($resultadoI == true){
                echo 'Instrutor cadastrado.';
            }else{
                echo 'Algo ocorreu: ' . mysqli_error($con);
            }
        }
	}
?>
