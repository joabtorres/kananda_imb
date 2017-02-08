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
    <!-- IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a href="<?php echo BASE_URL; ?>/imovel">
                    <img src="holder.js/300x170" class="img-responsive" alt=""> 
                    <p class="text-center title-nome">Casa - Venda - Cod 101 	
                        <br>
                        <span class="title-endereco">Bela Vista, Itaituba - PA</span>
                    </p>
                </a>
            </div>
            <div class="caption">
                <ul class="list-unstyled">
                    <li><span class="ic-qua"></span> Quartos: 1</li>
                    <li><span class="ic-ba"></span> Banheiros: 2</li>
                    <li><span class="ic-gar"></span> Garagem: 4</li>
                    <li><hr></li>
                    <li><a href="<?php echo BASE_URL; ?>/imovel">Consulta imóvel<span class="ic-mais float-right">+</span></a></li>
                </ul>
            </div>
        </div>
    </article><!-- FIM IMOVEL -->

    <!-- IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a href="<?php echo BASE_URL; ?>/imovel">
                    <img src="holder.js/300x170" class="img-responsive" alt=""> 
                    <p class="text-center title-nome">Terreno - Venda - Cod 121 	
                        <br>
                        <span class="title-endereco">Bela Vista, Itaituba - PA</span>
                    </p>
                </a>
            </div>
            <div class="caption">
                <ul class="list-unstyled">
                    <li><span class="ic-larg"></span> Largura: 7 metros</li>
                    <li><span class="ic-comp"></span> Comprimeito: 4 metros</li>
                    <li><span class="ic-are"></span> Área Total: 28 metros ²</li>
                    <li><hr></li>
                    <li><a href="<?php echo BASE_URL; ?>/imovel">Consulta imóvel<span class="ic-mais float-right">+</span></a></li>
                </ul>
            </div>
        </div>
    </article><!-- FIM IMOVEL -->

    <!-- IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a href="<?php echo BASE_URL; ?>/imovel">
                    <img src="holder.js/300x170" class="img-responsive" alt=""> 
                    <p class="text-center title-nome">Apartamento - Alugar - Cod 101  	
                        <br>
                        <span class="title-endereco">Bela Vista, Itaituba - PA</span>
                    </p>
                </a>
            </div>
            <div class="caption">
                <ul class="list-unstyled">
                    <li><span class="ic-qua"></span> Suítes: 1</li>
                    <li><span class="ic-ba"></span> Banheiros: 2</li>
                    <li><span class="ic-gar"></span> Garagem: 4</li>
                    <li><hr></li>
                    <li><a href="<?php echo BASE_URL; ?>/imovel">Consulta imóvel<span class="ic-mais float-right">+</span></a></li>
                </ul>
            </div>
        </div>
    </article><!-- FIM IMOVEL -->
    <!-- IMOVEL -->
    <article class="col-md-3">
        <div class="thumbnail">
            <div class="dest-img">
                <a href="<?php echo BASE_URL; ?>/imovel">
                    <img src="holder.js/300x170" class="img-responsive" alt=""> 
                    <p class="text-center title-nome">Sala / Loja Comercial - Venda - Cod 101 	
                        <br>
                        <span class="title-endereco">Bela Vista, Itaituba - PA</span>
                    </p>
                </a>
            </div>
            <div class="caption">
                <ul class="list-unstyled">
                    <li><span class="ic-larg"></span> Largura: 7 metros</li>
                    <li><span class="ic-comp"></span> Comprimeito: 4 metros</li>
                    <li><span class="ic-are"></span> Área Total: 28 metros ²</li>
                    <li><hr></li>
                    <li><a href="<?php echo BASE_URL; ?>/imovel">Consulta imóvel<span class="ic-mais float-right">+</span></a></li>
                </ul>
            </div>
        </div>
    </article><!-- FIM IMOVEL -->
    <!-- FIM LISTA DE IMÓVEIS-->
</section><!-- fim row -->


<section class="modal fade bs-casa-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <article class="modal-dialog modal-lg" role="document">
        <section class="modal-content">
            <header class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Casa</h4>
            </header>
            <article class="modal-body">
                <section class="row">
                    <article class="col-md-offset-2 col-md-4">
                        <div class="thumbnail">
                            <a><img src="holder.js/300x170"/></a>
                            <div class="caption text-center">
                                COMPRAR
                            </div>
                        </div>
                    </article>
                    <article class="col-md-4">

                        <div class="thumbnail">
                            <a><img src="holder.js/300x170"/></a>
                            <div class="caption text-center">
                                ALUGAR
                            </div>
                        </div>
                    </article>
                </section>
            </article>
        </section>
    </article>
</section>