<?php

/**
 * loginController - [CONTROLER DE LOGIN MVC]
 * 
 * Descricao: Classe utulizada para controle MVC e ações como logar, sair e recupera senha do usuário;
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class loginController extends controller {
    /*
     * public index() [VALIDA LOGIN]
     * Descrição: Está função tem  como objetivo valida o login do usuário e salva na SESSION o cod, nome, status ativo e nível de acesso
     * @author Joab Torres Alencar
     */

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "login");
        if ((isset($_POST['tEmail']) && !empty($_POST['tEmail'])) && isset($_POST['tSenha']) && !empty($_POST['tSenha'])) {
            $usuario = array("email" => addslashes(strtolower($_POST['tEmail'])), "senha" => md5(addslashes($_POST['tSenha'])));
            $usuarioModal = new Usuario();
            if ($usuarioModal->logar($usuario)) {
                if ($usuarioModal->getUsuario()["status_usuario"] == 1) {
                    $usuario = $usuarioModal->getUsuario();
                    $_SESSION['usuario'] = array();
                    $_SESSION['usuario']['cod'] = isset($usuario["cod_usuario"]) ? $usuario["cod_usuario"] : FALSE;
                    $_SESSION['usuario']['nome'] = isset($usuario["nome_usuario"]) ? $usuario["nome_usuario"] : "";
                    $_SESSION['usuario']['status'] = ($usuario["status_usuario"] == 1) ? TRUE : FALSE;
                    $_SESSION['usuario']['nivel'] = ($usuario["nivel_usuario"] == 1) ? TRUE : FALSE;
                    header("Location: /painel_admin/home");
                } else {
                    $dados['erro'] = "Usuário ainda está INATIVO";
                }
            } else {
                $dados['erro'] = "Usuário ou senha incorreto";
            }
        }
        $this->loadView($viewName, $dados);
    }

    /*
     * public sair() [DESLOGA DO PAINEL]
     * Descrição: Está função desloga do painel e limpa a $_SESSION;
     */

    public function sair() {
        $_SESSION['usuario'] = array();
        header("Location: /painel_admin/login");
    }

}
