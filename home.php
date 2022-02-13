<?php
// session_start();

include('verifica_login.php');

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
    </head>

<header style="padding: 5px; color: #000000;">
        <h2 style="font-weight: bold; text-align:right">Logado como <?php echo $_SESSION['usuario'];?></h2>
        <h2 style="font-weight: bold; text-align:right"><a href="perfil.php">Editar perfil </a> - <a href="logout.php">(Sair)</a></h2>
</header>
<body class="body_um" style="background-image: url('../img/2_GB.png');">
    <div class="frame_um">
        <h2 class="title_um"><b>Menu</b></h2>
            <div class="menu">
                <div>
                    <a href="/mapa/mapa-hidrantes.php"><button class="botao">Mapa de hidrantes</button></a>
                </div>

                <!-- <div>
                    <a href="/tracking.php"><button class="botao">Rastrear viaturas</button></a>
                </div> -->

                <div>
                    <a href="/equipamento/cadastrar-equipamento.php"><button class="botao">Adicionar ao estoque</button></a>
                </div>

                <div>
                    <a href="/estoque/estoque-equipamento.php"><button class="botao">Estoque</button></a> <br/>
                </div>
            </div>
        <div id="cadastro">
            <a href="cadastro.php" style="color: white;">Cadastrar</a>
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