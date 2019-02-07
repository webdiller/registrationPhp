<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Регистрация</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
    require "db.php";

    $data = $_POST;
    if(isset($data['do_signup'])){
        // здесь регистрируем
        $errors = array();
        if(trim($data['login']) == '') {
            $errors[] = 'Введите логин';
        } 
        if(trim($data['email']) == '') {
            $errors[] = 'Введите email';
        } 
        if( $data['password'] == '') {
            $errors[] = 'Введите пароль';
        } 
        if( $data['password_2'] != $data['password'] ) {
            $errors[] = 'Повторный пароль введен не верно';
        }
        if(empty($errors)) {
            // все хорошо можно регать
            $user           = R::dispense( 'users' );
            $user->login    = $data['login'];
            $user->email    = $data['email'];
            $user->password = $data['password'];
            R:: store($user);
            echo '<div style="color: green; text-align: center;">Вы успешно зарегистрированны</div>';
        } else {
            echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div>';
        }
        
    }
?>

<form class="wrapper2" action="/signup.php" method="POST">
    <p>
        <p><strong>Ваш логин:</strong></p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p><strong>Ваш email:</strong></p>
        <input type="email" name="email" value="<?php echo @$data['email']; ?>">
    </p>

    <p>
        <p><strong>Ваш пароль:</strong></p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <p><strong>Ваш пароль еще раз:</strong></p>
        <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
    </p>

    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
</form>


</body>
</html>