<?php
    namespace App\Controller\Edicao;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\orgbooks\controllers\scripts\alertDialog.php");
    require_once("$root\orgbooks\model\database.php");

    class EdicaoController {
        private $livro;
        private $cod_livro;
        private $cod_edicao;
        private $descricao;

        public function __construct($id)
        {
            $this->livro = new \Model\Database();
            $this->criarFormulario($id);
        }

        private function criarFormulario($id) {
            $row = $this->livro->pesquisaLivro($id);

            if(!$row) {
                return false;
            }
            $this->cod_livro = $row['id_livro'];
            $this->cod_edicao = $row['cod_edicao'];
            $this->descricao = $row['descricao'];
        }

        public function editarFormulario($cod_edicao, $cod_livro, $descricao) {
            if($this->livro->updateLivro($cod_edicao, $cod_livro, $descricao)) {
                echo "<script>successDialog('Livro de código $cod_livro editado com sucesso!', '../../admin/books.php');</script>";
            } else {
                echo "<script>errorDialog('Não foi possível editar o livro!');</script>";
            }
        }
        public function setLivro($cod_livro) {
            $this->cod_livro = $cod_livro;
        }

        public function setEdicao($cod_edicao) {
            $this->cod_edicao = $cod_edicao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getLivro() {
            return $this->cod_livro;
        }   

        public function getEdicao() {
            return $this->cod_edicao;
        }

        public function getDescricao() {
            return $this->descricao;
        }
    }

    $id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $editar = new EdicaoController($id);

    if(isset($_POST['submit'])) {
        $edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_NUMBER_INT); 
        $livro = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT);
        $descricao = filter_input(INPUT_POST, 'descricao');
        $editar->editarFormulario($edicao, $livro, $descricao);
    }

    if(isset($_POST['reset'])) {
        $editar->setLivro("a");
        $editar->setEdicao("b");
        $editar->setDescricao("c");
    }
?>
