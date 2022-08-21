<?php


class Task
{
    private int $id;
    private string $description;
    private bool | int $isDone;


    // function __construct(string $description)
    // {
    //     $this->description = $description;
    //     $this->isDone = false;
      
    // }

    
    public function getId() :int
    {
        return $this->id;
    }

    //description
    public function getDescription(): string
    {
        return $this->description;
    }
 
    //isDone
    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function markAsDone(): void
    {
        $this->isDone = true;
    }

    
}
