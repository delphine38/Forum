<?php

require('actions/database.php');



if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp'])){

        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['nom']);
        $user_firstname = htmlspecialchars($_POST['prenom']);
        $user_password = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists =$bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount()== 0){
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom,mdp)VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez complétez tous les champs";
        //var_dump($errorMsg);
    }



}

?>