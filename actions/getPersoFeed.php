<?php
session_start();
include("../include/bdd.php");
$min = $_GET['min'];
$id = $_GET['id'];

$increm = $min + 5;
$selectFeed = $bdd->prepare('SELECT * FROM yape_books WHERE user_id_from = :myId  ORDER BY id DESC LIMIT ' . $min . ', ' . $increm . '');
$selectFeed->execute(array(
  'myId' => $id
));

$StringReturn = '';
$taille = $selectFeed->rowCount();
while($data = $selectFeed->fetch()){
  $StringReturn .= $data['book_id'] . 'SEP' . $data['date_'] . 'SEP' . $data['image_id'] . 'SEP' . $data['nb_like'] . 'SEP' . $data['nb_comment'] . 'SEP';
  $StringReturn .= $data['title'] . 'SEP' . $data['auteur'] . 'SEP' . $data['pages'] . 'SEP' . $data['pages'] . 'SEP';
}

if($taille > 0){
  echo $taille . 'DEP' . $StringReturn;
}else{
  echo 'end';
}


 ?>
