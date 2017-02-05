<?php

/**
 * imovelController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 04/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class imovelController extends controller{
    
    public function  index(){
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "imovel");
        $this->loadTemplate($viewName, $dados);
    }

}
