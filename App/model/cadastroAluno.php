<?php
    namespace Model\Cadastro;
    
    require_once("database.php");

    class CadastroAluno extends \Model\Database {

        private $registro;
        private $nome_aluno;
        private $genero;
        private $data_nascimento;
        private $telefone;
        private $email;
        private $endereco;
        private $curso;
        private $location;

        public function setRM($rm) {
            $this->registro = $rm;
        }

        private function getRM() {
            return $this->registro;
        }

        public function setNome($pnome, $snome) {
            $this->nome_aluno = $pnome." ".$snome;
        }

        private function getNome() {
            return $this->nome_aluno;
        }

        public function setGenero($genero) {
            $this->genero = $genero;
        }

        private function getGenero() {
            return $this->genero;
        }

        public function setDataNascimento($data_nascimento) {
            $this->data_nascimento = $data_nascimento;
        }

        private function getDataNascimento() {
            return $this->data_nascimento;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        private function getTelefone() {
            return $this->telefone;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        private function getEmail() {
            return $this->email;
        }

        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

        private function getEndereco() {
            return $this->endereco;
        }

        public function setCurso($curso) {
            $this->curso = $curso;
        }

        private function getCurso() {
            return $this->curso;
        }

        public function setLocation($location) {
            $this->location = $location;
        }

        public function getLocation() {
            return $this->location;
        }

        public function existeAluno() {
            return $this->checkExistsAluno($this->getRM());
        }

        public function inserirAluno() {
            return $this->insertAluno(
                $this->getRM(), 
                $this->getNome(), 
                $this->getGenero(), 
                $this->getDataNascimento(), 
                $this->getTelefone(), 
                $this->getEmail(), 
                $this->getEndereco(), 
                $this->getCurso()
            );
        }
    }

?>