<?php
    namespace App\Controller\Lista;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    require_once("$root\model\listagemAlunos.php");

    class ListaController {
        
        private $listagem;

        public function __construct() {
            $this->listagem = new \Model\Listagem\ListarAlunos();
            $this->criarTabela();
        }

        private function criarTabela() {
            $row = $this->listagem->listaAlunos();
            
            if($row) {
                foreach ($row as $value) {
                    echo "<tr>";
                        echo "<td>
                            <div style='display: flex; flex-direction: row;' class='weight-600'><img style='width: 50px; height: 50px; border-radius: 40px; filter: drop-shadow(0 3px 5px rgba(0,0,0,.3));object-fit: cover;' src="?><?php echo (!empty($value['location'])) ? $value['location'] : '../public/images/NO-IMAGE-AVAILABLE.jpg'; ?>>
                        <?php
            
                        echo "<div style='padding-top: 15px; padding-left: 10px'>". htmlentities(ucfirst($value['nome']), ENT_QUOTES | ENT_HTML5, 'UTF-8')."</div>";
                        
                        echo "</div>
                        </td>";
                        
                        echo "<td>
                                <div class='weight-600'>". htmlentities($value['id_aluno'], ENT_QUOTES | ENT_HTML5, 'UTF-8')."</div>
                            </td>";
                        
                        
                        echo "<td title='Matéria'>
                        "?><?php 
                            switch($value['curso']) {
                                case "Mecatrônica":
                                    echo "<i class='fa-solid fa-robot'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    break;
                                case "Exatas":
                                    echo "<i class='fa-solid fa-calculator'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');    
                                    break;
                                case "Administração": 
                                    echo "<i class='fa-solid fa-money'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    break;
                                case "Desenvolvimento de Sistemas":
                                    echo "<i class='fa-solid fa-code'></i> ".htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    break;
                                case "Edificações": 
                                    echo "<i class='fa-solid fa-person-digging'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    break;
                                case "Prótese Dentária":
                                    echo "<i class='fa-solid fa-tooth'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    break;
                                case "Eletrônica":
                                    echo "<i class='fa-solid fa-microchip'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    break;
                                case "Ensino Médio": 
                                    echo "<i class='fa-solid fa-graduation-cap'></i> ". htmlentities($value['curso'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); 
                                    break;
                            }
                        ?><?php "</td>";    


                        echo "<td>". htmlentities($value['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</td>";

                        echo "<td>". $value['genero'] = ($value['genero'] == 0) ? htmlentities("Masculino", ENT_QUOTES | ENT_HTML5, 'UTF-8') : htmlentities("Feminino", ENT_QUOTES | ENT_HTML5, 'UTF-8') ."</td>";
                            
                        echo "<td>". htmlentities(implode('/', array_reverse(explode('-', $value['data_nascimento']))), ENT_QUOTES | ENT_HTML5, 'UTF-8') ."</td>";
                            
                        echo "<td>
                                <div class='table-actions'>
                                    <a title='Editar' href='edit_students.php?edit=".urlencode(filter_var($value['id_aluno'], FILTER_VALIDATE_INT)) ."'><i style='color: #233a77' class='dw dw-edit2'></i></a>
                                    <a title='Excluir' href='students.php?delete=". urlencode(filter_var($value['id_aluno'], FILTER_VALIDATE_INT)) ."'><i style='color: #ff7f7f' class='dw dw-delete-3'></i></a>
                                </div>
                            </td>";

                    echo "</tr>";
                }

            }
        }
    }

?>  