<?php

  //Selectionner le livre du jour
  /*
  Algo :
  selectionner les 10 derniers livres lus et prendre un des lecteurs au hasard

  */

  try
  {
    $bdd = new PDO('mysql:host=jeschbacplbdd.mysql.db;dbname=jeschbacplbdd;charset=utf8', 'jeschbacplbdd', 'Jules1234FTP');
  }
  catch(Exception $e)
  {
        die('Erreur : '.$e->getMessage());
  }
  $SearchB = $bdd->prepare('SELECT * FROM yape_books ORDER BY id DESC LIMIT 50');
  $SearchB->execute(array());


  $arrayPeople = array();
  $arrayPeopleSelected = array();
  $x = 0;
  while($data = $SearchB->fetch()){
    if(!in_array($data['user_id_from'], $arrayPeople)){
      array_push($arrayPeople, $data['user_id_from']);
    }
  }

  shuffle($arrayPeople);
  $arrayPeopleSelected = array_slice($arrayPeople, 0, 4);

  print_r($arrayPeopleSelected);

  $up = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
  $up->execute(array(
    'id' => $arrayPeopleSelected[0],
    'thisid' => 3
  ));
  $up2 = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
  $up2->execute(array(
    'id' => $arrayPeopleSelected[1],
    'thisid' => 6
  ));
  $up3 = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
  $up3->execute(array(
    'id' => $arrayPeopleSelected[2],
    'thisid' => 7
  ));
  $up4 = $bdd->prepare('UPDATE yape_bookday SET book_id =:id, date_ = NOW() WHERE id = :thisid');
  $up4->execute(array(
    'id' => $arrayPeopleSelected[3],
    'thisid' => 8
  ));

 ?>
