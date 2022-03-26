<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hidrantes</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bulma.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    </head>

<div class="x_panel">
    <div class="container-fluid pt-3 text-white text-center">
        <h1 class="titulo-cadastro">Adicione um hidrante ao estoque:</h1>
        <h7 style="color:grey; font-size:15px"><i class="fas fa-info-circle"></i> Campos com * são obrigatórios</h7>
        <form action="add-hidrante.php" method="POST">
            <!-- DIV PROS DOIS INPUTS: Sigla / Endereço -->
            <div class="container-sm input-group mb-3" style="margin-top: 20px;">
                <div class="col-lg-1">
                    <span style="font-size: 15px;" class="input-group-text">Sigla*</span>
                </div>
                <div class="col-lg-2">
                    <input style="font-size: 15px;" maxlength="20" type="text" class="form-control" id="nome" name="nome" required placeholder="(Ex:DL01, ES01...)">
                </div>
                <div class="col-lg-1" style="margin-left: 95px;">
                    <span style="font-size: 15px;" class="input-group-text">Endereço*</span>
                </div>
                <div class="col-lg-7">
                    <input style="font-size: 15px;" maxlength="100" type="text" class="form-control" id="endereco" name="endereco" required placeholder="Rua onde está localizado o hidrante">
                </div>
            </div>
            <!-- DIV PROS SELECTS: Estado/Tipo/Vazão -->
            <div class="container-sm input-group mb-3">
                <div class="col-lg-1">
                    <span style="font-size: 15px;" class="input-group-text">Condição*</span>
                </div>
                <select class="col-lg-2" style="font-size: 15px;" type="text"  name="condicao" required id="condicao">
                    <option value="">Selecione uma opção...</option>
                    <option value="Boa" icon="/img/fire-hydrant-vermelho.png">Boa</option>
                    <option value="Seco" icon="/img/fire-hydrant-laranja.png">Seco</option>
                    <option value="Emperrado" icon="/img/fire-hydrant-vermelho.png">Emperrado</option>
                    <option value="Espanado" icon="/img/fire-hydrant-laranja.png">Espanado</option>
                    <option value="Enterrado" icon="/img/fire-hydrant-amarelo.png">Enterrado</option>
                    <option value="Registro Profundo" icon="/img/fire-hydrant-vermelho.png">Registro Profundo</option>
                    <option value="Desconhecido" icon="/img/fire-hydrant-laranja.png">Desconhecido</option>
                </select>
                <div class="col-lg-1" style="margin-left: 95px;">
                    <span style="font-size: 15px;" class="input-group-text">Tipo</span>
                </div>
                <select class="col-lg-2" style="font-size: 15px;" type="text"  name="tipo" id="tipo">
                    <option value="">Selecione uma opção...</option>
                    <option value="Subterrâneo">Subterrâneo</option>
                    <option value="Coluna">Coluna</option>
                </select>
                <div class="col-lg-1" style="margin-left: 95px;">
                    <span style="font-size: 15px;" class="input-group-text">Vazão</span>
                </div>
                <select class="col-lg-2" style="font-size: 15px;" type="text"  name="vazao" id="vazao">
                    <option value="">Selecione uma opção...</option>
                    <option value="Boa">Boa</option>
                    <option value="Regular">Regular</option>
                    <option value="Ruim">Ruim</option>
                </select>
            </div>
            <!-- DIV PROS SELECTS: Pressão/Condição/Acesso -->
            <div class="container-sm input-group mb-3">
                <div class="col-lg-1">
                    <span style="font-size: 15px;" class="input-group-text">Pressão</span>
                </div>
                <select class="col-lg-2" style="font-size: 15px;" type="text"  name="pressao" id="pressao">
                    <option value="">Selecione uma opção...</option>
                    <option value="Boa">Boa</option>
                    <option value="Regular">Regular</option>
                    <option value="Ruim">Ruim</option>
                </select>
                <div class="col-lg-1" style="margin-left: 95px;">
                    <span style="font-size: 15px;" class="input-group-text">Status</span>
                </div>
                <select class="col-lg-2" style="font-size: 15px;" type="text"  name="estado" id="estado">
                    <option value="">Selecione uma opção...</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inoperante</option>
                    <option value="manutencao">Manutenção</option>
                </select>
                <div class="col-lg-1" style="margin-left: 95px;">
                    <span style="font-size: 15px;" class="input-group-text">Acesso</span>
                </div>
                <select class="col-lg-2" style="font-size: 15px;" type="text"  name="acesso" id="acesso">
                    <option value="">Selecione uma opção...</option>
                    <option value="Fácil">Fácil</option>
                    <option value="Regular">Regular</option>
                    <option value="Difícil">Difícil</option>
                </select>
            </div>
            <!-- DIV PROS INPUTS: Latitude/Longitude -->
            <div class="container-sm input-group mb-3" style="margin-top: 50px;">
                <div class="col-lg-1">
                    <span style="font-size: 15px;" class="input-group-text">Latitude*</span>
                </div>
                <div class="col-lg-4">
                    <input style="font-size: 15px;" type="float" class="form-control" id="lat" name="lat" required placeholder="(Ex: -25.099885179921507)">
                </div>
                <div class="col-lg-1" style="margin-left: 95px;">
                    <span style="font-size: 15px;" class="input-group-text">Longitude*</span>
                </div>
                <div class="col-lg-4">
                    <input style="font-size: 15px;" type="float" class="form-control" id="lng" name="lng" required placeholder="(Ex: -50.158647345674446)">
                </div>
            </div>
            <!-- DIV PARA INPUT DE IMAGEM testeteste -->
            <div class="container-sm input-group mb-3" style="margin-top: 30px;">
                <div class="col-lg-5">
                    <input style="font-size: 15px;" type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione um arquivo...">
                </div>
            </div><br>
            <button style="font-size: 12px;" type="submit" class="botao-tres"><i class="fas fa-save"></i> Salvar</button>
        </form>
            <?php
                if(isset($_SESSION['status_cadastro'])):
                ?>
                <div class="notification is-success" style="width: 290px; height: 80px; margin-left: 500px; margin-top: 20px;">
                    <button class="delete"></button>
                    <p>Hidrante adicionado ao estoque!</p>
                </div>
                <?php
                endif;
                unset($_SESSION['status_cadastro']);
            ?>
        <div style="margin-top: 20px;">
            <a href="../viatura/cadastrar-viatura.php"><button type="button" class="btn btn-danger">Viatura</button></a>
            <a href="../equipamento/cadastrar-equipamento.php"><button type="button" class="btn btn-danger">Equipamento</button></a>
            <a href="../hidrante/cadastrar-hidrante.php"><button type="button" class="btn btn-danger">Hidrante</button></a>
            <a href="../home.php"><button type="button" style="color:#F5F5F8" class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
        </div>
    </div>
</div>

<?php
    $conexao = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM hidrantes";
    $con = $conexao->query($consulta) or die($conexao->error);
?>
    <div class="container-fluid mt-3" style="padding-bottom: 50px;">
        <h4 style="text-align: center; margin-top:30px;">Hidrantes:</h4>
        <table id="tabelaHidrante" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; margin-bottom:40px; color:#000000;" border="2">
                <thead>
                    <tr>
                        <th style="width: 8%; font-size:13px; color: #000000; background-color:#ff8533"><b>Sigla</b></th>
                        <th style="font-size:13px; color: #000000; background-color:#ff8533"><b>Rua</b></th>
                        <th style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Vazão</b></th>
                        <th style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Pressão</b></th>
                        <th style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Status</b></th>
                        <th style="width: 10%; font-size:13px; color: #000000; background-color:#ff8533"><b>Condição</b></th>
                        <th class="th-sm" style="width: 8%; font-size:13px; color: #000000; background-color:#ff8533"><b>Adicionado</b></th>
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

</html>