<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kananda Negócios Imobiliários</title>

        <!-- Bootstrap -->
        <link href="<?php echo BASE_URL; ?>/assets/painel_admin/css/bootstrap.min.css" rel="stylesheet">
        <!-- Estilo -->
        <link href="<?php echo BASE_URL; ?>/assets/painel_admin/css/estilo.css" rel="stylesheet">
        <script> var categoria = null;</script>
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand font-bold" href="<?php echo BASE_URL; ?>/home">Kananda Negócios Imobiliários</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> <?php echo (isset($_SESSION["ka_usuario_nome"]) && !empty($_SESSION["ka_usuario_nome"])) ? ucwords(strtolower($_SESSION["ka_usuario_nome"])) : ""; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php BASE_URL; ?>/painel_admin/usuarios/editar/<?php echo (isset($_SESSION["ka_usuario_cod"]) && !empty($_SESSION["ka_usuario_cod"])) ? $_SESSION["ka_usuario_cod"] : ""; ?>"> <span class="glyphicon glyphicon-user"></span> Alterar</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php BASE_URL; ?>/painel_admin/login/sair"> <span class="glyphicon glyphicon-off"></span> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="<?php echo BASE_URL; ?>/painel_admin/home/index"><span class="glyphicon glyphicon-home"></span> Inicial</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/mais_visitados"><span class="glyphicon glyphicon-star"></span> Imóveis mais Visitados</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#imoveis"> <span class="glyphicon glyphicon-home"></span> IMÓVEIS <b class="caret"></b></a>
                            <ul id="imoveis" class="collapse">
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/cadastrar"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar Novo Imóvel</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/cadastrados"><span class="glyphicon glyphicon-list"></span> Imóveis Cadastrados</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/pesquisar"><span class="glyphicon glyphicon-search"></span> Pesquisar Imóveis</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/imoveis/ocultos"><span class="glyphicon glyphicon-list"></span> Imóveis Ocultos</a>
                                </li>
                            </ul>
                        </li>
                        <?php if($_SESSION['ka_usuario_permissao']) : ?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#usuarios"><span class="glyphicon glyphicon-user"></span> USUÁRIOS <b class="caret"></b></a>
                            <ul id="usuarios" class="collapse">
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/cadastrar"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar Novo Usuário</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/cadastrados"><span class="glyphicon glyphicon-list"></span> Exibir Usuários Cadastrados</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/pesquisar"><span class="glyphicon glyphicon-search"></span> Pesquisar usuários</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#configuracoes"><span class=" glyphicon glyphicon-cog"></span> CONFIGURAÇÕES <b class="caret"></b></a>
                            <ul id="configuracoes" class="collapse">
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/configuracoes"><span class=" glyphicon glyphicon-wrench"></span> Configurações Gerais</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>/painel_admin/configuracoes/slideshow"><span class="glyphicon glyphicon-picture"></span> Configurações Slideshow</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; //FIM $_SESSION['KA_USUARIO_PERMISSAO']?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <?php $this->loadViewInTemplate($viewName, $viewData) ?>


        </div>
        <!-- /#wrapper -->

        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/painel_admin/js/jquery.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="<?php echo BASE_URL; ?>/assets/painel_admin/js/bootstrap.min.js"></script>
        <!-- CHAMANDO tinymce.js - chat -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/painel_admin/js/tinymce/tinymce.min.js"></script>
        <!-- CHAMANDO GOOGLE MAPS API -->
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&sensor=false"></script>
        <!-- Arquivo JS para trata evento ou ações do painel -->
        <script src="<?php echo BASE_URL; ?>/assets/painel_admin/js/painel_admin.js"></script>
    </body>
</html>