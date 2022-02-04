<?php
        $mysqli = new mysqli("127.0.0.1", "root", "", "bombeirospg",3306);
        if (mysqli_connect_errno($mysqli)) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $id = $_GET["id"];
        $res = mysqli_query($mysqli, "SELECT `lat` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row = mysqli_fetch_assoc($res);
        $res2 = mysqli_query($mysqli, "SELECT `lng` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row2 = mysqli_fetch_assoc($res2);
        $res3 = mysqli_query($mysqli, "SELECT `nome` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row3 = mysqli_fetch_assoc($res3);
        $res4 = mysqli_query($mysqli, "SELECT `endereco` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row4 = mysqli_fetch_assoc($res4);
        $res5 = mysqli_query($mysqli, "SELECT `estado` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row5 = mysqli_fetch_assoc($res5);
        $res6 = mysqli_query($mysqli, "SELECT `tipo` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row6 = mysqli_fetch_assoc($res6);
        $res7 = mysqli_query($mysqli, "SELECT `vazao` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row7 = mysqli_fetch_assoc($res7);
        $res8 = mysqli_query($mysqli, "SELECT `pressao` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row8 = mysqli_fetch_assoc($res8);
        $res9 = mysqli_query($mysqli, "SELECT `condicao` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row9 = mysqli_fetch_assoc($res9);
        $res10 = mysqli_query($mysqli, "SELECT `acesso` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row10 = mysqli_fetch_assoc($res10);
        $res11 = mysqli_query($mysqli, "SELECT `imagem` AS _msg FROM `hidrantes` WHERE `id_hidrantes` = $id");
        $row11 = mysqli_fetch_assoc($res11);
        //echo $row['_msg'];
        $lat = 0.0 + $row['_msg'];
        $lng = 0.0 + $row2['_msg'];
        $nome = $row3['_msg'];
        $endereco = $row4['_msg'];
        $estado = $row5['_msg'];
        $tipo = $row6['_msg'];
        $vazao = $row7['_msg'];
        $pressao = $row8['_msg'];
        $condicao = $row9['_msg'];
        $acesso = $row10['_msg'];
        $imagem = $row11['_msg'];
        $output = "0,$lat,$lng,$nome,$endereco,$estado,$tipo,$vazao,$pressao,$condicao,$acesso,$imagem,0";
        echo json_encode($output);
?>