<?php
session_start();
include("../conexao.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// include("../lib/vendor/autoload.php");

require '../lib/vendor/autoload.php';
$mail = new PHPMailer(true);
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
    <link rel="stylesheet" href="../css/bulma.min.css"/>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

<?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        var_dump($dados);

        $query_usuario = "SELECT id_usuario, nome, email
        FROM usuario
        WHERE email =:email
        LIMIT 1";
        $result_usuario = $conexao->prepare($query_usuario);
        $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_usuario['id_usuario'], PASSWORD_DEFAULT);
            // echo "Chave: $chave_recuperar_senha <br>";

            $query_up_usuario = "UPDATE usuario
                        SET recuperar_senha =:recuperar_senha
                        WHERE id_usuario =:id_usuario
                        LIMIT 1";

            $result_up_usuario = $conexao->prepare($query_up_usuario);
            $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_up_usuario->bindParam(':id_usuario', $row_usuario['id_usuario'], PDO::PARAM_INT);

            if ($result_up_usuario->execute()) {
                echo "http://localhost:8080/usuario/atualizar-senha.php?chave=$chave_recuperar_senha";
            } else {
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }

        } else {
            $_SESSION['msg'] = "<p style='color: green'>Usuario não encontrado!</p>";
        }
    }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title-primary" style="font-size: 50px;">Hidrantes PG</h3>
                    <h4 class="title title-second has-text-black" style="font-size: 20px;">Informe o email cadastrado no sistema:</h4>
                    <div class="box">
                        <form action="" method="POST" name="formSenha">
                            <?php
                                $email = "";
                                if (isset($dados['senha'])) {
                                $email = $dados['senha'];
                            } ?>
                            <div class="field">
                            <h1 style="color:grey; font-size:13px"><i class="fas fa-info-circle"></i> Você receberá um email para recuperar a sua senha</h1>
                                <div class="field">
                                    <label class="label-input">
                                        <i class="far fa-envelope icon-modify"></i>
                                        <input type="email" name="email" class="input is-large" required placeholder="Seu email" value="<?php echo $email?>">
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 20px;">
                                <input type="submit" name="SendRecupSenha" class="botao-um" value="Enviar">
                            </div>
                            <div>
                                <a href="../index.php" style="font-size:14px">Voltar</a>
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