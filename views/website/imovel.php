<!-- Corpo do site [PARTE DINAMICA]-->
<section class="row">
    <!-- CHAMADA title-destaque -->
    <article class="col-xs-12 bg-azul title-destaque">
        <h2><strong>Casa a Venda</strong><br><small>
                COD 110 </small></h2>
    </article><!-- FIM CHAMADA title-destaque -->

    <!-- CHAMADA SLIDE DO IMÓVEL-->
    <article class="col-xs-12 bg-azul slide-imovel">

        <div class="col-md-offset-2 col-md-8 col-sm-12">
            <div class="fotorama" data-width="850" data-ratio="850/478" data-max-width="100%" data-nav="thumbs"  data-allowfullscreen="true">
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/01.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/01_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/02.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/02_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/03.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/03_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/04.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/04_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/05.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/05_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/05.5.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/05.5_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/06.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/06_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/07.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/07_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
                <a href="<?php echo BASE_URL;?>/uploads/imovel/31-149A/08.jpg"><img src="<?php echo BASE_URL;?>/uploads/imovel/31-149A/08_thumbnail.jpg" alt="Kananda Negócios Imobiliários Casa a Venda" title="Kananda Negócios Imobiliários Casa a Venda"></a>                            
            </div>
        </div>

    </article><!-- FIM SLIDE DO IMÓVEL-->
    <!--CONTEUDO DO IMÓVEL-->
    <article class="col-xs-12 list-container">

        <section class="list-descricao-imovel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#descricaoImovel" aria-controls="descricaoImovel" role="tab" data-toggle="tab">Descrição</a></li>
                <li role="presentation"><a href="#localidadeImovel" aria-controls="localidadeImovel" role="tab" data-toggle="tab" onclick="inicialize_mapa_imovel();">Localização via mapa</a></li>
                <li role="presentation"><a href="#contataImovel" aria-controls="contataImovel" role="tab" data-toggle="tab">Entra em Contato</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Descrição do imóvel -->
                <div role="tabpanel" class="tab-pane active" id="descricaoImovel">
                    <p class="text-justify">
                        <strong>Descrição:</strong><br>
                        Este imóvel está localizado na 13ª rua , nº 315 -  bairro Bela Vista, possui 4 quartos, 1 sala de estar, vaga para guarda até 6 carros simples na garagem, 3 banheiros socias, 2 suites. <br><br>
                        <strong>Valor: </strong><br>
                        R$ 300.000,00
                    </p>
                    <div class="panel panel-primary">
                        <div class="panel-heading"><strong>Especificações extras</strong></div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><span class="font-bold">Quarto(s): </span> 4</li>
                                <li><span class="font-bold">Suite(s): </span> 2</li>
                                <li><span class="font-bold">Garagem: </span> 6</li>
                                <li><span class="font-bold">Largura: </span> 10 metros</li>
                                <li><span class="font-bold">Comprimento: </span> 30 metros</li>
                                <li><span class="font-bold">Área Construida: </span> 250 metros²</li>
                                <li><span class="font-bold">Área Total: </span> 300 metros ²</li>
                                <li><span class="font-bold">Endereço: </span> Rua 13ª (décima terceira), nº 315, Bela Vista - Itaituba - PA</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Descrição do imóvel -->
                <!-- localização do imóvel -->
                <div role="tabpanel" class="tab-pane" id="localidadeImovel">
                    <div class="mapa">
                        <div id="view-mapa"></div>
                        <script type="text/javascript">
                            var latitude_imovel = -4.2639141, longitude_imovel = -55.998396;
                        </script>
                        <div class="caption">
                            <h3><span class="font-bold">Endereço: </span></h3>
                            <p>Rua 13ª (décima terceira), nº 315, Bela Vista - Itaituba - PA.</p>
                        </div>
                    </div><!-- fim MAPA-->
                </div> <!-- localização do imóvel -->
                <!-- contato -->
                <div role="tabpanel" class="tab-pane" id="contataImovel">
                    <h3 class="text-center"><strong>Formulário de Contato</strong></h3>
                    <!-- FORMULÁRIO PARA CONTATO -->
                    <form method="POST" class="form-contato">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon " id="iNome"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" placeholder="Nome Completo" aria-describedby="iNome">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon " id="iTelefone"><span class="glyphicon glyphicon-phone"></span></span>
                                <input type="text" class="form-control" placeholder="(99) 9999-9999" aria-describedby="iTelefone">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon " id="iEmail"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input type="text" class="form-control" placeholder="email@provedor.com" aria-describedby="iEmail">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon " id="iAssunto"><span class="glyphicon glyphicon-pencil"></span></span>
                                <input type="text" class="form-control" placeholder="Assunto" aria-describedby="iAssunto">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="tMensagem"  rows="5" class="form-control" placeholder="Mensagem">Olá! Achei esse imóvel (Cod. 101, Tipo do Imóvel: Casa, Finalidade: Venda, Categoria: Térrea) através do site . Por favor, gostaria de mais informações sobre o mesmo. Aguardo contato. Grato.</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <input type="submit" class="btn btn-lg btn-default" value="Enviar Mensagem">
                        </div>
                    </form><!-- FIM FORMULÁRIO PARA CONTATO -->
                    <div class="clear"></div>
                </div>  <!-- contato -->
            </div>
        </section>

    </article><!-- FIM CONTEUDO DO IMÓVEL-->
</section>