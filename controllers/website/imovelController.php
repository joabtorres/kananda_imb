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
class imovelController extends controller {

    public function index($id) {
        if (!empty($id)) {
            $dados = array();
            $viewName = array("diretorio" => "website", "view" => "imovel");
            $imovelModel = new ImoveisView();
            $dados["imovel"] = $imovelModel->listar_imovel(addslashes($id));
            if (is_array($dados['imovel']) && !empty($dados["imovel"])) {
                $dados["imagens"] = $imovelModel->listar_imagens(addslashes($id));
                $imovelModel->setVisita($id);
                $this->loadTemplate($viewName, $dados);
            } else {
                header("location: /home");
            }
        } else {
            header("location: /home");
        }
    }

}
