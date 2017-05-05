<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Pesquisar Imóveis</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/home"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-search"></span> Pesquisar Imóveis</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <article class="col-md-12">
                <section class="panel panel-primary">
                    <header class="panel-heading"><strong class="font-bold">PESQUISAR IMÓVEIS</strong></header>
                    <article class="panel-body">
                        <div class="row"> <!-- buscar rápida -->
                            <div class="col-md-12">
                                <h4 class="font-bold">Busca Rápida</h4>
                                <form method='post' role="form">
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
                                <form method='post' role="form" class="form" id="buscar_avancada">                
                                    <h4 class="font-bold">Busca Avançada</h4>
                                    <div class="form-group col-md-4">
                                        <label for="cSelecionaImovel">Imóvel: </label>

                                        <select name="tSelecionaImovel" id="cSelecionaImovel" class="form-control" onchange="seleciona_imovel();">
                                            <?php
                                            foreach ($nome_imoveis as $nome) :
                                                echo '<option value="' . $nome . '">' . $nome . '</option>';
                                            endforeach;
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
                                        <script> var categoria = null;</script>
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
                                        <label for="cSelectQntBanheiro">Banheiro (s): </label>
                                        <select name="nSelectQntBanheiro" id="cSelectQntBanheiro" class="form-control">
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
                                        <hr>
                                        <button type="submit" name="tBuscarAvancada" id="cBuscar02" class="btn btn-primary float-right"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>         
                                    </div>
                                </form>
                            </div>
                        </div><!-- fim buscar avançada -->
                    </article>
                </section>
            </article>
            <article id="container-imoveis">
                <!-- IMOVEL -->
                <?php foreach ($imoveis as $imovel) : ?>
                    <section class="col-md-4">

                        <article class="thumbnail">
                            <header class="dest-img">
                                <a href="<?php echo BASE_URL; ?>/imovel/index/<?php echo $imovel['cod_imovel'] ?>">
                                    <img src="<?php echo BASE_URL . "/" . $imovel['imagem_imovel']; ?>" class="img-responsive" alt="Imóvel Kananda">
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
                                    <li class="text-center bg-danger"> <span class=" glyphicon glyphicon-eye-open"></span> <?php echo $imovel['quantidade_visita'] ?> visualizações</li>
                                    <li><hr></li>
                                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/editar/<?php echo $imovel['cod_imovel'] ?>" class="btn btn-success btn-block">Editar</a></li>
                                    <li><hr></li>
                                    <li><a data-toggle="modal" data-target="<?php echo '#model_' . $imovel['cod_imovel'] . '_' . $imovel['referencia_imovel']; ?>" class="btn btn-danger btn-block">Excluir</a></li>
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
                            echo "<li><a href='" . BASE_URL . "/painel_admin/imoveis/pesquisar/1'>&laquo;</a></li>";
                            for ($p = 0; $p < ceil($paginas); $p++) {
                                if ($pagina_atual == ($p + 1)) {
                                    echo "<li class='active'><a href='" . BASE_URL . "/painel_admin/imoveis/pesquisar/" . ($p + 1) . "'>" . ($p + 1) . "</a></li>";
                                } else {
                                    echo "<li><a href='" . BASE_URL . "/painel_admin/imoveis/pesquisar/" . ($p + 1) . "'>" . ($p + 1) . "</a></li>";
                                }
                            }

                            echo "<li><a href='" . BASE_URL . "/painel_admin/imoveis/pesquisar/" . ceil($paginas) . "'>&raquo;</a></li>";
                            ?>
                        </ul>
                    </div>  
                    <?php
                endif;
                ?> 
                <!--PAGINACAO-->
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
<!-- /#page-wrapper -->

<?php
foreach ($imoveis as $imovel):
    ?>
    <!--MODEL-->
    <div class="modal fade" id="model_<?php echo $imovel['cod_imovel'] . '_' . $imovel['referencia_imovel'] ?>" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <section class="modal-content">
                <header class="modal-header  alert alert-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Deseja excluir este imóvel?</h4>
                </header>
                <article class="modal-body">

                    <p class="text-justify title-nome"> <span class="font-bold">Imóvel</span> <br/> <?php echo $imovel['imovel_imovel'] . " - " . $imovel['finalidade_imovel'] . " - Cód " . $imovel['referencia_imovel'] ?>
                        <br>
                        <span class="title-endereco"> <?php echo $imovel['bairro_endereco'] . ", " . ucwords(strtolower($imovel['cidade_endereco'])) . " - PA" ?></span>
                    </p>
                    <p class="text-right">
                        <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/excluir/<?php echo $imovel['cod_imovel'] ?>" class="btn btn-danger">Excluir</a>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                    </p>
                </article>
            </section>
        </div>
    </div>
    <!--FIM MODEL-->

<?php endforeach; ?>