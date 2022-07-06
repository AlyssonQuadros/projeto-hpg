<?php
session_start();

    if(!$_SESSION['usuario']) {
        header('Location: ../../index.php');
        exit();
    }

    if(!isset($_GET['id'])){
        die ('id not provided');
    }

    require_once('../../conexao.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM `equipamentos` WHERE id_equip = $id";
    $result = $conexao->query($sql);

    $data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Equipamentos</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/bulma.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="js/app.js"></script>
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    </head>

<div class="x_panel">
    <div class="container-fluid pt-3 text-white text-center">
        <h1 class="titulo-cadastro">Editar dados do equipamento:</h1>
        <h7 style="color:grey; font-size:15px"><i class="fas fa-info-circle"></i> Campos com * são obrigatórios</h7>
        <form action="edit-equip.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <!-- DIV PRO INPUT: Nº Patrimônio -->
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Nº Patrimônio*</span>
                    <input style="font-size: 15px;" type="text" class="form-control" id="patrimonio" name="patrimonio" value="<?= $data['patrimonio']?>">
                </div>
            </div>
            <!-- DIV PROS INPUTS/SELECT: Nome / Condicao -->
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Nome*</span>
                    <input style="font-size: 15px;" maxlength="100" type="text" class="form-control" id="nome" name="nome" value="<?= $data['nome']?>">
                </div>
            </div>
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Condição*</span>
                    <select class="form-select" style="font-size: 15px;" type="text" required name="condicao" id="condicao">
                        <option value="Boa" <?php echo ($data['condicao'] == 'Boa')?'selected':''; ?>>Boa</option>
                        <option value="Regular" <?php echo ($data['condicao'] == 'Regular')?'selected':''; ?>>Regular</option>
                        <option value="Ruim" <?php echo ($data['condicao'] == 'Ruim')?'selected':''; ?>>Ruim</option>
                    </select>
                </div>
            </div>
            <select hidden class="col-lg-2" style="font-size: 15px;" type="text" name="situacao" id="situacao">
                <option value="Em estoque" selected>Em estoque</option>
                <option value="Em uso">Em uso</option>
                <option value="Em manutenção">Em Manutenção</option>
            </select>
            <!-- DIV PRA DESCRICAO -->
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <span class="input-group-text">Descrição</span>
                    <textarea style="font-size: 15px;" maxlength="200" name="descricao" id="descricao" class="form-control"><?= $data['descricao']?></textarea>
                </div>
            </div>
            <!-- INPUT DE IMAGEM -->
            <div class="col-10 container has-text-centered" style="margin-top: 20px;">
                <div class="input-group">
                    <input style="font-size: 15px;" type="file" accept=".png, .jpg, .jpeg" class="form-control" id="imagem" name="imagem" placeholder="Selecione um arquivo...">
                </div>
            </div>
            <h7 style="color:grey; font-size:13px;"><i class="fas fa-info-circle"></i> Por favor, envie apenas arquivos com as seguintes extensões: jpg, jpeg ou png.</h7><br><br>
            <div class="col-md-12">
                <div style="margin-top: 20px;">
                    <button style="font-size: 12px; margin-top:10px" type="submit" name="editEquip" id="editEquip" class="botao-tres"><i class="fas fa-save"></i> Salvar</button>
                </div>
            </div>
        </form>
        <div class="col-md-12">
            <div style="margin-top: 20px;">
                <a href="/estoque/equipamento/estoque-equipamento.php"><button type="button" style="color:#F5F5F8" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
            </div>
        </div>
    </div>
</div>

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM equipamentos";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>
    <div class="container-fluid mt-3" style="padding-bottom: 50px;">
        <h4 style="text-align: center; margin-top:30px;">Equipamentos:</h4>
        <table id="tabelaEquip" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; color:#000000;" border="2">
            <thead>
                <tr>
                    <th class="th-sm" style="width: 12%; font-size:13px; color: #000000; background-color:#ff8533"><b>Nº Patrimônio</b></th>
                    <th class="th-sm" style="font-size:13px; color: #000000; background-color:#ff8533"><b>Nome</b></th>
                    <th class="th-sm" style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Condição</b></th>
                    <th class="th-sm" style="width: 8%; font-size:13px; color: #000000; background-color:#ff8533"><b>Adicionado</b></th>
                    <!-- <td style="font-s3ze: color: #000000;16px; background-color:#ff8533"><b>Status</b></td> -->
                </tr>
            </thead>
            <tbody>
                <?php while($dado = $con->fetch_array()){ ?>
                <tr>
                    <td style="font-size:12px;"><?php echo $dado["patrimonio"]; ?></td>
                    <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["nome"]; ?></td>
                    <td style="font-size:12px; text-transform:capitalize;"><?php echo $dado["condicao"]; ?></td>
                    <td style="font-size:12px;"><?php echo date("d/m/Y", strtotime($dado["created_at"])); ?></td>
                    <!-- <td style="font-size:14px; text-transform:capitalize;"><?php echo $dado["status"]; ?></td> -->
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
    </script>
    <script>
    $(document).ready(function(){
        $('#tabelaEquip').DataTable({
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