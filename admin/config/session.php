<?php
    session_start(); 

    if (!isset($_SESSION['authlogin']) || (trim($_SESSION['authlogin']) == '')) {
        echo "<script> window.location = '../index.php'; </script>";
    }
    
    $session_id = $_SESSION['authlogin'];
?>