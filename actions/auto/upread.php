<?php
//Selectionner le livre du jour
/*
Algo :
selectionner les 10 derniers livres lus et prendre un des lecteurs au hasard

*/

include('../../include/bdd.php');
$SearchB = $bdd->prepare('SELECT * FROM yape_books ORDER BY id DESC LIMIT 10');
$SearchB->execute(array());

$nb = rand(0, 9);

$x = 0;
while($data = $SearchB->fetch()){
  
  if($x == $nb){
    $id_perso = $data['user_id_from'];
    $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
    $up->execute(array(
      'id' => $id_perso,
      'thisid' => 3
    ));
  }
  $x++;
}



 ?>
