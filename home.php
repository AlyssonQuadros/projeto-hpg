<?php
session_start();

if(!$_SESSION['usuario']) {
    header('Location: ../index.php');
    exit();
}

require_once('conexao.php');
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
        <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    </head>

    <?php if($_SESSION['usuario']){ ?>
        <header style="padding: 5px; color: #000000;">
                <h2 style="text-align:right">Logado como <b><?php echo $_SESSION['usuario'];?> - <a href="/usuario/logout.php">(Sair)</a></b></h2>
                <h2 style="font-weight: bold; text-align:right"><a href="/usuario/editar-perfil.php"><i class="fa-solid fa-user"></i> Editar perfil</a></h2>
        </header>
    <?php } ?>
<body class="body_um" style="background-image: url('/mapa/imagens/2_GB.png');">
<h3 class="title-primary" style="font-size: 55px; margin-left: 510px;">Hidrantes PG</h3>
    <div class="frame_um">
        <h2 class="title_um"><b>Menu</b></h2>
            <div class="menu">
                <div>
                    <a href="/mapa/mapa-hidrantes.php"><button class="botao">Mapa <i class="fa-solid fa-map-location-dot"></i></button></a>
                </div>

                <!-- <div>
                    <a href="/tracking.php"><button class="botao">Rastrear viaturas</button></a>
                </div> -->

                <div>
                    <a href="/equipamento/cadastrar-equipamento.php"><button class="botao">Adicionar ao estoque <i class="fas fa-save"></i></button></a>
                </div>

                <div>
                    <a href="/estoque/viatura/estoque-viatura.php"><button class="botao">Estoque <i class="fa-solid fa-box"></i></button></a> <br/>
                </div>
            </div>
        <div id="cadastro" style="margin-top: 10px;">
            <a href="/usuario/cadastro.php" style="color: white;"><b>Cadastrar usuário</b> <i class="fa-solid fa-user"></i></a>
        </div>
        <div class="social-media">
            <ul class="list-social-media">
                <a class="link-social-media" target="_blank" href="https://www.facebook.com/pages/2o%20Grupamento%20de%20Bombeiros-Ponta%20Grossa/668240370241592/">
                    <li class="item-social-media">
                        <i class="fab fa-facebook-f"></i>
                    </li>
                </a>
                <a class="link-social-media" target="_blank" href="https://www.instagram.com/bombeirospr_pontagrossa/">
                    <li class="item-social-media">
                        <i class="fab fa-instagram"></i>
                    </li>
                </a>
                <a class="link-social-media" target="_blank" href="https://www.bombeiros.pr.gov.br/2GB">
                    <li class="item-social-media">
                        <i class="fas fa-globe"></i>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</body>
</html>