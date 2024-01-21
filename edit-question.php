<?php 

require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php');

?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/head.php');  ?>
<body>

<?php include('includes/navbar.php');  ?>
<br><br>

<div class="container">
    <?php if(isset($errorMsg)){echo '<p>' .$errorMsg.'</p>';}?>

    <!-- si la date est bien présente alors tu affiches le formulaire  -->
    <?php if(isset($question_content)){?>
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de votre question</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $question_title; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description de votre question</label>
                    <!--<penser à mettre un textarea pour que l'user puisse mettre beaucoup de lettre, c'est un type= text par defaut>-->
                    <textarea class="form-control" name="description" ><?php echo $question_description; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de votre question</label>
                    <!--<penser à mettre un textarea pour que l'user puisse mettre beaucoup de lettre, c'est un type= text par defaut>-->
                    <textarea type="text" class="form-control" name="content"> <?php echo $question_content; ?></textarea>
                </div>
                
                
                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
                

        
            </form>

    <?php } ?>


    
</div>
    
</body>
</html>