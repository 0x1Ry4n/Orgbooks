<?php
    namespace Model\Listagem;

    require_once("database.php");

    class ListarLivros extends \Model\Database {
        public function listaEdicoes() {
            if(is_null($this->selectEdicao())) {
                return false;
            }
            
            return $this->selectEdicao();
        }

        public function edicaoLivros($edicao) {
            if(is_null($this->selectEdicaoLivro($edicao))) {
                return false;
            }

            return $this->selectEdicaoLivro($edicao);
        }
    }
?>