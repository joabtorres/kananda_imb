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

    public function casa_comprar($page = array()) {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $imoveisModal = new ImoveisView();

        $imovel = array();
        $imovel['status'] = 0;
        $imovel['imovel'] = "Casa";
        $imovel['finalidade'] = "Comprar";
        $limite = 6;
        $total_registro = $imoveisModal->quantidade_imoveis($imovel);
        $paginas = $total_registro / $limite;
        $indice = 0;
        $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $indice = ($pagina_atual - 1) * $limite;
        $dados['imovel'] = $imovel['imovel'];
        $dados['finalidade'] = $imovel['finalidade'];
        $dados["paginas"] = $paginas;
        $dados["pagina_atual"] = $pagina_atual;
        $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
        $this->loadTemplate($viewName, $dados);
    }

    public function casa_Alugar() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $imoveisModal = new ImoveisView();

        $imovel = array();
        $imovel['status'] = 0;
        $imovel['imovel'] = "Casa";
        $imovel['finalidade'] = "Alugar";
        $limite = 6;
        $total_registro = $imoveisModal->quantidade_imoveis($imovel);
        $paginas = $total_registro / $limite;
        $indice = 0;
        $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $indice = ($pagina_atual - 1) * $limite;
        $dados['imovel'] = $imovel['imovel'];
        $dados['finalidade'] = $imovel['finalidade'];
        $dados["paginas"] = $paginas;
        $dados["pagina_atual"] = $pagina_atual;
        $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
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
