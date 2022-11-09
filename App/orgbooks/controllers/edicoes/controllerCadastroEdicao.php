<?php
    namespace App\Controller\Cadastro;
    
    include_once("../scripts/alertDialog.php");
    require_once("../../model/cadastroEdicao.php");

    class CadastroController {

        private $cadastro;

        public function __construct()
        {
            $this->cadastro = new \Model\Cadastro\CadastroEdicao();
        }

        public function cadastrarEdicao() {
            
            $this->cadastro->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setMateria(filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setAutor(filter_input(INPUT_POST, 'autor'));
            $this->cadastro->setDataValidade(date('Y-m-d', strtotime(filter_input(INPUT_POST, 'data_validade', FILTER_SANITIZE_SPECIAL_CHARS))));

            $result = $this->cadastro->inserirEdicao();

            if ($result) {
                echo "<script>successDialog('Edição criada com sucesso!', '../../admin/editions.php');</script>";
            } else {
                echo "<script>errorDialog('Erro! Verifique se a edição já não existe!', '../../admin/editions.php');</script>";
            }
        }
    }

    $handle = new CadastroController();

    if(isset($_POST['add_editions'])) {
        $handle->cadastrarEdicao();
    }

?>