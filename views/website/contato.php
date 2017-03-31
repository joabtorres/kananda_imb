<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<section class="row">
    <!--<article class="col-xs-12 bg-azul title-destaque">
        <h2><strong>Contato</strong><br><small>
                Utilize um dos nossos meios de contatos para nos encontrar.</small></h2>
    </article> -->
    <article class="col-xs-12 bg-azul title-destaque" style="padding: 0;">
        <img src="<?php echo BASE_URL ?>/assets/website/imagens/banner_contato.jpg" class="img-responsive"/>
    </article>
</section>

<!-- CHAMADA PARA CONTATO-->
<section class="row">
    <!-- contato -->
    <article class="col-xs-12 list-container">
        <!--//<img src="<?php echo BASE_URL; ?>/assets/website/imagens/banner_contato.jpg"  class="img-center img-rounded img-responsive" title="Kananda Negócios Imobiliários - Contato "  alt="Kananda Negócios Imobiliários - Contato ">-->
        <div class="col-xs-12">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <h3><strong class="font-bold">Contato: </strong></h3>
                <p><b>Fixo:</b> (93) 3518-0367</p>
                <p><b>Vivo:</b> (93) 99242-2027</p>
                <p><b>WhatsApp:</b> (93) 98124-3015</p>
                <p><b>Email:</b> Contato@kananda.imb.br</p>
            </div>
            <!--FACEPILE;-->
            <div class="col-sm-12 col-md-6 col-lg-6"><div class="fb-page" data-href="https://www.facebook.com/kanandaimb" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kanandaimb" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kanandaimb">Kananda Negócios Imobiliários</a></blockquote></div></div>
            <!--FACEPILE;-->
        </div>
        <div class="col-xs-12">

            <!--FORMULÁRIO-->
            <div class="col-sm-12 col-md-6 col-lg-6">
                <h3 class="text-center"><strong>Formulário de Contato</strong></h3>
                <!-- FORMULÁRIO PARA CONTATO -->
                <form method="POST" class="form-contato">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon " id="iNome"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control"  name="nNome" placeholder="Nome Completo" aria-describedby="iNome">
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon " id="nTelefone"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" class="form-control" name="nTelefone" placeholder="(99) 9999-9999" aria-describedby="nTelefone">
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon " id="iEmail"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="email" class="form-control" name="nEmail" placeholder="email@provedor.com" aria-describedby="iEmail">
                        </div>
                    </div>  
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea name="nMensagem"  rows="5" class="form-control" placeholder="Mensagem"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <input type="submit" class="btn btn-lg btn-default" value="Enviar Mensagem" name="nEnviar">
                    </div>
                </form><!-- FIM FORMULÁRIO PARA CONTATO -->
            </div>
            <!--FORMULÁRIO-->

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="caption">
                    <h3><strong>Endereço: </strong></h3>
                    <p>Rua Quarta (4ª), nº 361, bairro Floresta, Itaituba – PA, CEP: 68.181-300.</p>
                </div>
                <div id="mapa_contato"></div>
                <script type="text/javascript">
                    var latitude = -4.2639141;
                    var longitude = -55.998396;
                </script>
            </div><!-- fim MAPA-->
        </div>
    </article><!-- FIM CONTATO -->				

</section><!--FIM ROW CONTATO-->
