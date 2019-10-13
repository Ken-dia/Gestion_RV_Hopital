<?php
if(!($_SESSION['profil'] == 'Admin'))
{
header("location:$_SERVER[HTTP_REFERER]");
}
?>