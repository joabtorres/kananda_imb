<?php

class homeController extends controller {

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