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
            $viewName = array("diretorio" => "painel_admin", "view" => "home");
            $this->loadTemplate($viewName, $dados);
        } else {
            header("Location:  /painel_admin/login");
        }
    }

}
