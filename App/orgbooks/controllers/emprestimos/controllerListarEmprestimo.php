<?php
    namespace App\Controller\Lista;

    require_once("../model/listagemEmprestimos.php");

    class ListaController {
        
        private $listagem;

        public function __construct() {
            $this->listagem = new \Model\Listagem\ListarEmprestimos();
            $this->criarTabela();
        }

        private function criarTabela() {
            $row = $this->listagem->listaEmprestimo();

            if ($row) {
                foreach ($row as $value) {
                    echo "<tr>";

                    echo "<td>";

                        echo "<div>". htmlentities(ucfirst($value['nome_aluno']). " - " .$value['id_aluno'], ENT_QUOTES | ENT_HTML5, 'UTF-8')."</div>";
                    
                    echo "</td>";
                        
                        echo "<td>". htmlentities($value['nome_edicao'] . " - ". $value['cod_unidade'], ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</td>";
                        
                        echo "<td>". htmlentities(implode('/', array_reverse(explode('-', $value['data_retirada']))). " - ". implode('/', array_reverse(explode('-', $value['data_devolucao']))), ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</td>";

                        echo "<td>
                                <div class='table-actions'>
                                    <a style='font-size: 13pt' title='Devolver' href='loans.php?delete=". urlencode(filter_var($value['id_emprestimo'], FILTER_VALIDATE_INT)). "'><i style='color: 	#696969' class='fa-solid fa-hand-holding-hand' aria-hidden='true'></i></a>
                                </div>
                            </td>";
                    echo "</tr>";
                }
            } 
            
    }
}

?>

