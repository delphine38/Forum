<?php

require ('actions/database.php');

if(isset($_POST['validate'])){
    //si tout ces champs ne sont pas vide -> !empty = champs sont rempli
    if(!empty($_POST['title'])AND !empty($_POST['description']) AND !empty($_POST['content'])){
        //code
        $question_title = htmlspecialchars($_POST['title']);
        $question_description =nl2br( htmlspecialchars($_POST['description']));
        $question_content =nl2br( htmlspecialchars($_POST['content']));
        $question_date = ('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        //insérer la question sur le site
        $insertQuestionInWebsite = $bdd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES(?,?,?,?,?,?) ');
        $insertQuestionInWebsite->execute(
            array(
                $question_title,
                $question_description,
                $question_content,
                $question_id_author,
                $question_pseudo_author,
                $question_date
            ));

            $succesMsg = "Votre question à bien été publiée sur le site";


    }else{
        $errorMsg = "Merci de compléter tout les champs";
    }
}