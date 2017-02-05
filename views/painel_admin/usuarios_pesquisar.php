<div id="page-wrapper">
    <section class="container-fluid">
        <article class="row">
            <header class="col-md-12" id="container-breadcrumb">
                <h1 class="page-header">Pesquisar usuários</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                    <li class="active"><span class="glyphicon glyphicon-search"></span> Pesquisar usuários</li>
                </ol>
            </header><!--fim container-breadcrumb-->
            <section class="col-xs-12 clear">
                <section class="panel panel-primary">
                    <header class="panel-heading"><strong class="font-bold">PESQUISAR USUÁRIOS</strong></header>
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
                <article class="col-md-4">
                    <figure class="thumbnail">
                        <img src="imagens/user.png">
                        <p class="text-center"><strong class="font-bold">Joab Torres Alencar</strong> <br/> Usuário Padrão</p>
                        <figcaption>
                            <a href="#" class="btn btn-success btn-block">Recuperar Senha</a>
                            <a href="#" class="btn btn-primary btn-block">Editar</a>
                            <a href="#" class="btn btn-danger btn-block">Excluir</a>
                        </figcaption>
                    </figure>
                </article>
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