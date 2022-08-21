<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <style>
        <?php echo file_get_contents("./view/css/style.css"); ?>
    </style>
</head>

<body>
    <?php require "header.php" ?>
    <section class="content center">
        <form method="POST" class="auth__form">
            <h2 class="auth__heading">Вход</h2>
            <?php if (!is_null($error)) : ?>
                <p class="auth__error">*<?= $error ?></p>
            <?php endif; ?>
            <label class="auth__label">
                <h4 class="auth__label_heading">Логин:</h4>
                <input type="text" name="login" class="auth__input" autocomplete="off" placeholder="Введите логин" required>
            </label>
            <label class="auth__label">
                <h4 class="auth__label_heading">Пароль:</h4>
                <input type="password" name="password" class="auth__input" autocomplete="off" placeholder="Введите пароль" required>
            </label>
            <button type="submit" class="auth__input auth__submit">Вход</button>
        </form>
    </section>
</body>

</html>