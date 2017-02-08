<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Imóveis Cadastrados</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/home"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-list"></span> Imóveis Cadastrados</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <article id="container-imoveis">
                <!-- IMOVEL -->
                <?php foreach ($imoveis as $imovel) : ?>
                    <section class="col-md-4">

                        <article class="thumbnail">
                            <header class="dest-img">
                                <a href="<?php echo BASE_URL; ?>/imovel/index/<?php echo $imovel['cod_imovel'] ?>">
                                    <img src="<?php echo BASE_URL . "/" . $imovel['imagem_imovel']; ?>" class="img-responsive" alt="Imóvel Kananda">
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
                                    <li class="text-center bg-danger"> <span class=" glyphicon glyphicon-eye-open"></span> 30 visualizações</li>
                                    <li><hr></li>
                                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/editar/<?php echo $imovel['cod_imovel'] ?>" class="btn btn-success btn-block">Editar</a></li>
                                    <li><hr></li>
                                    <li><a href="#" class="btn btn-danger btn-block">Excluir</a></li>
                                    <li><hr></li>
                                    <li><a href="<?php echo BASE_URL; ?>/imovel/index/<?php echo $imovel['cod_imovel'] ?>">Consulta imóvel<span class="ic-mais float-right">+</span></a></li>
                                </ul>
                            </footer>
                        </article>
                    </section><!-- FIM IMOVEL -->
                <?php endforeach; ?>

                <div class="col-xs-12">
                    <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </article>
            <!--fim container-imoveis-->
        </div>
        <!--fim row-->

        <footer class="row clear" id="container-footer">
            <div class="col-xs-12">
                <p class="text-right">&copy; Desenvolvido por Joab Torres Alencar.</p>
            </div>
        </footer><!--fim footer e row -->

    </section>
</div>
