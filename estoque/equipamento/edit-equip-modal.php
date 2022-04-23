<?php
session_start();

    require_once('../../conexao.php');

    if(isset($_POST['moveEquip'])){
        $id = $_POST['id_equip'];

        $descricao = $_POST['descricao'];
        $situacao = $_POST['situacao'];
        $usuarioInsert = $_POST['usuarioInsert'];

        $sql = "UPDATE `equipamentos` SET
                `descricao` = '$descricao',
                `situacao` = '$situacao',
                `usuarioInsert` = '{$_SESSION['usuario']}',
                `created_at` = NOW()
                WHERE id_equip = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit_modal'] = true;
            header('Location: /estoque/equipamento/estoque-equipamento.php');
            exit;
        }else{
            $_SESSION['erro_edit_modal'] = true;
            header('Location: ../../home.php');
        }
    }

?>