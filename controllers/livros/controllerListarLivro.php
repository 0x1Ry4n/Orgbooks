<?php
    namespace App\Controller\Lista; 
    
    require_once("../model/listagemLivros.php");

    class ListaController {
        
        const DEFAULT_DATE = 'Y-m-d';
        private $listagem;

        public function __construct() {
            $this->listagem = new \Model\Listagem\ListarLivros();
            $this->criarTabela();
        }

        private function criarTabela() {
            $row = $this->listagem->selectEdicaoLivro();
            
            if($row) {
                foreach($row as $value) {
                    echo "<tr>";
                        echo "<td>
                            <div class='weight-600' title='Código'>". htmlentities($value['id_livro'], ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</div>
                        </td>";

                        echo "<td>
                            <div class='weight-600' title='Edição'>". htmlentities($value['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</div>
                        </td>";

                        echo "<td title='Matéria'>
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

                                foreach ($autor as $key){
                                    echo htmlentities($key->value.", ", ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                } 
                        ?><?php "</td>";
                        
                        echo "<td title='Descrição'>"?><?php

                                if(is_null($value['descricao'])) {
                                    echo "<i style='color: #0044d0' class='fa-solid fa-comment-slash'></i> Sem descrição";
                                } else if (htmlentities($value['descricao'], ENT_QUOTES | ENT_HTML5, 'UTF-8') == "Novo") {
                                    echo "<i style='color: green' class='fa-solid fa-battery-full'></i> ". htmlentities($value['descricao'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                } else if (htmlentities($value['descricao'], ENT_QUOTES | ENT_HTML5, 'UTF-8') == "Usado") {
                                    echo "<i style='color: orange' class='fa-solid fa-battery-three-quarters'></i> ". htmlentities($value['descricao'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                } else {
                                    echo "<i style='color: red' class='fa-solid fa-battery-quarter'></i> ". htmlentities($value['descricao'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                }

                        ?><?php "</td>";
                        
                        echo "<td>
                            <div class='weight-600' style='margin-top: 5px'>"?><?php if(htmlentities($value['status_livro'], ENT_QUOTES | ENT_HTML5, 'UTF-8') == 0) { echo "<div class='status' style='background-color: #DE3131' title='Em Uso'><i class='fa-regular fa-circle-xmark'></i> Uso</div>"; } else { echo "<div class='status' style='background-color: #71C744' title='Disponível'><i class='fa-regular fa-circle-check'></i>  Disp </div>"; } ?><?php "</div>
                        </td>";
                                
                        echo "<td>
                                <div class='table-actions'>
                                    <a title='Editar' href='edit_books.php?edit=". urlencode(filter_var($value['id_livro'], FILTER_VALIDATE_INT)) ."'><i style='color: #233a77' class='dw dw-edit2'></i></a>
                                    <a title='Excluir' href='books.php?delete=". urlencode(filter_var($value['id_livro'], FILTER_VALIDATE_INT)) ."'><i style='color: #ff7f7f' class='icon-copy dw dw-delete-3'></i></a>
                                </div>
                        </td>";
                    echo "</tr>";
                }
            }
        }

    }


?>
