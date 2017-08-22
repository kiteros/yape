<?php
session_start();
include("../include/bdd.php");
$min = $_GET['min'];
$id = $_GET['id'];

$increm = $min + 6;
$selectFeed = $bdd->prepare('SELECT * FROM yape_books WHERE user_id_from = :myId  ORDER BY id DESC LIMIT ' . $min . ', ' . $increm . '');
$selectFeed->execute(array(
  'myId' => $id
));

$y = 0;
$taille = $selectFeed->rowCount();
while($data = $selectFeed->fetch()){
  
  $json->post[$y]->book_id = $data['book_id'];
  $json->post[$y]->date = $data['date_'];
  $json->post[$y]->idImage = $data['image_id'];
  $json->post[$y]->nb_like = $data['nb_like'];
  $json->post[$y]->nb_comment = $data['nb_comment'];
  $json->post[$y]->title = $data['title'];
  $json->post[$y]->auteur = $data['auteur'];
  $json->post[$y]->pages = $data['pages'];
  $json->post[$y]->id = $data['id'];

  //$StringReturn .= $data['book_id'] . 'SEP' . $data['date_'] . 'SEP' . $data['image_id'] . 'SEP' . $data['nb_like'] . 'SEP' . $data['nb_comment'] . 'SEP';
  //$StringReturn .= $data['title'] . 'SEP' . $data['auteur'] . 'SEP' . $data['pages'] . 'SEP' . $data['id'] . 'SEP';
  $y++;
}

if($taille > 0){
  $json->size = $taille;
  echo json_encode($json);
}else{
  echo 'end';
}


 ?>
