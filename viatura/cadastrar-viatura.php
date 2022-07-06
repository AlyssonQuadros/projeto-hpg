<?php
session_start();

if(!$_SESSION['usuario']) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HPG - Cadastrar viatura</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bulma.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    </head>

<div class="x_panel">
    <div class="container-fluid pt-3 text-white text-center">
        <h1 class="titulo-cadastro">Adicione uma viatura ao estoque:</h1>
        <h7 style="color:grey; font-size:15px"><i class="fas fa-info-circle"></i> Campos com * são obrigatórios</h7>
        <form action="add-viatura.php" method="POST" enctype="multipart/form-data">
            <!-- DIV PROS INPUTS: Placa / Marca -->
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Placa*</span>
                    <input class="form-control" style="font-size: 15px;" maxlength="7" type="text" id="placa" name="placa" required placeholder="Número da placa">
                </div>
            </div>
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Ano</span>
                    <input style="font-size: 15px;" min="4" max="9999" onKeyPress="if(this.value.length==4) return false;" type="number" class="form-control" id="ano" name="ano" placeholder="Ano do veículo">
                </div>
            </div>
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Marca*</span>
                    <input style="font-size: 15px;" maxlength="50" type="text" class="form-control" id="marca" name="marca" required placeholder="Marca do veículo">
                </div>
            </div>
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Modelo*</span>
                    <input style="font-size: 15px;" maxlength="50" type="text" class="form-control" id="modelo" name="modelo" required placeholder="Modelo do veículo">
                </div>
            </div>
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <input style="font-size: 15px;" type="file" accept=".png, .jpg, .jpeg" class="form-control" id="imagem" name="imagem" placeholder="Selecione um arquivo...">
                </div>
            </div>
            <select hidden class="col-lg-2" style="font-size: 15px;" type="text" name="situacao" id="situacao">
                <option value="Em estoque" selected>Em estoque</option>
                <option value="Em uso">Em uso</option>
                <option value="Em manutenção">Em Manutenção</option>
            </select>
            <h7 style="color:grey; font-size:13px;"><i class="fas fa-info-circle"></i> Por favor, envie apenas arquivos com as seguintes extensões: jpg, jpeg ou png.</h7><br><br>
            <button style="font-size: 12px;" type="submit" class="botao-tres"><i class="fas fa-save"></i> Salvar</button>
        </form>
            <?php
                if(isset($_SESSION['status_cadastro'])):
                ?>
                <div class="notification is-success" style="width: 290px; height: 80px; margin-left: 500px; margin-top: 20px;">
                    <button class="delete"></button>
                    <p style="font-size: 15px;">Viatura adicionada ao estoque!</p>
                </div>
                <?php
                endif;
                unset($_SESSION['status_cadastro']);
            ?>
            <?php
                if(isset($_SESSION['placa_existe'])):
                ?>
                <div class="notification is-info" style="width: 290px; height: 100px; margin-left: 500px; margin-top: 20px;">
                    <button class="delete"></button>
                    <p style="font-size: 15px; margin-bottom:5px"><b>Erro!</b></p>
                    <p style="font-size: 15px;">A placa informada já existe.</p>
                </div>
                <?php
                endif;
                unset($_SESSION['placa_existe']);
            ?>
            <div class="col-md-12">
                <div style="margin-top: 20px; padding-left: 10px;">
                    <a href="../viatura/cadastrar-viatura.php"><button type="button" class="btn btn-danger btn-responsive">Viatura</button></a>
                    <a href="../equipamento/cadastrar-equipamento.php"><button type="button" class="btn btn-danger btn-responsive">Equipamento</button></a>
                    <a href="../hidrante/cadastrar-hidrante.php"><button type="button" class="btn btn-danger btn-responsive">Hidrante</button></a>
                </div>
            </div>
            <div class="col-md-12">
                <div style="margin-top: 20px; padding-left: 10px;">
                    <a href="../mapa/mapa-hidrantes.php"><button type="button" class="btn btn-primary btn-responsive"><i class="fa-solid fa-map-location-dot"></i> Mapa</button></a>
                    <a href="../estoque/viatura/estoque-viatura.php"><button type="button" class="btn btn-success btn-responsive"><i class="fa-solid fa-box"></i> Estoque</button></a>
                    <a href="../home.php"><button type="button" style="color:#F5F5F8" class="btn btn-warning btn-responsive"><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
                </div>
            </div>
    </div>
</div>

<?php
    $conexao = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM viaturas";
    $con = $conexao->query($consulta) or die($conexao->error);
?>
    <div class="container-fluid mt-3" style="padding-bottom: 50px;">
        <h4 style="text-align: center; margin-top:30px;">Viaturas:</h4>
        <table id="tabelaViatura" class="table table-hover table-inverse table-bordered table" style="overflow-x: auto; border-color: #444444; margin-top:20px; color:#000000;" border="2">
            <thead>
                <tr>
                    <th style="width: 3%; font-size:13px; color: #000000; background-color:#ff8533"><b>Placa</b></td>
                    <th style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Marca</b></td>
                    <th style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Modelo</b></td>
                    <th style="width: 2%; font-size:13px; color: #000000; background-color:#ff8533"><b>Ano</b></td>
                    <th class="th-sm" style="width: 2%; font-size:13px; color: #000000; background-color:#ff8533"><b>Adicionado</b></th>
                    <!-- <th style="font-s3ze:16px; color: #000000; background-color:#ff8533"><b>Status</b></td> -->
                </tr>
            </thead>
            <tbody>
                <?php while($dado = $con->fetch_array()){ ?>
                <tr>
                    <td style="font-size:12px; text-transform:uppercase;"><?php echo $dado["placa"]; ?></td>
                    <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["marca"]; ?></td>
                    <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["modelo"]; ?></td>
                    <td style="font-size:12px;"><?php echo $dado["ano"]; ?></td>
                    <td style="font-size:12px;"><?php echo date("d/m/Y", strtotime($dado["created_at"])); ?></td>
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

    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
            });
        });
    });

    $(document).ready(function(){
        $('#tabelaViatura').DataTable({
            "scrollX": true,
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

</html>