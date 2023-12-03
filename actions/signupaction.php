<?php

require('actions/database.php');


//validation du formulaire
if(isset($_POST['validate'])){

    //vérifier si user à compléter tout les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp'])){

        //les données que l'user entre
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['nom']);
        $user_firstname = htmlspecialchars($_POST['prenom']);
        $user_password = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        //vérification si l'user existe déjà en bdd
        $checkIfUserAlreadyExists =$bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount()== 0){

            //inséser les données user dans bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom,mdp)VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            //récuperer les informations de user
            $getInfosOfUserReq = $bdd->prepare('SELECT id, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfosOfUserReq = execute(array($user_lastname, $user_firstname, $user_pseudo));

            //récuperer les données de l'user et les stockées dans un tableau
            $userInfos = $getInfosOfUserReq->fetch();

            //authentifier l'utilisateur dans des variables globales SESSIONS
                
            $_SESSION['auth'] = true; 
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            //redirige l'user vers la page d'acceuil
            header("Location: index.php");
            die();


        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez complétez tous les champs";
        //var_dump($errorMsg);
    }



}

?>