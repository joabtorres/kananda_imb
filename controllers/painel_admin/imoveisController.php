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
    /*
     * public index() [TIPO]
     * Descrição: Utilizada para controle de URL, carrega a função mais_visitados;
     * @author Joab Torres Alencar
     */

    public function index() {
        $this->mais_visitados();
    }

    /*
     * public mais_visitados($page) [lista os imóveis mais visitados no website]
     * Descrição: Está função além de controle de URL lista em ordem decresente os imóveis mais visitados no website
     * @author Joab Torres Alencar
     */

    public function mais_visitados($page = array()) {
        if ($this->checkUserPattern()) {
            $dados = array();
            $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_mais_visitados");
            $imoveisModal = new Imoveis();

            $imovel = array();
            $imovel['status'] = 0;
            $limite = 6;
            $total_registro = $imoveisModal->quantidade_imoveis($imovel);
            $paginas = $total_registro / $limite;
            $indice = 0;
            $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
            $indice = ($pagina_atual - 1) * $limite;

            $ordem = "ka_imb_imovel_visita.quantidade_visita";
            $dados["paginas"] = $paginas;
            $dados["pagina_atual"] = $pagina_atual;
            $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite, $ordem);
            $this->loadTemplate($viewName, $dados);
        }
    }

    /*
     * public cadastrar() [CADASTRAR IMOVEL]
     * Descrição: Está função é utilizada pra controle de URL referente a efetiva novo cadastro de um imóvel
     * @author Joab Torres Alencar
     */

    public function cadastrar() {
        $this->checkUserPattern();
        $dados = array();
        $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_cadastrar");
        if (isset($_POST['nReferencia']) && !empty($_POST['nReferencia'])) {
            $imovel = array();
            $imoveisModal = new Imoveis();
            $imovel['cod'] = $imoveisModal->getCodigo() + 1;
            $imovel['data'] = date("Y-m-d");
            $imovel['referencia'] = addslashes($_POST['nReferencia']);
            $imovel['status'] = addslashes($_POST['tOcuta']);
            $imovel['destaque'] = addslashes($_POST['tDestaque']);
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
                $imovel['imagem'] = $_FILES['tImagem-100'];
            }
            $imovel['imagens'] = array();
            for ($i = 0; $i < addslashes($_POST["tQnt_fotos"]); $i++) {
                if (isset($_FILES['tImagem-' . ($i + 1)]) && !empty($_FILES['tImagem-' . ($i + 1)])) {
                    $imovel["imagens"][$i] = $_FILES['tImagem-' . ($i + 1)];
                }
            }
            if ($imoveisModal->cadastrar($imovel)) {
                header("Location: /painel_admin/imoveis/cadastrados");
            }
        }

        $this->loadTemplate($viewName, $dados);
    }

    /*
     * public editar($id) [EDITAR IMÓVEL]
     * Descrição:Está função tem como objetivo controle de URL referente ao MVC do imoveis e controla edição do imóvel solicidaddo
     * @param $id int = codigo do imóvel para ser editado
     * @author Joab Torres Alencar
     */

    public function editar($id = array()) {
        $this->checkUserPattern();
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
                $imovel['destaque'] = addslashes($_POST['tDestaque']);
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
                    $imovel['imagem'] = $_FILES['tImagem-100'];
                    if ($imovel['imagem'] && isset($_POST['nImagem-100']) && !empty($_POST['nImagem-100']) && ($_POST['nImagem-100'] != "Array")) {
                        unlink($_POST['nImagem-100']);
                        $nome_imagem = explode("/", $_POST['nImagem-100']);
                        $nome_imagem = end($nome_imagem);
                        $diretorio = explode("/" . $nome_imagem, $_POST['nImagem-100']);
                        $diretorio = $diretorio[0];
                        if (count(scandir($diretorio)) <= 2) {
                            rmdir($diretorio);
                        }
                    }
                } else {
                    $imovel['imagem'] = $_POST['nImagem-100'];
                }
                $imovel['imagens'] = array();
                for ($i = 0; $i < addslashes($_POST["tQnt_fotos"]); $i++) {
                    if (isset($_FILES['tImagem-' . ($i + 1)]) && !empty($_FILES['tImagem-' . ($i + 1)]) && ($_FILES['tImagem-' . ($i + 1)]['error'] == 0)) {
                        $imovel["imagens"][$i] = $_FILES['tImagem-' . ($i + 1)];
                    } else {
                        $imovel["imagens"][$i] = $_POST['nImagem-' . ($i + 1)];
                    }
                }
                if ($imoveisModal->alterar($imovel)) {
                    header("Location: /painel_admin/imoveis/cadastrados");
                }
            }
        } else {
            header("Location: /painel_admin/home");
        }
        $this->loadTemplate($viewName, $dados);
    }

    /*
     * public excluir($id) [excluir um imóvel]
     * Descrição:Está função tem como objetivo executa ações para exclusão de imóvel
     * @param $id int - código do imóvel
     * @author Joab Torres Alencar
     */

    public function excluir($id) {
        $this->checkUserPattern();
        if (!empty($id)) {
            $imoveisModel = new Imoveis();
            $imoveisModel->excluir(addslashes($id));
            header("Location: /painel_admin/imoveis/cadastrados");
        } else {
            header("Location: /painel_admin/imoveis/cadastrados");
        }
    }

    /*
     * public cadastrados($page) [LISTA IMÓVEIS]
     * Descrição:   Lista todos os imóveis cadastrados sem nenhuma restrinção
     * @param int $page : página atual acessada
     * @author Joab Torres Alencar
     */

    public function cadastrados($page = array()) {
        if ($this->checkUserPattern()) {
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

            $dados["paginas"] = $paginas;
            $dados["pagina_atual"] = $pagina_atual;
            $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
            $this->loadTemplate($viewName, $dados);
        }
    }

    /*
     * public pesquisar($page) [Pesquisa imóvel]
     * Descrição: Está função tem como objetivo fazer o controle nas pesquisas de um ou vários tipos de imóvel
     * @author Joab Torres Alencar
     */

    public function pesquisar($page = array()) {
        if ($this->checkUserPattern()) {
            $dados = array();
            $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_pesquisar");
            $imoveisModal = new Imoveis();

            $imovel = array();
            //BUSCAR RAPIDA
            if (isset($_POST['tBuscaRapida'])) {
                $_SESSION['imovel_painel'] = array();
                $_SESSION['imovel_painel']['status'] = 0;
                $_SESSION['imovel_painel']['referencia'] = $_POST['tReferencia'];
                //BUSCAR AVANÇADA
            } else if (isset($_POST['tBuscarAvancada'])) {
                $_SESSION['imovel_painel'] = array();

                $_SESSION['imovel_painel']['status'] = 0;
                $_SESSION['imovel_painel']['imovel'] = $_POST['tSelecionaImovel'];
                if ($_POST['tFinalidade'] != "Comprar e Alugar") {
                    $_SESSION['imovel_painel']['finalidade'] = $_POST['tFinalidade'];
                }
                if ($_POST['tCategoria'] != 'Todos') {
                    $_SESSION['imovel_painel']['categoria'] = $_POST['tCategoria'];
                }
                if (!empty($_POST['tSelecionaQntSuites'])) {
                    $_SESSION['imovel_painel']['suite'] = $_POST['tSelecionaQntSuites'];
                }
                if (!empty($_POST['tSelecionaQntQuarto'])) {
                    $_SESSION['imovel_painel']['quarto'] = $_POST['tSelecionaQntQuarto'];
                }
                if (!empty($_POST['nSelectQntBanheiro'])) {
                    $_SESSION['imovel_painel']['banheiro'] = $_POST['nSelectQntBanheiro'];
                }
                if (!empty($_POST['tSelecionaqntGaragem'])) {
                    $_SESSION['imovel_painel']['suite'] = $_POST['tSelecionaqntGaragem'];
                }
                if (!empty($_POST['tLargura'])) {
                    $_SESSION['imovel_painel']['largura'] = $_POST['tLargura'];
                }
                if (!empty($_POST['tComprimento'])) {
                    $_SESSION['imovel_painel']['comprimento'] = $_POST['tComprimento'];
                }
            }
            if(isset($_SESSION['imovel_painel']) && !empty($_SESSION['imovel_painel'])) {
                $imovel = $_SESSION['imovel_painel'];
            }
            //PAGINACAO
            $limite = 6;
            $total_registro = $imoveisModal->quantidade_imoveis($imovel);
            $paginas = $total_registro / $limite;
            $indice = 0;
            $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
            $indice = ($pagina_atual - 1) * $limite;

            //consulta no json
            if (file_exists('assets/website/json/imoveis.json')) {
                $imoveisJSON = json_decode(file_get_contents('assets/website/json/imoveis.json'));
                foreach ($imoveisJSON as $array) {
                    foreach ($array as $key => $value) {
                        if ('imovel_imovel' == $key) {
                            $dados['nome_imoveis'][] = $value;
                        }
                    }
                }
                $dados['nome_imoveis'] = array_unique($dados['nome_imoveis']);
            }

            $dados["paginas"] = $paginas;
            $dados["nome"] = $paginas;
            $dados["pagina_atual"] = $pagina_atual;
            $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
            $this->loadTemplate($viewName, $dados);
        }
    }

    /*
     * public ocultos($page) [MOSTRA SOMENTE OS IMÓVEIS OCULTOS]
     * Descrição:Está função é responsável pelo controle na exibição de somente imóveis ocultos no website
     * @author Joab Torres Alencar
     */

    public function ocultos($page = array()) {
        if ($this->checkUserPattern()) {
            $dados = array();
            $viewName = array("diretorio" => "painel_admin", "view" => "imoveis_ocultos");
            $imoveisModal = new Imoveis();

            $imovel = array();
            $imovel['status'] = 1;
            $limite = 6;
            $total_registro = $imoveisModal->quantidade_imoveis($imovel);
            $paginas = $total_registro / $limite;
            $indice = 0;
            $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
            $indice = ($pagina_atual - 1) * $limite;
            $dados["paginas"] = $paginas;
            $dados["pagina_atual"] = $pagina_atual;
            $dados["imoveis"] = $imoveisModal->listar_imoveis($imovel, $indice, $limite);
            $this->loadTemplate($viewName, $dados);
        }
    }

}
