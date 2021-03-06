<?php
# init
require("assets/php/mongodb-check.php");
require("ini/inc.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MongoDB and PHP</title>
    <style>
        .name {
            display: inline-block;
            min-width: 100px;
        }
    </style>
</head>

<body>
    <main>
        <h1>MongoDB and PHP</h1>
        <?php
        require("view/check-collection.php");
        #require("view/get-collection.php");
        #require("view/set-collection.php");
        ?>
    </main>
</body>

</html>