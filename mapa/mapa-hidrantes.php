<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>HPG - Mapa de Hidrantes</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://kit.fontawesome.com/19778fe837.js" crossorigin="anonymous"></script>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/412/412858.png">
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .controls {
            background-color: #fff;
            border-radius: 2px;
            border: 1px solid transparent;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            height: 29px;
            margin-left: 15px;
            margin-top: 10px;
            outline: none;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        .controls:focus {
            border-color: #4d90fe;
        }

        .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }
        /*Configurações do estilo da legenda*/
        #legend {
            font-family: Arial, sans-serif;
            background: #fff;
            padding: 10px;
            margin: 10px;
            border: 3px solid #000;
            font-size: small;
            width: 18%;
        }
        #legend h3 {
            margin-top: 0;
        }
        #legend img {
            vertical-align: middle;
            width: 12%;
        }
        @media screen and (max-width: 992px) {
            #legend {
                font-size: large;
                width: 35%;
            }
        }
    </style>
    <script>
        (() => {
            "use strict";
            var e = {
                    d: (t, o) => {
                        for (var n in o)
                            e.o(o, n) &&
                            !e.o(t, n) &&
                            Object.defineProperty(t, n, { enumerable: !0, get: o[n] });
                    },
                    o: (e, t) => Object.prototype.hasOwnProperty.call(e, t),
                    r: (e) => {
                        "undefined" != typeof Symbol &&
                        Symbol.toStringTag &&
                        Object.defineProperty(e, Symbol.toStringTag, {
                            value: "Module",
                        }),
                            Object.defineProperty(e, "__esModule", { value: !0 });
                    },
                },
                t = {};
            function o() {
                const e = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: -25.098930040095645, lng: -50.15789830789235 },
                        zoom: 13,
                });
                //Legenda
                const iconBase = "";
                const icons = {
                    hydrantVerde: {
                        name: "Pressão Boa",
                        icon: iconBase + "/mapa/imagens/fire-hydrant-verde.png",
                        style: 'margin-bottom:80px;'
                    },
                    hydrantAmarelo: {
                        name: "Pressão Regular",
                        icon: iconBase + "/mapa/imagens/fire-hydrant-amarelo.png",
                    },
                    hydrantVermelho: {
                        name: "Pressão Ruim",
                        icon: iconBase + "/mapa/imagens/fire-hydrant-vermelho.png",
                    },
                    hydrantRoxo: {
                        name: "Em Manutenção",
                        icon: iconBase + "/mapa/imagens/fire-hydrant-roxo.png",
                    },
                    hydrantAzul: {
                        name: "Hidrante de Recalque",
                        icon: iconBase + "/mapa/imagens/fire-hydrant-azul.png",
                    },
                    hydrantLaranja: {
                        name: "Novo hidrante",
                        icon: iconBase + "/mapa/imagens/fire-hydrant-laranja.png",
                    },
                };
                const legend = document.getElementById("legend");

                for (const key in icons) {
                    const type = icons[key];
                    const name = type.name;
                    const icon = type.icon;
                    const div = document.createElement("div");

                    div.innerHTML = '<img src="' + icon + '"> ' + name;
                    legend.appendChild(div);
                }
                e.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
                //Verifica a cor que mais se adequa ao hidrante
                function corHidrante(pressao,situacao,tipo){
                    if(situacao == "Manutenção"){
                        return "/mapa/imagens/fire-hydrant-roxo.png";
                    }else if(tipo == "Recalque"){
                        return "/mapa/imagens/fire-hydrant-azul.png";
                    } else if(pressao == "Boa"){
                        return "/mapa/imagens/fire-hydrant-verde.png";
                    } else if(pressao == "Regular"){
                        return "/mapa/imagens/fire-hydrant-amarelo.png";
                    } else {
                        return "/mapa/imagens/fire-hydrant-vermelho.png";
                    }
                }
                //Quartel dos Bombeiros
                const icon = {
                    url: "/mapa/imagens/corpo-de-bombeiros.png", // url
                    scaledSize: new google.maps.Size(40, 40), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };
                const quartel_info = new google.maps.InfoWindow({
                        content:
                            '<img src="/mapa/imagens/quartel.jpg" width="555"/>' +
                            '<h1 id="firstHeading" class="firstHeading" style="font-size:20px"><b>2° Grupamento de Bombeiros - Quartel Central - Ponta Grossa</b></h1>' +
                            '<div><b>Endereço:</b> Praça Roosevelt, 43 - Centro, Ponta Grossa - PR, 84010-690, Brasil</div>',
                    }),
                    quartel = new google.maps.Marker({
                        position: {lat: -25.099881822380315, lng: -50.15864968299866},//-25.099881822380315, -50.15864968299866
                        map: e,
                        title: "Quartel",
                        optimized: true,
                        icon: icon
                        //draggable:true,
                        //animation: google.maps.Animation.DROP //
                    });
                quartel.addListener("click", () => {
                    quartel_info.open({ anchor: quartel, map: e, shouldFocus: !1 });
                });
                //Carrega todos as informações dos hidrantes do banco de dados
                var max_id_hidrante = <?php
                    $mysqli = new mysqli("127.0.0.1", "root", "", "bombeirospg",3306);
                    if (mysqli_connect_errno($mysqli)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $res = mysqli_query($mysqli, "SELECT MAX(`id_hidrantes`) AS _msg FROM `hidrantes`");
                    $row = mysqli_fetch_assoc($res);
                    //echo $row['_msg'];
                    $output = 0 + $row['_msg'];
                    echo json_encode($output, JSON_HEX_TAG);
                    ?>;
                max_id_hidrante += 1;
                //console.log(max_id_hidrante);
                for(var id_h = 0;id_h<max_id_hidrante;id_h++) {
                    const oReq2 = new XMLHttpRequest();
                    oReq2.onload = function () {
                        const infoHidrante = this.responseText;
                        var info = infoHidrante.split(";");
                        if(Number(info[1])!=0 && Number(info[2])!=0) {
                            const icon_h = {
                                url: corHidrante(info[8],info[5]), // url
                                scaledSize: new google.maps.Size(35, 40), // scaled size
                                origin: new google.maps.Point(0,0), // origin
                                anchor: new google.maps.Point(0, 0) // anchor
                            };
                            const hidrante_info = new google.maps.InfoWindow({
                                    content:
                                        '<img src="' + info[11] + '" width="200"/>' +
                                        '<h1 id="firstHeading" class="firstHeading" style="font-size:20px"><b>' + info[3] + '</b></h1><div><b>Endereço: </b>' + info[4] + '</div><div><b>Status: </b>' + info[5] + '</div><div><b>Tipo: </b>' + info[6] + '</div><div><b>Vazão: </b>' + info[7] + '</div><div><b>Pressão: </b>' + info[8] + '</div><div><b>Condição: </b>' + info[9] + '</div><div><b>Acesso: </b>' + info[10] + '</div>',
                                }),
                                hidrante = new google.maps.Marker({
                                    position: {lat: Number(info[1]), lng: Number(info[2])},//-25.150391955508415, -50.18241183373
                                    map: e,
                                    title: info[3],
                                    optimized: true,
                                    icon: icon_h //corHidrante(info[8],info[5])
                                    //draggable:true,
                                    //animation: google.maps.Animation.DROP //
                                });
                            hidrante.addListener("click", () => {
                                hidrante_info.open({anchor: hidrante, map: e, shouldFocus: !1});
                            });
                            //console.log(infoHidrante);
                        }};
                    oReq2.open("get", "obter-info-hidrante.php?id=" + id_h, true);
                    oReq2.send();
                }
                // Realiza o cadastro de um hidrante usando o mapa
                const icon_cad = {
                    url: "/mapa/imagens/fire-hydrant-laranja.png", // url
                    scaledSize: new google.maps.Size(35, 40), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };
                const hidrante_cadastro = new google.maps.InfoWindow({
                                    content:
                                    '<h1 id="firstHeading" class="firstHeading" style="font-size:20px"><b>Cadastrar novo hidrante?</b></h1><div>',
                                }),
                                HidranteCadastro = new google.maps.Marker({
                                    map: e,
                                    title: "Cadastro de Hidrante",
                                    optimized: true,
                                    icon: icon_cad/*'fire-hydrant-laranja.png'*/,
                                    //draggable:true,
                                    animation: google.maps.Animation.DROP 
                                });
                HidranteCadastro.addListener("click", () => {
                    hidrante_cadastro.open({anchor: HidranteCadastro, map: e, shouldFocus: !1});
                });
                e.addListener('click', function(v) {
                    console.log(v.latLng);
                    var clickPosition = v.latLng;
                    const PositionToString = String(clickPosition);
                    const latlngCadastro = PositionToString.split(",");
                    const lat = latlngCadastro[0].split("("); 
                    const lng = latlngCadastro[1].split(")");
                    hidrante_cadastro.setContent('<h1 id="firstHeading" class="firstHeading" style="font-size:20px"><b>Cadastrar um novo hidrante?</b></h1>' +                                                                        
                                    '<form action="add-hidrante.php" method="POST" enctype="multipart/form-data">'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+ 
                                                '<span style="font-size: 15px;" class="input-group-text"><b>Siglaﾠﾠﾠﾠﾠ <b></span>'+
                                                '<input style="font-size: 15px;" maxlength="20" type="text" class="form-control" id="nome" name="nome" placeholder="Nome do hidrante">'+
                                            '</div>' +
                                        '</div>'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Endereçoﾠ </span>'+
                                                '<input style="font-size: 15px;" maxlength="100" type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua">'+
                                            '</div>'+                                            
                                        '</div>'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Statusﾠﾠﾠﾠ</span>'+
                                                '<select style="font-size: 15px;" id="situacao" name="situacao">'+
                                                    '<option value="Nenhum">Nenhum</option>'+
                                                    '<option value="Ativo">Ativo</option>'+
                                                    '<option value="Manutencao">Em Manutenção</option>'+
                                                '</select>'+
                                            '</div>'+                                                
                                        '</div>'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Tipoﾠﾠﾠﾠﾠﾠ</span>'+
                                                '<input style="font-size: 15px;" maxlength="20" type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo">'+
                                            '</div>'+                                                
                                        '</div>'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Vazãoﾠﾠﾠﾠ </span>'+
                                                '<input style="font-size: 15px;" maxlength="20" type="text" class="form-control" id="vazao" name="vazao" placeholder="vazao">'+
                                            '</div>'+                                                
                                        '</div>'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Pressãoﾠﾠ </span>'+
                                                '<select style="font-size: 15px;" id="pressao" name="pressao">'+
                                                    '<option value="Boa">Boa</option>'+
                                                    '<option value="Regular">Regular</option>'+
                                                    '<option value="Ruim">Ruim/Indisponível</option>'+
                                                '</select>'+
                                            '</div>'+                                                
                                        '</div>'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Condiçãoﾠ </span>'+
                                                '<input style="font-size: 15px;" maxlength="20" type="text" class="form-control" id="condicao" name="condicao" placeholder="condicao">'+
                                            '</div>'+                                                
                                        '</div>'+                                        
                                        '<input type="hidden" value="'+ Number(lat[1]) +'" id="lat" name="lat">'+                                        
                                        '<input type="hidden" value="'+ Number(lng[0]) +'" id="lng" name="lng">'+
                                        '<div class="container-sm input-group mb-3">'+
                                            '<div class="col-lg-3.1">'+
                                                '<span style="font-size: 15px;" class="input-group-text">Imagemﾠﾠ </span>'+
                                                '<input style="font-size: 15px;" type="file" id="imagem" name="imagem">'+
                                            '</div>'+                                                
                                        '</div><br>'+
                                        '<input style="font-size: 12px;" type="submit" class="botao-tres" value="Adicionar">'+
                                    '</form>')    
                    HidranteCadastro.setPosition(clickPosition);
                    HidranteCadastro.setAnimation(google.maps.Animation.DROP);
                });
                // Viatura
                //recupera latitude do banco de dados
                var max_id = <?php
                    $mysqli = new mysqli("127.0.0.1", "root", "", "bombeirospg",3306);
                    if (mysqli_connect_errno($mysqli)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $res = mysqli_query($mysqli, "SELECT MAX(`id_viaturas`) AS _msg FROM `viaturas`");
                    $row = mysqli_fetch_assoc($res);
                    //echo $row['_msg'];
                    $output = 0 + $row['_msg'];
                    echo json_encode($output, JSON_HEX_TAG);
                    ?>;
                max_id += 1;
                //console.log(max_id);
                for(var id = 0;id<max_id;id++) {
                    const oReq = new XMLHttpRequest();
                    oReq.onload = function () {
                        const latLng = this.responseText;
                        var coordenada = latLng.split(";");
                        if(Number(coordenada[1])!=0 && Number(coordenada[2])!=0){
                        const icon_v = {
                            url: "/mapa/imagens/viatura.png", // url
                            scaledSize: new google.maps.Size(70, 50), // scaled size
                            origin: new google.maps.Point(0,0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                        };
                        var Viatura_info = new google.maps.InfoWindow({
                                content:
                                    '<img src="'+coordenada[4]+'" width="300"/><h1 id="firstHeading" class="firstHeading" style="font-size:20px"><b>Viatura</b></h1><div><b>Placa: </b>'+ coordenada[3] +'</div>',
                            }),
                            Viatura = new google.maps.Marker({
                                position: {lat: Number(coordenada[1]), lng: Number(coordenada[2])},//-25.098930040095645, lng: -50.15789830789235
                                map: e,
                                title: "Viatura",
                                //label: 'V',
                                optimized: true,
                                icon: icon_v /*'viatura.png'*/
                                //draggable:true,
                                //animation: google.maps.Animation.DROP
                            });
                        Viatura.addListener("click", () => {
                            Viatura_info.open({anchor: Viatura, map: e, shouldFocus: !1});
                        });
                        //console.log(latLng);
                    }};
                    oReq.open("get", "obter-latLng-viatura.php?id=" + id, true);
                    oReq.send();
                }
                t = document.getElementById("pac-input"),
                    o = new google.maps.places.Autocomplete(t);
                o.bindTo("bounds", e),
                    o.setFields(["place_id", "geometry", "formatted_address", "name"]),
                    e.controls[google.maps.ControlPosition.TOP_LEFT].push(t);
                const n = new google.maps.InfoWindow(),
                    a = document.getElementById("infowindow-content");
                n.setContent(a);
                const d = new google.maps.Marker({ map: e });
                d.addListener("click", () => {
                    n.open(e, d);
                }),
                    o.addListener("place_changed", () => {
                        n.close();
                        const t = o.getPlace();
                        t.geometry &&
                        t.geometry.location &&
                        (t.geometry.viewport
                            ? e.fitBounds(t.geometry.viewport)
                            : (e.setCenter(t.geometry.location), e.setZoom(17)),
                            d.setPlace({
                                placeId: t.place_id,
                                location: t.geometry.location,
                            }),
                            d.setVisible(!0),
                            (a.children.namedItem("place-name").textContent = t.name),
                            (a.children.namedItem("place-address").textContent =
                                t.formatted_address),
                            n.open(e, d));
                    });
            }
            e.r(t), e.d(t, { initMap: () => o });
            var n = window;
            for (var a in t) n[a] = t[a];
            t.__esModule && Object.defineProperty(n, "__esModule", { value: !0 });
        })();
    </script>
</head>
<body>
<div style="display: none">
    <input
            id="pac-input"
            class="controls"
            type="text"
            placeholder="Digite o endereço..."
    />
</div>
<div id="map"></div>
<div id="legend">
    <h3>Legenda</h3>
    <h4><i class="fas fa-info-circle"></i> Clique sobre o mapa, e em <br> seguida sobre o hidrante laranja <br> para cadastrar um novo hidrante.</h4>
</div>
<div id="infowindow-content">
    <span id="place-name" class="title"></span><br />
    <span id="place-address"></span>
</div>
<!-- //src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG8H1jjp6sbZiT2rBgoIINxRhyDtwT6p0&callback=initMap&libraries=places&v=weekly" -->
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmfker42DDXqD8VMfZTipAbguGwVq7s70&callback=initMap&libraries=places&v=weekly"
        async
></script>
</body>
</html>