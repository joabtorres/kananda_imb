<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Cadastrar Novo Imóvel</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/home"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar Novo Imóvel</li>
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
                                    <input type="text" name="nReferencia" id="iReferencia" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <p class="font-bold">Ocutar imóvel?</p>
                                    <label><input type="radio" name="tOcuta" value="1"/> Sim </label>
                                    <label><input type="radio" name="tOcuta" value="0" checked="true"/> Não</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <p class="font-bold">Destaca imóvel?</p>
                                    <label><input type="radio" name="tDestaque" value="1"/> Sim </label>
                                    <label><input type="radio" name="tDestaque" value="0" checked="true"/> Não</label>
                                </div>
                            </div><!--fim row-->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="cSelecionaImovel">Tipo do Imóvel: </label>
                                    <select name="tSelecionaImovel" id="cSelecionaImovel" class="form-control" onchange="seleciona_imovel();">
                                        <option value="Casa">Casa</option>
                                        <option value="Terreno">Terreno</option>
                                        <option value="Ponto Comercial">Ponto Comercial</option>
                                        <option value="Loja Comercial">Loja Comercial</option>
                                        <option value="Loteamento">Loteamento</option>
                                        <option value="Galpão">Galpão</option>
                                        <option value="Apartamento">Apartamento</option>
                                        <option value="Kitnet">Kitnet</option>
                                        <option value="Chácara">Chácara</option>
                                        <option value="Fazenda">Fazenda</option>
                                        <option value="Área Portuária">Área Portuária</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cFinalidade">Finalidade: </label>
                                    <select name="tFinalidade" id="cFinalidade" class="form-control">
                                        <option value="Comprar e Alugar">Comprar e Alugar</option>
                                        <option value="Comprar">Comprar</option>
                                        <option value="Alugar">Alugar</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 cCategoria">
                                    <label for="cCategoria">Categoria: </label>
                                    <select name="tCategoria" id="cCategoria" class="form-control">
                                    </select>
                                </div>
                            </div><!--fim row-->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="cQuarto">Quarto (s):</label>
                                    <input type="text" name="tQuarto" id="cQuarto" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cBanheiro">Banheiro (s):</label>
                                    <input type="text" name="tBanheiro" id="cBanheiro" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cSuite">Suíte (s):</label>
                                    <input type="text" name="tSuite" id="cSuite" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cGarage">Garagem:</label>
                                    <input type="text" name="tGarage" id="cGarage" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cLargura">Largura:</label>
                                    <input type="text" name="tLargura" id="cLargura" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cComprimento">Comprimento:</label>
                                    <input type="text" name="tComprimento" id="cComprimento" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cAreaTotal">Área Total: </label>
                                    <input type="text" name="tAreaTotal" id="cAreaTotal" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cAreaConstruida">Área Construida:</label>
                                    <input type="text" name="tAreaConstruida" id="cAreaConstruida" class="form-control"/>
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
                                    <input type="text" name="nLogradouro" id="iLogradouro" class="form-control" placeholder="Exemplo: Tv. Quinze de Agosto">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="iNumero">Número:</label>
                                    <input type="text" name="nNumero" id="iNumero" class="form-control" placeholder="Exemplo: 100 ou S/N">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cSelecionaBairro">Bairro: </label>
                                    <select name="nSelecionaBairro" id="cSelecionaBairro" class="itemPesquisa form-control">
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
                                        <option value="São Tome">São Tome</option>
                                        <option value="SÃO JOSÉ">São José</option>
                                        <option value="Vale do Tapajós">Vale do Tapajós</option>
                                        <option value="Valmirlândia">Valmirlândia</option>
                                        <option value="Vitória-Régie">Vitória-Régie</option>
                                        <option value="Zona Rural">Zona Rural</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iCidade">Cidade:</label>
                                    <input type="text" name="nCidade" id="iCidade" class="form-control" placeholder="Exemplo: Itaituba">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="iComplemento">Complemento:</label>
                                    <input type="text" name="nComplemento" id="iComplemento" class="form-control" placeholder="Exemplo: Próximo ao Mercantil Alvorada">
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
                                    <input type="text" name="tLatitude" id="cLatitude" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cLongitude">Longitude:</label>
                                    <input type="text" name="tLongitude" id="cLongitude" class="form-control">
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
                                    <label for="iValor">Valor:</label>
                                    <input type="text" name="nValor" id="iValor" class="form-control"/>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Descrição: </label>
                                    <textarea id="cDescricao" name="tDescricao" class="form-group"></textarea>
                                </div>
                            </div><!-- fim row-->
                        </article><!-- fim panel-body-->
                    </section> <!--fim painel-->
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">FOTOS DO IMÓVEL</strong></header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-12 container-foto"> <figure class="viewFotosDestaque" > <p class="font-bold text-center">DESTAQUE</p><img src="../../assets/painel_admin/imagens/apartamento.jpg" alt="Imóvel Kananda" id="viewImagem-100"/> <figcaption> <label for="cImagem-100" class="btn btn-primary btn-block ">Escolher arquivo</label> <input type="file" id="cImagem-100" class="ocultar" name="tImagem-100" onchange="readURL(this);"/>  </figcaption> </figure> </div>

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
                            <a class="btn btn-danger" href="<?php echo BASE_URL ?>/painel_admin/imoveis/cadastrados"/>Cancelar</a>
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
