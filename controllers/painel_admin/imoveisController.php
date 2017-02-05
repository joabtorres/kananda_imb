<?php

/**
 * imoveisController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class imoveisController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "home");
        $this->loadTemplate($viewName, $dados);
    }

    public function mais_visitados() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_mais_visitados");
        $this->loadTemplate($viewName, $dados);
    }

    public function cadastrar() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_cadastrar");
        $this->loadTemplate($viewName, $dados);
    }

    public function cadastrados() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_cadastrados");
        $this->loadTemplate($viewName, $dados);
    }

    public function pesquisar() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_pesquisar");
        $this->loadTemplate($viewName, $dados);
    }

    public function ocultos() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_ocultos");
        $this->loadTemplate($viewName, $dados);
    }

}
