<?php


class Student {
    private  $surname;
    private  $name;
 
    function __construct(string $name,string $surname) {
        $this->surname=$surname;
        $this->name=$name;
    }

   //////  Setters  //////

    public function setsurname(string $surname)
    {
      $this->surname=$surname;
    }

    public function setname(string $name)
    {
      $this->name=$name;
    }

    //////  Getters  //////

    public function getsurname() :string
    {
      return $this->surname;
    }

    public function getname() :string
    {
      return $this->name;
    }

   
} 



