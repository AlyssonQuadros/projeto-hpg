<?php
    session_start();

    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=lista_viaturas_em_estoque.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    require_once('../../conexao.php');

    $output = "";
    $output = "<td border='1'><b>Tabela de viaturas em estoque</b></td>";

    $output .="
        <table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Observação</th>
                    <th>Situação</th>
                    <th>Usuário</th>
                    <th>Data</th>
                </tr>
            <tbody>
    ";

    $query = $conexao->query("SELECT * FROM `viaturas` WHERE situacao = 'Em estoque'") or die(mysqli_errno());
    while($fetch = $query->fetch_array()){

    $output .= "
                <tr>
                    <td>".$fetch['id_viaturas']."</td>
                    <td>".$fetch['placa']."</td>
                    <td>".$fetch['marca']."</td>
                    <td>".$fetch['modelo']."</td>
                    <td>".$fetch['ano']."</td>
                    <td>".$fetch['observacao']."</td>
                    <td>".$fetch['situacao']."</td>
                    <td>".$_SESSION['usuario']."</td>
                    <td>".$fetch['created_at']."</td>
                </tr>
    ";
    }

    $output .="
            </tbody>

        </table>
    ";

    echo $output;
    echo "\xEF\xBB\xBF"; // UTF-8 BOM

?>