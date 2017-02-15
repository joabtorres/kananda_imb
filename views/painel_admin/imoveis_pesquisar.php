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
                                <h3 class="font-bold">Busca Rápida</h3>
                                <form method='post' role="form">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="cReferencia" name="tReferencia" placeholder="Código do Imóvel">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" name="tBuscar" id="cBuscar" type="submit"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                </form>
                            </div>
                        </div>  <!-- fim buscar rápida -->
                        <hr>

                        <div class="row"><!-- buscar avançada -->
                            <div class="col-md-12">
                                <h3 class="font-bold">Busca Avançada</h3>
                                <p class="bg-danger btn-lg ocultar aviso-de-busca">Aviso: <small>Caso deseje fazer uma busca avançada remova o 'código do imóvel' informado a acima.</small></p>
                                <form method='post' role="form" class="form">                
                                    <div class="form-group col-md-4">
                                        <label for="cSelecionaImovel">Imóvel: </label>
                                        <select name="tSelecionaImovel" id="cSelecionaImovel" class="form-control itemPesquisa">
                                            <option value="Casa">Casa</option>
                                            <option value="Terreno">Terreno</option>
                                            <option value="Ponto Comercial">Ponto Comercial</option>
                                            <option value="Sala / Loja Comercial">Sala / Loja Comercial</option>
                                            <option value="Loteamento">Loteamento</option>
                                            <option value="Galpão / Barração">Galpão / Barração</option>
                                            <option value="Apartamento">Apartamento</option>
                                            <option value="Kitnet">Kitnet</option>
                                            <option value="Sítio / Chácara">Sítio / Chácara</option>
                                            <option value="Lote / Fazenda">Lote / Fazenda</option>
                                            <option value="Área Portuária">Área Portuária</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4"> 
                                        <label for="cFinalidade">Finalidade: </label>
                                        <select name="tFinalidade" id="cFinalidade" class="form-control itemPesquisa">
                                            <option value="Comprar e Alugar" class="ca">Comprar e Alugar</option>
                                            <option value="Comprar" class="ca">Comprar</option>
                                            <option value="Alugar" class="ca">Alugar</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 cCategoria"> 
                                        <label for="cCategoria">Categoria: </label>
                                        <select name="tCategoria" id="cCategoria" class="form-control itemPesquisa">
                                            <option value="Todos" class="ca te pc slc ap kit sch ap lof lot todos" selected>Todas</option>
                                            <option value="Térreo" class="pc ca kit">Térreo</option>
                                            <option value="Sobrado" class="ca">Sobrado</option>
                                            <option value="Urbano(a)" class="te sch">Urbano(a)</option>
                                            <option value="Rural" class="te sch lof">Rural</option>
                                            <option value="Comercial">Comercial</option>
                                            <option value="Residencial" class="ca te kit">Residencial</option>
                                            <option value="Condomínio" class="ca te ap">Condomínio</option>
                                            <option value="Lotes" class="lot">Lotes</option>
                                            <option value="Edifício" class="pc slc ap kit">Edifício</option>
                                            <option value="Shopping" class="slc">Shopping</option>
                                            <option value="Loteamento" class="te">Loteamento</option>
                                            <option value="Industrial">Industrial</option>
                                            <option value="Porto" class="ap">Porto</option>
                                        </select>
                                    </div>

                                    <!-- --------------------------
                                    QUARTO, SUITES, GARAGEM
                                ---------------------------- -->
                                    <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                        <label for="cSelecionaQntQuarto">Quarto (s): </label>
                                        <select name="tSelecionaQntQuarto" id="cSelecionaQntQuarto" class="itemPesquisa form-control">
                                            <option value="Todos" selected>Todos</option>
                                            <option value="0">0</option>
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
                                        <select name="tSelecionaQntSuites" id="cSelecionaQntSuites" class="itemPesquisa form-control">
                                            <option value="" selected>Todos</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="+">mais de 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                        <label for="cSelecionaQntSuites">Suite (s): </label>
                                        <select name="tSelecionaQntSuites" id="cSelecionaQntSuites" class="itemPesquisa form-control">
                                            <option value="" selected>Todos</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="+">mais de 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
                                        <label for="cSelecionaqntGaragem">Garagem: </label>
                                        <select name="tSelecionaqntGaragem" id="cSelecionaqntGaragem" class="itemPesquisa form-control">
                                            <option value="" selected>Todos</option>
                                            <option value="0">0</option>
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
                                        <input type="text" class="form-control itemPesquisa" id="cLargura" name="tLargura" placeholder="Ex: 5 metros">

                                    </div>
                                    <div class="form-group col-md-6 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
                                        <label for="cComprimento">Comprimento: </label> 
                                        <input type="text" class="form-control itemPesquisa" id="cComprimento" name="tComprimento" placeholder="Ex: 10 metros">
                                    </div>
                                    <!-- --------------------------
                                    FIM Largura, Comprimento
                                 ---------------------------- -->
                                    <div class="form-group col-md-12">
                                        <label for="cSelecionaBairro">Bairro: </label>
                                        <select name="tSelecionaBairro" id="cSelecionaBairro" class="itemPesquisa form-control">
                                            <option value="Todos" selected>Qualquer Bairro</option>
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
            </article>
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
                            for ($p = 0; $p <= $paginas; $p++) {
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