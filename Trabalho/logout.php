<?php
    //Sistema que da Logout
    session_start();
    session_destroy();
    header("Location: index.php");
    exit;
?>