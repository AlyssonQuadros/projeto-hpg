<?php

    require_once('../../conexao.php');

    if(isset($_POST['darBaixa'])){
        $id = $_POST['id_viaturas'];

        $sql = "UPDATE `viaturas` SET `excluido` = 1 WHERE id_viaturas = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit_modal'] = true;
            header('Location: /estoque/viatura/estoque-viatura.php');
            exit;
        }else{
            $_SESSION['erro_edit_modal'] = true;
            header('Location: ../../home.php');
        }
    }

?>