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
        if ($this->checkUser() && $_SESSION['usuario']['nivel']) {
            $dados = array();
            if (isset($_POST['nSalvar'])) {
                $usuario = array();
                $usuarioModal = new Usuario();
                //nome
                if (isset($_POST['tNome']) && !empty($_POST['tNome'])) {
                    $usuario['nome'] = ucwords(strtolower(addslashes($_POST['tNome'])));
                } else {
                    $dados['erro']['nome'] = 'Por favor informe o nome do usuário!';
                }
                //email
                if (isset($_POST['nEmail']) && !empty($_POST['nEmail'])) {
                    $usuario['email'] = strtolower(addslashes($_POST['nEmail']));
                    if (!$this->verificarEmail($usuario['email'])) {
                        $dados['erro']['email'] = 'Por favor informe um e-mail valido @';
                    }
                    if ($usuarioModal->buscarEmail($usuario['email'])) {
                        $dados['erro']['email'] = 'Email já cadastrado!';
                    }
                } else {
                    $dados['erro']['email'] = 'Por favor informe um e-mail valido';
                }
                //senha
                if (isset($_POST['nSenha']) && !empty($_POST['nSenha']) && isset($_POST['nRepetirSenha']) && !empty($_POST['nRepetirSenha'])) {
                    if ($_POST['nSenha'] == $_POST['nRepetirSenha']) {
                        $usuario['senha'] = md5(addslashes($_POST['nSenha']));
                    } else {
                        $dados['erro']['senha'] = '<b>Senha</b> e <b>Repetir Senha</b> não estão iguais! ';
                    }
                } else {
                    $dados['erro']['senha'] = 'Os campos <b>Senha</b> ou <b>Repetir Senha</b> não foram preenchidos! ';
                }

                //ativa usuario
                $usuario["status"] = addslashes($_POST['nStatus']);
                //Nível de Acesso
                $usuario['nivel'] = addslashes($_POST['tNivelDeAcesso']);

                //imagem
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $usuario['imagem'] = $_FILES['tImagem-1'];
                }

                if (!isset($dados['erro']) && empty($dados['erro']) && count($dados['erro']) == 0) {
                    $usuarioModal->cadastrar($usuario);
                    header("Location: /painel_admin/usuarios/cadastrados");
                }
            }
            $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrar");
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function cadastrados() {
        if ($this->checkUser() && $_SESSION['usuario']['nivel']) {

            $dados = array();
            $usarioModel = new Usuario();
            $dados['usuarios'] = $usarioModel->listar();
            $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrados");
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function editar($cod) {
        if ($this->checkUser()) {
            $dados = array();
            $usuarioModel = new Usuario();
            if ($cod == $_SESSION['usuario']['cod']) {
                $dados['usuario'] = $usuarioModel->buscarID($cod);
            } else if ($_SESSION['usuario']['nivel'] && !empty($cod)) {
                $dados['usuario'] = $usuarioModel->buscarID($cod);
            }
            if (isset($_POST['nSalvar'])) {
                $usuario = array();
                //nome
                $usuario['cod'] = $_POST['tCod'];

                if (isset($_POST['tNome']) && !empty($_POST['tNome'])) {
                    $usuario['nome'] = ucwords(strtolower(addslashes($_POST['tNome'])));
                } else {
                    $dados['erro']['nome'] = 'Por favor informe o nome do usuário!';
                }
                //senha
                if (isset($_POST['nSenha']) && isset($_POST['nRepetirSenha'])) {
                    if ($_POST['nSenha'] == $_POST['nRepetirSenha']) {
                        $usuario['senha'] = md5(addslashes($_POST['nSenha']));
                    } else {
                        $dados['erro']['senha'] = '<b>Senha</b> e <b>Repetir Senha</b> não estão iguais! ';
                    }
                }
                //ativa usuario
                $usuario["status"] = addslashes($_POST['nStatus']);
                //Nível de Acesso
                $usuario['nivel'] = addslashes($_POST['tNivelDeAcesso']);

                //imagem
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $usuario['imagem']['nova'] = $_FILES['tImagem-1'];
                }
                $usuario['imagem']['atual'] = $_POST['nImagem-1'];
                if (!isset($dados['erro']) && empty($dados['erro']) && count($dados['erro']) == 0) {
                    $usuarioModel->salvar($usuario);
                    header("Location: /painel_admin/usuarios/cadastrados");
                }
            }
            $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_editar");
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function excluir($cod) {
        
    }

    public function recupera($cod) {
        
    }
    /*
     * private  verificarEmail($emial) [verifica dns do email destinatário]
     * Descrição: Está função verifica o dns do email destinatário e retorna verdade ou falso
     * @parem String $email - Email informado
     * @return True ou False
     * @author Joab Torres Alencar
     */
    private function verificarEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            list($usuario, $dominio) = explode("@", $email);
            if (checkdnsrr($dominio, 'MX')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
