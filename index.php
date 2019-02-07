<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

    <?php
        require "db.php";
        if(!R::testConnection()) {
            die('No DB Connection');
        }
        echo 'OK!';
    ?>

    <div class="wrapper">
        <a href="/login.php">Авторизоваться</a>
        <a href="/signup.php">Зарегистрироваться</a>
    </div>
    
</body>
</html>