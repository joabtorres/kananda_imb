<?php

/**
 * homeController - [CONTROLER DE LOGIN MVC]
 * 
 * Descricao: Classe é utilizada para controle MVC da página home do website;
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class homeController extends controller {
    /*
     * public index() [ACTION]
     * Descrição: Está função carrega o conteúdo dinamico da página home do website
     * @author Joab Torres Alencar
     */
    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "home");
        $imoveis = new ImoveisView();
        $confModel = new Configuracoes();
        $imovel = array();
        $imovel['status'] = 0;
        $imovel['destaque'] = 1;
        $dados['banners'] = $confModel->lista_slide();
        $dados['imoveis'] = $imoveis->listar_imoveis($imovel, 0, 4);
        $this->loadTemplate($viewName, $dados);
    }

}

?>