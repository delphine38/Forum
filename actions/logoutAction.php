<?php
//pour pouvoir se déconnecter, il faut déclarer les sessions
session_start();

//les stockées dans un tableau
$_SESSION = [];

//détruire toute les sessions
session_destroy();

//les rediriger vers login.php
header('Location:../login.php');