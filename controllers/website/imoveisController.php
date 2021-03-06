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

    /*
     * IMÓVEIS PARA comprar
     */

    public function casa_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Casa", "Comprar", "casa_comprar");
    }

    public function terreno_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Terreno", "Comprar", "terreno_comprar");
    }

    public function ponto_comercial_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Ponto Comercial", "Comprar", "ponto_comercial_comprar");
    }

    public function loja_comercial_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Loja Comercial", "Comprar", "loja_comercial_comprar");
    }

    public function loteamento_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Loteamento", "Comprar", "loteamento_comprar");
    }

    public function galpao_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Galpão", "Comprar", "galpao_comprar");
    }

    public function apartamento_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Apartamento", "Comprar", "apartamento_comprar");
    }

    public function kitnet_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Kitnet", "Comprar", "kitnet_comprar");
    }

    public function chacara_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Chácara", "Comprar", "chacara_comprar");
    }

    public function fazenda_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Fazenda", "Comprar", "fazenda_comprar");
    }

    public function area_portuaria_comprar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Área Portuária", "Comprar", "area_portuaria_comprar");
    }

    public function empreendimentos($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, null, null, "empreendimentos");
    }

    /*
     * IMÓVEIS PARA ALUGAR
     */

    public function casa_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Casa", "Alugar", "casa_alugar");
    }

    public function terreno_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Terreno", "Alugar", "terreno_alugar");
    }

    public function ponto_comercial_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Ponto Comercial", "Alugar", "ponto_comercial_alugar");
    }

    public function loja_comercial_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Loja Comercial", "Alugar", "loja_comercial_alugar");
    }

    public function loteamento_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Loteamento", "Alugar", "loteamento_alugar");
    }

    public function galpao_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Galpão", "Alugar", "galpao_alugar");
    }

    public function apartamento_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Apartamento", "Alugar", "apartamento_alugar");
    }

    public function kitnet_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Kitnet", "Alugar", "kitnet_alugar");
    }

    public function chacara_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Chácara", "Alugar", "chacara_alugar");
    }

    public function fazenda_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Fazenda", "Alugar", "fazenda_alugar");
    }

    public function area_portuaria_alugar($page = array()) {
        $page = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $this->filtra_imoveis($page, "Área Portuária", "Alugar", "area_portuaria_alugar");
    }

    public function buscar($page = array()) {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $imoveisModal = new ImoveisView();
        $imovel = array();
        //BUSCAR RAPIDA
        if (isset($_POST['tBuscaRapida'])) {
            $_SESSION['imovel'] = array();
            $_SESSION['imovel']['status'] = 0;
            $_SESSION['imovel']['referencia'] = $_POST['tReferencia'];
            //BUSCAR AVANÇADA
        } else if (isset($_POST['tBuscarAvancada'])) {
            $_SESSION['imovel'] = array();

            $_SESSION['imovel']['status'] = 0;
            $_SESSION['imovel']['imovel'] = $_POST['tSelecionaImovel'];
            if ($_POST['tFinalidade'] != "Comprar e Alugar") {
                $_SESSION['imovel']['finalidade'] = $_POST['tFinalidade'];
            }
            if ($_POST['tCategoria'] != 'Todos') {
                $_SESSION['imovel']['categoria'] = $_POST['tCategoria'];
            }
            if (!empty($_POST['tSelecionaQntSuites'])) {
                $_SESSION['imovel']['suite'] = $_POST['tSelecionaQntSuites'];
            }
            if (!empty($_POST['tSelecionaQntQuarto'])) {
                $_SESSION['imovel']['quarto'] = $_POST['tSelecionaQntQuarto'];
            }
            if (!empty($_POST['nSelectQntBanheiro'])) {
                $_SESSION['imovel']['banheiro'] = $_POST['nSelectQntBanheiro'];
            }
            if (!empty($_POST['tSelecionaqntGaragem'])) {
                $_SESSION['imovel']['garagem'] = $_POST['tSelecionaqntGaragem'];
            }
            if (!empty($_POST['tLargura'])) {
                $_SESSION['imovel']['largura'] = $_POST['tLargura'];
            }
            if (!empty($_POST['tComprimento'])) {
                $_SESSION['imovel']['comprimento'] = $_POST['tComprimento'];
            }
            if ($_POST['tSelecionaBairro'] != 'Todos') {
                $_SESSION['imovel']['bairro'] = $_POST['tSelecionaBairro'];
            }
        }
        if (isset($_SESSION['imovel']) && !empty($_SESSION['imovel']) && is_array($_SESSION['imovel'])) {
            $imovel = $_SESSION['imovel'];
        }
        //PAGINACAO
        $limite = 16;
        $total_registro = $imoveisModal->quantidade_imoveis($imovel);
        $paginas = $total_registro / $limite;
        $indice = 0;
        $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $indice = ($pagina_atual - 1) * $limite;
        $dados["paginas"] = $paginas;
        $dados["nome"] = $paginas;
        $dados["pagina_atual"] = $pagina_atual;
        $dados['imovel'] = (!empty($imovel['imovel'])) ? $imovel['imovel'] : "Cod Imóvel";
        if (!empty($imovel['referencia'])) {
            $dados['finalidade'] = $imovel['referencia'];
        } else {
            $dados['finalidade'] = (empty($imovel['referencia']) && empty($imovel['finalidade'])) ? "Comprar e Alugar" : $imovel['finalidade'];
        }

        $dados['metodo_imovel'] = "buscar";
        $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
        $this->loadTemplate($viewName, $dados);
    }

    private function filtra_imoveis($page, $categoria_imovel, $categoria_finalidade, $metodo) {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imoveis");
        $imoveisModal = new ImoveisView();

        $imovel = array();
        $imovel['status'] = 0;
        if (!empty($categoria_imovel)) {
            $imovel['imovel'] = $categoria_imovel;
        }
        if (!empty($categoria_finalidade)) {
            $imovel['finalidade'] = $categoria_finalidade;
        }
        if ($metodo == 'empreendimentos') {
            $imovel['empreendimento'] = 1;
        }

        $limite = 12;
        $total_registro = $imoveisModal->quantidade_imoveis($imovel);
        $paginas = $total_registro / $limite;
        $indice = 0;
        $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
        $indice = ($pagina_atual - 1) * $limite;
        $dados['imovel'] = ($metodo == 'empreendimentos') ? "Empreendimentos" : $imovel['imovel'];
        $dados['finalidade'] = ($categoria_finalidade == null) ? "Comprar e Alugar" : $imovel['finalidade'];
        $dados["paginas"] = $paginas;
        $dados["pagina_atual"] = $pagina_atual;
        $dados['metodo_imovel'] = $metodo;
        $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
        $this->loadTemplate($viewName, $dados);
    }

}
