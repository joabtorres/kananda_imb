<section class="row">
    <article class="col-xs-12 bg-azul title-destaque">
        <h2><strong>Contato</strong><br><small>
                Utilize um dos nossos meios de contatos para nos encontrar.</small></h2>
    </article>
</section>

<!-- CHAMADA PARA CONTATO-->
<section class="row">
    <!-- contato -->
    <article class="col-xs-12 list-container">
        <img src="<?php echo BASE_URL; ?>/assets/website/imagens/banner_contato.jpg"  class="img-center img-rounded img-responsive" title="Kananda Negócios Imobiliários - Contato "  alt="Kananda Negócios Imobiliários - Contato ">
        <p></p>
        <!-- MAPA-->
        <div class="mapa">
            <div id="mapa_contato" style="background: red;"></div>
            <script type="text/javascript">
                var latitude = -4.2639141;
                var longitude = -55.998396;
            </script>
            <div class="caption">
                <h3><strong>Endereço: </strong></h3>
                <p>Rua Quarta (4ª), nº 361, bairro Floresta, Itaituba – PA, CEP: 68.181-300.</p>
            </div>
        </div><!-- fim MAPA-->
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
                    <span class="input-group-addon " id="iNome"><span class="glyphicon glyphicon-phone"></span></span>
                    <input type="text" class="form-control" placeholder="(99) 9999-9999" aria-describedby="iNome">
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
                    <textarea name=""  rows="5" class="form-control" placeholder="Mensagem"></textarea>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <input type="submit" class="btn btn-lg btn-default" value="Enviar Mensagem">
            </div>
        </form><!-- FIM FORMULÁRIO PARA CONTATO -->
    </article><!-- FIM CONTATO -->				

</section><!--FIM ROW CONTATO-->
