<?php
//Informações para 

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$dbname = "myapp";
$porta = 3306;

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname, $porta);

if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}//else{
   // echo "Conexao realizada com sucesso";
//}
