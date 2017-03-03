<?php

class controller {
    protected function checkUser(){
        if (isset($_SESSION['usuario']['status']) && $_SESSION['usuario']['status']) {
           return true;
        } else {
            header("Location: /painel_admin/home");
        }
    }

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        include 'views/' . $viewName['diretorio'] . '/' . $viewName['view'] . '.php';
    }

    public function loadTemplate($viewName, $viewData = array()) {
        include 'views/' . $viewName['diretorio'] . '/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData) {
        extract($viewData);
        include 'views/' . $viewName['diretorio'] . '/' . $viewName['view'] . '.php';
    }
    
}

?>
