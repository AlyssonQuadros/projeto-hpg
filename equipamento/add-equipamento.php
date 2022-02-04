<?php
session_start();
include("../conexao.php");

$patrimonio = $_POST['patrimonio'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$condicao = $_POST['condicao'];
$imagem = $_FILES['imagem'];

$sql = "INSERT INTO equipamentos (patrimonio, nome, descricao, condicao, created_at)
        VALUES ('$patrimonio', '$nome', '$descricao', '$condicao', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

if(empty($_POST['patrimonio']) || empty($_POST['nome']) || empty($_POST['descricao']) || empty($_POST['condicao'])){
	$_SESSION['erro'] = true;
}

$conexao->close();

header('Location: /equipamento/cadastrar-equipamento.php');
exit;

?>