<?php

/**
 * loginController - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class loginController extends controller {

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "login");
        if ((isset($_POST['tEmail']) && !empty($_POST['tEmail'])) && isset($_POST['tSenha']) && !empty($_POST['tSenha'])) {
            $usuario = array("email" => addslashes(strtolower($_POST['tEmail'])), "senha" => md5(addslashes($_POST['tSenha'])));
            $usuarioModal = new Usuario();
            if ($usuarioModal->logar($usuario)) {
                if ($usuarioModal->getUsuario()["status_usuario"] == 1) {
                    $usuario = $usuarioModal->getUsuario();
                    $_SESSION['ka_usuario_cod'] = isset($usuario["cod_usuario"]) ? $usuario["cod_usuario"] : FALSE;
                    $_SESSION['ka_usuario_ativo'] = isset($usuario["nome_usuario"]) ? TRUE : FALSE;
                    $_SESSION['ka_usuario_nome'] = isset($usuario["nome_usuario"]) ? $usuario["nome_usuario"] : "";
                    $_SESSION['ka_usuario_permissao'] = isset($usuario["nivel_usuario"]) ? TRUE : FALSE;
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

    public function sair() {
        $_SESSION = array();
        header("Location: /painel_admin/login");
    }

}
