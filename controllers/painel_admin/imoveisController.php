<?php

/**
 * imoveisController - [TIPO]
 *
 * Descricao:
 *
 * @author Joab Torres Alencar
 *
 * @copyright (c) 05/02/2017, Joab Torres Alencar -  Analista de Sistemas
 */
class imoveisController extends controller {

    public function index() {
        $this->mais_visitados();
    }

    public function mais_visitados() {
        $this->checkUser();
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_mais_visitados");
        $this->loadTemplate($viewName, $dados);
    }

    public function cadastrar() {
        $this->checkUser();
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_cadastrar");
        if (isset($_POST['nReferencia']) && !empty($_POST['nReferencia'])) {
            $imovel = array();
            $imoveisModal = new Imoveis();
            $imovel['cod'] = $imoveisModal->getCodigo() + 1;
            $imovel['data'] = date("Y-m-d");
            $imovel['referencia'] = addslashes($_POST['nReferencia']);
            $imovel['status'] = addslashes($_POST['tOcuta']);
            $imovel['imovel'] = addslashes($_POST['tSelecionaImovel']);
            $imovel['categoria'] = addslashes($_POST['tCategoria']);
            $imovel['finalidade'] = addslashes($_POST['tFinalidade']);
            if (isset($_POST['tQuarto']) && !empty($_POST['tQuarto'])) {
                $imovel['quarto'] = addslashes($_POST['tQuarto']);
            } else {
                $imovel['quarto'] = 0;
            }
            if (isset($_POST['tBanheiro']) && !empty($_POST['tBanheiro'])) {
                $imovel['banheiro'] = addslashes($_POST['tBanheiro']);
            } else {
                $imovel['banheiro'] = 0;
            }
            if (isset($_POST['tSuite']) && !empty($_POST['tSuite'])) {
                $imovel['suite'] = addslashes($_POST['tSuite']);
            } else {
                $imovel['suite'] = 0;
            }
            if (isset($_POST['tGarage']) && !empty($_POST['tGarage'])) {
                $imovel['garagem'] = addslashes($_POST['tGarage']);
            } else {
                $imovel['garagem'] = 0;
            }
            $imovel['largura'] = addslashes($_POST['tLargura']);
            $imovel['comprimento'] = addslashes($_POST['tComprimento']);
            $imovel['area_total'] = addslashes($_POST['tAreaTotal']);
            $imovel['area_construida'] = addslashes($_POST['tAreaConstruida']);
            $imovel['logradouro'] = addslashes($_POST['nLogradouro']);
            $imovel['numero'] = addslashes($_POST['nNumero']);
            $imovel['bairro'] = addslashes($_POST['nSelecionaBairro']);
            $imovel['cidade'] = addslashes($_POST['nCidade']);
            $imovel['complemento'] = addslashes($_POST['nComplemento']);
            $imovel['latitude'] = addslashes($_POST['tLatitude']);
            $imovel['longitude'] = addslashes($_POST['tLongitude']);
            $imovel['complemento'] = addslashes($_POST['nComplemento']);
            $imovel['valor'] = addslashes($_POST['nValor']);
            $imovel['descricao'] = addslashes($_POST['tDescricao']);

            if (isset($_FILES['tImagem-100']) && !empty($_FILES['tImagem-100'])) {
                $imovel['imagem'] = $this->salvar_imagem(300, 170, array("cod" => $imovel['cod'], "imagem" => $_FILES['tImagem-100'], "referencia" => $_POST['nReferencia'], "imovel" => $_POST['tSelecionaImovel'], "finalidade" => $_POST['tFinalidade']));
            }
            $imovel['imagens'] = array();
            for ($i = 0; $i < addslashes($_POST["tQnt_fotos"]); $i++) {
                if (isset($_FILES['tImagem-' . ($i + 1)]) && !empty($_FILES['tImagem-' . ($i + 1)])) {
                    $imovel["imagens"][$i] = $this->salvar_imagem(850, 478, array("cod" => $imovel['cod'], "imagem" => $_FILES['tImagem-' . ($i + 1)], "referencia" => $_POST['nReferencia'], "imovel" => $_POST['tSelecionaImovel'], "finalidade" => $_POST['tFinalidade']));
                }
            }
            if(!$imoveisModal->cadastrar($imovel)){
                header("Locatiton: /painel_admin/imoveis/cadastrados");
            }
        }

        $this->loadTemplate($viewName, $dados);
    }

    public function cadastrados() {
        if ($this->checkUser()) {
            $dados = array();
            $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_cadastrados");
            $imoveisModal = new Imoveis();

            $dados["imoveis"] = $imoveisModal->listar();

            $this->loadTemplate($viewName, $dados);
        }
    }

    public function pesquisar() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_pesquisar");
        $this->loadTemplate($viewName, $dados);
    }

    public function ocultos() {
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_ocultos");
        $this->loadTemplate($viewName, $dados);
    }

    private function salvar_imagem($largura, $altura, $imovel) {
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
