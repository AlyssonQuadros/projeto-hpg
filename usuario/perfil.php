<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hidrantes PG - Menu</title>
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
        <link rel="stylesheet" href="css/bulma.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Editar dados:</a></h3>
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
                            <div class="field">
                                <div class="control">
                                    <input name="email" type="email" class="input is-large" required placeholder="Email">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input is-large" name="InputPassword" id="InputPassword" required placeholder="Senha">
                                    <input style="margin-top: 20px;" type="checkbox" onclick="verSenha()"> Mostrar senha
                                </div>
                            </div>
                            <div class="field" style="margin-top: 10px; color:red">
                                <a href="home.php"><i class="fa-solid fa-trash-can"></i> Deletar conta</a>
                            </div>
                            <button type="submit" class="botao-um"><i class="fas fa-save"></i> Salvar</button>
                            <div class="field" style="margin-top: 10px;">
                                <a href="home.php">Voltar</a>
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