<!-- Corpo do site [PARTE DINAMICA]-->
<section class="row">
    <!-- CHAMADA PARA O SLIDE SHOW -->
    <article class="col-xs-12 container-slide">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" ></li>
                <li data-target="#carousel-example-generic" data-slide-to="3" ></li>
                <li data-target="#carousel-example-generic" data-slide-to="4" ></li>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo BASE_URL; ?>/uploads/slideshow/slide_01.jpg" class="img-responsive" alt="Kananda Negócios Imobiliários - website">
                </div>
                <div class="item">
                    <img src="<?php echo BASE_URL; ?>/uploads/slideshow/slide_02.jpg" class="img-responsive" alt="Kananda Negócios Imobiliários - website">
                </div>
                <div class="item">
                    <img src="<?php echo BASE_URL; ?>/uploads/slideshow/slide_03.jpg" class="img-responsive" alt="Kananda Negócios Imobiliários - website">
                </div>
                <div class="item">
                    <img src="<?php echo BASE_URL; ?>/uploads/slideshow/slide_04.jpg" class="img-responsive" alt="Kananda Negócios Imobiliários - website">
                </div>
                <div class="item">
                    <img src="<?php echo BASE_URL; ?>/uploads/slideshow/slide_05.jpg" class="img-responsive"alt="Kananda Negócios Imobiliários - website">
                </div>
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
        <h2 class="font-bold text-center title">CATEGORIAS DOS IMÓVEIS</h2>
        <div class="subl-title"></div>
        <br/>
    </article>

    <!-- DESTAQUE IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a data-toggle="modal" data-target=".bs-casa-modal">
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria_casa.jpg" class="img-responsive" alt=""> 
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
                <a data-toggle="modal" data-target=".bs-casa-modal" >
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria_terreno.jpg" class="img-responsive" alt=""> 
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
                <a data-toggle="modal" data-target=".bs-casa-modal">
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria_empreendimento.jpg" class="img-responsive" alt=""> 
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
                <a data-toggle="modal" data-target=".bs-casa-modal">
                    <img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria_ponto_comercial.jpg" class="img-responsive" alt=""> 
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
        <h2 class="font-bold text-center text-uppercase title">Imóveis Em Destaques</h2>
        <div class="subl-title"></div>
    </article>
    <?php foreach ($imoveis as $imovel) : ?>
        <section class="col-md-3">

            <article class="thumbnail">
                <header class="dest-img">
                    <a href="<?php echo BASE_URL; ?>/imovel/index/<?php echo $imovel['cod_imovel'] ?>">
                        <img src="<?php echo BASE_URL . "/" . $imovel['imagem_imovel']; ?>" class="img-responsive" alt="Kananda Imobiliaria <?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cod " . $imovel['referencia_imovel'] ?>" title="Kananda Negócios Imobiliários - <?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cod " . $imovel['referencia_imovel'] ?>">
                        <p class="text-center title-nome"><?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cod " . $imovel['referencia_imovel'] ?>
                            <br>
                            <span class="title-endereco"> <?php echo $imovel['bairro_endereco'] . ", " . ucwords(strtolower($imovel['cidade_endereco'])) . " - PA" ?></span>
                        </p>
                    </a>
                </header>
                <footer class="caption">
                    <ul class="list-unstyled">
                        <?php
                        $quantide_descricao = 1;
                        if ($imovel["quarto_imovel"] && $quantide_descricao <= 3) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-qua"></span> Quartos: <?php echo $imovel['quarto_imovel'] ?></li>
                            <?php
                        endif;
                        if ($quantide_descricao <= 3 && $imovel['suite_imovel'] && !$imovel['quarto_imovel']) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-qua"></span> Suites: <?php echo $imovel['suite_imovel'] ?></li>
                            <?php
                        endif;
                        if ($imovel["banheiro_imovel"] && $quantide_descricao <= 3) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-ba"></span> Banheiros: <?php echo $imovel['banheiro_imovel'] ?></li>
                            <?php
                        endif;
                        if ($imovel["garagem_imovel"] && $quantide_descricao <= 3) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-gar"></span> Garagem: <?php echo $imovel['garagem_imovel'] ?></li>
                            <?php
                        endif;
                        if ($imovel["area_total_imovel"] && $quantide_descricao <= 3) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-are"></span> Área Total: <?php echo $imovel['area_total_imovel']; ?></li>
                            <?php
                        endif;
                        if ($imovel["largura_imovel"] && $quantide_descricao <= 3) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-larg"></span> Largura: <?php echo $imovel['largura_imovel']; ?></li>
                            <?php
                        endif;
                        if ($imovel["comprimento_imovel"] && $quantide_descricao <= 3) :
                            ++$quantide_descricao;
                            ?>
                            <li><span class="ic-comp"></span> Comprimeito: <?php echo $imovel['comprimento_imovel']; ?></li>
                        <?php endif;
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


<section class="modal fade bs-casa-modal" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg" role="document">
        <section class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-justify" >Casa</h3>
            </header>
            <article class="modal-body">
                <section class="row">
                    <article class="col-md-offset-2 col-md-4">
                        <div class="thumbnail">
                            <a><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/kananda_casa_venda.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para comprar"/>
                                <div class="caption text-center">
                                    COMPRAR
                                </div>
                            </a>
                        </div>
                    </article>
                    <article class="col-md-4">

                        <div class="thumbnail">
                            <a><img src="<?php echo BASE_URL ?>/assets/website/imagens/categoria/kananda_casa_alugar.jpg" alt="KANANDA NEGÓCIOS IMOBILIÁRIOS - IMOBILIARIA - ITAITUBA " title="Kananda Negócios imobiliários - imobiliária - Casa para alugar"/>
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