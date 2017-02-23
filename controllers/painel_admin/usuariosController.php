<?php

/**
 * usuariosController - [Controller do Usuario]
 * 
 * Descricao: Classe responsável para atividades relacionadas a cadastro, consultas, controle de acesso ao usuário.
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class usuariosController extends controller {
    /*
     * public index() [action padrao MVC]
     * Descrição: Está funcão carrega a lista dos usuários cadastrados. 
     */

    public function index() {
        $this->cadastrados();
    }

    /*
     * public cadastrar() ['cadastrar um novo usuário]
     * Descrição: Está função valida os campos do formulário na view usuarios_cadastrar e efetua o cadastro de um novo usuário no banco.
     * OBS 1: Somente administradores podem cadastrar usuários e alterar nível de acesso.
     */

    public function cadastrar() {
        if ($this->checkUser() && $_SESSION['ka_usuario_permissao']) {
            $dados = array();
            if (isset($_POST['nSalvar'])) {
                $usuario = array();
                //nome
                if (isset($_POST['tNome']) && !empty($_POST['tNome'])) {
                    $usuario['nome'] = ucwords(strtolower(addslashes($_POST['tNome'])));
                } else {
                    $dados['erro']['nome'] = 'Por favor informe o nome do usuário!';
                }
                //email
                if (isset($_POST['nEmail']) && !empty($_POST['nEmail'])) {
                    $usuario['email'] = ucwords(strtolower(addslashes($_POST['nEmail'])));
                } else {
                    $dados['erro']['email'] = 'Por favor informe um e-mail valido';
                }
                //senha
                if (isset($_POST['nSenha']) && !empty($_POST['nSenha']) && isset($_POST['nRepetirSenha']) && empty($_POST['nRepetirSenha'])) {
                    if ($_POST['nRepetirSenha'] == $_POST['nRepetirSenha']) {
                        $usuario['senha'] = ucwords(strtolower(addslashes($_POST['nSenha'])));
                    } else {
                        $dados['erro']['senha'] = '<b>Senha</b> e <b>Repetir Senha</b> não estão iguais! ';
                    }
                } else {
                    $dados['erro']['senha'] = 'Os campos <b>Senha</b> e <b>Repetir Senha</b> não foram preenchidos! ';
                }

                //ativa usuario
                $usuario["status"] =  addslashes($_POST['nStatus']);
                //Nível de Acesso
                $usuario['acesso'] = addslashes($_POST['tNivelDeAcesso']);

                //imagem
                //email
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $usuario['imagem'] = $_FILES['tImagem-1'];
                }else{
                    $dados['erro']['imagem'] = "Insira uma imagem com extensão JPG, JPEG ou PNG !";
                }
                if (isset($dados['erro']) && is_array($dados['erro'])) {
                    echo '<pre>';
                    print_r($usuario);
                    echo '</pre>';
                }
            }
            $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrar");
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function cadastrados() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrados");
        $this->loadTemplate($viewName, $dados);
    }

    public function pesquisar() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_pesquisar");
        $this->loadTemplate($viewName, $dados);
    }

}
