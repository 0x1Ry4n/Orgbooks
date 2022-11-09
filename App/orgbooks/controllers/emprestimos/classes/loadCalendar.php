<?php

    use App\Controller\Calendar\CalendarEvents;

    require_once("../controllerCalendarEvents.php");

    $data = array();

    $objEvents = new CalendarEvents();

    foreach ($objEvents->getEvents() as $row) {
        $data[] = array(
            "id" => $row['id_emprestimo'], 
            "title" => $row['cod_unidade']. " - ". $row['nome_edicao'],
            "start" => $row['data_retirada'],
            "end" => $row['data_devolucao'],
            "name" => $row['nome_edicao'],
            "subject" => $row['materia'],
            "student" => $row['nome_aluno'],
            "id_student" => $row['id_aluno']
        );
    }   

    echo json_encode($data);
?> 