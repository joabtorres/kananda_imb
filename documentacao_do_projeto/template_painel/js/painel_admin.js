/**
 * 
 * @author Joab Torres Alencar
 * @description Painel_admin.js criado em 13/09/2016
 */

/**
 * 
 * Iniciando o Tinymce
 */
if (document.getElementById("cDescricao")) {
    tinymce.init({selector: "#cDescricao"});
}



/*
 * Google mapas
 */
var geocoder;
var map;
var marker;

function initialize() {
    var latlng = new google.maps.LatLng(-4.2639141, -55.998396);
    var options = {
        zoom: 14,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("viewMapa"), options);

    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
    });

    marker.setPosition(latlng);
}

$(document).ready(function () {
    if (document.getElementById("viewMapa")) {
        initialize();
        function carregarNoMapa(endereco) {
            geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        $('#cEndereco').val(results[0].formatted_address);
                        $('#cLatitude').val(latitude);
                        $('#cLongitude').val(longitude);

                        var location = new google.maps.LatLng(latitude, longitude);
                        marker.setPosition(location);
                        map.setCenter(location);
                        map.setZoom(16);
                    }
                }
            });
        }

        $("#btnEndereco").click(function () {
            if ($(this).val() !== "")
                carregarNoMapa($("#txtEndereco").val());
        });

        $("#cEndereco").blur(function () {
            if ($(this).val() !== "")
                carregarNoMapa($(this).val());
        });

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#cEndereco').val(results[0].formatted_address);
                        $('#cLatitude').val(marker.getPosition().lat());
                        $('#cLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    }
});
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
 * Adicionando novo campo para foto do imóvel
 */
if (document.getElementById("fotos")) {

    var qtd = $(".viewFotos").filter(function (idx) {
        return $(this);
    }).length;

    qtdImagem = function () {
        var qtd = $(".viewFotos").filter(function (idx) {
            return $(this);
        }).length;
        document.getElementById("qnt_fotos").innerHTML = qtd;
    };
    qtd++;
    /**
     * Função add_imagem
     */
    add_imagem = function () {
        var fotos = document.getElementsByClassName('viewFotos');
        if (fotos.length > 0) {

            container = document.querySelector("#fotos");
            div = document.createElement("div");
            div.setAttribute("class", "form-group col-md-4 container-foto");
            div.setAttribute("id", "foto-" + qtd);

            figure = document.createElement("figure");
            figure.setAttribute("class", "viewFotos");
            p = document.createElement("p");
            p.setAttribute("class", "font-bold");
            p.appendChild(document.createTextNode("Imagem - " + qtd));
            img = document.createElement("img");
            img.setAttribute("src", "imagens/apartamento.jpg");
            img.setAttribute("id", "viewImagem-" + qtd);
            img.setAttribute("alt", "Kananda Imobiliária");
            figcaption = document.createElement("figcaption");
            label = document.createElement("label");
            label.setAttribute("for", "cImagem-" + qtd);
            label.setAttribute("class", "btn btn-primary btn-block ");
            label.appendChild(document.createTextNode("Escolher arquivo"));
            input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("name", "tImagem-" + qtd);
            input.setAttribute("id", "cImagem-" + qtd);
            input.setAttribute("class", "ocultar");
            input.setAttribute("onchange", "readURL(this);");
            span = document.createElement('span');
            span.setAttribute('class', 'btn btn-danger btn-block ');
            span.setAttribute('onclick', 'remover_foto(this);');
            span.appendChild(document.createTextNode('Remover'));
            figcaption.appendChild(label);
            figcaption.appendChild(input);
            figcaption.appendChild(span);
            figure.appendChild(p);
            figure.appendChild(img);
            figure.appendChild(figcaption);
            div.appendChild(figure);
            container.insertBefore(div, container.firstElementChild);
        } else {
            var imagem = document.getElementById("fotos");
            imagem.innerHTML = imagem.innerHTML + '<div class="form-group col-md-4 container-foto" id="foto-1"> <figure class="viewFotos" > <p class="font-bold">Imagem - 1</p><img src="imagens/apartamento.jpg" alt="Imóvel Kananda" id="viewImagem-1"/> <figcaption> <label for="cImagem-1" class="btn btn-primary btn-block ">Escolher arquivo</label> <input type="file" id="cImagem-1" class="ocultar" name="tImagem-1" onchange="readURL(this);"/> <span class="btn btn-danger btn-block" onclick="remover_foto(this);">Remover</span> </figcaption> </figure> </div>';
        }
        qtd++;
        qtdImagem();
    };

    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var num = input.name.replace("tImagem-", "");
            reader.onload = function (e) {
                $("#viewImagem-" + num).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };

    remover_foto = function (obj) {
        var foto = $(obj).parents('.container-foto').attr('id');
        $('#' + foto).remove();
        qtdImagem();
    };
}