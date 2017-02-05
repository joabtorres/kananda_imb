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

    public function salvar() {
        
    }

    public function listar() {
        
    }

    public function buscar() {
        
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
        }else{
            false;
        }
    }

}
