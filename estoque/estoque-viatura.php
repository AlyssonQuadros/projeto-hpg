<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
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
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    </head>
<?php
    $conexao = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM viaturas";
    $con = $conexao->query($consulta) or die($conexao->error);
?>
    <body style="background-color: #F5F5F8;">
        <h1 style="color: #eb3131f5; margin-top: 10px; margin-left: 20px">Estoque</h1>
        <div class="row">
            <div class="col-sm" style="margin-left: 20px; margin-top: 20px">
                <a href="../estoque/estoque-viatura.php"><button type="button" class="btn btn-danger">Viatura</button></a>
                <a href="../estoque/estoque-equipamento.php"><button type="button" class="btn btn-danger">Equipamento</button></a>
                <a href="../estoque/estoque-hidrante.php"><button type="button" class="btn btn-danger">Hidrante</button></a>
                <a href="../home.php"><button type="button" style="color:#F5F5F8" class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
            </div>
        </div>
        <hr style="color: #ff6600;">

        <div class="row">
            <div class="col-3">
                <h4 style="margin-top: 10px; margin-left: 20px;">Viaturas no estoque:</h4>
            </div>
            <div style="padding-left: 37px;" class="col-md-3 offset-md-6">
                <a href="../estoque/estoque-viatura.php"><button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-download"></i> Exportar dados</button></a>
                <a href="../estoque/estoque-equipamento.php"><button type="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-box-open"></i> Retirar do estoque</button></a>
            </div>
        </div>

        <div class="container-fluid mt-3" style="padding-bottom: 50px;">
            <table id="tabelaViatura" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; margin-bottom:40px; color:#000000;" border="2">
                <thead>
                    <tr>
                        <th style="width: 8%; font-size:13px; background-color:#ff8533"><b>Placa</b></th>
                        <th style="font-size:13px; background-color:#ff8533"><b>Modelo</b></th>
                        <th style="font-size:13px; background-color:#ff8533"><b>Marca</b></th>
                        <th style="width: 8%; font-size:13px; background-color:#ff8533"><b>Ano</b></th>
                        <th style="width: 10%; font-size:13px; text-align:center; background-color:#ff8533"><b>Ação</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($dado = $con->fetch_array()){ ?>
                    <tr>
                        <td style="font-size:12px; background-color:#fff; text-transform:uppercase;"><?php echo $dado["placa"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["modelo"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["marca"]; ?></td>
                        <td style="font-size:12px; background-color:#fff"><?php echo $dado["ano"]; ?></td>
                        <td class="text-center" style="font-size:12px; background-color:#fff">
                            <div class="btn-group">
                                <button type="button" style="color:#F5F5F8" class="btn-xs btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </button>
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
            $('#tabelaViatura').DataTable({
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