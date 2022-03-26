<?php
session_start();
include("../conexao.php");

$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$marca = $_POST['marca'];
$imagem = $_POST['imagem'];

$sql = "INSERT INTO viaturas (placa, modelo, ano, marca, imagem, created_at) VALUES ('$placa', '$modelo', '$ano', '$marca', '$imagem', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

// if(empty($_POST['placa']) 
// 	|| empty($_POST['modelo']) 
// 	|| empty($_POST['ano']) 
// 	|| empty($_POST['marca']) 
// 	|| empty($_POST['imagem'])){
// 	$_SESSION['erro'] = true;
// }

$conexao->close();

header('Location: /viatura/cadastrar-viatura.php');
exit;
?>