<?php 
    namespace App\Controller\Edicao;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\controllers\scripts\alertDialog.php");
    require_once("$root\model\database.php");

    class EdicaoController {
        
        private $admin;
        private $id;
        private $nome;
        private $email;
        private $genero;
        private $endereco;
        private $telefone;
        private $data_nascimento;
        
        public function __construct($id) {
            $this->admin = new \Model\Database();
            $this->criarFormulario($id);
        }

        private function criarFormulario($id) {
            $row = $this->admin->pesquisaAdmin($id);
            
            if (!$row) {
                return false;
            }

            $this->id = $row['id_admin'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->genero = $row['genero'];
            $this->endereco = $row['endereco'];
            $this->telefone = $row['telefone'];
            $this->data_nascimento = $row['data_nascimento'];
        }

        public function editarFormulario($nome, $email, $genero, $endereco, $telefone, $data_nascimento, $id) {
            if ($this->admin->updateAdmin($nome, $email, $genero, $endereco, $telefone, $data_nascimento, $id)) {
                echo "<script>successDialog('Perfil editado com sucesso!', '../../admin/my_profile.php') </script>";
            } else {
                echo "<script>errorDialog('Não foi possível editar o perfil!'); </script>";
            }
        }

        public function getID() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function getEndereco() {
            return $this->endereco;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getDataNascimento() {
            return $this->data_nascimento;
        }
    }

    $id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);

    $editar = new EdicaoController($id);

    if (isset($_POST['submit'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_VALIDATE_INT);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);

        $editar->editarFormulario($nome, $email, $telefone, $data_nascimento, $genero, $endereco, $id);
    }

?>