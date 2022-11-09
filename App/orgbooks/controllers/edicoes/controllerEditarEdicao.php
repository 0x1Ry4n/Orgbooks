<?php
    namespace App\Controller\Edicao;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\orgbooks\controllers\scripts\alertDialog.php");
    require_once("$root\orgbooks\model\database.php");

    class EdicaoController {

        private $id;
        private $edicao;
        private $nome;
        private $materia;
        private $autor;
        private $data_validade;

        public function __construct($id)
        {
            $this->edicao = new \Model\Database();
            $this->criarFormulario($id);
        }

        private function criarFormulario($id) {
            $row = $this->edicao->pesquisaEdicao($id);
           
            if (!$row) {
                return false;
            }

            $this->id = $row['id_edicao'];
            $this->nome = $row['nome'];
            $this->materia = $row['materia'];
            $this->autor = $row['autor'];
            $this->data_validade = $row['validade'];
        }

        public function editarFormulario($nome, $materia, $autor, $data_validade, $id_edicao) {
            if ($this->edicao->updateEdicao($nome, $autor, $materia, $data_validade, $id_edicao)) {
                echo "<script>successDialog('Edição $nome editada com sucesso!', '../../admin/editions.php');</script>";
            } else {
                echo "<script>errorDialog('Não foi possível editar a edição!');</script>";
            }
        }

        public function getID() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getMateria() {
            return $this->materia;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function getValidade() {
            return $this->data_validade;
        }
    }

    $id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $editar = new EdicaoController($id);

    if (isset($_POST['submit'])) {
        $id_edicao = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $materia = filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_SPECIAL_CHARS);
        $autor = filter_input(INPUT_POST, 'autor'); 
        $validade = date('Y-m-d', strtotime(filter_input(INPUT_POST, 'data_validade', FILTER_SANITIZE_SPECIAL_CHARS))); 

        $editar->editarFormulario($nome, $materia, $autor, $validade, $id_edicao);
    }

?>