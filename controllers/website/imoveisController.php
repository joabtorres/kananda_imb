<?php

/**
 * imoveisController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 04/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class imoveisController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }

    public function apartamento_comprar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }

    public function apartamento_alugar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }

    public function area_portuaria_comprar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }

    public function area_portuaria_alugar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
    public function casa_comprar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
    public function casa_Alugar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
    public function terreno_comprar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
    public function terreno_alugar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
    public function predio_comercial_comprar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
    public function predio_comercial_alugar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $this->loadTemplate($viewName, $dados);
    }
}
