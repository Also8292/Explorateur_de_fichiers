<?php
 require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>FILE EXPLORER</title>
    
</head>
<body>
    <div class="container-fluid">
        <div class="cadre">
            <div class="row">
                <div class="col-md-1">
                    <a href="" >
                        <img src="public/images/retou.jpg" width="50" height="50" alt="">
                    </a>
                </div>
                <div class="col-md-5 col-md-offset-2"></div>
                <div class="col-md-1">
                    <a href="">
                        <img src="public/images/sup.jpg" width="50" height="50" alt="">
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="">
                        <img src="public/images/new fi.png" width="50" height="50" alt="">
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="">
                        <img src="public/images/new folder.jpg" width="50" height="50" alt="">
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="">
                        <img src="public/images/tele.png" width="50" height="50" alt="">
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="">
                        <img src="public/images/up.jpg" width="50" height="50" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="cadre1"> 
            <div class="row">
                <div class="col-md-1"> 
                    <?php
                        require_once 'post.php';
                        show_folders();
                        
                        $nom = "ALSO";
                    ?>
                    
                    {{ nom }}

                </div>
                <div class="col-md-2" id="trait"></div>
                <div class="col-md-8"> 
                    <img src="public/images/dossier.jpg" width="50" height="50" alt="">
                </div>
            </div>
        </div>
    </div>  

    <!-- script files -->
    <script src="JS/boostrap.min.js"></script>
    <script src="JS/jQuery.js"></script>

</body>
</html>