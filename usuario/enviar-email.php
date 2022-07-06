<?php
session_start();
include("../conexao.php");

$recebe_email = $_POST['txtEmail'];

$consultaEmail =  $conexao->query("SELECT nome, email, senha FROM usuario WHERE email = '$recebe_email'");


if ($consultaEmail->rowCount() == 0) {
    header('Location: ../index.php');

}else{
    echo "Este email esta cadastrado no BD.";
}

?>