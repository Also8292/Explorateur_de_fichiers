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
    
    <style>
        td a {
            display: inline-block;
        }
    </style>

</head>
<body style="width: 100%; height: 100%">
    <div class="container">
        <table style="width: 100%" class="table table-striped table-hover">
            <tr>
                <th>Nom</th>
                <th width="320">Action</th>
             </tr>
            <?php

                require_once 'post.php';
                show_folders("C:/wamp/www/");

            ?>
        </table>

    </div>  

    <!-- script files -->
    <script src="public/js/jQuery.js"></script>

</body>
</html>