<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css_final.css">
    
    <script src="./filter.js"></script>
    
    <!-- <link rel="stylesheet" href="./css-1.css"> -->
    <title>Fixed table</title>
</head>
<body>
    <div class="heading">
    <h1>Dropdown table filter using JavaScript</h1>
    <!-- <button id="get-unique-values" onclick="getUniqueValuesFromColumn()">Get unique column values</button> -->
</div>
<?php

    $mysqli = new mysqli('localhost', 'root', '', 'bombeirospg');

    if(isset($_GET['search'])){

        $filterValues = $_GET['search'];
        $consulta = "SELECT * FROM equipamentos WHERE condicao LIKE '%$filterValues%'";
        $con = $mysqli->query($consulta) or die($mysqli->error);

    }else{

        $consulta = "SELECT * FROM equipamentos";
        $con = $mysqli->query($consulta) or die($mysqli->error);

    }
?>
    <div class="table-wrapper">
    <table id="emp-table" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; color:#000000;" border="2">
    <thead>
            <th class="th-sm" style="font-size:13px; color: #000000; background-color:#ff8533" col-index = 1>Nº Patrimônio</th>
            <th class="th-sm" style="width: 600px; text-align:left;font-size:13px; color: #000000; background-color:#ff8533" col-index = 2>Nome
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>

            <th class="th-sm" style="font-size:13px; color: #000000; background-color:#ff8533" col-index = 3>Condição
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            <th class="th-sm" style="font-size:13px; color: #000000; background-color:#ff8533" col-index = 4>Situação
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            <th class="th-sm" style="font-size:13px; color: #000000; background-color:#ff8533" col-index = 5>Adicionado
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>

        </thead>
        <!-- <thead>
            <tr>
                <th class="th-sm" style="width: 12%; font-size:13px; color: #000000; background-color:#ff8533"><b>Nº Patrimônio</b></th>
                <th class="th-sm" style="font-size:13px; color: #000000; background-color:#ff8533"><b>Nome</b></th>
                <th class="th-sm" style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Condição</b></th>
                <th class="th-sm" style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Situação</b></th>
                <th class="th-sm" style="width: 8%; font-size:13px; color: #000000; background-color:#ff8533"><b>Adicionado</b></th>
            </tr>
        </thead> -->
        <tbody>
            <?php while($dado = $con->fetch_array()){ ?>
            <tr>
                <td style="font-size:12px;"><?php echo $dado["patrimonio"]; ?></td>
                <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["nome"]; ?></td>
                <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["condicao"]; ?></td>
                <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["situacao"]; ?></td>
                <td style="font-size:12px;"><?php echo date("d/m/Y", strtotime($dado["created_at"])); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- <script>getUniqueValuesFromColumn()
    </script> -->
    <script>
        window.onload = () => {
            console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
        };

        getUniqueValuesFromColumn()
        
    </script>
</div>
</body>

</html>