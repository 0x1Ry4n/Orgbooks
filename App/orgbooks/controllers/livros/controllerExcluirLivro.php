<?php
    namespace App\Controller\Excluir;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    use Exception;

    include_once("$root\orgbooks\controllers\scripts\alertDialog.php");
    require_once("$root\orgbooks\model\database.php");

    class ExcluirController {
        private $deleta;

        public function __construct($id)
        {
            $this->deleta = new \Model\Database();
        
            try {
                $this->deleta->deleteLivro($id);
                echo "<script>toastr.success('Livro excluído com sucesso!');</script>";
            } catch (Exception $e) {
                echo "<script>toastr.error('Não foi possível excluir o livro!');</script>";
            }
        
        }
    }

?>