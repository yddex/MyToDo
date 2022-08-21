<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
    <style>
        <?=file_get_contents("./view/css/style.css")?>
    </style>
</head>

<body>
    <?php require 'header.php' ?>
    <section class="content content__task center">
        <section class="tasks">
            <h1 class="task__heading">Ваши текущие задачи</h1>
            <?php if (!count($unDoneTasks)) : ?>
                <div class="task__block">
                    <p>Список пуст.</p>
                </div>
            <?php else : ?>
                <?php foreach ($unDoneTasks as $key => $task) : ?>
                    <div class="task__block">
                        <h2 class="task__description">
                            <?= $task->getDescription() ?>
                        </h2>
                        <a class="mark__done" href="?controller=tasks&action[isdone]=<?= $key ?>">
                            Отметить как выполненную
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <form class="form_addtask" method="POST">

            <input type="text" name="action[addtask]" class="input_addtask" autocomplete="off" placeholder="Введите описание задачи..." required/>
            <button type="submit" class="input_addtask submit__addtask">Добавить задачу</button>
        </form>
    </section>
</body>

</html>