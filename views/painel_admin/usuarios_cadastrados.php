<div id="page-wrapper">
    <section class="container-fluid">
        <article class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Usuários Cadastrados</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-list"></span> Usuários Cadastrados</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <section class="col-xs-12 clear">
                <section class="panel panel-primary">
                    <header class="panel-heading"><strong class="font-bold">USUÁRIO</strong></header>
                    <article class="panel-body">
                        <form method="POST">
                            <div class="form-group col-md-7">
                                <label for="cCampo">Campo:</label>
                                <input type="text" name="tCampo" id="cCampo" class="form-control"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="CFinalidade">Buscar por:</label>
                                <select name="tFinalidade" id="CFinalidade" class="form-control">
                                    <option selected value="e-mail">E-mail</option>
                                    <option value="cod">cod</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2"><label></label>
                                <button type="submit" class="btn btn-primary form-control"> Buscar</button>
                            </div>
                        </form>
                    </article>
                </section>
            </section>
            <section class="container-usuario clear">
                <?php foreach ($usuarios as $usuario) : ?>
                    <article class="col-md-4">
                        <figure class="thumbnail">
                            <img src="<?php echo (isset($usuario['imagem_usuario']) && !empty($usuario['imagem_usuario'])) ? BASE_URL . "/" . $usuario['imagem_usuario'] : BASE_URL . "/assets/painel_admin/imagens/user.png"; ?>">
                            <p class="text-center"><strong class="font-bold"><?php echo ucwords(strtolower($usuario['nome_usuario'])) ?></strong> <br/> <?php echo ($usuario['nivel_usuario'] == 1) ? "Usuário Administrador" : "Usuário Padrão"; ?></p>
                            <figcaption>
                                <a data-toggle="modal" data-target="#model_recupera_<?php echo $usuario['cod_usuario'] ?>"  class="btn btn-success btn-block">Recuperar Senha</a>
                                <a href="<?php echo BASE_URL?>/painel_admin/usuarios/editar/<?php echo $usuario['cod_usuario'] ?>" class="btn btn-primary btn-block">Editar</a>
                                <a data-toggle="modal" data-target="#model_excluir_<?php echo $usuario['cod_usuario'] ?>" class="btn btn-danger btn-block">Excluir</a>
                            </figcaption>
                        </figure>
                    </article>
                <?php endforeach; ?>
            </section><!--FIM CONTAINER-USUARIO-->
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
<?php
foreach ($usuarios as $usuario):
    ?>
    <!--MODEL-->
    <div class="modal fade" id="model_excluir_<?php echo $usuario['cod_usuario'] ?>" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <section class="modal-content">
                <header class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Deseja excluir este Usuário?</h4>
                </header>
                <article class="modal-body">

                    <p class="text-justify title-nome">Nome: <?php echo ucwords(strtolower($usuario['nome_usuario']));  ?></p>
                    <p class="text-justify title-nome">Email: <?php echo $usuario['email_usuario']; ?></p>

                </article>
                <footer class="modal-footer">
                    <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/excluir/<?php echo $usuario['cod_usuario'] ?>" class="btn btn-danger">Excluir</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </footer>
            </section>
        </div>
    </div>
    <!--FIM MODEL-->

    <!--MODEL-->
    <div class="modal fade" id="model_recupera_<?php echo $usuario['cod_usuario'] ?>" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <section class="modal-content">
                <header class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Deseja recupera senha?</h4>
                </header>
                <article class="modal-body">

                    <p class="text-justify title-nome">Nome: <?php echo ucwords(strtolower($usuario['nome_usuario'])); ?></p>
                    <p class="text-justify title-nome">Email: <?php echo $usuario['email_usuario']; ?></p>

                </article>
                <footer class="modal-footer">
                    <a href="<?php echo BASE_URL; ?>/painel_admin/usuarios/recupera/<?php echo $usuario['cod_usuario'] ?>" class="btn btn-success">Enviar</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </footer>
            </section>
        </div>
    </div>
    <!--FIM MODEL-->

<?php endforeach; ?>