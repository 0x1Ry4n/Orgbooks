<?php
    require_once("../model/config/config.php");

    try {
        $conn = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
    } catch(mysqli_sql_exception $e) {
        exit("Error: ". $e->getMessage());
    }

    try {
        $PDO = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch(PDOException $e) {
        exit("Error: ". $e->getMessage());
    }

?>