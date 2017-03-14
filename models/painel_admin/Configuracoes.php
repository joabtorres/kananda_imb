<?php

/**
 * Configuracoes - [TIPO]
 * 
 * Descricao: 
 * 
 * @author Joab Torres Alencar
 * 
 * @copyright (c) 07/03/2017, Joab Torres Alencar -  Analista de Sistemas 
 */
class Configuracoes extends model {
    /*
     * public salvar_slide($slides) [CADASTRA,SALVA OU DELETA SLIDE]
     * Descrição: Está função é responsável para cadastrar, altera e excluir imagens do banner principal no website;
     * @param array String - $slides
     * @author Joab Torres Alencar
     */

    public function salvar_slide($slides) {
        $imagens_atual_no_form = array();
        $imagens_atual_no_bd = array();
        $banners = $this->lista_slide();
        foreach ($slides as $slide) {
            if (is_array($slide)) {
                $imagens_atual_no_form[] = $this->salva_imagem($slide);
            } else {
                $imagens_atual_no_form[] = $slide;
            }
        }
        if (count($banners) > 0) {
            foreach ($banners as $value) {
                $imagens_atual_no_bd[] = $value['imagem_banner'];
            }
            //banners que serão removeidas
            $banner_removido = array_diff($imagens_atual_no_bd, $imagens_atual_no_form);
            //banners inseridos atualmente
            $banner_inserido = array_diff($imagens_atual_no_form, $imagens_atual_no_bd);
            array_multisort($banner_inserido);
            array_multisort($banner_removido);
            while (count($banner_removido) >= count($banner_inserido) && count($banner_inserido) > 0) {
                $this->excluir_imagem($banner_removido[0]);
                $sql = $this->db->prepare('UPDATE ka_imb_banner SET imagem_banner = :banner1 WHERE imagem_banner = :banner2 ;');
                $sql->bindValue(':banner1', $banner_inserido[0]);
                $sql->bindValue(':banner2', $banner_removido[0]);
                $sql->execute();
                array_shift($banner_inserido);
                array_shift($banner_removido);
            }
            $imagens_atual_no_form = $banner_inserido;
            foreach ($banner_removido as $banner) {
                $this->excluir_imagem($banner);
                $sql = $this->db->prepare('DELETE FROM ka_imb_banner WHERE imagem_banner = :banner ;');
                $sql->bindValue(":banner", $banner);
                $sql->execute();
            }
        }
        foreach ($imagens_atual_no_form as $banner) {
            $sql = $this->db->prepare('INSERT INTO ka_imb_banner (imagem_banner) VALUES (:banner) ;');
            $sql->bindValue(':banner', $banner);
            $sql->execute();
        }
    }

    public function lista_slide() {
        $sql = $this->db->query('SELECT * FROM ka_imb_banner ;');
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return null;
        }
    }

    private function salva_imagem($file_imagem) {
        $imagem = array();
        $largura = 1349;
        $altura = 440;
        $imagem['temp'] = $file_imagem['tmp_name'];
        $imagem['extensao'] = explode(".", $file_imagem['name']);
        $imagem['extensao'] = strtolower(end($imagem['extensao']));
        $imagem['name'] = "kananda_slide_banner_" . md5(rand(1000, 900000) . time()) . '.' . $imagem['extensao'];
        $imagem['diretorio'] = 'uploads/slideshow';
        if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg' || $imagem['extensao'] == 'png') {

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

    private function excluir_imagem($imagem) {
        if (file_exists($imagem)) {
            unlink($imagem);
        }
    }

}
