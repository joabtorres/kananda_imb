<!-- Corpo do site [PARTE DINAMICA]-->
<section class="row">
    <!-- CHAMADA PARA O SLIDE SHOW -->
    <article class="col-xs-12 container-slide hidden-xs">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < count($banners); $i++) : ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" <?php echo ($i == 0) ? "class='active'" : "" ?>></li>
                <?php endfor; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php for ($i = 0; $i < count($banners); $i++) : ?>
                    <div class="item <?php echo ($i == 0) ? "active" : "" ?>">
                        <img src="<?php echo BASE_URL . '/' . $banners[$i]['imagem_banner']; ?>" class="img-responsive" alt="Kananda Negócios Imobiliários - website">
                    </div>
                <?php endfor; ?>
            </div>


            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div> <!-- fim do carousel-->

    </article><!-- FIM CHAMADA PARA O SLIDE SHOW -->
</section> <!-- fim row-->

<!--CATEGORIA DOS IMÓVEIS-->
<section class="row ">
    <article class="col-xs-12"> 
        <h2 class="font-bold text-center title">IMÓVEIS</h2>
        <div class="subl-title"></div>
    </article>

    <!-- DESTAQUE IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a data-toggle="modal" data-target=".bs-casa-modal">
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/casa/kananda_imobiliaria_categoria_casa.jpg" class="img-responsive" alt=""> 
                    <h4 class="text-center title-nome">Casa
                    </h4>
                </a>
            </div>
        </div>
    </article><!-- FIM DESTAQUE IMOVEL -->
    <!-- DESTAQUE IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a data-toggle="modal" data-target=".bs-terreno-modal" >
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/terreno/kananda_categoria_terreno.jpg" class="img-responsive" alt=""> 
                    <h4 class="text-center title-nome">Terrenos
                    </h4>
                </a>
            </div>
        </div>
    </article><!-- FIM DESTAQUE IMOVEL -->
    <!-- DESTAQUE IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a href="<?php echo BASE_URL ?>/imoveis/empreendimentos">
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/empreendimento/kananda_categoria_empreendimento.jpg" class="img-responsive" alt=""> 
                    <h4 class="text-center title-nome">Empreendimentos
                    </h4>
                </a>
            </div>
        </div>
    </article><!-- FIM DESTAQUE IMOVEL -->
    <!-- DESTAQUE IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a data-toggle="modal" data-target=".bs-ponto-comercial-modal">
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/ponto-comercial/categoria_ponto_comercial.jpg" class="img-responsive" alt=""> 
                    <h4 class="text-center title-nome">Ponto Comercial
                    </h4>
                </a>
            </div>
        </div>
    </article><!-- FIM DESTAQUE IMOVEL -->
</section>

<!-- CHAMADA PARA LISTA DE IMÓVEIS-->
<section class="row">
    <article class="col-xs-12"> 
        <h2 class="font-bold text-center text-uppercase title">Destaques</h2>
        <div class="subl-title"></div>
    </article>
    <?php foreach ($imoveis as $imovel) : ?>
        <section class="col-md-3">

            <article class="thumbnail">
                <header class="dest-img">
                    <a href="<?php echo BASE_URL; ?>/imovel/index/<?php echo $imovel['cod_imovel'] ?>">
                        <img src="<?php echo BASE_URL . "/" . $imovel['imagem_imovel']; ?>" class="img-responsive" alt="Kananda Imobiliaria <?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cód " . $imovel['referencia_imovel'] ?>" title="Kananda Negócios Imobiliários - <?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cód " . $imovel['referencia_imovel'] ?>">
                        <p class="text-center title-nome"><?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cód " . $imovel['referencia_imovel'] ?>
                            <br>
                            <span class="title-endereco"> <?php echo $imovel['bairro_endereco'] . ", " . ucwords(strtolower($imovel['cidade_endereco'])) . " - PA" ?></span>
                        </p>
                    </a>
                </header>
                <footer class="caption">
                    <ul class="list-unstyled">
                        <?php
                        $quantide_descricao = 1;
                        if ($imovel["suite_imovel"] != 0 && $quantide_descricao <= 3) {
                            ++$quantide_descricao;
                            echo '<li><span class="ic-qua"></span> Suites:' . $imovel['suite_imovel'] . '</li>';
                        }
                        if ($imovel["quarto_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;

                            echo '<li><span class="ic-qua"></span> Quartos: ' . $imovel['quarto_imovel'] . '</li>';
                        }
                        if ($imovel["banheiro_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;

                            echo '<li><span class="ic-ba"></span> Banheiros: ' . $imovel['banheiro_imovel'] . '</li>';
                        }
                        if ($imovel["garagem_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;

                            echo '<li><span class="ic-gar"></span> Vagas: ' . $imovel['garagem_imovel'] . '</li>';
                        }
                        if ($imovel["area_construida_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;

                            echo '<li><span class="ic-are"></span> Área Construida: ' . $imovel['area_construida_imovel'] . '</li>';
                        }
                        if ($imovel["area_total_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;

                            echo '<li><span class="ic-are"></span> Área do Terreno: ' . $imovel['area_total_imovel'] . '</li>';
                        }
                        if ($imovel["largura_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;
                            echo '<li><span class="ic-larg"></span> Largura: ' . $imovel['largura_imovel'] . '</li>';
                        }
                        if ($imovel["comprimento_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;
                            echo '<li><span class="ic-comp"></span> Comprimento: ' . $imovel['comprimento_imovel'] . '</li>';
                        }                   
                                               
                        ?>
                        <li><hr></li>
                        <li><a href="<?php echo BASE_URL; ?>/imovel/index/<?php echo $imovel['cod_imovel'] ?>">Consulta imóvel<span class="ic-mais float-right">+</span></a></li>
                    </ul>
                </footer>
            </article>
        </section><!-- FIM IMOVEL -->
    <?php endforeach; ?>
    <!-- FIM LISTA DE IMÓVEIS-->
</section><!-- fim row -->

<!-- MODAL CASA-->
<section class="modal fade bs-casa-modal" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg" role="document">
        <section class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h3 class="modal-title text-justify" >Casa</h3>
            </header>
            <article class="modal-body">
                <section class="row">
                    <article class="col-md-offset-2 col-md-4">
                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL ?>/imoveis/casa_comprar"><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/casa/kananda_casa_compra.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para comprar"/>
                                <div class="caption text-center">
                                    COMPRAR
                                </div>
                            </a>
                        </div>
                    </article>
                    <article class="col-md-4">

                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL ?>/imoveis/casa_alugar"><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/casa/kananda_casa_alugar.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para alugar"/>
                                <div class="caption text-center">
                                    ALUGAR
                                </div>
                            </a>
                        </div>
                    </article>
                </section>
            </article>
        </section>
    </article>
</section>
<!-- fim MODAL CASA-->


<!-- MODAL Terreno-->
<section class="modal fade bs-terreno-modal" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg" role="document">
        <section class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-justify" >Terreno</h3>
            </header>
            <article class="modal-body">
                <section class="row">
                    <article class="col-md-offset-2 col-md-4">
                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL ?>/imoveis/terreno_comprar"><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/terreno/kananda_terreno_comprar.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para comprar"/>
                                <div class="caption text-center">
                                    COMPRAR
                                </div>
                            </a>
                        </div>
                    </article>
                    <article class="col-md-4">

                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL ?>/imoveis/terreno_alugar"><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/terreno/kananda_terreno_alugar.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para alugar"/>
                                <div class="caption text-center">
                                    ALUGAR
                                </div>
                            </a>
                        </div>
                    </article>
                </section>
            </article>
        </section>
    </article>
</section>
<!-- fim MODAL terrno-->


<!-- MODAL ponto comercial-->
<section class="modal fade bs-ponto-comercial-modal" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg" role="document">
        <section class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-justify" >Ponto Comercial</h3>
            </header>
            <article class="modal-body">
                <section class="row">
                    <article class="col-md-offset-2 col-md-4">
                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL ?>/imoveis/ponto_comercial_comprar"><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/ponto-comercial/kananda_ponto_comercial_comprar.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para comprar"/>
                                <div class="caption text-center">
                                    COMPRAR
                                </div>
                            </a>
                        </div>
                    </article>
                    <article class="col-md-4">

                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL ?>/imoveis/ponto_comercial_alugar"><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/ponto-comercial/ponto_comercial_alugar.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para alugar"/>
                                <div class="caption text-center">
                                    ALUGAR
                                </div>
                            </a>
                        </div>
                    </article>
                </section>
            </article>
        </section>
    </article>
</section>
<!-- fim MODAL ponto comercial-->