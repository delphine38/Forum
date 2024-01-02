<?php
session_start();

require('actions/database.php');

//require('actions/user/securityAction.php'); 
require('actions/questions/myQuestionsAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<?php 
include('includes/head.php');
?>
<body>
    <?php 
include('includes/navbar.php');
?>
<br><br>
<div class="container">

<?php

    //$getAllQuestions

    //faire une bouche pour récupérer une par une chaque données
    //method fetch pour récuperer chaque données
    while($question = $getAllQuestions->fetch()){
        ?>
            <div class="card">
                <div class="card-header">
                    <h3><?php echo $question['titre']; ?></h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $question['description']; ?>
                    </p>
                    <a href="edit-question.php?id=<?php $question['id']; ?>" class="btn btn-primary">Accéder à la question</a>
                   <!-- <a href="#" class="btn btn-warning">Modifier la question</a>-->
                   <a href="actions/questions/deleteQuestionAction.php?id=<?php $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                </div>
            </div>
            <br>

        <?php

    }

?>
</div>
    
</body>
</html>