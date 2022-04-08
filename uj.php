<?php
    session_start();
    $mode=$_SESSION['mode'];
    include 'session_unset.php'; 
    header("Location: $mode");
?>