<div id="page-wrapper">
    <section class="container-fluid">
        <article class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Configurações Slideshow</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-picture"></span> Configurações Slideshow</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <section class="container-configuracao col-xs-12 clear">
                <form method="POST">
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">BANNER'S DA HOMEPAGE</strong></header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="qtd_fotos" value="1" id="qtd_fotos">
                                    <span class="btn btn-primary btn-lg" onclick="add_imagem();">Adicionar foto</span> <strong class="font-bold">Quantidade de fotos atualmente: <span id="qnt_fotos"></span></strong>
                                </div>
                                <div id="fotos">

                                </div> <!-- fim fotos-->
                            </div><!-- fim row-->
                        </article> <!-- fim panel-body -->
                    </section> <!-- fim panel -->
                    <input type="submit" value="Salvar" class="btn btn-primary "/>
                </form>
            </section> <!-- fim conainer-configuracao-->
        </article> 
        <!--fim row-->

        <footer class="row clear" id="container-footer">
            <div class="col-xs-12">
                <p class="text-right">&copy; Desenvolvido por Joab Torres Alencar.</p>
            </div>
        </footer><!--fim footer e row -->

    </section>
</div>
<!-- /#page-wrapper -->