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
            $usuario = array("email" => addslashes(strtolower($_POST['tEmail'])), "senha" => md5(md5(addslashes($_POST['tSenha']))));
            $usuarioModal = new Usuario();
            if ($usuarioModal->logar($usuario)) {
                $usuario = $usuarioModal->getUsuario();
                if ($usuario["status_usuario"] == 1) {
                    $_SESSION['msg'] = array();
                    //criando sessão do usuario com seus privilegios
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
        //mensagem de envio de e-mail
        if (isset($_SESSION['msg'])) {
            $dados['msg'] = $_SESSION['msg'];
        }

        $this->loadView($viewName, $dados);
        //Ação para recupera senha
        if (isset($_POST['nEnviarNovaSenha'])) {
            $email = addslashes($_POST['nSearchEmail']);
            $this->recupera($email);
            $_POST = array();
            echo "<script>$('#model_recupera_aviso').modal('show');</script>";
        }
    }

    /*
     * public sair() [DESLOGA DO PAINEL]
     * Descrição: Está função desloga do painel e limpa a $_SESSION;
     * @author Joab Torres Alencar 
     */

    public function sair() {
        if ($this->checkUserPattern()) {
            $_SESSION['usuario'] = array();
            header("Location: /painel_admin/login");
        }
    }

    /*
     * private recupera($email) [GERA UMA NOVA SENHA]
     * Descrição: Está função tem como objetivo gera uma nova senha para o e-mail solicitado, desde que este mesmo esteja cadastrado.
     * @param String $email
     * @author Joab Torres Alencar
     */

    private function recupera($email) {
        $_SESSION['msg'] = array();
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
                                            <span style="font-weight:bold">Email: </span>' . $email . '<br/>
                                            <span style="font-weight:bold">Nova Senha: </span>' . $senha . '<br/>
                                                 <a href="http://www.kananda.imb.br/" style="text-decoration: none; font-weight: bold;">Website</a>
					</p>
				</div>
			</body>
			</html>';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Kananda Négocios Imobiliários <contato@kananda.imb.br>' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            if (mail($destinatario, $assunto, $mensagem, $headers)) {
                $_SESSION['msg'] = 'Foi enviado uma nova senha para o e-mail informado, dentro de 5 a 10 minutos estará caixa de entrada.';
            }
        } else {
            $_SESSION['msg'] = "Este 'E-mail' não está cadastrado no sistema!";
        }
    }

}
