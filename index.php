<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>FILE EXPLORER</title>
    
</head>
<body>
    <div class="container-fluid">
        <div class="cadre">
        <div class="row">
            <div class="col-md-1">
                <a href="" >
                <img src="images/retou.jpg" width="50" height="50" alt="">
                </a>
            </div>
            <div class="col-md-5 col-md-offset-2"></div>
    
            <div class="col-md-1">
            <a href="">
                <img src="images/sup.jpg" width="50" height="50" alt="">
                </a>
            </div>
            <div class="col-md-1">
            <a href="">
                <img src="images/new fi.png" width="50" height="50" alt="">
                </a>
            </div>
            <div class="col-md-1">
            <a href="">
                <img src="images/new folder.jpg" width="50" height="50" alt="">
                </a>
            </div>
            <div class="col-md-1">
            <a href="">
                <img src="images/tele.png" width="50" height="50" alt="">
                </a>
            </div>
            <div class="col-md-1">
            <a href="">
                <img src="images/up.jpg" width="50" height="50" alt="">
                </a>
            </div>

   
        </div>


</div>
        <div class="cadre1"> 
            <div class="row">
                <div class="col-md-1"> 
                    
                <?php
                    $folder = "";
                    if(isset($_GET['folder'])) {
                        $folder = "C:/wamp/www/" . $_GET['folder'] . "/";
                    }
                    else {
                        $folder = "C:/wamp/www/";
                    }
                    test($folder);
                    function test($folder_path) {
                        echo '<ul>';
                        if($dossier = opendir($folder_path)) {
                            while(false !== $fichier = readdir($dossier)) {
                                if($fichier != '.' && $fichier != "..") {
                                    if(isset($_GET['folder'])) {
                                        echo '<li><a href="index.php?folder=' . $_GET['folder'] . '/' . $fichier . '">' . $fichier . '</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="index.php?folder='. $fichier .'">' . $fichier . '</a></li>';
                                    }
                                }
                            }
                            closedir($dossier);
                        }
                        echo '</ul>';
                    }
                ?>

                </div>
                <div class="col-md-2" id="trait"></div>

                  <div class="col-md-8"> 
                  <img src="images/dossier.jpg" width="50" height="50" alt="">
                </div>
                
                </div>

            </div>


    </div>
    


<script src="JS/boostrap.min.js"></script>
<script src="JS/jQuery.js"></script>
</body>
</html>