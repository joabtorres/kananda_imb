<?php

/**
 * Configuracoes - [Conexão com tabela do banco de dados]
 * 
 * Descricao: Está classe é responsável por toda conexão com banco de dados referente banner's, logo, e-mail de atendimento, salvando suas alterações
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 14/03/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class Configuracoes extends model {
    /*
     * public listar_slide() ['lista os banner's]
     * Descrição: Está função retorna a lista dos banner's registrados
     * @return array or null
     * @author joab Torres Alencar
     */

    public function lista_slide() {
        $sql = $this->db->query('SELECT * FROM ka_imb_banner ;');
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return null;
        }
    }

}

?>