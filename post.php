<?php

/**
 * show folders and files
 */
function show_folders() {
    $folder = "";
    if(isset($_GET['folder'])) {
        $folder = "C:/wamp/www/" . $_GET['folder'] . "/";
    }
    else {
        $folder = "C:/wamp/www/";
    }

    test($folder);                    
}

function test($folder_path) {
    if($dossier = opendir($folder_path)) {
        ?>

        <div style="width: 100%; background-color: #c1f8f5; margin-bottom: 10px">
            <?= $folder_path ?>
        </div>

        <?php
        

        while(false !== $fichier = readdir($dossier)) {
            if($fichier != '.' && $fichier != "..") {
                if(is_dir($folder_path . '' . $fichier)) {
                    if(isset($_GET['folder'])) {
                        ?>
                        <div class="col-md-2 file_zone">
                            <a href="index.php?folder=<?= $_GET['folder']  . '/' . $fichier ?>" class="folder_style">
                                <img src="public/images/icone_dossier.png" alt="" width="30" height="30">
                                <p style="font-size: 14px;"><?= $fichier ?></p>
                            </a>
                        </div>
                        <?php
                    }

                    else {
                        ?>
                        <div class="col-md-2 file_zone">
                            <a href="index.php?folder=<?= $fichier ?>">
                                <img src="public/images/icone_dossier.png" alt="" width="30" height="30">
                                <p style="font-size: 14px;"><?= $fichier ?></p>
                            </a>
                        </div>
                        <?php
                    }
                }
                else {
                    ?>
                        <div class="col-md-2 file_zone">
                            <img src="public/images/file.png" alt="" width="40" height="40">
                            <p style="font-size: 14px;"><?= $fichier ?></p>
                        </div>
                    <?php  
                    //echo '<li>"' . $fichier . '"</li>';
                }
            }
        }
        closedir($dossier);
    }
}


/**
 * create new folder
 * @param string folder name
 */
function create_folder($folderName) {
    if(!file_exists($folder + $folderName)) {
        mkdir($folder + $folderName, 0777, true);
    }
    else {
        echo 'file already exist';
    }
}


?>