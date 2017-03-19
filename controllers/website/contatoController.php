<?php

/**
 * contatoController - [Controller da pagina contato MVC]
 * 
 * Descricao: Classe utilizada para controle da página Contato
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class contatoController extends controller {
    /*
     * public index() [Action MVC]
     * Descricao: Carrega a view contato
     * @author Joab Torres Alencar
     */

    public function index() {
        $dados = array();
        $viewName = array("diretorio" => "website", "view" => "contato");
        if (isset($_POST['nEnviar']) && !empty($_POST['nEnviar'])) {
            $email_solicitado = array();
            if (!empty($_POST['nNome']) && !empty($_POST['nTelefone']) && !empty($_POST['nEmail'])) {
                if ($this->verificarEmail(addslashes($_POST['nEmail']))) {
                    $email_solicitado['nome'] = addslashes($_POST['nNome']);
                    $email_solicitado['telefone'] = addslashes($_POST['nTelefone']);
                    $email_solicitado['email'] = addslashes($_POST['nEmail']);
                    $email_solicitado['msg'] = addslashes($_POST['nMensagem']);
                    $this->enviarEmail($email_solicitado);
                } else {
                    echo "<script>alert('E-mail inválido, preencha o campo email corretamente.');</script>";
                }
            } else {
                echo "<script>alert('Não é possível enviar o email, os campos nome, telefone e email não foram  preenchidos.');</script>";
            }
        }
        $this->loadTemplate($viewName, $dados);
    }

    /*
     * private enviarEmail($cliente) [Envio de Email]
     * Descrição: Está função é utilizada para envio para email coorporativo da empresa, cujo os dados são inseridos por um cliente
     * @params array $cliente['nome'], $cliente['email'], $cliente['telefone'], $cliente['msg']
     * @return TRUE OR FALSE
     * @author Joab Torres Alencar
     */

    private function enviarEmail($cliente) {
        $destinatario = "contato@kananda.imb.br";
        $assunto = "WEBSITE - CONTATO VIA EMAIL";
        $mensagem = '<!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <title>' . $assunto . '</title>
                </head>
                <body>
                    <div style="width: 98%;display: block;margin: 10px auto;padding: 0;font-family: Arial, sans-serif; border : 2px solid #EAE8E8;">
                    <h3 style="background: #405192;color: white;padding: 10px;margin: 0;"> <small>' . $assunto . '</small> <br/> Kananda Negócios Imobiliários</h3>
                        <div style="padding: 10px;">
                            <p>
                                Um novo e-mail foi envido do website, confira abaixo:
                            </p>
                            <p style="margin: 0;">
                                <b>Nome: </b>' . $cliente['nome'] . '
                            </p>
                            <p style="margin: 0;">
                                <b>Email: </b>' . $cliente['email'] . '
                            </p>
                            <p style="margin: 0;">
                                <b>Telefone: </b>' . $cliente['telefone'] . '
                            </p >
                            <p style="margin: 0;">
                                <b>Mensagem: </b><br/>' . $cliente['msg'] . '
                            </p>
                            <p>
                                Visite o website <a href="http://www.kananda.imb.br/" target="_blank" style="text-decoration: none; font-weight: bold;">clique aqui</a>.
                            </p>
                        </div>
                    </div>
                </body>
                </html>';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Kananda Négocios Imobiliários <contato@kananda.imb.br>' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        if (mail($destinatario, $assunto, $mensagem, $headers)) {
            echo "<script> alert('Mensagem Envidada!')</script>";
        } else {
            echo "<script> alert('Email não enviado!')</script>";
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
?>

