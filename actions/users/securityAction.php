<?php
//pas besoin de la bdd, juste besoin de la session start
session_start();

//si la session 'auth' est déclaré
//if(isset($_SESSION['auth'])){

    //si la session 'auth' n'est pas déclaré
if(!isset($_SESSION['auth'])){
    header('Location:login.php');

}