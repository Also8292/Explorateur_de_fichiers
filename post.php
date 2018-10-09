<?php

/**
 * root folder path
 */
function root_folder_path() {
    return "C:/wamp/www/";
}

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

    show_file_function($folder, $root_folder);                    
}

function show_file_function($folder_path, $root_folder) {
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
                            <a href="actions/action.php?action=telecharger&folder=<?= $folder_path . '' . $fichier ?>" title="telecharger">
                                <img src="public/images/download.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=renommer&folder=" title="Renommer">
                                <img src="public/images/rename.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=copier&folder=" title="Copier">
                                <img src="public/images/copy.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=supprimer&folder=" title="Supprimer">
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
                                <a href="actions/action.php?action=telecharger&folder=<?= $folder_path . '' . $fichier ?>" title="telecharger">
                                    <img src="public/images/download.png" alt="" width="30" height="30">
                                </a>
                                <a href="actions/action.php?action=renommer&folder=" title="Renommer">
                                    <img src="public/images/rename.png" alt="" width="30" height="30">
                                </a>
                                <a href="actions/action.php?action=copier&folder=" title="Copier">
                                    <img src="public/images/copy.png" alt="" width="30" height="30">
                                </a>
                                <a href="actions/action.php?action=supprimer&folder=" title="Supprimer">
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
                            <a href="actions/action.php?action=telecharger&folder=<?= $folder_path . '' . $fichier ?>" title="telecharger">
                                <img src="public/images/download.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=renommer&folder=" title="Renommer">
                                <img src="public/images/rename.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=copier&folder=" title="Copier">
                                <img src="public/images/copy.png" alt="" width="30" height="30">
                            </a>
                            <a href="actions/action.php?action=supprimer&folder=" title="Supprimer">
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
    if(!file_exists($folderName)) {
        mkdir($folderName, 0777, true);
        echo 'congratulation';
    }
    else {
        echo 'file already exist';
    }
}


/**
 * get parent folder url
 * @param string current url
 * @return string parent folder url
 */
function back_url($current_url) {
 
        $pos = strrpos($current_url, "/");
        $current_folder = substr($current_url, $pos);
        $parent_folder_url = str_replace($current_folder, "", $current_url);

        return $parent_folder_url;
}



function verify_folder($folder) {
    if($folder != 'root') {
        return true;
    }
    else {
        return false;
    }
}



/**
 * download function
 * @param string folder or file path
 */

function download($dir) {

    if(is_dir($dir)) {
        $zip_file = 'file.zip';

        // Get real path for our folder
        $rootPath = realpath($dir);

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();


        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($zip_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        readfile($zip_file);
    }

    else if(is_file($dir)) {

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($dir));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($dir));
        ob_clean();
        ob_end_flush();
        readfile($dir);
    }
}

?>