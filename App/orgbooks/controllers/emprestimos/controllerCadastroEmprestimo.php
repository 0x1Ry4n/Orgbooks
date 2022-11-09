<?php
    namespace App\Controller\Cadastro;

    include_once("../scripts/alertDialog.php");
    require_once("../../model/cadastroEmprestimo.php");

    class CadastroController {

        private $cadastro;

        public function __construct()
        {
            $this->cadastro = new \Model\Cadastro\CadastroEmprestimo();
        }

        public function criarEmprestimo() {
            $this->cadastro->setUnidade(filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT));
            $this->cadastro->setAluno(filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setDataDevolucao(filter_input(INPUT_POST, 'data_devolucao', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->cadastro->setDataRetirada(filter_input(INPUT_POST, 'data_retirada', FILTER_SANITIZE_SPECIAL_CHARS));

            $validateDate = true;

            if ($this->cadastro->getDataRetirada() > $this->cadastro->getDataDevolucao() || $this->cadastro->getDataDevolucao() < $this->cadastro->getDataRetirada()) {
                $validateDate = false;
            } 

            $error1 = $this->cadastro->getUnidade() < 1; 
            $error2 = $this->cadastro->existeEmprestimo();
            $error3 = !$validateDate;  
            $error4 = $this->cadastro->existeLivro();

            if ($error2) {
                echo "<script>errorDialog('Não foi possível realizar o empréstimo, verifique se ele já não foi realizado!', '../../admin/loans.php'); </script>";
            } else if ($error1) {
                echo "<script>errorDialog('Não foi possível realizar o empréstimo, escaneie um QRCode...', '../../admin/loans.php'); </script>";
            } else if ($error3) {
                echo "<script>errorDialog('Não foi possível realizar o empréstimo, data incorreta!', '../../admin/loans.php'); </script>";
            } else if (!$error4) {
                echo "<script>errorDialog('Não foi possível criar o empréstimo, verifique se o livro existe!', '../../admin/loans.php'); </script>";
            } else {
                $this->cadastro->criarEmprestimo();
                $this->cadastro->setUsoLivro();
                echo "<script>successDialog('Empréstimo realizado com sucesso!', '../../admin/loans.php'); </script>";
            }
        }
    }
    
    $handle = new CadastroController();

    if(isset($_POST['add_loan'])) {
        $handle->criarEmprestimo();
    }

?>