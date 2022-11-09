<?php
    namespace App\Controller\Edicao;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\controllers\scripts\alertDialog.php");
    require_once("$root\model\database.php");

    class EdicaoController {

        private $edicao;
        private $rm;  
        private $nome;
        private $data_nascimento; 
        private $genero;
        private $telefone;
        private $email;
        private $curso;
        private $endereco;
        private $location;

        public function __construct($id)
        {
            $this->edicao = new \Model\Database();
            $this->criarFormulario($id);
        }

        private function criarFormulario($id) {
            $row = $this->edicao->pesquisaAluno($id);

            if (!$row) {
                return false;
            }

            $this->rm = $row['id_aluno'];
            $this->nome = $row['nome'];
            $this->genero = $row['genero'];
            $this->data_nascimento = $row['data_nascimento'];
            $this->telefone = $row['telefone'];
            $this->email = $row['email'];
            $this->endereco = $row['endereco'];
            $this->curso = $row['curso'];
            $this->location = $row['location'];
        }

        public function editarFormulario($id, $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso) {
            if($this->edicao->updateAluno($id, $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso)) {
                echo "<script>successDialog('Aluno $nome editado com sucesso!', '../../admin/students.php');</script>";
            } else {
                echo "<script>errorDialog('Não foi possível editar o aluno!');</script>";
            }
        }

        public function getRM() {
            return $this->rm;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getDataNascimento() {
            return $this->data_nascimento;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getCurso() {
            return $this->curso;
        }

        public function getEndereco() {
            return $this->endereco;
        }

        public function getLocation() {
            return $this->location;
        }
    }

    $id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);

    $editar = new EdicaoController($id);

    if(isset($_POST['submit'])) {
        $rm = filter_input(INPUT_POST, 'matricula', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS). " ". filter_input(INPUT_POST, 'snome', FILTER_SANITIZE_SPECIAL_CHARS);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_VALIDATE_INT);
        $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_SPECIAL_CHARS);

        $editar->editarFormulario($rm, $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso);
    }
?>