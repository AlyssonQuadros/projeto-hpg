<?php
session_start();

    if(!isset($_GET['id'])){
        die ('id not provided');
    }

    require_once('../conexao.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
    $result = $conexao->query($sql);

    $data = $result->fetch_all();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidrantes PG - Crie sua conta</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 style="color:black; font-size:25px; margin-top: 15px; margin-bottom:15px"><b>Crie a sua conta:</b></a></h1>

                    <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <div class="notification is-success">
                      <p>Usuário cadastrado!</p>
                      <p>Entre em sua conta <a href="logout.php">aqui</a></p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>

                    <?php
                    if(isset($_SESSION['usuario_existe'])):
                    ?>
                    <div class="notification is-info">
                      <p><b>Erro.</b></p>
                      <p>Usuário já existe.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['usuario_existe']);
                    ?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" required placeholder="Nome" value="<?= $data['nome']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" type="text" class="input is-large" required placeholder="Usuário" value="<?= $data['usuario']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="telefone" id="telefone" type="text" class="input is-large" placeholder="Telefone" value="<?= $data['telefone']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="funcao" type="text" class="input is-large" required placeholder="Função" value="<?= $data['funcao']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="email" type="email" class="input is-large" required="email" placeholder="Email" value="<?= $data['email']?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input is-large" name="senha" id="InputPassword" required placeholder="Senha" value="<?= $data['senha']?>">
                                    <input style="margin-top: 20px;" type="checkbox" onclick="verSenha()"> Mostrar senha
                                </div>
                            </div>
                            <div class="field" style="margin-top: 10px;">
                                <a href="../home.php">Voltar</a>
                            </div>
                            <button type="submit" class="botao-um">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

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

function verSenha() {
    var senha = document.getElementById("InputPassword");
    if (senha.type === "password") {
        senha.type = "text";
    } else {
        senha.type = "password";
    }
}

</script>

</html>