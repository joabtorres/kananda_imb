<div id="page-wrapper">
    <section class="container-fluid">
        <div class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Cadastrar Novo Usuário</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar Novo Usuário</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <article class="container-usuario clear">
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                    <section class="panel panel-primary">
                        <header class="panel-heading"><strong class="font-bold">DADOS GERAIS</strong></header>
                        <article class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group
                                <?php
                                echo (isset($erro['nome'])) ? "has-error" : "";
                                ?>" >
                                    <label  class="control-label" for="cNome">Nome Completo: *</label>
                                    <input type="text" name="tNome" id="cNome" class="form-control" value="<?php echo (isset($_POST['tNome']) && !empty($_POST['tNome'])) ? $_POST['tNome'] : ""; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cEmail">E-mail:</label>
                                    <input type="email" name="nEmail" id="cEmail" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cSenha">Senha:</label>
                                    <input type="password" name="nSenha" id="cSenha" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cRepetirSenha">Repetir Senha:</label>
                                    <input type="password" name="nRepetirSenha" id="cRepetirSenha" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <strong class="font-bold">Deseja ativar este usuário?</strong><br/>
                                    <label><input type="radio" name="nStatus" value="1" checked/> Sim</label>
                                    <label><input type="radio" name="nStatus" value="0"/> Não</label>
                                </div>
                                <div class="form-group">
                                    <strong class="font-bold">Nível de Acesso:</strong><br/>
                                    <label><input type="radio" name="tNivelDeAcesso" value="0" checked/> Usuário</label>
                                    <label><input type="radio" name="tNivelDeAcesso" value="1"/> Administrador</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="qtd_fotos" value="1">
                                <p class="text-center" style="margin-top: 10%;
                                   " id="fotos">
                                    <img src="imagens/user.png" class="img-center" alt="Kananda" id="viewImagem-1"/>
                                    <label class="btn btn-danger" for="cFileImagem">Escolher Imagem</label>
                                    <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)"/>
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