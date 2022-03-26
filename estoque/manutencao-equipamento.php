<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HPG - Em manutenção</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bulma.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
        <script src="js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
<?php
    $mysqli = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM equipamentos WHERE situacao = 0";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>
    <body style="background-color: #F5F5F8;">
        <h2 style="color: #eb3131f5; margin-left: 10px; padding-top:15px"><i class="fa-solid fa-clipboard-list"></i> Equipamentos em manutenção</h2>

        <div class="row">
            <div class="col-5" style="margin-left: 10px; margin-top: 20px">
                <a href="../estoque/estoque-viatura.php"><button type="button" class="btn btn-danger"><i class="fa-solid fa-truck-medical"></i> Viatura</button></a>
                <a href="../estoque/estoque-equipamento.php"><button type="button" class="btn btn-danger"><i class="fa-solid fa-toolbox"></i> Equipamento</button></a>
                <a href="../estoque/estoque-hidrante.php"><button type="button" class="btn btn-danger"><i class="iconify" data-icon="mdi:fire-hydrant" style="font-size: 22px; vertical-align:top;"></i>Hidrante</button></a>
                <a href="../home.php"><button type="button" style="color:#F5F5F8" class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
            </div>
        </div>
        <hr style="color: #ff6600;">
        <div class="row">
            <div class="col-5">
                <h4 style="margin-top: 10px; margin-left: 10px;"><a href="../equipamento/cadastrar-equipamento.php"><button id="btn-addEstoque" style="font-size: 14px;" type="button" class="btn btn-sm btn-success"><b>+</b> Adicionar</button></a> Equipamentos no estoque:</h4>
            </div>
            <div style="text-align:right; margin-top: 10px; padding-right:23px" class="col-7">
                <a href="/estoque/estoque-equipamento.php"><button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-box"></i> Em estoque</button></a>
                <a href="/estoque/uso-equipamento.php"><button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-box-open"></i> Em uso</button></a>
                <a href="/estoque/manutencao-equipamento.php"><button type="button" class="btn btn-sm btn-warning"><i class="fa-solid fa-screwdriver-wrench"></i> Em manutenção</button></a>
                <a href="/estoque/exportar-equip-uso.php"><button id="btnExportar" type="button"  class="btn btn-sm btn"><i class="fa-solid fa-download"></i> Exportar dados</button></a>
            </div>
            <?php
                if(isset($_SESSION['sucesso_edit'])):
                ?>
                <div class="notification is-success" style="width: 300px; height: 60px; margin-left: 30px;">
                    <button class="delete"></button>
                    <p>Equipamento editado com sucesso</p>
                </div>
                <?php
                endif;
                unset($_SESSION['sucesso_edit']);
                ?>
<!--
                <?php
                if(isset($_SESSION['erro_edit'])):
                ?>
                <div class="notification is-info">
                    <p><b>Erro.</b></p>
                    <p>Usuário já existe.</p>
                </div>
                <?php
                endif;
                unset($_SESSION['erro_edit']);
            ?> -->
        </div>

        <div class="container-fluid mt-3" style="padding-bottom: 50px;">
            <table id="tabelaEquip" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; margin-bottom:40px; color:#000000;" border="2">
                <thead>
                    <tr>
                        <th class="th-sm" style="color: #000000; width: 12%; font-size:13px; background-color:#ff8533"><b>Nº Patrimônio</b></th>
                        <th class="th-sm" style="color: #000000; font-size:13px; background-color:#ff8533"><b>Equipamento</b></th>
                        <th class="th-sm" style="color: #000000; font-size:13px; background-color:#ff8533"><b>Descrição</b></th>
                        <th class="th-sm" style="color: #000000; width: 10%; font-size:13px; background-color:#ff8533"><b>Condição</b></th>
                        <th class="th-sm" style="color: #000000; width: 8%; font-size:13px; background-color:#ff8533"><b>Usuário</b></th>
                        <th class="th-sm" style="color: #000000; width: 8%; font-size:13px; background-color:#ff8533"><b>Data</b></th>
                        <th class="th-sm" style="color: #000000; width: 13%; font-size:13px; text-align:center; background-color:#ff8533"><b>Ação</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($dado = $con->fetch_array()){ ?>
                    <tr>
                        <td style="font-size:12px; background-color:#fff"><?php echo $dado["patrimonio"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["nome"]; ?></td>
                        <td style="font-size:12px; background-color:#fff"><?php echo $dado["descricao"]; ?></td>
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["condicao"]; ?></td>
                        <td style="font-size:12px; background-color:#fff"><?php echo $_SESSION['usuario'];?></td>
                        <td style="font-size:12px; background-color:#fff"><?php echo date("d/m/Y", strtotime($dado["created_at"])); ?></td>
                        <td class="text-center" style="font-size:12px; background-color:#fff">
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button style="font-size:12px;" class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-box-open"></i> Mover
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modalUso">Em uso</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modalEstoque">Em estoque</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modalLog">Histórico</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modalExcluir">Dar baixa</a>
                                    </div>
                                </div>
                                <a style="margin-left:5px" href="<?php echo "editar-equipamento.php?id=".$dado['id_equip']?>"><button style="font-size:12px;" type="button" class="btn btn-sm btn-secondary"><i style="" class="fa-solid fa-pen-to-square"></i> Editar</button></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>

                    <script>
                    $(document).ready(function(){
                        $('#tabelaEquip').DataTable({
                                "pageLength": 20,
                                "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
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
                </tbody>
            </table>
        </div>

        <!-- Modal equipamento em uso -->
        <div class="modal fade" id="modalUso" tabindex="-1" role="dialog" aria-labelledby="modalUsoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUsoLabel">Colocar equipamento em uso:</h5>
                    <i style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </i>
                </div>
                <div class="modal-body">
                    <form action="editar.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <label for="recipient-name" class="col-form-label">Equipamento:</label>
                            <input type="text" class="form-control" id="recipient-name"> -->
                            <h2>Logado como <b><?php echo $_SESSION['usuario'];?></b></h2>
                        </div>
                        <!-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?php echo $_SESSION['usuario'];?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-telefone" class="col-form-label">Telefone:</label>
                            <input type="text" onkeypress="return onlynumber();" class="form-control" id="telefone">
                        </div>
                        <div class="form-group">
                            <label for="recipient-funcao" class="col-form-label">Função:</label>
                            <input type="text" class="form-control" id="recipient-funcao">
                        </div> -->
                        <div class="form-group">
                            <label for="message-obs" class="col-form-label">Observações:</label>
                            <textarea class="form-control" id="message-obs"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="editEquip" style="color:#fff" class="btn btn-warning">Salvar</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal equipamento em estoque -->
        <div class="modal fade" id="modalEstoque" tabindex="-1" role="dialog" aria-labelledby="modalEstoqueLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEstoqueLabel">Colocar equipamento em estoque:</h5>
                    <i style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </i>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal log do equipamento -->
        <div class="modal fade" id="modalLog" tabindex="-1" role="dialog" aria-labelledby="modalLogLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogLabel">Histórico de movimentação do esquipamento:</h5>
                    <i style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </i>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal dar baixa equipamento -->
        <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExcluirLabel">Dar baixa no equipamento:</h5>
                    <i style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </i>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

        <script>

        function onlynumber(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            //var regex = /^[0-9.,]+$/;
            var regex = /^[0-9.]+$/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }

        // 42988288611
        document.getElementById('telefone').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                const $notification = $delete.parentNode;

                $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
                });
            });
        });
        </script>
    </body>
</html>