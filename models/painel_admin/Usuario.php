<?php

/**
 * Usuario - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class Usuario extends model {

    private $usuarios;
    private $usuario;
    private $quantidade;

    public function getUsuario() {
        return $this->usuario;
    }

    public function cadastrar($usuario) {
        $sql = $this->db->prepare('INSERT INTO ka_imb_usuario (nome_usuario, email_usuario, senha_usuario, status_usuario, nivel_usuario, imagem_usuario) VALUES (:nome, :email, :senha, :status, :nivel, :imagem) ;');
        $sql->bindValue(':nome', $usuario['nome']);
        $sql->bindValue(':email', $usuario['email']);
        $sql->bindValue(':senha', $usuario['senha']);
        $sql->bindValue(':status', $usuario['status']);
        $sql->bindValue(':nivel', $usuario['nivel']);
        if (isset($usuario['imagem']) && !empty($usuario['imagem'])) {
            $usuario['imagem'] = $this->salva_imagem($usuario['imagem']);
        } else {
            $usuario['imagem'] = null;
        }
        $sql->bindValue(':imagem', $usuario['imagem']);
        $sql->execute();
    }

    public function salvar($usuario) {
        $sql = $this->db->prepare('UPDATE ka_imb_usuario SET nome_usuario = :nome, senha_usuario = :senha, status_usuario = :status, nivel_usuario = :nivel, imagem_usuario = :imagem WHERE cod_usuario = :cod');
        $sql->bindValue(':nome', $usuario['nome']);
        $sql->bindValue(':senha', $usuario['senha']);
        $sql->bindValue(':status', $usuario['status']);
        $sql->bindValue(':nivel', $usuario['nivel']);
        if (isset($usuario['imagem']['nova']) && !empty($usuario['imagem']['nova'])) {
            $usuario['imagem']['nova'] = $this->salva_imagem($usuario['imagem']['nova']);
            $this->excluir_imagem($usuario['imagem']['atual']);
            $usuario['imagem'] = $usuario['imagem']['nova'];
        } else {
            $usuario['imagem'] = (empty($usuario['imagem']['atual'])) ? null : $usuario['imagem']['atual'];
        }
        $sql->bindValue(':imagem', $usuario['imagem']);
        $sql->bindValue(':cod', $usuario['cod']);
        $sql->execute();
    }

    public function listar() {
        $sql = $this->db->query('SELECT * FROM ka_imb_usuario;');
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return NULL;
        }
    }

    public function buscarEmail($email) {
        $sql = $this->db->prepare('SELECT email_usuario FROM ka_imb_usuario WHERE email_usuario = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarID($cod) {
        $sql = $this->db->prepare('SELECT * FROM ka_imb_usuario WHERE cod_usuario = :cod');
        $sql->bindValue(':cod', $cod);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return false;
        }
    }

    public function deleta() {
        
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function logar($usuario) {
        $sql = $this->db->prepare("SELECT * FROM ka_imb_usuario WHERE email_usuario = :email AND senha_usuario = :senha;");
        $sql->bindValue(":email", $usuario['email']);
        $sql->bindValue(":senha", $usuario['senha']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $this->usuario = $sql->fetch();
            return true;
        } else {
            false;
        }
    }

    private function salva_imagem($imagem_usuario) {
        $imagem = array();
        $largura = 128;
        $altura = 128;
        $imagem['temp'] = $imagem_usuario['tmp_name'];
        $imagem['extensao'] = explode(".", $imagem_usuario['name']);
        $imagem['extensao'] = strtolower(end($imagem['extensao']));
        $imagem['name'] = md5(rand(1000, 900000) . time()) . '.' . $imagem['extensao'];
        $imagem['diretorio'] = 'uploads/usuarios';
        if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg' || $imagem['extensao'] == 'png') {

            list($larguraOriginal, $alturaOriginal) = getimagesize($imagem['temp']);
            $ratio = $larguraOriginal / $alturaOriginal;
            if ($largura / $altura > $ratio) {
                $largura = $altura * $ratio;
            } else {
                $altura = $largura / $ratio;
            }

            $imagem_final = imagecreatetruecolor($largura, $altura);

            if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg') {
                $imagem_original = imagecreatefromjpeg($imagem['temp']);
                imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
                imagejpeg($imagem_final, $imagem['diretorio'] . "/" . $imagem['name'], 90);
            } else if ($imagem['extensao'] == 'png') {
                $imagem_original = imagecreatefrompng($imagem['temp']);
                imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
                imagepng($imagem_final, $imagem['diretorio'] . "/" . $imagem['name']);
            }
            return $imagem['diretorio'] . "/" . $imagem['name'];
        } else {
            return null;
        }
    }

    private function excluir_imagem($imagem) {
        if (file_exists($imagem)) {
            unlink($imagem);
        }
    }

}
