<?php
  //Selectionner le livre du jour
  /*
  Algo :
  selectionner les 50 livres avec le plus de likes (10 au début)
  prendre un livre aléatoire dedans

  */

  include('../../include/bdd.php');
  $SearchB = $bdd->prepare('SELECT * FROM yape_books  ORDER BY nb_like LIMIT 10');
  $SearchB->execute(array());

  $nb = rand(0, 9);
  $x = 0;
  while($data = $SearchB->fetch()){
    if($x == $nb){

      $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
      $up->execute(array(
        'id' => $data['book_id'],
        'thisid' => 1
      ));
    }
    $x++;
  }
 ?>
