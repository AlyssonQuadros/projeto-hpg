<?php
session_start();

    require_once('../conexao.php');

    if(isset($_POST['editUser'])){
        $usuarioLogado = $_GET['usuario'];

        $usuario = $_POST['usuario'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $funcao = $_POST['funcao'];
        $email = $_POST['email'];
        $senha = trim(md5($_POST['senha']));

        // $novoNome = $_POST['nome'];
        // $novoUsuario = $_POST['usuario'];
        // $novoTelefone = $_POST['telefone'];
        // $novoFuncao = $_POST['funcao'];
        // $novoEmail = $_POST['email'];
        // $novoSenha = $_POST['senha'];

        // $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        // $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
        // $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
        // $funcao = mysqli_real_escape_string($conexao, trim($_POST['funcao']));
        // $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        // $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

        // $loggedInUser = $_SESSION['usuario'];

        $sql = "UPDATE `usuario` SET
                `nome` = '$novoNome',
                `usuario` = '$novoUsuario',
                `telefone` = '$novoTelefone',
                `funcao` = '$novoFuncao',
                `email` = '$novoEmail',
                `senha` = '$novoSenha',
                `data_cadastro` = NOW()
                WHERE usuario = $loggedInUser";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit'] = true;
            header('Location: ../home.php');
            exit;
        }else{
            $_SESSION['erro_edit'] = true;
        }
    }

?>