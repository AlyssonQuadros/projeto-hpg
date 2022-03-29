<?php
session_start();

    require_once('../../conexao.php');

    if(isset($_GET['id']) && isset($_POST['editViatura'])){
        $id = $_GET['id'];
        $placa = $_POST['placa'];
        $ano = $_POST['ano'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];

        $sql = "UPDATE `viaturas` SET
                `placa` = '$placa',
                `ano` = '$ano',
                `marca` = '$marca',
                `modelo` = '$modelo',
                `created_at` = NOW()
                WHERE id_viaturas = $id";

        if($conexao->query($sql) === TRUE){
            $_SESSION['sucesso_edit'] = true;
            header('Location: /estoque/viatura/estoque-viatura.php');
            exit;
        }else{
            $_SESSION['erro_edit'] = true;
        }
    }

?>