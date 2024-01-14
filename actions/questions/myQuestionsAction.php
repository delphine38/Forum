<?php
//session_start();
//on inclu le fichier database
require('actions/database.php');

//faire une requete qui permet de récuperer l'ensemble des données
//ORDER BY DESC pour que l'id le + gros s'affiche en 1er
$getAllQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
//et on execute
$getAllQuestions->execute(array($_SESSION['id']));