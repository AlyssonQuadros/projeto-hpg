<?php
    session_start();

    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=lista_hidrantes_ativos.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    require_once('../../conexao.php');

    $output = "";
    $output = "<td border='1'><b>Tabela de todos os hidrantes ativos</b></td>";

    $output .="
        <table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sigla</th>
                    <th>Endereço</th>
                    <th>Tipo</th>
                    <th>Vazão</th>
                    <th>Pressão</th>
                    <th>Condição</th>
                    <th>Acesso</th>
                    <th>Situação</th>
                    <th>Observação</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Usuário</th>
                    <th>Data</th>
                </tr>
            <tbody>
    ";

    $query = $conexao->query("SELECT * FROM `hidrantes` WHERE situacao = 'Ativo'") or die(mysqli_errno());
    while($fetch = $query->fetch_array()){

    $output .= "
                <tr>
                    <td>".$fetch['id_hidrantes']."</td>
                    <td>".$fetch['nome']."</td>
                    <td>".$fetch['endereco']."</td>
                    <td>".$fetch['tipo']."</td>
                    <td>".$fetch['vazao']."</td>
                    <td>".$fetch['pressao']."</td>
                    <td>".$fetch['condicao']."</td>
                    <td>".$fetch['acesso']."</td>
                    <td>".$fetch['situacao']."</td>
                    <td>".$fetch['observacao']."</td>
                    <td>".$fetch['lat']."</td>
                    <td>".$fetch['lng']."</td>
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