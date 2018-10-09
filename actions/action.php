<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title><?= $_GET['action'] ?></title>
</head>

<body>
    

<?php
    require '../post.php';

    $current = $_GET['folder'];
    $redirect = str_replace("C:/wamp/www/", "", $current);
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
        // echo 'importer';
        ?>
        <h1 style="text-align: center;">Importer dossier ou fichier</h1>
        <form class="container" action="" method="post" enctype="multipart/form-data" style="text-align: center; width: 350px; margin-top: 100px; margin-bottom: 100px">
           
            <div class="form-group">
                <input type="file" name="folder_upload" id="folder_upload">
            </div>
            
            <button type="submit" name="btn_submit" class="btn btn-primary" id="create_btn" style="float: left;">Importer</button>
            <button type="reset" class="btn btn-danger" id="create_btn" style="float: right;">Annuler</button>
        </form>

        <?php
        if (isset($_POST['btn_submit'])){
    
            $fichier = $_FILES['folder_upload']['name'];
            $taille_max = 2097152;
            $taille = filesize($_FILES['folder_upload']['tmp_name']);
            $extensions = ['.png', '.jpg', '.pdf', '.html', '.css', '.php'];
            $extension = strrchr($fichier, '.');
        
            if (!in_array($extension, $extensions)){
                $error = '<div class="alert">Type de fichier non pris en charge</div>';
            }
            if ($taille > $taille_max){
                $error = '<div class="alert">Fichier trop volumineux : taille max => 2Mo</div>';
            }
            if (!isset($error)){
                $fichier = preg_replace('/([^.a-z0-9]+)/', '.', $fichier);
                move_uploaded_file($_FILES['folder_upload']['tmp_name'], $_GET['folder'] . '/'. $fichier);
                header('Location: ../index.php?folder=' . $redirect);
            } else {
                echo $error;
            }
        }

        
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../public/js/jQuery.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>

</body>
</html>