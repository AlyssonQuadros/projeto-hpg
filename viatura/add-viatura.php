<?php
session_start();
$conexao = new mysqli("127.0.0.1", "root", "", "bombeirospg") or die("Não foi possível conectar".mysqli_connect_error());

$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$marca = $_POST['marca'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$imagem = $_POST['imagem'];

$sql = "INSERT INTO viaturas (placa, modelo, ano, marca, lat, lng, imagem) VALUES ('$placa', '$modelo', '$ano', '$marca', '$lat', '$lng', '$imagem')";


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

if(empty($_POST['placa']) 
	|| empty($_POST['modelo']) 
	|| empty($_POST['ano']) 
	|| empty($_POST['marca']) 
	|| empty($_POST['lat']) 
	|| empty($_POST['lng']) 
	|| empty($_POST['imagem'])){
	$_SESSION['erro'] = true;
}

$conexao->close();

header('Location: /viatura/cadastrar-viatura.php');
exit;
?>