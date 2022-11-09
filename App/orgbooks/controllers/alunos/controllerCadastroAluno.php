<?php
    namespace App\Controller\Cadastro;

    include_once("../scripts/alertDialog.php");
    require_once("../../model/cadastroAluno.php");
    
    class CadastroController {
    
        private $cadastro; 

        public function __construct()
        {
            $this->cadastro = new \Model\Cadastro\CadastroAluno();
        }

        public function cadastrarAluno() {
            $this->cadastro->setRM(filter_input(INPUT_POST, 'matricula', FILTER_VALIDATE_INT));
            $this->cadastro->setNome(filter_input(INPUT_POST, 'pnome', FILTER_SANITIZE_SPECIAL_CHARS), filter_input(INPUT_POST, 'snome', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setDataNascimento(filter_input(INPUT_POST, 'data_nascimento'));
            $this->cadastro->setGenero(filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setTelefone(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
            $this->cadastro->setCurso(filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setEndereco(filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS));
            
            $error = $this->cadastro->existeAluno();

            if($error) {
                echo "<script>errorDialog('Erro no cadastro, verifique se o aluno já não existe!', '../../admin/students.php');</script>";
            } else {
                $this->cadastro->inserirAluno();
                echo "<script>successDialog('Aluno cadastrado com sucesso!', '../../admin/students.php');</script>";
            }
        }
    }

    $handle = new CadastroController();

    if(isset($_POST['add_student'])) {
        $handle->cadastrarAluno();
    }
?>