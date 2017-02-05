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

        $.getJSON('json/imoveis.json', function (pontos) {

            var latlngbounds = new google.maps.LatLngBounds();

            $.each(pontos, function (index, ponto) {

                if (ponto.Finalidade == finalidade || finalidade == "Comprar e Alugar") {
                    if (ponto.Imovel == imovel || imovel == "Todos") {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
                            title: "KANANDA IMOBILIÁRIA - IMÓVEL",
                            icon: "../assets/imagens/mapa/marcado.png"
                        });

                        var myOptions = {
                            content: "<p><strong>Imovel: </strong>" + ponto.Imovel + "<br/>  <strong>Finalidade: </strong>" + ponto.Finalidade + "</p>",
                            pixelOffset: new google.maps.Size(-150, 0)
                        };

                        infoBox[ponto.Id] = new InfoBox(myOptions);
                        infoBox[ponto.Id].marker = marker;

                        infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
                            abrirInfoBox(ponto.Id, marker);
                        });

                        markers.push(marker);
                        latlngbounds.extend(marker.position);

                    }
                }
            });
            var mcOptions = {gridSize: 50, maxZoom: 15, imagePath: '../assets/imagens/mapa/m'};

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
$(document).ready(function () {
    selecionaImovel = function () {
        var valor = $("#cSelecionaImovel").val();
        $("#cCategoria option").addClass('ocultar');
        if (valor == "Casa") {
            $(".ca").removeClass('ocultar');
        } else if (valor == 'Terreno') {
            $(".te").removeClass('ocultar');
        } else if (valor == 'Ponto Comercial') {
            $(".pc").removeClass('ocultar');
        } else if (valor == 'Sala / Loja Comercial') {
            $(".slc").removeClass('ocultar');
        } else if (valor == 'Loteamento') {
            $(".lot").removeClass('ocultar');
        } else if (valor == 'Galpão / Barração') {
            $(".gb").removeClass('ocultar');
        } else if (valor == 'Apartamento') {
            $(".ap").removeClass('ocultar');
        } else if (valor == 'Kitnet') {
            $(".kit").removeClass('ocultar');
        } else if (valor == 'Sítio / Chácara') {
            $(".sch").removeClass('ocultar');
        } else if (valor == 'Lote / Fazenda') {
            $(".lof").removeClass('ocultar');
        } else if (valor == 'Área Portuária') {
            $(".ap").removeClass('ocultar');
        }
    };

    /**
     * 
     * Função para ocultar e descultar campos.
     */

    oculta_e_Desoculta = function () {
        var valor = $("#cSelecionaImovel").val();
        if (valor == 'Casa' || valor == 'Apartamento' || valor == 'Kitnet') {
            $(".o").addClass('ocultar');
            $(".a").removeClass('ocultar');
        } else {
            $(".o").removeClass('ocultar');
            $(".a").addClass('ocultar');
        }
    };
    /**
     * função responsável por ocultar e revelar componentes do FILTRO de busca quando a REFERÊNCIA for modificada
     */
    $("#cReferencia").on("focusout", function () {
        if ($(this).val() == '') {
            $("select option").removeAttr('disabled');
            $("#cBuscar02").removeAttr('disabled');
            $('.aviso-de-busca').addClass('ocultar');
        } else {
            $("select option").attr('disabled', true);
            $("#cBuscar02").attr('disabled', true);
            $('.aviso-de-busca').removeClass('ocultar');
        }
    });
    oculta_e_Desoculta();
    selecionaImovel();
    $("#cSelecionaImovel").on("change", selecionaImovel);
    $("#cSelecionaImovel").on("change", oculta_e_Desoculta);

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
            icon: "../assets/imagens/marcado.png"
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
                icon: "../assets/imagens/marcado.png",
                map: map
            });
        }
    }
}