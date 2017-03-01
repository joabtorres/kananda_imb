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
        header("location: /home");
    }
    
    public function apartamento_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Apartamento", "Comprar", "apartamento_comprar");
    }

    public function apartamento_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Apartamento", "Alugar", "apartamento_alugar");
    }

    public function area_portuaria_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Área Portuária", "Comprar", "area_portuaria_comprar");
    }

    public function area_portuaria_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Área Portuária", "Alugar", "area_portuaria_alugar");
    }

    public function casa_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Casa", "Comprar", "casa_comprar");
    }

    public function casa_Alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Casa", "Alugar", "casa_Alugar");
    }

    public function terreno_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Terreno", "Comprar", "terreno_comprar");
    }

    public function terreno_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Terreno", "Alugar", "terreno_alugar");
    }

    public function ponto_comercial_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Ponto Comercial", "Comprar", "ponto_comercial_comprar");
    }

    public function ponto_comercial_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Ponto Comercial", "Alugar", "ponto_comercial_alugar");
    }
    public function buscar($page = array()){
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Ponto Comercial", "Alugar", "ponto_comercial_alugar");
    }

    private function filtra_imoveis($page, $categoria_imovel, $categoria_finalidade, $metodo) {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $imoveisModal = new ImoveisView();

        $imovel = array();
        $imovel['status'] = 0;
        $imovel['imovel'] = $categoria_imovel;
        $imovel['finalidade'] = $categoria_finalidade;
        $limite = 9;
        $total_registro = $imoveisModal->quantidade_imoveis($imovel);
        $paginas = $total_registro / $limite;
        $indice = 0;
        $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $indice = ($pagina_atual - 1) * $limite;
        $dados['imovel'] = $imovel['imovel'];
        $dados['finalidade'] = $imovel['finalidade'];
        $dados["paginas"] = $paginas;
        $dados["pagina_atual"] = $pagina_atual;
        $dados['metodo_imovel'] = $metodo;
        $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
        $this->loadTemplate($viewName, $dados);
    }

}
