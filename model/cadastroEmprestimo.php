<?php
    namespace Model\Cadastro;

    require_once("database.php");

    class CadastroEmprestimo extends \Model\Database {
        
        private $cod_unidade;
        private $cod_aluno;
        private $data_devolucao;
        private $data_retidada;

        public function setUnidade($cod_unidade) {
            $this->cod_unidade = $cod_unidade;
        }

        public function getUnidade() {
            return $this->cod_unidade;
        }

        public function setAluno($cod_aluno) {
            $this->cod_aluno = $cod_aluno;
        }

        private function getAluno() {
            return $this->cod_aluno;
        }

        public function setDataDevolucao($data_devolucao) {
            $this->data_devolucao = $data_devolucao;
        }

        public function getDataDevolucao() {
            return $this->data_devolucao;
        }

        public function setDataRetirada($data_retirada) {
            $this->data_retidada = $data_retirada;
        }

        public function getDataRetirada() {
            return $this->data_retidada;
        }

        public function setUsoLivro() {
            $this->updateStatusLivro($this->getUnidade(), 0);
        }

        public function criarEmprestimo() {
            return $this->insertEmprestimo(
                $this->getUnidade(), 
                $this->getAluno(), 
                $this->getDataDevolucao(), 
                $this->getDataRetirada()
            );
        }

        public function existeEmprestimo() {
            return $this->checkExistsEmprestimo($this->getUnidade());
        }

        public function existeLivro() {
            return $this->checkExistsLivro($this->getUnidade());
        }
    }

?>