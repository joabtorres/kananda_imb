<?php

/**
 * loginController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class loginController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "login");
        $this->loadView($viewName, $dados);
    }

}
