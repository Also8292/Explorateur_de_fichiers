<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Nouveau dossier</title>
</head>



<?php
    require '../post.php';

    $current = $_GET['folder'];
    $back = "";
    if(isset($_POST['name_folder'])) {
        $back = str_replace("C:/wamp/www/", "", back_url($current . '/' . $_POST['name_folder']));
        
    }
    else {
        $back = str_replace("C:/wamp/www/", "", $current);
    }
    ?>
    <a href="../index.php?folder=<?= $back ?>">
        <img src="../public/images/back.png" alt="retour" width="30" height="30">
    </a>
    <?php
    $action = $_GET['action'];

    if($action == 'creer_dossier') {
        $current_folder = $_GET['folder'];
        
        ?>
        <h1 style="text-align: center;">Nouveau dossier</h1>
        <form class="container" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" style="text-align: center; width: 350px; margin-top: 100px">
           
            <div class="form-group">
                <input type="text" name="name_folder" class="form-control" id="exampleInputEmail1" placeholder="Nom">
                <small id="emailHelp" class="form-text text-muted">Entrez ici le nom du dossier</small>
            </div>
            
            <button type="submit" class="btn btn-primary" id="create_btn" style="float: left;">Valider</button>
            <button type="reset" class="btn btn-danger" id="create_btn" style="float: right;">Annuler</button>
        </form>

        <?php
        if(isset($_POST['name_folder'])) {

            create_folder($current_folder . '/' . $_POST['name_folder']);

           // echo '<br>';

            $back_url = str_replace("C:/wamp/www/", "", back_url($current_folder . '/' . $_POST['name_folder']));

            header('Location: ../index.php?folder=' . $back_url);
            
        }
    }
    else if($action == 'editer') {
        echo $_GET['action'];
    }

    else if($action == 'importer') {
        echo 'importer';
    }

    else if($action == 'renommer') {
        echo 'renommer';
    }

    else if($action == 'copier') {
        
    }

    else if($action == 'supprimer') {
        ?>
        
        <script>
            var x = confirm('Voulez-vous vraiment supprimer ce fichier');
            if(x) {
                alert('Le fichier a été supprimé') ; 
            }
            else {
                alert('Annuler');
            }
        </script>
        
        <?php
    }

    else if($action == 'editer') {
        
    }
    else {

    }
    
?>

