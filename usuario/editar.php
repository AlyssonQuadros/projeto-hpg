<?php
session_start();

    require_once('conexao.php');

    if(isset($_GET['id']) && isset($_POST['editPerfil'])){
        $id = $_GET['id'];
        $usuario = $_POST['usuario'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $funcao = $_POST['funcao'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "UPDATE `usuario` SET
                `usuario` = '$usuario',
                `nome` = '$nome',
                `telefone` = '$telefone',
                `funcao` = '$funcao',
                `email` = '$email',
                `senha` = '$senha',
                `data_cadastro` = NOW()
                WHERE id_usuario = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit'] = true;
            header('Location: /estoque/estoque-equipamento.php');
            exit;
        }else{
            $_SESSION['erro_edit'] = true;
        }
    }

?>