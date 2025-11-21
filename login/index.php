<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>login</title>
</head>
<body>
    <?php

        if(empty($_SERVER['QUERY_STRING'])) {
            $principal = 'form-login';
            include_once "$principal.php";
        } else {
            $pg = $_GET['pg'];
            include_once "$pg.php";
        }

    ?>
</body>
</html>