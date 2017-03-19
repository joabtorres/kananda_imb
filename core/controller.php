<?php

/**
 * controller - [Controller do MVC]
 * 
 * Descricao: Está Classe é responsável para utilização de herança nas demais classes controllers
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class controller {
    /*
     * protected function checkUser() [VERIFICA SE USUÁRIO ESTÁ LOGADO]
     * Descrição: Verifica se o usuário padrão está logado, se não estiver logado ele é redirencionado para página de login
     * @return TRUE se o usuário estiver logado
     * @author Joab Torres Alencar
     */

    protected function checkUserPattern() {
        if (isset($_SESSION['usuario']['status']) && $_SESSION['usuario']['status']) {
            return true;
        } else {
            header("Location: /painel_admin/login");
        }
    }

    /*
     * protected function checkUserAdministrator() [VERIFICA SE Administrador ESTÁ LOGADO]
     * Descrição: Verifica se o Administrador padrão está logado, se não estiver logado ele é redirencionado para página de login
     * @return TRUE se o administrador estiver logado
     * @author Joab Torres Alencar
     */

    protected function checkUserAdministrator() {
        if (isset($_SESSION['usuario']['status']) && $_SESSION['usuario']['status'] && $_SESSION['usuario']['nivel']) {
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
