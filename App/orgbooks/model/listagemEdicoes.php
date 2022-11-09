<?php
    namespace Model\Listagem;

    require_once("database.php");

    class ListarEdicoes extends \Model\Database {
        public function listaEdicoes(){
            if (is_null($this->selectEdicao())) {
                return false;
            }

            return $this->selectEdicao();
        }
    }
?>