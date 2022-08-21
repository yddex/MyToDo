<?php
require_once 'Task.php';

class TaskRepository
{
    private PDO $pdo;
    function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    private function getUserTasksTableName(User $user) :string
    {
        return $user->getLogin() . "tasks";
    }

    public function getUndoneList(User $user) :array
    {   
        $undonelist = [];
        $taskstable = $this->getUserTasksTableName($user);

        $statement = $this->pdo->query("SELECT * FROM $taskstable WHERE isDone = 0");
        while($statement && $task = $statement->fetchObject(Task::class))
        {
            $undonelist[] = $task;
        }
        return $undonelist;
    }

    public function addTask(string $description, User $user) :void
    {
        $taskstable = $this->getUserTasksTableName($user);
        $statement = $this->pdo->prepare("INSERT INTO $taskstable (description, isDone) VALUES (:description, :isDone)");
        $statement->execute(["description" => $description, "isDone" => 0]);
    }

    public function updateTaskIsDone(Task $task, User $user) :void
    {
        $taskstable = $this->getUserTasksTableName($user);
        $taskid = $task->getId();
        $statement = $this->pdo->prepare("UPDATE $taskstable SET isDone = 1 WHERE id = $taskid");
        $statement->execute();
    }

    public function createTableForNewUser(User $user) :void
    {
        $taskstablename = $this->getUserTasksTableName($user);

        $statement = $this->pdo->prepare("CREATE TABLE $taskstablename (
            id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
            description VARCHAR(150) NOT NULL,
            isDone BOOLEAN NOT NULL
          )");

          $statement->execute();
        
    }

}
