<?php

/**
 * configuracoesController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class configuracoesController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "configuracoes_geral");
        $this->loadTemplate($viewName, $dados);
    }

    public function slideshow() {
        if ($this->checkUserPattern() && $_SESSION['usuario']['nivel']) {
            $dados = array();
            $confModal = new Configuracoes();
            $dados['banners'] = $confModal->lista_slide();
            if (isset($_POST['nSalvarSlide'])) {
                $slide = array();
                for ($i = 1; $i <= $_POST['tQnt_fotos']; $i++) {
                    if (isset($_FILES['tImagem-' . $i]) && !empty($_FILES['tImagem-' . $i]) && $_FILES['tImagem-' . $i]['error'] == 0) {
                        $slide[$i - 1] = $_FILES['tImagem-' . $i];
                    } else if (!empty($_POST['nImagem-' . $i])) {
                        $slide[$i - 1] = $_POST['nImagem-' . $i];
                    }
                }
                $_POST = array();
                $confModal->salvar_slide($slide);
                header("Location: /painel_admin/configuracoes/slideshow");
            }
            $viewName = array("diretorio" => "painel_admin", "view" => "configuracoes_slideshow");
            $this->loadTemplate($viewName, $dados);
        }
    }

}
