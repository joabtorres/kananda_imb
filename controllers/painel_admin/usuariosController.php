<?php

/**
 * usuariosController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class usuariosController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrar");
        $this->loadTemplate($viewName, $dados);
    }
    public function cadastrar(){
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrar");
        $this->loadTemplate($viewName, $dados);
    }
    public function cadastrados(){
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrados");
        $this->loadTemplate($viewName, $dados);
    }
    public function pesquisar(){
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_pesquisar");
        $this->loadTemplate($viewName, $dados);
    }
}
