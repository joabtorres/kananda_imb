<?php

class homeController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "home");
        $imoveis = new ImoveisView();
        $imovel = array();
        $imovel['status'] = 0;
        $imovel['destaque'] = 1;
        $dados['nome'] = 'joabtorres';
        $dados['imoveis'] = $imoveis->listar_imoveis($imovel, 0, 4);
        $this->loadTemplate($viewName, $dados);
    }

}

?>