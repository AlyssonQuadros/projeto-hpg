<?php
        $mysqli = new mysqli("127.0.0.1", "root", "", "bombeirospg",3306);
        if (mysqli_connect_errno($mysqli)) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $id = $_GET["id"];
        $res = mysqli_query($mysqli, "SELECT `lat` AS _msg FROM `viaturas` WHERE `id_viaturas` = $id");
        $row = mysqli_fetch_assoc($res);
        $res2 = mysqli_query($mysqli, "SELECT `lng` AS _msg FROM `viaturas` WHERE `id_viaturas` = $id");
        $row2 = mysqli_fetch_assoc($res2);
        $res3 = mysqli_query($mysqli, "SELECT `placa` AS _msg FROM `viaturas` WHERE `id_viaturas` = $id");
        $row3 = mysqli_fetch_assoc($res3);
        $res4 = mysqli_query($mysqli, "SELECT `imagem` AS _msg FROM `viaturas` WHERE `id_viaturas` = $id");
        $row4 = mysqli_fetch_assoc($res4);
        //echo $row['_msg'];
        $lat = 0.0 + $row['_msg'];
        $lng = 0.0 + $row2['_msg'];
        $placa = $row3['_msg'];
        $imagem = $row4['_msg'];
        $output = "0,$lat,$lng,$placa,$imagem,0";
        echo json_encode($output);
?>