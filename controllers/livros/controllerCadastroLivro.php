<?php
    namespace App\Controller\Cadastro;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("..\scripts\alertDialog.php");
    require_once("$root\model\cadastroLivro.php");

    class CadastroController {

        private $cadastro;

        public function __construct()
        {
            $this->cadastro = new \Model\Cadastro\CadastroLivro();
        }

        public function cadastrarLivro() {
            
            $this->cadastro->setQRCode(filter_input(INPUT_POST, 'code', FILTER_SANITIZE_NUMBER_INT));
            $this->cadastro->setEdicao(filter_input(INPUT_POST, 'edicao_livro', FILTER_SANITIZE_NUMBER_INT));
            $this->cadastro->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS));

            $error = $this->cadastro->existeLivro();
            $error2 = $this->cadastro->getQRCode() < 1; 

            if($error) {
                echo "<script>errorDialog('Não foi possível adicionar o livro, verifique se ele já não foi cadastrado!', '../../admin/books.php'); </script>";
            } else if($error2) {
                echo "<script>errorDialog('Não foi possível adicionar o livro, escaneie um QRCode...', '../../admin/books.php'); </script>";
            } else {
                $this->cadastro->inserirLivro();
                echo "<script>successDialog('Livro registrado com sucesso!', '../../admin/books.php'); </script>";
            }
        }
    }

    $handle = new CadastroController();
    
    if(isset($_POST['add_book'])) {
        $handle->cadastrarLivro();
    }

?>