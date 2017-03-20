<div id="page-wrapper">
    <section class="container-fluid">
        <article class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Configurações Slideshow</h1>
                <ol class="breadcrumb">
                    <li><ahref="<?php echo BASE_URL; ?>/painel_admin/home"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-picture"></span> Configurações Slideshow</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <section class="container-configuracao col-xs-12 clear">
                <form method="POST" enctype="multipart/form-data">
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">BANNER'S DA HOMEPAGE</strong></header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="tQnt_fotos" value="<?php echo (count($banners) > 0) ? count($banners) : 1; ?>" id="iQnt_fotos" >
                                    <span class="btn btn-primary btn-lg" onclick="add_imagem();">Adicionar foto</span> <strong class="font-bold">Quantidade de fotos atualmente: <span id="qnt_fotos"><?php echo (count($banners) > 0) ? count($banners) : 0; ?></span></strong>
                                </div>
                                <div id="fotos">
                                    <?php for ($i = count($banners) - 1; $i >= 0; $i--) : ?>
                                        <div class="form-group col-md-4 container-foto" id="foto-1"> 
                                            <figure class="viewFotos"> 
                                                <p class="font-bold">Imagem - <?php echo ($i + 1); ?></p>
                                                <img src="<?php echo BASE_URL . '/' . $banners[$i]['imagem_banner']; ?>" alt="Banner Kananda" id="viewImagem-<?php echo ($i + 1); ?>" class="img-responsive">
                                                <figcaption>
                                                    <label for="cImagem-<?php echo ($i + 1); ?>" class="btn btn-primary btn-block ">Escolher arquivo</label> 
                                                    <input id="cImagem-<?php echo ($i + 1); ?>" class="ocultar" name="tImagem-<?php echo ($i + 1); ?>" onchange="readURL(this);" type="file"> 
                                                    <input type="hidden" name="nImagem-<?php echo ($i + 1); ?>" value="<?php echo $banners[$i]['imagem_banner']; ?>">
                                                    <span class="btn btn-danger btn-block" onclick="remover_foto(this);">Remover</span> 
                                                </figcaption> 
                                            </figure>
                                        </div>
                                    <?php endfor; ?>
                                </div> <!-- fim fotos-->
                            </div><!-- fim row-->
                        </article> <!-- fim panel-body -->
                    </section> <!-- fim panel -->
                    <input type="submit" value="Salvar" name="nSalvarSlide" class="btn btn-primary "/>
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