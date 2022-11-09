<?php
    namespace App\Controller\Lista;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);

    require_once("$root\model\listagemEdicoes.php");

    class ListaController {
        
        private $listagem;
        const DEFAULT_DATE = 'Y-m-d';

        public function __construct() {
            $this->listagem = new \Model\Listagem\ListarEdicoes();
            $this->filtragem = new \Model\Database();
            $this->criarTabela();
        }

        private function criarTabela() {

            $row = $this->listagem->listaEdicoes();

            if($row) {
                foreach($row as $value) {
                    echo "<tr>";
                        echo "<td title='Nome do livro'>
                                <div class='weight-600'>". htmlentities($value['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8')."</div>
                            </td>";
                        
                        echo "<td title='Matéria' title='Matéria'>
                                "?><?php 
                                    switch($value['materia']) {
                                        case "Matemática":
                                            echo "<i class='fa-solid fa-superscript'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Português":
                                            echo "<i class='fa-solid fa-language'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');    
                                            break;
                                        case "História":
                                            echo "<i class='fa-solid fa-hourglass-3'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Geografia":
                                            echo "<i class='fa-solid fa-globe'></i> ".htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Biologia": 
                                            echo "<i class='fa-solid fa-dna'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Física":
                                            echo "<i class='fa-brands fa-grav'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Espanhol":
                                            echo "<i class='fa-solid fa-language'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Química": 
                                            echo "<i class='fa-solid fa-vial'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Sociologia":
                                            echo "<i class='fa-solid fa-users'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Filosofia":
                                            echo "<i class='fa-solid fa-institution'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Ed.Física": 
                                            echo "<i class='fa-solid fa-futbol-o'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        case "Inglês": 
                                            echo "<i class='fa-solid fa-language'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                            break;
                                        default:
                                            break;
                                    }
                                ?><?php "</td>";    
                                    
                        echo "<td title='Autor'>"?><?php
                                    $autor = json_decode($value['autor']);

                                    foreach ($autor as $a) {
                                        echo htmlentities($a->value.", ");
                                    } 
                        ?><?php "</td>";
                        echo "<td title='Validade'>"?><?php if(htmlentities($value['validade'], ENT_QUOTES | ENT_HTML5, 'UTF-8') < date(static::DEFAULT_DATE, time())) { echo "<p title='Livro Vencido' style='margin-top: 15px; color: red'>". htmlentities(implode('/', array_reverse(explode('-', $value['validade'])))). "</p>"; } else { echo "<p style='margin-top: 15px;'>". htmlentities(implode('/', array_reverse(explode('-', $value['validade']))), ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</p>"; }?><?php "</td>";
                            
                        echo "<td>
                                <div style='margin-top: 0.3em' class='table-actions'>
                                        <a title='Editar' href='edit_editions.php?edit=". urlencode(filter_var($value['id_edicao'], FILTER_VALIDATE_INT)). "'><i style='color: #233a77' class='dw dw-edit2'></i></a>
                                        <a title='Excluir' href='editions.php?delete=". urlencode(filter_var($value['id_edicao'], FILTER_VALIDATE_INT)). "'><i style='color: #ff7f7f' class='dw dw-delete-3'></i></a>
                                    </div>
                                </div>
                            </td>";
                    echo "</tr>";
                }
            }
        }
    }

?>