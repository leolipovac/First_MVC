<?php

class Group {

    private $capacity;
    private $listStudents =[];

    function __construct( int $capacity) {
       $this->capacity=$capacity;
    }


    public function setStudent($students)
    {
        
        foreach ($students as $student)
      {
        array_push($this->listStudents,$student);
      }
      
    }

    public function getListStudent() :array
    {
      return $this->listStudents;
    }
    
}