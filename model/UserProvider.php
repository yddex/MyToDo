<?php
require_once 'User.php';


class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function getUserByLoginAndPassword(string $login, string $password) :?User
    {
            $statement = $this->pdo->prepare("SELECT * FROM users WHERE login LIKE :login");
            $statement->execute(["login" => $login]);
            $userdata = $statement->fetch();

            if($userdata == false){
                return null;
            }

            if(!password_verify($password, $userdata["password"])){
                return null;
            }

            return new User($userdata["username"], $userdata["login"]);
       
    }

    public function includesLoginInDB(string $login) :bool
    {
        $statement = $this->pdo->prepare("SELECT login FROM users WHERE login = :login");
        $statement->execute(["login" => $login]);
        if($statement->fetch() == false)
        {
            return false;
        }else{
            return true;
        }
    }

    public function registerNewUser(string $username, string $login, string $password) :void
    {
        $passwordHASH = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this->pdo->prepare("INSERT INTO users (username, login, password) VALUES (:username, :login, :password)");
        $statement->execute(["username" => $username, "login" => $login, "password" => $passwordHASH]);
    }

}