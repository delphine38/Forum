<?php require ('actions/loginAction.php');  ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>

<body>
    <br><br>
    <form class="container" method="POST">


    <?php if(isset($errorMsg)){echo '<p>' .$errorMsg.'</p>';}?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de votre question</label>
            <input type="text" class="form-control" name="title" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description de votre question</label>
            <!--<penser à mettre un textarea pour que l'user puisse mettre beaucoup de lettre, c'est un type= text par defaut>-->
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de votre question</label>
            <!--<penser à mettre un textarea pour que l'user puisse mettre beaucoup de lettre, c'est un type= text par defaut>-->
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>
        
        
        <button type="submit" class="btn btn-primary" name="validate">Publier votre question</button>
        

        
    </form>
    
</body>
</html>