<?php
    require "db.php";
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

    <?php
        $data = $_POST;

        if(isset($data['do_login'])){
            // здесь логинимся
            $errors = array();
            $user = R::findOne('users', 'login = ?', array($data['login']));
            if($user)
            {
                // логин существует
                if(password_verify($data['password'], $user->password)) 
                {
                    // Все хорошо
                    $_SESSION['logged_user'] = $user;
                    echo 
                    '<div style="color: green; text-align: center;">Успех!</div></br>
                    <a style="display: block; text-align: center;" href="index.php">На главную</a>';
                } else 
                {
                    $errors[] = 'Неверно введен пароль!';
                }
            } else 
            {
                $errors[] = 'Пользователь с таким логином не найден!';
            }

            if(! empty($errors)) 
            {
                echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div>';
            }

        }



    ?>

    <form class="wrapper2" action="login.php" method="POST">
        <p>
            <p><strong>Логин:</strong></p>
            <input type="text" name="login" value="<?php echo @$data['login']; ?>">
        </p>

        <p>
            <p><strong>Пароль:</strong></p>
            <input type="password" name="password" value="<?php echo @$data['password']; ?>">
        </p>
        <p>
            <button type="submit" name="do_login">Авторизоваться</button>
        </p>
    </form>

    
</body>
</html>