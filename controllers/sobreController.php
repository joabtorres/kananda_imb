<?php

/**
 * sobreController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 04/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class sobreController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "sobre");
        $this->loadTemplate($viewName, $dados);
    }

}
