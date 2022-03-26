<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HPG - Em estoque</title>
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

<form method="POST" enctype="multipart/form-data">
	<label>NOME</label>
	<input type="text" name="nome">
	<label>EMAIL</label>
	<input type="text" name="email">
	<input type="file" name="foto">
	<input type="submit">
    <img width="40" height="40" src="/equipamento/imagens/DL01.jpeg">
</form>

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'bombeirospg');
    $consulta = "SELECT * FROM equipamentos";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>

<div class="container-fluid mt-3" style="padding-bottom: 50px;">
            <table id="tabelaEquip" class="table table-hover table-bordered" style="border-color: #444444; margin-top:20px; margin-bottom:40px; color:#000000;" border="2">
                <thead>
                    <tr>
                        <th class="th-sm" style="color: #000000; width: 12%; font-size:13px; background-color:#ff8533"><b>Nº Patrimônio</b></th>
                        <th class="th-sm" style="color: #000000; font-size:13px; background-color:#ff8533"><b>Equipamento</b></th>
                        <th class="th-sm" style="color: #000000; width: 10%; font-size:13px; background-color:#ff8533"><b>Condição</b></th>
                        <th class="th-sm" style="color: #000000; width: 10%; font-size:13px; background-color:#ff8533"><b>Situação</b></th>
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
                        <td style="font-size:12px; background-color:#fff; text-transform:capitalize;"><?php echo $dado["condicao"]; ?></td>
                        <td style="font-size:12px; background-color:#fff;">
                            <?php
                                if($dado["situacao"] == 1):
                                ?>
                                    <button type="button" class="btn btn-sm btn-success"><?php echo 'Ativo'?></button>
                                <?php
                                endif;
                            ?>
                            <?php
                                if($dado["situacao"] == 0):
                                ?>
                                    <button type="button" class="btn btn-sm btn-danger"><?php echo 'Inativo'?></button>
                                <?php
                                endif;
                            ?>
                        </td>
                        <td style="font-size:12px; background-color:#fff"><b><?php echo $_SESSION['usuario'];?></b></td>
                        <td style="font-size:12px; background-color:#fff"><?php echo date("d/m/Y", strtotime($dado["created_at"])); ?></td>
                        <td class="text-center" style="font-size:12px; background-color:#fff">
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button style="font-size:12px;" class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-clipboard-list"></i> Mover
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-myTitle="<?php echo $dado["nome"]; ?>">Falar com @fat</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dado["nome"]; ?>">Em uso</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Em manutenção</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Histórico</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Dar baixa</a>
                                    </div>
                                </div>
                                <a style="margin-left:5px" href="<?php echo "edit-equipamento.php?id=".$dado['id_equip']?>"><button style="font-size:12px;" type="button" class="btn btn-sm btn-secondary"><i style="" class="fa-solid fa-pen-to-square"></i> Editar</button></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

<!-- Button trigger modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title" class="col-form-label">Destinatário:</label>
            <input type="text" class="form-control" id="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensagem:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    console.log('resteasarea')
    var button = $(event.relatedTarget)
    var title = button.data('myTitle')

    var modal = $(this)
    modal.find('.modal-body #title').val(title)
    })
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">


<?php
    if(isset($_POST['placa']))
    {
        echo $_POST['marca']. '<br>';
        echo $_POST['modelo']. '<br>';

        if($_FILES['imagem']['type'] == 'image/png'){

            $nome_arquivo = md5($_FILES['imagem']['name'].rand(1,999)).'.png';
            if (isset($_FILES['imagem']))
            {
                move_uploaded_file($_FILES['imagem']['tmp_name'], 'imagens/' .$nome_arquivo);

                 echo 'Imagem enviada com sucesso!';
            }

        }elseif($_FILES['imagem']['type'] == 'image/jpeg'){
            $nome_arquivo = md5($_FILES['imagem']['name'].rand(1,999)).'.jpg';
            if (isset($_FILES['imagem']))
            {
                move_uploaded_file($_FILES['imagem']['tmp_name'], 'imagens/' .$nome_arquivo);

                 echo 'Imagem enviada com sucesso!';
            }
        }else{
            echo "Só é possivel enviar arquivos PNG e JPEG/JPG";
        }
    }
    
?>