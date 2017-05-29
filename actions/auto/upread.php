<?php
//Selectionner le livre du jour
/*
Algo :
selectionner les 10 derniers livres lus et prendre un des lecteurs au hasard

*/

include('../../include/bdd.php');
$SearchB = $bdd->prepare('SELECT * FROM yape_books ORDER BY id DESC LIMIT 10');
$SearchB->execute(array());

$nb1 = rand(0, 3);
$nb2 = rand(3, 6);
$nb3 = rand(6, 8);
$nb4 = rand(8, 9);


$x = 0;
while($data = $SearchB->fetch()){

  if($x == $nb1){
    $id_perso = $data['user_id_from'];
    $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
    $up->execute(array(
      'id' => $id_perso,
      'thisid' => 3
    ));
  }
  if($x == $nb2){
    $id_perso = $data['user_id_from'];
    $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
    $up->execute(array(
      'id' => $id_perso,
      'thisid' => 6
    ));
  }
  if($x == $nb3){
    $id_perso = $data['user_id_from'];
    $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
    $up->execute(array(
      'id' => $id_perso,
      'thisid' => 7
    ));
  }
  if($x == $nb4){
    $id_perso = $data['user_id_from'];
    $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
    $up->execute(array(
      'id' => $id_perso,
      'thisid' => 8
    ));
  }
  $x++;
}



 ?>
