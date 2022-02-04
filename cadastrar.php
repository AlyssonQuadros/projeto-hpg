<?php
session_start();

$conexao = mysqli_connect("127.0.0.1", "root", "", "bombeirospg") or die("Não foi possível conectar".mysqli_connect_error());
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha'])){
	$_SESSION['erro'] = true;
}

$sql = "INSERT INTO usuario (nome, usuario, email, senha, data_cadastro) VALUES ('$nome', '$usuario', '$email', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>