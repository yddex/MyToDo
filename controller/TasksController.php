<?php 


$pdo = require_once('./db/db.php');
$TaskRepository = new TaskRepository($pdo);
$user = $_SESSION["user"];

$_SESSION["tasks"]["undone"] = $TaskRepository->getUndoneList($user);


if(isset($_REQUEST["action"]["addtask"]) && !empty($_REQUEST["action"]["addtask"]))
{
    $description = htmlentities(strip_tags($_REQUEST["action"]["addtask"]));
    $TaskRepository->addTask($description, $user);
    
    header("Location: /?controller=tasks");
    die();
}

if(isset($_REQUEST["action"]["isdone"]))
{
    $taskIndex = (int)$_REQUEST["action"]["isdone"];
    $task = $_SESSION["tasks"]["undone"][$taskIndex];
    if($task){
        $TaskRepository->updateTaskIsDone($task, $user);
    }

    header("Location: /?controller=tasks");
    die();
}


$unDoneTasks = $_SESSION["tasks"]["undone"] ?? [];


require './view/tasks.php';
