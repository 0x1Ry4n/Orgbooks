<?php 
    namespace App\Controller\Excluir;

    use Exception;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\orgbooks\controllers\scripts\alertDialog.php");
    require_once("$root\orgbooks\model\database.php");

    class ExcluirController {
        private $deleta;

        public function __construct($id_emprestimo)
        {
            $this->deleta = new \Model\Database();
        
            try {             
                $list = $this->deleta->selectLivroEmprestimo($id_emprestimo);   
                $delete = $this->deleta->deleteEmprestimo($id_emprestimo);

                if ($delete) {
                    if ($list) {
                        $this->deleta->updateStatusLivro($list['id_livro'], 1);
                        echo "<script>toastr.success('Livro devolvido com sucesso!');</script>";
                    }
                } else {
                    echo "<script>toastr.error('Erro ao excluir o empréstimo!');</script>";
                }
            } catch (Exception $e) {
                echo "<script> alert($e->getMessage()) </script>";
            }
        }
    }

?>