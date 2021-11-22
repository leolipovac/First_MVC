<?php

class ControleurClass
{
    private $O_class;

    public function __construct() {
      $this->O_class= new ClassStudent();
    }


   public function default()  {
      $nb=1;
      if (isset($_POST["randomizator"])){
         $nb = $_POST["randomizator"];
      }
      if($nb <= 0){
         $nb=1;
      }
      if (isset($_POST["upload_csv"])) {
          $err = $this->displayClass();
          if ($err) {
              Vue::display('helloworld/class', array('class' =>  null,'err'=>$err));
          } else {
            $capacity = filter_var($nb, FILTER_VALIDATE_INT) ?  $nb : null;

            if ($capacity = 0){
               
               $err = 'Entrez un nombre de groupes';
               Vue::display('helloworld/class', array('class' =>  null,'error'=>$err));
               exit;
            }
            else{
               $this->randomizator($nb);
              
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



   public function randomizator(int $nbMax){
       
         $studentArr = (array)$this->O_class->getClass($this->O_class->getListStudent());
         shuffle($studentArr); 
         $groupes = array_chunk($studentArr, $nbMax);
         $groupes = $this->equals($groupes,$nbMax);
         $this->O_class->setGroup($groupes,$nbMax);
   
   } 


   public function equals(array $A_groupes, int $I_nbMax): array
   {
       $I_nbGroupe = count($A_groupes)-1;

       if (count($A_groupes[$I_nbGroupe]) == $I_nbMax  ||  count($A_groupes[$I_nbGroupe-1]) <= $I_nbMax-1 || count($A_groupes[$I_nbGroupe]) == $I_nbMax-1)
       {
           return $A_groupes;
       }
       else{
           while (count($A_groupes[$I_nbGroupe]) < count($A_groupes[$I_nbGroupe-1]))
           {
               $last = array_pop($A_groupes[$I_nbGroupe-1]);
               array_push($A_groupes[$I_nbGroupe], $last);
               $this->equals($A_groupes, $I_nbMax);
           }
           return $A_groupes;
       }

     }


}
