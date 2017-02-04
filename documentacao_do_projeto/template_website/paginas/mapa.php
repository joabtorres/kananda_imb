<!-- Corpo do site [PARTE DINAMICA]-->
<section class="row">
    <!-- CHAMADA PARA O SLIDE SHOW -->
    <article class="col-xs-12 bg-azul title-destaque">
        <h2><strong>MAPA</strong><br><small>
                Localidade dos imóveis</small></h2>
    </article><!-- FIM CHAMADA PARA O SLIDE SHOW -->
</section> <!-- FIM ROW-->

<section class="row">
    <article class="col-xs-12 list-container" id="pageMapa">
        <div id="view-mapa-imoveis"></div>
    </article>

</section>
<section class="row">
    <article class="col-md-offset-2 col-md-8 bg-primary" id="filtreMapa">
        <form>
            <div class="form-group col-md-6">
                <label for="cFinalidade">Finalidade</label>
                <select name="tFinalidade" id="cFinalidade" class="form-control">
                    <option value="" selected="true">Comprar e Alugar</option>
                    <option value="Comprar">Comprar</option>
                    <option value="Alugar">Alugar</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="cSelecionaImovel"> Imóvel</label>
                <select name="tSelecionaImovel" id="cSelecionaImovel" class="form-control">
                    <option value="" selected="true"> Todos</option>
                    <option value="Casa">Casa</option>
                    <option value="Terreno">Terreno</option>
                    <option value="Loteamento">Loteamento</option>
                </select>
            </div>
        </form>
    </article>
</section>