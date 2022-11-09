<?php
    session_start(); 
    //Check whether the session variable SESS_MEMBER_ID is present or not

    if (!isset($_SESSION['authlogin']) || (trim($_SESSION['authlogin']) == '')) {
        echo "<script> window.location = '../index.php'; </script>";
    }
    
    $session_id = $_SESSION['authlogin'];
?>