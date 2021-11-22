<?php


class ClassStudent extends Model{
    private   $capacity=0;
    private   $listStudents=[];
    private $listGroups=[];
  
    //////  Setters  //////

    public function setStudent($csv) {
      $csvClass=$this->getCsvData($csv);
      $this->capacity=count($csvClass);
      foreach ($csvClass as $v)
      {
        $student =  new Student($v[1],$v[0]);
        array_push($this->listStudents,$student);
      }
      
    }
    
    public function setGroup($groups,$capacity) {
      
      foreach ($groups as $group) {        
          $newGroup= new Group($capacity);
          $newGroup->setStudent($group);
          array_push($this->listGroups,$newGroup);      
    }
      
    }

    public function setCapacity(int $capacity) {
      $this->capacity=$capacity;
    }

    public function setListStudent(array $listStudents) {
      $this->listStudents=$listStudents;
    }

    //////  Getters  //////

    public function getCapacity() :int {
      return $this->capacity;
    }

    public function getListStudent() :array {
      return $this->listStudents;
    }

    public function getGroup() :array {
      return $this->listGroups;
    }

    public function getClass($text) {
      return $text;
    }
} 



