<?php
    namespace Model\Listagem;

    require_once("database.php");

    class ListarAlunos extends \Model\Database {
        public function listaAlunos() {
            if (is_null($this->selectAluno())) {
                return false;
            }
            
            return $this->selectAluno();
        }
    }
?>