<?php

require('actions/database.php');

//vérification de récupération de l'id AND verification de si id n'est pas vide
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //vérifie si question exist
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() >0){

        //pour récupérer toute les données de cette requète
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_auteur'] == $_SESSION['id']){
            //execute le code
            //déclarer le titre
            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];
            $question_date = $questionInfos['date_publication'];

            //cette fonction str_replace à pour but de remplace la variable par l'occurence souhaité
            /*str_replace(array|string $search,array|string $replace,string|array $subject,int &$count = null
): string|array*/
            $question_description = str_replace('<br />','',$question_description);
            $question_content = str_replace('<br />','',$question_content);
                    }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }

    }else{
            $errorMsg = "Aucune question trouvée";

    }
}else{
    $errorMsg = "pas de question trouvée";
}
