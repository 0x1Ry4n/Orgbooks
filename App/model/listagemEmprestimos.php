<?php
    namespace Model\Listagem;

    require_once("database.php");

    class ListarEmprestimos extends \Model\Database {
        public function listaEmprestimo() {
            if (is_null($this->selectEmprestimo())) {
                return false;
            }

            return $this->selectEmprestimo();
        }
    }
?>