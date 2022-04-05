<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidrantes PG - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
    <link rel="stylesheet" href="css/bulma.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title-primary" style="font-size: 50px;">Hidrantes PG</h3>
                    <h3 class="title title-second has-text-black" style="font-size: 25px;">Entre em sua conta:</h3>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="/usuario/login.php" method="POST">
                            <div class="field">
                                <label class="label-input">
                                    <i class="far fa-user icon-modify"></i>
                                    <input name="usuario" type="text" class="input is-large" required placeholder="Seu usuário" autofocus="">
                                </label>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label-input">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input name="senha" class="input is-large" id="InputPassword" type="password" required placeholder="Sua senha">
                                    </label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input style="margin-left: 33px;" type="checkbox" onclick="verSenha()"> Mostrar senha
                                </div>
                            </div>
                            <div style="padding-bottom: 20px;">
                                <button type="submit" class="botao-um">Entrar</button>
                            </div>
                            <div>
                                <a href="/usuario/esqueci-minha-senha.php" style="font-size:14px">Esqueci minha senha</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>

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