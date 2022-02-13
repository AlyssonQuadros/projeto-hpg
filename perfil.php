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
    </head>

    <body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Crie a sua conta:</a></h3>
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