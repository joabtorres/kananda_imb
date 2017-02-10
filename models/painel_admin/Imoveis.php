<?php

/**
 * Imoveis - [model]
 * Descricao: A classe Imoveis é utilizada para conexão com o Banco de Dados, a onde são executo inserções, pesquisas, excluições e alterações
 * @author Joab Torres Alencar
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas
 */
class Imoveis extends model {
    /*
     * function cadastrar($imovel) [CADASTRAR IMOVEL]
     * Descrição: é utilizada para efetua o cadastro do imovel 
     * @param $imovel  - é um array contento todas as informações necessárias do imóvel
     * @return retorna TRUE se o cadastro for concluido
     * @author Joab Torres Alencar
     */

    public function cadastrar($imovel) {
        //SALVANDO IMOVEL
        $sql = $this->db->prepare("INSERT INTO ka_imb_imovel (referencia_imovel, status_imovel, imovel_imovel, finalidade_imovel, categoria_imovel, quarto_imovel, banheiro_imovel, suite_imovel, garagem_imovel, largura_imovel, comprimento_imovel, area_total_imovel, area_construida_imovel, imagem_imovel, data_imovel)  VALUES (:referencia, :status, :imovel, :finalidade, :categoria, :quarto, :banheiro, :suite, :garagem, :largura, :comprimento, :area_total, :area_construida, :imagem, :data)");
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
        $sql->bindValue(":imagem", $imovel['imagem']);
        $sql->bindValue(":data", $imovel['data']);
        $sql->execute();

        //VERIFICANDO SE FOI SALVO O IMOVEL
        $sql = $this->db->prepare("SELECT COUNT(cod_imovel) FROM ka_imb_imovel WHERE cod_imovel = :cod");
        $sql->bindValue(":cod", $imovel['cod']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //SALVANDO DESCRICAO
            $sql = $this->db->prepare("INSERT INTO ka_imb_imovel_descricao (cod_imovel, valor_descricao, descricao_descricao) VALUES (:cod, :valor, :descricao);");
            $sql->bindValue(":cod", $imovel['cod']);
            $sql->bindValue(":valor", $imovel['valor']);
            $sql->bindValue(":descricao", $imovel['descricao']);
            $sql->execute();
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

    public function salvar($imovel) {
        //SALVANDO IMOVEL
        $sql = $this->db->prepare("UPDATE ka_imb_imovel SET referencia_imovel = :referencia, status_imovel = :status, imovel_imovel = :imovel, finalidade_imovel = :finalidade, categoria_imovel = :categoria, quarto_imovel = :quarto, banheiro_imovel = :banheiro, suite_imovel = :suite, garagem_imovel = :garagem, largura_imovel = :largura, comprimento_imovel =:comprimento, area_total_imovel = :area_total, area_construida_imovel =:area_construida, imagem_imovel = :imagem, data_imovel = :data WHERE cod_imovel = :cod");
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
        $sql->bindValue(":imagem", $imovel['imagem']);
        $sql->bindValue(":data", $imovel['data']);
        $sql->bindValue(":cod", $imovel['cod']);
        $sql->execute();

        //VERIFICANDO SE FOI SALVO O IMOVEL
        $sql = $this->db->prepare("SELECT COUNT(cod_imovel) FROM ka_imb_imovel WHERE cod_imovel = :cod");
        $sql->bindValue(":cod", $imovel['cod']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            //SALVANDO DESCRICAO
            $sql = $this->db->prepare("UPDATE ka_imb_imovel_descricao SET valor_descricao = :valor, descricao_descricao = :descricao WHERE cod_imovel = :cod ;");
            $sql->bindValue(":valor", $imovel['valor']);
            $sql->bindValue(":descricao", $imovel['descricao']);
            $sql->bindValue(":cod", $imovel['cod']);
            $sql->execute();
            //SALVANDO ENDEREÇO
            $sql = $this->db->prepare("UPDATE ka_imb_imovel_endereco SET logradouro_endereco = :logradouro, numero_endereco =  :numero, bairro_endereco = :bairro, cidade_endereco = :cidade, complemento_endereco = :complemento, latitude_endereco = :latitude, longitude_endereco = :longitude WHERE cod_imovel = :cod ;");
            $sql->bindValue(":logradouro", $imovel['logradouro']);
            $sql->bindValue(":numero", $imovel['numero']);
            $sql->bindValue(":bairro", $imovel['bairro']);
            $sql->bindValue(":cidade", $imovel['cidade']);
            $sql->bindValue(":complemento", $imovel['complemento']);
            $sql->bindValue(":latitude", $imovel['latitude']);
            $sql->bindValue(":longitude", $imovel['longitude']);
            $sql->bindValue(":cod", $imovel['cod']);
            $sql->execute();
            //SALVANDO FOTOS
            foreach ($imovel['imagens'] as $imagem) {
                $sql = $this->db->prepare("UPDATE ka_imb_imovel_imagem SET imagem_imagem = :imagem WHERE cod_imovel = :cod");
                $sql->bindValue(":imagem", $imagem);
                $sql->bindValue(":cod", $imovel['cod']);
                $sql->execute();
            }

            return true;
        } else {
            return false;
        }
    }

    /*
     * function getCodigo() ['código do imóvel']
     * Descricao: Recupera o último código do imóvel cadastrado
     * @return retorna o valor do último codigo.
     * @author Joab Torres Alencar
     */

    public function getCodigo() {
        $sql = $this->db->query("SELECT cod_imovel FROM ka_imb_imovel ORDER BY cod_imovel DESC LIMIT 1");
        if ($sql->rowCount() > 0) {
            return $sql->fetch()["cod_imovel"];
        } else {
            return 0;
        }
    }

    /*
     * function quantidade_imoveis($condicao = array()) ['retorna a quantidade de imóveis]
     * Descrição: É utilizada para retornar a quantidade  de imóveis registrados
     * @param $condicao : São condições dos em buscar de uma categoria de imóveis especificos
     * @return $quantidade
     * @author Joab Torres Alencar
     */

    public function quantidade_imoveis($condicao = array()) {
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

    /*
     * function listar($condicao) [LISTA DADOS DO IMOVEIS]
     * Descricao: Está função tem como objetivo retorna uma lista dos imóveis
     * @param $condicao - Informações espeficicas como critério de imoveis
     * @return $imoveis - um array dos imóveis
     * @autor
     */

    public function listar_imoveis($condicao) {
        $imoveis = array();
        $sql = "SELECT ka_imb_imovel.*,ka_imb_imovel_endereco.bairro_endereco,ka_imb_imovel_endereco.cidade_endereco FROM ka_imb_imovel, ka_imb_imovel_endereco WHERE ka_imb_imovel.cod_imovel=ka_imb_imovel_endereco.cod_imovel";
        foreach ($condicao as $indice => $valor) {
            if ($indice != "limite_inicio" && $indice != "limite_qtd") {
                $sql = $sql . " AND ka_imb_imovel." . $indice . "_imovel = :" . $indice;
            }
        }

        if (isset($condicao['limite_inicio'])) {
            $sql = $sql . " ORDER BY ka_imb_imovel.cod_imovel DESC LIMIT " . $condicao['limite_inicio'] . " , " . $condicao['limite_qtd'];
        }

        $sql = $this->db->prepare($sql);
        foreach ($condicao as $indice => $valor) {
            if ($indice != "limite_inicio" && $indice != "limite_qtd") {
                $sql->bindValue(":" . $indice, $valor);
            }
        }
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $imoveis = $sql->fetchAll();
        }
        return $imoveis;
    }

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
