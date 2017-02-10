<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Editar Imóvel</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/home"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus-sign"></span> Editar Imóvel</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <article id="container-imoveis" class="col-xs-12 clear">
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                    <section class="panel panel-primary">
                        <header class="panel-heading">
                            <strong class="font-bold">DADOS GERAIS</strong>
                        </header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="iReferencia">Referência:</label>

                                    <input type="hidden" name="nCod" class="form-control" value="<?php echo!empty($imoveis[0]['cod_imovel']) ? $imoveis[0]['cod_imovel'] : "" ?>"/>
                                    <input type="text" name="nReferencia" id="iReferencia" class="form-control" value="<?php echo!empty($imoveis[0]['referencia_imovel']) ? $imoveis[0]['referencia_imovel'] : "" ?>"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <p class="font-bold">Deseja oculta este imóvel?</p>
                                    <?php
                                    for ($i = 1; $i >= 0; $i--) {
                                        $status = ($i == 1) ? "Sim" : "Não";
                                        if ($i == $imoveis[0]['status_imovel']) {
                                            echo '<label><input type="radio" name="tOcuta" value="' . $i . '" checked="true"/> ' . $status . ' </label>';
                                        } else {
                                            echo '<label><input type="radio" name="tOcuta" value="' . $i . '" /> ' . $status . ' </label>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div><!--fim row-->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="cSelecionaImovel">Tipo do Imóvel: </label>
                                    <select name="tSelecionaImovel" id="cSelecionaImovel" class="form-control itemPesquisa">

                                        <?php
                                        $imovel = array("Casa", "Terreno", "Ponto Comercial", "Sala / Loja Comercial", "Loteamento", "Galpão / Barração", "Apartamento", "Kitnet",
                                            "Sítio / Chácara", "Lote / Fazenda", "Área Portuária");
                                        foreach ($imovel as $valor) {
                                            if ($valor == $imoveis[0]['imovel_imovel']) {
                                                echo '<option value="' . $valor . '" selected="true">' . $valor . '</option>';
                                            } else {
                                                echo '<option value="' . $valor . '">' . $valor . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cFinalidade">Finalidade: </label>
                                    <select name="tFinalidade" id="cFinalidade" class="form-control itemPesquisa">

                                        <?php
                                        $finalidade = array("Comprar e Alugar", "Comprar", "Alugar");
                                        foreach ($finalidade as $valor) {
                                            if ($valor === $imoveis[0]['finalidade_imovel']) {
                                                echo '<option value = "' . $valor . '" class = "ca" selected="true" >' . $valor . '</option>';
                                            } else {
                                                echo '<option value = "' . $valor . '" class = "ca">' . $valor . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 cCategoria">
                                    <label for="cCategoria">Categoria: </label>
                                    <select name="tCategoria" id="cCategoria" class="form-control itemPesquisa">
                                        <option value="Térreo (a)" class="pc ca kit" >Térreo (a)</option>
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
                                        <option value="Porto" class="ap">Porto</option>
                                    </select>
                                </div>
                            </div><!--fim row-->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="cQuarto">Quarto (s):</label>
                                    <input type="text" name="tQuarto" id="cQuarto" class="form-control" value="<?php echo (isset($imoveis[0]['quarto_imovel'])) ? $imoveis[0]['quarto_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cBanheiro">Banheiro (s):</label>
                                    <input type="text" name="tBanheiro" id="cBanheiro" class="form-control" value="<?php echo (isset($imoveis[0]['suite_imovel'])) ? $imoveis[0]['suite_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cSuite">Suíte (s):</label>
                                    <input type="text" name="tSuite" id="cSuite" class="form-control" value="<?php echo (isset($imoveis[0]['banheiro_imovel'])) ? $imoveis[0]['banheiro_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cGarage">Garagem:</label>
                                    <input type="text" name="tGarage" id="cGarage" class="form-control" value="<?php echo (isset($imoveis[0]['garagem_imovel'])) ? $imoveis[0]['garagem_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cLargura">Largura:</label>
                                    <input type="text" name="tLargura" id="cLargura" class="form-control" value="<?php echo (isset($imoveis[0]['largura_imovel'])) ? $imoveis[0]['largura_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cComprimento">Comprimento:</label>
                                    <input type="text" name="tComprimento" id="cComprimento" class="form-control" value="<?php echo (isset($imoveis[0]['comprimento_imovel'])) ? $imoveis[0]['comprimento_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cAreaTotal">Área Total: </label>
                                    <input type="text" name="tAreaTotal" id="cAreaTotal" class="form-control" value="<?php echo (isset($imoveis[0]['area_total_imovel'])) ? $imoveis[0]['area_total_imovel'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cAreaConstruida">Área Construida:</label>
                                    <input type="text" name="tAreaConstruida" id="cAreaConstruida" class="form-control" value="<?php echo (isset($imoveis[0]['area_construida_imovel'])) ? $imoveis[0]['area_construida_imovel'] : ""; ?>"/>
                                </div>

                            </div><!--fim row-->
                        </article>
                    </section><!--fim do panel-->
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">LOCALIZAÇÃO</strong></header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="iLogradouro">Logradouro:</label>
                                    <input type="text" name="nLogradouro" id="iLogradouro" class="form-control" placeholder="Exemplo: Tv. Quinze de Agosto" value="<?php echo (isset($imoveis[0]['logradouro_endereco'])) ? $imoveis[0]['logradouro_endereco'] : ""; ?>"/>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="iNumero">Número:</label>
                                    <input type="text" name="nNumero" id="iNumero" class="form-control" placeholder="Exemplo: 100 ou S/N" value="<?php echo (isset($imoveis[0]['numero_endereco'])) ? $imoveis[0]['numero_endereco'] : ""; ?>"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cSelecionaBairro">Bairro: </label>
                                    <select name="nSelecionaBairro" id="cSelecionaBairro" class="itemPesquisa form-control">
                                        <?php
                                        $bairro = array('Bela vista', 'Boa Esperança', 'Bom Jardim', 'Bom Remédio', 'Centro', 'Floresta', 'Jardim Aeroporto', 'Jardim América', 'Jardim Das Araras', 'Jardim Tapajós', 'Liberdade', 'Maria Madalena', 'Nova Itaituba', 'Novo Paraíso', 'Perpétuo Socorro', 'Piracanã', 'Residencial Vale Do Piracanã', 'Residencial Viva Itaituba', 'Residencial Wirland Freire', 'Santo Antõnio', 'São Francisco', 'São Tome', 'São José', 'Vale do Tapajós', 'Valmirlândia', ' Vitória-Régie', 'Zona Rural');
                                        foreach ($bairro as $valor) {
                                            if ($valor === $imoveis[0]['bairro_endereco']) {
                                                echo '<option value = "' . $valor . '" selected="true">' . $valor . '</option>';
                                            } else {
                                                echo '<option value = "' . $valor . '">' . $valor . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iCidade">Cidade:</label>
                                    <input type="text" name="nCidade" id="iCidade" class="form-control" placeholder="Exemplo: Itaituba" value="<?php echo (isset($imoveis[0]['cidade_endereco'])) ? $imoveis[0]['cidade_endereco'] : ""; ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iComplemento">Complemento:</label>
                                    <input type="text" name="nComplemento" id="iComplemento" class="form-control" placeholder="Exemplo: Próximo ao Mercantil Alvorada" value="<?php echo (isset($imoveis[0]['complemento_endereco'])) ? $imoveis[0]['complemento_endereco'] : ""; ?>">
                                </div>
                                <div class="col-md-9 form-group">
                                    <label for="cEndereco">Endereço via mapa:</label>
                                    <input type="text" name="tEndereco" id="cEndereco" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Pesquisar Endereço:</label>
                                    <span class="btn btn-danger btn-block form-control" id="btnEndereco"><span class="glyphicon glyphicon-search"></span> Pesquisar</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cLatitude">Latitude:</label>
                                    <input type="text" name="tLatitude" id="cLatitude" class="form-control" value="<?php echo (isset($imoveis[0]['latitude_endereco'])) ? $imoveis[0]['latitude_endereco'] : ""; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cLongitude">Longitude:</label>
                                    <input type="text" name="tLongitude" id="cLongitude" class="form-control" value="<?php echo (isset($imoveis[0]['longitude_endereco'])) ? $imoveis[0]['longitude_endereco'] : ""; ?>">
                                </div>

                                <div class="form-group col-md-12" >
                                    <div id="viewMapa">

                                    </div>
                                </div>
                            </div><!--fim row-->
                        </article><!-- fim panel-body-->
                    </section> <!-- fim panel -->
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">COMPLEMENTARES</strong></header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="iValor">Valor: </label>
                                    <input type="text" name="nValor" id="iValor" class="form-control" value="<?php echo (isset($imoveis[0]['valor_imovel'])) ? $imoveis[0]['valor_imovel'] : ""; ?>"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Descrição: </label>
                                    <textarea id="cDescricao" name="tDescricao" class="form-group" ><?php echo (isset($imoveis[0]['descricao_imovel'])) ? $imoveis[0]['descricao_imovel'] : ""; ?></textarea>
                                </div>
                            </div><!-- fim row-->
                        </article><!-- fim panel-body-->
                    </section> <!--fim painel-->
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">FOTOS DO IMÓVEL</strong></header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-12 container-foto">
                                    <figure class="viewFotosDestaque" > 
                                        <p class="font-bold text-center">DESTAQUE</p>
                                        <img src="<?php echo BASE_URL . "/" . $imoveis[0]['imagem_imovel']; ?> " alt="Imóvel Kananda" id="viewImagem-100" />
                                        <figcaption> 
                                            <label for="cImagem-100" class="btn btn-primary btn-block ">Escolher arquivo</label> 
                                            <input type="file" id="cImagem-100" class="ocultar" name="tImagem-100" onchange="readURL(this);"  file="<?php echo BASE_URL . "/" . $imoveis[0]['imagem_imovel']; ?>" value="<?php echo BASE_URL . "/" . $imoveis[0]['imagem_imovel']; ?>"/>  
                                        </figcaption> 
                                    </figure>
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="tQnt_fotos" value="1" id="iQnt_fotos">
                                    <span class="btn btn-primary btn-lg" onclick="add_imagem();">Adicionar foto</span> <strong class="font-bold">Quantidade de fotos atualmente: <span id="qnt_fotos"></span></strong>
                                </div>
                                <div id="fotos">

                                </div> <!-- fim fotos-->
                            </div><!-- fim row-->
                        </article><!-- fim panel-body-->
                    </section> <!--fim painel-->
                    <section class="row">
                        <article class="col-md-12">
                            <input type="submit" class="btn btn-success" value="Salvar"/>
                            <input type="reset" class="btn btn-danger " value="Cancelar"/>
                        </article>
                    </section>

                </form>
            </article><!--fim container-imoveis-->
        </div>
        <!--fim row-->
        <footer class="row clear" id="container-footer">
            <div class="col-xs-12">
                <p class="text-right">&copy; Desenvolvido por Joab Torres Alencar.</p>
            </div>
        </footer>
    </section>
</div>
<!-- /#page-wrapper -->
