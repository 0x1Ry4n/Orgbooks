<?php
    namespace App\Controller\Excluir;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    include_once("$root\orgbooks\controllers\scripts\alertDialog.php");
    require_once("$root\orgbooks\model\database.php");

    use Exception;

    class ExcluirController {
        
        private $deleta;

        public function __construct($id)
        {
            $this->deleta = new \Model\Database();
        
            try {
                $this->deleta->deleteEdicao($id);
                echo "<script>toastr.success('Edição excluída com sucesso!');</script>";
            } catch (Exception $e) {
                echo "<script>toastr.error('Não foi possível excluir a edição!');</script>";
            }
        }
    }

?>