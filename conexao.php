<?php

$servidor = "localhost";
$username = "root";
$password = "root";
$dbname = "videoaula";

$conexao = mysqli_connect($servidor, $username, $password) or die("Não foi possível conectar ao banco de dados");

mysqli_select_db($conexao, $dbname);

?>