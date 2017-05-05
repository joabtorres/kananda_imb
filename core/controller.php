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

    /*
     * Está função verifica se existe um imóvel registrado com sua finalidade OPOSTA
     * @param String $imovel : Nome do imóvel
     * @param String $finaldiade : finaidade oposta do imóvel
     * @access protected 
     * @return bollean TRUE OR FALSE
     * @author Joab Torres Alencar <joabtorres1508@gmail.com>
     */

    protected function checkImovel($imovel, $finalidade) {
        if (!isset($_SESSION['checkimovel'])) {
            $imovelModel = new ImoveisView();
            $_SESSION['checkimovel'] = $imovelModel->menu();
        }
        foreach ($_SESSION['checkimovel'] as $temp) {
            if ($temp['imovel_imovel'] == $imovel && $temp['finalidade_imovel'] != $finalidade) {
                return TRUE;
            }
        }
        return FALSE;
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
