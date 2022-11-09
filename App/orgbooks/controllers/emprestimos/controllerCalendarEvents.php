<?php 
    namespace App\Controller\Calendar;

    $root = realpath($_SERVER['DOCUMENT_ROOT']);
    require_once("$root\orgbooks\model\database.php");

    class CalendarEvents {
        private $events;

        public function __construct() 
        {
            $this->events = new \Model\Database();
        } 

        public function getEvents() {
            return $this->events->getEmprestimosEvents();
        }   
    }
?>