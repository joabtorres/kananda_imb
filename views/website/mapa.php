
<!-- Corpo do site [PARTE DINAMICA]-->
<section class="row">
    <!-- CHAMADA PARA O SLIDE SHOW 
    <article class="col-xs-12 bg-azul title-destaque">
        <h2><strong>MAPA</strong><br><small>
                Localidade dos imóveis</small></h2>
    </article>FIM CHAMADA PARA O SLIDE SHOW -->
    <article class="col-xs-12 bg-azul title-destaque" style="padding: 0;">
        <img src="<?php echo BASE_URL ?>/assets/website/imagens/banner_mapa.jpg" class="img-responsive"/>
    </article>

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
                <label for="cFinalidadeMapa">Finalidade</label>
                <select name="tFinalidade" id="cFinalidadeMapa" class="form-control"  onclick="filtrar_mapa()">
                    <option value="Comprar e Alugar" selected="selected">Comprar e Alugar</option>
                    <option value="Comprar">Comprar</option>
                    <option value="Alugar">Alugar</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="cSelecionaImovelMapa" > Imóvel</label>
                <select name="tSelecionaImovel" id="cSelecionaImovelMapa" class="form-control" onchange="filtrar_mapa()">
                    <?php
                    foreach ($imoveis as $imovel) {
                        if ($imovel == "Todos") {
                            echo '<option value="' . $imovel . '" selected="selected">' . $imovel . '</option>';
                        } else {
                            echo '<option value="' . $imovel . '">' . $imovel . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </form>
    </article>
</section>

