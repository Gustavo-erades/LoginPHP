<?php
// criando conexão
$hostname="localhost";
$username="root";
$password="admin1234";
$dbname="sessoesPHP";

$conexao= mysqli_connect($hostname,$username,$password,$dbname);
if(mysqli_connect_error()){
    echo "Falha na conexão com o banco de dados".mysqli_connect_error();
}
?>