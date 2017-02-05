<?php

class homeController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "home");
        $this->loadTemplate($viewName, $dados);
    }

}

?>