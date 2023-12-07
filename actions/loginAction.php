<?php
//création de système de connexion
require ('actions/database.php');


//validation du formulaire
if(isset($_POST['validate'])){

    //vérifier si user à compléter tout les champs
   // if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

        //les données que l'user entre
        $user_pseudo = htmlspecialchars($_POST['pseudo']);

        // on ne veut pas cripté le message de l'utilisateur avec "password_hash", car on ne veut pas l'insérer sur le site
        //on veut juste vérifier si le MDP qui à été saisi correspond au MDP cripté en bdd
        $user_password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);

        //verifier si l'user possede le user en bdd
        //SELECT tout de la table users dans pseudo
        $checkIsUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIsUserExists->execute(array($user_pseudo));

        //on appel la METHOD rowCount de l'objet PDO statment
        //si c'est superieur à zéro = si utilisateur à bien été récuper
        if($checkIsUserExists->rowCount() > 0){
            //--*** on crée une variable qui va correspondre = FETCH() permet de récupérer toute les données sous forme de tableau
            $userInfos = $checkIsUserExists->fetch();


            //on vérifie le mot de pass mi par l'utilisateur par rapport au mdp crypté.
            //mais comment on récupére le mdp crypté ? 
            if(password_verify($user_password, $userInfos['mdp'])){
                //ca correspond, on affiche le code
            }else{
                $errorMsg = "Votre mot de passe est incorrect";
   
            }

            }else{
                $errorMsg = "Votre pseudo est incorrect";
    
            }


        //}else{
            //$errorMsg = "L'utilisateur existe déjà sur le site";
            //redirige l'user vers la page d'acceuil
           // header('location:index.php');
       // }

    }else{
        $errorMsg = "Veuillez complétez tous les champs";
        //var_dump($errorMsg);
    }
}