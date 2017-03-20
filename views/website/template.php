<!-- PARA EVITA QUE USUÁRIO VEJA A LISTA DE ARQUIVOS -->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kananda Negócios Imobiliários</title>
        <?php if (isset($viewData['imovel']['cod_imovel'])) : ?>
            <meta property="og:url"           content="<?php echo BASE_URL . '/imovel/index/' . $viewData['imovel']['cod_imovel'] ?>" />
            <meta property="og:type"          content="website" />
            <meta property="og:title"         content="Kananda Negócios Imobiliários - <?php echo $viewData['imovel']['imovel_imovel'] . ' - ' . $viewData['imovel']['finalidade_imovel'] . ' - ' . $viewData['imovel']['categoria_imovel']; ?>" />
            <meta property="og:description"   content="Você já visitou o nosso website? Não? Então visite agora mesmo e confira este imóvel, quem sabe seja aquele em que você procura." />
            <meta property="og:image"         content="<?php echo BASE_URL . '/' . $viewData['imovel']['imagem_imovel']; ?>" />
        <?php endif; ?>

        <link href="<?php echo BASE_URL ?>/assets/website/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="<?php echo BASE_URL ?>/assets/website/css/fotorama.css" rel="stylesheet"/>
        <link href="<?php echo BASE_URL ?>/assets/website/css/estilo.min.css" rel="stylesheet"/>
    </head>
    <body>
        <?php if (isset($viewData['imovel']['cod_imovel'])) : ?>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
        <?php endif; ?>
        <div class="container-fluid" id="container-site">
            <!-- Cabeçalho do site[PARTE ESTÁTICA] -->
            <header class="row bg-branco" id="header">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a href="<?php echo BASE_URL; ?>/home"><img src="<?php echo BASE_URL; ?>/uploads/logo.png" class="img-responsive img-center" alt="Kananda Negócios Imobiliários"/></a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-principal-kananda">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="menu-principal-kananda">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo BASE_URL; ?>/home">INÍCIO <span class="sr-only">(current)</span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">COMPRAR <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/casa_comprar">Casa</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/terreno_comprar">Terreno</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/empreendimentos">Empreendimentos</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/ponto_comercial_comprar">Ponto Comercial</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>/imoveis/apartamento_comprar">Apartamento</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/area_portuaria_comprar">Área Portuaria</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">ALUGAR <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/casa_alugar">Casa</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/terreno_alugar">Terreno</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/empreendimentos">Empreendimentos</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/ponto_comercial_alugar">Ponto Comercial</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>/imoveis/apartamento_alugar">Apartamento</a></li>
                                        <li><a  href="<?php echo BASE_URL; ?>/imoveis/area_portuaria_alugar">Área Portuaria</a></li>
                                    </ul>
                                </li>
                                <li><a href="/mapa">Mapa</a></li>
                                <li><a href="/servico">Serviços</a></li>
                                <li><a href="/sobre">Sobre</a></li>
                                <li><a href="/contato">Contato</a></li>
                                <li class="active"><a data-toggle="modal" data-target="#buscarImovel">Pesquisar Imóvel</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>


            <!-- Modal -->
            <div class="modal fade" id="buscarImovel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            PESQUISAR IMÓVEIS
                        </div>
                        <div class="modal-body">
                            <section class="panel panel-primary">
                                <header class="panel-heading"><strong class="font-bold">PESQUISAR IMÓVEIS</strong></header>
                                <article class="panel-body">
                                    <div class="row"> <!-- buscar rápida -->
                                        <div class="col-md-12">
                                            <h4 class="font-bold">Busca Rápida</h4>
                                            <form  action="<?php echo BASE_URL ?>/imoveis/buscar" method='post' role="form">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cReferencia" name="tReferencia" placeholder="Código do Imóvel" onkeypress="oculta_busca_avancada();" onblur="oculta_busca_avancada();">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary" name="tBuscaRapida" id="cBuscar" type="submit"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>  <!-- fim buscar rápida -->
                                    <hr>

                                    <div class="row" ><!-- buscar avançada -->
                                        <div class="col-md-12">
                                            <p class="bg-danger btn-lg ocultar aviso-de-busca">Aviso: <small>Caso deseje fazer uma busca avançada remova o 'código do imóvel' informado a acima.</small></p>
                                            <form action="<?php echo BASE_URL ?>/imoveis/buscar" method='post' role="form" class="form" id="buscar_avancada">                
                                                <h4 class="font-bold">Busca Avançada</h4>
                                                <div class="form-group col-md-4">
                                                    <label for="cSelecionaImovel">Imóvel: </label>
                                                    <script> var categoria = null;</script>
                                                    <select name="tSelecionaImovel" id="cSelecionaImovel" class="form-control" onchange="seleciona_imovel();">
                                                        <?php
                                                        //ESTE PROCEDIMENTO VAI CONSULTA O ARQUIVO JSON PARA LISTA OS IMÓVEIS
                                                        $nomeImovel = array();
                                                        $imoveis = array();
                                                        if (file_exists('assets/website/json/imoveis.json')) {
                                                            $imoveis = json_decode(file_get_contents('assets/website/json/imoveis.json'));
                                                            foreach ($imoveis as $indice) {
                                                                foreach ($indice as $imovel => $campo) {
                                                                    if ('imovel_imovel' == $imovel) {
                                                                        $nomeImovel[] = $campo;
                                                                    }
                                                                }
                                                            }
                                                            $nomeImovel = array_unique($nomeImovel);
                                                        }
                                                        foreach ($nomeImovel as $imovel) {
                                                            echo '<option value="' . $imovel . '">' . $imovel . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4"> 
                                                    <label for="cFinalidade">Finalidade: </label>
                                                    <select name="tFinalidade" id="cFinalidade" class="form-control ">
                                                        <option value="Comprar e Alugar">Comprar e Alugar</option>
                                                        <option value="Comprar">Comprar</option>
                                                        <option value="Alugar">Alugar</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4 cCategoria"> 
                                                    <label for="cCategoria">Categoria: </label>
                                                    <select name="tCategoria" id="cCategoria" class="form-control "></select>
                                                </div>

                                                <!-- --------------------------
                                                SUÍTES, QUARTOS, BANHEIROS, GARAGENS
                                            ---------------------------- -->
                                                <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                                    <label for="cSelecionaQntSuites">Suite (s): </label>
                                                    <select name="tSelecionaQntSuites" id="cSelecionaQntSuites" class="form-control">
                                                        <option value="0" selected>Todos</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="+">mais de 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                                    <label for="cSelecionaQntQuarto">Quarto (s): </label>
                                                    <select name="tSelecionaQntQuarto" id="cSelecionaQntQuarto" class="form-control">
                                                        <option value="0" selected>Todos</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="+">mais de 5</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                                    <label for="cSelecionaQntSuites">Banheiro (s): </label>
                                                    <select name="tSelecionaQntSuites" id="cSelecionaQntSuites" class="form-control">
                                                        <option value="0" selected>Todos</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="+">mais de 5</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                                    <label for="cSelecionaqntGaragem">Vaga (s): </label>
                                                    <select name="tSelecionaqntGaragem" id="cSelecionaqntGaragem" class="form-control">
                                                        <option value="0" selected>Todas</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>                                                
                                                        <option value="+">mais de 5</option>
                                                    </select>
                                                </div>
                                                <!-- --------------------------
                                                QUARTO, SUITES, GARAGEM
                                            ---------------------------- -->

                                                <!-- --------------------------
                                                INICIO Largura, Comprimento
                                             ---------------------------- -->

                                                <div class="form-group col-md-6 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
                                                    <label for="cLargura">Largura: </label>
                                                    <input type="text" class="form-control " id="cLargura" name="tLargura" placeholder="Ex: 5,20 m">

                                                </div>
                                                <div class="form-group col-md-6 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
                                                    <label for="cComprimento">Comprimento: </label> 
                                                    <input type="text" class="form-control" id="cComprimento" name="tComprimento" placeholder="Ex: 10 m">
                                                </div>
                                                <!-- --------------------------
                                                FIM Largura, Comprimento
                                             ---------------------------- -->
                                                <div class="form-group col-md-12">
                                                    <label for="cSelecionaBairro">Bairro: </label>
                                                    <select name="tSelecionaBairro" id="cSelecionaBairro" class="form-control">
                                                        <option value="Todos" selected>Todos</option>
                                                        <option value="Bela vista">Bela vista</option>
                                                        <option value="Boa Esperança">Boa Esperança</option>
                                                        <option value="Bom Jardim">Bom Jardim</option>
                                                        <option value="Bom Remédio">Bom Remédio</option>
                                                        <option value="Centro">Centro</option>
                                                        <option value="Floresta">Floresta</option>
                                                        <option value="Jardim Aeroporto">Jardim Aeroporto</option>
                                                        <option value="Jardim América">Jardim América</option>
                                                        <option value="Jardim Das Araras">Jardim Das Araras</option>
                                                        <option value="Jardim Tapajós">Jardim Tapajós</option>
                                                        <option value="Liberdade">Liberdade</option>
                                                        <option value="Maria Madalena">Maria Madalena</option>
                                                        <option value="Nova Itaituba">Nova Itaituba</option>
                                                        <option value="Novo Paraíso">Novo Paraíso</option>
                                                        <option value="Perpétuo Socorro">Perpétuo Socorro</option>
                                                        <option value="Piracanã">Piracanã</option>
                                                        <option value="Residencial Vale Do Piracanã">Residencial Vale Do Piracanã</option>
                                                        <option value="Residencial Viva Itaituba">Residencial Viva Itaituba</option>
                                                        <option value="Residencial Wirland Freire">Residencial Wirland Freire</option>  
                                                        <option value="Santo Antõnio">Santo Antõnio</option>  
                                                        <option value="São Francisco">São Francisco</option>  
                                                        <option value="SÃO JOSÉ">São José</option>  
                                                        <option value="Vale do Tapajós">Vale do Tapajós</option>  
                                                        <option value="Valmirlândia">Valmirlândia</option>  
                                                        <option value="Vitória-Régie">Vitória-Régie</option>
                                                        <option value="Zona Rural">Zona Rural</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr>
                                                    <button type="submit" name="tBuscarAvancada" id="cBuscar02" class="btn btn-primary float-right"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>         
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- fim buscar avançada -->
                                </article>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <?php $this->loadViewInTemplate($viewName, $viewData) ?>

            <!-- Rodapé do site[PARTE ESTÁTICA] -->
            <footer class="row" id="rodape">
                <section class="col-xs-12">
                    <article class="col-md-3 col-lg-3">
                        <h3><strong>Sobre</strong></h3>
                        <p class="text-justify">A empresa Gusmão Empreendimentos, com o objetivo inovador, iniciou suas atividades no ano de 2008 na cidade de Itaituba. Os irmãos Queila Gusmão e Alex Gusmão, com ... <a href="<?php echo BASE_URL . '/sobre' ?>">continua lendo &raquo;</a> </p>
                    </article>
                    <article class="col-md-offset-2 col-md-offset-2 col-md-4 col-lg-4">
                        <h3><strong>Contato</strong></h3>
                        <ul class="list-unstyled">
                            <li>Rua 4ª  (Quarta), nº 361 - Floresta - Itaituba - PA</li>   
                            <li><strong>Fixo:</strong>  (93) 3518-0367</li>
                            <li><strong>VIVO:</strong> (93) 99242-2027</li>
                            <li><strong>WhatsApp:</strong> (93) 98124-3015</li>
                            <li><strong>Email:</strong> contato@kananda.imb.br</li>
                        </ul>
                    </article>
                    <article class="col-md-3 col-lg-3">
                        <h3><strong>Horário de atendimento</strong></h3>
                        <ul class="list-unstyled">
                            <li>Horário de antendimento:</li>
                            <li><br/></li>
                            <li><strong>Segunda a Sexta</strong></li>
                            <li>09:00h as 13:00h | 15:00h as 18:00h</li>
                        </ul>
                    </article>
                    <div class="col-xs-12">
                        <hr>
                        <p class="text-center">
                            &copy; 2008-2017 - Kananda.imb.br | Todos os direitos reservados <br/>
                            É proibida a reprodução total ou parcial de qualquer conteúdo deste site.</p>
                    </div>
                </section>
            </footer><!-- FIM Rodapé do site[PARTE ESTÁTICA]-->
        </div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/painel_admin/js/jquery.js"></script>
        <!-- CHAMANDO JS DO BOOTSTRAP -->
        <script src="<?php echo BASE_URL; ?>/assets/website/js/bootstrap.min.js"></script>
        <!-- CHAMANDO JS DO GoogleMaps -->
        <!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDSYhQBpietuGLZpbqne3SB1iKHUiiGKiI&sensor=false"></script>;-->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&sensor=false"></script>
        <!-- Arquivo de inicialização do mapa -->
        <script src="<?php echo BASE_URL; ?>/assets/website/js/infobox.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/website/js/markerclusterer.js"></script>
        <!-- CHAMANDO JS DO WEBSITE -->
        <script src="<?php echo BASE_URL; ?>/assets/website/js/fotorama.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/website/js/website.js"></script>
        <!--temporário-->
        <script src="<?php echo BASE_URL; ?>/assets/website/js/holder.min.js"></script>
    </body>
</html>