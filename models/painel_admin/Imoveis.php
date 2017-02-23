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
        $sql = $this->db->prepare("INSERT INTO ka_imb_imovel (cod_imovel, referencia_imovel, status_imovel, destaque_imovel, imovel_imovel, finalidade_imovel, categoria_imovel, quarto_imovel, banheiro_imovel, suite_imovel, garagem_imovel, largura_imovel, comprimento_imovel, area_total_imovel, area_construida_imovel, imagem_imovel, data_imovel)  VALUES (:cod, :referencia, :status, :destaque, :imovel, :finalidade, :categoria, :quarto, :banheiro, :suite, :garagem, :largura, :comprimento, :area_total, :area_construida, :imagem, :data)");
        $sql->bindValue(":cod", $imovel['cod']);
        $sql->bindValue(":referencia", $imovel['referencia']);
        $sql->bindValue(":status", $imovel['status']);
        $sql->bindValue(":destaque", $imovel['destaque']);
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
        $sql->bindValue(":imagem", $this->criar_imagem(300, 170, array("cod" => $imovel['cod'], "imagem" => $imovel['imagem'], "referencia" => $imovel['referencia'], "imovel" => $imovel['imovel'], "finalidade" => $imovel['finalidade'])));
        $sql->bindValue(":data", $imovel['data']);
        $sql->execute();
        //VERIFICANDO SE FOI SALVO O IMOVEL
        $sql = $this->db->prepare("SELECT cod_imovel FROM ka_imb_imovel WHERE cod_imovel = :cod");
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
                $sql->bindValue(":imagem", $this->criar_imagem(850, 478, array("cod" => $imovel['cod'], "imagem" => $imagem, "referencia" => $imovel['referencia'], "imovel" => $imovel['imovel'], "finalidade" => $imovel['finalidade'])));
                $sql->execute();
            }
            //SALVANDO VISITAS
            $sql = $this->db->prepare("INSERT INTO ka_imb_imovel_visita (cod_imovel, quantidade_visita) VALUES (:cod, :quantidade)");
            $sql->bindValue(":cod", $imovel['cod']);
            $sql->bindValue(":quantidade", 0);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function salvar($imovel) {
        //SALVANDO IMOVEL
        $sql = $this->db->prepare("UPDATE ka_imb_imovel SET referencia_imovel = :referencia, status_imovel = :status, destaque_imovel = :destaque, imovel_imovel = :imovel, finalidade_imovel = :finalidade, categoria_imovel = :categoria, quarto_imovel = :quarto, banheiro_imovel = :banheiro, suite_imovel = :suite, garagem_imovel = :garagem, largura_imovel = :largura, comprimento_imovel =:comprimento, area_total_imovel = :area_total, area_construida_imovel =:area_construida, imagem_imovel = :imagem, data_imovel = :data WHERE cod_imovel = :cod");
        $sql->bindValue(":referencia", $imovel['referencia']);
        $sql->bindValue(":status", $imovel['status']);
        $sql->bindValue(":destaque", $imovel['destaque']);
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
        if (is_array($imovel['imagem'])) {
            $sql->bindValue(":imagem", $this->criar_imagem(300, 170, array("cod" => $imovel['cod'], "imagem" => $imovel['imagem'], "referencia" => $imovel['referencia'], "imovel" => $imovel['imovel'], "finalidade" => $imovel['finalidade'])));
        } else {
            $sql->bindValue(":imagem", $imovel['imagem']);
        }
        $sql->bindValue(":data", $imovel['data']);
        $sql->bindValue(":cod", $imovel['cod']);
        $sql->execute();

        //VERIFICANDO SE FOI SALVO O IMOVEL
        $sql = $this->db->prepare("SELECT cod_imovel FROM ka_imb_imovel WHERE cod_imovel = :cod");
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

            $imagens_atual_no_form = array();
            foreach ($imovel['imagens'] as $imagem) {
                if (is_array($imagem)) {
                    $imagens_atual_no_form[] = $this->criar_imagem(850, 478, array("cod" => $imovel['cod'], "imagem" => $imagem, "referencia" => $imovel['referencia'], "imovel" => $imovel['imovel'], "finalidade" => $imovel['finalidade']));
                } else {
                    $imagens_atual_no_form[] = $imagem;
                }
            }
            $imovel['imagens'] = $imagens_atual_no_form;
            $imagens = $this->listar_imagens($imovel['cod']);
            if (count($imagens) > 0) {
                $imagens_atual_no_bd = array();
                foreach ($imagens as $indice) {
                    $imagens_atual_no_bd[] = $indice['imagem_imagem'];
                }
                //imagens que serao removidas
                $imagens_removida = array_diff($imagens_atual_no_bd, $imagens_atual_no_form);
                //imagens diferentes da atual inseridas
                $imovel['imagens'] = array_diff($imagens_atual_no_form, $imagens_atual_no_bd);
                array_multisort($imagens_removida);
                array_multisort($imovel['imagens']);
                
                while (count($imagens_removida) >= count($imovel['imagens']) && count($imovel['imagens']) > 0) {
                    $this->excluir_imagem($imagens_removida[0]);
                    $sql = $this->db->prepare("UPDATE ka_imb_imovel_imagem SET cod_imovel = :cod1, imagem_imagem = :imagem1 WHERE cod_imovel = :cod2 AND imagem_imagem = :imagem2");
                    $sql->bindValue(':cod1', $imovel['cod']);
                    $sql->bindValue(':imagem1', $imovel['imagens'][0]);
                    $sql->bindValue(':cod2', $imovel['cod']);
                    $sql->bindValue(':imagem2', $imagens_removida[0]);
                    $sql->execute();
                    array_shift($imagens_removida);
                    array_shift($imovel['imagens']);
                }
                foreach ($imagens_removida as $imagem) {
                    $this->excluir_imagem($imagem);
                    $sql = $this->db->prepare("DELETE FROM ka_imb_imovel_imagem WHERE imagem_imagem = :imagem AND cod_imovel = :cod ");
                    $sql->bindValue(':imagem', $imagem);
                    $sql->bindValue(':cod', $imovel['cod']);
                    $sql->execute();
                }
            }
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

    public function quantidade_imoveis($serach_imovel = array()) {
        $quantidade = 0;
        if (isset($serach_imovel) && !empty($serach_imovel)) {
            $sql = "SELECT COUNT(cod_imovel) as qtd FROM ka_imb_imovel WHERE";
            foreach ($serach_imovel as $indice => $valor) {
                $sql = $sql . " AND " . $indice . "_imovel = :" . $indice;
            }
            $sql = $this->db->prepare($sql);
            foreach ($serach_imovel as $indice => $valor) {
                $sql->bindValue(":" . $indice, $valor);
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

    /*
     * function excluir($cod) [REMOVE TODOS OS DADOS DO IMÓVEL]
     * Descrição: Função utilizada para excluir todos os dados relacionado a um imóvel.
     * @param $cod : é código registrado do imóvel no banco de dados
     * @return TRUE [CASO DE SUCESSO] ou FALSE[CASO NÃO ENCONTRE O IMOVEL]
     * @Author Joab Torres Alencar
     */

    public function excluir($cod) {
        $sql = $this->db->prepare('SELECT ka_imb_imovel.imagem_imovel FROM ka_imb_imovel WHERE cod_imovel = :cod');
        $sql->bindValue(":cod", $cod);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            //exclui a imagem de destaque
            $imagem = $sql->fetch();
            $imagem = $imagem['imagem_imovel'];
            $this->excluir_imagem($imagem);

            $sql = $this->db->prepare("DELETE FROM ka_imb_imovel WHERE cod_imovel = :cod");
            $sql->bindValue(":cod", $cod);
            $sql->execute();

            $sql = $this->db->prepare("DELETE FROM ka_imb_imovel_endereco WHERE cod_imovel = :cod");
            $sql->bindValue(":cod", $cod);
            $sql->execute();

            $sql = $this->db->prepare("DELETE FROM ka_imb_imovel_descricao WHERE cod_imovel = :cod");
            $sql->bindValue(":cod", $cod);
            $sql->execute();

            $sql = $this->db->prepare("DELETE FROM ka_imb_imovel_visita WHERE cod_imovel = :cod");
            $sql->bindValue(":cod", $cod);
            $sql->execute();

            $imagens = $this->listar_imagens($cod);
            if (count($imagens) > 0) {
                foreach ($imagens as $imagem) {
                    $this->excluir_imagem($imagem['imagem_imagem']);
                }
                $sql = $this->db->prepare("DELETE FROM ka_imb_imovel_imagem WHERE  cod_imovel = :cod");
                $sql->bindValue(":cod", $cod);
                $sql->execute();
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * public index() [TIPO]
     * Descrição:
     * @author Joab Torres Alencar
     */

    private function criar_imagem($largura, $altura, $imovel) {
        $imagem = array();
        $imagem['temp'] = $imovel['imagem']['tmp_name'];
        $imagem['extensao'] = explode('.', $imovel['imagem']['name']);
        $imagem['extensao'] = strtolower(end($imagem['extensao']));
        $imovel['finalidade'] = strtolower($this->sintetizaString($imovel['finalidade']));
        $imovel['imovel'] = strtolower($this->sintetizaString($imovel['imovel']));
        $imagem['diretorio'] = "uploads/imovel/" . $imovel['cod'] . "_" . $imovel["referencia"];
        $imagem['name'] = "kananda_imobiliaria_" . $imovel['imovel'] . "_" . $imovel['finalidade'] . "_" . md5(rand(10000, 90000) . time()) . "." . $imagem['extensao'];
        if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg' || $imagem['extensao'] == 'png') {
            if (!file_exists($imagem['diretorio'])) {
                mkdir($imagem['diretorio'], 0777, TRUE);
            }
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

    /*
     * function excluir_imagem($imagem)
     * Descrição: Está é uma função privada utilizada para remove uma imagem e remove o diretório caso não mais nenhum arquivos salvo
     * @param $imagem : É a url da imagem
     * @author Joab Torres Alencar
     */

    private function excluir_imagem($imagem) {
        if (file_exists($imagem)) {
            unlink($imagem);
            $nome_imagem = explode("/", $imagem);
            $nome_imagem = end($nome_imagem);
            $diretorio = explode("/" . $nome_imagem, $imagem);
            $diretorio = $diretorio[0];
            if (count(scandir($diretorio)) <= 2) {
                rmdir($diretorio);
            }
        }
    }

    /*
     * public index() [TIPO]
     * Descrição:
     * @author Joab Torres Alencar
     */

    private function sintetizaString($str) {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
        return $str;
    }

}
