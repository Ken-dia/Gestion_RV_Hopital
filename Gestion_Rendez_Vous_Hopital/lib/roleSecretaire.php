<?php
if(!($_SESSION['profil'] == 'Admin' || $_SESSION['profil'] == 'Secretaire'))
{
header("location:$_SERVER[HTTP_REFERER]");
}
?>