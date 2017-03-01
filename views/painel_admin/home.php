<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12">
                <h1 class="page-header">Inicial</h1>
                <ol class="breadcrumb">
                    <li class="active"><span class="glyphicon glyphicon-home"></span> Inicial</li>
                </ol>
            </header>
            <section class="col-md-12">
                <article class="jumbotron">
                    <h1>Olá, <?php echo (isset($_SESSION["ka_usuario_nome"]) && !empty($_SESSION["ka_usuario_nome"])) ? ucwords(strtolower($_SESSION["ka_usuario_nome"])) : ""; ?>!</h1>
                    <p class="text-left">
                        Bem-vindo ao painel adminstrativo da Kanananda Negócios Imobiliários.<br/>
                        Imóveis cadastrados: <?php echo $imoveis_cadastrados; ?> registros encontrados <br/>
                        Imóveis ocultos: <?php echo $imoveis_ocultos; ?> registros encontrados</p>
                    <a href="<?php echo BASE_URL; ?>/home" class="btn btn-dark btn-lg">Página do site &raquo;</a>
                </article>
            </section>
            <article class="col-md-4">
                <section class="panel panel-primary panel-icon">
                    <header class="panel-heading"><strong class="font-bold"><span class="glyphicon glyphicon-plus-sign float-right"></span> IMÓVEIS</strong> <br/> Cadastrar Novo Imóvel</header>
                    <article class="panel-body">
                        <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/cadastrar">Ver detalhes <span class="badge float-right">&raquo;</span></a>
                    </article>
                </section>
            </article>
            <article class="col-md-4">
                <section class="panel panel-success panel-icon">
                    <header class="panel-heading"><strong class="font-bold"><span class="glyphicon glyphicon-list float-right"></span> IMÓVEIS</strong> <br/> Exibir Imóvel Cadastrados </header>
                    <article class="panel-body">
                        <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/cadastrados">Ver detalhes <span class="badge float-right">&raquo;</span></a>
                    </article>
                </section>
            </article>
            <article class="col-md-4">
                <section class="panel panel-danger panel-icon">
                    <header class="panel-heading"><strong class="font-bold"><span class="glyphicon glyphicon-list float-right"></span> IMÓVEIS</strong> <br/> Exibir Imóveis Ocultos</header>
                    <article class="panel-body">
                        <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/ocultos">Ver detalhes <span class="badge float-right">&raquo;</span></a>
                    </article>
                </section>
            </article>
            <?php if ($_SESSION['ka_usuario_permissao']) : ?>
                <article class="col-md-4">
                    <section class="panel panel-primary panel-icon">
                        <header class="panel-heading"><strong class="font-bold"><span class="glyphicon glyphicon-plus-sign float-right"></span> USUÁRIOS</strong> <br/> Cadastrar Novo Usuário</header>
                        <article class="panel-body">
                            <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/cadastrar">Ver detalhes <span class="badge float-right">&raquo;</span></a>
                        </article>
                    </section>
                </article>
                <article class="col-md-4">
                    <section class="panel panel-success panel-icon">
                        <header class="panel-heading"><strong class="font-bold"><span class="glyphicon glyphicon-list float-right"></span> USUÁRIOS</strong> <br/> Exibir Usuários Cadastrados </header>
                        <article class="panel-body">
                            <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/cadastrados">Ver detalhes <span class="badge float-right">&raquo;</span></a>
                        </article>
                    </section>
                </article>
                <article class="col-md-4">
                    <section class="panel panel-danger panel-icon">
                        <header class="panel-heading"><strong class="font-bold"><span class="glyphicon glyphicon-wrench float-right"></span> CONFIGURAÇÕES</strong> <br/> Configurações Gerais</header>
                        <article class="panel-body">
                            <a href="<?php echo BASE_URL; ?>/painel_admin/configuracoes/index">Ver detalhes <span class="badge float-right">&raquo;</span></a>
                        </article>
                    </section>
                </article>
            <?php endif; //FIM $_SESSION['KA_USUARIO_PERMISSAO']?>
        </div> <!--fim row-->


        <footer class="row clear" id="container-footer">
            <div class="col-xs-12">
                <p class="text-right">&copy; Desenvolvido por Joab Torres Alencar.</p>
            </div>
        </footer><!--fim footer e row -->

    </section>
</div>
<!-- /#page-wrapper -->