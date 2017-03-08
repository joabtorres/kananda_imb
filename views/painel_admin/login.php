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
    </head>
    <body>
        <div id="container-painel" class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10" id="container-login">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo BASE_URL; ?>/assets/painel_admin/imagens/logo.png" alt="Kananda Negócios Imobiliários"  class="img-center"/>
                        </div>
                        <div class="col-md-6">
                            <h2 class="font-bold">Painel Administrativo</h2>
                            <form method="POST" autocomplete="off">
                                <div class="form-group">
                                    <label for="cEmail">E-mail: </label>
                                    <input type="email" name="tEmail" id="cEmail" class="form-control" placeholder="email@exemplo.com.br" autofocus="true"/>
                                </div>
                                <div class="form-group">
                                    <label for="cSenha">Senha:</label>
                                    <input type="password" name="tSenha" id="cSenha" class="form-control"/>
                                </div>
                                <?php if (isset($erro) && !empty($erro)) : ?>
                                    <p class="bg-danger"><?php echo $erro; ?></p>
                                <?php endif; ?>
                                <a data-toggle="modal" data-target="#model_recupera"><span class="glyphicon glyphicon-lock"></span> Esqueceu a senha?</a>
                                <input type="submit" name="tEnviar" value="Entrar" class="float-right btn btn-primary"/>
                            </form>
                        </div>
                    </div><!--fim row-->
                </div>
            </div><!--fim row-->
        </div><!--fim container-fluid-->

        <!--MODEL-->
        <div class="modal fade" id="model_recupera" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <section class="modal-content">
                    <header class="modal-header alert alert-success">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Deseja recupera senha?</h4>
                    </header>
                    <article class="modal-body">
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="iSearchEmail">Email: </label>
                                <input type="email" name="nSearchEmail" id="iSearchEmail" class="form-control"/>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" name="nEnviarNovaSenha" class="btn btn-success">Enviar</button>
                                <button class="btn btn-warning" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </article>
                </section>
            </div>
        </div>
        <div class="modal fade" id="model_recupera_aviso" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <section class="modal-content">
                    <header class="modal-header alert alert-success">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">NOVA SENHA!</h4>
                    </header>
                    <article class="modal-body">
                        <p>Foi enviado uma nova senha para o e-mail informado, dentro de 5 a 10 minutos estará caixa de entrada.</p>
                        <p class="form-group text-right">
                            <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </p>
                    </article>
                </section>
            </div>
        </div>
        <!--FIM MODEL-->

        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- CHAMANDO JS DO BOOTSTRAP -->
        <script src="<?php echo BASE_URL; ?>/assets/painel_admin/js/bootstrap.min.js"></script>
    </body>
</html>