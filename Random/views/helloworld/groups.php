<?php





if($A_vue['groups']){
    
  foreach ($A_vue['groups'] as $group){
      foreach($group->getListStudent() as  $student){
        echo "<p>" ." ".$student->getsurname()." ".$student->getname()."</p>";
      }
    echo "<br></br>";
    
  }
  echo "<br></br>";

}
?>