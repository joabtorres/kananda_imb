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
    
    <?php 
    if(count($imoveis) < 1){
        echo '<section class="col-xs-12"><h2>Desculpe, nenhum imóvel foi encontrado com essas caracteristicas.</h2></section>';
    }
    
    foreach ($imoveis as $imovel) : ?>
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
                        if ($imovel["area_total_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;

                            echo '<li><span class="ic-are"></span> Área Total: ' . $imovel['area_total_imovel'] . '</li>';
                        }
                        if ($imovel["largura_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;
                            echo '<li><span class="ic-larg"></span> Largura: ' . $imovel['largura_imovel'] . '</li>';
                        }
                        if ($imovel["comprimento_imovel"] && $quantide_descricao <= 3) {
                            ++$quantide_descricao;
                            echo '<li><span class="ic-comp"></span> Comprimeito: ' . $imovel['comprimento_imovel'] . '</li>';
                        }
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