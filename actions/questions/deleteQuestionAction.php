<?php
//pour démarrer la session
session_start();
//si la session n'est pas déclaré elle sera redirigé vers location : login.php
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}

//require('../database.php');
require('../database.php');

//require('actions/database.php');


//si l'id est présent et n'est pas vide
if(isset($_GET['id']) AND !empty($_GET['id'])){

        //vérifie si l'id est bien dans la table
        //variable qui va stocké l'id récupérer de l'url
        $idOfTheQuestion = $_GET['id'];
                                        //SELECT toute les données DE la table question QUI POSSEDE l'id ?
        $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
        //execute et dans tableau, on passe en parametre la variable de l'i $idOfQuestion
        $checkIfQuestionExists->execute(array($idOfTheQuestion));

        //si la variable $check en appelant la method permet de compter le nombre de ligne
        //si rowcount compte sup à 0 = donc récupérer une donnée, donc question exist
        if($checkIfQuestionExists->rowCount() >0){
            //$check que l'on appel avec méthode fetch pour récupérer les données
            $userInfo = $checkIfQuestionExists->fetch();
            //verifie si l'id de l'auteur est le meme que l'id de la session
            if($userInfo['id_auteur'] == $_SESSION['id']){
                //requete pour supprimer la question
                $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
                $deleteThisQuestion->execute(array($idOfQuestion));
                //une fois la question supprimer, redirection
                header('Location: my-questions.php');
            
            }else{
                echo "Cette question ne vous appartient pas, vous ne pouvez pas la supprimé";
            }

        }else{
            echo "Aucune question n'a été trouvée";
        }
}else{
    echo "Aucune question n'a été trouvée";
}