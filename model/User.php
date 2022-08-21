<?php
class User
{
    private string $username;
    private string $login;

    function __construct(string $username, string $login)
    {
        $this->username = $username;
        $this->login = $login;
    }

    //username
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getLogin() :string
    {
        return $this->login;
    }

}
