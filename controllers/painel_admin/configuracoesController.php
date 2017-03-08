<?php

/**
 * configuracoesController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class configuracoesController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "configuracoes_geral");
        $this->loadTemplate($viewName, $dados);
    }

    public function slideshow() {
        $dados = array();
        
        $viewName = array("diretorio" => "painel_admin", "view" => "configuracoes_slideshow");
        $this->loadTemplate($viewName, $dados);
    }

}
