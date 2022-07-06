<?php
    header('Content-Type: text/html; charset=utf-8');

    $servidor="127.0.0.1";
    $usuario="root";
    $senha="";
    $dbname = "bombeirospg";

    $conexao = new mysqli($servidor, $usuario, $senha, $dbname,3306) or die("Não foi possível conectar".mysqli_connect_error());
    $conexao->set_charset("utf8mb4");

    // $servidor="127.0.0.1";
    // $usuario="root";
    // $senha="";
    // $dbname = "bombeirospg";
    // $port = 3306;

    // $conexao = new PDO("mysql:host=$servidor;port=$port;dbname=" . $dbname, $usuario, $senha) or die("Não foi possível conectar".mysqli_connect_error());

?>