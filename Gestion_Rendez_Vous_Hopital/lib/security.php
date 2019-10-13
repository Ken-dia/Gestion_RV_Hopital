<?php
    session_start();
    if(!isset($_SESSION['profil']))
    {
        header('location:index.php');
    }
?>