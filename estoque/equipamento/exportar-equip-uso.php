<?php
    session_start();

	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=lista_equipamentos_em_uso.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	require_once('../../conexao.php');

	$output = "";
	$output = "<td border='1'><b>Tabela de equipamentos em uso</b></td>";

	$output .="
		<table border='1'>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nº Patrimônio</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Condição</th>
                    <th>Situação</th>
                    <th>Usuário</th>
					<th>Data</th>
				</tr>
			<tbody>
	";

	$query = $conexao->query("SELECT * FROM `equipamentos` WHERE `situacao` = 'Em uso'") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){

	$output .= "
				<tr>
					<td>".$fetch['id_equip']."</td>
					<td>".$fetch['patrimonio']."</td>
					<td>".$fetch['nome']."</td>
					<td>".$fetch['descricao']."</td>
					<td>".$fetch['condicao']."</td>
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