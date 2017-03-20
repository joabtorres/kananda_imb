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
        if ($this->checkUserPattern() && $_SESSION['usuario']['nivel']) {
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
                        $usuario['senha'] = md5(md5(addslashes($_POST['nSenha'])));
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
        if ($this->checkUserPattern() && $_SESSION['usuario']['nivel']) {
            $dados = array();
            $usarioModel = new Usuario();
            //Buscar usuario
            if (isset($_POST['nEnviar']) && !empty($_POST['nEnviar'])) {
                if ($_POST['tFinalidade'] == 'cod') {
                    $dados['usuarios'] = ($usarioModel->listaPorID(addslashes($_POST['tCampo']))) ? $usarioModel->listaPorID(addslashes($_POST['tCampo'])) : $dados['usuarios'] = $usarioModel->listar();
                } else {
                    $dados['usuarios'] = ($usarioModel->listaPorEmail(addslashes($_POST['tCampo']))) ? $usarioModel->listaPorEmail(addslashes($_POST['tCampo'])) : $dados['usuarios'] = $usarioModel->listar();
                }
                $_POST = array();
            } else {
                $dados['usuarios'] = $usarioModel->listar();
            }

            $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_cadastrados");
            $this->loadTemplate($viewName, $dados);
            //Gera nova senha
            if (isset($_POST['nNovaSenha'])) {
                $email = addslashes($_POST['nNovoSenhaEmail']);
                $this->recupera($email);
                echo "<script>$('#modal_recupera_concluido').modal('show');</script>";
            }
        }
    }

    public function editar($cod) {
        if ($this->checkUserPattern()) {
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
                        $usuario['senha'] = md5(md5(addslashes($_POST['nSenha'])));
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
                    $usuarioModel->alterar($usuario);
                    if ($_SESSION['usuario']['nivel']) {
                        header("Location: /painel_admin/usuarios/cadastrados");
                    } else {
                        header("Location: /painel_admin/home");
                    }
                }
            }
            $viewName = array("diretorio" => "painel_admin", "view" => "usuarios_editar");
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function excluir($cod) {
        if ($this->checkUserPattern() && $_SESSION['usuario']['nivel'] && !empty($cod)) {
            if ($cod != $_SESSION['usuario']['cod']) {
                $usuarioModel = new Usuario();
                $usuarioModel->excluir(addslashes($cod));
            }
            header("Location: /painel_admin/usuarios/cadastrados");
        } else {
            header("Location: /painel_admin/home");
        }
    }

    private function recupera($email) {
        if ($this->checkUserPattern() && $_SESSION['usuario']['nivel'] && !empty($email)) {
            $usuarioModel = new Usuario();
            $senha = $usuarioModel->nova_senha($email);
            if ($senha) {

                // envia email ao usuário
                $assunto = 'Kananda Negócios Imobiliários - Nova Senha';
                $destinatario = $email;
                $mensagem = '<!DOCTYPE html>
			<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<title>' . $assunto . '</title>
			</head>
			<body>
				<div style="width: 98%;display: block;margin: 10px auto;padding: 0;font-family: Arial, sans-serif;border : 2px solid #EAE8E8;">
				<h3 style="background: #405192;color: white;padding: 10px;margin: 0;">Nova Senha! <br/> <small>Kananda Negócios Imobiliários</small></h3>
					<p style="padding: 10px;line-height: 30px;">
                                            Você solicitou uma nova senha de acesso ao painel administrativo do website, confira abaixo sua nova senha de acesso: <br/>
                                            <span style="font-weight:bold">Email: </span>' . $email . ' <br/>
                                            <span style="font-weight:bold">Nova Senha: </span>' . $senha . ' <br/>
                                                 <a href="http://www.kananda.imb.br/" style="text-decoration: none; font-weight: bold;">Website</a>
					</p>
				</div>
			</body>
			</html>';
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Kananda Négocios Imobiliários <contato@kananda.imb.br>' . "\r\n";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                mail($destinatario, $assunto, $mensagem, $headers);
            }
        } else {
            header("Location: /painel_admin/home");
        }
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
