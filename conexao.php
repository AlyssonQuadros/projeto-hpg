<?php
    $servidor="127.0.0.1";
    $usuario="root";
    $senha="";
    $dbname = "bombeirospg";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname,3306) or die("Não foi possível conectar".mysqli_connect_error());
?>