<?php

class ControleurClass
{
    private $O_class;

    public function __construct() {
      $this->O_class= new ClassStudent();
    }


   public function default()  {
      if (isset($_POST["upload_csv"])) {
          $err = $this->displayClass();
          if ($err) {
              Vue::display('helloworld/class', array('class' =>  null,'err'=>$err));
          } else {
            $capacity = filter_var((int)$_POST["randomizator"], FILTER_VALIDATE_INT) ?  (int)$_POST["randomizator"] : null;

            if ($capacity = 0){
               
               $err = 'Entrez un nombre de groupes';
               Vue::display('helloworld/class', array('class' =>  null,'error'=>$err));
               exit;
            }
            else{
               $this->randomizator((int)$_POST["randomizator"]);
              
               Vue::display('helloworld/class', array('class' => $this->O_class->getClass($this->O_class->getListStudent()),'err'=>$err));
               Vue::display('helloworld/groups', array('groups' => $this->O_class->getClass($this->O_class->getGroup()),'err'=>$err));
            }
           
          }
      }
   }

   

   public function displayClass() {
      $err = '';

      if($_FILES['file']['name'])
         {
            $file_array = explode(".", $_FILES['file']['name']);
            $extension = end($file_array);
            
            if($extension == 'csv')
            {
               
               
               $this->O_class->setStudent($_FILES['file']['tmp_name']);
               $err=null;
               return $err;
            }
            else
            {
               $err = 'Seul ce type de fichier ( <b>.csv</b> ) est autorisé.';
               return $err;
               
            }
         }
   }



   public function randomizator(int $nbMax=3){
       {
         $studentArr = (array)$this->O_class->getClass($this->O_class->getListStudent());
         shuffle($studentArr); 
         $groupes = array_chunk($studentArr, $nbMax);
         $this->O_class->setGroup($groupes,$nbMax);
   }
   } 

}

