<?php

/**
 * contatoController - [Controller da pagina contato MVC]
 * 
 * Descricao: Classe utilizada para controle da página Contato
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class contatoController extends controller {
    /*
     * public index() [Action MVC]
     * Descricao: Carrega a view contato
     */
    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "contato");
        $this->loadTemplate($viewName, $dados);
    }

}
?>

