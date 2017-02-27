<?php

/**
 * homeController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class homeController extends controller {

    public function index() {
        if ($_SESSION['ka_usuario_ativo']) {
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
