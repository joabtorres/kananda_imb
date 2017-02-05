<?php

class contatoController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "contato");
        $this->loadTemplate($viewName, $dados);
    }

}
?>

