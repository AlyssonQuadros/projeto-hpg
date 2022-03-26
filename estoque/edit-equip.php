<?php
session_start();

    require_once('../conexao.php');

    if(isset($_GET['id']) && isset($_POST['editEquip'])){
        $id = $_GET['id'];
        $patrimonio = $_POST['patrimonio'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $condicao = $_POST['condicao'];

        $sql = "UPDATE `equipamentos` SET
                `patrimonio` = '$patrimonio',
                `nome` = '$nome',
                `descricao` = '$descricao',
                `condicao` = '$condicao',
                `created_at` = NOW()
                WHERE id_equip = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit'] = true;
            header('Location: /estoque/estoque-equipamento.php');
            exit;
        }else{
            $_SESSION['erro_edit'] = true;
        }
    }

?>