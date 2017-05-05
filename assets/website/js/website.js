/**
 * 
 * PÁGINA MAPA: Configuração do mapa
 */

if (document.getElementById("view-mapa-imoveis")) {
    var markerCluster = null;
    var map;
    var idInfoBoxAberto;
    var infoBox = [];
    var markers = [];

    function initialize() {
        var latlng = new google.maps.LatLng(-4.254695, -56.005965);

        var options = {
            zoom: 8,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("view-mapa-imoveis"), options);
    }

    initialize();
    carregarPontos("Comprar e Alugar", "Todos");

    function abrirInfoBox(id, marker) {
        if (typeof (idInfoBoxAberto) == 'number' && typeof (infoBox[idInfoBoxAberto]) == 'object') {
            infoBox[idInfoBoxAberto].close();
        }
        infoBox[id].open(map, marker);
        idInfoBoxAberto = id;
    }


    function carregarPontos(finalidade, imovel) {
        if (markerCluster) {
            markerCluster.clearMarkers();
        }

        $.getJSON('assets/website/json/imoveis.json', function (pontos) {

            var latlngbounds = new google.maps.LatLngBounds();

            $.each(pontos, function (index, ponto) {

                if (ponto.finalidade_imovel == finalidade || finalidade == "Comprar e Alugar") {
                    if (ponto.imovel_imovel == imovel || imovel == "Todos") {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(ponto.latitude_endereco, ponto.longitude_endereco),
                            title: "KANANDA IMOBILIÁRIA - IMÓVEL",
                            icon: "/assets/website/imagens/mapa/marcado.png"
                        });

                        var myOptions = {
                            content: "<img src='" + ponto.imagem_imovel + "' class='img-responsive'/><p class='text-center font-bold'>" + ponto.imovel_imovel + " - " + ponto.finalidade_imovel + " - Cod " + ponto.referencia_imovel + "</p> <a style='display: block; witdh: 100%;' href='/imovel/index/" + ponto.cod_imovel + "' class='btn btn-success'> <span class=' glyphicon glyphicon-search'></span> Consulta imóvel</a>",
                            pixelOffset: new google.maps.Size(-150, 0)
                        };

                        infoBox[ponto.cod_imovel] = new InfoBox(myOptions);
                        infoBox[ponto.cod_imovel].marker = marker;

                        infoBox[ponto.cod_imovel].listener = google.maps.event.addListener(marker, 'click', function (e) {
                            abrirInfoBox(ponto.cod_imovel, marker);
                        });

                        markers.push(marker);
                        latlngbounds.extend(marker.position);

                    }
                }
            });
            var mcOptions = {gridSize: 50, maxZoom: 15, imagePath: 'assets/website/imagens/mapa/m'};

            markerCluster = new MarkerClusterer(map, markers, mcOptions);
            map.fitBounds(latlngbounds);
        });

    }

    function remover_markers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    function filtrar_mapa() {
        var finalidade = $("#cFinalidadeMapa").val();
        var imovel = $("#cSelecionaImovelMapa").val();
        remover_markers();
        carregarPontos(finalidade, imovel);
    }

}
/*
 * Carregar categoria de acordo com o tipo do imóvel selecionado
 */
function seleciona_imovel() {
    var imovel = $("#cSelecionaImovel").val();
    var serach_imovel = ['Casa', 'Kitnet', 'Apartamento'];
    if (serach_imovel.indexOf(imovel) > -1) {
        $('div.o').css('display', 'none');
        $('div.a').css('display', 'block');
    } else {
        $('div.a').css('display', 'none');
        $('div.o').css('display', 'block');
    }
    filtra_categoria(imovel, categoria);
}

function filtra_categoria(imovel, categoria) {
    var imoveis = ['Casa', 'Terreno', 'Ponto Comercial', 'Loja Comercial', 'Loteamento', 'Galpão', 'Apartamento', 'Kitnet', 'Chácara', 'Fazenda', 'Área Portuária'];
    var categorias = {
        0: ['Todos', 'Térrea', 'Sobrado', 'Residencial', 'Condomínio'], //casa
        1: ['Todos', 'Urbano', 'Rural', 'Residencial', 'Condomínio', 'Loteamento'], //terreno
        2: ['Todos', 'Térreo', 'Edifício'], //ponto comercial
        3: ['Todos', 'Edifício', 'Shopping'], //loja Comercial
        4: ['Lotes'], //Loteamento
        5: ['Todos', 'Comercial', 'Industrial'], //Galpão
        6: ['Todos', 'Condomínio', 'Edifício'], //Apartamento
        7: ['Todos', 'Térreo', 'Residencial', 'Edifício'], //Kitnet
        8: ['Todos', 'Urbana', 'Rural'], //Chácara
        9: ['Rural'], //Fazenda
        10: ['Porto'] //Área Portuária
    };
    document.getElementById('cCategoria').innerHTML = "";
    var categoria_options = null;
    for (var i = 0; i < categorias[imoveis.indexOf(imovel)].length; i++) {
        if (categorias[imoveis.indexOf(imovel)][i] === categoria) {
            categoria_options += '<option value="' + categorias[imoveis.indexOf(imovel)][i] + '" selected="true">' + categorias[imoveis.indexOf(imovel)][i] + '</option>';
        } else {
            categoria_options += '<option value="' + categorias[imoveis.indexOf(imovel)][i] + '">' + categorias[imoveis.indexOf(imovel)][i] + '</option>';
        }

    }
    document.getElementById('cCategoria').innerHTML = categoria_options;
}

function oculta_busca_avancada() {
    if ($("#cReferencia").val() !== "") {
        $('form#buscar_avancada').css('display', 'none');
        $('p.aviso-de-busca').css('display', 'block');
    } else {
        $('form#buscar_avancada').css('display', 'block');
        $('p.aviso-de-busca').css('display', 'none');
    }
}
$(document).ready(function () {
    seleciona_imovel();
});

/**
 * PÁGINA CONTATO - MAPA
 */
if (document.getElementById("mapa_contato")) {
    function init_map1() {
        var myLocation = new google.maps.LatLng(-4.2668191, -55.995479);
        var mapOptions = {
            center: myLocation,
            zoom: 16
        };
        var marker = new google.maps.Marker({
            position: myLocation,
            title: "Localização dos imoveis da Kananda Imobiliaria!",
            icon: "/assets/website/imagens/mapa/marcado.png"
        });
        var map = new google.maps.Map(document.getElementById("mapa_contato"),
                mapOptions);
        marker.setMap(map);
    }
    init_map1();
}
/**
 * PÁGINA IMÓVEL ESPECÍFICO - MAPA
 */
if (document.getElementById("view-mapa")) {
    var map = null;
    function inicialize_mapa_imovel() {
        if (map == null) {
            var latlng = new google.maps.LatLng(latitude_imovel, longitude_imovel);

            var options = {
                zoom: 14,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("view-mapa"), options);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude_imovel, longitude_imovel),
                title: "Cliente!",
                zoom: 16,
                icon: "/assets/website/imagens/mapa/marcado.png",
                map: map
            });
        }
    }
}