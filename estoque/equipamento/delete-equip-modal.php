<?php

    require_once('../../conexao.php');

    if(isset($_POST['darBaixa'])){
        $id = $_POST['id_equip'];

        $sql = "UPDATE `equipamentos` SET `excluido` = 1 WHERE id_equip = $id";

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