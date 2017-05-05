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
     * @author Joab Torres Alencar
     */

    public function listar_imoveis($serach_imovel, $limite_inicio, $limite_qtd, $ordem = "ka_imb_imovel.cod_imovel") {
        $imoveis = array();
        $sql = "SELECT ka_imb_imovel.*,ka_imb_imovel_endereco.bairro_endereco,ka_imb_imovel_endereco.cidade_endereco,ka_imb_imovel_visita.quantidade_visita  FROM ka_imb_imovel, ka_imb_imovel_endereco, ka_imb_imovel_visita WHERE ka_imb_imovel.cod_imovel=ka_imb_imovel_endereco.cod_imovel AND ka_imb_imovel.cod_imovel=ka_imb_imovel_visita.cod_imovel AND ka_imb_imovel_endereco.cod_imovel=ka_imb_imovel_visita.cod_imovel";
        foreach ($serach_imovel as $indice => $valor) {
            switch ($indice) {
                case "finalidade":
                    $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel LIKE :" . $indice;
                    $serach_imovel[$indice] = "%" . $valor . "%";
                    break;
                case "bairro":
                    $sql = $sql . " AND ka_imb_imovel_endereco." . $indice . "_endereco = :" . $indice;
                    break;
                default :
                    $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel = :" . $indice;
                    break;
            }
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
     * function quantidade_imoveis($condicao = array()) ['retorna a quantidade de imóveis]
     * Descrição: É utilizada para retornar a quantidade  de imóveis registrados
     * @param $condicao : São condições dos em buscar de uma categoria de imóveis especificos
     * @return $quantidade
     * @author Joab Torres Alencar
     */

    public function quantidade_imoveis($serach_imovel = array()) {
        $quantidade = 0;
        if (isset($serach_imovel) && !empty($serach_imovel)) {
            $sql = " SELECT COUNT(ka_imb_imovel.cod_imovel) as qtd FROM ka_imb_imovel, ka_imb_imovel_endereco WHERE ka_imb_imovel.cod_imovel=ka_imb_imovel_endereco.cod_imovel";
            foreach ($serach_imovel as $indice => $valor) {
                switch ($indice) {
                    case "imovel":
                        if (count($serach_imovel[$indice]) > 1) {
                            $sql = $sql . " AND (";
                            for ($i = 0; $i < count($serach_imovel[$indice]); $i++) {
                                if ($i > 0) {
                                    $sql = $sql . " OR ";
                                }
                                $sql = $sql . "ka_imb_imovel." . $indice . "_imovel = :" . $indice . ($i + 1);
                            }
                            $sql = $sql . ") ";
                        } else {
                            $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel = :" . $indice;
                        }
                        break;
                    case "finalidade":
                        $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel LIKE :" . $indice;
                        $serach_imovel[$indice] = "%" . $valor . "%";
                        break;
                    case "bairro":
                        $sql = $sql . " AND ka_imb_imovel_endereco." . $indice . "_endereco = :" . $indice;
                        break;
                    default :
                        $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel = :" . $indice;
                        break;
                }
            }
            $sql = $this->db->prepare($sql);
            foreach ($serach_imovel as $indice => $valor) {
                switch ($indice) {
                    case "imovel":
                        if (count($serach_imovel[$indice]) > 1) {
                            for ($i = 0; $i < count($serach_imovel[$indice]); $i++) {
                                $sql->bindValue(":" . $indice . ($i + 1), $serach_imovel[$indice][$i]);
                            }
                        } else {
                            $sql->bindValue(":" . $indice, $valor);
                        }
                        break;
                    default :
                        $sql->bindValue(":" . $indice, $valor);
                        break;
                }
            }
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $quantidade = $sql['qtd'];
            }
            return $quantidade;
        } else {
            $sql = $this->db->query("SELECT COUNT(cod_imovel) as qtd FROM ka_imb_imovel");
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $quantidade = $sql['qtd'];
            }
            return $quantidade;
        }
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

    /*
     * public setVisita($cod_imovel)
     * Descrição: está função incrementa +1 na visualização do imóvel
     * @author  Joab Torres Alencar
     */

    public function setVisita($cod_imovel) {
        $sql = $this->db->prepare('SELECT quantidade_visita FROM ka_imb_imovel_visita WHERE cod_imovel = :cod ;');
        $sql->bindValue(':cod', $cod_imovel);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $qtd = intval($sql->fetch()['quantidade_visita']) + 1;
            $sql = $this->db->prepare('UPDATE ka_imb_imovel_visita SET quantidade_visita = :qtd WHERE cod_imovel = :cod ;');
            $sql->bindValue(':qtd', $qtd);
            $sql->bindValue(':cod', $cod_imovel);
            $sql->execute();
        }
    }

    public function menu() {
        $imoveis = array();
        $sql = "SELECT DISTINCT (imovel_imovel), finalidade_imovel FROM ka_imb_imovel WHERE status_imovel=0";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }
    }

}
