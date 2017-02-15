<?php

/**
 * ImoveisView - [model]
 * Descricao: A classe Imoveis é utilizada para conexão com o Banco de Dados, a onde são executo inserções, pesquisas, excluições e alterações
 * @author Joab Torres Alencar
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas
 */
class ImoveisView extends model {
    /*
     * function listar($condicao) [LISTA DADOS DO IMOVEIS]
     * Descricao: Está função tem como objetivo retorna uma lista dos imóveis
     * @param $serach_imovel - Informações espeficicas como critério de imoveis
     * @param int limite_inicio - limite inicial
     * @param int $limite_qtd - limite final
     * @param string $ordem - Ordem descrecente dos resultados
     * @return $imoveis - um array dos imóveis
     * @autor
     */

    public function listar_imoveis($serach_imovel, $limite_inicio, $limite_qtd, $ordem = "ka_imb_imovel.cod_imovel") {
        $imoveis = array();
        $sql = "SELECT ka_imb_imovel.*,ka_imb_imovel_endereco.bairro_endereco,ka_imb_imovel_endereco.cidade_endereco,ka_imb_imovel_visita.quantidade_visita  FROM ka_imb_imovel, ka_imb_imovel_endereco, ka_imb_imovel_visita WHERE ka_imb_imovel.cod_imovel=ka_imb_imovel_endereco.cod_imovel AND ka_imb_imovel.cod_imovel=ka_imb_imovel_visita.cod_imovel AND ka_imb_imovel_endereco.cod_imovel=ka_imb_imovel_visita.cod_imovel";
        foreach ($serach_imovel as $indice => $valor) {
            $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel = :" . $indice;
        }
        $sql = $sql . " ORDER BY " . $ordem . " DESC LIMIT " . $limite_inicio . " , " . $limite_qtd;
        $sql = $this->db->prepare($sql);
        foreach ($serach_imovel as $indice => $valor) {
            $sql->bindValue(":" . $indice, $valor);
        }
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $imoveis = $sql->fetchAll();
        }
        return $imoveis;
    }

    /*
     * function listar_imovel($id) [LISTA SOMENTE OS DADO DE UM IMÓVEL ESPECIFICO]
     * Descrição: Está função é utilizada para consulta os dados de um imóvel especifico;
     * @param $id : é referente ao codigo do imóvel.
     * @return retorna os dados da consulta caso seja verdadeiro ou retorna null
     * @author Joab Torres Alencar
     */

    public function listar_imovel($id) {
        $imoveis = array();
        $sql = "SELECT ka_imb_imovel.*, ka_imb_imovel_endereco.logradouro_endereco,ka_imb_imovel_endereco.numero_endereco, ka_imb_imovel_endereco.bairro_endereco,ka_imb_imovel_endereco.cidade_endereco, ka_imb_imovel_endereco.complemento_endereco,ka_imb_imovel_endereco.latitude_endereco, ka_imb_imovel_endereco.longitude_endereco, ka_imb_imovel_descricao.valor_descricao, ka_imb_imovel_descricao.descricao_descricao FROM ka_imb_imovel, ka_imb_imovel_endereco, ka_imb_imovel_descricao WHERE ka_imb_imovel.cod_imovel=ka_imb_imovel_endereco.cod_imovel AND ka_imb_imovel.cod_imovel=ka_imb_imovel_descricao.cod_imovel AND ka_imb_imovel.cod_imovel = :cod ;";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":cod", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $imoveis = $sql->fetch();
        }
        return $imoveis;
    }

    /*
     * function listar_imagens($cod) [LISTA ALBUM DE IMAGENS DO IMÓVEL]
     * Descricao: Retorna uma lista das imagens de um imóvel especifico; 
     * @param $cod - Código do ímovel
     * @return Array $imagens ou null
     * @author Joab Torres Alencar
     */

    public function listar_imagens($cod) {
        $sql = $this->db->prepare("SELECT imagem_imagem FROM ka_imb_imovel_imagem WHERE cod_imovel = :cod");
        $sql->bindValue(":cod", $cod);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $imagens = $sql->fetchAll();
            return $imagens;
        } else {
            return null;
        }
    }

}
