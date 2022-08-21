<header class="header center">
    <nav class="nav">
        <a href="?controller=index" class="nav__link">Главная</a>
        <?php if(isset($_SESSION['user'])): ?>
        <a href="?controller=tasks" class="nav__link">Задачи</a>
        <?php endif; ?>
    </nav>
    <nav class="nav nav_auth">
        <?php if(!isset($_SESSION['user'])): ?>
        <a href="?controller=login" class="nav__link nav__link_auth">Войти</a>
        <a href="?controller=signup" class="nav__link nav__link_auth">Регистрация</a>
        <?php else: ?>
        <h1 class="welcome_user"><?=$_SESSION['user']->getUsername()?></h1>
        <a href="?action=logout" class="nav__link nav__link_auth">Выйти</a>
        <?php endif; ?>
    </nav>
</header>