<div id="page-wrapper">
    <section class="container-fluid">
        <article class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Configurações Gerais</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>/painel_admin/home"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class=" glyphicon glyphicon-wrench"></span> Configurações Gerais</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <section class="container-configuracao col-xs-12 clear">
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">DADOS GERAIS</strong></header>
                        <article class="panel-body">
                            <div class="form-group">
                                <label for="cTitle">Título do site:</label>
                                <input type="text" name="tTitle" id="cTitle" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cEmail">E-mail:</label>
                                <input type="text" name="tEmail" id="cEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cLegenda">Nome definido para imagens do imóvel:</label>
                                <input type="text" name="tLegenda" id="cLegenda" class="form-control">
                            </div>
                            <div class="form-group" id="fotos">
                                <input type="hidden" name="qtd_fotos" value="1">
                                <label for="cFileLogo" class="btn btn-primary">Escolher Logo</label>
                                <input type="file" name="tImagem-1" id="cFileLogo" class="ocultar" onchange="readURL(this)"/>
                                <img src="imagens/logo.png" class="img-center" id="viewImagem-1" alt="Logo da Kananda"/>
                            </div>
                        </article> <!-- fim panel-body -->
                    </section> <!-- fim panel -->
                    <input type="submit" value="Salvar" class="btn btn-primary "/>
                </form>
            </section> <!-- fim conainer-configuracao-->
        </article> 

        <footer class="row clear" id="container-footer">
            <div class="col-xs-12">
                <p class="text-right">&copy; Desenvolvido por Joab Torres Alencar.</p>
            </div>
        </footer><!--fim footer e row -->

    </section>
</div>
<!-- /#page-wrapper -->