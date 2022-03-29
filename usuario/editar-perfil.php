<?php
session_start();

    require_once('../conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidrantes PG - Editar perfil</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h1 style="color:black; font-size:25px; margin-top: 15px; margin-bottom:15px"><b>Edite os seu dados:</b></a></h1>
                    <div class="box">
                        <form action="editar-perfil.php" method="POST">
                        <?php
                            $usuarioLogado = $_SESSION['usuario'];
                            $sql = "SELECT * FROM usuario WHERE usuario = '$usuarioLogado'";

                            $result = mysqli_query($conexao, $sql);

                            if($result){
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
                                    ?>
                                        <div class="field">
                                                <div class="control">
                                                    <input name="nome" type="text" class="input is-large" required placeholder="Nome" value="<?= $row['nome']?>">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="usuario" type="text" class="input is-large" required placeholder="Usuário" value="<?= $row['usuario']?>">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="telefone" id="telefone" type="text" class="input is-large" placeholder="Telefone" value="<?= $row['telefone']?>">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="funcao" type="text" class="input is-large" placeholder="Função" value="<?= $row['funcao']?>">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="email" type="email" class="input is-large" required="email" placeholder="Email" value="<?= $row['email']?>">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input type="password" class="input is-large" name="senha" id="InputPassword" required placeholder="Senha">
                                                    <input style="margin-top: 20px;" type="checkbox" onclick="verSenha()"> Mostrar senha
                                                </div>
                                            </div>
                                            <div class="field" style="margin-top: 10px;">
                                                <a href="../home.php">Voltar</a>
                                        </div>
                                        <input type="submit" name="editUser" id="editUser" class="botao-um" value="Salvar">
                                    <?php
                                    }
                                }
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>

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