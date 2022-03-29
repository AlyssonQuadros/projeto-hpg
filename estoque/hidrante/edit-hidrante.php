<?php
session_start();

    require_once('../../conexao.php');

    if(isset($_GET['id']) && isset($_POST['editHidrante'])){
        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $situacao = $_POST['situacao'];
        $tipo = $_POST['tipo'];
        $vazao = $_POST['vazao'];
        $pressao = $_POST['pressao'];
        $condicao = $_POST['condicao'];
        $acesso = $_POST['acesso'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];

        $sql = "UPDATE `hidrantes` SET
                `nome` = '$nome',
                `endereco` = '$endereco',
                `situacao` = '$situacao',
                `tipo` = '$tipo',
                `vazao` = '$vazao',
                `pressao` = '$pressao',
                `condicao` = '$condicao',
                `acesso` = '$acesso',
                `lat` = '$lat',
                `lng` = '$lng',
                `created_at` = NOW()
                WHERE id_hidrantes = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit'] = true;
            header('Location: /estoque/hidrante/estoque-hidrante.php');
            exit;
        }else{
            $_SESSION['erro_edit'] = true;
        }
    }

?>