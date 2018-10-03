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


/**
 * create new folder
 * @param string folder name
 */
function create_folder($folderName) {
    if(!file_exists($folder + $folderName)) {
        mkdir($folder + $folderName, 0777, true);
    }
    else {
        echo 'file (' . dirname($folder + $folderName) . ') exist';
    }
}

?>