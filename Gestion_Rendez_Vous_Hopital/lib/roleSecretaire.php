<?php
if(!($_SESSION['profil'] == 'Admin' || $_SESSION['profil'] == 'Secretaire'))
{
header("location:index.php?action=listesRV");
}
?>