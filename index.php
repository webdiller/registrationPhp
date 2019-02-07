<?php
    require "db.php";
    // Check connection
    // if(!R::testConnection()) {
    //     die('No DB Connection');
    // }
    // echo 'OK!';
?>
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


    <div class="wrapper">
    <?php if( isset($_SESSION['logged_user']) ) : ?> 
    Авторизован <br>
    Привет, <?php echo $_SESSION['logged_user']->login; ?>!
    <a style="display: block; text-align: center;" href="logout.php">Выйти</a>
    <?php else : ?>
        <a href="/login.php">Авторизоваться</a>
        <a href="/signup.php">Зарегистрироваться</a>
    </div>
    <?php endif; ?>
    
</body>
</html>