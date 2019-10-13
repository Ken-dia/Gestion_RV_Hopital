<?php
if(!($_SESSION['profil'] == 'Admin' || $_SESSION['profil'] == 'Medecin'))
{
header("location:$_SERVER[HTTP_REFERER]");
}
?>