<?php
    session_start();
    unset($_SESSION['EMAIL']);
    setcookie('emailcookie','',time()-86400);
    setcookie('passwordcookie','',time()-86400);
    header('location:index.html');
    die();
?>