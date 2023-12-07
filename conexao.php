<?php

$servidor = "locahost";
$usuario = 'root';
$senha = '';
$bd = 'videoaula';

$conn = mysqli_connect($servidor, $usuario, $senha) or die("Não foi possível conectar");
mysqli_select_db($conn, $bd);

?>