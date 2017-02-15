<!-- Corpo do site [PARTE DINAMICA]-->
<section class="row">
    <article class="col-xs-12 bg-azul title-destaque">
        <h2>
            <strong><?php echo ucwords($imovel) ?></strong><br>
            <small><?php echo ucwords($finalidade) ?></small>
        </h2>
    </article><!-- FIM title-destaque-->
</section>

<!-- CHAMADA PARA LISTA DE IMOVEIS-->
<section class="row">
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
    <!--PAGINACAO-->
    <?php
    if (count($imoveis) > 0) :
        ?>
        <div class="col-xs-12">
            <ul class="pagination">
                <?php
                echo "<li><a href='" . BASE_URL . "/imoveis/" . $metodo_imovel . "/1'>&laquo;</a></li>";
                for ($p = 0; $p <= $paginas; $p++) {
                    if ($pagina_atual == ($p + 1)) {
                        echo "<li class='active'><a href='" . BASE_URL . "/imoveis/" . $metodo_imovel . "/" . ($p + 1) . "'>" . ($p + 1) . "</a></li>";
                    } else {
                        echo "<li><a href='" . BASE_URL . "/imoveis/" . $metodo_imovel . "/" . ($p + 1) . "'>" . ($p + 1) . "</a></li>";
                    }
                }

                echo "<li><a href='" . BASE_URL . "/imoveis/" . $metodo_imovel . "/" . ceil($paginas) . "'>&raquo;</a></li>";
                ?>
            </ul>
        </div>  
        <?php
    endif;
    ?> 
    <!--PAGINACAO-->
</section><!-- FIM DO CHAMADA PARA LISTA DE IMOVEIS-->