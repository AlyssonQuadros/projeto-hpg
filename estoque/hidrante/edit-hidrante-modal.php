<?php
session_start();

    require_once('../../conexao.php');

    if(isset($_POST['moveHidrante'])){
        $id = $_POST['id_hidrantes'];

        $observacao = $_POST['observacao'];
        $situacao = $_POST['situacao'];
        $usuarioInsert = $_POST['usuarioInsert'];

        $sql = "UPDATE `hidrantes` SET
                `observacao` = '$observacao',
                `situacao` = '$situacao',
                `usuarioInsert` = '{$_SESSION['usuario']}',
                `created_at` = NOW()
                WHERE id_hidrantes = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit_modal'] = true;
            header('Location: /estoque/hidrante/estoque-hidrante.php');
            exit;
        }else{
            $_SESSION['erro_edit_modal'] = true;
            header('Location: ../../home.php');
        }
    }

?>