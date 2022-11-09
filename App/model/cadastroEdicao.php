<?php
    namespace Model\Cadastro;

    require_once("database.php");

    class CadastroEdicao extends \Model\Database {

        private $nome_livro;
        private $autor;
        private $materia;
        private $data_validade;

        public function setNome($nome) {
            $this->nome_livro = $nome;
        }

        private function getNome() {
            return $this->nome_livro;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }

        private function getAutor() {
            return $this->autor;
        }

        public function setMateria($materia) {
            $this->materia = $materia;
        }

        private function getMateria() {
            return $this->materia;
        }

        public function setDataValidade($data) {
            $this->data_validade = $data;
        }

        private function getDataValidade() {
            return $this->data_validade;
        }

        public function inserirEdicao() {
            return $this->insertEdicao(
                $this->getNome(), 
                $this->getMateria(), 
                $this->getAutor(), 
                $this->getDataValidade()
            );
        }

    }

?>