<?php
    // header('Content-Type: text/html; charset=utf-8');

    $servidor="127.0.0.1";
    $usuario="root";
    $senha="";
    $dbname = "bombeirospg";
    // $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname,3306) or die("Não foi possível conectar".mysqli_connect_error());
    // mysqli_set_charset($conexao, "utf8");

    $conexao = new mysqli($servidor, $usuario, $senha, $dbname,3306) or die("Não foi possível conectar".mysqli_connect_error());
    $conexao->set_charset("utf8mb4");

    // $conexao->set_charset("utf8mb4");

    // mysql_query("SET NAMES 'utf8'");
    // mysql_query("SET character_set_connection=utf8");
    // mysql_query("SET character_set_client=utf8");
    // mysql_query("SET character_set_results=utf8");
?>