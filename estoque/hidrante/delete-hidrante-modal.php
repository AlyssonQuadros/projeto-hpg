<?php

    require_once('../../conexao.php');

    if(isset($_POST['darBaixa'])){
        $id = $_POST['id_hidrantes'];

        $sql = "DELETE FROM `hidrantes` WHERE id_hidrantes = $id";

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