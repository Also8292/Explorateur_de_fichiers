<?php

/**
 * show folders and files
 */
function show_folders($root_folder) {
    $folder = "";
    if(isset($_GET['folder'])) {
        $folder = $root_folder . '' . $_GET['folder'] . "/";
    }
    else {
        $folder = $root_folder;
    }

    test($folder, $root_folder);                    
}

function test($folder_path, $root_folder) {
    if($dossier = opendir($folder_path)) {
        ?>

        <div style="width: 100%; background-color: #c1f8f5; margin-bottom: 10px">
            <?php
            
                if($folder_path == $root_folder) {
                    echo 'root/';
                }
                else {
                    echo str_replace($root_folder,"root/", $folder_path);
                }

            ?>
        </div>

        <?php
        

        while(false !== $fichier = readdir($dossier)) {
            if($fichier != '.' && $fichier != "..") {
                ?>

                <tr style="width: 100%">

                <?php
                if(is_dir($folder_path . '' . $fichier)) {
                    if(isset($_GET['folder'])) {
                        ?>
                        <td class="file_zone">
                            <a href="index.php?folder=<?= $_GET['folder']  . '/' . $fichier ?>" class="folder_style">
                                <img src="public/images/icone_dossier.png" alt="" width="30" height="30">
                                <p style="font-size: 14px;"><?= $fichier ?></p>
                            </a>
                        </td>
                        <td class="action_btn">
                            <!--<a href="actions/action.php?action=editer" title="Editer">
                                <img src="public/images/edit.png" alt="" width="30" height="30">
                            </a>-->
                            <a href="actions/action.php?action=renommer" title="Renommer">
                                <img src="public/images/rename.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=copier" title="Copier">
                                <img src="public/images/copy.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=supprimer" title="Supprimer">
                                <img src="public/images/delete.png" alt="" width="30" height="30">
                            </a>
                        </td>
                        <?php
                    }

                    else {
                        ?>
                            <td>
                                <a href="index.php?folder=<?= $fichier ?>">
                                    <img src="public/images/icone_dossier.png" alt="" width="30" height="30">
                                    <p style="font-size: 14px;"><?= $fichier ?></p>
                                </a>
                            </td>
                            <td class="action_btn">
                            <!--
                                <a href="actions/action.php?action=editer" title="Editer">
                                    <img src="public/images/edit.png" alt="" width="30" height="30">
                                </a>
                                -->
                                <a href="actions/action.php?action=renommer" title="Renommer">
                                    <img src="public/images/rename.png" alt="" width="30" height="30">
                                </a>
                                <a href="actions/action.php?action=copier" title="Copier">
                                    <img src="public/images/copy.png" alt="" width="30" height="30">
                                </a>
                                <a href="actions/action.php?action=supprimer" title="Supprimer">
                                    <img src="public/images/delete.png" alt="" width="30" height="30">
                                </a>
                            </td>
                        <?php
                    }
                }
                else {
                    ?>
                        <td>
                            <img src="public/images/file.png" alt="" width="40" height="40">
                            <p style="font-size: 14px;"><?= $fichier ?></p>
                        </td>
                        <td class="action_btn">
                            <a href="actions/action.php?action=editer" title="Editer">
                                <img src="public/images/edit.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=renommer" title="Renommer">
                                <img src="public/images/rename.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=copier" title="Copier">
                                <img src="public/images/copy.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=supprimer" title="Supprimer">
                                <img src="public/images/delete.png" alt="" width="30" height="30">
                            </a>
                        </td>
                    <?php  
                    //echo '<li>"' . $fichier . '"</li>';
                }
                ?>

                </tr>
                
                <?php
                
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