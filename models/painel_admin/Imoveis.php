<?php

/**
 * Imoveis - [TIPO]
 *
 * Descricao:
 *
 * @author Joab Torres Alencar
 *
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas
 */
class Imoveis extends model {

    private $imoveis = array();

    public function cadastrar($imovel) {
        //SALVANDO IMOVEL
        $sql = $this->db->prepare("INSERT INTO ka_imb_imovel (referencia_imovel, status_imovel, imovel_imovel, finalidade_imovel, categoria_imovel, quarto_imovel, banheiro_imovel, suite_imovel, garagem_imovel, largura_imovel, comprimento_imovel, area_total_imovel, area_construida_imovel, valor_imovel, descricao_imovel, data_imovel, imagem_imovel)  VALUES (:referencia, :status, :imovel, :finalidade, :categoria, :quarto, :banheiro, :suite, :garagem, :largura, :comprimento, :area_total, :area_construida, :valor, :descricao, :data, :imagem)");
        $sql->bindValue(":referencia", $imovel['referencia']);
        $sql->bindValue(":status", $imovel['status']);
        $sql->bindValue(":imovel", $imovel['imovel']);
        $sql->bindValue(":finalidade", $imovel['finalidade']);
        $sql->bindValue(":categoria", $imovel['categoria']);
        $sql->bindValue(":quarto", $imovel['quarto']);
        $sql->bindValue(":banheiro", $imovel['banheiro']);
        $sql->bindValue(":suite", $imovel['suite']);
        $sql->bindValue(":garagem", $imovel['garagem']);
        $sql->bindValue(":largura", $imovel['largura']);
        $sql->bindValue(":comprimento", $imovel['comprimento']);
        $sql->bindValue(":area_total", $imovel['area_total']);
        $sql->bindValue(":area_construida", $imovel['area_construida']);
        $sql->bindValue(":valor", $imovel['valor']);
        $sql->bindValue(":descricao", $imovel['descricao']);
        $sql->bindValue(":data", $imovel['data']);
        $sql->bindValue(":imagem", $imovel['imagem']);
        $sql->execute();

        $sql = $this->db->prepare("SELECT COUNT(cod_imovel) FROM ka_imb_imovel WHERE cod_imovel = :cod");
        $sql->bindValue(":cod", $imovel['cod']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //SALVANDO ENDEREÇO
            $sql = $this->db->prepare("INSERT INTO ka_imb_imovel_endereco (cod_imovel, logradouro_endereco, numero_endereco, bairro_endereco, cidade_endereco, complemento_endereco, latitude_endereco, longitude_endereco) VALUES (:cod, :logradouro, :numero, :bairro, :cidade, :complemento, :latitude, :longitude)");
            $sql->bindValue(":cod", $imovel['cod']);
            $sql->bindValue(":logradouro", $imovel['logradouro']);
            $sql->bindValue(":numero", $imovel['numero']);
            $sql->bindValue(":bairro", $imovel['bairro']);
            $sql->bindValue(":cidade", $imovel['cidade']);
            $sql->bindValue(":complemento", $imovel['complemento']);
            $sql->bindValue(":latitude", $imovel['latitude']);
            $sql->bindValue(":longitude", $imovel['longitude']);
            $sql->execute();
            //SALVANDO FOTOS
            foreach ($imovel['imagens'] as $imagem) {
                $sql = $this->db->prepare("INSERT INTO ka_imb_imovel_imagem (cod_imovel, imagem_imagem) VALUES (:cod, :imagem)");
                $sql->bindValue(":cod", $imovel['cod']);
                $sql->bindValue(":imagem", $imagem);
                $sql->execute();
            }

            return true;
        } else {
            return false;
        }
    }

    public function getCodigo() {
        $sql = $this->db->query("SELECT cod_imovel FROM ka_imb_imovel ORDER BY cod_imovel DESC LIMIT 1");
        if ($sql->rowCount() > 0) {
            return $sql->fetch()["cod_imovel"];
        } else {
            return 0;
        }
    }

    public function quantidade_Imoveis($condicao = array()) {
        $quantidade = 0;
        if (isset($condicao) && !empty($condicao)) {
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

    public function listar($condicao) {
        $imoveis = array();
        $sql = "SELECT ka_imb_imovel.*,ka_imb_imovel_endereco.logradouro_endereco,ka_imb_imovel_endereco.numero_endereco, ka_imb_imovel_endereco.bairro_endereco,ka_imb_imovel_endereco.cidade_endereco, ka_imb_imovel_endereco.complemento_endereco,ka_imb_imovel_endereco.latitude_endereco, ka_imb_imovel_endereco.longitude_endereco FROM ka_imb_imovel, ka_imb_imovel_endereco WHERE ka_imb_imovel.cod_imovel=ka_imb_imovel_endereco.cod_imovel ";
        foreach ($condicao as $indice => $valor) {
            if ($indice != "qtd" && $indice != "limite") {
                $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel = :" . $indice;
            }
        }

        if (isset($condicao['qtd'])) {
            $sql = $sql . " ORDER BY ka_imb_imovel.cod_imovel DESC LIMIT " . $condicao['qtd'] . " , ".$condicao['limite'];
        }

        $sql = $this->db->prepare($sql);
        foreach ($condicao as $indice => $valor) {
            if ($indice != "qtd" && $indice != "limite") {
                $sql->bindValue(":" . $indice, $valor);
            }
        }
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $imoveis = $sql->fetchAll();
        }
        return $imoveis;
    }

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
