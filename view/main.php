<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <style>
        <?php echo file_get_contents("./view/css/style.css"); ?>  
    </style>
</head>
<body>
    <?php require 'header.php'?>
    <section class="content center">
    <?php if(isset($_SESSION['user'])): ?>
    <h1 class="main__heading">
            Добро пожаловать,
            <?=$_SESSION['user']->getUsername()?>!
    </h1>
    <?php else: ?>
        <h1 class="main__heading">
            Добро пожаловать! <br/> Для использования сервиса <a href="?controller=login">войдите</a> в систему! <br/>
            Нет аккаунта? <a href="?controller=signup">зарегистрируйтесь</a>!
        </h1>
    <?php endif; ?>
    </section>
</body>
</html>