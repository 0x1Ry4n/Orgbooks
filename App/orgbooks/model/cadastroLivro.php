<?php
    namespace Model\Cadastro;

    require_once("database.php");

    class CadastroLivro extends \Model\Database {
        
        private $qrcode;
        private $cod_edicao;
        private $descricao;

        public function setQRCode($qrcode) {
            $this->qrcode = $qrcode;
        }

        public function getQRCode() {
            return $this->qrcode;
        } 

        public function setEdicao($edicao) {
            $this->cod_edicao = $edicao;
        }
     
        private function getEdicao() {
            return $this->cod_edicao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        private function getDescricao() {
            return $this->descricao;
        }

        public function inserirLivro() {
            return $this->insertLivro(
                $this->getQRCode(), 
                $this->getEdicao(), 
                $this->getDescricao()
            );
        }       
        
        public function existeLivro() {
            return $this->checkExistsLivro($this->getQRCode());
        }
    }

?>