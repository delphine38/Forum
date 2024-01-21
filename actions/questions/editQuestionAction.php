<?php
//session_start();

require('actions/database.php');


//verifie si l'user clic sur un bouton

if(isset($_POST['validate'])){
    //vérifie si les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));


        //faire la requète de motdification avec update
        //veut dire : mettre à jour la table question, met à jour : titre, description et contenu qui possède l'identifiant en ?
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite ->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

        //redirection vers la page des questions
        
        header('Location: my-questions.php');
    }else{

        $errorMsg = 'Veuillez compléter tous les champs';
    }
}