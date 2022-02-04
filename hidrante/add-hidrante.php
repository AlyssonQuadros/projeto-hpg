<?php
session_start();

$conexao = new mysqli("127.0.0.1", "root", "", "bombeirospg") or die("Não foi possível conectar".mysqli_connect_error());

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$estado = $_POST['estado'];
$tipo = $_POST['tipo'];
$vazao = $_POST['vazao'];
$pressao = $_POST['pressao'];
$condicao = $_POST['condicao'];
$acesso = $_POST['acesso'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$imagem = $_POST['imagem'];

$sql = "INSERT INTO hidrantes (nome, endereco, estado, tipo, vazao, pressao, condicao, acesso, lat, lng, imagem)
        VALUES ('$nome', '$endereco', '$estado', '$tipo', '$vazao', '$pressao', '$condicao', '$acesso', '$lat', '$lng', '$imagem')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

if(empty($_POST['nome']) || empty($_POST['endereco']) || empty($_POST['estado'])
	|| empty($_POST['tipo']) || empty($_POST['vazao']) || empty($_POST['pressao'])
	|| empty($_POST['condicao']) || empty($_POST['acesso']) || empty($_POST['lat'])
	|| empty($_POST['lng']) || empty($_POST['imagem'])){
	$_SESSION['erro'] = true;
}

$conexao->close();

header('Location: /hidrante/cadastrar-hidrante.php');
exit;
?>