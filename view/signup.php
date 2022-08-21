<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        <?php echo file_get_contents("./view/css/style.css"); ?>
    </style>
</head>

<body>
    <?php require "header.php" ?>
    <section class="content center">
        <form method="POST" class="signup__form">
            <h2 class="signup__heading">Регистрация</h2>
            <?php if (!is_null($error)) : ?>
                <p class="signup__error">*<?= $error ?></p>
            <?php endif; ?>

            <label class="signup__label">
                <h4 class="signup__label_heading">Введите имя:</h4>
                <input type="text" name="username" class="signup__input"
                 autocomplete="off" placeholder="Введите имя"
                  required minlength="2" maxlength="14" title="Длина 2-14 символов">
            </label>

            <label class="signup__label">
                <h4 class="signup__label_heading">Введите логин:</h4>
                <input type="text" name="login" class="signup__input" 
                    autocomplete="off" placeholder="Введите логин"
                 required pattern="[A-Za-z0-9]{4,14}" minlength="4" maxlength="14" title="Только латинские буквы и числа. Длина 4-14 символов">
            </label>

            <label class="signup__label">
                <h4 class="signup__label_heading">Введите пароль:</h4>
                <input type="password" name="password" class="signup__input" autocomplete="off" placeholder="Введите пароль" required>
            </label>

            <label class="signup__label">
                <h4 class="signup__label_heading">Повторите пароль:</h4>
                <input type="password" name="confirmPassword" class="signup__input" autocomplete="off" placeholder="Повторите пароль" required>
            </label>
            <button type="submit" class="signup__input signup__submit">Создать аккаунт</button>
        </form>
    </section>
</body>

</html>