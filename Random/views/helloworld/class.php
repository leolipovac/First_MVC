<?php


if($A_vue['class']){
  echo "<br></br>Voici le csv : <br></br>";
  foreach ($A_vue['class'] as $student){
    echo "<p>" .$student->getsurname()." ".$student->getname()."</p>";
  }
}
echo "<br></br><br></br> Voici les groupe : <br></br><br></br>";
?>






