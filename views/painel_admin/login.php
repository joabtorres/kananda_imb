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
                            <form method="POST">
                                <div class="form-group">
                                    <label for="cEmail">E-mail: </label>
                                    <input type="email" name="tEmail" id="cEmail" class="form-control" placeholder="email@exemplo.com.br"/>
                                </div>
                                <div class="form-group">
                                    <label for="cSenha">Senha:</label>
                                    <input type="password" name="tSenha" id="cSenha" class="form-control"/>
                                </div>
                                <p class="bg-danger">Usuário ou senha incorreto</p>
                                <a href="#"><span class="glyphicon glyphicon-lock"></span> Esqueceu a senha?</a>
                                <input type="submit" name="tEnviar" value="Entrar" class="float-right btn btn-primary"/>
                            </form>
                        </div>
                    </div><!--fim row-->
                </div>
            </div><!--fim row-->
        </div><!--fim container-fluid-->
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- CHAMANDO JS DO BOOTSTRAP -->
        <script src="<?php echo BASE_URL; ?>/assets/paine_admin/js/bootstrap.min.js"></script>
    </body>
</html>