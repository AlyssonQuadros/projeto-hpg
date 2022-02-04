<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Estoque</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
<?php
    $conexao = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM hidrantes";
    $con = $conexao->query($consulta) or die($conexao->error);
?>
    <body style="background-color: #F5F5F8;">
        <h1 style="color: #eb3131f5; margin-top: 10px; margin-left: 20px">Estoque</h1>
        <div class="row">
            <div class="col-sm" style="margin-left: 20px; margin-top: 20px">
                <a href="../estoque/estoque-viatura.php"><button type="button" class="btn btn-danger">Viatura</button></a>
                <a href="../estoque/estoque-equipamento.php"><button type="button" class="btn btn-danger">Equipamento</button></a>
                <a href="../estoque/estoque-hidrante.php"><button type="button" class="btn btn-danger">Hidrante</button></a>
                <a href="../painel.php"><button type="button" class="btn btn-warning">Voltar</button></a>
            </div>
        </div>
        <hr style="color: #ff6600;">

        <h4 style="margin-top: 10px; margin-left: 20px; margin-top: 20px">Hidrantes</h4>

        <div class="container-fluid mt-3" style="padding-bottom: 50px;">
            <table id="tabelaHidrante" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; margin-bottom:40px; color:#000000;" border="2">
                <thead>
                    <tr>
                        <th style="width: 8%; font-size:13px; background-color:#ff8533"><b>Sigla</b></th>
                        <th style="font-size:13px; background-color:#ff8533"><b>Rua</b></th>
                        <th style="width: 10%; font-size:13px; background-color:#ff8533"><b>Vazão</b></th>
                        <th style="width: 10%; font-size:13px; background-color:#ff8533"><b>Pressão</b></th>
                        <th style="width: 10%; font-size:13px; background-color:#ff8533"><b>Status</b></th>
                        <th style="width: 10%; font-size:13px; background-color:#ff8533"><b>Condição</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($dado = $con->fetch_array()){ ?>
                    <tr>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["nome"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["endereco"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["vazao"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["pressao"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["estado"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["condicao"]; ?></td>
                        <td class="text-center" style="font-size:12px; background-color:#fff">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs" aria-haspopup="true" aria-expanded="false">
                                    Editar <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="btn-mover-instituicao" status-id="0" data-id="<?=$d['idCliente']?>" instituicao-id="<?= $d['idInstituicao'] ?>">Inativo</a></li>
                                    <li><a class="btn-mover-instituicao" status-id="1" data-id="<?=$d['idCliente']?>" instituicao-id="<?= $d['idInstituicao'] ?>">Ativo</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

        <script>
        $(document).ready(function(){
            $('#tabelaHidrante').DataTable({
                    "pageLength": 25,
                    "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nada encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)",
                        "search": "Pesquisar",
                        "paginate": {
                            "next": "Próximo",
                            "previous": "Anterior",
                            "first": "Primeiro",
                            "last": "Último"
                        },
                    }
                });
        });
        </script>
    </body>
</html>