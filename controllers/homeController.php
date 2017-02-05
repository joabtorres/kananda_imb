<?php

class homeController extends controller {

    public function index() {
        if ($_SESSION['ka_usuario_ativo']) {
            $dados = array();
            $viewName = array("diretorio" => "website", "view" => "home");
            $this->loadTemplate($viewName, $dados);
        } else {
            header("Location:  /painel_admin/login");
        }
    }

}

?>