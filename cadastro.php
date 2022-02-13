<?php
session_start();
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
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Crie a sua conta:</a></h3>

                    <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <div class="notification is-success">
                      <p>Usuário cadastrado!</p>
                      <p>Entre em sua conta <a href="login.php">aqui</a></p>
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
                                    <input name="nome" type="text" class="input is-large" required placeholder="Nome" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" type="text" class="input is-large" required placeholder="Usuário">
                                </div>
                            </div>
                            <!-- <div class="field">
                                <div class="control">
                                    <input name="email" type="text" class="input is-large" required placeholder="Email">
                                </div>
                            </div> -->
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input is-large" name="InputPassword" id="InputPassword" required placeholder="Senha">
                                    <input style="margin-top: 20px;" type="checkbox" onclick="myFunction()"> Mostrar senha
                                </div>
                            </div>
                            <div class="field" style="margin-top: 10px;">
                                <a href="home.php">Voltar</a>
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
    function myFunction() {
        var x = document.getElementById("InputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>