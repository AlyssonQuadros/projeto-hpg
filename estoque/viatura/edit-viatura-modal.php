<?php

    require_once('../../conexao.php');

    if(isset($_POST['moveViatura'])){
        $id = $_POST['id_viaturas'];

        $observacao = $_POST['observacao'];
        $situacao = $_POST['situacao'];

        $sql = "UPDATE `viaturas` SET
                `observacao` = '$observacao',
                `situacao` = '$situacao',
                `created_at` = NOW()
                WHERE id_viaturas = $id";

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