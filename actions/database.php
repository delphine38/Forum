<?php

$host = "localhost";
$userDB = "forum";
$passDB = "forum";
$Database = "forum";

//MySQLi
$ConnectDB = mysqli_connect($host, $userDB, $passDB, $Database);

try{
    $bdd = new PDO("mysql:host=" . $host . ";dbname=" . $Database, $userDB, $passDB);
    $bdd->setAttribute(PDO::ERRMODE_EXCEPTION, 'ATTR_ERRMODE');

}catch(Exception $e){
    die('Une erreur à été trouvée : '.$e->getMessage());
}

?>