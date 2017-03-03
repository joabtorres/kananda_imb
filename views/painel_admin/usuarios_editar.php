<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Editar Usuário</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus-sign"></span> Editar Usuário</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <article class="container-usuario clear">
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">DADOS GERAIS</strong></header>
                        <article class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group <?php echo (isset($erro['nome'])) ? "has-error" : ""; ?>" >
                                    <label  class="control-label" for="cNome">Nome Completo:  <?php echo (isset($erro['nome'])) ? $erro['nome'] : ""; ?></label>
                                    <input type="hidden" name="tCod" value="<?php echo $usuario['cod_usuario']; ?>"/>
                                    <input type="text" name="tNome" id="cNome" class="form-control" value="<?php echo (isset($usuario['nome_usuario']) && !empty($usuario['nome_usuario'])) ? $usuario['nome_usuario'] : ""; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cEmail">E-mail:</label>
                                    <input type="text" disabled="true" class="form-control" value="<?php echo $usuario['email_usuario']; ?>"/>
                                </div>
                                <div class="form-group <?php echo (isset($erro['senha'])) ? "has-error" : ""; ?>">
                                    <label class="control-label" for="cSenha">Nova Senha: <?php echo (isset($erro['senha'])) ? $erro['senha'] : ""; ?></label>
                                    <input type="password" name="nSenha" id="cSenha" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cRepetirSenha">Repetir Nova Senha:</label>
                                    <input type="password" name="nRepetirSenha" id="cRepetirSenha" class="form-control"/>
                                </div>
                                <?php if($_SESSION['usuario']['nivel']) : ?>
                                <div class="form-group">
                                    <strong class="font-bold">Deseja ativar este usuário?</strong><br/>
                                    <?php
                                    for ($i = 1; $i >= 0; $i--) {
                                        $status = ($i == 1) ? "Sim" : "Não";
                                        if ($usuario['status_usuario'] == $i) {
                                            echo '<label style="margin-rigth: 10px!important;"><input type="radio" name="nStatus" value="' . $i . '" checked/> ' . $status . '  </label>';
                                        } else {
                                            echo '<label><input type="radio" name="nStatus" value="' . $i . '"/> ' . $status . ' </label>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <strong class="font-bold">Nível de Acesso:</strong><br/>
                                    <?php
                                    for ($i = 0; $i <= 1; $i++) {
                                        $status = ($i == 1) ? "Administrador" : "Usuário";
                                        if ($usuario['nivel_usuario'] == $i) {
                                            echo '<label><input type="radio" name="tNivelDeAcesso" value="' . $i . '" checked/> ' . $status . '  </label>';
                                        } else {
                                            echo '<label style="margin-rigth: 10px!important;"><input type="radio" name="tNivelDeAcesso" value="' . $i . '"/> ' . $status . ' </label>';
                                        }
                                    }
                                    ?>
                                </div>
                                <?php endif; // $_SESSION['ka_usuario_permissao']?>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="qtd_fotos" value="1">
                                <p class="text-center" style="margin-top: 10%;
                                   " id="fotos">
                                    <img src="<?php echo (isset($usuario['imagem_usuario']) && !empty($usuario['imagem_usuario'])) ? BASE_URL . "/" . $usuario['imagem_usuario'] : BASE_URL . "/assets/painel_admin/imagens/user.png"; ?>" class="img-center" alt="Kananda" id="viewImagem-1"/>
                                    <label class="btn btn-danger" for="cFileImagem">Escolher Imagem</label>
                                    <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)"/>
                                    <input type="hidden" name="nImagem-1" value="<?php echo (isset($usuario['imagem_usuario']) && !empty($usuario['imagem_usuario'])) ? $usuario['imagem_usuario'] : ""; ?>"/>
                                </p>

                            </div>
                        </article>
                    </section>
                    <div  class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg" name="nSalvar" value="Salvar">
                    </div>
                </form>
            </article><!--FIM CONTAINER-USUARIO-->
        </div> 
        <!--fim row-->

        <footer class="row clear" id="container-footer">
            <div class="col-xs-12">
                <p class="text-right">&copy; Desenvolvido por Joab Torres Alencar.</p>
            </div>
        </footer><!--fim footer e row -->

    </section>
</div>
<!-- /#page-wrapper -->