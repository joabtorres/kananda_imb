<?php

/**
 * homeController - [CONTROLE MVC]
 * 
 * Descricao: Está Classe é utilizado como controle de MVC via URL do Painel Administrativo
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class homeController extends controller {
    /*
     * public index() [PAGINA INICIAL DO PAINEL]
     * Descrição: Está função verifica se o usuário está logado no sistema caso ele esteja ele tera permissão para vizualiza a página inical painel adminstrativo
     * @author Joab Torres Alencar
     */

    public function index() {
        if ($this->checkUserPattern()) {
            $dados = array();
            $imovelModel = new Imoveis();
            $dados['imoveis_cadastrados'] = $imovelModel->quantidade_imoveis();
            $imovel = array('status' => 1);
            $dados['imoveis_ocultos'] = $imovelModel->quantidade_imoveis($imovel);
            $viewName = array("diretorio" => "painel_admin", "view" => "home");
            $this->loadTemplate($viewName, $dados);
        } else {
            header("Location:  /painel_admin/login");
        }
    }

}
