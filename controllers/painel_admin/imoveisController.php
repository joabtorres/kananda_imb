<?php

/**
 * imoveisController - [CONTROLLER REFERENTE AOS IMOVEIS]
 *
 * Descricao: Classe responsável para controlar ações referente ao imóvel
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
            $imovel['quarto'] = (isset($_POST['tQuarto']) && !empty($_POST['tQuarto'])) ? addslashes($_POST['tQuarto']) : 0;
            $imovel['banheiro'] = (isset($_POST['tBanheiro']) && !empty($_POST['tBanheiro'])) ? addslashes($_POST['tBanheiro']) : 0;
            $imovel['suite'] = (isset($_POST['tSuite']) && !empty($_POST['tSuite'])) ? addslashes($_POST['tSuite']) : 0;
            $imovel['garagem'] = (isset($_POST['tGarage']) && !empty($_POST['tGarage'])) ? addslashes($_POST['tGarage']) : 0;
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
            if ($imoveisModal->cadastrar($imovel)) {
                header("Location: /painel_admin/imoveis/cadastrados");
            }
        }

        $this->loadTemplate($viewName, $dados);
    }

    public function cadastrados($page = array()) {
        if ($this->checkUser()) {
            $dados = array();
            $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_cadastrados");
            $imoveisModal = new Imoveis();

            $imovel = array();
            $limite = 6;
            $total_registro = $imoveisModal->quantidade_imoveis();
            $paginas = $total_registro / $limite;
            $indice = 0;
            $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
            $indice = ($pagina_atual - 1) * $limite;

            $imovel['limite_inicio'] = $indice;
            $imovel['limite_qtd'] = $limite;

            $dados["paginas"] = $paginas;
            $dados["pagina_atual"] = $pagina_atual;
            $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel);
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function editar($id = array()) {
        $this->checkUser();
        $imoveisModal = new Imoveis();
        if (isset($id) && !empty($id) && $imoveisModal->listar_imovel($id)) {
            $dados = array();
            $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_editar");
            $dados["imoveis"] = $imoveisModal->listar_imovel(addslashes($id));
            $dados["imagens"] = $imoveisModal->listar_imagens(addslashes($id));


            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $imovel = array();
                $imovel['cod'] = addslashes($_POST['nCod']);
                $imovel['data'] = date("Y-m-d");
                $imovel['referencia'] = addslashes($_POST['nReferencia']);
                $imovel['status'] = addslashes($_POST['tOcuta']);
                $imovel['imovel'] = addslashes($_POST['tSelecionaImovel']);
                $imovel['categoria'] = addslashes($_POST['tCategoria']);
                $imovel['finalidade'] = addslashes($_POST['tFinalidade']);
                $imovel['quarto'] = (isset($_POST['tQuarto']) && !empty($_POST['tQuarto'])) ? addslashes($_POST['tQuarto']) : 0;
                $imovel['banheiro'] = (isset($_POST['tBanheiro']) && !empty($_POST['tBanheiro'])) ? addslashes($_POST['tBanheiro']) : 0;
                $imovel['suite'] = (isset($_POST['tSuite']) && !empty($_POST['tSuite'])) ? addslashes($_POST['tSuite']) : 0;
                $imovel['garagem'] = (isset($_POST['tGarage']) && !empty($_POST['tGarage'])) ? addslashes($_POST['tGarage']) : 0;
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
                if (isset($_FILES['tImagem-100']) && !empty($_FILES['tImagem-100']) && ($_FILES['tImagem-100']['error'] == 0)) {
                    $imovel['imagem'] = $this->salvar_imagem(300, 170, array("cod" => $imovel['cod'], "imagem" => $_FILES['tImagem-100'], "referencia" => $_POST['nReferencia'], "imovel" => $_POST['tSelecionaImovel'], "finalidade" => $_POST['tFinalidade']));
                    if ($imovel['imagem'] && isset($_POST['nImagem-100']) && !empty($_POST['nImagem-100'])) {
                        unlink($_POST['nImagem-100']);
                    }
                } else {
                    $imovel['imagem'] = $_POST['nImagem-100'];
                }
                $imovel['imagens'] = array();
                for ($i = 0; $i < addslashes($_POST["tQnt_fotos"]); $i++) {
                    if (isset($_FILES['tImagem-' . ($i + 1)]) && !empty($_FILES['tImagem-' . ($i + 1)])) {
                        $imovel["imagens"][$i] = $this->salvar_imagem(850, 478, array("cod" => $imovel['cod'], "imagem" => $_FILES['tImagem-' . ($i + 1)], "referencia" => $_POST['nReferencia'], "imovel" => $_POST['tSelecionaImovel'], "finalidade" => $_POST['tFinalidade']));
                        if ($imovel["imagens"][$i] && isset($_POST['nImagem-' . ($i + 1)]) && !empty($_POST['nImagem-' . ($i + 1)])) {
                            unlink($_POST['nImagem-' . ($i + 1)]);
                        }
                    } else {
                        $imovel["imagens"][$i] = $_POST['nImagem-' . ($i + 1)];
                    }
                }
                if ($imoveisModal->salvar($imovel)) {
                    header("Location: /painel_admin/imoveis/cadastrados");
                }
            }
        } else {
            header("Location: /painel_admin/home");
        }
        $this->loadTemplate($viewName, $dados);
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
