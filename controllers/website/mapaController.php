<?php

/**
 * mapaController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 04/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class mapaController extends controller {

    public function index() {
        $dados = array();
        $imoveis = array();
        if (file_exists('assets/website/json/imoveis.json')) {
            $imoveis = json_decode(file_get_contents('assets/website/json/imoveis.json'));
            $dados['imoveis'] = array('Todos');
            foreach ($imoveis as $indice) {
                foreach ($indice as $imovel => $campo) {
                    if ('imovel_imovel' == $imovel) {
                        $dados['imoveis'][] = $campo;
                    }
                }
            }
            $dados['imoveis'] = array_unique($dados['imoveis']);
        }
        $viewName = array("diretorio" => "website", "view" => "mapa");
        $this->loadTemplate($viewName, $dados);
    }

}
